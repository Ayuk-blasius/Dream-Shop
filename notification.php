<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Notification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .container, .container-fluid {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        h2 {
            color: #343a40;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #800020;
            border: none;
        }
        .btn-primary:hover {
            background-color: #800020;
        }
        .btn {
            background: #800020;
        }
        .table {
            margin-top: 20px;
            width: 100%; /* Ensure table takes full width */
        }
        th {
            background-color: #800020;
            color: #fff;
        }
        th, td {
            text-align: center;
            word-wrap: break-word; /* Prevent text from overflowing */
        }
        #select-all {
            cursor: pointer;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-top: 20px;
        }
        .back-button {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        @media (max-width: 768px) {
            .container-fluid {
                padding: 15px;
                border-radius: 0; /* Remove border radius on smaller screens */
                box-shadow: none; /* Remove box shadow on smaller screens */
            }
            h2 {
                font-size: 1.5em;
            }
            .form-control {
                font-size: 1em;
                width: 100%; /* Ensure form controls take full width */
            }
            .btn {
                font-size: 1em;
                padding: 10px 15px;
                width: 100%; /* Ensure buttons take full width */
            }
            .table th, .table td {
                font-size: 0.9em;
                padding: 10px;
            }
            .back-button {
                font-size: 1em;
                padding: 8px 15px;
                width: 100%; /* Ensure back button takes full width */
            }
        }
        @media (max-width: 576px) {
            .container-fluid {
                padding: 10px;
            }
            h2 {
                font-size: 1.25em;
            }
            .form-control {
                font-size: 0.9em;
            }
            .btn {
                font-size: 0.9em;
                padding: 8px 10px;
                width: 100%;
            }
            .table th, .table td {
                font-size: 0.8em;
                padding: 8px;
            }
            .back-button {
                font-size: 0.9em;
                padding: 6px 10px;
                width: 100%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                $('input[type="checkbox"]').prop('checked', this.checked);
            });
        });
    </script>
</head>
<body>
<div class="container-fluid mt-5">
    <h2>Send Notification</h2>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "b_shop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_ids = $_POST['user_ids'];
        $title = $_POST['title'];
        $message = $_POST['message'];

        $success = true;

        foreach ($user_ids as $user_id) {
            $sql = "INSERT INTO notifications (user_id, title, message, created_at) VALUES ('$user_id', '$title', '$message', NOW())";

            if ($conn->query($sql) !== TRUE) {
                $success = false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if ($success) {
            echo '<div class="success-message">Notifications sent successfully</div>';
        }
    }

    $conn->close();
    ?>

    <form action="notification.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <div class="container-fluid">
            <div class="main-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="select-all"></th>
                            <th scope="col">N/s</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Database connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch users from the database
                        $userQuery = "SELECT * FROM `user_form`";
                        $userResult = $conn->query($userQuery);

                        $count = 0;
                        while ($data = mysqli_fetch_assoc($userResult)) {
                            $count++;
                            $user_id = $data['id'];
                            $name = $data['name'];
                            $email = $data['email'];
                            $phone = $data['tel'];
                            $country = $data['country'];
                            $state = $data['state'];
                        ?>
                            <tr>
                                <td><input type="checkbox" name="user_ids[]" value="<?php echo $user_id; ?>"></td>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $country; ?></td>
                                <td><?php echo $state; ?></td>
                            </tr>
                        <?php
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Send Notification</button>
        <button type="button" class="back-button" onclick="history.back()">Go Back</button>
    </form>
</div>
</body>
</html>
