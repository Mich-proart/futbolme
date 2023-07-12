<?php

$temporada_id=1;

$file = '../../json/temporada/'.$temporada_id.'/tipo.json';
$data = '../../json/temporada/'.$temporada_id.'/data.json';

$r = file_get_contents($file);
$datos = json_decode($r, true);

$resultadoX['torneo']['actualizado']=date('d-m-Y h:i:s');
$resultadoX['torneo']['nombre']=$datos['torneo']['nombre'];
$resultadoX['torneo']['jornadas']=$datos['torneo']['jornadas'];
$resultadoX['torneo']['jornadaActiva']=$datos['torneo']['jornadaActiva'];

foreach ($datos['clasificacion']['clasificacionFinal'] as $key => $vx) {
    unset($vx['css']);
    unset($vx['equipo_id']);
    unset($vx['club_id']);
    unset($vx['nombreCorto']);
    $resultadoX['clasificacion'][$vx['posicion']]=$vx;
}


foreach ($datos['partidos'] as $k1 => $v1) {


    /*echo '<pre>';
    print_r($v1);
    echo '</pre>';
    die;
    */
    
    $partido=array();
    $partido['id']=$v1['id'];
    $partido['estado']=$v1['estado_partido'];
    $partido['jornada']=$v1['jornada'];
    $partido['fecha']=$v1['fecha'];
    $partido['hora']=$v1['hora_prevista'];
    $partido['g_local']=$v1['goles_local'];
    $partido['g_visitante']=$v1['goles_visitante'];
    $partido['local']=$v1['local'];
    $partido['visitante']=$v1['visitante'];
    $partido['equipoLocal_id']=$v1['equipoLocal_id'];
    $partido['equipoVisitante_id']=$v1['equipoVisitante_id'];
    

    $texto=$v1['observaciones'];        
    $txt2 = '';
    $txt1 = '';
    $texto = explode('*', $texto);
    $valores = count($texto);
    //  echo "<br />valores: ".$valores;
    if (1 == $valores) {            
        $txt1 = '';
        $txt2 = '';
    }
    if (2 == $valores) {
        $t = $texto[1];
        $l = substr($t, 0, 1);
        if ('A' == $l) {
            $txt1 = substr($t, 1);
            $txt2 = '';
        } else {
            $txt2 = substr($t, 1);
            $txt1 = '';
        }
        
    }
    if (3 == $valores) {
        $txt1 = substr($texto[1], 1);
        $txt2 = substr($texto[2], 1);
    }

    $texto[1] = explode('<br />',$txt1);
    $texto[2] = explode('<br />',$txt2);

    

    $goleadores=array();
    foreach ($texto as $k => $v) {
        if ($k==1){
            foreach ($v as $k2 => $v2) {
                if (!empty($v2)){                    
                    $d=explode(',',$v2);
                    if (isset($d[1])){
                    $res=$d[1];$res=trim($res);
                    $d1=explode(' - ',$d[0]);
                    $min=$d1[0];$jug=$d1[1];
                    $jug=strip_tags($jug);
                    
                        $goleadores['local'][$res]['minuto']=$min;
                        $goleadores['local'][$res]['jugador']=$jug;
                    }
                    
                }
            }
        }
        if ($k==2){
            foreach ($v as $k2 => $v2) {
                if (!empty($v2)){
                    $d=explode(',',$v2);
                    if (isset($d[0]) && !empty($d[0])){
                    $res=$d[0];$res=trim($res);
                        if (!empty($res)){                    
                            $d1=explode(' - ',$d[1]);
                            $jug=$d1[0];$min=$d1[1];
                            $jug=strip_tags($jug); 
                        
                            $goleadores['visitante'][$res]['minuto']=$min;
                            $goleadores['visitante'][$res]['jugador']=$jug;
                        } 
                    }
                }
            }
        }
    }

    $partido['goleadores']=$goleadores;

    $resultadoX['partidos'][$v1['jornada']][]=$partido;    
}

//imp($resultadoX['partidos'][$resultadoX['torneo']['jornadaActiva']]);

$campos = 'count(g.id) goles, g.jugador_id, j.apodo jugador, e.nombre equipo, e.id equipo_id, e.nombreCorto equipoCorto';
        $tabla = ' gol g';

        $union = ' INNER JOIN jugador j ON g.jugador_id=j.id';
        $union2 = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
        $condicion = ' WHERE g.temporada_id='.$temporada_id.' AND tipo<10 ';
        $orden = ' GROUP BY g.jugador_id,e.id ORDER BY count(g.id) DESC';
        $sql = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        foreach ($resultado as $key => $vx) {
            $resultadoX['goleadores'][$key]['goles']=$vx['goles'];
            $resultadoX['goleadores'][$key]['jugador']=$vx['jugador'];
            $resultadoX['goleadores'][$key]['equipo']=$vx['equipo'];
            // code...
        }


guardarJSON($resultadoX, $data);

echo 'Guardado...'.$data.'<br />';
?>