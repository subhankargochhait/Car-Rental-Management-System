<?php
include("../config/db.php");
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Lexend', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <?php include('../includes/navbar-user.php'); ?>

  <!-- Hero Section -->
  <div class="max-w-6xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">🚗 Available Cars</h2>

    <!-- Filters -->
    <div class="flex flex-wrap gap-3 mb-8">
      <select id="carFilter" class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300">
        <option value="All">All Types</option>
        <option value="SUV">SUV</option>
        <option value="Compact">Compact</option>
        <option value="Mid-size">Mid-size</option>
      </select>
      <input type="text" placeholder="Max Price/Day" class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Apply Filters</button>
      <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Clear</button>
    </div>

    <!-- Cars Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $sql = "SELECT image, car_name, car_type, daily_rate, status FROM cars";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
          $statusAvailable = ($row['status'] === 'Available');
      ?>
      <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition border"
           data-type="<?php echo htmlspecialchars($row['car_type']); ?>">

        <img src="../admin/car_images/<?php echo htmlspecialchars($row['image']); ?>"
             alt="Car Image"
             class="w-full h-48 object-cover">

        <div class="p-5">
          <h3 class="text-xl font-semibold text-gray-800">
            <?php echo htmlspecialchars($row['car_name']); ?>
          </h3>
          <p class="text-gray-500"><?php echo htmlspecialchars($row['car_type']); ?></p>
          <p class="mt-2 text-lg font-bold text-indigo-600">
            ₹<?php echo htmlspecialchars($row['daily_rate']); ?>/day
          </p>

          <p class="mt-2">
            Status:
            <span class="px-3 py-1 text-sm rounded-full 
              <?php echo $statusAvailable ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600'; ?>">
              <?php echo htmlspecialchars($row['status']); ?>
            </span>
          </p>

          <?php if ($statusAvailable) { ?>
            <button 
              onclick="window.location.href='book-rental.php?car_name=<?php echo urlencode($row['car_name']); ?>&car_type=<?php echo urlencode($row['car_type']); ?>&daily_rate=<?php echo $row['daily_rate']; ?>&image=<?php echo urlencode($row['image']); ?>'" 
              class="mt-4 w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-semibold py-2 rounded-lg hover:opacity-90 transition">
              Book This Car
            </button>
          <?php } else { ?>
            <button disabled class="mt-4 w-full bg-gray-300 text-gray-600 font-semibold py-2 rounded-lg cursor-not-allowed">
              Not Available
            </button>
          <?php } ?>
        </div>
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
        if (selectedType === "All" || carType === selectedType) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    });
  </script>

</body>
</html>
