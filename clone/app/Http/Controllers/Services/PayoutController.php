<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Api;
use App\Model\Provider;
use App\Model\Payoutreport;
use App\User;
use Carbon\Carbon;

class PayoutController extends Controller
{
    protected $api, $admin;
    public function __construct()
    {
        $this->api = Api::where('code', 'payout')->first();
        $this->admin = User::whereHas('role', function ($q){
            $q->where('slug', 'admin');
        })->first();
    }

    public function payment(Request $post)
    {
        if (!\Myhelper::can('payout_service', $post->user_id)) {
            return response()->json(['status' => "error", "message" => "Service Not Allowed"]);
        }

        $rules = array(
            'name'     => 'required',
            'bank_name' => 'required',
            'account_number'  => 'required',
            'ifsc_code'=> 'required',
            'amount'   => 'required|numeric|min:10|max:200000'
        );
        
        $validate = \Myhelper::FormValidator($rules, $post);
        if($validate != "no"){
            return $validate;
        }
        
        $user = User::where('id', $post->user_id)->first();
        if($post->has("udf1") && $post->udf1 == "loadmoney"){
            $provider = Provider::where('recharge1', 'portalpayout')->first();
        }else{
            if($post->amount > 0 && $post->amount <= 499){
                $provider = Provider::where('recharge1', 'payout1')->first();
            }elseif($post->amount > 499 && $post->amount <= 999){
                $provider = Provider::where('recharge1', 'payout2')->first();
            }elseif($post->amount > 999 && $post->amount <= 24999){
                $provider = Provider::where('recharge1', 'payout3')->first();
            }elseif($post->amount > 24999){
                $provider = Provider::where('recharge1', 'payout4')->first();
            }
        }

        if(!$provider){
            return response()->json(['status' => "error", "message" => "Operator Not Found"]);
        }

        if($provider->status == 0){
            return response()->json(['status' => "error", "message" => "Operator Currently Down."]);
        }
        
        $serviceApi = \DB::table("service_managers")->where("provider_id", $provider->id)->where("user_id", $user->id)->first();
        if($serviceApi){
            $api = Api::find($serviceApi->api_id);
        }else{
            $api = Api::find($provider->api_id);
        }

        if(!$api || $api->status == 0){
            return response()->json(['status' => "error", "message" => "Service Currently Down"]);
        }

        $post['charge'] = \Myhelper::getCommission($post->amount, $user->scheme_id, $provider->id, $user->role->slug);
        $post['gst']    = ($provider->api->gst * $post->charge)/100;

        if($this->getAccBalance($user->id, "payoutwallet") - $user->lockedamount < $post->amount + $post->charge){
            return response()->json(['status' => "error", "message" => "Insufficient Balance"]);
        }

        do {
            $post['txnid'] = $this->transcode().'PO'.rand(111111111111, 999999999999);
        } while (Payoutreport::where("txnid", "=", $post->txnid)->first() instanceof Report);

        $debit = [
            'number'  => $post->account_number,
            'mobile'  => $user->mobile,
            'provider_id' => $provider->id,
            'api_id'  => $provider->api_id,
            'amount'  => $post->amount,
            'charge'  => $post->charge,
            'gst'     => $post->gst,
            'txnid'   => $post->txnid,
            'apitxnid'=> $post->apitxnid,
            'description' => $post->name,
            'remark'  => $user->email,
            'option1' => $post->name,
            'option2' => $post->ifsc_code,
            'option3' => $post->bank_name,
            'option4' => $post->udf1,
            'option5' => $post->udf2,
            'option6' => $post->udf3,
            'status'  => "accept",
            'user_id' => $user->id,
            'credit_by'   => $user->id,
            'rtype'   => 'main',
            'via'     => $post->via,
            'trans_type'  => 'debit',
            'product'     => "payout",
            'create_time' => $user->id.Carbon::now()->toDateTimeString()
        ];

        try {
            $report = \DB::transaction(function () use($debit, $post) {
                $debit["balance"] = $this->getAccBalance($debit['user_id'], "payoutwallet");
                User::where('id', $debit['user_id'])->decrement("payoutwallet", $post->amount + ($post->charge + $post->gst));
                $debit["closing"] = $this->getAccBalance($debit['user_id'], "payoutwallet");

                return Payoutreport::create($debit);
            });
        } catch (\Exception $e) {
            \DB::table('log_500')->insert([
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'log'  => $e->getMessage(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
    
            $report = false;
        }

        if(!$report){
            return response()->json(['status' => "error", 'message' => "Something went wrong"]);
        }

        switch ($api->code) {   
            case 'selfpayout':
                do {
                    $utr = $this->utrcode().rand(11111111, 99999999);
                } while (Payoutreport::where("refno", $utr)->first() instanceof Report);
                Payoutreport::where('id', $report->id)->update([
                    'status' => "success", 
                    'refno'   => $utr,
                    'option7' => "failed"
                ]);

                return response()->json([
                    'statuscode'=> 'TXN', 
                    'message'   => "Transaction Successfull",
                    "apitxnid"  => $post->apitxnid, 
                    "txnid"     => $post->txnid, 
                    "bankutr"   => $utr, 
                ]);
                break;

            default:
                $header = array(
                    "Content-Type: application/json"
                );     
                
                $parameters = [
                    "apitxnid" => $post->txnid,
                    "mobile"   => $user->mobile,
                    "account"  => $post->account_number,
                    "ifsc"     => $post->ifsc_code,
                    "token"    => $api->username,
                    "name"     => $post->name,
                    "purpose"  => "Payout",
                    "amount"   => $post->amount,
                    "callback" => url("callback/payout"),
                    "bank"     => $post->bank_name
                ];

                $url    = $api->url;
                $result = \Myhelper::curl($url, "POST", json_encode($parameters), $header, "yes", 'Payout', $post->txnid);

                if($result['response'] == ""){
                    $return['status']  = "success";
                    $return['message'] = "Successfully Transferred";
                    $return['data']    = [
                        'utr_no' => "pending",
                        'txn_id' => $post->txnid,
                        'status' => "pending"
                    ];
                    return response()->json($return);
                }

                $response = json_decode($result['response']);
                if(isset($response->statuscode) && in_array($response->statuscode, ["TXF", 'ERR'])){
                    User::where('id', $user->id)->increment('payoutwallet', $post->amount + ($post->charge + $post->gst));
                    Payoutreport::where('id', $report->id)->update([
                        'status'  => "failed", 
                        'closing' => $this->getAccBalance($debit['user_id'], "payoutwallet"),
                        'refno'   => isset($response->bankutr) ? $response->bankutr : $response->message
                    ]);

                    try {
                        $webhook_payload = [
                            'event_name' => 'payout',
                            'data'       => [
                                'status' => "failed",
                                'utr_no' => isset($response->message) ? $response->message : "Failed",
                                'txn_id' => $post->txnid,
                                'amount' => $post->amount,
                                'udf1' => $post->udf1,
                                'udf2' => $post->udf2,
                                'udf3' => $post->udf3
                            ]
                        ];

                        $token = \DB::table("apitokens")->where("user_id", $post->user_id)->first();
                        $callresponse = \Myhelper::curl($token->payoutcallbackurl, "POST", json_encode($webhook_payload), $header, "no");

                        \DB::table('log_webhooks')->insert([
                            'url'     => $token->payoutcallbackurl."?".json_encode($webhook_payload), 
                            'callbackresponse' => json_encode($callresponse),
                            'txnid'   => $post->udf1, 
                            'product' => 'payout'
                        ]);
                    } catch (\Exception $e) {
                    }
                    return response()->json([
                        'status'  => 'error', 
                        'message' => isset($response->message) ? $response->message : "Payout Failed"
                    ]);
                }else{
                    Payoutreport::where('id', $report->id)->update([
                        'status' => "success", 
                        'refno'  => $response->bankutr
                    ]);

                    try {
                        $webhook_payload = [
                            'event_name' => 'payout',
                            'data'       => [
                                'status' => "success",
                                'utr_no' => $response->bankutr,
                                'txn_id' => $post->txnid,
                                'amount' => $post->amount,
                                'udf1' => $post->udf1,
                                'udf2' => $post->udf2,
                                'udf3' => $post->udf3
                            ]
                        ];

                        $token    = \DB::table("apitokens")->where("user_id", $post->user_id)->first();
                        $callresponse = \Myhelper::curl($token->payoutcallbackurl, "POST", json_encode($webhook_payload), $header, "no");

                        \DB::table('log_webhooks')->insert([
                            'url' => $token->payoutcallbackurl."?".json_encode($webhook_payload), 
                            'callbackresponse' => json_encode($callresponse),
                            'txnid'      => $post->udf1, 
                            'product'    => 'payout'
                        ]);
                    } catch (\Exception $e) {
                    }

                    $return['status']  = "success";
                    $return['message'] = "Successfully Transferred";
                    $return['data']    = [
                        'utr_no' => $response->bankutr,
                        'txn_id' => $post->txnid,
                        'status' => "success"
                    ];
                    return response()->json($return);
                }
                break;
        }
    }

    public function query(Request $post)
    {
        $rules = array(
            'check_by' => 'required',
            'check_value' => 'required'
        );
        
        $validate = \Myhelper::FormValidator($rules, $post);
        if($validate != "no"){
            return $validate;
        }
        
        switch ($post->check_by) {
            case 'udf1':
                $report = Payoutreport::where("option4", $post->check_value)->where("product", "payout")->first();
                break;

            case 'udf2':
                $report = Payoutreport::where("option5", $post->check_value)->where("product", "payout")->first();
                break;

            case 'udf3':
                $report = Payoutreport::where("option6", $post->check_value)->where("product", "payout")->first();
                break;
            
            default:
                $report = Payoutreport::where("txnid", $post->check_value)->where("product", "payout")->first();
                break;
        }
        

        if($report){
            return response()->json([
                'status'  => "success",
                'message' => "Successfully Found", 
                'data'    => [
                    'amount' => $report->amount,
                    'utr_no' => $report->refno,
                    'status' => $report->status,
                    'txn_id' => $report->txnid,
                    'udf1' => $report->option4,
                    'udf2' => $report->option5,
                    'udf3' => $report->option6
                ]
            ]);
        }else{
            return response()->json([
                'status'    => 'error',
                'message'   => "No Transaction found"
            ]);
        }
    }

    public function bpay(Request $post)
    {
        $log = \DB::table('log_webhooks')->insert([
            'txnid'      => "payout".date("ymdhis"), 
            'product'    => 'walletpayPayout', 
            'response'   => json_encode($post->all()),
            "created_at" => date("Y-m-d H:i:s")
        ]);
    }
}