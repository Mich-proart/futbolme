<?php

$datos = array();

$inicio = end($posiciones);

$inicio = $inicio['temporada'];

$t = 0; $maxDivision = 0; $divisiones = array();

foreach ($posiciones as $key => $value) {
    $posicion = $value['posicion'];
    if ($value['idDivision'] > $maxDivision) {
        $maxDivision = $value['idDivision'];
    }
    $t1 = $value['temporada'];
    $t2 = substr($t1, -2) + 1;

    $divisiones[$value['idDivision']] = $value['idDivision'];

    if ($t2 < 10) {
        $t2 = '0'.$t2;
    }
    $nt = $t1.'-'.substr($t2, -2);
    //imp($nt);
    if ($posicion < 10) {
        $posicion = '0'.$posicion;
    }

    if ($key > 0 && $t > $value['temporada']) {
        $bucle = ($t - $value['temporada']);
        for ($i = 0; $i < $bucle; ++$i) {
            $timestamp = strtotime('02-01-'.$t);

            $fecha = $timestamp.'000';
            $datos[] = '{x: '.$fecha.",y: null,temporada_id: 0,temporada: '".$nt."',division: 0,puesto: 0}";
            --$t;
        }
    }

    $timestamp = strtotime('02-01-'.$value['temporada']);
    $fecha = $timestamp.'000';

    switch ($value['idDivision']) {
         case '1':$division = 0; $txtDivision = '1ª'; break;
         case '2':$division = 22; $txtDivision = '2ª'; break;
         case '3':$division = 44; $txtDivision = '2ªB'; break;
         case '4':$division = 66; $txtDivision = '3ª'; break;
    }

    $datos[] = '{x: '.$fecha.',y: '.($division + $posicion).',temporada_id: '.$value['temporada_id'].",temporada: '".$nt."',division: '".$txtDivision."',puesto: ".$value['posicion'].'}';
    $t = ($value['temporada'] - 1);
}

//imp($datos);die;
//
$d = array_reverse($datos);

$datos = json_encode($d);

$datos = str_replace('"', '', $datos);

//imp($datos);
//imp($maxDivision);
?>

<script src="/js/highstock.js"></script>

<div id="container-<?php echo $equipo_id; ?>" style="height: 400px; min-width: 310px"></div>
<script>
//$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {
//console.log(data);
$(function () {

    // Create the chart
    Highcharts.stockChart('container-<?php echo $equipo_id; ?>', {

        rangeSelector: {
            buttonSpacing: 50,
            labelStyle: {
                color: 'white'
            },
            buttons: [{
                type: 'year',
                count: 10,
                text: ' Decada '
            }, {
                type: 'all',
                count: 1,
                text: ' Todo '
            }],
            selected: 1,
            inputEnabled: false
        },

        title: {
            text: 'Clasificación en categoría nacional'
        },

        subtitle: {
            text: 'Linea del tiempo del <?php echo $equipotxt; ?><br /> Pulsa en la posición para ver la temporada.'
        },

        navigator: {
            enabled: false
        },  

               
        yAxis: {
            gridLineWidth: 0,
            labels: {
                enabled: false     
            },
            reversed: true,
            showFirstLabel: false,
            showLastLabel: false,
            plotLines: [{
                value: 1,
                color: 'gold',
                width: 1,
                label: {
                    text: 'Primera'
                }
            },

            <?php if ($maxDivision > 1) {
    ?> 
             {
                value: 23,
                color: 'green',
                width: 1,
                label: {
                    text: 'Segunda'
                }
            }, 
            <?php
} ?>

            <?php if ($maxDivision > 2) {
        ?>
            {
                value: 45,
                color: 'red',
                width: 1,
                label: {
                    text: 'Segunda B'
                }
            }, 
            <?php
    } ?>

            <?php if ($maxDivision > 3) {
        ?>
            {
                value: 67,
                color: 'dimgray',
                width: 1,
                label: {
                    text: 'Tercera'
                }
            } 
            <?php
    } ?>
            ]
        },

        
        plotOptions: {
            
            series: {
                name: 'Posición',

                dataLabels: {
                    color: 'red',
                    enabled: true,
                    formatter: function() { 
                        if (this.y>0) {
                            if (this.y>1) {
                                var p;
                                var c;                                
                                p=this.y;
                                if (this.y>22 && this.y<44) { p=(this.y-22); }
                                if (this.y>44 && this.y<66) { p=(this.y-44); }
                                if (this.y>66) { p=(this.y-66); }
                                if (p>1) { c='black'; } else { c='red'; }
                                return '<span style="color:' + c + '">' + p + '</span>';
                            } else {
                                return this.y;
                            }
                        } else {
                            return null;
                        } 
                    }
                },               
                marker: {
                    enabled: true,
                    radius: 3
                },
                tooltip: {
                     useHTML: true,
                     headerFormat: '<b>Temporada {point.temporada}</b><br /><table>',
                     pointFormat: '<tr><td>División: {point.division}</td></tr><br /><tr><td>Posición {point.puesto}º</td></tr>',
                     footerFormat: '</table>'
                },
                cursor: 'pointer',
                point: {
                     events: {
                        click: function () {
                            location.href = '/historico/liga/index.php?temporada=' + this.options.temporada + '&temporada_id=' + this.options.temporada_id + '&equipo_id=<?php echo $equipo_id; ?>';
                        }
                    }  
                }
            }
        },        
        series: [{
            data: <?php echo $datos; ?>,
            lineWidth: 1
        },

        <?php if ($inicio < 1940) {
        ?>
         {
            type: 'flags',
            data: [{
                x: Date.UTC(1937),
                title: 'Guerra Civil'
            }],
            //onSeries: 'dataseries',
            shape: 'squarepin',
            width: 80
        }
        <?php
    } ?>
        ]

    });
});

</script>

