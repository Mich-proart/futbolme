<?php

function nombreEquipo($equipo_id) {	

	$consulta="SELECT nombre FROM equipo WHERE id=".$equipo_id;
	//echo $consulta;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$equipo = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

	return $equipo;
	
}



function partidosHistorico($temporada_id) {

	$consulta="SELECT id, nombre_temporada, nombre_eliminatoria, fecha, jornada, hora, local_nombre, local_goles, historicotemporadas_id temporada_id,
	visitante_goles, visitante_nombre, clasificado, cosas, local_fm_id, visitante_fm_id, youtube_id
	FROM historico WHERE historicotemporadas_id=".$temporada_id."
	ORDER BY fecha DESC ,nombre_eliminatoria";
	//echo $consulta;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	return $partidos;

}

function campeonesysubcampeones($torneo_id) {

	$consulta="SELECT count(id) veces, campeon, equipoCampeon_id 
	FROM historicotemporadas WHERE torneo_id=".$torneo_id."
	GROUP BY equipoCampeon_id ORDER BY count(id) DESC";
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$campeones = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$consulta="SELECT count(id) veces, subcampeon, equipoSubcampeon_id 
	FROM historicotemporadas WHERE torneo_id=".$torneo_id."
	AND equipoSubcampeon_id<>4518
	GROUP BY equipoSubcampeon_id ORDER BY count(id) DESC"; //4518=Sin Jugar
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$subcampeones = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$equipos = array(
		'campeones' => $campeones,
		'subcampeones' => $subcampeones
	);

	return $equipos;

}

function titulos($torneo_id, $equipo_id) {

	$consulta="SELECT id, nombre_temporada 
	FROM historicotemporadas WHERE torneo_id=".$torneo_id."
	AND equipoCampeon_id=".$equipo_id." ORDER BY nombre_temporada";
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$campeonatos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$consulta="SELECT id, nombre_temporada 
	FROM historicotemporadas WHERE torneo_id=".$torneo_id."
	AND equipoSubcampeon_id=".$equipo_id." ORDER BY nombre_temporada";
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$subcampeonatos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$titulos = array(
		'campeonatos' => $campeonatos,
		'subcampeonatos' => $subcampeonatos
	);

	return $titulos;

}

function finales($torneo_id) {

	$consulta="SELECT id, historicotemporadas_id, nombre_temporada, fecha, local_nombre, local_goles, 
	visitante_goles, visitante_nombre, youtube_id 
	FROM historico WHERE torneo_id=".$torneo_id." AND nombre_eliminatoria LIKE 'FINAL%'
	ORDER BY nombre_temporada DESC";

	//echo $consulta; die;

	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$finales = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	return $finales;
}

function datosTemporada2($idht) {

	$consulta="SELECT id, torneo_id, nombre_temporada, campeon, subcampeon, equipoCampeon_id, 
	equipoSubcampeon_id,(select nombre from torneo where id_original=torneo_id) nombre_torneo FROM historicotemporadas WHERE id=".$idht;

	//echo $consulta; die;

	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$datos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	return $datos;
}

function participaciones($torneo_id) {

	$consulta="SELECT count(id) veces, equipo_nombre, equipo_id 
	FROM historicoequipos 
	WHERE (SELECT torneo_id FROM historicotemporadas WHERE id=historicoequipos.historicotemporadas_id)=".$torneo_id."
	GROUP BY equipo_id
	ORDER BY count(id) DESC";

	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participantes = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	return $participantes;

}

function participacionesEquipo($torneo_id, $equipo_id) {
		
	$consulta="SELECT equipo_id, equipo_nombre, historicotemporadas_id,
	(SELECT nombre_temporada FROM historicotemporadas WHERE id=historicotemporadas_id ) nombre_temporada 
	FROM historicoequipos WHERE equipo_id=".$equipo_id." AND torneo_id=".$torneo_id."
	ORDER BY nombre_temporada DESC";
	//echo $consulta;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participacionesEquipo = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	//rivales

	$consulta="SELECT visitante_nombre AS nombre, visitante_fm_id AS fm_id 
	FROM historico WHERE local_fm_id=".$equipo_id." AND torneo_id=".$torneo_id."
	GROUP BY visitante_fm_id ";				
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$locales = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
	
	$rivales=array();	
		foreach ($locales as $equipo) {
		$rivales[$equipo['fm_id']] = $equipo;
		}
	
	$consulta="SELECT local_nombre AS nombre, local_fm_id AS fm_id
	FROM historico WHERE visitante_fm_id=".$equipo_id." AND torneo_id=".$torneo_id."
	GROUP BY local_fm_id ";
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$visitantes = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
				
		foreach ($visitantes as $equipo) {
			if (!array_key_exists($equipo['fm_id'], $rivales)) {
			$rivales[$equipo['fm_id']] = $equipo;
			}
		}

	$partisyrivales = array(
		'participacionesEquipo' => $participacionesEquipo,
		'rivales' => $rivales
	);

	return $partisyrivales;

}

function X2partidoH($partido_id)
{
    $campos = 'p.id,
p.historicotemporadas_id AS temporada_id,
p.jornada,
tor.id_original,
tor.nombre nombreTorneo,
tor.id idTorneo,
tor.tipo_torneo,	
p.nombre_temporada nombreTemporada,
p.nombre_eliminatoria AS fase,
p.fecha, 
p.hora hora_prevista, 
p.local_goles AS goles_local,
p.visitante_goles AS goles_visitante,
p.local_nombre AS local,
p.local_nombre AS localCorto,
p.visitante_nombre AS visitante,
p.visitante_nombre AS visitanteCorto,
p.local_fm_id AS equipoLocal_id,
p.visitante_fm_id AS equipoVisitante_id,
p.cosas  AS observaciones,
p.clasificado,
p.grupo_id,
p.youtube_id,
(SELECT es_seleccion FROM club WHERE club.id=(select club_id from equipo where id=p.local_fm_id)) es_seleccion,
(select id FROM pais WHERE id=(select pais_id from club where id=(select club_id from equipo where id=p.local_fm_id))) paisLocal_id,
(select id FROM pais WHERE id=(select pais_id from club where id=(select club_id from equipo where id=p.visitante_fm_id))) paisVisitante_id,
(select nombre from grupo where id=p.grupo_id) nombreGrupo,	
(select count(id) from historicogol WHERE partido_id=p.partido_id) goles';
    $tabla = 'historico p';
    $tabla .= ' INNER JOIN historicotemporadas ht ON ht.id=p.historicotemporadas_id ';
    $tabla .= ' INNER JOIN torneo tor ON tor.id_original=ht.torneo_id ';
    $condicion = ' WHERE p.id='.$partido_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}