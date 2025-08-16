<?php
session_start();
if (!isset($_SESSION["un"])) { header("Location: login.php"); exit; }
include("../config/db.php");

$username = $_SESSION["un"];
$result = $con->query("SELECT * FROM bookings WHERE username='$username' ORDER BY booking_date DESC");

// Get car details from URL
$car_name   = $_GET['car_name'] ?? '';
$car_type   = $_GET['car_type'] ?? '';
$daily_rate = $_GET['daily_rate'] ?? '';
$image      = $_GET['image'] ?? '';
$status     = $_GET['status'] ?? 'Available'; // Default value
?>

<!DOCTYPE html>
<html>
<head>
<title>My Rentals</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body{font-family:Arial;background:#f3f4f6;margin:0;padding:0;}
.container{max-width:1000px;margin:40px auto;padding:0 15px;}
h2{text-align:center;margin-bottom:30px;color:#1e293b;}
.rental-card{display:flex;background:white;border-radius:12px;margin-bottom:20px;box-shadow:0 6px 20px rgba(0,0,0,0.1);overflow:hidden;}
.rental-card img{width:250px;height:150px;object-fit:cover;}
.rental-details{padding:20px;flex:1;display:flex;flex-direction:column;justify-content:space-between;}
.rental-details h3{margin:0 0 10px;color:#1e293b;}
.rental-details p{margin:5px 0;color:#334155;font-size:15px;}
.status{display:inline-block;padding:4px 12px;border-radius:20px;font-weight:bold;font-size:14px;margin-top:10px;}
.status.pending{background:#fef3c7;color:#92400e;}
.status.paid{background:#d1fae5;color:#065f46;}
.delete-btn{background:#ef4444;color:white;padding:8px 12px;border:none;border-radius:8px;cursor:pointer;font-size:14px;margin-top:10px;text-align:center;text-decoration:none;}
.delete-btn:hover{background:#dc2626;}
@media(max-width:768px){.rental-card{flex-direction:column;}.rental-card img{width:100%;height:200px;}}
</style>
</head>
<body>
<?php include('../includes/navbar-user.php'); ?>
<div class="container">
<h2>My Rentals</h2>

<?php if($result->num_rows>0): ?>
    <?php while($row=$result->fetch_assoc()): ?>
        <div class="rental-card">
           <img src="../admin/car_images/<?php echo htmlspecialchars($image); ?>" alt="Car Image" class="car-image">
            <div class="rental-details">
                <div>
                    <h3><?php echo htmlspecialchars($row['car_name']); ?> (<?php echo htmlspecialchars($row['car_type']); ?>)</h3>
                    <p><strong>Pickup Date:</strong> <?php echo htmlspecialchars($row['pickup_date']); ?></p>
                    <p><strong>Return Date:</strong> <?php echo htmlspecialchars($row['return_date']); ?></p>
                    <p><strong>Total Amount:</strong> ₹<?php echo htmlspecialchars($row['total_amount']); ?></p>
                </div>
                <div>
                    <span class="status <?php echo strtolower($row['status']); ?>">
                        <?php echo htmlspecialchars($row['status']); ?>
                    </span>
                    <a href="delete_booking.php?id=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p style="text-align:center;color:#334155;">No bookings yet.</p>
<?php endif; ?>
</div>
<?php include('../includes/footer.php'); ?>
</body>
</html>
