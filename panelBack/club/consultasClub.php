<?php
function categorias()
{
    $mysqli = conectar();
    $consulta = 'SELECT id,nombre,orden FROM categoria ORDER BY orden';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}


function obtenerEquipaciones()
{
    $mysqli = conectar();
    $consulta = 'SELECT e.id, e.camiseta, e.pantalon, e.media FROM equipacion e 
    ORDER BY e.camiseta, e.pantalon, e.media';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function obtenerEstadios($localidad_id)
{
    $mysqli = conectar();
    $consulta = 'SELECT e.id, e.nombre, l.nombre AS localidad_nombre 
                FROM estadio e 
                LEFT JOIN localidad l ON l.id = e.localidad_id
                WHERE e.localidad_id = '.$localidad_id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function obtenerLocalidades()
{
    $mysqli = conectar();
    $consulta = 'SELECT l.id, l.nombre
                FROM localidad l ORDER BY l.nombre';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function obtenerTemporada($id)
{
    $mysqli = conectar();
    $consulta = 'SELECT te.temporada_id, t.nombre,(select tipo_torneo from torneo WHERE id=t.torneo_id) tipo_torneo 
                FROM temporada_equipo te
                LEFT JOIN temporada t ON t.id = te.temporada_id
                WHERE te.equipo_id = '.$id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}


function obtenerJugadores($id)
{
    $mysqli = conectar();
    $consulta = 'SELECT j.id, j.apodo, j.nombre, j.apellidos, j.posicion, j.es_baja
                FROM jugador j 
                WHERE j.equipoActual_id = '.$id.'
                ORDER BY j.posicion ASC';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function obtenerDatosEstadio($id)
{
    $mysqli = conectar();
    $consulta = 'SELECT e.id, e.localidad_id, e.nombre, e.inaguracion, e.capacidad, e.direccion, e.longitud, e.latitud
                FROM estadio e 
                WHERE e.id = '.$id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function obtenerDatosEquipacion($id)
{
    $mysqli = conectar();
    $consulta = 'SELECT e.id, e.camiseta, e.pantalon, e.media
                FROM equipacion e 
                WHERE e.id = '.$id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function obtenerDatosEquipo($id)
{
    $mysqli = conectar();
    $consulta = 'SELECT e.id, e.nombre, e.nombre_completo, e.fundado, e.desaparecido, e.debut_nacional, e.escudo, e.sexo, e.slug, e.categoria_id, e.estadio_id, e.equipacion_id, c.localidad_id
                FROM equipo e 
                LEFT JOIN club c ON c.id = e.club_id
                WHERE e.id = '.$id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}


function obtenerDatosClub($id)
{
    $mysqli = conectar();
    $consultaClub = 'SELECT c.id, c.nombre, c.nombre_completo, c.fundado, c.desaparecido, c.presidente, c.socios, c.patrocinador, c.presupuesto, c.contacto, c.email, c.telefono, c.web, c.direccion, c.observaciones, c.slug, c.es_seleccion, c.localidad_id, c.origen_id, c.codigoRFEF, c.territorialRFEF, p.nombre AS pais_nombre, c.futbolbase_id, (select id from comunidad where codigoRFEF=c.territorialRFEF limit 1)  comunidad_id      
    FROM club c
    LEFT JOIN pais p ON p.id = c.pais_id
    WHERE c.id = '.$id;
    $resultadoSQL = mysqli_query($mysqli, $consultaClub);
    $club = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $consultaEquipos = 'SELECT e.id, e.nombre, e.codigoRFEF, e.nombreCorto,  CHARACTER_LENGTH(e.nombre) numcaracteres, c.nombre AS categoria_nombre, e.categoria_id
                    FROM equipo e
                    LEFT JOIN categoria c ON c.id = e.categoria_id
                    WHERE e.club_id = '.$id.' ORDER BY c.orden, e.codigoRFEF';
    $resultadoSQL = mysqli_query($mysqli, $consultaEquipos);
    $equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $resultado['club'] = $club;
    $resultado['equipos'] = $equipos;

    return $resultado;
}


function datosClub($pais_id, $comunidad_id, $localidad_id)
{
    if ($comunidad_id > 0) {
        if (0 == $localidad_id) {
            $condicion = 'AND co.id='.$comunidad_id;
        } else {
            $condicion = 'AND co.id='.$comunidad_id.' AND l.id='.$localidad_id;
        }
    } else {
        $condicion = '';
    }

    $consulta = 'SELECT c.id, 
c.localidad_id,l.nombre nombre_localidad, p.id provincia_id, p.nombre nombre_provincia,
co.id comunidad_id, co.nombre nombre_comunidad,
c.nombre, 
c.nombre_completo, 
c.fundado, 
c.desaparecido, 
c.presidente, 
c.socios, 
c.patrocinador, 
c.presupuesto, 
c.contacto, 
c.email, 
c.telefono, 
c.web, 
c.direccion, 
c.observaciones, 
c.es_seleccion,
(SELECT count(id) FROM equipo WHERE club_id=c.id) equipos
FROM club c 
LEFT JOIN localidad l ON l.id=c.localidad_id
LEFT JOIN provincia p ON p.id=l.provincia_id
LEFT JOIN comunidad co ON co.id=p.comunidad_id

WHERE c.pais_id='.$pais_id.' '.$condicion.' ORDER BY nombre_localidad, nombre_comunidad, c.nombre';

    //echo $consulta;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}
