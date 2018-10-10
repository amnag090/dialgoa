<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            App Users
            <small>Add new App user</small>
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4> New User has been saved
        </div>
        <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-warning"></i>Error!</h4>
            <span id="message-alert-error">New plan has been saved</span>
        </div>        
        <div class="container">  
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                  <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Step 1</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Step 2</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Step 3</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Step 4</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                    <p>Step 5</p>
                  </div>
                </div>
              </div>
              
              <form role="form" action="<?php print site_url('users/savenew'); ?>" id="frmuser-add" method="post">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-6 col-md-offset-3">
                        <div class="col-md-12">
                            <h3> Step 1</h3>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input  maxlength="100" type="text" class="form-control" placeholder="Enter username" id="frmuser-add-username" name="username" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group input-group-sm">
                                    <input class="form-control" type="text" class="form-control" placeholder="Enter Password" id="frmuser-add-password" name="password" required="required">
                                    <span class="input-group-btn">
                                        <button id="frmuser-add-genpassword" type="button" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i> Generate</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input maxlength="100" type="email" class="form-control" placeholder="Enter Email" id="frmuser-add-email" name="email" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter First Name" id="frmuser-add-firstname" name="firstname" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter Last Name" id="frmuser-add-lastname" name="lastname" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select id="frmuser-add-gender" name="gender" class="form-control" required="required">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-6 col-md-offset-3">
                        <div class="col-md-12">
                            <h3> Step 2</h3>
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter Address" id="frmuser-add-address" name="address"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Country</label>
                                <select id="frmuser-add-country" name="country" class="form-control" placeholder="Select Country" required="required">
                                    <?php foreach($countries as $country): ?>
                                        <option value="<?php print $country->id; ?>" <?php print ($country->id==111)?'selected="selected"':''; ?>><?php print $country->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <select id="frmuser-add-city" name="city" class="form-control" placeholder="Select City" required="required">
                                    <option value="">Select City</option>
                                    <?php foreach($cities as $city): ?>
                                        <option value="<?php print $city->id; ?>"><?php print $city->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of Birth</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter Date od birth" id="frmuser-add-dob" name="dob"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter Phone Number" id="frmuser-add-phonenumber" name="phonenumber" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-6 col-md-offset-3">
                        <div class="col-md-12">
                            <h3> Select your Morph Type</h3>
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <?php foreach($morphes AS $eachMorphe): ?>
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3><?php print $eachMorphe['name']; ?></h3>
                                            <p><?php print $eachMorphe['description']; ?></p>
                                        </div>
                                        <div class="icon">
                                            <img src="<?php print $this->config->item('morpheWebPath').$eachMorphe['image']; ?>" width="80px">
                                        </div>
                                        <a href="#" class="small-box-footer"> <label><input type="radio" name="morphtype" id="frmuser-add-morphtype" value="<?php print $eachMorphe['id']; ?>" required="required" /> Select <?php print $eachMorphe['name']; ?></label></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-4">
                    <div class="col-xs-6 col-md-offset-3">
                        <div class="col-md-12">
                            <h3> What is your Lifestyle?</h3>
                            <div class="col-lg-12 col-xs-12">
                                <?php foreach($lifestyles AS $eachLifestyle): ?>
                                <div class="col-md-12">
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title"><?php print $eachLifestyle['name']; ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body text-center">
                                      <p><?php print $eachLifestyle['description']; ?></p>
                                    </div>
                                    <div class="box-body text-center">
                                        <div class="icon">
                                            <img src="<?php print $this->config->item('lifestyleWebPath').$eachLifestyle['image']; ?>" width="80px">
                                        </div>
                                    </div>
                                    <div class="box-body text-center">
                                      <a href="#" class="small-box-footer"><label><input type="radio"  name="lifestyle" id="frmuser-add-lifestyle" value="<?php print $eachLifestyle['id']; ?>" required="required" /> Select <?php print $eachLifestyle['name']; ?></label></a>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                  <!-- /.box -->
                                </div>
                                <br/>
                                    <?php /*<div class="small-box box box-success">
                                        <div class="inner">
                                            <h3><?php print $eachLifestyle['name']; ?></h3>
                                            <p><?php print $eachLifestyle['description']; ?></p>
                                        </div>
                                        <div class="icon">
                                            <img src="<?php print $this->config->item('lifestyleWebPath').$eachLifestyle['image']; ?>" width="80px">
                                        </div>
                                        <a href="#" class="small-box-footer"><label><input type="radio"  name="lifestyle" id="frmuser-add-lifestyle" value="<?php print $eachLifestyle['id']; ?>" required="required" /> Select <?php print $eachLifestyle['name']; ?></label></a>
                                    </div>*/ ?>
                                <?php endforeach; ?>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-5">
                    <div class="col-xs-12 ">
                        <div class="col-md-12">
                            <h3> Choose Plan</h3>
                            <?php foreach($plans AS $eachPlan): ?>
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?php print $eachPlan['name'].'('.$eachPlan['cost'].')'; ?></h3>
                                        <p><?php print $eachPlan['duration'].' '.ucfirst($eachPlan['durationType']); ?></p>
                                        <p><?php print $eachPlan['description']; ?></p>
                                    </div>
                                    <a href="#" class="small-box-footer"> <label><input type="radio"  name="plan" id="frmuser-add-plan" value="<?php print $eachPlan['id']; ?>" required="required"/> Select <?php print $eachPlan['name']; ?></label></a>
                                </div>
                            <?php endforeach; ?>
                            <input class="btn btn-primary btn-lg pull-right" type="submit" name="submit" id="frmuser-add-submit" value="Submit"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


