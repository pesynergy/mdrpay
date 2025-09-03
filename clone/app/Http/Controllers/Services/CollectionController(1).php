<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Provider;
use App\Model\Report;
use Carbon\Carbon;
use App\Model\Api;
use App\User;

class CollectionController extends Controller
{
    protected $admin;
    public function __construct()
    {
        $this->admin  = User::whereHas('role', function ($q){
            $q->where("slug", "admin");
        })->first();
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
                $report = Report::where("option1", $post->check_value)->where("product", "Card")->first();
                break;

            case 'udf2':
                $report = Report::where("option2", $post->check_value)->where("product", "Card")->first();
                break;

            case 'udf3':
                $report = Report::where("option3", $post->check_value)->where("product", "Card")->first();
                break;
            
            default:
                $report = Report::where("txnid", $post->check_value)->where("product", "Card")->first();
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
                    'udf1' => $report->option1,
                    'udf2' => $report->option2,
                    'udf3' => $report->option3,
                    'payer_name' => $report->option4,
                    'payer_upi'  => $report->option5
                ]
            ]);
        }else{
            return response()->json([
                'status'    => 'error',
                'message'   => "No Transaction found"
            ]);
        }
    }

    public function getcardinfo(Request $post)
    {
        $rules = [
            'api_provider' => "required|string",
            'amount' => "required|numeric|min:100|max:200000",
            'cardNumber' => "required|string",
            'cardholderName' => "required|string",
            'cardSecurityCode' => "required|string",
            'expiryMonth' => "required|string",
            'expiryYear' => "required|string",
            'firstName' => "required|string",
            'lastName' => "required|string",
            'email' => "required|email",
            'phone' => "required|string",
            'address' => "required|string",
            'city' => "required|string",
            'country' => "required|string",
            'state' => "required|string",
            'zip' => "required|string",
        ];
        
        $validate = \Myhelper::FormValidator($rules, $post);
        if ($validate != "no") {
            return $validate;
        }
        
        $user = User::find($post->user_id);
        if (!$user) {
            return response()->json(['status' => "error", "message" => "User Not Found"]);
        }
        
        if ($this->getAccBalance($user->id, "mainwallet") < $post->amount) {
            return response()->json(['status' => "error", "message" => "Insufficient Wallet Balance"]);
        }
        
        $referenceId = "txn_" . uniqid();
        
        switch ($post->api_provider) {
            case "payadmit":
                $apiPayload = [
                    "referenceId" => "payment_id={$referenceId};custom_ref=123",
                    "paymentType" => "DEPOSIT",
                    "paymentMethod" => "BASIC_CARD",
                    "amount" => $post->amount,
                    "currency" => "EUR",
                    "description" => "Funding the account number 12345",
                    "card" => [
                        "cardNumber" => $post->cardNumber,
                        "cardholderName" => $post->cardholderName,
                        "cardSecurityCode" => $post->cardSecurityCode,
                        "expiryMonth" => $post->expiryMonth,
                        "expiryYear" => $post->expiryYear,
                    ],
                    "customer" => [
                        "referenceId" => "VIP_customer_12345",
                        "citizenshipCountryCode" => $post->country,
                        "firstName" => $post->firstName,
                        "lastName" => $post->lastName,
                        "email" => $post->email,
                        "phone" => $post->phone,
                        "locale" => "en",
                        "ip" => $post->ip(),
                    ],
                    "billingAddress" => [
                        "addressLine1" => $post->address,
                        "city" => $post->city,
                        "countryCode" => $post->country,
                        "postalCode" => $post->zip,
                        "state" => $post->state,
                    ],
                    "returnUrl" => url("/return/{$referenceId}/success"),
                    "webhookUrl" => url("/callbacks/payadmit"),
                ];
        
                $apiUrl = "https://app-demo.payadmit.com/api/v1/payments";
                $headers = [
                    "Content-Type: application/json",
                    "Authorization: Bearer qWuU090Va0PAdvAWOIg9S2WginlyFw", // Replace with your API key
                ];
        
                try {
                    $response = \Myhelper::curl($apiUrl, "POST", json_encode($apiPayload), $headers, "no");
                    $response = json_decode($response['response'], true);
    
                    if ($response['status'] === 200) {
                        $result = $response['result'];
    
                        return response()->json([
                            "status" => "success",
                            "timestamp" => $response['timestamp'] ?? now(),
                            "paymentDetails" => [
                                "id" => $result['id'] ?? null,
                                "referenceId" => $result['referenceId'] ?? null,
                                "paymentType" => $result['paymentType'] ?? null,
                                "state" => $result['state'] ?? null,
                                "description" => $result['description'] ?? null,
                                "amount" => $result['amount'] ?? null,
                                "currency" => $result['currency'] ?? null,
                                "redirectUrl" => $result['redirectUrl'] ?? null,
                            ],
                            "customerDetails" => [
                                "firstName" => $result['customer']['firstName'] ?? null,
                                "lastName" => $result['customer']['lastName'] ?? null,
                                "email" => $result['customer']['email'] ?? null,
                                "phone" => $result['customer']['phone'] ?? null,
                            ],
                            "cardDetails" => [
                                "cardBrand" => $result['paymentMethodDetails']['cardBrand'] ?? null,
                                "cardholderName" => $result['paymentMethodDetails']['cardholderName'] ?? null,
                                "cardExpiryMonth" => $result['paymentMethodDetails']['cardExpiryMonth'] ?? null,
                                "cardExpiryYear" => $result['paymentMethodDetails']['cardExpiryYear'] ?? null,
                            ],
                        ]);
                    } else {
                        return response()->json([
                            "status" => "error",
                            "message" => $result['errorCode'] ?? "Error occurred",
                            "details" => $result['externalResultCode'] ?? null,
                        ]);
                    }
                } catch (\Exception $e) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Failed to communicate with the PayAdmit API",
                        "details" => $e->getMessage(),
                    ]);
                }
                break;
        
            case "pgpaytech":
                $apiPayload = [
                    "firstName" => $post->firstName,
                    "lastName" => $post->lastName,
                    "address" => $post->address,
                    "country" => $post->country,
                    "state" => $post->state,
                    "city" => $post->city,
                    "zip" => $post->zip,
                    "ipAddress" => $post->ip(),
                    "email" => $post->email,
                    "phoneNumber" => $post->phone,
                    "amount" => $post->amount,
                    "currency" => "EUR",
                    "cardNumber" => $post->cardNumber,
                    "cardExpiryMonth" => $post->expiryMonth,
                    "cardExpiryYear" => $post->expiryYear,
                    "cardCvvNumber" => $post->cardSecurityCode,
                    "redirectUrl" => url("/redirect"),
                    "notifyUrl" => url("/notifications"),
                    "merchantRef" => $referenceId,
                ];
        
                $apiUrl = "https://payment.pgpaytech.com/api/v1/create/transaction";
                $headers = [
                    "Content-Type: application/json",
                    "Authorization: Bearer YOUR_API_KEY_HERE",
                ];
        
                try {
                    $response = \Myhelper::curl($apiUrl, "POST", json_encode($apiPayload), $headers, "no");
                    $response = json_decode($response['response'], true);
        
                    if (isset($response['status']) && $response['status'] === "success") {
                        return response()->json([
                            "status" => "success",
                            "data" => [
                                "status" => $response['status'],
                                "message" => $response['message'],
                                "descriptor" => $response['descriptor'] ?? null,
                                "transactionRef" => $response['transactionRef'] ?? null,
                                "3dsUrl" => $response['3dsUrl'] ?? null,
                            ],
                        ]);
                    } else {
                        return response()->json([
                            "status" => "error",
                            "message" => $response['message'] ?? "Transaction failed",
                            "details" => $response,
                        ]);
                    }
                } catch (\Exception $e) {
                    return response()->json(["status" => "error", "message" => $e->getMessage()]);
                }
                break;
        
            default:
                return response()->json(["status" => "error", "message" => "Invalid API provider"]);
        }
    }

}
