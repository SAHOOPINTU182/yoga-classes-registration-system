<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST['id'])){
    $id = $_POST['id'];

    mysqli_query($con, "DELETE FROM bookings WHERE id='$id' AND user_id='$user_id'");
}

echo "deleted";
?>