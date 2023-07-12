<?php

function torneosH()
{     
    $mysqli = conectar();   

    $consulta = 'SELECT nt.idTemporada, nt.nombreTemporada, nt.jornadas, nt.equipos, nt.temporada, nt.estilo, nt.grupo, nt.idDivision, nt.idTorneoTemporada, nt.fm_torneo_id, (select count(idPartido) from nacionalcalendario where idTemporada=nt.idTemporada) partidos
    FROM nacionaltorneos nt ORDER BY nt.temporada DESC, nt.idDivision, nt.grupo';
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function guardarDatos($temporada){

	$mysqli = conectar(); 
    $mysqli2 = conectar2000();  

    $consulta = 'SELECT nt.idTemporada, nt.temporada, nt.grupo, nt.idDivision, nt.estilo, nt.fm_torneo_id
    FROM nacionaltorneos nt WHERE nt.temporada='.$temporada.' AND nt.estilo=0 ORDER BY nt.idDivision, nt.grupo';
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    foreach ($resultado as $key => $value) {
    	echo $value['idTemporada'].' - '.$value['temporada'].' - division: '.$value['idDivision'].' - estilo: '.$value['estilo'].' - Torneo: '.$value['fm_torneo_id'].' - Grupo: '.$value['grupo'].'<br />';

    	$idTemporada=$value['idTemporada'];
        $temporada_id=$value['fm_torneo_id']; 

    	$sq2='SELECT jornada, fecha, (select nombre from equipo where id=equipoLocal_id) casa, (select nombre from equipo where id=equipoVisitante_id) fuera, observaciones,  goles_local, goles_visitante, hora_prevista, equipoLocal_id, equipoVisitante_id FROM partido WHERE temporada_id='.$temporada_id.' ORDER BY jornada, fecha, hora_prevista';

        $resultadoSQL = mysqli_query($mysqli2, $sq2);
        $partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        foreach ($partidos as $k => $v) {
            $sql='INSERT INTO nacionalcalendario(jornada, fecha, nomCasa, nomFuera, cosas, resulCasa, resulFuera, hora, idTemporada, fm_local_id, fm_visitante_id) VALUES ("'.$v['jornada'].'", "'.$v['fecha'].'", "'.$v['casa'].'", "'.$v['fuera'].'", "'.$v['observaciones'].'", "'.$v['goles_local'].'", "'.$v['goles_visitante'].'", "'.$v['hora_prevista'].'", "'.$idTemporada.'", "'.$v['equipoLocal_id'].'", "'.$v['equipoVisitante_id'].'")';
            mysqli_query($mysqli, $sql);
        } 
    }
}


function guardarExcepciones($temporada){

    $mysqli = conectar(); 
    $mysqli2 = conectar2000();  

    $consulta = 'SELECT nt.idTemporada, nt.temporada, nt.grupo, nt.idDivision, nt.estilo, nt.fm_torneo_id
    FROM nacionaltorneos nt WHERE nt.temporada='.$temporada.' AND nt.estilo=0 ORDER BY nt.idDivision, nt.grupo';
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    foreach ($resultado as $key => $value) {
        echo $value['idTemporada'].' - '.$value['temporada'].' - division: '.$value['idDivision'].' - estilo: '.$value['estilo'].' - Torneo: '.$value['fm_torneo_id'].' - Grupo: '.$value['grupo'].'<br />';

        $idTemporada=$value['idTemporada'];
        $temporada_id=$value['fm_torneo_id']; 

        $sq2='SELECT temporada_id, equipo_id, jornada, puntos, jugados, ganados, empatados, perdidos, gFavor, gContra FROM sancion WHERE temporada_id='.$temporada_id;

        $resultadoSQL = mysqli_query($mysqli2, $sq2);
        $sanciones = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        foreach ($sanciones as $k => $v) {
            $sql='INSERT INTO nacionalclasiexcepciones(jornada, puntos, jugados, ganados, empatados, perdidos, golesFavor, golesContra, idTemporada, idEquipo) VALUES ("'.$v['jornada'].'", "'.$v['puntos'].'", "'.$v['jugados'].'", "'.$v['ganados'].'", "'.$v['empatados'].'", "'.$v['perdidos'].'", "'.$v['gFavor'].'", "'.$v['gContra'].'", "'.$idTemporada.'", "'.$v['equipo_id'].'")';
            echo $sql.'<br />';
            mysqli_query($mysqli, $sql);
        } 
    }
}
?>