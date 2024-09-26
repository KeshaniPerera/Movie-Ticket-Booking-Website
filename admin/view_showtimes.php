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
    <table>
        <tr>
            <th>Show Time ID</th>
            <th>Movie ID</th>
            <th>Movie Name</th>
            <th>Start Time</th>
            <th>Movie Date</th>
        </tr>
<?php
        $qry1=mysqli_query($conn,"SELECT * FROM showtime ");
        while($showtime=mysqli_fetch_array($qry1)){
        ?>
        <tr>
            <td><?php echo $showtime['show_time_id'];?></td>
            <td><?php echo $showtime['movie_id'];?></td>
            <td><?php echo $showtime['movie_name'];?></td>
            <td><?php echo $showtime['start_time'];?></td>
            <td><?php echo $showtime['movie_date'];?></td>
        </tr>
        <?php
        }
        ?>
    </div>
    </table>
</body>
</html>
