<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['emp_id'];
$result1=mysqli_query($con,"SELECT  `status` FROM `employee` WHERE `emp_id` = '$get_id'");
	$fetch=mysqli_fetch_array($result1);
	
	$r= $fetch['status'];
	

if($r=='active'){
		mysqli_query($con,"UPDATE `employee` SET `status`='inactive'  WHERE `emp_id` = '$get_id' ")or die(mysqli_error());

       header('location:item.php');
	}
else{
    mysqli_query($con,"UPDATE `employee` SET `status`='active'  WHERE `emp_id` = '$get_id'")or die(mysqli_error());

      header('location:item.php');
}
?>