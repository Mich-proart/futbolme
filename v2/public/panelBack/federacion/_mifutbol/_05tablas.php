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
$variables='&CodCompeticion='.$competicion.'&CodGrupo='.$grupo;
$url=str_replace('xxx', $variables, $urlj1);
echo '<a href="'.$url.'" target="_blank">Federacion</a> - 
<a href="gruposSelect.php?comunidad_id='.$comunidad_id.'&territorial='.$territorial.'&competicion='.$competicion.'" target="_blank">Refuerzo</a>';
require_once '../funciones/getPage.php';

if ($fallo==0){
	include('../_mifutbol/jornada.php');

	$dd=array();
	$k=0;
	foreach ($datos['partidos'] as $key => $value) {		
		$dd[$k]['url']=$value['url_local'];
        $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
        $dd[$k]['id']=$id;
        $dd[$k]['equipo']=$value['local'];
        $dd[$k]['club']=$value['escudo_local'];
        $k++;
        $dd[$k]['url']=$value['url_visitante'];
        $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
        $dd[$k]['id']=$id;
        $dd[$k]['equipo']=$value['visitante'];
        $dd[$k]['club']=$value['escudo_visitante'];
        $k++;
	}

	if (isset($dd) && count($dd)>0){
		$file = '../../federacion/'.$territorial.'/equipos/'.$grupo.'-equipos.json';
		guardarJSON($dd, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);unset($dd);
	} else { echo 'La carga ha fallado. Vuelvelo a intentar pasados unos minutos';}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
//echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
//echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>