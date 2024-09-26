<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "moviebookingwebsite"; 

$conn = new mysqli($servername, $username, $password, $database);

session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a different page (optional)
header("Location: index.php"); // Redirect to your homepage or another desired page
exit();
?>