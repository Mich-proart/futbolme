<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);

include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_GET['comunidad_id'];
$competicion=$_GET['competicion'];
$grupo=$_GET['grupo'];
require_once '../funciones/urlFederaciones.php';
$url.='CodCompeticion='.$competicion.'&CodGrupo='.$grupo;
echo '<a href="'.$url.'" target="_blank">Federacion</a> - 
<a href="gruposSelect.php?comunidad_id='.$comunidad_id.'&territorial='.$territorial.'&competicion='.$competicion.'" target="_blank">Refuerzo</a>';
require_once '../funciones/getPage.php';
if ($fallo==0){
	include('../_mifutbol/jornadas.php'); 

	

	if (isset($datos) && count($datos)>0){
		$file = '../../federacion/'.$territorial.'/jornadas/'.$grupo.'-jornadas.json';
		guardarJSON($datos, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);
	} else { 
		echo '<hr />'.$url.'<hr />';
		echo 'La carga ha fallado. Vuelvelo a intentar pasados unos minutos';

	}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
//echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
//echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>