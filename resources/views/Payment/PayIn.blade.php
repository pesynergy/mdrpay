@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-size: 16px;
        }
        @media screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }
        }


  #merchant-widget-mount-point {
      width: 100%;
      min-height: 500px; /* adjust as needed */
      display: block;
      overflow: auto;
  }

  iframe {
      width: 100% !important;
      min-height: 500px !important; /* force iframe height */
      border: none;
  }


    </style>

</head>

<body>
<div class="container card-container">
    <form action="https://checkout.novacasp.com/hpp/cgi_H1CDpjpykCWXvttG" method="get">​
    <input type="hidden" name="public_key" value="pk_test_7PObkI2BkYb6Kg6A0ZRLly9IbTzgKWWqht8DUsu0WtQ"/>
    {{-- <!--> replace this value with your public key <--> --}}
    <input type="hidden" name="reference_id" value="Test_order_01_1"/>
    <input type="hidden" name="currency" value="EUR"/>
    <input type="hidden" name="service" value="payment_card_usd_hpp"/>
    <input type="hidden" name="amount" value="10.00"/>
    <input type="hidden" name="description" value="Some info about order"/>
    {{-- <input type="hidden" name="expires" value="1602414000" /> --}}
    <input type="hidden" name="customer[reference_id]" value="test12345"/>
    <input type="hidden" name="customer[name]" value="Test Customer"/>
    <input type="hidden" name="customer[address][full_address]" value="Test Address"/>
    <input type="hidden" name="customer[address][country]" value="UK"/>
    {{-- <input type="hidden" name="customer[metadata][key1]" value="value1" />
    <input type="hidden" name="customer[metadata][key1]" value="value2" /> --}}
    <input type="submit" value="PAY"/>
</form>




    </div>

</body>

</html>

@endsection
