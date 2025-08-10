<?php
$host = "localhost";
$user = "root";
$pass = ""; // set your password
$db   = "car-rental-management-system";

$con=mysqli_connect("localhost","root","","Car-Rental-Management-System");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
