<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';

$categoria_torneo = $_POST['categoria_torneo'];
$modo = $_POST['modo'];

    $campos2 = ', li.jornadas, li.jornadaActiva';
    $union2 = ' INNER JOIN liga li ON li.id=tor.id';
    if ($modo==0){
        $condicion = ' WHERE tor.tipo_torneo=1 AND 
        tor.visible>4 AND tor.categoria_torneo_id='.$categoria_torneo;
    } else {
        $condicion = ' WHERE tor.tipo_torneo=1 AND 
        tor.visible>4 AND tor.comunidad_id='.$categoria_torneo;
    }

    $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, pa.nombre nombrePais, tor.categoria_torneo_id,
	co.nombre nombreComunidad ';
    $tabla = ' torneo tor';
    $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
    $union4 = ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $union5 = ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $orden = ' ORDER BY tor.categoria_torneo_id, tor.division_id, tor.orden';

    $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$union4.$union5.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $lista_torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>

	<br />
	<select class="form-control" style="width:100%" name="equipos" onchange="cargar_equiposU(this.value)">
	<option value="0">Competiciones</option>
	<?php foreach ($lista_torneos as $fila) {
        if ($fila['categoria_torneo_id']==17) { $fila['nombre']='FS '.$fila['nombre']; }
        if ($fila['comunidad_id']==1){
        echo "<option value='".$fila['id']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' </option>';
        } else {
        echo "<option value='".$fila['id']."'>".$fila['nombreComunidad'].' - '.$fila['nombre'].' </option>';            
        }
    } ?>
	</select>


