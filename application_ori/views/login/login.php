<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>DIALGOA</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php print base_url('bootstrap/css/bootstrap.min.css'); ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php print base_url('font-awesome/css/font-awesome.min.css'); ?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php print base_url('dist/css/AdminLTE.css'); ?>">
		<link rel="stylesheet" href="<?php print base_url('dist/css/sb-admin-2.css'); ?>">
		<!-- iCheck -->
	
		<link rel="shortcut icon" type="image/x-icon" href="<?php print base_url('favicon.ico');?>">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <!-- <h3 style="text-align:center">Vendor Admin Login</h3> -->
                <div class="login-panel panel panel-default">
                        
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center">Super Admin</h3>
                    </div>
                    <div class="box box-solid box-danger" id="box-login-error" style="display:none;">
						<div class="box-header">
							<h3 class="box-title" id="login-error-message"></h3>
						</div><!-- /.box-header -->
					</div>
                    <div class="panel-body">
                        <form role="form" id="frm-login" method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-3">
                                            <img src="<?php print base_url('images/logo-name.png'); ?>" style="display: block;margin-left: auto;margin-right: 5px;margin-top: 25px;" alt="Smiley face" height="60" width="60"> 

                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email" type="email" id="txt-email" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password" id="txt-password" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me">Keep Me Logged In
                                            </label>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-lg btn-danger btn-block ">Login</button>
                                        <div style="text-align: center" >
                                            <a href="<?php print site_url('login/forgotpassword'); ?>" >Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:center;margin-bottom:0px;width: 100%">
                &copy; All rights reserved DIALGOA
            </div>
    </div>
		<!-- /.login-box -->
		
		<!-- Modal -->
		<!--<div class="modal fade" id="forgotPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="frm-forgotpass">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
						</div>
						<div class="modal-body">
							<div class="box-header">
								<h3 class="box-title">Enter your email and your password will be reset and emailed to you.</h3>
							</div>
							<div class="box-body">
								<div class="alert alert-success" id="alert-forgotpass-success" style="display:none;">
									<h4><i class="icon fa fa-check"></i>Success!</h4>
									Your password has been reset and emailed to you.
								</div>
								<div class="alert alert-danger" id="alert-forgotpass-error" style="display:none;">
									<h4><i class="icon fa fa-warning"></i>Error!</h4>
									<span id="message-alert-error">Your password could not be reset. Please check email and retry</span>
								</div>
								<div class="form-group has-feedback">
									<input type="email" class="form-control" placeholder="Email" name="forgotemail" id="txt-forgotpass-email" required>
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Reset Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>-->
		
<?php /*
		<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
  */ ?>
		
		<!-- jQuery 2.2.3 -->
		<script src="<?php print base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php print base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
		<!-- iCheck -->
		<script src="<?php //print base_url('plugins/iCheck/icheck.min.js'); ?>"></script>

		<script src="<?php print base_url('dist/js/sb-admin-2.js'); ?>"></script>

		<script src="<?php print base_url('js/login.js'); ?>"></script>
	</body>
</html>
