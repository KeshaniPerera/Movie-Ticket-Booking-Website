<?php
include('header.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="seatsstyle.css">
<div class="background">
<div class="container">            
    <br>
    <div class="selectedmovienameanddate">
            <?php
            $qry6=mysqli_query($conn,"SELECT movie_name,movie_date,start_time FROM showtime WHERE movie_name='".$_GET['movie_name']."'&& movie_date='".$_GET['selectedDate']."'");
            if ($moviename = mysqli_fetch_array($qry6)) {
            ?>
            <h3 class="movie_name"><?php echo $moviename['movie_name'];?></h3>
            <h3 class="date_label">Date :</h3><h3 class="movie_date"><?php echo $moviename['movie_date'];?></h3>
            <h3 class="time_label">Time:</h3><h3 class="movie_time"><?php echo $moviename['start_time'];?></h3>
            <?php
            }
            ?>
    </div>
    
</div>


<div class="pickyourspot">  
    <h3>Pick Your Spot</h3>
</div>
<?php
include('load_reserved_seats.php');
?>
<form id="reservation_form" method="get" action="process_reservation.php">    
        <div class="seatcontainer">
        <div class="column1">
        <div class="seat" id="A1">A1</div>
        <div class="seat" id="A2">A2</div>
        <div class="seat" id="A3">A3</div>
        <div class="seat" id="A4">A4</div>
        <div class="seat" id="A5">A5</div><br>
        <div class="seat" id="B1">B1</div>
        <div class="seat" id="B2">B2</div>
        <div class="seat" id="B3">B3</div>
        <div class="seat" id="B4">B4</div>
        <div class="seat" id="B5">B5</div><br>
        <div class="seat" id="C1">C1</div>
        <div class="seat" id="C2">C2</div>
        <div class="seat" id="C3">C3</div>
        <div class="seat" id="C4">C4</div>
        <div class="seat" id="C5">C5</div><br>
        <div class="seat" id="D1">D1</div>
        <div class="seat" id="D2">D2</div>
        <div class="seat" id="D3">D3</div>
        <div class="seat" id="D4">D4</div>
        <div class="seat" id="D5">D5</div><br>
        <div class="seat" id="E1">E1</div>
        <div class="seat" id="E2">E2</div>
        <div class="seat" id="E3">E3</div>
        <div class="seat" id="E4">E4</div>
        <div class="seat" id="E5">E5</div><br>
</div>
<div class="column2">
        <div class="seat" id="A6">A6</div>
        <div class="seat" id="A7">A7</div>
        <div class="seat" id="A8">A8</div>
        <div class="seat" id="A9">A9</div>
        <div class="seat" id="A10">A10</div><br>
        <div class="seat" id="B6">B6</div>
        <div class="seat" id="B7">B7</div>
        <div class="seat" id="B8">B8</div>
        <div class="seat" id="B9">B9</div>
        <div class="seat" id="B10">B10</div><br>
        <div class="seat" id="C6">C6</div>
        <div class="seat" id="C7">C7</div>
        <div class="seat" id="C8">C8</div>
        <div class="seat" id="C9">C9</div>
        <div class="seat" id="C10">C10</div><br>
        <div class="seat" id="D6">D6</div>
        <div class="seat" id="D7">D7</div>
        <div class="seat" id="D8">D8</div>
        <div class="seat" id="D9">D9</div>
        <div class="seat" id="D10">D10</div><br>
        <div class="seat" id="E6">E6</div>
        <div class="seat" id="E7">E7</div>
        <div class="seat" id="E8">E8</div>
        <div class="seat" id="E9">E9</div>
        <div class="seat" id="E10">E10</div><br>
</div>
</div>
<div class="total_calculation">
    <h4 class=tickets_label>No.of Tickets :&nbsp; &nbsp; </h4>
    <h4 id="no_of_tickets"></h4>
    <h4 class="total_label">Total :&nbsp; &nbsp; </h4>
    <h4 id="total"></h4>
</div>
<input type="hidden" name="selectedMovie" value="<?php echo $_GET['movie_name'];?>" required>
<input type="hidden" name="selectedDate" value="<?php echo $_GET['selectedDate'];?>" required>
<input type="hidden" name="selectedTime" value="<?php echo $_GET['selectedTime'];?>" required>
<input type="hidden" name="reservedSeats" id="reservedSeats" required>
<div class=confirm>

<button type="submit" class="submit-button" id="confirmbutton">Confirm Reservation </button>
</div>
</div>

</form>
</div>
<script>
    // Step 3: Use JavaScript to mark reserved seats as "reserved" with a CSS class
    var reservedSeats = <?php echo $reservedSeatsjson; ?>;
    reservedSeats.forEach(seatId => {
        const seatElement = document.getElementById(seatId);
        if (seatElement) {
            seatElement.style.backgroundColor = 'red';
            seatElement.classList.add('reserved');
             // Add a CSS class to mark it as reserved
        }
    });
</script>
<script src="seatsscript.js"></script>
<?php
include('footer.php');
?> 
</body>
</html>