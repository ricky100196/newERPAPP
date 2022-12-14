<style type="text/css">
    small{
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Grafik Instrumen Monitoring BPUP</h4>
                <hr>
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
</div>
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    am4core.ready(function() {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create('chartdiv', am4charts.XYChart)
        chart.colors.step = 2;
        chart.legend = new am4charts.Legend()
        chart.legend.position = 'bottom'
        chart.legend.paddingBottom = 20
        chart.legend.labels.template.maxWidth = 95
        chart.exporting.menu = new am4core.ExportMenu();
        var title = chart.titles.create();
        title.text = "Grafik Instrumen Monitoring BPUP";
        title.fontSize = 16;
        title.marginBottom = 20;

        var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
        xAxis.dataFields.category = 'category'
        xAxis.renderer.cellStartLocation = 0.1
        xAxis.renderer.cellEndLocation = 0.9
        xAxis.renderer.grid.template.location = 0;
        var label = xAxis.renderer.labels.template;
        label.truncate = true;
        label.maxWidth = 120;

        var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
        yAxis.min = 0;
        function createSeries(value, name, color) {
            var series = chart.series.push(new am4charts.ColumnSeries())
            series.dataFields.valueY = value;
            series.dataFields.categoryX = 'category';
            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fill = am4core.color(color);
            series.columns.template.stroke = am4core.color(color); 

            series.name = name;
            series.events.on("hidden", arrangeColumns);
            series.events.on("shown", arrangeColumns);
            var bullet = series.bullets.push(new am4charts.LabelBullet())
            bullet.interactionsEnabled = false;
            bullet.dy = 30;
            bullet.label.text = '{valueY}'
            bullet.label.fill = am4core.color('#ffffff')
            return series;
        }

        <?php $nm = array('','Penyaluran BPUP tepat waktu sesuai dengan juknis','Pencairan dana BPUP mudah dilakukan','Dana BPUP membantu mempertahankan jumlah karyawan','Dana BPUP membantu keberlangsungan usaha','Dana BPUP memberikan dampak ekonomi lain pada masyarakat sekitar usaha pariwisata','Pemerintah Daerah melakukan pendampingan pelaporan'); ?>
        chart.data = [
            <?php foreach ($data as $row) { ?>
                {
                    category: '<?= $nm[$row->id_soal] ?>',
                    first: <?= $row->j1 ?>,
                    second: <?= $row->j2 ?>,
                    third: <?= $row->j3 ?>,
                    fourth: <?= $row->j4 ?>
                },
            <?php } ?>
        ]
        createSeries('first', 'Sangat Tidak Setuju', '#dc6967');
        createSeries('second', 'Tidak Setuju', '#dcd267');
        createSeries('third', 'Setuju', '#67dc75');
        createSeries('fourth', 'Sangat Setuju', '#67dadc');
        function arrangeColumns() {
            var series = chart.series.getIndex(0);
            var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
            if (series.dataItems.length > 1) {
                var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                var delta = ((x1 - x0) / chart.series.length) * w;
                if (am4core.isNumber(delta)) {
                    var middle = chart.series.length / 2;
                    var newIndex = 0;
                    chart.series.each(function(series) {
                        if (!series.isHidden && !series.isHiding) {
                            series.dummyData = newIndex;
                            newIndex++;
                        }
                        else {
                            series.dummyData = chart.series.indexOf(series);
                        }
                    })
                    var visibleCount = newIndex;
                    var newMiddle = visibleCount / 2;
                    chart.series.each(function(series) {
                        var trueIndex = chart.series.indexOf(series);
                        var newIndex = series.dummyData;
                        var dx = (newIndex - trueIndex + middle - newMiddle) * delta
                        series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                        series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                    })
                }
            }
        }
    });
</script>