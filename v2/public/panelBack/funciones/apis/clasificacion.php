<?php
$api_id=$_GET['api_id']??178; //bélgica

//$api_id=$_GET['api_id']??die('Necesitamos un número de ID'); //bélgica
if ($api_id==0){ die('Necesitamos un número de ID'); }
$temporada_id=$_GET['temporada_id']??0;
$tabla=1;$inicio="";

define('_FUTBOLME_', 1);
require_once '../../consultas.php';
require_once '../../funciones.php';

include('betsapi.php');

echo $url."<br />";

$ch = curl_init($url);     
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    $resultado = curl_exec($ch);
    print_r(curl_getinfo($ch));
    if(curl_errno($ch)) {
        echo curl_error($ch);
        return 'sin proxy:  - ERROR '.curl_error($ch);
    } 
    curl_close($ch);


$resultado = json_decode($resultado,true);

imp($resultado);

?>