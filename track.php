<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
</head>
<style type="text/css">
	table{
		
		text-align: center;
		width: 1200px;
		margin-left: 50px;
		margin-right: 20px;

	}
	th, td {
   border: 10px solid white;
    text-align: center;    
    border-color: powderblue;
    border-size: 1px;
}
</style>

<body>
		<?php
        
			include 'dbcon.php';
			
			
			
			$cid=$_POST['cid'];
			
			$sql="SELECT * FROM Courier".$cid." ";
			
			
			
			$result=mysqli_query($con,$sql);
			include("report4c.php");
			if(!$result)
			{
			echo "Incorrect details !" . "</br>";
			include 'client.php';
			}
			else {
				
			echo "<table>
			 <tr>
           <th>Courier id</th>
           <th>Date</th>
           <th>Item Name</th>
           <th>Sender name</th>
           <th>Origin State</th>
           
           <th>Reciever Name</th>
           <th>Destination State</th>
           
           <th>Total Amount</th>
           <th>Status</th>
           
           </tr>";

      
      while( $row=mysqli_fetch_array($result))
      {
        
       echo "<tr>";
                echo "<td>" . $row['0'] . "</td>";
                echo "<td>" . $row['1'] . "</td>";
                echo "<td>" . $row['2'] . "</td>";
                echo "<td>" . $row['3'] . "</td>";
                echo "<td>" . $row['4'] . "</td>";
                
                echo "<td>" . $row['6'] . "</td>";
                echo "<td>" . $row['7'] . "</td>";
                
               
                echo "<td>" . $row['9'] . "</td>";
                echo "<td>" . $row['10'] . "</td>";
               
                echo "</tr>";
			
			
			
			}
			echo "</table>"; }
		
        ?>

</body>
</html>
