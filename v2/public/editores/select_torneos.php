
<?php

$tipo_torneo = $_POST['tipo_torneo'];
$categoria_torneo = $_POST['categoria_torneo'];
$usuario_id = $_POST['usuario_id'];

$lista_torneos = listarTorneosPorCategoria($tipo_torneo, $categoria_torneo, $usuario_id);

		$listaComunidad=array();
		$listaComunidadSala=array();
		foreach ($lista_torneos as $key => $value) {			
			if ($value['categoria_torneo_id']==17){
				$listaComunidadSala[$value['comunidad_id']]['nombre']=$value['nombreComunidad'];
				$listaComunidadSala[$value['comunidad_id']]['torneos'][]=$value;
			} else {
				$listaComunidad[$value['comunidad_id']]['nombre']=$value['nombreComunidad'];
				$listaComunidad[$value['comunidad_id']]['torneos'][]=$value;
			}
			
		}

		ksort($listaComunidad);
		ksort($listaComunidadSala);

		if ($categoria_torneo==17){
			unset($listaComunidad);
			$listaComunidad=$listaComunidadSala;
		} ?>
<div class="marco" style="background-color: lavender">
	<?php if($tipo_torneo==1){ echo "<span>LIGAS</span>"; } else { echo "<span>TORNEOS</span>"; }

	if ($categoria_torneo>0) { 
		echo '<table border="1">';
		foreach ($listaComunidad as $key => $value) { ?>
			<tr><td style="width:150px"?><?php echo $value['nombre']?></td><td><select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo?>,<?php echo $categoria_torneo?>,<?php echo $usuario_id?>)">
				<option value="0">_________________Competiciones</option>
				<?php foreach ($value['torneos'] as $fila) {
				    if (1 == $tipo_torneo) {
				        echo "<option value='".$fila['id'].','.$fila['jornadas'].','.$fila['jornadaActiva'].',0,'.$fila['betsapi']."'>".$fila['nombre'].'</option>';
				    } /*else {
				        echo "<option value='".$fila['id'].','.$fila['tipo_eliminatoria'].','.$fila['fase_activa'].',,'.$fila['betsapi']."'>
						".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].') ('.$fila['betsapi'].')</option>';
				    }*/
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
	    
	</select>

<?php } //si categoria_torneo es diferente a 4?>
<div class="clear"></div>
</div>

<?php

function listarTorneosPorCategoria($tipo_torneo, $categoria_torneo, $usuario_id=0)
{
    
    $campos2="";$union2="";$condicion="";
    
    $campos2 = ', li.jornadas, li.jornadaActiva';
    $union2 = ' INNER JOIN liga li ON li.id=tor.id';
    

    $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
    AND tor.visible>3 AND tor.categoria_torneo_id='.$categoria_torneo;
    

    


    $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, tor.apuestaMA, pa.nombre nombrePais, tor.categoria_torneo_id, tor.apifutbol_tipo,
    co.nombre nombreComunidad, tor.betsapi ';
    $tabla = ' torneo tor';
    $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
    $union.= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $orden = ' ORDER BY tor.apuestaMA DESC, tor.categoria_torneo_id, tor.comunidad_id, tor.orden';

    $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$condicion.$orden;   
    
    //echo $consulta;
    include 'config.php';
    $mysqli = $link;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);



    return $resultado;
}


?>