<?php include('header1.php'); 


$ID=$_GET['cid'];


?>




<style type="text/css">
	.row{ 
		margin-left: 25%;

	}
</style>

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
                   
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="viewce.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `tbl_order_items` WHERE `order_items_id` = '$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-5">Courier ID</label>
						<div class="col-sm-3">
						 <td><?php echo $row['order_id']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-5">Date</label>
						<div class="col-sm-4">
						  <td><?php echo $row['date']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Item Name</label>
						<div class="col-sm-4">
						  <td><?php echo $row['item_name']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Sender Name</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['sname']; ?></td>
					  </div>
					</div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">sender address</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['sadd']; ?></td>
					  </div>
					</div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Sender contact</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['smob']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Reciever Name</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['rname']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Reciever address</label>
						<div class="col-sm-6">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						
						<td><?php echo $row['radd']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Reciever Contact</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['rmob']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-5">Amount to be Paid</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<td><?php echo $row['total_amount']; ?></td>
						</div>
					  </div>
					  
					  
					  
					  
					</form>
							


<?php include('footer.php'); ?>
