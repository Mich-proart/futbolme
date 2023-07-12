<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);

$tiempo_inicio = microtime_float(); 

$registros=count($_POST['categoria_torneo_id']);

$comunidad_id=$_POST['comunidad_id'];

for ($i=0; $i < $registros; $i++) { 

	$sql='INSERT INTO  torneo (categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, orden, tipo_torneo) 
	VALUES ('.$_POST['categoria_torneo_id'][$i].','.$_POST['categoria_id'][$i].','.$_POST['fase'][$i].','.$_POST['competicion'][$i].',
	'.$_POST['grupo'][$i].','.$comunidad_id.',"'.$_POST['nombre'][$i].'",'.($_POST['orden'][$i]+($i*100)).','.$_POST['tipo_torneo'][$i].')';
	mysqli_query($mysqliBase, $sql);
	echo $sql.'<br />';
}


//header('Location:/panelBack/federacion/_mifutbol/');



?>