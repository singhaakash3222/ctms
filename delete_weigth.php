<?php 

include('dbcon.php');


$get_id=$_GET['wid'];



mysqli_query($con,"DELETE FROM `weights` WHERE `wid` = '$get_id' ")or die(mysqli_error());

header('location:weight.php');
?>