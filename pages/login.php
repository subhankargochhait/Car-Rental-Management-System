<?php
session_start();
include("../config/db.php");

$error = ""; // store error message

if (isset($_POST["login"])) {
    $e = $_POST["email"];
    $pass = $_POST["password"];

    $sel = "SELECT * FROM signup 
            WHERE email='$e' AND password ='$pass'";

    $rs = $con->query($sel);
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $_SESSION["un"] = $row["full_name"];
        $_SESSION["em"] = $row["email"];
        $_SESSION["ph"] = $row["phone"];
        $_SESSION["dl"] = $row["driver_license"];
        $_SESSION["add"] = $row["address"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental | Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@tailwindcss/forms"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 flex items-center justify-center min-h-screen">

  <!-- Login Card -->
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md relative">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">🚗 Car Rental Login</h2>

    <!-- Login Form -->
    <form action="" method="post" class="space-y-4">
      <input type="email" name="email" placeholder="Email" 
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />
      
      <input type="password" name="password" placeholder="Password"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required />
      
      <button type="submit" name="login" 
        class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
        Login
      </button>
    </form>
  </div>

  <!-- Popup for Invalid Credentials -->
  <?php if (!empty($error)): ?>
    <div id="popup" class="fixed top-5 right-5 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg animate-bounce">
      ❌ <?php echo $error; ?>
    </div>
    <script>
      setTimeout(() => {
        document.getElementById("popup").style.display = "none";
      }, 3000); // auto hide in 3s
    </script>
  <?php endif; ?>

</body>
</html>