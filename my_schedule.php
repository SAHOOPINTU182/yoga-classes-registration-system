<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* FETCH USER BOOKINGS */
$result = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY id DESC");
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

        <!-- TIME -->
        <div class="time-box">
            <span><?php echo $row['time']; ?></span>
        </div>

        <!-- DETAILS -->
        <div class="details">
            <h3><?php echo $row['class_name']; ?></h3>
            <p>Trainer: <?php echo $row['trainer']; ?></p>
            <p>Date: <?php echo date("d M Y", strtotime($row['created_at'])); ?></p>
        </div>

        <!-- ACTION -->
        <div class="actions">

    <button class="cancel-btn"
        onclick="cancelClass(<?php echo $row['id']; ?>)">
        Cancel
    </button>

</div>

    </div>

    <?php } ?>

    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

<script>

function cancelClass(id){

    if(confirm("Are you sure you want to cancel this class?")){

        fetch("cancel_booking.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${id}`
        })
        .then(res => res.text())
        .then(data => {
            alert("❌ Cancelled Successfully!");
            location.reload(); // 🔥 auto remove from UI
        });

    }

}

</script>

</body>
</html>