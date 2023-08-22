<?php
date_default_timezone_set('Europe/Madrid');
$temporada_id = $partido['temporada_id'];
$jornada = $partido['jornada'];
$comunidad_id = ($partido['comunidad_id'] - 1);
$competicion_id = $partido['apiRFEFcompeticion'];
$grupo_id = $partido['apiRFEFgrupo'];
$fase_id = $partido['apifutbol'];
$partido['hora_real'] = $partido['hora_real'] ?? '00:00:00';
$comentarios = $partido['comentario'] ?? '';
$clasificado = $partido['clasificado'] ?? 0;
$partido['betsapi'] = $partido['betsapi'] ?? 0;
$parte = 0;
$minutos = 0;
$pagina = '';
$colorL = 'black';
$colorV = 'black';
$fondocolorL = "white";
$fondocolorV = "white";




if ($partido['estado_partido'] == 2 && $partido['betsapi'] == 1) {

    $dDirecto = date_diff($fecha2, $fecha1);
    $horasD = 0;
    $minutosD = 0;
    $segundosD = 0;
    $invertidoD = 0;
    $horasD = $dDirecto->h;
    $minutosD = $dDirecto->i;
    $segundosD = $dDirecto->s;
    $invertidoD = $dDirecto->invert;
    $mHD = ($horasD * 60) + $minutosD;

    //imp($dP);

    $mPartido = (($dP->h * 60) + $dP->i);
    //imp($mPartido);


    if ($minutosD < 55 && $mPartido < 60) {
        $parte = 1;
        $minutos = $minutosD;
    }
    if ($minutosD < 55 && $mPartido > 59 && $mPartido < 120) {
        $parte = 2;
        $minutos = $minutosD + 45;
    }
    if ($minutosD < 20 && $mPartido > 119 && $mPartido < 135) {
        $parte = 3;
        $minutos = $minutosD + 90;
    }
    if ($minutosD < 20 && $mPartido > 134) {
        $parte = 4;
        $minutos = $minutosD + 105;
    }



    $comentarios = $parte . "-" . $minutos . "-0" . $partido['comentario'];
}



if (isset($partido['fecha'])) {
    $timezone = new DateTimeZone('Europe/Madrid');
    $fechaPartido = date_create_immutable_from_format('Y-m-d H:i:s', $partido['fecha'] . ' ' . $partido['hora_prevista'] ?? '00:00:00', $timezone);
    $fechaPartido = $fechaPartido->setTimezone(new DateTimeZone('UTC'));
    $fechaFinPartido = $fechaPartido->modify('+120 minutes');
}

if ('11' == substr($partido['hora_prevista'], -2)) {
    $hora = ':';
} else {
    $hora = substr($partido['hora_prevista'], 0, 5);
}

if ($hora != $h) {
    if ($colorFondo == 'white') {
        $colorFondo = 'gainsboro';
    } else {
        $colorFondo = 'white';
    }
}

$estadoPartido = '--';
if ($partido['estado_partido'] > 1 && $pagina != 'televisados') {
    $colorTexto = "white";
    if (strlen($comentarios) > 2) {
        unset($t);
        $t = explode('-', $comentarios);
        if (isset($t[3])) {
            $ev = $t[3];
        }
        //var_dump($t);
        if (isset($t)) {
            $t['color'] = '#f07474';
            if (1 == $t[0]) {
                $t['color'] = '#f07474';
            }
            if (2 == $t[0]) {
                $t['color'] = '#7cc002';
            }
            if (3 == $t[0]) {
                $t['color'] = '#610B0B';
            }
            if (4 == $t[0]) {
                $t['color'] = '#0B3B0B';
            }
            $t['tiempo'] = 'Minuto ' . $t[1];
            if (isset($t[2]) && $t[2] > 0) {
                $t['tiempo'] .= '<span style="font-size:11px; color:white; float:right;"> +' . $t[2] . '</span>';
            }
        }
    }

    if (6 == $partido['estado_partido']) {
        $t['color'] = '#ffe400';
        $t['tiempo'] = 'Descanso';
        $colorTexto = 'maroon';
    }
    if (7 == $partido['estado_partido']) {
        $t['color'] = '#2E2E2E';
        $t['tiempo'] = 'Penaltis';
    }
    if (8 == $partido['estado_partido']) {
        $t['color'] = 'blue';
        $t['tiempo'] = 'Prórroga';
    }

    $estadoPartido = '<span style="background-color:' . $t['color'] . '; color:' . $colorTexto . ' !important">' . $t['tiempo'] . '</span>';
}

