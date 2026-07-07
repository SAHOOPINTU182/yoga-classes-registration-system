<?php
session_start();
include 'db.php';

if(isset($_POST['book'])){

    $user_id = $_SESSION['user_id'];
    $class_name = $_POST['class_name'];
    $trainer = $_POST['trainer'];
    $time = $_POST['time'];

    // Insert booking
    $query = "INSERT INTO bookings (user_id, class_name, trainer, time) 
              VALUES ('$user_id', '$class_name', '$trainer', '$time')";

    if(mysqli_query($con, $query)){
        // ✅ success message session me store
        $_SESSION['success'] = "✅ Booking Successful!";
    } else {
        $_SESSION['error'] = "❌ Booking Failed!";
    }

    // redirect back
    header("Location: book_class.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Class</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php if(isset($_SESSION['success'])) { ?>
<div class="popup-overlay">
    <div class="popup-box">
        <h2><?php echo $_SESSION['success']; ?></h2>
        <p>Your class has been booked successfully!</p>

        <button class="popup-btn" onclick="closePopup()">OK</button>
    </div>
</div>
<?php unset($_SESSION['success']); } ?>


<?php if(isset($_SESSION['error'])) { ?>
<div class="popup-overlay">
    <div class="popup-box">
        <h2><?php echo $_SESSION['error']; ?></h2>
    </div>
</div>
<?php unset($_SESSION['error']); } ?>

<div class="dashboard no-right">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🧘 Yoga</h2>

        <a href="dashboard.php">🏠 Dashboard</a>
        <a class="active">📅 Book Class</a>
        <a href="view_booking.php">📋 View Bookings</a>
        <a>⏱ Schedule</a>
        <a>🧘 Programs</a>
        <a>🥗 Meals</a>
        <a>📊 Progress</a>
        <a>💬 Chat</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <h2>Book Yoga Classes</h2>

        <div class="class-grid">

            
            <!-- CARD 1 -->
<div class="class-card">
    <h3>🧘 Beginner Yoga</h3>
    <p>Perfect for new users</p>
    <p><strong>Trainer:</strong> Priya</p>
    <p><strong>Time:</strong> 7:00 AM</p>

    <form method="POST" action="book_class.php">
        <input type="hidden" name="class_name" value="Beginner Yoga">
        <input type="hidden" name="trainer" value="Priya">
        <input type="hidden" name="time" value="7:00 AM">
        <button type="submit" name="book">Book Now</button>
    </form>
</div>

<!-- CARD 2 -->
<div class="class-card">
    <h3>🔥 Power Yoga</h3>
    <p>High energy workout</p>
    <p><strong>Trainer:</strong> Rahul</p>
    <p><strong>Time:</strong> 6:00 PM</p>

    <form method="POST" action="book_class.php">
        <input type="hidden" name="class_name" value="Power Yoga">
        <input type="hidden" name="trainer" value="Rahul">
        <input type="hidden" name="time" value="6:00 PM">
        <button type="submit" name="book">Book Now</button>
    </form>
</div>

<!-- CARD 3 -->
<div class="class-card">
    <h3>🧘 Meditation</h3>
    <p>Relax your mind</p>
    <p><strong>Trainer:</strong> Meera</p>
    <p><strong>Time:</strong> 8:00 AM</p>

    <form method="POST" action="book_class.php">
        <input type="hidden" name="class_name" value="Meditation">
        <input type="hidden" name="trainer" value="Meera">
        <input type="hidden" name="time" value="8:00 AM">
        <button type="submit" name="book">Book Now</button>
    </form>
</div>

<!-- CARD 4 -->
<div class="class-card">
    <h3>💪 Advanced Yoga</h3>
    <p>For experienced users</p>
    <p><strong>Trainer:</strong> Aman</p>
    <p><strong>Time:</strong> 5:30 PM</p>

    <form method="POST" action="book_class.php">
        <input type="hidden" name="class_name" value="Advanced Yoga">
        <input type="hidden" name="trainer" value="Aman">
        <input type="hidden" name="time" value="5:30 PM">
        <button type="submit" name="book">Book Now</button>
    </form>
</div>

        </div>

    </div>

</div>
<script>
function closePopup(){
    document.querySelector(".popup-overlay").style.display = "none";
}
</script>

</body>
</html>