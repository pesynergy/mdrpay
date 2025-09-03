<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Fundreport;
use App\Model\Report;
use App\Model\Payoutreport;
use App\Model\Securereport;
use App\Model\Paymode;
use App\Model\Api;
use App\Model\Apitoken;
use App\Model\Provider;
use App\Model\PortalSetting;
use App\Model\Fundbank;
use App\Model\Upiload;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class FundController extends Controller
{
    public $fundapi, $admin;

    public function __construct()
    {
        $this->fundapi = Api::where('code', 'fund')->first();
        $this->admin = User::whereHas('role', function ($q){
            $q->where('slug', 'admin');
        })->first();
    }

    public function index(Request $post, $type, $action="none")
    {
        $data["type"] = $type;
        $user = \Auth::user();
        switch ($type) {
            case 'request':
                $permission = 'fund_request';
                break;

            case 'requestview':
                $permission = 'fund_requestview';
                break;
            
            case 'requestviewall':
            case 'allfund':
                $permission = 'fund_report';
                break;

            default:
                abort(404);
                break;
        }

        if (isset($permission) && !\Myhelper::can($permission)) {
            abort(403);
        }

        if (isset($role) && !\Myhelper::hasRole($role)) {
            abort(403);
        }

        if ($this->fundapi->status == "0") {
            abort(503);
        }

        switch ($type) {
            case 'request':
                $data['banks'] = Fundbank::where('user_id', \Auth::user()->parent_id)->where('status', '1')->get();
                if(!\Myhelper::can('setup_bank', \Auth::user()->parent_id)){
                    $admin = User::whereHas('role', function ($q){
                        $q->where('slug', 'whitelable');
                    })->where('company_id', \Auth::user()->company_id)->first(['id']);

                    if($admin && \Myhelper::can('setup_bank', $admin->id)){
                        $data['banks'] = Fundbank::where('user_id', $admin->id)->where('status', '1')->get();
                    }else{
                        $admin = User::whereHas('role', function ($q){
                            $q->where('slug', 'admin');
                        })->first(['id']);
                        $data['banks'] = Fundbank::where('user_id', $admin->id)->where('status', '1')->get();
                    }
                }
                $data['paymodes'] = Paymode::where('status', '1')->get();
                break;
        }
        return view('fund.'.$type)->with($data);
    }

    public function transaction(Request $post)
    {
        if ($this->fundapi->status == "0") {
            return response()->json(['status' => "This function is down."],400);
        }

        $provide = Provider::where('recharge1', 'fund')->first();
        $post['provider_id'] = $provide->id;

        switch ($post->type) {
            case 'transfer':
                if(!\Myhelper::can('fund_transfer')){
                    return response()->json(["status" => "ERR" , "message" => "Permission not allowed"]);
                }

                $post['refno'] = preg_replace('/[^A-Za-z0-9]/', '', $post->refno);
                $rules = array(
                    'amount' => 'required|numeric|min:1',
                    'refno'  => 'required|unique:reports,refno',
                );
        
                $validator = \Validator::make($post->all(), $rules);
                if ($validator->fails()) {
                    foreach ($validator->errors()->messages() as $key => $value) {
                        $error = $value[0];
                    }
                    return response()->json(['status' => "ERR", "message" => $error]);
                }

                if($post->wallet == "payoutwallet"){
                    $payee    = User::where('id', \Auth::id())->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "payoutwallet";
                    $c_table  = Payoutreport::query();

                    $d_wallet = "payoutwallet";
                    $d_table  = Payoutreport::query();
                }elseif($post->wallet == "mainwallet"){
                    $payee    = User::where('id', \Auth::id())->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "mainwallet";
                    $c_table  = Report::query();

                    $d_wallet = "mainwallet";
                    $d_table  = Report::query();
                }else{
                    $payee    = User::where('id', $post->payee_id)->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "payoutwallet";
                    $d_wallet = "mainwallet";
                    $c_table  = Payoutreport::query();
                    $d_table  = Report::query();
                }

                $product = "fund transfer";

                if($this->getAccBalance($payee->id, $d_wallet) < $post->amount){
                    return response()->json(['status'=>"ERR", 'message' => "Insufficient wallet balance."]);
                }

                $debit = [
                    'number'  => $payee->mobile,
                    'mobile'  => $payee->mobile,
                    'provider_id' => $post->provider_id,
                    'api_id'  => $provide->api_id,
                    'amount'  => $post->amount,
                    'txnid'   => "WTR".date('Ymdhis'),
                    'remark'  => $post->remark,
                    'refno'   => $post->refno,
                    'status'  => 'success',
                    'user_id' => $payee->id,
                    'credit_by' => $user->id,
                    'rtype'   => 'main',
                    'via'     => $post->via,
                    'balance' => $this->getAccBalance($payee->id, $d_wallet),
                    'trans_type' => 'debit',
                    'product' => $product
                ];

                if(in_array($post->wallet, ["payoutwallet", "mainwallet"])){
                    $debit['option5'] = "fund";
                    $debit['option1'] = "wallet";
                }

                $credit = [
                    'number' => $user->mobile,
                    'mobile' => $user->mobile,
                    'provider_id' => $post->provider_id,
                    'api_id' => $provide->api_id,
                    'amount' => $post->amount,
                    'txnid'  => "WTR".date('Ymdhis'),
                    'remark' => $post->remark,
                    'refno'  => $post->refno,
                    'status' => 'success',
                    'user_id'   => $user->id,
                    'credit_by' => $payee->id,
                    'rtype' => 'main',
                    'via'   => $post->via,
                    'balance'    => $this->getAccBalance($user->id, $c_wallet),
                    'trans_type' => 'credit',
                    'product'    => $product
                ];

                $request = \DB::transaction(function () use($debit, $credit, $d_table, $c_table, $c_wallet, $d_wallet) {
                    User::where('id', $debit['user_id'])->decrement($d_wallet, $debit['amount']);
                    $debit["closing"] = $this->getAccBalance($debit['user_id'], $d_wallet);
                    $debitReport = $d_table->create($debit);

                    User::where('id', $credit['user_id'])->increment($c_wallet, $credit['amount']);
                    $credit["closing"] = $this->getAccBalance($credit['user_id'], $c_wallet);
                    $creditReport = $c_table->create($credit);
                    return true;
                });

                if($request){
                    return response()->json(['status'=>"TXN", 'message' => "Fund Transfer successfully"]);
                }else{
                    return response()->json(['status'=>"ERR", 'message' => "Something went wrong."]);
                }
                break;

            case 'return':
                if(!\Myhelper::can('fund_return')){
                    return response()->json(["status" => "ERR" , "message" => "Permission not allowed"]);
                }

                $post['refno'] = preg_replace('/[^A-Za-z0-9]/', '', $post->refno);
                $rules = array(
                    'amount' => 'required|numeric|min:1'
                );
        
                $validator = \Validator::make($post->all(), $rules);
                if ($validator->fails()) {
                    foreach ($validator->errors()->messages() as $key => $value) {
                        $error = $value[0];
                    }
                    return response()->json(['status' => "ERR", "message" => $error]);
                }
                $product = "fund return";

                if($post->wallet == "payoutwallet"){
                    $payee    = User::where('id', \Auth::id())->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "payoutwallet";
                    $c_table  = Payoutreport::query();

                    $d_wallet = "payoutwallet";
                    $d_table  = Payoutreport::query();
                }elseif($post->wallet == "mainwallet"){
                    $payee    = User::where('id', \Auth::id())->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "mainwallet";
                    $c_table  = Report::query();

                    $d_wallet = "mainwallet";
                    $d_table  = Report::query();
                }else{
                    $payee    = User::where('id', $post->payee_id)->first();
                    $user     = User::where('id', $post->payee_id)->first();
                    $c_wallet = "mainwallet";
                    $d_wallet = "payoutwallet";
                    $c_table  = Report::query();
                    $d_table  = Payoutreport::query();
                }

                if($post->wallet == "payoutwallet" && $this->getAccBalance($payee->id, $d_wallet) < $post->amount){
                    return response()->json(['status'=>"ERR", 'message' => "Insufficient wallet balance."]);
                }

                $debit = [
                    'number' => $payee->mobile,
                    'mobile' => $payee->mobile,
                    'provider_id' => $post->provider_id,
                    'api_id' => $provide->api_id,
                    'amount' => $post->amount,
                    'remark' => $post->remark,
                    'refno'  => $post->refno,
                    'status' => 'success',
                    'user_id'=> $user->id,
                    'credit_by' => $payee->id,
                    'rtype'   => 'main',
                    'via'     => 'portal',
                    'balance' => $this->getAccBalance($user->id, $d_wallet),
                    'trans_type'  => 'debit',
                    'product' => $product
                ];

                $credit = [
                    'number'  => $user->mobile,
                    'mobile'  => $user->mobile,
                    'provider_id' => $post->provider_id,
                    'api_id'  => $provide->api_id,
                    'amount'  => $post->amount,
                    'remark'  => $post->remark,
                    'refno'  => $post->refno,
                    'status'  => 'success',
                    'user_id' => $payee->id,
                    'credit_by' => $user->id,
                    'rtype'   => 'main',
                    'via'     => $post->via,
                    'balance' => $this->getAccBalance($payee->id, $c_wallet),
                    'trans_type' => 'credit',
                    'product' => $product,
                ];

                $request = \DB::transaction(function () use($debit, $credit, $d_table, $c_table, $c_wallet, $d_wallet) {
                    User::where('id', $debit['user_id'])->decrement($d_wallet, $debit['amount']);
                    $debit["closing"] = $this->getAccBalance($debit['user_id'], $d_wallet);
                    $debitReport = $d_table->create($debit);
                
                    User::where('id', $credit['user_id'])->increment($c_wallet, $credit['amount']);
                    $credit["closing"] = $this->getAccBalance($credit['user_id'], $c_wallet);
                    $creditReport = $c_table->create($credit);
                    return true;
                });

                if($request){
                    return response()->json(['status'=>"TXN", 'message' => "Fund Return successfully"]);
                }else{
                    return response()->json(['status'=>"ERR", 'message' => "Something went wrong."]);
                }
                break;

            case 'loadwallet':
                if(\Myhelper::hasNotRole('admin')){
                    return response()->json(['status' => "Permission not allowed"],400);
                }

                $user = \Auth::user();
                $insert = [
                    'number' => $user->mobile,
                    'mobile' => $user->mobile,
                    'provider_id' => $post->provider_id,
                    'api_id' => $this->fundapi->id,
                    'amount' => $post->amount,
                    'txnid'  => date('ymdhis'),
                    'remark' => $post->remark,
                    'status'     => 'success',
                    'user_id'    => $user->id,
                    'credit_by'  => $user->id,
                    'rtype'      => 'main',
                    'via'        => 'portal',
                    'balance'    => $this->getAccBalance($user->id, $post->wallet),
                    'trans_type' => 'credit',
                    'product'    => "fund ".$post->type
                ];

                $action = \DB::transaction(function () use($post, $insert) {
                    User::where('id', $insert['user_id'])->increment($post->wallet, $insert['amount']);
                    $insert["closing"] = $this->getAccBalance($insert['user_id'], $post->wallet);
                    return Report::create($insert);
                });
                
                if($action){
                    return response()->json(['status' => "success"], 200);
                }else{
                    return response()->json(['status' => "Technical error, please contact your service provider before doing transaction."],400);
                }
                break;
            
            case 'addmoney':
                $userkey = \DB::table("apitokens")->where("user_id", \Auth::id())->first();

                if(!$userkey){
                    do {
                        $post['token'] = str_random(30);
                    } while (Apitoken::where("token", "=", $post->token)->first() instanceof Apitoken);

                    $post['user_id'] = $post->user_id;
                    $action = Apitoken::updateOrCreate(['id'=> $post->id], $post->all());
                    $userkey  = \DB::table("apitokens")->where("user_id", $post->user_id)->first(); 
                }
                
                $url = "https://login.intentpe.com/api/v1/payin/create_intent";
                $header = array(
                    'Authorization: Bearer '.$userkey->token
                );

                $parameter = [
                    "amount" => $post->amount
                ];

                $result   = \Myhelper::curl($url, "POST", $parameter, $header, "yes", 'AddMoney', $post->txnid);
                $response = json_decode($result['response'], true);

                if(isset($response['status']) && $response['status'] == "success"){
                    $return['status']  = "success";
                    $return['qr_link'] = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=".urlencode($response['data']['intent_data']);
                }else{
                    $return['status']  = "error";
                    $return['message'] = $response['message'];
                }
                return response()->json($return);
                break;
            
            case 'getmoney':
                $userkey = \DB::table("apitokens")->where("user_id", \Auth::id())->first();
                if(!$userkey){
                    do {
                        $post['token'] = str_random(30);
                    } while (Apitoken::where("token", "=", $post->token)->first() instanceof Apitoken);

                    $post['user_id'] = $post->user_id;
                    $action = Apitoken::updateOrCreate(['id'=> $post->id], $post->all());
                    $userkey  = \DB::table("apitokens")->where("user_id", $post->user_id)->first(); 
                }
                
                $url     = "https://login.intentpe.com/api/v1/payout/create";
                $header  = array(
                    'Authorization: Bearer '.$userkey->token
                );

                $parameter = [
                    "name" => $post->name,
                    "account_number" => $post->account_number,
                    "ifsc_code" => $post->ifsc_code,
                    "bank_name" => $post->bank_name,
                    "amount"    => $post->amount,
                    "udf1"      => "loadmoney"
                ];

                $result   = \Myhelper::curl($url, "POST", $parameter, $header, "yes", 'AddMoney', $post->txnid);
                $response = json_decode($result['response'], true);

                if(isset($response["data"]['status']) && $response["data"]['status'] == "success"){
                    $return['status']  = "success";
                }else{
                    $return['status']  = "error";
                    $return['message'] = $response['message'];
                }

                return response()->json($return);
                break;
            
            case 'apitransfer':
                $rules = array(
                    'id' => 'required|numeric'
                );
        
                $validator = \Validator::make($post->all(), $rules);
                if ($validator->fails()) {
                    foreach ($validator->errors()->messages() as $key => $value) {
                        $error = $value[0];
                    }
                    return response()->json(['status' => "ERR", "message" => $error]);
                }

                $report = \DB::table("payoutreports")->where("id", $post->id)->first();

                if(!$report){
                    return response()->json(['status' => "error", "message" => "Transaction Not Found"]);
                }

                if($report->status == "success" && $report->option7 != "failed"){
                    return response()->json(['status' => "error", "message" => "Already Transfer"]);
                }

                $api    = Api::find($report->api_id);
                $url    = "http://103.205.64.251:8080/clickncashapi/rest/auth/generateToken";
                $header = array(
                    'Content-Type: application/json'
                );

                $parameter = [
                    "username" => $api->username,
                    "password" => $api->password
                ];

                $result   = \Myhelper::curl($url, "POST", json_encode($parameter), $header, "no");
                $response = json_decode($result['response']);

                if(isset($response->payload->token)){
                    $header = array(
                        'Content-Type: application/json',
                        'Authorization: Bearer '.$response->payload->token
                    );

                    $parameters = [
                        "clientReferenceNo" => $report->txnid,
                        "benePhoneNo"   => "9999999991",
                        "beneAccountNo" => $report->number,
                        "beneifsc"      => $report->option2,
                        "beneName"      => $report->option1,
                        "fundTransferType"  => "IMPS",
                        "amount"    => $report->amount,
                        "pincode"   => "201012",
                        "custName"  => "Apna SITI SEVA KENDRA",
                        "custMobNo" => "9999999991",
                        "latlong"   => "22.8031731,88.7874172",
                        "beneBankName" => $report->option1
                    ];

                    $url    = "http://103.205.64.251:8080/clickncashapi/rest/auth/transaction/payOut";
                    $result = \Myhelper::curl($url, "POST", json_encode($parameters), $header, "yes", 'Payout', $post->txnid);

                    if($result['response'] == ""){
                        Payoutreport::where('id', $report->id)->update([
                            'status' => "pending"
                        ]);

                        $return['status']  = "success";
                        $return['message'] = "Successfully Transferred";
                        return response()->json($return);
                    }

                    $response = json_decode($result['response']);
                    
                    if(isset($response->status) && !in_array($response->status, ["SUCCESS", 'PROCESSING'])){
                        Payoutreport::where('id', $report->id)->update([
                            'status'  => "failed", 
                            'refno'   => isset($response->utr) ? $response->utr : "Failed",
                            "option7" => "main"
                        ]);
                        
                        \Myhelper::transactionRefund($post->id, "payoutreports", "payoutwallet");
                        return response()->json([
                            'status'  => 'error', 
                            'message' => "Payout Failed"
                        ]);
                    }elseif(isset($response->status) && in_array($response->status, ["SUCCESS"])){
                        Payoutreport::where('id', $report->id)->update([
                            'status'  => "success", 
                            'refno'   => $response->utr,
                            "option7" => "main"
                        ]);

                        $return['status']  = "success";
                        $return['message'] = "Successfully Transferred";
                        return response()->json($return);
                    }else{
                        Payoutreport::where('id', $report->id)->update([
                            'status'  => "pending", 
                            'refno'   => isset($response->utr) ? $response->utr : "",
                            "option7" => "main"
                        ]);

                        $return['status']  = "success";
                        $return['message'] = "Successfully Transferred";
                        return response()->json($return);
                    }
                }else{
                    return response()->json(['status' => "error", 'message' => "Error While Transferring Amount, try again"]);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
