<?php

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
  CURLOPT_POSTFIELDS =>'{
  "paymentType": "DEPOSIT",
  "paymentMethod": "BASIC_CARD",
  "amount": 17.12,
  "currency": "EUR",
  "card": {
    "cardNumber": "4000 0000 0000 0002",
    "cardholderName": "Harry Potter",
    "cardSecurityCode": "130",
    "expiryMonth": "07",
    "expiryYear": "2028"
  }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: bearer OM0uZc6gJXABhSAvnprPdiRLGNpYkWvA'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
