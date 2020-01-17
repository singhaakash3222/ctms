<?php
//insert.php;

if(isset($_POST["item_name"]))
{
 include 'dbcontroller.php';

	
$connect = new PDO("mysql:host=localhost;dbname=softex", "root", "");
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
  $order_id= $_POST['order_id'];


  $query12=mysqli_query($con1,"select * from employee where emp_id='$emp'")or die(mysqli_error());
$row=mysqli_fetch_array($query12);
$emp1=$row['username'];
$branch=$row['branch'];

$query11="SELECT * FROM `client` WHERE `emailid` = '$semail'";
$result11=mysqli_query($con1,$query11);
while($users=mysqli_fetch_assoc($result11)){

$user=$users['username'];
}
 
$query="SELECT * FROM `country` WHERE `id` = '$country'";
$result=mysqli_query($con1,$query);
while($country2=mysqli_fetch_assoc($result)){

$count5=$country2['country_name'];
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




$status= "LOADED";
$emp2=$status.'('.$branch.')';

$sql1="CREATE TABLE Courier".$order_id." 
    (courierid VARCHAR(50) NOT NULL, date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, sname VARCHAR(255),source VARCHAR(225),s_contact VARCHAR(255),rname VARCHAR(255) ,destination VARCHAR(225),
    r_contact VARCHAR(255),  status VARCHAR(255) , route VARCHAR(225))";
    error_reporting(E_ALL & ~E_NOTICE);
mysqli_query($con1,$sql1) or die(mysqli_error($con1));




 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO  `tbl_order_items`( `order_id`, `item_name`, `mode`, `weight`, `distance`, `qty`, `tax`, `price`, `tax_amount`, `total_amount`,`sname`,`country`, `sstate`, `scity`, `sadd`, `smob`, `semail`, `rname`, `rcountry`, `rstate`, `rcity`, `radd`, `rmob`, `remail`,`emp`,`user`) 
  VALUES ('$order_id', :item_name , :item_mode , :item_weight, :item_distance, :item_quantity , :item_tax , :price  , :tax_amount , :total_amount, '$sname','$count5','$state2','$city2','$sadd','$smob','$semail','$rname','$count1','$state3','$city3','$radd','$rmob','$remail','$emp1','$user')";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    
    ':item_name'  => $_POST["item_name"][$count],

    ':item_mode'  => $_POST["item_mode"][$count],
    ':item_distance'  => $_POST["item_distance"][$count],
  
    ':item_weight'  => $_POST["item_weight"][$count],
 
    ':item_quantity' => $_POST["item_quantity"][$count],
    ':item_tax' => $_POST["item_tax"][$count],
    ':tax_amount' => $_POST["tax_amount"][$count],
    ':price' => $_POST["price"][$count],
    ':total_amount' => $_POST["total_amount"][$count]

  
   )

  );
 }
 $result = $statement->fetchAll();


 $sql4="INSERT INTO courier".$order_id."(`courierid` ,  `sname`, `source`, `s_contact`, `rname`, `destination`, `r_contact`,  `status`) VALUES ('$order_id', '$sname','$city2','$smob','$rname','$city3','$rmob','$emp2')";
mysqli_query($con1,$sql4) or die(mysqli_error($con1));

 if(isset($result))
 {
  echo 'ok';

 }
}
?>
