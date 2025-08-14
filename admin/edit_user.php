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
    die("Student not found.");
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
        echo "<script>alert('Student updated successfully!'); window.location='all_users.php';</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .form-container {
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
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .back-btn {
            text-align: center;
            margin-top: 10px;
        }
        .back-btn a {
            text-decoration: none;
            color: white;
            background: #007BFF;
            padding: 8px 15px;
            border-radius: 5px;
        }
        .back-btn a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update User Data</h2>
    <form action="" method="POST">
        <label>Full Name</label>
        <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>

        <label>Driver's License</label>
        <input type="text" name="driver_license" value="<?php echo $row['driver_license']; ?>" required>

        <label>Address</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>

    <div class="back-btn">
        <a href="all_users.php">⬅ Go Back</a>
    </div>
</div>

</body>
</html>
