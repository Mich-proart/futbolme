
<script type='text/javascript'>
$(function () {
    $('#c<?php echo $contenedor; ?>').highcharts({
        chart: {
            type: '<?php echo $tipo; ?>'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        subtitle: {
            text: '<?php echo $subtitulo; ?>',
            floating: true,
            align: 'left',
            verticalAlign: 'bottom',
            y: 10
        },

        <?php if (null != $titulo) {
    ?>
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 10,
            floating: true,
            borderWidth: 1
        },
        <?php
} else {
        ?> 

            legend: { enabled: false },  
        
        <?php
    } ?>  

        xAxis: {
            categories: [<?php echo $a; ?>]
        },
        yAxis: {
            title: {
                text: null
            },
            min: <?php echo $minimo; ?>,
            max: <?php echo $maximo; ?>,
            startOnTick: false,
            tickInterval: 1
            
        },
        tooltip: {
            formatter: function () {
                return '<b>'+ this.point.name +'</b><br/><?php echo $textoVY; ?>: '  + this.y ;
            }
        },

        exporting: { enabled: false },   

        
        series: [{            
            name: '<?php echo $textoSerie1; ?>',
            data: <?php echo $b; ?> 
        }

        <?php if (isset($c)) {
        ?>
        ,
        {            
            name: '<?php echo $textoSerie2; ?>',
            data: <?php echo $c; ?> 
        }

        <?php
    }?>
        ]
    });
});
        </script>


