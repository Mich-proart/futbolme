<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.cloudflare.com/client/v4/zones/8883273e475a4c84115d88b3a3a00e26/purge_cache');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

$headers = [
    'X-Auth-Email: futbolme@gmail.com',
    'Authorization: Bearer dQhpV3mGfoWJA7pq3bYwJV3CBhkNC9R-0kFNwzPj',
    'Content-Type: application/json'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

/*$data = [
    'files' => [
        'http://v2.futbolme.com/static/img/club/escudo4234.png',
        'http://v2.futbolme.com/static/img/club/escudo4235.png',
    ]
];*/

$tipo=$_POST['tipo'];
if ($tipo=='club'){ $ruta='club/escudoXXX.png'; }
if ($tipo=='jugador'){ $ruta='jugadores/jugadorXXX.jpg'; }
$ruta=str_replace('XXX', $_POST['id'], $ruta);
$url='/static/img/';


$data=$url.$ruta;

echo $data;

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$result = curl_exec($ch);

var_dump($result);

?>