
<div class="panel panel-default">
	<div class="panel-heading">
		
		<h3 class="panel-title">Todas las finales de la Copa de España</h3>

		<div class="panel-body">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12">
			
				<div class="table-responsive whitebox">
					<table class="table table-bordered table-condensed whitebox nomargin">
						<thead>
						    <tr class="darkgreenbox">
								<th class="text-center" style="width:35%">Campeón</th>
								<th class="text-center" style="width:5%">Resultado</th>
								<th class="text-center" style="width:35%">Subcampeón</th>
							</tr>
						</thead>

					<tbody class="whitebox">
					<?php	foreach ($finales as $final) {
    $nt = $final['nombre_temporada'];
    

    if ('1900-01-01' == $final['fecha']) {
        $fecha = '';
    } else {
        $fecha = nombreDiaCompleto($final['fecha']);
    }

    $enlace = '/historico-copa-temporada/'.poner_guion($nt).'/'.$final['historicotemporadas_id']; ?>
						<tr>
							<td class="text-center" colspan="3"><?php echo $fecha; ?>
							<a href="<?php echo $enlace; ?>"> -ver- </a>

							<?php


                           /* $idt=$final['historicotemporadas_id'];
                            $bdPartido=3;
                            $partido['id']=$final['id'];
                            include $nivel.'srcRecursos/partidoRmd.php';*/
                            ?> 

							</td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $final['local_nombre']; ?></td>
							<td class="text-center" style="font-weight:bold;">
							<?php 
                            if (130 != $final['historicotemporadas_id']) {
                                echo $final['local_goles']; ?> - <?php echo $final['visitante_goles'];
                            } ?>
							</td>
							<td class="text-center"><?php echo $final['visitante_nombre']; ?></td>
							
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