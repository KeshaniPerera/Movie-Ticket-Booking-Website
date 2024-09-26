<?php
include('navbar_and_database_connection.php');

$showtimeID = $_GET['id'];
$selectQuery1 = "SELECT * FROM showtime WHERE show_time_id = $showtimeID";
$result1 = mysqli_query($conn, $selectQuery1);
if ($result1 && $row = mysqli_fetch_assoc($result1)) {
    // take the datafrom database
    $movieID = $row['movie_id'];
    $movieName = $row['movie_name'];
    $startTime = $row['start_time'];
    $movieDate = $row['movie_date'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $movieID = $_POST['movie_id'];
    $startTime = mysqli_real_escape_string($conn, $_POST['start_time']);
    $movieDate = mysqli_real_escape_string($conn, $_POST['movie_date']);
    
    $updateShowTimeQuery = "UPDATE showtime 
        SET  movie_id = $movieID,  
            start_time = '$startTime', 
            movie_date = '$movieDate'
        WHERE show_time_id = $showtimeID";
    mysqli_query($conn, $updateShowTimeQuery);
    
}
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
    <form method="post" id="update_showtimes">
        <table>

            <tr>
                <td><label for="movie_id">Movie ID</label></td>
                <td><input type="text" name="movie_id" size="50" value="<?php echo $movieID; ?>" required></td>
            </tr>
            <tr>
                <td><label for="start_time">Start Time</label></td>
                <td><input type="text" name="start_time" size="50" value="<?php echo $startTime; ?>" required></td>
            </tr>
            <tr>
                <td><label for="movie_date">Movie Date</label></td>
                <td><input type="date" name="movie_date" size="50" value="<?php echo $movieDate; ?>" required></td>
            </tr>
        </table>
        <br><br><br>
        <input type="submit" name="submit" class="submit" value="Submit">
    </form>
</div>
</body>
</html>
