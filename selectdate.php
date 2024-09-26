<?php
include('header.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" type="text/css" href="selectdate.css">
<div class="wrapper">
    <?php
     $qry4=mysqli_query($conn,"SELECT movie_name FROM movie WHERE movie_id='".$_GET['id']."'");
     while ($moviename = mysqli_fetch_array($qry4)) {
    ?>
    <form id="dateForm" action="selectTime.php" method="get">
    <h2><?php echo $moviename['movie_name'];?></h2>
    <input type="hidden" name="movie_name" value="<?php echo $moviename['movie_name'];?>">
    <?php
     }
     ?><br>

    <h3>Select Date:</h3><br>
     <?php
     $qry3=mysqli_query($conn,"SELECT DISTINCT movie_date,movie_id FROM showtime WHERE movie_id='".$_GET['id']."'");
     while ($moviedate = mysqli_fetch_array($qry3)){
        ?>
         <input type="radio" name="selectedDate" value="<?php echo $moviedate['movie_date'];?>" id="<?php echo $moviedate['movie_date'];?>" required><label for="<?php echo $moviedate['movie_date'];?>"><?php echo $moviedate['movie_date'];?></label>
        
        <?php
        }
        ?><br><br><br>

        <button type="submit" class="submit-button">Next </button>
    </form>
</div>    


<script src="selectdatescript.js"></script>
<?php
include('footer.php');
?> 