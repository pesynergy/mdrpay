<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayInController extends Controller
{
    public function PayIn()
    {
        return view('Payment.PayIn');
    }
}
