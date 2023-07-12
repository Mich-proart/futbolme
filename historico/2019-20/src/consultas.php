<?php
defined('_FUTBOLME_') or die('Acceso Restringido');

function conectar()
{
    $bbdd = 'futbolme_2019';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }

    if ($_SERVER['HTTP_HOST']=='fm20'){
       $mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);             
    } else {
       $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);     
    }
    
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}

require_once 'consultas/clasificacion/XgenerarClasificacion.php';

function Xtipo($temporada_id)
{
    
    $mysqli = conectar();

    $campos = 't.torneo_id,
    tor.tipo_torneo, 
    tor.nombre, 
    tor.traduccion,
    tor.sexo, 
    tor.desarrollo, 
    tor.categoria_id, 
    tor.visible,
    tor.categoria_torneo_id, 
    pa.id flagPais, 
    pa.nombre nombrePais,
    co.id flagComunidad, 
    co.nombre nombreComunidad, 
    CASE WHEN (tor.tipo_torneo=1) THEN (select jornadas from liga where id=tor.id) 
    ELSE 0 END as jornadas,
    CASE WHEN (tor.tipo_torneo=1) THEN (select jornadaActiva from liga where id=tor.id) 
    ELSE (select fase_activa from eliminatorio where id=tor.id)  END as jornadaActiva,
    CASE WHEN (tor.tipo_torneo=1) THEN (select tipoClasificacion from liga where id=tor.id) 
    ELSE 0 END as tipoClasificacion,
    CASE WHEN (tor.tipo_torneo=1) THEN (select tipoPuntuacion from liga where id=tor.id) 
    ELSE 0 END as tipoPuntuacion';
    $tabla = ' temporada t';
    $union = ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';

    $condicion = ' WHERE t.id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);    

    return $resultado;
}

function Xequipos_temporada($temporada_id)
{
    $campos = 'te.equipo_id, te.grupo, e.nombre, e.nombreCorto, e.estadio_id, e.equipacion_id, e.slug, l.id localidad_id, p.id provincia_id, c.id comunidad_id,
    l.nombre localidad, p.nombre provincia, c.nombre comunidad, cl.pais_id, cl.es_seleccion';
    $tabla = ' temporada_equipo te';
    $union = ' INNER JOIN equipo e ON te.equipo_id=e.id';
    $union.= ' INNER JOIN club cl ON e.club_id=cl.id
    INNER JOIN localidad l ON cl.localidad_id=l.id
    INNER JOIN provincia p ON l.provincia_id=p.id
    INNER JOIN comunidad c ON p.comunidad_id=c.id';
    $condicion = ' WHERE te.temporada_id='.$temporada_id;
    $orden = ' ORDER BY e.nombre';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function Xpartidos($temporada_id, $jornadaActiva = 0)
{
    $campos = "p.id, p.partidoAPI,
p.temporada_id,
p.estado_partido, 
p.jornada,
fa.nombre fase,  
p.fecha, 
p.hora_prevista, 
p.hora_real,
p.clasificado, 
p.goles_local,
p.goles_visitante,
p.grupo_id,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twitterLocal,
p.equipoLocal_id, cec.pais_id pais_local, cef.pais_id pais_visitante,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twitterVisitante,
p.equipoVisitante_id,
p.observaciones,
p.estadio, p.youtube_id, p.acta,  
tor.tipo_torneo, tor.pais_id idPais, tor.visible, (SELECT count(id) FROM gol WHERE partido_id=p.id) goles,e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad,
(SELECT count(partido_id) FROM partido_medio WHERE partido_id=p.id) tv";
    if (442 != $temporada_id && 231 != $temporada_id) {
        $campos .= ", 
(select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id,',',
                (SELECT tipo_torneo FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id=p2.temporada_id))
    ) FROM partido p2 
WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id AND p2.temporada_id=p.temporada_id AND p2.estado_partido=1 AND p2.grupo_id IS NULL LIMIT 1) as ida ";
    }

    $tabla = 'partido p';

    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN club cec ON ec.club_id=cec.id';
    $union .= ' INNER JOIN club cef ON ef.club_id=cef.id';
    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union .= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
    $union .= ' LEFT JOIN localidad l ON l.id=e.localidad_id';

    if (0 == $jornadaActiva) {
        $condicion = ' WHERE p.temporada_id='.$temporada_id;
    } else {
        if (442 == $temporada_id || 231 == $temporada_id) {
            $condicion = " WHERE p.fecha>'2015-06-30' AND p.temporada_id=".$temporada_id.' AND p.estado_partido<>2';
        } else {
            $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.estado_partido<>2 AND p.jornada='.$jornadaActiva;
        }
    }

    if (442 == $temporada_id || 231 == $temporada_id) {
        $orden = ' ORDER BY p.fecha DESC, p.hora_prevista';
    } else {
        $orden = ' ORDER BY p.jornada, p.grupo_id, p.fecha, p.hora_prevista';
    }

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    
    return $resultado;
}

