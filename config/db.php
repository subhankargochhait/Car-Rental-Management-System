<?php
$host = "localhost";
$user = "root";
$pass = ""; // set your password
$db   = "car-rental-management-system";

$con=mysqli_connect("localhost","root","","Car-rental-management-system");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
