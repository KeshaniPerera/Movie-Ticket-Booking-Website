<?php
include('header.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" type="text/css" href="selectTime.css">
<div class="wrapper"> 
    <?php
     $qry6=mysqli_query($conn,"SELECT movie_name,movie_date FROM showtime WHERE movie_name='".$_GET['movie_name']."'&& movie_date='".$_GET['selectedDate']."'");
     if ($moviename = mysqli_fetch_array($qry6)) {
    ?> 
        <div class="wrapFlex">
        <h2><?php echo $moviename['movie_name'];?></h2>
        <h3 class="date">Date :</h3><h3 class="selected_date"><?php echo $moviename['movie_date'];?></h3>
        <?php
        }
        ?>
        </div>
    <br>
    
    <h3>Select Showtime:</h3><br>
    
  
    <form method="get" action="seats.php">
    <?php
    
    $qry5 = mysqli_query($conn, "SELECT DISTINCT start_time FROM showtime WHERE (movie_name='".$_GET['movie_name']."')&& (movie_date='".$_GET['selectedDate']."') ");
    while ($movietime = mysqli_fetch_array($qry5)){
        ?>
        <input type="radio" name="selectedTime" value="<?php echo $movietime['start_time'];?>" id="<?php echo  $movietime['start_time'];?>" required><label for="<?php echo  $movietime['start_time'];?>"><?php echo  $movietime['start_time'];?></label>

        <?php
        }
        ?>
    <input type="hidden" name="movie_name" value="<?php echo $_GET['movie_name'];?>" required>
    <input type="hidden" name="selectedDate" value="<?php echo $_GET['selectedDate'];?>" required><br><br>
    <button type="submit" class ="submit-button" id="submit">Next</button>
   

    
    </form>
    
</div>

    </body>
    </html>
    <?php
    include('footer.php');
    ?>