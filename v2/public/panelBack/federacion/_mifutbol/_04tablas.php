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
$urlCalendario.='&codcompeticion='.$competicion.'&codgrupo='.$grupo;
$url=$urlCalendario;
echo '<a href="'.$url.'" target="_blank">Federacion</a> - 
<a href="gruposSelect.php?comunidad_id='.$comunidad_id.'&territorial='.$territorial.'&competicion='.$competicion.'" target="_blank">Refuerzo</a>';
require_once '../funciones/getPage.php';

if ($fallo==0){
	
	include('../_mifutbol/partidos.php'); 

	$fequipos = '../../federacion/'.$territorial.'/equipos/'.$grupo.'-equipos.json';
	if (@file_exists($fequipos)) { 
		$json = file_get_contents($fequipos);
		$equiposTorneo = json_decode($json, true);
	}

	

	$partidos=array();

	if (isset($datos) && count($datos)>0){

	  foreach ($datos as $key => $value) {

	  if ($comunidad_id==5){
	  	  $jornada=$value['jornada'];
	      $f=$value['fecha'];
	      $f=explode('-', $f);$f=str_replace('(', '', $f);$f=str_replace(')', '', $f);
	      $fecha=$f[2].'-'.$f[1].'-'.$f[0];	      
	  }

	  if ($comunidad_id==14){
	  	  $jornada=$value['jornada'];
	      $f=$value['fecha'];
	      $f=explode('(', $f);$f1=str_replace(')', '', $f[1]);$jornada=$f[0];
	      $f=explode('-', $f1);	      
	      $fecha=$f[2].'-'.$f[1].'-'.$f[0];
	  }
      
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