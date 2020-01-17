<?php include('header.php'); 


$ID=$_GET['id'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit State</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> View state</h2>

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
						  <input type="number" name="cid" value="<?php echo $row['id']; ?>" class="form-control" id="inputEmail3" >
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Country Name</label>
						<div class="col-sm-4">
						  <input type="text" name="con" value="<?php echo $row['country_name']; ?>" class="form-control" id="inputEmail3" placeholder="Enter Country Name">
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">state Name</label>
						<div class="col-sm-4">
						  <input type="text" name="state"  class="form-control" id="inputEmail3" placeholder="Enter state Name">
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
							
						$cid=$_POST['cid'];
						
						$s_name=$_POST['state'];
						
						
						$sql3="SELECT MAX(`id`) FROM `states` ORDER BY `id` DESC LIMIT 1";
$result=mysqli_query($con,$sql3) or die(mysqli_error());
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;

mysqli_query($con,"INSERT INTO `states`(`id`, `countryID`, `name`) VALUES ('$id','$cid','$s_name') ")or die(mysqli_error());
echo "<script>alert('Successfully Inserted State Info!'); window.location='state.php'</script>";
						 
						}
						?>
							


<?php include('footer.php'); ?>
