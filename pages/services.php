<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

  <!-- Navbar -->
  <?php 
  include('../includes/navbar.php');
  include("../config/db.php");
  ?>

  <div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">🚗 Available Cars</h2>
    
    <!-- Filters -->
    <div class="flex flex-wrap gap-3 mb-8 justify-center">
      <select id="carFilter" 
              class="px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500">
        <option value="All">All Types</option>
        <option value="SUV">SUV</option>
        <option value="Compact">Compact</option>
        <option value="Mid-size">Mid-size</option>
      </select>
      <input type="text" placeholder="Max Price/Day"
             class="px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500">
      <button class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700">
        Apply Filters
      </button>
      <button class="px-5 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow hover:bg-gray-400">
        Clear
      </button>
    </div>

    <!-- Car Grid -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php
      $sql = "SELECT image, car_name, car_type, daily_rate, status FROM cars";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
          $statusAvailable = ($row['status'] === 'Available');
      ?>
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 p-5 text-center"
             data-type="<?php echo htmlspecialchars($row['car_type']); ?>">
          
          <!-- Car Image -->
          <img src="../admin/car_images/<?php echo htmlspecialchars($row['image']); ?>" 
               alt="Car Image" 
               class="w-full h-40 object-cover rounded-lg mb-4">

          <!-- Car Info -->
          <h3 class="text-lg font-bold text-gray-900">
            <?php echo htmlspecialchars($row['car_name']); ?>
          </h3>
          <p class="text-gray-500"><?php echo htmlspecialchars($row['car_type']); ?></p>
          <p class="mt-2 text-indigo-600 font-semibold">
            ₹<?php echo htmlspecialchars($row['daily_rate']); ?>/day
          </p>

          <!-- Status -->
          <p class="mt-2">
            <?php if ($statusAvailable) { ?>
              <span class="inline-block px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                Available
              </span>
            <?php } else { ?>
              <span class="inline-block px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                Unavailable
              </span>
            <?php } ?>
          </p>

          <!-- Book Button -->
          <?php if ($statusAvailable) { ?>
            <button onclick="window.location.href='signup.php?car_name=<?php echo urlencode($row['car_name']); ?>&car_type=<?php echo urlencode($row['car_type']); ?>&daily_rate=<?php echo $row['daily_rate']; ?>&image=<?php echo urlencode($row['image']); ?>'"
              class="mt-4 w-full py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-bold rounded-lg shadow-md hover:opacity-90 transition">
              Book This Car
            </button>
          <?php } else { ?>
            <button disabled
              class="mt-4 w-full py-3 bg-gray-300 text-gray-600 font-bold rounded-lg shadow-md cursor-not-allowed">
              Not Available
            </button>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include('../includes/footer.php'); ?>

  <script>
  document.getElementById('carFilter').addEventListener('change', function () {
      let selectedType = this.value;
      let cars = document.querySelectorAll('.grid .bg-white');

      cars.forEach(card => {
          let carType = card.getAttribute('data-type');
          card.style.display = (selectedType === "All" || carType === selectedType) ? "block" : "none";
      });
  });
  </script>
</body>
</html>
