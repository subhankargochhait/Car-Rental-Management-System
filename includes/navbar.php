<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Lexend', sans-serif; }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navbar Start -->
  <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      
      <!-- Logo -->
      <a href="../index.php" class="flex items-center space-x-2">
        <img src="../Frame.png" alt="Logo" class="h-10 w-auto">
        <h3 class="text-xl font-bold text-blue-600">RENTCARS</h3>
      </a>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8 font-medium text-gray-700">
        <li><a href="../index.php" class="hover:text-blue-600 transition">Home</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="hover:text-blue-600 transition">About Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="hover:text-blue-600 transition">Services</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="hover:text-blue-600 transition">Contact Us</a></li>
      </ul>

      <!-- Buttons -->
      <div class="hidden md:flex space-x-4">
        <a href="/Travarsa_Internship/Car-Rental-Management-System/pages/login.php" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition">Login</a>
        <a href="/Travarsa_Internship/Car-Rental-Management-System/pages/signup.php" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">Sign Up</a>
        <a href="../admin/login.php" class="px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-900 transition">Admin Login</a>
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
        <li><a href="../index.php" class="block hover:text-blue-600">Home</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="block hover:text-blue-600">About Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="block hover:text-blue-600">Services</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="block hover:text-blue-600">Contact Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/login.php" class="block hover:text-blue-600">Login</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/signup.php" class="block hover:text-blue-600">Sign Up</a></li>
        <li><a href="../admin/login.php" class="block hover:text-blue-600">Admin Login</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->

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
