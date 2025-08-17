<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

$username = $_SESSION["un"];
$result = $con->query("SELECT * FROM bookings WHERE username='$username' ORDER BY booking_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Rentals</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <?php include('../includes/navbar-user.php'); ?>

    <div class="max-w-6xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10 relative">
            My Rentals
            <span class="block w-24 h-1 bg-blue-500 mx-auto mt-3 rounded-full"></span>
        </h2>

        <?php if ($result->num_rows > 0): ?>
            <div class="space-y-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <!-- Car Image -->
                        <div class="md:w-1/3 relative">
                            <img src="../admin/car_images/<?php echo htmlspecialchars($row['image']); ?>" 
                                 alt="Car Image" 
                                 class="w-full h-56 object-cover transform hover:scale-105 transition duration-500">
                        </div>

                        <!-- Rental Details -->
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                    <?php echo htmlspecialchars($row['car_name']); ?> 
                                    <span class="text-gray-500 text-sm">(<?php echo htmlspecialchars($row['car_type']); ?>)</span>
                                </h3>
                                <p class="text-gray-600 text-sm mb-2"><strong>Pickup Date:</strong> <?php echo htmlspecialchars($row['pickup_date']); ?></p>
                                <p class="text-gray-600 text-sm mb-2"><strong>Return Date:</strong> <?php echo htmlspecialchars($row['return_date']); ?></p>
                                <p class="text-gray-700 font-medium text-base"><strong>Total Amount:</strong> ₹<?php echo htmlspecialchars($row['total_amount']); ?></p>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <!-- Status -->
                                <span class="px-3 py-1 rounded-full text-xs font-semibold shadow-sm
                                    <?php echo strtolower($row['status']) === 'pending' 
                                        ? 'bg-yellow-100 text-yellow-700' 
                                        : (strtolower($row['status']) === 'paid' 
                                            ? 'bg-green-100 text-green-700' 
                                            : 'bg-gray-100 text-gray-700'); ?>">
                                    <?php echo htmlspecialchars($row['status']); ?>
                                </span>

                                <!-- Delete Button -->
                                <a href="delete_booking.php?id=<?php echo $row['id']; ?>" 
                                   class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white text-sm px-4 py-2 rounded-lg font-medium shadow-md hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 text-lg">No bookings yet.</p>
        <?php endif; ?>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
