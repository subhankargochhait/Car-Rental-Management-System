<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Modern Car Rental</title>
    <link rel="stylesheet" href="../assets/css/style-services.css">
      
</head>
<body>
     <!-- nav-bar-start -->
    <div class="contaner">
        <nav class="navbar">
       <div class="logo">
  <img src="../Frame.png" alt="Logo" />
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

               <button id="signup-button"><a href="/Travarsa_Internship/Car-Rental-Management-System/pages/admin.php" class="active" style="color: white;">Admin/Login</a></button>
        </div>

    </nav>
    <!-- nav-bar-end -->
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-element floating-1"></div>
        <div class="floating-element floating-2"></div>
        <div class="floating-element floating-3"></div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Drive Your<br>
                    <span class="hero-subtitle">Adventure</span>
                </h1>
                <p class="hero-description">
                    Discover premium car rentals with unmatched comfort, style, and convenience for every journey
                </p>
                <div class="button-group">
                    <button class="btn btn-primary">Explore Fleet</button>
                    <button class="btn btn-secondary">Learn More</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicle Categories -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Our Fleet</h2>
            <p class="section-description">
                Choose from our premium collection of vehicles designed for every adventure
            </p>

            <div class="grid grid-3">
                <!-- Economy -->
                <div class="card gradient-card emerald-card">
                    <span class="card-icon">🚗</span>
                    <h3 class="card-title">Economy Class</h3>
                    <p class="card-description">Perfect for city drives and budget-conscious travelers</p>
                    <ul class="card-features">
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">💰</span>
                                <span>Starting Price</span>
                            </span>
                            <span class="feature-value">$25/day</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">⛽</span>
                                <span>Fuel Efficiency</span>
                            </span>
                            <span>Excellent</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">👥</span>
                                <span>Capacity</span>
                            </span>
                            <span>4-5 Seats</span>
                        </li>
                    </ul>
                    <button class="card-button white-button">View Economy Cars</button>
                </div>

                <!-- SUV -->
                <div class="card gradient-card blue-card">
                    <span class="card-icon">🚙</span>
                    <h3 class="card-title">SUV Collection</h3>
                    <p class="card-description">Spacious comfort for families and group adventures</p>
                    <ul class="card-features">
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">💰</span>
                                <span>Starting Price</span>
                            </span>
                            <span class="feature-value">$55/day</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">🧳</span>
                                <span>Cargo Space</span>
                            </span>
                            <span>Extra Large</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">👥</span>
                                <span>Capacity</span>
                            </span>
                            <span>7-8 Seats</span>
                        </li>
                    </ul>
                    <button class="card-button white-button blue">View SUV Collection</button>
                </div>

                <!-- Luxury -->
                <div class="card gradient-card rose-card">
                    <span class="card-icon">🏎️</span>
                    <h3 class="card-title">Luxury Elite</h3>
                    <p class="card-description">Premium vehicles for special occasions and VIP experiences</p>
                    <ul class="card-features">
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">💰</span>
                                <span>Starting Price</span>
                            </span>
                            <span class="feature-value">$120/day</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">✨</span>
                                <span>Features</span>
                            </span>
                            <span>Premium</span>
                        </li>
                        <li>
                            <span class="feature-label">
                                <span class="feature-icon">🎯</span>
                                <span>Service</span>
                            </span>
                            <span>VIP Treatment</span>
                        </li>
                    </ul>
                    <button class="card-button white-button rose">View Luxury Fleet</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section features-section">
        <div class="container">
            <h2 class="section-title">Why Choose Us</h2>
            <p class="section-description">Experience the difference with our premium services</p>

            <div class="grid grid-4">
                <div class="card feature-card">
                    <div class="feature-icon-wrapper blue-gradient">🛡️</div>
                    <h3 class="card-title">Full Protection</h3>
                    <p class="card-description">Comprehensive insurance coverage with 24/7 roadside assistance for peace of mind</p>
                </div>

                <div class="card feature-card">
                    <div class="feature-icon-wrapper emerald-gradient">🚚</div>
                    <h3 class="card-title">Free Delivery</h3>
                    <p class="card-description">Convenient vehicle delivery to your location anywhere within the city limits</p>
                </div>

                <div class="card feature-card">
                    <div class="feature-icon-wrapper purple-gradient">📱</div>
                    <h3 class="card-title">Easy Booking</h3>
                    <p class="card-description">Simple online booking process with instant confirmation and flexible options</p>
                </div>

                <div class="card feature-card">
                    <div class="feature-icon-wrapper amber-gradient">🎧</div>
                    <h3 class="card-title">24/7 Support</h3>
                    <p class="card-description">Round-the-clock customer service to assist you throughout your rental experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section pricing-section">
        <div class="container">
            <h2 class="section-title">Simple Pricing</h2>
            <p class="section-description">Choose the perfect plan for your journey</p>

            <div class="grid grid-3">
                <!-- Hourly -->
                <div class="card price-card">
                    <div class="price-icon">⚡</div>
                    <h3 class="price-title">Quick Rental</h3>
                    <div class="price-amount">$12</div>
                    <div class="price-period">per hour</div>
                    <ul class="price-features">
                        <li><span class="check-icon">✓</span>Instant booking</li>
                        <li><span class="check-icon">✓</span>Fuel included</li>
                        <li><span class="check-icon">✓</span>Basic insurance</li>
                        <li><span class="check-icon">✓</span>City driving</li>
                    </ul>
                    <button class="card-button btn-primary">Book Hourly</button>
                </div>

                <!-- Daily -->
                <div class="card price-card popular-card">
                    <div class="popular-badge">MOST POPULAR</div>
                    <div class="price-icon">🌟</div>
                    <h3 class="price-title">Daily Adventure</h3>
                    <div class="price-amount">$45</div>
                    <div class="price-period">per day</div>
                    <ul class="price-features">
                        <li><span class="check-icon">✓</span>24-hour access</li>
                        <li><span class="check-icon">✓</span>300 miles included</li>
                        <li><span class="check-icon">✓</span>Full insurance</li>
                        <li><span class="check-icon">✓</span>GPS navigation</li>
                        <li><span class="check-icon">✓</span>24/7 support</li>
                    </ul>
                    <button class="card-button btn-primary">Book Daily</button>
                </div>

                <!-- Weekly -->
                <div class="card price-card">
                    <div class="price-icon">🏆</div>
                    <h3 class="price-title">Weekly Freedom</h3>
                    <div class="price-amount">$280</div>
                    <div class="price-period">per week</div>
                    <ul class="price-features">
                        <li><span class="check-icon">✓</span>7-day rental</li>
                        <li><span class="check-icon">✓</span>Unlimited miles</li>
                        <li><span class="check-icon">✓</span>Premium insurance</li>
                        <li><span class="check-icon">✓</span>Concierge service</li>
                        <li><span class="check-icon">✓</span>Free upgrades</li>
                    </ul>
                    <button class="card-button btn-primary">Book Weekly</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section cta-section">
        <div class="cta-floating-1"></div>
        <div class="cta-floating-2"></div>
        
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Drive?</h2>
                <p class="cta-description">
                    Join thousands of satisfied customers who've discovered the joy of premium car rentals. 
                    Your perfect vehicle is just one click away.
                </p>
                <div class="button-group">
                    <button class="btn btn-white">Start Your Journey</button>
                    <button class="btn btn-outline">📞 Call: (555) 123-RENT</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
