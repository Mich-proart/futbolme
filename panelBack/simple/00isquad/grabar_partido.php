<?php

    $sql="SELECT id FROM partido WHERE temporada_id=".$torneo_id." AND equipoLocal_id=".$local_id." AND equipoVisitante_id=".$visitante_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql='INSERT INTO partido(temporada_id, estado_partido, acta, fecha, hora_prevista, hora_real, goles_local, goles_visitante, jornada, observaciones, clasificado, equipoLocal_id, equipoVisitante_id, arbitro, estadio) VALUES ("'.$torneo_id.'","'.$estado_partido.'", "'.$acta.'", "'.$fecha.'", "'.$hora_prevista.'", "'.$hora_real.'", "'.$goles_local.'", "'.$goles_visitante.'", "'.$jornada.'", "'.$observaciones.'", "'.$clasificado.'", "'.$local_id.'", "'.$visitante_id.'", "'.$arbitro.'", "'.$estadio.'")';
        $mysqli = conectar();
        mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
        echo "Partido insertado<br />"; 
    } else { 
        echo "Este partido ya esta grabado<br />"; 
    }
 ?>