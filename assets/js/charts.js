if ($('div').hasClass('donut-chart')) {
	var chart = c3.generate({
			data: {
		        url: base_url+'/students/reports/ratings/'+jsUri(3),
				mimeType: 'json',
		        type: 'donut'
		    },
			donut: {
				title: "Rating",
				width: 70,
				padAngle: .1
			}
		});
}
if ($('div').hasClass('second-donut-chart')) {
	var chart = c3.generate({
			bindto: '#bar-chart',
			data: {
				url: base_url+'/students/reports/attendance/'+jsUri(3),
				mimeType: 'json',
				type : 'donut'
			},
			donut: {
				title: "OJT Statistic",
				width: 70,
				padAngle: .1
			}
		});
}