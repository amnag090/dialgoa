<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Fixed points
            <small></small>
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">

    <div class="alert alert-dismissible" id="div-fixedpoint-list-alert" style="display: none;"></div>
    <?php
         if($this->session->flashdata('successMsg')){
            ?>
         <div class="alert alert-success alert-dismissible" id="alert-success"">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4> <?php echo $this->session->flashdata('successMsg'); ?>
        </div>
        <?php
        }
        if($this->session->flashdata('errorMsg')){
            ?>
        <div class="alert alert-danger alert-dismissible" id="alert-error"">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-warning"></i>Error!</h4>
            <span id="message-alert-error">Some error occured, please try again later</span>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <form  method="post" id="frm-fixedpoint-status" enctype="multipart/form-data">
                    <div class="row">
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
                            <input name="activate" value="Apply" class="btn btn-success"  id="btn-fixedpoint-action" style="margin-top:25px;" type="submit">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="<?php print site_url('fixedpoints/addnew'); ?>"><i class="fa fa-plus"></i> Add Point</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <table class="table table-bordered table-striped datatable">
						<thead>
							<tr>
								<th>												 
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
                                <th style="width: 65px;">Action</th>
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
									<td><?php print ($eachFixedPoint['status'] == 0)? '<small class="label pull-right bg-red">Deactivated</small>':'<small class="label pull-right bg-green">Activated</small>'; ?></td>
									<td>
                                        <a href="<?php print site_url('fixedpoints/edit/'.$eachFixedPoint['id']); ?>" title="View/Edit fixedpoints" class='btn btn-primary'><i class="fa fa-edit"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="#modal-fixedpoint-delete" data-fixedpointid="<?php print $eachFixedPoint['id']; ?>" class="btn btn-danger btn-fixedpoint-delete" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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
</div>