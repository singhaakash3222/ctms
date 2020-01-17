<?php include('header1.php'); 


$ID=$_GET['cid'];


?>
<?php
if($query2=mysqli_query($con,"SELECT * FROM recieved WHERE `rid` = '$ID'  ")or die(mysqli_error())){
?>

<style type="text/css">
	.row{ 
    margin-left: 10%;
    width: 100%;
      
  }
</style>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> Enter Reciever Details</h2>

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
						<a href="recieved.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysqli_query($con,"SELECT * FROM `recieved` WHERE `rid`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$query1=mysqli_query($con,"SELECT * FROM Courier".$ID." WHERE `status` = 'Delivered'  ")or die(mysqli_error($con));
$row1=mysqli_fetch_array($query1);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Order ID</label>
						<div class="col-sm-4">
						  <input type="number" name="rid" value="<?php echo $row['rid']; ?>" class="form-control" id="inputEmail3" placeholder="Item ID.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Order Date</label>
						<div class="col-sm-4">
						  <input type="text" name="date" value="<?php echo $row['date']; ?>" class="form-control" id="inputEmail3" placeholder="Name.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sender name</label>
						<div class="col-sm-4">
						  <input type="text" name="sname" value="<?php echo $row['sname']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sender Address</label>
						<div class="col-sm-4">
						  <input type="text" name="sadd" value="<?php echo $row['s_add']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sender Mobile</label>
						<div class="col-sm-4">
						  <input type="text" name="smob" value="<?php echo $row['snum']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sender To</label>
						<div class="col-sm-4">
						  <input type="text" name="rec" value="<?php echo $row['sendto']; ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever address</label>
						<div class="col-sm-4">
						  <input type="text" name="radd" value="<?php echo $row['radd'];  ?>" class="form-control" id="inputPassword3" placeholder="Brand.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever Name</label>
						<div class="col-sm-4">
						  <input type="text" name="rname" value="<?php echo $row['rname']; ?>" class="form-control" id="inputPassword3" placeholder="Enter reciever name" required="">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">recieved date</label>
						<div class="col-sm-4">
						  <input type="text" name="date1" value="<?php echo $row['rdate']; ?>" class="form-control" id="inputPassword3" placeholder="Courier not delivered" >
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever Mobile</label>
						<div class="col-sm-4">
						  <input type="text" name="rmob"  value="<?php echo $row['rmob']; ?>" class="form-control" maxlength="10" id="inputPassword3" placeholder="Enter reciever mobile" required="">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Reciever Id Type</label>
						<td>&nbsp;</td>
						<div class="col-sm-4">
						<select class="form-control" name="id" required="">
						
							
                              <option value="0">Select Id:</option>
                                <option value="Driving license">Driving license</option>
                                 <option value="Voter Id">Voter Id</option>
                                <option value="Adhaar Card">Adhaar Card</option>
                            <option value="Employee Card">Employee Card</option>
                            <option value="Other">Other</option>
                                 

						  
						
					</select>
					</div>
					  </div><div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">ID Number</label>
						<div class="col-sm-4">
						  <input type="text" name="inum" class="form-control"  value="<?php echo $row['id']; ?>" id="inputPassword3" placeholder="Enter Id number" required="">
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
							
						$rid=$_POST['rid'];
						$date=$_POST['date'];
						$sname=$_POST['sname'];
						$sadd=$_POST['sadd'];
						$smob=$_POST['smob'];
						$rec=$_POST['rec'];
						$radd=$_POST['radd'];
						$rname=$_POST['rname'];
						$rdate=$_POST['date1'];
						$rmob=$_POST['rmob'];
						$ridtype=$_POST['id'];
						$id=$_POST['inum'];
						
mysqli_query($con,"UPDATE `recieved` SET `rid`='$rid',`date`='$date',`sname`='$sname',`s_add`='$sadd',`snum`='$smob',`sendto`='$rec',`radd`='$radd',`rname`='$rname',`rdate`='$rdate',`rmob`='$rmob',`idtype`='$ridtype',`id`='$id' WHERE `rid`= '$rid'")or die(mysqli_error());
echo "<script>alert('Update Complete'); window.location='recieved.php'</script>";
						 
						}}
						
						?>
							


<?php include('footer.php'); ?>
