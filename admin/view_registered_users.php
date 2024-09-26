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
<h2 id="heading"><centre>Registered Users</centre> </h2>
<br>
    <table>
        <tr>
            <th>Login ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
<?php
        $qry1=mysqli_query($conn,"SELECT * FROM login ");
        while($booking=mysqli_fetch_array($qry1)){
        ?>
        <tr>
            <td><?php echo $booking['login_id'];?></td>
            <td><?php echo $booking['username'];?></td>
            <td><?php echo $booking['email'];?></td>
            <td><?php echo $booking['phone_number'];?></td>
        </tr>
        <?php
        }
        ?>
    </div>
    </table>
</body>
</html>