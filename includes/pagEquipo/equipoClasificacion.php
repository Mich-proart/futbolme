<?php  $jornadaActiva=0;
        if (isset($ePartidos) && isset($e_racha) && $tipoVista < 10) {
            $jornadaActiva=(count($e_racha)-1);
            require_once 'includes/graficos/puntosYgoles.php';
        } ?>
        <ul class="nav nav-tabs nopadding celestebox txt11" role="tablist" id="pestaTemporada">
            <li class="text-center boldfont <?php echo $pesPuntos; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Puntos">Puntos</a>
            </li>
            <li class="text-center boldfont <?php echo $pesJugados; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Jugados">Jugados</a>
            </li>
            <li class="text-center boldfont <?php echo $pesGanados; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Ganados">Ganados</a>
            </li>
            <li class="text-center boldfont <?php echo $pesEmpatados; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Empatados">Empatados</a>
            </li>
            <li class="text-center boldfont <?php echo $pesPerdidos; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Perdidos">Perdidos</a>
            </li>
            <li class="text-center boldfont <?php echo $pesFavor; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Favor">G-Favor</a>
            </li>
            <li class="text-center boldfont <?php echo $pesContra; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Contra">G-Contra</a>
            </li>
            <li class="text-center boldfont <?php echo $pesEstadisticas; ?>">
                <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion&vista=Estadisticas">Estadísticas</a>
            </li>
        </ul>

        <?php

        if (isset($ePartidos) && $tipoVista < 8) {
            ?>
            <div class="col-xs-12 nopadding">
                <table class="table table-bordered table-condensed whitebox nomargin">
                    <?php
                    $gcT=0;$gfT=0;$ecT=0;$efT=0;$pcT=0;$pfT=0;$gfcT=0;$gffT=0;$gccT=0;$gcfT=0;

                    $partidos = $ePartidos['partidos'];
                    foreach ($partidos as $fila) {                        

                        if (1 != $fila['tipo_torneo']) {
                            continue;
                        }
                        if ($fila['estado_partido'] < 1 || $fila['estado_partido'] > 2) {
                            continue;
                        }
                        if (1 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] < $fila['goles_visitante']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] > $fila['goles_visitante']) {
                                continue;
                            }
                        }

                        if (3 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] <= $fila['goles_visitante']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] >= $fila['goles_visitante']) {
                                continue;
                            }
                        }
                        if (4 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] != $fila['goles_visitante']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] != $fila['goles_visitante']) {
                                continue;
                            }
                        }
                        if (5 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] >= $fila['goles_visitante']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] <= $fila['goles_visitante']) {
                                continue;
                            }
                        }
                        if (6 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && 0 == $fila['goles_local']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && 0 == $fila['goles_visitante']) {
                                continue;
                            }
                        }
                        if (7 == $tipoVista) {
                            if ($equipo_id == $fila['equipoLocal_id'] && 0 == $fila['goles_visitante']) {
                                continue;
                            }
                            if ($equipo_id == $fila['equipoVisitante_id'] && 0 == $fila['goles_local']) {
                                continue;
                            }
                        }
                        if ($equipo_id == $fila['equipoLocal_id']) {
                            $Flocal = 'color:rgb(232, 28, 28);;';
                            $Fvisitante = 'color:black;';
                        }
                        if ($equipo_id == $fila['equipoVisitante_id']) {
                            $Flocal = 'color:black;';
                            $Fvisitante = 'color: rgb(232, 28, 28);';
                        } 

$equipo_id=(int)$equipo_id;

if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] < $fila['goles_visitante'])
    || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] > $fila['goles_visitante'])) {
    if ($equipo_id == $fila['equipoLocal_id']) { 
        $colorI='#B40404';$pcT++; 
    } else { 
        $colorI='#FE642E';$pfT++;
    }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">D</span>';
}

if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] > $fila['goles_visitante'])
    || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] < $fila['goles_visitante'])) {
    if ($equipo_id == $fila['equipoLocal_id']) { 
        $colorI='#0B610B'; $gcT++;
    } else { 
        $colorI='#01DF01'; $gfT++;
    }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">V</span>';
}


