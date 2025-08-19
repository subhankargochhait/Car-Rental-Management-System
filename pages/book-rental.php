<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

// Get car details
$car_name   = $_GET['car_name'] ?? '';
$car_type   = $_GET['car_type'] ?? '';
$daily_rate = $_GET['daily_rate'] ?? '';
$image      = $_GET['image'] ?? '';
$status     = $_GET['status'] ?? 'Available';

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Your Car</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap" rel="stylesheet">
  <style> body { font-family: "Lexend", sans-serif; } </style>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-slate-100 min-h-screen flex flex-col">

  <?php include('../includes/navbar-user.php') ?>

  <div class="flex-1 flex items-center justify-center py-12">
    <div class="w-full max-w-6xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl p-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

      <!-- Car Preview -->
      <div class="flex flex-col items-center justify-center space-y-6">
        <img src="../admin/car_images/<?php echo htmlspecialchars($image); ?>" 
             alt="Car Image" 
             class="w-full max-h-80 object-cover rounded-2xl shadow-md">
        
        <div class="w-full bg-gradient-to-r from-indigo-600 to-indigo-500 text-white p-6 rounded-2xl shadow-md">
          <h2 class="text-2xl font-bold mb-2"><?php echo htmlspecialchars($car_name); ?></h2>
          <p class="text-sm opacity-90 mb-1">Type: <?php echo htmlspecialchars($car_type); ?></p>
          <p class="text-lg font-semibold">₹<?php echo htmlspecialchars($daily_rate); ?> / day</p>
          <p class="mt-2">
            <span class="px-3 py-1 text-sm font-medium rounded-full 
              <?php echo strtolower($status) === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
              <?php echo htmlspecialchars($status); ?>
            </span>
          </p>
        </div>
      </div>

      <!-- Booking Form -->
      <div>
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Booking Details</h2>
        
        <form id="bookingForm" action="book_ins.php" method="post" class="space-y-6">
          <input type="hidden" name="car_name" value="<?php echo htmlspecialchars($car_name); ?>">
          <input type="hidden" name="daily_rate" value="<?php echo htmlspecialchars($daily_rate); ?>">
          <input type="hidden" id="totalAmountInput" name="total_amount" value="0">
          <input type="hidden" id="totalDaysInput" name="total_days" value="0">
          <input type="hidden" id="paymentStatus" name="payment_status" value="">

          <!-- Pickup -->
          <div>
            <label class="block text-sm font-medium text-slate-600">Pickup Date</label>
            <input type="date" id="pickupDate" name="pickup_date" required 
                   class="mt-1 w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <!-- Return -->
          <div>
            <label class="block text-sm font-medium text-slate-600">Return Date</label>
            <input type="date" id="returnDate" name="return_date" required 
                   class="mt-1 w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <!-- Payment -->
          <div>
            <label class="block text-sm font-medium text-slate-600">Payment Method</label>
            <select id="paymentMethod" name="payment_method" required 
                    class="mt-1 w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              <option value="">-- Select --</option>
              <option value="Cash on Delivery">Cash on Delivery</option>
              <option value="Razorpay">Razorpay</option>
            </select>
          </div>

          <!-- Summary -->
          <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 space-y-2">
            <p class="text-slate-700">Total Days: <span id="totalDays" class="font-bold">0</span></p>
            <p class="text-slate-700">Total Amount: <span id="totalAmount" class="font-bold text-indigo-600">₹0</span></p>
          </div>

          <!-- Button -->
          <button type="submit" id="bookNowBtn" disabled 
                  class="w-full bg-gradient-to-r from-indigo-600 to-indigo-500 text-white py-4 rounded-2xl shadow-lg hover:opacity-90 transition">
            Confirm & Book
          </button>
        </form>
      </div>
    </div>
  </div>

  <?php include('../includes/footer.php'); ?>

  <script>
  // calculate total
  function calculateTotal() {
      let pickupValue = document.getElementById('pickupDate').value;
      let returnValue = document.getElementById('returnDate').value;
      let dailyRate = parseFloat(<?php echo json_encode($daily_rate); ?>);
      let bookBtn = document.getElementById('bookNowBtn');

      if (!pickupValue || !returnValue) {
          document.getElementById('totalDays').textContent = '0';
          document.getElementById('totalDaysInput').value = '0';
          document.getElementById('totalAmount').textContent = '₹0';
          document.getElementById('totalAmountInput').value = '0';
          bookBtn.disabled = true;
          return;
      }

      let pickup = new Date(pickupValue);
      let ret = new Date(returnValue);

      if (ret > pickup) {
          let days = Math.ceil((ret - pickup) / (1000 * 60 * 60 * 24));
          let total = (days * dailyRate).toFixed(2);

          document.getElementById('totalDays').textContent = days;
          document.getElementById('totalDaysInput').value = days;
          document.getElementById('totalAmount').textContent = "₹" + total;
          document.getElementById('totalAmountInput').value = total;
          bookBtn.disabled = false;
      } else {
          document.getElementById('totalDays').textContent = '0';
          document.getElementById('totalDaysInput').value = '0';
          document.getElementById('totalAmount').textContent = '₹0';
          document.getElementById('totalAmountInput').value = '0';
          bookBtn.disabled = true;
      }
  }
  document.querySelectorAll('#pickupDate, #returnDate').forEach(input => {
      input.addEventListener('change', calculateTotal);
  });

  // payment integration
  document.getElementById("bookingForm").addEventListener("submit", function (e) {
      let paymentMethod = document.getElementById("paymentMethod").value;
      let paymentStatusInput = document.getElementById("paymentStatus");
      let amount = parseFloat(document.getElementById("totalAmountInput").value);

      if (paymentMethod === "Cash on Delivery") {
          paymentStatusInput.value = "Pending"; 
      }

      if (paymentMethod === "Razorpay") {
          e.preventDefault();
          if (!amount || amount <= 0) {
              alert("Please select valid pickup and return dates first.");
              return;
          }

          fetch("create_order.php", {
              method: "POST",
              headers: { "Content-Type": "application/x-www-form-urlencoded" },
              body: "amount=" + amount
          })
          .then(res => res.json())
          .then(order => {
              if (order.id) {
                  var options = {
                      "key": "rzp_test_R6gWimTKYuOdob",
                      "amount": order.amount,
                      "currency": order.currency,
                      "name": "Car Rental Booking",
                      "description": "Payment for <?php echo htmlspecialchars($car_name); ?> rental",
                      "order_id": order.id,
                      "handler": function (response) {
                          paymentStatusInput.value = "Success";

                          let form = document.getElementById("bookingForm");
                          ["razorpay_payment_id", "razorpay_order_id", "razorpay_signature"].forEach(function (field) {
                              let input = document.createElement("input");
                              input.type = "hidden";
                              input.name = field;
                              input.value = response[field];
                              form.appendChild(input);
                          });

                          form.submit();
                      },
                      // Indigo theme color
                      "theme": { "color": "#4f46e5" }
                  };
                  var rzp = new Razorpay(options);
                  rzp.on('payment.failed', function (response) {
                      alert("Payment failed: " + response.error.description);
                  });
                  rzp.open();
              } else {
                  alert("Failed to create order.");
              }
          });
      }
  });

  // min date setup
  document.addEventListener('DOMContentLoaded', function() {
      let today = new Date().toISOString().split('T')[0];
      document.getElementById('pickupDate').min = today;
      document.getElementById('returnDate').min = today;
      document.getElementById('pickupDate').addEventListener('change', function() {
          document.getElementById('returnDate').min = this.value;
      });
  });
  </script>
</body>
</html>
