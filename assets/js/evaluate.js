$(document).ready(function(){
	$(document).on('submit', '.evaluation-form', function(e) {

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
				b.html('loading...')
			},
			success: function(res) {
				if (res.status) {
					b.removeAttr('disabled');
					b.html('Submit')
				}
			}
		});
	});
});