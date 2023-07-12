<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

$fase_id = 198;

$liga_id = $_POST['liga_id'];
$liga = '&league_id='.$liga_id;

if (790 == $liga_id || 10 == $liga_id) {
    //CHAMPIONS LEAGUE
    $liga = '&league_id='.$liga_id;
    $fase_id = $liga_id;
    $liga_id = 10000;
}

if (925 == $liga_id || 805 == $liga_id) {
    //EUROPA LEAGUE
    $liga = '&league_id='.$liga_id;
    $fase_id = $liga_id;
    $liga_id = 10001;
}

if (isset($_POST['inicio'])) {
    $inicio = $_POST['inicio'];
} else { echo "hace falta una fecha de inicio.";die; }

$APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
$clau = '&APIkey='.$APIkey;
$torneo = Xapifutbol($liga_id);
$temporada_id = $torneo['temporada_id'];
$pais_id = $torneo['pais_id'];

$api=extraerApis($temporada_id);
$api_id = $api['api_id'];
$api_nombre = $api['api_nombre'];

$final = '2025-12-31';

$f = '../../apis/'.$api_nombre.'/partidos/'.$api_id.'_partidos.json';

echo $f.'<br />';

//$cTime = 86400; //segundoa.
//if (@file_exists($f)) { $f_time = @filemtime($f); } else { $f_time = 0; }

//if ((time()-$cTime) > $f_time) {
    $metodo = 'action=get_events';
    $from = '&from='.$inicio;
    $to = '&to='.$final;

    $metodo .= $from.$to.$liga;
//$jornada="&match_id=".$jornada_id;

    $url = 'https://apifootball.com/api/?'.$metodo.$clau;
    echo $url.'<br />';

    $resultado = file_get_contents($url);

    $fh = fopen($f, 'w');
    fwrite($fh, $resultado);
    fclose($fh);
//}

$path = $f;
$json = file_get_contents($path);
$datos = json_decode($json, true);


/*echo '<pre>';
print_r($datos);
echo '</pre>';die;*/

foreach ($datos as $key => $partido) {
    //imp($partido);
    $partido['pais_id']=$pais_id;
    $partido['temporada_id']=$temporada_id;
    insertarPartido($partido); 
    
}

die;
