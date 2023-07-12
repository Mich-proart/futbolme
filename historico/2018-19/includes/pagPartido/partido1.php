<?php 
$pesEnfrentamientos = ''; $pesArbitro = ''; $pesEstadio = ''; $pesApuestas = ''; $pesPartido = '';
if (!isset($liga_local)) {
    $liga_local = 0;
}

?>
<div class="cols-xs-12 nopadding">
<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">      
        <li class="text-center boldfont active">
        <a href="<?php echo $pgPartido; ?>&modelo=Partido">Partido</a>
        </li>


        <li class="text-center boldfont active pull-right">
        <a href="/temporada.php?id=<?php echo $liga_local?>">Volver a futbolme</a> 
        </li>
     
           
     

        
    </ul>
<?php 

switch ($modelo) {
    case 'Partido':

    if (isset($liga_local)) {
        $torneo = Xtipo($liga_local);
        //if ($torneo['flagPais']!=60) {unset($liga_local);}
    }
    if (isset($liga_visitante)) {
        $torneo = Xtipo($liga_visitante);
        //if ($torneo['flagPais']!=60) {unset($liga_visitante);}
    }

    if (isset($liga_local) && isset($liga_visitante)) {
        if ($liga_local != $liga_visitante || 598 == $liga_local) {
            
            $clasificacion = XgenerarClasificacion($liga_local, 42, 0, 0, 0, $e1);
            

            foreach ($clasificacion['clasificacionFinal'] as $key => $value) {
                if ($value['equipo_id'] == $e1) {
                    $e1Clas = $value;
                    break;
                }
            }
            $racha1 = xRacha($liga_local, $e1);

            if (598 == $liga_visitante) {
                $sql = 'SELECT grupo FROM temporada_equipo WHERE temporada_id='.$liga_visitante.' AND equipo_id='.$e2;
                $mysqli = conectar();
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $i = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                $clasificacion = XgenerarClasificacionUSA($liga_visitante, 198, $i['grupo']);
            } else {
                $clasificacion = XgenerarClasificacion($liga_visitante, 42, 0, 0, 0, $e2);
            }

            foreach ($clasificacion['clasificacionFinal'] as $key => $value) {
                if ($value['equipo_id'] == $e2) {
                    $e2Clas = $value;
                    break;
                }
            }
            $racha2 = xRacha($liga_visitante, $e2);
        } else {
            $f = './json/temporada/'.$liga_local.'/clasificacion.json';
            if (@file_exists($f)) {
                $json = file_get_contents($f);
                $clasificacion = json_decode($json, true);
            } else {
                $torneo = Xtipo($liga_local);
                $jornadaActiva = $torneo['jornadaActiva'];
                $clasificacion = XgenerarClasificacion($liga_local, $jornadaActiva, 0, 1);
            }

            foreach ($clasificacion['clasificacionFinal'] as $key => $value) {
                if (2 == $partido['estado_partido']) {
                    $equiposTw[$key]['id'] = $value['equipo_id'];
                    $equiposTw[$key]['equipo'] = $value['nombre'];
                }
                //imp($e1." ".$e2." ".$value['equipo_id']);
                if ($value['equipo_id'] == $e1) {
                    $e1Clas = $value;
                }
                if ($value['equipo_id'] == $e2) {
                    $e2Clas = $value;
                }
            }

            
        }
    }

    ?>
        

        <div class="row greenbox nomargin">
            <div class="col-xs-12"><h1>Partido entre <?=$partido['local']; ?> y <?=$partido['visitante']; ?></h1></div>
            <div class="col-xs-2 col-md-1 col-lg-1">
                <?php if ($partido['comunidad_id'] > 1) {
        ?>
                <div class="flagbox comunidad flag<?php echo $partido['comunidad_imagen']; ?>"></div>
                <?php
    } else {
        ?>
                <div class="flagbox pais flag<?php echo $partido['pais_imagen']; ?>b"></div>
                <?php
    } ?> 
            </div>
            <div class="col-xs-10 col-md-11 col-lg-11">            
                <span class="pull-left">                            
                <?php echo $partido['nombreTemporada']; ?>
                <br />
                    
                <a href="index.php?modo=t&id=<?=$partido['temporada_id']; ?>&jornada=<?=$partido['jornada']; ?>">
                    <?php 
                    if (198 != $partido['jornada']) {
                        if (1 == $partido['tipo_torneo']) {
                            echo 'Jornada '.$partido['jornada'];
                        } else {
                            echo $partido['fase'];
                        }
                    } else {
                        echo 'Ligas Internacionales';
                    }

                    ?>
                </a></span>
            </div>
        </div> 
        <span class="pull-right"><?php 
            if (isset($partido['hora_prevista'])) {
                $h = ' a las '.$horaPrevista->format('H:i');
            } else {
                $h = '';
            }
            echo utf8_encode(nombreDia($partido['fecha'])).$h; ?>
            </span>                       
        
        <!--Fin row Jornada y división-->
        <!--Begin Equipo y puesto-->
        <div class="row">
        <div class="col-xs-12 nopadding">
            <div class="col-xs-6 text-center">
                <h4><?php echo $partido['local']; ?></h4>
            </div>
            <div class="col-xs-6 text-center">
                <h4><?php echo $partido['visitante']; ?></h4>
            </div>
        </div>
        </div>
        <!--Finish Row Jornada y división-->
        <!--Begin Match State-->

<!--Finish Match State-->

<!--Begin match teams-->
    <div class="row col-xs-12" id="partido-directo">

     <?php


        $fondo_color = 'black';
        if (1 == $es_directo) {
            $path = './json/directos.json';
            $json = file_get_contents($path);
            $directos = json_decode($json, true);
            $datosDirecto = array();
            foreach ($directos as $key => $value) {
                if ($partido['id'] == $value['partido_id']) {
                    $datosDirecto = $value;
                    break;
                }
            }

            if (count($datosDirecto) > 0) {
                $partido['goles_local'] = $datosDirecto['goles_local'];
                $partido['goles_visitante'] = $datosDirecto['goles_visitante'];
                $partido['hora_real'] = $datosDirecto['hora_real'];
                $partido['hora_prevista'] = $datosDirecto['hora_prevista'];
                $partido['clasificado'] = $datosDirecto['clasificado'];
                $partido['estado_partido'] = $datosDirecto['estado_partido'];
                $partido['jornada'] = $datosDirecto['jornada'];
                $partido['hora_prevista'] = $datosDirecto['hora_prevista'];
                $partido['hora_real'] = $datosDirecto['hora_real'];
            }

            $fondo_color = 'red';
            if (2 == $partido['estado_partido'] || 3 == $partido['estado_partido'] || 4 == $partido['estado_partido'] || 6 == $partido['estado_partido']) {
                ?>
        
        
        <?php if (198 == $partido['jornada'] && $partido['hora_prevista'] == $partido['hora_real']) {
                    $partido['comunidad_nombre'] = $datosDirecto['comunidad_nombre'];

                    $t = explode('-', $partido['comunidad_nombre']);
                    if (isset($t)) {
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
                        if (strlen($t[1]) > 3) {
                            $t[1] = substr($t[1], 0, 3);
                        }
                        $t['tiempo'] = 'Minuto '.$t[1];
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
                } else {
                    $t = getTime($partido['hora_real'], $partido['hora_prevista'], $partido['clasificado']);
                } ?>
        
            
                <div class="col-xs-12 text-center clear">
                    <div class="h10"></div>
                    <?php if (6 == $partido['estado_partido']) {
                            ?>
                    <p class="timeresult tryellow" style="margin-left:30%; width: 40% !important">Descanso</p>
                    <?php
                        } elseif (2 == $partido['estado_partido']) {
                            ?>

                        <p class="timeresult" style="background-color:<?php echo $t['color']; ?>; margin-left:30%; width: 40% !important">
                        <?php echo $t['tiempo']; ?>                    
                        </p>
                            

                    <?php
                        } elseif (3 == $partido['estado_partido'] || 4 == $partido['estado_partido']) {
                            ?>
                    <p><?php echo $partido['estado_partido']; ?></p>
                    <?php
                        } ?>
                    
                </div>
           

        
        <?php
            }
        } //si es directo
        ?>
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <?php if (1 == $partido['es_seleccion']) {
            ?>
            <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisLocal_id']; ?>.png" alt="escudo">
            <?php
        } else {
            ?>                            
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoLocal_id']; ?>.png" alt="escudo">
            <?php
        } ?>
            
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>;">
            <?php if (1 == $partido['estado_partido'] || 2 == $partido['estado_partido'] || 6 == $partido['estado_partido']) {
            ?>
            <p class="marcador"><?php echo $partido['goles_local']; ?></p>
            <?php
        } else {
            ?>
            <p class="marcador">-</p>
            <?php
        } ?>
        </div>
        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>;">
            <?php if (1 == $partido['estado_partido'] || 2 == $partido['estado_partido'] || 6 == $partido['estado_partido']) {
            ?>
            <p class="marcador"><?php echo $partido['goles_visitante']; ?></p>
            <?php
        } else {
            ?>
            <p class="marcador">-</p>
            <?php
        } ?>
        </div>
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px;">
            <?php if (1 == $partido['es_seleccion']) {
            ?>
            <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisVisitante_id']; ?>.png" alt="escudo">
            <?php
        } else {
            ?>  
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoVisitante_id']; ?>.png" alt="escudo">
            <?php
        } ?>
            
        </div>
        <div class="clear h25"></div>

        <?php
     require_once 'alineaciones.php';

            /* $idt=$partido['temporada_id'];
             $bdPartido=0; $txtMD="Ver crónica en Mundo Deportivo";
             echo "<div class='col-xs-10 h40'>";
             include $nivel.'srcRecursos/partidoRmd.php';
             echo "</div>";*/
        ?>
    </div>

    <?php 
        $foto_estadio = '/img/estadios/estadi'.$partido['estadio_id'].'.png';
        if (@file_exists('.'.$foto_estadio)) { ?>
        <div class="col-xs-6 text-center" style="max-height:200px;">
        <img src="<?php echo $foto_estadio; ?>"
        class="img-thumbnail" alt="<?php echo $partido['estadio_nombre']; ?> estadio" whidt="100%">
        <br />Campo: <b><?php echo $partido['estadio_nombre']; ?></b> (<?php echo $partido['estadio_localidad']; ?>) 
        </div>
        
        <?php } 
    if ($partido['arbitro_id'] > 1) { ?>

    <div class="col-xs-6 text-right txt11">Árbitro: <?php echo $partido['apellidosArbitro'].', '.$partido['nombreArbitro']; ?></div>
    <?php
    }

    if (0 == $partido['estado_partido'] && $partido['acta'] > 0) {
        require_once 'srcRecursos/partidoActa.php'; ?>
        <div id="apostar-<?php echo $partido['id']; ?>">
            <span class="pull-right" style="margin-right: 20px !important"><a href="<?php echo $pgPartido; ?>&modelo=Apuestas">Ver pronósticos</a></span>
        </div>
        <div class="col-xs-12 text-center"><span id="b-apostar" class="btn btn-default" onclick="apostar(<?php echo $partido['id']; ?>)">apostar</span></div>


    <?php
    } ?>

   
   


<?php if (isset($e1Clas) && isset($e1Clas)) {
        ?>
<table class="table table-bordered table-condensed whitebox nomargin txt11">
<?php 
$color_fondo = 'white';
        $txtPreferente = '';
        $jornadas = 0;
        for ($i = 0; $i < 2; ++$i) {
            if (0 == $i && !isset($e1Clas)) {
                continue;
            }
            if (1 == $i && !isset($e2Clas)) {
                continue;
            }
            if (isset($e1Clas) && 0 == $i) {
                $fila = $e1Clas;
                $temporada_id = $liga_local;
            }
            if (isset($e2Clas) && 1 == $i) {
                $fila = $e2Clas;
                $temporada_id = $liga_visitante;
            }
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente'] && 0 == $i) {
                    $color_fondo = 'yellow';
                    $txtPreferente = '*Clasificación En vivo';
                }
            }

            if (0 == $i) {
                ?>
        <thead>
            <tr class="darkgreenbox">
                <th class="text-center" colspan="2">
                <?php if ($partido['grupo_id'] > 0) {
                    echo $partido['nombreGrupo'];
                } ?>
                </th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
                <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
                <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
                <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
                <th class="text-center" style="width:9%">D<span class="hidden-xs">I</span>F</th>
            </tr>
        </thead>
        <?php
            } ?>
        <tbody class="whitebox">
        <?php 
        if ($fila['jugados'] > $jornadas) {
            $jornadas = $fila['jugados'];
        }
            $pgEnlace = 'index.php?modo=e&id='.$fila['equipo_id'];
            $color_fondo = 'white';
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente']) {
                    $color_fondo = 'yellow';
                }
            }

            $color_fila = '';
            if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:gainsboro'";
            } ?>
                <tr>
                    <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
                    <td style="text-align:left;">
                        <span class="hidden-sm hidden-md hidden-lg">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png"  alt="equipo" style="width:18px; height:20px">
                        <b><?php echo $fila['nombreCorto']; ?></b>
                        </a>
                        </span>
                        <span class="hidden-xs">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png" alt="equipo"  style="width:18px; height:20px">
                        <b><?php echo $fila['nombre']; ?></b>
                        </a>
                        </span>
                    </td>
                    <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                                        <b><?php echo $fila['puntos']; ?></b>
                    </td>
                    <td class="text-center"><?php echo $fila['jugados']; ?>
                    </td>
                    <td class="text-center">
                    
                    <?php echo $fila['ganados']; ?>
                    </td>
                    <td class="text-center">
                    
                    <?php echo $fila['empatados']; ?>
                    </td>
                    <td class="text-center">
                    
                    <?php echo $fila['perdidos']; ?>
                    </td>
                    <td class="text-center">
                    
                    <?php echo $fila['gFavor']; ?>
                    </td>
                    <td class="text-center">
                    
                    <?php echo $fila['gContra']; ?>
                    </td>
                    <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
                </tr>  
            <?php
        } ?>
            <tr><td colspan="10" align="right"><?php echo $txtPreferente; ?></td></tr>  
                    </tbody>
            </table>
            <?php
    } //si existe e2Clas o e1Cla?>

           
            

            


            

                
                <div class="col-xs-12 nopadding">
                <?php $hora = time('H:m:s');?>
            </div>
        <?php
} ?>
</div>



