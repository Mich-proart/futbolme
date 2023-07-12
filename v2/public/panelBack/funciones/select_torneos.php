<?php 
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas


$tipo_torneo = $_POST['tipo_torneo'];
$categoria_torneo = $_POST['categoria_torneo'];
$usuario_id = $_POST['usuario_id'];

//echo "<pre>";
//var_dump($tipo_torneo);
//var_dump($categoria_torneo);
//var_dump($usuario_id);
//echo "</pre>";


$lista_torneos = listarTorneosPorCategoria($tipo_torneo, $categoria_torneo, $usuario_id);

//echo "<pre>";
//var_dump($lista_torneos);
//echo "</pre>";

		$listaComunidad=array();
		$listaComunidadSala=array();
		foreach ($lista_torneos[0] as $key => $value) {			
			/*if ($value['categoria_torneo_id']==17){
				$listaComunidadSala[$value['comunidad_id']]['nombre']=$value['nombreComunidad'];
				$listaComunidadSala[$value['comunidad_id']]['torneos'][]=$value;
			} else {*/
				$listaComunidad[$value['comunidad_id']]['nombre']=$value['nombreComunidad'];
				$listaComunidad[$value['comunidad_id']]['torneos'][]=$value;
			//}
			
		}

		ksort($listaComunidad);
		//ksort($listaComunidadSala);

		/*if ($categoria_torneo==17){
			unset($listaComunidad);
			$listaComunidad=$listaComunidadSala;
		}*/


if ($tipo_torneo < 3) { ?>
<div class="marco" style="background-color: lavender">
	<?php if($tipo_torneo==1){ echo "<span>LIGAS</span>"; } else { echo "<span>TORNEOS</span>"; }

	if ($categoria_torneo>0) { 
		echo '<table border="1">';
		foreach ($listaComunidad as $key => $value) { ?>
			<tr><td style="width:150px"?><?php echo $value['nombre']?></td><td><select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo?>,<?php echo $categoria_torneo?>,<?php echo $usuario_id?>)">
				<option value="0">_________________Competiciones</option>
				<?php foreach ($value['torneos'] as $fila) {
				    if (1 == $tipo_torneo) {
				        echo "<option value='".$fila['id'].','.$fila['jornadas'].','.$fila['jornadaActiva'].',0,'.$fila['betsapi']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].') ('.$fila['betsapi'].')</option>';
				    } else {
				        echo "<option value='".$fila['id'].','.$fila['tipo_eliminatoria'].','.$fila['fase_activa'].',,'.$fila['betsapi']."'>
						".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].') ('.$fila['betsapi'].')</option>';
				    }
				} ?>
			</select></td></tr>
		<?php } echo '</table>';
	} else { ?>
	<select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo; ?>,<?php echo $categoria_torneo; ?>)">
	<option value="0">_________________Competiciones</option>
	<?php foreach ($lista_torneos[0] as $fila) {
	    if (1 == $tipo_torneo) {
	        echo "<option value='".$fila['id'].','.$fila['jornadas'].','.$fila['jornadaActiva'].',0,'.$fila['betsapi']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].') ('.$fila['betsapi'].')</option>';
	    } else {
	        echo "<option value='".$fila['id'].','.$fila['tipo_eliminatoria'].','.$fila['fase_activa'].','.$fila['grupo_id'].','.$fila['betsapi']."'>
			".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].') ('.$fila['betsapi'].')</option>';
	    }
	} ?>
	    <option value="0">_________________Ocultos</option>
	    <?php foreach ($lista_torneos[1] as $fila) {
	        if (1 == $tipo_torneo) {
	            echo "<option value='".$fila['id'].','.$fila['jornadas'].','.$fila['jornadaActiva'].",0'>
				".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
	        } else {
	            echo "<option value='".$fila['id'].','.$fila['tipo_eliminatoria'].','.$fila['fase_activa'].",0'>
				".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
	        }
	    } 
	?>
	</select>

