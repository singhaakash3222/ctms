<?php include('header.php'); 


$ID=$_GET['cid'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="#">Edit Courier</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View courier Details</h2>

                <div class="box-icon">
                <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="revenue.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM Courier".$ID." ORDER BY `date` DESC LIMIT 1")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
					 <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Courier ID</label>
						<div class="col-sm-5">
						 <td><?php echo $row['courierid']; ?></td>
						</div>
						
					  </div>
					   <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Date</label>
						<div class="col-sm-5">
						 <td><?php echo $row['date']; ?></td>
						</div>
						
					  </div>
					 
					   
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Sender Name</label>
						<div class="col-sm-5">
						 <td><?php echo $row['sname']; ?></td>
						</div>
						
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Origin Point</label>
						<div class="col-sm-5">
						 <td><?php echo $row['source']; ?></td>
						</div>
						
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Sender contact</label>
						<div class="col-sm-5">
						 <td><?php echo $row['s_contact']; ?></td>
						</div>
						
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Reciever Name</label>
						<div class="col-sm-5">
						 <td><?php echo $row['rname']; ?></td>
						</div>
						
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Destination Point</label>
						<div class="col-sm-5">
						 <td><?php echo $row['destination']; ?></td>
						</div>
						
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 ">Reciever Contact</label>
						<div class="col-sm-5">
						 <td><?php echo $row['r_contact']; ?></td>
						</div>
						
					  </div>
					  
					  
					  
					   
					 
					  
					  
					</form>
							


<?php include('footer.php'); ?>
