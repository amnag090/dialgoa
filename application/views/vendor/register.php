<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vendor Admin Registration </title>
    
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
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center">Register</h3>
                    </div>
                    <div class="box box-solid box-danger" id="box-error" style="display: none">
                        <div class="box-header">
                            <h3 class="box-title" id="error-message"></h3>
                        </div><!-- /.box-header -->
                    </div>
                    <div class="box box-solid box-success" id="box-success" style="display: none">
                        <div class="box-header">
                            <h3 class="box-title" id="success-message">Vendor Registration successfull</h3>
                        </div><!-- /.box-header -->
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php print site_url('vendor/doregister'); ?>" id="vendor_register_form" name="vendor_register_form">
                            <fieldset>
                                <div class="form-group">
                                <label>Registered Business Name</label>
                                    <input class="form-control" placeholder="Registered Business Name" name="reg_business_name" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                <label>Business License Number</label>
                                    <input class="form-control" placeholder="Business License Number" name="reg_license_num" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Company Type</label>
                                       <select class="form-control" name="reg_company_type" required="">
                                                <option value="" disabled="" selected="">Select Company Type</option>
                                                <?php foreach($busTypes AS $bt): ?>
                                                    <option value="<?php print $bt->id; ?>"><?php print $bt->title; ?></option>
                                                <?php endforeach; ?>
                                        </select>    
                                </div>
                                <div class="form-group">
                                    <label>Referral Fied</label>
                                    <select class="form-control" name="reg_referral_field" required="">
                                            <option value="" disabled="" selected="">Select</option>
                                            <?php foreach($referals AS $rt): ?>
                                                <option value="<?php print $rt->id; ?>"><?php print $rt->title; ?></option>
                                            <?php endforeach; ?>
                                    </select>										
                                </div>
                                <div class="form-group">
                                <label>Owner Name</label>
                                    <input class="form-control" placeholder="Owner Name" name="reg_owner_name" type="text" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" autofocus required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label>Primary Contact no</label>
                                            <input class="form-control" placeholder="Primary Contact no" name="reg_primary_num" type="text" pattern=".{10}" oninvalid="setCustomValidity('Please enter a valid number (10 Numbers only)')" onchange="try{setCustomValidity('')}catch(e){}" autofocus required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Secondary Contact no</label>
                                                <input class="form-control" placeholder="Secondary Contact no" name="reg_secondary_num" type="text" pattern=".{10}" oninvalid="setCustomValidity('Please enter a valid number (10 Numbers only)')" onchange="try{setCustomValidity('')}catch(e){}" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label>Address</label>
                                    <textarea class="form-control" placeholder="Address" name="reg_address" autofocus required></textarea>
                                </div>
                                <div class="form-group">
                                <label>Email</label>
                                    <input class="form-control" placeholder="Email" name="reg_email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Services provided</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="taxi">Taxi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="self_drive">Self Drive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class=" col-md-offset-5 col-md-3">          
									<input type="submit" name="submit" value="Register"  class="btn btn-success d" > 
								</div>
                            </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="<?php print base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php print base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('#vendor_register_form').submit(function(){
                $('#box-error, #box-success').hide();

                $.ajax({
                    type:'post',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    dataType:'json',
                    success:function(resp){

                        if(resp.error){
                            $('#error-message').html(resp.message);
                            $('#box-error').show();
                        } else {

                            $('#box-success').show();
                        }
                    },
                    error:function(){
                        $('#error-message').html("Network error, please try again or contact support.");
                        $('#box-error').show();
                    }
                });


                return false;
            });
        });
    </script>

</body>

</html>