<?php } //si categoria_torneo es diferente a 4?>
<div class="clear"></div>
</div>
<?php } else { 
	//si tipo_torneo es igual a 3 ///
	$fecha=$categoria_torneo;



	foreach ($listaComunidad as $key => $value) { ?>
		
			<div class="btn-group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
					<?php echo $value['nombre']?>
				</button>
				<div class="dropdown-menu">
					<?php foreach ($value['torneos'] as $fila) { ?>	
					<div style="float:left; width:100%; padding:2px; margin-left: 10px">
						<input class="resultado" id="boton-apuestaMA-<?php echo $fila['id']; ?>" type="text" size="2" name="apuestaMA" value="<?php echo $fila['apuestaMA']; ?>" style="font-size:12px; width:20; margin-left:-15px; text-align: center">
					<input class="resultado" id="boton-betsapi-<?php echo $fila['id']; ?>" type="text" size="4" name="betsapi" value="<?php echo $fila['betsapi']; ?>" style="font-size:12px; width:20; background-color: yellow; text-align: center">
					<input class="btn_enviar" id="boton-orden-<?php echo $fila['id']; ?>" type="button" onclick="ordenTorneo(<?php echo $fila['id']; ?>)" 
					style="font-size:12px" value="Or.">
					<input id="boton-filtro-<?php echo $fila['id']; ?>" type="button" class="btn_enviar" onclick="cargar_torneo_jornadas(<?php echo $fila['id']; ?>,<?php echo $tipo_torneo; ?>,<?php echo $fecha; ?>)" 
						value="<?php echo $fila['nombrePais'].' - '.$fila['nombre']; ?> (<?php echo $fila['id']; ?>)" style="font-size:12px">
					</div>
					<?php  } ?>
				</div>
			</div>
		
	<?php }

	echo '';

    
	$inicio = date('Y-m-d');
    $fin=$inicio;



    ?>

    <div style="float:left; width:100%; background-color: white;">
    	
    	
		

    
    	<div style="float:left; width:100%; padding:10px">    		
    	
    	<?php //if ($categoria_torneo!=17){ ?> 
    		<a href="https://es.betsapi.com/ci/soccer" target="_blank">Betsapi</a>
    		<div style="clear: both;"></div>

    	<div style="float:left; width:100%; padding:10px">
    		<h4 class="text-center">BETSAPI - Torneos para hoy</h4>
    	Fifa: Clubes amistosos masculino [363]: 
    	Se mostraran también los partidos de los siguientes ids:
    	375,508,631,1711,1764,2656,6084 y 8993<br />

    	Fifa: Selecciones masculino [5361]: 
    	Se mostraran también los partidos de los siguientes ids:
    	26, 250, 508, 598, 6584, 10942
    	<br />
    	Fifa: Clubes Femeninas [217]: 
    	Se mostraran también los partidos de los siguientes ids: 795, 1711, 3756, 5371, 6296
    	<br />
    	Fifa: Selecciones Femeninas [941]: 
    	Se mostraran también los partidos de los siguientes ids:
    	426
    	<hr />
    		<?php
    		$inicio=str_replace("-", "", $inicio);
    		include 'apis/betsapi.php';
    		$carpeta = '../../../json/betsapi';  
		    $f = $carpeta.'/partidosTodos.json';
		    $cachetime=60*60*3;
		    $fichero_time=0;
		    if (@file_exists($f)) { $fichero_time = @filemtime($f); }
			
			if ((time() - $fichero_time) > $cachetime) {
			    $ch = curl_init($url);     
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    $resultado = curl_exec($ch);
    print_r(curl_getinfo($ch));
    if(curl_errno($ch)) {
        echo curl_error($ch);
        return 'sin proxy:  - ERROR '.curl_error($ch);
    } 
    curl_close($ch);		    
		    	guardarFILE($resultado, $f);
			} 		    
		    $partidos = file_get_contents($f);
		    $partidos = json_decode($partidos, true);
		    $torneos=array();
		    if (isset($partidos)){
			    foreach ($partidos['results'] as $key => $value) {			    	
			    	$torneos[$value['league']['cc']][$value['league']['id']]=$value['league']['id'];
			    	$torneos[$value['league']['cc']][$value['league']['id']]=$value['league']['name'];
			    }
			    foreach ($torneos as $key => $value) {
			    	echo "---- ".$key.' (pais) - <br />';
			    	foreach ($value as $k => $v) {
			    		echo ' ---------- '.$k.' :: '.$v.'  :: <a href="partidosHoy.php?id='.$k.'&api=betsapi" target="_blank">Ver</a><br />';
			    	}
			    	echo '<hr />';
			    }
			} else { echo "No se han obtenido partidos de betsapi"; } ?>

    	</div>
    	<?php //} //si no es 17 ?>

    </div>

    <?php 

}

?>