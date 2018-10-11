var baseUrl = 'http://localhost:8888/dialgoa-mvc/index.php/';
// var baseUrl = 'https://httest.in/dialgoa-mvc/index.php/';
//var baseUrl = 'http://34.216.213.132/dialgoa/index.php/';
$(function () {
	


	$('#frm-login').on('submit',function(ev){
		console.log('logiin');
		$('#box-login-error').hide();
		$.post(baseUrl+'login/logincheck',$("#frm-login").serialize(), function(resp){
			if(resp.error){
				$('#login-error-message').text(resp.message);
				$('#box-login-error').show();
			} else {
				window.location = "home";
			}
		}, 'jsonp');
		
		return false;
	});


	$('#frm-forgotpass').on('submit',function(ev){
		alert('test');
		$('#alert-forgotpass-success, #alert-forgotpass-error').hide();
		$.post(baseUrl+'login/resetpass',$('#frm-forgotpass').serialize(), function(resp){
			if(resp.error){
				$('#alert-forgotpass-success').show();
			} else {
				$('#alert-forgotpass-error').show();
			}
		},'json');

		return false;
	});

	$('.btn').on('click', function() {
	    var $this = $(this);
	  $this.button('loading');
	    setTimeout(function() {
	       $this.button('reset');
	   }, 6000);
	});

});