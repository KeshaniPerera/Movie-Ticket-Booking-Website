<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Plex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+MQ6U3z/3zo6KbFiR5axn53R+ayA5b6CBIz4meObK5WAI5b3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="headerstyle.css">
<link rel="stylesheet" type="text/css" href="footerstyle.css">
<link rel="icon" type="image/x-icon" href="images/flavicon.png">
</head>
<body>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "moviebookingwebsite"; 

$conn = new mysqli($servername, $username, $password, $database);

session_start();

?>
    <div class="nav-bar">
        <ul>
            <li class="logo_li"><a href="index.php"><img class="logo" src="images/logo.png">
              </a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
          
            <li id="about_us"><a  href="about_us.php">About Us</a></li>
            
            <?php if (isset($_SESSION["username"])){ ?>
            <li><a id="sign_out" href="sign_out.php">Sign Out</a></li>
            <?php } 
            else { ?>
            <li><a id="sign_in" href="sign_in.php">Sign In</a></li>
            <?php } ?> 
            <li><a id="sign_up" href="sign_up.php">Sign Up</a></li>
            <li><a id="my_bookings" href="myBookings.php">My Bookings</a></li>


          </ul>
    </div>
<?php


