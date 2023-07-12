<?php

        /*echo '<hr />goles_local: '.$goles_local.'<br />';
        echo 'goles_visitante: '.$goles_visitante.'<br />';
        echo '<br />local_id: '.$equipoLocal_id.'<br />';
        echo 'visitante_id: '.$equipoVisitante_id.'<br />';
        echo 'local: '.$local.'<br />';
        echo 'visitante: '.$visitante.'<br />';
        echo 'fecha: '.$fecha.'<br />';
        echo 'hora: '.$hora_prevista.'<br />';
        echo 'jornada: '.$jda.'<br />';
        echo 'estado_partido: '.$estado_partido.'<br />';
        echo 'codigo_acta: '.$codigo_acta.'<br />';        
        echo 'grupo_id: '.$grupo_id.'<br />';
        echo '<hr />';*/
              


    $partidosJson[$key][$k2]['jornada']=$jda;
    $partidosJson[$key][$k2]['local']=$local;
    $partidosJson[$key][$k2]['visitante']=$visitante;
    $partidosJson[$key][$k2]['equipoLocal_id']=$equipoLocal_id;
    $partidosJson[$key][$k2]['equipoVisitante_id']=$equipoVisitante_id;
    $partidosJson[$key][$k2]['goles_local']=$goles_local;
    $partidosJson[$key][$k2]['goles_visitante']=$goles_visitante;
    $partidosJson[$key][$k2]['fecha']=$fecha;
    $partidosJson[$key][$k2]['hora_prevista']=$hora_prevista;
    $partidosJson[$key][$k2]['estado_partido']=$estado_partido;
    $partidosJson[$key][$k2]['codigo_acta']=$codigo_acta;
    $partidosJson[$key][$k2]['grupo_id']=$grupo_id;   
         



?>