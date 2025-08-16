<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");

// Get form data safely
$username     = $_SESSION["un"];
$car_name     = $_POST['car_name'] ?? '';
$daily_rate   = isset($_POST['daily_rate']) ? (float)$_POST['daily_rate'] : 0;
$pickup_date  = $_POST['pickup_date'] ?? '';
$return_date  = $_POST['return_date'] ?? '';
$total_amount = isset($_POST['total_amount']) ? (float)$_POST['total_amount'] : 0;

// Validate required fields
if (empty($car_name) || empty($pickup_date) || empty($return_date)) {
    die("Please fill in all required fields.");
}

// Prepare SQL statement
$stmt = $con->prepare("INSERT INTO bookings (username, car_name, daily_rate, pickup_date, return_date, total_amount, booking_date) VALUES (?, ?, ?, ?, ?, ?, NOW())");

// Bind parameters
// s = string, d = double
$stmt->bind_param(
    "ssdssd",
    $username,     // s = string
    $car_name,     // s = string
    $daily_rate,   // d = double
    $pickup_date,  // s = string (DATE)
    $return_date,  // s = string (DATE)
    $total_amount  // d = double
);

// Execute statement
if ($stmt->execute()) {
    // Redirect to My Rentals page after successful booking
    header("Location: my_rental.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$con->close();
?>
