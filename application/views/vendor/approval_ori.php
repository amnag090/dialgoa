<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor Register Approval
            <small></small>
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">

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
                                            Pending
                                        <?php elseif($vendor->status==1): ?>
                                            Approved
                                        <?php elseif($vendor->status==-1): ?>
                                            Rejected
                                        <?php endif; ?>
                                    </td>
                                    <th>
                                        <a href="<?php print site_url('vendor/edit/'.$vendor->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                                        &nbsp;&nbsp;
                                        <a href="#modal-vendor-delete" data-vendorid="<?php print $vendor->id; ?>" class="btn btn-danger btn-vendor-delete" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                        &nbsp;&nbsp;
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div id="modal-vendor-delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4>Are you Sure want to Delete?</h4>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" id="frm-vendor-delete" action="<?php print site_url('vendor/delete'); ?>">
                                        <input type="hidden" name="vendorId" value="" id="inpt-vendor-delete-id"/>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
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