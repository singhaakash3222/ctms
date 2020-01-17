<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Employee</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
					  
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">E-mail</label>
						<div class="col-sm-4">
						  <input type="text" name="email" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Contact No.</label>
						<div class="col-sm-4">
						<!---  <input type="text" name="item_description" class="form-control" id="inputPassword3" placeholder="Description....."> -->
						<input class="form-control" name="contact"  id="inputPassword3" placeholder="Description.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-2">
						  <input type="text" name="address" class="form-control" id="inputPassword3" placeholder="Qty.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">City</label>
						<div class="col-sm-2">
						  <input type="text" name="city"  class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Country</label>
						<div class="col-sm-2">
						  <input type="text" name="country"  class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-2">
						  <input type="text" name="status"  class="form-control" id="inputPassword3" placeholder="Price.....">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Submit</button>
						</div>
					  </div>
					</form>
					
						<?php 
						include('include/database.php');
						if (isset($_POST['submit'])){
							
						 $Emp_id=$_POST['Emp_id'];
                        $Name=$_POST['name'];
                        $email=$_POST['email'];
                        $mobile=$_POST['contact'];
                        $address=$_POST['address'];
                        $city=$_POST['city'];
                        $country=$_POST['country'];
                        $status=$_POST['status'];
						
						

						mysql_query ("INSERT INTO `employee`( `name`, `emailid`, `mobile`, `address`, `city`, `country`, date, `status`) VALUES ( $Name, $email, $mobile, $address, $city,  $country,,$status)")or die(mysql_error());
						
						echo "<script>alert('Employee added successfully!'); window.location='item.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>