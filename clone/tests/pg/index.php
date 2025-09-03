<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="image/chip.png" alt="chip">
                <img src="image/visa.png" alt="visa">
            </div>
            <div class="card-number-box">#### #### #### ####</div>
            <div class="flexbox">
                <div class="box">
                    <span>card holder name</span>
                    <div class="card-holder-name">full name</div>
                </div>
                <div class="box">
                    <span>expires</span>
                    <div class="expiration">
                        <span class="exp-month">mm</span>
                        <span class="exp-year">yy</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="image/visa.png" alt="visa">
            </div>
        </div>
    </div>

    <form id="payment-form" method="post">
        <div class="flexbox">
            <div class="inputBox">
                <span>First name</span>
                <input type="text" class="card-holder-firstname">
            </div>
            <div class="inputBox">
                <span>Last name</span>
                <input type="text" class="card-holder-lastname">
            </div>
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>Email ID</span>
                <input type="text" class="card-holder-email">
            </div>
            <div class="inputBox">
                <span>Contact No</span>
                <input type="text" class="card-holder-phone">
            </div>
        </div>
        <div class="inputBox">
            <span>card number</span>
            <input type="text" maxlength="19" class="card-number-input">
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>expiration mm</span>
                <select name="" id="" class="month-input">
                    <option value="month" selected disabled>month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="inputBox">
                <span>expiration yy</span>
                <select name="" id="" class="year-input">
                    <option value="year" selected disabled>year</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                    <option value="2036">2036</option>
                    <option value="2037">2037</option>
                    <option value="2038">2038</option>
                    <option value="2039">2039</option>
                    <option value="2040">2040</option>
                    <option value="2041">2041</option>
                    <option value="2042">2042</option>
                    <option value="2043">2043</option>
                    <option value="2044">2044</option>
                    <option value="2045">2045</option>
                    <option value="2046">2046</option>
                    <option value="2047">2047</option>
                    <option value="2048">2048</option>
                    <option value="2049">2049</option>
                    <option value="2050">2050</option>
                </select>
            </div>
            <div class="inputBox">
                <span>cvv</span>
                <input type="text" maxlength="4" class="cvv-input">
            </div>
        </div>
        <input type="submit" value="submit" class="submit-btn">
    </form>

</div>    

<script>
    // Function to format card number
    const formatCardNumber = (number) => {
        return number.replace(/\D/g, '').replace(/(\d{4})(?=\d)/g, '$1 ');
    };

    // Update card details dynamically
    document.querySelector('.card-number-input').oninput = (e) => {
        const formattedNumber = formatCardNumber(e.target.value);
        e.target.value = formattedNumber;
        document.querySelector('.card-number-box').innerText = formattedNumber || '#### #### #### ####';
    };

    document.querySelector('.card-holder-firstname').oninput = (e) => {
        const firstName = e.target.value || 'Full Name';
        const lastName = document.querySelector('.card-holder-lastname').value || '';
        document.querySelector('.card-holder-name').innerText = `${firstName} ${lastName}`.trim();
    };

    document.querySelector('.card-holder-lastname').oninput = (e) => {
        const lastName = e.target.value || '';
        const firstName = document.querySelector('.card-holder-firstname').value || 'Full Name';
        document.querySelector('.card-holder-name').innerText = `${firstName} ${lastName}`.trim();
    };

    document.querySelector('.month-input').oninput = (e) => {
        document.querySelector('.exp-month').innerText = e.target.value || 'mm';
    };

    document.querySelector('.year-input').oninput = (e) => {
        document.querySelector('.exp-year').innerText = e.target.value || 'yy';
    };

    document.querySelector('.cvv-input').oninput = (e) => {
        document.querySelector('.cvv-box').innerText = e.target.value;
    };
    

    // Flip card to show CVV
    const cardFront = document.querySelector('.front');
    const cardBack = document.querySelector('.back');

    document.querySelector('.cvv-input').addEventListener('mouseenter', () => {
        cardFront.style.transform = 'perspective(1000px) rotateY(-180deg)';
        cardBack.style.transform = 'perspective(1000px) rotateY(0deg)';
    });

    document.querySelector('.cvv-input').addEventListener('mouseleave', () => {
        cardFront.style.transform = 'perspective(1000px) rotateY(0deg)';
        cardBack.style.transform = 'perspective(1000px) rotateY(180deg)';
    });

    // Handle form submission
    document.getElementById('payment-form').addEventListener('submit', function (e) {
        e.preventDefault();
    
        // Collect form data
        const cardDetails = {
            cardNumber: document.querySelector('.card-number-input').value.trim(),
            cardHolder: document.querySelector('.card-holder-firstname').value.trim() + ' ' + document.querySelector('.card-holder-lastname').value.trim(),
            expMonth: document.querySelector('.month-input').value,
            expYear: document.querySelector('.year-input').value,
            cvv: document.querySelector('.cvv-input').value,
            amount: 17.12, // Replace with dynamic amount
            currency: 'EUR', // Replace with dynamic currency
    
            // Additional details
            cardHolderFirstName: document.querySelector('.card-holder-firstname').value.trim(),
            cardHolderLastName: document.querySelector('.card-holder-lastname').value.trim(),
            email: document.querySelector('.card-holder-email').value.trim(),
            phone: '91 ' + document.querySelector('.card-holder-phone').value.trim()
        };
    
        // Send the data to the backend
        fetch('process-payment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(cardDetails)
        })
            .then(response => response.json())
            .then(data => {
                console.log('Payment response:', data);
                if (data.result && data.result.redirectUrl) {
                    window.location.href = data.result.redirectUrl; // Redirect to payment gateway
                } else {
                    alert('Payment failed. Please try again.');
                }
            })
            .catch(error => console.error('Error processing payment:', error));
    });

</script>


</body>
</html>
