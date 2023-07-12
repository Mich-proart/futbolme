<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$mysqli = conectar();
   

foreach ($_POST['id'] as $key => $value) {
	$consulta = 'UPDATE equipo SET 
	nombre="'.$_POST['nombre'][$key].'",
	nombreCorto="'.$_POST['nombreCorto'][$key].'",
	slug="'.$_POST['slug'][$key].'",
	codigoRFEF="'.$_POST['codigoRFEF'][$key].'",
	federacion_id="'.$_POST['federacion_id'][$key].'"
	WHERE id='.$value;
	mysqli_query($mysqli, $consulta);
	echo $consulta.'<br />';
}

die;


               
   
?>

			
