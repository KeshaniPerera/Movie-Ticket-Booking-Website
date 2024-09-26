<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "moviebookingwebsite"; 

$conn = new mysqli($servername, $username, $password, $database);

session_start();

// delete all session variables
$_SESSION = array();

// destroy the session
session_destroy();

// redirect to a index page
header("Location: index.php"); 
exit();
?>