<?php
include("../config/db.php");

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental Fleet</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }
        .container { 
            max-width: 1200px; 
            margin: auto; 
            background: white; 
            border-radius: 12px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
            padding: 20px; 
            animation: fadeIn 0.8s ease-in-out;
        }
        h1 { 
            text-align: center; 
            margin: 20px 0; 
            font-weight: 600; 
            color: #1e293b;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            overflow: hidden; 
            border-radius: 10px;
        }
        thead tr {
            background-color: #2563eb; 
            color: white;
        }
        th, td { 
            padding: 14px; 
            text-align: center; 
            font-size: 14px;
        }
        tbody tr { 
            background: #fff; 
            transition: all 0.3s ease;
        }
        tbody tr:hover { 
            background-color: #f9fafb; 
            transform: scale(1.01);
            box-shadow: 0 3px 8px rgba(0,0,0,0.06);
        }
        .status { 
            padding: 5px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: 600; 
            display: inline-block;
        }
        .status-available { background-color: #16a34a; color: white; }
        .status-unavailable { background-color: #dc2626; color: white; }
        .car-type { 
            background-color: #e2e8f0; 
            padding: 4px 10px; 
            border-radius: 6px; 
            font-size: 12px;
            font-weight: 500;
        }
        .action-buttons { display: flex; justify-content: center; gap: 6px; }
        .btn { 
            padding: 6px 14px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 12px; 
            font-weight: 500; 
            transition: all 0.3s ease;
        }
        .btn-view { background-color: #3b82f6; color: white; }
        .btn-edit { background-color: #10b981; color: white; }
        .btn-delete { background-color: #ef4444; color: white; }
        .btn:hover { transform: translateY(-2px); opacity: 0.9; }
        img { border-radius: 6px; transition: transform 0.3s ease; }
        img:hover { transform: scale(1.1); }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include("admin_inc/sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("admin_inc/top.php"); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">🚗 Car Rental Fleet</h1>
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary shadow" href="add_cars.php" role="button">
                            <i class="fas fa-plus-circle"></i> Add New Car
                        </a>
                    </div>
                    <div class="container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Car Name</th>
                                    <th>Car Type</th>
                                    <th>Daily Rate</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT car_id, car_name, car_type, daily_rate, status, image FROM cars";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $statusClass = ($row['status'] == 'Available') ? 'status-available' : 'status-unavailable';
                                echo "<tr>
                                    <td>{$row['car_id']}</td>
                                    <td>{$row['car_name']}</td>
                                    <td><span class='car-type'>{$row['car_type']}</span></td>
                                    <td>₹{$row['daily_rate']}/day</td>
                                    <td><span class='status {$statusClass}'>{$row['status']}</span></td>
                                    <td><img src='car_images/{$row['image']}' alt='Car Image' width='80'></td>
                                    <td>
                                        <div class='action-buttons'>
                                            <a href='view_card.php?car_id=" . urlencode($row['car_id']) . "' class='btn btn-view'><i class='fas fa-eye'></i> View</a>
                                            <a href='edit_car.php?edit=" . urlencode($row['car_id']) . "' class='btn btn-edit'><i class='fas fa-edit'></i> Edit</a>
                                            <a href='del_car.php?did=" . urlencode($row['car_id']) . "' class='btn btn-delete' onclick=\"return confirm('Are you sure you want to delete this car?');\"><i class='fas fa-trash-alt'></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include("admin_inc/footer.php"); ?>
        </div>
    </div>
    <?php include("admin_inc/logout_modal.php"); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
