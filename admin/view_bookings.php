<?php
include('navbar_and_database_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="showtimes.css">
</head>
<body>
<div class="wrapper">
<h2 id="heading"><centre>Bookings</centre> </h2>
<br>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Movie Name</th>
            <th>Movie Date</th>
            <th>Movie Time</th>
            <th>Reserved Seats</th>
        </tr>
<?php
        $qry1=mysqli_query($conn,"SELECT * FROM booking ");
        while($booking=mysqli_fetch_array($qry1)){
        ?>
        <tr>
            <td><?php echo $booking['booking_id'];?></td>
            <td><?php echo $booking['movie_name'];?></td>
            <td><?php echo $booking['movie_date'];?></td>
            <td><?php echo $booking['movie_time'];?></td>
            <td><?php echo $booking['reserved_seats'];?></td>
        </tr>
        <?php
        }
        ?>
    </div>
    </table>
</body>
</html>