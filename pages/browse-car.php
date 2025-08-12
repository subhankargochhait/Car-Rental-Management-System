<?php
session_start();
if (!isset($_SESSION["un"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="../assets/css/admin.css"> -->
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
    </style>
  <!-- nav-bar-start -->
<?php include('../includes/navbar-user.php') ?>
   
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
        <div class="card" data-type="SUV">
            
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/1.png" alt="Car">
            <h3>Defender</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$45</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/2.png" alt="Car">
            <h3>Mahindra Scorpio</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/3.png" alt="Car">
            <h3>Hyundai Creta</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$45</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images//SUV-CARS/4.png" alt="Car">
            <h3>Mahindra Thar ROXX</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/5.png" alt="Car">
            <h3>Tata Nexon</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$45</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/6.png" alt="Car">
            <h3>Tata Harrier</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/7.png" alt="Car">
            <h3>Maruti FRONX</h3>
            <p>SUV</p>
            <p>Daily Rate: <span class="price">$45</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="SUV">
            <img style="height: 150px; width: 250px;" src="../assets/images/SUV-CARS/8.png" alt="Car">
            <h3>2023 Honda Civic</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>
        </div>


        <!-- <h2 data-type="Compact">COMPACT-CARS</h2> -->
        <div class="card-grid">
         <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/1.png" alt="Car">
            <h3>Maruti Swift</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/2.png" alt="Car">
            <h3>Maruti Swift</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/3.png" alt="Car">
            <h3>Tata Tiago</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

         <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/4.png" alt="Car">
            <h3>Maruti Wagon R</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/5.png" alt="Car">
            <h3>Tata Altroz</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/6.png" alt="Car">
            <h3>Hyundai i20</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/7.png" alt="Car">
            <h3>Maruti Alto K10</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Compact">
            <img style="height: 150px; width: 250px;" src="../assets/images/COMPACT-CARS/8.png" alt="Car">
            <h3>Toyota Glanza</h3>
            <p>Compact</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>
        </div>

        <!-- <h2>MID-SIZE CARS</h2> -->
        <div class="card-grid">
           <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/1.png" alt="Car">
            <h3>Maruti Suzuki Dzire</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/2.png" alt="Car">
            <h3>Honda Amaze</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/3.png" alt="Car">
            <h3>Hyundai Aura</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/4.png" alt="Car">
            <h3>Tata Tigor</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/5.png" alt="Car">
            <h3>Honda Amaze 2nd Gen</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/6.png" alt="Car">
            <h3>Tata Tigor EV</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/7.png" alt="Car">
            <h3>Skoda Kylaq</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

        <div class="card" data-type="Mid-size">
            <img style="height: 150px; width: 250px;" src="../assets/images/MID-SIZE-CARS/8.png" alt="Car">
            <h3>Mahindra BE 6</h3>
            <p>Mid-size</p>
            <p>Daily Rate: <span class="price">$35</span></p>
            <p>Status: <span class="status">Available</span></p>
            <button class="book-btn">Book This Car</button>
        </div>

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
