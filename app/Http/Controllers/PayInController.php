<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayInController extends Controller
{
    public function PayIn()
    {
        return view('Payment.payin');
    }

    public function creditCardPay(Request $request)
    {
            //   dd($request->all());
        $response = Http::post(env('NOVACASP_API_URL'), [
            'merchant_id' => env('NOVACASP_API_KEY'),
            'secret'      => env('NOVACASP_SECRET'),
            'amount'      => $request->amount,     // e.g. 1000 (in INR cents/paisa depending on docs)
            'currency'    => 'INR',
            'card_number' => $request->card_number,
            'expiry_month'=> $request->expiry_month,
            'expiry_year' => $request->expiry_year,
            'cvv'         => $request->cvv,
            'order_id'    => uniqid('ORDER_'),
            'callback_url'=> route('payment.callback'),
        ]);



        return $response->json();
    }

    public function paymentCallback(Request $request)
    {
        dd($request->all());
        // Handle NovaCasp response
        if ($request->status == 'success') {
            return "✅ Payment Successful!";
        } else {
            return "❌ Payment Failed!";
        }
    }
}
