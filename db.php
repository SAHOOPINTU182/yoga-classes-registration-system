<?php
$con = mysqli_connect('localhost','root','','yoga_db',3307);
if(!$con){
    die("Connection Failed: " . mysqli_connect_error());
}
?>