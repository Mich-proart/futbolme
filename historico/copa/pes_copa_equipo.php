<div class="panel panel-default">
	<div class="panel-heading">				
		<div class="panel-body nopadding">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12">
				<?php if (isset($_GET['m'])) {
    ?>
				<div class="nopadding col-xs-6 col-md-6 col-lg-6">
					<?php
                    if (count($titulos['campeonatos']) > 0) {
                        echo "<h3 class='panel-title'>Campeonatos</h3><hr />";
                    }
    $i = 0;
    foreach ($titulos['campeonatos'] as $titulo) {
        ++$i;
        $nt = $titulo['nombre_temporada'];
        $enlace = '/historico-copa-campeonato/'.poner_guion($nt).'/'.poner_guion($equipo_nombre).'/'.$titulo['id'].'/'.$_GET['equipo_id'];
        echo '<a href='.$enlace.'>'.$nt.'</a> . ';
        if (2 == $i) {
            echo '<br />';
            $i = 0;
        }
    } ?>
				</div>
				<div class="nopadding col-xs-6 col-md-6 col-lg-6">											
					<?php
                    $i = 0;
    if (count($titulos['subcampeonatos']) > 0) {
        echo "<h3 class='panel-title'>Subcampeonatos</h3><hr />";
    }
    foreach ($titulos['subcampeonatos'] as $titulo) {
        ++$i;
        $nt = $titulo['nombre_temporada'];
        $enlace = '/historico-copa-subcampeonato/'.poner_guion($nt).'/'.poner_guion($equipo_nombre).'/'.$titulo['id'].'/'.$_GET['equipo_id'];
        echo '<a href='.$enlace.'>'.$nt.'</a> . ';
        if (2 == $i) {
            echo '<br />';
            $i = 0;
        }
    } ?>
				</div>
				<div style="clear:both"></div>
				<div class="row h25 nomargin" style="background-color:gainsboro"></div>
				<?php
} ?>





				<?php if (isset($_GET['enf'])) {
        //imp($enfrentamientos);?>
				<table class="table table-bordered table-condensed whitebox nomargin">
				<thead>
					<tr class="darkgreenbox">
						<th class="text-center">Eliminatoria / fecha</th>
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
                                $css1 = 'style="color:green; font-weight:bold"';
                                $css2 = 'style="color:red"';
                            }
                            if (2 == $partido['clasificado']) {
                                $css1 = 'style="color:red"';
                                $css2 = 'style="color:green; font-weight:bold"';
                            }

                            $nt = $partido['enlace_nombre'];
                            $enlace = '/historico-copa-temporada/'.poner_guion($nt).'/'.$partido['enlace_id']; ?>													
						<tr>														
							<td class="text-center"><a href="<?php echo $enlace; ?>"><?php echo $nt; ?></a> 
							<i><?php echo $partido['fecha']; ?></i><br />
							<b><?php echo $partido['fase']; ?></b>
							</td>
							<td <?php echo $css1; ?> class="text-center"><?php echo $partido['local']; ?></td>
							<td class="text-center" style="font-weight:bold; min-width:50px;">
								<?php echo $partido['goles_local']; ?> - <?php echo $partido['goles_visitante']; ?>
							</td>
							<td <?php echo $css2; ?> class="text-center"><?php echo $partido['visitante']; ?></td>
						
							<td>
							<?php $enlace = '/historico-copa-partido/'.poner_guion(trim($nt)).'--'.poner_guion(trim($partido['fase'])).'--'.poner_guion(trim($partido['local'])).'-'.poner_guion(trim($partido['visitante'])).'/'.$partido['id']; ?>
								<a href="<?php echo $enlace; ?>">
									<span style="font-size: 1em">+</span>
								</a>

							<?php /*
                            $idt=$partido['enlace_id'];
                            $bdPartido=3;
                            $partido['id']=$partido['id'];
                            include $nivel.'srcRecursos/partidoRmd.php';
                           */ ?> 			


							</td>


						</tr>
							<?php if (strlen($partido['cosas']) > 5) {
                                ?>
							<tr><td class="text-right" colspan="7"><i><?php echo $partido['cosas']; ?></i></td></tr>
							<?php
                            }
                        }

        $enlace = '/historico-copa-participaciones/'.poner_guion($equipo_nombre2).'/'.$equipo2; ?>

						<tr><td class="text-left" colspan="7"><a href="<?php echo $enlace; ?>">Palmarés del equipo <?php echo $equipo_nombre2; ?></a></td></tr>
							
					
				</tbody>
			</table>
			<div style="clear:both"></div>
			<div class="row h25 nomargin" style="background-color:gainsboro"></div>


				<?php
    } ?>




				<div class="col-xs-6">
					<hr /><h3 class="panel-title" style="padding-bottom: 20px">Participaciones del <?php echo $equipo_nombre; ?> en Copa</h3>
					<?php
                    foreach ($partisyrivales['participacionesEquipo'] as $parti) {
                        $nt = $parti['nombre_temporada'];
                        $enlace = '/historico-copa-participacion/'.poner_guion($nt).'/'.poner_guion($equipo_nombre).'/'.$parti['historicotemporadas_id'].'/'.$_GET['equipo_id'];
                        echo '<div class="marco"><a href='.$enlace.'>'.$nt.'</a></div>'; 
                    }
                    ?>
				</div>
				<div class="col-xs-6">
					<hr /><h3 class="panel-title" style="padding-bottom: 20px">Rivales del <?php echo $equipo_nombre; ?> en Copa</h3>
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
                        $enlace = '/historico-copa-enfrentamientos/'.poner_guion($equipo_nombre).'-vs-'.poner_guion($parti['nombre']).'/'.$_GET['equipo_id'].'/'.$parti['fm_id'];
                        $rutaEscudo = '/img/equipos/escudo'.$parti['fm_id'].'.png';
                        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                            $rutaEscudo = '/img/jugadores/NI.png';
                        }                        
                        echo '<div class="marco" style="text-align:left !important"><img src="'.$rutaEscudo.'"  itemprop="logo" alt="escudo '.$parti['nombre'].'"  style="width:18px; height:20px; margin-right: 5px"> <a href='.$enlace.'>'.$parti['nombre'].'</a></div>';
                    }
                    ?>
				</div>								
			</div>
		</div>												
	</div>								
							</div>	