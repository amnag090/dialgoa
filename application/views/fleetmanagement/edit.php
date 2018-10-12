<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Fleet <small></small></h1>
    </section>
        <section class="content">
        <div class="alert alert-dismissible" id="div-fleet-edit-alert" style="display: none;"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php print site_url('FleetManagement/saveedit'); ?>" id="ffrm-fleet-edit" name="fleet_form">
                            <div class="row">
                                <input name="vendor_admin_id" value="2" type="hidden">
                                <input name="vehicle_id" value=" <?=$vehicle[0]->id ?>" type="hidden">

                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Owner Name:</label>
                                        <input  class="form-control" name="owner_name" value="<?=$vehicle[0]->owner_name?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Number:</label>
                                        <input class="form-control" name="registration_no" value="<?=$vehicle[0]->registration_no?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>

                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Office:</label>
                                        <input  class="form-control" name="registration_office" value="<?=$vehicle[0]->registration_office?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Manufacture Date:</label>
                                        <input data-provide="datepicker" class="form-control" name="manufacture_date" value="<?php print date('d/m/Y', strtotime($vehicle[0]->manufacture_date)); ?>" data-date-format="dd/mm/yyyy" autocomplete="off" required="" type="text">
                                    </div>
                                </div> 
                              
                            </div>

                            <div class="row">
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Manufacture Name:</label>
                                        <input  class="form-control"  name="manufacture_company" value="<?=$vehicle[0]->manufacture_company?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Vehicle Name:</label>
                                        <input  class="form-control" name="vehicle_name" value="<?=$vehicle[0]->name; ?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Seating Capacity:</label>
                                        <select name="seating_capacity" class="form-control" value="<?=$vehicle[0]->seating_capacity?>" required="">
                                        <?php for($i=1;$i<=10;$i++):?>
                                            <option value="<?php print $i; ?>"> <?= $i?></option>
                                         <?php endfor;?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Vehicle Type</label>
                                        <select name="vehicle_type" class="form-control"  required="" value="<?= $vehicle[0]->vehicle_type?>">
                                            <option value="" disabled="">Select Vehicle</option>
                                            <?php foreach($vehicleTypes as $type): ?>
                                                    <?php if($type->id == $vehicle[0]->vehicle_type):?>
                                                    <option value="<?php print $type->id; ?>" selected="selected"><?php print $type->title; ?></option>
                                                    <?php else: ?>
                                                <option value="<?php print $type->id; ?>"><?php print $type->title; ?></option>
                                                    <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label >Chassis Number:</label>
                                        <input  class="form-control" name="chassis_no" value="<?=$vehicle[0]->chassis_no?>" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                             <div class="col-lg-6">
                                 <div class="col-lg-3 ">
                                         <label for="selfdrive">Self Drive</label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="selfdrive" required="" type="radio" <?php   echo ($vehicle[0]->self_drive==1) ? 'checked' :  ''; ?>>Yes</label></div>
                                             
                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="selfdrive" required="" type="radio"  <?php  echo  ($vehicle[0]->self_drive==0) ?  'checked' : ''; ?>>No</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                  <div class="col-lg-3">
                                         <label>AC </label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="ac" required="" type="radio" <?php echo ($vehicle[0]->ac==1)  ? 'checked' :  ''; ?>>AC</label></div>
                                           
                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="ac" required="" type="radio" <?php echo ($vehicle[0]->ac==0)  ? 'checked' :  ''; ?>>NonAC</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                 <div class="col-lg-3">
                                         <label>Carrier </label>
                                         <div class="row radio-group">
                                             <div class="col-lg-6">
                                                 <div class="radio"><label> <input class="chk-fare-days" value="1" name="carrier" required="" type="radio" <?php echo ($vehicle[0]->carrier==1)  ? 'checked' :  ''; ?>>Yes</label></div>
                                            
                                                 <div class="radio"><label> <input class="chk-fare-days" value="0" name="carrier" required="" type="radio" <?php echo ($vehicle[0]->carrier==0)  ? 'checked' :  ''; ?>>No</label></div>
                                             </div>
                                          
                                         </div>
                                 </div>
 
                                 <div class="col-lg-3">
                                        <label>Vacinity</label>
                                        <div class="row radio-group">
                                            <div class="col-lg-6">
                                                <div class="radio"><label> <input class="chk-fare-days" value="1" name="vacinity" required="" type="radio" <?php echo ($vehicle[0]->vacinity==1)  ? 'checked' :  ''; ?>>Local</label></div>
                                                <div class="radio"><label> <input class="chk-fare-days" value="0" name="vacinity" required="" type="radio" <?php echo ($vehicle[0]->vacinity==0)  ? 'checked' :  ''; ?>>Outstation</label></div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                              
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Fuel Type</label>
                                        <select name="fuel_type" id="fuel_type" class="form-control" required="">
                                            <option   value=""   disabled="">Select Fuel type</option>
                                            <option   value="0" >Petrol</option>
                                            <option  value="1" >Diesel</option>
                                            <option   value="2" >CNG</option>  
                                        </select> 
                                    </div>
                                </div>
                            </div>
                                    <script>
                                       document.getElementById('fuel_type').value = "<?= $vehicle[0]->fuel_type?>";
                                    </script>
                            <div class="row">
                            <br>
                            </div>
                                     
                            <div class="row">
                                <div class=" col-md-offset-5 col-md-3">
                                    <input name="submit" value="Save" class="btn btn-success" type="submit">
                                    &nbsp;&nbsp;
                                    <input name="" value="Cancel" class="btn btn-success" onclick="location.replace('<?php print site_url('FleetManagement'); ?>');" type="button">
                                </div>   
                            </div>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </section>
</div>