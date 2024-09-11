<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="jquery.js" type="text/JavaScript"></script>
	<script src="jqueryUI.js" type="text/JavaScript"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        font-family: Georgia, 'Times New Roman', Times, serif;;
    }

    body {
        --background-color-light: #f9f9f9;
        --text-color-light: #333;
        background-color: var(--background-color-light);
        color: var(--text-color-light);
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }

    .dark-mode {
        --background-color-dark: #333;
        --text-color-dark: #f9f9f9;
        background-color: var(--background-color-dark);
        color: var(--text-color-dark);
    }

    .top-navbar {
        background-color: #f8f9fa;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        width: 100%;
    }
    .top-navbar p {
        margin: 0;
        font-size: 1.2rem;
    }
    .icons {
        display: flex;
        gap: 15px;
        align-items: center;
    }
    .toggle-container {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .toggle-container a {
        text-decoration: none;
        color: inherit;
    }
    .toggle-container a:hover {
        color: #007bff;
    }
    @media (max-width: 576px) {
        .top-navbar {
            flex-direction: column;
            text-align: center;
        }
        .icons {
            margin-top: 10px;
        }
    }

    .aaa {
        border: none;
    }

    @media screen and (max-width: 400px) {
        .top-navbar a {
            font-size: 13px;
        }

        .top-navbar p {
            font-size: 13px;
        }
    }

    @media screen and (max-width: 320px) {
        .top-navbar a {
            font-size: 10px;
        }

        .top-navbar p {
            font-size: 13px;
        }
    }

    @media screen and (max-width: 310px) {
        .top-navbar a {
            font-size: 8%;
            margin-left: 0;
        }

        .top-navbar p {
            font-size: 13px;
            margin-top: 20px;
        }
    }

    /* Navbar css */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }
    
    .hero {
      position: relative;
      background-image: url('images/image.png');
      background-size: cover;
      object-fit:contain;
      background-repeat: no-repeat;
      background-position: center;
      color: #fff; 
      padding: 100px 0; 
    }
    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }
    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    }
    .hero-content h1 {
      font-size: 4em;
      margin-bottom: 20px;
      font-weight: 900;
      
    }
    .hero-content p {
      font-size: 2em;
      margin-bottom: 20px;
      font-weight: 500;
    }

    .btn {
            margin-left: AUTO;
        }

        .btn button {
            width: 150px;
            height: 32px;
            letter-spacing: 3px;
            background-color: #800020;
            color: white;
            border-radius: 5px;
            border: none;
            transition: 0.5s ease;
            cursor: pointer;
        }

        .btn button:hover {
            background-color: #ffc800;
            color: black;
            border: none;
            transform: scale(1.1); 
            transition: transform 0.3s ease;
        }



    #product-cards {
        margin-top: 100px;
    }

    .card {
        margin-bottom: 20px;
    }

    #product-cards h1 {
        color: #ffc800;
        text-shadow: 1px 1px 1px black;
        border-bottom: #ffc800;
    }

    #product-cards button {
        margin-right: 20%;
    }

    #product-cards .card h3 {
        font-size: 25px;
        color: black;
    }

    #product-cards .card p {
        font-size: 12px;
        margin-top: 5px;
        color: black;
    }

    .star i {
        margin-left: 5px;
        font-size: 13px;
    }

    .checked {
        color: #ffc800;
    }

    #product-cards .card h2 {
        font-size: 20px;
        color: black;
        margin-top: 20px;
    }

    #product-cards .card h2 span {
        float: right;
        color: black;
        cursor: pointer;
    }

    @media screen and (max-width: 1000px) {
        #product-cards .card h3 {
            font-size: 18px;
        }
    }

    .item-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: 200px;
        float: left;
    }

    .item-image {
        text-align: center;
    }

    .border {
        border: none;
        width: 55%;
        border-color: 4px solid black;
        background: #800020;
        color: white;
        border-radius: 20px;
    }

    .item-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 16px;
        text-align: center;
        margin: 16px;
        width: 250px;
        display: inline-block;
        vertical-align: top;
        transform: scale(1.1); 
        transition: transform 0.3s ease;
    }
    .item-image {
        height: 200px;
        overflow: hidden;
    }
    .item-image img {
        max-width: 100%;
        height: auto;
    }
    .btn {
        margin-top: 10px;
    }

    @media (max-width: 600px) {
        .item-card {
            width: 90%;
            margin: 10px auto;
        }

        .item-image {
            height: 150px;
        }

        .item-card h3 {
            font-size: 1.2em;
        }

        .item-card p {
            font-size: 1em;
        }

        .btn {
            margin-top: 5px;
        }
    }

    @media (max-width: 400px) {
        .item-card {
            width: 100%;
            margin: 5px auto;
        }

        .item-image {
            height: 120px;
        }

        .item-card h3 {
            font-size: 1em;
        }

        .item-card p {
            font-size: 0.9em;
        }

        .btn {
            margin-top: 3px;
        }
    }
    @media (max-width: 799px) {
    body {
        overflow-y: hidden; 
    }
}

@media (max-width: 420px) {
    body {
        overflow-y: hidden; 
    }
}

