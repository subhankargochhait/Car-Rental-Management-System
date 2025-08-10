<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // same as stored

    $sql = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['signup'] = $email;
        echo "Login successful! Welcome $email.";
        // header("Location: dashboard.php");
    } else {
        echo "Invalid email or password!";
    }
}
?>
