<?php 

include('dbcon.php');


$get_id=$_GET['invoice1'];



mysqli_query($con,"DELETE FROM `invoice` WHERE `invoice1` = '$get_id' ")or die(mysqli_error());

header('location:invoice1.php');
?>