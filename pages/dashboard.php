<?php
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
    <title>Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">
<!-- <link rel="stylesheet" href="../assets/css/admin.css"> -->
</head>
<body>
    <style>
        body{
            background-color: white;
        }
    </style>
  <!-- nav-bar-start -->
    <div class="contaner">
        <nav class="navbar">
       <div class="logo">
  <img src="../assets/images/Frame.png" alt="Logo" />
  <h3 style="color: #1572D3;">RENTCARS</h3>
</div>
       <div>
         <ul>
            <li><a href="../index.php" class="active">My Dashboard</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="active">Browse Cars</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="active">Book Rental</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="active">My Rental</a></li>
             <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="active">Profile</a></li>
        </ul>
       </div>

       <div class="nav-log">
        <p>Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?></p>
            <button id="signup-button"><a href="logout.php" class="active" style="color: white;">Logout</a></button>

        </div>

    </nav>
    <!-- nav-bar-end -->
    <h1>
        Welcome to my CAR RENTAL MANAGEMENT SYSTEM PROJECT <br>
        YOUR NAME :: <?php echo htmlspecialchars($_SESSION["un"]); ?>
    </h1>
</body>
</html>
