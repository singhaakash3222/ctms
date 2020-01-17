<?php 

include('include/database.php');
include('session.php');

$get_id=$_GET['cid'];

$history_record=mysql_query("SELECT * FROM `courier_table` WHERE `cid`=$id_session");
$row=mysql_fetch_array($history_record);

mysql_query("DELETE FROM `courier_table` WHERE `cid` = '$get_id' ")or die(mysql_error());

header('location:delivered.php');
?>