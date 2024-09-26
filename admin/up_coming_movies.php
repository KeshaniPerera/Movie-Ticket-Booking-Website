<?php
session_start();
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
   
<h2 id="heading"> Up Coming Movies </h2>
    <div class="buttons">
        <button><a href="view_movies.php?id=2">View</a></button>
        <button><a href="add_movies.php?id=2">Add New</a></button>
        <button><a href="select_movie_to_update.php?id=2">Update</a></button>
        <button><a href="delete_movies.php?id=2">Delete</button>
</div>
</div>
    

   
</body>
</html>