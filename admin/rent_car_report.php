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
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .badge { @apply px-3 py-1 rounded-full text-white text-xs font-semibold shadow; }
        .badge-pending { @apply bg-yellow-500; }
        .badge-completed { @apply bg-green-600; }
        .badge-cancelled { @apply bg-red-600; }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200 font-sans p-6 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🚗 Admin Dashboard - Rented Cars</h1>
            <div class="bg-white px-4 py-2 rounded-lg shadow text-gray-600">
                Total Bookings: 
                <span class="font-semibold text-blue-600"><?= $total_bookings ?></span>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-2xl rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Car Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Car Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Daily Rate</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Pickup Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Return Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Total Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Booking Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if ($total_bookings > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <?php
                                $status = $row['status'] ?? 'Pending'; 
                                $badge_class = 'badge-pending';
                                if(strtolower($status) == 'completed') $badge_class = 'badge-completed';
                                if(strtolower($status) == 'cancelled') $badge_class = 'badge-cancelled';
                            ?>
                            <tr class="fade-in hover:bg-blue-50 transition duration-300">
                                <td class="px-6 py-4"><?= $row['id'] ?></td>
                                <td class="px-6 py-4"><?= htmlspecialchars($row['username']) ?></td>
                                <td class="px-6 py-4"><?= htmlspecialchars($row['car_name']) ?></td>
                                <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($row['car_type'] ?? 'N/A') ?></td>
                                <td class="px-6 py-4">₹<?= number_format($row['daily_rate'],2) ?></td>
                                <td class="px-6 py-4"><?= $row['pickup_date'] ?></td>
                                <td class="px-6 py-4"><?= $row['return_date'] ?></td>
                                <td class="px-6 py-4 font-semibold text-blue-700">₹<?= number_format($row['total_amount'],2) ?></td>
                                <td class="px-6 py-4">
                                    <span class="badge <?= $badge_class ?>"><?= ucfirst($status) ?></span>
                                </td>
                                <td class="px-6 py-4"><?= $row['booking_date'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center py-6 text-gray-500">No bookings found 🚫</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php $con->close(); ?>
