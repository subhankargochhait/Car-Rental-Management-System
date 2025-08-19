<?php
session_start();
if (!isset($_SESSION["un"])) { 
    header("Location: login.php"); 
    exit; 
}

include("../config/db.php");
require("../vendor/autoload.php");
use Razorpay\Api\Api;

$username       = $_SESSION["un"];
$car_name       = $_POST['car_name'] ?? '';
$daily_rate     = isset($_POST['daily_rate']) ? (float)$_POST['daily_rate'] : 0;
$pickup_date    = $_POST['pickup_date'] ?? '';
$return_date    = $_POST['return_date'] ?? '';
$total_amount   = isset($_POST['total_amount']) ? (float)$_POST['total_amount'] : 0;
$payment_method = $_POST['payment_method'] ?? 'Cash on Delivery';
$status         = $_POST['payment_status'] ?? 'Pending';
$razorpay_id    = $_POST['razorpay_payment_id'] ?? null;
$order_id       = $_POST['razorpay_order_id'] ?? null;
$signature      = $_POST['razorpay_signature'] ?? null;

// Validate dates
if (!empty($pickup_date) && !empty($return_date)) {
    if (strtotime($return_date) < strtotime($pickup_date)) {
        die("❌ Error: Return date cannot be earlier than pickup date.");
    }
}

// Fetch car image & type
$image = '';
$car_type = '';
$carQuery = $con->prepare("SELECT image, car_type FROM cars WHERE car_name=? LIMIT 1");
$carQuery->bind_param("s", $car_name);
$carQuery->execute();
$carResult = $carQuery->get_result();
if ($carRow = $carResult->fetch_assoc()) {
    $image = $carRow['image'];
    $car_type = $carRow['car_type'];
}
$carQuery->close();

// Verify Razorpay signature if payment is online
if ($payment_method === "Razorpay" && $razorpay_id && $order_id && $signature) {
    $api = new Api("rzp_test_R6gWimTKYuOdob", "Y8JxgzTXxVlqs9dLvfdvGvNd");
    try {
        $api->utility->verifyPaymentSignature([
            'razorpay_order_id' => $order_id,
            'razorpay_payment_id' => $razorpay_id,
            'razorpay_signature' => $signature
        ]);
        $status = "Success"; // verified
    } catch (Exception $e) {
        die("❌ Payment verification failed: " . $e->getMessage());
    }
}

// Insert booking
$stmt = $con->prepare("INSERT INTO bookings 
    (username, car_name, car_type, daily_rate, pickup_date, return_date, total_amount, payment_method, status, image, razorpay_payment_id, booking_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param(
    "sssdssdssss",
    $username, $car_name, $car_type, $daily_rate,
    $pickup_date, $return_date, $total_amount,
    $payment_method, $status, $image, $razorpay_id
);

if ($stmt->execute()) {
    header("Location: my_rental.php");
    exit;
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
