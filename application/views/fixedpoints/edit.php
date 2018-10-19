<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Point
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form method="post" id="frm-fixedpoint-edit" enctype="multipart/form-data">
                    <div class="box ">
                        <div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Success!</h4> Point has been updated
                        </div>
                        <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4><i class="icon fa fa-warning"></i>Error!</h4>
                            <span id="message-alert-error">Point has been updated</span>
                        </div>
                        <div class="box-body">
                           
                           <div class="row">
                                 <div class="col-lg-12">
                                    <div class="panel panel-default">        
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                             
                                                    <div class="form-group">
                                                            <label>From City</label>
                                                       
                                                            <select class="form-control" id="pointc_from" name="pointc_from" required>
                                                                <option value="" disabled selected>Select City</option>
                                                                <?php 
                                                                foreach ($cities as $eachCity) {
                                                                    $selected = ($fixedpoints['start_city'] == $eachCity['id'])? "selected='selected'":'';
                                                                    ?>
                                                                    <option value="<?php print $eachCity['id']; ?>" <?php echo $selected; ?>>
                                                                        <?php print $eachCity['name']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                            ?>
                                                            </select>                                            
                                                        </div>
                                                </div>
                                                <div class="col-lg-3">                         
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input class="form-control" type="text" id="point_faddress" name="point_faddress" value="<?php echo $fixedpoints['start_addr']; ?>" required>                                     
                                                        </div>
                                                </div>
                                                <div class="col-lg-3">
                                             
                                                        <div class="form-group">
                                                            <label>To City</label>
                                                         
                                                            <select class="form-control" id="pointc_to" name="pointc_to" required>
                                                                <option value="" disabled selected>Select City</option>
                                                                <?php 
                                                                foreach ($cities as $eachCity) {
                                                                    $selected = ($fixedpoints['end_city'] == $eachCity['id'])? "selected='selected'":'';
                                                                    ?>
                                                                    <option value="<?php print $eachCity['id']; ?>" <?php echo $selected; ?>>
                                                                        <?php print $eachCity['name']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                            ?>
                                                            </select> 
                                                        </div>
                                                </div>      
                                                
                                                <div class="col-lg-3">                         
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input class="form-control" type="text" id="point_taddress" name="point_taddress" value="<?php echo $fixedpoints['end_addr']; ?>" required>                                     
                                                        </div>
                                                </div>                              
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">                       
                                                    <div class="form-group">
                                                        <label>Distance (KM)</label>
                                                        <input class="form-control" type="number" id="point_distance" name="point_distance" value="<?php echo $fixedpoints['distance']; ?>" required>                                     
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">                             
                                                    <div class="form-group">
                                                        <label>Duration (Minutes)</label>
                                                        <input class="form-control" placeholder="Minutes" type="number" id="point_duration" name="point_duration" value="<?php echo $fixedpoints['duration']; ?>" required>                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class=" col-md-offset-5 col-md-3">
                                                    <input type="hidden" name="fixedpointId" id="fixedpointId" value="<?php print $fixedpoints['id']; ?>" />       
                                                        <input type="submit" name="submit" value="Update"  class="btn btn-success d" >  
                                                        &nbsp;&nbsp;<input name="" type="button" value="Cancel" class="btn btn-success" onClick="location.replace('<?php print site_url('fixedpoints'); ?>');" class="btn btn-default">                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                       
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
