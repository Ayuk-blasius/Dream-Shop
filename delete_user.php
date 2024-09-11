<?php
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $sqldel = "DELETE FROM user_form WHERE email='$email'";
        $qrydel = mysqli_query($conn, $sqldel);

        if ($qrydel) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

$conn->close();
?>
