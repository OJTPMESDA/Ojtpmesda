$(document).ready(function() {

	$('#username').change(function(){
		var email = $('#email').val();
		if (email != '')  {
			$.ajax({
				url:base_url+"/availability",
				method:"POST",
				data: {email:email},
				success:function(data){
					$('#email_result').html(data);
				}
			});
		}
	});
	
});