function Xcolores($temporada_id, $grupo_id = 0)
{
    $campos = 'ct.color_id, ct.posicion, c.texto, c.color_fondo, c.color_texto, ct.grupo_id';
    $tabla = ' colortorneo ct';
    $union = ' INNER JOIN color c ON ct.color_id=c.id';
    $condicion = ' WHERE ct.grupo_id='.$grupo_id.' AND ct.torneo_id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
    $orden = ' ORDER BY ct.posicion';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function Xsancion($temporada_id)
{
    $campos = 's.equipo_id, s.puntos, s.jugados, s.ganados, s.empatados, s.perdidos, s.gFavor, s.gContra';
    $tabla = ' sancion s';
    $condicion = ' WHERE s.temporada_id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XclasificacionGoleadores($temporada_id)
{
    $campos = 'count(g.id) goles, g.jugador_id, j.apodo jugador, e.nombre equipo, e.id equipo_id, e.nombreCorto equipoCorto';
    $tabla = ' gol g';

    $union = ' INNER JOIN jugador j ON g.jugador_id=j.id';
    $union2 = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
    $condicion = ' WHERE g.temporada_id='.$temporada_id.' AND tipo<10 ';
    $orden = ' GROUP BY g.jugador_id,e.id ORDER BY count(g.id) DESC';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
    //$condicion=" WHERE g.temporada_id=".$temporada_id." AND tipo<10 ";
}

function XclasificacionZamoras($temporada_id, $jornadaActiva)
{
    $campos = 'count(g.jugador_id) goles,
    COUNT(distinct g.partido_id) partidos,
    g.portero_id, 
    j.apodo portero,
    e.nombre equipo, 
    e.id equipo_id, e.nombreCorto equipoCorto';
    $tabla = ' gol g';
    $union = ' INNER JOIN jugador j ON g.portero_id=j.id';
    $union2 = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
    $condicion = ' WHERE g.temporada_id='.$temporada_id.' AND g.tipo<11';
    $orden = ' GROUP BY g.portero_id,e.id 
    ORDER BY count(g.jugador_id)/COUNT(distinct g.partido_id), partidos DESC';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
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
    $campos = 'g.partido_id';
    $tabla = ' gol g';
    $condicion = ' WHERE g.jugador_id='.$jugador_id.' AND g.tipo<10';
    $orden = ' ORDER BY g.id';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $partidos = array();
    foreach ($resultado as $key => $value) {
        $partido = Xpartido($value['partido_id'], 0);
        $partidos[] = $partido;
    }

    return $partidos;
}

function Xpartido($partido_id)
{
    $campos = 'p.id, p.partidoAPI,
p.temporada_id,
p.estado_partido, 
p.jornada,
p.fecha, 
p.hora_prevista, 
p.goles_local,
p.goles_visitante,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twitter_local, ec.id local_id,
p.equipoLocal_id,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twitter_visitante, ef.id visitante_id,
p.equipoVisitante_id,
p.observaciones, p.youtube_id,
tor.id_original, tor.visible, 
(select es_seleccion FROM club WHERE id=ec.club_id) es_seleccion,
(select count(id) from gol WHERE partido_id=p.id AND jugador_id>0) goles';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';

    $tabla = 'partido p';
    $campos .= ",fa.nombre fase,  
p.hora_real,
p.clasificado, 
p.grupo_id,
(select nombre from grupo where id=p.grupo_id) nombreGrupo, 
(SELECT temporada_id FROM temporada_equipo WHERE equipo_id=p.equipoLocal_id AND (select tipo_torneo from torneo WHERE id=(select torneo_id from temporada where id=temporada_id) limit 1)=1 limit 1) liga_local,
(SELECT temporada_id FROM temporada_equipo WHERE equipo_id=p.equipoVisitante_id AND (select tipo_torneo from torneo WHERE id=(select torneo_id from temporada where id=temporada_id) limit 1)=1 limit 1) liga_visitante,
(select pais_id FROM club WHERE id=ec.club_id) paisLocal_id,
(select pais_id FROM club WHERE id=ef.club_id) paisVisitante_id,
p.estadio, 
te.nombre nombreTemporada,
tor.tipo_torneo,
tor.comunidad_id,tor.desarrollo,
co.id comunidad_imagen,
pa.id pais_imagen,pa.id_bwin,
(select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id)
FROM partido p2 
WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id 
AND p2.temporada_id=p.temporada_id 
AND p2.estado_partido=1
AND (select tipo_eliminatoria from fase where id=p.jornada)<>3
 LIMIT 1 ) as ida,
p.acta, e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad";

    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' LEFT JOIN estadio e ON e.id=p.estadio';
    $union .= ' LEFT JOIN localidad l ON l.id=e.localidad_id';
    $union .= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';

    $condicion = ' WHERE p.id='.$partido_id;

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;

    //echo $consulta;

    $mysqli = conectar();

    $resultadoSQL = mysqli_query($mysqli, $consulta);

    /*if (!$resultadoSQL) {
    imp($_SERVER['HTTP_REFERER']);
    imp($_SERVER['REQUEST_URI']);
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
    }*/

    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XjugadorTarjetasPartido($jugador_id)
{
    $campos = 't.partido_id';
    $tabla = ' tarjeta t';
    $condicion = ' WHERE t.jugador_id='.$jugador_id.' AND (t.tipo<2 OR t.tipo=5)';
    $orden = ' ORDER BY t.id';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidos = array();
    foreach ($resultado as $key => $value) {
        $partido = Xpartido($value['partido_id'], 0);
        $partidos[] = $partido;
    }

    return $partidos;
}

function XpartidoTarjetas($partido_id)
{
    
        $campos = 't.id, t.jugador_id, t.minuto, t.tipo, t.esLocal, j.apodo nombreJugador, j.posicion,t.observaciones ';
        $tabla = 'partido p';
        $union = ' INNER JOIN tarjeta t ON p.id=t.partido_id';
        $union .= ' INNER JOIN jugador j ON j.id=t.jugador_id';
        $condicion = ' WHERE p.id='.$partido_id;
        $orden = ' ORDER BY t.minuto, t.id';
    
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XequipoClub($equipo_id)
{
    $campos = 'e.club_id, e.estadio_id, es.nombre nombreEstadio, loes.nombre localidadEstadio,
    e.equipacion_id, eq.camiseta, eq.pantalon, eq.media, e.slug,
    e.escudo, e.debut_nacional, c.localidad_id, loeq.nombre localidadEquipo,
    c.pais_id, pa.nombre nombrePais, c.nombre, c.nombre_completo, c.fundado, e.fundado efundado, 
    e.desaparecido, c.presidente, c.socios, c.patrocinador, c.presupuesto, c.web,
    e.id_original, es.id imagenEstadio, es.inaguracion, es.capacidad, es.direccion direccionEstadio, c.es_seleccion, cat.nombre categoriaN';
    $tabla = ' equipo e';
    $union = ' INNER JOIN club c ON e.club_id=c.id';
    $union .= ' INNER JOIN categoria cat ON e.categoria_id=cat.id';
    $union .= ' LEFT JOIN estadio es ON e.estadio_id=es.id';
    $union .= ' LEFT JOIN localidad loes ON es.localidad_id=loes.id';
    $union .= ' LEFT JOIN equipacion eq ON e.equipacion_id=eq.id';
    $union .= ' LEFT JOIN localidad loeq ON c.localidad_id=loeq.id';
    $union .= ' LEFT JOIN pais pa ON c.pais_id=pa.id';
    $condicion = ' WHERE e.id='.$equipo_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $sql = 'SELECT te.temporada_id, tor.tipo_torneo tipo, tor.visible, tor.nombre, te.grupo FROM temporada_equipo te
    INNER JOIN temporada t ON te.temporada_id=t.id
    INNER JOIN torneo tor ON t.torneo_id=tor.id
    WHERE te.equipo_id='.$equipo_id.' AND tor.visible>4 AND te.temporada_id<>442';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $liga = 0;
    $grupo_liga = 0;
    foreach ($resultado2 as $key => $value) {
        if (1 == $value['tipo']) {
            $liga = $value['temporada_id'];
            $grupo_liga = $value['grupo'];
        }
    }

    return array(
        'datos' => $resultado1,
        'torneos' => $resultado2,
        'liga' => $liga,
        'grupo_liga' => $grupo_liga,
        );
}


function XequipoPartidos($equipo_id)
{
    $campos = 'p.id,    p.temporada_id, p.estado_partido, p.jornada,
    fa.nombre fase, p.grupo_id, gr.nombre, p.partidoAPI, 
    p.fecha, p.hora_prevista, p.hora_real, p.clasificado, 
    p.goles_local, p.goles_visitante,
    ec.nombre local,ec.nombreCorto localCorto,ec.slug localSlug,
    p.equipoLocal_id,
    ef.nombre visitante, ef.nombreCorto visitanteCorto,ef.slug visitanteSlug,
    p.equipoVisitante_id, p.observaciones,p.acta,
    tor.tipo_torneo, tor.visible, 
    tor.nombre nombreTorneo,
    co.id idComunidad, 
    (SELECT count(partido_id) FROM gol WHERE partido_id=p.id) goles';

    $campos .= ', (SELECT count(partido_id) FROM partido_medio WHERE partido_id=p.id) tv, p.estadio, p.youtube_id';

    $tabla = 'partido p';

    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' LEFT JOIN grupo gr ON p.grupo_id=gr.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $condicion = ' WHERE (tor.visible>4) AND (p.equipoLocal_id='.$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.')';
    $orden = ' ORDER BY p.fecha DESC';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado) > 0) {
        $pj = array();
        foreach ($resultado as $fila) {
            //if ($fila['temporada_id']==442) { continue; } //amistosos
            if (1 != $fila['estado_partido']) {
                continue;
            } //tiene que estar jugado
            $pj[$fila['temporada_id']]['id'] = $fila['temporada_id'];
            $pj[$fila['temporada_id']]['nombreTorneo'] = $fila['nombreTorneo'];
            $pj[$fila['temporada_id']]['tipo_torneo'] = $fila['tipo_torneo'];
            if (!isset($pj[$fila['temporada_id']]['galocal'])) {
                $pj[$fila['temporada_id']]['galocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gavisitante'])) {
                $pj[$fila['temporada_id']]['gavisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['emlocal'])) {
                $pj[$fila['temporada_id']]['emlocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['emvisitante'])) {
                $pj[$fila['temporada_id']]['emvisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['pelocal'])) {
                $pj[$fila['temporada_id']]['pelocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['pevisitante'])) {
                $pj[$fila['temporada_id']]['pevisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gflocal'])) {
                $pj[$fila['temporada_id']]['gflocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gclocal'])) {
                $pj[$fila['temporada_id']]['gclocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gfvisitante'])) {
                $pj[$fila['temporada_id']]['gfvisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gcvisitante'])) {
                $pj[$fila['temporada_id']]['gcvisitante'] = 0;
            }
            if ($fila['goles_local'] == $fila['goles_visitante']) {
                if ($equipo_id == $fila['equipoLocal_id']) {
                    $pj[$fila['temporada_id']]['emlocal'] = $pj[$fila['temporada_id']]['emlocal'] + 1;
                    $pj[$fila['temporada_id']]['gflocal'] = $pj[$fila['temporada_id']]['gflocal'] + $fila['goles_local'];
                    $pj[$fila['temporada_id']]['gclocal'] = $pj[$fila['temporada_id']]['gclocal'] + $fila['goles_visitante'];
                } else {
                    $pj[$fila['temporada_id']]['emvisitante'] = $pj[$fila['temporada_id']]['emvisitante'] + 1;
                    $pj[$fila['temporada_id']]['gfvisitante'] = $pj[$fila['temporada_id']]['gfvisitante'] + $fila['goles_visitante'];
                    $pj[$fila['temporada_id']]['gcvisitante'] = $pj[$fila['temporada_id']]['gcvisitante'] + $fila['goles_local'];
                }
            } elseif ($equipo_id == $fila['equipoLocal_id']) {
                $pj[$fila['temporada_id']]['gflocal'] = $pj[$fila['temporada_id']]['gflocal'] + $fila['goles_local'];
                $pj[$fila['temporada_id']]['gclocal'] = $pj[$fila['temporada_id']]['gclocal'] + $fila['goles_visitante'];
                if ($fila['goles_local'] > $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['galocal'] = $pj[$fila['temporada_id']]['galocal'] + 1;
                }
                if ($fila['goles_local'] < $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['pelocal'] = $pj[$fila['temporada_id']]['pelocal'] + 1;
                }
            } else {
                $pj[$fila['temporada_id']]['gfvisitante'] = $pj[$fila['temporada_id']]['gfvisitante'] + $fila['goles_visitante'];
                $pj[$fila['temporada_id']]['gcvisitante'] = $pj[$fila['temporada_id']]['gcvisitante'] + $fila['goles_local'];
                if ($fila['goles_visitante'] > $fila['goles_local']) {
                    $pj[$fila['temporada_id']]['gavisitante'] = $pj[$fila['temporada_id']]['gavisitante'] + 1;
                }
                if ($fila['goles_local'] > $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['pevisitante'] = $pj[$fila['temporada_id']]['pevisitante'] + 1;
                }
            }
        }

        $ordenTorneo = [];
        foreach ($pj as $key => $ordeno) {
            $ordenTorneo[$key] = $ordeno['id'];
        }

        array_multisort($ordenTorneo, SORT_ASC, SORT_NUMERIC, $pj);

//        $partidos = array();

        $partidos = array('partidos' => $resultado, 'estadisticas' => $pj);

        return $partidos;
        exit;
    }
}

