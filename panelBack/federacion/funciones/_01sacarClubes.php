<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$pageLineas=800;

$comunidad_id=$_GET['comunidad_id'];
require_once 'urlFederaciones.php';

$url=$urlClubes.$pageLineas;

echo $url.'<br />';

die('<h4>comentar esta linea para ejecutar el script</h4>');

$mysqli = conectar(); 
$sql='SELECT id,ip FROM proxis WHERE fallo<5 ORDER BY uso DESC, fallo LIMIT 5';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

imp($proxis);


	foreach ($proxis as $key => $value) {

		$proxi=$value['ip'];
		$id_proxi=$value['id'];
		imp($proxi);
		imp($id_proxi);

		
		$html = new simple_html_dom();
		$content=getPage($url,$proxi,$id_proxi); 

		
		if (strlen($content)>1000) { break; }
		$sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
		mysqli_query($mysqli, $sql); 
		unset($proxis[$key]);
		unset($proxi);
		unset($id_proxi);
		$html->clear();
    	unset($html);  

		$totalProxis=count($proxis);
		echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
	}
	//var_export($content);
	$sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
	mysqli_query($mysqli, $sql); 

	$string = str_get_html($content);

	$string = str_get_html($content);
	$html->load($string);
	$clubes=array();

    $contador=0;
    /*// andalucia - cantabria
    foreach($html->find('table[width=98%]') as $key => $tr){ 
    	//echo $tr; 
    	foreach($tr->find('tr') as $k => $e) {
    		$clubes[$k]['codigo'] = trim($e->find('td.fondolistados', 0)->plaintext);
	        $clubes[$k]['nombre'] = trim($e->find('a', 0)->href);   
	        $clubes[$k]['club'] = trim($e->find('a', 0)->plaintext);
	        $clubes[$k]['localidad'] = trim($e->find('td.fondolistados', 2)->plaintext);
	        $clubes[$k]['provincia'] = trim($e->find('td.fondolistados', 3)->plaintext);
	        $clubes[$k]['equipos'] = trim($e->find('td.fondolistadoscierre', 0)->plaintext);  
    	}  
    } */

    
    // madrid, catalunya, galicia, murcia, extremadura, rioja, aragon, extremadura, rioja
    foreach($html->find('table.table-striped') as $key => $tr){ 
    	//echo $tr;
    	foreach($tr->find('tr') as $k => $e) {
    		$clubes[$k]['codigo'] = trim($e->find('td', 1)->plaintext);
	        $clubes[$k]['nombre'] = trim($e->find('a', 0)->href);   
	        $clubes[$k]['club'] = trim($e->find('a', 0)->plaintext);
	        $clubes[$k]['localidad'] = trim($e->find('td', 3)->plaintext);
	        $clubes[$k]['provincia'] = trim($e->find('td', 4)->plaintext);
	        $clubes[$k]['equipos'] = trim($e->find('td', 5)->plaintext);  
    	}    
    } 

    
    imp($clubes);
    echo 'Se han exportado '.count($clubes).' clubes<br />';
    
    

	$file = '../../federacion/'.$territorial.'/clubes'.$page.'.json';
	//$file = '../../federacion/'.$territorial.'/clubes.json';
	echo $file.'<br />';
	
    guardarJSON($clubes, $file);	
	

	$html->clear();
    unset($html);

   
	

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

die;
?>

