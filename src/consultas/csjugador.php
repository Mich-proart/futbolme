<?php

function buscarEncajados($jugador_id){
    $mysqli = conectar();
    $consulta = 'SELECT t.id,t.partido_id,t.minuto,t.tipo,t.esLocal,p.goles_local, p.goles_visitante, g.esLocal golLocal, g.minuto golMinuto 
FROM tarjeta t
INNER JOIN partido p ON p.id=t.partido_id
INNER JOIN gol g ON p.id=g.partido_id
WHERE g.esLocal<>t.esLocal AND t.tipo>1 AND t.tipo<5 AND t.jugador_id='.$jugador_id;
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $r;
}

function buscarJugador($jugador, $pagina)
{
    if (strlen($jugador) > 2 && strlen($jugador) < 21) {
        $inicio = (($pagina * 10) - 10);
        $mysqli = conectar();
        $consulta = "SELECT count(id) FROM jugador WHERE (nombre LIKE '%".$jugador."%' OR  apodo LIKE '%".$jugador."%') AND es_baja=0";
        //echo $consulta;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $r = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
        $paginas = ceil(($r[0][0] / 10));

        $campos = 'j.id, j.nombre, j.apodo, j.fecha_nacimiento, j.lugar_nacimiento, j.es_baja, j.posicion, j.id_original, 
			j.equipoActual_id, (SELECT nombre FROM equipo WHERE id=j.equipoActual_id) equipo';
        $tabla = ' jugador j';
        $condicion = " WHERE (nombre LIKE '%".$jugador."%' OR  apodo LIKE '%".$jugador."%') AND es_baja=0";
        $orden = ' ORDER BY j.apodo LIMIT '.($inicio).',10 ';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
        //echo $consulta;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $jugadores = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

//        $resultado = array();

        $resultado = array('jugadores' => $jugadores,
                           'paginas' => $paginas, );

        return $resultado;
    } else {
        $resultado = 'El nombre del jugador tiene que tener entre 3 y 20 caracteres. <b>'.$jugador.'</b> ('.strlen($jugador).' caracteres)';

        return $resultado;
    }
}

function Xjugador($jugador_id)
{
    $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.imagen,
	CASE posicion
	WHEN 1 THEN (SELECT count(g.id) FROM gol g WHERE g.portero_id=j.id AND g.jugador_id>0 AND g.tipo<11 AND g.temporada_id<25)
	ELSE (SELECT count(g.id) FROM gol g WHERE g.jugador_id=j.id AND g.tipo<10 AND g.temporada_id<25)
	END as goles,
	(SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=0 AND t.temporada_id<25) ta,
	(SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=1 AND t.temporada_id<25) ta2,
	(SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=5 AND t.temporada_id<25) tr,
	j.pais_id, j.sexo, j.fecha_nacimiento, j.lugar_nacimiento, j.altura, j.peso, j.dorsal,
	j.caracteristicas, j.palmares, j.equipoProcedencia_id, j.equipoActual_id, j.id_original,
	ea.nombre equipoActual';
    $tabla = ' jugador j';
    $union = ' INNER JOIN equipo ea ON j.equipoActual_id=ea.id';
    //$union2=" INNER JOIN equipo ep ON j.equipoProcedencia_id=ep.id, ep.nombre equipoProcedencia";
    $condicion = ' WHERE j.id='.$jugador_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XjugadorGolesPartido($jugador_id)
{
    $campos = 'DISTINCT g.partido_id, ec.nombreCorto local, ef.nombreCorto visitante, p.jornada, p.goles_local, p.goles_visitante, p.observaciones,p.temporada_id';
    $tabla = ' gol g ';
    $union = ' INNER JOIN partido p ON g.partido_id=p.id';
    $union .= ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN temporada t ON p.temporada_id=t.id';
    $union .= ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
    

    $condicion = ' WHERE g.jugador_id='.$jugador_id.' AND g.tipo<10 AND tor.tipo_torneo=1';
    $orden = ' ORDER BY p.jornada,g.id';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);      

    return $resultado;
}



function XjugadorTarjetasPartido($jugador_id)
{
    $campos = 'tar.partido_id, ec.nombreCorto local, ef.nombreCorto visitante, tar.minuto, tar.tipo, tar.esLocal, tor.tipo_torneo, p.jornada, p.goles_local, p.goles_visitante,p.temporada_id';
    $tabla = ' tarjeta tar';
    $union = ' INNER JOIN partido p ON tar.partido_id=p.id';
    $union .= ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN temporada t ON p.temporada_id=t.id';
    $union .= ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $condicion = ' WHERE tar.jugador_id='.$jugador_id.' AND tor.tipo_torneo=1';
    $orden = ' ORDER BY p.jornada,tar.id';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    
    return $resultado;
}
