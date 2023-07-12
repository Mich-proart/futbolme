<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

$competicion_id=$_GET['c'];
$grupo_id=$_GET['g'];
$comunidad_id=$_GET['cm'];
$fase_id=$_GET['f'];
$id=$_GET['t'];



require_once 'urlFederaciones.php';
$urlBase=$url; unset($url);

echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';
echo $urlBase.'<hr />';

$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-jornadas.json';

imp($file);
$jornada_inicio=1;

$equipos=array();

$salir=0;

for ($jda=$jornada_inicio; $jda < 39; $jda++) {

	
	$url=$urlBase.'id_competicion='.$competicion_id.'&id_fase='.$fase_id.'&id_grupo='.$grupo_id.'&jornada='.$jda;
	echo $url.'<br />';	 
	
	//die;

	$sql='DELETE FROM proxis WHERE uso=0 AND mantener=0 AND fallo>1';
	echo $sql.'<br/>';
	mysqli_query($mysqli, $sql);

	
	 
	$sql='SELECT id,ip,uso FROM proxis WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
	$resultadoSQL = mysqli_query($mysqli, $sql);
	$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

	$proxis = array_reverse($proxis);

	if (count($proxis)<5){
	    $sql='UPDATE proxis SET uso=0, fallo=0';
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
			$content=getPage($url,$proxi,$id_proxi); 

			
			if (strlen($content)>1000) { $fallo=0; break; }
			$sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
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

		//var_export($content);
		
		
		if ($fallo==0){
			$sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
			mysqli_query($mysqli, $sql); 
			
			include('../../simple/'.$carpeta.'/edpISQUAD.php');
			
			imp($partidosJson);

			if (isset($nJor)){
				if (isset($partidosJson)){
					$partidosJornada[$jda]=$partidosJson;
					unset($partidosJson);				
					$html->clear();
				    unset($html);
				    imp($partidosJornada[$jda]);
					foreach ($partidosJornada[$jda] as $vE) {
						if ($vE['equipoLocal_id']>0 && $vE['equipoVisitante_id']>0){
							$equipos[$vE['equipoLocal_id']]['id']=$vE['equipoLocal_id'];
							$equipos[$vE['equipoLocal_id']]['equipo']=$vE['local'];
							$equipos[$vE['equipoVisitante_id']]['id']=$vE['equipoVisitante_id'];
							$equipos[$vE['equipoVisitante_id']]['equipo']=$vE['visitante'];
						}
					}					
					
					imp($equipos);

					if ($jda==$nJor && $jda>0){ $salir=1; }

				} else {
					$jda=$jda-1;
				}				
			}

		} else {
			$jda=$jda-1;
		}		

if ($jda<0){ $jda=0; }		

imp('jornada '.$jda.' - Salir: '.$salir);

if ($jda==2){ break; }


if ($salir==1){ break;}			
		
} // del for. 


//$file = $territorial.'-'.$grupo_id.'-jornadas.json';
if (isset($partidosJornada)){
	guardarJSON($partidosJornada, $file);
	$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-equipos.json';
	guardarJSON($equipos, $file);
	$sql='UPDATE torneo SET jornadas='.count($partidosJornada).'  WHERE id='.$id;
	mysqli_query($mysqli, $sql);
	unset($partidosJornada);
	unset($equipos);
}



$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>