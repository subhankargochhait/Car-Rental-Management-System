<?php

// Include DB connection first
include("../config/db.php");


// Check if all required POST fields are set
if (isset($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["password"])) {

    $n = $_POST["name"];
    $e = $_POST["email"];
    $p = $_POST["phone"];
    $pass = $_POST["password"];

    // SQL query (SET syntax with commas between columns)
    $ins = "INSERT INTO signup SET 
                full_name='$n',
                email='$e',
                phone='$p',
                password='$pass'";

    if ($con->query($ins) === TRUE) {
       header("location:login.php");
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();

} else {
    echo "Missing required form data.";
}

?>
