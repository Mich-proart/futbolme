<?php 
if ($_GET['modo']=='borrarCal'){
	unlink($_GET['f']);
}

if ($_GET['modo']=='vincular'){
	$sq='UPDATE torneo SET apiRFEFgrupo="'.$_GET['g'].'" WHERE id='.$_GET['id'];
	mysqli_query($mysqli, $sq);
}

if ($_GET['modo']=='grabar'){
	$c=$_GET['competicion'];
	$f = '../../federacion/'.$territorial.'/'.$c.'-grupos.json';
	if (@file_exists($f)) { 
	    $json = file_get_contents($f);
		$grupos = json_decode($json, true);

		if ($comunidad_id==2){
			imp($grupos);
			
			$fase=$grupos['fases'][0];$fase=str_replace("'", '', $fase);$fase=str_replace("selected", '', $fase);
			imp($fase);
			

			foreach ($grupos as $key => $value) {
				if ($key=='fases'){ continue; }

				$grupo=str_replace("'", '', $value['id']);$grupo=str_replace("selected", '', $grupo);

				$sql='SELECT id FROM torneo WHERE competicion='.$c.' AND grupo=0';
				echo $sql.'<br />';
				$resultadoSQL = mysqli_query($mysqliBase, $sql);
				$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (!empty($t)){ //solo hay uno y grupo=0 es la competicion grabada.
					$sql='UPDATE torneo SET grupo='.$grupo.',fase='.$fase.', nombreGrupo="'.$value['nombre'].'" WHERE id='.$t['id'];
					mysqli_query($mysqliBase, $sql);
					echo $sql.'<br />';
				} else {

					$sql='SELECT id FROM torneo WHERE grupo='.$grupo.' AND comunidad_id='.$comunidad_id;
					$resultadoSQL = mysqli_query($mysqliBase, $sql);
					$t2 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					if (empty($t2)){
						$sql='INSERT INTO torneo(categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, nombreGrupo, orden, tipo_torneo, inicio, estado, usuario) 
						SELECT categoria_torneo_id, categoria_id, '.$fase.', competicion, '.$grupo.', comunidad_id, nombre, "'.$value['nombre'].'", orden, tipo_torneo, inicio, estado, 0 FROM torneo WHERE competicion='.$c.' LIMIT 1';
						echo $sql.'<br />';
						mysqli_query($mysqliBase, $sql);
					}
				}
			}

		} else {

			foreach ($grupos as $key => $value) {
				imp($value);
				$sql='SELECT id FROM torneo WHERE competicion='.$c.' AND grupo=0';
				echo $sql.'<br />';
				$resultadoSQL = mysqli_query($mysqliBase, $sql);
				$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (!empty($t)){ //solo hay uno y grupo=0 es la competicion grabada.
					$sql='UPDATE torneo SET grupo='.$value['id'].', nombreGrupo="'.$value['nombre'].'" WHERE id='.$t['id'];
					mysqli_query($mysqliBase, $sql);
					echo $sql.'<br />';
				} else {

					$sql='SELECT id FROM torneo WHERE grupo='.$value['id'].' AND comunidad_id='.$comunidad_id;
					$resultadoSQL = mysqli_query($mysqliBase, $sql);
					$t2 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					if (empty($t2)){
						$sql='INSERT INTO torneo(categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, nombreGrupo, orden, tipo_torneo, inicio, estado, usuario) 
						SELECT categoria_torneo_id, categoria_id, fase, competicion, '.$value['id'].', comunidad_id, nombre, "'.$value['nombre'].'", orden, tipo_torneo, inicio, estado, 0 FROM torneo WHERE competicion='.$c.' LIMIT 1';
						echo $sql.'<br />';
						mysqli_query($mysqliBase, $sql);
					}
				}
			}

		}

	} else { echo 'no hay fichero con grupos';}
}