<?php
include('navbar_and_database_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view_movies_style.css">
</head>
<body>
<?php
if (isset($_GET['id']) && $_GET['id'] == 2) {
?>

<div class="wrapper">
        <table>
        <?php
        $qry1=mysqli_query($conn,"SELECT movie_id,movie_name FROM comingsoonmovie ");
        while($movie=mysqli_fetch_array($qry1)){
            ?>
            <tr>
                <td><h3><?php echo $movie['movie_id'];?></h3></td>
                <td><h4><a href="description.php?id=<?php echo $movie['movie_id'];?>"><?php echo $movie['movie_name'];?></h4></a></td> 
 
            </tr>
            <?php
        }
        ?> 

            </table>

    </div>

<?php
}
else{
?>
<div class="wrapper">
        <table>
        <?php
        $qry1=mysqli_query($conn,"SELECT movie_id,movie_name FROM movie ");
        while($movie=mysqli_fetch_array($qry1)){
            ?>
            <tr>
                <td><h3><?php echo $movie['movie_id'];?></h3></td>
                <td><h4><a href="description.php?id=<?php echo $movie['movie_id'];?>"><?php echo $movie['movie_name'];?></h4></a></td> 
 
            </tr>
            <?php
        }
        ?> 

            </table>

    </div>
  <?php
}
?>  
</body>
</html>