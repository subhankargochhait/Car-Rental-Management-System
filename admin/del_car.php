<?php
// 1. Connect to database
include("../config/db.php");

// 2. Get car id from URL
$id = $_GET['did'];

// 3. Get car details (to delete the image)
$sql = "SELECT * FROM cars WHERE car_id = '$id'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

// 4. Delete image file from folder
$imagePath = "car_images/" . $row['image'];
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// 5. Delete car record from database
$delete = "DELETE FROM cars WHERE car_id = '$id'";
$con->query($delete);

// 6. Go back to car list
header("Location: list_cars.php");
exit;
?>