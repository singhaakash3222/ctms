
<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:login.php');   
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include 'dbcon.php';
                $sql="SELECT * FROM client WHERE username='$staff_id'";
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

	td {
		border:0px green dotted;
	}
	
	
	
	td.login {
			background-color:#C0C0C0;
			padding-left:5px;
			padding-right:5px;
	}
	
	td.login_nam {
		height:30px;
		font-size:13pt;
		color:white;
		background-color:teal;
		padding-left:5px;
        text-align: center;

	}
	td.new {
		height:30px;
		font-weight:none;
		font-size:11pt;
	}
	
	a {
		color:#999933;
	}.txt1{
        
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
    .p{
        color: black;
    }
    .b{
        margin-top: 0px;
    }
	


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftEx - Courier Management System</title>
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
-->
    </style>
    <script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
    </script>
</head> 
<body> 
    
<div id="templatemo_header">
    <div id="site_title"><h2 style="text-align: center;">Welcome <?php echo $_SESSION['name1']?></h2></div>
</div>
<div id="templatemo_main">
    <div id="content"> 
		<div id="home" class="section">
        	
			<div id="home_about" class="box">
           	  <a class="txt1" href="client_logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                <p><strong>In this section, you can </br>
                  <li><a style="color: teal;font-size: 17px " href= "viewce1.php<?php echo '?cid='.$id; ?>" >1. View your orders</a></li></br>
                  <li><a style="color: teal;font-size: 17px " href="cal1.php"  >2. Check Price</a></li></br>
                  <li><a style="color: teal;font-size: 17px " href="client.php#testimonial"  >3. Track Courier</a></li></br>
                  <li><a style="color: teal;font-size: 17px " href="client.php#services"  >4. View rate table</a></li></br>
                  <li><a style="color: teal;font-size: 17px " href= "profile.php<?php echo '?cid='.$id; ?>" >5.View profile & Change Password</a></li></strong></p>
                  <p>Dedicated and reliable Courier Service system.</p>
            </div>
            
            <div id="home_gallery" class="box no_mr">
                <a href="images/gallery/01-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/01.jpg" alt="image 1" /></a>
                <a href="images/gallery/02-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/02.jpg" alt="image 2" /></a>
                <a href="images/gallery/03-l.jpg" rel="lightbox[gallery]" class="no_mr"><img src="images/gallery/03.jpg" alt="image 3" /></a>
                <div class="box home_box2 color1">
              <a href="#services1"><img src="images/Tracking.jpg" alt="Services" /></a>
            </div>
            
                <a href= "profile.php<?php echo '?cid='.$id; ?>"  class="no_mr"><img src="images/gallery/profile1.png" alt="image 6" /></a>
            </div>
            
            <div class="box home_box1 color1">
            	<a href="#services"><img src="images/ratetable.jpg" alt="Services" /></a>
            </div>
            
            <div class="box home_box1 color2">
	            <a href="#testimonial"><img src="images/testimonial.jpg" alt="Testimonial" /></a>
            </div>
            
            <div class="box home_box2 color" onclick="cal1.php">
            	<div id="addc" onclick="cal1.php">
                    <a href="cal1.php"><img src="images/4.png"></a>
   
              <div align="center" class="clear h20"></div>
                    <h3 align="center"> View Couriers</h3>
              </div>	
            </div>
            
            <div class="box home_box1 color4 no_mr">
            	<a href="#contact"><img src="images/passw.jpg" alt="Contact" /></a>
            </div>
            
               
      </div> <!-- END of home -->
       <div class="section section_with_padding" id="services1"> 
            <h2>&nbsp;&nbsp;View Courier Orders</h2>
            <div class="half left">
             <table>
             <form action="viewce1.php" method="post" style="background-color:#000000">
              <input type="hidden" name="id" >
              <input type="hidden" name="username">
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
        
        <div class="section" id="services"> 
            <h2>Rate Table</h2>
 <div style="width: 49%; height: 181.2px; background-color: lightgrey; float:right; ">
    <h3 align="center">Distance</h3>
                <div style="margin-left: 80px; margin-right: 10px; height: 80px; background-color: lightgrey;  margin-top: 10px; margin-bottom: 5px;">
            
            
            <table  cellpadding="0.5" align="center">
            <tr><td>Distance of transport:</td><td></td><td>Price ( &#x20B9;)</td></tr>
            <tr><td>0 - 100 Km:</td><td></td><td> &#x20B9;100</td></tr>
           <tr><td>100 - 200 Km:</td><td></td><td> &#x20B9;150</td></tr>
           <tr><td>200 - 500 Km:</td><td></td><td> &#x20B9;200</td></tr>
           <tr><td>500 - 1000 Km:</td><td></td><td> &#x20B9;300</td></tr>
           <tr><td>1000 Km & Above:</td><td></td><td> &#x20B9;500</td></tr>
            </table></div></div>
            <div style="width: 50%; height: 181.2px; background-color: grey; float: left; ">
                <h3 align="center">Mode</h3>
                <div style="margin-left: 80px; margin-right: 10px; height: 80px; background-color: grey;  margin-top: 10px; margin-bottom: 5px;">
            
            <table cellpadding="0.5" align="center">
            <tr><td>Mode of transport:</td><td>Price ( &#x20B9;)</td>
            </tr>
            <tr><td>Air</td><td>&#x20B9; 100</td>
            </tr>
            <tr><td>Surface</td><td>&#x20B9; 70</td>
            </tr>
            <tr><td>Water</td><td>&#x20B9; 50</td>
            </tr>
            </table></div></div>

    <div style="width: 50%; height: 237px; background-color: lightgrey; float:left; margin-top: 10px;">
        <h3 align="center">Weight</h3>
        <div style="margin-left: 80px; margin-right: 10px; height: 80px; background-color: lightgrey;  margin-top: 10px; margin-bottom: 5px;">
            <table align="center">
            <tr><td>Weight of Courier:</td><td></td><td>Price ( &#x20B9;)</td></tr>
            <tr><td>0 - 10 gram:</td><td></td><td> &#x20B9;100</td></tr>
           <tr><td>10 - 50 gram:</td><td></td><td> &#x20B9;150</td></tr>
           <tr><td>50 - 100 gram:</td><td></td><td> &#x20B9;200</td></tr>
           <tr><td>100 - 500 gram:</td><td></td><td> &#x20B9;300</td></tr>
           <tr><td>500g - 5Kg:</td><td></td><td> &#x20B9;500</td></tr>
           <tr><td>5 - 20 Kg:</td><td></td><td> &#x20B9;1000</td></tr>
           <tr><td>20Kg & Above:</td><td></td><td> &#x20B9;1500</td></tr>
            </table></div></div>
            <div style="width: 49%; height: 237px; background-color: grey; float:right; margin-top: 10px;">
                <h3 align="center">Rate Calculation</h3>
                <div style="margin-left: 10px; margin-right: 10px; height: 200px; background-color: grey; float:right; margin-top: 5px; ">
            <p class="p">Rate of Courier Delivery = Mode of Transport + Weight of courier + Distance Travelled * Number of Courier Packages</p>
            <p class="p">e.g Mode of Transport = Air
            </br> Weight of courier=0.5 gram </br>Distance Travelled = 120 Km <br> Number of Courier Packages=2</br>Rate of Courier Delivery = 100 + 100 + 150 * 2= &#x20B9; 700 </p></div>
            <a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#home" class="slider_nav_btn previous_btn">Previous</a>
            <a href="#testimonial" class="slider_nav_btn next_btn">Next</a> 

</div>

        </div> 

      <div class="section section_with_padding" id="testimonial"> 
            <h2>Track Courier</h2>
            <p>&nbsp;</p>
            <div class="clear h40"></div>
          <div class="half left">
            <table cellpadding="4" cellspacing="0" align="center" width="70%">
              <script language="JavaScript" type="text/javascript">
function validate()
  {
 if (form.Consignment.value == "" )
		 {
			alert("Consignment No is required.");
			form.track.focus( );
			return false;
		}
	}
            </script>
              <tbody>
                <tr>
                  <td class="TrackTitle" valign="top">
                    <div class="newtext" align="center"><strong> Track and Trace your Cargo/Courier <br />
                  </strong></div>
                  </td>
                </tr>
                
                
               <a href="client.php#home" class="slider_nav_btn home_btn" align><i  class="fa fa-home">Home</i>  </a>
                  <td valign="top">
                    <div align="center">
                      
                      
                      <table align='center' class='main_tab'>
                                                             
                                    
                                    <tr>
                                     <td class='login_table' align='left'>
                                        <form action='track.php' method='post' name="form" id="form">
                                       <table class="login_tab">
                                            <tr>
                                                <td colspan="2" class='login_nam' valign='middle'>Track Courier</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class='login style1'>Courier Number:</td>
                                                <td class='login'><input type='int' name='cid'> </td>
                                            </tr>
                                           
                                            
                                            <tr>
                                                <td class='login' colspan='2' align="center"><input type='submit' name='submit' value='Track Now '>
                                                  </td>
                                                <td class='new'>&nbsp;</td>
                                            </tr>
                                      </table>
                                      </form>	</td>
                                    </tr>
                                    
                                </table>
                      
                    <span class="gentxt style1">Ex: Courier Number: 12 </span> </div></td>
                </tr>
                <tr bgcolor="EFEFEF">
                  <td valign="top">&nbsp;</td>
                </tr>
                <tr bgcolor="EFEFEF">
                  <td class="TrackNormalBlue" bgcolor="#FFFFFF" valign="top">&nbsp;</td>
                </tr>
              </tbody>
            </table>
            <p>&nbsp;</p>
        </div>
          <div class="half right"></div>
            <div class="clear h40"></div>
        <div class="half left"></div>
          <div class="half right">
            <p><a href="#home" class="slider_nav_btn home_btn">home</a> 
              <a href="#services" class="slider_nav_btn previous_btn">Previous</a>
              <a href="#contact" class="slider_nav_btn next_btn">Next</a>      </p>
        </div>
                    
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
	 <td class='login_table' align='left'><form action='changepass.php' method='post'>
	  <table class="login_tab">	
	 <td class='login_table' align='left'><form action='logging.php' method='post'>
	
			<tr>
				<td colspan="2" class='login_nam' valign='middle'>Change Password</td>
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
				<td class='login' colspan='2' align="center">
                    <input type='submit' name='submit' value='Change' required="">
				  </td>
                
			</tr>
	  </table>
	  </form>	</td>
	</tr>
	
</table>
              
            </div>
            
            <div class="half right">
                <h4>Mailing Address</h4>
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
    Copyright © 2018 <a href="#">SoftLife Technology<a href="#" target="_parent"></a>
</div>

</body> 
</html>