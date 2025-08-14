<?php
include("../config/db.php");

$cn = $_POST["car_name"];
$ct = $_POST["car_type"];
$dr = $_POST["daily_rate"];
$s  = $_POST["status"];
$id = $_POST["car_id"]; // must match hidden input name in form

if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
    // Handle file upload
    $buf = $_FILES["image"]["tmp_name"];
    $fn  = time() . "_" . $_FILES["image"]["name"];
    move_uploaded_file($buf, "car_images/" . $fn);

    // Update with image
    $up = "UPDATE cars 
           SET car_name='$cn', 
               car_type='$ct',
               daily_rate='$dr',
               status='$s',
               image='$fn' 
           WHERE car_id='$id'";
} else {
    // Update without changing image
    $up = "UPDATE cars 
           SET car_name='$cn', 
               car_type='$ct',
               daily_rate='$dr',
               status='$s'
           WHERE car_id='$id'";
}

if ($con->query($up)) {
    echo "<script>
            alert('Car updated successfully');
            window.location.href = 'list_cars.php';
          </script>";
} else {
    echo "Error: " . $con->error;
}

$con->close();
?>

