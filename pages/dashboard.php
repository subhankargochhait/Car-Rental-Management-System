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
             font-family: 'Poppins', sans-serif;
             font-size: 13px;
        }
    h1 {
        font-size: 2rem;
        margin-bottom: 30px;
        font-weight: bold;
        color: #222;
    }
    .menu {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 350px;
    }
    .menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 20px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 500;
        text-decoration: none;
        color: white;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    .menu a:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.25);
    }
    /* Different button colors */
    .cars {
        background: linear-gradient(90deg, #ff7e5f, #feb47b);
    }
    .booking {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
    }
    .rentals {
        background: linear-gradient(90deg, #ff416c, #ff4b2b);
    }
    /* Icon style */
    .icon {
        font-size: 1.3rem;
        background: rgba(255,255,255,0.15);
        padding: 8px;
        border-radius: 50%;
    }
        .main-content{
            margin-left: 60px;
            margin-bottom: 250px;
            margin-top: 20px;
        }
        .section-1{
            display: flex;
            height: 40px;
            width: 400px;
            margin-top: 20px;
            background-color: rgb(12, 128, 217);
            background: linear-gradient(to bottom, #ff7e5f, #feb47b);
            font-family: Arial, sans-serif;
            font-size: 20px;
            justify-content: center;
            align-items: center;
            align-content: center;
            border-radius: 20px;
            text-decoration: none;
            color: black;

        }
    .btn-logout,a{
    padding: 5px 10px;
    border-radius: 5px;
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
            <li><a href="dashboard.php" class="active">My Dashboard</a></li>
            <li><a href="../pages/browse-car.php" class="active">Browse Cars</a></li>
            <li><a href="../pages/book-rental.php" class="active">Book Rental</a></li>
            <li><a href="../pages/my_rental.php" class="active">My Rental</a></li>
             <li><a href="../pages/profile.php">Profile</a></li>
             <p style="color: red;">Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?></p>
        </ul>
       </div>

       <div class="nav-log">
        
            <button class="btn-logout"><a href="logout.php" class="active" style="background-color: red; color: white;">Logout</a></button>

        </div>

    </nav>
    <!-- nav-bar-end -->

    <!-- Hero Section Start -->
         <h1 style="margin-left: 60px;">Welcome to your Dashboard,</h1>
    
     <div class="menu main-content">
    <a href="../pages/browse-car.php" class="cars">
        <span class="icon">🚗</span> Browser Available Cars
    </a>
    <a href="../pages/book-rental.php" class="booking">
        <span class="icon">✅</span> Make New Booking
    </a>
    <a href="#" class="rentals">
        <span class="icon">📄</span> View My Rentals
    </a>
</div>
    <!-- Hero Section End -->

          <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>
</body>
</html>
