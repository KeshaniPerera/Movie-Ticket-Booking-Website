<?php
include('header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $insertSignUpQuery = "INSERT INTO login (username,password, email, phone_number) VALUES 
    ('$userName', '$hashedPassword', '$email', '$phoneNumber')";

if (mysqli_query($conn, $insertSignUpQuery)) {
    // Query executed successfully
    echo '<script>alert("Sign Up Successful!");</script>';
} else {
    // Query execution failed
    echo '<script>alert("Sign up failed! Please try again.");</script>';
    echo "Error: " . mysqli_error($conn);
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="sign_in_sign_up_style.css">
</head>

<script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Confirm Password doesn't match!");
                return false;
            }
            return true;
        }
    </script>

<body>

<div class="container_wrapper">
    <div class="signup-container">
        <h5>SIGN UP</h5>
        <br>
        <form action="sign_up.php" method="post" onsubmit="return validatePassword();">
            <div class="form-group">
                <input type="text" id="username" name="username" required placeholder="Username" />
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" required placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="tel" id="phone_number" name="phone_number" required placeholder="Phone Number" />
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" required placeholder="Password" />
            </div>
            <div class="form-group">
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm Password" />
            </div>
            <br>
            <button type="submit" name="sign_in">Sign Up</button>
            <br>
        </form>
    </div>
</div>
</div>



<?php 

include('footer.php');?>
</div>
    
</body>
</html>