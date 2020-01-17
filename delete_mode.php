<?php 

include('dbcon.php');


$get_id=$_GET['mid'];



mysqli_query($con,"DELETE FROM `modes` WHERE `mid` = '$get_id' ")or die(mysqli_error());

header('location:mode.php');
?>