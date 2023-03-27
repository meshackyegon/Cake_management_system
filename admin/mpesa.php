<?php
// Replace with your MPESA short code and Lipa Na M-PESA Passkey
$shortCode = "your_short_code";
$passkey = "your_passkey";

// Replace with the phone number you want to send the request to
$phoneNumber = "254712345678";

// Replace with the amount you want to charge the customer
$amount = "100";

// Replace with a unique reference ID for this transaction
$referenceID = "your_reference_id";

// Generate the timestamp
$timestamp = date("YmdHis");

// Generate the password
$password = base64_encode($shortCode . $passkey . $timestamp);

// Build the request body
$requestBody = [
    "BusinessShortCode" => $shortCode,
    "Password" => $password,
    "Timestamp" => $timestamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => $amount,
    "PartyA" => $phoneNumber,
    "PartyB" => $shortCode,
    "PhoneNumber" => $phoneNumber,
    "CallBackURL" => "your_callback_url",
    "AccountReference" => $referenceID,
    "TransactionDesc" => "Payment for product XYZ"
];

// Convert the request body to JSON
$requestBodyJSON = json_encode($requestBody);

// Set the API endpoint
$apiUrl = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

// Initiate the curl request
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer your_access_token"
]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBodyJSON);

// Execute the curl request
$response = curl_exec($curl);

// Close the curl request
curl_close($curl);

// Decode the response
$responseData = json_decode($response);

// Check if the request was successful
if ($responseData->ResponseCode === "0") {
    // The request was successful
    // Handle the success response
} else {
    // The request failed
    // Handle the error response
}
