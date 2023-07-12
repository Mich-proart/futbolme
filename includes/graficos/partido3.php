<?php if (isset($partidos)) {
    if (!isset($color)) {
        $color = 'white';
    }

    if (4 == $bd && 191 != $torneo_id) {
        $txt = 'Algunos enfrentamientos ';
    } else {
        $txt = 'Enfrentamientos ';
    } ?>

<div class="col-xs-12 marco"><h4 class="text-center txt11"><?php echo $txt; ?> entre <b><?php echo $et1; ?></b> 
y <b><?php echo $et2; ?></b> en <span style="color:navy"><?php echo $nt; ?></span></h4> 
</div>
<div class="col-xs-12 nopadding">
<?php
    $f = '2100-01-01';
    // imp($bd);
    // en <b><?php echo $nt; esto es para ver la division

    foreach ($partidos as $k => $v) {
        if ($bd < 3) {
            $t = 'Temporada '.$v['enlace_nombre'].'-'.substr(($v['enlace_nombre'] + 1), -2);
            $pgHpartido = '/historico-liga/'.poner_guion($v['nombreT']).'/'.poner_guion($t).'/'.poner_guion($v['local']).'-'.poner_guion($v['visitante']).'/'.$v['jornada'].'/partido/'.$v['id'];

            $pgHlocal = '/historico-liga/'.poner_guion($t).'/torneo/'.poner_guion($v['nombreT']).'/'.$v['enlace_id'].'/'.$v['enlace_nombre'].'/'.$v['id_division'].'&equipo='.$v['id_local'];
            $pgHvisitante = '/historico-liga/'.poner_guion($t).'/torneo/'.poner_guion($v['nombreT']).'/'.$v['enlace_id'].'/'.$v['enlace_nombre'].'/'.$v['id_division'].'&equipo='.$v['id_visitante'];
        } else {
            $t = $v['enlace_nombre'];
            $pgHpartido = '/historico-copa-partido/'.poner_guion(trim($v['local'])).'-'.poner_guion(trim($v['visitante'])).'-'.poner_guion(trim($v['nombreT'])).'-'.poner_guion(trim($t)).'/'.$v['id'];

            $pgHlocal = '/historico-copa-campeonato/'.poner_guion($v['nombreT']).'/'.poner_guion($t).'/'.$v['enlace_id'].'/'.$v['id_local'];
            $pgHvisitante = '/historico-copa-campeonato/'.poner_guion($v['nombreT']).'/'.poner_guion($t).'/'.$v['enlace_id'].'/'.$v['id_visitante'];
        }

        if (4 == $bd) {
            $pgHpartido = 'partido.php?id='.$v['id'].'&bd=H';
        }

        if ($v['fecha'] < $f) {
            $f = $v['fecha'];
        }
        if (1 == $v['tipo_torneo']) {
            $v['fase'] = 'Jornada '.$v['jornada'];
        }
        if ($v['goles_local'] > $v['goles_visitante'] && $e1 == $v['id_local']) {
            $colorFondo = 'green';
        }
        if ($v['goles_local'] < $v['goles_visitante'] && $e1 == $v['id_visitante']) {
            $colorFondo = '#58FA82';
        }
        if ($v['goles_local'] == $v['goles_visitante'] && $e1 == $v['id_local']) {
            $colorFondo = 'orange';
        }
        if ($v['goles_local'] == $v['goles_visitante'] && $e1 == $v['id_visitante']) {
            $colorFondo = '#F5DA81';
        }
        if ($v['goles_local'] < $v['goles_visitante'] && $e1 == $v['id_local']) {
            $colorFondo = 'red';
        }
        if ($v['goles_local'] > $v['goles_visitante'] && $e1 == $v['id_visitante']) {
            $colorFondo = '#F78181';
        } ?>
    <div class="col-xs-12 marco">
        <div class="col-xs-12 txt11" style='background-color:gainsboro;'>
            <?php echo $t; ?> - <b><?php echo $v['fase']; ?></b>
            <?php echo substr($v['fecha'], 0, 10); ?>

            <a href="<?php echo $pgHpartido; ?>">
            <span class="glyphicon glyphicon-chevron-down iconhover pull-right" style="background-color: green;width: 28px;height: 20px;margin: 0 3px;border: 3px solid black; color:white;"></span>
            </a>
            <?php 
            //imp($v);
            /*$idt=$v['enlace_id'];
            $bdPartido=$bd;
            $partido['id']=$v['id'];
            $partido['youtube_id']=$v['youtube_id'];
            include $nivel.'srcRecursos/partidoRmd.php' */?>
        </div>

        <table style='width:100%; background-color:<?php echo $color; ?>' class="txt11">
        <tr><td style='width:42%; text-align: right;'>
        <?php if ($bd < 5) {
                ?>
        <a href="<?php echo $pgHlocal; ?>">
        <span <?php if (1 == $v['clasificado']) {
                    echo 'class=boldfont';
                } ?>><?php echo $v['local']; ?></span>
        </a>
        <?php
            } else {
                ?>
        <span <?php if (1 == $v['clasificado']) {
                    echo 'class=boldfont';
                } ?>><?php echo $v['local']; ?></span>    
        <?php
            } ?>

        </td>
        <td style='width:16%; text-align: center;'>
        <span class='boldfont' style='padding-left:2px; padding-right:2px; border: 3px solid <?php echo $colorFondo; ?>;'><?php echo $v['goles_local']; ?> - <?php echo $v['goles_visitante']; ?></span>
        </td>
        <td style='width:42%; text-align: left;'>
        <?php if ($bd < 5) {
                ?>
        <a href="<?php echo $pgHvisitante; ?>">
        <span <?php if (2 == $v['clasificado']) {
                    echo 'class=boldfont';
                } ?>><?php echo $v['visitante']; ?></span>
        </a>
        <?php
            } else {
                ?>
        <span <?php if (2 == $v['clasificado']) {
                    echo 'class=boldfont';
                } ?>><?php echo $v['visitante']; ?></span>
        <?php
            } ?>
        </td> 
        </tr></table>
        <div class="clear h10"></div>
    </div>

    <?php
    } ?>
    
</div>

<?php 
if ($bd < 5) {
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
    $repeResult = array();
    $eliminatorias = array();
    foreach ($partidos as $key => $value) {
        if ($value['clasificado'] > 0) {
            if (148 == $value['jornada']) {
                $value['jornada'] = 154;
            }//semifinales
            $eliminatorias[$value['jornada']][0] = $value['fase'];
            if (1 == $value['clasificado']) {
                if ($value['id_local'] == $e1) {
                    $eliminatorias[$value['jornada']][$e1][] = $value['enlace_nombre'];
                }
                if ($value['id_local'] == $e2) {
                    $eliminatorias[$value['jornada']][$e2][] = $value['enlace_nombre'];
                }
            } else {
                if ($value['id_visitante'] == $e2) {
                    $eliminatorias[$value['jornada']][$e2][] = $value['enlace_nombre'];
                }
                if ($value['id_visitante'] == $e1) {
                    $eliminatorias[$value['jornada']][$e1][] = $value['enlace_nombre'];
                }
            }
        }

        $partidoClas = $value['fecha'].','.$value['jornada'].','.$value['local'].','.$value['visitante'].','.$value['goles_local'].','.$value['goles_visitante'].','.$value['id_local'].','.$value['id_visitante'].','.$value['id'].','.$value['enlace_nombre'].','.$value['enlace_id']; ?>



    <?php

    //$repeResult[$value['goles_local']."-".$value['goles_visitante']][]=$partidoClas;
    //$repeResult[$value['goles_local']."-".$value['goles_visitante']]['diferencia']=(int)($value['goles_local']-$value['goles_visitante']);
if ($e1 == $value['id_local']) {
    if ($value['goles_local'] == $value['goles_visitante']) {
        ++$eEl;
    } elseif ($value['goles_local'] > $value['goles_visitante']) {
        ++$eGl;
    } else {
        ++$ePl;
    }
    $eGFl = $eGFl + $value['goles_local'];
    $eGCl = $eGCl + $value['goles_visitante'];
} else {
    if ($value['goles_local'] == $value['goles_visitante']) {
        ++$eEv;
    } elseif ($value['goles_visitante'] > $value['goles_local']) {
        ++$eGv;
    } else {
        ++$ePv;
    }
    $eGFv = $eGFv + $value['goles_visitante'];
    $eGCv = $eGCv + $value['goles_local'];
}
    }
    $maximo = 0;
    $ar1 = '{y: '.$eGl.",
    color: 'green'},
    {y: ".$eEl.",
    color: 'orange'},
    {y: ".$ePl.",
    color: 'red'}";

    $ar2 = '{y: '.$eGv.",
    color: '#58FA82'},
    {y: ".$eEv.",
    color: '#F5DA81'},
    {y: ".$ePv.",
    color: '#F78181'}";

    if ($eGl + $eGv > $maximo) {
        $maximo = $eGl + $eGv;
    }
    if ($eEl + $eEv > $maximo) {
        $maximo = $eEl + $eEv;
    }
    if ($ePl + $ePv > $maximo) {
        $maximo = $ePl + $ePv;
    }
    $maximo = $maximo + 1;
    $contenedor = 'partidos-'.$torneo_id;
    $tipo = 'column';
    $a = "'<b>".$et1."</b>', '<b>Empates</b>', '<b>".$et2."</b>'"; ?>


