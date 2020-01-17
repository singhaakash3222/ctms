<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->


<?php $country=intval($_GET['country']);
$con = mysqli_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,'softex');
$query="SELECT id,state FROM states WHERE cid='$country'";
$result=mysqli_query($con,$query);

?>
<select name="state1" onchange="getCity(<?php echo $country?>,this.value)">
<option>Select State</option>
<?php while ($row1=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row1['id']?>><?php echo $row1['state']?></option>
<?php } ?>
</select>
