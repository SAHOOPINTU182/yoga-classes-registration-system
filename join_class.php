<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$class = $_GET['class'];
$trainer = $_GET['trainer'];
$time = $_GET['time'];
$date = $_GET['date'];

mysqli_query($con, "INSERT INTO bookings (user_id, class_name, trainer, time, created_at) 
VALUES ('$user_id', '$class', '$trainer', '$time', NOW())");

header("Location: my_schedule.php");
exit();
?>