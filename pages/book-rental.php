<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
include("../config/db.php");

// Get car details from URL
$car_name   = $_GET['car_name'] ?? '';
$car_type   = $_GET['car_type'] ?? '';
$daily_rate = $_GET['daily_rate'] ?? '';
$image      = $_GET['image'] ?? '';
$status     = $_GET['status'] ?? 'Available'; // Default value

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Rental</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: "Lexend", sans-serif; background: linear-gradient(135deg, #f3f4f6, #e0e7ff); margin: 0; padding: 0; }
        .container { max-width: 650px; margin: 40px auto; background: white; border-radius: 16px; padding: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.15); }
        h2 { text-align: center; margin-bottom: 20px; color: #1e293b; font-weight: 700; }
        .car-image { width: 60%; height: 200px; object-fit: cover; border-radius: 12px; margin: 0 auto 10px; display: block; }
        .car-info { background: #f8fafc; padding: 15px; border-radius: 10px; margin-bottom: 20px; }
        .car-info p { margin: 6px 0; font-size: 16px; color: #334155; }
        .status { display: inline-block; padding: 4px 12px; border-radius: 20px; font-weight: bold; font-size: 14px; }
        .status.available { background: #d1fae5; color: #065f46; }
        .status.unavailable { background: #fee2e2; color: #b91c1c; }
        label { font-weight: 500; color: #1e293b; margin-top: 10px; display: block; }
        input[type="date"] { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; margin-top: 5px; font-size: 14px; outline: none; }
        input[type="date"]:focus { border-color: #3b82f6; box-shadow: 0 0 5px rgba(59,130,246,0.5); }
        .total { font-size: 18px; font-weight: bold; margin-top: 15px; color: #2563eb; background: #eff6ff; padding: 10px; border-radius: 8px; text-align: center; }
        .btn-primary { background: linear-gradient(to right, #4f46e5, #3b82f6); color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 20px; width: 100%; transition: 0.3s; }
        .btn-primary:hover { background: linear-gradient(to right, #4338ca, #2563eb); }
        .btn-primary:disabled { background: #cbd5e1; cursor: not-allowed; }
    </style>
</head>
<body>
<?php include('../includes/navbar-user.php') ?>
<div class="container">
    <h2>Book Your Car</h2>
    <img src="../admin/car_images/<?php echo htmlspecialchars($image); ?>" alt="Car Image" class="car-image">

    <div class="car-info">
        <p><strong>Car Name:</strong> <?php echo htmlspecialchars($car_name); ?></p>
        <p><strong>Car Type:</strong> <?php echo htmlspecialchars($car_type); ?></p>
        <p><strong>Daily Rate:</strong> ₹<span id="dailyRate"><?php echo htmlspecialchars($daily_rate); ?></span></p>
        <p><strong>Status:</strong> 
            <span class="status <?php echo strtolower($status) === 'available' ? 'available' : 'unavailable'; ?>">
                <?php echo htmlspecialchars($status); ?>
            </span>
        </p>
    </div>

    <form action="book_ins.php" method="post">
        <input type="hidden" name="car_name" value="<?php echo htmlspecialchars($car_name); ?>">
        <input type="hidden" name="daily_rate" value="<?php echo htmlspecialchars($daily_rate); ?>">
        <input type="hidden" id="totalAmountInput" name="total_amount" value="0">

        <label>Pickup Date:</label>
        <input type="date" id="pickupDate" name="pickup_date" required>

        <label>Return Date:</label>
        <input type="date" id="returnDate" name="return_date" required>

        <div class="total">Total Amount: ₹<span id="totalAmount">0</span></div>

        <button type="submit" id="bookNowBtn" class="btn-primary" disabled>Book Now</button>
    </form>
</div>
<?php include('../includes/footer.php'); ?>

<script>
document.querySelectorAll('#pickupDate, #returnDate').forEach(input => {
    input.addEventListener('change', calculateTotal);
});

function calculateTotal() {
    let pickupValue = document.getElementById('pickupDate').value;
    let returnValue = document.getElementById('returnDate').value;
    let totalAmountField = document.getElementById('totalAmount');
    let totalAmountInput = document.getElementById('totalAmountInput');
    let bookBtn = document.getElementById('bookNowBtn');

    if (!pickupValue || !returnValue) {
        totalAmountField.textContent = '0';
        totalAmountInput.value = '0';
        bookBtn.disabled = true;
        return;
    }

    let pickup = new Date(pickupValue);
    let ret = new Date(returnValue);
    let dailyRate = parseFloat(document.getElementById('dailyRate').textContent);

    if (ret > pickup) {
        let days = Math.ceil((ret - pickup) / (1000 * 60 * 60 * 24));
        let total = (days * dailyRate).toFixed(2);
        totalAmountField.textContent = total;
        totalAmountInput.value = total;
        bookBtn.disabled = false;
    } else {
        totalAmountField.textContent = '0';
        totalAmountInput.value = '0';
        bookBtn.disabled = true;
    }
}
</script>
</body>
</html>
