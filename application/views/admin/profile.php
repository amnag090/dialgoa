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
               <img class="profile-user-img img-responsive img-circle" width="120px" height="120px" src="<?php print $this->config->item('adminPhotosWebPath').$userdata['profilePic']; ?>" alt="User profile picture">


              <h3 class="profile-username text-center"><?php print $userdata['firstName'].' '.$userdata['lastName']; ?></h3>

              <p class="text-muted text-center"><?php print $userdata['email'];; ?></p>
              
             
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
              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
              <li><a href="#changepass" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                <div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Success!</h4> Profile has been updated.
                </div>
                <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i>Warning!</h4>Some error occured.
                    <span id="message-alert-error"></span>
                </div>
                <form class="form-horizontal" id="frmuserdataProfile" method="post">
                   
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input maxlength="100" type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php print $userdata['email']; ?>" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter name" id="firstName" name="firstName" value="<?php print $userdata['firstName']; ?>" required="required"/>
                            </div>
                             <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input maxlength="200" type="text" class="form-control" placeholder="Enter name" id="lastName" name="lastName" value="<?php print $userdata['lastName']; ?>" required="required"/>
                            </div>
                           
                           
                            <br/>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="file-photofile">Photo</label>
                                <div class="col-sm-10">
                                    <img src="<?php //print $this->config->item('userdataWebPath').$userdata['userdata_logo']; ?>" width="300px" >

                                    <input type="file" placeholder="Photo" id="file-photofile" name="photofile" accept="image/*" value="<?php //print $userdata['userdata_logo']; ?>"/>
                                </div>
                            </div>
                            

                            <input type="hidden" name="adminid" id="adminid" value="<?php print $userdata['id']; ?>" />
                            <input type="hidden" id="oldemail" name="oldemail" value="<?php print $userdata['email']; ?>"/>
                            <input type="hidden" name="oldimage" id="oldimage" value="<?php print $userdata['profilePic']; ?>" />
                           
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                             <input class="btn btn-primary btn-lg pull-right" type="submit" name="submit" id="frmuser-add-submit" value="Submit"/>
                          </div>
                        </div>
                </form>
                
              </div>
              <!-- end pane 1 -->
              <!-- start pane 2 -->
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