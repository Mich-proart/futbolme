<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqliFM = conectarFM();
$mysqli = conectar();

$competicion_id=$_GET['c'];
$grupo_id=$_GET['g'];
$comunidad_id=$_GET['cm'];



	$sq='SELECT id, nombre, apiRFEFcompeticion, apiRFEFgrupo, tipo_torneo,categoria_torneo_id FROM torneo WHERE 
apiRFEFgrupo='.$grupo_id.' AND comunidad_id='.($comunidad_id+1).' ORDER BY id';

echo $sq.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sq);
$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);


if (count($fed)==0){ die('FINALIZADO'); }
$id=$fed['id']; 
$nombre=$fed['nombre'];
$grupo_id=$fed['apiRFEFgrupo'];
$tipo_torneo=$fed['tipo_torneo'];
$categoria_torneo_id=$fed['categoria_torneo_id'];

require_once 'urlFederaciones.php';
$urlBase=$url; unset($url);

echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';
echo $urlBase.'<hr />';

$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-jornadas.json';

imp('id:'.$id.' '.$nombre);
imp($file);
$jornada_inicio=1;

$equipos=array();

$maximoJ=43;

//if ($comunidad_id==9 || $comunidad_id==10){ $bd='proxiss'; } 

echo "<p>Base de datos $bd</p>";

$salir=0;
$cuentabucle=0;
for ($jda=$jornada_inicio; $jda < $maximoJ; $jda++) {

$cuentabucle++;

	
	$url=$urlBase.'CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jda;
	echo $url.'<br />';	 
	


	$sql='DELETE FROM '.$bd.' WHERE uso=0 AND mantener=0 AND fallo>1';
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
			if ($totalProxis==0){ 


				$html = new simple_html_dom();
				$content=getPageLibre($url); 

				
				if (strlen($content)>1000) { $fallo=0; $id_proxi=0; break; }
				
				$html->clear();
		    	unset($html);



				$fallo=1; break; 
			}
		}

		
		
		if ($fallo==0){
			$sql='UPDATE '.$bd.' SET uso=uso+1 WHERE id='.$id_proxi;
			mysqli_query($mysqli, $sql); 
			
			
			//var_dump($content);die;
			switch ($comunidad_id) {
				case 1:include('../../simple/'.$carpeta.'/extraerDatosPartidosM.php');break;
				case 3:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
				case 5:include('../../simple/'.$carpeta.'/edpCAT.php');break;
				case 7:include('../../simple/'.$carpeta.'/extraerDatosPartidosM.php');break;
				case 9:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;	
				case 10:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;	
				case 11:include('../../simple/'.$carpeta.'/extraerDatosPartidosM.php');break;	
				case 13:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
				case 14:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;	
				case 16:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;
				case 17:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;	
				case 18:include('../../simple/'.$carpeta.'/extraerDatosPartidos.php');break;				
			}
			
		    


			//var_dump($nJor);

			//$nJor es la variable que nos dirá las jornadas que tiene el torneo.

			if (isset($nJor)){
				if (isset($partidosJson)){
					$partidosJornada[$jda]=$partidosJson;
					unset($partidosJson);				
					$html->clear();
				    unset($html);
				    imp($partidosJornada[$jda]);



				    if ($jda<3){
						foreach ($partidosJornada[$jda] as $vE) {
							if ($vE['equipoLocal_id']>0 && $vE['equipoVisitante_id']>0){
								$equipos[$vE['equipoLocal_id']]['id']=$vE['equipoLocal_id'];
								$equipos[$vE['equipoLocal_id']]['equipo']=$vE['local'];
								$equipos[$vE['equipoVisitante_id']]['id']=$vE['equipoVisitante_id'];
								$equipos[$vE['equipoVisitante_id']]['equipo']=$vE['visitante'];
							}
						}					
						var_dump($jda);
						var_dump($nJor);
						imp($equipos);
					} else {

						foreach ($partidosJornada[$jda] as $vE) {

							imp($vE);




							if ($vE['equipoLocal_id']>0 && $vE['equipoVisitante_id']>0){
								$local=0;$visitante=0;
								foreach ($equipos as $kE1 => $vE1) {
								
								
									if ($vE['equipoLocal_id']==$kE1){ $local=1; }
									if ($vE['equipoVisitante_id']==$kE1){ $visitante=1; }

									echo '$kE1='.$kE1.'<br />';	
									echo 'equipoLocal_id='.$vE['equipoLocal_id'].'<br />';
									echo 'equipoVisitante_id='.$vE['equipoVisitante_id'].'<br />';
									echo 'local='.$local.'<br />';
									echo 'visitante='.$visitante.'<hr />';



								}
								if ($local==0 || $visitante==0){
									var_dump($jda);
									imp($equipos);
									die('Hay algún problema con el calendario.');
								}
							}
						}	


					}

					if ($jda==$nJor && $jda>0){ $salir=1; }

					if ($jda>=30 && $id==6826){ $salir=1; }

				} else {
					if ($tipo_torneo==1){ $jda=$jda-1; }
					if ($tipo_torneo==2){ $salir=1;}
				}

				
			}

		} else {
			$jda=$jda-1;
		}		

if ($jda<0){ $jda=0; }		

imp('jornada '.$jda.' - Salir: '.$salir);

//if ($cuentabucle==20){ die('detenido'); }

//if ($jda==2){ break; }

if ($salir==1){ break;}			
		
} // del for. 

//$file = $territorial.'-'.$grupo_id.'-jornadas.json';
if (isset($partidosJornada)){
	guardarJSON($partidosJornada, $file);
	$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-equipos.json';
	guardarJSON($equipos, $file);
	$sql='UPDATE liga SET jornadas='.count($partidosJornada).'  WHERE id='.$id;
	mysqli_query($mysqliFM, $sql);
	unset($partidosJornada);
	unset($equipos);
}



$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

/*if ($grupo_llegada==0){ ?>
<script LANGUAGE="JavaScript"> 
var pagina="_001descargarCalendario.php?c=<?php echo $competicion_id?>&g=<?php echo $grupo_llegada?>&cm=<?php echo $comunidad_id?>"; 

function redireccionar() 
{ 
location.href=pagina 
} 
setTimeout ("redireccionar()", 5000); 
</script> 
<?php }*/ ?>
