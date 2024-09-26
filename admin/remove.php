<?php
include('navbar_and_database_connection.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $movieID = $_GET['id'];
    
    $deleteMovieQuery = "DELETE FROM movie WHERE movie_id = $movieID";
    $deleteCastQuery = "DELETE FROM cast WHERE movie_id = $movieID";
    $deleteGenreQuery = "DELETE FROM genres WHERE movie_id = $movieID";
    $deleteTeamQuery = "DELETE FROM team WHERE movie_id = $movieID";


    if (mysqli_query($conn, $deleteMovieQuery)) {
        echo "Movie record with ID $movieID has been deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid or missing movie ID.";
}
?>