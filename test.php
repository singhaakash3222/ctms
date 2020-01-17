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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

</script>
<style type="text/css">
	

#container {
    width: 100%;
    background-color: teal;
    padding: 20px;
}
#first {
    width: 15%;
   float: left;
  padding: 0px 10px 0px 10px;
    height: 500px;
   
   
        background-color: lightgray;
}
#second {
    width:15%;
  float: left;
    height: 500px;
   padding: 0px 10px 0px 10px;
   
    background-color: lightpink;
}
#third {
    width:70%;
  float: right;
    height:500px;
      padding: 0px 0px 0px 10px;
   
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
	 <form method="POST" id="insert_form">
<div id="container">
	<tr>
    <?php
     
     $order_id = mt_rand(100000, 999999);

    ?>

    <input type="hidden" name="emp" value="<?php echo $ID; ?>">
    <input type="hidden" name="order_id"  value="<?php echo $order_id ?>">
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
                        <input name="sname" class="form-control form-control-sm col-12"  maxlength="100" size="40" type="TEXT" required=""> </td>
                   </tr>
                          
<tr>
<td class="text-primary "align="right">Country:</td>
<td>&nbsp;</td>
<td><select name="country" id="country-list" class="form-control form-control-sm col-12" onChange="getState(this.value);">
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
<td><select name="state" id="state-list" class="form-control form-control-sm col-12" onChange="getCity(this.value);">
<option value="">Select State</option>
</select></td>
</tr>
<tr>

<td class="text-primary " align="right">City:</td>
<td>&nbsp;</td>
<td><select name="city" id="city-list" class="form-control form-control-sm col-12">
<option value="" >Select City</option>
</select>

</td>
</tr>
                          <tr >
                           
                            
                            Sender's Address   : <td>
                             <textarea name="saddress" class="form-control form-control-sm col-12" cols="27" rows="2" id="saddress" required=""></textarea>
                             </td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Mobile :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="smob" cols="27" class="form-control form-control-sm col-12" type="text" rows="2" maxlength="10" minlength="10"  required="">
                              </span></td>
                          </tr>
                           <tr>
                            <td class="text-primary " align="right">Email :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="email" cols="27" class="form-control form-control-sm col-12" type="text" required="">
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
                            <td><input name="rname" id="rname"  class="form-control form-control-sm col-12" maxlength="100" size="40" type="TEXT" required="">
                                <span class="REDLink"></span></td>
                          </tr>
                          <tr>
<td class="text-primary " align="right">Country:</td>
<td>&nbsp;</td>
<td><select name="country1" id="country-list"  class="form-control form-control-sm col-12" onChange="getState2(this.value);">
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
<td><select name="state1" id="state-list2"  class="form-control form-control-sm col-12" onChange="getCity2(this.value);">

<option value="">Select State</option>
</select></td>
</tr>
<tr>

<td class="text-info" align="right" >City:</td>
<td>&nbsp;</td>
<td><select name="city1" id="city-list2"  class="form-control form-control-sm col-12">
<option value="">Select City</option>
</select>

</td>
</tr>
                          <tr>
                            <td class="text-primary "align="right"> Receiver's Address: : </td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <textarea name="raddress"  class="form-control form-control-sm col-12" cols="27" rows="2" id="raddress" required=""></textarea>
                              </span></td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Reciever Mobile :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="rnum" cols="27"  class="form-control form-control-sm col-12" type="text" rows="2" maxlength="10" minlength="10"   required="">
                              </span></td>
                          </tr>
                          <tr>
                            <td class="text-primary " align="right">Email :</td>
                            <td>&nbsp;</td>
                            <td><span class="REDLink">
                              <input name="email1" cols="27" class="form-control form-control-sm col-12" type="text" required="">
                              </span></td>
                          </tr>
                          
                        
                      </div>
                  </div>
              </tr>
          </tbody>

 </div>
 <div id="third">
 <?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

function fill_weight_select_box($connect) {
    $output1 = '';
    $query1 = "SELECT * FROM weights ORDER BY wid ASC";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $row1) {
        $output1 .= '<option value="' . $row1["rate"] . '">' . $row1["weight"] . '</option>';
    }
    return $output1;
}

function fill_mode_select_box($connect) {
    $output = '';
    $query = "SELECT * FROM modes ORDER BY mid ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["rate"] . '">' . $row["mode"] . '</option>';
    }
    return $output;
}

