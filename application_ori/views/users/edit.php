<link rel="stylesheet" href="<?php print base_url('dist/css/smoothbox.css'); ?>">
<div class="content-wrapper" style="min-height: 1170.3px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Profile
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="alert alert-success alert-dismissible" id="alert-success" style="display:none;">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4> User edit have been saved
        </div>
        <div class="alert alert-danger alert-dismissible" id="alert-error" style="display:none;">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-warning"></i>Error!</h4>
            <span id="message-alert-error"></span>
        </div>
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" 
							 src="<?php print $this->config->item('profileWebPath') . $user->profilePic; ?>" 
							 alt="<?php print $user->name . ' ' . $user->surname; ?>"
							 onerror="this.src='http://appadmin.foodporntheory.com/userprofilepics/default-male.png';"/>
						<h3 class="profile-username text-center"><?php print $user->name . ' ' . $user->surname; ?></h3>
						<p class="text-muted text-center"><?php print $user->username; ?></p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item"><b>Points</b> <a href="#" class="pull-right" data-toggle="modal"  data-target="#pointsModal" data-userid="<?php print $user->id; ?>"><?php print $user->points; ?></a></li>
							<li class="list-group-item"><b>Plan</b> <a class="pull-right"><?php print $user->planName; ?></a></li>
							<li class="list-group-item"><b>Morhp Type</b> <a class="pull-right"><?php print $user->morpheType; ?></a></li>
							<li class="list-group-item"><b>LifeStyle</b> <a class="pull-right"><?php print $user->lifestyleType; ?></a></li>
							<li class="list-group-item"><b>Email</b> <a class="pull-right"><?php print $user->email; ?></a></li>
							<li class="list-group-item"><b>Phone Number</b> <a class="pull-right"><?php print $user->phone; ?></a></li>
						</ul>
						<a href="#" data-toggle="modal" data-target="#user-edit-modal" class="btn btn-primary"><i class="fa fa-pencil"></i> <b>Update</b></a>
						<a href="#" data-toggle="modal" data-target="#user-change-password-modal" class="btn btn-warning"><i class="fa fa-key"></i> <b>Password</b></a>
						<a href="#" data-toggle="modal" data-target="#user-delete-modal" class="btn btn-danger"><i class="fa fa-trash"></i> <b>Delete</b></a>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#statistics" data-toggle="tab" aria-expanded="false">Statistics</a></li>
						<li><a href="#diary" data-toggle="tab" aria-expanded="false">Diary Entries</a></li>
						<li><a href="#questionaire" data-toggle="tab" aria-expanded="false">Questionaire</a></li>
						<li><a href="#photos" data-toggle="tab" aria-expanded="false">Photos</a></li>
						<li><a href="#planhistory" data-toggle="tab" aria-expanded="true">Plan History</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="statistics">
							<div id="statistics-graph-wrapper">
								<div class="row form-group">
									<div class="col-sm-7"></div>
									<div class="col-sm-3">
										<select class="form-control" id="statistics-chart-column" name="chartColumn">
											<optgroup>Physical Statistics</optgroup>
											<?php foreach($physicalHeaders AS $value=>$label): ?>
												<option value="<?php print $value; ?>"><?php print $label; ?></option>
											<?php endforeach; ?>
											<optgroup>Ceiling Statistics</optgroup>
											<?php foreach($ceilingHeaders AS $value=>$label): ?>
												<option value="<?php print $value; ?>"><?php print $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-2">
										<select class="form-control" id="statistics-chart-year" name="chartYear">
											<?php for($i=$year;$i>=2017;$i--): ?>
												<option value="<?php print $i; ?>"><?php print $i; ?></option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div id="div-user-statchat-wrapper"></div>
							</div>

							<br/>
							<hr/>
							<div class="row form-group">
								<div class="col-sm-10"></div>
								<div class="col-sm-2">
									<input type="text" id="statistics-month" name="months" class="form-control" value="<?php print date("M-Y",strtotime("$year-$month-1")); ?>"/>
								</div>
							</div>
							<div class="row" id="statistics-table-wrapper">
								<div class="col-sm-6">
									<div class="box-header with-border">
										<h3 class="box-title">Ceiling</h3>
            						</div>
            						<ul class="list-group list-group-unbordered">
										<?php foreach($ceilingHeaders AS $key=>$head): ?>
											<?php if(isset($statistics['ceiling']->$key)): ?>
												<li class="list-group-item"><b><?php print $head; ?></b> <a class="pull-right"><?php print $statistics['ceiling']->$key.' '.$statistics['ceiling']->units; ?></a></li>
											<?php else: ?>
												<li class="list-group-item"><b><?php print $head; ?></b> <span class="pull-right quest-not-answered">Not Updated</a></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
								<div class="col-sm-6">
									<div class="box-header with-border">
										<h3 class="box-title">Physical</h3>
            						</div>
            						<ul class="list-group list-group-unbordered">
										<?php foreach($physicalHeaders AS $key=>$head): ?>
											<?php if(isset($statistics['physical']->$key)): ?>
												<li class="list-group-item"><b><?php print $head; ?></b> <a class="pull-right"><?php print $statistics['physical']->$key.' '.$statistics['physical']->units; ?></a></li>
											<?php else: ?>
												<li class="list-group-item"><b><?php print $head; ?></b> <span class="pull-right quest-not-answered">Not Updated</a></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="diary">
							<div class="row form-group">
								<div class="col-sm-10"></div>
								<div class="col-sm-2">
									<input type="text" id="diary-month" name="months" class="form-control" value="<?php print date("M-Y",strtotime("$year-$month-1")); ?>"/>
								</div>
							</div>
							<div class="row form-group" style="overflow-x: scroll;">
								<div class="col-sm-12">
									<table class="table table-bordered table-striped no-footer" id="table-user-">
										<thead>
											<tr>
												<th>Day</th>
									
												<?php foreach(['mealBreakBB0','mealBreakBB1','mealBreakBB2','Breakfast','mealBreakAB0','mealBreakAB1','mealBreakAB2','Lunch','mealBreakAL0','mealBreakAL1','mealBreakAL2','Dinner','mealBreakAD0','mealBreakAD1','mealBreakAD2'] as $key => $hmeal): ?>
													<th>
														<?php 
															print $hmeal;
														 ?>
															
													</th>
												<?php endforeach; ?>
											</tr>
										</thead>
										<tbody>
											<?php if(count($diary)>0): ?>
												<?php foreach($diary AS $date=>$entry): ?>
													<tr>
														<td><?php print date('D d/m/Y',strtotime($date)); ?></td>
														<?php foreach(['mealBreakBB0','mealBreakBB1','mealBreakBB2','Breakfast','mealBreakAB0','mealBreakAB1','mealBreakAB2','Lunch','mealBreakAL0','mealBreakAL1','mealBreakAL2','Dinner','mealBreakAD0','mealBreakAD1','mealBreakAD2'] as $meal): 
																$lowercaseMeal = strtolower($meal);
															?>
															<td>
																<?php if(count($entry[$lowercaseMeal])>0): ?>
																	<?php foreach($entry[$lowercaseMeal] as $e): ?>
																		<?php 
																		print $entry['slotName'].'<br/>';
																		print ($e->optionType=='Food')?$e->foodName:$e->recipeName; ?><br/>
																	<?php endforeach; ?>
																<?php else: ?>
																	<span class="quest-not-answered">Not available</span>
																<?php endif; ?>
															</td>
														<?php endforeach; ?>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="4"><span class="quest-not-answered">No entries available for <?php print date("M-Y",strtotime("$year-$month-1")); ?> </span></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="questionaire">
							<div class="box-body">
								<?php foreach($questions AS $i=>$question): ?>
									<strong><?php print $question->question; ?></strong>
									<p class="text-muted" style="padding-left: 15px;"><?php print $question->answer; ?></p>
									<?php print ($i==count($questions)-1) ? '<hr>' : ''; ?>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="tab-pane" id="photos">
							<div class="box-body">
								<div class="col-sm-12 invoice-col">
			                      
			                        <?php foreach($photos AS $i=>$eachPhoto): ?>	
										<div class="col-sm-4">
				                          <a class="sb" href=<?php print $this->config->item('profileWebPath') . $eachPhoto->photo; ?>"><img class="img-responsive" style="padding:10px;" src="<?php print $this->config->item('profileWebPath') . $eachPhoto->photo; ?>" alt="Photo"></a>
				                        </div>
									<?php endforeach; ?>
			                     
			                      <!-- /.row -->
			                    </div>
							</div>
						</div>
						<div class="tab-pane" id="planhistory">
						</div>
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<div class="modal fade in bs-example-modal-lg" id="user-edit-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" action="<?php print site_url('users/saveedit'); ?>" id="frm-user-edit">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h3 class="modal-title" id="pointsModalLabel">Edit User</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-username">Username</label>
						<div class="col-sm-4">
							<input placeholder="username" id="user-edit-username" name="username" class="form-control" required="" type="text" value="<?php print $user->username; ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-firstname">First Name</label>
						<div class="col-sm-4">
							<input placeholder="firstname" id="user-edit-firstname" name="name" class="form-control" required="" type="text" value="<?php print $user->name; ?>"/>
						</div>
						<label class="col-sm-2 control-label" for="user-edit-lastname">Last Name</label>
						<div class="col-sm-4">
							<input placeholder="lastname" id="user-edit-lastname" name="surname" class="form-control" required="" type="text" value="<?php print $user->surname; ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-email">Email</label>
						<div class="col-sm-4">
							<input placeholder="email" id="user-edit-email" name="email" class="form-control" required="" type="email" value="<?php print $user->email; ?>"/>
							<input name="oldemail" type="hidden" value="<?php print $user->email; ?>"/>
						</div>
						<label class="col-sm-2 control-label" for="user-edit-phone">Phone</label>
						<div class="col-sm-4">
							<input placeholder="phone" id="user-edit-phone" name="phone" class="form-control" required="" type="text" value="<?php print $user->phone; ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-morpheTypeId ">MorpheType</label>
						<div class="col-sm-4">
							<select id="user-edit-morpheTypeId " name="morpheTypeId" class="form-control" required="">
								<?php foreach($morphes as $morph): ?>
									<option value="<?php print $morph['id']; ?>" <?php print ($morph['id']==$user->morpheTypeId)?'selected="selected"':''; ?>><?php print $morph['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<label class="col-sm-2 control-label" for="user-edit-lifestyleTypeId ">Lifestyle</label>
						<div class="col-sm-4">
							<select id="user-edit-lifestyleTypeId " name="lifestyleTypeId " class="form-control">
								<?php foreach($lifestyles AS $lifestyle): ?>
									<option id="<?php print $lifestyle['id']; ?>" <?php print ($lifestyle['id']==$user->lifestyleTypeId)?'selected="selected"':''; ?>><?php print $lifestyle['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-birthDate">Date Of Birth</label>
						<div class="col-sm-4">
							<input placeholder="birthDate" id="user-edit-birthDate" name="birthDate" class="form-control datepicker" required="" type="text" value="<?php print date("d/m/Y",strtotime($user->birthDate)); ?>">
						</div>
						<label class="col-sm-2 control-label" for="user-edit-gender">Gender</label>
						<div class="col-sm-4">
							<select id="user-edit-gender" name="gender" class="form-control" required="">
								<option value="Male" <?php print ($user->gender=="Male")?'selected="selected"':''; ?>>Male</option>
								<option value="Female" <?php print ($user->gender=="Female")?'selected="selected"':''; ?>>Female</option>
								<option value="Other" <?php print ($user->gender=="Other")?'selected="selected"':''; ?>>Other</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-countryId">Country</label>
						<div class="col-sm-4">
							<select id="user-edit-countryId" name="countryId" class="form-control" required="">
								<?php foreach($countries AS $country): ?>
									<option value="<?php print $country->id; ?>" <?php print ($country->id==$user->countryId)?'selected="selected"':''; ?>><?php print $country->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<label class="col-sm-2 control-label" for="user-edit-cityId">City</label>
						<div class="col-sm-4">
							<select id="user-edit-cityId" name="cityId" class="form-control" required="">
								<?php foreach($cities AS $city): ?>
									<option value="<?php print $city->id; ?>" <?php print ($city->id==$user->cityId)?'selected="selected"':''; ?>><?php print $city->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user-edit-address">Address</label>
						<div class="col-sm-4">
							<input placeholder="address" id="user-edit-address" name="address" class="form-control" required="" type="text" value="<?php print $user->address; ?>">
						</div>
						
					</div>					
				</div>
				<div class="modal-footer">
					<input name="userId" id="user-edit-id" type="hidden" value="<?php print $user->id; ?>"/>
					<button type="submit" class="btn btn-primary pull-left">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade in bs-example-modal-lg" id="pointsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h3 class="modal-title" id="pointsModalLabel">Point History</h3>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>			
		</div>
	</div>
</div>

<div class="modal fade in bs-example-modal-lg" id="user-change-password-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" action="<?php print site_url('users/changepassword'); ?>" id="frm-user-changepassword">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h3 class="modal-title" id="pointsModalLabel">Change User Password</h3>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger alert-dismissible modal-form-error" style="display: none;">
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
						<h4><i class="icon fa fa-warning"></i>Error!</h4>
						<span class="modal-form-error-alert"></span>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="user-edit-username">New Password</label>
						<div class="col-md-9">
							<div class="input-group input-group-sm">
								<input class="form-control" type="text" class="form-control" placeholder="Enter New Password" id="user-edit-password" name="password" required="required">
								<span class="input-group-btn">
									<button id="user-edit-genpassword" type="button" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i> Generate</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input name="userId" type="hidden" value="<?php print $user->id; ?>"/>
					<button type="submit" class="btn btn-primary pull-left">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

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
					<input name="userId" type="hidden" value="<?php print $user->id; ?>"/>
					<button type="submit" class="btn btn-danger pull-left">Delete</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

