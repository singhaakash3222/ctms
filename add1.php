<?php
include 'dbcon.php';
$num=$_POST['dis'];
$num1=$_POST['mod'];
$num2=$_POST['wt'];
$num3=$_POST['num'];
$gst1=$_POST['gst'];
$s_state=$_POST['origs'];
$r_state=$_POST['dests'];
$total=$num+$num1+$num2;
$rate=$total*$num3;
if($s_state==$r_state)
{
$a="SELECT * FROM `gst` WHERE `id`=3";
$res=mysqli_query($con,$a) or die(mysqli_error());
$col=  mysqli_fetch_array($res);
$id=$col['gst'];


  $r2=$rate*$id;
  $r3=$r2/100;
  $rate1=$rate+$r3;
}
else{
	$a="SELECT * FROM `gst` WHERE `id`=1";
$res=mysqli_query($con,$a) or die(mysqli_error());
$col=  mysqli_fetch_array($res);
$id=$col['gst'];

  $r2=$rate*$id;
  $r3=$r2/100;
  $rate1=$rate+$r3;
}


echo $num1;
echo "<br>";
echo $num;
echo "<br>";
echo $num2;
echo "<br>";
echo $id;

echo"order amount is :- " .   $rate."";
echo "<br>";
echo"Gst amount is :- " .   $r3."";
echo "<br>";
echo"Total order amount is :- " .   $rate1."";
?>