function XequipoGoles($equipo_id)
{
    $tiempo_inicio = microtime_float();

    $consulta = 'SELECT g.id, g.jugador_id, j.apodo jugadorNombre, g.portero_id, g.partido_id, g.temporada_id, g.minuto, g.tipo, g.esLocal, g.observaciones, p.equipoLocal_id local_id, p.equipoVisitante_id visitante_id FROM gol g 
        INNER JOIN partido p ON g.partido_id=p.id 
        INNER JOIN jugador j ON j.id=g.jugador_id 
        WHERE (p.equipoLocal_id='.$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.')  AND g.jugador_id>0 AND (g.temporada_id<25 OR g.temporada_id=214) 
        ORDER BY g.partido_id, minuto DESC';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    $goles = array();
    $goles['fv_l_1t'] = 0;
    $goles['fv_l_2t'] = 0;
    $goles['ct_l_1t'] = 0;
    $goles['ct_l_2t'] = 0;
    $goles['penal_fv_l'] = 0;
    $goles['penal_ct_l'] = 0;
    $goles['penal_fvf_l'] = 0;
    $goles['penal_ctf_l'] = 0;
    $goles['propia_fv_l'] = 0;
    $goles['propia_fv_v'] = 0;

    $goles['fv_v_1t'] = 0;
    $goles['fv_v_2t'] = 0;
    $goles['ct_v_1t'] = 0;
    $goles['ct_v_2t'] = 0;
    $goles['penal_fv_v'] = 0;
    $goles['penal_ct_v'] = 0;
    $goles['penal_fvf_v'] = 0;
    $goles['penal_ctf_v'] = 0;
    $goles['propia_ct_l'] = 0;
    $goles['propia_ct_v'] = 0;
    $realizadores = array();
    $minutos = array();
    $aldescanso = array();
    $ultimogol = array();

    foreach ($resultado as $fila) {
        //imp($fila);die;

        if ($fila['local_id'] == $equipo_id) {
            if ('1' == $fila['esLocal']) {
                if (!isset($realizadores[$fila['jugador_id']]['goles'])) {
                    $realizadores[$fila['jugador_id']]['goles'] = 0;
                }

                $realizadores[$fila['jugador_id']]['apodo'] = $fila['jugadorNombre'];
                $realizadores[$fila['jugador_id']]['goles'] = $realizadores[$fila['jugador_id']]['goles'] + 1;
                $realizadores[$fila['jugador_id']]['jugador_id'] = $fila['jugador_id'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['partido_id'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['tipo'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['minuto'];

                if ('10' != $fila['tipo'] && '2' != $fila['tipo']) {
                    $minutos['afavor'][$fila['esLocal']][] = $fila['minuto'];
                    $ultimogol[$fila['partido_id']][$fila['local_id']] = $fila['jugador_id'];
                    if ($fila['minuto'] < '200') {
                        $goles['fv_l_1t'] = $goles['fv_l_1t'] + 1;
                        $aldescanso[$fila['partido_id']][$fila['local_id']][] = $fila['local_id'];
                    } else {
                        $goles['fv_l_2t'] = $goles['fv_l_2t'] + 1;
                    }
                }

                if ('1' == $fila['tipo']) {
                    $goles['penal_fv_l'] = $goles['penal_fv_l'] + 1;
                }
                if ('10' == $fila['tipo']) {
                    $goles['propia_ct_l'] = $goles['propia_ct_l'] + 1;
                }
                if ('2' == $fila['tipo']) {
                    $goles['penal_fvf_l'] = $goles['penal_fvf_l'] + 1;
                }
            } else {
                if ('10' != $fila['tipo'] && '2' != $fila['tipo']) {
                    $minutos['encontra'][$fila['esLocal']][] = $fila['minuto'];
                    $ultimogol[$fila['partido_id']][$fila['local_id']] = $fila['jugador_id'];

                    if ($fila['minuto'] < '200') {
                        $goles['ct_l_1t'] = $goles['ct_l_1t'] + 1;
                        $aldescanso[$fila['partido_id']][$fila['visitante_id']][] = $fila['visitante_id'];
                    } else {
                        $goles['ct_l_2t'] = $goles['ct_l_2t'] + 1;
                    }
                }

                if ('1' == $fila['tipo']) {
                    $goles['penal_ct_l'] = $goles['penal_ct_l'] + 1;
                }
                if ('2' == $fila['tipo']) {
                    $goles['penal_ctf_l'] = $goles['penal_ctf_l'] + 1;
                }
                if ('10' == $fila['tipo']) {
                    $goles['propia_fv_l'] = $goles['propia_fv_l'] + 1;
                }
            }
        } else {
            if ('0' == $fila['esLocal']) {
                if (!isset($realizadores[$fila['jugador_id']]['goles'])) {
                    $realizadores[$fila['jugador_id']]['goles'] = 0;
                }

                $realizadores[$fila['jugador_id']]['apodo'] = $fila['jugadorNombre'];
                $realizadores[$fila['jugador_id']]['goles'] = $realizadores[$fila['jugador_id']]['goles'] + 1;
                $realizadores[$fila['jugador_id']]['jugador_id'] = $fila['jugador_id'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['partido_id'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['tipo'];
                $realizadores[$fila['jugador_id']][$fila['esLocal']][] = $fila['minuto'];

                if ('10' != $fila['tipo'] && '2' != $fila['tipo']) {
                    $minutos['afavor'][$fila['esLocal']][] = $fila['minuto'];
                    $ultimogol[$fila['partido_id']][$fila['local_id']] = $fila['jugador_id'];

                    if ($fila['minuto'] < '200') {
                        $goles['fv_v_1t'] = $goles['fv_v_1t'] + 1;
                        $aldescanso[$fila['partido_id']][$fila['visitante_id']][] = $fila['visitante_id'];
                    } else {
                        $goles['fv_v_2t'] = $goles['fv_v_2t'] + 1;
                    }
                }
                if ('1' == $fila['tipo']) {
                    $goles['penal_fv_v'] = $goles['penal_fv_v'] + 1;
                }
                if ('2' == $fila['tipo']) {
                    $goles['penal_fvf_v'] = $goles['penal_fvf_v'] + 1;
                }
                if ('10' == $fila['tipo']) {
                    $goles['propia_ct_v'] = $goles['propia_ct_v'] + 1;
                }
            } else {
                if ('10' != $fila['tipo'] && '2' != $fila['tipo']) {
                    $minutos['encontra'][$fila['esLocal']][] = $fila['minuto'];
                    $ultimogol[$fila['partido_id']][$fila['local_id']] = $fila['jugador_id'];

                    if ($fila['minuto'] < '200') {
                        $goles['ct_v_1t'] = $goles['ct_v_1t'] + 1;
                        $aldescanso[$fila['partido_id']][$fila['local_id']][] = $fila['local_id'];
                    } else {
                        $goles['ct_v_2t'] = $goles['ct_v_2t'] + 1;
                    }
                }
                if ('1' == $fila['tipo']) {
                    $goles['penal_ct_v'] = $goles['penal_ct_v'] + 1;
                }
                if ('2' == $fila['tipo']) {
                    $goles['penal_ctf_v'] = $goles['penal_ctf_v'] + 1;
                }
                if ('10' == $fila['tipo']) {
                    $goles['propia_fv_v'] = $goles['propia_fv_v'] + 1;
                }
            }
        }
    }

    $tiempo_fin = microtime_float();
    $tiempo = $tiempo_fin - $tiempo_inicio;
    /*echo "Tiempo final.........: " . ($tiempo_fin)."<br />";
    echo "Tiempo inicio.......: " . ($tiempo_inicio)."<br />";
    echo "Tiempo empleado: <b>" . $tiempo."</b><hr />";*/
    //imp($tiempo);

    return array(
        'goles' => $goles,
        'realizadores' => $realizadores,
        'minutos' => $minutos,
        'aldescanso' => $aldescanso,
        'ultimogol' => $ultimogol,
        );
}

function XequipoPlantilla($equipo_id)
{
    $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.imagen, j.id_original,
    CASE posicion
    WHEN 1 THEN (SELECT count(g.id) FROM gol g WHERE g.portero_id=j.id AND g.jugador_id>0 AND (g.temporada_id<25 OR g.temporada_id=214))
    ELSE (SELECT count(g.id) FROM gol g WHERE g.jugador_id=j.id AND g.tipo<>10 AND (g.temporada_id<25 OR g.temporada_id=214))
    END as goles,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=0 AND t.temporada_id<25) ta,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND (t.tipo=1 OR t.tipo=5) AND t.temporada_id<25) tr
    ';
    $tabla = ' jugador j';
    $condicion = ' WHERE j.equipoActual_id='.$equipo_id.' AND j.es_baja=0';
    $orden = ' ORDER BY j.posicion';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XpartidoGoles($partido_id, $bd = 1)
{
    if (1 == $bd) {
        $campos = 'g.id, g.partido_id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.observaciones, j.apodo nombreJugador ';
        $tabla = 'partido p';
        $union = ' INNER JOIN gol g ON p.id=g.partido_id';

        $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
        $condicion = ' WHERE p.id='.$partido_id;
        $orden = ' ORDER BY g.minuto';
    } else {
        $campos = "g.id, g.partido_id, g.jugador_id, g.minuto, g.tipo, g.esLocal, '' observaciones, j.apodo nombreJugador ";
        $tabla = 'historico p';
        $union = ' INNER JOIN historicogol g ON p.partido_id=g.partido_id';
        $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
        $condicion = ' WHERE p.partido_id='.$partido_id;
        $orden = ' ORDER BY g.minuto';
    }

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}
