<?php
include("../config/db.php");

$c   = $_POST["cars"];
$pkd = $_POST["pickup_date"];
$rkd = $_POST["return_date"];

// Prepare SQL query
$ins = "INSERT INTO book_rent SET
                   cars='$c',
                   pickup_date='$pkd',
                   return_date='$rkd'";

// Execute query
if (mysqli_query($con, $ins)) {
    echo "<script>
            alert('Book your rent successfully');
            window.location.href = 'book-rental.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . mysqli_error($con) . "');
            window.history.back();
          </script>";
}

mysqli_close($con);
?>
