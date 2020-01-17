<?php include('header.php'); 


$ID=$_GET['cid'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
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
                <h2><i class="glyphicon glyphicon-th-list"></i> View Delivered courier Details</h2>

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
						<a href="delivered.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysql_query("SELECT * FROM `courier_table` WHERE `cid`='$ID'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Courier ID</label>
						<div class="col-sm-3">
						  <input type="number" name="Emp_id" value="<?php echo $row['cid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Sender Name</label>
						<div class="col-sm-4">
						  <input type="text" name="name" value="<?php echo $row['sname']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Origin City</label>
						<div class="col-sm-4">
						  <input type="text" name="email" value="<?php echo $row['orig']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Origin State</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['orig_state']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever Name</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['rname']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever Address</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['radd']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Destination city</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['dest']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Destination state</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['dest_state']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Date</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control"  name="contact" value="<?php echo $row['date']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Amount to be Paid</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['rate']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Mode of Transport</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['mode']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Weight of Courier</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['weight']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Distance travelled</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['distance']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Quantity</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['quantity']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Courier Status</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['status']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					 
					  
					  
					</form>
							


<?php include('footer.php'); ?>
