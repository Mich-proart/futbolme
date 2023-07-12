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
$urlCalendario.='&codcompeticion='.$competicion.'&codgrupo='.$grupo;
$url=$urlCalendario;

if ($modo==0){
echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';
echo $url.'<br />';
}

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
    if ($modo==0){echo 'reiniciados los proxis<br />';} 
}	
$fallo=1;

$existe=0;
$file2 = '../../federacion/'.$territorial.'/calendarios/'.$grupo.'-parCalendario.json';
if (@file_exists($file2)) { 		
	$fallo=0; $existe=1; echo '<br />Fallo: '.$fallo.' - Ya existe el fichero parCalendario.<br />';
	$json = file_get_contents($file2);
	$datos = json_decode($json, true);
} else {

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
}

if ($modo==0){echo '<br />Fallo: '.$fallo.'<br />';}
if ($fallo==0){
	
	if ($existe==0){ include('../_mifutbol/partidos.php'); }

	$fequipos = '../../federacion/'.$territorial.'/equipos/'.$grupo.'-equipos.json';
	if (@file_exists($fequipos)) { 
		$json = file_get_contents($fequipos);
		$equiposTorneo = json_decode($json, true);
	}

	

	$partidos=array();

	if (isset($datos) && count($datos)>0){

	  foreach ($datos as $key => $value) {

	  
      $jornada=$value['jornada'];
      $f=$value['fecha'];
      $f=explode('-', $f);$f=str_replace('(', '', $f);$f=str_replace(')', '', $f);
      $fecha=$f[2].'-'.$f[1].'-'.$f[0];
      foreach ($value['partidos'] as $k => $v) {
          $local_id=0;$visitante_id=0;$eLocal=''; $eVisitante='';
          foreach ($equiposTorneo as $k1 => $v1) { 

            $v1['equipo']=str_replace('&nbsp;', '', $v1['equipo']);           
            $v1['equipo']=str_replace(' A ', 'A', $v1['equipo']);

            $v['local']=str_replace('&nbsp;', '', $v['local']);
            $v['local']=str_replace(' A ', 'A', $v['local']);

            $v['visitante']=str_replace('&nbsp;', '', $v['visitante']);
            $v['visitante']=str_replace(' A ', 'A', $v['visitante']);

            $v1['equipo']=str_replace(' B ', 'B', $v1['equipo']);
			$v['local']=str_replace(' B ', 'B', $v['local']);
			$v['visitante']=str_replace(' B ', 'B', $v['visitante']);
			$v1['equipo']=str_replace(' C ', 'C', $v1['equipo']);
			$v['local']=str_replace(' C ', 'C', $v['local']);
			$v['visitante']=str_replace(' C ', 'C', $v['visitante']);
			$v1['equipo']=str_replace(' D ', 'D', $v1['equipo']);
			$v['local']=str_replace(' D ', 'D', $v['local']);
			$v['visitante']=str_replace(' D ', 'D', $v['visitante']);
			$v1['equipo']=str_replace(' E ', 'E', $v1['equipo']);
			$v['local']=str_replace(' E ', 'E', $v['local']);
			$v['visitante']=str_replace(' E ', 'E', $v['visitante']);
			$v1['equipo']=str_replace(' F ', 'F', $v1['equipo']);
			$v['local']=str_replace(' F ', 'F', $v['local']);
			$v['visitante']=str_replace(' F ', 'F', $v['visitante']);
			$v1['equipo']=str_replace(' G ', 'G', $v1['equipo']);
			$v['local']=str_replace(' G ', 'G', $v['local']);
			$v['visitante']=str_replace(' G ', 'G', $v['visitante']);
			$v1['equipo']=str_replace(' H ', 'H', $v1['equipo']);
			$v['local']=str_replace(' H ', 'H', $v['local']);
			$v['visitante']=str_replace(' H ', 'H', $v['visitante']);
			$v1['equipo']=str_replace(' I ', 'I', $v1['equipo']);
			$v['local']=str_replace(' I ', 'I', $v['local']);
			$v['visitante']=str_replace(' I ', 'I', $v['visitante']);



            if(trim($v1['equipo'])==trim($v['local']) ) {
              $eLocal=$v1['equipo'];
              $local_id=$v1['id'];
            }

            if(trim($v1['equipo'])==trim($v['visitante']) ) {
              $eVisitante=$v1['equipo'];
              $visitante_id=$v1['id'];
            }
          }

          $partidos[$key][$k]['jornada']=$jornada;
          $partidos[$key][$k]['fecha']=$fecha;
          $partidos[$key][$k]['local']=$eLocal;
          $partidos[$key][$k]['visitante']=$eVisitante;
          $partidos[$key][$k]['local_id']=$local_id;
          $partidos[$key][$k]['visitante_id']=$visitante_id; 
        }
             
      } //partidos

      $file2 = '../../federacion/'.$territorial.'/calendarios/'.$grupo.'-parCalendario.json';
	  guardarJSON($datos, $file2);

	  

		$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo.'-partidos.json';
		guardarJSON($partidos, $file);

		

		echo 'Guardado '.$file.'<br />';
		unset($datos);unset($partidos);

	} else { echo 'La carga ha fallado. Vuelvelo a intentar pasados unos minutos';}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
//echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
//echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>