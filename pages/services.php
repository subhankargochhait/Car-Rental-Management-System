<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveEasy - Car Rental Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="../assets/css/style-services.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

 <script src="script.js"></script>

    
</head>
<body class="bg-gray-50">

 <?php include('../includes/navbar.php'); ?>

    <!-- Hero Section -->
    <section class="hero-gradient py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Premium Car Rental Services
            </h1>
            <p class="text-xl text-indigo-100 mb-8 max-w-3xl mx-auto">
                Experience the freedom of the road with our comprehensive car rental solutions. From economy to luxury, we have the perfect vehicle for every journey.
            </p>
            <button class="btn-primary text-white px-8 py-4 rounded-full text-lg font-semibold">
                🚗 Explore Our Fleet
            </button>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Rental Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Choose from our wide range of rental services designed to meet your specific needs and preferences.
                </p>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Daily Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 price-badge text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Popular
                    </div>
                    <div class="text-5xl mb-6">🚙</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Daily Rentals</h3>
                    <p class="text-gray-600 mb-6">Perfect for short trips and daily commutes. Flexible pickup and drop-off times with competitive rates.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> 24/7 availability</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Free cancellation up to 24hrs</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Full insurance coverage included</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Unlimited mileage</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-indigo-600 mb-2">$29<span class="text-lg text-gray-500">/day</span></div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Book Daily Rental
                        </button>
                    </div>
                </div>

                <!-- Weekly Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Save 30%
                    </div>
                    <div class="text-5xl mb-6">📅</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Weekly Rentals</h3>
                    <p class="text-gray-600 mb-6">Extended stays made affordable. Perfect for business trips and extended vacations with special weekly rates.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Up to 30% savings vs daily</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Free GPS navigation system</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> 24/7 roadside assistance</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Free additional driver</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-indigo-600 mb-2">$179<span class="text-lg text-gray-500">/week</span></div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Book Weekly Rental
                        </button>
                    </div>
                </div>

                <!-- Monthly Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Best Value
                    </div>
                    <div class="text-5xl mb-6">🗓️</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Monthly Rentals</h3>
                    <p class="text-gray-600 mb-6">Long-term solutions for extended stays. Ideal for relocations and temporary assignments with maximum savings.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Lowest rates guaranteed</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Vehicle maintenance included</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Flexible contract terms</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Priority vehicle selection</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-indigo-600 mb-2">$599<span class="text-lg text-gray-500">/month</span></div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Book Monthly Rental
                        </button>
                    </div>
                </div>

                <!-- Luxury Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Premium
                    </div>
                    <div class="text-5xl mb-6">💎</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Luxury Rentals</h3>
                    <p class="text-gray-600 mb-6">Premium vehicles for special occasions. Make every moment memorable with our luxury fleet collection.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Premium luxury brands</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> White-glove delivery service</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Personal concierge support</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Complimentary car wash</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-indigo-600 mb-2">$199<span class="text-lg text-gray-500">/day</span></div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Book Luxury Car
                        </button>
                    </div>
                </div>

                <!-- Corporate Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Business
                    </div>
                    <div class="text-5xl mb-6">🏢</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Corporate Rentals</h3>
                    <p class="text-gray-600 mb-6">Tailored solutions for businesses. Fleet management and corporate accounts with special enterprise pricing.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Volume discount pricing</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Dedicated account manager</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Flexible billing options</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Priority reservations</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600 mb-2">Custom Quote</div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Get Corporate Quote
                        </button>
                    </div>
                </div>

                <!-- One-Way Rentals -->
                <div class="service-card bg-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Flexible
                    </div>
                    <div class="text-5xl mb-6">🛣️</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">One-Way Rentals</h3>
                    <p class="text-gray-600 mb-6">Pick up in one city, drop off in another. Perfect for road trips and relocations across the country.</p>
                    <ul class="text-sm text-gray-600 mb-8 space-y-3">
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> 500+ pickup locations</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> No return trip required</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Trip planning assistance</li>
                        <li class="flex items-center"><span class="text-green-500 mr-3 text-lg">✓</span> Interstate travel approved</li>
                    </ul>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600 mb-2">From $49/day</div>
                        <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Plan Your Trip
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Our Services?</h2>
                <p class="text-xl text-gray-600">Experience the difference with our premium service features</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="feature-card text-center p-6">
                    <div class="feature-icon text-6xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Secure & Safe</h3>
                    <p class="text-gray-600">All vehicles are regularly maintained and thoroughly sanitized for your safety and peace of mind.</p>
                </div>

                <div class="feature-card text-center p-6">
                    <div class="feature-icon text-6xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Instant Booking</h3>
                    <p class="text-gray-600">Book your car in seconds with our streamlined online reservation system available 24/7.</p>
                </div>

                <div class="feature-card text-center p-6">
                    <div class="feature-icon text-6xl mb-4">🌟</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Premium Fleet</h3>
                    <p class="text-gray-600">Choose from our extensive collection of well-maintained, modern vehicles from top brands.</p>
                </div>

                <div class="feature-card text-center p-6">
                    <div class="feature-icon text-6xl mb-4">📞</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">24/7 Support</h3>
                    <p class="text-gray-600">Round-the-clock customer support and roadside assistance whenever you need help.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="hero-gradient py-20">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Hit the Road?</h2>
            <p class="text-xl text-indigo-100 mb-8">
                Join thousands of satisfied customers who trust us for their car rental needs. Book now and start your journey!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-indigo-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-colors">
                    🚗 Book Your Car Now
                </button>
                <button class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                    📱 Call: 1-800-RENTALS
                </button>
            </div>
        </div>
    </section>

      <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>


</body>
</html>