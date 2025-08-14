<?php
include("../config/db.php");
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['car_id'])) {
    $user_id = $_SESSION['uid'];
    $car_id  = intval($_POST['car_id']);

    // For simplicity: book for 1 day (today to tomorrow)
    $start_date = date('Y-m-d');
    $end_date   = date('Y-m-d', strtotime('+1 day'));

    // Get daily rate from cars table
    $stmt = $con->prepare("SELECT daily_rate FROM cars WHERE id = ?");
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $stmt->bind_result($daily_rate);
    $stmt->fetch();
    $stmt->close();

    $total_amount = $daily_rate; // 1 day booking

    // Insert into rentals
    $stmt = $con->prepare("INSERT INTO rentals (user_id, car_id, start_date, end_date, total_amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iSSSd", $user_id, $car_id, $start_date, $end_date, $total_amount);
    $stmt->execute();
    $stmt->close();

    // Optional: update car status to "Unavailable"
    $con->query("UPDATE cars SET status='Unavailable' WHERE id=$car_id");

    header("Location: my_rent.php");
    exit;
} else {
    echo "Invalid request.";
}
?>
