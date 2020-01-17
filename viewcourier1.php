<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
</head>
<style type="text/css">
	table,th,td{
		border: 10px solid white;
		text-align: left;
	}
	table{
		margin-left: 30px;
	}
	th, td {
   
    text-align: center;    
    border-color: powderblue;
    border-size: 1px;
}
</style>
<body>
<?php
        
			include 'dbcon.php';
			
			$sn=$_POST['sname'];
			
			$sql="SELECT * FROM `courier_table` WHERE `sname` LIKE'%$sn%'";
			
			
			
			$result=mysqli_query($con,$sql);
			
			if(!$result)
			{
			echo "Incorrect details !" . "</br>";
			include("report4.php");
			
			}
			else {
				include("viewc.php");
			echo "<table>
			<tr>
           <th>Courier id</th>
           <th>Item Name</th>
           <th>Sname</th>
           <th>Sender Address</th>
           <th>Sender Contact</th>
           <th>Rname</th>
           <th>Reciever Address</th>
           <th>Reciever Contact</th>
           <th>Mode</th>
           <th>Weight</th>
           <th>Distance</th>
           <th>Qty</th>
           <th>GST%</th>
           <th>Amount</th>
           <th>Total Amount</th>
           <th>Status</th>
           </tr>";

			
			while( $row=mysqli_fetch_array($result))
			{
				
				echo "<tr>";
                echo "<td>" . $row['cid'] . "</td>";
                echo "<td>" . $row['item_name'] . "</td>";
                echo "<td>" . $row['sname'] . "</td>";
                echo "<td>" . $row['sadd'] .','.$row['orig'].','.$row['orig_state']. "</td>";
                echo "<td>" . $row['s_num'] . "</td>";
                echo "<td>" . $row['rname'] . "</td>";
                echo "<td>" .$row['radd'] .','.$row['dest'].','.$row['dest_state'] . "</td>";
                echo "<td>" . $row['r_num'] . "</td>";
                echo "<td>" . $row['mode'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
                echo "<td>" . $row['distance'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['gst%'] . "</td>";
                echo "<td>" . $row['rate1'] . "</td>";
                echo "<td>" . $row['rate'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
			
			
			}
			echo "</table>"; 
		}
		
        ?>

		
</body>
</html>