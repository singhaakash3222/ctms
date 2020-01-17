<?php 
include 'header1.php';
include 'dbcon.php';

$ID=$_GET['cid'];


?>

<style type="text/css">
	.row{ 
		margin-left: 25%;

	}
</style>

<div class="row">
    <div class="box col-md-11">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View Client Details</h2>

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
						<a href="customer.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"select * from client where cid='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Client ID</label>
						<div class="col-sm-3">
						  <input type="number" name="Emp_id" value="<?php echo $row['cid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-4">
						  <input type="text" name="uname" value="<?php echo $row['username']; ?>" class="form-control" id="inputEmail3" placeholder="User Name">
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
						<input class="form-control" name="contact" value="<?php echo $row['mobile']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="address" value="<?php echo $row['address']; ?>" id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					 
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">City</label>
						<div class="col-sm-4">
						  <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Country</label>
						<div class="col-sm-4">
						  <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
						 <div class="form-group">
						
						
						  <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Update</button>
						
					  </div>
					

					  
					</form>
							

<?php
$id =$_GET['cid'];
if (isset($_POST['update'])) {
                        $Emp_id=$_POST['Emp_id'];
                        $Name=$_POST['name'];
                        $username=$_POST['uname'];
                        $email=$_POST['email'];
                        $mobile=$_POST['contact'];
                        $address=$_POST['address'];
                        $city=$_POST['city'];
                        $country=$_POST['country'];
                       
						

mysqli_query($con," UPDATE `client` SET cid='$Emp_id', name='$Name',`username`=' $username', emailid='$email', mobile='$mobile', 
address='$address', city='$city', country='$country'  WHERE cid = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated client Info!'); window.location='customer.php'</script>";

}

?>