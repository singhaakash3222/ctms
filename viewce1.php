<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:login.php');   
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include 'dbcon.php';
                $sql="SELECT * FROM client WHERE username='$staff_id'";
                $result=  mysqli_query($con,$sql) or die(mysqli_error());
                $rws=  mysqli_fetch_assoc($result);
                
                $id=$rws['cid'];
                
                $name=$rws['name'];
                $user=$rws['username'];

                $_SESSION['user']=$user;
        
                
    
                $_SESSION['name1']=$name;
                $_SESSION['id']=$id;
                ?>
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
      
      
      $sql="SELECT * FROM `tbl_order_items` ";
      
      
      
      $result=mysqli_query($con,$sql);
      include("report4a1.php");
      if(!$result)
      {
      echo "Incorrect details !" . "</br>";
      include 'client.php';
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
           <th>item Name</th>
           <th>Sender name</th>
          
          
            
           <th>Reciever name</th>
           
           <th>Reciever Address</th>
         
           <th>Date</th>
           
          
           
            
          
          
        
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
              <?php
              $result= mysqli_query($con,"SELECT * FROM `tbl_order_items` WHERE `user`= '$user' order BY `order_id` ASC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['order_id'];
              
        
              ?>
          <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['sname']; ?></td>
           
           
            <td><?php echo $row['rname']; ?></td>
            <td><?php echo $row['radd'].','.$row['rcity'].','.$row['rstate']; ?></td>
           

            <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
            

              
            <td class="center">
              <!--<a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
              </a>-->
              <a class="btn btn-success" href="track2.php<?php echo '?cid='.$id; ?>">
                <i class="glyphicon glyphicon-eye-open"></i>
              </a>
               <a class="btn btn-primary" href="invoice4.php<?php echo '?cid='.$id; ?>">
                <i class="glyphicon  glyphicon-download-alt"></i>
              </a>
              <a class="btn btn-warning" href="reciever1.php<?php echo '?cid1='.$id; ?>">
                <i class="glyphicon glyphicon-eye-open"></i>
              </a>
            </td>
          </tr>
              <?php } ?>
          </tbody>
          </table>
        
                <!-- end content here -->
            </div>

</body>
</html>
<?php include('footer.php'); ?>