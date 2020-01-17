<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Distance Price</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Distance</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Distance Name</label>
						<div class="col-sm-4">
						  <input type="text" name="mode"  class="form-control" id="inputEmail3" placeholder="Enter distance Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Distance</label>
						<div class="col-sm-4">
						  <input type="text" name="mode_p"  class="form-control" id="inputPassword3" placeholder="Set Price.....">
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
						include('dbcon.php');
						if (isset($_POST['submit'])){
							
						
						$mode_name=$_POST['mode'];
						$mode_price=$_POST['mode_p'];
						

						mysqli_query ($con,"INSERT INTO `distances`( `distance`, `rate`) VALUES ('$mode_name','$mode_price')")or die(mysqli_error());
		
						echo "<script>alert('Distance successfully added!'); window.location='distance.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>