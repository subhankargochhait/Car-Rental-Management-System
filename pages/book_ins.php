<?php
session_start();
if (!isset($_SESSION["un"])) { 
    header("Location: login.php"); 
    exit; 
}

include("../config/db.php");

$username       = $_SESSION["un"];
$car_name       = $_POST['car_name'] ?? '';
$daily_rate     = isset($_POST['daily_rate']) ? (float)$_POST['daily_rate'] : 0;
$pickup_date    = $_POST['pickup_date'] ?? '';
$return_date    = $_POST['return_date'] ?? '';
$total_amount   = isset($_POST['total_amount']) ? (float)$_POST['total_amount'] : 0;
$payment_method = $_POST['payment_method'] ?? 'Cash on Delivery'; // default
$status         = 'Pending';

// 🔹 Validate dates before inserting
if (!empty($pickup_date) && !empty($return_date)) {
    if (strtotime($return_date) < strtotime($pickup_date)) {
        die("Error: Return date cannot be earlier than pickup date.");
    }
}

// 🔹 Fetch car image & type from cars table
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

// ✅ Insert booking with payment_method
$stmt = $con->prepare("INSERT INTO bookings 
    (username, car_name, car_type, daily_rate, pickup_date, return_date, total_amount, payment_method, status, image, booking_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param(
    "sssdssdsss",  // types
    $username,       // s
    $car_name,       // s
    $car_type,       // s
    $daily_rate,     // d
    $pickup_date,    // s
    $return_date,    // s
    $total_amount,   // d
    $payment_method, // s
    $status,         // s
    $image           // s
);

if ($stmt->execute()) {
    header("Location: my_rental.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
