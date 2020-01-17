<?php include('header.php'); 


$ID=$_GET['emp_id'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="item.php">Home</a>
        </li>
        <li>
            <a href="#">View Employee</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View Employee Details</h2>

                <div class="box-icon">
                <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="item.php" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="item.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `employee` WHERE `emp_id` ='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Employee ID</label>
						<div class="col-sm-3">
						  <input type="number" name="Emp_id" value="<?php echo $row['emp_id']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">E-mail</label>
						<div class="col-sm-4">
						  <input type="text" name="email" value="<?php echo $row['emailid']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Contact No.</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" type="number" name="contact" value="<?php echo $row['mobile']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact" value="<?php echo $row['address']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">City</label>
						<div class="col-sm-2">
						  <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Country</label>
						<div class="col-sm-2">
						  <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-2">
						  <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Update</button>
						</div>
					  </div>
					  
					</form>
							
<?php
$id =$_GET['emp_id'];
if (isset($_POST['update'])) {
                        $Emp_id=$_POST['Emp_id'];
                        $Name=$_POST['name'];
                        $email=$_POST['email'];
                        $mobile=$_POST['contact'];
                        $address=$_POST['address'];
                        $city=$_POST['city'];
                        $country=$_POST['country'];
                        $status=$_POST['status'];
						

$history_record=mysqli_query($con,"SELECT * FROM `employee` WHERE `emp_id` =$id_session");
$row=mysqli_fetch_array($history_record);

mysqli_query($con," UPDATE employee SET emp_id='$Emp_id', name='$Name', emailid='$email', mobile='$mobile', 
address='$address', city='$city', country='$country', status='$status'  WHERE emp_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Item Info!'); window.location='item.php'</script>";

}

?>
					
                <!-- End content here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
