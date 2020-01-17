<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Route</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Route</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Origin City</label>
						<div class="col-sm-4">
						  <input type="text" name="origin"  class="form-control" id="inputEmail3" required="">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">VIA</label>
						<div class="col-sm-4">
						  <input type="text" name="via"  class="form-control" id="inputEmail3" required="">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Destination City</label>
						<div class="col-sm-4">
						  <input type="text" name="dest"  class="form-control" id="inputEmail3" required="">
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
							
						
						$origin=$_POST['origin'];
						$via=$_POST['via'];
						$dest=$_POST['dest'];
						$route=$origin.'-Via('.$via.')-'.$dest;
						
						$sql3="SELECT MAX(`rid`) FROM `routes` ORDER BY `rid` DESC LIMIT 1";
$result=mysqli_query($con,$sql3) or die(mysqli_error());
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;

						mysqli_query ($con,"INSERT INTO `routes`(`rid`, `source`, `via`, `destination`, `route`) VALUES ('$id','$origin','$via','$dest','$route')")or die(mysqli_error());
		
						echo "<script>alert('route successfully added!'); window.location='route.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>