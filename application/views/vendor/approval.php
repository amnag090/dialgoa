<div id="page-wrapper" style="min-height: 197px;">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="page-header">Vendor Register Approval</h4>
        </div>         
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->		
    <div class="alert" id="div-vendor-list-alert" style="display: none;"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Action</label>
                                <select class="form-control" name="vendor_register_status" id="sel-vendor-action">
                                    <option value="" disabled="" selected="">Select</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input name="activate" id="btn-vendor-action" value="Apply" class="btn btn-success" style="margin-top:25px;" type="submit">     
                        </div>
                    </div>

                   <table class="table table-striped table-bordered table-hover datatable" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;">
                                    <input id="chk-vendor-list-head" type="checkbox">&nbsp;&nbsp;Mark All
                                </th>

                                <th>Sr. No.</th>
                                <th>Registered Business Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>          
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vendors AS $k=>$vendor): ?>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label><input name="chk[]" class="vendor-list-chkbxes" value="<?php print $vendor->id; ?>" type="checkbox"></label>
                                        </div>
                                    </td>
                                    <td> <?php print $k+1; ?>  </td>
                                    <td><?php print $vendor->name; ?></td>
                                    <td><?php print $vendor->email; ?></td>
                                    <td><?php print $vendor->phone1; ?></td>                            
                                    <td>
                                        <?php if($vendor->status==0): ?>
                                            <small class="label pull-right bg-yellow">Pending</small>
                                        <?php elseif($vendor->status==1): ?>
                                            <small class="label pull-right bg-green">Approved</small>
                                        <?php elseif($vendor->status==-1): ?>
                                            <small class="label pull-right bg-red">Rejected</small>
                                        <?php endif; ?>
                                    </td>
                                    <th><a href="<?php print site_url('vendor/edit/'.$vendor->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;</th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <!-- /.table-responsive -->                           
                </div>
            <!-- /.panel-body -->
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.col-lg-12 -->
    </div>
</div>