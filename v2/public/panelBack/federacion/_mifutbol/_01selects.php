<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);

include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_GET['comunidad_id'];


require_once '../funciones/urlFederaciones.php';
$competicion=$_GET['competicion'];
if ($comunidad_id==2){
	$url.='id_competicion='.$competicion;
} else {
	$url.='CodCompeticion='.$competicion;
}

echo '<a href="'.$url.'" target="_blank">Federacion</a> - 
<a href="gruposSelect.php?comunidad_id='.$comunidad_id.'&territorial='.$territorial.'&competicion='.$competicion.'" target="_blank">Refuerzo</a>';
require_once '../funciones/getPage.php';



if ($fallo==0){
	include('../_mifutbol/grupos.php'); 

	if (isset($datos) && count($datos)>0){
		imp($datos);
		$file = '../../federacion/'.$territorial.'/'.$competicion.'-grupos.json';
		guardarJSON($datos, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);
	} else {
		echo 'No se han recibido datos en esta llamada.';
	}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>