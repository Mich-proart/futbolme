<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);

include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_POST['comunidad_id'];
require_once '../funciones/urlFederaciones.php';
echo ' - <a href="'.$url.'" target="_blank">ver</a><hr />';
require_once '../funciones/getPage.php';	 



if ($fallo==0){
	include('../_mifutbol/campeonatos.php'); 

	if (isset($datos)){
		$file = '../../federacion/'.$territorial.'/campeonatos.json';
		guardarJSON($datos, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);
	}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>