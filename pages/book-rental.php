<?php
include("../config/db.php");
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .calendar-day {
            background-color: #10b981; /* green */
            color: white;
            padding: 10px;
            margin: 3px;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
        }
        .calendar-day:hover {
            background-color: #059669;
        }
    </style>
</head>

  <!-- nav-bar-start -->
<?php include('../includes/navbar-user.php') ?>
   
    <!-- nav-bar-end -->
<body class="bg-light">

<div class="container py-5">
    <h2 class="fw-bold mb-4">Book a Rental</h2>

    <!-- Booking Form -->
   <form action="booking-ins.php" method="post">
     <div class="card p-4 shadow-sm mb-4">
        <div class="mb-3">
            <label for="selectCar" class="form-label">Select Car</label>
            <select class="form-select" id="selectCar" name="cars" required>
                <option selected>Choose a car...</option>
                <option value="SUV">SUV</option>
                <option value="COMPACT">COMPACT</option>
                <option value="MID-SIZE">MID-SIZE</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pickupDate" class="form-label">Pickup Date</label>
                <input type="date" required name="pickup_date" class="form-control" id="pickupDate">
            </div>
            <div class="col-md-6">
                <label for="returnDate" class="form-label">Return Date</label>
                <input type="date" required name="return_date" class="form-control" id="returnDate">
            </div>
        </div>

        <button class="btn btn-success w-100" type="submit" name="submit" >Create Booking</button>
    </div>
   </form>

    

    </div>
</div>

<?php include('../includes/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
