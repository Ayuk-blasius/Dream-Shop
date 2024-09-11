<?php
session_start();
$name = $_SESSION["user_name"];
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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    background-color: #f4f4f4;
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

</style>
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
<div class="content">
    <div class="container mt-4">
    <h2><span id="greeting"></span> <b class="adminname"><?php echo $name; ?></b></h2>
    <!-- Your page content here -->
        <?php include 'user_content.php'; ?>
    </div>
</div>

<!-- Modal for uploading image -->
<div class="modal fade" id="profileModalUpload" tabindex="-1" aria-labelledby="profileModalLabelUpload" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabelUpload">Upload Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileFormUpload" method="post" enctype="multipart/form-data" action="upload_profile_image.php">
                    <div class="form-group">
                        <label for="profileImageUpload">Choose Image</label>
                        <input type="file" class="form-control" id="profileImageUpload" name="profileImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for changing image -->
<div class="modal fade" id="profileModalChange" tabindex="-1" aria-labelledby="profileModalLabelChange" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabelChange">Change Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileFormChange" method="post" enctype="multipart/form-data" action="change_profile_image.php">
                    <div class="form-group">
                        <label for="profileImageChange">Choose Image</label>
                        <input type="file" class="form-control" id="profileImageChange" name="profileImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Files -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
   $(document).ready(function () {
    $('#profileFormUpload').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'upload_profile_image.php',
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

    // Greeting logic
    let time = new Date().getHours();
    let greetingDiv = document.getElementById('greeting');

    if (time >= 0 && time < 12) {
        greetingDiv.textContent = "Good morning!";
    } else if (time >= 12 && time < 18) {
        greetingDiv.textContent = "Good afternoon!";
    } else {
        greetingDiv.textContent = "Good evening!";
    }
});

</script>


</script>

</body>
</html>
