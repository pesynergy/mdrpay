<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class CollectionController extends Controller
{
    // Initiate payment and generate encrypted URL
    public function initiatePayment(Request $post)
    {
        // Validate input fields
        $rules = [
            'token' => 'required|string',
            'order_id' => 'required|string',
            'amount' => 'required|numeric|min:100|max:200000',
        ];
        
        $validate = \Myhelper::FormValidator($rules, $post);
        if ($validate != "no") {
            return $validate;
        }

        // Prepare the data to be encrypted
        $data = [
            'token' => $post->token,
            'order_id' => $post->order_id,
            'amount' => $post->amount,
        ];

        // Encrypt the data
        $encrypted_fields = Crypt::encrypt(json_encode($data));

        // Generate the payment URL
        $paymentUrl = "https://login.mdrpay.com/pg/payment?encrypted_fields=" . urlencode($encrypted_fields);

        return response()->json([
            'status' => 'success',
            'payment_url' => $paymentUrl,
        ]);
    }
    
    // Decrypt the fields and show the payment form
    public function paymentPage(Request $post)
    {
        // Decrypt the fields
        $encrypted_fields = $post->input('encrypted_fields');
        if (!$encrypted_fields) {
            return response()->json(['status' => 'error', 'message' => 'Encrypted fields missing']);
        }

        $decrypted_data = json_decode(Crypt::decrypt($encrypted_fields), true);

        if (!$decrypted_data) {
            return response()->json(['status' => 'error', 'message' => 'Failed to decrypt data']);
        }

        // Return the payment form with decrypted data
        return view('payment', [
            'order_id' => $decrypted_data['order_id'],
            'amount' => $decrypted_data['amount'],
            'token' => $decrypted_data['token'],
        ]);
    }

    // Process the card payment
    public function processCardPayment(Request $post)
    {
        // Extract card details and other payment info
        $card_details = [
            'cardNumber' => $post->card_number,
            'cardholderName' => $post->card_holder,
            'cardSecurityCode' => $post->cvv,
            'expiryMonth' => $post->exp_month,
            'expiryYear' => $post->exp_year,
        ];

        // Call the Card-payment-cURL logic here
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app-demo.payadmit.com/api/v1/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "paymentType" => "DEPOSIT",
                "paymentMethod" => "BASIC_CARD",
                "amount" => $post->amount,
                "currency" => "EUR",
                "card" => $card_details,
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: bearer qWuU0Du90Va0PAdvAWOIg9S2WginlyFw'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Process response
        $response_data = json_decode($response, true);
        if ($response_data['status'] === '200') {
            // Save successful transaction to report table
            $report = Report::where('order_id', $post->order_id)->first();
            $report->status = 'Success';
            $report->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Payment completed successfully!',
            ]);
        } else {
            // Handle error
            return response()->json([
                'status' => 'error',
                'message' => 'Payment failed.',
                'details' => $response_data,
            ]);
        }
    }
}
