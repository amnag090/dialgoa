<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			App Users
			<small>Users who have installed the app</small>
		</h1>
	</section>
	
	<!-- Main content -->
	<section class="content">
		
		<div class="row">
			<div class="col-xs-12">	
				<div class="box">
					<?php /*<div class="box-header">
						<div class="pull-left">
							<a class="btn btn-primary btn-flat" href="<?php print site_url('users/add'); ?>"><i class="fa fa-plus"></i> Add New User</a>
						</div>
					</div>*/ ?>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th>UserId</th>
									<th>Name</th>
									<th>Email</th>
									<th>About</th>
									<th>User Since</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($users AS $user): ?>
									<tr>
										<td><?php print $user['id']; ?></td>
										<td><?php print $user['name'] ?></td>
										<td><?php print $user['email'] ?></td>
										<td><?php print $user['aboutMe']; ?></td>
										
										<td><?php print date('m-d-Y',strtotime($user['createdAt'])); ?></td>
										<td>
											<a href="<?php print site_url('users/edit/'.$user['id']); ?>" title="View/Edit User details"><i class="fa fa-edit"></i></a>
											&nbsp;&nbsp;
											<a href="javascript:void(0)" onclick="deleteUser(<?php print $user['id']; ?>)" title="Delete User"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>	
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade in bs-example-modal-lg" id="user-delete-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" action="<?php print site_url('users/deleteuser'); ?>" id="frm-user-delete">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h3 class="modal-title" id="pointsModalLabel">Delete User</h3>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger alert-dismissible modal-form-error" style="display: none;">
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
						<h4><i class="icon fa fa-warning"></i>Error!</h4>
						<span class="modal-form-error-alert"></span>
					</div>
					<p>Are you sure you want to delete this user?</p>
				</div>
				<div class="modal-footer">
					<input name="userId" id="userId" type="hidden" value=""/>
					<button type="submit" class="btn btn-danger pull-left">Delete</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
		
</script>