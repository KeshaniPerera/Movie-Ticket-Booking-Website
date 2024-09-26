<?php
include('navbar_and_database_connection.php');

$movieID = $_GET['id'];

$tableName = strpos($movieID, 'CS') !== false ? 'comingsoonmovie' : 'movie';
$selectQuery1 = "SELECT * FROM $tableName WHERE movie_id = '$movieID'";
$result1 = mysqli_query($conn, $selectQuery1);
if ($result1 && $row = mysqli_fetch_assoc($result1)) {
    $movieName = $row['movie_name'];
    $movieDescription = $row['description'];
    $imdbRating = $row['imdb_rating'];
    $duration = $row['duration'];
    $trailerURL = $row['trailer_url'];
}

$selectQuery2 = "SELECT * FROM genres WHERE movie_id = '$movieID'";
$result2 = mysqli_query($conn, $selectQuery2);
if ($result2) {
 
    $row = mysqli_fetch_assoc($result2);
    $genre1 = $row['genre'];

    $row = mysqli_fetch_assoc($result2);
    $genre2 = $row['genre'];

    $row = mysqli_fetch_assoc($result2);
    $genre3 = $row['genre'];

}

$selectQuery3 = "SELECT * FROM cast WHERE movie_id = '$movieID'";
$result3 = mysqli_query($conn, $selectQuery3);
if ($result3) {
 
    $row = mysqli_fetch_assoc($result3);
    $actor1 = $row['main_actor'];
    $character1 = $row['main_character'];

    $row = mysqli_fetch_assoc($result3);
    $actor2 = $row['main_actor'];
    $character2 = $row['main_character'];

    $row = mysqli_fetch_assoc($result3);
    $actor3 = $row['main_actor'];
    $character3 = $row['main_character'];

    $row = mysqli_fetch_assoc($result3);
    $actor4 = $row['main_actor'];
    $character4 = $row['main_character'];

    $row = mysqli_fetch_assoc($result3);
    $actor5 = $row['main_actor'];
    $character5 = $row['main_character'];

    $row = mysqli_fetch_assoc($result3);
    $actor6 = $row['main_actor'];
    $character6 = $row['main_character'];

}

