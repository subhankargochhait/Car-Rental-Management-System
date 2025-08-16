<?php
session_start();
// Optional: check if admin is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../config/db.php");

// Fetch all bookings
$sql = "SELECT * FROM bookings ORDER BY booking_date DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Rented Cars</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>All Rented Cars</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Car Name</th>
            <th>Car Type</th>
            <th>Daily Rate</th>
            <th>Pickup Date</th>
            <th>Return Date</th>
            <th>Total Amount</th>
            <th>Booking Date</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['car_name']) ?></td>
                    <td><?= htmlspecialchars($row['car_type']) ?></td>
                    <td><?= $row['daily_rate'] ?></td>
                    <td><?= $row['pickup_date'] ?></td>
                    <td><?= $row['return_date'] ?></td>
                    <td><?= $row['total_amount'] ?></td>
                    <td><?= $row['booking_date'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">No bookings found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$con->close();
?>
