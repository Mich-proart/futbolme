<?php
define('_PANEL_', 1);
require_once 'includes/config.php'; //include funciones,consultas, post y fechas
imp($_POST);
   

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

			
