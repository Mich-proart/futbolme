<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
$link=conectar();

    $fecha_nacimiento = ('' != $_POST['jugador_fecha_nacimiento']) ? "'".$_POST['jugador_fecha_nacimiento']."'" : 'NULL';
    $dorsal = ('' != $_POST['jugador_dorsal']) ? "'".$_POST['jugador_dorsal']."'" : 'NULL';
    $altura = ('' != $_POST['jugador_altura']) ? "'".$_POST['jugador_altura']."'" : 'NULL';
    $peso = ('' != $_POST['jugador_peso']) ? "'".$_POST['jugador_peso']."'" : 'NULL';
    $consulta = "UPDATE jugador SET nombre = '".$_POST['jugador_nombre']."', 
					apodo = '".$_POST['jugador_apodo']."', 
					posicion = '".$_POST['jugador_posicion']."', 
					dorsal = ".$dorsal.', 
					altura = '.$altura.', 
					peso = '.$peso.', 
					fecha_nacimiento = '.$fecha_nacimiento.", 
					lugar_nacimiento = '".$_POST['jugador_lugar_nacimiento']."', 
					pais_id = ".$_POST['jugador_pais_id'].', 
					es_baja = '.$_POST['jugador_baja'].', 
					es_fichaje = '.$_POST['jugador_fichaje'].", 
					caracteristicas = '".$_POST['jugador_caracteristicas']."', 
					palmares = '".$_POST['jugador_palmares']."',
					slug = '".$_POST['procedencia']."'
					WHERE id=".$_POST['jugador_id'];

    //echo $consulta;

    if (!mysqli_query($link, $consulta)) {
        echo $consulta;
        printf("Errormessage: %s\n", mysqli_error($link));
        exit;
    } else { echo 'Registro modificado correctamente'; }

?>