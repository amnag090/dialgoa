<div id="page-wrapper" style="min-height: 399px;">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="page-header">Fleet Management</h4>
        </div>
        <div class="col-lg-6">
            <a style="float: right;margin-top: 52px;" href="<?php print site_url('FleetManagement/add'); ?>" class="btn btn-success">Add Fleet</a>
        </div>
    </div>
    <div class="alert alert-dismissible" id="div-fleetmgt-list-alert" style="display: none;"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form  method="post" id="frm-fleet-status" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Action</label>
                                <select class="form-control" name="fare_status" id="sel-fleetmgt-action">
                                    <option value=" " disabled="" selected="">Select</option>
                                    <option value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input name="activate" value="Apply" class="btn btn-success"  id="btn-fleetmgt-action" style="margin-top:25px;" type="submit">
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover " id="datatable-listFleet"  width="100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;"><input name="chk[]"  id="chk-fleetmgt-list-head" type="checkbox">&nbsp;&nbsp;Mark All</th>
                                <th>Registration No</th>
                                <th>Owner Name</th>
                                <th>Vehicle Name</th>
                                <th>Seating Capacity</th>
                                <th>self drive</th>
                                <th>Vacinity</th>
                                <th>Ac</th>
                                <th>Carrier</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $i => $row) : ?>
                                <tr>
                                    <td><div class="checkbox "><label><input name="chk[]" value="<?php print $row->id; ?>" class="chk-fleetmgt-row" type="checkbox"></label></div></td>
                                    <td><?php print $row->registration_no; ?></td>
                                    <td><?php print $row->owner_name; ?></td>
                                    <td><?php print $row->manufacture_company . " " . $row->name; ?></td>
                                    <td><?php print $row->id; ?></td>
                                    <td><?php ($row->self_drive == '1') ? print 'Yes' : print 'No' ?></td>
                                    <td><?php ($row->vacinity == '1') ? print 'Local' : print 'Outstation' ?></td>
                                    <td><?php ($row->ac == '1') ? print 'Yes' : print 'No' ?></td>
                                    <td><?php ($row->carrier == '1') ? print 'Yes' : print 'No' ?></td>
                                    <td>
                                        <?php 
                                        if ($row->status == '1')
                                            print 'A';
                                        elseif ($row->status == '0')
                                            print 'D';
                                        ?>
                                    </td>   
                                    <td>
                                        <a href="<?php print site_url('FleetManagement/edit/' . $row->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                                        &nbsp;&nbsp; 
                                        <a href="#modal-fleet-delete" id="fleet-delete" data-fleetid="<?= $row->id ?>" class="btn btn-danger btn-fleet-delete" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-fleet-delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4>Are you Sure want to Delete?</h4>
				</div>
				<div class="modal-footer">
					<form method="post" id="frm-fleet-delete" action="<?php print site_url('FleetManagement/delete'); ?>">
						<input type="hidden" name="fleetId" id="inpt-fleet-delete-id"/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>										
					</form>
				</div>
			</div>
		</div>
</div>