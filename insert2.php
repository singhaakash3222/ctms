<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> SoftEx- Courier Management System</title>
</head>

<body>
<?php

include 'dbcon.php';


$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['fname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];

echo $city;

	$result1=mysqli_query($con,"SELECT * FROM `client`");
	$fetch=mysqli_fetch_array($result1);
	$user=$fetch['emailid'];

	if($user == $email)
	{echo $city;
		echo "<script>alert('Email has already registered,try another.');
		window.location='register.php' </script>";
	}
	else{
		echo $email;
         $sql="INSERT INTO `client`( `username`, `password`, `name`, `emailid`, `mobile`, `address`, `city`, `country`) VALUES ('$username','$password','$name','$email','$mobile','$address','$city','$country')";
     }
$result=mysqli_query($con,$sql);
echo $email;
if(!$result)
{
echo "<script>alert('incorect details');
 window.location='register.php'</script>";

}
else {echo "<script>alert('successfully registered');
 window.location='index.php'</script>";}
mysqli_close($con);

?>

</body>
</html>
