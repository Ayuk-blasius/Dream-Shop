<?php
session_start();

include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Assuming the user ID is stored in the session

if ($user_id) {
    // Fetch user details from the database
    $sql = "SELECT name, profile_image FROM user_form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $profile_image);
    $stmt->fetch();
    $stmt->close();

    // Generate a greeting message
    $hour = date("H");
    if ($hour < 12) {
        $greeting = "Good Morning";
    } elseif ($hour < 18) {
        $greeting = "Good Afternoon";
    } else {
        $greeting = "Good Evening";
    }
} else {
    $username = "Guest";
    $profile_image = "default.png"; // Default image for guests
    $greeting = "Welcome";
}

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
        body {
            overflow-x: hidden;
        }
        .profile-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .navbar-nav .nav-item .nav-link .icon, .navbar-nav .nav-item .nav-link .text {
            display: inline-block;
            vertical-align: middle;
            text-decoration: none;
        }
        .navbar-nav .nav-item .nav-link .text {
            margin-left: 10px;
        }
        @media (max-width: 768px) {
            .navbar-nav .nav-item .nav-link .text {
                display: none;
            }
        }
        nav {
            background:  #800020;
        }
        nav .navbar-nav a{
            color: white;
        }
        nav .navbar-nav a:hover{
            color: #ffc800;
        }
        .navbar-brand b {
            color: #ffc800;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }
        .table-responsive img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><b>Dream Shopping</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="afterlogin.php"><i class="fa-solid fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_page.php"><i class="fa-solid fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view-all-users.php"><i class="fa-solid fa-users"></i> Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view-post.php"><i class="fa-solid fa-envelope"></i> Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php"><i class="fa-solid fa-bell"></i> Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-bag-shopping"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-star"></i> Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa-solid fa-person-walking"></i> Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-circle-question"></i> Help Center</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo $profile_image; ?>" alt="Profile Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Upload Image</a>
                        <a class="dropdown-item" href="#" id="deleteImage">Delete Image</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Change Image</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="main-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">N/s</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM items";
                        $qry = mysqli_query($conn, $sql);
                        $count = 0;
                        while ($data = mysqli_fetch_assoc($qry)) {
                            $count++;
                            $id = $data['id']; // Assuming you have an ID column
                            $name = $data['name'];
                            $price = $data['price'];
                            $image = $data['image'];
                            $create_at = $data['created_at'];
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $price ?></td>
                                <td><img src="<?php echo $image ?>" alt="<?php echo $name ?>" class="img-fluid" width="100"></td>
                                <td><?php echo $create_at ?></td>
                                <td>
                                    <button class="btn btn-danger delete-user" data-id="<?php echo $id ?>">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        $(document).ready(function () {
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

            $('.delete-user').on('click', function () {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this post?')) {
                    $.ajax({
                        url: 'delete_post.php',
                        type: 'POST',
                        data: { id: id },
                        success: function (response) {
                            if (response == 'success') {
                                alert('Post deleted successfully.');
                                location.reload();
                            } else {
                                alert('Failed to delete post.');
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>