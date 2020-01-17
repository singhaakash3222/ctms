<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="#">IN transit</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-info-sign"></i> All In Transit Courier Orders</h2>

                <div class="box-icon">
                    <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a> -->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content">
			
<form method="POST" action="release_query.php">
                <!-- Start content here -->
                
                <div class="control-group">
                </div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>Courier id</th>
           <th>Sname</th>
           <th>Orig_c</th>
          
           <th>Rname</th>
           <th>D_city</th>
           
           <th>Reciever Address</th>
           <th>Date</th>
           <th>Mode</th>
           <th>Weight</th>
           <th>Distance</th>
           <th>Qty</th>
           <th>Rate</th>
           <th>Status</th>
            <th>action</th>

					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysqli_query($con,"select * from courier_table where `status`='Loaded'") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['cid'];
							
					?>
						<td><?php echo $row['cid']; ?></td>
						<td><?php echo $row['sname']; ?></td>
						<td><?php echo $row['orig']; ?></td>
						<td><?php echo $row['rname']; ?></td>
						<td><?php echo $row['dest']; ?></td>
						<td><?php echo $row['radd']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['mode']; ?></td>
						<td><?php echo $row['weight']; ?></td>
						<td><?php echo $row['distance']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['rate']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td class="center">
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>-->
							<a class="btn btn-success" href="edit_courier2.php<?php echo '?cid='.$id; ?>">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
							<a class="btn btn-primary" href="invoice.php<?php echo '?cid='.$id; ?>">
								<i class="glyphicon  glyphicon-download-alt"></i>
							</a>
							<a class="btn btn-danger" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
								<i class="glyphicon glyphicon-trash icon-white"></i>
							</a>
							<?php include('modal_delete_loaded.php'); ?>
						</td>
					</tr>
							<?php } ?>
					</tbody>
					</table>
                    <div class="controls">
						<button type="submit" class="btn btn-primary" style="float:right; margin-top:-100px;"><i class="glyphicon glyphicon-check"></i> Borrow</button>
                    </div>
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
