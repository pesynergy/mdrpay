<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- Custom CSS File -->
    <link rel="stylesheet" href="{{ asset('new_assests/css/pstyle.css') }}">
</head>
<body>
    <div class="container">
        <h1>Complete Your Payment</h1>
        <p>Order ID: <strong>{{ $order_id }}</strong></p>
        <p>Amount: <strong>${{ $amount }}</strong></p>

        <div class="card-container">
            <div class="front">
                <div class="image">
                    <img src="{{ asset('new_assests/images/chip.png') }}" alt="Chip">
                    <img src="{{ asset('new_assests/images/visa.png') }}" alt="Visa">
                </div>
                <div class="card-number-box">################</div>
                <div class="flexbox">
                    <div class="box">
                        <span>Card Holder</span>
                        <div class="card-holder-name">Full Name</div>
                    </div>
                    <div class="box">
                        <span>Expires</span>
                        <div class="expiration">
                            <span class="exp-month">MM</span>
                            <span class="exp-year">YY</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="back">
                <div class="stripe"></div>
                <div class="box">
                    <span>CVV</span>
                    <div class="cvv-box"></div>
                    <img src="{{ asset('new_assests/images/visa.png') }}" alt="Visa">
                </div>
            </div>
        </div>

        <form action="{{ route('processPayment') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order_id }}">
            <input type="hidden" name="amount" value="{{ $amount }}">

            <div class="inputBox">
                <span>Card Number</span>
                <input type="text" name="card_number" maxlength="16" class="card-number-input" required>
            </div>
            <div class="inputBox">
                <span>Card Holder</span>
                <input type="text" name="card_holder" class="card-holder-input" required>
            </div>
            <div class="flexbox">
                <div class="inputBox">
                    <span>Expiration MM</span>
                    <select name="exp_month" class="month-input" required>
                        <option value="" disabled selected>Month</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="inputBox">
                    <span>Expiration YY</span>
                    <select name="exp_year" class="year-input" required>
                        <option value="" disabled selected>Year</option>
                        @for ($i = date('Y'); $i <= date('Y') + 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="inputBox">
                    <span>CVV</span>
                    <input type="text" name="cvv" maxlength="4" class="cvv-input" required>
                </div>
            </div>
            <input type="submit" value="Submit Payment" class="submit-btn">
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.querySelector('.card-number-input').oninput = () => {
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        };

        document.querySelector('.card-holder-input').oninput = () => {
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        };

        document.querySelector('.month-input').oninput = () => {
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        };

        document.querySelector('.year-input').oninput = () => {
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        };

        document.querySelector('.cvv-input').onmouseenter = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        };

        document.querySelector('.cvv-input').onmouseleave = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        };

        document.querySelector('.cvv-input').oninput = () => {
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        };
    </script>
</body>
</html>