$resultado = '-:-';
if (1 == $partido['estado_partido']) {
    $resultado = $partido['goles_local'] . ' - ' . $partido['goles_visitante'];
}
if ($partido['estado_partido'] > 2) {
    if (3 == $partido['estado_partido']) {
        $resultado = 'SUSP.';
        $estadoPartido = '--';
    }
    if (4 == $partido['estado_partido']) {
        $resultado = 'APLZ.';
        $estadoPartido = '--';
    }
}
if ($partido['estado_partido'] == 2 || $partido['estado_partido'] == 6) {
    $resultado = '<span style="color:red">' . $partido['goles_local'] . ' - ' . $partido['goles_visitante'] . '</span>';
}
?>


<tr bgcolor="<?php echo $colorFondo ?>">
    <td style="width: 80px;"><?php echo trim($partido['betsapi']) ?></td>
    <td title="<?php echo $partido['temporada_nombre'] ?>"><?php echo $partido['temporada_nombre'] ?>






    </td>
    <td style="width: 60px;" align="center"><?php echo $hora ?></td>
    <td style="width: 120px;" align="center"><?php echo $estadoPartido ?></td>
    <td align="center" title="<?php echo $partido['localCorto'] ?> - <?php echo $partido['visitanteCorto'] ?>"><?php echo $partido['localCorto'] ?> - <?php echo $partido['visitanteCorto'] ?></td>
    <td style="width: 60px;" align="center"><?php echo $resultado ?></td>
</tr>




<?php $h = $hora;

