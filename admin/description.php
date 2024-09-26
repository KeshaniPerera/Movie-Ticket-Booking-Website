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
    <div class="description">
<h2><centre>Movie Details </h2>
<br>
    <table>
        <tr>
            <th>Movie Name</th>
            <th>Movie Image</th>
            <th>Movie Description</th>
            <th>IMDB Rating</th>
            <th>Duration</th>
            <th>Trailer URL</th>
        </tr>
<?php
if (strpos($_GET['id'], 'CS') !== false) {

$qry1=mysqli_query($conn,"SELECT * FROM comingsoonmovie WHERE movie_id='".$_GET['id']."'");
        while($movie=mysqli_fetch_array($qry1)){
        ?>
        <tr>
            <td><?php echo $movie['movie_name'];?></td>
            <td> <?php echo $movie['movie_image'];?></td>
            <td><?php echo $movie['description'];?></td>
            <td><?php echo $movie['imdb_rating'];?></td>
            <td><?php echo $movie['duration'];?></td>
            <td><?php echo $movie['trailer_url'];?></td>
        </tr>
        <?php
        }
        ?>
    </div>
    </table>
<?php
}
else{

        $qry1=mysqli_query($conn,"SELECT * FROM movie WHERE movie_id='".$_GET['id']."'");
        while($movie=mysqli_fetch_array($qry1)){
        ?>
        <tr>
            <td><?php echo $movie['movie_name'];?></td>
            <td><?php echo $movie['movie_image'];?></td>
            <td><?php echo $movie['description'];?></td>
            <td><?php echo $movie['imdb_rating'];?></td>
            <td><?php echo $movie['duration'];?></td>
            <td><?php echo $movie['trailer_url'];?></td>
        </tr>
        <?php
        }
        ?>
    </div>
    </table>
<?php
}
?>
    <div class="cast_and_team">
        <div class="cast">
        <h2><centre>Cast</h2>
        <table>
        <tr>
            <th>Actor</th>
            <th>Character</th>
        </tr>
        <?php
        $qry2=mysqli_query($conn,"SELECT * FROM cast WHERE movie_id='".$_GET['id']."'");
        while($cast=mysqli_fetch_array($qry2)){
        ?>
        <tr>
        <td><?php echo $cast['main_actor'];?></td>
        <td><?php echo $cast['main_character'];?></td>
        </tr>
        <?php
        }
        ?>
        </table>  
    </div>
    <div class="team">
    <h2><centre>Team</h2>
        <table>
        <?php
        $qry3=mysqli_query($conn,"SELECT * FROM team WHERE movie_id='".$_GET['id']."'");
        while($team=mysqli_fetch_array($qry3)){
        ?>
        <tr>
        <th>Director</th>
        <td><?php echo $team['director'];?></td>
        </tr>
        <tr>
        <th>Producer</th>
        <td><?php echo $team['producer'];?></td>
        </tr>
        <tr>
        <th>Writer</th>
        <td><?php echo $team['writer'];?></td>
        </tr>
        <tr>
        <th>Music</th>
        <td><?php echo $team['music'];?></td>
        </tr>
        <?php
        }
        ?>
        </table>  
    </div>
    </div>
    <div class="genres">
    <h2><centre>Genres</h2> 
    <table>
        <tr>
    <?php
        $qry4=mysqli_query($conn,"SELECT genre FROM genres WHERE movie_id='".$_GET['id']."'");
        while($genre=mysqli_fetch_array($qry4)){
        ?>
        <td><?php echo $genre['genre'];?></td>
        <?php
        }
        ?>
        </tr>
    </table>
    <br><br>
    </div>
   

    </div>
</body>
</html>