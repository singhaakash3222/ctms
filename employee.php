
<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:elogin.php');   
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include 'dbcon.php';
                $sql="SELECT * FROM employee WHERE username='$staff_id'";
                $result=  mysqli_query($con,$sql) or die(mysqli_error());
                $rws=  mysqli_fetch_array($result);
                
                $id=$rws[0];
                $name=$rws[3];
        
                
    
                $_SESSION['name1']=$name;
                $_SESSION['id']=$id;
                ?>

<!------------------------------------------>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
	body {
			background-color:#2781BA;
			background-image:url('images/bg1.gif');
			
		}
		
	table {
				border: 0px red solid;
			
				padding-top:0px;
				margin-top:0px;
				cellspacing:0px; 
				cellpadding:0px;
	}
	td {
		border:0px green dotted;
	}
	
	table.login_tab {
		background:rgba(255,255,255,0.9);
		cellspacing:0px; 
		cellpadding:0px;
		height: 50px;
	}
  .button {
    background-color: powderblue; /* Green */
    border: none;
    color: white;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {font-size: 10px;}
	
	table.main_tab {
		background:rgba(0,0,0,0);
		width:70%;
	}
	
	td.login {
			background-color:#f9f9f9;
			padding-left:5px;
			padding-right:5px;
	}
  td.login1 {
      background-color:#f9f9f9;
      padding-left:5px;
      padding-right:5px;
      border-color: black;
      bo
  }
	td.login_nam {
		height:30px;
		font-size:13pt;
		color:white;
		background-color:#3b5998;
		padding-left:5px;
	}
	td.new {
		height:30px;
		font-weight:none;
		font-size:11pt;
	}
	
	a {
		color:#999933;
		
	}
	
	.txt1{
		
		font-size: 50px;
	}
	td.marquee{
		padding-top:1px;
		padding-bottom:1px;
		padding-left:130px;
		background:rgba(0,0,0,1);
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}
	td.footer {
		background-color:#2952A3;
		background-image:url('images/tdback1.gif');
		border-top: 1px grey solid;
		color:#999933;
		text-align:center;
		font-size:8pt;
		padding-bottom:5px;
		padding-top:5px;
	}
	


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Softex - Courier Management System</title>
<meta name="keywords" content="metro, free website template, beautiful grid, image grid menu, colorful theme" />
<meta name="description" content="Metro is a free website template by templatemo.com and it features jQuery horizontal scrolling among pages." />

	<link href="templatemo_style.css" type="text/css" rel="stylesheet" /> 
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script> 
	<script type="text/javascript" src="js/jquery.localscroll-min.js"></script> 
	<script type="text/javascript" src="js/init.js"></script> 
    
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
    <script type="text/JavaScript" src="js/slimbox2.js"></script> 

    <style type="text/css">
<!--
.style1 {color: #000000}
.style2 {
	color: #000000
}

table.login_tab1 {		background:rgba(255,255,255,0.9);
		cellspacing:0px; 
		cellpadding:0px;
}

    </style>
</head> 
<body> 
<div id="templatemo_header">
    <div id="site_title">
      <h2 style="text-align: center">Welcome <?php echo $_SESSION['name1']?> </h2>
    </div>
</div>
<div id="templatemo_main">
    <div id="content"> 
		<div id="home" class="section">
        	
			<div id="home_about" class="box">
           	 <a class="txt1" href="emp_logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                <p><strong>In this section, you can </br>
                  <li><a style="color: teal;font-size: 15px "  href= "employee.php#customer" >1. View Customer Details</a></li></br>
                <li><a style="color: teal;font-size: 15px " href= "employee.php#services" >2. View Courier Orders</a></li></br>
                <li><a style="color: teal;font-size: 15px " href= "recieved.php" >3. View Reciever Details</a></li></br>
                <li><a style="color: teal;font-size: 15px " href= "test.php<?php echo '?cid='.$id; ?>" >4. Add Courier</a> </li></br>
               
                <li><a style="color: teal;font-size: 15px " href= "updatestatus2.php<?php echo '?cid='.$id; ?>" >5. Update Courier Status</a></li></br>
                <li><a style="color: teal;font-size: 15px " href= "profile1.php<?php echo '?cid='.$id; ?>" >6.  View Your Profile & change Password</a></li></br>
                
                </strong></p>
                  
            </div>
            
            <div id="home_gallery" class="box no_mr">
                <a href="register.php" ><img src="images/gallery/sign.jpg" alt="image 3" /></a>
                <a href="recieved.php" ><img src="images/gallery/recieved.png" alt="image 2" /></a>
               
                <a href= "profile1.php<?php echo '?cid='.$id; ?>"  class="no_mr"><img src="images/gallery/profile1.png" alt="image 3" /></a>
               
                <div class="box home_box2 color2"><a href="test.php<?php echo '?cid='.$id; ?>"><img src="images/gallery/addcviewc.jpg" alt="image 4" /></a></div>
                 <a href="#customer" class="no_mr"><img src="images/gallery/Customer.png" alt="image 6" /></a>
            </div>
                
                
               
            
            <div class="box home_box2 color1">
            	<a href="#services"><img src="images/Tracking.jpg" alt="Services" /></a>
            </div>
            
            
            <div class="box home_box2 color3" >
            	<div id="addc" >
                    <a href="updatestatus2.php<?php echo '?cid='.$id; ?>"><img src="images/status.jpg"></a>
   
              <div align="center" class="clear h20"></div>
                    <h3 align="center">Add and View Couriers</h3>
              </div>	
            </div>
            
            <div class="box home_box1 color4 no_mr">
            	<a href="#contact"><img src="images/passw.jpg" alt="Contact" /></a>
            </div>
            
               
      </div> <!-- END of home -->
        
        <div class="section section_with_padding" id="services"> 
            <h2>&nbsp;&nbsp;View Courier Orders</h2>
            <div class="half left">
             <table>
             <form action="viewce.php" method="post" style="background-color:#000000">
                     <tr>
                        <td width="355" colspan='2' bgcolor="#000000" class='login' align="center">
                          <button >Click here to view courier orders </button>
                       </td>
                        
                    </tr>
             </form>
             </table>   
          	</div>
            
            <div class="clear h40"></div>
            
            <div class="img_border img_fr">
          </div>
                 
			<div class="half left">                
            	
   	  	  </div>

            <a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#home" class="slider_nav_btn previous_btn">Previous</a>
            <a href="#testimonial" class="slider_nav_btn next_btn">Next</a> 

        </div> 
        <div class="section section_with_padding" id="customer"> 
            <h2>&nbsp;&nbsp;View Client Details</h2>
            <div class="half left">
             <table>
             <form action="customer.php" method="POST" style="background-color:#000000">
                     <tr>
                        <td width="355" colspan='2' bgcolor="#000000" class='login' align="center">
                         <button >Click here To See </button>
                       </td>
                        
                    </tr>
             </form>
             </table>   
          	</div>
            
            <div class="clear h40"></div>
            
            <div class="img_border img_fr">
          </div>
                 
			<div class="half left">                
            	
   	  	  </div>

            <a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#home" class="slider_nav_btn previous_btn">Previous</a>
            <a href="#testimonial" class="slider_nav_btn next_btn">Next</a> 

        </div> 
     
               <div class="section section_with_padding" id="contact"> 
            <h2>Change Password</h2> 
            <?php
            error_reporting(E_ALL & ~E_NOTICE);
            if($_SESSION['submit']==1){ echo "Password Changed !!"; $_SESSION['submit']=0;}
            ?>
          <div class="half left">
                <h4>&nbsp;</h4>
                <table width="91%" align='center' cellpadding= "0" cellspacing= "0" class='main_tab'>

	
	
	<tr>
	 <td class='login_table' align='left'><form action='changepasse.php' method='post'>
	  <table class="login_tab">	
	 <td class='login_table' align='left'>
	 
			<tr>
				<td colspan="2" class='login_nam' valign='middle' align="center">Change Password</td>
			</tr>
			<tr>
				<td class='login style1'>Username:</td>
				<td class='login'><input type='text' name='username' required=""> </td>
			</tr>
			<tr>
				<td class='login style1'>Old Password:</td>
				<td class='login'><input type='password' name='opassword' required=""> </td>
			</tr>
            <tr>
				<td class='login style1'>New Password:</td>
				<td class='login'><input type='password' name='npassword' required=""> </td>
			</tr>
          
			<tr>
				<td class='login' colspan='2' align="center"><input type='submit' name='submit' value='Change'>
			  </td>
                
			</tr>
	  </table>
	  	</td>
	</tr>
	
</table></form>
              
            </div>
            
            <div class="half right">
                <h4>You Are Here --&gt;</h4>
                <h4><br />
                </h4>
                <div class="clear h20"></div>
                <div class="img_nom img_border"><span></span>
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39665.676103141275!2d77.14489568419656!3d28.510142069310707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1e2fed1eed4b%3A0x101cd24533e257fa!2sSoftlife+Technologies+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1541058438855" width="1000" height="1000" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
			<a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#testimonial" class="slider_nav_btn previous_btn">Previous</a>
             
        </div> 
    </div> 
</div>
</div>
<div id="templatemo_footer">
    2018 &copy; Copyright <a href="http://www.softlifetechnologies.com/"> SoftLife Technoloies Pvt. ltd.</a> . All rights Reserved.</a>
</div>


</body> 
</html>
