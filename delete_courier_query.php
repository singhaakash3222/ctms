<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['cid'];


mysqli_query($con,"DELETE FROM `tbl_order_items` WHERE `order_id` = '$get_id' ")or die(mysqli_error());
mysqli_query($con,"DROP TABLE  Courier".$get_id." ")or die(mysqli_error($con));

header('location:updatestatus.php');
?>