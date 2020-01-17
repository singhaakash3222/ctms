<?php 

include('dbcon.php');


$get_id=$_GET['id'];



mysqli_query($con,"DELETE FROM `branch` WHERE `bid` = '$get_id' ")or die(mysqli_error());

header('location:country.php');
?>