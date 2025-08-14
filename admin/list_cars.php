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
    <title>Add Cars</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .container { max-width: 1200px; margin: auto; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; }
        h1 { text-align: center; margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #4a5568; color: white; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; }
        tr:hover { background-color: #f7fafc; }
        .status { padding: 4px 12px; border-radius: 20px; color: white; font-size: 12px; font-weight: bold; }
        .status-available { background-color: #48bb78; }
        .status-unavailable { background-color: #f56565; }
        .car-type { background-color: #e2e8f0; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .action-buttons { display: flex; gap: 5px; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; }
        .btn-view { background-color: #3182ce; color: white; }
        .btn-edit { background-color: #38a169; color: white; }
        .btn-delete { background-color: #e53e3e; color: white; }
        .btn:hover { opacity: 0.8; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include("admin_inc/sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("admin_inc/top.php"); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Car Rental Fleet</h1>
                    <div class="d-flex justify-content-end ">
<a class="btn btn-primary" href="add_cars.php" role="button">Add New Car</a>

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
        <td>{$row['daily_rate']}/day</td>
        <td><span class='status {$statusClass}'>{$row['status']}</span></td>
        <td><img src='car_images/{$row['image']}' alt='Car Image' width='80'></td>
        <td>
            <div class='action-buttons'>
                <a href='view_card.php?car_id=" . urlencode($row['car_id']) . "' class='btn btn-view'>View</a>
                <a href='edit_car.php?edit=" . urlencode($row['car_id']) . "' 
                   class='btn btn-edit';\">
                   Edit
                </a>
                <a href='del_car.php?did=" . urlencode($row['car_id']) . "' 
                   class='btn btn-delete' 
                   onclick=\"return confirm('Are you sure you want to delete this car?');\">
                   Delete
                </a>
            </div>
        </td>
    </tr>";
}
?>

 
                                        </td>
                                    </tr>
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
