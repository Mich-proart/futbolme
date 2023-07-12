<?php

//partido para  futbolme

		/*
		echo '<hr />temporada_id: '.$temporada_id.'<br />';
        echo 'goles_local: '.$goles_local.'<br />';
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
        echo '<hr />';*/

        $sq1='SELECT id FROM equipo WHERE federacion_id='.$equipoLocal_id;
        $resultadoSQL = mysqli_query($mysqliFM, $sq1);
    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    	$equipoLocal_id=$r['id'];

    	$sq2='SELECT id FROM equipo WHERE federacion_id='.$equipoVisitante_id;
        $resultadoSQL = mysqli_query($mysqliFM, $sq2);
    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    	$equipoVisitante_id=$r['id'];
        

            $sql='UPDATE partido SET estado_partido='.$estado_partido.', fecha="'.$fecha.'", hora_prevista="'.$hora_prevista.'", observaciones="'.$observaciones.'", goles_local='.$goles_local.', goles_visitante='.$goles_visitante.' WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$equipoLocal_id.' AND equipoVisitante_id='.$equipoVisitante_id.' AND jornada='.$jda;
            mysqli_query($mysqliFM, $sql);
            echo $sql.'<br />';
            echo "Partido modificado<br />"; 
        

?>