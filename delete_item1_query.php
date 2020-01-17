<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['emp_id'];

mysqli_query($con,"DELETE FROM `employee` WHERE `emp_id` = '$get_id' ")or die(mysqli_error());

header('location:item.php');
?>
