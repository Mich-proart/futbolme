<?php
if (isset($_POST['modo'])){


	if ($_POST['modo']=='accion'){
		if ($_POST['ac']==0){ //recuperar
			$sql='UPDATE torneo SET visible=5 WHERE id='.$_POST['torneo_id'];
			$resultadoSQL = mysqli_query($mysqli, $sql);
		}

		if ($_POST['ac']==1){ //ocultar
			$sql='UPDATE torneo SET visible=3 WHERE id='.$_POST['torneo_id'];
			$resultadoSQL = mysqli_query($mysqli, $sql);
		}

		if ($_POST['ac']==2){ //quitar calendario (torneo_id es la temporada_id del torneo)
	        $sql = 'DELETE FROM partido WHERE temporada_id='.$_POST['torneo_id'];            
	        $resultadoSQL = mysqli_query($mysqli, $sql); 
	    }

	    if ($_POST['ac']==3){ //matar torneo
	    	matarTorneoFM($_POST['torneo_id']);
	    }

		if ($_POST['ac']==15){ //modificar
			$sq='UPDATE torneo 
			SET apifutbol='.$_POST['apifutbol'].',
			apiRFEFcompeticion='.$_POST['apiRFEFcompeticion'].',
			apiRFEFgrupo='.$_POST['apiRFEFgrupo'].',
			nombre="'.$_POST['nombre'].'",
			traduccion="'.$_POST['traduccion'].'",
			orden="'.$_POST['orden'].'",
			visible="'.$_POST['visible'].'",		
			torneoCorto="'.$_POST['torneoCorto'].'" 
			WHERE id='.$_POST['torneo_id'];
			mysqli_query($mysqli, $sq);
			echo $sq.'<br />';
			$sq='UPDATE temporada SET nombre="'.$_POST['nombreTemporada'].'" WHERE torneo_id='.$_POST['torneo_id'];
			mysqli_query($mysqli, $sq);
			echo $sq.'<br />';
		}
	}

	if ($_POST['modo']=='cargar'){
		$p=$_POST['proxis'];
		$proveedor=$_POST['proveedor'];
		$proxis=explode("\r\n", $p);
		foreach ($proxis as $key => $ip) {
			$x=explode(':', $ip);
			if ($x[1]!='8080' && $x[1]!='80' && $x[1]!='443' && $x[1]!='3128' && $x[1]!='8811' && $x[1]!='9999'){ continue; }
			$sql='SELECT id FROM '.$_POST['bd'].' WHERE ip="'.$ip.'"';
		    $resultadoSQL = mysqli_query($mysqliBase, $sql);
		    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (empty($r)){
				$sql='INSERT INTO '.$_POST['bd'].' (ip, uso, estado, proveedor) VALUES ("'.$ip.'",0,0,"'.$proveedor.'")';
				mysqli_query($mysqliBase, $sql);
			}
		}
		echo 'Proxis cargados...<br />';
	}



	if ($_POST['modo']=='nuevoDetras'){
	  if (isset($_POST['clon_id'])){
		$sq='SELECT categoria_torneo_id, categoria_id, division_id,
		pais_id, comunidad_id, nombre, torneoCorto, orden, visible, tipo_torneo, apifutbol, apiRFEFcompeticion, apiRFEFgrupo
		FROM torneo WHERE id='.$_POST['clon_id'];
		$resultadoSQL = mysqli_query($mysqli, $sq);
	    $datos = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
	    if ($datos['tipo_torneo']==1){ $txtTT='Liga'; } else { $txtTT='Eliminatorias';} ?>
	    <form method="post" onsubmit="nuevoDetras(event, $(this).serialize(),<?php echo $_POST['clon_id']?>,1,<?php echo $_POST['comunidad_id']?>)" >
	    	<input type="hidden" name="comunidad_id" value="<?php echo $_POST['comunidad_id']?>">
	    	<input type="hidden" name="modo" value="nuevoDetras">
	    	<input type="hidden" name="categoria_torneo_id" value="<?php echo $datos['categoria_torneo_id']?>">
	    	<input type="hidden" name="categoria_id" value="<?php echo $datos['categoria_id']?>">
	    	<input type="hidden" name="division_id" value="<?php echo $datos['division_id']?>">
	    	<input type="hidden" name="pais_id" value="<?php echo $datos['pais_id']?>">
	    	Tipo de torneo <select name="tipo_torneo" id="tipo_torneo">
	    	<option value="<?php echo $datos['tipo_torneo']?>"><?php echo $datos['tipo_torneo']?> - <?php echo $txtTT?></option>
	    	<option value="1">1 - Liga</option>
	    	<option value="2">2 - Eliminatorias</option>
	    	</select><br />
	    	Nombre de torneo <input type="text" name="nombre" value="<?php echo $datos['nombre']?>" size="100"><br />
	    	Nombre corto <input type="text" name="torneoCorto" value="<?php echo $datos['torneoCorto']?>"  size="60" maxsize="60"><br />
	    	Nombre pagina del torneo <input type="text" name="nombrePagina" value="<?php echo $datos['torneoCorto']?>"  size="60" maxsize="60"><br />
	    	Orden <input type="text" name="orden" value="<?php echo ($datos['orden']+1)?>" size="8"> (se ordena dentro de los torneos de su categoría)<br />
	    	Visible <input type="text" name="visible" value="<?php echo $datos['visible']?>" size="1">(con menos de 4 no aparece en ningún listado. Para ligas europeas siempre 7)<br />
	    	Betsapi (o fase para las federaciones) <input type="text" name="apifutbol" value="<?php echo $datos['apifutbol']?>" size="10"><br />
	    	Competicion <input type="text" name="apiRFEFcompeticion" value="<?php echo $datos['apiRFEFcompeticion']?>" size="8"><br />
	    	Grupo <input type="text" name="apiRFEFgrupo" value="0" size="8"><br />
	    	<br />
	    	<div id="tipo_torneo_contenido">
	    		<?php if ($datos['tipo_torneo']==1){ ?>

					Jornadas <input type="text" name="jornadas" value="30" size="2">  -
					Jornada activa<input type="text" name="activa" value="1" size="1"> - <input type="submit" name="enviar" value="Grabar Torneo">

					<?php } else { 

						$sq='SELECT id, nombre, orden, tipo_eliminatoria FROM fase ORDER BY orden';
						$resultadoSQL = mysqli_query($mysqli, $sq);
					    $fases = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>

					Fases: <select name="fases[]" size="20" multiple required>
						<?php foreach ($fases as $key => $value) { ?>
					    	<option value="<?php echo $value['id']?>">
					    		<?php echo $value['tipo_eliminatoria']?> -
					    		<?php echo $value['orden']?> --
					    		<?php echo $value['nombre']?>
					    	</option>
					    <?php } ?>    	
					</select>
					 - <input type="submit" name="enviar" value="Grabar Torneo">
				<?php } ?>
	    	</div>
	    </form>
	    <script type="text/javascript">
			$(document).ready(function(){
				 $("#tipo_torneo").change(function(){
				    $.get("tipoTorneoTT.php","tipo_torneo="+$("#tipo_torneo").val(), function(data){
				        $("#tipo_torneo_contenido").html(data);        
				      });
				 });   
			});
		</script>
	    <?php } else {
			//GRABANDO TORNEO		
	    	if ($_POST['comunidad_id']==100){ $_POST['comunidad_id']=0; } 
				$sql='INSERT INTO torneo
		(categoria_torneo_id, categoria_id, pais_id, division_id, comunidad_id, apifutbol, apiRFEFcompeticion, apiRFEFgrupo, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, sexo, discr, desarrollo, inicio)
		VALUES
		("'.$_POST['categoria_torneo_id'].'","'.$_POST['categoria_id'].'","'.$_POST['pais_id'].'","'.$_POST['division_id'].'","'.($_POST['comunidad_id']+1).'","'.$_POST['apifutbol'].'","'.$_POST['apiRFEFcompeticion'].'","'.$_POST['apiRFEFgrupo'].'","'.$_POST['nombre'].'","'.$_POST['nombre'].'","'.$_POST['torneoCorto'].'","'.$_POST['orden'].'","'.$_POST['visible'].'","'.$_POST['tipo_torneo'].'","0","","0","'.date('Y-m-d').'");'; 
		echo $sql.'<br />'; 
		mysqli_query($mysqli, $sql);
		$torneo_id=mysqli_insert_id($mysqli);
		    

		if($_POST['tipo_torneo']==1){
		$sql='INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ("'.$torneo_id.'", "'.$_POST['jornadas'].'", '.$_POST['activa'].', 0, 3);';
		mysqli_query($mysqli, $sql);
		echo $sql.'<br />';
		} else {

			$fase_activa=1;
			foreach ($_POST['fases'] as $val) {
			$sql='INSERT INTO eliminatorio_fase (eliminatorio_id, fase_id) VALUES ("'.$torneo_id.'", "'.$val.'");';
			mysqli_query($mysqli, $sql);
			echo $sql.'<br />';
			$fase_activa=$val;
			}

			$sql='INSERT INTO eliminatorio (id, fase_activa ) VALUES ("'.$torneo_id.'", "'.$fase_activa.'");';
			mysqli_query($mysqli, $sql);
			echo $sql.'<br />';


		}


		$sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$torneo_id.'", "'.$_POST['nombrePagina'].'", "'.$torneo_id.'");';
		mysqli_query($mysqli, $sql);
		echo $sql.'<br />';

		echo '<hr />Torneo creado correctamente....<a href="index.php?comunidad_id='.$_POST['comunidad_id'].'"></a>';

		}

		die;

	} //nuevoDetras

//crear calendario
    

    if ('quitar_equipo' == $_POST['modo']) {
          $consulta = 'DELETE FROM temporada_equipo WHERE temporada_id='.$_POST['temporada_id'].' AND equipo_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoLocal_id=null WHERE temporada_id='.$_POST['temporada_id'].' and equipoLocal_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoVisitante_id=null WHERE temporada_id='.$_POST['temporada_id'].' and equipoVisitante_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);
         
      }

    if ('sustituir_fechas' == $_POST['modo']) {
        $id_fechas = $_POST['id_fechas'];
        $temporada_id = $_POST['temporada_id'];
        $consulta = 'SELECT distinct fecha, jornada FROM partido WHERE temporada_id='.$id_fechas;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        foreach ($resultado as $fila) {
          
            $consulta = "UPDATE partido SET fecha='".$fila['fecha']."'
    WHERE temporada_id=".$temporada_id.' AND jornada='.$fila['jornada'];
            $resultadoSQL = mysqli_query($mysqli, $consulta);
        
        }
        
    }
     
  $_GET['tipo_torneo']=$_POST['tipo_torneo']??1;
  $_GET['temporada_id']=$_POST['temporada_id']??1;
  $_GET['categoria_torneo']=$_POST['categoria_torneo']??1;   

  $tipo_torneo = $_GET['tipo_torneo']??1;
  $categoria_torneo = $_GET['categoria_torneo']??1;
  $temporada_id = $_GET['temporada_id']??1;
  $modo = $_GET['modo']??null;
  $ver_equipos = $_GET['ver_equipos']??0; 

} 