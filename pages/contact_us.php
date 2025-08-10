<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
        <link rel="stylesheet" href="../assets/css/style-contact_us.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    
</head>
<body>

 <?php include('../includes/navbar.php'); ?>

    <!-- Header Section -->
    <div class="hero">
        <div class="container">
            <h1>Contact DriveEasy</h1>
            <p>We're here to help! Get in touch with our friendly team for bookings, support, or any questions about our car rental services.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Emergency Contact Banner -->
        <div class="emergency-banner">
            <h3>🚨 24/7 Emergency Roadside Assistance</h3>
            <p>Need immediate help? Call our emergency hotline: <strong>1-800-DRIVE-911</strong></p>
        </div>

        <!-- Contact Methods -->
        <div class="section">
            <h2 class="section-title">Get In Touch</h2>
            <div class="grid grid-4">
                <div class="contact-method">
                    <div class="contact-icon icon-blue">📞</div>
                    <h3>Phone</h3>
                    <p>Speak with our team</p>
                    <a href="tel:+1-800-555-0123">1-800-555-0123</a>
                </div>

                <div class="contact-method">
                    <div class="contact-icon icon-green">✉️</div>
                    <h3>Email</h3>
                    <p>Send us a message</p>
                    <a href="mailto:info@driveeasy.com">info@driveeasy.com</a>
                </div>

                <div class="contact-method">
                    <div class="contact-icon icon-orange">💬</div>
                    <h3>Live Chat</h3>
                    <p>Chat with support</p>
                    <a href="#" onclick="openChat()">Start Chat</a>
                </div>

                <div class="contact-method">
                    <div class="contact-icon icon-purple">📱</div>
                    <h3>WhatsApp</h3>
                    <p>Message us anytime</p>
                    <a href="https://wa.me/18005550123">+1-800-555-0123</a>
                </div>
            </div>
        </div>

        <!-- Contact Form and Info -->
        <div class="section">
            <div class="grid grid-2">
                <!-- Contact Form -->
                <div class="form-container">
                    <h2 style="margin-bottom: 2rem; color: #1f2937;">Send Us a Message</h2>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name *</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="booking">New Booking</option>
                                <option value="existing">Existing Reservation</option>
                                <option value="billing">Billing Question</option>
                                <option value="complaint">Complaint</option>
                                <option value="compliment">Compliment</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" placeholder="Please provide details about your inquiry..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full">Send Message</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="card" style="margin-bottom: 2rem;">
                        <h2>Business Hours</h2>
                        <div style="margin-top: 1.5rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span style="font-weight: 500;">Monday - Friday:</span>
                                <span>7:00 AM - 10:00 PM</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span style="font-weight: 500;">Saturday:</span>
                                <span>8:00 AM - 8:00 PM</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span style="font-weight: 500;">Sunday:</span>
                                <span>9:00 AM - 6:00 PM</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                                <span style="font-weight: 500; color: #dc2626;">Emergency Support:</span>
                                <span style="color: #dc2626;">24/7</span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h2>Response Times</h2>
                        <div style="margin-top: 1.5rem;">
                            <div style="margin-bottom: 1rem;">
                                <div style="font-weight: 500; margin-bottom: 0.25rem;">📞 Phone Calls</div>
                                <div style="color: #6b7280; font-size: 0.9rem;">Immediate during business hours</div>
                            </div>
                            <div style="margin-bottom: 1rem;">
                                <div style="font-weight: 500; margin-bottom: 0.25rem;">✉️ Email</div>
                                <div style="color: #6b7280; font-size: 0.9rem;">Within 2-4 hours</div>
                            </div>
                            <div style="margin-bottom: 1rem;">
                                <div style="font-weight: 500; margin-bottom: 0.25rem;">💬 Live Chat</div>
                                <div style="color: #6b7280; font-size: 0.9rem;">Within 5 minutes</div>
                            </div>
                            <div>
                                <div style="font-weight: 500; margin-bottom: 0.25rem;">🚨 Emergency</div>
                                <div style="color: #6b7280; font-size: 0.9rem;">Immediate 24/7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Locations -->
        <div class="section">
            <h2 class="section-title">Our Locations</h2>
            <div class="grid grid-3">
                <div class="location-card">
                    <div class="location-icon">🏢</div>
                    <h3>Downtown Office</h3>
                    <p>123 Main Street</p>
                    <p>New York, NY 10001</p>
                    <p style="margin-top: 1rem; font-weight: 500;">📞 (212) 555-0123</p>
                    <p>Mon-Fri: 7AM-10PM</p>
                </div>

                <div class="location-card">
                    <div class="location-icon">✈️</div>
                    <h3>Airport Location</h3>
                    <p>JFK International Airport</p>
                    <p>Terminal 4, Level 1</p>
                    <p>Queens, NY 11430</p>
                    <p style="margin-top: 1rem; font-weight: 500;">📞 (718) 555-0124</p>
                    <p>Daily: 5AM-12AM</p>
                </div>

                <div class="location-card">
                    <div class="location-icon">🚗</div>
                    <h3>Midtown Branch</h3>
                    <p>456 Broadway Avenue</p>
                    <p>New York, NY 10018</p>
                    <p style="margin-top: 1rem; font-weight: 500;">📞 (212) 555-0125</p>
                    <p>Mon-Sun: 8AM-9PM</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How do I make a reservation?</span>
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>You can make a reservation online through our website, by calling our customer service at 1-800-555-0123, or by visiting any of our locations. Online bookings are available 24/7 and often include special discounts.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What documents do I need to rent a car?</span>
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>You'll need a valid driver's license, a major credit card in your name, and you must be at least 21 years old. International customers may need an International Driving Permit along with their home country license.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Can I modify or cancel my reservation?</span>
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, you can modify or cancel your reservation up to 24 hours before your pickup time without any fees. Changes made within 24 hours may incur additional charges depending on availability.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What happens if I have an accident or breakdown?</span>
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Call our 24/7 emergency hotline immediately at 1-800-DRIVE-911. We provide roadside assistance, towing services, and replacement vehicles when needed. Your safety is our top priority.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Do you offer long-term rentals?</span>
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer competitive rates for weekly, monthly, and long-term rentals. Contact our sales team for customized packages and special pricing for extended rentals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  <!-- Footer-section-start -->
<?php include('../includes/footer.php'); ?>

    <script>
        // Contact Form Submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Simulate form submission
            alert('Thank you for your message! We will get back to you within 2-4 hours.');
            
            // Reset form
            this.reset();
        });

        // FAQ Toggle Function
        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('span:last-child');
            
            if (answer.classList.contains('active')) {
                answer.classList.remove('active');
                icon.textContent = '+';
            } else {
                // Close all other FAQs
                document.querySelectorAll('.faq-answer.active').forEach(item => {
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('span:last-child').textContent = '+';
                });
                
                // Open clicked FAQ
                answer.classList.add('active');
                icon.textContent = '−';
            }
        }

        // Open Chat Function
        function openChat() {
            alert('Live chat feature would open here! Our support team is available during business hours.');
        }
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96be4aa70240a753',t:'MTc1NDY0ODUzNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
