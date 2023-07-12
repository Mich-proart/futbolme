<div class="clear"></div>
<?php $promocion = 0; ?>

<?php if ($c_directos > 0) {
    ?>
	<div class="col-xs-12">
		<span class="actua pull-right badge" style="font-weight:100;">
		Actualizado a las <?php echo $hora = date('H:i:s'); ?>
		</span>
		<?php include 'includes/contenidoDirecto.php'; ?>
		
	</div>
	<?php
} ?>

<div class="col-xs-12 whitebox">
<?php 

foreach ($fasesSQL as $value) {
    if (count($partidos[$value['fase_id']])>0) {?>
	<div class="clear"></div>
	<div class='text-center h40 celestebox' style='margin-top:20px; color:white'><h4><?php echo $value['nombre']; ?></h4></div>
	<?php  }

    if (3 != $value['tipo_eliminatoria']) {
        $f = '';
        $colorFila = 'white';
        $j = 0;

        foreach ($partidos[$value['fase_id']] as $key => $partido) {
            if (!isset($partido['id'])) {
                continue;
            }
            //colorear españoles
            if ('España' == $partido['local']) {
                $colorL = 'background-color:#F4FA58';
            } else {
                $colorL = '';
            }
            if ('España' == $partido['visitante']) {
                $colorV = 'background-color:#F4FA58';
            } else {
                $colorV = '';
            }

            $coletilla = '';
            $enlaceP = '/resultados-directo/partido/';
            $enlace_partido = $enlaceP.poner_guion($partido['local']).'-contra-'.poner_guion($partido['visitante']).'/'.$partido['id'];
            $enlace_local = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'].$coletilla;
            $enlace_visitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'].$coletilla;

            //if ($partido['jornada']==$valorJornada) {

            if ($f != $partido['fecha']) {
                if ('white' == $colorFila) {
                    $colorFila = '#ddffff';
                } else {
                    $colorFila = 'white';
                }
            }
            $hora_prevista = $partido['hora_prevista'];

            if (0 == $valorJornada && $partido['jornada'] != $j) {
                ?>
					   

					    <div class="col-xs-12">
				            <p class="nomargin">
				                <span class="boldfont"><?php echo $partido['fase']; ?></span>	                
				            </p>
				        </div>				    
			    <?php
            } ?>	     
					       
				<?php 
                //$equipo_id=10000; $partido['nombreTorneo']=""; // para que salga la fase?>

				<?php include 'includes/contenidoPartido.php'; ?>
				        
				

				<?php 
                $f = $partido['fecha'];
            $j = $partido['jornada'];
        }
    } else {
        unset($p);
        foreach ($partidos[$value['fase_id']] as $key => $partido) {
            $p[$partido['jornada']][$partido['grupo_id']][] = $partido;
        }

        foreach ($grupos as $fase => $gruposFase) {
            //fase=70
            foreach ($gruposFase as $id => $grupo) {
                //id=15
                echo "<div class='clear h25'></div><div class='badge' style='font-size:14px; text-align:center !important'>".$grupo['nombre'].'</div>';

                if (isset($p[$fase][$id])) {
                    foreach ($p[$fase][$id] as $key => $partido) {
                        $equipo_id = 10000;
                        $partido['nombreTorneo'] = ''; // para que salga la fase
                        include 'includes/contenidoPartido.php';
                    }
                    $clasificacion = X2generarClasificacion($temporada_id, 2, $fase, $id); ?>
						<div>
							<div>
								<table class="table table-bordered table-condensed whitebox nomargin txt11">
									<thead>
							            <tr class="darkgreenbox">
							                <th class="text-center">P</th>
							                <th class="text-center">
							                Equipo
							                </th>
							                <th class="text-center">PTOS</th>
							                <th class="text-center">JU</th>
							                <th class="text-center">GA</th>
							                <th class="text-center">EM</th>
							                <th class="text-center">PE</th>
							                <th class="text-center">GF</th>
							                <th class="text-center">GC</th>
							                <th class="text-center">DIF</th>
							            </tr>
							        </thead>
							        <tbody class="whitebox">
							        <?php 

                                    foreach ($clasificacion['clasificacionFinal'] as $fila) {
                                        ?>
							        	<tr>
							        		<td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>

							        		<td>
							        		<?php
                                            if (238 == $temporada_id) {
                                                $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'].'&o='.$temporada_id;
                                            } else {
                                                $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
                                            } ?>
							        			<a href="<?php echo $enlace_equipo; ?>">

							        				<?php if (isset($seleccion)) {
                                                ?>
								        				<?php if (1 == $seleccion) {
                                                    $bandera = XsacarBandera($fila['equipo_id']); ?>
								        					<img src="/img/paises/banderas/ban<?php echo $bandera; ?>b.png" alt="bandera" style="width:34px; height:20px">
				        				    			<?php
                                                } else {
                                                    ?>
								        				<img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png" alt="escudo"  style="width:18px; height:20px">
							        					<?php
                                                } ?>
							        				<?php
                                            } else {
                                                ?>
							        				<img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png" alt="escudo"  style="width:18px; height:20px">
							        				<?php
                                            } ?>
							        				
							        				<b><?php echo $fila['nombre']; ?></b>

							        			</a>

							        		</td>
							        		<?php 
                                                $color_fondo = 'white';
                                        if (isset($fila['preferente'])) {
                                            if (1 == $fila['preferente']) {
                                                $color_fondo = '#F6E3CE';
                                            }
                                        } ?>

							        		<td class="text-center" style="background-color:<?php echo $color_fondo; ?>"><?php echo $fila['puntos']; ?></td>

							        		<td class="text-center"><?php echo $fila['jugados']; ?></td>

							        		<td class="text-center"><?php echo $fila['ganados']; ?></td>

							        		<td class="text-center"><?php echo $fila['empatados']; ?></td>

							        		<td class="text-center"><?php echo $fila['perdidos']; ?></td>

							        		<td class="text-center"><?php echo $fila['gFavor']; ?></td>

							        		<td class="text-center"><?php echo $fila['gContra']; ?></td>

							        		<td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>

							        	</tr>

							        <?php
                                    } ?>	

							        </tbody>

								</table>

								<table class="table table-bordered whitebox nomargin">
									<tr>	
										<?php foreach ($clasificacion['leyenda'] as $fila) {
                                        ?>
										<td style="color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></td>
										<?php
                                    } ?>
									</tr>
								</table>
							</div>
						</div>


			<?php
                }
            }
        }
    }
}

if (isset($equiposTw)) {
        $titol="Ultimas noticias...";
        $filtro=0;
        require_once 'srcRecursos/pesLeerTwitsPortada.php'; //incluye derecha02
    } //isset equiposTw
?>

<div class="h40 clear whitebox"></div>
<div class="col-xs-12 whitebox marco" id="cuadro-honor2"></div>

</div>
