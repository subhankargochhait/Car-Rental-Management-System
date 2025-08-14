<?php
// 1. Connect to database
include("../config/db.php");

// 2. Get car ID from URL
$id =$_GET["edit"];

// 3. Select car data from database
$sql = "SELECT * FROM cars WHERE car_id = '$id'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add_Cars</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
         body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f7f8;
        }
        form {
            background: #fff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background: #f9f9f9;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #007bff;
            background: #fff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
    </style>

</head>

<body id="page-top">

<div id="wrapper">
    <?php include("admin_inc/sidebar.php") ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include("admin_inc/top.php") ?>
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Edit Car</h1>
                <form action="upd_car.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">

                    <label for="car_name">Car Name</label>
                    <input type="text" name="car_name" id="car_name" value="<?php echo htmlspecialchars($row['car_name']); ?>" required>

                    <label for="car_type">Car Type</label>
                    <select name="car_type" id="car_type" required>
                        <option value="">-- Select Car Type --</option>
                        <option value="SUV" <?php if($row['car_type']=="SUV") echo "selected"; ?>>SUV</option>
                        <option value="Compact" <?php if($row['car_type']=="Compact") echo "selected"; ?>>Compact</option>
                        <option value="Mid-size" <?php if($row['car_type']=="Mid-size") echo "selected"; ?>>Mid-size</option>
                    </select>

                    <label for="daily_rate">Daily Rate</label>
                    <input type="text" name="daily_rate" id="daily_rate" value="<?php echo htmlspecialchars($row['daily_rate']); ?>" required>

                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="Available" <?php if($row['status']=="Available") echo "selected"; ?>>Available</option>
                        <option value="Unavailable" <?php if($row['status']=="Unavailable") echo "selected"; ?>>Unavailable</option>
                    </select>

                    <label>Current Image</label><br>
                    <img src="car_images/<?php echo $row['image']; ?>" alt="Car Image" width="100"><br><br>

                    <label for="image">Change Image (optional)</label>
                    <input type="file" name="image" id="image" accept="image/*">

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
        <?php include("admin_inc/footer.php") ?>
    </div>
</div>
<?php include("admin_inc/logout_modal.php") ?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>

</html>