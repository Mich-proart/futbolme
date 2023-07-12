<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$partidos=count($_POST['id']);




if (!is_array($_POST['id'])) { 
    $_p=$_POST;
    unset($_POST);
    $_POST['id'][0]=$_p['id'];
    $_POST['estado_partido'][0]=$_p['estado_partido'];
    $_POST['hora_prevista'][0]=$_p['hora_prevista'];
    $_POST['hora_real'][0]=$_p['hora_real'];
    $_POST['goles_local'][0]=$_p['goles_local'];
    $_POST['goles_visitante'][0]=$_p['goles_visitante'];
    $_POST['temporada_id'][0]=$_p['temporada_id'];
    $_POST['fecha'][0]=$_p['fecha'];
    $_POST['jornada'][0]=$_p['jornada'];
    $_POST['equipoLocal_id'][0]=$_p['equipoLocal_id'];
    $_POST['local'][0]=$_p['local'];
    $_POST['equipoVisitante_id'][0]=$_p['equipoVisitante_id'];
    $_POST['visitante'][0]=$_p['visitante'];
    $_POST['or_estado_partido'][0]=$_p['or_estado_partido'];
    $_POST['or_hora_prevista'][0]=$_p['or_hora_prevista'];
    $_POST['or_goles_local'][0]=$_p['or_goles_local'];
    $_POST['or_goles_visitante'][0]=$_p['or_goles_visitante'];
}

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
die;
*/


for ($i=0; $i < $partidos; $i++) {

    $partido=array();

    $partido['partido_id']=$_POST['id'][$i]; 
    $partido['estado_partido']=$_POST['estado_partido'][$i]; 
    $partido['hora_prevista']=$_POST['hora_prevista'][$i]; 
    $partido['hora_real']=$_POST['hora_real'][$i]??'00:00:11'; 
    $partido['goles_local']=$_POST['goles_local'][$i];  
    $partido['goles_visitante']=$_POST['goles_visitante'][$i];  
    $partido['temporada_id']=$_POST['temporada_id'][$i]; 
    $partido['fecha']=$_POST['fecha'][$i];  
    $partido['jornada']=$_POST['jornada'][$i];  
    $partido['equipoLocal_id']=$_POST['equipoLocal_id'][$i];  
    $partido['local']=$_POST['local'][$i];  
    $partido['equipoVisitante_id']=$_POST['equipoVisitante_id'][$i];  
    $partido['visitante']=$_POST['visitante'][$i];

    //aqui hay que enviar el comentario, con 3 partes parte-minuto-prolongacion
    $partido['comentario']=$comentario??'';

    $ep=$_POST['or_estado_partido'][$i];
    $hp=$_POST['or_hora_prevista'][$i];
    $gl=$_POST['or_goles_local'][$i];
    $gv=$_POST['or_goles_visitante'][$i];

    

    $evento=0;
    if ($_POST['estado_partido'][$i] != $ep) {
        if (1 == $_POST['estado_partido'][$i]) { $evento = 13;} // (FINAL)
        if (6 == $_POST['estado_partido'][$i]) { $evento = 8;} // (descanso)
        if (7 == $_POST['estado_partido'][$i]) { $evento = 20;}//penaltis
        if (8 == $_POST['estado_partido'][$i]) { $evento = 21;}//prorroga
        if (9 == $_POST['estado_partido'][$i]) { $evento = 22;}//1t prorroga
        if (11 == $_POST['estado_partido'][$i]) { $evento = 23;}//descanso prorroga
        if (10 == $_POST['estado_partido'][$i]) { $evento = 24;}//2t prorroga
        if (6 == $ep && $_POST['estado_partido'][$i]==2) { $evento = 9;} // inicia 2ª parte
        if (0 == $ep && $_POST['estado_partido'][$i]==2) { $evento = 7;} // inicia el partido
    }

    var_dump($gl);
    var_dump($_POST['goles_local'][$i]);

    
    if ((int)$_POST['estado_partido'][$i]==2){
        if ((int)$_POST['goles_local'][$i] != (int)$gl && (int)$gl<(int)$_POST['goles_local'][$i]) { $evento = 5; } //gol local
        if ((int)$_POST['goles_visitante'][$i] != (int)$gv && (int)$gv<(int)$_POST['goles_visitante'][$i]) { $evento = 6; } // gol visitante

        if (5 == $evento || 6 == $evento) {
            $file = '../../json/temporada/'.$_POST['temporada_id'][$i].'/tipo.json';
            unlink($file);
            $file = '../../json/temporada/'.$_POST['temporada_id'][$i].'/partidosActiva.json';
            unlink($file);
        }
    }

    


    $partido['evento']=$evento; 

    insertarMovimiento($partido);

    unset($partido);
}
//$partido_ida=$resultado[0][0];

