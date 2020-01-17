
<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Softex -Courier management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
  

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
 <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<?php require ('dbcon.php'); ?>
<?php require ('session.php'); ?>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>SoftEx</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
<?php
	include('dbcon.php');
	$user_query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$id_session'")or die(mysqli_error());
	$row=mysqli_fetch_array($user_query); {
?>
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $row['firstname']; ?></span>
                    <span class="caret"></span>
                </button>

<?php } ?>
                <ul class="dropdown-menu">
                    <!---<li><a href="#">Profile</a></li>
                    <li class="divider"></li>-->
                    <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts 
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
             theme selector ends -->
 <!-- add if in case
            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul> -->

        </div>
    </div>
    <!-- topbar ends -->
<?php } ?>
<div class="ch-container">
    <div class="row">
        <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="home.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-th-list"></i><span> Masterfile</span></a>
                            <ul class="nav nav-pills nav-stacked">
								<li><a class="ajax-link" href="item.php"><i class="glyphicon glyphicon-chevron-right"></i><span> Employee</span></a></li>
								<li><a class="ajax-link" href="client1.php"><i class="glyphicon glyphicon-chevron-right"></i><span> Client</span></a></li>
								<li><a class="ajax-link" href="user.php"><i class="glyphicon glyphicon-chevron-right"></i><span> Admin Account</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-th-list"></i><span> Orders</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="release.php"><i class="glyphicon glyphicon-chevron-right"></i><span> All Orders</span></a></li>
                                <li><a class="ajax-link" href="recieved2.php"><i class="glyphicon glyphicon-chevron-right"></i><span> Delivered Orders</span></a></li>
                                
                            </ul>
                        </li>
                        
                              
                                
                            
                       
                        <li class="accordion">
                            <a href="#"><i class="fa fa-inr"  style="font-size: 20px"></i><span> Change Price</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="mode.php"><i class="glyphicon glyphicon-chevron-right"></i><span> Mode Price</span></a></li>
                                <li><a class="ajax-link" href="weight.php"><i class="glyphicon glyphicon-chevron-right"></i><span>Weight Price</span></a></li>
                                <li><a class="ajax-link" href="distance.php"><i class="glyphicon glyphicon-chevron-right"></i><span>Distance price</span></a></li>
                                <li><a class="ajax-link" href="gst.php"><i class="glyphicon glyphicon-chevron-right"></i><span>Add GST</span></a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="invoice1.php"><i class=" glyphicon glyphicon-download-alt"></i><span>Invoice</span></a></li>

                         <li >
                            <a href="country.php"><i class=" fa fa-map-marker "  style="font-size: 20px"></i><span> Set Address</span></a>
                        </li>

                        <li><a class="ajax-link" href="route.php"><i class=" glyphicon glyphicon-download-alt"></i><span>Route</span></a></li>
                         <li class="accordion">
                            <a href="#"><i class="fa fa-money"  style="font-size: 20px"></i><span>REVENUE</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="revenue.php"><i class="glyphicon glyphicon-chevron-right"></i><span>Total Revenue</span></a></li>
                                <li><a class="ajax-link" href="tax.php"><i class="glyphicon glyphicon-chevron-right"></i><span>Total Tax amount</span></a></li>
                            </ul>
                                
                        </li>
                
						
						
                    <!--
					<li><a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
                        </li>
                        <li><a class="ajax-link" href="form.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Forms</span></a></li>
                        <li><a class="ajax-link" href="chart.php"><i class="glyphicon glyphicon-list-alt"></i><span> Charts</span></a>
                        </li>
                        <li><a class="ajax-link" href="typography.php"><i class="glyphicon glyphicon-font"></i><span> Typography</span></a>
                        </li>
                        <li><a class="ajax-link" href="gallery.php"><i class="glyphicon glyphicon-picture"></i><span> Gallery</span></a>
                        </li>
                        <li class="nav-header hidden-md">Transaction</li>
                        <li><a class="ajax-link" href="table.php"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
					-->
                    <!--
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="calendar.php"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>
                        <li><a class="ajax-link" href="grid.php"><i
                                    class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="tour.php"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                        <li><a class="ajax-link" href="icon.php"><i
                                    class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="error.php"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="login.php"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
					-->
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

  <!--      <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>-->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php } ?>
