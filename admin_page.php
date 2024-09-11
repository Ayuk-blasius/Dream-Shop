<?php
session_start();
$name = $_SESSION["admin_name"];
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }

        body {
            display: flex;
            flex-direction: column;
        }

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
            transition: width 0.3s, transform 0.3s;
            z-index: 1000;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
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
            z-index: 900;
        }

        .content.expanded {
            margin-left: 0;
        }

        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background-color: #800020;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }

        .toggle-btn.active {
            display: block;
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

            .toggle-btn.active {
                display: block;
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

            .sidebar ul li {
                margin-bottom: 10px;
            }
        }

        .profile-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        #greeting {
            color: black;
            font-size: 24px;
            font-weight: bold;
        }

        .maindiv {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 20px;
            padding: 0 15px;
        }

        .card {
            background-color: gainsboro;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
        }

        .card .title {
            color: #ffc800;
            font-weight: bold;
            font-size: 24px;
        }

        .card .value {
            color: black;
            font-weight: bold;
            font-size: 24px;
        }

        @media (max-width: 768px) {
            .maindiv {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 576px) {
            .maindiv {
                grid-template-columns: 1fr;
            }

            .content {
                margin-left: 0;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                display: flex;
                justify-content: center;
                padding: 10px;
            }

            .sidebar ul {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .sidebar ul li {
                margin: 5px;
            }

            .sidebar ul li a {
                display: inline-block;
                text-align: center;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2 style="color: #ffc800; font-size: 20px;"><b>DREAM SHOPPING</b></h2>
        <br>
        <ul>
            <li><a href="afterlogin.php"><i class="fa-solid fa-home"></i> <span class="label">Home</span></a></li>
            <li><a href="admin_page.php"><i class="fa-solid fa-dashboard"></i> <span class="label">Dashboard</span></a></li>
            <li><a href="view-all-users.php"><i class="fa-solid fa-users"></i> <span class="label">Users</span></a></li>
            <li><a href="upload_item.php"><i class="fa-solid fa-bag-shopping"></i> <span class="label">Post items</span></a></li>
            <li><a href="view-post.php"><i class="fa-solid fa-users"></i> <span class="label">View Post</span></a></li>
            <li><a href="notification.php"><i class="fa-solid fa-bell"></i> <span class="label">Notifications</span></a></li>
            <li><a href="#"><i class="fa-solid fa-cart"></i> <span class="label">Orders</span></a></li>
            <li><a href="#"><i class="fa-solid fa-star"></i> <span class="label">Reviews</span></a></li>
            <hr style="background-color: white;">
            <li><a href="selection.php"><i class="fa-solid fa-user"></i> <span class="label">Add User</span></a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> <span class="label">Settings</span></a></li>
            <li><a href="logout.php"><i class="fa-solid fa-person-walking"></i> <span class="label">Logout</span></a></li>
            <li><a href="#"><i class="fa-solid fa-circle-question"></i> <span class="label">Help Center</span></a></li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Page Content -->
    <div id="content" class="container mt-4 content">
        <h2><span id="greeting"></span> <b class="adminname"><?php echo $name; ?></b></h2>
        <!-- Your page content here -->
        <div class="maindiv">
            <div class="card">
                <div class="card-header">
                    <p class="title">Total Balance</p>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#addFundsModal">Add Funds</button>
                </div>
                <p class="value">50,000 FCFA</p>
            </div>
            <div class="card">
                <p class="title">Available Amount</p>
                <p class="value">30,000 FCFA</p>
            </div>
            <div class="card">
                <p class="title">Used Balance</p>
                <p class="value">20,000 FCFA</p>
            </div>
            <div class="card">
                <p class="title">Pending Amount</p>
                <p class="value">5,000 FCFA</p>
            </div>
            <div class="card">
                <p class="title">No of Orders</p>
                <p class="value">5</p>
            </div>
            <div class="card">
                <p class="title">Messages</p>
                <p class="value">0</p>
            </div>
        </div>
    </div>

    <!-- Add Funds Modal -->
    <div class="modal fade" id="addFundsModal" tabindex="-1" role="dialog" aria-labelledby="addFundsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFundsModalLabel">Add Funds</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addFundsForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="amount">Amount to Add (FCFA)</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Bitcoin">Bitcoin</option>
                                <option value="MTN Momo">MTN Momo</option>
                                <option value="Orange Money">Orange Money</option>
                                <option value="PayPal">PayPal</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Funds</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to dynamically change the greeting based on time of day
        function updateGreeting() {
            var now = new Date();
            var hours = now.getHours();
            var greeting = "Good ";

            if (hours >= 0 && hours < 12) {
                greeting += "Morning";
            } else if (hours >= 12 && hours < 18) {
                greeting += "Afternoon";
            } else {
                greeting += "Evening";
            }

            document.getElementById("greeting").textContent = greeting;
        }

        // Call the updateGreeting function when the page loads
        document.addEventListener("DOMContentLoaded", function () {
            updateGreeting();
        });

        // Toggle sidebar
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        });

        // Show toggle button only on small screens
        function handleResize() {
            if (window.innerWidth <= 768) {
                toggleBtn.classList.add('active');
            } else {
                toggleBtn.classList.remove('active');
                sidebar.classList.remove('collapsed');
                content.classList.remove('expanded');
            }
        }

        window.addEventListener('resize', handleResize);
        window.addEventListener('DOMContentLoaded', handleResize);
    </script>
</body>

</html>
