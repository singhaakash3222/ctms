<?php
require_once("dbcontroller.php");

session_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Softex- Courier Management System</title>
<style type="text/css">
	body {
		background-image: url('images/price_table_bg.jpg');
		
	}
	table {	
			background:rgba(248,248,255, 0.8);
			padding-left:15px;
			padding-right:15px;
			padding-top:15px;
			padding-bottom:15px;
			width:60%;
			border-radius:10px;
			font-family:Verdana, Geneva, sans-serif;
			cellpadding:5px; 
			cellspacing:5px;
			margin-top: 70px;
			background-repeat: no-repeat;
	}
	td {
		border-bottom: 1px green dotted;
		height:30px;
	}
	span {
		color:red;
		font-size:8pt;
	}
	td.hr {
		border-bottom: 1px blue solid;
		font-size:15pt;
		color:blue;
		font-weight:bold;
	}
	td.nb {
		border-bottom:0px green dotted;
	}
	td.last_hr {
		border-bottom:1px blue solid;
		border-bottom-left-radius:2em;
		border-bottom-right-radius:2em;
	}	
</style>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">


// second dropdown
function getState3(val) {
    $.ajax({
    type: "POST",
    url: "getState.php",
    data:'country_id='+val,
    success: function(data){
        $("#state-list3").html(data);
        getCity2();
    }
    });
}


function getCity3(val) {
    $.ajax({
    type: "POST",
    url: "getCity.php",
    data:'state_id='+val,
    success: function(data){
        $("#city-list3").html(data);
    }
    });
}
</script>


</head>
<body>
<form name="reg" action='insert.php'  method='post'>
<table align="center">
	<tr>
		<td class="hr" colspan="2">Sign Up</td>
	</tr>

	
	
	
	<tr>
		<td>Username</td><td><input type="text" name="username" size="20" maxlength="10" required="">		  &#40;max 10 characters&#41;</td>
	</tr>
	<tr>
		<td>Password</td><td><input type="password" name="password" size="30" maxlength="30" required=""></td>
	</tr>
	<tr>
		<td>repeat Password</td><td><input type="password" name="rpassword" size="30" maxlength="30" required=""></td>
	</tr
	>
	<tr>
		<td>Name</td>
	  <td><input type="text" name="fname" size="30" maxlength="30" required=""></td>
	</tr>
	<tr>
		<td>E-mail id</td>
		<td><input type="text" name="email" size="30" maxlength="30" re></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>+91<input type="text" name="mobile" size="25" maxlength="10" required=""></td>
	</tr>
	<tr>
<td >Country:</td>

<td><select name="country" id="country-list" style="width: 240px" onChange="getState3(this.value);">
<option value disabled selected>Select Country</option>
<?php
$query="SELECT * FROM `country`";
$result=mysqli_query($con1,$query);
while($country=mysqli_fetch_assoc($result)){

?>

<option  value="<?php echo $country["id"]; ?>"><?php echo $country['country_name']; ?></option>
<?php
}
?>
</select></td>
</tr><br>

<tr>
<td  >State:</td>

<td><select name="state3" id="state-list3" style="width: 240px" onChange="getCity3(this.value);">
<option value="">Select State</option>
</select></td>
</tr><br>
<tr>

<td  >City:</td>

<td><select name="city3" style="width: 240px" id="city-list3" >
<option value="" >Select City</option>
</select>

</td>
</tr><br>
	<tr>
		<td>Address</td>
		<td><input type="text" name="address" size="30" maxlength="100" required=""></td>
	</tr>
	
	<tr>
		
		<td colspan="2" class="last_hr" align="center"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" name="clear" value="Reset"></td>
	</tr><tr><td colspan="2" align="center"><a href="login.php">Go to login page !!</a>
    </td>
    </tr>
</table>
</form>
</body>
</html>