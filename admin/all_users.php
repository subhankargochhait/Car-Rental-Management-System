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
    <title>Admin Dashboard - User Management</title>
    
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
            font-family: 'Nunito', sans-serif;
        }
        .page-title {
            font-weight: 800;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0px 4px 25px rgba(0,0,0,0.08);
        }
        .table thead th {
            background: #4facfe;
            color: white;
            border: none;
            font-weight: bold;
        }
        .table tbody tr {
            transition: 0.3s;
        }
        .table tbody tr:hover {
            background-color: #f9fcff;
            transform: translateY(-2px);
        }
        .btn-action {
            margin: 0 2px;
            border-radius: 8px;
            transition: 0.2s ease;
        }
        .btn-action:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body id="page-top">

<div id="wrapper">
    <!-- Sidebar -->
    <?php include("admin_inc/sidebar.php") ?>
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Topbar -->
            <?php include("admin_inc/top.php") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="main-container">
                    <h1 class="page-title mb-4">👥 User Data Management</h1>

                    <div class="card card-custom p-3">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover mb-0" id="userTable">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>License</th>
                                        <th>Address</th>
                                        <th class="text-center">Actions</th>
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
                                            <td class='text-center'>
                                                <a class='btn btn-info btn-sm btn-action' href='user_view.php?uid=" . urlencode($row['uid']) . "'>
                                                    <i class='fas fa-eye'></i> View
                                                </a>
                                                <a class='btn btn-warning btn-sm btn-action' href='edit_user.php?uid=" . urlencode($row['uid']) . "'>
                                                    <i class='fas fa-edit'></i> Edit
                                                </a>
                                                <button class='btn btn-danger btn-sm btn-action' onclick=\"deleteUser('{$row['uid']}', '{$row['full_name']}')\">
                                                    <i class='fas fa-trash'></i> Delete
                                                </button>
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
            <!-- End Page Content -->
        </div>

        <!-- Footer -->
        <?php include("admin_inc/footer.php") ?>
        <!-- End of Footer -->
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p>Are you sure you want to delete this user?</p>
                <p class="fw-bold text-danger" id="deleteUserName"></p>
                <input type="hidden" id="deleteUserId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash me-1"></i> Delete User
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top -->
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<!-- Logout Modal -->
<?php include("admin_inc/logout_modal.php") ?>

<!-- Bootstrap JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<!-- Delete Modal Script -->
<script>
    var deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteModal'));
    function deleteUser(uid, name) {
        document.getElementById('deleteUserId').value = uid;
        document.getElementById('deleteUserName').textContent = name;
        deleteModalInstance.show();
    }
    function confirmDelete() {
        var uid = document.getElementById('deleteUserId').value;
        window.location.href = 'del_user.php?did=' + encodeURIComponent(uid);
    }
</script>

</body>
</html>
