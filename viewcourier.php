<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
</head>

<body>
<?php
        
			include 'dbcon.php';
			
			$sn=$_POST['sname'];
			
			$sql="select * from courier_table where sname='$sn'";
			
			
			
			$result=mysqli_query($con,$sql);
			
			if(!$result)
			{
			echo "Incorrect details !" . "</br>";
			include 'addc.php';
			}
			else {
			
			echo "<table>";
			echo"cid &nbsp;&nbsp;&nbsp; orig &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; dest &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; rname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; radd &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; rate &nbsp;&nbsp;&nbsp; mode &nbsp;&nbsp;&nbsp; status";
			while( $row=mysqli_fetch_row($result))
			{
				
				echo "<tr><td>$row[0]</td><td>&nbsp;&nbsp;</td><td>$row[1]</td><td>&nbsp;&nbsp;</td><td>$row[2]</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$row[3]</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$row[4]</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$row[5]</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$row[6]</td><td>&nbsp;&nbsp;</td><td>$row[7]</td><td>&nbsp;&nbsp;</td><td>$row[8]</td><td>&nbsp;&nbsp;</td><td>$row[9]</td></tr>";
			
			
			}
			echo "</table>"; include("viewc1.php");}
        ?>
</body>
</html>