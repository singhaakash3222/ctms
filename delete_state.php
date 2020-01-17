<?php 

include('dbcon.php');


$get_id=$_GET['id'];



mysqli_query($con,"DELETE FROM `states` WHERE `id` = '$get_id' ")or die(mysqli_error());

header('location:state.php');
?>