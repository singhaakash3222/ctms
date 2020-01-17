<?php 

include('dbcon.php');


$get_id=$_GET['id'];



mysqli_query($con,"DELETE FROM `routes` WHERE `rid` = '$get_id' ")or die(mysqli_error());

header('location:route.php');
?>