<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';

$temporada_id=$_POST['temporada_id'];
$mysqli = conectar(); 
$mysqliFM = conectarFM(); 


$sql='SELECT id, temporada_id, fm_local_id, fm_visitante_id, estado_partido, fecha, hora_prevista, goles_local, goles_visitante, jornada, observaciones, clasificado, codigo_acta FROM partido where temporada_id='.$temporada_id;
$resultadoSQL = mysqli_query($mysqli, $sql);
$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$equipos=array();

foreach ($partidos as $key => $p) {

	$equipos[$p['fm_local_id']]=$p['fm_local_id'];
	$equipos[$p['fm_visitante_id']]=$p['fm_visitante_id'];
	
	$sql='INSERT INTO partido
	(partidoAPI, temporada_id, estado_partido, acta, fecha, hora_prevista, goles_local, goles_visitante, jornada, observaciones, clasificado, equipoLocal_id, equipoVisitante_id) VALUES 
	("'.$p['id'].'", "'.$p['temporada_id'].'", "'.$p['estado_partido'].'", "'.$p['codigo_acta'].'", "'.$p['fecha'].'", "'.$p['hora_prevista'].'", "'.$p['goles_local'].'", "'.$p['goles_visitante'].'", "'.$p['jornada'].'", "'.$p['observaciones'].'", "'.$p['clasificado'].'", "'.$p['fm_local_id'].'", "'.$p['fm_visitante_id'].'")';
	mysqli_query($mysqliFM, $sql);
}

foreach ($equipos as $value) {

	$sql='INSERT INTO temporada_equipo(temporada_id, equipo_id) VALUES ("'.$temporada_id.'", "'.$value.'")';
	mysqli_query($mysqliFM, $sql);
}

echo 'partidos cargados';die;



?>