<?php include $nivel.'includes/graficos/columnaGEP.php'; ?>

<div style="float:left; padding:5px; background-color:<?php echo $colordiv; ?>">
<h4 class="text-center boldfont">Partidos</h4>
<div id="c-<?php echo $contenedor; ?>" style="float:right; width: 230px; height: 200px; margin: 0 auto; background-color:<?php echo $colordiv; ?>; margin:5px"></div>
    El <b><?php echo $et1; ?></b>
    <?php if (0 == $eGl) {
        ?>
    como local no ha ganado ningún partido al <b><?php echo $et2; ?></b>,
    <?php
    } ?>
    <?php if (1 == $eGl) {
        ?>
    como local ha ganado en <b><?php echo $eGl; ?></b> ocasión al <b><?php echo $et2; ?></b>,
    <?php
    } ?>
    <?php if ($eGl > 1) {
        ?>
    como local ha ganado en <b><?php echo $eGl; ?></b> ocasiones al <b><?php echo $et2; ?></b>,
    <?php
    } ?>
    <?php if (0 == $eEl) {
        ?>
    no han empatado nunca
    <?php
    } ?>
    <?php if (1 == $eEl) {
        ?>
    han empatado una vez
    <?php
    } ?>
    <?php if ($eEl > 1) {
        ?>
    han empatado <b><?php echo $eEl; ?></b> veces
    <?php
    } ?>
    <?php if (0 == $ePl) {
        ?>
    y no ha perdido ningún partido. 
    <?php
    } ?>
    <?php if (1 == $ePl) {
        ?>
    y ha perdido un partido. 
    <?php
    } ?>
    <?php if ($ePl > 1) {
        ?>
    y ha perdido <b><?php echo $ePl; ?></b> partidos.
    <?php
    } ?> 
    <hr /> 

    El <b><?php echo $et2; ?></b>
    <?php if (0 == $ePv) {
        ?>
    como local no ha ganado ningún partido al <b><?php echo $et1; ?></b>,
    <?php
    } ?>
    <?php if (1 == $ePv) {
        ?>
    como local ha ganado en <b><?php echo $ePv; ?></b> ocasión al <b><?php echo $et1; ?></b>,
    <?php
    } ?>
    <?php if ($ePv > 1) {
        ?>
    como local ha ganado en <b><?php echo $ePv; ?></b> ocasiones al <b><?php echo $et1; ?></b>,
    <?php
    } ?>
    <?php if (0 == $eEv) {
        ?>
    no han empatado nunca
    <?php
    } ?>
    <?php if (1 == $eEv) {
        ?>
    han empatado una vez
    <?php
    } ?>
    <?php if ($eEv > 1) {
        ?>
    han empatado <b><?php echo $eEv; ?></b> veces
    <?php
    } ?>
    <?php if (0 == $eGv) {
        ?>
    y no ha perdido ningún partido. 
    <?php
    } ?>
    <?php if (1 == $eGv) {
        ?>
    y ha perdido un partido. 
    <?php
    } ?>
    <?php if ($eGv > 1) {
        ?>
    y ha perdido <b><?php echo $eGv; ?></b> partidos.
    <?php
    } ?>       


