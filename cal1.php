<!DOCTYPE html>
<html>
<head>
  <title>Calculate Price</title>
</head>
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<style type="text/css">
  body{
    background-color: white;
    margin: none;
  }
  .txt1{
    text-decoration: none;
    font-size: 20px;
    color: orange;
    margin-right: 70px;
    
  }
  th{
   border: 10px solid white;
    text-align: center;    
    border-color: powderblue;
    border-size: 1px;
  }
  .table1 td{
    border:none;
  }
  .table{
    margin-left: 150px;
    margin-top: 20px;
     border-color: powderblue;
    }
  .table2{
     width: 750px;
  }
  
 
  .a{
    background-color: white;
    height: 500px;
    margin-right: 100px;
    margin-left: 100px;
    margin-top: 50px;

</style>
<body>

  <div class="a">
<h1 align="center" >Calculate Price Here</h1>
   <div align="right" class="text-center w-full">

  <a class="txt1" href="client.php" ><i class="fa fa-arrow-left"></i>  Back</a>
</div>

<form method="POST"  action="">
  <table align="center" bgcolor="teal"  bgcolor="orange" border="5" cellpadding="0" class="table1">
    <tr style="border-collapse: collapse;">
           <td colspan="3" class="TrackMediumBlue" align="right">
                <div class="headtext13" align="center">
                              <h3>Enter Your Courier Details  </h3>
                 </div>
           </td>
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
                            
          <td>
            <select name="mod">

                            <?php while($row1 = mysqli_fetch_array($result)):;?>

                            <option value="<?php echo $row1['rate'];?>"><?php echo $row1['mode'];?></option>

                           <?php endwhile;?>

            </select>
          </td>
                           
     </tr>
     <tr>
                            <td class="TrackMediumBlue" align="right">Weight : </td>
                            <td>&nbsp;</td>
                            <td>
                              <select name="wt">

                            <?php while($row2 = mysqli_fetch_array($result1)):;?>

                            <option value="<?php echo $row2['rate'];?>"><?php echo $row2['weight'];?></option>

                           <?php endwhile;?>
                         </select>
                       </td>


        </tr>
                          <tr>
                            <td class="TrackMediumBlue" align="right">Distance : </td>
                            <td>&nbsp;</td>
                            <td>
                              <select id="distance"  name="dis" required="">
                                <?php while($row3 = mysqli_fetch_array($result2)):;?>
                                 <option value="<?php echo $row3['rate'];?>"><?php echo $row3['distance'];?></option>
                              <?php endwhile;?>
                          </select>

                              </td>
                          </tr>
                          <tr>
                            <td class="TrackMediumBlue" align="right">Number of Packages:</td>
                            <td>&nbsp;</td>
                            <td><input name="num" id="num" size="20" maxlength="20"  type="INT" required=""></td>
                          </tr>
                          

                          
                          
                          

                          
                          <tr>
                            <td align="center">&nbsp;</td><td><input align="center" name="pay" type="submit" onclick="Calculate" value="Calculate Price" /></td>
                                        
                            
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <div>
                            
                          </div>
  </table>
  </form>
 <h3 style="text-align: center;">**GST Tax Excluded**</h3>
  
  <?php

if(isset($_POST['pay'])){

   $num=$_POST['dis'];
$num1=$_POST['mod'];
$num2=$_POST['wt'];
$num3=$_POST['num'];

$total=$num+$num1+$num2;
$rate=$total*$num3;

  }
?>

 <div class="table">
   <table class="table2">
      <tr>
           <th>Mode of Transport Price</th>
           <th>Weight of Courier Price</th>
           <th>Distance travelled Price </th>
           <th>Number of Item</th>
           <th>Your Estimated Delivery Amount</th>
           
      </tr>

    
        
      <tr align="center">
        <?php error_reporting(E_ALL & ~E_NOTICE); ?>
            <td><?php echo " $num1";error_reporting(E_ALL & ~E_NOTICE);?> </td>
            <td><?php echo " $num2"; error_reporting(E_ALL & ~E_NOTICE);?> </td>
            <td> <?php echo " $num"; error_reporting(E_ALL & ~E_NOTICE);?> </td>
            <td> <?php echo " $num3";error_reporting(E_ALL & ~E_NOTICE);?> </td>
            <td><?php echo " $rate"; error_reporting(E_ALL & ~E_NOTICE);?> </td>
              
      </tr>
    </table> 
</div>



