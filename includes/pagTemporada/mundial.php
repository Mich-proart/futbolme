


<div class=" cols-xs-12 clear whitebox">
	
<?php $promocion = 0; ?>
<?php if ($c_directos > 0) {
    ?>
	<div class="col-xs-12 nopadding whitebox">
		<span class="actua pull-right badge" style="font-weight:100;">
		Actualizado a las <?php echo $hora = date('H:i:s'); ?>
		</span>
		<?php include 'includes/contenidoDirecto.php'; ?>
		
	</div>
	<?php
}

    if ('Cuadro' != $modelo) {
        if (2 == $desarrollo || 3 == $desarrollo) {
            ?>	
		<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">			
	   		<li class="text-center boldfont">
			<a href="<?php echo $pgTemporada2; ?> &modelo=Actualidad">MUNDIAL RUSIA 2018</a>
			</li>
			<li class="text-center boldfont hide">
		    <a href="<?php echo $pgTemporada; ?>&modelo=Cuadro">Cuadro de Honor de los Mundiales de Fútbol</a>
		    </li>
		</ul>
		<?php
        } ?>

	<div class="row whitebox nomargin">
	    <div class="col-xs-9">		        
	           <h4 class="text-center"> 
	            <select id="fases" name="fases" class="form-control input-sm">

	        		<?php foreach ($fases as $id => $fila) {
            ?>
	        			<option value="<?php echo $id; ?>" <?php if ($id == $valorJornada) {
                ?> selected <?php
            } ?>><?php echo $fila['nombre']; ?></option>
	        		<?php
        } ?>
	        	<?php if (1 == $porFecha) {
            ?>
	            	<option value="-1" selected>Del <?php echo nombreDia($diaAnterior); ?> al <?php echo nombreDia($diaSiguiente); ?></option>
	        	<?php
        } ?>
	        	</select> 
	        	</h4>
	    </div>
	   
	</div>	

		

	<?php
    include 'includes/publicidad/cuerpo03.php';

           if (3 == $tipo_eliminatoria) {
            foreach ($grupos as $fase => $gruposFase) {
                if ($fase == $valorJornada) {
                    ?>
			<div id="gruposFase<?php echo $fase; ?>" class="gruposFase row text-center whitebox clasif_pd nomargin">
			    <div role="toolbar" class="btn-group" style="margin-left:20px;">
				<?php 
                $conta = 0;
                    foreach ($gruposFase as $id => $grupo) {
                        $conta = $conta + 1;
                        if (1 == $conta && 0 == $primerGrupo) {
                            $primerGrupo = $id;
                            $nombreprimerGrupo = $grupo['nombre'];
                        }
                        if ($grupo_id == $id) {
                            $primerGrupo = $id;
                            $nombreprimerGrupo = $grupo['nombre'];
                        } ?>
					<a href="<?php echo $pgTemporada; ?>&grupo_id=<?php echo $id; ?>"><button><?php echo $grupo['nombre']; ?></button></a>
				<?php
                    } ?>
				</div>
				<div style="clear:both"></div>
				<h4><span class="boldfont" id="nombreprimerGrupo"><?php echo $nombreprimerGrupo; ?></span></h4>
			</div>
			<?php
                }
            }

            $clasificacionGrupo = X2generarClasificacion($temporada_id, $tipoTorneo, $valorJornada, $primerGrupo, 0);
            //imp($clasificacionGrupo);
        } //si tipo eliminatoria=3

        $f = '';
        $colorFondo = '';
        $j = 0;

        //imp($grupos);

        foreach ($partidos as $key => $partido) {
            if (!isset($partido['id'])) {
                continue;
            }
            if (2 == $partido['estado_partido']) {
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

            if ($_SESSION['app'] > 0 && 0 == count($directos) && $key > 1 && $key < 3) {
                echo "<div class='marconegro col-xs-12 text-center'>";
                include 'includes/publicidad/cuerpo04.php';
                echo '</div>';
            }

            $enlaceP = '/resultados-directo/partido/';
            $enlace_partido = $enlaceP.poner_guion($partido['local']).'-contra-'.poner_guion($partido['visitante']).'/'.$partido['id'];
            $enlace_local = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'];
            $enlace_visitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'];
            $hora_prevista = $partido['hora_prevista'];
            if ((0 == $valorJornada && $partido['jornada'] != $j) || 1 == $porFecha) {
                ?>
				<div class="row h10 nomargin"></div>
				<div class="boxresultgreenhead row darkgreenbox nomargin"> <!--Comienzo greenbox head-->
				    <div class="col-xs-12">
			            <p class="nomargin">
			                <span class="boldfont"><?php echo $partido['fase']; ?></span>	                
			            </p>
			        </div>
			    </div> <!--Fin greenbox head-->
		    <?php
            } ?>

		    <?php if (0 == $porFecha) {
                ?>
			<div class="boxresultcomplete nomargin grupoEliminatorio 
			<?php if ($partido['grupo_id']) {
                    ?> 
			grupo<?php echo $partido['grupo_id']; ?>
			<?php
                } ?>" 
			<?php if ($primerGrupo != $partido['grupo_id']) {
                    ?> 
			style="display: none;" 
			<?php
                } ?>>
			<?php
            } else {
                ?>

			<div class="boxresultcomplete nomargin">
				<div class="col-xs-12" style="background-color: gainsboro">
					<span class="boldfont"><?php 
                    if (isset($grupos[$valorJornada][$partido['grupo_id']])) {
                        echo $grupos[$valorJornada][$partido['grupo_id']]['nombre'];
                    } ?></span>                
			    </div>

			<?php
            } ?> 


			<!--Comienzo Panel resultados-->	

			<?php if ($f != $partido['fecha']) {
                if ('whitebox' == $colorFondo) {
                    $colorFondo = 'cajagrisclaro';
                } else {
                    $colorFondo = 'whitebox';
                } ?>
			<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo nombreDiaCompleto($partido['fecha']); ?></div>
			<?php
            }

            if (3 == $key) {
                require_once 'includes/publicidad/cuerpo01.php';
            } ?>
			    <div class="boxresultcontent row horizontaldivider nomargin whitebox">  
				        <?php include 'includes/contenidoPartido.php'; ?>			        
			    </div>
			</div>
			<?php 
            $f = $partido['fecha'];
            $j = $partido['jornada'];
        }

        if ($grupo_id==25){
        	$clasi1=$clasificacionGrupo['clasificacionFinal'][2]; 
        	$clasi2=$clasificacionGrupo['clasificacionFinal'][1];      	
        	$clasificacionGrupo['clasificacionFinal'][1]=$clasi1;
        	$clasificacionGrupo['clasificacionFinal'][2]=$clasi2;        	
        }

        if (isset($clasificacionGrupo)) {
            ?>		
				<div class="table-responsive whitebox">
					<table class="table table-bordered table-condensed whitebox nomargin">
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
				        <?php foreach ($clasificacionGrupo['clasificacionFinal'] as $fila) {
                if (216 == $temporada_id && 171 != $valorJornada) {
                    $fila['css'] = 'color:black;background-color:white';
                } ?>
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
					        				<img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png" alt="bandera"  style="width:18px; height:20px">
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
				        		<?php 	$color_fondo = 'white';
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
							<?php foreach ($clasificacionGrupo['leyenda'] as $fila) {
                if (216 == $temporada_id && 171 != $valorJornada) {
                    continue;
                } ?>
							<td style="color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></td>
							<?php
            } ?>
						</tr>
					</table>
				</div>
		<?php
        }
    }	?>

		<?php if ('Cuadro' == $modelo) {
        ?>
		<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">
			<li class="text-center boldfont">
			<a href="<?php echo $pgTemporada2; ?> &modelo=Actualidad">Volver a MUNDIAL RUSIA 2018</a>
			</li>	   		
		</ul>
		<div class="col-xs-12 whitebox">
		<?php require_once 'includes/temporada/finales3.php'; ?>
		<div class="clear h25"></div>
		</div>			
		<?php
    } ?>

</div>

<?php 
if (183 == $temporada_id || 184 == $temporada_id || 186 == $temporada_id) {
    require_once 'foro.php';
} //champions y uefa league?>
