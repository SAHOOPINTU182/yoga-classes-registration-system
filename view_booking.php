<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "
SELECT 
    class_name,
    trainer,
    time,
    created_at
FROM bookings
WHERE user_id = '$user_id'
";

$result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background:#09163f;">

<div class="booking-container">

    <h2 class="booking-title">📋 Your Bookings</h2>

    <table class="booking-table">
        <tr>
            <th>Class</th>
            <th>Trainer</th>
            <th>Time</th>
            <th>Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td>
                <span class="badge">
                    <?php echo $row['class_name']; ?>
                </span>
            </td>
            <td><?php echo $row['trainer']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td>
                <?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?>
            </td>
        </tr>
        <?php } ?>

    </table>

    <?php if(mysqli_num_rows($result) == 0) { ?>
    <p class="no-data">No bookings yet 😢</p>
    <?php } ?>

    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>