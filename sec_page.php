<?php
session_start();
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Assuming the user ID is stored in the session

// if ($user_id) {
//     // Fetch user details from the database
//     $sql = "SELECT `name`, profile_image FROM user_form WHERE id = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("i", $user_id);
//     $stmt->execute();
//     $stmt->bind_result($name, $profile_image);
//     $stmt->fetch();
//     $stmt->close();

    // Generate a greeting message
    $hour = date("H");
    if ($hour < 12) {
        $greeting = "Good Morning";
    } elseif ($hour < 18) {
        $greeting = "Good Afternoon";
    } else {
        $greeting = "Good Evening";
    }
// } else {
//     $username = "Guest";
//     $profile_image = "default.png"; // Default image for guests
//     $greeting = "Welcome";
// }

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the dashboard */
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .profile-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #800020;
            color: #fff;
            transition: all 0.3s;
        }
        #sidebar.active {
            min-width: 80px;
            max-width: 80px;
        }
        #sidebar .sidebar-header, #sidebar ul p {
            padding: 20px;
            background:#800020;
        }
        #sidebar ul.components {
            padding: 20px 0;
        }
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            text-decoration: none;
            color: #fff;
        }
        #sidebar ul li a:hover{
          background: #ffc800;
          color: black;
        }
        #sidebar ul li a .icon, #sidebar ul li a .text {
            display: inline-block;
            vertical-align: middle;
            text-decoration: none;

        }
        #sidebar ul li a .text {
            margin-left: 10px;

        }
        #sidebar.active ul li a .text {
            display: none;

        }
        #content {
            width: 100%;
            padding: 20px;
            transition: all 0.3s;
        }
        .navbar-nav.ml-auto {
            margin-left: auto;
        }
        /*  greetings */
#greeting {
  color: black;
      font-size: 34px;
      font-weight: bold;
    }
.adminname{
  padding:5px;
  border-radius: 5px;
  color: #ffc800;
}
/* end of greetings */

    </style>
</head>

  <!--==============================================================================================-->
  <!-- =================================== SIDEBAR CONTENT ========================================--->
  <!--==============================================================================================-->

<body>
    <div id="sidebar">
        <div class="sidebar-header">
            <h3 style="color: #ffc800;"><b>Dream Shopping</b></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="afterlogin.php"><i class="fa-solid fa-home"></i><span class="text">Home</span></a>
            </li>
            <li>
                <a href="admin_page.php"><i class="fa-solid fa-dashboard"></i><span class="text">Dashboard</span></a>
            </li>
            <li>
                <a href="view-all-users.php"><i class="fa-solid fa-users"></i><span class="text">users</span></a>
            </li>
            <li>
                <a href="view-post.php"><i class="fa-solid fa-users"></i><span class="text">Post</span></a>
            </li>
            <li>
                <a href="notification.php"><i class="fa-solid fa-envelope"></i><span class="text">Notifications</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-bag-shopping"></i><span class="text">Orders</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-star"></i><span class="text">Reviews</span></a>
            </li>
            <hr style="background-color: white;">
            <li>
                <a href="register.php"><i class="fa-solid fa-user"></i><span class="text">Add User</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-gear"></i><span class="text">Settings</span></a>
            </li>
            <li class="nav-item">
                <a href="logout.php"><i class="fa-solid fa-person-walking"></i><span class="text">Logout</span></a>
                    </li>
            <li>
                <a href="#"><i class="fa-solid fa-circle-question"></i><span class="text">Help Center</span></a>
            </li>
        </ul>
    </div>

                        
  <!--==============================================================================================-->
  <!-- =============================== END SIDEBAR CONTENT ========================================--->
  <!--==============================================================================================-->


        
  <!--==============================================================================================-->
  <!-- ======================================= NAVBAR CONTENT =====================================--->
  <!--==============================================================================================-->


    <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
        <h2><span id="greeting"></span> <b class="adminname"> <?php echo $_SESSION['admin_name']  ?> </b></h2>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#profileModal">Upload Image</a>
                            <a class="dropdown-item" href="#" id="deleteImage">Delete Image</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Change Image</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
   
  

    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Upload/Change Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="profileImage">Choose Image</label>
                            <input type="file" class="form-control" id="profileImage" name="profileImage" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


  <!--==============================================================================================-->
  <!-- =================================== END NAVBAR CONTENT =====================================--->
  <!--==============================================================================================-->


        <?php
        include 'content.php';
        ?>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            $('#profileForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: 'upload.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == 'success') {
                            alert('Image uploaded successfully');
                            location.reload();
                        } else {
                            alert('Image upload failed');
                        }
                    }
                });
            });

            $('#deleteImage').on('click', function () {
                $.ajax({
                    url: 'delete_image.php',
                    type: 'POST',
                    data: { user_id: <?php echo $user_id; ?> },
                    success: function (response) {
                        if (response.status == 'success') {
                            alert('Image deleted successfully');
                            location.reload();
                        } else {
                            alert('Image deletion failed');
                        }
                    }
                });
            });
        });


        let time = new Date().getHours();
    let greetingDiv = document.getElementById('greeting');

    if (time >= 0 && time < 12) {
      greetingDiv.textContent = "Good morning!";
    } else if (time >= 12 && time < 18) {
      greetingDiv.textContent = "Good afternoon!";
    } else {
      greetingDiv.textContent = "Good evening!";
    }
    </script>

</body>
</html>
