<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}

include("../config/db.php"); // adjust path to your DB connection

$sql = "SELECT p.id, p.username, p.amount, p.payment_date, p.status, b.car_name 
        FROM payments p 
        JOIN bookings b ON p.booking_id = b.id 
        ORDER BY p.payment_date DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include("admin_inc/top.php"); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Payment Status</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Car</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result && $result->num_rows > 0): 
                while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['car_name']) ?></td>
                    <td>₹<?= number_format($row['amount'], 2) ?></td>
                    <td><?= $row['payment_date'] ?></td>
                    <td>
                        <?php if ($row['status'] == 'Paid'): ?>
                            <span class="badge bg-success">Paid</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Pending</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; 
            else: ?>
                <tr>
                    <td colspan="6" class="text-center">No payments found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
