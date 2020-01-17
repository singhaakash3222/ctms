<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add GST</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add GST</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">GST Code</label>
						<div class="col-sm-4">
						  <input type="text" name="gst"  value="HSN" class="form-control" id="inputEmail3" minlength="11" maxlength="11" required="">
						</div>(Please enter 8 digit gst code value)
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">GST%</label>
						<div class="col-sm-4">
						  <input type="text" name="gst1"  class="form-control" id="inputPassword3" maxlength="2" minlength="1"  required="">
						</div>%
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
							
						
						$gst=$_POST['gst'];
						$gst1=$_POST['gst1'];
						

						mysqli_query ($con,"INSERT INTO `gst`(`hsn`, `gst`) VALUES ('$gst','$gst1')")or die(mysqli_error());
		
						echo "<script>alert('GST successfully added!'); window.location='gst.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>