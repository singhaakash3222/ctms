<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['cid'];


mysqli_query($con,"DELETE FROM `courier_table` WHERE `cid` = '$get_id' ")or die(mysqli_error());
mysqli_query($con,"DROP TABLE  Courier".$get_id." ")or die(mysqli_error($con));

header('location:release.php');
?>