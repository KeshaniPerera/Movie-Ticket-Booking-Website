<?php
include('navbar_and_database_connection.php');



if (isset($_GET['id'])) {
    $movieID = $_GET['id'];

    // Check if the user has confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        // Create a DELETE query
        $tableName = '';

        if (strpos($movieID, 'CS') !== false) {
            $tableName = "comingsoonmovie";
        } else {
            $tableName = "movie";
        }

        $deleteMovieQuery = "DELETE FROM $tableName WHERE movie_id = '$movieID'";
        $deleteCastQuery = "DELETE FROM cast WHERE movie_id = '$movieID'";
        $deleteGenreQuery = "DELETE FROM genres WHERE movie_id = '$movieID'";
        $deleteTeamQuery = "DELETE FROM team WHERE movie_id = '$movieID";

        // Execute the query
        if (mysqli_query($conn, $deleteMovieQuery)) {
            echo "<script>alert('Movie record with ID $movieID has been deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
} else {
    echo "Invalid or missing movie ID.";
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
    <table>
        <?php
        if (isset($_GET['id']) &&($_GET['id'] == 2)) {
            $tableName = "comingsoonmovie";
        } else {
            $tableName = "movie";
        }
        $qry1 = mysqli_query($conn, "SELECT movie_id, movie_name FROM $tableName");
        while ($movie = mysqli_fetch_array($qry1)) {
            ?>
            <tr>
                <td><?php echo $movie['movie_id']; ?></td>
                <td><?php echo $movie['movie_name']; ?></td>
                <td>
                    <button onclick="confirmDelete(<?php echo $movie['movie_id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<script>
    function confirmDelete(movieID) {
        var confirmDelete = confirm("Are you sure you want to delete the movie?");
        if (confirmDelete) {
            window.location.href = "delete_movies.php?id=" + movieID + "&confirm=yes";
        }
    }
</script>

</body>
</html>
