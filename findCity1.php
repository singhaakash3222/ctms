<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->

<?php $countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
$con = mysql_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('softex');
$query="SELECT id,city FROM cities WHERE cid='$countryId' AND sid='$stateId'";
$result=mysql_query($query);

?>
<select name="city1">
<option>Select City</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['city']?></option>
<?php } ?>
</select>
