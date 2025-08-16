<?php
// session_start();
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
        }

        .main-content {
            margin-left: 60px;
            margin-bottom: 250px;
            margin-top: 20px;
        }

        .section-1 {
            display: flex;
            height: 40px;
            width: 400px;
            margin-top: 20px;
            background: linear-gradient(to bottom, #ff7e5f, #feb47b);
            font-size: 20px;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            color: black;
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

</body>
</html>
