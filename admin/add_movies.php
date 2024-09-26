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
        
    // Handle image upload
    if (isset($_FILES['movie_image'])) {
        $imageFileName = $_FILES['movie_image']['name'];
        $imageTempName = $_FILES['movie_image']['tmp_name'];
        $imageDestination = "add_movie_images/" . $imageFileName;

        if (move_uploaded_file($imageTempName, $imageDestination)) {
            // Image uploaded successfully, proceed with the query
            $movieImage = mysqli_real_escape_string($conn, $imageDestination);

        if (strpos($movieID, 'CS') !== false) {

        
            $insertMovieQuery = "INSERT INTO comingsoonmovie (movie_id, movie_name, movie_image, description, imdb_rating, duration, trailer_url)
             VALUES ('$movieID', '$movieName', '$movieImage', '$movieDescription', '$imdbRating', '$duration', '$trailerURL')";

        }
        else
        {

            $insertMovieQuery = "INSERT INTO movie (movie_id, movie_name, movie_image, description, imdb_rating, duration, trailer_url)
             VALUES ('$movieID', '$movieName', '$movieImage', '$movieDescription', '$imdbRating', '$duration', '$trailerURL')";}

            
            // Create an INSERT query $insertTeamQuery = " INSERT INTO team (movie_id,director,producer,writer,music)VALUES
             
            // Create an INSERT query('$movieID',)
            // Execute the query
            if (mysqli_query($conn, $insertMovieQuery)) {
                echo "Movie record inserted successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading the image.";
        }
    }
    $insertCastQuery = " INSERT INTO cast (movie_id,actor_and_character_id,main_actor,main_character) VALUES 
    ('$movieID',1,'$actor1','$character1'),
    ('$movieID',2,'$actor2','$character2'),
    ('$movieID',3,'$actor3','$character3'),
    ('$movieID',4,'$actor4','$character4'),
    ('$movieID',5,'$actor5','$character5'),
    ('$movieID',6,'$actor6','$character6')";
    mysqli_query($conn, $insertCastQuery);

    $insertTeamQuery = " INSERT INTO team (movie_id,director,producer,writer,music)VALUES 
    ('$movieID','$director','$producer','$writer','$music')";
    mysqli_query($conn, $insertTeamQuery);

    $insertGenreQuery = " INSERT INTO genres (movie_id,genre_id_in_movie,genre)VALUES 
    ('$movieID',1,'$genre1'),
    ('$movieID',2,'$genre2'),
    ('$movieID',3,'$genre3')";
    mysqli_query($conn, $insertGenreQuery);

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
                    <td><input type="text" name="movie_id" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="movie_name">Movie Name</label></td>
                    <td><input type="text" name="movie_name" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="movie_image">Movie Image</label></td>
                    <td>
                <input type="file" name="movie_image">   </td>
                </tr>
                <tr>
                    <td><label for="movie_description">Movie Description</label></td>
                    <td><textarea name="movie_description" rows="3" cols="47" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="imdb_rating">IMDB Rating</label></td>
                    <td><input type="text" name="imdb_rating" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="duration">Duration</label></td>
                    <td><input type="text" name="duration" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="trailer_url">Trailer URL</label></td>
                    <td><input type="text" name="trailer_url" size="50" required></td>
                </tr>
                <tr >
                    <td><label for="genres">Genres</label></td>
                    <td>
                        <input type="text" name="genre1" size="30">
                        <input type="text" name="genre2" size="30">
                        <input type="text" name="genre3" size="30">
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
                        <input type="text" name="actor1" size="50">
                        <input type="text" name="character1" size="50">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor2" size="50">
                        <input type="text" name="character2" size="50">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor3" size="50">
                        <input type="text" name="character3" size="50">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor4" size="50">
                        <input type="text" name="character4" size="50">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor5" size="50">
                        <input type="text" name="character5" size="50">
                    </td>
                </tr>
                <tr class="actor_character_list">
                    <td></td>
                    <td>
                        <input type="text" name="actor6" size="50">
                        <input type="text" name="character6" size="50">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td><label for="director">Director</label></td>
                    <td><input type="text" name="director" size="50"></td>
                </tr>
                <tr>
                    <td><label for="Producer">Producer</label></td>
                    <td><input type="text" name="producer" size="50"></td>
                </tr>
                <tr>
                    <td><label for="Writer">Writer</label></td>
                    <td><input type="text" name="writer" size="50"></td>
                </tr>
                <tr>
                    <td><label for="Music">Music</label></td>
                    <td><input type="text" name="music" size="50"></td>
                </tr>



            </table>
        </div>
        <input type="submit" class="add_movies" value="Submit">
    </form>
</div>

</body>
</html>

