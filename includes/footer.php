<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentCars Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Lexend', sans-serif;
            background: white;
        }
        footer {
            background: #f8f9fa;
            color: #333;
            padding: 50px 20px 20px;
            border-top: 3px solid #1572D3;
        }
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: auto;
        }
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1572D3;
        }
        .footer-col h4 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #1572D3;
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
        }
        .footer-col ul li {
            margin-bottom: 8px;
        }
        .footer-col ul li a {
            text-decoration: none;
            color: #555;
            transition: 0.3s;
        }
        .footer-col ul li a:hover {
            color: #1572D3;
            padding-left: 5px;
        }
        .social-icons a {
            display: inline-block;
            margin-right: 10px;
            font-size: 18px;
            color: white;
            background: #1572D3;
            padding: 8px;
            border-radius: 50%;
            transition: 0.3s;
        }
        .social-icons a:hover {
            background: #0f5aa0;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 15px;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #ddd;
        }
        @media (max-width: 600px) {
            .footer-container {
                text-align: center;
            }
            .social-icons a {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<footer>
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-logo">🚗 RENTCARS</div>
            <ul>
                <li>📍 Travarsa, Kolkata, Akankha, INDIA</li>
                <li>📞 +91 85091*****</li>
                <li>✉️ example@gmail.com</li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Browse Cars</a></li>
                <li><a href="#">My Rentals</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Special Offers</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Resources</h4>
            <ul>
                <li><a href="#">Help Centre</a></li>
                <li><a href="#">How to Rent</a></li>
                <li><a href="#">Policies</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>About Us</h4>
            <ul>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Why Choose Us</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Press Center</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 RENTCARS • All Rights Reserved <br>
        Made with ❤️ by Subhankar Guchhait
    </div>
</footer>

</body>
</html>
