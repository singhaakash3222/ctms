<?php 
session_start();
        
if(isset($_SESSION['staff_login'])) 
    header('location:employee.php');   
?>
<?php
if(isset($_POST['submit']))
{
	$u=$_POST['username'];
	$p=$_POST['password'];

	include("dbcon.php");
	
	
					$select_user_query="SELECT * FROM `employee` WHERE `username` = '$u' AND `password` = '$p' AND `status` = 'active'  ";
					$select_user=mysqli_query($con,$select_user_query);
					$rws=  mysqli_fetch_array($select_user);
					if($rws[1]==$u && $rws[2]==$p)
					
					{
						session_start();
						 $_SESSION['staff_login']=1;
						$_SESSION['staff_id']=$u;
						header('Location:employee.php');
					}
					else
					{
						echo "Invalid Username and Password !!";
						unset($_POST['submit']);
						$error_login=1;
						include 'elogin.php';
					}
					
}
	
?>