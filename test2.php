<?php
require_once("dbcontroller.php");
include 'dbcon.php';
session_start();
$ID=$_GET['cid'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>sdsd</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
 <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
// first dropdown
function getState(val) {
    $.ajax({
    type: "POST",
    url: "getState.php",
    data:'country_id='+val,
    success: function(data){
        $("#state-list").html(data);
        getCity();
    }
    });
}


function getCity(val) {
    $.ajax({
    type: "POST",
    url: "getCity.php",
    data:'state_id='+val,
    success: function(data){
        $("#city-list").html(data);
    }
    });
}
// second dropdown
function getState2(val) {
    $.ajax({
    type: "POST",
    url: "getState.php",
    data:'country_id='+val,
    success: function(data){
        $("#state-list2").html(data);
        getCity2();
    }
    });
}


function getCity2(val) {
    $.ajax({
    type: "POST",
    url: "getCity.php",
    data:'state_id='+val,
    success: function(data){
        $("#city-list2").html(data);
    }
    });
}
$(document).ready(function(){
   
    $("#show").click(function(e){
        $("#myDIV").show();

        e.preventDefault();
    });
});
</script>
<style type="text/css">
	

#container {
    width: 100%;
    background-color: teal;
    padding: 20px;
}
#first {
    width: 25%;
   float: left;
  padding: 0px 0px 0px 50px;
    height: 500px;
   
   
        background-color: lightgray;
}
#second {
    width:25%;
  float: left;
    height: 500px;
   padding: 0px 0px 0px 50px;
   
    background-color: lightpink;
}
#third {
    width:50%;
  float: right;
    height:500px;
      padding: 0px 0px 0px 50px;
   
    background-color: powderblue;
}
#fourth{
	text-align: center;
	padding: 10px;
	
}
#clear {
    clear: both;
}
</style>
<body>
	<form action="add.php" method="POST">
<div id="container">
	<tr>
    <input type="hidden" name="emp" value="<?php echo $ID; ?>">
                            <td colspan="3"  ><div class="d-flex justify-content-center" ><strong style="margin-left: 500px; font-size: 30px;">Add Courier Form <a style="color: black; margin-left: 400px; text-decoration: none;" href="employee.php">Home</a> </strong></div></td></tr>
                  <tr>
</div>
 <div id="first">
	<tbody>
                    
                  <tr>
                            <td colspan="3"  align="right"><div class="d-flex justify-content-center" ><strong>Sender Details  </strong></div></td></tr>
                  <tr>
                   <tr>
                      <td class="text-primary " align="right" width="162">Sender Name   :</td>
                      <td width="16">&nbsp;</td>
                      <td width="339">
                        <input name="sname" class="form-control form-control-sm col-10"  maxlength="100" size="40" type="TEXT" required=""> </td>
                   </tr>
                          
<tr>
<td class="text-primary "align="right">Country:</td>
<td>&nbsp;</td>
<td><select name="country" id="country-list" class="form-control form-control-sm col-10" onChange="getState(this.value);">
<option value disabled selected>Select Country</option>
<?php
$query="SELECT * FROM `country`";
$result=mysqli_query($con1,$query);
while($country=mysqli_fetch_assoc($result)){

?>

<option value="<?php echo $country["id"]; ?>"><?php echo $country['country_name']; ?></option>
<?php
}
?>
</select></td>
</tr>

<tr>
<td class="text-primary " align="right">State:</td>
<td>&nbsp;</td>
<td><select name="state" id="state-list" class="form-control form-control-sm col-10" onChange="getCity(this.value);">
<option value="">Select State</option>
</select></td>
</tr>
<tr>

<td class="text-primary " align="right">City:</td>
<td>&nbsp;</td>
<td><select name="city" id="city-list" class="form-control form-control-sm col-10">
<option value="" >Select City</option>
</select>

</td>
</tr>
                          <tr >
                           
                            
                            Sender's Address   : <td>
                             <textarea name="saddress" class="form-control form-control-sm col-10" cols="27" rows="2" id="saddress" required=""></textarea>
                             </td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Mobile :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="smob" cols="27" class="form-control form-control-sm col-10" type="text" rows="2" maxlength="10" minlength="10"  required="">
                              </span></td>
                          </tr>
                           <tr>
                            <td class="text-primary " align="right">Email :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="email" cols="27" class="form-control form-control-sm col-10" type="text" required="">
                              </span></td>
                          </tr>
                           </div>
                  </div>
              </tr>
          </tbody>
          
</div>
 <div id="second">
 	<tbody>
                    <tr>
                            <td colspan="3"  align="right"><div class="d-flex justify-content-center" ><strong>Reciever Details  </strong></div></td></tr>
                  <tr>
                            <td class="text-primary " align="right">Receiver's Name : </td>
                            <td>&nbsp;</td>
                            <td><input name="rname" id="rname"  class="form-control form-control-sm col-10" maxlength="100" size="40" type="TEXT" required="">
                                <span class="REDLink"></span></td>
                          </tr>
                          <tr>
