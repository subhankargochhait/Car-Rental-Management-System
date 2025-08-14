<?php
include("../config/db.php");
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['car_id'])) {
    $carId = intval($_GET['car_id']);
    $sql = "SELECT * FROM cars WHERE id = $carId";
    $result = $con->query($sql);
    $car = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rentals - Car Rental</title>
    <link rel="stylesheet" href="../assets/css/my_rental.css">
<body>

      <!-- nav-bar-start -->
<?php include('../includes/navbar-user.php') ?>
   
    <!-- nav-bar-end -->
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>My Rentals</h1>
            <button class="btn btn-primary" onclick="newBooking()">New Booking</button>
        </div>

        <!-- Current Rental -->
        <div class="section-title">Current Rental</div>
        <div class="rental-card">
            <div class="rental-header">
                <div class="rental-info">
                    <h3>Toyota Camry 2023</h3>
                    <p>License Plate: ABC-123</p>
                </div>
                <span class="status status-active">Active</span>
            </div>
            
            <div class="rental-details">
                <div class="detail-item">
                    <p>Pickup Date</p>
                    <p>Dec 15, 2024</p>
                </div>
                <div class="detail-item">
                    <p>Return Date</p>
                    <p>Dec 20, 2024</p>
                </div>
                <div class="detail-item">
                    <p>Total Cost</p>
                    <p class="price">$450.00</p>
                </div>
            </div>
            
            <div class="btn-group">
                <button class="btn btn-primary" onclick="viewDetails()">View Details</button>
                <button class="btn btn-outline" onclick="extendRental()">Extend Rental</button>
                <button class="btn btn-danger" onclick="cancelRental()">Cancel</button>
            </div>
        </div>

       
        <!-- Load More -->
        <div class="load-more">
            <button class="btn btn-outline" onclick="loadMore()">Load More</button>
        </div>
    </div>
          <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>
</body>
</html>
