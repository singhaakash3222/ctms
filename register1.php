<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Courier Management System</title>
</head>

<body>
<?php

$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['fname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$status="inactive";

include 'dbcon.php';
if ($_POST['type']=="client")
$tablechoice="client";
else $tablechoice="employee";

$sql="INSERT INTO `employee`(`emp_id`, `username`, `password`, `name`, `emailid`, `mobile`, `address`, `city`, `country`, `date`, `status`) VALUES ('','$username','$password','$name','$email','$mobile','$address','$city','$country','','$status')";

$result=mysqli_query($con,$sql);
if(!$result)
{
echo "Incorrect details !" . "</br>";
include 'register.php';
}
else {echo $tablechoice. " added !";}
mysqli_close($con);
include 'index.php';
?>

</body>
</html>
