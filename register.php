<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



<!--///////////////////////////////////////////////////////////---->
<!--//////////////// VERIFICATION OF PASSWORDS ////////////////---->
<!--///////////////////////////////////////////////////////////---->
    
<?php
session_start();
ob_start();

include 'navbar.php';
include 'connect.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['tel']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

    $select = "SELECT * FROM user_form WHERE email= '$email'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    } else {
        if($pass != $cpass){
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO user_form (name, email, tel, country, state, password, user_type) VALUES ('$name', '$email', '$phone', '$country', '$state', '$pass', '$user_type')";
            if(mysqli_query($conn, $insert)) {
                header('Location: login.php');
                exit();
            } else {
                $error[] = 'Registration failed, please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>

            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="number" name="tel" placeholder="Enter your telephone" required>
            <input type="email" name="email" placeholder="Enter your email" required>

            <select id="selectCtry">
                    <option selected disabled name="country">Select your country of residence </option>
                </select>
                <input type="hidden" id="selectedCountry" name="country" value="" />
                        <br>
            <select id="selectSte">
                    <option selected disabled name="state">Select your state </option>
                </select>
                <input type="hidden" id="selectedState" name="state" value="" />
                <select name="user_type">
                <option value="user">User</option>
            </select>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="cpassword" placeholder="Confirm your password" required>
            <input type="submit" name="submit" onclick="reg()" value="Register Now" style="background-color: crimson; color: white">
            <p>already have an account ? <a href="login.php">login</a></p>
            
        </form>
    </div>

    <script>
    // Call fetchTotalUsers() after creating a user
    fetchTotalUsers();
</script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

    <script>
        function reg () {
        Swal.fire({
  title: "Good job",
  text: "Account created successfully",
  icon: "success"
});
        }

        ///////////////////////////////////////////
        /////////// COUNTRY AND STATE ////////////
        /////////////////////////////////////////

        $(function(){
let token1 ="809|Nx0xK9YQGfy7tdB3MmnVyF8bsJqVJHZB3MPKwRs8";
function getAllCountries(token){
$.ajax({
 'method':'get',
 'url': 'https://restfulcountries.com/api/v1/countries?per_page=100',
success: function(e){
  console.log(e);
  for (var i=0; i< e.data.length; i++){
    let op='<option value="'+e.data[i].name+'">'+e.data[i].full_name+'</option>';
    $('#selectCtry').append(op);
  }
},
headers:{
  "Accept":"application/json",
  "Authorization":"Bearer "+token
}


});

}
getAllCountries(token1);

// =================================================================================

function getAllStates(token, ctry){
$.ajax({
 'method':'get',
 'url': 'https://restfulcountries.com/api/v1/countries/'+ctry+'/states',
success: function(e){
  console.log(e);
  for (var i=0; i< e.data.length; i++){
    let op='<option value="'+e.data[i].name+'">'+e.data[i].name+'</option>';
    $('#selectSte').append(op);
  }
},
headers:{
  "Accept":"application/json",
  "Authorization":"Bearer "+token
}


});

}

$('#selectCtry').change(function(){
let ctry= $(this).val();
getAllStates(token1, ctry);
});

        });
////////////////////////////////////////
//////////////////////////////////////////

<script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    <script>

        $(function () {
          let token1 = "809|Nx0xK9YQGfy7tdB3MmnVyF8bsJqVJHZB3MPKwRs8";
          let selectedCountry, selectedState, selectedCity;
  
          // -----------------------------------------------------------------------
          function getAllCountries(token) {
            $.ajax({
              method: "get",
              url: "https://restfulcountries.com/api/v1/countries?per_page=195",
              success: function (e) {
                console.log(e);
                for (var i = 0; i < e.data.length; i++) {
                  let op =
                    '<option value="' +
                    e.data[i].name +
                    '">' +
                    e.data[i].full_name +
                    "</option>";
                  $("#selectCtry").append(op);
                }
              },
              headers: {
                Accept: "application/json",
                Authorization: "Bearer " + token,
              },
            });
          }
          getAllCountries(token1);
  
          // -----------------------------------------------------------------------
          function getAllStates(token, ctry) {
            $.ajax({
              method: "get",
              url:
                "https://restfulcountries.com/api/v1/countries/" +
                ctry +
                "/states",
              success: function (e) {
                console.log(e);
                for (var i = 0; i < e.data.length; i++) {
                  let op =
                    '<option value="' +
                    e.data[i].name +
                    '">' +
                    e.data[i].name +
                    "</option>";
                  $("#selectSte").append(op);
                }
              },
              headers: {
                Accept: "application/json",
                Authorization: "Bearer " + token,
              },
            });
          }
  
          // -----------------------------------------------
          $("#selectCtry").change(function () {
            let ctr = $(this).val();
            selectedCountry = ctr; // Store the selected country
            $("#selectedCountry").val(ctr); // Set the value of the hidden input field
            $("#selectState").html(
              "<option selected disabled>Select your state of residence </option>"
            ); // Clear previous state options
            $("#selectcity").html(
              "<option selected disabled>Select your city of residence </option>"
            ); // Clear previous city options
            getAllStates(token1, ctr);
          });
  
          // -----------------------------------------------------------------------
          function getAllCities(token, state) {
            $.ajax({
              method: "get",
              url:
                "https://restfulcountries.com/api/v1/states/" + state + "/cities",
              success: function (e) {
                console.log(e);
                for (var i = 0; i < e.data.length; i++) {
                  let op =
                    '<option value="' +
                    e.data[i].name +
                    '">' +
                    e.data[i].name +
                    "</option>";
                  $("#selectcity").append(op);
                }
              },
              headers: {
                Accept: "application/json",
                Authorization: "Bearer " + token,
              },
            });
          }
  
          // -----------------------------------------------
          $("#selectState").change(function () {
            let st = $(this).val();
            selectedState = st; // Store the selected state
            $("#selectedState").val(st); // Set the value of the hidden input field
            $("#selectcity").html(
              "<option selected disabled>Select your city of residence </option>"
            ); // Clear previous city options
            getAllCities(token1, st);
          });
  
          // -----------------------------------------------
          $("#selectcity").change(function () {
            selectedCity = $(this).val(); // Store the selected city
            $("#selectedCity").html(selectedCity); // Display selected city
          });
        });
      </script>

    </script>

<?php
include 'footer.php';
?>

<!-- In your main layout file, just before the closing </body> tag -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const loader = document.getElementById("loader");

    // Show loader when any link is clicked
    document.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", function(event) {
        loader.style.display = "block";
      });
    });

    // Hide loader when the page is fully loaded
    window.addEventListener("load", function() {
      loader.style.display = "none";
    });
  });
</script>


</body>
</html>

