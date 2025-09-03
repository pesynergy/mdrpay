<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.payadmit.com/api/v1/payments',
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
            "amount" => $input['amount'],
            "currency" => $input['currency'],
            "customer" => [
                "firstName" => $input['cardHolderFirstName'],
                "lastName" => $input['cardHolderLastName'],
                "email" => $input['email'],
                "phone" => $input['phone']
            ],
            "card" => [
                "cardNumber" => $input['cardNumber'],
                "cardholderName" => $input['cardHolder'],
                "cardSecurityCode" => $input['cvv'],
                "expiryMonth" => $input['expMonth'],
                "expiryYear" => $input['expYear']
            ]
        ]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer OM0uZc6gJXABhSAvnprPdiRLGNpYkWvA',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
} else {
    echo json_encode(["error" => "Invalid request method."]);
}
