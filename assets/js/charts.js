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
				title: "Attendance",
				width: 70,
				padAngle: .1
			}
		});
}

if ($('div').hasClass('ojt-hours')) {
	var chart = c3.generate({
			bindto: '#dounut',
			data: {
				url: base_url+'/students/reports/ojt-hours/'+jsUri(3),
				mimeType: 'json',
				type : 'donut'
			},
			donut: {
				title: "OJT Hours",
				width: 70,
				padAngle: .1
			}
		});
}

if ($('div').hasClass('requirements')) {
	c3.generate({
		bindto: '#requirements',
		data: {
			x: 'label',
			url: base_url+'/summary/report',
			mimeType: 'json',
			type : 'bar'
		},
		size: {
			height: 400
		},
		axis: {
            x: {
                type: 'category',
            	height: 50
            }
        },
		grid: {
			x: {
				show: !0
			},
			y: {
				show: !0
			}
		}
	});
}