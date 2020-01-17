<?php include('header.php'); ?>


<div>
    <ul class="breadcrumb">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="#">All Courier Orders</a>
        </li>
        <a class="btn btn-warning " title="tax pdf file" style="margin-left: 800px" href="invoice2.php">
                <i class="glyphicon  glyphicon-download-alt"></i>
              </a>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-info-sign"></i> All Courier Orders</h2>

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
       
           <th>Date</th>
           <th>Revenue</th>
           <th>Tax</th>
          
           <th>Amount</th>
          
            <th>action</th>

					</tr>
					</thead>
					<tbody>
							<?php
							$result= mysqli_query($con,"SELECT * FROM `tbl_order_items` ORDER BY `order_id`  DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['order_id'];
							
					?>
						<td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['sname']; ?></td>
            <td><?php echo $row['scity']; ?></td>
            <td><?php echo $row['rname']; ?></td>
            <td><?php echo $row['rcity']; ?></td>
            
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['tax_amount']; ?></td>
            
            <td><?php echo $row['total_amount']; ?></td>
						<td class="center">
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>-->
							<a class="btn btn-success" href="edit_tax.php<?php echo '?cid='.$id; ?>">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
              <a class="btn btn-primary" href="invoice.php<?php echo '?cid='.$id; ?>">
                <i class="glyphicon  glyphicon-download-alt"></i>
              </a>
							
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
