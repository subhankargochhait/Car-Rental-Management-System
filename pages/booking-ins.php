<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");

$username     = $_SESSION["un"];
$car_name     = $_POST['car_name'] ?? '';
$car_type     = $_POST['car_type'] ?? '';
$daily_rate   = $_POST['daily_rate'] ?? 0;
$image        = $_POST['image'] ?? '';
$pickup_date  = $_POST['pickup_date'] ?? '';
$return_date  = $_POST['return_date'] ?? '';
$total_amount = $_POST['total_amount'] ?? 0;
$payment_status = 'Pending'; // default

$stmt = $con->prepare("INSERT INTO bookings (username, car_name, car_type, daily_rate, image, pickup_date, return_date, total_amount, payment_status, booking_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("sssdssssss", $username, $car_name, $car_type, $daily_rate, $image, $pickup_date, $return_date, $total_amount, $payment_status);

if ($stmt->execute()) {
    header("Location: my_rental.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
