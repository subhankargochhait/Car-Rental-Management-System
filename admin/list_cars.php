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
     .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #4a5568;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background-color: #f7fafc;
        }
        .status {
            padding: 4px 12px;
            border-radius: 20px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
        .status-available { background-color: #48bb78; }
        .status-rented { background-color: #ed8936; }
        .status-maintenance { background-color: #f56565; }
        .car-type {
            background-color: #e2e8f0;
            color: #4a5568;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }
        .btn-view { background-color: #3182ce; color: white; }
        .btn-edit { background-color: #38a169; color: white; }
        .btn-delete { background-color: #e53e3e; color: white; }
        .btn:hover { opacity: 0.8; }
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
                    <div class="container">
        <h1>Car Rental Fleet</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>
                    <th>Car Type</th>
                    <th>Daily Rate</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Tesla Model S</td>
                    <td><span class="car-type">Luxury</span></td>
                    <td>$89/day</td>
                    <td><span class="status status-available">Available</span></td>
                    <td>🚗</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>BMW X5</td>
                    <td><span class="car-type">SUV</span></td>
                    <td>$75/day</td>
                    <td><span class="status status-rented">Rented</span></td>
                    <td>🚙</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Honda Civic</td>
                    <td><span class="car-type">Economy</span></td>
                    <td>$35/day</td>
                    <td><span class="status status-available">Available</span></td>
                    <td>🚘</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Mercedes C-Class</td>
                    <td><span class="car-type">Luxury</span></td>
                    <td>$95/day</td>
                    <td><span class="status status-maintenance">Maintenance</span></td>
                    <td>🚗</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>Ford Mustang</td>
                    <td><span class="car-type">Sports</span></td>
                    <td>$120/day</td>
                    <td><span class="status status-available">Available</span></td>
                    <td>🏎️</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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