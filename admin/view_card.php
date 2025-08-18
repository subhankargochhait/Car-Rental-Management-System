<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #e0f2fe, #f1f5f9);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .car-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .car-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .car-card img {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
            transition: transform 0.4s ease;
        }

        .car-card img:hover {
            transform: scale(1.05);
        }

        .car-card h2 {
            font-size: 26px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .car-card p {
            font-size: 16px;
            color: #334155;
            margin: 8px 0;
        }

        .car-card strong {
            color: #1e3a8a;
        }

        .status-available {
            color: #16a34a;
            font-weight: 600;
        }

        .status-unavailable {
            color: #dc2626;
            font-weight: 600;
        }

        .btn-primary {
            display: inline-block;
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            color: #fff;
            padding: 12px 24px;
            margin-top: 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #1d4ed8, #1e40af);
            transform: translateY(-2px);
        }

        @media(max-width: 600px) {
            .car-card {
                padding: 20px;
            }
            .car-card h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="car-card">
            <img src="car_images/<?= htmlspecialchars($car['image']) ?>" alt="Car Image">
            <h2><?= htmlspecialchars($car['car_name']) ?></h2>
            <p><strong>Type:</strong> <?= htmlspecialchars($car['car_type']) ?></p>
            <p><strong>Daily Rate:</strong> ₹<?= htmlspecialchars($car['daily_rate']) ?>/day</p>
            <p><strong>Status:</strong> 
                <span class="<?= strtolower($car['status']) == 'available' ? 'status-available' : 'status-unavailable' ?>">
                    <?= htmlspecialchars($car['status']) ?>
                </span>
            </p>
            <a href="list_cars.php" class="btn-primary">⬅ Back to List</a>
        </div>
    </div>
</body>
</html>
