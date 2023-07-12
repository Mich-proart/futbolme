<div class="panel panel-default">
	<div class="panel-heading">									
		<h3 class="panel-title">Equipos participantes</h3>
		<div class="panel-body">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12">
			
				<div class="table-responsive whitebox">
					<table class="table table-bordered table-condensed whitebox nomargin">
						<thead>
						    <tr class="darkgreenbox">
								<th class="text-center">Equipo</th>
								<th class="text-center">Veces</th>
							</tr>
						</thead>

					<tbody class="whitebox">
					<?php	foreach ($participantes as $participante) {
    $enlace = '/historico-copa-participaciones/'.poner_guion($participante['equipo_nombre']).'/'.$participante['equipo_id']; ?>
						<tr>
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