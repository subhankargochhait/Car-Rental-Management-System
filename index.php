<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car-Rental-Management-System</title>
     <link rel="stylesheet" href="assets/css/style.css">
     
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    
</head>
<body>

 <!-- nav-bar-start -->
    <div class="contaner">
        <nav class="navbar">
       <div class="logo">
  <img src="assets/images/Frame.png" alt="Logo" />
  <h3 style="color: #1572D3;">RENTCARS</h3>
</div>
       <div>
         <ul>
            <li><a href="../index.php" class="active">Home</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="active">About Us</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="active">Services</a></li>
            <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="active">Contact Us</a></li>
        </ul>
       </div>
       <div class="nav-log">
           <button type="submit" name="login"><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/login.php" class="active" style="color: black;">Login</a></button>

            <button id="signup-button"><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/signup.php" class="active" style="color: white;">Sign Up</a></button>

               <button id="signup-button"><a href="/Travarsa_Internship/Car-Rental-Management-System/admin/login.php" class="active" style="color: white;">Admin/Login</a></button>
        </div>
    </nav>
    <!-- nav-bar-end -->

     <!-- hero-section-start -->
    <section class="hero hero-section">
        <div class="hero-content">
            <h1>Find, Book And <br>Rent A Car <span class="highlight">Easily</span></h1>
            <p>Get a car wherever and whenever you <br> need it with your iOS and Android device.</p>
            <div class="store-buttons">
                <img src="assets/images/image 2 (1).png" alt="Google Play">
                <img src="assets/images/image 3.png" alt="App Store">
            </div>
        </div>
        <div class="hero-image">
           <img src="assets/images/car%202%201.png" alt="Car Rental Image">
        </div>
    </section>
    <!-- hero-section-end -->

  <!-- card section end -->

  <section class="search-box">
    <div class="search-container">
      <div class="search-item">
        <span>📍</span>
        <div>
          <strong>Location</strong>
          <p>Search your location</p>
        </div>
      </div>
      <div class="divider"></div>
      <div class="search-item">
        <span>📅</span>
        <div>
          <strong>Pickup date</strong>
          <p>Tue 15 Feb, 09:00</p>
        </div>
      </div>
      <div class="divider"></div>
      <div class="search-item">
        <span>📅</span>
        <div>
          <strong>Return date</strong>
          <p>Thu 16 Feb, 11:00</p>
        </div>
      </div>
      <button class="search-btn">Search</button>
    </div>
  </section>

  <!-- how-it-work-section-start -->
    <section class="how-it-works">
    <button class="tagline">HOW IT WORK</button>
    <h2 class="section-title">Rent with following 3 working steps</h2>
    <div class="steps">
      <div class="step">
        <div class="icon-box">
          <img src="assets/images/location-tick.png" alt="Location Icon" />
        </div>
        <h3>Choose location</h3>
        <p>Choose your and find<br>your best car</p>
      </div>
      <div class="step">
        <div class="icon-box">
          <img src="assets/images/calendar.png" alt="Calendar Icon" />
        </div>
        <h3>Pick-up date</h3>
        <p>Select your pick up date and<br>time to book your car</p>
      </div>
      <div class="step">
        <div class="icon-box">
          <img src="assets/images/car.png" alt="Car Icon" />
        </div>
        <h3>Book your car</h3>
        <p>Book your car and we will deliver<br>it directly to you</p>
      </div>
    </div>
  </section>

  <!-- how-it-work-section-end -->

  <!-- Brand-section-start -->
   <div class="brand-logo">
    <img src="assets/images/Frame 29.png" alt="">
   </div>
  <!-- Brand-section-end -->

  <!-- WHY CHOOSE US Start -->

   <section class="why-choose-us">
    <!-- <div class="container"> -->
      <div class="car-image">
        <img src="assets/images/Audi 1.png" alt="Car Image" />
        <div class="background-shape"></div>
      </div>
      <div class="content">
        <button class="tagline">WHY CHOOSE US</button>
        <h2>We offer the best experience with our rental deals</h2>
        <div class="features">
          <div class="feature">
            <img src="assets/images/wallet.png" alt="Price Icon" />
            <div>
              <h4>Best price guaranteed</h4>
              <p>Find a lower price? We’ll refund you 100% of the difference.</p>
            </div>
          </div>
          <div class="feature">
            <img src="assets/images/user-tick.png" alt="Driver Icon" />
            <div>
              <h4>Experience driver</h4>
              <p>Don’t have driver? Don’t worry, we have many experienced driver for you.</p>
            </div>
          </div>
          <div class="feature">
            <img src="assets/images/24-support.png" alt="Delivery Icon" />
            <div>
              <h4>24 hour car delivery</h4>
              <p>Book your car anytime and we will deliver it directly to you.</p>
            </div>
          </div>
          <div class="feature">
            <img src="assets/images/messages-2.png" alt="Support Icon" />
            <div>
              <h4>24/7 technical support</h4>
              <p>Contact Rentcars support any time when you have a problem.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WHY CHOOSE US End -->

  <!-- Most-populer-section-start -->

  <h2 class="section-title">Most popular cars rental deals</h2>

  <div class="card-container">
    <div class="car-card">
      <img src="assets/images/ca-1.png" alt="Jaguar XE">
      <div class="car-name">Jaguar XE L P250</div>
      <div class="rating">★ 4.8 (2,436 reviews)</div>
      <div class="features">4 Passengers • Auto • Air Conditioning • 4 Doors</div>
      <div class="price">$1,800 /day</div>
      <a href="./pages/signup.php"><button class="rent-btn">Rent Now</button></a>
    </div>
    <div class="car-card">
      <img src="assets/images/car-2.png" alt="Audi R8">
      <div class="car-name">Audi R8</div>
      <div class="rating">★ 4.6 (1,936 reviews)</div>
      <div class="features">2 Passengers • Auto • Air Conditioning • 2 Doors</div>
      <div class="price">$2,100 /day</div>
      <a href="./pages/signup.php"><button class="rent-btn">Rent Now</button></a>
    </div>
    <div class="car-card">
      <img src="assets/images/car-3.png" alt="BMW M3">
      <div class="car-name">BMW M3</div>
      <div class="rating">★ 4.5 (2,036 reviews)</div>
      <div class="features">4 Passengers • Auto • Air Conditioning • 4 Doors</div>
      <div class="price">$1,600 /day</div>
      <a href="./pages/signup.php"><button class="rent-btn">Rent Now</button></a>
    </div>
    <div class="car-card">
      <img src="assets/images/car-4.png" alt="Lamborghini">
      <div class="car-name">Lamborghini Huracan</div>
      <div class="rating">★ 4.3 (2,236 reviews)</div>
      <div class="features">2 Passengers • Auto • Air Conditioning • 2 Doors</div>
      <div class="price">$2,300 /day</div>
     <a href="./pages/signup.php"><button class="rent-btn">Rent Now</button></a>
    </div>
  </div>

<button class="show-btn"><a href="./pages/services.php">Show all vehicles →</a> →</button>
  <!-- Most-populer-section-end -->

<!-- Footer-section-start -->
<?php include('includes/footer.php'); ?>



</body>
</html>