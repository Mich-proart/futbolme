<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

$comunidad_id=$_GET['comunidad_id'];
$competicion=$_GET['competicion'];
$grupo=$_GET['grupo'];
$modo=$_GET['modo']??0;

require_once '../funciones/urlFederaciones.php';
$variables='&CodCompeticion='.$competicion.'&CodGrupo='.$grupo;
$url=str_replace('xxx', $variables, $urlj1);

if ($modo==0){
echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';
echo $url.'<br />';
}

$sql='DELETE FROM '.$bd.' WHERE uso=0 AND fallo>1';
//echo $sql.'<br/>';
mysqli_query($mysqli, $sql);	
	 
$sql='SELECT id,ip,uso FROM '.$bd.' WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$proxis = array_reverse($proxis);


if (count($proxis)<5){
    $sql='UPDATE '.$bd.' SET uso=0, fallo=0';
    mysqli_query($mysqli, $sql);
    if ($modo==0){echo 'reiniciados los proxis<br />'; }
}	
$fallo=1;



$html = new simple_html_dom();
$content=getPageLibre($url);

if (strlen($content)>1000) { 
	$fallo=0; echo 'conseguido independiente.<br />';
	
} else {

	foreach ($proxis as $key => $value) {
		$proxi=$value['ip'];
		$id_proxi=$value['id'];
		$uso_proxi=$value['uso'];
		//imp($proxi);
		//imp($id_proxi);
		$html = new simple_html_dom();
		//$content=getPageLibre($url,$proxi,$id_proxi); 
		$content=getPage($url,$proxi,$id_proxi); 
		if (strlen($content)>1000) { $fallo=0; break; }
		$sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
		mysqli_query($mysqli, $sql); 
		unset($proxis[$key]);
		unset($proxi);
		unset($id_proxi);
		$html->clear();
		unset($html); 
		$totalProxis=count($proxis);
		if ($modo==0){echo ' - Quedan '.($totalProxis).' proxis por usar<br />';}
		if ($totalProxis==0){ $fallo=1; break; } 
	}

}



if ($modo==0){echo '<br />Fallo: '.$fallo.'<br />';}
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