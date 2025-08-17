<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us | DriveEasy</title>
  <link rel="stylesheet" href="../assets/css/style-contact_us.css"> 
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Fade-up animation */
    .fade-up {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.7s ease-in-out;
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
      transform: translateY(-8px);
      box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }
    /* FAQ */
    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.3s ease;
    }
    .faq-answer.active {
      max-height: 200px;
      padding-top: 10px;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <?php include('../includes/navbar.php'); ?>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-20 text-center">
    <div class="container mx-auto px-6">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact DriveEasy</h1>
      <p class="max-w-2xl mx-auto opacity-90">
        Need help with bookings, support, or general questions? Our team is always here for you.
      </p>
    </div>
  </section>

  <!-- Emergency Banner -->
  <div class="bg-red-600 text-white py-4 text-center font-semibold">
    🚨 24/7 Emergency Roadside Assistance – Call: 1-800-DRIVE-911
  </div>

  <!-- Contact Methods -->
  <section class="py-16 container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-10 fade-up">Get In Touch</h2>
    <div class="grid md:grid-cols-4 gap-6">
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl mb-3">📞</div>
        <h3 class="font-semibold text-lg">Phone</h3>
        <p class="text-gray-600 mb-2">Speak with our team</p>
        <a href="tel:+1-800-555-0123" class="text-blue-600">1-800-555-0123</a>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl mb-3">✉️</div>
        <h3 class="font-semibold text-lg">Email</h3>
        <p class="text-gray-600 mb-2">Send us a message</p>
        <a href="mailto:info@driveeasy.com" class="text-blue-600">info@driveeasy.com</a>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl mb-3">💬</div>
        <h3 class="font-semibold text-lg">Live Chat</h3>
        <p class="text-gray-600 mb-2">Chat with support</p>
        <a href="#" onclick="openChat()" class="text-blue-600">Start Chat</a>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl mb-3">📱</div>
        <h3 class="font-semibold text-lg">WhatsApp</h3>
        <p class="text-gray-600 mb-2">Message us anytime</p>
        <a href="https://wa.me/18005550123" class="text-blue-600">+1-800-555-0123</a>
      </div>
    </div>
  </section>

  <!-- Contact Form + Info -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10">
      <!-- Form -->
      <div class="bg-white p-8 rounded-2xl shadow fade-up">
        <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
        <form id="contactForm" class="space-y-4">
          <div class="grid md:grid-cols-2 gap-4">
            <input type="text" name="firstName" placeholder="First Name *" required class="w-full border p-3 rounded">
            <input type="text" name="lastName" placeholder="Last Name *" required class="w-full border p-3 rounded">
          </div>
          <div class="grid md:grid-cols-2 gap-4">
            <input type="email" name="email" placeholder="Email Address *" required class="w-full border p-3 rounded">
            <input type="tel" name="phone" placeholder="Phone Number" class="w-full border p-3 rounded">
          </div>
          <select name="subject" required class="w-full border p-3 rounded">
            <option value="">Select a subject *</option>
            <option value="booking">New Booking</option>
            <option value="existing">Existing Reservation</option>
            <option value="billing">Billing Question</option>
            <option value="complaint">Complaint</option>
            <option value="compliment">Compliment</option>
            <option value="other">Other</option>
          </select>
          <textarea name="message" rows="4" placeholder="Your Message *" required class="w-full border p-3 rounded"></textarea>
          <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Send Message</button>
        </form>
      </div>
      <!-- Info -->
      <div class="space-y-6 fade-up">
        <div class="bg-white p-6 rounded-2xl shadow">
          <h3 class="text-xl font-semibold mb-3">Business Hours</h3>
          <ul class="text-gray-700 space-y-1">
            <li><strong>Mon-Fri:</strong> 7AM - 10PM</li>
            <li><strong>Saturday:</strong> 8AM - 8PM</li>
            <li><strong>Sunday:</strong> 9AM - 6PM</li>
            <li class="text-red-600"><strong>Emergency Support:</strong> 24/7</li>
          </ul>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow">
          <h3 class="text-xl font-semibold mb-3">Response Times</h3>
          <p>📞 Phone: Immediate</p>
          <p>✉️ Email: 2-4 hrs</p>
          <p>💬 Chat: 5 mins</p>
          <p>🚨 Emergency: Instant</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Locations -->
  <section class="py-16 container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-10 fade-up">Our Locations</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl">🏢</div>
        <h3 class="font-semibold mt-2">Downtown Office</h3>
        <p>123 Main Street, NY 10001</p>
        <p class="font-semibold mt-2">📞 (212) 555-0123</p>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl">✈️</div>
        <h3 class="font-semibold mt-2">Airport Branch</h3>
        <p>JFK Terminal 4, Queens, NY</p>
        <p class="font-semibold mt-2">📞 (718) 555-0124</p>
      </div>
      <div class="p-6 bg-white rounded-2xl shadow hover-card fade-up text-center">
        <div class="text-3xl">🚗</div>
        <h3 class="font-semibold mt-2">Midtown Branch</h3>
        <p>456 Broadway Avenue, NY 10018</p>
        <p class="font-semibold mt-2">📞 (212) 555-0125</p>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 max-w-2xl">
      <h2 class="text-3xl font-bold text-center mb-10 fade-up">FAQs</h2>
      <div class="space-y-4">
        <div class="bg-white p-4 rounded-lg shadow hover-card">
          <div class="flex justify-between items-center cursor-pointer" onclick="toggleFAQ(this)">
            <span>How do I make a reservation?</span><span>+</span>
          </div>
          <div class="faq-answer text-gray-600 mt-2">
            Online via website, phone (1-800-555-0123), or at any branch. Online bookings often have discounts.
          </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow hover-card">
          <div class="flex justify-between items-center cursor-pointer" onclick="toggleFAQ(this)">
            <span>What documents do I need?</span><span>+</span>
          </div>
          <div class="faq-answer text-gray-600 mt-2">
            Valid license, credit card, age 21+. International: passport + IDP may be needed.
          </div>
        </div>
        <!-- Add more FAQs here -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include('../includes/footer.php'); ?>

  <script>
    // Scroll fade animation
    const items = document.querySelectorAll(".fade-up");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add("visible");
      });
    }, { threshold: 0.2 });
    items.forEach(el => observer.observe(el));

    // Contact Form
    document.getElementById('contactForm').addEventListener('submit', e => {
      e.preventDefault();
      alert("✅ Thank you for your message! We'll respond within 2-4 hours.");
      e.target.reset();
    });

    // FAQ toggle
    function toggleFAQ(el) {
      const answer = el.nextElementSibling;
      const icon = el.querySelector("span:last-child");
      if (answer.classList.contains("active")) {
        answer.classList.remove("active");
        icon.textContent = "+";
      } else {
        document.querySelectorAll(".faq-answer").forEach(a => a.classList.remove("active"));
        document.querySelectorAll(".faq-answer + span");
        answer.classList.add("active");
        icon.textContent = "−";
      }
    }

    // Chat placeholder
    function openChat() {
      alert("💬 Live chat will open here. Available during business hours.");
    }
  </script>
</body>
</html>
