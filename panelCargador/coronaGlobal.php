<?php

define('_FUTBOLME_', 1);

include('../panelBack/simple/simple_html_dom.php');
include('../src/config.php');
require_once('actualizadorConex.php');
require_once('funcionesCargador.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar(); 
$mysqliFB = conectarFB(); 

$d=date('Y-m-d');



for ($i=0; $i < 2; $i++) { 

	switch ($i) {
		case 0:
			$url='https://en.wikipedia.org/wiki/Template:2019%E2%80%9320_coronavirus_pandemic_data'; 
			$file = '../json/corona/'.$d.'-Global.json';
			//if (@file_exists($file)) { echo $file.' ya existe<br />'; die(); } 
			break;
		
		case 1:
			$url='https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Spain';
			$file = '../json/corona/'.$d.'-Spain.json';
			//if (@file_exists($file)) { echo $file.' ya existe<br />'; die(); } 
			break;
		
		default:
			# code...
			break;
	}

$sql='SELECT id,ip FROM proxis2 WHERE fallo<5 ORDER BY uso DESC, fallo LIMIT 5';
$resultadoSQL = mysqli_query($mysqliFB, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

//imp($proxis);


	foreach ($proxis as $key => $value) {

		$proxi=$value['ip'];
		$id_proxi=$value['id'];
		imp($proxi);
		imp($id_proxi);

		
		$html = new simple_html_dom();
		$content=getPageLibre($url,$proxi,$id_proxi); 

		
		if (strlen($content)>1000) { break; }
		$sql='UPDATE proxis2 SET fallo=fallo+1  WHERE id='.$id_proxi;
		mysqli_query($mysqliFB, $sql); 
		unset($proxis[$key]);
		unset($proxi);
		unset($id_proxi);
		$html->clear();
    	unset($html);  

		$totalProxis=count($proxis);
		echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
	}
	
	$sql='UPDATE proxis2 SET uso=uso+1 WHERE id='.$id_proxi;
	mysqli_query($mysqliFB, $sql);

	$string = str_get_html($content);	
	$html->load($string);
	$corona=array();



	switch ($i) {
		case 0:
			$sql='DELETE FROM coronavirus WHERE comunidad_id=0 AND fecha="'.date('Y-m-d').'"';			
			mysqli_query($mysqli, $sql);
			foreach($html->find('table.wikitable') as $tabla){		
				foreach($tabla->find('tr') as $k => $e){
				if ($k<2){ continue; }
				$id=trim($e->find('a',0)->plaintext);
				$corona[$id]['pais']=trim($e->find('a',0)->plaintext);
				$corona[$id]['positivos']=trim($e->find('td',0)->plaintext);
				$corona[$id]['muertos']=trim($e->find('td',1)->plaintext);
				$corona[$id]['recuperados']=trim($e->find('td',2)->plaintext);
				$corona[$id]['fecha']=date('Y-m-d');  			
				} 
			}

			foreach ($corona as $key => $value) {
				imp($value);
				$pais=str_replace('(article)', '', $value['pais']);
				$pais=str_replace('&amp;', '&', $value['pais']);				
				if ($value['recuperados']=='—'){ $value['recuperados']=0; }
				if ($value['recuperados']=='No data'){ $value['recuperados']=0; }
				if ($value['positivos']==NULL){ continue; }
				$sq='SELECT id FROM pais WHERE gentilicio="'.$pais.'"';
				$resultadoSQL = mysqli_query($mysqli, $sq);
				$c = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (count($c)==0){ continue; }
				$pais_id=$c['id'];
				$p=$value['positivos'];$p=str_replace(',', '', $p);
				$m=$value['muertos'];$m=str_replace(',', '', $m);
				$r=$value['recuperados'];$r=str_replace(',', '', $r);
				$h=$value['hospital']??0;$h=str_replace(',', '', $h);
				$u=$value['uci']??0;$u=str_replace(',', '', $u);
				$f=$value['fecha'];$comunidad_id=0;
				$sq='SELECT id FROM coronavirus WHERE pais_id='.$pais_id.' AND fecha="'.$f.'"';
				$resultadoSQL = mysqli_query($mysqli, $sq);
				$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (count($fed)==0){ 
					$sql='INSERT INTO coronavirus (pais_id, comunidad_id, positivos, muertos, recuperados, hospital, uci, fecha) VALUES
					 ('.$pais_id.','.$comunidad_id.','.$p.','.$m.','.$r.','.$h.','.$u.',"'.$f.'")';
					 mysqli_query($mysqli, $sql);
					 echo 'Registro grabado ('.$pais_id.')<br />';
					 echo $sql.'<br />';
				} else { echo 'Registro existente ('.$pais_id.')<br />'; }

			}
			break; //case 0
		
		case 1:
				foreach($html->find('table.wikitable') as $key => $tabla){

					echo '<hr />';
					foreach($tabla->find('caption') as $e)
    				$fecha=$e->plaintext;
    				$fecha=str_replace('Confirmed COVID-19 cases in Spain by autonomous community as of ', '', $fecha);
    				$f=explode(',', $fecha);
    				imp($f);
    				$f1=explode(' ', $f[0]);
    				imp($f1);
    				$mes='01';
    				switch ($f1[1]) {
    					case 'January':$mes='01'; break;
    					case 'February':$mes='02'; break;
    					case 'March':$mes='03'; break;
    					case 'April':$mes='04'; break;
    					case 'May':$mes='05'; break;
    					case 'June':$mes='06'; break;
    					case 'July':$mes='07'; break;
    					case 'August':$mes='08'; break;
    					case 'September':$mes='09'; break;
    					case 'October':$mes='10'; break;
    					case 'November':$mes='11'; break;
    					case 'December':$mes='12'; break;
    				}

    				$fecha=$f1[2].'-'.$mes.'-'.$f1[0].substr($f[1], 0,6).':00';
    				

					foreach($tabla->find('tr') as $k => $e){
						if ($k<1){ continue; }			
			  			$id=trim($e->find('td',0)->plaintext);
			  			$corona[$id]['pais']=trim($e->find('td',0)->plaintext);
			  			$corona[$id]['positivos']=trim($e->find('td',1)->plaintext);
			  			$corona[$id]['hospital']=trim($e->find('td',2)->plaintext);
			  			$corona[$id]['uci']=trim($e->find('td',3)->plaintext);
			  			$corona[$id]['muertos']=trim($e->find('td',4)->plaintext);
			  			$corona[$id]['recuperados']=trim($e->find('td',5)->plaintext);
			  			$corona[$id]['fecha']=$fecha;  			
				    } 
				    break;
				} 

				$pais_id=1060;
				foreach ($corona as $key => $value) {
					$pais=str_replace('(article)', '', $value['pais']);
					if ($pais=='Total'){ continue; }
					if ($value['positivos']==NULL){ continue; }
					$sq='SELECT id FROM comunidad WHERE gentilicio="'.trim($pais).'"';
					$resultadoSQL = mysqli_query($mysqli, $sq);
					$c = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					$comunidad_id=$c['id'];
					$p=$value['positivos'];$p=str_replace(',', '', $p);
					$m=$value['muertos'];$m=str_replace(',', '', $m);
					$r=$value['recuperados'];$r=str_replace(',', '', $r);
					$h=$value['hospital']??0;$h=str_replace(',', '', $h);
					$u=$value['uci']??0;$u=str_replace(',', '', $u);
					$f=$value['fecha'];
					$sq='SELECT id FROM coronavirus WHERE comunidad_id='.$comunidad_id.' AND fecha="'.$f.'"';
					$resultadoSQL = mysqli_query($mysqli, $sq);
					$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					if (count($fed)==0){ 
						$sql='INSERT INTO coronavirus (pais_id, comunidad_id, positivos, muertos, recuperados, hospital, uci, fecha) VALUES
						 ('.$pais_id.','.$comunidad_id.','.$p.','.$m.','.$r.','.$h.','.$u.',"'.$f.'")';
						 mysqli_query($mysqli, $sql);
						 echo 'Registro grabado ('.$comunidad_id.')<br />';
						 echo $sql.'<br />';
					} else { echo 'Registro existente ('.$comunidad_id.')<br />'; }

				}
			break; //case 1		
		
	}

	

	

	


	$html->clear();
    unset($html);    

	guardarJSON($corona, $file);
	unset($corona);

} //for

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);


?>

