<?php
//imp($modelo);
?>
    <div class="col-xs-12 whitebox nopadding txt11 clear">
        <ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">
            <?php if (1 == $es_nacional) {
                ?>
                <li class="text-center boldfont <?php echo $pesDatos; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Datos">Datos</a>
                </li>
                <?php
            } 

            if ($totalPartidos > 0) { ?>
                <li class="text-center boldfont  <?php echo $pesCalendario; ?>">
                    <a class="boldfont" href="<?php echo $pgEquipo; ?>&modelo=Calendario">Calendario</a>
                </li>
                <?php
            } 

             if ($liga > 0) { ?>
                <li class="text-center boldfont <?php echo $pesClasificacion; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Clasificacion">Clasificación</a>
                </li>
            <?php } 


             if ($division > 0 && $division < 6 || 214 == $liga) { ?>
                <li class="text-center boldfont <?php echo $pesPlantilla; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Plantilla">Plantilla</a>
                </li>
            <?php }  ?>
            <?php if ($division > 0 && $division < 25 || 214 == $liga) { ?>            
                <li class="text-center boldfont <?php echo $pesFichajes; ?>">
                    <a href="<?php echo $pgEquipo; ?>&modelo=Fichajes">Fichajes</a>
                </li>
            <?php } ?>
           
            <?php if (isset($equipos) && count($equipos) > 1) { ?>
                <li class="text-center boldfont <?php echo $pesEquipos; ?>">
                    <a href="<?php echo $pgEquipo; ?>?modelo=Equipos">Equipos</a>
                </li>
                <?php
            } ?>
            
                        
            
            <?php if (count($posiciones)>0) { ?>  
            <li class="text-center boldfont <?php echo $pesHistorico?>">
            <a href="<?php echo $pgEquipo?>&modelo=Historico">Histórico</a>
            </li>
            <?php } 



            $miFutbolme=0;
            if ($liga > 0) { 
                foreach ($_SESSION['equipos'] as $value) {
                    if (isset($value['equipo_id']) && $equipo_id==$value['equipo_id']){ $miFutbolme=1; }
                } 

                if ($miFutbolme==0) { ?>
                <li class="text-center boldfont hide">
                    <a class="boldfont" href="/widgets.php?equipo_id=<?php echo $equipo_id; ?>">Widgets</a>
                </li>
                <li class="text-center boldfont">
                    <a class="boldfont" href="/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id=<?php echo $equipo_id; ?>">Agregar a Mi futbolme</a>
                </li>
                <?php }
            } ?>
        </ul>

        <div class="col-xs-8 text-center">
            <h3><?php echo $equipotxt; ?></h3>
            <h5><?php echo $categoriatxt; ?></h5>
            
        </div>

        <div class="col-xs-4 text-center">
            <?php $rutaEscudo=rutaEscudo($club_id, $equipo_id);
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            }
            ?>
            <img src="<?php echo $rutaEscudo; ?>" class="escudo_ind" alt="escudo">
        </div>
        <div class="clear"></div>

        <div id="13939-2" style="height: 255px !important">
            <script src="//ads.themoneytizer.com/s/gen.js?type=2"></script>
            <script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=2" ></script>
        </div>
        
        <div class="clear"></div>

        

        

    </div>


<?php


