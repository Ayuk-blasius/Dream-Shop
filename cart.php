<?php
session_start();

// Check if the cart session is set, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $product = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => 1
        );
        $_SESSION['cart'][] = $product;
    }

    header('Location: cart.php');
    exit();
}

// Handle updating item quantities
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity_id'])) {
    $update_id = $_POST['update_quantity_id'];
    $new_quantity = $_POST['quantity'];

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $update_id) {
            if ($new_quantity > 0) {
                $item['quantity'] = $new_quantity;
            } else {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
            break;
        }
    }

    header('Location: cart.php');
    exit();
}

// Handle removing items from the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }

    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .sidebar {
    width: 250px;
    background: #800020;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    transition: width 0.3s;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin-bottom: 20px;
}

.sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
    transition: color 0.3s;
}

.sidebar ul li a:hover {
    color: #ffc800;
}

.sidebar ul li a .label {
    margin-left: 10px;
}

.sidebar ul.profile-section {
    margin-top: auto;
}

.content {
    margin-left: 250px;
    padding: 20px;
    flex: 1;
    overflow-y: auto;
    transition: margin-left 0.3s;
}

.adminname {
    padding: 5px;
    border-radius: 5px;
    color: #ffc800;
}

@media (max-width: 768px) {
    .sidebar {
        width: 60px;
    }

    .content {
        margin-left: 60px;
    }

    .sidebar ul li a .label {
        display: none;
    }

    .sidebar ul li a i {
        font-size: 24px;
    }
}
        .main-content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
<div class="sidebar">
<h2 style="color: #ffc800; font-size: 25px;"><b>DREAM SHOPPING</b></h2>
<br>
    <ul>
        <li>
            <a href="userafterlogin.php">
                <i class="fa-solid fa-home"></i>
                <span class="label">Home</span>
            </a>
        </li>
        <li>
            <a href="user_page.php">
                <i class="fa-solid fa-dashboard"></i>
                <span class="label">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="recieve_notif.php">
                <i class="fa-solid fa-envelope"></i>
                <span class="label">Notifications</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="label">Orders</span>
            </a>
        </li>
        <li>
            <a href="edit_user_profile.php">
                <i class="fa-solid fa-user-edit"></i>
                <span class="label">Edit Profile</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-star"></i>
                <span class="label">Reviews</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                <span class="label">Settings</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa-solid fa-person-walking"></i>
                <span class="label">Logout</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-circle-question"></i>
                <span class="label">Help Center</span>
            </a>
        </li>
    </ul>
    <ul class="profile-section">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModalUpload">Upload Image</a>
                <a class="dropdown-item" href="#" id="deleteImage">Delete Image</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModalChange">Change Image</a>
            </div>
        </li>
    </ul>
</div>

    <!-- Main Content -->
    <div class="main-content container">
        <h1>Your Cart</h1>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0; // Initialize total price
                    foreach ($_SESSION['cart'] as $item):
                        $item_total = $item['price'] * $item['quantity']; // Calculate the total for the current item
                        $total_price += $item_total; // Add to the total price
                    ?>
                    <tr>
                        <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" style="width: 50px;"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo $item['price']; ?></td>
                        <td>
                            <form action="cart.php" method="POST" style="display: flex;">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $item['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control" style="width: 60px; margin-right: 10px;">
                                <button type="submit" class="btn btn-info">Update</button>
                            </form>
                        </td>
                        <td>$<?php echo $item_total; ?></td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="remove_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total Price:</strong></td>
                        <td><strong>$<?php echo $total_price; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="userafterlogin.php" class="btn btn-secondary">Continue Shopping</a>
                <a href="process_payment.php" class="btn btn-success">Proceed with Payment</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
