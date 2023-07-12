<h4 class="text-center">Últimas jornadas</h4>
<?php 

$repera = array();
for ($i = 0; $i < 2; ++$i) {
    if (0 == $i) {
        $e = $partido['equipoLocal_id'];
        $eTxt = $partido['local'];
        $racha = $racha1;
    } else {
        $e = $partido['equipoVisitante_id'];
        $eTxt = $partido['visitante'];
        $racha = $racha2;
    } ?>

<div class="col-xs-6 nopadding">
<?php   unset($a);
    $a = '';
    unset($b);
    $conta = 0;
    $eGl = 0;
    $eEl = 0;
    $ePl = 0;
    $eGFl = 0;
    $eGCl = 0;
    $eGv = 0;
    $eEv = 0;
    $ePv = 0;
    $eGFv = 0;
    $eGCv = 0;
    $TOTeGl = 0;
    $TOTeEl = 0;
    $TOTePl = 0;
    $TOTeGFl = 0;
    $TOTeGCl = 0;
    $TOTeGv = 0;
    $TOTeEv = 0;
    $TOTePv = 0;
    $TOTeGFv = 0;
    $TOTeGCv = 0;

    $rachaX = explode(';', $racha[$e]['racha']);

    foreach ($rachaX as $key => $v) {
        if ($key > 5 && 598 == $temporada_id) {
            break;
        }

        $value = explode(',', $v);

        //imp($value);

        if (!isset($value[6])) {
            continue;
        }

        if ($e == $value[6]) {
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

        if ($value[1] < (count($rachaX) - 6)) {
            continue;
        }

        if ($e == $value[6]) {
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

        if (598 == $liga_local) {
            $a .= "'".$value[0]."',";
            $nombre = $value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
        } else {
            $a .= "'J".$value[1]."',";
            $nombre = 'Jornada '.$value[1].' '.$value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
        }

        if (0 == $value[9]) {
            $value[9] = 0.2;
        }
        $b[$conta]['y'] = (float) ($value[9]);
        $b[$conta]['name'] = $nombre;
        if (3 == (int) $value[9]) {
            $b[$conta]['color'] = '#58FA82';
            if ($e == $value[6] && 0 == $i) {
                $b[$conta]['color'] = 'green';
            }
            if ($e == $value[6] && 1 == $i) {
                $b[$conta]['color'] = 'green';
            }
        } elseif (1 == (int) $value[9]) {
            $b[$conta]['color'] = '#F5DA81';
            if ($e == $value[6] && 0 == $i) {
                $b[$conta]['color'] = 'orange';
            }
            if ($e == $value[6] && 1 == $i) {
                $b[$conta]['color'] = 'orange';
            }
        } else {
            $b[$conta]['color'] = '#F78181';
            if ($e == $value[6] && 0 == $i) {
                $b[$conta]['color'] = 'red';
            }
            if ($e == $value[6] && 1 == $i) {
                $b[$conta]['color'] = 'red';
            }
        }
        ++$conta; ?>
                                        
<?php
    }

    //imp($a);imp($b);

    $a = substr($a, 0, -1);

    $b = json_encode($b);
    $b = preg_replace('/"y"/D', 'y', $b);
    $b = preg_replace('/"/D', "'", $b);

    $contenedor = $e;
    $maximo = 3;
    $minimo = -0.5;
    $tipo = 'column';
    $titulo = null;
    $subtitulo = $eTxt;
    $textoY = 'Puntos obtenidos';
    $textoSerie1 = $titulo;
    $textoSerie2 = '';
    $textoVY = 'Puntos';
    unset($c);
    include 'includes/graficos/_linea2.php'; ?>
        <div id='c<?php echo $e; ?>' style='width: 100%; height: 150px; margin: 0 auto'></div>
        <div class="marco">En las últimas 6 jornadas, el <b><?php echo $eTxt; ?></b>
        <?php if (0 == $eGl && 0 == $eGv) {
        ?>
        no ha ganado ningún partido,
        <?php
    } ?>
        <?php if (1 == $eGl && 0 == $eGv) {
        ?>
        solo ha ganado <b>1</b> partido en casa,
        <?php
    } ?>
        <?php if (0 == $eGl && 1 == $eGv) {
        ?>
        solo ha ganado <b>1</b> partido como visitante,
        <?php
    } ?>
        <?php if (1 == $eGl && 1 == $eGv) {
        ?>
        ha ganado <b>2</b> partidos, uno como local y otro como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && 0 == $eGv) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos, todos como local,
        <?php
    } ?>
        <?php if (0 == $eGl && $eGv > 1) {
        ?>
        ha ganado <b><?php echo $eGv; ?></b> partidos, todos como visitante,
        <?php
    } ?>
        <?php if (1 == $eGl && $eGv > 1) {
        ?>
        ha ganado <b>1</b> partido como local y <b><?php echo $eGv; ?></b> como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && 1 == $eGv) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b>1</b> como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && $eGv > 1) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b><?php echo $eGv; ?></b> como visitante,
        <?php
    } ?>

        <?php if (0 == $eEl && 0 == $eEv) {
        ?>
        no ha empatado ningún partido
        <?php
    } ?>
        <?php if (1 == $eEl && 0 == $eEv) {
        ?>
        ha empatado <b>1</b> partido en casa
        <?php
    } ?>
        <?php if (0 == $eEl && 1 == $eEv) {
        ?>
        solo ha empatado <b>1</b> partido como visitante
        <?php
    } ?>
        <?php if (1 == $eEl && 1 == $eEv) {
        ?>
        ha empatado <b>2</b> partidos, uno como local y otro como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && 0 == $eEv) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos, todos como local
        <?php
    } ?>
        <?php if (0 == $eEl && $eEv > 1) {
        ?>
        ha empatado <b><?php echo $eEv; ?></b> partidos, todos como visitante
        <?php
    } ?>
        <?php if (1 == $eEl && $eEv > 1) {
        ?>
        ha empatado <b>1</b> partido como local y <b><?php echo $eEv; ?></b> como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && 1 == $eEv) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b>1</b> como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && $eEv > 1) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b><?php echo $eEv; ?></b> como visitante
        <?php
    } ?>

        <?php if (0 == $ePl && 0 == $ePv) {
        ?>
        y no ha perdido ningún partido.
        <?php
    } ?>
        <?php if (1 == $ePl && 0 == $ePv) {
        ?>
        y ha perdido <b>1</b> partido en casa.
        <?php
    } ?>
        <?php if (0 == $ePl && 1 == $ePv) {
        ?>
        y solo ha perdido <b>1</b> partido como visitante.
        <?php
    } ?>
        <?php if (1 == $ePl && 1 == $ePv) {
        ?>
        y ha perdido <b>2</b> partidos, uno como local y otro como visitante.
        <?php
    } ?>
        <?php if ($ePl > 1 && 0 == $ePv) {
        ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos, todos como local.
        <?php
    } ?>
        <?php if (0 == $ePl && $ePv > 1) {
        ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos, todos como visitante.
        <?php
    } ?>
        <?php if (1 == $ePl && $ePv > 1) {
        ?>
        y ha perdido <b>1</b> partido como local y <b><?php echo $ePv; ?></b> como visitante.
        <?php
    } ?>
        <?php if ($ePl > 1 && 1 == $ePv) {
        ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b>1</b> como visitante.
        <?php
    } ?>
        <?php if ($ePl > 1 && $ePv > 1) {
        ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b><?php echo $ePv; ?></b> como visitante.
        <?php
    } ?>

        <br />Respecto a goles, ha metido <b><?php echo $eGFl; ?></b> goles en casa y <b><?php echo $eGFv; ?></b> fuera. Por contra ha
        encajado <b><?php echo $eGCl; ?></b> goles en casa y <b><?php echo $eGCv; ?></b> goles fuera.
        </div>

 
        <?php /*if ($i==0) {?>
        <br />El promedio de goles en los últimos 6 partidos <?php echo $eGFl?>.
        Promedio: <b><?php echo number_format(($eGFl/6),2)?></b>
        <br />Goles a favor como local <?php echo $TOTeGFl?>.
        Promedio: <b><?php echo number_format(($TOTeGFl/$jornadas),2)?></b>
        <hr />Goles en contra como local en los últimos 6 partidos <?php echo $eGCl?>.
        Promedio: <b><?php echo number_format(($eGCl/6),2)?></b>
        <br />Goles en contra como local <?php echo $TOTeGCl?>.
        Promedio: <b><?php echo number_format(($TOTeGCl/$jornadas),2)?></b>
        <?php } else {?>
        <br />Goles a favor como visitante en los últimos 6 partidos <?php echo $eGFv?>.
        Promedio: <b><?php echo number_format(($eGFv/6),2)?></b>
        <br />Goles a favor como visitante <?php echo $TOTeGFv?>.
        Promedio: <b><?php echo number_format(($TOTeGFv/$jornadas),2)?></b>
        <hr />Goles en contra como visitante en los últimos 6 partidos <?php echo $eGCv?>.
        Promedio: <b><?php echo number_format(($eGCv/6),2)?></b>
        <br />Goles en contra como visitante <?php echo $TOTeGCv?>.
        Promedio: <b><?php echo number_format(($TOTeGCv/$jornadas),2)?></b>
        <?php } */?>

</div>


<?php
} //fin de los dos lados?>

