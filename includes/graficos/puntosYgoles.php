
 <div class='cols-xs-12 clear'>
  <?php  unset($a); $a = ''; unset($b);
  $pts = 0; $puntos = array();
  $gf = 0; $golesF = array();
  $gc = 0; $golesC = array();
  foreach ($e_racha as $key => $v) {
      $value = explode(',', $v);
      if (!isset($value[1])) {
          continue;
      }

      if (isset($partido)) {
          if ($equipo_id == $value[6]) {
              if ($value[4] == $value[5]) {
                  ++$TOTeEl;
              } elseif ($value[4] > $value[5]) {
                  ++$TOTeGl;
              } else {
                  ++$TOTePl;
              }
              $TOTeGFl = $TOTeGFl + $value[4];
              $TOTeGCl = $TOTeGCl + $value[5];
              $repera[$value[6]][$value[1]][0]['GF'] = $value[4];
              $repera[$value[6]][$value[1]][0]['GC'] = $value[5];
              $repera[$value[6]][$value[1]][0]['PT'] = $value[9];
          } else {
              if ($value[4] == $value[5]) {
                  ++$TOTeEv;
              } elseif ($value[5] > $value[4]) {
                  ++$TOTeGv;
              } else {
                  ++$TOTePv;
              }
              $TOTeGFv = $TOTeGFv + $value[5];
              $TOTeGCv = $TOTeGCv + $value[4];
              $repera[$value[7]][$value[1]][1]['GF'] = $value[5];
              $repera[$value[7]][$value[1]][1]['GC'] = $value[4];
              $repera[$value[7]][$value[1]][1]['PT'] = $value[9];
          }
          if ($equipo_id == $value[6]) {
              if ($value[4] == $value[5]) {
                  ++$eEl;
              } elseif ($value[4] > $value[5]) {
                  ++$eGl;
              } else {
                  ++$ePl;
              }
              $eGFl = $eGFl + $value[4];
              $eGCl = $eGCl + $value[5];
          } else {
              if ($value[4] == $value[5]) {
                  ++$eEv;
              } elseif ($value[5] > $value[4]) {
                  ++$eGv;
              } else {
                  ++$ePv;
              }
              $eGFv = $eGFv + $value[5];
              $eGCv = $eGCv + $value[4];
          }
      }

      if (598 != $liga) {
          $a .= "'J".$value[1]."',";
          $nombre = 'Jornada '.$value[1].' '.$value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
      } else {
          $a .= "'".$value[0]."',";
          $nombre = $value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
      }

      $pts = $pts + $value[9];
      $puntos[] = $pts;
      if ($value[6] == $equipo_id) {
          $gf = $gf + $value[4];
          $golesF[] = $gf;
      }
      if ($value[7] == $equipo_id) {
          $gf = $gf + $value[5];
          $golesF[] = $gf;
      }
      if ($value[6] != $equipo_id) {
          $gc = $gc + $value[4];
          $golesC[] = $gc;
      }
      if ($value[7] != $equipo_id) {
          $gc = $gc + $value[5];
          $golesC[] = $gc;
      }

      $b[$key]['y'] = (float) ($value[9]);
      if ($b[$key]['y'] == 0) {
          $b[$key]['y'] = 0.2;
      }
      $b[$key]['name'] = $nombre;
      if (3 == (int) $value[9]) {
          if ($equipo_id == $value[6]) {
              $b[$key]['color'] = 'green';
          } else {
              $b[$key]['color'] = '#58FA82';
          }
      } elseif (1 == (int) $value[9]) {
          if ($equipo_id == $value[6]) {
              $b[$key]['color'] = 'orange';
          } else {
              $b[$key]['color'] = '#F5DA81';
          }
      } else {
          if ($equipo_id == $value[6]) {
              $b[$key]['color'] = 'red';
          } else {
              $b[$key]['color'] = '#F78181';
          }
      }
      $b[$key]['id'] = $value[8];
  }

  $a = substr($a, 0, -1);
  $b = json_encode($b);
  $b = preg_replace('/"x"/D', 'x', $b);
  $b = preg_replace('/"y"/D', 'y', $b);
  $b = preg_replace('/"/D', "'", $b);

$tpuntos = end($puntos);
$tgolesF = end($golesF);
$tgolesC = end($golesC);

$puntos = json_encode($puntos);
$puntos = str_replace('"', '', $puntos);
$golesF = json_encode($golesF);
$golesF = str_replace('"', '', $golesF);
$golesC = json_encode($golesC);
$golesC = str_replace('"', '', $golesC);

    $contenedor = $equipo_id; $maximo = $pts; $minimo = -1; $tipo = 'column';
    $titulo = null;
    $subtitulo = $equipotxt;
    $textoY = 'Puntos obtenidos'; $textoSerie1 = $titulo; $textoSerie2 = '';
    $textoVY = 'Puntos';
    ?>


<script type='text/javascript'>
$(function () {
    $('#c<?php echo $contenedor; ?>').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: null
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
        yAxis: [{
            labels: {
	            style: {
	                color: Highcharts.getOptions().colors[0]
	            }
	        },
	        title: {
	            text: 'Total puntos',
	            style: {
	                color: Highcharts.getOptions().colors[0]
	            }
	        },
            min: <?php echo $minimo; ?>,
            max: <?php echo $maximo; ?>,
            startOnTick: false,
            tickInterval: 1
            
        }, { // Secondary yAxis
	        gridLineWidth: 0,
	        title: {
	            text: 'Goles',
	            style: {
	                color: Highcharts.getOptions().colors[1]
	            }
	        },
	        labels: {
	            format: '{value}',
	            style: {
	                color: Highcharts.getOptions().colors[1]
	            }
	        },
	        opposite: true

	    }],
        
        tooltip: {
	       //shared: true,
	        dataLabels: {	        	
                    formatter: function () {
			            	return '<b>'+ this.point.name +'</b><br/><?php echo $textoVY; ?>: '  + this.y ;
			            }	
			    },   
	    },

        exporting: { enabled: false },  



        
        series: [{            
            type: 'spline',
            name: 'Total puntos',
            style: {
	                color: Highcharts.getOptions().colors[0]
	            },
            data: <?php echo $puntos; ?> 
        },

        {            
            type: 'spline',
            name: 'Goles a Favor',
            color: 'green',
            marker: {
            enabled: false
        	}, 
        	dashStyle: 'shortdot',
            yAxis: 1,
            data: <?php echo $golesF; ?> 
        },
        {            
            type: 'spline',
            name: 'Goles en contra',
            color: 'red',
            marker: {
            enabled: false,
            }, 
        	dashStyle: 'shortdot',
            yAxis: 1,            
            data: <?php echo $golesC; ?> 
        },


        {   
        	type: 'column',         
            name: 'Puntos partido',
            data: <?php echo $b; ?>,
            cursor: 'pointer',
                point: {
                     events: {
                        click: function () {
                            location.href = '/partido.php?id=' + this.options.id;
                        }
                    }  
                }
        }]
    });
});
        </script>



  <div id='c<?php echo $equipo_id; ?>' style='height: 300px; margin: 0 auto'></div>
</div>