<?php
include("../config/db.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Data Table</title>
<link rel="stylesheet" href="../assets/css/table.css">
</head>
<body>

<h2>User Information</h2>

<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Driver's License</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
$sql = "SELECT full_name, email, phone, driver_license, address FROM signup";
$result = $con->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['full_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['driver_license']}</td>
        <td>{$row['address']}</td>
    </tr>";

?>
<?php } ?>

        </tr>
    </tbody>
</table>

</body>
</html>
