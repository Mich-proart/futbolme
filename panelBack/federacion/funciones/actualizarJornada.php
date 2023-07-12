<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$grupo_id=$_POST['grupo_id'];
$jornada=$_POST['jornada'];
$competicion_id=$_POST['competicion_id'];
$comunidad_id=$_POST['comunidad_id'];
$temporada_id=$_POST['temporada_id'];
$modo=$_POST['modo'];
$fase=$_POST['fase'];
$partidosJson=array();

if ($grupo_id==1436723){ $categoria_torneo_id=17;}

include ('urlFederaciones.php');

if ($carpeta=='00pnfg'){
$url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornada;
}

if ($carpeta=='00isquad'){
$url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornada;
}
echo $url.'<br />';
$jda=$jornada;



$mysqli = conectar(); 

$sql='DELETE FROM proxis WHERE estado=0 AND fallo>5';
	mysqli_query($mysqli, $sql);

$sql='SELECT id, ip, uso FROM proxis WHERE fallo<6 ORDER BY estado, uso DESC, fallo LIMIT 5';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

shuffle($proxis);

//imp($proxis);

	$fallo=0;
	foreach ($proxis as $key => $value) {

		$proxi=$value['ip'];
		$id_proxi=$value['id'];
		$uso_proxi=$value['uso'];
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

	if ($fallo==0){
	//var_export($content);
		$sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
		mysqli_query($mysqli, $sql); 

			if ($uso_proxi==3){
				$sql='UPDATE proxis SET uso=0, estado=estado+1 WHERE id='.$id_proxi;
				mysqli_query($mysqli, $sql); 
			}

		switch ($comunidad_id) {
			case 2:include('../../simple/'.$carpeta.'/edpISQUAD.php');break;
			case 6:include('../../simple/'.$carpeta.'/edpISQUAD.php');break;
			case 8:include('../../simple/'.$carpeta.'/edpISQUAD.php');break;
			case 15:include('../../simple/'.$carpeta.'/edpISQUAD.php');break;

			case 1:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 3:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 9:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 13:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 14:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 16:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 17:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
			case 18:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;

			case 5:include('../../simple/'.$carpeta.'/edpCAT.php');break;
			case 7:include('../../simple/'.$carpeta.'/extraerDatosPartidosM.php');break;
			case 11:include('../../simple/'.$carpeta.'/extraerDatosPartidosM.php');break;
		}
		$html->clear();
	    unset($html);
	    //imp($partidosJson); 
	    //echo 'los partidos';
	 } else {
	 	echo ' vuelve a intentarlo '.time('h:m:s'); die;
	 }

    

	if (count($partidosJson)>0){
		$mysqli = conectarFM(); 
        foreach ($partidosJson as $k => $v) {
        	//imp($v);
        	if ($v['estado_partido']==1){
        		$sq='SELECT id FROM equipo WHERE federacion_id='.$v['equipoLocal_id'];
        		$resultadoSQL = mysqli_query($mysqli, $sq);
				$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				$eL_id=$r['id'];
				$sq='SELECT id FROM equipo WHERE federacion_id='.$v['equipoVisitante_id'];
        		$resultadoSQL = mysqli_query($mysqli, $sq);
				$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				$eV_id=$r['id'];

        		$sq='UPDATE partido SET goles_local='.$v['goles_local'].', goles_visitante='.$v['goles_visitante'].', estado_partido=1, codigo_acta='.$v['codigo_acta'].' WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$eL_id.' AND equipoVisitante_id='.$eV_id.' AND jornada='.$v['jornada'].' AND estado_partido<>1';
        		echo $sq.'<br />';
        		echo $v['fecha'].' '.$v['hora_prevista'].' -- '.$v['local'].'-'.$v['visitante'].' ('.$v['goles_local'].'-'.$v['goles_visitante'].')<br />';
        		mysqli_query($mysqli, $sq);
        		if (!$resultadoSQL = mysqli_query($mysqli, $sq)) {
		            printf("Errormessage: %s\n", mysqli_error($mysqli)); 
		            echo $sql.'<br />';           
		        } else {
		            
		            $file = '../../../json/temporada/'.$temporada_id.'/tipo.json';
				    unlink($file);  
				    echo $file.'  borrado<br />'; 
				    $file = '../../../json/temporada/'.$temporada_id.'/partidosActiva.json';
				    unlink($file);  
				    echo $file.'  borrado<br />'; 

		        }


        	}
        } echo '<br />la llamada funcionó correctamente...';

    } else {  echo '<br /> No se devolvió ningún registro'; }
    
echo '<hr />';

die;
?>

