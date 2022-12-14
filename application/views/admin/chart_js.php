<style type="text/css">
	<?php for ($i=1; $i < 7; $i++) { ?>
		#chart<?= $i ?> {
			width: 100%;
			height: 300px;
		}
	<?php } ?>
</style>
 

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
	am4core.ready(function() {
		am4core.useTheme(am4themes_animated);

		var chart1 = am4core.create("chart1", am4charts.XYChart);
		chart1.scrollbarX = new am4core.Scrollbar();
		chart1.data = [
			{
				"country": "Biaya Pemeliharaan Fasilitas",
				"visits": <?= $chart1->bpup_fasilitas ?>
			},
			{
				"country": "Pembelian Bahan Baku",
				"visits": <?= $chart1->bpup_baku ?>
			},
			{
				"country": "Pembelian Bahan Penolong",
				"visits": <?= $chart1->bpup_penolong ?>
			},
			{
				"country": "Biaya lainnya yang digunakan untuk reaktivasi usaha",
				"visits": <?= $chart1->bpup_usaha ?>
			},
		];

		var categoryAxis = chart1.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.dataFields.category = "country";
		categoryAxis.renderer.minGridDistance = 60;
		categoryAxis.renderer.inversed = true;
		categoryAxis.renderer.grid.template.disabled = true;
		var label = categoryAxis.renderer.labels.template;
		label.wrap = true;
		label.maxWidth = 120;
		var valueAxis = chart1.yAxes.push(new am4charts.ValueAxis());
		valueAxis.min = 0;
		valueAxis.extraMax = 0.1;
		var series = chart1.series.push(new am4charts.ColumnSeries());
		series.dataFields.categoryX = "country";
		series.dataFields.valueY = "visits";
		series.tooltipText = "{valueY.value}"
		series.columns.template.strokeOpacity = 0;
		series.columns.template.column.cornerRadiusTopRight = 10;
		series.columns.template.column.cornerRadiusTopLeft = 10;
		var labelBullet = series.bullets.push(new am4charts.LabelBullet());
		labelBullet.label.verticalCenter = "bottom";
		labelBullet.label.dy = -5;
		labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";
		chart1.zoomOutButton.disabled = true;
		series.columns.template.adapter.add("fill", function (fill, target) {
			return chart1.colors.getIndex(target.dataItem.index);
		});
		categoryAxis.sortBySeries = series;

		var chart2 = am4core.create("chart2", am4charts.PieChart);
		var pieSeries = chart2.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "litres";
		pieSeries.dataFields.category = "country";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeOpacity = 1;
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;

		chart2.hiddenState.properties.radius = am4core.percent(0);
		chart2.legend = new am4charts.Legend();
		chart2.data = [
			{
				"country": "Kecil",
				"litres": <?= $chart2->kecil ?>
			},
			{
				"country": "Menengah",
				"litres": <?= $chart2->menengah ?>
			},
		];

		<?php for ($i=3; $i < 7; $i++) { ?>
			var chart<?= $i ?> = am4core.create("chart<?= $i ?>", am4charts.PieChart);
			var pieSeries = chart<?= $i ?>.series.push(new am4charts.PieSeries());
			pieSeries.dataFields.value = "litres";
			pieSeries.dataFields.category = "country";
			pieSeries.slices.template.stroke = am4core.color("#fff");
			pieSeries.slices.template.strokeOpacity = 1;
			pieSeries.hiddenState.properties.opacity = 1;
			pieSeries.hiddenState.properties.endAngle = -90;
			pieSeries.hiddenState.properties.startAngle = -90;

			chart<?= $i ?>.hiddenState.properties.radius = am4core.percent(0);
			chart<?= $i ?>.legend = new am4charts.Legend();
			chart<?= $i ?>.data = [
				{
					"country": "Sangat Tidak Setuju",
					"litres": <?= ${'chart'.$i}->j1 ?>
				},
				{
					"country": "Tidak Setuju",
					"litres": <?= ${'chart'.$i}->j2 ?>
				},
				{
					"country": "Setuju",
					"litres": <?= ${'chart'.$i}->j3 ?>
				},
				{
					"country": "Sangat Setuju",
					"litres": <?= ${'chart'.$i}->j4 ?>
				},
			];
		<?php } ?>
	});
</script>