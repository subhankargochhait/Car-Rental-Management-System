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
    <style>
        body {
            background-color: white;
            font-family: 'Lexend', sans-serif;
            margin: 0;
        }

        /* Dashboard Heading */
        .dashboard-header {
            text-align: center;
            padding: 30px 10px;
            animation: fadeDown 0.8s ease-in-out;
        }

        .dashboard-header h1 {
            font-size: 2.2rem;
            color: #222;
            font-weight: bold;
        }

        .dashboard-header span {
            color: #1572D3;
        }

        /* Dashboard Cards Grid */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 20px 40px;
            max-width: 1100px;
            margin: auto;
            animation: fadeUp 1s ease-in-out;
        }

        /* Card Style */
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            padding: 25px 20px;
            text-align: center;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        /* Hover Effects */
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        /* Icon style */
        .card .icon {
            font-size: 2.2rem;
            display: inline-block;
            margin-bottom: 12px;
            padding: 15px;
            border-radius: 50%;
            color: white;
            animation: pop 0.6s ease;
        }

        /* Gradient overlays for each card */
        .cars {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: white;
        }
        .booking {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }
        .rentals {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
        }

        /* Card content text */
        .card h3 {
            margin: 10px 0 5px;
            font-size: 1.3rem;
        }
        .card p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        /* Card hover glow */
        .card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255,255,255,0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease;
            opacity: 0;
        }
        .card:hover::after {
            top: -30%;
            left: -30%;
            opacity: 1;
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pop {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Mobile adjustments */
        @media screen and (max-width: 600px) {
            .dashboard-header h1 {
                font-size: 1.6rem;
            }
            .dashboard-cards {
                padding: 10px;
            }
        }

         /* Navbar */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            gap: 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #1572D3;
            padding: 5px 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        /* Hover animation for navbar links */
        .navbar ul li a:hover {
            background-color: #1572D3;
            color: white;
            transform: scale(1.05);
        }

        /* Logout Button */
        .btn-logout a {
            background-color: red;
            color: white;
            padding: 6px 14px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-logout a:hover {
            background-color: #b30000;
            transform: scale(1.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo img {
            height: 35px;
        }
        .dashboard-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    padding: 20px 40px;
    max-width: 1100px;
    margin: auto;
    animation: fadeUp 1s ease-in-out;

    /* Add this for spacing before footer */
    margin-bottom: 400px;
}

    </style>
</head>
<body>
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
                    <li><a href="../pages/my_rental.php" class="active">My Rental</a></li>
                    <li><a href="../pages/profile.php">Profile</a></li>
                    <p style="color: red;">Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?></p>
                </ul>
            </div>

            <div class="nav-log">
                <button class="btn-logout">
                    <a href="logout.php" class="active">Logout</a>
                </button>
            </div>
        </nav>
    </div>
    <!-- nav-bar-end -->

    <!-- Dashboard Content -->
    <div class="dashboard-header">
        <h1>Welcome to your <span>Dashboard</span></h1>
    </div>

    <div class="dashboard-cards">
        <a href="../pages/browse-car.php" class="card cars">
            <div class="icon">🚗</div>
            <h3>Browse Available Cars</h3>
            <p>View and select from a variety of cars for your next trip.</p>
        </a>
        <a href="../pages/book-rental.php" class="card booking">
            <div class="icon">✅</div>
            <h3>Make New Booking</h3>
            <p>Book your preferred car with just a few clicks.</p>
        </a>
        <a href="../pages/my_rental.php" class="card rentals">
            <div class="icon">📄</div>
            <h3>View My Rentals</h3>
            <p>Check your current and past rental history.</p>
        </a>
    </div>

    <!-- Footer -->
    <?php include('../includes/footer.php'); ?>

</body>
</html>
