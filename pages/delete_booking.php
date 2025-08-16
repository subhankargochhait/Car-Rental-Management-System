<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php");

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $username = $_SESSION['un'];

    // Delete only if it belongs to logged-in user
    $stmt = $con->prepare("DELETE FROM bookings WHERE id=? AND username=?");
    $stmt->bind_param("is", $id, $username);
    $stmt->execute();
    $stmt->close();
}

header("Location: my_rental.php");
exit;
?>
