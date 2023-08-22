<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqliFM = conectarFM();
$sq='SELECT id,futbolbase_id FROM club WHERE territorialRFEF="05" AND futbolbase_id>0 AND origen_id IS NULL ORDER BY id LIMIT 1';
$resultadoSQL = mysqli_query($mysqliFM, $sq);
$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

if (count($fed)==0){ die('FINALIZADO'); }
$futbolbase_id=$fed['futbolbase_id'];
$club_id=$fed['id']; 

$url='http://www.ffm.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club='.$futbolbase_id;
echo $url.'<br />';




$mysqli = conectar();
 
$sql='SELECT id,ip FROM proxis WHERE uso<8 AND fallo<3 ORDER BY uso DESC, fallo LIMIT 5';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

if (count($proxis)<5){
	$sql='UPDATE proxis SET uso=0, fallo=0';
	mysqli_query($mysqli, $sql);
}

imp($proxis);
$fallo=0;

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
		if ($totalProxis==0){ $fallo=1;break; }
	}
	//var_export($content);
	if ($fallo==0){
		$sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
		mysqli_query($mysqli, $sql); 

		$string = str_get_html($content);
		$html->load($string);
		$datos=array();
		$equipos=array();
	    
	    foreach($html->find('h5') as $k => $e){
	    	$datos[$k]['valor'] = $e->plaintext;
	    	if ($k>18){ break; }
	    }

	    foreach($html->find('h5.bold') as $k => $e){
	    	$equipos[$k]['url'] = trim($e->find('a', 0)->href);
	    	$equipos[$k]['equipo'] = trim($e->find('a', 0)->plaintext);  
	    }

	    foreach($html->find('h5.list-group-item-text') as $k => $e){
	    	$equipos[$k]['torneo'] = $e->plaintext;
	    }
	    
	    
	    $todo['datos']=$datos;
	    $todo['equipos']=$equipos;

	    imp($todo);
	    
		$file = $club_id.'_datos.json';
	    guardarJSON($todo, $file);	

	    $sq='UPDATE club SET origen_id=1 WHERE id='.$club_id;
	    echo $sq.'<br />';
		mysqli_query($mysqliFM, $sq);
		

		$html->clear();
	    unset($html);
	}

 

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$timezone = new DateTimeZone('Europe/Madrid');
$currentTime = new DateTime('now', $timezone);
echo '<br />La hora actual en el servidor es: '.$currentTime->format('H:i:s');;
?>
<script LANGUAGE="JavaScript"> 
var pagina="_aPruebaEquipos.php"; 

function redireccionar() 
{ 
location.href=pagina 
} 
setTimeout ("redireccionar()", 5000); 
</script> 
