<!DOCTYPE html>
<html>
<head>
	<title>Tracking Courier</title>
</head>
<link href="templatemo_style.css" type="text/css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->  
    
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
   
    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.scrollTo-min.js"></script> 
    <script type="text/javascript" src="js/jquery.localscroll-min.js"></script> 
    <script type="text/javascript" src="js/init.js"></script> 
    
  
   
    <style type="text/css">
	body {
			background-color:lightgrey;
			
			
		}table,th,td{
        border: 10px solid white;
        border-color: powderblue;
        text-align: center;    
    border-color: powderblue;
    border-size: 1px;
    width: 100%
    margin-left: 2%;
    }
   

	
 
  .a{
    color: teal;
    margin-top: 20px;
    margin-right: 20px;
    margin-left: 20px;
    text-align: center;
    background-color: white;
  }
 
  body{
    background-color: white;
  }
  .b{
    background-color: white;
    margin: none;
     }
  .c{
    text-align: right;
    text-align: right;
    color: orange;
    text-decoration: none;
    margin-right: 50px;
    font-size: 20px;
  }
  form{
    background-color: aliceblue;
  }
 .button {
    background-color: white; 
    color: black; 
    border: 2px solid chartreuse ;
}

.button:hover {
    background-color: chartreuse ;
    color: white;
}

</style>

<body>
<div class="b">

                    <div align="center" class="p">
                      
                      <div class="a">
                        <form action="" method="POST" name="form" >
                      <tr>
                      <td class="TrackMediumBlue" align="right" width="162"><h4>Enter Courier Id</h4></td>
                      <td width="16">&nbsp;</td>
                      <td width="339">
                        <input name="cidc"  maxlength="100" size="40" type="TEXT" required> </td><td><button type="submit" onclick="track" class="button">Track</button></td>
                   </tr>
               </form>
                   
             
        </div>
        <?php
        error_reporting(E_ALL & ~E_NOTICE);
            include 'dbcon.php';
            
            
            
            $cid=$_POST['cidc'];
            
           $sql="SELECT * FROM Courier".$cid." ";
            
            
            
            $result=mysqli_query($con,$sql);
            
            if(!$result)
            {

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

      
      while( $row=mysqli_fetch_array($result))
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

       </div> </div>

</body>
</html>