function fill_distance_select_box($connect) {
    $output2 = '';
    $query2 = "SELECT * FROM distances ORDER BY did ASC";
    $statement2 = $connect->prepare($query2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();
    foreach ($result2 as $row2) {
        $output2 .= '<option value="' . $row2["rate"] . '">' . $row2["distance"] . '</option>';
    }
    return $output2;
}

function fill_tax_select_box($connect) {
    $output3 = '';
    $query3 = "SELECT * FROM gst ORDER BY id ASC";
    $statement3 = $connect->prepare($query3);
    $statement3->execute();
    $result3 = $statement3->fetchAll();
    foreach ($result3 as $row3) {
        $output3 .= '<option value="' . $row3["gst"] . '">' . $row3["gst"] . '</option>';
    }
    return $output3;
}
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="js/calculation.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <br />
  
  
   <h4 align="center">Enter Item Details</h4>
   <br />
  
    
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">


                        <tr>
                             <th width="1%">Sr No.</th>
                            <th width="14%">Enter Item Name</th>
                            <th width="12%">Select mode</th>
                            <th width="12%">Select Weight</th>
                            <th width="12%">Select Distance</th>
                            <th width="10%"> Tax</th>

                            <th width="15%">Enter Quantity</th>
                            <th width="8%">Price</th>
                            <th width="8%">Tax Amount</th>
                            <th width="12%">Total price</th>
                            <th width="5%" ><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>


                        </tr>
                        <tr>
                            <td><span id="sr_no">1</span></td>
                            <td><input type="text" name="item_name[]" class="form-control item_name_0" /></td>
                            <td><select name="item_mode[]" id="item_mode_0" class="form-control item_mode"><option value=""> Mode</option><?php echo fill_mode_select_box($connect); ?></select></td>
                            <td><select name="item_weight[]" id="item_weight_0" class="form-control item_weight"><option value=""> Weight</option><?php echo fill_weight_select_box($connect); ?></select></td>
                            <td><select name="item_distance[]" id="item_distance_0" class="form-control item_distance"><option value=""> Distance</option><?php echo fill_distance_select_box($connect); ?></select></td>
                            <td><select name="item_tax[]" id="item_tax_0" class="form-control item_tax"><option value=""> Tax</option><?php echo fill_tax_select_box($connect); ?></select></td>
                            <td><input type="number" name="item_quantity[]" id="item_quantity_0" class="form-control form-control-sm col-5 item_quantity" value="1" /></td>
                            <td><input type="text" name="price[]" id="price_0" data-srno="'+count+'" class="form-control  price" readonly /></td>
                            <td><input type="text" name="tax_amount[]" id="tax_amount_0" data-srno="'+count+'"  class="form-control  tax_amount" readonly /></td>
                            <td><input type="number" name="total_amount[]" id="total_amount_0" data-srno="'+count+'" class="form-control  total_amount" readonly /></td>
                            <td></td>
                        </tr>



                    </table>
     
    
    </div>
   

<script>


    $(document).ready(function () {

        var final_total_amt = $('#final_total_amt').text();
        var count = 2;

        $(document).on('click', '.add', function () {

            var html = '';
            html += '<tr>';
            html += '<td><span id="sr_no">'+count+'</span></td>';
            html += '<td><input type="text" name="item_name[]" class="form-control item_name_' + count + '" /></td>';


            html += '<td><select name="item_mode[]" id="item_mode_' + count + '" class="form-control item_mode"><option value=""> Mode</option><?php echo fill_mode_select_box($connect); ?></select></td>';

            html += '<td><select name="item_weight[]" id="item_weight_' + count + '" class="form-control item_weight"><option value=""> Weight</option><?php echo fill_weight_select_box($connect); ?></select></td>';

            html += '<td><select name="item_distance[]" id="item_distance_' + count + '" class="form-control item_distance"><option value=""> Distance</option><?php echo fill_distance_select_box($connect); ?></select></td>';

            html += '<td><select name="item_tax[]" id="item_tax_' + count + '" class="form-control item_tax"><option value=""> Tax</option><?php echo fill_tax_select_box($connect); ?></select></td>';


            html += '<td><input type="number" name="item_quantity[]" id="item_quantity_' + count + '" class="form-control form-control-sm col-5 item_quantity" value="1" /></td>';



            html += '<td><input type="text" name="price[]" id="price_' + count + '" data-srno="' + count + '" class="form-control  price" readonly /></td>';


            html += '<td><input type="text" name="tax_amount[]" id="tax_amount_' + count + '" data-srno="' + count + '"  class="form-control  tax_amount" readonly /></td>';

            html += '<td><input type="number" name="total_amount[]" id="total_amount_' + count + '" data-srno="' + count + '" class="form-control  total_amount" readonly /></td>';

          


            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';


            $('#item_table').append(html);
            count++;
        });




        $(document).on('click', '.remove', function () {
            $(this).closest('tr').remove();
        });

        $('#insert_form').on('submit', function (event) {
            event.preventDefault();
            var error = '';

           


            $('.item_name').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Enter Item Name at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });


            $('.item_mode').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select mode at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_weight').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select weight at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });


            $('.item_distance').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select distance at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });



            $('.item_quantity').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select quantity at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_tax').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select tax at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.price').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select price at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });



            $('.tax_amount').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select tax_amount at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });


            $('.total_amount').each(function () {
                var count = 1;
                if ($(this).val() == '')
                {
                    error += "<p>Select total_amount at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });



            var form_data = $(this).serialize();
            if (error == '')
            {
                $.ajax({
                    url: "insert3.php",
                    method: "POST",
                    data: form_data,
                    success: function (data)
                    {
                        if (data == 'ok')
                        {
                            $('#item_table').find("tr:gt(0)").remove();
                            $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                            window.location.href = "update_courier.php<?php echo '?cid='.$order_id; ?>";
                        }
                    }
                });
            } else
            {
                $('#error').html('<div class="alert alert-danger">' + error + '</div>');
            }
        });

    });
</script>

 </div>
 <div id="fourth" ><tr >
                            <td >&nbsp;</td><br>
                            
                            <td > <input type="submit" name="submit" class="btn btn-info" value="Insert" /></td>
                                        
                            
                          </tr>
                      </div>
                  </tr></div></form>
              </body>
              </html>


