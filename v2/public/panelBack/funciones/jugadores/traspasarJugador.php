<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
$link=conectar();

    


    if ($_POST['jugador_fichaje']==1){

        imp($_POST);

        $sql='SELECT e.nombreCorto, te.temporada_id FROM equipo e 
        INNER JOIN temporada_equipo te ON te.equipo_id=e.id 
        WHERE e.id='.$_POST['equipoNuevo_id'].' AND te.grupo=1';
        $resultadoSQL = mysqli_query($link, $sql);
        //echo $sql;
        $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (!empty($r)){
            if (($r['temporada_id']>0 && $r['temporada_id']<3) || ($r['temporada_id']>3054 && $r['temporada_id']<3062) || $r['temporada_id']==214){
                imp($r);

                switch ($_POST['posicion']) {
                    case '1':$pos='portero';break;
                    case '2':$pos='defensa';break;
                    case '3':$pos='centrocampista';break;
                    case '4':$pos='delantero';break;
                    case '5':$pos='entrenador';break;
                    default: $pos='';break;
                }
                $txt='Nuevo fichaje del '.$r['nombreCorto']." \n";
                $txt.='El '.$r['nombreCorto'].' incorpora al '.$pos.' '.$_POST['nombre_jugador'].' ('.$_POST['apodo'].')';

                if (strlen($_POST['procedencia_fichaje']) > 0) {  
                    $txt.=', procedente del '.$_POST['procedencia_fichaje'].'.';  
                } else {
                    $txt.=', procedente del '.$_POST['nombre_equipo'].'.';
                }

                echo $txt;

                $_GET['sendMessage']=1;
                $_GET['id_chat']=XidChat($r['temporada_id']);
                $_GET['txt']=$txt;
                //imp($array);
                //imp($_GET);
                include('../../chatapi/acceso.php');
                
            }
            
        }
    }

    



    if (strlen($_POST['procedencia_fichaje']) > 0) {
        $consulta = 'UPDATE jugador SET es_baja=0, fecha_modificacion=NOW(),  
			es_fichaje='.$_POST['jugador_fichaje'].",
			slug='".$_POST['procedencia_fichaje']."',
			equipoActual_id=".$_POST['equipoNuevo_id'].'
			 WHERE id='.$_POST['jugador_id'];
    } else {
        $consulta = 'UPDATE jugador SET es_baja=0, fecha_modificacion=NOW(), 
			es_fichaje='.$_POST['jugador_fichaje'].',
			equipoActual_id='.$_POST['equipoNuevo_id'].'
			 WHERE id='.$_POST['jugador_id'];
    }

    if (!mysqli_query($link, $consulta)) {
        echo $consulta;
        printf("Errormessage: %s\n", mysqli_error($link));
        exit;
    } else { echo 'Traspaso realizado correctamente'; }


?>