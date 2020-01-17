<?php 

		if(isset($_POST['submit']))
		{
			
			$u=$_POST['username'];
			$op=$_POST['opassword'];
			$np=$_POST['npassword'];

			include 'dbcon.php';
			$select_user_query="SELECT * FROM `employee` WHERE `username`='$u' AND `password`='$op'";
			$select_user=mysqli_query($con,$select_user_query);
			if($select_user==true)
			{
				?>
				<script type="text/javascript">
					alert('password updated successfully');
				</script>
				<?php
			
		//	$row=mysql_fetch_row($select_user);
		//	$correctpass=$u['password'];
			$change=mysqli_query($con,"UPDATE `softex`.`employee` SET `password`='$np' WHERE `employee`.`username`='$u'");
			session_start();
			$_SESSION['submit']=1;
			header("Location: employee.php#contact");
			}
			else
			{
				?>
				<script type="text/javascript">
					alert('invalid username and password');
				</script>
				<?php
				header("Location: employee.php");
			}
					
					
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SidEx - Courier Management System</title>
</head>

<body>
</body>
</html>
