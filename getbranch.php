<?php
require_once ("dbcontroller.php");

if (! empty($_POST["city_id"])) {
    $query = "SELECT * FROM branch WHERE cityid = '" . $_POST["city_id"] . "' order by name asc";
  $result=mysqli_query($con1,$query);
    ?>
<option value disabled selected>Select City</option>
<?php
     while($branch=mysqli_fetch_assoc($result)){
        ?>
<option value="<?php echo $branch["bid"]; ?>"><?php echo $branch["name"]; ?></option>
<?php
    }
}
?>