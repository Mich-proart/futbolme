<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php';

$sql = 'SELECT temporada_id FROM temporada_equipo WHERE equipo_id='.$_POST['equipo'];
$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);   

foreach ($r as $key => $value) {
	
	$f = '../../../../json/temporada/'.$value['temporada_id'].'/tipo.json';
	if (@file_exists($f)) { 
		$json = file_get_contents($f);
		$datos = json_decode($json, true);
		$torneo=$datos['torneo'];
		$tipoTorneo = $torneo['tipo_torneo'];
		$jornadaActiva = $torneo['jornadaActiva'];

		if ($tipoTorneo!=$_POST['tipo_torneo']){ continue; }


		if ($tipoTorneo==1 && $value['temporada_id']!=$_POST['temporada_id']){
				foreach ($datos['clasificacion']['clasificacionFinal'] as $k => $v) {
					if ($v ['equipo_id']==$_POST['equipo']){ ?>
			<form onsubmit="addSancion(event,$(this).serialize(),<?php echo $tipoTorneo?>,<?php echo $_POST['temporada_id']?>,<?php echo $jornadaActiva?>)" method="post">
			<label for="jornada">Temp. <?php echo $value['temporada_id']?> -  jor</label><input size="2" type="text" name="jornada" value="<?php echo $jornadaActiva?>">
			<label for="puntos">pts</label><input size="2" type="text" name="puntos" value="<?php echo $v['puntos']?>">
			<label for="jugados">j</label><input size="2" type="text" name="jugados" value="<?php echo $v['jugados']?>">
			<label for="ganados">g</label><input size="2" type="text" name="ganados" value="<?php echo $v['ganados']?>">
			<label for="empatados">e</label><input size="2" type="text" name="empatados" value="<?php echo $v['empatados']?>">
			<label for="perdidos">p</label><input size="2" type="text" name="perdidos" value="<?php echo $v['perdidos']?>">
			<label for="gFavor">gF</label><input size="2" type="text" name="gFavor" value="<?php echo $v['gFavor']?>">
			<label for="gContra">gC</label><input size="2" type="text" name="gContra" value="<?php echo $v['gContra']?>">
			<input type="hidden" name="temporada_id" value="<?php echo $_POST['temporada_id']?>">
			<input type="hidden" name="equipo_id" value="<?php echo $_POST['equipo']?>">
			<input type="submit" value="guardar">
			</form>			
					<?php }
				}
		}  else { ?>

		<form onsubmit="addSancion(event,$(this).serialize(),<?php echo $tipoTorneo?>,<?php echo $_POST['temporada_id']?>,<?php echo $jornadaActiva?>)" method="post">
			<label for="jornada">Temp. <?php echo $value['temporada_id']?> -  jor</label><input size="2" type="text" name="jornada" value="0">
			<label for="puntos">pts</label><input size="2" type="text" name="puntos" value="0">
			<label for="jugados">j</label><input size="2" type="text" name="jugados" value="0">
			<label for="ganados">g</label><input size="2" type="text" name="ganados" value="0">
			<label for="empatados">e</label><input size="2" type="text" name="empatados" value="0">
			<label for="perdidos">p</label><input size="2" type="text" name="perdidos" value="0">
			<label for="gFavor">gF</label><input size="2" type="text" name="gFavor" value="0">
			<label for="gContra">gC</label><input size="2" type="text" name="gContra" value="0">
			<input type="hidden" name="temporada_id" value="<?php echo $_POST['temporada_id']?>">
			<input type="hidden" name="equipo_id" value="<?php echo $_POST['equipo']?>">
			<input type="submit" value="guardar">
			</form><br />


	<?php } //si existe el json
	}
}?>