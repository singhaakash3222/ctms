<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="#">Route</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Set route</h2>

                <div class="box-icon">
                    <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content">
            	<div class="alert alert-info">
						<?php include ('add_route.php') ?>
					</div>
			
<form method="POST" action="release_query.php">
                <!-- Start content here -->
                
                <div class="control-group">
                </div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>Route Id</th>
						<th>Route Name</th>
          
          
                        <th>action</th>

					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysqli_query($con,"SELECT * FROM `routes`") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['rid'];
							
					?>
					   <td><?php echo $row['rid']; ?></td>
						<td><?php echo $row['route']; ?></td>
						
						
						<td class="center"> 
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
				
							</a>-->
							<a class="btn btn-success" href="edit_route.php<?php echo '?
							id='.$id; ?>">
								<i class="glyphicon glyphicon-eye-open">View</i>
							</a>

							<a class="btn btn-primary" href="insert_route.php<?php echo '?
							id='.$id; ?>">
								<i class="	glyphicon glyphicon-log-in"> Destination</i>
							</a>
							
							<a class="btn btn-danger" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
								<i class="glyphicon glyphicon-trash icon-white"></i>
							</a>
							<?php include('modal_delete_route.php'); ?>
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
