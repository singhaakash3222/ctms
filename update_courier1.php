
<?php 
include 'dbcon.php';
session_start();
if(isset($_POST['update']))
{
			include 'dbcon.php';
			$cid=$_POST['cid'];
			$status=$_POST['routes'];
			

			
$sql1=" SELECT * FROM `destinations` WHERE `rid` = '$status' ";
           $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
         while( $rws1=  mysqli_fetch_assoc($result1)){
    			$route=$rws1['route'];


  
			$sql=" SELECT * FROM Courier".$cid." ";
           $result=mysqli_query($con,$sql) or die(mysqli_error($con));
         while( $rws=  mysqli_fetch_assoc($result)){
           $cid1=$rws['courierid'];
       
          $s_name=$rws['sname'];
         
          $source=$rws['source'];

          $s_contact=$rws['s_contact'];
           $r_contact=$rws['r_contact'];

          $r_name=$rws['rname'];
          
          $destination=$rws['destination'];
         
         

          
}}

      $r="selected";
       $sql1=" INSERT INTO Courier".$cid."(`courierid`,  `sname`, `source`, `s_contact`, `rname`, `destination`, `r_contact`, `status`, `route`) VALUES ('$cid','$s_name','$source','$s_contact','$r_name','$destination','$r_contact','$route','$r')";
			mysqli_query($con,$sql1) or die(mysqli_error($con));
			
			
          
			?>
			<script type="text/javascript">
				alert('status updated');
				
				 window.location='updatestatus2.php<?php echo '?cidc='.$cid; ?>'; 
			</script>
			<?php
					
}
	


elseif(isset($_POST['update1'])){
			include 'dbcon.php';
			$cid=$_POST['cid1'];
			$dest=$_POST['dest'];
			echo "$cid";
			




  
			$sql=" SELECT * FROM Courier".$cid." ";
           $result=mysqli_query($con,$sql) or die(mysqli_error($con));
         while( $rws=  mysqli_fetch_assoc($result)){
           $cid1=$rws['courierid'];
        
          $s_name=$rws['sname'];
         
          $source=$rws['source'];

          $s_contact=$rws['s_contact'];
          $r_name=$rws['rname'];
        
          $destination=$rws['destination'];
          $r_contact=$rws['r_contact'];
        
}
	$sql1=" INSERT INTO Courier".$cid."( `courierid`, `sname`, `source` ,`s_contact`, `rname`, `destination`, `r_contact`,  `status`) VALUES ('$cid','$s_name', '$source','$s_contact','$r_name','$destination','$r_contact','$dest')";
			mysqli_query($con,$sql1) or die(mysqli_error($con));
			
			
          
			?>
			<script type="text/javascript">
				alert('status updated');
				 window.location='updatestatus2.php<?php echo '?cidc='.$cid; ?>';
			</script>




			<?php
}

elseif(isset($_POST['update2'])){
include 'dbcon.php';
			$cid=$_POST['cid1'];
			$status=$_POST['city1'];
			
			

    			
  
			$sql=" SELECT * FROM Courier".$cid." ";
           $result=mysqli_query($con,$sql) or die(mysqli_error($con));
         while( $rws=  mysqli_fetch_assoc($result)){
           $cid1=$rws['courierid'];
         
          $s_name=$rws['sname'];
        
          $source=$rws['source'];

          $s_contact=$rws['s_contact'];
          $r_name=$rws['rname'];
        
          $destination=$rws['destination'];
          $r_contact=$rws['r_contact'];
         
}


      
       $sql1=" INSERT INTO Courier".$cid."( `courierid`, `sname`, `source` ,`s_contact`, `rname`, `destination`, `r_contact`,  `status`) VALUES ('$cid','$s_name', '$source','$s_contact','$r_name','$destination','$r_contact','$status')";
			mysqli_query($con,$sql1) or die(mysqli_error($con));
			
			
        
			?>
			<script type="text/javascript">
				alert('status updated');
				 window.location='reciever.php<?php echo '?cid='.$cid; ?>';
			</script>
			<?php
					}
	?><?php

?>