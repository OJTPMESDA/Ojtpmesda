$(document).ready(function(){
	$(document).on('submit', '.evaluation-form', function(e) {

		e.preventDefault();
		
		var f = $(this);
		var b = clickedButton;
		var t = b.text();
		var dt = b.data('type');

		$.ajax({
			type: f.attr('method'),
			url: f.attr('action'),
			data: f.serialize(),
			dataType: 'json',
			beforeSend: function() {
				b.attr('disabled', true);
				b.html('loading...');
			},
			success: function(res) {
				if (res.status) {
					b.removeAttr('disabled');
					b.html('Submit');

					if (res.action == 'redirect') {
	                    setTimeout(function() {
	                        window.location = res.url;
	                    }, 1000);
		            }
				}
			}
		});
	});

	$(document).on('submit', '.sign-up-form', function(e) {
		e.preventDefault();
		var f = $(this);
		_form(f);
	});

	$(document).on('submit', '.login-form', function(e) {
		e.preventDefault();
		var f = $(this);
		_form(f);
	});

	$(document).on('submit', '.deployment-form', function(e) {
		e.preventDefault();
		var f = $(this);
		_form(f);
	});

	$(document).on('submit', '.change-password', function(e) {
		e.preventDefault();
		var f = $(this);
		_form(f);
	});
});