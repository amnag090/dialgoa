//var baseUrl = 'http://localhost/dialgoa/index.php/';
// defined in the footer, using the codeignier config var baseUrl = 'https://httest.in/dialgoa-mvc/index.php/';

$(function () {
	
	$(document).ajaxStart(function() { Pace.restart(); });
		$('.datatable').DataTable({
			"lengthChange": false,
			"columnDefs": [
	    		{"orderable": false, "targets": 0},
	    		{"orderable": false, "targets": 6}
	    	]
		});
		

		$('#datatable-cancpolicy').DataTable({
			"lengthChange": false,
			"columnDefs": [{ "orderable": false, "targets": 3 }]
		});

	$('.datepicker').datepicker({autoclose: true, format:"dd/mm/yyyy"});

	

	//####################### Vendor Approval Lising page #############################
	$('#chk-vendor-list-head').change(function(){
		if($(this).is(':checked')){
            $('.vendor-list-chkbxes').prop('checked','checked');
        } else {
            $('.vendor-list-chkbxes').removeAttr('checked');
        }
	});
	
	$('.vendor-list-chkbxes').change(function(){
		if($(".vendor-list-chkbxes:not(:checked)").length == 0){
			$('#chk-vendor-list-head').prop('checked','checked');
		} else if( $('#chk-vendor-list-head').is(':checked')){
			$('#chk-vendor-list-head').removeAttr('checked');
		}		
	});

	$('.btn-vendor-delete').click(function(){
		$('#inpt-vendor-delete-id').val($(this).data('vendorid'));
	});

	$('#frm-vendor-delete').on('submit',function(){
		$('#div-vendor-list-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#modal-vendor-delete').modal('hide');
					$('#div-vendor-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#modal-vendor-delete').modal('hide');
					$('#div-vendor-list-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
					setTimeout(function(){ window.location.reload(); }, 500);
				}
			},
			error:function(){
				$('#modal-vendor-delete').modal('hide');
				$('#div-vendor-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
		
		return false;
	});

	$('#btn-vendor-action').click(function(){
		$('#div-vendor-list-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		if($('.vendor-list-chkbxes:checked').length == 0){
			$('#div-vendor-list-alert')
				.addClass( "alert-warning")
				.html("Select atleast one vendor from the list.")
				.show();

			return false;
		}

		if(!($('#sel-vendor-action').val())){
			$('#div-vendor-list-alert')
				.addClass( "alert-warning")
				.html("Select action from drop down.")
				.show();

			return false;
		}


		var vendors = []
		var action  = $('#sel-vendor-action').val();

		$('.vendor-list-chkbxes:checked').each(function(i,v){
			vendors.push(v.value);
		});

		$.ajax({
			type:'post',
			url:baseUrl + 'vendor/statuschange/',
			data:{vendors:vendors,action:action},
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-vendor-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-vendor-list-alert')
						.addClass( "alert-success")
						.html("vendors "+ action)
						.show();

					setTimeout(function(){
						window.location.reload();
					}, 500);
				}


			},
			error:function(){
				$('#div-vendor-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
	});

	$('#frm-vendor-edit').on('submit',function(){
		$('#div-vendor-edit-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-vendor-edit-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-vendor-edit-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
				}
			},
			error:function(){
				$('#div-vendor-edit-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});

		return false;
	});

	//--------------------------------------------------------------------------------------------------------------------------
	//functions to add edit change statuses of fixed points
	$('#frm-fixedpoint-addnew').on('submit',function(ev){
		var formData = new FormData();
		
		formData.append('pointc_from', $('#pointc_from').val());
		formData.append('point_faddress', $('#point_faddress').val());
		formData.append('pointc_to', $('#pointc_to').val());
		formData.append('point_taddress', $('#point_taddress').val());
		formData.append('point_distance', $('#point_distance').val());
		formData.append('point_duration', $('#point_duration').val());
		

		$('#alert-error, #alert-success').hide();
		Pace.track(function(){
			$.ajax({
				type:'post',
				url:baseUrl+'fixedpoints/savenew',
				data:formData,
				contentType: false,
				processData: false,
				dataType:'json',
				success:function(resp){
					if(resp.error){
						$('#message-alert-error').text(resp.message);
						$('#alert-error').show()
					} else {
						$('#alert-success').show();
						window.location =  baseUrl+'fixedpoints';
					}
				},
				error:function(data){
					$('#message-alert-error').text("Some error occured, please try again");
					$('#alert-error').show()
				}
			});
		});

		return false;
	});

	$('#frm-fixedpoint-edit').on('submit',function(ev){
		var formData = new FormData();
		
		formData.append('fixedpointId', $('#fixedpointId').val());

		formData.append('pointc_from', $('#pointc_from').val());
		formData.append('point_faddress', $('#point_faddress').val());
		formData.append('pointc_to', $('#pointc_to').val());
		formData.append('point_taddress', $('#point_taddress').val());
		formData.append('point_distance', $('#point_distance').val());
		formData.append('point_duration', $('#point_duration').val());

		$('#alert-error, #alert-success').hide();
		Pace.track(function(){
			$.ajax({
				type:'post',
				url:baseUrl+'fixedpoints/saveedit',
				data:formData,
				contentType: false,
				processData: false,
				dataType:'json',
				success:function(resp){
					if(resp.error){
						$('#message-alert-error').text(resp.message);
						$('#alert-error').show()
					} else {
						$('#alert-success').show();
						window.location =  baseUrl+'fixedpoints';
						//$('#frm-fixedpoint-edit').load(document.URL +  ' #frm-fixedpoint-edit');
					}
				},
				error:function(data){
					$('#message-alert-error').text("Some error occuered, please try again");
					$('#alert-error').show()
				}
			});
		});

		return false;
	});

	$("#checkAllFixedPoints").change(function(){  //"select all" change
		var status = this.checked; // "select all" checked status
		$('.fixedpoints').each(function(){ //iterate all listed checkbox items
			this.checked = status; //change ".checkbox" checked status
		});
	});

	$('#frm-fixedpoint-status').on('submit',function(ev){
		var formData = new FormData();
		
		formData.append('status', $('#point_status').val());

		jQuery("input[name^='fixedpoints']:checked").each(function(j) { 
		   formData.append('fixedpoints['+j+']', $(this).val());
		});
		
		if ($('#point_status').val() == '' || $('#point_status').val() == null) {
			alert("Please select status");
			return false;
		}

		var checkedBoxes = $('#frm-fixedpoint-status input:checked').length;

		if (!checkedBoxes) {
			alert("Please select atleast one Point");
			return false;
		}

		$('#alert-error, #alert-success').hide();
		Pace.track(function(){
			$.ajax({
				type:'post',
				url:baseUrl+'fixedpoints/updateStatus',
				data:formData,
				contentType: false,
				processData: false,
				dataType:'json',
				success:function(resp){
					if(resp.failure){
						$('#message-alert-error').text("Failed to update status");
						$('#alert-error').show()
					} else {						
						$('#div-fixedpoint-list-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
						setTimeout(function(){ window.location.reload(); }, 500);
					}
				},
				error:function(data){
					$('#message-alert-error').text("Some error occured, please try again");
					$('#alert-error').show()
				}
			});
		});

		return false;
	});

	$('.btn-fixedpoint-delete').click(function(){
		$('#inpt-fixedpoint-delete-id').val($(this).data('fixedpointid'));
		//$('#modal-cancpolicy-delete').modal('show');
	});

	$('#frm-fixedpoint-delete').on('submit',function(){
		$('#div-fixedpoint-list-alert')
				.removeClass( "alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#modal-fixedpoint-delete').modal('hide');
					$('#div-fixedpoint-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#modal-fixedpoint-delete').modal('hide');
					$('#div-fixedpoint-list-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
					setTimeout(function(){ window.location.reload(); }, 500);
				}
			},
			error:function(){
				$('#modal-fixedpoint-delete').modal('hide');
				$('#div-fixedpoint-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
		
		return false;
	});

	//end fixed point functions
	//------------------------------------------------------------------------------------------------
	

	//---------------------------------------------------------------------------------------------------
	//Cancellation Policy functions

	$('.btn-cancpolicy-delete').click(function(){
		$('#inpt-cancpolicy-delete-id').val($(this).data('policyid'));
		//$('#modal-cancpolicy-delete').modal('show');
	});


	$('#frm-cancpolicy-new').on('submit',function(){
		$('#div-cancpolicy-list-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-cancpolicy-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-cancpolicy-list-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
					setTimeout(function(){ window.location.reload(); }, 500);
				}
			},
			error:function(){
				$('#div-cancpolicy-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
		
		return false;
	});


	$('#frm-cancpolicy-edit').on('submit',function(){
		$('#div-cancpolicy-edit-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-cancpolicy-edit-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-cancpolicy-edit-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
				}
			},
			error:function(){
				$('#div-cancpolicy-edit-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
		
		return false;
	});


	$('#frm-cancpolicy-delete').on('submit',function(){
		$('#div-cancpolicy-list-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#modal-cancpolicy-delete').modal('hide');
					$('#div-cancpolicy-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#modal-cancpolicy-delete').modal('hide');
					$('#div-cancpolicy-list-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
					setTimeout(function(){ window.location.reload(); }, 500);
				}
			},
			error:function(){
				$('#modal-cancpolicy-delete').modal('hide');
				$('#div-cancpolicy-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
		
		return false;
	});
	//-----------------------------------------------------------------------------------------------------


	//------------------------- Fixed Point Fare Management --------------------------------------------------
	$('#chk-fixedptfare-list-head').change(function(){
		if($(this).is(':checked')){
            $('.chk-fixedptfare-row').prop('checked','checked');
        } else {
            $('.chk-fixedptfare-row').removeAttr('checked');
        }
	});
	
	$('.chk-fixedptfare-row').change(function(){
		if($(".chk-fixedptfare-row:not(:checked)").length == 0){
			$('#chk-fixedptfare-list-head').prop('checked','checked');
		} else if( $('#chk-fixedptfare-list-head').is(':checked')){
			$('#chk-fixedptfare-list-head').removeAttr('checked');
		}		
	});


	$('#btn-fixedptfare-action').click(function(){
		$('#div-fixedptfare-list-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		if($('.chk-fixedptfare-row:checked').length == 0){
			$('#div-fixedptfare-list-alert')
				.addClass( "alert-warning")
				.html("Select atleast one fare from the list.")
				.show();

			return false;
		}

		if(!($('#sel-fixedptfare-action').val())){
			$('#div-fixedptfare-list-alert')
				.addClass( "alert-warning")
				.html("Select action from drop down.")
				.show();

			return false;
		}


		var fares  = []
		var action = $('#sel-fixedptfare-action').val();

		$('.chk-fixedptfare-row:checked').each(function(i,v){
			fares.push(v.value);
		});

		$.ajax({
			type:'post',
			url:baseUrl + 'FixedPointFare/statuschange/',
			data:{fares:fares,action:action},
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-fixedptfare-list-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-fixedptfare-list-alert')
						.addClass( "alert-success")
						.html("vendors "+ action)
						.show();

					setTimeout(function(){
						window.location.reload();
					}, 500);
				}


			},
			error:function(){
				$('#div-fixedptfare-list-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});
	});

	$('.chk-fare-days').change(function(){
        $('.chk-fare-days').attr('required',"required");

        if($('.chk-fare-days:checked').length > 0){
        	$('.chk-fare-days').not(':checked').removeAttr('required');
        }
     });

	$('.chk-fare-days').trigger('change');


	$('#frm-fixpointfare-new').on('submit', function(){
		$('#div-fixpointfare-new-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-fixpointfare-new-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-fixpointfare-new-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
					//setTimeout(function(){ window.location.reload(); }, 500);
				}
			},
			error:function(){
				$('#div-fixpointfare-new-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});


		return false;
	});

	$('#frm-fixpointfare-edit').on('submit', function(){
		$('#div-fixpointfare-edit-alert')
				.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
				.html("")
				.hide();

		$.ajax({
			type:$(this).attr('method'),
			url:$(this).attr('action'),
			data:$(this).serialize(),
			dataType:'json',
			success:function(resp){
				if(resp.error){
					$('#div-fixpointfare-edit-alert')
						.addClass( "alert-error")
						.html(resp.message)
						.show();
				} else {
					$('#div-fixpointfare-edit-alert')
						.addClass( "alert-success")
						.html(resp.message)
						.show();
				}
			},
			error:function(){
				$('#div-fixpointfare-edit-alert')
				.addClass( "alert-error")
				.html("Error occured please try again.")
				.show();

				return false;
			}
		});


		return false;
	});
	//-------------------------------------------------------------------------------------------------------

});//end of all functions

function vendorStatusUpdate(vendorId, action){
	$('#div-vendor-edit-alert')
			.removeClass( "alert-error alert-info alert-danger alert-succes alert-warning" )
			.html("")
			.hide();

	$.ajax({
		type:'post',
		url:baseUrl + 'vendor/statuschange/',
		data:{vendors:[vendorId],action:action},
		dataType:'json',
		success:function(resp){
			if(resp.error){
				$('#div-vendor-edit-alert')
					.addClass( "alert-error")
					.html(resp.message)
					.show();
			} else {
				$('#div-vendor-edit-alert')
					.addClass( "alert-success")
					.html("vendors "+ action)
					.show();

				setTimeout(function(){
					window.location.reload();
				}, 500);
			}
		},
		error:function(){
			$('#div-vendor-edit-alert')
			.addClass( "alert-error")
			.html("Error occured please try again.")
			.show();

			return false;
		}
	});
}