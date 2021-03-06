<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php print base_url('bootstrap/css/bootstrap.min.css'); ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php print base_url('dist/css/AdminLTE.min.css'); ?>">
		<!-- iCheck -->
		<link rel="stylesheet" href="<?php print base_url('plugins/iCheck/square/blue.css'); ?>">
		<link rel="shortcut icon" type="image/x-icon" href="<?php print base_url('favicon.ico');?>">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="">
					<img src="<?php print base_url('images/logo-name.png'); ?>" alt="Food App"/>
				</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Access denied !!!</p>
				
				<div class="box box-solid box-danger" id="box-login-error" style="display:block;">
					<div class="box-header">
						<h1 class="box-title" id="login-error-message">!!!!!!!!!!!!!!!Caution!!!!!!!!!!!!!</h1>
						<h3 class="box-title" id="login-error-message">TRying to Login more the 3 times will delete all the data from database without any notice. </h3>
					</div>
					<div class="box-header">
						<h3 class="box-title" id="login-error-message">This is may be due to unpaid dues, please pay your dues immediately. </h3>
					</div><!-- /.box-header -->
				</div>
				
			</div>
			<!-- /.login-box-body -->
			
		</div>
		<!-- /.login-box -->
		
		
		
		
		<!-- jQuery 2.2.3 -->
		<script src="<?php print base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php print base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
		<!-- iCheck -->
		<script src="<?php print base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
		<script src="<?php print base_url('js/login.js'); ?>"></script>
	</body>
</html>
