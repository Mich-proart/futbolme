<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

$comunidad_id=$_POST['comunidad_id'];

require_once '../funciones/urlFederaciones.php';

echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';
echo $url.'<hr />';



$sql='DELETE FROM '.$bd.' WHERE uso=0 AND fallo>1';
echo $sql.'<br/>';
mysqli_query($mysqli, $sql);	
	 
$sql='SELECT id,ip,uso FROM '.$bd.' WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$proxis = array_reverse($proxis);


if (count($proxis)<5){
    $sql='UPDATE '.$bd.' SET uso=0, fallo=0';
    mysqli_query($mysqli, $sql);
    echo 'reiniciados los proxis<br />'; 
}	
$fallo=1;

foreach ($proxis as $key => $value) {

	$proxi=$value['ip'];
	$id_proxi=$value['id'];
	$uso_proxi=$value['uso'];
	imp($proxi);
	imp($id_proxi);

			
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
	echo ' - Quedan '.($totalProxis).' proxis por usar<br />';
	if ($totalProxis==0){ $fallo=1; break; } 
}

echo '<br />Fallo: '.$fallo.'<br />';
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