switch ($modelo) {
    case 'Datos': ?>
        <div class="col-xs-12 marconegro">
            <?php require_once 'includes/publicidad/cuerpo03.php'; ?>
        </div>

        <div class='col-xs-12'>
            <div class='col-xs-6 text-right'>
                <h4 class="col-xs-12 boldfont"><?php echo $equipoClub['nombreEstadio']; ?></h4>
                <span style="margin-right:18px">
				<?php
                if (strlen($equipoClub['direccionEstadio']) > 5) {
                    echo $equipoClub['direccionEstadio'].' - ';
                }
                echo '<b>'.$equipoClub['localidadEstadio'].'</b>'; ?>					
				</span>
                <hr/>
                <h5>Año de inauguración: <?php echo $equipoClub['inaguracion']; ?></h5>
                <h5>Capacidad: <?php echo $equipoClub['capacidad']; ?></h5>
            </div>
            <?php
            $rutaEstadio = '/img/estadios/estadi'.$equipoClub['estadio_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEstadio))) {
                $rutaEstadio = '/img/jugadores/NI.png';
            }

            ?>
            <div class='col-xs-6'>
                <img style='max-width:300px' src='<?php echo $rutaEstadio; ?>' alt="campo de futbol">
            </div>

            <span class="pull-right marco boldfont">Puedes enviar fotos y datos de estadios a jugadores@futbolme.net</span>
        </div>


        <div class='col-xs-12'>
            <div class='col-xs-7 marco' style='background-color: gainsboro'>
                <h5 class="text-center">Datos del club</h5>
                <p><h4><strong><?php echo $equipoClub['nombre_completo']; ?></strong></h4>
                <?php
                $fundado = 0;
                if ($equipoClub['fundado'] > 0 || $equipoClub['efundado'] > 0) {
                    if ($equipoClub['efundado'] > 0) {
                        $fundado = $equipoClub['efundado'];
                    } else {
                        $fundado = $equipoClub['fundado'];
                    } ?>
                    <span>Fundado en <?php echo $fundado; ?></span>
                    <?php
                    //include 'fusiones.php';

                } ?>
                </p>
                <?php if (0 == $desaparecido) {
                    ?>
                    <p><strong>Presidente:</strong> <?php echo $equipoClub['presidente']; ?></p>
                    <p class="hide"><strong>Socios:</strong> <?php echo $equipoClub['socios']; ?></p>
                    <p class="hide"><strong>Presupuesto:</strong> <?php echo $equipoClub['presupuesto']; ?></p>
                    <p class="hide"><strong>Patrocinador:</strong> <?php echo $equipoClub['patrocinador']; ?></p>
                    <p><strong>Web:</strong> <a href='http://<?php echo $equipoClub['web']; ?>'
                                                target='_blank'><?php echo $equipoClub['web']; ?></a></p>
                    <?php
                } else {
                    ?>
                    <p>Desaparecido en <?php echo $desaparecido; ?></p>
                    <?php
                } ?>
            </div>
            <div class='col-xs-5'>
                <div class="clear h10"></div>
                <?php
                $rutaEquipacion = '/img/equipaciones/eq'.$equipoClub['equipacion_id'].'.png';
                if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEquipacion))) {
                    $rutaEquipacion = '/img/jugadores/NI.png';
                }

                ?>
                <img width='60' src='<?php echo $rutaEquipacion; ?>'
                     alt="equipacion <?= $equipoClub['nombre_completo']; ?>">
                Equipación: Camiseta <?php echo $equipoClub['camiseta']; ?>,
                pantalón <?php echo $equipoClub['pantalon']; ?> y medias <?php echo $equipoClub['media']; ?>.
            </div>
        </div>

        <div id="13939-19"><script src="//ads.themoneytizer.com/s/gen.js?type=19"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19" ></script></div>
        
        <?php break;

    case 'Calendario': ?>
        <div class="col-xs-12 marco" style="background-color:gainsboro">

            
                <?php if ($retirado > 0) {
                    ?>
                    <h3><?php echo $ret['motivo']; ?></h3>
                    <?php
                } else {

                    if (isset($partido)){
                        $partido = $proximoPartido; 
                        if ($partido['estado_partido']!=1){ ?>
                        <h4 class="boldfont text-center">Próximo partido</h4>
                        <?php } else { ?>
                        <h4 class="boldfont text-center">Último partido</h4>
                        <?php }
                        $colorFila = 'white';
                        $hora_prevista = $partido['hora_prevista'];
                        $enlaceP = '/resultados-directo/partido/';
                        $enlace_partido = $enlaceP.poner_guion($partido['local']).'-'.poner_guion(
                                $partido['visitante']
                            ).'/'.$partido['id'];
                        $proxPart = $partido['id'];
                        include 'includes/contenidoPartido.php';
                    }
                }
            

            if ($_SESSION['app'] > 0) {
                echo "<div class='marconegro col-xs-12 text-center'>";
                include 'includes/publicidad/cuerpo04.php';
                echo '</div>';
            }

            
            if (!isset($porTorneos[$liga])) {
                $liga = 442;
            }
            ?>


        </div>

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
                    $pgTemporada2 = '/resultados-directo/torneo/'.poner_guion($nt).'/'.$temporada_id.'/';
                } else {
                    $active = '';
                } ?>
                <li class="text-center boldfont <?php echo $active; ?>">
                    <a href="/equipo.php?id=<?php echo $equipo_id; ?>&modelo=Calendario&vista=<?php echo $key; ?>&nv=<?php echo $value['nombreTorneo']; ?>"><?php echo $value['nombreTorneo']; ?></a>
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
            <h4 class="boldfont text-center"><a href="<?php echo $pgTemporada2; ?>"><?php echo $nt; ?></a></h4>
            <?php


            foreach ($partidosLiga as $partido) {
                if (442 == $temporada_id && $partido['fecha'] < '2017-05-01') {
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

                $enlaceP = '/resultados-directo/partido/';
                $enlace_partido = $enlaceP.poner_guion($partido['local']).'-contra-'.poner_guion(
                        $partido['visitante']
                    ).'/'.$partido['id'];
                $enlace_local = '/resultados-directo/equipo/'.poner_guion(
                        $partido['local']
                    ).'/'.$partido['equipoLocal_id'];
                $enlace_visitante = '/resultados-directo/equipo/'.poner_guion(
                        $partido['visitante']
                    ).'/'.$partido['equipoVisitante_id'];
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
                        <?php

                        //pintar v d o e
$icono="";
if ($partido['estado_partido']==1){
    if ( ($equipo_id == $partido['equipoLocal_id'] && $partido['goles_local'] < $partido['goles_visitante'])
        || ($equipo_id == $partido['equipoVisitante_id'] && $partido['goles_local'] > $partido['goles_visitante'])) {
        if ($equipo_id == $partido['equipoLocal_id']) { $colorI='#B40404'; } else { $colorI='#FE642E';}
        $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">D</span>';
    }
    if ( ($equipo_id == $partido['equipoLocal_id'] && $partido['goles_local'] > $partido['goles_visitante'])
        || ($equipo_id == $partido['equipoVisitante_id'] && $partido['goles_local'] < $partido['goles_visitante'])) {
        if ($equipo_id == $partido['equipoLocal_id']) { $colorI='#0B610B'; } else { $colorI='#01DF01';}
        $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">V</span>';
    }
    if ($partido['goles_local'] == $partido['goles_visitante']) {
        if ($equipo_id == $partido['equipoLocal_id']) { $colorI='orange'; } else { $colorI='#FACC2E';}
        $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.';">E</span>';
    }
    if ($equipo_id == $partido['equipoLocal_id']) {
        $iconoGF='<span class="badge" style="font-weight:300; background-color:#0B2161">'.$partido['goles_local'].'</span>';
        $iconoGC='<span class="badge" style="font-weight:300; background-color:#424242">'.$partido['goles_visitante'].'</span>';
    }
    if ($equipo_id == $partido['equipoVisitante_id']) {
        $iconoGF='<span class="badge" style="font-weight:300; background-color:#013ADF">'.$partido['goles_visitante'].'</span>';
        $iconoGC='<span class="badge" style="font-weight:300; background-color:#A4A4A4">'.$partido['goles_local'].'</span>';
    }
}
//pintar v d o e 





                        include 'includes/contenidoPartido.php'; ?>
                        <div id="youtube-<?php echo $partido['id']; ?>" class="col-xs-12 nopadding text-center"></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
        <?php
        

        break;
    case 'Clasificacion':
        require_once 'includes/pagEquipo/equipoClasificacion.php';
        break;

    case 'Plantilla': ?>
        <div class="col-xs-12 marconegro">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>


        <?php require_once './srcRecursos/pesPlantilla.php';
        break;

        case 'Tienda': ?>
        <div class="col-xs-12 marconegro text-center">
            <?php 
            
            $cat=$_GET['categoria']??'';
            $cantidad=12;
            if ($cat==''){ 
                $productos=0; 
                shuffle($amazon);
                $productosVisibles=$amazon;
                 } else {
                $categorias=array();
                $productos=array();
                foreach ($amazon as $key => $value) {
                    $categorias[$value['id_cat']]['categoria']=$value['categoria'];
                    $categorias[$value['id_cat']][]=$value['nombre'];
                    if ($value['id_cat']==$cat){ $productos[]=$value;}
                } 
                $productosN=count($productos);                
                echo '<h4>'.$productosN.' productos en la categoría <b>'.$categorias[$cat]['categoria'].'</b></h4>'; 
                $paginas=ceil($productosN/12);
                echo '<div class="marco"><span class="pull-right">Páginas ';
                $pag=$_GET['pag']??1;
                for ($i=1; $i < $paginas+1; $i++) { 
                    if ($pag==$i){ echo ' - <b>'.$i.'</b>'; } else {
                    echo ' - <a href="'.$pgEquipo.'&modelo=Tienda&categoria='.$cat.'&pag='.$i.'">' .$i.'</a>'; }
                } 
                echo '</span><div class="clear"></div></div><div class="clear"></div>';
                $k=(12*$pag)-12;  
                $productosVisibles = array_slice($productos, $k, $cantidad);
         
            }

            
            $contador=0;
            foreach ($productosVisibles as $key => $value) {
                $contador++;
                if ($contador>$cantidad){ break; }
                echo '<div class="col-xs-6 col-sm-3 nopadding">';
                $enlace=$value['enlace'];
                include('includes/publicidad/amazon.php'); 
                echo '</div>';                                        
            } ?>
        </div>
        <?php 
        break;

       

    case 'Fichajes': ?>

        <div class='col-xs-12'>
            <?php foreach ($fichajes as $key => $jugador) {
                $enlace_jugador = '/resultados-directo/jugador/'.poner_guion($jugador['apodo']).'/'.$jugador['id'];
                $enlace_equipo = '/resultados-directo/equipo/'.poner_guion(
                        $jugador['equipo']
                    ).'/'.$jugador['equipoActual_id'];

                $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';
                if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                    $rutaJugador = '/img/jugadores/NI.png';
                }

                switch ($jugador['posicion']) {
                    case '1':
                        $txtPosicion = 'Portero';
                        if (isset($liga) && 214 == $liga) {
                            $txtPosicion = 'Portera';
                        }
                        break;
                    case '2':
                        $txtPosicion = 'Defensa';
                        break;
                    case '3':
                        $txtPosicion = 'Centrocampista';
                        break;
                    case '4':
                        $txtPosicion = 'Delantero';
                        if (isset($liga) && 214 == $liga) {
                            $txtPosicion = 'Delantera';
                        }
                        break;
                    case '5':
                        $txtPosicion = 'Entrenador';
                        break;
                    default:
                        $txtPosicion = 'Sin demarcación';
                        break;
                }
                if ($jugador['equipoActual_id'] != $equipo_id) {
                    ?>
                    <div style="clear:both; border-top: solid 10px gainsboro; padding:10px; margin-top:10px"></div>
                    <div class="col-xs-3">
                        <a href="<?php echo $enlace_equipo; ?>"><img
                                    src="/img/equipos/escudo<?php echo $jugador['equipoActual_id']; ?>.png" alt="escudo"
                                    class="img-rounded" width="60" height="90"></a>
                    </div>
                    <div class="col-xs-9">
                        <h4><span><a href="<?php echo $enlace_equipo; ?>"><?php echo $jugador['equipo']; ?></a></span>
                        </h4>
                    </div>
                    <div style="clear:both"></div>
                    <?php
                } ?>
                <?php if (1 == $key) {
                    ?>
                    <div class="col-xs-12 marconegro clear">
                        <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
                    </div>
                    <?php
                } ?>
                <div style="height:5px; width:100%; border-top: solid 1px dimgray;"></div>
                <div class="row nomargin">

                    <div class="col-xs-3">
                        <a href="<?php echo $enlace_jugador; ?>"><img src="<?php echo $rutaJugador; ?>"
                                                                      alt="jugador <?= $jugador['nombre']; ?>"
                                                                      class="img-rounded" width="64" height="96"></a>
                    </div>
                    <div class="col-xs-5">
                        <div class="row">
                            <span><a href="<?php echo $enlace_jugador; ?>"><?php echo $jugador['apodo']; ?></a></span>
                            <br/><span>Procedencia: <?php echo $jugador['slug']; ?></span>
                            <br/><span><b><?php echo $txtPosicion; ?></b></span>

                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <div class="row">
                            <?php echo nl2br($jugador['palmares']); ?>
                            <hr/>
                        </div>
                    </div>

                </div>
                <?php
                $id_equipo = $jugador['equipoActual_id'];
            } ?>
        </div>

        <?php break;

    case 'Goleadores':
        if (count($realizadores) > 0) {
            unset($aux);
            foreach ($realizadores as $key => $value) {
                $aux[$key] = $value['goles'];
            }
            array_multisort($aux, SORT_DESC, $realizadores);
            unset($a);
            unset($b);
            unset($c);
            $a = '';
            $b = [];
            $k = 0;
            foreach ($realizadores as $key => $value) {
                $e = $value['apodo'];
                $a .= "'".$e."',";
                $b[$key]['x'] = (int)($k);
                $b[$key]['y'] = (int)$value['goles'];
                $b[$key]['name'] = $e;
                ++$k;
            }
            $a = substr($a, 0, -1);
            $b = json_encode($b);
            $b = preg_replace('"x"', 'x', $b);
            $b = preg_replace('"y"', 'y', $b);
            $b = preg_replace('"name"', 'name', $b);

            $contenedor = 8;
            $maximo = $realizadores[0]['goles'];
            $tipo = 'column';
            $titulo = 'Goleadores.';
            $subtitulo = $equipotxt;
            $minimo = 0;
            $textoY = 'Goles conseguidos';
            $textoSerie1 = $titulo;
            $textoSerie2 = '';
            $textoVY = 'Goles';
            include './includes/graficos/_linea2.php'; ?>
            <div class='col-xs-12 clear'>
                <div id="c8" style="float:left; height: 300px; margin: 0 auto"></div>
                <?php $pichichi = $realizadores[0]; ?>
                <div class="clear"></div>
                <div class="marco">
                    <b><?php
                        //imp($liga);
                        if (214 == $liga) {
                        ?>
                        <?php echo $pichichi['apodo']; ?></b> con <b><?php echo $pichichi['goles']; ?></b> tantos, es la
                    máxima realizadora del equipo.
                    <?php
                    } else {
                        ?>
                        <?php echo $pichichi['apodo']; ?></b> con
                        <b><?php echo $pichichi['goles']; ?></b> tantos, es el máximo realizador del equipo.
                        <?php
                    }
                    if (isset($pichichi[1])) {
                        ?>
                        Ha conseguido <?php echo count($pichichi[1]) / 3; ?> goles en casa
                        <?php
                    }
                    if (isset($pichichi[0])) {
                        ?>
                        y  <?php echo count($pichichi[0]) / 3; ?> goles fuera.
                        <?php
                    } ?>
                </div>
            </div>
            <div class="col-xs-12 marconegro clear">
                <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
            </div>

            <?php
        } //si hay goleadores
        break;

    case 'Equipos': ?>
        <div class='col-xs-12'><h5>*Solo se muestran los equipos que pertenecen a las categorías tratadas en
                futbolme.com (Categoría nacional, autonómicas preferentes, juveniles en División de Honor o Liga
                Nacional y femeninos en Primera o Segunda División)</h5>
            <?php foreach ($equipos as $key => $value) {
                if ($value['id'] == $equipo_id) {
                    continue;
                }
                if ($value['torneo'] < 1) {
                    continue;
                } //si es 0 no esta en ninguna liga.
                if (1 == $value['categoria_id']) {
                    $color = '#000000';
                }
                if (3 == $value['categoria_id']) {
                    $color = '#0B610B';
                }
                if (4 == $value['categoria_id']) {
                    $color = '#0B4C5F';
                }
                if (21 == $value['categoria_id']) {
                    $color = '#886A08';
                }
                if (2 == $value['categoria_id']) {
                    $color = '#A901DB';
                }
                $valoresLiga = XsaberLiga($value['id']);

                
                    $clas = array(
                    'temporada_id' => $valoresLiga['temporada_id'],
                    'jornada' => $valoresLiga['valorJornada'],
                    'grupo_id' => 0,
                    'equipo_id' => 0,
                    'tipoClasificacion' => 0,
                    'torneo_id' => 0,
                    'jornadas' => 0,
                    'puntosPorganar' => 3,
                    );     


                    $clas = array(
                    'temporada_id' => $valoresLiga['temporada_id'],
                    'jornada' => 44,
                    'grupo_id' => 0,
                    'equipo_id' => $value['id'],
                    'tipoClasificacion' => 0,
                    'torneo_id' => 0,
                    'jornadas' => 0,
                    'puntosPorganar' => 3,
                    );    

                $clasificacion = XgenerarClasificacion($clas);
                $datosClas = $clasificacion['rendimiento'][$value['id']][44];               

               

                $pgTemporada = '/resultados-directo/torneo/'.poner_guion(
                        $valoresLiga['nombre']
                    ).'/'.$valoresLiga['temporada_id'].'/';
                $pgEquipo = '/resultados-directo/equipo/'.poner_guion(
                        $value['equipo']
                    ).'/'.$value['id'].'&modelo=Clasificacion'; ?>
                <a href='<?php echo $pgEquipo; ?>'><?php echo $value['equipo']; ?> - <span class='boldfont' style='color:<?php echo $color; ?>'><?php echo $value['categoria']; ?></span></a>
                <br/><a href="<?php echo $pgTemporada; ?>"><?php echo $valoresLiga['nombre']; ?></a>
                <?php if (isset($datosClas)) {
                    ?>
                    - <b>Posición: <?php echo $datosClas['posicion']; ?>º</b>
                    <br/>Jugados: <b><?php echo $datosClas['jugados']; ?></b>
                    - Ganados: <b><?php echo $datosClas['ganados']; ?></b>
                    - Empatados: <b><?php echo $datosClas['empatados']; ?></b>
                    - Perdidos: <b><?php echo $datosClas['perdidos']; ?></b>
                    <br/>Goles a favor: <b><?php echo $datosClas['gFavor']; ?></b>
                    - Goles en contra: <b><?php echo $datosClas['gContra']; ?></b>
                    <hr/>
                    <?php
                }
            } ?>
        </div>
        <div class="col-xs-12 marconegro clear">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>
        <?php break;

    case 'Historico':

    


        if (isset($_GET['e2']) && $_GET['e2'] > 0) {
            $e = explode(',', $_GET['e2']);
            $racha1 = xRacha($liga, $equipo_id);
            $racha2 = xRacha($e[2], $e[0]);
            if (isset($racha1) && isset($racha2)) {
                $equipo_id_b = $e[0];
                $equipotxt_b = $e[1];
                if (count($racha1) > 0 && count($racha2) > 0) {
                    ?>
                    <div class="col-xs-12 nopadding clear">
                        <?php require_once 'srcRecursos/allUltimas.php'; ?>
                    </div>
                    <div class="clear"></div>
                    <?php
                }
            }
        }

        ?>


        <div class='col-xs-12'>

            <?php

            if (count($posiciones) > 0) {
                include 'includes/graficos/lineaDelTiempo.php';


                if (isset($_GET['e2']) && $_GET['e2'] > 0) {
                    $e = explode(',', $_GET['e2']);
                    $equipotxt1 = $equipotxt;
                    $equipo_id1 = $equipo_id;
                    $liga1 = $liga;
                    $equipo_id = $e[0];
                    $equipotxt = $e[1];
                    $liga = $e[2];
                    $posiciones = XequipoPosiciones($equipo_id);
                    include 'includes/graficos/lineaDelTiempo.php';
                    $equipo_id2 = $equipo_id;
                    $equipotxt2 = $equipotxt;
                    $liga2 = $liga;
                    $equipo_id = $equipo_id1;
                    $liga = $liga1;
                    $equipotxt = $equipotxt1;
                }

                include 'srcRecursos/allClasi.php';

                if (isset($_GET['e2']) && $_GET['e2'] > 0) {
                    $e = explode(',', $_GET['e2']);
                    $equipotxt1 = $equipotxt;
                    $equipo_id1 = $equipo_id;
                    $liga1 = $liga;
                    $equipo_id = $e[0];
                    $equipotxt = $e[1];
                    $liga = $e[2];
                    $posiciones = XequipoPosiciones($equipo_id);
                    include 'srcRecursos/allClasi.php';
                    $equipo_id2 = $equipo_id;
                    $equipotxt2 = $equipotxt;
                    $liga2 = $liga;
                    $equipo_id = $equipo_id1;
                    $liga = $liga1;
                    $equipotxt = $equipotxt1;
                }

                include 'srcRecursos/allResults.php';
            }

            ?>


            

        </div>
        <div class="col-xs-12 marconegro clear">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>
        <?php break;


    case 'Anterior':
        $pesAnterior = 'active';
        break;

    case 'Twitter': ?>
        <div class="col-xs-12 marconegro clear">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>
        <?php $pesTwitter = 'active';
        //require_once $fichero;
        //si se activa fichero, que se vea desde donde viene.

        break;

    /*case 'Fidelidad': ?>
        <div class="col-xs-12 marconegro clear">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>
        <div class="col-xs-12"><a class="pull-right" href="/programa-fidelidad">Programa FIDELIDAD</a></div>
        <h4 class='text-center boldfont'>Top 20 </h4>
        <?php require_once 'srcRecursos/pesApuestaTorneo.php';
        break;*/
}


//$json="";
        if ($_SESSION['app']==1){
            include 'includes/pagEquipo/historialEquipo.php';
        }

        
        $cachetime = 86400; //86400 un dia. 
        if (isset($twEquipo) && strlen($twEquipo) > 2 && $equipo_id>0) {
            echo '<p>Últimos twits publicados...</p>';
            $t=capturaTwit($equipo_id, $twEquipo, $cachetime);
            if (count($t) > 1) {
                include 'srcRecursos/pesLeerTwits.php'; //incluye derecha02
            }
        } 

        

?>