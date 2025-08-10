<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental | Login & Signup</title>
  <link rel="stylesheet" href="../assets/css/styles-login.css" />
</head>
<body>
  <div class="overlay">
    <div class="form-container">
      <h2 id="formTitle">Sign Up</h2>

      <!-- Signup Form -->
      <form id="signupForm" class="form active" action="signup-ins.php" method="post">
        <input  type="text" name="name" placeholder="Full Name" required />
        <input  type="email" name="email" placeholder="Email" required />
        <input  type="number" name="phone" placeholder="Phone Number" required />
        <input  type="password" name="password" placeholder="Password" required />
        <button type="submit" name="submit">Sign Up</button>
      </form>

    </div>
  </div>

</body>
</html>
