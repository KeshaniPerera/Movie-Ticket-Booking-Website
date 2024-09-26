<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="sign_in_sign_up_style.css">
</head>
<body>
    <h1>HELLO</h1>
    <div class="container_wrapper">
    <div class="signup-container">
        <h5>SIGN IN</h5>
        <br>
        <form action="sign_in.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="username" required placeholder="Username" />
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password"  required placeholder="Password" />
            </div>
            <br>
            <button type="submit" name="sign_in">Sign In</button>
            <br>
        </form>
    </div>
</div>
<?php 
if(isset($_POST['sign_in'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");
    $row = mysqli_fetch_array($select);

    if ($row && password_verify($password, $row['password'])) {
        // Password is correct
        $_SESSION["username"] = $row['username'];
        header("Location: index.php");
    } else {
        echo '<script>';
        echo 'alert("Invalid Username or Password!");';
        echo '</script>';
    }
}
include('footer.php');
?>
</div>
</body>
</html>
