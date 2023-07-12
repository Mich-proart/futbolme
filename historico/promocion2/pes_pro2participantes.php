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
								<th class="text-center">Promoción de ascenso</th>
								<th class="text-center">Veces</th>
							</tr>
						</thead>

					<tbody class="whitebox">
					<?php	foreach ($participaciones1 as $participante) {
    $enlace = '/historico/promocion2/index.php?equipo_id='.$participante['equipo_id'].'&pest=equipo';
    $rutaEscudo = '/img/equipos/escudo'.$participante['equipo_id'].'.png';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
        $rutaEscudo = '/img/jugadores/NI.png';
    } ?>
						<tr>
							<td class="text-center"><img src="<?php echo $rutaEscudo; ?>"  alt="equipo" style="width:18px; height:20px"></td>
							<td class="text-center"><?php echo $participante['equipo_nombre']; ?></td>
							<td class="text-center"><a href="<?php echo $enlace; ?>"><?php echo $participante['veces']; ?></a>
							</td>
							
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