if ($fila['goles_local'] == $fila['goles_visitante']) {
    if ($equipo_id == $fila['equipoLocal_id']) { 
        $colorI='orange'; $ecT++;
    } else { 
        $colorI='#FACC2E'; $efT++;
    }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.';">E</span>';
}

if ($equipo_id == $fila['equipoLocal_id']) {
    $gfcT=($gfcT+$fila['goles_local']);$gccT=($gccT+$fila['goles_visitante']);
    $iconoGF='<span class="badge" style="font-weight:300; background-color:#0B2161">'.$fila['goles_local'].'</span>';
    $iconoGC='<span class="badge" style="font-weight:300; background-color:#424242">'.$fila['goles_visitante'].'</span>';
}
if ($equipo_id == $fila['equipoVisitante_id']) {
    $gffT=($gffT+$fila['goles_visitante']);$gcfT=($gcfT+$fila['goles_local']);
    $iconoGF='<span class="badge" style="font-weight:300; background-color:#013ADF">'.$fila['goles_visitante'].'</span>';
    $iconoGC='<span class="badge" style="font-weight:300; background-color:#A4A4A4">'.$fila['goles_local'].'</span>';
}






                        ?>
                        <tr style="background-color:#ECF6CE;">
                            <td style="width:14%;text-align:center;">

                                <?php
                                if (198 != $fila['jornada']) {
                                    echo 'J '.$fila['jornada'];
                                } else {
                                    echo $fila['fecha'];
                                } 

                                $pgEnlace1 = '/resultados-directo/equipo/'.poner_guion($fila['local']).'/'.$fila['equipoLocal_id'].'&modelo=Clasificacion&vista='.$vista;
                                $pgEnlace2 = '/resultados-directo/equipo/'.poner_guion($fila['visitante']).'/'.$fila['equipoVisitante_id'].'&modelo=Clasificacion&vista='.$vista;
?>

                            </td>
                            <td style="width:36%;text-align:right;"><a href="<?php echo $pgEnlace1; ?>" style="<?php echo $Flocal; ?>"><?php echo $fila['localCorto']; ?></a></td>
                            <td style="width:14%;text-align:center;"
                                class="boldfont"><?php echo $fila['goles_local']; ?>
                                - <?php echo $fila['goles_visitante']; ?></td>
                            <td style="width:36%;text-align:left;"><a style="<?php echo $Fvisitante; ?>" href="<?php echo $pgEnlace2; ?>"><?php echo $fila['visitanteCorto']; ?></a></td>
                            <td><?php echo $icono?></td>
                            <td class="hidden-xs"><?php echo $iconoGF?></td>
                            <td class="hidden-xs"><?php echo $iconoGC?></td>
                        </tr>
                        <?php
                    } ?>


                    <tr class="cajagrisoscuro">
                        <td class="text-center" colspan="8">
<div class="col-xs-12" style="float:left;">
    <div class="marco" style="float:left;">    
    G - <?php echo $gcT+$gfT?>                           
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT?></span>
    </div><div class="marco" style="float:left;">
    E - <?php echo $ecT+$efT?>
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT?></span>
    </div><div class="marco" style="float:left;">
    P - <?php echo $pcT+$pfT?>
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT?></span>
    </div><div class="marco" style="float:left;">
    GF - <?php echo $gfcT+$gffT?> 
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT?></span>
    </div><div class="marco" style="float:left;">
    GC - <?php echo $gccT+$gcfT?> 
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT?></span>
    </div>
</div>

                        </td>
                    </tr>






                </table>
            </div>
            <?php
        }

        if (isset($ePartidos) && isset($e_racha) && $tipoVista < 10) {
            $temporada_id=$liga;
            require_once 'srcRecursos/pesClasificacion.php';
        } else {
            if (isset($e_racha)) {
                require_once 'srcRecursos/pesClasificacionEstadisticas.php';
            }
        }
