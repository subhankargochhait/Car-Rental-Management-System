<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate required fields
    $requiredFields = ['car_name', 'car_type', 'daily_rate', 'image', 'pickup_date', 'return_date'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            die("Error: Missing required field - " . htmlspecialchars($field));
        }
    }

    // Sanitize inputs
    $car_name     = trim($_POST['car_name']);
    $car_type     = trim($_POST['car_type']);
    $daily_rate   = floatval($_POST['daily_rate']);
    $image        = trim($_POST['image']);
    $pickup_date  = $_POST['pickup_date'];
    $return_date  = $_POST['return_date'];

    // Date validation
    $pickup_ts = strtotime($pickup_date);
    $return_ts = strtotime($return_date);

    if (!$pickup_ts || !$return_ts || $return_ts <= $pickup_ts) {
        die("Error: Invalid date range.");
    }

    // Calculate total amount
    $days = ceil(($return_ts - $pickup_ts) / (60 * 60 * 24));
    $total_amount = $days * $daily_rate;

    // Insert into bookings table
    $stmt = $con->prepare("
        INSERT INTO bookings 
        (car_name, car_type, daily_rate, image, pickup_date, return_date, total_amount, username) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("Database Error: " . $con->error);
    }

    $stmt->bind_param("ssdsssds", 
        $car_name, 
        $car_type, 
        $daily_rate, 
        $image, 
        $pickup_date, 
        $return_date, 
        $total_amount, 
        $_SESSION['un']
    );

    if ($stmt->execute()) {
        header("Location: my_bookings.php?success=1");
        exit;
    } else {
        die("Booking failed: " . $stmt->error);
    }

    $stmt->close();
} else {
    header("Location: services.php");
    exit;
}
?>
