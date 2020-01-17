<?php include('header1.php'); 

$ID=$_GET['cid1'];


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
                <h2><i class="glyphicon glyphicon-th-list"></i> Update Profile Details</h2>

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
						<a href="employee.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
include 'dbcon.php';
  $query=mysqli_query($con,"SELECT * FROM `employee` WHERE `emp_id`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$uname=$row['username'];
  ?>					
					<form method="POST" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
						<input type="hidden" name="cid" value="<?php echo $row['emp_id']; ?>" class="form-control" id="inputEmail3" placeholder="Firstname....." required />
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail3" placeholder="Firstname....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">E-mail Id</label>
						<div class="col-sm-4">
						  <input type="text" name="email" value="<?php echo $row['emailid']; ?>" class="form-control" id="inputEmail3" placeholder="MI / Middlename....." />
						</div>
						
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Mobile</label>
						<div class="col-sm-4">
						  <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" id="inputPassword3"  required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-4">
						  <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" id="inputPassword3" placeholder="Username....." required />
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">City</label>
						<div class="col-sm-4">
						  <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" id="inputPassword3" placeholder="Username....." required />
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Country</label>
						<div class="col-sm-4">
						  <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control" id="inputPassword3" placeholder="Username....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">UserName</label>
						<div class="col-sm-4">
						  <input type="text" name="uname" value="<?php echo $row['username']; ?>" class="form-control" id="inputPassword3" placeholder="Password....." disabled />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
						  <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control" id="inputPassword3" placeholder="Password....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="update1" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Update</button>
						</div>
					  </div>
					</form>
							
<?php

if (isset($_POST['update1'])) {
                          $id =$_POST['cid'];
						$name=$_POST['name'];
						$email=$_POST['email'];
						$mobile=$_POST['mobile'];
						$address=$_POST['address'];
						$city=$_POST['city'];
						$country=$_POST['country'];
					
						$password=$_POST['password'];
						


mysqli_query($con,"UPDATE `employee` SET `username`='$uname',`password`='$password',`name`='$name',`emailid`='$email',`mobile`='$mobile',`address`='$address',`city`='$city',`country`='$country 'WHERE `emp_id` = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Updated Your Info!'); window.location='employee.php'</script>";

}

?>
					
                <!-- End content here -->
            </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
