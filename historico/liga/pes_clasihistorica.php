<div class="panel panel-default">
	<div class="nopadding col-xs-12">
	<table class="table table-bordered table-condensed whitebox nomargin txt11">
	<tr><td colspan='11' bgcolor='#99FF99'></td></tr>
	<tr bgcolor='#336699'>
	<td style='color:#FFFFFF; text-align:center' width='7%' class="hidden-xs">Pos</td>
	<td style='color:#FFFFFF; text-align:center' width='7%' class="hidden-xs">Tmp</td>
	<td style='color:#FFFFFF'>
	<span class="hidden-sm hidden-md hidden-lg">
	Pos / Tmp<br /> 
	</span>
	Equipo</td>
	<td style='color:#FFFFFF; text-align:center' width='7%' class="hidden-xs">Ptos</td>
	<td style='color:#FFFFFF; text-align:center' width='7%'>Ju
	<span class="hidden-sm hidden-md hidden-lg">
	Ptos<br /> 
	</span>
	</td>
	<td style='color:#FFFFFF; text-align:center' width='7%'>Ga</td>
	<td style='color:#FFFFFF; text-align:center' width='7%'>Em</td>
	<td style='color:#FFFFFF; text-align:center' width='7%'>Pe</td>
	<td style='color:#FFFFFF; text-align:center' width='7%'>Gf
	<span class="hidden-sm hidden-md hidden-lg">
	<br />Gc<br />Dif  
	</span>
	</td>
	<td style='color:#FFFFFF; text-align:center' width='7%' class="hidden-xs">Gc</td>
	<td style='color:#FFFFFF; text-align:center' width='7%' class="hidden-xs">Dif</td>
	</tr>
	<?php 
    if (isset($clasificacion)) {
        foreach ($clasificacion as $key => $fila) {
            $rutaEscudo = '/img/equipos/escudo'.$fila['fm_equipo_id'].'.png';

            if ('0' == $fila['jugados']) {
                continue;
            } ?>
	<tr bgcolor='#ffffff'>
	<td width='7%' align="center" class="hidden-xs"><?php echo $key + 1; ?>º</td>
	<td width='7%' align="center" class="hidden-xs"><?php echo $fila['temporadas']; ?></td>
	<td>
	<img src="<?php echo $rutaEscudo; ?>"  alt="equipo" style="width:18px; height:20px">
				
	<span class="hidden-sm hidden-md hidden-lg">
	<?php echo $key + 1; ?>º /	
	<?php echo $fila['temporadas']; ?><br /> 
	</span>

	<?php 
    $enlace2 = '/historico-liga/titulos/'.poner_guion($txtDivision).'/'.poner_guion($fila['equipo']).'/'.$fila['fm_equipo_id'].'/'.$division;
            echo "<a href='".$enlace2."'>".$fila['equipo'].'</a>'; ?></td>
	<td width='7%' align="center" class="hidden-xs"><b><?php echo $fila['puntos']; ?></b></td>
	<td width='7%' align="center">
	
	<?php echo $fila['jugados']; ?>

	<span class="hidden-sm hidden-md hidden-lg">
	<b><?php echo $fila['puntos']; ?></b><br />	
	</span>
	
	</td>
	<td width='7%' align="center"><?php echo $fila['ganados']; ?></td>
	<td width='7%' align="center"><?php echo $fila['empatados']; ?></td>
	<td width='7%' align="center"><?php echo $fila['perdidos']; ?></td>
	<td width='7%' align="center"><?php echo $fila['golesFavor']; ?>
	<span class="hidden-sm hidden-md hidden-lg">
	<?php echo $fila['golesContra']; ?><br />	
	<?php echo $fila['golesFavor'] - $fila['golesContra']; ?><br />
	</span>

	</td>
	<td width='7%' align="center" class="hidden-xs"><?php echo $fila['golesContra']; ?></td>
	<td width='7%' align="center" class="hidden-xs"><?php echo $fila['golesFavor'] - $fila['golesContra']; ?></td>
	</tr>
	<?php
        }
    }?>
	</table>
	</div>	
</div>		