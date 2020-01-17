<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Weight Price</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Weight</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Weight Value</label>
						<div class="col-sm-4">
						  <input type="text" name="mode"  class="form-control" id="inputEmail3" placeholder="Enter weight Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Weight Price</label>
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
						

						mysql_query ("INSERT INTO `weights`( `weight`, `rate`) VALUES ('$mode_name','$mode_price')")or die(mysql_error());
		
						echo "<script>alert('Weight successfully added!'); window.location='weight.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>