<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental | Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 via-white to-blue-200 flex items-center justify-center min-h-screen">

  <!-- Signup Card -->
  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">🚗 Create Account</h2>
    <p class="text-gray-500 text-center mb-6">Join us and book your car easily</p>

    <!-- Signup Form -->
    <form action="signup-ins.php" method="post" class="space-y-4">
      
      <input type="text" name="name" placeholder="Full Name" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <input type="email" name="email" placeholder="Email" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <input type="number" name="phone" placeholder="Phone Number" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <input type="text" name="driver-l" placeholder="Driver's License" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <input type="text" name="address" placeholder="Address" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <input type="password" name="password" placeholder="Password" 
        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />

      <button type="submit" name="submit" 
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Sign Up
      </button>
    </form>

    <!-- Extra -->
    <p class="text-center text-sm text-gray-500 mt-6">
      Already have an account? 
      <a href="login.php" class="text-blue-600 font-semibold hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
