<?php
session_start();
require("../vendor/autoload.php"); // Razorpay SDK
use Razorpay\Api\Api;

$api = new Api("rzp_test_R6gWimTKYuOdob", "Y8JxgzTXxVlqs9dLvfdvGvNd");

$amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
if ($amount <= 0) {
    echo json_encode(["error" => "Invalid amount"]);
    exit;
}

$order = $api->order->create([
    'receipt'         => 'order_rcpt_' . time(),
    'amount'          => $amount * 100, // paise
    'currency'        => 'INR',
    'payment_capture' => 1
]);

echo json_encode($order->toArray());
?>
