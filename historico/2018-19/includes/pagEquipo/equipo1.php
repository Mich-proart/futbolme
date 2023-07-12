<?php
//imp($liga);
?>
    <div class="col-xs-12 whitebox nopadding txt11 clear">
        <ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">
            
            <?php if ($liga > 0 && isset($ePartidos['partidos'])) {
                ?>
                <li class="text-center boldfont <?php echo $pesCalendario; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Calendario">Calendario</a>
                </li>
               
                <?php
            } ?>
            <?php if ($liga > 0 && $liga < 25 || 214 == $liga || 7 == $visible) { ?>
                <li class="text-center boldfont <?php echo $pesPlantilla; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Plantilla">Plantilla</a>
                </li>
            <?php } ?>

            <li class="text-center boldfont active pull-right">
        <a href="/equipo.php?id=<?php echo $equipo_id?>" style=" cursor:pointer;">Volver a futbolme</a> 
        </li>
            
          
          
        </ul>

        

        <div class="col-xs-4 text-center">
            <?php $rutaEscudo = '/img/equipos/escudo'.$equipo_id.'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            }
            ?>
            <img src="<?php echo $rutaEscudo; ?>" class="img-rounded" alt="escudo">
        </div>

    </div>


<?php


switch ($modelo) {
    

    case 'Calendario': ?>
        

        <ul class="nav nav-tabs nopadding txt11 celestebox" role="tablist" id="pestaTemporada">
            <?php

            if (isset($_GET['vista'])) {
                $temporada_id = $_GET['vista'];
            } else {
                $temporada_id = $liga;
            }
            $nt = '';
            $tt = 0;
            $pgTemporada2 = '';

            foreach ($torneos as $key => $value) {
                $value['nombreTorneo'] = str_replace('CAMPEONATO', 'CTO.', $value['nombreTorneo']);
                if ($key == $temporada_id) {
                    $active = 'active';
                    $nt = $value['nombreTorneo'];
                    $tt = $value['tipo_torneo'];
                    $pgTemporada2 = 'index.php?modo=t&id='.$temporada_id;
                } else {
                    $active = '';
                } ?>
                <li class="text-center boldfont <?php echo $active; ?>">
                    <a href="index.php?modo=e&id=<?php echo $equipo_id; ?>&modelo=Calendario&vista=<?php echo $key; ?>&nv=<?php echo $value['nombreTorneo']; ?>"><?php echo $value['nombreTorneo']; ?></a>
                </li>
                <?php
            }

            /*imp($porTorneos);
            imp($temporada_id);
            die;*/
            if (isset($porTorneos[$temporada_id])) {
                $partidosLiga = $porTorneos[$temporada_id];
                $partidosLiga = array_reverse($partidosLiga);
            } else {
                $partidosLiga = array(); //puede ser que no tengamos aún calendario
            }

            ?>

        </ul>

        <div style="clear:both" class="col-xs-12">
            <?php if ($partidosLiga[0]['tipo_torneo']==1) {?>
            
            <h4 class="boldfont text-center"><a href="<?php echo $pgTemporada2; ?>"><?php echo $nt; ?></a></h4>
            <?php } 

            $puntosAlDescanso = 0;
            $puntosAlFinal = 0;

            foreach ($partidosLiga as $partido) {
                if (442 == $temporada_id && $partido['fecha'] < '2017-05-01') {
                    continue;
                }

                if (442 == $temporada_id && $partido['estado_partido'] !=1) {
                    continue;
                }
                if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                    ?>
                    <div class="boxresultcontent cajagrisclaro">

                        <div style="float:left; width:30px; text-align:center;">
                            <?php if (598 != $partido['temporada_id']) {
                                echo 'J '.$partido['jornada'];
                            } ?>
                        </div>

                        <div style="float:left; margin-left:10px; height:auto; text-align:right">
                            <span><?php echo utf8_encode(nombreDia($partido['fecha'])); ?></span>
                            <span class="boldfont" style="margin-left: 20px;">Descansa
                                <?php if (null == $partido['equipoLocal_id']) {
                                    ?>
                                    <?php echo $partido['visitante']; ?>
                                    <?php
                                } else {
                                    ?>
                                    <?php echo $partido['local']; ?>
                                    <?php
                                } ?>
							</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php
                    continue;
                }

                $enlaceP = 'index.php?modo=p&id='.$partido['id'];
                $enlace_partido = 'index.php?modo=p&id='.$partido['id'];
                $enlace_local = 'index.php?modo=e&id='.$partido['equipoLocal_id'];
                $enlace_visitante = 'index.php?modo=e&id='.$partido['equipoVisitante_id'];
                if (isset($puntos)) {
                    unset($puntos);
                }
                if ('' != $partido['goles_local'] && '' != $partido['goles_visitante'] && '1' == $partido['tipo_torneo'] && '1' == $partido['estado_partido']) {
                    $puntos = 0;
                    $class = 'colores_fondo_resultados_perdido';
                    if ($partido['goles_local'] == $partido['goles_visitante']) {
                        $puntos = 1;
                        $class = 'colores_fondo_resultados_empatado';
                    } elseif ($equipo_id == $partido['equipoLocal_id']) {
                        if ($partido['goles_local'] > $partido['goles_visitante']) {
                            $puntos = 3;
                            $class = 'colores_fondo_resultados_ganado';
                        }
                    } else {
                        if ($partido['goles_visitante'] > $partido['goles_local']) {
                            $puntos = 3;
                            $class = 'colores_fondo_resultados_ganado';
                        }
                    }
                }
                $hora_prevista = $partido['hora_prevista'];
                $colorFila = 'white';
                $colorL = 'background-color:white';
                $colorV = 'background-color:white'; ?>
                <div class="boxresultcontent row horizontaldivider nomargin whitebox">
                    <div class="col-xs-12 col-md-12 col-lg-12 whitebox nopadding"
                         style="background-color:<?php echo $colorFila; ?>">
                        <?php include 'partidoEquipo.php'; ?>
                        <div id="youtube-<?php echo $partido['id']; ?>" class="col-xs-12 nopadding text-center"></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
        <?php
        if (1 == $partido['tipo_torneo']) {
            ?>
            <div class="col-xs-12 marco">
                <div class="col-xs-6 text-center">
                    <h4>Puntos al descanso: <b><?php echo $puntosAlDescanso; ?></b></h4>
                </div>
                <div class="col-xs-6 text-center">
                    <h4>Puntos al final: <b><?php echo $puntosAlFinal; ?></b></h4>
                </div>
            </div>
            <?php
        }

        break;

    case 'Plantilla': ?>
        


        <?php require_once 'pesPlantilla.php';
        break;    


}

?>