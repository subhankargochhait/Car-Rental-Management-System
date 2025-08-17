<?php
// session_start();
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
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Lexend', sans-serif;
      background-color: white;
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navbar Start -->
  <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      
      <!-- Logo -->
      <a href="dashboard.php" class="flex items-center space-x-2">
        <img src="../assets/images/Frame.png" alt="Logo" class="h-10 w-auto">
        <h3 class="text-xl font-bold text-blue-600">RENTCARS</h3>
      </a>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8 font-medium text-gray-700 items-center">
        <li><a href="dashboard.php" class="hover:text-blue-600 transition">My Dashboard</a></li>
        <li><a href="../pages/browse-car.php" class="hover:text-blue-600 transition">Browse Cars</a></li>
        <li><a href="../pages/my_rental.php" class="hover:text-blue-600 transition">My Rental</a></li>
        <li><a href="../pages/profile.php" class="hover:text-blue-600 transition">Profile</a></li>
        <li><span class="text-red-600 font-semibold">Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?></span></li>
      </ul>

      <!-- Buttons -->
      <div class="hidden md:flex space-x-4">
        <a href="logout.php" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">Logout</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
      <ul class="flex flex-col space-y-3 px-6 py-4 text-gray-700 font-medium">
        <li><a href="dashboard.php" class="block hover:text-blue-600">My Dashboard</a></li>
        <li><a href="../pages/browse-car.php" class="block hover:text-blue-600">Browse Cars</a></li>
        <li><a href="../pages/my_rental.php" class="block hover:text-blue-600">My Rental</a></li>
        <li><a href="../pages/profile.php" class="block hover:text-blue-600">Profile</a></li>
        <li><span class="block text-red-600 font-semibold">Welcome, <?php echo htmlspecialchars($_SESSION["un"]); ?></span></li>
        <li><a href="logout.php" class="block text-red-600 hover:text-red-800">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Page Content -->
  <div class="pt-24 container mx-auto px-6">
    <div class="main-content">
      <div class="section-1">
      </div>
    </div>
  </div>

  <script>
    // Toggle mobile menu
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

</body>
</html>
