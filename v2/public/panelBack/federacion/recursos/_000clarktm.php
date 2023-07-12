<?php
define('_PANEL_', 1);
require_once '../../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../../includes/head.php';
include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$url='https://github.com/clarketm/proxy-list/blob/master/proxy-list.txt';
     

$sql='SELECT id,ip FROM proxiss2 WHERE fallo<5 ORDER BY uso DESC, fallo LIMIT 5';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
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
		$sql='UPDATE proxiss2 SET fallo=fallo+1  WHERE id='.$id_proxi;
		mysqli_query($mysqliBase, $sql); 
		unset($proxis[$key]);
		unset($proxi);
		unset($id_proxi);
		$html->clear();
    	unset($html);  

		$totalProxis=count($proxis);
		echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
	}
	
	$sql='UPDATE proxiss2 SET uso=uso+1 WHERE id='.$id_proxi;
	mysqli_query($mysqliBase, $sql);


	$string = str_get_html($content);

	
	$html->load($string);




	foreach($html->find('table.highlight') as $tabla2){

		
  	
  		foreach($tabla2->find('tr') as $k2 => $e){

  			if ($k2<9){ continue; }

  			
  			//foreach($e->find('display: inline;') as $e)
    		//$e->outertext = '';

    		$ips[$k2]=trim($e->find('td.blob-code',0)->plaintext);

  			

                               
        }   

  	}
	
	//imp($ips);

	
	$todos='';$ttodos=0;
	$https='';$thtps=0;

	foreach ($ips as $v) {

		$value=explode(' ', $v);
		
		$todos.=$value[0]."\n";$ttodos++;

		if (substr($value[1], -1)=='S') {
			$https.=$value[0]."\n";$thtps++;
		}
	}
	?>

<table>
	<tr><td valign="top"><h3>Total: <?php echo $ttodos?></h3>
	<textarea cols="40" rows="20" name="proxis"><?php echo $todos?></textarea>
	</td>
	<td valign="top"><h3>https: <?php echo $thtps?></h3>
	<textarea cols="40" rows="20" name="proxis"><?php echo $https?></textarea>
</td>
</tr></table>
	

	<?php
	$html->clear();
    unset($html);

   
	

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

die;
?>

