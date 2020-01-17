<?php
require_once ("dbcontroller.php");

if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM city WHERE stateID = '" . $_POST["state_id"] . "' order by name asc";
  $result=mysqli_query($con1,$query);
    ?>
<option value disabled selected>Select City</option>
<?php
     while($city=mysqli_fetch_assoc($result)){
        ?>
<option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
<?php
    }
}
?>