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
  <title>My Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #eef2ff, #dbeafe);
      margin: 0;
      padding: 0;
    }


    /* Container */
    .container {
      max-width: 800px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Form Layout */
    form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 45px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    input, textarea {
      width: 80%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    textarea {
      resize: none;
      grid-column: span 2;
    }

    /* Button */
    .btn {
      grid-column: span 2;
      padding: 12px;
      background: linear-gradient(to right, #3b82f6, #6366f1);
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: linear-gradient(to right, #2563eb, #4f46e5);
    }
  </style>
</head>
<body>
      <!-- nav-bar-start -->
<?php include('../includes/navbar-user.php') ?>
   
    <!-- nav-bar-end -->


  <!-- Profile Form -->
  <div class="container">
    <h1>My Profile</h1>
    <form action="" method="get">
      <div>
        <label>Full Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION["un"]); ?>" >
      </div>
      <div>
        <label>Email</label>
        <input type="email" value="<?php echo htmlspecialchars($_SESSION["em"]); ?>">
      </div>
      <div>
        <label>Phone</label>
        <input type="text" value="<?php echo htmlspecialchars($_SESSION["ph"]); ?>">
      </div>
      <div>
        <label>Driver's License</label>
        <input type="text" value="<?php echo htmlspecialchars($_SESSION["dl"]); ?>">
      </div>
      <div>
        <label>Address</label>
        <textarea rows="3"><?php echo htmlspecialchars($_SESSION["add"]); ?></textarea>
      </div>
      <button type="submit" class="btn">Update Profile</button>
    </form>
  </div>

            <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>

</body>
</html>
