<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Cancellation Policy
			<small></small>
		</h1>
	</section>
	
	<!-- Main content -->
	<section class="content">

	<div class="alert alert-dismissible" id="div-cancpolicy-list-alert" style="display: none;"></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form id="frm-cancpolicy-new" action="<?php print site_url('CancellationPolicy/savenew'); ?>" method="post">
						<div class="row">
							<div class="col-lg-4">
								
								<div class="form-group">
									<label>Between  </label>
									<input name="cancel_from-readonly" class="form-control" value="<?php print $between; ?>" disabled="disabled" required="" type="number">
									<input name="cancel_from" value="<?php print $between; ?>" type="hidden">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>And </label>
									<input class="form-control" name="cancel_to" required="" type="number">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Charges (%) </label>
									<input class="form-control" name="cancel_charges" required="" type="number" step=".01">
								</div>
							</div>
						</div>
						<div class="row">
							<div class=" col-md-offset-5 col-md-3">
								<input value="Save" class="btn btn-success" type="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" id="datatable-cancpolicy" width="100%">
						<thead>
							<tr>
								<th>Between</th>
								<th>And</th>
								<th>Charges (%)</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($canPolicies AS $i=>$row): ?>
								<tr>
									<td><?php print $row->between; ?></td>
									<td><?php print $row->and; ?></td>
									<td><?php print $row->charge; ?></td>
									<th>
										<a href="<?php print site_url('CancellationPolicy/edit/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;
										<a href="#modal-cancpolicy-delete" data-policyid="<?php print $row->id; ?>" class="btn btn-danger btn-cancpolicy-delete" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
									</th>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<div id="modal-cancpolicy-delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<h4>Are you Sure want to Delete?</h4>
								</div>
								<div class="modal-footer">
									<form method="post" id="frm-cancpolicy-delete" action="<?php print site_url('CancellationPolicy/delete'); ?>">
										<input type="hidden" name="policyId" value="" id="inpt-cancpolicy-delete-id"/>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--//row-->
	</section>
</div>