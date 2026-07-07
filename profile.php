<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* ================= IMAGE UPLOAD ================= */
if(isset($_POST['upload'])){

    if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0){

        $file = $_FILES['profile_pic'];

        $filename = time() . "_" . basename($file['name']);
        $tmp = $file['tmp_name'];

        $folder = "uploads/" . $filename;

        if(move_uploaded_file($tmp, $folder)){

            mysqli_query($con, "UPDATE users SET profile_pic='$filename' WHERE id='$user_id'");

            echo "<script>alert('✅ Photo Uploaded Successfully'); window.location='profile.php';</script>";
            exit();

        }else{
            echo "❌ Upload failed!";
        }

    }else{
        echo "❌ Please select an image!";
    }
}

/* ================= PROFILE UPDATE ================= */
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($con, "UPDATE users SET name='$name', email='$email' WHERE id='$user_id'");
    $_SESSION['name'] = $name;

    echo "<script>alert('✅ Profile Updated Successfully'); window.location='profile.php';</script>";
    exit();
}

/* ================= FETCH USER DATA (IMPORTANT: LAST ME) ================= */
$result = mysqli_query($con, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($result);

/* IMAGE SET */
$img = (!empty($user['profile_pic'])) ? $user['profile_pic'] : "default.png";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard no-right">


<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🧘 Yoga</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="book_class.php">📅 Book Class</a>
    <a href="view_booking.php">📋 View Bookings</a>
    <a href="schedule.php">⏱ Schedule</a>
    <a href="programs.php">🧘 Programs</a>
    <a href="meals.php">🥗 Meals</a>
    <a href="progress.php">📊 Progress</a>

    <a class="active" href="profile.php">👤 Profile</a>

    <a href="logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<h2>My Profile</h2>

<div class="profile-container">

    <!-- LEFT SIDE -->
    <div class="profile-left">

        <div class="profile-img-box">
        <img src="uploads/<?php echo $img; ?>" class="profile-img" id="previewImg">        </div>
        <form method="POST" enctype="multipart/form-data">
    <input type="file" name="profile_pic" id="fileInput" accept="image/*" required>
    <button name="upload">Upload Photo</button>
</form>

    </div>

    <!-- RIGHT SIDE -->
    <div class="profile-right">

        <form method="POST">

            <label>Name</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

            <button name="update">Update Profile</button>

        </form>

    </div>

</div>

</div>
</div>

<script>
document.getElementById("fileInput").addEventListener("change", function(event){

    const file = event.target.files[0];

    if(file){
        const reader = new FileReader();

        reader.onload = function(e){
            document.getElementById("previewImg").src = e.target.result;
        }

        reader.readAsDataURL(file);
    }

});
</script>

</body>
</html>