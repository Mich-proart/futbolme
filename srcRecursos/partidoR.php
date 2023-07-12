<a id="<?php echo $partido['id']; ?>"></a>
<?php

if (!isset($diaN)) {
    $diaN = 0;
}
if (!isset($bdPartido)) {
    $bdPartido = 0;
}
if (!isset($clase)) {
    $clase = '';
}
if (!isset($display)) {
    $display = 'inline';
}
if (!isset($equipo_id)) {
    $equipo_id = 0;
}
if (!isset($display)) {
    $display = 'block';
}
if (!isset($colorFondo)) {
    $colorFondo = '';
}
if (!isset($pag)) {
    $pag = '';
}
if (!isset($partido['tv'])) {
    $partido['tv'] = 0;
}
if (!isset($partido['partidoAPI'])) {
    $partido['partidoAPI'] = 0;
}
if (!isset($partido['acta'])) {
    $partido['acta'] = 0;
}
if (isset($partido['grupo_id']) && '' == $partido['grupo_id']) {
    $partido['grupo_id'] = 0;
}
$colorL = 'black';
$colorV = 'black';
if (isset($partido['clasificado'])) {
    if (1 == $partido['clasificado']) {
        $colorL = 'green';
        $colorV = 'red';
    }
    if (2 == $partido['clasificado']) {
        $colorL = 'red';
        $colorV = 'green';
    }
}


if (isset($partido['visible'])) {
    $visible = $partido['visible'];
} else {
    $visible = 5;
}

$pgLocal = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'];
$pgVisitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'];
$fondocolorL = '';
$fondocolorV = '';
if (isset($partido['idPais']) && $partido['idPais'] > 198) {
    if (isset($partido['temporada_id']) && 442 != $partido['temporada_id'] && 330 != $partido['temporada_id']) {
        if (60 == $partido['pais_local']) {
            $fondocolorL = '#FADF74';
        }
        if (60 == $partido['pais_visitante']) {
            $fondocolorV = '#FADF74';
        }
    }
}

$invertido = '';
$horas = 0;
$minutos = 0;

if (2 != $partido['estado_partido'] && 6 != $partido['estado_partido']) {
    $hora = time('H:m:s');
    $horaPartido = time('Y-m-d', strtotime($partido['hora_prevista']));
    $fecha1 = date('Y-m-d H:i:s');
    $fecha2 = $partido['fecha'].' '.$partido['hora_prevista'];
    $fecha1 = date_create($fecha1);
    $fecha2 = date_create($fecha2);
    $diferencia = date_diff($fecha2, $fecha1);
    //imp($diferencia);
    $meses = $diferencia->m;
    $dias = $diferencia->d;
    $horas = $diferencia->h;
    $minutos = $diferencia->i;
    $segundos = $diferencia->s;
    $invertido = $diferencia->invert;
}
/** mi propio sistema de fecha de partido */
$timezone = new DateTimeZone('Europe/Madrid');
$fechaPartido = date_create_immutable_from_format(
    'Y-m-d H:i:s',
    $partido['fecha'].' '.$partido['hora_prevista']??'00:00:00',
    $timezone
);
$fechaPartido = $fechaPartido->setTimezone(new DateTimeZone('UTC'));
$fechaFinPartido = $fechaPartido->modify('+120 minutes');

$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion(
        $partido['visitante']
    ).'/'.$partido['id'];
