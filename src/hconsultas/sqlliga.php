<?php
function partidoPromocion($partido_id) {

	$consulta="SELECT nc.idPartido, nc.jornada, nc.fecha, nc.hora, nc.nomCasa, nc.resulCasa,
	nc.resulFuera, nc.nomFuera, nc.cosas, nc.clasificado, nc.fm_local_id, nc.fm_visitante_id,
	nt.nombreTemporada
	FROM nacionalcalendario nc 
	INNER JOIN nacionaltorneos nt ON nc.idTemporada=nt.idTemporada
	WHERE idPartido=".$partido_id;
	
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidoH = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	
	return $partidoH;

}

function partidosPromocion($idTH) {

	$consulta="SELECT nc.idPartido, nc.jornada,
	(select nombre from fase where id=nc.jornada) fase, 
	nc.fecha, nc.hora, nc.nomCasa, nc.resulCasa,
	nc.resulFuera, nc.nomFuera, nc.cosas, nc.clasificado, nc.fm_local_id, nc.fm_visitante_id,
	nt.nombreTemporada
	FROM nacionalcalendario nc 
	INNER JOIN nacionaltorneos nt ON nc.idTemporada=nt.idTemporada
	WHERE nc.idTemporada=".$idTH;
	
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidosH = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	
	return $partidosH;

}

function enfrentamientosPromocion($torneo_id,$equipo_1,$equipo_2) {

	$mysqli = conectar();

	$consulta="SELECT nc.idPartido id, nc.idtemporada historicotemporadas_id, (select nombreTemporada FROM nacionaltorneos WHERE idTemporada=nc.idtemporada) nombre_temporada, nc.jornada nombre_eliminatoria, nc.clasificado, 
	nc.fecha, nc.hora, nc.nomCasa local_nombre, nc.resulCasa local_goles, nc.resulFuera visitante_goles, nc.nomFuera visitante_nombre, nc.cosas
	FROM nacionalcalendario nc
	INNER JOIN nacionaltorneos nt ON nc.idtemporada=nt.idTemporada
	WHERE nt.fm_torneo_id=".$torneo_id." AND ((nc.fm_local_id=".$equipo_1." AND nc.fm_visitante_id=".$equipo_2.") OR (nc.fm_local_id=".$equipo_2." AND nc.fm_visitante_id=".$equipo_1."))
	ORDER BY nombre_temporada DESC , nc.jornada DESC, nc.fecha DESC";
	//echo $consulta;
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidosLiga = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);


	return $partidosLiga;
	
}

