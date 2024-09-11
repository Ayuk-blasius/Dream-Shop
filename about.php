<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Dream Shopping</title>
    <!-- Google Font for Better Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 0;
        }

        .about-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .about-header h1 {
            font-size: 36px;
            color: #333;
        }

        .about-header p {
            font-size: 18px;
            color: #666;
            margin-top: 10px;
        }

        .about-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .about-text {
            flex: 1;
            padding-right: 30px;
            max-width: 600px;
        }

        .about-text h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .about-text p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .about-image {
            flex: 1;
            text-align: center;
        }

        .about-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
                text-align: center;
            }
            .about-text {
                padding-right: 0;
                margin-bottom: 30px;
            }
        }

        /* Team Section */
        .team-section {
            margin-top: 50px;
            text-align: center;
        }

        .team-section h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 30px;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .team-member {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .team-member h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .team-member p {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<?php
include 'navbar.php';
?>

<!-- About Us Section -->
<div class="container">
    <div class="about-header">
        <h1>Welcome to Dream Shopping</h1>
        <p>Your one-stop shop for quality products and exceptional service</p>
    </div>

    <div class="about-content">
        <div class="about-text">
            <h2>Our Story</h2>
            <p>At Dream Shopping, we believe that shopping should be simple, enjoyable, and affordable. Founded in 2022, our mission has been to provide a carefully curated selection of high-quality products to our customers. With a focus on customer satisfaction and continuous improvement, we strive to offer only the best in everything we do.</p>
            <p>We are passionate about making every shopping experience a memorable one. Whether you're searching for the latest trends or everyday essentials, Dream Shopping is here to make sure you get exactly what you need, with service you can count on.</p>
        </div>
        <div class="about-image">
            <img src="images/logo2.png" alt="Dream Shopping Office">
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-container">
            <div class="team-member">
                <img src="images/dior.JPG" alt="Team Member">
                <h3>Blaise Dior</h3>
                <p>Founder & CEO</p>
            </div>
            
        </div>
    </div>
</div>

<?php include 'footer.php';?>

</body>
</html>
