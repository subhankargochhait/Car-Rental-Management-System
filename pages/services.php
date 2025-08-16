<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services-page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="../assets/css/admin.css"> -->
 <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <style>
        body{
            background-color: white;
        }
    .btn-logout,a{
    padding: 5px 10px;
    border-radius: 5px;
        }

         .container {
        max-width: 1100px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .filters {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    select, input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn {
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-secondary {
        background: #d1d5db;
        color: #333;
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .card img {
        width: 80px;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 20px;
        margin: 10px 0 5px;
    }

    .card p {
        color: #555;
        margin: 0 0 10px;
    }

    .price {
        font-weight: bold;
        color: #2563eb;
    }

    .status {
        display: inline-block;
        padding: 4px 10px;
        background: #d1fae5;
        color: #065f46;
        border-radius: 20px;
        font-size: 12px;
        margin-left: 5px;
    }

    .book-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #4f46e5, #3b82f6);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }
.status-unavailable {
    background-color: #ffe5e5; /* light red */
    border: 1px solid #ff4d4d;
}
.status-unavailable .status {
    background: #ff4d4d;
    color: white;
}

    </style>
  <!-- nav-bar-start -->
<?php include('../includes/navbar.php') ?>
   
    <!-- nav-bar-end -->

    <!-- Hero Section Start -->
    
    <div class="container">
    <h2>Available Cars</h2>
    
    <div class="filters">
        <select id="carFilter">
    <option value="All">All Types</option>
    <option value="SUV">SUV</option>
    <option value="Compact">Compact</option>
    <option value="Mid-size">Mid-size</option>
</select>
        <input type="text" placeholder="Max Price/Day">
        <button class="btn btn-primary">Apply Filters</button>
        <button class="btn btn-secondary">Clear</button>
    </div>

    <div class="card-grid">
<?php
$sql = "SELECT image, car_name, car_type, daily_rate, status FROM cars";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    // Add CSS class if unavailable
    $statusClass = ($row['status'] === 'Available') ? 'status-available' : 'status-unavailable';
?>
    <div class="card <?php echo $statusClass; ?>" data-type="<?php echo htmlspecialchars($row['car_type']); ?>">
        <img src="../admin/car_images/<?php echo htmlspecialchars($row['image']); ?>" alt="Car Image" style="width:100%; height:150px; object-fit:cover;">
        <h3><?php echo htmlspecialchars($row['car_name']); ?></h3>
        <p><?php echo htmlspecialchars($row['car_type']); ?></p>
        <p>Daily Rate: <span class="price"><?php echo htmlspecialchars($row['daily_rate']); ?></span></p>
        <p>Status: <span class="status"><?php echo htmlspecialchars($row['status']); ?></span></p>
       <?php if ($row['status'] === 'Available') { ?>
            <button class="book-btn" 
                onclick="window.location.href='signup.php?car_name=<?php echo urlencode($row['car_name']); ?>&car_type=<?php echo urlencode($row['car_type']); ?>&daily_rate=<?php echo $row['daily_rate']; ?>&image=<?php echo urlencode($row['image']); ?>'">
                Book This Car
            </button>
        <?php } else { ?>
            <button class="book-btn" disabled style="background: #ccc; cursor: not-allowed;">
                Not Available
            </button>
        <?php } ?>
    </div>
<?php
}
?>
</div>

</div>

    <!-- Hero Section End -->

          <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>

<script>
document.getElementById('carFilter').addEventListener('change', function () {
    let selectedType = this.value;
    let cars = document.querySelectorAll('.card');

    cars.forEach(card => {
        let carType = card.getAttribute('data-type');
        if (selectedType === "All" || carType === selectedType) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});
</script>

</body>
</html>
