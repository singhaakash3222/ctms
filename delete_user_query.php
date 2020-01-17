<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['user_id'];

mysql_query($con,"delete from user where user_id = '$get_id' ")or die(mysqli_error());

header('location:user.php');
?>