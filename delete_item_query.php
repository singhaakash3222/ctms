<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['mid'];



mysqli_query($con,"DELETE FROM `modes` WHERE `mid` = '$get_id' ")or die(mysql_error());

header('location:mode.php');
?>