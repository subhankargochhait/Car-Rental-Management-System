<?php
session_start();
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

    <style>
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body id="page-top">

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
                <div class="container-fluid py-4">

                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">🚗 Rented Cars</h1>
                        <div class="bg-white px-4 py-2 rounded-lg shadow text-gray-700">
                            Total Bookings: 
                            <span class="font-bold text-blue-600"><?= $total_bookings ?></span>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Username</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Car Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Car Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Daily Rate</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Pickup</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Return</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Payment</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Booked On</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                <?php if ($total_bookings > 0): ?>
                                    <?php while($row = $result->fetch_assoc()): ?>
                                        <?php
                                            $status = $row['status'] ?? 'Pending'; 
                                            $badge_class = "bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow";
                                            if(strtolower($status) == 'completed') $badge_class = "bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow";
                                            if(strtolower($status) == 'cancelled') $badge_class = "bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow";
                                        ?>
                                        <tr class="fade-in hover:bg-blue-50 transition duration-200">
                                            <td class="px-6 py-4"><?= $row['id'] ?></td>
                                            <td class="px-6 py-4 font-medium"><?= htmlspecialchars($row['username']) ?></td>
                                            <td class="px-6 py-4"><?= htmlspecialchars($row['car_name']) ?></td>
                                            <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($row['car_type'] ?? 'N/A') ?></td>
                                            <td class="px-6 py-4">₹<?= number_format($row['daily_rate'],2) ?></td>
                                            <td class="px-6 py-4"><?= $row['pickup_date'] ?></td>
                                            <td class="px-6 py-4"><?= $row['return_date'] ?></td>
                                            <td class="px-6 py-4 font-semibold text-blue-700">₹<?= number_format($row['total_amount'],2) ?></td>
                                            <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($row['payment_method'] ?? 'N/A') ?></td>
                                            <td class="px-6 py-4"><span class="<?= $badge_class ?>"><?= ucfirst($status) ?></span></td>
                                            <td class="px-6 py-4 text-sm text-gray-500"><?= $row['booking_date'] ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="11" class="text-center py-6 text-gray-500">🚫 No bookings found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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
