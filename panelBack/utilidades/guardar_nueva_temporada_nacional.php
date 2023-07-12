<?php

define('_FUTBOLME_', 1);

include '../../src/consultas/clasificacion/XgenerarClasificacion.php';


for ($i = 1; $i < 25; ++$i) {
    $temporada_id = $i;
    $ultimoId = 2209;
    $idTemporada = $temporada_id + $ultimoId;
    $division = 4;
    if ($temporada_id < 6) {
        $division = 3;
    }
    if (2 == $temporada_id) {
        $division = 2;
    }
    if (1 == $temporada_id) {
        $division = 1;
    }

    $partidos = Xpartidos($temporada_id);

    foreach ($partidos as $key => $value) {
        $jornada = $value['jornada'];
        $fecha = $value['fecha'];
        $local = $value['local'];
        $visitante = $value['visitante'];
        $observaciones = $value['observaciones'];
        $goles_local = $value['goles_local'];
        $goles_visitante = $value['goles_visitante'];
        $hora_prevista = $value['hora_prevista'];
        $id = $value['id'];
        $arbitro_id = $value['arbitro_id'];
        $equipoLocal_id = $value['equipoLocal_id'];
        $equipoVisitante_id = $value['equipoVisitante_id'];
        $youtube_id = $value['youtube_id'];

        $sql = 'INSERT INTO nacionalcalendario (
jornada, fecha, nomCasa, nomFuera, clasificado, 
cosas, resulCasa, resulFuera, hora, partido_id, idNacionalEliminatorias, 
idTemporada, fm_arbitro_id, fm_local_id, fm_visitante_id, youtube_id) VALUES 
('.$jornada.",'".$fecha."','".$local."','".$visitante."',0,
'".$observaciones."',".$goles_local.','.$goles_visitante.",'".$hora_prevista."',".$id.',0,
'.$idTemporada.','.$arbitro_id.','.$equipoLocal_id.','.$equipoVisitante_id.",'".$youtube_id."')";
        echo $sql."<br />";
        $mysqli2 = conectarActual();
        $resultadoSQL = mysqli_query($mysqli2, $sql);
    }

    $sanciones = Xsancion($temporada_id);

    foreach ($sanciones as $key => $value) {
        $equipo_id = $value['equipo_id'];
        $puntos = $value['puntos'];
        $jugados = $value['jugados'];
        $ganados = $value['ganados'];
        $empatados = $value['empatados'];
        $perdidos = $value['perdidos'];
        $gFavor = $value['gFavor'];
        $gContra = $value['gContra'];

        $sql = 'INSERT INTO nacionalclasiexcepciones (jornada, puntos, jugados, ganados, empatados, 
perdidos, golesFavor, golesContra, idTemporada, idEquipo, fm_equipo_id) 
	VALUES (0,'.$puntos.','.$jugados.','.$ganados.','.$empatados.',
	'.$perdidos.','.$gFavor.','.$gContra.','.$idTemporada.','.$equipo_id.',0)';
        //echo $sql."<br />";
        $mysqli2 = conectarActual();
        $resultadoSQL = mysqli_query($mysqli2, $sql);
    }

    echo 'Guardando sanciones';

    $clas=array();
    $clas['temporada_id']=$temporada_id;
    $clas['jornada']=0;
    $clas['grupo_id']=0;
    $clas['equipo_id']=0;
    $clas['tipoClasificacion']=0;
    $clas['torneo_id']=$temporada_id+1;
    $clas['jornadas']=0;
    $clas['puntosPorganar']=3;



    $clasificacion = XgenerarClasificacion($clas);

    foreach ($clasificacion['clasificacionFinal'] as $key => $value) {
        $posicion = $value['posicion'];
        $nombre = $value['nombre'];
        $puntos = $value['puntos'];
        $jugados = $value['jugados'];
        $ganados = $value['ganados'];
        $empatados = $value['empatados'];
        $perdidos = $value['perdidos'];
        $gFavor = $value['gFavor'];
        $gContra = $value['gContra'];
        $equipo_id = $value['equipo_id'];
        $css = $value['css'];
        $c = explode(';', $css);
        $color = explode(':', $c[0]);
        $color = $color[1];
        $fondo = explode(':', $c[1]);
        $fondo = $fondo[1];

        $sql = 'INSERT INTO nacionalclasificacionok(posicion, equipo, puntos, jugados, ganados, 
empatados, perdidos, golesFavor, golesContra, estilo, temporada_id, idViejo, idDivision, 
equipo_id, fm_torneo_id, color_texto, color_fondo, diferencia, temporada) 
VALUES ('.$posicion.",'".$nombre."',".$puntos.','.$jugados.','.$ganados.',
'.$empatados.','.$perdidos.','.$gFavor.','.$gContra.',0,'.$idTemporada.',-1,'.$division.',
'.$equipo_id.','.$temporada_id.",'".$color."','".$fondo."',".($gFavor - $gContra).',2016)';
        //echo $sql."<br />";
        $mysqli2 = conectarActual();
        $resultadoSQL = mysqli_query($mysqli2, $sql);
    }

    echo 'Guardando clasificación'.$i.'<br />';
    
}