$selectQuery4 = "SELECT * FROM team WHERE movie_id = '$movieID'";
$result4 = mysqli_query($conn, $selectQuery4);
if ($result4 && $row = mysqli_fetch_assoc($result4)) {
    // Extract the data
    $director = $row['director'];
    $producer = $row['producer'];
    $writer = $row['writer'];
    $music = $row['music'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle form submission

    // Retrieve form data
    $movieID = $_POST['movie_id'];
    $movieName = mysqli_real_escape_string($conn, $_POST['movie_name']);
    $movieDescription = mysqli_real_escape_string($conn, $_POST['movie_description']);
    $imdbRating = mysqli_real_escape_string($conn, $_POST['imdb_rating']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $trailerURL = mysqli_real_escape_string($conn, $_POST['trailer_url']);
    $genre1 = mysqli_real_escape_string($conn, $_POST['genre1']);
    $genre2 = mysqli_real_escape_string($conn, $_POST['genre2']);
    $genre3 = mysqli_real_escape_string($conn, $_POST['genre3']);
    $actor1 = mysqli_real_escape_string($conn, $_POST['actor1']);
    $actor2 = mysqli_real_escape_string($conn, $_POST['actor2']);
    $actor3 = mysqli_real_escape_string($conn, $_POST['actor3']);
    $actor4 = mysqli_real_escape_string($conn, $_POST['actor4']);
    $actor5 = mysqli_real_escape_string($conn, $_POST['actor5']);
    $actor6 = mysqli_real_escape_string($conn, $_POST['actor6']);
    $character1 = mysqli_real_escape_string($conn, $_POST['character1']); 
    $character2 = mysqli_real_escape_string($conn, $_POST['character2']);
    $character3 = mysqli_real_escape_string($conn, $_POST['character3']);
    $character4 = mysqli_real_escape_string($conn, $_POST['character4']);
    $character5 = mysqli_real_escape_string($conn, $_POST['character5']);
    $character6 = mysqli_real_escape_string($conn, $_POST['character6']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $producer = mysqli_real_escape_string($conn, $_POST['producer']);
    $writer = mysqli_real_escape_string($conn, $_POST['writer']);
    $music = mysqli_real_escape_string($conn, $_POST['music']);



        

    $updateMovieQuery = "UPDATE $tableName 
    SET movie_name = '$movieName', 
        description = '$movieDescription', 
        imdb_rating = '$imdbRating', 
        duration = '$duration', 
        trailer_url = '$trailerURL'
    WHERE movie_id = '$movieID'";
    mysqli_query($conn, $updateMovieQuery);

   
    $updateCastQuery = "UPDATE cast
    SET 
        main_actor = CASE actor_and_character_id
            WHEN 1 THEN '$actor1'
            WHEN 2 THEN '$actor2'
            WHEN 3 THEN '$actor3'
            WHEN 4 THEN '$actor4'
            WHEN 5 THEN '$actor5'
            WHEN 6 THEN '$actor6'
            ELSE main_actor
        END,
        main_character = CASE actor_and_character_id
            WHEN 1 THEN '$character1'
            WHEN 2 THEN '$character2'
            WHEN 3 THEN '$character3'
            WHEN 4 THEN '$character4'
            WHEN 5 THEN '$character5'
            WHEN 6 THEN '$character6'
            ELSE main_character
        END
    WHERE movie_id = '$movieID'";
mysqli_query($conn, $updateCastQuery);



    $updateGenresQuery = "UPDATE genres
    SET 
        genre = CASE 
            WHEN genre_id_in_movie = 1 THEN '$genre1'
            WHEN genre_id_in_movie = 2 THEN '$genre2'
            WHEN genre_id_in_movie = 3 THEN '$genre3'
        END
    WHERE movie_id = '$movieID'";
mysqli_query($conn, $updateGenresQuery);

$updateTeamQuery = "UPDATE team 
SET director = '$director', 
    producer = '$producer', 
    writer = '$writer', 
    music = '$music'
WHERE movie_id = '$movieID'";
mysqli_query($conn, $updateTeamQuery);

if (isset($_FILES['movie_image'])) {
    $imageFileName = $_FILES['movie_image']['name'];
    $imageTempName = $_FILES['movie_image']['tmp_name'];
    $imageDestination = "add_movie_images/" . $imageFileName;

    if (move_uploaded_file($imageTempName, $imageDestination)) {
        // if image is in the destination proceed with the query
        $movieImage = mysqli_real_escape_string($conn, $imageDestination);

        $updateImageQuery = "UPDATE $tableName
        SET movie_image='$movieImage'
        WHERE movie_id='$movieID'";
        mysqli_query($conn, $updateImageQuery);
    }
}


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="add_and_update_movies_style.css">
</head>
<body>
<div class="wrapper">
    <form method="post" id="add_movie" enctype="multipart/form-data">
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
                    <td>
                <input type="file" name="movie_image">   </td>
                </tr>
                <tr>
                    <td><label for="movie_description">Movie Description</label></td>
                    <td><input type="text" name="movie_description" size="50" value="<?php echo $movieDescription; ?>" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="imdb_rating">IMDB Rating</label></td>
                    <td><input type="text" name="imdb_rating" size="50" required value="<?php echo $imdbRating; ?>"></td>
                </tr>
                <tr>
                    <td><label for="duration">Duration</label></td>
                    <td><input type="text" name="duration" size="50" required value="<?php echo $duration; ?>"></td>
                </tr>
                <tr>
                    <td><label for="trailer_url">Trailer URL</label></td>
                    <td><input type="text" name="trailer_url" size="50" required value="<?php echo $trailerURL; ?>"></td>
                </tr>
                <tr class="genres">
                    <td><label for="genres">Genres</label></td>
                    <td>
                        <input type="text" name="genre1" size="30" value="<?php echo $genre1; ?>">
                        <input type="text" name="genre2" size="30" value="<?php echo $genre2; ?>">
                        <input type="text" name="genre3" size="30" value="<?php echo $genre3; ?>">
                    </td>
                </tr>
                <tr class="cast">
                    <td><label for="genres">Cast</label></td>
                    <td class="actor_character">
                        <label for="Actor">Actor</label>
                        <label for="Character">Character</label>
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor1" size="50" value="<?php echo $actor1; ?>">
                        <input type="text" name="character1" size="50" value="<?php echo $character1; ?>">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor2" size="50" value="<?php echo $actor2; ?>">
                        <input type="text" name="character2" size="50" value="<?php echo $character2; ?>">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor3" size="50" value="<?php echo $actor3; ?>">
                        <input type="text" name="character3" size="50" value="<?php echo $character3; ?>">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor4" size="50" value="<?php echo $actor4; ?>">
                        <input type="text" name="character4" size="50" value="<?php echo $character4; ?>">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor5" size="50" value="<?php echo $actor5; ?>">
                        <input type="text" name="character5" size="50" value="<?php echo $character5; ?>">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor6" size="50" value="<?php echo $actor6; ?>">
                        <input type="text" name="character6" size="50"  value="<?php echo $character6; ?>">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td><label for="director">Director</label></td>
                    <td><input type="text" name="director" size="50" value="<?php echo $director; ?>"> </td>
                </tr>
                <tr>
                    <td><label for="Producer">Producer</label></td>
                    <td><input type="text" name="producer" size="50"value="<?php echo $producer; ?>"> </td>
                </tr>
                <tr>
                    <td><label for="Writer">Writer</label></td>
                    <td><input type="text" name="writer" size="50" value="<?php echo $writer; ?>"> </td>
                </tr>
                <tr>
                    <td><label for="Music">Music</label></td>
                    <td><input type="text" name="music" size="50" value="<?php echo $music; ?>"> </td>
                </tr>



            </table>
        </div>
        <input type="submit" class="add_movies"  value="Submit">
    </form>
</div>

</body>
</html>

