<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="moviedescription.css">
</head>
<body>
<div class="wrapper">
    <div class="description">
        <br>
        <?php
        

        if (strpos($_GET['id'], 'C') !== false && strpos($_GET['id'], 'S') !== false) {

            $movie=mysqli_query($conn,"SELECT movie_name, description FROM comingsoonmovie WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
           ?>
               <h2> <?php echo $moviedetails['movie_name'];?></h2>
               <p> <?php echo $moviedetails['description'];?></p>
               <hr><br>
           <?php
            }
            ?>
            
        <h3> GENRES</h3>
        <div class="genres_wrapper">
        <?php
        $movie=mysqli_query($conn,"SELECT genre FROM genres WHERE movie_id='".$_GET['id']."'");
        while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <h5><?php echo $moviedetails['genre'];?></h5>
        <?php
        }
        ?> 

        </div>
        <div class="rating_duration">
        <?php
        $movie=mysqli_query($conn,"SELECT imdb_rating, duration FROM comingsoonmovie WHERE movie_id='".$_GET['id']."'");
        while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <h3> IMDB Rating : </h3><h5><?php echo $moviedetails['imdb_rating'];?></h5><h3>DURATION: </h3><h5><?php echo $moviedetails['duration'];?></h5></div>
        <?php
        }
        ?>
        <hr>
        
    </div>
    <div class="video">
    <br>
    <?php
    $movie=mysqli_query($conn,"SELECT trailer_url FROM comingsoonmovie WHERE movie_id='".$_GET['id']."'");
    while ($moviedetails = mysqli_fetch_array($movie)) {
    ?>
    <iframe width="810" height="412"src="<?php echo $moviedetails['trailer_url'];?>"frameborder="0" allowfullscreen></iframe>
    <?php
    }
    ?>
        <h3> TRAILER</h3>  
    </div>
</div>
<div class="cast_and_team">
    <div class="cast">
        <div class="cast_topic">
            <h4> CAST</h4><br>
        </div>
        <table>
            <tr>
                <th>Actor</th>
                <th>Character</th>
            </tr>
            
             <?php   
            $movie=mysqli_query($conn,"SELECT main_actor, main_character FROM cast WHERE movie_id='".$_GET['id']."'");
           while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
                <tr>
                <td><?php echo $moviedetails['main_actor'];?></td>
                <td><?php echo $moviedetails['main_character'];?></td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>
    
       
    <div class="team">
        <div class="team_topic">
            <h4> TEAM</h4><br>
            </div>
            <table>
            <tr>
            <th>Director</th>
            <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
           while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['director'];?></td>
            </tr>
            <?php
           }
           ?>
            <tr>
            <th>Producer</th>
            <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['producer'];?></td>
            </tr>
            <?php
           }
           ?>
            <tr>
                <th>Writer </th>
                <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['writer'];?></td>
            </tr>
            <?php
           }
           ?>
           
           <tr>
                <th>Music </th>
                <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['music'];?></td>
            </tr>
            <?php
           }
           ?>

        </table>
            

    </div>
    
</div>
<?php
        }
    else{
        
     $movie=mysqli_query($conn,"SELECT movie_name, description FROM movie WHERE movie_id='".$_GET['id']."'");
     while ($moviedetails = mysqli_fetch_array($movie)) {
    ?>
        <h2> <?php echo $moviedetails['movie_name'];?></h2>
        <p> <?php echo $moviedetails['description'];?></p>
        <hr><br>
    <?php
     }
     ?>
        <h3> GENRES</h3>
        <div class="genres_wrapper">
        <?php
        $movie=mysqli_query($conn,"SELECT genre FROM genres WHERE movie_id='".$_GET['id']."'");
        while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <h5><?php echo $moviedetails['genre'];?></h5>
        <?php
        }
        ?> 

        </div>
        <div class="rating_duration">
        <?php
        $movie=mysqli_query($conn,"SELECT imdb_rating, duration FROM movie WHERE movie_id='".$_GET['id']."'");
        while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <h3> IMDB Rating : </h3><h5><?php echo $moviedetails['imdb_rating'];?></h5><h3>DURATION: </h3><h5><?php echo $moviedetails['duration'];?></h5></div>
        <?php
        }
        ?>
        <hr>
        
    </div>
    <div class="video">
    <br>
    <?php
    $movie=mysqli_query($conn,"SELECT trailer_url FROM movie WHERE movie_id='".$_GET['id']."'");
    while ($moviedetails = mysqli_fetch_array($movie)) {
    ?>
    <iframe width="810" height="412"src="<?php echo $moviedetails['trailer_url'];?>"frameborder="0" allowfullscreen></iframe>
    <?php
    }
    ?>
        <h3> TRAILER</h3>  
    </div>
</div>
<div class="cast_and_team">
    <div class="cast">
        <div class="cast_topic">
            <h4> CAST</h4><br>
        </div>
        <table>
            <tr>
                <th>Actor</th>
                <th>Character</th>
            </tr>
            
             <?php   
            $movie=mysqli_query($conn,"SELECT main_actor, main_character FROM cast WHERE movie_id='".$_GET['id']."'");
           while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
                <tr>
                <td><?php echo $moviedetails['main_actor'];?></td>
                <td><?php echo $moviedetails['main_character'];?></td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>
    
       
    <div class="team">
        <div class="team_topic">
            <h4> TEAM</h4><br>
            </div>
            <table>
            <tr>
            <th>Director</th>
            <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
           while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['director'];?></td>
            </tr>
            <?php
           }
           ?>
            <tr>
            <th>Producer</th>
            <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['producer'];?></td>
            </tr>
            <?php
           }
           ?>
            <tr>
                <th>Writer </th>
                <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['writer'];?></td>
            </tr>
            <?php
           }
           ?>
           
           <tr>
                <th>Music </th>
                <?php
            $movie=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
            while ($moviedetails = mysqli_fetch_array($movie)) {
            ?>
            <td><?php echo $moviedetails['music'];?></td>
            </tr>
            <?php
           }
           ?>

        </table>
            

    </div>
    
</div>
<?php
    }
    ?>


</body>
<?php
include('footer.php');
?>  
</body>
</html>
