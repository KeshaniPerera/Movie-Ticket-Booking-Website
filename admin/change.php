<?php
include('navbar_and_database_connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Retrieve form data
    $movieID = $_POST['movie_id'];
    $movieName = mysqli_real_escape_string($conn, $_POST['movie_name']);
    $movieDescription = mysqli_real_escape_string($conn, $_POST['movie_description']);
    $imdbRating = mysqli_real_escape_string($conn, $_POST['imdb_rating']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $trailerURL = mysqli_real_escape_string($conn, $_POST['trailer_url']);

    // Create an INSERT query
    $updateMovieQuery = "UPDATE movie 
    SET movie_name = '$movieName', 
        description = '$movieDescription', 
        imdb_rating = '$imdbRating', 
        duration = '$duration', 
        trailer_url = '$trailerURL'
    WHERE movie_id = $movieID";

    // Execute the query
    if (mysqli_query($conn, $updateMovieQuery)) {
        echo "Movie record inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
$movieID = $_GET['id'];
$qry2 = "SELECT * FROM movie WHERE movie_id = $movieID";
$result2 = mysqli_query($conn, $qry2);
if ($result2 && $row = mysqli_fetch_assoc($result2)) {
    // Extract the data
    $movieName = $row['movie_name'];
    $movieImage = $row['movie_image'];
    $movieDescription = $row['description'];
    $imdbRating = $row['imdb_rating'];
    $duration = $row['duration'];
    $trailerURL = $row['trailer_url'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="change_style.css">
    <div class="wrapper">
    <form method="post" enctype="multipart/form-data">
        <div class="movie_and_genres_wrapper">
        <table>
            <tr>

                <td><label for="movie_id">Movie ID</label></td>
                <td><input type="text" name="movie_id" size="50" value="<?php echo $movieID; ?>" required></td>
            </tr>
            <tr>
                <td><label for="movie_name">Movie Name</label></td>
                <td><input type="text" name="movie_name" size="50" value="<?php echo $movieName; ?>" required></td>
            </tr>
            <tr>
                <td><label for="movie_image">Movie Image</label></td>
                <td><input type="file" name="movie_image" name="image" accept="image/*" value="<?php echo $movieImage; ?>"></td>
            </tr>
            <tr>
                <td><label for="movie_description">Movie Description</label></td>
                <td><input type="text" name="movie_description" size="50" value="<?php echo $movieDescription; ?>" required></td>
            </tr>
            <tr>
                <td><label for="imdb_rating">IMDB Rating</label></td>
                <td><input type="text" name="imdb_rating" size="50" value="<?php echo $imdbRating; ?>" required></td>
            </tr>
            <tr>
                <td><label for="duration">Duration</label></td>
                <td><input type="text" name="duration" size="50" value="<?php echo $duration; ?>" required></td>
            </tr>
            <tr>
                <td><label for="trailer_url">Trailer URL</label></td>
                <td><input type="text" name="trailer_url" size="50" value="<?php echo $trailerURL; ?>" required></td>
            </tr>
        </table>
        </div>
        <div class="genres">
      
      <table>
  </div>
        <input type="submit" value="Submit">
    </form>
</div>



</head>

<body>
</html>