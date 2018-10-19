<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin Profile</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->

              <h3 class="profile-username text-center"><?php print $this->session->userdata('admin')->name; ?></h3>

              <p class="text-muted text-center"><?php print $this->session->userdata('admin')->email; ?></p>
              
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
              <li><a href="#changepass" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Success!</h4> Group has been updated.
                </div>
                <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i>Warning!</h4>Note that you are required to Logout and Login again once you update Admin City for session to work properly.
                    <span id="message-alert-error"></span>
                </div>
                <form class="form-horizontal" id="frmAdminCity">
                  <?php /*<div class="form-group" id="frmAdminCityFrmBody">
                    <label for="inputName" class="col-sm-2 control-label">Admin City</label>

                    <div class="col-sm-10">
                     <select class="form-control" id="txt-city" name="city" >
                          <option value="0">Select City</option>
                          <?php 
                          foreach ($cities as $eachcity) {
                              ?>
                              <option value="<?php print $eachcity->id; ?>" <?php echo ((isset($userCityId)) && $userCityId == $eachcity->id)? "selected='selected'":''; ?>>
                                  <?php print $eachcity->name; ?>
                              </option>
                              <?php
                              }
                          ?>
                      </select>
                    </div>
                                  
                  </div> */ ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </form>
                
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              <div class="tab-pane" id="changepass">
                <form class="form-horizontal" id="frmAdminChangePass">
                  <div class="alert alert-success alert-dismissible" id="palert-success" style="display:none;">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4><i class="icon fa fa-check"></i>Success!</h4> Password has been updated.
                  </div>
                  <div class="alert alert-danger alert-dismissible" id="palert-error" style="display:none;">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4><i class="icon fa fa-warning"></i>Warning!</h4>
                      <span id="pmessage-alert-error"></span>
                  </div>
                  <div class="form-group" id="frmAdminChangePassBody">
                    
                      <div class="form-group">
                        <label for="oldpassword" class="col-sm-4 control-label">Old Password</label>

                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="oldpassword" placeholder="oldpassword">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="newpassword" class="col-sm-4 control-label">New Password</label>

                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="newpassword" placeholder="newpassword">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirmpass" class="col-sm-4 control-label">Confirm New Password</label>

                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="confirmpass" placeholder="confirmpass">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->