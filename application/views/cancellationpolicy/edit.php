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

	<div class="alert alert-dismissible" id="div-cancpolicy-edit-alert" style="display: none;"></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form role="form" id="frm-cancpolicy-edit" method="POST" action="<?php print site_url('CancellationPolicy/update'); ?>">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Between</label>
									<input class="form-control" name="cancel_from" value="<?php print $policy->between; ?>" disabled="" type="number">
								</div>
							</div>
							<div class="col-lg-4">
								
								<div class="form-group">
									<label>And</label>
									<input class="form-control" name="cancel_to" disabled="" type="number" value="<?php print $policy->and; ?>">
								</div>
							</div>
							<div class="col-lg-4">								
								<div class="form-group">
									<label>Charges (%)</label>
									<input class="form-control" name="cancel_charges" type="number" value="<?php print $policy->charge; ?>" step=".01">
								</div>
							</div>
							<div class="row">
								<div class=" col-md-offset-5 col-md-3">
									<input name="policy_id" type="hidden" value="<?php print $policy->id; ?>">
									<input name="update" value="Update" class="btn btn-success" type="submit">
									&nbsp;&nbsp;
									<input name="" value="Cancel" class="btn btn-success" onclick="location.replace('<?php print site_url('CancellationPolicy'); ?>');" type="button">
								</div>
							</div>							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>