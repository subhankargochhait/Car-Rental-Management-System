<?php
$host = "sql203.infinityfree.com";
$user = "if0_39740042";
$pass = "i8Ruo1nclvz2RBv"; // set your password
$db   = "if0_39740042_car";

$con=mysqli_connect("sql203.infinityfree.com","if0_39740042","i8Ruo1nclvz2RBv","if0_39740042_car");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
