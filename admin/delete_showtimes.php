<?php
include('navbar_and_database_connection.php');

if (isset($_GET['id'])) {
    $ShowTimeID = $_GET['id'];

    // Check if the user has confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        // Create a DELETE query
        $deleteShowTimeQuery = "DELETE FROM showtime WHERE show_time_id = $ShowTimeID";
        // Execute the query
        if (mysqli_query($conn, $deleteShowTimeQuery)) {
            echo "Show Time record with ID $ShowTimeID has been deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid or missing Show Time ID.";
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
    <tr>
            <th>Show Time ID</th>
            <th>Movie ID</th>
            <th>Movie Name</th>
            <th>Start Time</th>
            <th>Movie Date</th>
            <th>Delete</th>
</tr>

</div>
        <?php
        $qry1 = mysqli_query($conn, "SELECT * FROM showtime");
        while ($showtime = mysqli_fetch_array($qry1)) {
            ?>
            <tr>
                <td><?php echo $showtime['show_time_id']; ?></td>
                <td><?php echo $showtime['movie_id']; ?></td>
                <td><?php echo $showtime['movie_name']; ?></td>
                <td><?php echo $showtime['start_time']; ?></td>
                <td><?php echo $showtime['movie_date']; ?></td>
                <td>
                    <button onclick="confirmDelete(<?php echo $showtime['show_time_id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<script>
    function confirmDelete(ShowTimeID) {
        var confirmDelete = confirm("Are you sure you want to delete the Show Time?");
        if (confirmDelete) {
            window.location.href = "delete_showtimes.php?id=" + ShowTimeID + "&confirm=yes";
        }
    }
</script>

</body>
</html>
