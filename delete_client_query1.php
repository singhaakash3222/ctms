<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['cid'];



mysqli_query($con,"DELETE FROM `client` WHERE `cid`= '$get_id' ")or die(mysqli_error());

header('location:customer.php');
?>