<?php 

include('dbcon.php');


$get_id=$_GET['did'];



mysqli_query($con,"DELETE FROM `distances` WHERE `did` = '$get_id' ")or die(mysqli_error());

header('location:distance.php');
?>