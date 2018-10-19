<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Vendor Register Approval
            <small></small>
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">

    <div class="alert" id="div-vendor-edit-alert" style="display: none;"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="POST" id="frm-vendor-edit" action="<?php print site_url('vendor/update'); ?>">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Registered Business Name</label>
                                    <input class="form-control" placeholder="Registered Business Name" name="reg_business_name" type="text" value="<?php print $vendor->name; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Business License Number</label>
                                    <input class="form-control" placeholder="Business License Number" name="reg_license_num" type="text" value="<?php print $vendor->license_number; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Company Type</label>
									<select  class="form-control" name="reg_company_type" required>
                                        <?php foreach($busTypes AS $bt): ?>
                                            <option value="<?php print $bt->id; ?>" <?php print ($vendor->business_type==$bt->id)?'selected=="selected"':''; ?>><?php print $bt->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Referral Fied</label>
                                    <select  class="form-control" name="reg_referral_field" required>
                                        <?php foreach($referals AS $rt): ?>
                                            <option value="<?php print $rt->id; ?>" <?php print ($vendor->referal_type==$rt->id)?'selected=="selected"':''; ?>><?php print $rt->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Owner Name</label>
                                    <input class="form-control" placeholder="Owner Name" name="reg_owner_name" type="text" value="<?php print $vendor->owner_name; ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" autofocus required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Primary Contact no</label>
                                    <input class="form-control" placeholder="Primary Contact no" name="reg_primary_num" type="text" pattern="[0-9]+" oninvalid="setCustomValidity('Please enter a valid number (Numbers only)')" onchange="try{setCustomValidity('')}catch(e){}" value="<?php print $vendor->phone1; ?>" autofocus required>
                                </div>
                            </div>                    
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Secondary Contact no</label>
                                    <input class="form-control" placeholder="Secondary Contact no" name="reg_secondary_num" type="text" value="<?php print $vendor->phone2; ?>" pattern="[0-9]+" oninvalid="setCustomValidity('Please enter a valid number (Numbers only)')" onchange="try{setCustomValidity('')}catch(e){}" autofocus required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" placeholder="Address" name="reg_address" type="text" autofocus required><?php print $vendor->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="Email" name="reg_email" type="email"  value="<?php print $vendor->email; ?>" autofocus required>
                                </div>
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
                        </div>
                        <div class="row">
                            <div class=" col-md-offset-4 col-md-5">
                                <input type="hidden" name="reg_vendor_id" value="<?php print $vendor->id; ?>">                                
              
                              	<?php if($vendor->status != 1): ?>
                                	<input type="button" name="approve"  onclick="vendorStatusUpdate(<?php print $vendor->id; ?>, 'Approved');" value="Approve" class="btn btn-primary">
                                	&nbsp;&nbsp;
                            	<?php endif; ?>
                              	<?php if($vendor->status != -1): ?>
                                	<input type="button" name="reject" onclick="vendorStatusUpdate(<?php print $vendor->id; ?>, 'Rejected');" value="Reject" class="btn btn-danger">
                                	&nbsp;&nbsp;
                            	<?php endif; ?>
                                <input type="submit" name="update" value="Update" class="btn btn-success">
                                &nbsp;&nbsp;
                                <input name="" type="button" value="Cancel" class="btn btn-success" onClick="location.replace('<?php print site_url('vendor/approval'); ?>');" class="btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </section>
</div>