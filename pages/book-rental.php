<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

// Get car details from URL
$car_name   = $_GET['car_name'] ?? '';
$car_type   = $_GET['car_type'] ?? '';
$daily_rate = $_GET['daily_rate'] ?? '';
$image      = $_GET['image'] ?? '';
$status     = $_GET['status'] ?? 'Available'; // Default value

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Rental</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: "Lexend", sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-r from-slate-100 to-indigo-100 min-h-screen flex flex-col">
  <?php include('../includes/navbar-user.php') ?>

  <div class="flex-1 flex items-center justify-center py-12">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8">
      
      <!-- Title -->
      <h2 class="text-2xl font-bold text-slate-800 text-center mb-6">Book Your Car</h2>

      <!-- Car Image -->
      <img src="../admin/car_images/<?php echo htmlspecialchars($image); ?>" 
           alt="Car Image" 
           class="w-3/4 h-52 object-cover rounded-xl mx-auto mb-6 shadow">

      <!-- Car Info -->
      <div class="bg-slate-50 rounded-xl p-5 mb-6 border border-slate-200">
        <p class="text-slate-700 mb-2"><span class="font-semibold">Car Name:</span> <?php echo htmlspecialchars($car_name); ?></p>
        <p class="text-slate-700 mb-2"><span class="font-semibold">Car Type:</span> <?php echo htmlspecialchars($car_type); ?></p>
        <p class="text-slate-700 mb-2"><span class="font-semibold">Daily Rate:</span> ₹<span id="dailyRate"><?php echo htmlspecialchars($daily_rate); ?></span></p>
        <p class="text-slate-700"><span class="font-semibold">Status:</span> 
          <span class="px-3 py-1 text-sm font-medium rounded-full 
            <?php echo strtolower($status) === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <?php echo htmlspecialchars($status); ?>
          </span>
        </p>
      </div>

      <!-- Booking Form -->
      <form action="book_ins.php" method="post" class="space-y-5">
        <input type="hidden" name="car_name" value="<?php echo htmlspecialchars($car_name); ?>">
        <input type="hidden" name="daily_rate" value="<?php echo htmlspecialchars($daily_rate); ?>">
        <input type="hidden" id="totalAmountInput" name="total_amount" value="0">

        <!-- Pickup -->
        <div>
          <label class="block font-medium text-slate-700 mb-1">Pickup Date:</label>
          <input type="date" id="pickupDate" name="pickup_date" required 
                 class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
        </div>

        <!-- Return -->
        <div>
          <label class="block font-medium text-slate-700 mb-1">Return Date:</label>
          <input type="date" id="returnDate" name="return_date" required 
                 class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
        </div>

        <!-- Total -->
        <div class="bg-indigo-50 text-indigo-700 font-bold text-center text-lg py-3 rounded-lg shadow">
          Total Amount: ₹<span id="totalAmount">0</span>
        </div>

        <!-- Submit -->
        <button type="submit" id="bookNowBtn" disabled 
                class="w-full bg-gradient-to-r from-indigo-600 to-indigo-400 text-white font-semibold py-3 rounded-lg shadow hover:from-indigo-700 hover:to-indigo-500 disabled:bg-slate-300 disabled:cursor-not-allowed transition">
          Book Now
        </button>
      </form>
    </div>
  </div>

  <?php include('../includes/footer.php'); ?>

  <script>
  document.querySelectorAll('#pickupDate, #returnDate').forEach(input => {
      input.addEventListener('change', calculateTotal);
  });

  function calculateTotal() {
      let pickupValue = document.getElementById('pickupDate').value;
      let returnValue = document.getElementById('returnDate').value;
      let totalAmountField = document.getElementById('totalAmount');
      let totalAmountInput = document.getElementById('totalAmountInput');
      let bookBtn = document.getElementById('bookNowBtn');

      if (!pickupValue || !returnValue) {
          totalAmountField.textContent = '0';
          totalAmountInput.value = '0';
          bookBtn.disabled = true;
          return;
      }

      let pickup = new Date(pickupValue);
      let ret = new Date(returnValue);
      let dailyRate = parseFloat(document.getElementById('dailyRate').textContent);

      if (ret > pickup) {
          let days = Math.ceil((ret - pickup) / (1000 * 60 * 60 * 24));
          let total = (days * dailyRate).toFixed(2);
          totalAmountField.textContent = total;
          totalAmountInput.value = total;
          bookBtn.disabled = false;
      } else {
          totalAmountField.textContent = '0';
          totalAmountInput.value = '0';
          bookBtn.disabled = true;
      }
  }
  </script>
</body>
</html>
