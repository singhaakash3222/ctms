<?php include('header.php'); 


$ID=$_GET['wid'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit Weight Price</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View Weight Price Details</h2>

                <div class="box-icon">
                <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="weight.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `weights` WHERE `wid`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Weight ID</label>
						<div class="col-sm-3">
						  <input type="number" name="mode_id" value="<?php echo $row['wid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Weight Value</label>
						<div class="col-sm-4">
						  <input type="text" name="mode" value="<?php echo $row['weight']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Weight Price</label>
						<div class="col-sm-4">
						  <input type="text" name="mode_p" value="<?php echo $row['rate']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
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
							
						$mode_id=$_POST['mode_id'];
						$mode_name=$_POST['mode'];
						$mode_price=$_POST['mode_p'];
						
mysqli_query($con,
	"UPDATE `weights` SET `wid`='$mode_id',`weight`='$mode_name',`rate`='$mode_price' WHERE `wid`='$ID'")or die(mysqli_error());
echo "<script>alert('Successfully Updated Item Info!'); window.location='weight.php'</script>";
						 
						}
						?>
							


<?php include('footer.php'); ?>
