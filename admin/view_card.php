<?php
include("../config/db.php");

// Get the car ID from URL
$id = $_GET['car_id'] ?? '';

// Fetch car details
$sql = "SELECT * FROM cars WHERE car_id = '$id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $car = $result->fetch_assoc();
} else {
    die("Car not found!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Car</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .car-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .car-card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .car-card h2 { margin-bottom: 10px; }
        .car-card p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="car-card">
        <img src="car_images/<?= htmlspecialchars($car['image']) ?>" alt="Car Image">
        <h2><?= htmlspecialchars($car['car_name']) ?></h2>
        <p><strong>Type:</strong> <?= htmlspecialchars($car['car_type']) ?></p>
        <p><strong>Daily Rate:</strong> ₹<?= htmlspecialchars($car['daily_rate']) ?>/day</p>
        <p><strong>Status:</strong> <?= htmlspecialchars($car['status']) ?></p>
        <a href="list_cars.php" class="btn btn-primary">Back to List</a>
    </div>
</body>
</html>
