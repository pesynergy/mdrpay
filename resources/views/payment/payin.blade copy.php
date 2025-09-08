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
    <script src="https://unpkg.com/@paycore/merchant-widget-js@0.4.1/dist/merchantWidget.umd.js"></script>
</head>

<body>
<div class="container card-container">
    <div id="merchant-widget-mount-point"></div>
    <script>
        window.widget.init({
            public_key: "pk_test_7PObkI2BkYb6Kg6A0ZRLly9IbTzgKWWqht8DUsu0WtQ",
            baseUrl: "https://pay.novacasp.com/hpp/",
            flow: "iframe",
            selector: "merchant-widget-mount-point",
            amount: 100,
            currency: "EUR",
            locale: "en",
            description: "Simple description of your payment.",
            reference_id: "",
            expires: "",
            cpi: "",
            service: "payment_card_eur_hpp",
            metadata: {},
            style: {
                theme: "basic"
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



        {{-- <script>
    window.widget.init({
    public_key: "pk_test_7PObkI2BkYb6Kg6A0ZRLly9IbTzgKWWqht8DUsu0WtQ", //replace this value with your public key
    baseUrl: "https://pay.novacasp.com/hpp/",
    flow: "iframe",
    selector: "merchant-widget-mount-point",
    amount: 10,
    currency: "USD",
    language: "en",
    description: "Simple description of your payment operation.",
    reference_id: "",
    expires: 1652479200,
    cpi: "",
    service: "payment_card_usd_hpp",
    metadata: {
        key: "value"
    },
    customer: {
        reference_id: "5ae4002f-5332-4a0f-b951-da4b9a1c46c4",
        email: "email@customer.com",
        phone: "123456789000000",
        metadata: {
            key: "value",
            key1: "value1"
            },
        address: {
            country: "GB",
            region: "London City",
            city: "London",
            street: "Oxford Street",
            full_address: "Postal Address",
            post_code: "SW1A2AA"
            },
        name: "New Customer"
        }
    });
</script> --}}
    </div>

</body>

</html>

@endsection
