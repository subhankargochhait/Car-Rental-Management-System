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
                <option value="Toyota Corolla">Toyota Corolla</option>
                <option value="Honda Civic">Honda Civic</option>
                <option value="Ford Focus">Ford Focus</option>
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

    <!-- Availability Calendar -->
    <h4 class="fw-semibold">Availability Calendar</h4>
    <div class="card p-4 shadow-sm">
        <h5 class="text-center mb-4">August 2025</h5>
        <div class="row text-center fw-bold mb-2">
            <div class="col">Sun</div>
            <div class="col">Mon</div>
            <div class="col">Tue</div>
            <div class="col">Wed</div>
            <div class="col">Thu</div>
            <div class="col">Fri</div>
            <div class="col">Sat</div>
        </div>

        <!-- Calendar Dates -->
        <div class="row text-center">
            <div class="col"></div> <!-- Empty for start offset -->
            <div class="col calendar-day">1</div>
            <div class="col calendar-day">2</div>
            <div class="col calendar-day">3</div>
            <div class="col calendar-day">4</div>
            <div class="col calendar-day">5</div>
            <div class="col calendar-day">6</div>
        </div>
        <div class="row text-center">
            <div class="col calendar-day">7</div>
            <div class="col calendar-day">8</div>
            <div class="col calendar-day">9</div>
            <div class="col calendar-day">10</div>
            <div class="col calendar-day">11</div>
            <div class="col calendar-day">12</div>
            <div class="col calendar-day">13</div>
        </div>
        <div class="row text-center">
            <div class="col calendar-day">14</div>
            <div class="col calendar-day">15</div>
            <div class="col calendar-day">16</div>
            <div class="col calendar-day">17</div>
            <div class="col calendar-day">18</div>
            <div class="col calendar-day">19</div>
            <div class="col calendar-day">20</div>
        </div>
        <div class="row text-center">
            <div class="col calendar-day">21</div>
            <div class="col calendar-day">22</div>
            <div class="col calendar-day">23</div>
            <div class="col calendar-day">24</div>
            <div class="col calendar-day">25</div>
            <div class="col calendar-day">26</div>
            <div class="col calendar-day">27</div>
        </div>
        <div class="row text-center">
            <div class="col calendar-day">28</div>
            <div class="col calendar-day">29</div>
            <div class="col calendar-day">30</div>
            <div class="col calendar-day">31</div>
        </div>
        <!-- Add more weeks here -->
    </div>
</div>

<?php include('../includes/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
