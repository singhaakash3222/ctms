<?php 

include('modules/connection.php');
include('session.php');

$get_id=$_GET['cid'];


mysqli_query($con,"DELETE FROM `item_transaction` WHERE `order_id` = '$get_id' ")or die(mysqli_error());

header('location:order1.php');
?>