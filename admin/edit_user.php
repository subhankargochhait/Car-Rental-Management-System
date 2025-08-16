<?php
include("../config/db.php");

// Step 1: Get UID from URL
if (isset($_GET['uid']) && is_numeric($_GET['uid'])) {
    $uid = $_GET['uid'];
} else {
    die("Invalid UID.");
}

// Step 2: Fetch existing data
$sql = "SELECT * FROM signup WHERE uid = '$uid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("User not found.");
}

// Step 3: Update data when form is submitted
if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $driver_license = $_POST['driver_license'];
    $address = $_POST['address'];

    $update_sql = "UPDATE signup 
                   SET full_name='$full_name', email='$email', phone='$phone', driver_license='$driver_license', address='$address' 
                   WHERE uid='$uid'";

    if ($con->query($update_sql) === TRUE) {
        echo "<script>alert('User updated successfully!'); window.location='all_users.php';</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            margin: 0;
            padding: 0;
        }
        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .form-container {
            background: white;
            width: 100%;
            max-width: 450px;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1565c0;
            font-weight: 600;
        }
        label {
            font-weight: 500;
            margin-top: 12px;
            display: block;
            color: #333;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #1565c0;
            box-shadow: 0 0 5px rgba(21, 101, 192, 0.3);
            outline: none;
        }
        button {
            background-color: #1565c0;
            color: white;
            padding: 12px;
            margin-top: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
        }
        button:hover {
            background-color: #0d47a1;
        }
        .back-btn {
            text-align: center;
            margin-top: 12px;
        }
        .back-btn a {
            text-decoration: none;
            color: white;
            background: #43a047;
            padding: 10px 20px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .back-btn a:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>

<div class="form-wrapper">
    <div class="form-container">
        <h2>Update User</h2>
        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo htmlspecialchars($row['full_name']); ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>

            <label>Driver's License</label>
            <input type="text" name="driver_license" value="<?php echo htmlspecialchars($row['driver_license']); ?>" required>

            <label>Address</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>

            <button type="submit" name="update">Update</button>
        </form>

        <div class="back-btn">
            <a href="all_users.php">⬅ Go Back</a>
        </div>
    </div>
</div>

</body>
</html>
