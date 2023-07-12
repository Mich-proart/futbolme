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
              


    $partidosJson[$key]['jornada']=$jda;
    $partidosJson[$key]['local']=$local;
    $partidosJson[$key]['visitante']=$visitante;
    $partidosJson[$key]['equipoLocal_id']=$equipoLocal_id;
    $partidosJson[$key]['equipoVisitante_id']=$equipoVisitante_id;
    $partidosJson[$key]['goles_local']=$goles_local;
    $partidosJson[$key]['goles_visitante']=$goles_visitante;
    $partidosJson[$key]['fecha']=$fecha;
    $partidosJson[$key]['hora_prevista']=$hora_prevista;
    $partidosJson[$key]['estado_partido']=$estado_partido;
    $partidosJson[$key]['codigo_acta']=$codigo_acta;
    $partidosJson[$key]['observaciones']='';
    $partidosJson[$key]['grupo_id']=$grupo_id;
    $partidosJson[$key]['estado']=0;   
         



?>