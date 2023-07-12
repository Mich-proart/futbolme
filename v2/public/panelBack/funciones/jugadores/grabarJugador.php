<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
$link=conectar();

    if (isset($_POST['origen'])) {
        $_POST['nombre'] = $_POST['apodo'];
    }
    $consulta = "	
		INSERT INTO jugador (nombre, apodo, sexo, posicion, equipoActual_id, es_baja)
		VALUES 
		('".$_POST['nombre']."','".$_POST['apodo']."', 1, ".$_POST['posicion'].', '.$_POST['equipoActual_id'].',0)									
		';

    if (!$consulta = mysqli_query($link, $consulta)) {
        printf("Errormessage: %s\n", mysqli_error($link));
        exit;
    }
    if (isset($_POST['origen'])) {
        header('location:/panel/inicio.php?tipo_torneo=3');
    }
?>
