<?php
require_once ("dbcontroller.php");

if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
    $result=mysqli_query($con1,$query);
  
    ?>
<option value disabled selected>Select State</option>
<?php
    while($state=mysqli_fetch_assoc($result)){
        ?>
<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
    }
}
?>