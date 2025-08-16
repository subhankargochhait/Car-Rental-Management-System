<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in, otherwise redirect
if (!isset($_SESSION["un"]) || empty($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Custom Styles -->
<style>
    .navbar-custom {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(90deg, #4e73df, #224abe);
        padding: 0.6rem 1rem;
    }
    .navbar-custom .form-control {
        border-radius: 30px;
        font-size: 0.9rem;
        padding-left: 1rem;
    }
    .navbar-custom .btn-primary {
        border-radius: 30px;
        background-color: #f8f9fc;
        color: #4e73df;
        border: none;
        font-weight: 500;
    }
    .navbar-custom .btn-primary:hover {
        background-color: #e2e6ea;
    }
    .navbar-custom .nav-link {
        color: #fff !important;
        font-weight: 500;
    }
    .navbar-custom .dropdown-menu {
        font-size: 0.9rem;
        border-radius: 8px;
    }
    .img-profile {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border: 2px solid #fff;
    }
</style>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light navbar-custom shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link text-white d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3">
        <div class="input-group">
            <input type="text" class="form-control small" placeholder="Search for..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- User Info -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small">
                    <?php echo htmlspecialchars($_SESSION["un"], ENT_QUOTES, 'UTF-8'); ?>
                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
