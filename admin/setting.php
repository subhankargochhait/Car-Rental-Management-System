<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION["un"];

    if (!empty($_POST['password'])) {
        $newpass = $_POST['password'];
        $hashed = password_hash($newpass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE admins SET password=? WHERE username=?");
        $stmt->bind_param("ss", $hashed, $username);
        $stmt->execute();
        $msg = "✅ Password updated successfully!";
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $stmt = $con->prepare("UPDATE admins SET email=? WHERE username=?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $msg = "✅ Email updated successfully!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Settings</title>

  <!-- SB Admin 2 CSS -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .settings-card {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-top: 20px;
    }
    .profile-pic {
      width: 100px; 
      height: 100px; 
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #4e73df;
    }
    .btn-custom {
      border-radius: 25px;
      padding: 8px 20px;
    }
  </style>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("admin_inc/sidebar.php"); ?>
    <!-- End Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include("admin_inc/top.php"); ?>
        <!-- End Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


          <div class="settings-card">
            <div class="text-center mb-4">
              <img src="uploads/<?php echo $_SESSION['profile_image'] ?? 'default.png'; ?>" 
                   class="profile-pic" alt="Profile">
              <h4 class="mt-2"><?= $_SESSION["un"] ?></h4>
              <p class="text-muted">Manage your admin account settings</p>
            </div>

            <?php if (!empty($msg)): ?>
              <div class="alert alert-success text-center"><?= $msg ?></div>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-3">
                <ul class="nav flex-column nav-pills" id="settings-tabs">
                  <li><a class="nav-link active" data-bs-toggle="pill" href="#profile"><i class="bi bi-person"></i> Profile</a></li>
                  <li><a class="nav-link" data-bs-toggle="pill" href="#security"><i class="bi bi-shield-lock"></i> Security</a></li>
                  <li><a class="nav-link" data-bs-toggle="pill" href="#preferences"><i class="bi bi-gear"></i> Preferences</a></li>
                </ul>
              </div>

              <div class="col-md-9">
                <div class="tab-content">
                  
                  <!-- Profile -->
                  <div class="tab-pane fade show active" id="profile">
                    <h5 class="mb-3">Update Profile</h5>
                    <form method="post">
                      <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter new email">
                      </div>
                      <button type="submit" class="btn btn-primary btn-custom">Save Changes</button>
                    </form>
                  </div>

                  <!-- Security -->
                  <div class="tab-pane fade" id="security">
                    <h5 class="mb-3">Change Password</h5>
                    <form method="post">
                      <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-danger btn-custom">Update Password</button>
                    </form>
                  </div>

                  <!-- Preferences -->
                  <div class="tab-pane fade" id="preferences">
                    <h5 class="mb-3">Preferences</h5>
                    <p class="text-muted">⚙️ Dark Mode / Notifications coming soon.</p>
                    <button class="btn btn-outline-dark btn-custom"><i class="bi bi-moon"></i> Toggle Dark Mode</button>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End Main Content -->

      <!-- Footer -->
      <?php include("admin_inc/footer.php"); ?>
      <!-- End Footer -->

    </div>
    <!-- End Content Wrapper -->

  </div>
  <!-- End Page Wrapper -->

  <!-- Logout Modal -->
  <?php include("admin_inc/logout_modal.php"); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
