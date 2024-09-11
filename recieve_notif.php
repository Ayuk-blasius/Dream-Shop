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

// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    
    // Fetch the user's ID from the database
    $sql1 = "SELECT `id` FROM `user_form` WHERE `name` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param('s', $user_name);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $user_id = $row1['id'];
    } else {
        echo "User not found.";
        exit();
    }
    
    // Handle delete request
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $delete_sql = "DELETE FROM notifications WHERE id = ? AND user_id = ?";
        $stmt2 = $conn->prepare($delete_sql);
        $stmt2->bind_param('ii', $delete_id, $user_id);
        if ($stmt2->execute()) {
            echo "<div class='success-message'>Notification deleted successfully</div>";
        } else {
            echo "Error deleting notification: " . $stmt2->error;
        }
    }

    // Fetch notifications for the logged-in user
    $sql = "SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC";
    $stmt3 = $conn->prepare($sql);
    $stmt3->bind_param('i', $user_id);
    $stmt3->execute();
    $result = $stmt3->get_result();
} else {
    echo "User is not logged in.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .notification {
            background-color: #e9ecef;
            border-left: 5px solid #007bff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            position: relative;
        }
        .notification h3 {
            margin-top: 0;
            color: #007bff;
        }
        .notification p {
            margin: 10px 0;
        }
        .notification small {
            color: #6c757d;
        }
        .delete-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .back-button {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <button class="back-button" onclick="history.back()">Go Back</button>
    <?php
    if ($result->num_rows > 0) {
        echo "<h2>Notifications</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='notification'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['message']) . "</p>";
            echo "<small>Sent on: " . htmlspecialchars($row['created_at']) . "</small>";
            echo "<form method='post' style='display: inline;'>";
            echo "<input type='hidden' name='delete_id' value='" . htmlspecialchars($row['id']) . "'>";
            echo "<button type='submit' class='delete-button'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<h2>Notifications</h2>";
        echo "<p>No notifications.</p>";
    }

    $conn->close();
    ?>
</div>
</body>
</html>
