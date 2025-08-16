<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");

$username = $_SESSION["un"];

// Get form data
$car_id       = $_POST['car_id'] ?? '';
$pickup_date  = $_POST['pickup_date'] ?? '';
$return_date  = $_POST['return_date'] ?? '';

// Validate basic fields
if (empty($car_id) || empty($pickup_date) || empty($return_date)) {
    echo "<script>alert('Invalid booking details. Please try again.'); window.history.back();</script>";
    exit;
}

// Fetch car details from database
$car_sql = "SELECT car_name, car_type, daily_rate, image, status FROM cars WHERE id = ?";
$stmt = $con->prepare($car_sql);
$stmt->bind_param("i", $car_id);
$stmt->execute();
$car_result = $stmt->get_result();

if ($car_result->num_rows === 0) {
    echo "<script>alert('Car not found.'); window.history.back();</script>";
    exit;
}

$car = $car_result->fetch_assoc();
$stmt->close();

// Calculate total amount
$days = (strtotime($return_date) - strtotime($pickup_date)) / 86400;
if ($days <= 0) {
    echo "<script>alert('Return date must be after pickup date.'); window.history.back();</script>";
    exit;
}
$total_amount = $days * $car['daily_rate'];

// Insert booking into bookings table
$sql = "INSERT INTO bookings (username, car_name, car_type, daily_rate, image, status, pickup_date, return_date, total_amount, booking_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = $con->prepare($sql);
$stmt->bind_param(
    "sssissssd",
    $username,
    $car['car_name'],
    $car['car_type'],
    $car['daily_rate'],
    $car['image'],
    $car['status'],
    $pickup_date,
    $return_date,
    $total_amount
);

if ($stmt->execute()) {
    header("Location: my_rental.php");
    exit;
} else {
    echo "<script>alert('Booking failed. Please try again.'); window.history.back();</script>";
}

$stmt->close();
mysqli_close($con);
?>
