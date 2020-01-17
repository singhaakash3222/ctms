<?php include('header.php'); 


$ID=$_GET['id'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit Country</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View Route </h2>

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
						<a href="route.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `destinations` WHERE `did`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Destination ID</label>
						<div class="col-sm-3">
						  <input type="number" name="did" value="<?php echo $row['did']; ?>" class="form-control" id="inputEmail3" >
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Route Name</label>
						<div class="col-sm-3">
						  <input type="text" name="route" value="<?php echo $row['route']; ?>" class="form-control" id="inputEmail3" required>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Destination</label>
						<div class="col-sm-3">
						  <input type="text" name="dest" value="<?php echo $row['destination']; ?>" class="form-control" id="inputEmail3" required>
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
							
						
						$did=$_POST['did'];
						$route=$_POST['route'];
						$destination=$_POST['dest'];

						
						
mysqli_query($con,"UPDATE `destinations` SET `did`='$did',`destination`='$destination',`route`='$route' WHERE `did`='$ID' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Updated Route destination Info!'); window.location='route.php'</script>";
						 
						}
						?>
							


<?php include('footer.php'); ?>
