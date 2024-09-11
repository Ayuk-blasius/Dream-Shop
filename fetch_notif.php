<?php
// fetch_notifications.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have the user's ID stored in the session
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM notifications WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='notification'>";
        echo "<h3>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</h3>";
        echo "<p>" . htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<small>Sent on: " . htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8') . "</small>";
        echo "</div>";
    }
// } else {
//     echo "<p>No notifications.</p>";
// }
}
$conn->close();
?>
