<?php
// 1. Connect to database
include("../config/db.php");

// 2. Get car id from URL
$uid = $_GET['did'];

// 3. Get car details (to delete the image)
$sql = "SELECT * FROM signup WHERE uid = '$uid'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

// 5. Delete user record from database
$delete = "DELETE FROM signup WHERE uid = '$uid'";
$con->query($delete);

// 6. Go back to car list
header("Location:all_users.php");
exit;
?>