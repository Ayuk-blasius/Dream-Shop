<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .top-navbar p {
            margin: 0;
            font-size: 1.1rem;
        }

        .top-navbar .icons a {
            text-decoration: none;
            color: black;
            margin-left: 20px;
        }

        .top-navbar .icons a:hover {
            color: #007bff;
        }

        .toggle-button {
            border: none;
            background: none;
            cursor: pointer;
        }

        .toggle-button i {
            font-size: 1.5rem;
        }

        body {
            --background-color-light: #f9f9f9;
            --text-color-light: #333;
            background-color: var(--background-color-light);
            color: var(--text-color-light);
        }

        .dark-mode {
            --background-color-dark: #333;
            --text-color-dark: #f9f9f9;
            background-color: var(--background-color-dark);
            color: var(--text-color-dark);
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
      background-color: rgba(0, 0, 0, 0.5);
    }
    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 10);
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
        }
        
        .item-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 250px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .item-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-card h3,
        .item-card p {
            margin: 10px 0;
        }

        .item-card .btn button {
            width: 100%;
        }

        #offer {
            margin: 50px 0;
            padding: 20px;
            text-align: center;
        }

        #offer .col-md-3 {
            margin-bottom: 20px;
        }

        #offer i {
            font-size: 32px;
            color: black;
        }

        @media screen and (max-width: 768px) {
            .home {
                flex-direction: column;
            }

            .content h1 {
                font-size: 2rem;
            }

            .item-card {
                width: 100%;
            }
        }

        .scroll-item {
            opacity: 0;
            transform: translateY(-50px);
            transition: all 0.4s ease-out;
        }

        .scroll-item.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-item.out-of-view {
            opacity: 0;
            transform: translateY(50px);
        }

        #other-cards {
            margin-top: 30px;
        }

        #other-cards .card {
            background-color: #a9a9a92b;
            height: 300px;
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
    </style>
</head>

<body>
    <!-- Top Navbar -->
    <div class="top-navbar">
        <p>WELCOME TO OUR SHOP</p>
        <div class="icons">
            <button id="toggle-button" class="toggle-button"><i class="fa-solid fa-moon"></i></button>
            <button id="toggle-button" class="toggle-button"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></button>
            <a href="admin_page.php"><i class="fa-solid fa-user"></i> Profile</a>
        </div>
    </div>

    <!-- Main Navbar -->
    <?php include 'navbar-1.php'; ?>

    <!-- home content  -->
     <!--hero contents-->
     <section class="hero" id="home">
      <div class="overlay"></div>
        <div class="hero-content">
        <marquee behavior="scroll" direction="left"><h1>DREAM SHOPPING</h1></marquee>
            <p>Get the best Outfits and Electronics</p><br>
            <div class="btn"><button class="btn btn-primary">SHOP NOW</button></div>
        </div>
    </section>
    <!-- home content  -->

    <br>
    <br>

    <!-- Items List section -->
<div class="container">
    <div class="row">
        <?php
        include 'connect.php';

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, price, image FROM items WHERE 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $counter = 0;
            while($row = $result->fetch_assoc()) {
                // Start a new row after every 4 items
                if ($counter % 4 == 0 && $counter != 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-md-3 mb-4">'; // Each item occupies 3 columns out of 12 (12/4=3)
                echo '<div class="item-card">';
                echo '<div class="item-image"><img src="'. $row["image"] . '" alt="' . $row["name"] . '" class="item-image-inner"></div>';
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>Price: $" . $row["price"]. "</p>";
                echo '<form action="cart.php" method="POST">';
                echo '<input type="hidden" name="product_id" value="'.$row['id'].'">';
                echo '<input type="hidden" name="product_name" value="'.$row['name'].'">';
                echo '<input type="hidden" name="product_price" value="'.$row['price'].'">';
                echo '<input type="hidden" name="product_image" value="'.$row['image'].'">';
                echo '<div class="btn"><button type="submit" class="btn btn-primary">Add to Cart</button></div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                $counter++;
            }
            echo '</div>'; // Close the last row
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</div>

        </div>
    </div>
    <br>
    <br>


    <!-- banner -->
            <div class="container" id="other-cards">
                <div class="row justify-content-center">
                    <div class="col-md-5 card-wrapper">
                        <div class="card">
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
                        <div class="card">
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
    <!-- end of banner  -->
     <br>
     <br>
    <!-- Offers section -->
     <center>
<div class="container" id="offer">
    <div class="row text-center">
        <div class="col-md-3 py-3 py-md-0">
            <i class="fa-solid fa-cart-shopping fa-3x mb-3"></i>
            <h3>Free Shipping</h3>
            <p>On orders over $1000</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i class="fa-solid fa-rotate-left fa-3x mb-3"></i>
            <h3>Easy Returns</h3>
            <p>30-day return policy</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i class="fa-solid fa-phone-volume fa-3x mb-3"></i>
            <h3>24/7 Support</h3>
            <p>Customer support</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i class="fa-solid fa-credit-card fa-3x mb-3"></i>
            <h3>Secure Payment</h3>
            <p>Safe and reliable</p>
        </div>
    </div>
</div>
</center>

<!-- Footer -->
<?php include 'footer.php';?>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7mZ4Tc6l6eRTb5y91Dtw4qGmKfyDxkN6f5a" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb7V3vFZlH8GN3wBOMy60e1FknzD1Ra3E6OqUgG3mH6O/xhcl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-Q5Sof2vjzI+X9p8VN/9o51Wqu68q/BxrUnj8MAKAlPb6jyz4h5uicD1oK95dd7F0" crossorigin="anonymous"></script>
<script>
    const toggleButton = document.getElementById('toggle-button');
    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
</script>
</body>
</html>

