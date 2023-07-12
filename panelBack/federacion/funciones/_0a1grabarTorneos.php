<?php 
set_time_limit(0);

define('_FUTBOLME_', 1);
$static_v=1;
require_once '../../../src/consultas.php';
require_once '../../../src/funciones.php';


?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php

$categoria='FÚTBOL SALA';

$division=20;
switch ($categoria) {
	case 'SENIOR':$cti=4; $ci=1;$division=7;break;
	case 'JUVENILES':$cti=5; $ci=3;break;
	case 'CADETES':$cti=6; $ci=4;break;
	case 'INFANTILES':$cti=14; $ci=21;break;
	case 'ALEVINES':$cti=15; $ci=23;break;
	case 'FEMENINO';$cti=7;$ci=2;break;
	case 'FEMENINO JUVENIL';$cti=7;$ci=26;break;
	case 'FEMENINO CADETE';$cti=7;$ci=27;break;
	case 'FEMENINO INFANTIL';$cti=7;$ci=28;break;
	case 'FEMENINO ALEVIN';$cti=7;$ci=30;break;
	case 'FÚTBOL SALA';$cti=17;$ci=1;break;
}

include '_0a1torneos.php';

$mysqli = conectar();

$torneos_a_crear=explode(':', $torneos);



foreach ($torneos_a_crear as $key => $value) {	
	//imp($value);
	$datos=explode(',', $value);
	$n=$datos[0];
	$valores=explode('&', $datos[1]);
	$competicion=explode('=', $valores[0]);
	$competicion_id=$competicion[1];
	$fase=explode('=', $valores[1]);
	$fase_id=$fase[1];
	$grupo=explode('=', $valores[2]);
	$grupo_id=$grupo[1];
	/*imp($competicion_id);
	imp($fase_id);
	imp($grupo_id);*/	
	$contador=$contador+2;

		$sql='INSERT INTO torneo
	(categoria_torneo_id, categoria_id, pais_id, division_id, comunidad_id, apifutbol, apiRFEFcompeticion, apiRFEFgrupo, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, sexo, discr, desarrollo, inicio)
	VALUES
	("'.$cti.'","'.$ci.'","60","'.$division.'","'.($comunidad_id+1).'","'.$fase_id.'","'.$competicion_id.'","'.$grupo_id.'","'.$n.'","'.$n.'","'.$n.'","'.$contador.'","'.($comunidad_id+100).'","1","0","","0","'.date('Y-m-d').'");'; 
	echo $sql.'<br />'; 
	mysqli_query($mysqli, $sql);
	$torneo_id=mysqli_insert_id($mysqli);
	    

	$sql='INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ("'.$torneo_id.'", "0", 1, 0, 3);';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';


	$sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$torneo_id.'", "'.$n.'", "'.$torneo_id.'");';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';
	


} 

die('finalizado.......................................');


?>