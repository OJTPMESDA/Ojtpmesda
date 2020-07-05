$(document).ready(function() {

	if (jsUri(1) == 'register') {
		$('#username').change(function(){
			var username = $('#username').val();
			if (username != '')  {
				$.ajax({
					url:base_url+"/availability",
					method:"POST",
					data: {username:username},
					beforeSend:function(){
						$('.text-username').remove();
					},
					success:function(res){
						$('#username').parents('.form-group').append(res);
					}
				});
			}
		});
	}

});