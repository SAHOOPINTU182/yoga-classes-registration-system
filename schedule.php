<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// fetch user bookings (schedule)
$query = "SELECT id, class_name, trainer, time, created_at 
          FROM bookings 
          WHERE user_id='$user_id' 
          ORDER BY created_at DESC";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Schedule</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="schedule-wrapper">

    <h2 class="schedule-title">📅 My Schedule</h2>

    <?php if(mysqli_num_rows($result) == 0) { ?>
        <p class="no-data">No upcoming classes 😢</p>
    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="schedule-item">

        <div class="time-box">
            <span><?php echo $row['time']; ?></span>
        </div>

        <div class="details">
            <h3><?php echo $row['class_name']; ?></h3>
            <p>Trainer: <?php echo $row['trainer']; ?></p>
            <p>Date: <?php echo date("d M Y", strtotime($row['created_at'])); ?></p>
        </div>
<div class="actions">

    <!-- JOIN -->
    <a href="join_class.php?class=<?php echo $row['class_name']; ?>&trainer=<?php echo $row['trainer']; ?>&time=<?php echo $row['time']; ?>&date=<?php echo date('Y-m-d'); ?>">
        <button class="join-btn">Join</button>
    </a>

    <!-- CANCEL -->
    <form method="POST" action="cancel_booking.php" onsubmit="return confirm('Are you sure?')">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="cancel-btn">Cancel</button>
    </form>

</div>


    </div>

    <?php } ?>

    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>