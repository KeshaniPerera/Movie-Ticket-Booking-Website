<?php
$user_movie_name = $_GET['movie_name'];
$user_movie_date = $_GET['selectedDate'];
$user_movie_time=$_GET['selectedTime'];

$reservedSeats = [];

$query = "SELECT reserved_seats FROM booking WHERE movie_name='$user_movie_name' && movie_date='$user_movie_date' && movie_time='$user_movie_time'";
$result = mysqli_query($conn, $query);

     while ($row = mysqli_fetch_assoc($result)){
        $seats = explode(',', $row['reserved_seats']);
        $reservedSeats = array_merge($reservedSeats, $seats);
    }
    ?>

     <?php $reservedSeatsjson=json_encode($reservedSeats);?>








