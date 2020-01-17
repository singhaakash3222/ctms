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
                <h2><i class="glyphicon glyphicon-th-list"></i> View Profile Details</h2>

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
  $query=mysqli_query($con,"select * from employee where emp_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$id=$row['emp_id'];
  ?>					
					<form  method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
						<div>
							<input type="hidden" name="id" value="<?php echo $row['cid']; ?>" class="form-control" id="inputPassword3" placeholder="Password....." required />
							<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 ">Emp. id</label>
						<div class="col-sm-4">
						  <td><?php echo $row['emp_id']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 ">Name</label>
						<div class="col-sm-4">
						  <td><?php echo $row['name']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 ">E-mail Id</label>
						<div class="col-sm-4">
						<td><?php echo $row['emailid']; ?></td>
						</div>
						
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">Mobile</label>
						<div class="col-sm-4">
						 <td><?php echo $row['mobile']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">Address</label>
						<div class="col-sm-4">
						 <td><?php echo $row['address']; ?></td>
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">City</label>
						<div class="col-sm-4">
						 <td><?php echo $row['city']; ?></td>
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">Country</label>
						<div class="col-sm-4">
						 <td><?php echo $row['country']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">UserName</label>
						<div class="col-sm-4">
						 <td><?php echo $row['username']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 ">Password</label>
						<div class="col-sm-4">
						  <td><?php echo $row['password']; ?></td>
						</div>
					  </div>
					  <div class="form-group">
					  	<label for="inputPassword3" class="col-sm-2 control-label"></label>
						 <a class="btn btn-warning" href="profileupdate1.php<?php echo '?cid1='.$id; ?>">
                <i >Update</i>
              </a>
					  </div>
</div>

					</form>
							


<?php include('footer.php'); ?>
