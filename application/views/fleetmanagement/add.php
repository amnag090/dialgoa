<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Fleet <small></small></h1>
    </section>
        <section class="content">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" id="vehicle_form" href="#add_fleet">Vehicle</a></li>
            <li><a data-toggle="tab" id="multimedia_form" href="#multimedia">Multimedia</a></li>
            <li><a data-toggle="tab" href="#tariff">Tariff</a></li>
            <li><a data-toggle="tab" href="#availability">Availability</a></li> 
        </ul>

        <div class="alert alert-dismissible" id="div-fleet-new-alert" style="display: none;"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <div class="tab-content">                        
                        <form role="form" method="POST" action="<?php print site_url('FleetManagement/save'); ?>" id="frm-fleet-new" name="fleet_form" enctype="multipart/form-data">
                        <div id="add_fleet" class="tab-pane fade in active">
                            <div class="row">
                                <input name="vendor_admin_id" value="2" type="hidden">
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Owner Name:</label>
                                        <input  class="form-control" name="owner_name"  autocomplete="off" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Number:</label>
                                        <input class="form-control" name="registration_no"  autocomplete="off"  type="text" required>
                                    </div>
                                </div>

                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Office:</label>
                                        <input  class="form-control" name="registration_office"  autocomplete="off"  type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                    <label>Manufacture Date:</label>
                                    <input data-provide="datepicker" class="form-control" id="date" name="manufacture_date" data-date-format="dd/mm/yyyy" autocomplete="off"  type="text" readonly="readonly"/>
                                    </div>
                                </div> 
                              
                            </div>

                            <div class="row">
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Manufacture Name:</label>
                                        <input  class="form-control"  name="manufacture_company" autocomplete="off"  type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Vehicle Name:</label>
                                        <input  class="form-control" name="vehicle_name" autocomplete="off"  type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Seating Capacity:</label>
                                        <select name="seating_capacity" class="form-control" required>
                                        <?php for($i=1;$i<=10;$i++):?>
                                        
                                            <option value="<?php print $i; ?>"> <?= $i?></option>

                                         <?php endfor;?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Vehicle Type</label>
                                        <select name="vehicle_id" class="form-control" required>
                                            <option value="" disabled="" selected="">Select Vehicle</option>
                                            <?php foreach($vehicleTypes as $type): ?>
                                                <option value="<?php print $type->id; ?>"><?php print $type->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>
    
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label >Chassis Number:</label>
                                        <input  class="form-control" name="chassis_no" autocomplete="off" type="text" required>
                                    </div>
                                </div>
                             <div class="col-lg-6">
                                 <div class="col-lg-3 ">
                                         <label for="selfdrive">Self Drive</label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="selfdrive"  type="radio" required>Yes</label></div>
    
                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="selfdrive"  type="radio" required>No</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                  <div class="col-lg-3">
                                         <label>AC </label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="ac"  type="radio" required>AC</label></div>

                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="ac"  type="radio" required>NonAC</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                 <div class="col-lg-3">
                                         <label>Carrier </label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="carrier"  type="radio" required>Yes</label></div>
                                            
                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="carrier"  type="radio" required>No</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                 <div class="col-lg-3">
                                        <label>Vacinity</label>
                                        <div class="row radio-group">
                                            <div class="col-lg-6">
                                                <div class="radio"><label> <input class="chk-fare-days" value="1" name="vacinity"  type="radio" required>Local</label></div>
                                          
                                                <div class="radio"><label> <input class="chk-fare-days" value="0" name="vacinity"  type="radio" required>Outstation</label></div>
                                            </div>
                                         
                                        </div>
                                </div>

                            </div>
                              
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Fuel Type</label>
                                        <select name="fuel_type" class="form-control" required>
                                            <option hidden value="" disabled="" selected="">Select Fuel type</option>
                                            <option value="0" >Petrol</option>
                                            <option value="1" >Diesel</option>
                                            <option value="2" >CNG</option>  
                                        </select> 
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                            <br>
                            </div>
                                     
                            <div class="row">
                                <div class=" col-md-offset-5 col-md-3">
                                    <input name="" value="Cancel" class="btn btn-success" onclick="location.replace('<?php print site_url('FleetManagement'); ?>');" type="button">
                                    
                                    <input name="submit" value="Next" class="btn btn-success" type="submit">
                                </div>
                                
                                
                            </div>
                        </div>
                        <div id="multimedia" class="tab-pane fade">
                           <div class="row">
                               <div class="form-group col-md-3 space" >
                                   <label>
                                       Vehicle Images
                                   </label>
                                   <input name="vehicle_images[]" id="vehicle_images" type="file" multiple="" accept="image/*" />
                               </div>
                           </div>
                           
                           <div class="row">
                               <div class="form-group col-md-3 space">
                                   <label>
                                       Vehicle Videos
                                   </label>
                                   <input name="vehicle_videos[]" id="vehicle_videos" type="file" multiple="" accept="video/*" />
                               </div>


                           </div>
                        </div>  
                        <div id="tariff" class="tab-pane fade">
                            <p> gtdfgd</p>
                        </div>
                        <div id="availability" class="tab-pane fade">
                            <p> aaagtdfgd</p>
                        </div>
                        </form>
                        </div>

  
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </section>
</div>