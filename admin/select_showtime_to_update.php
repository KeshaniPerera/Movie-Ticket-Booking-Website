<?php
include('navbar_and_database_connection.php');

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="showtimes.css">

</head>
<body>

<div class="wrapper">
    <div class="showtimes_id_wrapper">
        <h2> Select Show Time ID to Update <h2>
            <br><br>
        <table>
        <tr>
        <?php
        $showtimes=mysqli_query($conn,"SELECT show_time_id FROM showtime ");
        $td_count=0;
        while($showtime=mysqli_fetch_array($showtimes)){
            $td_count++;
            ?>
           
                <td><a href="update_showtimes.php?id=<?php echo $showtime['show_time_id'];?>"><?php echo $showtime['show_time_id'];?></td>
            
            <?php
            if($td_count>=10){
                ?>
                </tr>
                <?php
                $td_count=0;
            }
        }
        ?> 
            </tr>
            </table>
    </div>

    </div>
    
</body>
</html>