<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

// Fetch all bookings
$sql = "SELECT * FROM bookings ORDER BY booking_date DESC";
$result = $con->query($sql);

// Count total bookings
$total_bookings = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rented Cars</title>
    
    <!-- SB Admin 2 CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px);
            }
            to { 
                opacity: 1; 
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.6s ease-out;
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateX(-30px);
            }
            to { 
                opacity: 1; 
                transform: translateX(0);
            }
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .table-row-hover {
            transition: all 0.2s ease;
        }
        
        .table-row-hover:hover {
            background: linear-gradient(90deg, rgba(79, 70, 229, 0.05) 0%, rgba(147, 51, 234, 0.05) 100%);
            transform: scale(1.002);
        }

        .status-badge {
            position: relative;
            overflow: hidden;
        }
        
        .status-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .status-badge:hover::before {
            left: 100%;
        }

        .header-gradient {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .table-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        @media (max-width: 768px) {
            .responsive-text {
                font-size: 1.5rem;
            }
            .responsive-padding {
                padding: 1rem;
            }
        }
    </style>
</head>
<body id="page-top" class="bg-gray-50">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("admin_inc/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("admin_inc/top.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid py-6 responsive-padding">

                    <!-- Header Section -->
                    <div class="slide-in mb-8">
                        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                            <div>
                                <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 responsive-text">
                                    <i class="fas fa-car text-indigo-600 mr-3"></i>Rented Cars
                                </h1>
                                <p class="text-gray-600 mt-2 text-lg">Manage and monitor all car rental bookings</p>
                            </div>
                            
                            <!-- Stats Card -->
                            <div class="stat-card card-hover px-6 py-4 rounded-2xl shadow-lg border-0">
                                <div class="flex items-center">
                                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-3 rounded-xl mr-4">
                                        <i class="fas fa-chart-bar text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600 text-sm font-medium">Total Bookings</p>
                                        <p class="text-2xl font-bold text-gray-800"><?= $total_bookings ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Row -->
                    <div class="fade-in grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Active Bookings -->
                        <div class="stat-card card-hover p-6 rounded-2xl shadow-lg border-0">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-3 rounded-xl mr-4">
                                    <i class="fas fa-check-circle text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Active Rentals</h3>
                                    <p class="text-2xl font-bold text-green-600">
                                        <?php
                                        $active_sql = "SELECT COUNT(*) as count FROM bookings WHERE status = 'Active' OR status = 'Ongoing'";
                                        $active_result = $con->query($active_sql);
                                        $active_count = $active_result->fetch_assoc()['count'] ?? 0;
                                        echo $active_count;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Bookings -->
                        <div class="stat-card card-hover p-6 rounded-2xl shadow-lg border-0">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-3 rounded-xl mr-4">
                                    <i class="fas fa-clock text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Pending</h3>
                                    <p class="text-2xl font-bold text-yellow-600">
                                        <?php
                                        $pending_sql = "SELECT COUNT(*) as count FROM bookings WHERE status = 'Pending' OR status IS NULL";
                                        $pending_result = $con->query($pending_sql);
                                        $pending_count = $pending_result->fetch_assoc()['count'] ?? 0;
                                        echo $pending_count;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue This Month -->
                        <div class="stat-card card-hover p-6 rounded-2xl shadow-lg border-0">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-3 rounded-xl mr-4">
                                    <i class="fas fa-rupee-sign text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">This Month</h3>
                                    <p class="text-2xl font-bold text-blue-600">
                                        ₹<?php
                                        $revenue_sql = "SELECT SUM(total_amount) as revenue FROM bookings WHERE MONTH(booking_date) = MONTH(CURDATE()) AND YEAR(booking_date) = YEAR(CURDATE())";
                                        $revenue_result = $con->query($revenue_sql);
                                        $revenue = $revenue_result->fetch_assoc()['revenue'] ?? 0;
                                        echo number_format($revenue, 0);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Table -->
                    <div class="fade-in bg-white shadow-2xl rounded-3xl border-0 overflow-hidden">
                        <!-- Table Header -->
                        <div class="header-gradient px-8 py-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-white flex items-center">
                                    <i class="fas fa-list-alt mr-3"></i>
                                    Booking Records
                                </h2>
                                <div class="flex items-center space-x-4">
                                    <div class="glass-effect px-4 py-2 rounded-full">
                                        <span class="text-white text-sm font-medium">
                                            <i class="fas fa-database mr-2"></i>
                                            <?= $total_bookings ?> Records
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table Content -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="table-header">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-hashtag mr-2"></i>ID
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-user mr-2"></i>Customer
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-car mr-2"></i>Vehicle
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-tags mr-2"></i>Type
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-calendar-day mr-2"></i>Rate
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-play mr-2"></i>Pickup
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-stop mr-2"></i>Return
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-money-bill-wave mr-2"></i>Amount
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-credit-card mr-2"></i>Payment
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-info-circle mr-2"></i>Status
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            <i class="fas fa-clock mr-2"></i>Booked
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    <?php if ($total_bookings > 0): ?>
                                        <?php while($row = $result->fetch_assoc()): ?>
                                            <?php
                                                $status = $row['status'] ?? 'Pending'; 
                                                $badge_class = "status-badge bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg";
                                                $icon = "fas fa-clock";
                                                
                                                if(strtolower($status) == 'completed') {
                                                    $badge_class = "status-badge bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg";
                                                    $icon = "fas fa-check-circle";
                                                }
                                                if(strtolower($status) == 'cancelled') {
                                                    $badge_class = "status-badge bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg";
                                                    $icon = "fas fa-times-circle";
                                                }
                                                if(strtolower($status) == 'active' || strtolower($status) == 'ongoing') {
                                                    $badge_class = "status-badge bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg";
                                                    $icon = "fas fa-car";
                                                }
                                            ?>
                                            <tr class="table-row-hover">
                                                <td class="px-6 py-5">
                                                    <div class="bg-gray-100 text-gray-800 px-3 py-1 rounded-lg text-sm font-bold text-center">
                                                        #<?= $row['id'] ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="flex items-center">
                                                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-2 rounded-full mr-3">
                                                            <i class="fas fa-user text-white text-xs"></i>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-gray-900"><?= htmlspecialchars($row['username']) ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="flex items-center">
                                                        <div class="bg-gradient-to-r from-blue-500 to-cyan-600 p-2 rounded-full mr-3">
                                                            <i class="fas fa-car text-white text-xs"></i>
                                                        </div>
                                                        <p class="font-medium text-gray-900"><?= htmlspecialchars($row['car_name']) ?></p>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm font-medium">
                                                        <?= htmlspecialchars($row['car_type'] ?? 'N/A') ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="bg-green-50 text-green-700 px-3 py-2 rounded-lg font-semibold">
                                                        ₹<?= number_format($row['daily_rate'], 2) ?>
                                                        <span class="text-xs text-green-600">/day</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="bg-blue-50 text-blue-700 px-3 py-1 rounded-lg text-sm font-medium">
                                                        <i class="fas fa-calendar mr-1"></i>
                                                        <?= date('M d, Y', strtotime($row['pickup_date'])) ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="bg-purple-50 text-purple-700 px-3 py-1 rounded-lg text-sm font-medium">
                                                        <i class="fas fa-calendar mr-1"></i>
                                                        <?= date('M d, Y', strtotime($row['return_date'])) ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 text-emerald-800 px-4 py-2 rounded-lg font-bold text-lg">
                                                        ₹<?= number_format($row['total_amount'], 2) ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="bg-gray-50 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                                        <i class="fas fa-credit-card mr-1"></i>
                                                        <?= htmlspecialchars($row['payment_method'] ?? 'N/A') ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <span class="<?= $badge_class ?>">
                                                        <i class="<?= $icon ?> mr-1"></i>
                                                        <?= ucfirst($status) ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-5">
                                                    <div class="text-sm text-gray-600">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        <?= date('M d, Y', strtotime($row['booking_date'])) ?>
                                                        <br>
                                                        <span class="text-xs text-gray-500">
                                                            <?= date('g:i A', strtotime($row['booking_date'])) ?>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="11" class="text-center py-12">
                                                <div class="flex flex-col items-center">
                                                    <div class="bg-gray-100 p-4 rounded-full mb-4">
                                                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                                                    </div>
                                                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Bookings Found</h3>
                                                    <p class="text-gray-500">There are currently no rental bookings to display.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Footer -->
                        <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-600">
                                    Showing all <?= $total_bookings ?> booking records
                                </p>
                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                    <i class="fas fa-sync-alt"></i>
                                    <span>Last updated: <?= date('M d, Y - g:i A') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include("admin_inc/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Logout Modal-->
    <?php include("admin_inc/logout_modal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>

<?php $con->close(); ?>