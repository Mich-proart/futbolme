<div class="panel panel-default">
	<div class="panel-heading">									
		<h3 class="panel-title">Equipos participantes</h3>
		<div class="panel-body">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12" style="float:left">
			
				

				<div class="nopadding col-xs-12 col-lg-6">
					<table class="table table-bordered table-condensed whitebox nomargin">
						<thead>
						    <tr class="darkgreenbox">
						    	<th class="text-center"></th>
								<th class="text-center">Promoción de ascenso<br />* Fase de campeones</th>
								<th class="text-center">Veces</th>
							</tr>
						</thead>

					<tbody class="whitebox">
					<?php	foreach ($participaciones1 as $participante) {
    $enlace = '/historico/promocion2b/index.php?equipo_id='.$participante['equipo_id'].'&pest=equipo';

    if (62 == $participante['equipo_id']) {
        $participante['veces'] = ($participante['veces'] - 1);
    }
    if (525 == $participante['equipo_id']) {
        $participante['veces'] = ($participante['veces'] - 1);
    }

    $rutaEscudo = '/img/equipos/escudo'.$participante['equipo_id'].'.png';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
        $rutaEscudo = '/img/jugadores/NI.png';
    } ?>
						<tr>
							<td class="text-center"><img src="<?php echo $rutaEscudo; ?>" style="width:18px; height:20px" alt="escudo"></td>
							<td class="text-center"><?php echo $participante['equipo_nombre']; ?></td>
							<td class="text-center"><a href="<?php echo $enlace; ?>"><?php echo $participante['veces']; ?></a>
									<?php	foreach ($participaciones2 as $fasecampeones) {
        if ($fasecampeones['equipo_id'] == $participante['equipo_id']) {
            ?>						
										- <a href="<?php echo $enlace; ?>"><?php echo $fasecampeones['veces']; ?></a>*
								    <?php
        }
    } ?>
							</td>
							
						</tr>
				    <?php
} ?>
				    </tbody>
					</table>
				</div>												
				
				<div class="nopadding col-xs-12 col-lg-6">
					<table class="table table-bordered table-condensed whitebox nomargin">
						<thead>
						    <tr class="darkgreenbox">
						    	<th class="text-center"></th>
								<th class="text-center">Campeón Absoluto<br />---</th>
								<th class="text-center">Edición</th>
							</tr>
						</thead>

					<tbody class="whitebox">
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo373.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">CyD Leonesa</td>
							<td class="text-center">2016-17</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo547.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">UCAM Murcia</td>
							<td class="text-center">2015-16</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo507.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">Real Oviedo</td>
							<td class="text-center">2014-15</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo444.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">Albacete Balompié</td>
							<td class="text-center">2013-14</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo452.png" alt="equipo"  style="width:18px; height:20px"></td>
							<td class="text-center">Deportivo Alavés</td>
							<td class="text-center">2012-13</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo351.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">Real Madrid CF Castilla</td>
							<td class="text-center">2011-12</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo465.png" alt="equipo"  style="width:18px; height:20px"></td>
							<td class="text-center">Real Murcia CF</td>
							<td class="text-center">2010-11</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo528.png" alt="equipo"  style="width:18px; height:20px"></td>
							<td class="text-center">Granada CF</td>
							<td class="text-center">2009-10</td>							
						</tr>
						<tr>
							<td class="text-center">
							<img src="/img/equipos/escudo62.png"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center">Cádiz CF</td>
							<td class="text-center">2008-09</td>							
						</tr>						
				    </tbody>
					</table>

					<table class="table table-bordered table-condensed whitebox nomargin">
						<thead>
						    <tr class="darkgreenbox">
						    	<th class="text-center"></th>
								<th class="text-center">Permanencia en Segunda B<br />---</th>
								<th class="text-center">Veces</th>
							</tr>
						</thead>

					<tbody class="whitebox">
					<?php	foreach ($participaciones3 as $participante) {
        $enlace = '/historico/promocion2b/index.php?equipo_id='.$participante['equipo_id'].'&pest=equipo'; ?>
						<tr>
							<td class="text-center"><img src="/img/equipos/escudo<?php echo $participante['equipo_id']; ?>.png" style="width:18px; height:20px" alt="escudo"></td>
							<td class="text-center"><?php echo $participante['equipo_nombre']; ?></td>
							<td class="text-center"><a href="<?php echo $enlace; ?>"><?php echo $participante['veces']; ?></a></td>
							
						</tr>
				    <?php
    } ?>
				    </tbody>
					</table>
				</div>		
			</div>
		</div>																	
	</div>								
</div>