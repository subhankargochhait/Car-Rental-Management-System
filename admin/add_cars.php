<?php
// Make sure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

    <title>Add_Cars</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
         body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f7f8;
        }
        form {
            background: #fff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background: #f9f9f9;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #007bff;
            background: #fff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
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
                    <h1 class="h3 mb-4 text-gray-800">Add Cars</h1>
                    <form action="add_car_ins.php" method="post" enctype="multipart/form-data">
        <h2>Add New Car</h2>

        <label for="car_name">Car Name</label>
        <input type="text" name="car_name" id="car_name" placeholder="Enter car name" required>

        <label for="car_type">Car Type</label>
        <select name="car_type" id="car_type" required>
            <option value="">-- Select Car Type --</option>
            <option value="SUV">SUV</option>
            <option value="Compact">Compact</option>
            <option value="Mid-size">Mid-size</option>
        </select>

        <label for="daily_rate">Daily Rate</label>
        <input type="text" name="daily_rate" id="daily_rate" placeholder="Enter daily rate" required>

         <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="">-- Select Status --</option>
            <option value="Available">Available</option>
            <option value="Unavailable">Unavailable</option>
        </select>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>

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