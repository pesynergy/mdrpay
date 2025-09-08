@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .card-container {
    max-width: 550px;
    margin: 40px auto;
  }
  .credit-card {
    background: linear-gradient(135deg, #a100ff, #ff007f);
    color: #fff;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
  }
  .credit-card .visa {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 28px;
    font-weight: bold;
  }
  .form-control, .form-select {
    border-radius: 10px;
  }
</style>

<div class="container card-container">

 <script src="https://unpkg.com/@paycore/[email protected]/dist/merchantWidget.umd.js"></script>
    <div id="merchant-widget-mount-point" style="width: 375px; height: 600px;"></div>
    <script>
        window.widget.init({
            public_key: "pk_test_7PObkI2BkYb6Kg6A0ZRLly9IbTzgKWWqht8DUsu0WtQ", // replace the value with YOUR commerce public key
            baseUrl: "https://www.mdrpay.com/hpp/",
            flow: "iframe",
            selector: "merchant-widget-mount-point",
            amount: 10,
            currency: "USD",
            language: "en",
            description: "Simple description of your payment operation.",
            reference_id: "",
            metadata: {
                key: "value"
            },
            display: {
                hide_header: false,
                hide_footer: false,
                hide_progress_bar: false,
                hide_method_filter: false,
                hide_lifetime_counter: false
            }
        });
    </script>

    <form action="https://www.mdrpay.com/hpp/" method="get">
    <input type="hidden" name="public_key" value="<your_public_key>" />
    <input type="hidden" name="currency" value="USD" />
    <input type="hidden" name="description" value="Some goods" />
    <input type="hidden" name="amount" value="100" />
    <input type="submit" value="Pay" />
</form>

<!-- replace the value with your commerce public key -->
<img alt="Payment Link" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://www.mdrpay.com%2Fhpp%2F%3Fpublic_key%3Dyour_public_key%26currency%3DUSD%26description%3DSome%2520goods%26amount%3D100">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
