<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Dream Shopping</title>
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

        .contact-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-header h1 {
            font-size: 36px;
            color: #333;
        }

        .contact-header p {
            font-size: 18px;
            color: #666;
            margin-top: 10px;
        }

        .contact-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .contact-info {
            flex: 1;
            padding-right: 30px;
            max-width: 600px;
        }

        .contact-info h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .contact-info p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .contact-info ul {
            list-style: none;
        }

        .contact-info ul li {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .contact-info ul li i {
            margin-right: 10px;
            color: #007bff;
        }

        .contact-form {
            flex: 1;
            max-width: 600px;
        }

        .contact-form h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
        }

        .contact-form form input,
        .contact-form form textarea {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100%;
        }

        .contact-form form textarea {
            height: 150px;
            resize: none;
        }

        .contact-form form button {
            padding: 12px;
            border-radius: 5px;
            border: none;
            background-color: #800020;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .contact-form form button:hover {
            background-color: #880029;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-content {
                flex-direction: column;
            }
            .contact-info {
                padding-right: 0;
                margin-bottom: 30px;
            }
        }

        /* Footer Section */
        .contact-footer {
            margin-top: 50px;
            text-align: center;
        }

        .contact-footer p {
            font-size: 16px;
            color: #777;
        }

    </style>
</head>
<body>

<!-- Contact Us Section -->
<div class="container">
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Reach out to us using the form below or contact us directly via phone or email.</p>
    </div>

    <div class="contact-content">
        <!-- Contact Information Section -->
        <div class="contact-info">
            <h2>Get In Touch</h2>
            <p>If you have any questions or need further information about Dream Shopping, feel free to contact us using the details provided below.</p>
            <ul>
                <li><i class="fas fa-phone"></i> +237 620891958</li> <br>
                <li><i class="fas fa-envelope"></i>blaisedior1@gmail.com</i><br>Cheval Blanc Deido, Douala, Cameroon </li>
            </ul>
        </div>

        <!-- Contact Form Section -->
        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

<!-- Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
