<?php 
require('header.php'); ?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Users" class="well top-block" href="user.php">
            <i class="glyphicon glyphicon-user blue"></i>
							<?php
							$result = mysqli_query($con,"SELECT * FROM user");
							$num_rows = mysqli_num_rows($result);
							?>
            <div>Total Users</div>
            <div><?php echo $num_rows; ?></div>
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Clients" class="well top-block" href="client1.php">
            <i class="glyphicon glyphicon-user"></i>
							<?php
							$result = mysqli_query($con,"SELECT * FROM client");
							$num_rows1 = mysqli_num_rows($result);
							?>
            <div>Total Clients</div>
            <div><?php echo $num_rows1; ?></div>
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Employees" class="well top-block" href="item.php">
            <i class="glyphicon glyphicon-user"></i>
							<?php
							$result = mysqli_query($con,"SELECT * FROM employee");
							$num_rows2 = mysqli_num_rows($result);
							?>
            <div>Total Employee</div>
            <div><?php echo $num_rows2; ?></div>
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Orders" class="well top-block" href="release.php">
            <i class="  glyphicon glyphicon-shopping-cart"></i>
							<?php
							$result = mysqli_query($con,"SELECT * FROM tbl_order_items  ");
							$num_rows3 = mysqli_num_rows($result);
							?>
            <div>Total Orders</div>
            <div><?php echo $num_rows3; ?></div>
        </a>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Delivered Orders" class="well top-block" href="recieved2.php">
            <i class="  glyphicon glyphicon-shopping-cart"></i>
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM recieved  ");
                            $num_rows4 = mysqli_num_rows($result);
                            ?>
            <div>Delivered Orders</div>
            <div><?php echo $num_rows4; ?></div>
        </a>
    </div>
	
     <div class="col-md-2 col-sm-2 col-xs-5" style="margin-left:20px;">
        <a data-toggle="tooltip" title="Total of Revenue Amount" class="well top-block" href="revenue.php">
            
                            <?php
                            $sum=0;
                            $result = mysqli_query($con,"SELECT * FROM `tbl_order_items` ");
                          while($sum1 = mysqli_fetch_assoc($result))
                          {
                            $sum2=$sum1['price'];

                             $sum += $sum2;
                         }
                            ?>
            <div>Total Revenue</div>
            <div><i style="font-size: 20px;" class="fa fa-inr"></i><?php echo $sum; ?></div>
        </a>
    
        <a data-toggle="tooltip" title="Total of Tax Amount" class="well top-block" href="tax.php">
            
                            <?php
                            $sum=0;
                            $result = mysqli_query($con,"SELECT * FROM `tbl_order_items` ");
                          while($tax = mysqli_fetch_assoc($result))
                          {
                            $tax1=$tax['tax_amount'];

                             $sum += $tax1;
                         }
                            ?>
            <div>Total Tax Amount</div>
            <div><i style="font-size: 20px;" class="fa fa-inr"></i><?php echo $sum ; ?></div>
        </a>
    </div>
    
</div>
<?php require('footer.php'); ?>
