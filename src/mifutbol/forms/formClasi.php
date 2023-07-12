
<table border="1" bgcolor="gainsboro" width="100%">
	<thead>
		<tr>
			<th colspan="11">
			    <div class="marco clear">
			    <?php
				$f = 'json/gestores/'.$valorGestor.'/colores.json';
				if (@file_exists($f)) {
				$json = file_get_contents($f);$colores = json_decode($json, true);
				$txtColors=count($colores).' lineas creadas';
				} else { $colores=array(); $txtColors='Pulsa aquí'; }?>	
				<div class="pull-right text-center celestebox" onClick="window.open('/src/mifutbol/clasificacion/clasPintar.php?grupo=<?php echo $valorGrupo?>
					&gestor=<?php echo $valorGestor?>','colores', 'toolbar=no, location=no, resizable=yes, scrollbars=yes, width=900, height=600, top=10, left=10');" style="cursor:pointer; color:white; padding: 5px;">crear colores y leyendas (<?php echo $txtColors?>)</div>
					
			    Pulsa en <span style="color:maroon">la posición</span> para pintar la clasificación.
				<br />Pulsa <span style="color:maroon">en el escudo</span> para añadir puntos de sanción.			
				</div>		
			</th>
		</tr>
		<tr style="color:white">
			<th>Pos.</th>
			<th>Equipo</th>
			<th>PTOS</th>
			<th>JU</th>
			<th>GA</th>
			<th>EM</th>
			<th>PE</th>
			<th>GF</th>
			<th>GC</th>
			<th>DIF</th>
			<th>escudo</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;

		$f = 'json/gestores/'.$valorGestor.'/'.$valorGrupo.'-clas_colores.json';
		if (@file_exists($f)) {
		$json = file_get_contents($f);$pintadas = json_decode($json, true);
		} else { $pintadas=array(); }

        foreach ($clasificacion as $k1 => $fila) {   
        $color_fondo = 'white';$cssF = 'white';$cssT = 'black';
        if (isset($fila['preferente']) && 1 == $fila['preferente']) {$color_fondo = 'yellow';}
        if (isset($pintadas[$fila['posicion']])) {
        	$cssF = $pintadas[$fila['posicion']]['cf'];
        	$cssT = $pintadas[$fila['posicion']]['ct'];
        }

        $rutaEscudo='';
       foreach ($eqC as $k3 => $v3) {       	
            if($fila['equipo_id']==$v3['id'] && isset($v3['club'])){
                $n=explode('_', $v3['club']);
                $club=$n[1];$club=intval($club);
                $rutaEscudo='/img/federacion/'.$territorial.'/escudo_'.$club.'.png';
                break;
            }
        }
                

           // $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);?>
			<tr id="fila-<?php echo $valorGrupo?>-<?php echo $fila['posicion']?>" style="background-color: <?php echo $cssF?>;color:<?php echo $cssT?>">
				<td onclick="clasColor(<?php echo $valorGrupo?>,<?php echo $fila['posicion']?>)" align="center" style="cursor:pointer">
					<?php echo $fila['posicion']?>º
				</td>
				<td id="e<?php echo $fila['equipo_id']?>" onclick="clasSancion(<?php echo $valorGrupo?>,<?php echo $fila['posicion']?>)" align="left" style="cursor:pointer">						
					<img src="<?php echo $rutaEscudo?>" style="width:18px; height:20px">
					<b><?php echo $fila['nombre']; ?></b>
				</td>
				<td align="center"><b><?php echo $fila['puntos']; ?></b></td>
				<td align="center"><?php echo $fila['jugados']; ?></td>
				<td align="center"><?php echo $fila['ganados']; ?></td>
				<td align="center"><?php echo $fila['empatados']; ?></td>
				<td align="center"><?php echo $fila['perdidos']; ?></td>
				<td align="center"><?php echo $fila['gFavor']; ?></td>
				<td align="center"><?php echo $fila['gContra']; ?></td>
				<td align="center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
				<td align="center"><b><?php echo $fila['club_id']; ?></b></td>
				<td align="center">
				<?php  // aqui va el ascenso?>

				</td>
			</tr>
			
			<tr id="posicion-<?php echo $valorGrupo?>-<?php echo $fila['posicion']?>" style="display:none">
				<td colspan="11" bgcolor="white">
					
					<div style="float:right; width: 50%">
					<form method="post" name="p<?php echo $fila['posicion']?>" onsubmit="coloreo(event, $(this).serialize(),<?php echo $fila['posicion']?>)">
					<input type="hidden" name="pintar" value="1">
					<input type="hidden" name="gestor" value="<?php echo $valorGestor?>">
					<input type="hidden" name="grupo" value="<?php echo $valorGrupo?>">
					<input type="hidden" name="posicion" value="<?php echo $fila['posicion']?>">
					<select name="estilo">
						<option value="-2">elige estilo</option>
						<option value="-1">sin estilo</option>
					<?php foreach ($colores as $k1 => $v1) { 
						if ($v1['id']<0) { continue; }?>
						<option style="background-color: <?php echo $v1['cf']?>; color:<?php echo $v1['ct']?>" value="<?php echo $v1['id']?>"><?php echo $v1['ly']?></option>
					<?php } ?>
					</select>
					<input type="submit" name="pinta" value="pinta">
					</form>
					</div>
				</td>
			</tr>

			<tr id="sancion-<?php echo $valorGrupo?>-<?php echo $fila['posicion']?>" style="display:none">
				<td colspan="11" bgcolor="white">
				<form method="post" name="s<?php echo $fila['posicion']?>" onsubmit="sanciono(event, $(this).serialize(),<?php echo $fila['posicion']?>,<?php echo $valorGrupo?>)">
				Jor:<input size="2" type="text" name="jornada" value="0" required>
				Ptos:<input size="2" type="text" name="puntos" value="0" required> 
				<br />
				Motivo <input size="30" type="text" name="motivo" placeholder="motivo de la sanción">
				<input type="hidden" name="sancion" value="1">
				<input type="hidden" name="gestor" value="<?php echo $valorGestor?>">
				<input type="hidden" name="grupo" value="<?php echo $valorGrupo?>">
				<input type="hidden" name="equipo_id" value="<?php echo $fila['equipo_id']; ?>">
				<input type="submit" name="sancionar" value="sancionar">
				</form>
					

				</td>
			</tr>
			<?php ++$i;
        } ?> 
		</tbody>
	</table>
		<div id="colores<?php echo $valorGrupo?>" class="whitebox clear" style="float:left; width: 100%; padding: 20px; text-align: center">
			<table width="100%"><tr>
			<?php ksort($pintadas);
			$t='';
			foreach ($pintadas as $pinto) {
			if ($t==$pinto['ly']){ continue;} ?>
			<td style="width: auto; padding: 5px; color:<?php echo $pinto['ct']; ?>;background-color:<?php echo $pinto['cf']; ?>"><?php echo $pinto['ly']; ?></td>
			<?php $t=$pinto['ly'];
			} ?></tr></table>
		</div>
	
		<div id="sanciones<?php echo $valorGrupo?>" class="whitebox">
		<?php 
		$f = 'json/gestores/'.$valorGestor.'/'.$valorGrupo.'-clas_sanciones.json';
		if (@file_exists($f)) {
		$json = file_get_contents($f);$sanciones = json_decode($json, true);
		} else { $sanciones=array(); }
		if (count($sanciones)>0){
			echo '<h3>Sanciones</h3>';
		  foreach ($sanciones as $k => $v) {
			foreach ($v as $k1 => $v1) {
				foreach ($clasificacion as $key => $fila) {
					$nombre='';
					if ($fila['equipo_id']==$k1){ $nombre=$fila['nombre']; break;}
				}
				echo 'Jornada '.$k.' - Eq.'.$nombre.' '.$v1['puntos'].' '.$v1['motivo'].'<br />';
		    }
		  }
		}?>
			

		</div>
	