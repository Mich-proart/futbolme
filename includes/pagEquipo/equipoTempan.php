<?php

$sufijo = '&idH='.$_GET['idH'].'&bd=H';
if (0 == $liga) {
    ?>

<div class="col-xs-12 whitebox nopadding txt11 clear">
		<h4>El <?php echo $equipotxt; ?> no estuvo en ninguna liga de las gestionadas por futbolme.com en la temporada anterior.</h4>

		<div class="col-xs-8 text-center">						
			<h3><?php echo $equipotxt; ?></h3>
			<?php echo "<h4 class='boldfont'> ".$nombreTemporada.'</h4>'; ?>
			<h5><?php echo $categoriatxt; ?></h5>
				<?php if (370 == $equipo_id) {
        ?>
				<br />Motivos por los que futbolme considera este club diferente al 
				<a href="/resultados-directo/equipo/cd-europa/3567">CD Europa</a>
				fundado en 1907 explicados en 
				<a href="http://www.futbolplus.com/foro/viewtopic.php?f=2&t=199060" target="_blank">
				futbolplus.com	
				</a>
				<?php
    } ?>
		</div>

		<div class="col-xs-4 text-center">		
			<img src="/img/equipos/escudo<?php echo $equipo_id; ?>.png" class="img-rounded" alt="escudo">
		</div>
	</div>

	<div class="col-xs-12 marconegro clear">
	<?php require_once 'includes/publicidad/cuerpo04.php'; ?>
	</div> 



<?php
} else {
        $sufijo2 = '';
        $nt = '';
        if (isset($torneo['nombre'])) {
            $nt = $torneo['nombre'];
        }

        if (isset($_GET['idH'])) {
            $liga = $_GET['idH'];
            $sufijo2 = '&idH='.$_GET['idH'];
        } ?>
	<div class="col-xs-12 whitebox nopadding txt11 clear">
		<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">		
		    <li class="text-center boldfont <?php echo $pesCalendario; ?>">
		    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Calendario">Calendario</a>
		    </li>
		    <li class="text-center boldfont <?php echo $pesClasificacion; ?>">
		    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion">Clasificación</a>
		    </li>	    	
		    <?php /*if ($liga<25 || $liga==214) { ?>
            <li class="text-center boldfont <?php echo $pesGoleadores?>">
            <a href="<?php echo $pgEquipo?>&modelo=Goleadores">Goleadores</a>
            </li>
            <?php } CONSUMO EXCESIVO*/?>	    
		    <li class="text-center boldfont <?php echo $pesAnterior; ?>">
		    <a href="/resultados-directo/equipo/<?php echo poner_guion($equipotxt); ?>/<?php echo $equipo_id; ?>">Temporada Actual</a>
		    </li>
		</ul>	

		<div class="col-xs-8 text-center">						
			<h3><?php echo $equipotxt; ?></h3>
			<?php echo "<h4 class='boldfont'>".$nombreTemporada.'</h4>'; ?>
			<h5><?php echo $categoriatxt; ?></h5>
				<?php if (370 == $equipo_id) {
            ?>
				<br />Motivos por los que futbolme considera este club diferente al 
				<a href="/resultados-directo/equipo/cd-europa/3567">CD Europa</a>
				fundado en 1907 explicados en 
				<a href="http://www.futbolplus.com/foro/viewtopic.php?f=2&t=199060" target="_blank">
				futbolplus.com	
				</a>
				<?php
        } ?>
		</div>

		<div class="col-xs-4 text-center">		
			<img src="/img/equipos/escudo<?php echo $equipo_id; ?>.png" class="img-rounded" alt="escudo">
		</div>
	</div>

	<div class="col-xs-12 marconegro clear">
	<?php require_once 'includes/publicidad/cuerpo04.php'; ?>
	</div> 

	<div class="col-xs-12 whitebox clear">
	<?php
    switch ($modelo) {
            case 'Calendario':?>
				
					<h4 class="boldfont text-center"><?php echo $nt; ?></h4>
					<?php 

                    foreach ($partidos as $partido) {
                        //imp($partido);die;
                        if (!isset($partido['id'])) {
                            continue;
                        }
                        if ($liga != $partido['temporada_id']) {
                            continue;
                        }
                        if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                            ?>
						<div class="boxresultcontent cajagrisclaro">
							<div style="float:left; width:30px; text-align:center;">
							J<?php echo $partido['jornada']; ?>
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
                        $temporada_id = $partido['temporada_id'];

                        $enlaceP = '/resultados-directo/partido/';
                        $enlace_partido = $enlaceP.poner_guion($partido['local']).'-contra-'.poner_guion($partido['visitante']).'/'.$partido['id'].$sufijo;
                        $enlace_local = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'].$sufijo;
                        $enlace_visitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'].$sufijo;
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
						    <div class="col-xs-12 whitebox nopadding" style="background-color:<?php echo $colorFila; ?>"> 
								<?php include 'includes/equipo/partidoEquipo.php'; ?>
								<div id="youtube-<?php echo $partido['id']; ?>" class="col-xs-12 nopadding text-center"></div>
								<div class="clear"></div>
						    </div>
						</div>	
					<?php
                    } ?> 
				
			<?php break;
            case 'Clasificacion':?>
				<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">
					<li class="text-center boldfont <?php echo $pesPuntos; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Puntos">Puntos</a>
				    </li>		
				    <li class="text-center boldfont <?php echo $pesJugados; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Jugados">Jugados</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesGanados; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Ganados">Ganados</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesEmpatados; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Empatados">Empatados</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesPerdidos; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Perdidos">Perdidos</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesFavor; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Favor">G-Favor</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesContra; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Contra">G-Contra</a>
				    </li>
				    <li class="text-center boldfont <?php echo $pesEstadisticas; ?>">
				    <a href="<?php echo $pgEquipo.$sufijo2; ?>&modelo=Clasificacion&vista=Estadisticas">Estadísticas</a>
				    </li>			    
				</ul>

			<?php if (isset($ePartidos) && $tipoVista < 8) {
                ?>
				<div class="col-xs-12">
					<table class="table table-bordered table-condensed whitebox nomargin">
					<?php 
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
                    } ?>
						<tr style="background-color:#ECF6CE;">	
						<td style="width:8%;text-align:center;">J <?php echo $fila['jornada']; ?></td>
						<td style="width:38%;text-align:right; <?php echo $Flocal; ?>"><?php echo $fila['localCorto']; ?></td>
						<td style="width:16%;text-align:center;" class="boldfont"><?php echo $fila['goles_local']; ?> - <?php echo $fila['goles_visitante']; ?></td>
						<td style="width:38%;text-align:left; <?php echo $Fvisitante; ?>"><?php echo $fila['visitanteCorto']; ?></td>
						</tr>
					<?php
                } ?>
					</table>
				</div>
			<?php
            }

            if (isset($ePartidos) && isset($e_racha) && $tipoVista < 10) {
                require_once './srcRecursos/pesClasificacionRacha.php';
                require_once './srcRecursos/pesClasificacion.php';
            } else {
                if (isset($e_racha)) {
                    require_once './srcRecursos/pesClasificacionEstadisticas.php';
                }
            }

            break;

            case 'Goleadores':
                unset($aux);
                foreach ($realizadores as $key => $value) {
                    $aux[$key] = $value['goles'];
                }
                array_multisort($aux, SORT_DESC, $realizadores);
                unset($a); unset($b); unset($c);
                $a = ''; $b = ''; $k = 0;
                foreach ($realizadores as $key => $value) {
                    $e = $value['apodo'];
                    $a .= "'".$e."',";
                    $b[$key]['x'] = (int) ($k);
                    $b[$key]['y'] = (int) $value['goles'];
                    $b[$key]['name'] = $e;
                    ++$k;
                }
                $a = substr($a, 0, -1);
                $b = json_encode($b);
                    $b = preg_replace('/"x"/D', 'x', $b);
                    $b = preg_replace('/"y"/D', 'y', $b);
                    $b = preg_replace('/"name"/D', 'name', $b);

                 $contenedor = 8; $maximo = $realizadores[0]['goles']; $tipo = 'column';
                 $titulo = 'Goleadores.';
                  $subtitulo = $equipotxt; $minimo = 0;
                  $textoY = 'Goles conseguidos'; $textoSerie1 = $titulo; $textoSerie2 = '';
                  $textoVY = 'Goles';
                  include './includes/graficos/_linea2.php';
                  ?>
				  <div id="c8" style="float:left; height: 300px; margin: 0 auto"></div>
					<?php $pichichi = $realizadores[0]; ?>
				  <div class="clear"></div>
				    <div class="marco">
					<b><?php echo $pichichi['apodo']; ?></b> con <b><?php echo $pichichi['goles']; ?></b> tantos, es el máximo realizador del
					equipo. Ha conseguido <?php echo count($pichichi[1]) / 3; ?> goles en casa y  <?php echo count($pichichi[0]) / 3; ?> goles fuera.
					</div>
				
							
			<?php break;
        } ?>
	</div>
<?php
    } //si hay liga?>




