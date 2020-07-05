$(document).ready( function () {

	if ($('div').hasClass('student-dtr')) {
		_dtrCalendar()
	}
});

function _dtrCalendar() {
	var dtrCal = document.getElementById('dtr');
	calendar = new FullCalendar.Calendar(dtrCal, {
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
		},
		navLinks: true,
		dayMaxEvents: true,
		events: {
			url: base_url+'/students/my-dtr/'+jsUri(3),
			failure: function(err) {
				console.log(err)
			}
		},
	});
	calendar.render();
}