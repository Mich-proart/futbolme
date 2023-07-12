<?php
define('_PANEL_', 1);
require_once '../../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../../includes/head.php';
include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 


$url='https://www.sslproxies.org/';

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

	$string = str_get_html($content);
	$html->load($string);

	$ips=array();

	foreach($html->find('table.table-striped') as $tabla2){

	//echo $tabla2;

  	
  		foreach($tabla2->find('tr') as $k2 => $e){

  			if ($k2==0){ continue; }
  			
            $ips[$k2]['ip']=trim($e->find('td',0)->plaintext);
            $ips[$k2]['puerto']=trim($e->find('td',1)->plaintext);
            $ips[$k2]['cod']=trim($e->find('td',2)->plaintext);
            $ips[$k2]['pais']=trim($e->find('td',3)->plaintext);
            $ips[$k2]['tipo']=trim($e->find('td',4)->plaintext);
            $ips[$k2]['google']=trim($e->find('td',5)->plaintext);  
            $ips[$k2]['https']=trim($e->find('td',6)->plaintext); 
            $ips[$k2]['tiempo']=trim($e->find('td',7)->plaintext);  

                               
        }   

  	}
	
	//imp($ips);

	$todos='';$ttodos=0;
	$https='';$thtps=0;

	foreach ($ips as $key => $value) {
		
		$todos.=$value['ip'].':'.$value['puerto']."\n";$ttodos++;
		if ($value['https']=='yes') {$https.=$value['ip'].':'.$value['puerto']."\n";$thtps++;}
	}
	?>

<table>
	<tr><td valign="top"><h3>Total: <?php echo $ttodos?></h3>
	<textarea cols="40" rows="20" name="proxis"><?php echo $todos?></textarea>
	</td>
	<td valign="top"><h3>https: <?php echo $ttodos?></h3>
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

