<?php 
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

$registros=count($_POST['categoria_torneo_id']);

$comunidad_id=$_POST['comunidad_id'];

for ($i=0; $i < $registros; $i++) { 


	$sql='INSERT INTO  torneo (categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, orden, tipo_torneo) 
	VALUES ('.$_POST['categoria_torneo_id'][$i].','.$_POST['categoria_id'][$i].','.$_POST['fase'][$i].','.$_POST['competicion'][$i].',
	'.$_POST['grupo'][$i].','.$comunidad_id.',"'.$_POST['nombre'][$i].'",'.($_POST['orden'][$i]+($i*100)).','.$_POST['tipo_torneo'][$i].')';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';
}


header('Location:/panelBack/federacion/_mifutbol/');



?>