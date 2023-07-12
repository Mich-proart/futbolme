<?php
function widget_calendarioAW($equipo_id)
{
    $sql = 'SELECT e.nombre, t.nombre torneo_nombre, t.id temporada_id, 
	l.jornadaActiva
	FROM equipo e 
	INNER JOIN temporada_equipo te ON te.equipo_id=e.id
	INNER JOIN temporada t on te.temporada_id=t.id
	INNER JOIN torneo tor on t.torneo_id=tor.id
	INNER JOIN liga l on l.id=tor.id
	WHERE e.id='.$equipo_id.' AND tor.tipo_torneo=1 LIMIT 1';
    //echo $sql;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $equipo = $resultado['nombre'];
    $torneo_nombre = $resultado['torneo_nombre'];
    $temporada_id = $resultado['temporada_id'];
    $jornadaActiva = $resultado['jornadaActiva'];    
    $calendario = Xpartidos($temporada_id, 0, $equipo_id);  
    return $calendario;
}

function widget_jornadaAW($equipo_id)
{

    $sql = 'SELECT e.nombre, t.nombre torneo_nombre, t.id temporada_id, 
	l.jornadaActiva
	FROM equipo e 
	INNER JOIN temporada_equipo te ON te.equipo_id=e.id
	INNER JOIN temporada t on te.temporada_id=t.id
	INNER JOIN torneo tor on t.torneo_id=tor.id
	INNER JOIN liga l on l.id=tor.id
	WHERE e.id='.$equipo_id.' AND tor.tipo_torneo=1 LIMIT 1';
    //echo $sql;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);
    $equipo = $resultado['nombre'];
    $torneo_nombre = $resultado['torneo_nombre'];
    $temporada_id = $resultado['temporada_id'];
    $jornadaActiva = $resultado['jornadaActiva'];

    
    $jornada = Xpartidos($temporada_id, $jornadaActiva);   

    return $jornada;
}

//******************CLASIFICACION*****************************************

function widget_clasificacionAW($equipo_id)
{
   
    $sql = 'SELECT e.nombreCorto nombre, t.nombre torneo_nombre, t.id temporada_id, 
	l.jornadaActiva, l.jornadas, t.torneo_id, l.tipoClasificacion, l.tipoPuntuacion
	FROM equipo e 
	INNER JOIN temporada_equipo te ON te.equipo_id=e.id
	INNER JOIN temporada t on te.temporada_id=t.id
	INNER JOIN torneo tor on t.torneo_id=tor.id
	INNER JOIN liga l on l.id=tor.id
	WHERE e.id='.$equipo_id.' AND tor.tipo_torneo=1 LIMIT 1';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);
    $equipo = $resultado['nombre'];
    $torneo_nombre = $resultado['torneo_nombre'];
    $temporada_id = $resultado['temporada_id'];
    $jornadaActiva = $resultado['jornadaActiva'];

    $clas = array(
                'temporada_id' => $temporada_id,
                'jornada' => $jornadaActiva,
                'grupo_id' => 0,
                'equipo_id' => 0,
                'tipoClasificacion' => $resultado['tipoClasificacion'],
                'torneo_id' => $resultado['torneo_id'],
                'jornadas' => $resultado['jornadas'],
                'puntosPorganar' => $resultado['tipoPuntuacion'],
                );

    
    $clasificacion = XgenerarClasificacion($clas);

    

    return $clasificacion;
}

//******************PARTIDO*****************************************

function widget_partidoAW($equipo_id)
{

    $fecha = new \DateTime();
    $diasAntes = new \DateTime();
    $hoy = $fecha->format('Y-m-d');

    $diasAntes = \DateTime::createFromFormat('Y-m-d', $hoy);
    $diasAntes = $diasAntes->modify('-4 day')->format('Y-m-d');

    $sql = "SELECT p.id,p.temporada_id,p.estado_partido,p.jornada,
p.fecha,p.hora_prevista,p.clasificado, p.acta,
p.goles_local,p.goles_visitante,p.arbitro_id,
ec.nombre local, p.equipoLocal_id, (select id_original from club where id=ec.club_id) clubLocal, (select id_original from club where id=ef.club_id) clubVisitante,
ef.nombre visitante, p.equipoVisitante_id, 
te.nombre nombreTemporada, tor.tipo_torneo,
e.nombre estadioNombre,
e.id estadio_imagen
FROM partido p 
INNER JOIN equipo ec ON p.equipoLocal_id=ec.id
INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id
INNER JOIN temporada te ON p.temporada_id=te.id
INNER JOIN torneo tor ON te.torneo_id=tor.id
LEFT JOIN estadio e ON e.id=ec.estadio_id

WHERE p.fecha>'".$diasAntes."' 
AND (p.equipoLocal_id=".$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.') ORDER BY fecha';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $partido = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $partido;
}


?>

