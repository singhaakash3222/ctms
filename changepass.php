<?php 


		if(isset($_POST['submit']))
		{
			$u=$_POST['username'];
			$op=$_POST['opassword'];
			$np=$_POST['npassword'];

			include 'dbcon.php';
			
			$select_user_query="SELECT * FROM `client` WHERE `username`='$u' AND `password`='$op'";
			
				$select_user=mysqli_query($con,$select_user_query);
		//	$row=mysql_fetch_row($select_user);
		//	$correctpass=$u['password'];
				if(mysqli_num_rows($select_user)==1){
			$change=mysqli_query($con,"UPDATE `softex`.`client` SET `password`='$np' WHERE `client`.`username`='$u'");
			
			
			
				
			$_SESSION['	submit']=1;
			header("Location: client.php#contact");
			
				
			}
			else{
				echo "Invalid Username and Password !!";
				unset($_POST['submit']);
						$error_login=1;
						header("Location: client.php#contact");
							
			
			
		}
					
					
	}

?>

