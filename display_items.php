<?php
session_start();

$name = $_SESSION["user_name"];
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "b_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve items from database
$sql = "SELECT `id`, `name`, `price`, `image`, `created_at` FROM `items` WHERE `name`='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Item Name: " . $row["item_name"]. " - Price: " . $row["price"]. "<br>";
        
        if (file_exists($imagePath)) {
            echo '<img src="' . $row["image"] . '" alt="' . $row["item_name"] . '" width="100">';
        } else {
            echo 'Image not found: ' . $row["image"];
        }
        echo "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
