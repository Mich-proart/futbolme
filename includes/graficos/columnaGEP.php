		<script>
$(function () {
    $('#c-<?php echo $contenedor; ?>').highcharts({
        chart: {
            type: '<?php echo $tipo; ?>'
        },
        title: {
            text: null
        },
        credits: { enabled: false },
        exporting: { enabled: false },
        legend: { enabled: false }, 
        xAxis: {
            categories: [<?php echo $a; ?>]
        },
        
        subtitle: {
            text: null
        },
        yAxis: {
            title: {
                text: null
            },
            max:<?php echo $maximo; ?>,
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            },
            startOnTick: false,
            tickInterval: 5
        },
               
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: 'Local',
            data: [<?php echo $ar1; ?>]
        }
        , {
            name: 'Visitante',
            data: [<?php echo $ar2; ?>]
        }
        
        ]
    });
});
		</script>