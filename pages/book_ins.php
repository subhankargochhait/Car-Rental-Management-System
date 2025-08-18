<?php
session_start();
if (!isset($_SESSION["un"])) { 
    header("Location: login.php"); 
    exit; 
}

include("../config/db.php");

// include Razorpay SDK
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

// validate dates
if (!empty($pickup_date) && !empty($return_date)) {
    if (strtotime($return_date) < strtotime($pickup_date)) {
        die("❌ Error: Return date cannot be earlier than pickup date.");
    }
}

// fetch car image & type
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

// insert booking
$stmt = $con->prepare("INSERT INTO bookings 
    (username, car_name, car_type, daily_rate, pickup_date, return_date, total_amount, payment_method, status, image, razorpay_payment_id, booking_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param(
    "sssdssdssss",
    $username,
    $car_name,
    $car_type,
    $daily_rate,
    $pickup_date,
    $return_date,
    $total_amount,
    $payment_method,
    $status,
    $image,
    $razorpay_id
);

if ($stmt->execute()) {

    // ✅ Capture Razorpay payment if method is Razorpay
    if ($payment_method === "Razorpay" && !empty($razorpay_id)) {
        $api = new Api("rzp_test_R6gWimTKYuOdob", "Y8JxgzTXxVlqs9dLvfdvGvNd");

        try {
            $payment = $api->payment->fetch($razorpay_id);
            $payment->capture(['amount' => $payment['amount']]); // amount in paise
        } catch (Exception $e) {
            error_log("Razorpay capture failed: " . $e->getMessage());
        }
    }

    header("Location: my_rental.php");
    exit;

} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
