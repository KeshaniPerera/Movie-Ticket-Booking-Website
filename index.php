<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/trolls.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>TROLLS BAND TOGETHER</h5><br>
                <p id="sliderdescription">Poppy discovers that Branch and his four brothers were once part of her favorite boy band.</p>
                <button id="booktickets"> 
                <a id="bookbutton" href="<?php echo isset($_SESSION['username']) ? 'selectdate.php?id=3' : 'javascript:alert(\'Login to Buy Tickets\');window.location=\'sign_in.php\';'; ?>">
                  Book Tickets</a> </button>
                
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/pawpatrol.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>PAW PATROL</h5><br>
              <p id="sliderdescription">Six brave puppies, captained by a tech-savvy ten-year-old boy, Ryder.</p>
              <button id="booktickets"> 
              <a id="bookbutton" href="<?php echo isset($_SESSION['username']) ? 'selectdate.php?id=1' : 'javascript:alert(\'Login to Buy Tickets\');window.location=\'sign_in.php\';'; ?>">

                  Book Tickets</a> </button>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/openheimer.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>OPPENHEIMER</h5><br>
              <p id="sliderdescription">Must-watch, unraveling the moral quandaries of science.</p>
              <button id="booktickets">
              <a id="bookbutton" href="<?php echo isset($_SESSION['username']) ? 'selectdate.php?id=2' : 'javascript:alert(\'Login to Buy Tickets\');window.location=\'sign_in.php\';'; ?>">

                Book Tickets</a> </button>
              </div>
          </div>
          </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div> 
 <div class="topmovies">
<h2> <span class="leftshevron">>></span> &nbsp;&nbsp;  TOP MOVIES  &nbsp;&nbsp;<span class="rightshevron"><< </span></h2>>
 <div class="topmovieitems">

    <?php
  $qry1=mysqli_query($conn,"SELECT * FROM movie LIMIT 4");
  while($nm=mysqli_fetch_array($qry1)){
?>
   <div class="topmovieitemdata">
    <a href="moviedescription.php?id=<?php echo $nm['movie_id'];?>"><img class="movieimage1" src="<?php echo $nm['movie_image'];?>"></a>
    <div class="moviedetails">
      <div class="moviename"><?php echo $nm['movie_name'];?></div>
      <button class="buy">
    <a href="<?php echo isset($_SESSION['username']) ? 'selectdate.php?id=' . $nm['movie_id'] : 'sign_in.php'; ?>">
        Book Tickets
    </a>
</button><br>
       <a class="moreinfo" href="moviedescription.php?id=<?php echo $nm['movie_id'];?>"> TRAILER & INFO </a>

      </div>

  </div>
      <?php
    }
  ?>  
  </div><br>
  <a class="moremovies" href="movies.php">More Movies &nbsp;&nbsp; <span class="shevron">>></span> </a>
  </div>
  <?php
include('footer.php');
?> 
 
</body>
</html>
