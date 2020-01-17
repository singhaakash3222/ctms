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
  .row{ 
    margin-left: .5%;
    width: 100%;
      
  }
  th, td {
   
    text-align: center;    
    border-color: powderblue;
    border-size: 1px;
}
</style>
<body>
    <?php
        
      include 'dbcon.php';
      $ID=$_GET['cid'];
      
      $sql="SELECT * FROM Courier".$ID." order BY `date` DESC LIMIT 1 ";
      
      
    
      $result=mysqli_query($con,$sql);
      $row1=mysqli_fetch_assoc($result);
      $s=$row1['status'];
      

      include("report4.php");
      if(!$result)
      {?>
      <script type="text/javascript">
        alert('incorrect detail!');
         window.location='updatestatus.php';
      </script>
      <?php
      }
      else {
      }
      
 
        ?> 


        <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Client Table</h2>

                <div class="box-icon">
                    <!--<a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>-->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
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
              $result= mysqli_query($con,"SELECT * FROM Courier".$ID." order BY `date` ASC ") or die (mysqli_error());
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
            <td><span class="label-warning label label-default"><?php echo $row['status']; ?></td>
 
              
            
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
            $query2="SELECT * FROM Courier".$ID." ORDER BY `sname` DESC LIMIT 1,1 ";
            $result2=mysqli_query($con,$query2);
            while($route=mysqli_fetch_assoc($result2))
  {

            $selected=$route['route'];
            $status=$route['status'];
           

            

  }
  error_reporting(E_ALL & ~E_NOTICE);
if($selected == 'selected')
{
  
?>
             <div class="col-sm-3 " style="margin-left: 30%">
              <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
          <thead>
          <tr>
            <th>Courier id</th>
          
           <th>Sender name</th>
         </tr>
       </thead>
     </table>
<?php
           $query7=mysqli_query($con,"SELECT * FROM Courier".$ID."")or die(mysqli_error());

           $row5=mysqli_fetch_array($query7);

            $query3="SELECT * FROM `destinations`   WHERE `route` = '$status' ";
            $result2=mysqli_query($con,$query3);
            while($destinations=mysqli_fetch_assoc($result2)){

?>

              </div>

             
             <select name="dest"  class="form-control" >
            <option  value disabled selected>Select Route Destnation</option>
<?php
           $query7=mysqli_query($con,"SELECT * FROM Courier".$ID."")or die(mysqli_error());

           $row5=mysqli_fetch_array($query7);

            $query3="SELECT * FROM `destinations`   WHERE `route` = '$status' ";
            $result2=mysqli_query($con,$query3);
            while($destinations=mysqli_fetch_assoc($result2)){

?>

            <option  value="<?php echo $destinations["destination"]; ?>"><?php echo $destinations["destination"]; ?></option>
 <?php
}
?>  
</select>
</div>
          
          


          
             <input type="hidden" name="cid1" value="<?php echo $row5['courierid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID....." >

         <input class="btn btn-primary"   type="submit" name="update1" value="Update">

           <input type="hidden" name="city1" value="Delivered" class="form-control" >
             <input type="hidden" name="cid2" value="<?php echo $row5['courierid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID....." >
           </div>

         <input class="btn btn-success" style="margin-left: 10%;"   type="submit" name="update2" value="Delivered">
           </div>

        
           
          </table>
              </form>
          </table>

         

            </div><?php 
}
else
{?>

<?php

           $query=mysqli_query($con,"SELECT * FROM Courier".$ID."")or die(mysqli_error());

           $row=mysqli_fetch_array($query);
           $source=$row['source'];
           $destination=$row['destination'];
?>    
           <div class="col-sm-3 " style="margin-left: 30%">
             
           <select name="routes"  class="form-control" >
           <option  value disabled selected>Select Route</option>
<?php
          $query1="SELECT * FROM `routes` WHERE `source`= '$source'   AND `destination`= '$destination'  ";
          $result1=mysqli_query($con,$query1);
          while($country=mysqli_fetch_assoc($result1))
{

?>

         <option  value="<?php echo $country["rid"]; ?>"><?php echo $country['route']; ?></option>
<?php
}
?>
</select>
</div>
 
          <input type="hidden" name="cid" value="<?php echo $row['courierid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID....." >

          <input class="btn btn-primary"   type="submit" name="update" value="Update">

          
</div>

        
           
</table>
</form>
</table>
</div>
<?php 
}
}
?>
</body>
</html>