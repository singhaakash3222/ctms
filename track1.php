<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
</head>
<style type="text/css">
	table,th,td{
        border: 10px solid white;
        border-color: powderblue;
        text-align: center;    
    border-color: powderblue;
    border-size: 1px;
    width: 1270px;
    margin-left:  10px;
    }
</style>

<body>
		<?php
        
			include 'dbcon.php';
			
			
			
			$cid=$_POST['cidc'];
			
			$sql="SELECT * FROM `tbl_order_items` WHERE  `order_id` = '$cid'";
			
			
			
			$result=mysqli_query($con,$sql);
			
			if(!$result)
			{
			echo "Incorrect details !" . "</br>";
			include 'track1.php';
			}
			else {
				include("report4i.php");
			echo "<table>
			<tr>
           <th>Courier id</th>
           <th>Date</th>
          
           <th>Sender name</th>
           <th>Origin Point</th>
           <th>Reciever Name</th>
           <th>Destination Point</th>
          
           <th>Status</th>
           
           </tr>";

			
			while( $row=mysqli_fetch_row($result))
			{
				
				echo "<tr>";
                echo "<td>" . $row['courierid'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['sname'] . "</td>";
                echo "<td>" . $row['source'] . "</td>";
                echo "<td>" . $row['rname'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
			
			
			}
			echo "</table>"; }
		
        ?>

</body>
</html>
