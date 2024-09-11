<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /*-------navbar------*/
        #navbar {
            background-color: #800020;
        }
        #logo {
            margin-left: 15px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 6px;
        }
        #logo span {
            color: #ffc800;
        }
        #logo #span1 {
            font-size: 30px;
        }
        .navbar-nav {
            margin-left: 20px;
        }
        .nav-item {
            margin-left: 10px;
        }
        .nav-item .nav-link {
            color: white;
            margin-left: 2px;
            text-shadow: 0px 0px 1px black;
            transition: 0.5s ease;
        }
        .nav-item .nav-link:hover {
            color: #ffc800;
        }
        .dropdown-menu li a {
            color: white;
            transition: 0.5s ease;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu li a:hover {
            background-color: #800020;
            color: #ffc800;
        }
        #search input {
            border-radius: 50px;
            border: none;
        }
        #search button {
            border-radius: 50px;
            color: white;
            border: 1px solid #ffc800;
            background-color: #ffc800;
        }
        /*-------end of navbar-----*/
    </style>
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="afterlogin" id="logo"><img src="images/logo2.png" style="width: 20%; border-radius: 80px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="afterlogin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#about" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#800020;">
                        <li><a class="dropdown-item" href="#">Jackets</a></li>
                            <li><a class="dropdown-item" href="#">Shorts</a></li>
                            <li><a class="dropdown-item" href="#">skirts</a></li>
                            <li><a class="dropdown-item" href="#">Suits</a></li>
                            <li><a class="dropdown-item" href="#">Mocassins</a></li>
                            <li><a class="dropdown-item" href="#">Sneakers</a></li>
                            <li><a class="dropdown-item" href="#">Joggings</a></li>
                            <li><a class="dropdown-item" href="#">Track suits</a></li>
                            <li><a class="dropdown-item" href="#">Sandals</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="about-1.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-1.php">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                </ul>
                <form class="d-flex" id="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            
        </div>
    </nav>
    <!--end of navbar-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        ///===== DARK MODE ====///
        const toggleButton = document.getElementById('toggle-button');
        const body = document.body;

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
