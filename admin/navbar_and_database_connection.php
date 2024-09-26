<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinemaPlex Admin</title>
    <link rel="stylesheet" type="text/css" href="navbar_and_database_connection_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+MQ6U3z/3zo6KbFiR5axn53R+ayA5b6CBIz4meObK5WAI5b3" crossorigin="anonymous">
    <script src="nav_bar_database_connection_script.js"></script>
    <link rel="icon" type="image/x-icon" href="images/flavicon.png"> 
</head>
<body>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "moviebookingwebsite"; 

$conn = new mysqli($servername, $username, $password, $database);

?>
<div class="navbar">
    <div class="admin_name">

    <h5>Welcome!</h5>
    </div>
    <div class="change_color">
        <a href="movies.php" >Now Showing Movies</a>
        <a href="up_coming_movies.php" >Up Coming Movies</a>
        <a href="showtimes.php" >Showtimes</a>
        <a href="view_bookings.php" >Bookings</a>
        <a href="view_registered_users.php" >Registered Users</a>
        <div class="log_out">
        <a href="log_out.php">Log Out</a>
        </div>
    </div>
</div>




</body>
</html>
