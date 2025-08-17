<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car-Rental-Management-System</title>
     <link rel="stylesheet" href="assets/css/style.css">
     <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    
</head>
<body class="bg-gray-50">

     <!-- Navbar -->
    <!-- Navbar Start -->
  <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      
      <!-- Logo -->
      <a href="../index.php" class="flex items-center space-x-2">
        <img src="Frame.png" alt="Logo" class="h-10 w-auto">
        <h3 class="text-xl font-bold text-blue-600">RENTCARS</h3>
      </a>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8 font-medium text-gray-700">
        <li><a href="index.php" class="hover:text-blue-600 transition">Home</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="hover:text-blue-600 transition">About Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="hover:text-blue-600 transition">Services</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="hover:text-blue-600 transition">Contact Us</a></li>
      </ul>

      <!-- Buttons -->
      <div class="hidden md:flex space-x-4">
        <a href="/Travarsa_Internship/Car-Rental-Management-System/pages/login.php" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition">Login</a>
        <a href="/Travarsa_Internship/Car-Rental-Management-System/pages/signup.php" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">Sign Up</a>
        <a href="admin/login.php" class="px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-900 transition">Admin Login</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
      <ul class="flex flex-col space-y-3 px-6 py-4 text-gray-700 font-medium">
        <li><a href="../index.php" class="block hover:text-blue-600">Home</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/about.php" class="block hover:text-blue-600">About Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/services.php" class="block hover:text-blue-600">Services</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/contact_us.php" class="block hover:text-blue-600">Contact Us</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/login.php" class="block hover:text-blue-600">Login</a></li>
        <li><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/signup.php" class="block hover:text-blue-600">Sign Up</a></li>
        <li><a href="../admin/login.php" class="block hover:text-blue-600">Admin Login</a></li>
      </ul>
    </div>
  </nav>


  <!-- Navbar End -->

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

<button class="show-btn"><a href="./pages/services.php">Show all vehicles </a> →</button>
  <!-- Most-populer-section-end -->

<!-- Footer-section-start -->
<?php include('includes/footer.php'); ?>

  <script>
    // Toggle mobile menu
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

</body>
</html>