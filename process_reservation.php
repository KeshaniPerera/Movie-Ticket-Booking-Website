<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="process_reservation_style.css">
</head>
<body>
    
<div class="background">
    
<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    // Get the values from the form
    $selectedMovie = $_GET['selectedMovie'];
    $selectedDate = $_GET['selectedDate'];
    $selectedTime = $_GET['selectedTime'];
    $reservedSeats = $_GET['reservedSeats'];
    $user =  $_SESSION['username'];

    // Insert booking details into the 'booking' table
    $insertQuery = "INSERT INTO booking (movie_name, movie_date, movie_time, reserved_seats, customer) 
                    VALUES ('$selectedMovie', '$selectedDate', '$selectedTime', '$reservedSeats', '$user')";

    if (mysqli_query($conn, $insertQuery)) {
        $reservationStatus="Your Reservation is Successfull, enjoy!";
    } else {
        echo "Error: " . mysqli_error($conn);
        $reservationStatus="Sorry, Reservation Unsuccessful, " . mysqli_error($conn);
    }


    
} else {
    $reservationStatus="Sorry, Reservation Unsuccessful, Please try again";
}
?>
<h3><?php echo $reservationStatus;?></h3>
</div>
<?php
include('footer.php');
?>


</body>
</html>
