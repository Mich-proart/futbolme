<div class="panel panel-default">
	<div class="panel-heading">				
		<div class="panel-body">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12">				

				<?php if (isset($_GET['enf'])) {
    ?>
				<table class="table table-bordered table-condensed whitebox nomargin">
				<thead>
					<tr class="darkgreenbox">
						<th class="text-center">Edición</th>
						<th class="text-center">Fecha</th>
						<th class="text-center" colspan="4">Partido</th>															
					</tr>
				</thead>
				<tbody class="whitebox">					 
					<?php	
                        foreach ($enfrentamientos as $partido) {
                            $css1 = '';
                            $css2 = '';
                            if ('1900-01-01' == $partido['fecha']) {
                                $partido['fecha'] = '';
                            }
                            if (1 == $partido['clasificado']) {
                                $css1 = 'style="color:green"';
                                $css2 = 'style="color:red"';
                            }
                            if (2 == $partido['clasificado']) {
                                $css1 = 'style="color:red"';
                                $css2 = 'style="color:green"';
                            }

                            $nt = $partido['nombre_temporada'];
                            $enlace = '/historico/promocion2b/index.php?temporada_id='.$partido['historicotemporadas_id']; ?>													
						<tr>														
							<td class="text-center"><a href="<?php echo $enlace; ?>"><?php echo $nt; ?></a></td>
							<td class="text-center"><?php echo $partido['nombre_eliminatoria']; ?> - <?php echo $partido['fecha']; ?></td>
							<td <?php echo $css1; ?> class="text-center"><?php echo $partido['local_nombre']; ?></td>
							<td class="text-center" style="font-weight:bold; min-width:50px;">
								<?php echo $partido['local_goles']; ?> - <?php echo $partido['visitante_goles']; ?>
							</td>
							<td <?php echo $css2; ?> class="text-center"><?php echo $partido['visitante_nombre']; ?></td>
						
							<td>
							<?php $enlace = '/historico/promocion2b/index.php?partido_id='.$partido['id'].'&pest=partido'; ?>
								<a href="<?php echo $enlace; ?>">
									<span class="fa fa-plus-circle iconhover boxresultcontenticon"></span>
								</a>	


							</td>


						</tr>
							<?php if (strlen($partido['cosas']) > 5) {
                                ?>
							<tr><td class="text-right" colspan="7"><i><?php echo $partido['cosas']; ?></i></td></tr>
							<?php
                            }
                        }

    $enlace = '/historico/promocion2b/index.php?equipo_id='.$equipoenf2.'&pest=equipo'; ?>

						<tr><td class="text-left" colspan="7"><a href="<?php echo $enlace; ?>">Promociones del equipo <?php echo $equipo_nombre2; ?></a></td></tr>
							
					
				</tbody>
			</table>
			<div style="clear:both"></div>
			<div class="row h25 nomargin" style="background-color:gainsboro"></div>


				<?php
} ?>




				<div class="nopadding col-xs-12 col-md-6 col-lg-6">
					<h3 class="panel-title">Participaciones del <?php echo $equipo_nombre; ?></h3>
					<hr />
					<?php
                    $i = 0;
                    foreach ($partisyrivales['participacionesEquipo'] as $parti) {
                        $coletilla = '';
                        if (isset($parti['torneo_id']) && 560 == $parti['torneo_id']) {
                            $coletilla = '(Fase Campeones) ';
                        }

                        ++$i;
                        $nt = $parti['nombre_temporada'];
                        $nt = nombreTemporadaCopa($nt);
                        $enlace = '/historico/promocion2b/index.php?temporada_id='.$parti['historicotemporadas_id'].'&equipo_id='.$_GET['equipo_id'].'&pest=temporadaid';
                        echo '<a href='.$enlace.'>'.$nt.'</a>&nbsp;&nbsp;'.$coletilla.'.&nbsp;&nbsp;';
                        if (2 == $i) {
                            echo '<br />';
                            $i = 0;
                        }
                    }
                    ?>
					<hr />
				</div>
				<div class="nopadding col-xs-12 col-md-6 col-lg-6">
					<h3 class="panel-title">Rivales del <?php echo $equipo_nombre; ?></h3>
					<hr />
					<?php
                    $nuevo = array();
                    asort($partisyrivales['rivales']);
                    foreach ($partisyrivales['rivales'] as $key => $val) {
                        $nuevo[$key] = $val;
                    }

                    foreach ($nuevo as $parti) {
                        if ('sin jugar' == $parti['nombre']) {
                            continue;
                        }
                        if ($_GET['equipo_id'] == $parti['fm_id']) {
                            continue;
                        }
                        $enlace = '/historico/promocion2b/index.php?equipo_id='.$_GET['equipo_id'].'&equipo_id2='.$parti['fm_id'].'&pest=equipo&enf=1';
                        echo '<a href='.$enlace.'>'.$parti['nombre'].'</a><br />';
                    }
                    ?>
				</div>								
			</div>
		</div>												
	</div>								
							</div>	