?>
<div class="col-xs-12 whitebox nopadding one-bordergrey-vert <?php echo $clase; ?>"
     style="display:<?php echo $display; ?>;">
    <div class="boxpartido col-xs-12 <?php echo $colorFondo; ?> nopadding" itemscope
         itemtype="http://schema.org/SportsEvent" style="padding:5px !important">
        <meta itemprop="name" content="<?= $partido['localCorto'].' - '.$partido['visitanteCorto']; ?>">
        <meta itemprop="description"
              content="Partido entre el <?= $partido['local']; ?> y el <?= $partido['visitante']; ?>">
        <span itemprop="location" itemscope itemtype="http://schema.org/Place">
            <meta itemprop="name" content="<?= $partido['estadio_nombre'] ?? 'Campo de fútbol'; ?>">
            <meta itemprop="address" content="<?= $partido['estadio_localidad'] ?? 'Campo de fútbol'; ?>">
        </span>
        <div class="col-xs-12 nopadding txt11">
            <div class="pull-left h25">
                <?php if (1 != $partido['estado_partido'] && 1 == $invertido) {
                    ?>
                    <a href="https://futbolme.com<?= $pgPartido; ?>" itemprop="url">
                    <span class="glyphicon glyphicon-asterisk iconhover" style="cursor:pointer;
				border: 1px solid black; padding: 3px;"></span>
                    </a>
                    <?php
                } else {
                    if (1 != $partido['estado_partido']) {
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                }
                if (1 == $partido['estado_partido']) {
                    ?>
                    <meta itemprop="endDate" content="<?= $fechaFinPartido->format('c'); ?>">
                    <div class="boxresultcontent_hora boldfont txt11" itemprop="startDate"
                         content="<?= $fechaPartido->format('c'); ?>">
                        <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                            $hora = ':';
                        } else {
                            $hora = substr($partido['hora_prevista'], 0, 5);
                        }
                        echo $hora; ?>
                    </div>
                    <?php
                } ?>
            </div>&nbsp;&nbsp;

            <?php
            if ('televisados' == $pag && 1 != $partido['estado_partido']) {
                $txth = $horas.' horas';
                $txtm = $minutos.' minutos';
                if (0 == $invertido) {
                    ?>
                    <meta itemprop="endDate" content="<?= $fechaFinPartido->format('c'); ?>">
                    <meta itemprop="startDate" content="<?= $fechaPartido->format('c'); ?>">
                    <b>En estos momentos...</b>
<?php
                } else {
                    if (0 == $dias) {
                        if (1 == $horas) {
                            $txth = $horas.' hora';
                        }
                        if (0 == $horas) {
                            $txth = '';
                        }
                        if ($horas > 0 && $minutos > 0) {
                            $txth .= ' y ';
                        }
                        if (1 == $minutos) {
                            $txtm = $minutos.' minuto';
                        }
                        if (0 == $minutos) {
                            $txtm = '';
                        }

                        echo 'Televisado en '.$txth.$txtm;
                    }
                }
            }
            if ($equipo_id > 0 || 'index' == $pag) {
                if (1 == $partido['tipo_torneo'] && 198 != $partido['jornada']) {
                    echo "<i style='color:dimgray'>Jornada ".$partido['jornada'].'</i> ';
                } else {
                    if (198 == $partido['jornada']) {
                        if ('index' != $pag) {
                            echo "<i style='color:dimgray'></i> ";
                        }
                    } else {
                        if ('index' != $pag) {
                            echo "<i style='color:dimgray'>".$partido['fase'].'</i> - ';
                        } else {
                            echo " <i style='color:dimgray'>".$partido['fase'];
                            if ($partido['grupo_id'] > 0) {
                                echo ' - '.$partido['nombre'];
                            }
                            echo '</i>';
                        }
                    }
                }
                if ('index' != $pag && 'seleccion' != $pag) {
                    echo $partido['nombreTorneo'];
                }
                /*if ($pag == 'index' && !isset($_SESSION['futbolme']) && isset($_SESSION['user_id']) && $_SESSION['user_id']>0) {

                    echo " - ".$partido['nombreTorneo'];
                } */
            }

            ?>

            <div class="pull-right h25">
                <a href="<?php echo $pgPartido; ?>">
				<span class="glyphicon glyphicon-eye-open iconhover" style="cursor:pointer;
				border: 1px solid black; padding:3px" title="Partido entre el <?=$partido['localCorto'];?> y el <?=$partido['visitanteCorto'];?> "></span></a>
            </div>

            <?php

            if ((isset($partido['twLocal']) && strlen(
                        $partido['twLocal']
                    ) > 3) || (isset($partido['twVisitante']) && strlen($partido['twVisitante']) > 3)) {
                ?>
                <div class="pull-right" style="margin-right: 4px !important"><img src="/img/television/twitter.png"
                                                                                  class="abrir-tw"
                                                                                  data-twitter="<?php echo $partido['id']; ?>"
                                                                                  alt="twitter" width='20' height='20'>
                </div>
                <?php
            }

            if ($partido['acta'] > 0 && 1 != $partido['estado_partido']) {
                ?>
                <div class="pull-right h25">
                    <?php
                    if (!isset($pag2)) {
                        include __DIR__.'/partidoActa.php';
                    } ?>

                </div>
                <?php
            }

            if ($partido['tv'] > 0 && 0 == $equipo_id && 1 != $partido['estado_partido'] && 'televisados' != $pag) {
                ?>
                <div class="pull-right h25" style="padding:1px; margin-right: 3px; width:30px">
                    <a href="/partidos-televisados#tv-<?php echo $partido['id']; ?>" title="partido televisado">
                        <img src='/img/tv.png' alt="partido televisado" height='18'>
                    </a>
                </div>
                <?php
            }

            /*if (isset($partido['observaciones'])) {
                if ($android==0 && substr($partido['observaciones'], 0,6)=="000000") {
                $rutaEnf="http://www.futbolplus.com/foro/mundodeportivo2.php?id=".$partido['equipoLocal_id']."&id2=".$partido['equipoVisitante_id'];
                $rutaEnf="<div class='pull-right h25 text-center' style='padding:3px; width:25px; color: black;'><a href='".$rutaEnf."' title='¡¡ Crónicas de todos sus enfrentamientos !!'><span class='glyphicon glyphicon-header' aria-hidden='true'></span></a></div>";
                if ($partido['estado_partido'] != 2) { echo $rutaEnf; }
                }
            }*/

            if (isset($temporada_id)) { $idt=$temporada_id; }
            if (!isset($idt)) { $idt=0; }
            echo "<div class='pull-right h25 text-center' style='padding:3px; width:25px;'>";
            include $nivel.'srcRecursos/partidoRmd.php';
            echo "</div>";

            /*if ($invertido==1 && $partido['partidoAPI']>0 && $dias<4 && $meses==0) {
                if ($partido['temporada_id']>24 || $partido['temporada_id']==1) {
                 $f='./json/partidos/ods'.$partido['partidoAPI'].'.json';
                 if (!@file_exists($f)) { ?>
                <div class="pull-right h25" style="padding:2px">
                 <span class="timeresult" style="cursor:pointer; font-size: 10px; background-color: #0B4C5F;" class="boldfont" onclick="apiOds(<?php echo $partido['id']?>)" title="<?php echo $partido['partidoAPI']?>">APUESTAS</span>
                 </div>
                 <?php }
                }
             }*/ ?>


        </div>


        <div class="col-xs-12 whitebox nopadding">
            <?php

            if (1 == $invertido && $dias < 4 && 0 == $meses && $partido['partidoAPI'] > 0) {
            $f = './json/partidos/ods'.$partido['partidoAPI'].'.json';
            if (@file_exists($f)) {
            $path = $f;
            $json = file_get_contents($path);
            $datos = json_decode($json, true); ?>

            <div class="col-xs-12 nopadding txt11 cajagrisclaro">

                <?php foreach ($datos

                as $key => $value) {
                if (404 == $value) {
                    break;
                }
                if ('bwin.es' != $value['odd_bookmakers']) {
                    continue;
                }
                $rutaImagen = '/img/promociones/'.$value['odd_bookmakers'].'.PNG';

                if (!@file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaImagen))) {
                    continue;
                }

                $idzone = (1788181 + $app);

                $enlace_bwin_generico = 'https://mediaserver.bwinpartypartners.com/renderBanner.do?zoneId='.$idzone;

                $enlace_apuesta = 'https://sports.bwin.es/es/sports#eventId=&leagueIds='.$partido['apuesta_torneo'].'&marketGroupId=&page=0&sportId=4&zoneId=1789262'; ?>

                <a href='<?php echo $enlace_apuesta; ?>' rel='nofollow' target="_blank">
                    <div class="col-xs-12 nopadding clear">
                        <div class="col-xs-3 nopadding text-right marco"><img style="float: right;"
                                                                              src="/img/promociones/<?php echo $value['odd_bookmakers']; ?>.PNG"
                                                                              alt="<?php echo $value['odd_bookmakers']; ?>">
                        </div>
                        <div class="col-xs-2 nopadding text-center boldfont marco"
                             style="background-color: #ddffff;"><?php echo $value['odd_1']; ?></div>
                        <div class="col-xs-2 nopadding text-center boldfont marco"
                             style="background-color: #ddffff;"><?php echo $value['odd_x']; ?></div>
                        <div class="col-xs-2 nopadding text-center boldfont marco"
                             style="background-color: #ddffff;"><?php echo $value['odd_2']; ?></div>
                </a>
                <div class="col-xs-3 nopadding marco">
                    <span style="cursor:pointer; font-size: 10px" class="boldfont"
                          onclick="apiOds(<?php echo $partido['id']; ?>)" title="<?php echo $partido['partidoAPI']; ?>">&nbsp;+ APUESTAS</span>
                </div>
            </div>
        <?php
        } ?>
        </div>
        <?php
        }
        }

        /*if ($temporada_id=598) {
        if ($partido['grupo_id']==35) { $txtG="Conferencia Este"; $colorG="yellow"; } else { $txtG="Conferencia Oeste"; $colorG="orange"; }?>
        <span style="font-size: 10px; background-color: <?php echo $colorG?>" class="boldfont" ><?php echo $txtG?></span>

        <?php }*/ ?>
    </div>

    <div class="col-xs-5 col-centered nopadding equipo-partido">
        <?php if (isset($temporada_id) || 'index' == $pag) {
            $backgroundColorL = '';
            if (!empty($fondocolorL)) {
                $backgroundColorL = 'background-color:'.$fondocolorL;
            } ?>
            <p class="pull-right boldfont lead">
                <a class="visible-xs txt13" href="<?php echo $pgLocal; ?>"
                   style="padding-right: 10px; color:<?php echo $colorL; ?>"><span style="<?php echo $backgroundColorL; ?>" itemprop="alternateName"><?php echo $partido['localCorto']; ?></span></a>
                <a class="hidden-xs" href="<?php echo $pgLocal; ?>"
                   style="padding-right: 10px; color:<?php echo $colorL;?>"><span style="<?php echo $backgroundColorL; ?>"><?php echo $partido['local']; ?></span></a>
            </p>
            <?php
        } else {
            if ($equipo_id == $partido['equipoLocal_id']) {
                ?>
                <p class="pull-right boldfont lead" style="text-decoration:underline; color:<?php echo $colorL; ?>">
                    <span class="visible-xs txt13" ><?php echo $partido['localCorto']; ?></span>
                    <span class="hidden-xs"><?php echo $partido['local']; ?></span>
                </p>
                <?php
            } else {
                ?>
                <p class="pull-right boldfont lead">
                    <a class="visible-xs txt13" href="<?php echo $pgLocal; ?>" style="color:<?php echo $colorL; ?>"><span><?php echo $partido['localCorto']; ?></span></a>
                    <a class="hidden-xs" href="<?php echo $pgLocal; ?>" style="color:<?php echo $colorL; ?>"><span><?php echo $partido['local']; ?></span></a>
                </p>
                <?php
            }
        } ?>
    </div>

    <div class="col-xs-2 col-centered resultado-partido">
        <?php if (1 == $partido['estado_partido']) {
            ?>
            <p class="reboxL pull-left"
                <?php if (strlen($partido['goles_local']) > 1) {
                    echo "style='padding: 1px 1px;'";
                } ?>
            ><?php echo $partido['goles_local']; ?></p>
            <p class="reboxR pull-right"
                <?php if (strlen($partido['goles_visitante']) > 1) {
                    echo "style='padding: 1px 1px;'";
                } ?>
            ><?php echo $partido['goles_visitante']; ?></p>
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
        if (0 == $partido['estado_partido'] || $partido['estado_partido'] > 2) {
            ?>
            <div class="text-center">
                <?php if ('index' != $pag && !isset($temporada_id)) {
                    ?>
                    <span class="text-center boldfont" style="font-size:12px"><?php echo substr(
                                $partido['fecha'],
                                -2
                            ).'/'.substr($partido['fecha'], 5, 2); ?> </span>
                    <br/>
                    <?php
                } ?>

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
    </div>

    <div class="col-xs-5 col-centered nopadding equipo-partido">

        <?php
        if (isset($temporada_id) || 'index' == $pag) {
            $backgroundColorV = '';
            if (!empty($fondocolorV)) {
                $backgroundColorV = 'background-color:'.$fondocolorV;
            } ?>
            <p class="pull-left boldfont lead">
                <a class="visible-xs txt13" href="<?php echo $pgVisitante; ?>"
                   style="padding-left: 10px; color:<?php echo $colorV; ?>;>"><span style="<?php echo $backgroundColorV;?>"><?php echo $partido['visitanteCorto']; ?></span></a>
                <a class="hidden-xs" href="<?php echo $pgVisitante; ?>"
                   style="padding-left: 10px; color:<?php echo $colorV; ?>"><span
                            itemprop="name" style="<?php echo $backgroundColorV;?>"><?php echo $partido['visitante']; ?></span></a>
            </p>
            <?php
        } else {
            if ($equipo_id == $partido['equipoVisitante_id']) {
                ?>
                <p class="pull-left boldfont lead" style="text-decoration:underline; color:<?php echo $colorV; ?>">
                    <span class="visible-xs txt13"><?php echo $partido['visitanteCorto']; ?></span>
                    <span class="hidden-xs"><?php echo $partido['visitante']; ?></span>
                </p>
                <?php
            } else {
                ?>
                <p class="pull-left boldfont lead">
                    <a class="visible-xs txt13" href="<?php echo $pgVisitante; ?>" style="color:<?php echo $colorV; ?>"
                       itemprop="url"><span><?php echo $partido['visitanteCorto']; ?></span></a>
                    <a class="hidden-xs" href="<?php echo $pgVisitante; ?>" style="color:<?php echo $colorV; ?>"><span><?php echo $partido['visitante']; ?></span></a>
                </p>
                <?php
            }
        } ?>
    </div>
    <?php

    if (isset($partido['ida']) && 95 != $partido['jornada']) {
        ?>
        <div class="col-xs-12">
            <p class="w100 text-center" style="background-color:white;">
                <?php $ida = explode(',', $partido['ida']);

                //imp($ida);
                $ida_resulcasa = $ida[0];
                $ida_resulfuera = $ida[1];
                $ida_jornada = $ida[2];
                $ida_fecha = $ida[3];
                if (!isset($ida[5])) {
                    $ida[5] = 1;
                }
                $ida_tipo = $ida[5];
                if (2 == $ida_tipo) {
                    if ($partido['fecha'] > $ida_fecha) {
                        $txtFecha = 'IDA';
                    } else {
                        $txtFecha = 'VUELTA';
                    }
                    echo $txtFecha; ?>: <b><?php echo $ida_resulfuera; ?> - <?php echo $ida_resulcasa; ?></b>
                    <?php if ($partido['estado_partido'] > 0) {
                        $global_casa = ($partido['goles_local'] + $ida_resulfuera);
                        $global_fuera = ($partido['goles_visitante'] + $ida_resulcasa); ?>
                        :: Global: <b><?php echo $global_casa; ?> - <?php echo $global_fuera; ?></b>
                        <?php
                    }
                } ?>
            </p>
        </div>
        <div class="clear"></div>
        <?php
    }

    if ((isset($partido['twLocal']) && strlen($partido['twLocal']) > 3) || (isset($partido['twVisitante']) && strlen(
                $partido['twVisitante']
            ) > 3)) {
        ?>


        <div id="log-tw-<?php echo $partido['id']; ?>" class="hide"></div>
        <?php
    }
    //            if (!isset($tarjetas) && $partido['estado_partido'] > 0) {

    if (!isset($tarjetas) && $partido['estado_partido'] > 0) { //en temporada_id no entra a ver goles.
        if (isset($temporada_id)) {
            $partido['temporada_id'] = $temporada_id;
        }
        $origen = 'index';
        $partido_id = $partido['id'];
        if (!isset($pag)) {
            $pag = '';
        }

//                if ('index' != $pag || $diaN < 6 || 214 == $partido['temporada_id']) {

        include $nivel.'srcRecursos/pargolesR.php';
    }

    if (isset($partido['observaciones']) && strlen($partido['observaciones']) > 5) {
        ?>
        <div class="col-xs-12 nopadding">
            <?php $cadena = desglosarTexto($partido['observaciones']);
            include $nivel.'srcRecursos/partidoObsR.php'; ?>
        </div>
        <div class="clear" style="height: 5px !important;"></div>
        <?php
    } 
//9
     if ($partido['temporada_id']==216) {
     include $nivel.'srcRecursos/partidoAlineaciones.php';
     }



 ?>

<?php
if ($partido['id']==247184) { //Sanluqueño - Yeclano  ?>
<a href="https://www.footters.com/watch/atletico-sanluqueno-cf-senior-vs-yeclano-deportivo-senior-16062018?utm_source=social&utm_medium=banner&utm_campaign=futbolme&utm_content=sanluqueño_yeclano_playoff" target="_blank">
<img src='/img/partners/footters16x16.png' width='20' height='20'> Partido televisado por https://www.footters.com</a>
<?php } ?>

<?php
if ($partido['id']==247192) { //Socuellamos - Unionistas ?>
<a href="https://www.footters.com/watch/yugoud-socuellamos-cf-senior-vs-unionistas-salamanca-cf-senior-17062018?utm_source=social&utm_medium=banner&utm_campaign=futbolme&utm_content=socuellamos_unionistas_playoff" target="_blank">
<img src='/img/partners/footters16x16.png' width='20' height='20'> Partido televisado por https://www.footters.com</a>
<?php } ?>

<?php
if ($partido['id']==247188) { //UD San Fernando - Durango ?>
<a href="https://www.footters.com/watch/ud-san-fernando-senior-vs-scd-durango-senior-17062018?utm_source=social&utm_medium=banner&utm_campaign=futbolme&utm_content=sanfernando_durango_playoff" target="_blank">
<img src='/img/partners/footters16x16.png' width='20' height='20'> Partido televisado por https://www.footters.com</a>
<?php } ?>

<?php
if ($partido['id']==247186) { //Salmantino - Compostela  ?>
<a href="https://www.footters.com/watch/cf-salmantino-uds-senior-vs-sd-compostela-senior-17062018?utm_source=social&utm_medium=banner&utm_campaign=futbolme&utm_content=salmantino_compostela_playoff" target="_blank">
<img src='/img/partners/footters16x16.png' width='20' height='20'> Partido televisado por https://www.footters.com</a>
<?php } 

if ($partido['id']==247198) { //Portugalete - Castellón ?>
<a href="https://www.footters.com/watch/club-portugalete-senior-vs-cd-castellon-senior-17062018?utm_source=social&utm_medium=banner&utm_campaign=futbolme&utm_content=portugalete_castellon_playoff" target="_blank">
<img src='/img/partners/footters16x16.png' width='20' height='20'> Partido televisado por https://www.footters.com</a>
<?php }





//9
    ?>


</div>

</div>

<?php
if (isset($_SESSION['user_id']) && 23 == $_SESSION['user_id']) {
    include 'srcRecursos/_partidoTW.php';
} ?>