function imp($ob)
{
    echo '<pre>';
    print_r($ob);
    echo '</pre>';
}

function conectar()
{
    $bbdd = 'futbolme_2017';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }

    if ($_SERVER['HTTP_HOST']=='fm18.com'){
       $mysqli = mysqli_connect('localhost', 'futbolme_2016', '2Cojones', $bbdd);             
    } else {
       $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);     
    }
    
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}

function conectarActual()
{
    $bbdd = 'futbolme_nueva';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }
    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}

function Xpartidos($temporada_id)
{
    $campos = "p.id, 
p.temporada_id,
p.estado_partido, 
p.jornada,
fa.nombre fase,  
p.fecha, 
p.hora_prevista, 
p.clasificado, 
p.goles_local,
p.goles_visitante,
p.grupo_id, 
ec.nombre local, ec.nombreCorto localCorto,
p.equipoLocal_id, 
ef.nombre visitante, ef.nombreCorto visitanteCorto, 
p.equipoVisitante_id,
p.observaciones,
p.estadio, p.arbitro_id, p.youtube_id
";
   

    $tabla = 'partido p';

    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';    
    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    

    $condicion = ' WHERE p.temporada_id='.$temporada_id;
   

    
        $orden = ' ORDER BY p.jornada, p.grupo_id, p.fecha, p.hora_prevista';
   
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    echo $consulta."<hr />";
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
    echo $consulta;
    return $resultado;
}

function Xcolores($temporada_id)
{
    $campos = 'ct.color_id, ct.posicion, c.texto, c.color_fondo, c.color_texto, ct.grupo_id';
    $tabla = ' colortorneo ct';
    $union = ' INNER JOIN color c ON ct.color_id=c.id';
    $condicion = ' WHERE ct.torneo_id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
    $orden = ' ORDER BY ct.posicion';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function Xpuntosdedirectos($temporada_id)
{
    
    $directos=array();
    return $directos;
}

function Xtipo($temporada_id)
{
    $fecha = new \DateTime();
    $hoy = $fecha->format('Y-m-d');
//    $ayer = new \DateTime();
    $ayer = \DateTime::createFromFormat('Y-m-d', $hoy);
    $ayer = $ayer->modify('-1 day')->format('Y-m-d');
    //imp($hoy);
    //imp($ayer);
    $mysqli = conectar();

    $campos = 't.torneo_id,
    tor.tipo_torneo, 
    tor.nombre, 
    tor.traduccion,
    tor.sexo, 
    tor.desarrollo, 
    tor.categoria_id, ce.nombre categoria_nombre,
    tor.visible,
    tor.categoria_torneo_id, 
    pa.id idPais, 
    pa.nombre nombrePais,
    co.id idComunidad, 
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
    $union.= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $union.= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $union.= ' INNER JOIN categoria ce ON tor.categoria_id=ce.id ';
        

    $condicion = ' WHERE t.id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

   

    return $resultado;
}

