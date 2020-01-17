
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
  th, td {
   
   text-align: center;
    border-color: powderblue;
    border-size: 1px;
}
.c{

    text-align: right;
    text-align: right;
    color: orange;
    text-decoration: none;
    margin-right: 50px;
    font-size: 20px;
  
}
#h{
  text-align: center;
  color: orange;
}
</style>

<body>
 
  <h1 id="h">Acknowledgement Details</h1>
  <a class="c" href="employee.php ><i class="fa fa-home" ></i> Home</a>
 <?php

include 'dbcontroller.php';
include 'dbcon.php';
session_start();

if(isset($_POST['pay']))
{
  $emp=$_POST['emp'];
  $sname=$_POST['sname'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $sadd=$_POST['saddress'];
  $smob=$_POST['smob'];
  $semail=$_POST['email'];
  $rname=$_POST['rname'];
  $rcountry=$_POST['country1'];
  $rstate=$_POST['state1'];
  $rcity=$_POST['city1'];
  $radd=$_POST['raddress'];
  $rmob=$_POST['rnum'];
  $remail=$_POST['email1'];
  $itemname=$_POST['iname'];
  $mode=$_POST['mod'];
  $weight=$_POST['wt'];
  $distance=$_POST['dis'];
  $num=$_POST['num'];


$query12=mysqli_query($con1,"select * from employee where emp_id='$emp'")or die(mysqli_error());
$row=mysqli_fetch_array($query12);
$emp=$row['username'];

$query="SELECT * FROM `country` WHERE `id` = '$country'";
$result=mysqli_query($con1,$query);
while($country=mysqli_fetch_assoc($result)){

$count=$country['country_name'];
}

$query1="SELECT * FROM `states` WHERE `id` = '$state'";
$result1=mysqli_query($con1,$query1);
while($states=mysqli_fetch_assoc($result1)){

$state2=$states['name'];
}

$query3="SELECT * FROM `city` WHERE `id` = '$city'";
$result2=mysqli_query($con1,$query3);
while($cities=mysqli_fetch_assoc($result2)){

$city2=$cities['name'];
}

$query4="SELECT * FROM `country` WHERE `id` = '$rcountry'";
$result3=mysqli_query($con1,$query4);
while($country1=mysqli_fetch_assoc($result3)){

$count1=$country1['country_name'];
}


$query5="SELECT * FROM `states` WHERE `id` = '$rstate'";
$result4=mysqli_query($con1,$query5);
while($states1=mysqli_fetch_assoc($result4)){

$state3=$states1['name'];
}

$query6="SELECT * FROM `city` WHERE `id` = '$rcity'";
$result5=mysqli_query($con1,$query6);
while($cities1=mysqli_fetch_assoc($result5)){

$city3=$cities1['name'];
}

$query8="SELECT * FROM `modes` WHERE `rate` = '$mode'";
$result8=mysqli_query($con,$query8);
while($modes=mysqli_fetch_assoc($result8)){

$mode1=$modes['mode'];
}



$query9="SELECT * FROM `weights` WHERE `rate` = '$weight'";
$result9=mysqli_query($con,$query9);
while($wt=mysqli_fetch_assoc($result9)){

$weight1=$wt['weight'];
}

$query10="SELECT * FROM `distances` WHERE `rate` = '$distance'";
$result10=mysqli_query($con,$query10);
while($distances=mysqli_fetch_assoc($result10)){

$distance1=$distances['distance'];
}

$query11="SELECT * FROM `client` WHERE `emailid` = '$semail'";
$result11=mysqli_query($con,$query11);
while($users=mysqli_fetch_assoc($result11)){

$user=$users['username'];
}

$status="LOADED";       

$total=$mode+$weight+$distance;
$rate=$total*$num;
if($state==$rstate)
{
$a="SELECT * FROM `gst` WHERE `id`=3";
$res=mysqli_query($con,$a) or die(mysqli_error());
$col=  mysqli_fetch_array($res);
$id1=$col['gst'];
$hsn=$col['hsn'];

  $r2=$rate*$id1;
  $r3=$r2/100;
  $rate1=$rate+$r3;
}
else{
  $a="SELECT * FROM `gst` WHERE `id`=1";
$res=mysqli_query($con,$a) or die(mysqli_error());
$col=  mysqli_fetch_array($res);
$id1=$col['gst'];
$hsn=$col['hsn'];
  $r2=$rate*$id1;
  $r3=$r2/100;
  $rate1=$rate+$r3;
}

$sadd1=$sadd.','.$city2.','.$state2.','.$count;
$radd1=$radd.','.$city3.','.$state3.','.$count1;


$sql3="SELECT MAX(`cid`) FROM `courier_table` ORDER BY `cid` DESC LIMIT 1";
$result12=mysqli_query($con,$sql3) or die(mysqli_error());
$rws=  mysqli_fetch_array($result12);
$id=$rws[0]+1;

$sql1="CREATE TABLE Courier".$id." 
    (courierid int(5) NOT NULL, date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, item_name VARCHAR(255), sname VARCHAR(255), sadd VARCHAR(255),source VARCHAR(225),s_contact VARCHAR(255),rname VARCHAR(255) ,radd VARCHAR(255),destination VARCHAR(225),
    r_contact VARCHAR(255), 
    amount float(10,2), status VARCHAR(255) , route VARCHAR(225))";
    error_reporting(E_ALL & ~E_NOTICE);
mysqli_query($con,$sql1) or die(mysqli_error($con));



$max="SELECT MAX(`cid`) FROM `courier_table` ORDER BY `cid` DESC LIMIT 1";
$result13=mysqli_query($con,$max) or die(mysqli_error());
$rws1=  mysqli_fetch_array($result13);
$max1=$rws1[0]+1;



$query7="INSERT INTO `courier_table`(`cid`, `item_name`, `scountry`, `orig`, `orig_state`, `sadd`, `s_num`,`semail`, `rcountry`, `dest`, `dest_state`, `r_num`, `remail`,`sname`, `rname`, `radd`,  `rate1`, `rate`, `mode`, `weight`, `distance`, `quantity`, `hsn`, `gst%`, `gst`,`user`,`emp`, `status`, `emp`) VALUES ('$max1','$itemname','$count','$state2','$city2','$sadd','$smob','$semail','$count1','$state3','$city3','$rmob','$remail','$sname','$rname','$radd','$rate','$rate1','$mode1','$weight1','$distance1','$num','$hsn','$id1','$r3','$user','$emp','$status')";
$result7=mysqli_query($con,$query7)  or die(mysqli_error($con));

 
$sql4="INSERT INTO courier".$id."(`courierid` , `item_name`, `sname`, `sadd`,`source`, `s_contact`, `rname`, `radd`,`destination`, `r_contact`, `amount`, `status`) VALUES ('$id', '$itemname','$sname','$sadd1','$city2','$smob','$rname','$radd1','$city3','$rmob',$rate1,'$status')";
mysqli_query($con,$sql4) or die(mysqli_error($con));

if(!$result)
  { 
    ?>
    <script type="text/javascript">
      alert('incorrect Details');
      window.location('test.php');
    </script>
    <?php
  
  }
  else 
  {
    ?>
    <script type="text/javascript">
      alert('inserted Details');
      window.location.href="update_courier.php<?php echo '?cid='.$id; ?>";
    </script>
    <?php
    
  }
    
    
    
  
}
  
  

  
  

?>

</body>
</html>