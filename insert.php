<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> SoftEx- Courier Management System</title>
</head>

<body>
<?php

include 'dbcon.php';
include 'dbcontroller.php';

$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['fname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$city=$_POST['city3'];
$country=$_POST['country'];
$state=$_POST['state3'];


$query="SELECT * FROM `country` WHERE `id` = '$country'";
$result=mysqli_query($con1,$query);
while($country=mysqli_fetch_assoc($result)){

$count=$country['country_name'];
}

$query1="SELECT * FROM `states` WHERE `id` = '$state'";
$result1=mysqli_query($con1,$query1);
while($states=mysqli_fetch_assoc($result1)){

$state2=$states['name'];
}

$query3="SELECT * FROM `city` WHERE `id` = '$city'";
$result2=mysqli_query($con1,$query3);
while($cities=mysqli_fetch_assoc($result2)){

$city2=$cities['name'];
}


	$result5=mysqli_query($con,"SELECT * FROM `client` ");
while(	$fetch=mysqli_fetch_array($result5)){
	$user=$fetch['username'];
	$email1=$fetch['emailid'];
	$mobile1=$fetch['mobile'];
	
	if($user == $username){
		echo "<script>alert('Username has already is in Use,try another Username.'); window.location='register.php'</script>";
	}
	elseif($email == $email1){
		echo "<script>alert('Email Id has already is in Use,try another Another Email Id.'); window.location='register.php'</script>";
	}
	elseif($mobile == $mobile1){
		echo "<script>alert('Mobile No. has already is in Use,try another Another Mobile number.'); window.location='register.php'</script>";
	}
	
	else{
$sql1="INSERT INTO `client`( `username`, `password`, `name`, `emailid`, `mobile`, `address`, `city`,`state`, `country`) VALUES ('$username','$password','$name','$email','$mobile','$address','$city2','$state2','$count')";

$result=mysqli_query($con,$sql1);
if(!$result)
{
echo "<script>alert('incorect details');
 window.location='register.php'</script>";

}
else {echo "<script>alert('successfully registered');
 window.location='index.php'</script>";}
mysqli_close($con);
}}
?>

</body>
</html>
