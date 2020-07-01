var chart = c3.generate({
	data: {
		columns: [
			["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
			["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
			["setosa", 30],
		],
		type : 'donut',
			onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
			onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
			onclick: function (d, i) { console.log("onclick", d, i, this); },
			order: null // set null to disable sort of data. desc is the default.
		},
		axis: {
			x: {
				label: 'Sepal.Width'
			},
			y: {
			labelabel: 'Petal.Width'
			}
		},
		donut: {
			title: "Iris Petal Width",
			width: 70,
			padAngle: .1
		}
	});