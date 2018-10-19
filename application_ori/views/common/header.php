<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>DIAL GOA</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php print base_url('bootstrap/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php print base_url('bootstrap/css/autosuggeststyles.css'); ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- DataTables -->
  		<link rel="stylesheet" href="<?php print base_url('plugins/datatables/dataTables.bootstrap.css'); ?>">

  		<link rel="stylesheet" href="<?php print base_url('plugins/datepicker/datepicker3.css'); ?>">


		<!-- Theme style -->
		<link rel="stylesheet" href="<?php print base_url('dist/css/AdminLTE.css'); ?>">
		<link rel="stylesheet" href="<?php print base_url('css/style.css'); ?>">
		<link rel="stylesheet" href="<?php print base_url('dist/css/sb-admin-2.css'); ?>">
		<!-- Pace style -->
  		<link rel="stylesheet" href="<?php print base_url('plugins/pace/pace.min.css'); ?>">
		<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
			page. However, you can choose any other skin. Make sure you
			apply the skin class to the body tag so the changes take effect.
		-->
		<link rel="stylesheet" href="<?php print base_url('dist/css/skins/skin-red.css'); ?>">
		<link rel="shortcut icon" type="image/x-icon" href="<?php print base_url('images/favicon.ico');?>">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      	<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini">
			<img src="<?php print base_url('images/logo-short.png'); ?>" alt="HPP" width="45"/>
		</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg">
			<img src="<?php print base_url('images/logo-small.png'); ?>" alt="HPP" width="200"/>
		</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-cart-plus fa-fw" style="color: #d9534f;"></i> <i class="fa fa-caret-down" style="color: #d9534f;"></i>
              <!--<span class="label label-success">4</span>-->
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
	                <a href="booking_cart.php">
	                    <div>
	                        <i class="fa fa-cart-plus fa-fw" style="color: #d9534f;"></i> View Cart
	                        <span class="pull-right text-muted small">4</span>
	                    </div>
	                </a>
	            </li>
	            <li class="divider"></li>
	            <li>
	                <a>
	                    <div>
	                        <i class="fa fa-archive fa-fw" style="color: #d9534f;"></i> Archive Cart
	                        <!-- <span class="pull-right text-muted small">20</span> -->
	                    </div>
	                </a>
	            </li>
	            <li class="divider"></li>
	            <li>
	                <a href="archived_booking_listing.php">
	                    <div>
	                        <i class="fa fa-bookmark fa-fw" style="color: #d9534f;"></i> View Archived Bookings
	                        <span class="pull-right text-muted small">12 </span>
	                    </div>
	                </a>
	            </li>                        
	            <li class="divider"></li>
	            <li>
	                <a>
	                    <div>
	                        <i class="fa fa-recycle fa-fw" style="color: #d9534f;"></i> Refresh Cart
	                        
	                    </div>
	                </a>
	            </li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user fa-fw" style="color: #d9534f;"></i> <i class="fa fa-caret-down" style="color: #d9534f;"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li> -->
                <li><a href="<?php print site_url('admins/profile'); ?>"><i class="fa fa-key fa-fw" style="color: #d9534f;"></i> Change Password</a>
                </li>
                <li><a href="<?php print site_url('admins/profile'); ?>"><i class="fa fa-user fa-fw" style="color: #d9534f;"></i> Manage Profile</a>
                </li>
				<!--
                <li><a href="sales_admin_list.php"><i class="fa fa-gear fa-fw"></i> Manage Staff User</a>
                </li>
                <li><a href="manage_tariff.php"><i class="fa fa-money fa-fw"></i> Manage Tariff Rates</a>
                </li>
				-->
                <li class="divider"></li>
			

				        <li><a href="<?php print site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw" style="color: #d9534f;"></i> Logout</a> </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="active"><a href="<?php print base_url('index.php/home'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Sales Admin</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Vendor Admin</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Manage Fixed Point</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Manage Point to Point</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
