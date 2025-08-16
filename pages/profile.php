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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f3f4f6;
    }

    /* Container */
    .profile-container {
      max-width: 900px;
      margin: 50px auto;
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
    }

    /* Profile Card */
    .profile-card {
      flex: 1 1 300px;
      background: #ffffff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }
    .profile-card:hover {
      transform: translateY(-5px);
    }

    .profile-card h2 {
      color: #1e40af;
      margin-bottom: 15px;
      font-size: 24px;
      text-align: center;
    }

    .profile-card .field {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-card .field i {
      color: #3b82f6;
      margin-right: 12px;
      font-size: 18px;
      width: 25px;
      text-align: center;
    }

    .profile-card .field input,
    .profile-card .field textarea {
      flex: 1;
      padding: 12px 14px;
      border: 1px solid #d1d5db;
      border-radius: 10px;
      font-size: 16px;
      outline: none;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-card .field input:focus,
    .profile-card .field textarea:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 6px rgba(59,130,246,0.3);
    }

    textarea {
      resize: none;
    }

    /* Update Button */
    .update-btn {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background: #3b82f6;
      color: #fff;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }
    .update-btn:hover {
      background: #2563eb;
      transform: scale(1.03);
    }

    /* Profile Picture */
    .profile-pic {
      text-align: center;
      margin-bottom: 25px;
    }
    .profile-pic img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 4px solid #3b82f6;
      object-fit: cover;
      margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .profile-container {
        flex-direction: column;
        gap: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Nav-bar -->
  <?php include('../includes/navbar-user.php') ?>

  <!-- Profile Form -->
  <div class="profile-container">
    <div class="profile-card">
      <div class="profile-pic">
        <!-- <img src="https://via.placeholder.com/120" alt="Profile Picture"> -->
        <p><?php echo htmlspecialchars($_SESSION["un"]); ?></p>
      </div>

      <form action="" method="get">
        <div class="field">
          <i class="fas fa-user"></i>
          <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION["un"]); ?>">
        </div>
        <div class="field">
          <i class="fas fa-envelope"></i>
          <input type="email" value="<?php echo htmlspecialchars($_SESSION["em"]); ?>">
        </div>
        <div class="field">
          <i class="fas fa-phone"></i>
          <input type="text" value="<?php echo htmlspecialchars($_SESSION["ph"]); ?>">
        </div>
        <div class="field">
          <i class="fas fa-id-card"></i>
          <input type="text" value="<?php echo htmlspecialchars($_SESSION["dl"]); ?>">
        </div>
        <div class="field">
          <i class="fas fa-home"></i>
          <textarea><?php echo htmlspecialchars($_SESSION["add"]); ?></textarea>
        </div>

        <button type="submit" class="update-btn">Update Profile</button>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include('../includes/footer.php'); ?>

</body>
</html>
