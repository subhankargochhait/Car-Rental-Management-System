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
        .fade-in { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from{opacity:0;transform:translateY(20px);} to{opacity:1;transform:translateY(0);} }
        .slide-in { animation: slideIn 0.6s ease-out; }
        @keyframes slideIn { from{opacity:0;transform:translateX(-30px);} to{opacity:1;transform:translateX(0);} }
        .header-gradient { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%); }
        .stat-card { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 1px solid rgba(79,70,229,0.1); }
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
                <div class="container-fluid py-6">

                    <!-- Header Section -->
                    <div class="slide-in mb-8">
                        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                            <div>
                                <h1 class="text-4xl lg:text-5xl font-bold text-gray-800">
                                    <i class="fas fa-car text-indigo-600 mr-3"></i>Rented Cars
                                </h1>
                                <p class="text-gray-600 mt-2 text-lg">Manage and monitor all car rental bookings</p>
                            </div>
                            
                            <!-- Stats Card -->
                            <div class="stat-card px-6 py-4 rounded-2xl shadow-lg border-0">
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
                        <div class="stat-card p-6 rounded-2xl shadow-lg border-0">
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
                        <div class="stat-card p-6 rounded-2xl shadow-lg border-0">
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
                        <div class="stat-card p-6 rounded-2xl shadow-lg border-0">
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

                    <!-- Simple Table with Pickup & Return -->
                    <div class="fade-in bg-white shadow-lg rounded-2xl overflow-hidden">
                        <!-- Table Header -->
                        <div class="header-gradient px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <i class="fas fa-list-alt mr-2"></i>Booking Records
                            </h2>
                        </div>

                        <!-- Table Content -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Customer</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Vehicle</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Pickup</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Return</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Amount</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Booked</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php if ($total_bookings > 0): ?>
                                        <?php while($row = $result->fetch_assoc()): ?>
                                            <?php
                                                $status = $row['status'] ?? 'Pending'; 
                                                $badge_class = "bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold";
                                                if(strtolower($status) == 'completed') $badge_class = "bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold";
                                                if(strtolower($status) == 'cancelled') $badge_class = "bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold";
                                                if(strtolower($status) == 'active' || strtolower($status) == 'ongoing') $badge_class = "bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold";
                                            ?>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium text-gray-800">#<?= $row['id'] ?></td>
                                                <td class="px-4 py-3"><?= htmlspecialchars($row['username']) ?></td>
                                                <td class="px-4 py-3"><?= htmlspecialchars($row['car_name']) ?></td>
                                                <td class="px-4 py-3 text-sm text-gray-700"><?= date('M d, Y', strtotime($row['pickup_date'])) ?></td>
                                                <td class="px-4 py-3 text-sm text-gray-700"><?= date('M d, Y', strtotime($row['return_date'])) ?></td>
                                                <td class="px-4 py-3 font-semibold">₹<?= number_format($row['total_amount'], 2) ?></td>
                                                <td class="px-4 py-3"><span class="<?= $badge_class ?>"><?= ucfirst($status) ?></span></td>
                                                <td class="px-4 py-3 text-sm text-gray-600"><?= date('M d, Y', strtotime($row['booking_date'])) ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center py-6 text-gray-500">No bookings found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Footer -->
                        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200 flex justify-between text-sm text-gray-600">
                            <p>Showing all <?= $total_bookings ?> booking records</p>
                            <span>Last updated: <?= date('M d, Y - g:i A') ?></span>
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
