<?php

$whatsapp=array();

        /*estado_partido='.$fila['estado_partido'].',
        fecha="'.$fila['fecha'].'",
        hora_prevista="'.$fila['hora_prevista'].'",
        hora_real="'.$fila['hora_real'].'",
        goles_local='.$fila['goles_local'].',
        goles_visitante='.$fila['goles_visitante'].',
        codigo_acta='.$fila['codigo_acta'].',
        usuario_id='.$fila['usuario_id'].'
        WHERE id='.$fila['partido_id'];*/

$comentario=$fila['comentario'].'-'.$fila['evento']; 
        

switch ($fila['evento']) {
    case '1': case '2':
       $fecha = $fila['fecha']; $hora = $fila['hora_prevista'];
       if ($hora && '00:00:11' != $hora) {
           $h = ' - '.substr($hora, 0, 5);
           $fila['valor'] = 'Fecha-hora';
       } else {
           $h = '';
           $fila['valor'] = 'Fecha';
       }
        $leyenda = utf8_encode(nombreDiaMini($fecha));
        $fila['resultado'] = $leyenda.$h;
       break;
   case '3':
       //para el arbitro
       break;
    case '5': $fila['valor'] = '¡¡ GOL !! '.$fila['local']; break;
    case '6': $fila['valor'] = '¡¡ GOL !! '.$fila['visitante']; break;
    case '7': $fila['valor'] = 'Comienza el partido...'; break;
    case '8': $fila['valor'] = 'Descanso'; break;
    case '9': $fila['valor'] = 'Inicia la segunda parte...'; break;
    case '13': $fila['valor'] = '¡¡ FINAL !!'; break;
    case '21': $fila['valor'] = 'Prórroga'; break;
    case '22': $fila['valor'] = 'Prórroga - 1ª Parte '; break;
    case '23': $fila['valor'] = 'Prórroga - Descanso '; break;
    case '24': $fila['valor'] = 'Prórroga - 2ª Parte '; break;
    case '20': $fila['valor'] = 'penaltis '; break;
    case '26': //para televisados            
    break;

}


$whatsapp['resultado']=$fila['goles_local'].' - '.$fila['goles_visitante'];
$whatsapp['torneo']=$fila['nombre_torneo'];
$whatsapp['partido']=$fila['local'].' - '.$fila['visitante'];
$whatsapp['evento']=$fila['valor'];

$marcador='...';$whatsapp['marcador']='';
if (!empty($comentario)){
    $t=explode('-',$comentario);
    if (isset($t[3]) && !is_null($t[3])){ $ev=3; }
    if (!empty($t)){
        $parte='';
        if ($t[0]==1){ $parte='Primer tiempo'; }
        if ($t[0]==2){ $parte='Segundo tiempo'; }
        $tiempo='Minuto '.$t[1];
        if (isset($t[2]) && !empty($t[2])) { $tiempo=$tiempo.' + '.$t[2]; }
        $marcador=$parte.' '.$tiempo;
    }
}

if ($fila['evento']!=8 && $fila['evento']!=9 && $fila['evento']!=13 && $fila['evento']!=7 ){
    $whatsapp['marcador']=$marcador;
}



$txt=$whatsapp['torneo']." \n";
$txt.=$whatsapp['partido']." \n";
$txt.='Resultado: '.$whatsapp['resultado']." \n";
$txt.=$whatsapp['evento']." \n";                                    
$txt.=$whatsapp['marcador']." \n";

if ($fila['evento']==13) {
   $txt.='Consulta la jornada completa y la clasificación en https://futbolme.com/temporada.php?id='.$fila['temporada_id']." \n"; 
}



// aqui tengo que poner los mensajes de whatsapp.
$mysqli = conectar();




$sq='SELECT whatsapp, pais_id FROM torneo WHERE id=(select torneo_id from temporada where id='.$fila['temporada_id'].')';
$resultadoSQL = mysqli_query($mysqli, $sq);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
if (!empty($r['whatsapp'])){ 

   
    
    //un mensaje para los dos equipos.
    $_GET['sendMessage']=1;
    $_GET['id_chat']=$r['whatsapp'];
    $_GET['txt']=$txt;
    $_GET['temporada_id']=$fila['temporada_id'];
    include('../panelBack/chatapi/acceso.php');

} else {

    if ($r['pais_id']==60){




        $wLocal=$fila['equipoLocal_id'];$temporada_local=0;
        $wVisitante=$fila['equipoVisitante_id'];$temporada_visitante=0;

        $sq='SELECT te.temporada_id FROM temporada_equipo te WHERE te.equipo_id='.$wLocal.' AND te.grupo=1';
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (!empty($r)){ $temporada_local=$r['temporada_id']; }

        $sq='SELECT te.temporada_id FROM temporada_equipo te WHERE te.equipo_id='.$wVisitante.' AND te.grupo=1';
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (!empty($r)){ $temporada_visitante=$r['temporada_id']; }

        //$temporada_local=1000;
        //$temporada_visitante=1000;

        //mail('futbolme@gmail.com','Torneos - whatsapp',$txt.' - temporada_local='.$temporada_local.' - temporada_visitante='.$temporada_visitante,'futbolme@futbolme.com');

        if (($temporada_local+$temporada_visitante)>0){

           



            if ($temporada_local==$temporada_visitante){
                //un mensaje para los dos equipos.
                $_GET['sendMessage']=1;
                $_GET['temporada_id']=$temporada_local;
                $_GET['id_chat']=XidChat($temporada_local); 
                $_GET['txt']=$txt;
                include('../panelBack/chatapi/acceso.php');

            } else {

                if ($temporada_local>0){

                    $_GET['sendMessage']=1;
                    $_GET['id_chat']=XidChat($temporada_local); 
                    $_GET['temporada_id']=$temporada_local;
                    $_GET['txt']=$txt;
                    include('../panelBack/chatapi/acceso.php');

                }

                if ($temporada_visitante>0){

                    $_GET['sendMessage']=1;
                    $_GET['id_chat']=XidChat($temporada_visitante); 
                    $_GET['temporada_id']=$temporada_visitante;
                    $_GET['txt']=$txt;
                    include('../panelBack/chatapi/acceso.php');

                }

            }
        }

    } /*else { // si pais_id no es 60

        mail('futbolme@gmail.com','Extranjeros - whatsapp',$txt.' - temporada_id='.$fila['temporada_id'],'futbolme@futbolme.com');

        $nombreTorneo='Prueba';
        $_GET['sendMessage']=1;
        $_GET['id_chat']='34678558201@c.us';
        $_GET['txt']=$txt;
        include('../panelBack/chatapi/acceso.php');

    }*/

}





//fin mensajes de whatsapp.

//imp($whatsapp);
unset($whatsapp);
?>