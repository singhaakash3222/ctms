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
      
      
      $sql="select * from recieved";
      
      
      
      $result=mysqli_query($con,$sql);
      include("report4a.php");
      if(!$result)
      {
      echo "Incorrect details !" . "</br>";
      include 'employee.php';
      }
      else {
      }
      

        ?>
        <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Recieved Courier Table</h2>

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
           <th>Booked Date</th>
           <th>Sender name</th>
          
          
            
           <th>Sender Address</th>
           
           <th>Sender number</th>
         
           <th>Send To</th>
           
           <th>Delivery Address</th>
           <th>Reciever name</th>
           <th>Recieved Date</th>
           <th>Reciever Mob. no.</th>
           <th>Reciever Id Type</th>
           <th>Reciever Id No.</th>
            
          
        
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
              <?php
              $result= mysqli_query($con,"SELECT * FROM `recieved` order BY `rid` ASC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['rid'];
              
        
              ?>
          <tr>
             <td><?php echo $row['rid']; ?></td>
            <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
            <td><?php echo $row['sname']; ?></td>
           
           
            <td><?php echo $row['s_add']; ?></td>
            <td><?php echo $row['snum']; ?></td>
            <td><?php echo $row['sendto']; ?></td>
             <td><?php echo $row['radd']; ?></td>
              <td><?php echo $row['rname']; ?></td>
              <td><span class="label-primary label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
               <td><?php echo $row['rmob']; ?></td>
               <td><?php echo $row['idtype']; ?></td>
               <td><?php echo $row['id']; ?></td>
            <td class="center">
              <!--<a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
              </a>-->
              
               <a class="btn btn-warning" href="recieved1.php<?php echo '?cid='.$id; ?>">
                <i class="glyphicon glyphicon-upload"></i>
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