<?php


//$token="5471-b0PZlPMI94yvu3";
$token=$_GET['x'];
if ($token=='5471-b0PZlPMI94yvu3'){
	$f='../../json/temporada/1/data.json';

    if (file_exists($f)) {
    
    $json = file_get_contents($f);
    echo $json;

    /*$datos=json_decode($json);

    echo '<pre>';
    print_r($datos);
    echo '</pre>';*/

    } else {
    	echo 'No hemos podido encontrar los datos';
    }


} else {
	echo 'Permiso denegado';
}


?>