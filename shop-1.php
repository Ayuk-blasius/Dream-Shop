<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- AOS (Animate on Scroll) CSS -->
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
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .maindiv {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 20px;
        padding: 20px;
    }

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
        background-image: url('images/OSK.jpg');
        background-size: cover;
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

    .cta-button {
        display: inline-block;
        padding: 10px 10px;
        background-color: #ff6600;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .item-card {
        width: 250px;
        margin: 20px auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .item-card:hover {
        transform: scale(1.05);
    }

    .item-image {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .item-image-inner {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-card h3,
    .item-card p {
        text-align: center;
        margin: 10px 0;
    }

    .btn {
        margin-left: 40px;
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
</style>

<body>

<?php include 'navbar-2.php'; ?>

<!-- Hero Section -->
<section class="hero animate__animated animate__fadeIn" id="home">
    <div class="overlay"></div>
    <div class="hero-content">
        <marquee behavior="scroll" direction="left"><h1>DREAM SHOPPING</h1></marquee>
        <p>Get the best Outfits and Electronics</p><br>
        <div class="btn"><button class="btn btn-primary">SHOP NOW</button></div>
    </div>
</section>
<!-- End of Hero Section -->

<br><br>

<center><h1>All Products</h1></center>
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
<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzey0u9C2bbK8lr0zH7rWl5SA5hG35pN8eA2uRsiAc/a" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ZoZ8I/FYkvtn4fWkpNvYp+DJiK7s9WlRejRJ2XxfE60YHGpvbvieFH9kW8D2UtoP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Animation duration in milliseconds
        once: true, // Animation happens only once
    });
</script>

</body>
</html>