function participacionesEquipoPromocion($torneo_id, $equipo_id) {
		
	if ($torneo_id==219) {

		$consulta="SELECT equipo_id, equipo_nombre, historicotemporadas_id, torneo_id,
		(SELECT nombreTemporada FROM nacionaltorneos WHERE idTemporada=historicotemporadas_id ) nombre_temporada 
		FROM historicoequipos WHERE equipo_id=".$equipo_id." AND (torneo_id=219 or torneo_id=560)
		ORDER BY nombre_temporada DESC";


	} else {

		$consulta="SELECT equipo_id, equipo_nombre, historicotemporadas_id,
		(SELECT jornadas FROM nacionaltorneos WHERE idTemporada=historicotemporadas_id ) jornadas,
		(SELECT nombreTemporada FROM nacionaltorneos WHERE idTemporada=historicotemporadas_id ) nombre_temporada 
		FROM historicoequipos WHERE equipo_id=".$equipo_id." AND torneo_id=".$torneo_id."
		ORDER BY nombre_temporada DESC";

	}
	
	//echo $consulta; die;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participacionesEquipo = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);



	//rivales

	$consulta="SELECT nomFuera AS nombre, fm_visitante_id AS fm_id 
	FROM nacionalcalendario 
	INNER JOIN nacionaltorneos ON nacionalcalendario.idtemporada=nacionaltorneos.idTemporada
    WHERE fm_local_id=".$equipo_id." AND fm_torneo_id=".$torneo_id."
	GROUP BY fm_visitante_id ";				
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$locales = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
	
	$rivales=array();	
		foreach ($locales as $equipo) {
		$rivales[$equipo['fm_id']] = $equipo;
		}
	
	$consulta="SELECT nomFuera AS nombre, fm_local_id AS fm_id
	FROM nacionalcalendario 
	INNER JOIN nacionaltorneos ON nacionalcalendario.idtemporada=nacionaltorneos.idTemporada    
	WHERE fm_local_id=".$equipo_id." AND fm_torneo_id=".$torneo_id."
	GROUP BY fm_local_id ";
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


function participacionesPromocion($torneo_id) {

	$consulta="SELECT count(id) veces, (select nombre from equipo where id=equipo_id) equipo_nombre, equipo_id 
	FROM historicoequipos 
	WHERE torneo_id=".$torneo_id."
	GROUP BY equipo_id
	ORDER BY count(id) DESC";

	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participantes = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	return $participantes;

}

function datosFinal($temporada_id, $estilo) {
	
	if ($estilo==4) {
		
			$consulta="SELECT nomCasa, nomFuera, fm_local_id, fm_visitante_id, clasificado
			FROM nacionalcalendario WHERE jornada=10002 and idTemporada=".$temporada_id;
		

	} else {
		if ($estilo==1) {
			$consulta="SELECT equipo, equipo_id FROM nacionalclasificacionok WHERE temporada_id=".$temporada_id." AND posicion=1";
		} else {
			
				$consulta="SELECT nomCasa, nomFuera, fm_local_id, fm_visitante_id, clasificado
			FROM nacionalcalendario WHERE (jornada>10002 OR jornada=9103) and idTemporada=".$temporada_id." ORDER BY jornada DESC";
			
					
		} 
	}

	$mysqli = conectar();

	//echo $consulta;
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
	return $resultado;
}
	


function datosTemporadaN($temporada_id) {
	$consulta="SELECT idTemporada idTorneoTemporada, nombreTemporada,idDivision, jornadas, grupo, estilo, fm_torneo_id
	FROM nacionaltorneos WHERE idTemporada=".$temporada_id." ORDER BY nombreTemporada DESC, grupo ";
	//echo $consulta; 
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	$resultado=$resultado[0];
	return $resultado;
}

function datosTemporadaH($temporada_id) {
	$consulta="SELECT ht.id idTorneoTemporada, ht.nombre_temporada nombreTemporada, 0 as idDivision, 0 as jornadas, 0 as grupo, ht.torneo_id as estilo, (select nombre from torneo where id_original=ht.torneo_id) nombreTorneo
	FROM historicotemporadas ht WHERE ht.id=".$temporada_id." ORDER BY ht.nombre_temporada DESC ";
	//echo $consulta; 
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	$resultado=$resultado[0];
	return $resultado;
}

function temporadasPromocion($torneo_id) {
	if ($torneo_id==219) { 
		$condicion=" WHERE fm_torneo_id IN (219,560,220)";
	} else {
		$condicion=" WHERE fm_torneo_id=".$torneo_id;
	}
	$consulta="SELECT idTemporada, nombreTemporada,idDivision, grupo, estilo
	FROM nacionaltorneos ".$condicion." ORDER BY nombreTemporada DESC, grupo ";
	$mysqli = conectar();
	//echo $consulta;
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
	return $resultado;
}

/*********************************************************************/
/*********************************************************************/
/*********************************************************************/
/*********************************************************************/
/*********************************************************************/
/*********************************************************************/


function temporadas($temporada) {

	if ($temporada!=1986) { $filtro=" AND estilo=0 ";} else { $filtro=""; }
	$consulta="SELECT idTemporada, nombreTemporada,idDivision, grupo, estilo,
	(SELECT equipo FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=1 LIMIT 1) campeon,
	(SELECT equipo FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=2 LIMIT 1) subcampeon,
	(SELECT equipo_id FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=1 LIMIT 1) id_campeon,
	(SELECT equipo_id FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=2 LIMIT 1) id_subcampeon,
	(SELECT club_id FROM equipo WHERE id=(SELECT equipo_id FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=1 LIMIT 1)) club_idC,
	(SELECT club_id FROM equipo WHERE id=(SELECT equipo_id FROM nacionalclasificacionok WHERE temporada_id=idTemporada AND posicion=2 LIMIT 1)) club_idS
	FROM nacionaltorneos 
	WHERE temporada='".$temporada."' ".$filtro." ORDER BY idDivision, grupo ";
	//echo $consulta; 
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	return $resultado;

}

function clasificacionHistorica($division) {

	$consulta="SELECT (SELECT nombre FROM equipo WHERE id=equipo_id) equipo, sum(puntos) puntos, sum(jugados) jugados, 
	sum(ganados) ganados, sum(empatados) empatados, sum(perdidos) perdidos, 
	sum(golesFavor) golesFavor, sum(golesContra) golesContra, 
	count(temporada_id) temporadas, idViejo idEquipo, idDivision, equipo_id fm_equipo_id
	FROM nacionalclasificacionok WHERE idDivision=".$division." AND estilo=0
	GROUP BY equipo_id 
	ORDER BY count(temporada_id) DESC, sum(puntos) DESC";
	//echo $consulta; die;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	return $resultado;
}

function partidosHistoricoLiga($temporada_id) {
	$consulta="SELECT idPartido, jornada, fecha, hora, nomCasa, resulCasa, fm_local_id, fm_visitante_id,
	resulFuera, nomFuera, clasificado, cosas, youtube_id
	FROM nacionalcalendario WHERE idTemporada=".$temporada_id." 
	ORDER BY jornada DESC, fecha DESC";
	//echo $consulta; die;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	return $partidos;
}

function partidosHistoricoEquipo($equipo_id) {
	$consulta="SELECT nc.idPartido, nc.jornada, nc.fecha, nc.hora, nc.nomCasa, nc.resulCasa, nc.fm_local_id, nc.fm_visitante_id,nc.resulFuera, nc.nomFuera, nc.clasificado, nc.cosas, nc.youtube_id, nt.nombreTemporada, nt.idDivision, nc.idTemporada
	FROM nacionalcalendario nc
	INNER JOIN nacionaltorneos nt ON nc.idTemporada=nt.idTemporada
	WHERE (nc.fm_local_id=".$equipo_id." OR nc.fm_visitante_id=".$equipo_id.") AND nt.estilo=0
	ORDER BY nc.fecha";
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	return $partidos;
}

function campeonesysubcampeonesLiga($division) {

	$consulta="SELECT count(nk.id) veces, e.nombre campeon, nk.equipo_id equipoCampeon_id, e.club_id club_idC 
	FROM nacionalclasificacionok nk 
	INNER JOIN equipo e ON e.id=nk.equipo_id
	WHERE nk.idDivision=".$division." AND nk.estilo=0 AND nk.posicion=1
	GROUP BY nk.equipo_id ORDER BY count(nk.id) DESC";
	//echo $consulta;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$campeones = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	$consulta="SELECT count(nk.id) veces, e.nombre subcampeon, nk.equipo_id equipoSubcampeon_id, e.club_id club_idS
	FROM nacionalclasificacionok nk 
	INNER JOIN equipo e ON e.id=nk.equipo_id	
	WHERE nk.idDivision=".$division." AND nk.estilo=0 AND nk.posicion=2
	GROUP BY nk.equipo_id ORDER BY count(nk.id) DESC"; //4518=Sin Jugar
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$subcampeones = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	$equipos = array(
		'campeones' => $campeones,
		'subcampeones' => $subcampeones
	);

	return $equipos;

}

function participacionesLiga($division) {

	$consulta="SELECT count(id) veces, equipo equipo_nombre, equipo_id 
	FROM nacionalclasificacionok 
	WHERE idDivision=".$division."
	GROUP BY equipo_id
	ORDER BY count(id) DESC";

	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participantes = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	return $participantes;

}

function participacionesEquipoLiga($division, $equipo_id) {
		
	$consulta="SELECT nok.equipo_id, e.nombre equipo_nombre, nt.idTemporada temporada_id, nt.nombreTemporada nombre_temporada, nok.posicion, nt.equipos
	FROM nacionalclasificacionok nok
	INNER JOIN equipo e ON e.id=nok.equipo_id
	INNER JOIN nacionaltorneos nt ON nt.idTemporada=nok.temporada_id
	WHERE nok.equipo_id=".$equipo_id." AND nt.idDivision=".$division." and nt.estilo=0 
	ORDER BY nombre_temporada DESC";
	//echo $consulta;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$participacionesEquipo = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


	//rivales

	$consulta="SELECT nomFuera AS nombre, fm_visitante_id AS fm_id 
	FROM nacionalcalendario WHERE fm_local_id=".$equipo_id." AND 
	(SELECT idDivision FROM nacionaltorneos WHERE idtemporada=nacionalcalendario.idTemporada)=".$division."
	GROUP BY fm_visitante_id ";				
	//echo $consulta;
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$locales = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
	
	$rivales=array();	
		foreach ($locales as $equipo) {
		$rivales[$equipo['fm_id']] = $equipo;
		}
	
	$consulta="SELECT nomCasa AS nombre, fm_local_id AS fm_id
	FROM nacionalcalendario WHERE fm_visitante_id=".$equipo_id." AND 
	(SELECT idDivision FROM nacionaltorneos WHERE idtemporada=nacionalcalendario.idTemporada)=".$division."
	GROUP BY fm_local_id ";
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

function titulosLiga($division, $equipo_id) {

	$consulta="SELECT temporada_id id, temporada nombre_temporada 
	FROM nacionalclasificacionok WHERE idDivision=".$division."
	AND equipo_id=".$equipo_id." AND posicion=1 and estilo=0 ORDER BY temporada";
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$campeonatos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$consulta="SELECT temporada_id id, temporada nombre_temporada 
	FROM nacionalclasificacionok WHERE idDivision=".$division."
	AND equipo_id=".$equipo_id." AND posicion=2 and estilo=0 ORDER BY temporada";
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$subcampeonatos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

	$titulos = array(
		'campeonatos' => $campeonatos,
		'subcampeonatos' => $subcampeonatos
	);

	return $titulos;

}

function enfrentamientosLiga($division,$equipo_1,$equipo_2) {

	$mysqli = conectar();

	$consulta="SELECT nc.idPartido id, nc.idtemporada idt, (select nombreTemporada FROM nacionaltorneos WHERE idTemporada=nc.idtemporada) nt, nc.jornada ne, 
	nc.fecha, nc.hora, nc.nomCasa local, nc.resulCasa, nc.resulFuera, nc.nomFuera visitante, nc.youtube_id,	 
	(select idDivision FROM nacionaltorneos WHERE idTemporada=nc.idtemporada) division, nc.cosas
	FROM nacionalcalendario nc
	WHERE (select idDivision FROM nacionaltorneos WHERE idTemporada=nc.idtemporada)=".$division." AND ((nc.fm_local_id=".$equipo_1." AND nc.fm_visitante_id=".$equipo_2.") OR (nc.fm_local_id=".$equipo_2." AND nc.fm_visitante_id=".$equipo_1."))
	ORDER BY nt DESC , nc.jornada DESC, nc.fecha DESC";
	
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidosLiga = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


	return $partidosLiga;
	
}

function partidoLiga($partido_id) {

	$consulta="SELECT nc.idPartido, nc.jornada, nc.fecha, nc.hora, nc.nomCasa, nc.resulCasa,
	nc.resulFuera, nc.nomFuera, nc.cosas, nc.fm_local_id, nc.fm_visitante_id, nc.youtube_id, nc.idTemporada idt,
	nt.temporada, nt.idDivision, nt.grupo, nt.fm_torneo_id
	FROM nacionalcalendario nc 
	INNER JOIN nacionaltorneos nt ON nc.idTemporada=nt.idTemporada
	WHERE idPartido=".$partido_id;
	$mysqli = conectar();
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$partidoH = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
	
	return $partidoH;

}



