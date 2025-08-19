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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rentals - Clean Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-soft': 'bounceSoft 2s ease-in-out infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * { font-family: 'Inter', sans-serif; }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounceSoft {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="min-h-screen bg-white">
  <?php include('../includes/navbar-user.php') ?>
    <!-- Main Content -->
    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12 animate-fade-in">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    My <span class="gradient-bg bg-clip-text text-transparent">Rentals</span>
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Manage your car bookings and track rental history
                </p>
                <div class="w-20 h-1 gradient-bg mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 animate-slide-up">
                <?php
                $total_rentals = $result->num_rows;
                $total_amount = 0;
                $active_rentals = 0;
                
                // Calculate stats
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $total_amount += $row['total_amount'];
                    if (strtotime($row['return_date']) > time()) {
                        $active_rentals++;
                    }
                }
                $result->data_seek(0);
                ?>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center card-hover">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <span class="text-emerald-600 font-bold text-lg"><?php echo $total_rentals; ?></span>
                    </div>
                    <h3 class="text-gray-800 font-semibold text-lg mb-1">Total Rentals</h3>
                    <p class="text-gray-500 text-sm">Lifetime bookings</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center card-hover">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <span class="text-blue-600 font-bold text-lg"><?php echo $active_rentals; ?></span>
                    </div>
                    <h3 class="text-gray-800 font-semibold text-lg mb-1">Active</h3>
                    <p class="text-gray-500 text-sm">Currently rented</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center card-hover">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <span class="text-purple-600 font-bold text-sm">₹<?php echo number_format($total_amount/1000, 1); ?>K</span>
                    </div>
                    <h3 class="text-gray-800 font-semibold text-lg mb-1">Total Spent</h3>
                    <p class="text-gray-500 text-sm">All time</p>
                </div>
            </div>

            <!-- Rental Cards -->
            <?php if ($result->num_rows > 0): ?>
                <div class="space-y-6 animate-slide-up" style="animation-delay: 0.3s;">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden card-hover">
                            <div class="flex flex-col md:flex-row">
                                <!-- Compact Car Image Section -->
                                <div class="md:w-1/3 relative overflow-hidden group">
                                    <img src="../admin/car_images/<?php echo htmlspecialchars($row['image']); ?>" 
                                         alt="<?php echo htmlspecialchars($row['car_name']); ?>" 
                                         class="w-full h-48 md:h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    
                                    <!-- Status Badge -->
                                    <div class="absolute top-3 left-3">
                                        <span class="px-3 py-1 rounded-full text-white text-xs font-semibold shadow-lg
                                            <?php echo strtolower($row['status']) === 'pending' ? 'bg-amber-500' : 
                                                     (strtolower($row['status']) === 'success' ? 'bg-emerald-500' : 'bg-red-500'); ?>">
                                            <?php 
                                            switch(strtolower($row['status'])) {
                                                case 'pending': echo 'Pending'; break;
                                                case 'success': echo 'Confirmed'; break;
                                                default: echo ucfirst($row['status']); break;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Compact Details Section -->
                                <div class="flex-1 p-6">
                                    <!-- Header -->
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800 mb-1">
                                                <?php echo htmlspecialchars($row['car_name']); ?>
                                            </h3>
                                            <span class="text-gray-500 text-sm bg-gray-100 px-2 py-1 rounded-full">
                                                <?php echo htmlspecialchars($row['car_type']); ?>
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-2xl font-bold text-gray-800">₹<?php echo number_format($row['total_amount']); ?></p>
                                            <p class="text-gray-500 text-sm">Total</p>
                                        </div>
                                    </div>

                                    <!-- Compact Details Grid -->
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <span class="text-blue-600 text-sm">📅</span>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs font-medium">Pickup</p>
                                                <p class="text-gray-800 font-semibold text-sm"><?php echo date('M d, Y', strtotime($row['pickup_date'])); ?></p>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                                                <span class="text-emerald-600 text-sm">🔄</span>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs font-medium">Return</p>
                                                <p class="text-gray-800 font-semibold text-sm"><?php echo date('M d, Y', strtotime($row['return_date'])); ?></p>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                                <span class="text-purple-600 text-sm">💳</span>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs font-medium">Payment</p>
                                                <p class="text-gray-800 font-semibold text-sm"><?php echo htmlspecialchars($row['payment_method']); ?></p>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                                <span class="text-orange-600 text-sm">🆔</span>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs font-medium">Booking</p>
                                                <p class="text-gray-800 font-semibold text-sm">#<?php echo $row['id']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                 
                                    <!-- Action Buttons -->
                                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">
                                        <button class="flex-1 bg-blue-500 text-white py-2.5 px-4 rounded-xl font-medium hover:bg-blue-600 transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg text-sm">
                                            View Details
                                        </button>
                                        
                                        <?php if (strtolower($row['status']) === 'pending'): ?>
                                            <button class="flex-1 bg-emerald-500 text-white py-2.5 px-4 rounded-xl font-medium hover:bg-emerald-600 transition-all duration-200 transform hover:scale-105 shadow-md text-sm">
                                                Complete Payment
                                            </button>
                                        <?php endif; ?>
                                        
                                        <a href="delete_booking.php?id=<?php echo $row['id']; ?>" 
                                           onclick="return confirm('Are you sure you want to delete this booking?')"
                                           class="bg-red-50 text-red-600 py-2.5 px-4 rounded-xl font-medium hover:bg-red-100 transition-all duration-200 border border-red-200 text-center text-sm">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <!-- Clean Empty State -->
                <div class="text-center py-16 animate-slide-up">
                    <div class="bg-white rounded-3xl p-12 max-w-lg mx-auto shadow-lg border border-gray-100">
                        <div class="w-20 h-20 gradient-bg rounded-full mx-auto mb-6 flex items-center justify-center animate-bounce-soft">
                            <span class="text-white text-3xl">🚗</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">No Rentals Yet</h3>
                        <p class="text-gray-600 text-lg mb-8">
                            Start your journey by browsing our premium car collection
                        </p>
                        <a href="browse-car.php"><button class="gradient-bg text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-200 transform hover:scale-105">
                            Browse Cars
                        </button></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="w-14 h-14 gradient-bg rounded-full shadow-xl hover:shadow-2xl transition-all duration-200 transform hover:scale-110 flex items-center justify-center group">
            <a href="browse-car.php"><span class="text-white text-xl group-hover:rotate-180 transition-transform duration-300">+</span></a>
        </button>
    </div>

    <!-- Footer -->
    <?php include('../includes/footer.php'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth reveal animation
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease-out';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });

            // Button click effects
            const buttons = document.querySelectorAll('button, a');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.height, rect.width);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(255, 255, 255, 0.4);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.5s ease-out;
                        pointer-events: none;
                        z-index: 10;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 500);
                });
            });

            // Add ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>