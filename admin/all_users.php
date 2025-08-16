<?php
include("../config/db.php");

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
    <title>Admin-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background: #007bff;
            color: white;
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9ff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .btn-action {
            margin: 0 2px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .page-title {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .btn-action {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .main-container {
                margin: 1rem;
                padding: 1rem;
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

                    <div class="container-fluid">
                        <div class="main-container">
                            <h1 class="text-center page-title">User Data Management</h1>

                            <div class="table-container">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="userTable">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Driver's License</th>
                                                <th>Address</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT uid, full_name, email, phone, driver_license, address FROM signup";
                                            $result = $con->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <td>{$row['uid']}</td>
                                                    <td>{$row['full_name']}</td>
                                                    <td>{$row['email']}</td>
                                                    <td>{$row['phone']}</td>
                                                    <td>{$row['driver_license']}</td>
                                                    <td>{$row['address']}</td>
                                                    <td>
                                                        <a class='btn btn-info btn-sm btn-action' href='user_view.php?uid=" . urlencode($row['uid']) . "'>View</a>
                                                        <a class='btn btn-success btn-sm btn-action' href='edit_user.php?uid=" . urlencode($row['uid']) . "'>Edit</a>
                                                        <button class='btn btn-danger btn-sm btn-action' onclick=\"deleteUser('{$row['uid']}', '{$row['full_name']}')\">Delete</button>
                                                    </td>
                                                </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete</h5>
                                    <button type="button" class="btn-close btn-close-white" onclick="closeDeleteModal()"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?</p>
                                    <p><strong id="deleteUserName"></strong></p>

                                    <input type="hidden" id="deleteUserId">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                        <i class="bi bi-trash me-1"></i>Delete User
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main content end -->
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
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Delete Modal JS -->
    <script>
        var deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteModal'));

        function deleteUser(uid, name) {
            document.getElementById('deleteUserId').value = uid;
            document.getElementById('deleteUserName').textContent = name;
            deleteModalInstance.show();
        }

        function closeDeleteModal() {
            deleteModalInstance.hide();
        }

        function confirmDelete() {
            var uid = document.getElementById('deleteUserId').value;
            window.location.href = 'del_user.php?did=' + encodeURIComponent(uid);
        }
    </script>

</body>

</html>
