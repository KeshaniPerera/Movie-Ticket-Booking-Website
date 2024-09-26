<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="moviesstyle.css">
</head>
<body>
<div class="now_showing_text"><h2>NOW SHOWING</h2></div>
<div class="now_showing">
<?php
$qry1 = mysqli_query($conn,"SELECT * FROM movie");
$count = 0;

while ($nm = mysqli_fetch_array($qry1)) {
    if ($count>=5) {
        // Start a new row after every 5 movies
        echo '<div class="row">';
        $count=0;
    }
    ?>
    <div class="topmovieitemdata">
        <a href="moviedescription.php?id=<?php echo $nm['movie_id']; ?>"><img class="movieimage1" src="<?php echo $nm['movie_image']; ?>"></a>
        <div class="moviedetails">
            <div class="moviename"><?php echo $nm['movie_name']; ?></div>
            <button class="buy">    <a href="<?php echo isset($_SESSION['username']) ? 'selectdate.php?id=' . $nm['movie_id'] : 'sign_in.php'; ?>">
        Book Tickets
    </a></button><br>
            <a class="moreinfo" href="moviedescription.php?id=<?php echo $nm['movie_id']; ?>"> TRAILER & INFO  </a>
        </div>
    </div>
    <?php
    $count++;
    if ($count>=5) {
        // Close the row after every 5 movies
        echo '</div>';
    }
}
// Close the last row if not already closed
if ($count<5) {
    echo '</div>';
}
?>
</div><br> 
<!-- 
<div class="coming_soon">
<div class="coming_soon_text"><h2>COMING SOON</h2></div>
<div class="comming_soon_wrap">

<?php
$qry1 = mysqli_query($conn,"SELECT * FROM comingsoonmovie");
$count = 0;

while ($nm = mysqli_fetch_array($qry1)) {
    if ($count>=5) {
        // Start a new row after every 5 movies
        echo '<div class="row">';
        $count=0;
    }
    ?>
    <div class="topmovieitemdata">
        <a href="moviedescription.php?id=<?php echo $nm['movie_id']; ?>"><img class="movieimage1"src="<?php echo $nm['movie_image']; ?>"></a>
        <div class="moviedetails">
            <div class="moviename"><?php echo $nm['movie_name']; ?></div>
            <div class="space"></div>
            <div class="comming_soon_more_info">
            <a class="moreinfo" href="moviedescription.php?id=<?php echo $nm['movie_id']; ?>"> TRAILER & INFO </a></div>
        </div>
    </div>
    <?php
    $count++;
    if ($count>=5) {
        // Close the row after every 5 movies
        echo '</div>';
    }
}
// Close the last row if not already closed
if ($count<5) {
    echo '</div>';
}
?>
</div>
</div> -->

<?php
include('footer.php');
?> 
</body>
</html>
