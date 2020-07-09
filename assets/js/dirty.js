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

	$(document).on('keyup','.workhours', function(e){
		var id = $(this).data('id');
		var hours = $(this).val();
		if (hours != '') {
			if ( e.which === 13) {
				_workHours(hours, id);
			}
		}
	});

	$(document).on('click','.submit-dtr', function(e){
		var id = $('.workhours').data('id');
		var hours = $('.workhours').val();
		if (hours != '') {
			if ( e.which === 13) {
				_workHours(hours, id);
				$('.dtr-footer').remove();
			}
		}
	});

});

function _workHours(hours, id) {
	$.ajax({
		type: 'POST',
        url: base_url+'/student/add/dtr',
        data: { hours: hours, id: id},
        beforeSend: function() {
        	$('.workhours').attr('disabled','disabled');
        	$('.submit-dtr').attr('disabled','disabled');
        },
        success: function(res) {
        	$('.workhours').removeAttr('disabled');
			$('.submit-dtr').removeAttr('disabled');
        	$('.workhours').val('');
    		calendar.destroy();
    		_dtrCalendar()
        }
	});
}