		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		
		<script src="https://d3js.org/d3.v5.min.js" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>assets/dist/output.min.js"></script>
		<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/locales-all.min.js"></script>
		<script type="text/javascript">
			$(document).ready( function () {
			    $('.confim-list').DataTable({
			    	"ordering": false
			    });

			    var calendarEl = document.getElementById('dtr');
				var calendar = new FullCalendar.Calendar(calendarEl, {
					headerToolbar: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
					},
					validRange: {
						start: new Date(),
						end: '2020-09-04'
					},
					navLinks: true,
					dayMaxEvents: true,
					events: {
						url: base_url+'/students/my-dtr/'+jsUri(3),
						failure: function(err) {
							alert(err)
						}
					},
				});
				calendar.render();
			});
		</script>
	</body>
</html>