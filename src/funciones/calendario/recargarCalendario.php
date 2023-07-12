<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

$temporada_id = $_POST['temporada_id'];

$campos = 'fecha, 
hora_prevista, jornada, 0, (SELECT nombre FROM equipo WHERE id=equipoLocal_id) local,
goles_local, goles_visitante, (SELECT nombre FROM equipo WHERE id=equipoVisitante_id) visitante
';
$tabla = ' partido p';
$condicion = ' WHERE p.temporada_id='.$temporada_id.' ORDER BY p.jornada, p.fecha, p.hora_prevista';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
$consultaB = $consulta;
echo $consulta;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$calendario = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
?>

<h3>CALENDARIO</h3>
<?php 
foreach ($calendario as $fila) {
    echo ' - 
	'.$fila['fecha'].' -
	'.$fila['hora_prevista'].' - 
	'.$fila['jornada'].' - 
	'.$fila['local'].' - 
	'.$fila['goles_local'].' - 
	'.$fila['goles_visitante'].' - 
	'.$fila['visitante'].'	<br />';
}
?>