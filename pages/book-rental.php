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
$status     = $_GET['status'] ?? 'Available';

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Rental</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap" rel="stylesheet">
  <style> body { font-family: "Lexend", sans-serif; } </style>
  <!-- Razorpay -->
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body class="bg-gradient-to-r from-slate-100 to-indigo-100 min-h-screen flex flex-col">
  <?php include('../includes/navbar-user.php') ?>

  <div class="flex-1 flex items-center justify-center py-12">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8">
      
      <h2 class="text-2xl font-bold text-slate-800 text-center mb-6">Book Your Car</h2>

      <img src="../admin/car_images/<?php echo htmlspecialchars($image); ?>" 
           alt="Car Image" 
           class="w-3/4 h-52 object-cover rounded-xl mx-auto mb-6 shadow">

      <div class="bg-slate-50 rounded-xl p-5 mb-6 border border-slate-200">
        <p><b>Car Name:</b> <?php echo htmlspecialchars($car_name); ?></p>
        <p><b>Car Type:</b> <?php echo htmlspecialchars($car_type); ?></p>
        <p><b>Daily Rate:</b> ₹<span id="dailyRate"><?php echo htmlspecialchars($daily_rate); ?></span></p>
        <p><b>Status:</b> 
          <span class="px-3 py-1 text-sm font-medium rounded-full 
            <?php echo strtolower($status) === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <?php echo htmlspecialchars($status); ?>
          </span>
        </p>
      </div>

      <!-- Booking Form -->
      <form id="bookingForm" action="book_ins.php" method="post" class="space-y-5">
        <input type="hidden" name="car_name" value="<?php echo htmlspecialchars($car_name); ?>">
        <input type="hidden" name="daily_rate" value="<?php echo htmlspecialchars($daily_rate); ?>">
        <input type="hidden" id="totalAmountInput" name="total_amount" value="0">
        <input type="hidden" id="totalDaysInput" name="total_days" value="0">
        <input type="hidden" id="paymentStatus" name="payment_status" value="">

        <div>
          <label>Pickup Date:</label>
          <input type="date" id="pickupDate" name="pickup_date" required class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
          <label>Return Date:</label>
          <input type="date" id="returnDate" name="return_date" required class="w-full border rounded-lg px-3 py-2">
        </div>

        <!-- Payment Method -->
        <div>
          <label>Payment Method:</label>
          <select id="paymentMethod" name="payment_method" required class="w-full border rounded-lg px-3 py-2">
            <option value="">-- Select --</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="Razorpay">Razorpay</option>
          </select>
        </div>

        <div class="bg-blue-50 text-blue-700 font-bold text-center py-2 rounded-lg">Total Days: <span id="totalDays">0</span></div>
        <div class="bg-indigo-50 text-indigo-700 font-bold text-center py-2 rounded-lg">Total Amount: ₹<span id="totalAmount">0</span></div>

        <button type="submit" id="bookNowBtn" disabled class="w-full bg-indigo-600 text-white py-3 rounded-lg">Book Now</button>
      </form>
    </div>
  </div>

  <?php include('../includes/footer.php'); ?>

  <script>
  // calculate total
  function calculateTotal() {
      let pickupValue = document.getElementById('pickupDate').value;
      let returnValue = document.getElementById('returnDate').value;
      let dailyRate = parseFloat(document.getElementById('dailyRate').textContent);
      let bookBtn = document.getElementById('bookNowBtn');

      if (!pickupValue || !returnValue) {
          document.getElementById('totalDays').textContent = '0';
          document.getElementById('totalDaysInput').value = '0';
          document.getElementById('totalAmount').textContent = '0';
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
          document.getElementById('totalAmount').textContent = total;
          document.getElementById('totalAmountInput').value = total;
          bookBtn.disabled = false;
      } else {
          document.getElementById('totalDays').textContent = '0';
          document.getElementById('totalDaysInput').value = '0';
          document.getElementById('totalAmount').textContent = '0';
          document.getElementById('totalAmountInput').value = '0';
          bookBtn.disabled = true;
      }
  }
  document.querySelectorAll('#pickupDate, #returnDate').forEach(input => {
      input.addEventListener('change', calculateTotal);
  });

  // submit with payment status
  document.getElementById("bookingForm").addEventListener("submit", function (e) {
      let paymentMethod = document.getElementById("paymentMethod").value;
      let paymentStatusInput = document.getElementById("paymentStatus");
      let amount = parseFloat(document.getElementById("totalAmountInput").value);

      if (paymentMethod === "Cash on Delivery") {
          paymentStatusInput.value = "Pending"; // COD → Pending
      }

      if (paymentMethod === "Razorpay") {
          e.preventDefault(); // prevent normal submit
          if (!amount || amount <= 0) {
              alert("Please select valid pickup and return dates first.");
              return;
          }

          var options = {
              "key": "rzp_test_R6gWimTKYuOdob",
              "amount": Math.round(amount * 100),
              "currency": "INR",
              "name": "Car Rental Booking",
              "description": "Payment for <?php echo htmlspecialchars($car_name); ?> rental",
              "handler": function (response) {
                  paymentStatusInput.value = "Success"; // Razorpay → Success
                  let form = document.getElementById("bookingForm");

                  let paymentIdInput = document.createElement("input");
                  paymentIdInput.type = "hidden";
                  paymentIdInput.name = "razorpay_payment_id";
                  paymentIdInput.value = response.razorpay_payment_id;
                  form.appendChild(paymentIdInput);

                  form.submit();
              },
              "theme": { "color": "#4f46e5" }
          };

          var rzp = new Razorpay(options);
          rzp.on('payment.failed', function (response) {
              alert("Payment failed: " + response.error.description);
          });
          rzp.open();
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
