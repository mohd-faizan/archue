<?php

require('config.php');
require('./razorpay-php/Razorpay.php');
require_once("../php/db-connect.php");

session_start();
$_SESSION['lead_id'] = $_GET['id'];
$_SESSION['user_id'] = $_GET['user_id'];
$userId = $_SESSION['user_id'];
$leadId = $_SESSION['lead_id'];
if ($userId && $leadId) {
    // ...
    // if (isset($_SESSION['user_id'])) {
    //     $userId = $_SESSION['user_id'];
    // }
    // if (isset($_COOKIE['user_id'])) {
    //     $userId = $_COOKIE['user_id'];
    // }
    // $leadId = $_SESSION['lead_id'];
    $conn = Conn::connect();
    $sql = "SELECT name,email,mobileno FROM users WHERE user_id='$userId'";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $userRow = $result->fetch_assoc();
            $_SESSION['email'] = $userRow['email'];
            $sql1 = "SELECT * FROM leads WHERE lead_id='$leadId'";
            $result1 = $conn->query($sql1);
            $leadRow = $result1->fetch_assoc();
        } else {
            echo '<h1>Somethinf wen wrong. Please try again<a href="/leads">Login</a><h1>';
            return;
        }
    }
} else {
    echo '<h1>Please <a href="/leads">Try again</a></h1>';
    return;
}
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $leadRow['cost'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}
$_SESSION['email'] = $userRow['email'];
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $userRow['name'],
    "description"       => $leadRow['description'],
    "image"             => "../../image/logo.png",
    "prefill"           => [
    "name"              => "Daft Punk",
    "email"             => $userRow['email'],
    "contact"           => $userRow['mobileno'],
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#fa8a11"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("./checkout/{$checkout}.php");