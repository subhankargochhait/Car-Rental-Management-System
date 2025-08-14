<?php
include("../config/db.php");

// Get UID from URL
if (isset($_GET['uid']) && is_numeric($_GET['uid'])) {
    $uid = $_GET['uid'];
} else {
    die("Invalid or missing UID.");
}

// Fetch student details
$sql = "SELECT uid, full_name, email, phone, driver_license, address FROM signup WHERE uid = '$uid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Student not found.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .card {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 16px;
            margin: 8px 0;
        }
        strong {
            color: #555;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        .back-btn a {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>User Details</h2>
    <p><strong>UID:</strong> <?php echo $row['uid']; ?></p>
    <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
    <p><strong>Driver's License:</strong> <?php echo $row['driver_license']; ?></p>
    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>

    <div class="back-btn">
        <a href="all_users.php">⬅ Go Back</a>
    </div>
</div>

</body>
</html>
