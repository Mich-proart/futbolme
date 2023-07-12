<?php 

function equipoInicio($equipo_id)
{
$campos = 'nc.idPartido,
nc.jornada, 
nc.fecha,
nc.nomCasa local,
nc.nomFuera visitante,
nc.resulCasa goles_local,
nc.resulFuera goles_visitante,
nc.fm_local_id equipoLocal_id,
nc.fm_visitante_id equipoVisitante_id,
nc.idTemporada,
nt.temporada,
nt.fm_torneo_id,
nt.idDivision ';
$tabla = ' nacionalcalendario nc'; 
$union = ' INNER JOIN nacionaltorneos nt ON nc.idTemporada=nt.idTemporada'; 
$condicion = ' WHERE nt.estilo=0 AND (fm_local_id='.$equipo_id.' OR fm_visitante_id='.$equipo_id.')';
$orden = ' ORDER BY nc.fecha DESC'; 
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
//echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function equipoTorneos($equipo_id)
{
    $campos = 't.id, t.nombre,tor.tipo_torneo, pa.nombre pais, tor.categoria_torneo_id';
    $tabla = ' temporada_equipo te';
    $union = ' INNER JOIN temporada t ON te.temporada_id=t.id';
    $union .= ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $condicion = ' WHERE te.equipo_id='.$equipo_id.' AND tor.visible>4';
    $orden = ' ORDER BY tor.tipo_torneo, tor.categoria_torneo_id, tor.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XequipoClub($equipo_id)
{
    $campos = 'e.club_id, e.estadio_id, es.nombre nombreEstadio, loes.nombre localidadEstadio,
	e.equipacion_id, eq.camiseta, eq.pantalon, eq.media, e.slug, e.nombreCorto,
	e.escudo, e.debut_nacional, c.localidad_id, loeq.nombre localidadEquipo,
	c.pais_id, pa.nombre nombrePais, c.nombre, c.nombre_completo, c.fundado, e.fundado efundado, 
	e.desaparecido, c.presidente, c.socios, c.patrocinador, c.presupuesto, c.web, es.id imagenEstadio, es.inaguracion, es.capacidad, es.direccion direccionEstadio, c.es_seleccion, cat.nombre categoriaN';
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

    $sql = 'SELECT te.temporada_id, tor.tipo_torneo tipo, tor.division_id, tor.visible, tor.nombre, te.grupo, tor.categoria_torneo_id FROM temporada_equipo te
	INNER JOIN temporada t ON te.temporada_id=t.id
	INNER JOIN torneo tor ON t.torneo_id=tor.id
	WHERE te.equipo_id='.$equipo_id.' AND tor.visible>3 AND te.temporada_id<>442';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $liga = 0;
    $grupo_liga = 0;
    $visible = 0;
    $division=1000;
    foreach ($resultado2 as $key => $value) {
        if (1 == $value['tipo']) {
            $liga = $value['temporada_id'];
            $grupo_liga = $value['grupo'];
            $visible = $value['visible'];
            if ($value['division_id']<$division){ $division = $value['division_id'];}
        }
    }

    return array(
        'datos' => $resultado1,
        'torneos' => $resultado2,
        'liga' => $liga,
        'grupo_liga' => $grupo_liga,
        'visible' => $visible,
        'division' => $division,
        );
}

function Xequipos($club_id)
{
    $campos = 'e.id, e.club_id, e.nombre equipo, e.categoria_id, c.nombre categoria, e.desaparecido, e.slug,(SELECT count(te.equipo_id) FROM temporada_equipo te WHERE te.equipo_id=e.id AND (select tipo_torneo from torneo where id=(select torneo_id from temporada where id=te.temporada_id))=1 ) torneo';
    $tabla = ' equipo e';
    $union = ' INNER JOIN categoria c ON e.categoria_id=c.id';
    $condicion = ' WHERE club_id='.$club_id.' AND c.id<>4 AND c.id<>21';
    $orden = ' ORDER BY e.codigoRFEF';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XequipoPosiciones($equipo_id)
{
    $consulta = 'SELECT posicion, idDivision, temporada, temporada_id
    FROM nacionalclasificacionok WHERE 
    equipo_id='.$equipo_id.' AND estilo=0 ORDER BY temporada DESC';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    
    return $resultado;
}

function XequipoPartidos($equipo_id)
{
    $campos = 'p.id,    p.temporada_id, p.estado_partido, p.jornada,
    fa.nombre fase, p.grupo_id, gr.nombre, p.partidoAPI, 
    p.fecha, p.hora_prevista, p.hora_real, p.clasificado, 
    p.goles_local, p.goles_visitante,
    ec.nombre local,ec.nombreCorto localCorto,ec.slug localSlug,
    p.equipoLocal_id,
    p.apuesta apuesta_partido,
    ef.nombre visitante, ef.nombreCorto visitanteCorto,ef.slug visitanteSlug,
    p.equipoVisitante_id, p.observaciones,p.acta,
    tor.tipo_torneo, tor.visible, tor.apuesta apuesta_torneo,
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
    $condicion = ' WHERE (tor.visible>3) AND (p.equipoLocal_id='.$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.')';
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

function Xfichajes($equipo_id=0, $modo_id=1)
{
    $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.fecha_nacimiento, 
    j.caracteristicas, j.palmares, j.slug, j.equipoActual_id, ea.nombreCorto equipo, ea.categoria_id, ea.club_id';
    $tabla = ' jugador j';
    $union = ' INNER JOIN equipo ea ON j.equipoActual_id=ea.id';
    //$union2=" INNER JOIN equipo ep ON j.equipoProcedencia_id=ep.id, ep.nombre equipoProcedencia";
    if (0 == $equipo_id) {
        $condicion = ' WHERE j.es_fichaje='.$modo_id.' ORDER BY j.fecha_modificacion DESC LIMIT 15';
    } else {
        $condicion = ' WHERE j.es_fichaje>0 AND j.equipoActual_id='.$equipo_id.' ORDER BY j.posicion, j.fecha_modificacion';
    }
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XequipoPlantilla($equipo_id)
{
    $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.imagen, 
    CASE posicion
    WHEN 1 THEN 0
    ELSE (SELECT count(g.id) FROM gol g WHERE g.jugador_id=j.id AND g.tipo<>10)
    END as goles,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=2) tit,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=6) sup,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=4) ent,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=3) sal,
    (SELECT count(t.id) FROM tarjeta t WHERE t.jugador_id=j.id AND t.tipo=0) ta,
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

///PARA ZONA USUARIO
function actualizarNombre($username, $user_id)
{
    $consulta = "UPDATE usuario_token SET nombre = '".$username."' WHERE id=".$user_id;
    $mysqli = conectar();
    if (!mysqli_query($mysqli, $consulta)) {
        $error=mysqli_errno($mysqli);
        if ($error==1062) { 
            header('Location:/index.php?n1=config&error=3');
            exit(); 
        }
        
    }

}

function equipoNombre($equipo_id) {
    $consulta = 'SELECT nombreCorto
    FROM equipo WHERE id='.$equipo_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);
    return $resultado[0];
}

function XsaberLiga($equipo_id)
{
    $consulta = 'SELECT te.temporada_id,te.equipo_id,tem.nombre,tor.tipo_torneo, li.jornadaActiva valorJornada, li.jornadas
    FROM temporada_equipo te
    INNER JOIN temporada tem ON tem.id=te.temporada_id
    INNER JOIN torneo tor ON tor.id=tem.torneo_id
    INNER JOIN liga li ON tor.id=li.id
    WHERE te.equipo_id='.$equipo_id.' AND tor.tipo_torneo=1';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}
?>
