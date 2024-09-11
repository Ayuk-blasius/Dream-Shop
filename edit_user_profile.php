<?php
session_start();
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume the user email is stored in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    echo "User not logged in";
    exit;
}
// Retrieve user data
$sql = "SELECT * FROM user_form WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found";
    exit;
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <form action="edit_profile.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        <br>
        <label for="tel">Tel:</label>
        <input type="number" id="tel" name="tel" value="<?php echo $user['tel']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>" required>
        <br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo $user['state']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>


<?php
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $conn->real_escape_string($_POST['name']);
    $tel = $conn->real_escape_string($_POST['tel']);
    $email = $conn->real_escape_string($_POST['email']);
    $country = $conn->real_escape_string($_POST['country']);
    $state = $conn->real_escape_string($_POST['state']);
    $password = $conn->real_escape_string($_POST['password']);

    // Update user data
    $sql = "UPDATE user_form SET name='$name', tel='$tel', email='$email', country='$country', state='$state', password='$password' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
