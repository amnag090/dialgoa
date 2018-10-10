
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Fixed points
			<small>Add new or view existing Fixed points</small>
		</h1>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="alert alert-dismissible" id="div-fixedpoint-list-alert" style="display: none;"></div>
		<div class="row">
			<div class="col-xs-12">	
				<div class="box">
					<form  method="post" id="frm-fixedpoint-status" enctype="multipart/form-data">
					<div class="box-header">
						<div class="col-lg-2">
                            <div class="form-group">
                                <label>Action</label>
                                <select class="form-control" name="point_status" id="point_status">
                                    <option value=" " disabled selected >Select</option>
                                    <option  value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>                          
                            </div>

                        </div>
                         <div class="col-lg-2">
                                     <input type="submit"   name="activate" value="Apply" class="btn btn-success" style="margin-top:25px;">     
                                </div>
						<div class="pull-right">
							<a class="btn btn-success btn-flat" href="<?php print site_url('fixedpoints/addnew'); ?>"><i class="fa fa-plus"></i> Add Point</a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Success!</h4> New Point has been saved
                        </div>
                        <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4><i class="icon fa fa-warning"></i>Error!</h4>
                            <span id="message-alert-error">New Point has been saved</span>
                        </div>
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th style="width: 100px;">												 
                                        <INPUT type="checkbox"  id="checkAllFixedPoints" name="checkAllFixedPoints" />&nbsp;&nbsp;<label for="checkAllFixedPoints">Mark All</label>
                                    </th>
                                    <th>Id</th>
                                    <th>City (From)</th>
									<th>Address (From)</th>
                                    <th>City (To)</th>
									<th>Address (To)</th>
                                    <th>Distance (KM)</th>
                                    <th>Duration (Minutes)</th>
									<th>Activated / Deactivated</th>
                                    <th >Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
									foreach($fixedpoints AS $eachFixedPoint): ?>
									<tr>
										<td><INPUT type="checkbox" class="fixedpoints" name="fixedpoints[]" value="<?php print $eachFixedPoint['id']; ?>" /></td>
										<td><?php print $eachFixedPoint['id']; ?></td>
										<td><?php print $eachFixedPoint['start_city_name']; ?></td>
										<td><?php print $eachFixedPoint['start_addr']; ?></td>
										<td><?php print $eachFixedPoint['end_city_name']; ?></td>
										<td><?php print $eachFixedPoint['end_addr']; ?></td>
										<td><?php print $eachFixedPoint['distance']; ?></td>
										<td><?php print $eachFixedPoint['duration']; ?></td>
										<td><?php print ($eachFixedPoint['status'] == 0)? 'Deactivated':'Activated'; ?></td>
										<td>
											<a href="<?php print site_url('fixedpoints/edit/'.$eachFixedPoint['id']); ?>" title="View/Edit fixedpoints" class='btn btn-primary'><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a href="#modal-fixedpoint-delete" data-fixedpointid="<?php print $eachFixedPoint['id']; ?>" class="btn btn-danger btn-fixedpoint-delete" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
										</td>
										
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
					</form>
				</div>
			</div>
		</div><!--//row-->
		
		<div id="modal-fixedpoint-delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<h4>Are you Sure want to Delete?</h4>
					</div>
					<div class="modal-footer">
						<form method="post" id="frm-fixedpoint-delete" action="<?php print site_url('fixedpoints/delete'); ?>">
							<input type="hidden" name="fixedpointId" value="" id="inpt-fixedpoint-delete-id"/>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>										
						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

