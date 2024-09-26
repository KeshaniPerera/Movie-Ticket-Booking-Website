<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "moviebookingwebsite"; 

$conn = new mysqli($servername, $username, $password, $database);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="index_style.css">
</head>
<div class="container_wrapper">
    <div class="signup-container">
        <h5 class="admin_login_header">CINEMA PLEX <br><br> ADMINISTRATOR LOGIN</h5>
        <br>
        <form action="movies.php" method="post">
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
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select=mysqli_query($conn,"SELECT * FROM admin_login WHERE username='$username'");
    $row=mysqli_fetch_array($select);

    if ($row && password_verify($password, $row['password'])) {
        // Password is correct
        $_SESSION["username"] = $row['username'];
    }
    else{
        echo '<script>';
        echo 'alert("Invalid Username or Password!");';
        echo '</script>';
    }

    if (isset($_SESSION["username"])){
        header("Location:movies.php");
    }
}

?>

</body>
</html>
