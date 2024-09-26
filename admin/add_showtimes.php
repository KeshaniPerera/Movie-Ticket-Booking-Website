<?php
include('navbar_and_database_connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Retrieve form data
    $showTimeID = $_POST['show_time_id'];
    $movieID = mysqli_real_escape_string($conn, $_POST['movie_id']);
    $movieName = mysqli_real_escape_string($conn, $_POST['movie_name']);
    $startTime = mysqli_real_escape_string($conn, $_POST['start_time']);
    $movieDate = mysqli_real_escape_string($conn, $_POST['movie_date']);

    // Create the INSERT INTO query
    $insertShowTimeQuery = "INSERT INTO showtime (show_time_id, movie_id, movie_name, start_time, movie_date) VALUES 
    ('$showTimeID', '$movieID', '$movieName', '$startTime', '$movieDate')";

    // Execute the query
    if (mysqli_query($conn, $insertShowTimeQuery)) {
        // Query executed successfully
        echo '<script>alert("Showtime record added successfully.");</script>';
    } else {
        // Query execution failed
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="showtimes.css">
    <div class="wrapper">
    <form method="post" id="add_showtime">
    <table>
                <tr>
                    <td><label for="show_time_id">Show Time ID</label></td>
                    <td><input type="text" name="show_time_id" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="movie_id">Movie ID</label></td>
                    <td><input type="text" name="movie_id" size="50" required></td>
                </tr>
                <tr>
                <td><label for="movie_name">Movie Name</label></td>
                    <td><input type="text" name="movie_name" size="50" required></td>
                </tr>
                <td><label for="start_time">Start Time</label></td>
                    <td><input type="text" name="start_time" size="50" required></td>
                </tr>
                <td><label for="movie_date"> Movie Date</label></td>
                    <td><input type="date" name="movie_date" size="50" required></td>
                </tr>
 
    </table>
    <br><br><br>
    <input type="submit" class="submit" value="Submit">
</form>
</div>
</head>
<body>
    
</body>
</html>