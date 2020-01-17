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
                <h2><i class="glyphicon glyphicon-th-list"></i> View Country </h2>

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
						<a href="country.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `country` WHERE `id`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">country ID</label>
						<div class="col-sm-3">
						  <input type="number" name="cid" value="<?php echo $row['id']; ?>" class="form-control" id="inputEmail3" disabled>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Country Name</label>
						<div class="col-sm-4">
						  <input type="text" name="con" value="<?php echo $row['country_name']; ?>" class="form-control" id="inputEmail3" placeholder="Enter Country Name">
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
							
						
						$con_name=$_POST['con'];
						
						
mysqli_query($con,"UPDATE `country` SET `country_name`='$con_name' WHERE `id`='$ID' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Country Info!'); window.location='country.php'</script>";
						 
						}
						?>
							


<?php include('footer.php'); ?>
