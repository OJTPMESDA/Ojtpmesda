if ($('div').hasClass('donut-chart')) {
	var chart = c3.generate({
			data: {
		        url: 'http://ojtpmesda.com/reports/ratings',
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
				url: 'http://ojtpmesda.com/reports/attendance',
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