<?php include('header.php'); 


$ID=$_GET['id'];


?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"> States</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i>Add Cities</h2>

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
  $query=mysqli_query($con,"SELECT * FROM `states` WHERE `countryID`='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>					
					<form method="POST" action="release_query.php">
                <!-- Start content here -->
                
                <div class="control-group">
                </div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>S.No.</th>
						<th>State Name</th>
                        
          
            <th>action</th>

					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysqli_query($con,"SELECT * FROM `states` WHERE `countryID`='$ID'") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['countryID'];
							$sid=$row['id'];
					?>
					   <td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						
						
						<td class="center">
							
							
							<a  class="btn btn-primary" href="add_city.php<?php echo '?
                            id='.$sid;?> ">
                                <i class="glyphicon glyphicon-plus">Add City</i>
                            </a>

                           

                            <a  class="btn btn-warning" href="edit_city.php<?php echo '?
                            id='.$sid;?> ">
                                <i class="  glyphicon glyphicon-log-in"> Branch</i>
                            </a>
						</td>
					</tr>
							<?php } ?>
					</tbody>
					</table>
                    
</form>



				
                <!-- end content here -->
            </div>
        </div>
    </div>
</div><!--/row-->		
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Items allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		


<?php include('footer.php'); ?>