</div>

<?php

$maximo = 0;
    $ar1 = '{y: '.$eGFl.",
    color: '#0489B1'},
    {y: ".$eGCl.",
    color: '#A4A4A4'}";

    $ar2 = '{y: '.$eGFv.",
    color: '#0B4C5F'},
    {y: ".$eGCv.",
    color: '#585858'}";

    if ($eGFl + $eGFv > $maximo) {
        $maximo = $eGFl + $eGFv;
    }
    if ($eGCl + $eGCv > $maximo) {
        $maximo = $eGCl + $eGCv;
    }
    $maximo = $maximo + 1;
    $contenedor = 'goles-'.$torneo_id;
    $tipo = 'column';
    $a = "'<b>".$et1."</b>', '<b>".$et2."</b>'"; ?>
<?php include $nivel.'includes/graficos/columnaGEP.php'; ?>
<div style="float:left; padding:5px; background-color:<?php echo $colordiv; ?>">
<hr /><h4 class="text-center boldfont">Goles</h4>
<div id="c-<?php echo $contenedor; ?>" style="float:left; width: 200px; height: 200px; margin: 0 auto background-color:<?php echo $colordiv; ?>; margin:5px"></div>
<?php

if ($eGFl < $eGFv) {
    echo 'El '.$et1.' ha conseguido más goles como visitante ('.$eGFv.') que como local ('.$eGFl.').';
} ?>




<br />Respecto a goles, el <b><?php echo $et1; ?></b> le ha metido al <b><?php echo $et2; ?></b> un total de <b><?php echo $eGFl + $eGFv; ?></b> (<b><?php echo $eGFl; ?></b> en casa y <b><?php echo $eGFv; ?></b> fuera). Por contra el 
<b><?php echo $et2; ?></b> le ha metido <b><?php echo $eGCl + $eGCv; ?></b> (<b><?php echo $eGCl; ?></b> en casa y <b><?php echo $eGCv; ?></b> fuera).
</div>

<?php
}
}
 ?>