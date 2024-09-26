<?php
include('header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="myBookings_style.css">
    <title>My Bookings</title>
</head>
<body>
<div class="my_bookings">
    <br><br>
    <h2>My Bookings</h2>
    
    <?php
    // Check if user is logged in
    if (isset($_SESSION['username'])) {
        // Get the username from session
        $username = $_SESSION['username'];

        // Query to fetch movie booking data for the user
        $query = "SELECT movie_name, movie_date, movie_time, reserved_seats FROM booking WHERE customer = '$username'";
        $result = mysqli_query($conn, $query);

        // Check if there are any bookings
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='bookings-table'>
                    <tr>
                        <th>Movie Name</th>
                        <th>Movie Date</th>
                        <th>Movie Time</th>
                        <th>Reserved Seats</th>
                    </tr>";
            
            // Fetch and display booking details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['movie_name']}</td>
                        <td>{$row['movie_date']}</td>
                        <td>{$row['movie_time']}</td>
                        <td>{$row['reserved_seats']}</td>
                      </tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>No bookings found.</p>";
        }
    } else {
        echo "<p>Please log in to view your bookings.</p>";
    }
    ?>
</div>
</body>
</html>
