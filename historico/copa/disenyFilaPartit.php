<?php 
	$css1 = ''; $css2 = '';
    if (1 == $partido['clasificado']) {$css1 = 'style="color:green"';$css2 = 'style="color:red"';}
    if (2 == $partido['clasificado']) {$css1 = 'style="color:red"';$css2 = 'style="color:green"';}
    if (2 == $partido['clasificado']) {$css1 = 'style="color:red"';$css2 = 'style="color:green"';}
    if ($ne != $partido['nombre_eliminatoria']) {?>
	<tr><td colspan="5" style="padding-left:20px; font-size:16px; font-weight:bold; background-color: #CFCFCF;" >
	<?php echo $partido['nombre_eliminatoria']; ?></td></tr>
	<?php  }
    $pgLocal = '/resultados-directo/equipo/'.poner_guion($partido['local_nombre']).'/'.$partido['local_fm_id'];
    $pgVisitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante_nombre']).'/'.$partido['visitante_fm_id'];
    if ('1900-01-01' == $partido['fecha']) { $fecha = ''; } else { $fecha = nombreDia($partido['fecha']);  } ?>
<tr bgcolor='<?php echo $colorfila; ?>'>														
	<td class="text-center">
<?php 
$pgHpartido = '/historico-copa-partido/'.poner_guion(trim($partido['local_nombre'])).'-'.poner_guion(trim($partido['visitante_nombre'])).'-'.poner_guion(trim($nombreTemporada)).'/'.$partido['id']; ?>
	<?php echo $fecha; ?>	
</td>
	<td class="text-right">
	<a <?php echo $css1; ?> href="<?php echo $pgLocal; ?>">
	<?php echo $partido['local_nombre']; ?>
	</a>	
	</td>
	<td class="text-center" style="font-weight:bold; min-width: 70px">
		<?php echo $partido['local_goles']; ?> - <?php echo $partido['visitante_goles']; ?>
	</td>
	<td class="text-left">
	<a  <?php echo $css2; ?> href="<?php echo $pgVisitante; ?>">
	<?php echo $partido['visitante_nombre']; ?>
	</a>	
	</td>
	<td><a href="<?php echo $pgHpartido; ?>">
<span class="glyphicon glyphicon-eye-open iconhover pull-right" style="cursor:pointer;
border: 1px solid black; padding:3px" title="Partido entre <?=$partido['local_nombre'];?> y <?=$partido['visitante_nombre'];?> "></span>
</a></td>
</tr>
<?php $ne = $partido['nombre_eliminatoria'];