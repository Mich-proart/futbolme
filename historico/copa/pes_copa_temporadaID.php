<div class="panel panel-default">
			<table class="table table-bordered table-condensed greenbox nomargin txt11">
		<thead>
			<tr class="darkgreenbox">
				<th class="text-center" colspan="5"><?php echo $nombreTemporada; ?></th>
			</tr>
		</thead>
		<tbody class="whitebox">					 
			<?php
if ($equipo_id>0){ ?>
	<tr><td colspan="5" style="padding-left:20px; font-size:16px; font-weight:bold" >
	El  <?php echo $equipo_nombre?> en el Campeonato</td></tr>
	<?php $ne = ''; $colorfila = 'white';
	foreach ($partidos as $partido) {
		if ($equipo_id!=$partido['local_fm_id'] && $equipo_id!=$partido['visitante_fm_id']) { continue; }
		include('disenyFilaPartit.php');
	}?>
	<tr class="darkgreenbox">
		<th class="text-center" colspan="5">Así fué el torneo...</th>
	</tr>

<?php }

$ne = ''; $colorfila = 'white';
foreach ($partidos as $partido) {
	if (!isset($partido['clasificado'])) { continue; }    
    include('disenyFilaPartit.php');
}?>
			
		</tbody>
	</table>
</div>										
