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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">Hii, <?php echo htmlspecialchars($_SESSION["un"]); ?></h1>
                    
                     <!-- Hero Section Start -->
         <h1 style="margin-left: 60px;"></h1>
    
     <div class="menu main-content">
    <a href="add_cars.php" class="cars">
        <span class="icon">🚗</span>Add Car
    </a>
    <a href="list_cars.php" class="booking">
        <span class="icon">✅</span>List Cars
    </a>
    <a href="all_users.php" class="rentals">
        <span class="icon">📄</span>All User's
    </a>

    <a href="pay.php" class="booking">
        <span class="icon">✅</span>Payment Status Update
    </a>
</div>
    <!-- Hero Section End -->
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