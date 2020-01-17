<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->

<?php $countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
$con = mysqli_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,'softex');
$query="SELECT id,city FROM cities WHERE cid='$countryId' AND sid='$stateId'";
$result=mysqli_query($con,$query);

?>
<select name="city">
<option>Select City</option>
<?php while($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['city']?></option>
<?php } ?>
</select>
