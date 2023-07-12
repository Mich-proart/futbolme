<?php

        echo '<hr />goles_local: '.$goles_local.'<br />';
        echo 'goles_visitante: '.$goles_visitante.'<br />';
        echo '<br />local_id: '.$equipoLocal_id.'<br />';
        echo 'visitante_id: '.$equipoVisitante_id.'<br />';
        echo 'local: '.$local.'<br />';
        echo 'visitante: '.$visitante.'<br />';
        echo 'clasificado: '.$clasificado.'<br />';
        echo 'fecha: '.$fecha.'<br />';
        echo 'hora: '.$hora_prevista.'<br />';
        echo 'hora real: '.$hora_real.'<br />';
        echo 'jornada: '.$jda.'<br />';
        echo 'nombre_jornada: '.$nombre_jornada.'<br />';
        echo 'estado_partido: '.$estado_partido.'<br />';
        echo 'observaciones: '.$observaciones.'<br />';
        echo 'codigo_acta: '.$codigo_acta.'<br />';
        echo 'codigo_campo: '.$codigo_campo.'<br />';
        echo 'estadio: '.$estadio.'<br />';
        echo 'arbitro: '.$arbitro.'<br />';
        echo 'grupo_id: '.$grupo_id.'<br />';
        echo '<hr />';
        die;       
        
$sql="SELECT id FROM partido WHERE grupo_id=".$grupo_id." AND equipoLocal_id=".$equipoLocal_id." AND equipoVisitante_id=".$equipoVisitante_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (count($resultado)==0){
            $sql='INSERT INTO partido(comunidad_id,fecha, hora_prevista, hora_real, goles_local, goles_visitante, jornada, nombre_jornada, equipoLocal_id, equipoVisitante_id, clasificado, local, visitante, observaciones, arbitro, estadio, grupo_id, codigo_acta, codigo_campo, estado_partido) VALUES ("'.$i.'", "'.$fecha.'", "'.$hora_prevista.'", "'.$hora_real.'", "'.$goles_local.'", "'.$goles_visitante.'", "'.$jda.'", "'.$nombre_jornada.'", "'.$equipoLocal_id.'", "'.$equipoVisitante_id.'", "'.$clasificado.'", "'.$local.'", "'.$visitante.'", "'.$observaciones.'", "'.$arbitro.'", "'.$estadio.'", "'.$grupo_id.'", "'.$codigo_acta.'", "'.$codigo_campo.'", "'.$estado_partido.'")';
            $mysqli = conectar();
            mysqli_query($mysqli, $sql);
            echo $sql.'<br />';
            echo "Partido insertado<br />"; 
        } else { 
            echo "Este partido ya esta grabado<br />"; 
        }
?>