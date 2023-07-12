<?php
function crearPartidoVacioLiga($temporada_id, $jornada, $combinacionLocal, $combinacionVisitante)
{
    $consulta = "INSERT INTO partido (temporada_id, jornada, combinacionLocal, combinacionVisitante)
					  VALUES ('".$temporada_id."', '".$jornada."', '".$combinacionLocal."', '".$combinacionVisitante."')";
    $mysqli = conectar();

    return mysqli_query($mysqli, $consulta);
}

function contarPartidosLiga($temporada_id)
{
    $consulta = 'SELECT COUNT(id) FROM partido WHERE temporada_id = '.$temporada_id;
//    $mysqli = conectar();

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);

    return $resultado[0];
}



function actualizarPartidosLiga($temporada_id, $combinacion, $equipo_id)
{
    $consulta1 = 'UPDATE partido
                SET equipoLocal_id='.$equipo_id.'
                WHERE temporada_id='.$temporada_id.' AND combinacionLocal='.$combinacion;

    $consulta2 = 'UPDATE partido
                SET equipoVisitante_id='.$equipo_id.'
                WHERE temporada_id='.$temporada_id.' AND combinacionVisitante='.$combinacion;
    $mysqli = conectar();

    echo $consulta1.'<br />';
    echo $consulta2.'<br />';

    return mysqli_query($mysqli, $consulta1) && mysqli_query($mysqli, $consulta2);
}

?>