/*
<table cellpadding="1" cellspacing="2" bgcolor="black" width="100%">
    <tr bgcolor="beige">
        <td>
            <?php echo $partido['temporada_nombre']; ?> 
           - <a href="agendaTwitt.php?id=<?php echo $partido['id']?>">+ Opciones</a>
            <?php if (isset($partido['tl']) || isset($partido['tv'])) {
                    if (strlen($partido['tl'])>0 || strlen($partido['tv'])>0) { echo " (TW)"; } 
            }
            if ($variable==1){ ?>
            <div id="j-<?php echo $jornada?>-<?php echo $grupo_id?>"></div>
            <?php } ?>
        </td>

        <td bgcolor="<?php echo $colorFondo; ?>">
        <?php if ($partido['estado_partido']>0) {?>
            
                <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                    $hora = ':';
                } else {
                    $hora = substr($partido['hora_prevista'], 0, 5);
                }
                echo $hora; ?>
        <?php } ?>
        </td>

    <td>            
        <?php  if ($partido['estado_partido']>1 && $pagina!='televisados') { 
        $colorTexto="white";
            if (strlen($comentarios)>2) {
                 unset($t);
                $t = explode('-', $comentarios);

                if (isset($t[3])){$ev=$t[3];}
                //var_dump($t);
                if (isset($t)) {
                    //var_dump($t);
                    $t['color'] = '#f07474';
                    if (1 == $t[0]) {
                        $t['color'] = '#f07474';
                    }
                    if (2 == $t[0]) {
                        $t['color'] = '#7cc002';
                    }
                    if (3 == $t[0]) {
                        $t['color'] = '#610B0B';
                    }
                    if (4 == $t[0]) {
                        $t['color'] = '#0B3B0B';
                    }
                    
                    $t['tiempo'] = 'Minuto '.$t[1];
                    if (isset($t[2]) && $t[2]>0) {
                        $t['tiempo'].= '<span style="font-size:11px; color:white; float:right;"> +'.$t[2].'</span>';
                    }
                }
                if (6 == $partido['estado_partido']) {
                    $t['color'] = '#ffe400';
                    $t['tiempo'] = 'Descanso';
                    $colorTexto = 'maroon';
                }
                if (7 == $partido['estado_partido']) {
                    $t['color'] = '#2E2E2E';
                    $t['tiempo'] = 'Penaltis';
                }
                if (8 == $partido['estado_partido']) {
                    $t['color'] = 'blue';
                    $t['tiempo'] = 'Prórroga';
                }

                //if ($partido['partido_id']==189906) {imp($t);}
            } ?>

        <div class="infopwhitebox">
            <?php if (6 == $partido['estado_partido']) {?>  
                <p class="timeresult" style="background-color: #ffe400; color: maroon !important">Descanso</p>
                <?php }
            if (7 == $partido['estado_partido']) { ?>
                <p class="timeresult" style="background-color:#2E2E2E">Penaltis</p>
                <?php }
            if (8 == $partido['estado_partido']) { ?>
                <p class="timeresult" style="background-color:blue">Prórroga</p>                    
                <?php }
            if (9 == $partido['estado_partido']) {
            echo '<p class="timeresult" style="background-color:'.$t['color'].'">'.$t['tiempo'].'</p>';
            }
            if (10 == $partido['estado_partido']) {
                echo '<p class="timeresult" style="background-color:'.$t['color'].'">'.$t['tiempo'].'</p>';
            }
            if (11 == $partido['estado_partido']) {
                echo '<p class="timeresult tryellow">Desc.Prórr.</p>';
            }
            if (2 == $partido['estado_partido']) { 
                echo '<p class="timeresult" style="background-color:'.$t['color'].'; color:'.$colorTexto.' !important">'.$t['tiempo'].'</p>';
            } ?>
        </div>
        <?php }?>
    </td>

    <td>
        <?php echo $comentarios." ";?>
        <?php if ($partido['betsapi']>1){ ?>
            <span class="pull-right boldfont">BS</span>
        <?php } ?>
        <?php if ($partido['betsapi']==1){ ?>
            <span class="pull-right boldfont">Manual</span>
        <?php } ?>
    </td>
</tr>



<tr bgcolor="white">

<td colspan="4">
    <span>
        <a class="txt11" 
           style="padding-right: 10px; color:<?php echo $colorL; ?>; background-color:<?php echo $fondocolorL; ?>"><span itemprop="name"><?php echo $partido['localCorto']; ?></span></a>
    </span>
</td>
<td style="min-width: 60px; background-color:gainsboro; text-align:center; padding: 2px;">
    <?php if (1 == $partido['estado_partido']) {
        ?>
        <span class="reboxL pull-left"
            <?php if (strlen($partido['goles_local']) > 1) {
                echo "style='padding: 1px 1px;'";
            } ?>
        ><?php echo $partido['goles_local']; ?></span> - 
        <span class="reboxR pull-right"
            <?php if (strlen($partido['goles_visitante']) > 1) {
                echo "style='padding: 1px 1px;'";
            } ?>
        ><?php echo $partido['goles_visitante']; ?></span>
        <?php
    } ?>
    <?php if ($partido['estado_partido'] > 2) {
        ?>
        <div class="text-center boldfont" style="color:tomato; font-size:12px;">
            <?php if (3 == $partido['estado_partido']) {
                echo 'SUSP.';
            } ?>
            <?php if (4 == $partido['estado_partido']) {
                echo 'APLZ.';
            } ?>
        </div>
        <?php
    }

    if ($partido['estado_partido'] == 2 || $partido['estado_partido'] >5 ) { ?>
    <p class="reboxL pull-left <?php if (5 == $ev) {
        echo 'parpadea';
    }?>" style="background: #c31e1e;">
        <?php echo $partido['goles_local']; ?>
        </p>
        <p class="reboxR pull-right <?php if (6 == $ev) {
        echo 'parpadea';
    }?>" style="background: #c31e1e;">
        <?php echo $partido['goles_visitante']; ?>
        </p>
    <?php }

    if (0 == $partido['estado_partido'] || ($partido['estado_partido'] > 2 && $partido['estado_partido'] < 6)) {
        ?>
        <div class="text-center">
            <span class="text-center marco" style="background-color:dimgray; color:white; padding:2px;">
            <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                        $hora = ':';
                    } else {
                        $hora = substr($partido['hora_prevista'], 0, 5);
                    }
                    echo $hora; ?>
            </span>
        </div>
        <?php
    } ?>
</td>

<td>
    <p class="pull-left boldfont lead">
        <a class="txt11" 
           style="padding-left: 10px; color:<?php echo $colorV; ?>; background-color:<?php echo $fondocolorV; ?>"><span itemprop="name"><?php echo $partido['visitanteCorto']; ?></span></a>                
    </p>
</td>

<td></td>
</tr>
<tr><td colspan="4">
<div id="p-<?php echo $partido['id']?>"></div>
</td></tr>
</table>

*/ ?>