<?php
$contador=$contador??0;
$contador++; //si no entra aqui es que estan todos (cuando viene del actualizador.php)

$sql='SELECT id,ip,uso FROM '.$bd.' WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$proxis = array_reverse($proxis);

if (count($proxis)<5){
    $sql='UPDATE '.$bd.' SET uso=0, fallo=0';
    mysqli_query($mysqliBase, $sql);
    echo 'reiniciados los proxis<br />'; 
}	
$fallo=1;

$html = new simple_html_dom();
$content=getPageLibre($url);

if (strlen($content)>1000) { 
	$fallo=0; echo 'conseguido independiente.<br />';
	
} else {

	foreach ($proxis as $key => $value) {

		$proxi=$value['ip'];
		$id_proxi=$value['id'];
		$uso_proxi=$value['uso'];
		imp($value);
		
		$html = new simple_html_dom();
		//$content=getPageLibre($url,$proxi,$id_proxi); 
		$content=getPage($url,$proxi,$id_proxi); 

		
		if (strlen($content)>1000) { 
			$fallo=0; 
			$sql='UPDATE '.$bd.' SET uso=uso+1  WHERE id='.$id_proxi;
			mysqli_query($mysqliBase, $sql);
			break; 
		}
		$sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
		mysqli_query($mysqliBase, $sql); 
		unset($proxis[$key]);
		unset($proxi);
		unset($id_proxi);
		$html->clear();
		unset($html);  

		$totalProxis=count($proxis);
		echo ' - Quedan '.($totalProxis).' proxis por usar<br />';
		if ($totalProxis==0){ $fallo=1; break; } 
	}

}


echo '<br />Fallo: '.$fallo.'<br />';
?>