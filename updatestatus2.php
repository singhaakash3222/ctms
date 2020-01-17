<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
</head>
<link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
 <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
<style type="text/css">
  table,th,td
  {
    border: 5px solid white;
    margin-left: 5px;
    margin-right: 5px;
    
  }
  #first {
    width: 50%;
   float: left;
  padding: 0px 10px 0px 10px;
    
   
   
        
}
#second {
    width:30%;
  float: left;
    
   padding: 0px 10px 0px 10px;
   
    
}
  .a{
    color: teal;
    margin-top: 20px;
    margin-right: 20px;
    margin-left: 20px;
    text-align: center;
    background-color: white;
  }
  .row{ 
    margin-left: .5%;
    width: 100%;
      
  }
  .c{
    text-align: right;
   
    color: orange;
    text-decoration: none;
    margin-right: 50px;
    font-size: 30px;
  }
  th, td {
   
    text-align: center;    
    border-color: powderblue;
    border-size: 1px;
}
</style>
<body>
    <?php
         error_reporting(E_ALL & ~E_NOTICE);
      include 'dbcon.php';
      $ID=$_GET['cid'];
      $cid=$_GET['cidc'];
      ?>
      <div align="center" class="p">
      <div style="background-color: powderblue; width: 100%; height: 130px; padding: 5px 0px 0px 0px;">
                        <form action="" method="POST" name="form" >
                      <tr>
                      <td class="TrackMediumBlue" align="right" width="162"><h4>Enter Courier Id</h4></td>
                      <td width="16">&nbsp;</td>
                      <td width="339">
                        <input  name="cidc"  size="40" type="TEXT" required> </td><td><button type="submit" onclick="track" class="btn btn-success">Track</button></td>
                        <div align="right" ><a class="c" href="employee.php" ><i class="fa fa-home" >Home</i> </a></div>
                   </tr>
               </form>
             </div>
           </div>
               <?php

                $cid=$_POST['cidc'];
       error_reporting(E_ERROR | E_WARNING | E_PARSE);
      $sql="SELECT * FROM Courier".$cid." order BY `date` DESC LIMIT 1 ";
      
      
    
      $result=mysqli_query($con,$sql);
      
error_reporting(E_ALL ^ E_WARNING);
      $row1=mysqli_fetch_assoc($result)or die(mysqli_error());
       error_reporting(E_ERROR | E_WARNING | E_PARSE);
      $s=$row1['status'];
      

     ?>


        <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" style="height: 20px;" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Courier Update Table</h2>

                <div class="box-icon">
                  
                    <!--<a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                  
                    
                </div>
            </div>
            <a class="btn btn-primary" title="revenue pdf file" style="margin-left: 10px;  margin-top: 5px;" href='invoice4.php<?php echo '?cid='.$cid; ?>';>
                <i class="glyphicon  glyphicon-download-alt" style="size: 20px;"> Invoice PDF</i>
              </a>
            <div class="box-content">
      
          
          <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
          <thead>
          <tr>
            <th>Courier id</th>
          
           <th>Sender name</th>
          
          
            
           <th>Reciever name</th>
           
           <th>Destination</th>
         
           <th>Date</th>
           
           <th>Status</th>
           

           
            
          
          
        
     
          </tr>
          </thead>
          <tbody>
              <?php
              $result= mysqli_query($con,"SELECT * FROM Courier".$cid." order BY `date` ASC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['courierid'];
              $status=$row['status'];

              
        
              ?>
          <tr>
            <td><?php echo $row['courierid']; ?></td>
           
            <td><?php echo $row['sname']; ?></td>
           
           
            <td><?php echo $row['rname']; ?></td>
            <td><?php echo $row['destination']; ?></td>
           

            <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
            <td><span class="label-warning label label-default"><?php echo $row['status']; ?></span></td>
 
              
            
          </tr>

              <?php } ?>
          </tbody>
 <form action="update_courier1.php" method="POST">
  <table>
<?php 
         if($s == 'Delivered'){?>
        <a class="btn btn-warning" style="margin-left: 40%;" href="reciever1.php<?php echo '?cid1='.$id; ?>">View Reciever details
               
              </a>
         <?php
}
else{
            $query2="SELECT * FROM Courier".$cid." ORDER BY `sname` DESC LIMIT 1,1 ";
            $result2=mysqli_query($con,$query2);
            while($route=mysqli_fetch_assoc($result2))
  {

            $selected=$route['route'];
            $status=$route['status'];
            $rid=$route['rid'];
            
           

            

  }
  error_reporting(E_ALL & ~E_NOTICE);
if($selected == 'selected')
{echo $rid;
  ?>
            <div id="first" >
              <tr class="box-header well  "  >
                <td  style="width: 65.4% ; border-color: lightgray; text-align: center;"> Selected Route Destinations  <a class="btn btn-warning " title="Route pdf file" style="float: right;" href='invoice5.php<?php echo '?cid='.$status; ?>';><i class="glyphicon  glyphicon-download-alt"> Route PDF</i></a></td>
              </tr>
            
          <table class="table table-striped table-bordered   "  style="width: 43.8%">
          <thead>
          <tr>
            <th width="15%">Route Id</th>
          
           <th width="15%">Destination Name</th>
          </tr>
          </thead>
         
             <?php

            $query13="SELECT * FROM `destinations`   WHERE `rid` = '$rid'  ";
            $result13=mysqli_query($con,$query13);
            while($routes=mysqli_fetch_assoc($result13)){

?>
       <tbody>
       <tr>
       <td><?php echo $routes['did']; ?></td>
       <td><?php echo $routes['destination']; ?></td>
  </tr>
  <?php
}
?>
</tbody>
</table>


            
               

  <div id="second" >
             <select name="dest"  class="form-control" >
            <option  value disabled selected>Select Route Destnation</option>
<?php
           $query7=mysqli_query($con,"SELECT * FROM Courier".$cid."")or die(mysqli_error());

           $row5=mysqli_fetch_array($query7);

            $query3="SELECT * FROM `employee`   WHERE `emp_id` = '$ID' ";
            $result2=mysqli_query($con,$query3);
            while($destinations=mysqli_fetch_assoc($result2)){

?>

            <option  value="<?php echo $destinations["branch"].','.$destinations["city"].','.$destinations["state"]; ?>"><?php echo $destinations["branch"].','.$destinations["city"].','.$destinations["state"]; ?></option>
 <?php
}
?>  
</select>


          
          


          
             <input type="hidden" name="cid1" value="<?php echo $row5['courierid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID....." >

         <input class="btn btn-primary" style="margin-left: 10%;"  type="submit" name="update1" value="Update">

           <input type="hidden" name="city1" value="Delivered" class="form-control" >
             <input type="hidden" name="cid2" value="<?php echo $row5['courierid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID....." >
           


         <input class="btn btn-success" style="margin-left: 10%;"   type="submit" name="update2" value="Delivered">
       


        </table>
           
              </form>
          

         </div>
       </div>

            </div><?php 
}
?>

        
           
</table>
</form>
</table>
</div>
<?php 
}

?>
</body>
</html>