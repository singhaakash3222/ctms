<?php

$ID=$_GET['id'];
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus"></i> Add Destination</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add Destination</h4>
      </div>
      <div class="modal-body">
      	<?php
      	include 'dbcon.php';
							$result= mysqli_query($con,"SELECT * FROM `routes` WHERE `rid` = '$ID'") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['rid'];
							
    ?>
					  
						
						

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Route Name</label>
						<div class="col-sm-8">
							 <input type="text" name="route" value="<?php echo $row['route']; ?>" class="form-control" id="inputEmail5" >
						 
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Destination Name</label>
						<div class="col-sm-8">
						  <input type="text" name="dest"  class="form-control" id="inputEmail5" placeholder="Enter Destiantion Name.....">
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
				}
						include('dbcon.php');
						if (isset($_POST['submit'])){
							
					$route=$_POST['route'];
					$dest=$_POST['dest'];
						
						$sql3="SELECT MAX(`did`) FROM `destinations` ORDER BY `did` DESC LIMIT 1";
$result=mysqli_query($con,$sql3) or die(mysqli_error());
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;

						mysqli_query ($con,"INSERT INTO `destinations`(`did`, `destination`, `rid`, `route`) VALUES ('$id','$dest','$ID','$route')")or die(mysqli_error());
		
						echo "<script>alert('destination successfully added!'); window.location='route.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>