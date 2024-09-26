<?php
include('navbar_and_database_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="movies_style.css">
    <script src="index_script.js"></script>

    
</head>
<body>
<div class="flex_wrap">    
<h2 id="heading"> Show Times </h2>
    <div class="buttons">
        <button><a href="view_showtimes.php">View</a></button>
        <button><a href="add_showtimes.php">Add New</a></button>
        <button><a href="select_showtime_to_update.php">Update</a></button>
        <button><a href="delete_showtimes.php">Delete</button>
</div>
</div>
    

   
</body>
</html>