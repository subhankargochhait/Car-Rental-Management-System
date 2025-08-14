<?php
include("../config/db.php");

$cn= $_POST["car_name"];
$ct = $_POST["car_type"];
$dr = $_POST["daily_rate"];
$s = $_POST["status"];


    // Handle file upload
    $buf = $_FILES["image"]["tmp_name"];
    $fn = time() . $_FILES["image"]["name"];
    move_uploaded_file($buf, "car_images/" . $fn);

    // Correct SQL syntax
    $ins = "INSERT INTO cars 
            SET car_name='$cn', 
                car_type='$ct',
                daily_rate='$dr',
                status='$s',
                image='$fn'";

    if ($con->query($ins)) {
       echo "<script>
            alert('Successfully Data inserted');
            window.location.href = 'list_cars.php';
          </script>";
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();
?>
