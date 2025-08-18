<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard for Car Rental System">
    <meta name="author" content="Admin">

    <title>Admin Dashboard</title>

    <!-- Fonts and Icons -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* General Body */
        body {
            background: linear-gradient(135deg, #f8f9fa, #e2e8f0);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            overflow-x: hidden;
        }

        /* Page Title */
        h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 30px;
            animation: fadeInDown 1s ease-in-out;
            text-align: center;
        }

        /* Enhanced Menu Container */
        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
            padding: 20px;
            animation: fadeIn 1.2s ease forwards;
        }

        /* Enhanced Menu Items */
        .menu a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 35px 25px;
            border-radius: 24px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
        }

        .menu a:hover {
            transform: translateY(-15px) scale(1.03) rotateX(5deg);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
        }

        .menu a::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 120%;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transform: skewX(-25deg);
            transition: left 0.8s ease;
        }

        .menu a:hover::before {
            left: 120%;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: rgba(255, 255, 255, 0.8);
            transform: translateX(-50%);
            transition: width 0.6s ease;
        }

        .menu a:hover::after {
            width: 80%;
        }

        /* Enhanced Icons */
        .menu a .icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            z-index: 2;
        }

        .menu a:hover .icon {
            transform: scale(1.3) rotateY(360deg);
            color: #fff;
        }

        /* Gradients for Buttons */
        .cars {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
        }

        .booking {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        .rentals {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
        }

        .reports {
            background: linear-gradient(135deg, #11998e, #38ef7d);
        }

        .settings {
            background: linear-gradient(135deg, #ff9966, #ff5e62);
        }

        /* Enhanced Card Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.9);
                filter: blur(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
                filter: blur(3px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
                filter: blur(0);
            }
        }

        /* Staggered animations */

        .menu a:nth-child(1) { animation-delay: 0.1s; }
        .menu a:nth-child(2) { animation-delay: 0.2s; }
        .menu a:nth-child(3) { animation-delay: 0.3s; }
        .menu a:nth-child(4) { animation-delay: 0.4s; }
        .menu a:nth-child(5) { animation-delay: 0.5s; }
        .menu a:nth-child(6) { animation-delay: 0.6s; }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(30px) rotateX(-10deg) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) rotateX(0deg) scale(1);
            }
        }

        /* Responsive Main Content */
        .main-content {
            margin-left: 60px;
            margin-bottom: 250px;
            margin-top: 20px;
            padding: 0 15px;
        }

        /* Enhanced container */
        .container-fluid {
            padding: 40px 20px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            margin: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Hover Shadow Animation for Body */
        body:hover {
            transition: background 1.5s ease;
            background: linear-gradient(135deg, #e0f7fa, #ffe0b2);
        }

        /* Footer text */
        footer {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Click animation */
        .menu a:active {
            transform: translateY(-12px) scale(1.01);
            transition: transform 0.1s ease;
        }

        /* Pulse animation on load */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .menu a:hover {
            animation: none;
        }

        /* Mobile responsive improvements */
        @media (max-width: 768px) {
            .menu {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 10px;
            }
            
            .menu a {
                padding: 30px 20px;
            }
            
            .container-fluid {
                margin: 10px;
                padding: 30px 15px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("admin_inc/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("admin_inc/top.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?>!</h1>

                    <!-- Menu Cards -->
                    <div class="menu main-content">
                        <a href="add_cars.php" class="cars">
                            <span class="icon">🚗</span>
                            Add Car
                        </a>
                        <a href="list_cars.php" class="booking">
                            <span class="icon">✅</span>
                            List Cars
                        </a>
                        <a href="all_users.php" class="rentals">
                            <span class="icon">📄</span>
                            All Users
                        </a>
                       
                        <a href="rent_car_report.php" class="reports">
                            <span class="icon">📊</span>
                            Reports
                        </a>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("admin_inc/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("admin_inc/logout_modal.php") ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>