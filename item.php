<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="#">Employee Table</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i> Employee Table</h2>

                <div class="box-icon">
                <!---    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
				-->
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <!-- Start content here -->
				
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
					<tr>
						<th>Emp ID</th>
						<th> Name</th>
						<th>E-mail</th>
						<th>Contact No.</th>
						<th>Head Office</th>
						<th>Branch</th>
						<th>Date Employed</th>
						<th>Status</th>
				
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysqli_query($con,"SELECT * FROM `employee` order BY `emp_id` DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['emp_id'];
							
				
							?>
					<tr>
						<td><?php echo $row['emp_id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['emailid']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['head_office']; ?></td>
						<td><?php echo $row['branch']; ?></td>
						<td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
						<td><a class="btn btn-primary" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
								<?php echo $row['status']; ?>
							</a>
							<?php include('modal_replace_status.php'); ?>
							
						<td class="center">
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>-->
							<a class="btn btn-success" href="edit_item.php<?php echo '?emp_id='.$id; ?>">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
							<a class="btn btn-danger" href="#delete1<?php echo $id;?>" data-toggle="modal" data-target="#delete1<?php echo $id;?>">
								<i class="glyphicon glyphicon-trash icon-white"></i>
							</a>
							<?php include('modal_delete_item.php'); ?>
						</td>
					</tr>
							<?php } ?>
					</tbody>
					</table>
				
                <!-- end content here -->
            </div>
        </div>
    </div>
</div><!--/row-->



<?php include('footer.php'); ?>
