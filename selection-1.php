<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the selected user type from the form
    $user_type = $_POST['user_type'];

    // Determine the redirection URL based on user type
    $redirect_url = '';
    if ($user_type === 'admin') {
        $redirect_url = 'register.php'; // URL to the admin registration form
    } elseif ($user_type === 'user') {
        $redirect_url = 'register.php'; // URL to the user registration form
    }

    // Redirect to the appropriate registration form
    if ($redirect_url) {
        header('Location: ' . $redirect_url);
        exit();
    } else {
        echo 'Invalid user type selected.';
    }
} else {
    echo 'Invalid request method.';
}
?>
