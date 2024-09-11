<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<body>

<?php
ob_start(); // Start output buffering
session_start(); // Start session management

@include 'connect.php';
include 'navbar.php';

if(isset ($_POST['submit'])){
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $pass= md5($_POST['password']);
    $cpass= md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email= '$email' && password= '$pass'";
  
    $result=mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row=mysqli_fetch_array($result);

        if ($row['user_type']=='admin'){

            $_SESSION['admin_name']=$row['name'];
 
            header('location:admin_page.php');
          

        }elseif ($row['user_type']=='user'){

            $_SESSION['user_name']=$row['name'];
            header('location:user_page.php');

        } 

    }else{
        $error[]='incorrect email or password!';
    }
    
    };

ob_end_flush(); // End output buffering and flush the buffer
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<div class="form-container">
        <form action="" method="post">
            <h3>Login</h3>

            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>



            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            
            <input type="submit" name="submit" value="login" class="form-btn">
            <p>don't have an account ? <a href="register.php">register</a></p>
        </form>
    </div>

<?php
include 'footer.php';
?>



</body>
</html>