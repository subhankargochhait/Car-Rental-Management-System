<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");
$username = $_SESSION["un"];

$sql = "SELECT * FROM bookings WHERE username = ? ORDER BY booking_date DESC";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Rentals</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f1f5f9; 
            margin: 0;
            padding: 0;
        }
        .container { 
            max-width: 1000px; 
            margin: 50px auto; 
            padding: 20px; 
        }
        h2 { 
            text-align: center; 
            margin-bottom: 30px; 
            color: #1e40af; 
            font-size: 32px;
        }
        .card {
            background: #ffffff;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .card img {
            width: 200px;
            height: 120px;
            border-radius: 12px;
            object-fit: cover;
        }
        .details {
            flex: 1;
        }
        .details h3 {
            margin: 0 0 10px 0;
            color: #111827;
        }
        .details p {
            margin: 5px 0;
            color: #374151;
        }
        .details span {
            font-weight: bold;
            color: #1e3a8a;
        }
        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
        }
        .status.Pending { background: #f59e0b; }
        .status.Confirmed { background: #10b981; }
        .status.Cancelled { background: #ef4444; }
        .btn {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            background: #3b82f6;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background: #2563eb;
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .card img {
                width: 100%;
                max-width: 300px;
                height: 180px;
            }
            .details h3 { font-size: 22px; }
        }
    </style>
</head>
<body>

<?php include('../includes/navbar-user.php'); ?>

<div class="container">
    <h2>My Rentals</h2>

    <?php if($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['car_name']); ?>">
                <div class="details">
                    <h3><?php echo htmlspecialchars($row['car_name']); ?> <span>(<?php echo htmlspecialchars($row['car_type']); ?>)</span></h3>
                    <p><i class="fas fa-calendar-day"></i> Booking Date: <span><?php echo htmlspecialchars($row['booking_date']); ?></span></p>
                    <p><i class="fas fa-dollar-sign"></i> Daily Rate: <span>$<?php echo htmlspecialchars($row['daily_rate']); ?></span></p>
                    <p>Status: <span class="status <?php echo htmlspecialchars($row['status']); ?>"><?php echo htmlspecialchars($row['status']); ?></span></p>
                    <a href="booking-details.php?id=<?php echo $row['id']; ?>" class="btn">View Details</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align:center; font-size:18px; color:#6b7280;">You have no rentals yet.</p>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>

<?php
$stmt->close();
mysqli_close($con);
?>
