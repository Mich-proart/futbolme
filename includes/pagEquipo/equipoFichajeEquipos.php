<?php $fichajes = XfichajesEquipo($equipo_id);

$equipos = equipos_temporada($liga);

$pesFichajes = ''; $pesTwiter = 'active';
if (count($fichajes) > 0) {
    $pesFichajes = 'active';
    $pesTwiter = '';
}

?>


<div class="col-xs-12 whitebox">
	<div class="col-xs-8 text-center">						
	<h3><?php echo $equipotxt; ?></h3>
	<h5><?php echo $categoriatxt; ?></h5>
	</div>
	<div class="col-xs-4">
	<div class="row h25"></div>
		<a class="pull-right boldfont" href="/equipo.php?id=<?php echo $equipo_id; ?>&tempan=0">Calendario 2016-17</a><hr />
	
		<a class="pull-right boldfont" href="/equipo.php?id=<?php echo $equipo_id; ?>&tempan=2015">Temporada 2015-16</a>
	</div>
	<div class="clear"></div>
	<ul class="nav nav-tabs nopadding" role="tablist" id="pestaEquipo">
	    <li class="text-center boldfont"><a href="#pestana_1" data-posicion="1">Los rivales</a></li>
	    <?php if (214 == $liga) {
    $pesFichajes = 'active';
    $pesTwiter = ''; ?>
	    <li class="text-center boldfont active"><a id="hr2" href="#pestana_2" data-posicion="2">Plantilla</a></li>
	    <?php
} else {
        ?>
	    <li class="text-center boldfont <?php echo $pesFichajes; ?>"><a id="hr2" href="#pestana_2" data-posicion="2">Jugadores</a></li>
	    <?php
    } ?>
	    <li class="text-center boldfont <?php echo $pesTwiter; ?>"><a href="#pestana_3" data-posicion="3">Twitter</a></li>
	    <?php if (isset($posiciones)) {
        ?>
	    <li class="text-center boldfont"><a href="#pestana_4" data-posicion="4">Histórico</a></li>
	 	<?php
    } //fin de historico?>
	 </ul>
	
	<div class="tab-content">
		<div class="tab-pane" id="pestana_1">
			<div class="row h40 whitebox nomargin"></div>
			<div class="row row-centered playerboxesgen nomargin">
			<?php foreach ($equipos as $fila) {
        ?>
			    <!--Comienza Casilla Equipo-->
			        <div class="col-xs-12 col-md-12 whitebox " style="border: 1px solid black;">
				        <div class="col-xs-6 col-md-6">
				            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
				                <img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png" style="height:90px;" alt="escudo">
				            </a>
				            <img  width="60" src="/img/equipaciones/eq<?php echo $fila['equipacion_id']; ?>.png">
						    <h5 class="black-text">
				                <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
				            </h5>			            
				            <div class="comunidad flag<?php echo $fila['comunidad_id']; ?>" style="margin-left:2px "></div>
				            <div style="float:left; margin-left:5px "><a href="/geolocalidad.php?m=1&id=<?php echo $fila['localidad_id']; ?>" title="Equipos de la localidad <?php echo $fila['localidad']; ?>"><?php echo $fila['localidad']; ?></a></div>
				            <div style="clear:both"></div>
				            <div style="float:left; margin-left:37px"><a href="/geolocalidad.php?m=2&id=<?php echo $fila['provincia_id']; ?>" title="Equipos de la provincia <?php echo $fila['provincia']; ?>" style="color:black; font-size:12px"><?php echo $fila['provincia']; ?></a></div>
				        </div>
				        <div class="col-xs-6 col-md-6">
				    	 <img  width="300" src="/img/estadios/estadi<?php echo $fila['estadio_id']; ?>.png" alt="campo de futbol">
						</div>	        	
			        </div>
			    <!--Fin de Casilla Equipo-->
			<?php
    } ?>
			</div>			
    	</div>		    	
    	<div class="tab-pane <?php echo $pesFichajes; ?>" id="pestana_2">
    		<div class="row h40 whitebox nomargin"></div>
			<div class="row row-centered playerboxesgen nomargin">

				<div class="panel panel-default">
				<?php $pesFi = 'active';
                if (1 == $liga) {
                    $pesEstadisticas = 'active';
                    $pesFi = '';
                }
                if (214 == $liga) {
                    $pesEstadisticas = '';
                    $pesFi = '';
                }
                 ?>
					<ul class="nav nav-tabs nopadding" role="tablist" id="pestañas">
				    <?php if (214 != $liga) {
                     ?>
				    <li class="text-center boldfont <?php echo $pesFi; ?>"><a href="#pesta1">Fichajes</a></li>
				    <?php
                 } ?> 
				    <li class="text-center boldfont <?php if (214 == $liga) {
                     echo 'hide';
                 }?>"><a href="#pesta2">Plantilla</a></li>
				    <?php if (1 == $liga) {
                     ?>
				    <li class="text-center boldfont <?php echo $pesEstadisticas; ?>"><a href="#pesta3">Estadísticas</a></li>
				    <?php
                 } ?>
				    </ul>
			        
				    <div class="tab-content">
					<div class="tab-pane <?php echo $pesFi; ?>" id="pesta1">
						<div class="panel panel-default">

					        <div class="panel-heading">		            
					            <h3>Fichajes</h3> 
					            <a href="http://www.futbolplus.com/foro/viewforum.php?f=3" target="_blank">Foro de fichajes</a>
					        </div>
					        

					        <div class="panel-body">
					        <?php 
                            $temporada_id = $liga;
                            if (0 == count($fichajes) && $temporada_id < 25) {
                                echo '<h4>Muy pronto, todos los fichajes de '.$equipotxt.'</h4>';
                            }

                            foreach ($fichajes as $jugador) {
                                $enlace_jugador = '/resultados-directo/jugador/'.poner_guion($jugador['apodo']).'/'.$jugador['id'];
                                $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($jugador['equipo']).'/'.$jugador['equipoActual_id'];
                                switch ($jugador['posicion']) {
                                    case '1':
                                        $txtPosicion = 'Portero';
                                        break;
                                    case '2':
                                        $txtPosicion = 'Defensa';
                                        break;
                                    case '3':
                                        $txtPosicion = 'Centrocampista';
                                        break;
                                    case '4':
                                        $txtPosicion = 'Delantero';
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
					                    <a href="<?php echo $enlace_equipo; ?>"><img src="/img/equipos/escudo<?php echo $jugador['equipoActual_id']; ?>.png" alt="<?=$jugador['equipo']; ?>" class="img-rounded" width="60"  height="90" ></a>
					                </div>
					                <div class="col-xs-9">
						                 <h4><span><a href="<?php echo $enlace_equipo; ?>"><?php echo $jugador['equipo']; ?></a></span>
						                 </h4>
					                </div> 
					                <div style="clear:both"></div> 
					            <?php
                                } ?>
						            <div style="height:5px; width:100%; border-top: solid 1px dimgray"></div>
						            <div class="row nomargin">
						                
						                <div class="col-xs-3">
						                    <a href="<?php echo $enlace_jugador; ?>"><img src="/img/jugadores/jugador<?php echo $jugador['id']; ?>.jpg" alt="jugador <?=$jugador['nombre']; ?>" class="img-rounded" width="64"  height="96"></a>
						                </div>
						                <div class="col-xs-5">
						                    <div class="row">
						                        <span><a href="<?php echo $enlace_jugador; ?>"><?php echo $jugador['apodo']; ?></a></span>
						                        <br /><span>Procedencia: <?php echo $jugador['slug']; ?></span>
						                        <br /><span><b><?php echo $txtPosicion; ?></b></span>
						                        
						                    </div> 
						                </div>

						                <div class="col-lg-4 col-xs-12">
						                    <div class="row" >
						                        <?php echo nl2br($jugador['palmares']); ?>						                        
						                    <hr /></div> 
						                </div>
						               
						            </div>
						            <?php 
                                    $id_equipo = $jugador['equipoActual_id'];
                            } ?>
					        
					        </div>

						</div>
					</div>

			        <div class="tab-pane <?php if (214 == $liga) {
                                echo 'active';
                            } ?>" id="pesta2">
						<div class="panel panel-default">
							<?php	
                            require_once './srcRecursos/pesPlantilla.php'; ?>
						</div>
					</div>

					<?php if (1 == $liga) {
                                ?>
					<div class="tab-pane <?php echo $pesEstadisticas; ?>" id="pesta3">
						<div class="panel panel-default">
							<?php
                                $eTXT = $equipotxt;
                                $equipoSeleccion = $equipo_id;
                                $torneoSeleccion = 1;
                                $partidoSeleccion = 0; //partido donde empieza a contar..
                                require_once './includes/alineados.php'; ?>
						</div>
					</div>	
					<?php
                            } ?>

				</div>






			    </div>					
    		</div>
    	</div>

    	<div class="tab-pane <?php echo $pesTwiter; ?>" id="pestana_3">
	    	<div class="panel panel-default">
	    		<?php 
                    $fichero = './cacheWeb/twiter/tw'.$equipo_id.'.php';
                    if (@file_exists($fichero)) {
                        require_once $fichero;
                    } else {
                        echo 'Widget no disponible';
                    }
                 ?>
				<div class="clear"></div>
			</div>
    	</div>

    	<div class="tab-pane" id="pestana_4">
	    	<div class="panel panel-default">
	    		<table width='100%' cellpadding='1' cellspacing='1' border='0'>
			        <tr bgcolor='#336633'><td style='color:#FFF; text-align:center'>Pos.</td><td style='color:#FFF; text-align:center'>Temp.</td><td style='color:#FFF; text-align:center'>Div.</td></tr>
			        <?php 
                    foreach ($posiciones as $key => $fila) {
                        switch ($fila['idDivision']) {
                        case '1':
                            $dd = '1&ordf;'; $color_f = '#FFD700'; $txtDivision = 'Primera División';
                            break;
                        case '2':
                            $dd = '2&ordf;'; $color_f = '#E6E6FA'; $txtDivision = 'Segunda División';
                            break;
                        case '3':
                            $dd = '2&ordf;B'; $color_f = '#FFE4B5'; $txtDivision = 'Segunda División B';
                            break;
                        case '4':
                            $dd = '3&ordf;'; $color_f = '#D8BFD8'; $txtDivision = 'Tercera División';
                            break;
                    }

//                        $t1 = $fila['temporada'];
                        $t1 = $fila['temporada'].'-'.substr(($fila['temporada'] + 1), -2); ?>
			        <tr bgcolor='<?php echo $color_f; ?>'><td align='center' style='border:silver 1px solid;'><?php echo $fila['posicion']; ?>&ordm;</td><td align='center' style='border:silver 1px solid;'>
			        <?php $enlace = '/historico-liga/'.poner_guion($t1).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$fila['temporada_id'].'/'.$t1.'/'.$txtDivision.'&equipo='.$equipo_id; ?>

			        <a href='<?php echo $enlace; ?>' target='_blank'><b><?php echo $t1; ?></b></a>

			        </td><td align='center' style='border:silver 1px solid;'><?php echo $dd; ?></td></tr>
			        <?php
                    } ?>
			        </table>
	    		
				<div class="clear"></div>
			</div>
    	</div>


    	

    </div>

</div>