<td class="text-primary " align="right">Country:</td>
<td>&nbsp;</td>
<td><select name="country1" id="country-list"  class="form-control form-control-sm col-10" onChange="getState2(this.value);">
<option value disabled selected>Select Country</option>
<?php
$query="SELECT * FROM `country`";
$result=mysqli_query($con1,$query);
while($country=mysqli_fetch_assoc($result)){ 
?>
<option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
<?php
}
?>
</select></td>
</tr>

<tr>
<td class="text-primary " align="right">State:</td>
<td>&nbsp;</td>
<td><select name="state1" id="state-list2"  class="form-control form-control-sm col-10" onChange="getCity2(this.value);">

<option value="">Select State</option>
</select></td>
</tr>
<tr>

<td class="text-info" align="right" >City:</td>
<td>&nbsp;</td>
<td><select name="city1" id="city-list2"  class="form-control form-control-sm col-10">
<option value="">Select City</option>
</select>

</td>
</tr>
                          <tr>
                            <td class="text-primary "align="right"> Receiver's Address: : </td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <textarea name="raddress"  class="form-control form-control-sm col-10" cols="27" rows="2" id="raddress" required=""></textarea>
                              </span></td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Reciever Mobile :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="rnum" cols="27"  class="form-control form-control-sm col-10" type="text" rows="2" maxlength="10" minlength="10"   required="">
                              </span></td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Email :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="email1" cols="27" class="form-control form-control-sm col-10" type="text" required="">
                              </span></td>
                          </tr>
                          
                        
                      </div>
                  </div>
              </tr>
          </tbody>

 </div>
 <div id="third">
 	<tbody >
                    
                  <tr>
                            <td colspan="3"  align="center"><div class="d-flex justify-content-center" ><strong>Courier   info  </strong></div></td>
                          </tr>
                           <tr>
                      <td class="TrackMediumBlue" align="right" width="162" style="font-size: 20px">Item Name   :</td>
                      <td width="16">&nbsp;</td>
                      <td width="339">
                        <input name="iname" class="form-control form-control-sm col-8" maxlength="100" size="40" type="TEXT" required=""> </td>
                   </tr>
                          <tr>
                            <td class="TrackMediumBlue" align="right">Mode of Transport  :</td>
                            <td>&nbsp;</td>
                            <?php
                             include 'dbcon.php';
                             $query="SELECT * FROM `modes`";
                             $result=mysqli_query($con,$query) or die(mysqli_error());

                            
                              $query1="SELECT * FROM `weights`";
                             $result1=mysqli_query($con,$query1) or die(mysqli_error());

                             $query2="SELECT * FROM `distances`";
                             $result2=mysqli_query($con,$query2) or die(mysqli_error());

                            ?>
                            
                           <td><select name="mod" class="form-control form-control-sm col-8">

                            <?php while($row1 = mysqli_fetch_array($result)):;?>

                            <option value="<?php echo $row1['rate'];?>"><?php echo $row1['mode'];?></option>

                           <?php endwhile;?>

                          </select></td>
                           
                          </tr>
                          <tr>
                            <td class="form-control" align="right">Weight : </td>
                            <td>&nbsp;</td>
                            <td><select name="wt"  class="form-control form-control-sm col-8">

                            <?php while($row2 = mysqli_fetch_array($result1)):;?>

                            <option value="<?php echo $row2['rate'];?>"><?php echo $row2['weight'];?></option>


                           <?php endwhile;?>
                       </select></td>

                          </tr>
                          <tr>
                            <td class="form-control form-control-sm col-8 " align="right">distance : </td>
                            <td>&nbsp;</td>
                            <td><select name="dis" class="form-control col-8">

                            <?php while($row3 = mysqli_fetch_array($result2)):;?>

                            <option value="<?php echo $row3['rate'];?>"><?php echo $row3['distance'];?></option>

                           <?php endwhile;?>
                       </select></td>

                          </tr>
                          <tr>
                            <td class="TrackMediumBlue" align="right">Number of Packages:</td>
                            <td>&nbsp;</td>
                            <td><input name="num" id="num" class="form-control form-control-sm col-8" size="40" maxlength="20"  type="INT" required=""></td>
                          </tr>
                          

                          
          </tbody>
         

 </div>
 <div id="fourth" ><tr >
                            <td >&nbsp;</td><br>
                            
                            <td ><input name="pay" class="btn btn-success" type="submit" value="Add Courier" /></td>
                                        
                            
                          </tr>
                      </div>
                  </tr></div></form>
              </body>
              </html>