/* Product cards styling */
#other-cards {
            margin-top: 30px;
        }

        #other-cards .card {
            background-color: #a9a9a92b;
            height:300px;
            padding-left: 50px;
            padding-right: 50px;
        }

        #other-cards .card h3 {
            margin-top: 30px;
            color: black;
            margin-left: 10px;
            letter-spacing: 3px;
        }

        #other-cards .card h5 {
            margin-top: 15px;
            font-weight: bold;
            font-size: 18px;
            color: black;
            margin-left: 10px;
            letter-spacing: 3px;
            border: 2px solid black;
            width: 200px;
        }

        #other-cards .card p {
            margin-top: 10px;
            font-weight: 100;
            font-size: 15px;
            color: black;
            margin-left: 10px;
            letter-spacing: 3px;
        }

        #shopnow {
            width: 130px;
            height: 30px;
            margin-top: 10px;
            margin-left: 10px;
            letter-spacing: 3px;
            color: white;
            background-color: black;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        @media screen and (max-width: 1000px) {
            #other-cards .card h3 {
                margin-top: 5px;
                font-size: 20px;
            }

            #other-cards .card h5 {
                margin-top: 5px;
                font-size: 15px;
            }

            #other-cards .card p {
                margin-top: 8px;
            }

            #shopnow {
                margin-top: 8px;
                width: 120px;
                height: 30px;
                font-size: 16px;
            }
        }

html {
    scroll-behavior: smooth;
}
</style>
<body>
    <!-- Top navbar -->
    <div class="top-navbar animate__animated animate__fadeInDown">
        <p>WELCOME TO OUR SHOP</p>
        <div class="icons">
            <div class="toggle-container">
                <button id="toggle-button" class="aaa"><i class="fa-solid fa-cloud-moon"></i></button>
                <a href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Register</a>
                <a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- end of navbar -->

    <!-- hero contents -->
    <section class="hero animate__animated animate__fadeIn" id="home">
      <div class="overlay"></div>
        <div class="hero-content">
        <marquee behavior="scroll" direction="left"><h1>DREAM SHOPPING</h1></marquee>
            <p>Get the best Outfits and Electronics</p><br>
            <div class="btn"><button class="btn btn-primary">SHOP NOW</button></div>
        </div>
    </section>
    <!-- end of hero contents -->

    <!-- Items List section -->
    <center><h1><b>PRODUCTS</b></h1></center>
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        include 'connect.php';

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, price, image FROM items WHERE 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="item-card" data-aos="zoom-in">';
                echo '<div class="item-image"><img src="'. $row["image"] . '" alt="' . $row["name"] . '" class="item-image-inner"></div>';
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>Price: $" . $row["price"]. "</p>";
                echo '<div class="btn"><a href="register.php"><button class="btn btn-primary">Add to cart</button></a></div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>

    <!-- Banner -->
    <div class="scroll-item">
        <div class="container" id="other-cards">
            <div class="row justify-content-center">
                <div class="col-md-5 card-wrapper">
                    <div class="card" data-aos="slide-up">
                        <img src="images/111.png" alt="" class="img-fluid" style="margin-top: 80px; margin-left: 180px;">
                        <div class="card-img-overlay">
                            <h1>QUALITY BELTS</h1>
                            <h5>Latest Collection</h5>
                            <p>Up to 50% off</p>
                            <button id="shopnow">Shop Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 card-wrapper">
                    <div class="card" data-aos="slide-up">
                        <img src="images/222.png" alt="" class="img-fluid" style="margin-top: 80px; margin-left: 150px;">
                        <div class="card-img-overlay">
                            <h1>TOP MOCASSINS</h1>
                            <h5>Latest Collection</h5>
                            <p>Up to 50% off</p>
                            <button id="shopnow">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of banner -->

    <!-- Offers section -->
    <div class="container" id="offer">
        <div class="row text-center">
            <div class="col-md-3 py-3 py-md-0" data-aos="flip-left">
                <i class="fa-solid fa-cart-shopping fa-3x mb-3"></i>
                <h3>Free Shipping</h3>
                <p>On orders over $1000</p>
            </div>
            <div class="col-md-3 py-3 py-md-0" data-aos="flip-left">
                <i class="fa-solid fa-rotate-left fa-3x mb-3"></i>
                <h3>Easy Returns</h3>
                <p>30-day return policy</p>
            </div>
            <div class="col-md-3 py-3 py-md-0" data-aos="flip-left">
                <i class="fa-solid fa-phone-volume fa-3x mb-3"></i>
                <h3>24/7 Support</h3>
                <p>Customer support</p>
            </div>
            <div class="col-md-3 py-3 py-md-0" data-aos="flip-left">
                <i class="fa-solid fa-credit-card fa-3x mb-3"></i>
                <h3>Secure Payment</h3>
                <p>Safe and reliable</p>
            </div>
        </div>
    </div>
    <!-- end of offers -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- end of footer -->

    <!-- JS Links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzey0u9C2bbK8lr0zH7rWl5SA5hG35pN8eA2uRsiAc/a" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ZoZ8I/FYkvtn4fWkpNvYp+DJiK7s9WlRejRJ2XxfE60YHGpvbvieFH9kW8D2UtoP" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000,
        once: true,
      });
    </script>
</body>
</html>
