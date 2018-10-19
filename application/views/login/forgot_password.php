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
                        <!-- <h3 class="panel-title" style="text-align:center">Please Sign In</h3> -->
                        <img src="<?php print base_url('images/logo-name.png'); ?>" style="display: block;margin-left: auto;margin-right: auto;z-index: 1;" alt="Smiley face" height="60" width="60"> 
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-success" id="alert-forgotpass-success" style="display:none;">
                            <h4><i class="icon fa fa-check"></i>Success!</h4>
                            Your password has been reset and emailed to you.
                        </div>
                        <div class="alert alert-success" id="alert-forgotpass-error" style="display:none;">
                            <h4><i class="icon fa fa-check"></i>Success!</h4>
                            Your password has been reset and emailed to you.
                        </div>
                        <form id="frm-forgotpass">
                            
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="forgotemail" type="forgotemail" autofocus>
                                </div>
                                <!-- <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Keep Me Logged In
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-danger btn-block">Reset Password</button>
                                <!-- <a href="register.php" class="btn btn-lg btn-success btn-block">Register</a> -->
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

   <script src="<?php print base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php print base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php //print base_url('plugins/iCheck/icheck.min.js'); ?>"></script>

    <script src="<?php print base_url('dist/js/sb-admin-2.js'); ?>"></script>

    <script src="<?php print base_url('js/login.js'); ?>"></script>

</body>

</html>
