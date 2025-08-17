<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | DriveEasy Car Rentals</title>
  <link rel="stylesheet" href="../assets/css/style-about.css"> 
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Smooth fade-in animation */
    .fade-up {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-in-out;
    }
    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
    /* Hover card effect */
    .hover-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 25px rgba(0,0,0,0.15);
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <?php include('../includes/navbar.php'); ?>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-24 text-center">
    <div class="container mx-auto px-6">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">About DriveEasy Car Rentals</h1>
      <p class="max-w-2xl mx-auto text-lg opacity-90">
        Reliable, affordable, and convenient car rental services since 2010.  
        Making every journey smooth, comfortable, and memorable.
      </p>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="py-16 container mx-auto px-6 grid md:grid-cols-2 gap-8">
    <div class="p-8 bg-white rounded-2xl shadow hover-card fade-up">
      <div class="text-4xl mb-3">🎯</div>
      <h2 class="text-2xl font-semibold mb-2">Our Mission</h2>
      <p>To provide exceptional car rental experiences with reliable vehicles, great customer service, and competitive prices for everyone.</p>
    </div>
    <div class="p-8 bg-white rounded-2xl shadow hover-card fade-up">
      <div class="text-4xl mb-3">🌟</div>
      <h2 class="text-2xl font-semibold mb-2">Our Vision</h2>
      <p>To be the leading car rental service known for innovation, sustainability, and trust—connecting people to their destinations with ease.</p>
    </div>
  </section>

  <!-- Story -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 text-center fade-up">
      <h2 class="text-3xl font-bold mb-6">Our Story</h2>
      <p class="max-w-3xl mx-auto mb-4">Founded in 2010 with just 5 cars and a dream, DriveEasy has grown into a trusted car rental company serving thousands across 15+ locations. From humble beginnings, we now manage a modern fleet of 500+ vehicles for all kinds of travelers.</p>
      <p class="max-w-3xl mx-auto">Our promise is simple: quality cars, transparent pricing, and top-notch service that make us the preferred choice for business and leisure alike.</p>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="py-16 container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-10">Why Choose DriveEasy?</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up">
        <div class="text-3xl mb-3">✅</div>
        <h3 class="text-xl font-semibold">Quality Vehicles</h3>
        <p>Regularly serviced and reliable cars for safe, smooth journeys.</p>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up">
        <div class="text-3xl mb-3">💰</div>
        <h3 class="text-xl font-semibold">Affordable Pricing</h3>
        <p>Transparent pricing with no hidden charges. Best value guaranteed.</p>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up">
        <div class="text-3xl mb-3">🕒</div>
        <h3 class="text-xl font-semibold">24/7 Support</h3>
        <p>Round-the-clock customer assistance and roadside help.</p>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-16 bg-gradient-to-r from-indigo-600 to-blue-600 text-white">
    <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8 text-center">
      <div class="fade-up">
        <h3 class="text-4xl font-bold">50K+</h3>
        <p>Happy Customers</p>
      </div>
      <div class="fade-up">
        <h3 class="text-4xl font-bold">500+</h3>
        <p>Vehicles in Fleet</p>
      </div>
      <div class="fade-up">
        <h3 class="text-4xl font-bold">15+</h3>
        <p>Locations</p>
      </div>
      <div class="fade-up">
        <h3 class="text-4xl font-bold">99%</h3>
        <p>Satisfaction Rate</p>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-20 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-4 fade-up">Ready to Hit the Road?</h2>
    <p class="max-w-2xl mx-auto mb-8 fade-up">Book your perfect ride today and experience hassle-free car rentals with unmatched service quality.</p>
    <div class="space-x-4 fade-up">
      <a href="#" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Book Now</a>
      <a href="#" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300">View Fleet</a>
    </div>
  </section>

  <!-- Footer -->
  <?php include('../includes/footer.php'); ?>

  <script>
    // Scroll animation
    const elements = document.querySelectorAll(".fade-up");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add("visible");
      });
    }, { threshold: 0.2 });
    elements.forEach(el => observer.observe(el));
  </script>

</body>
</html>
