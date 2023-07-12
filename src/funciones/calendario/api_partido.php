<?php 
define('_FUTBOLME_', 1);
require_once '../../consultas.php';
$mysqli = conectar();

echo "<pre>";
print_r($_POST);
echo "</pre>";

$id_partido = $_POST['id'];

$APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
$key = '&APIkey='.$APIkey;

$metodo = 'action=get_events';
$d = '&match_id='.$id_partido;
$metodo .= $d;
$url = 'https://apifootball.com/api/?'.$metodo.$key;

echo $url.'<br /><br /><br /><br />';

$resultado = file_get_contents($url);

$datos = json_decode($resultado, true);$datos=$datos[0];

$goles=$datos['goalscorer'];

$tarjetas=$datos['cards'];

$cambiosLocal=$datos['lineup']['home']['substitutions'];
$cambiosVisitante=$datos['lineup']['away']['substitutions'];

$estado_partido=$datos['match_status'];
$goles_local=$datos['match_hometeam_score'];
$goles_visitante=$datos['match_awayteam_score'];


/*

echo "<pre>";
print_r($cambiosVisitante);
echo "</pre>";

echo "<pre>";
print_r($goles);
echo "</pre>";

echo "<pre>";
print_r($tarjetas);
echo "</pre>";*/
$j=array();

foreach ($tarjetas as $key => $value) {
	$jugador=$value['home_fault'];
	if (strlen($jugador)>0) {
		$ju=buscarPuntos($jugador);
		$j['jugador']=$ju;
		$j['equipo']=$_POST['local'];
	}

	$jugador=$value['away_fault'];
	if (strlen($jugador)>0) {
		$ju=buscarPuntos($jugador);
		$j['jugador']=$ju;
		$j['equipo']=$_POST['visitante'];
	}

	if (strlen($j['jugador'])<1) { continue; }

	$ju=buscarPuntos($j['jugador']);
	$j['jugador']=$ju;
	$j['jugador']=ltrim($j['jugador']);
	
	$j['jugador_id']=insertarJugador($j['equipo'],$j['jugador']);
	echo "<pre>";
	print_r($j);
	echo "</pre>";	
}




