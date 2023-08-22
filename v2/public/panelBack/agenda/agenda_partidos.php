<?php
define('_PANEL_', 1);
require_once '../includes/config.php';
require_once '../includes/head.php';
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $ct = $_GET['ct'];
} else {
    echo 'Sin parametros';
    die;
}

?>

</head>
<body style="font-size: 20px;">

<?php

$partidos = partidosPorCategoria($fecha, $ct);
$h = ''; $colorFila = 'white';  $variable=0;
$sinFinalizar=array();

foreach ($partidos as $key=> $partido) {

	$fecha1 = date('Y-m-d H:i:s');
	$fecha1 = date_create($fecha1); //hora actual
	$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
	$fecha2 = date_create($fecha2); // hora comienzo real
	$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
	$fecha3 = date_create($fecha3); //hora prevista
	$dPartido = date_diff($fecha3, $fecha1);
	$horasP = $dPartido->h;
	$minutosP = $dPartido->i;
	$segundosP = $dPartido->s;
	$invertidoP = $dPartido->invert;
	$mHP=($horasP*60)+$minutosP;



	if ($invertidoP==0 && $mHP>105 && (int)$partido['estado_partido']==0){
	    $sinFinalizar[]=$partido; 
	    unset($partidos[$key]);  
	}
	   
} ?>

<table cellpadding="1" cellspacing="2" bgcolor="orange" width="100%">
	<?php $h = ''; $colorFila = 'white'; $variable=1; $colorFondo='white';
	foreach ($sinFinalizar as $partido) {
	include('agendaPartido.php');
	}?>
</table>

<table cellpadding="1" cellspacing="2" bgcolor="black" width="100%">
	<?php $h = ''; $colorFila = 'white'; $variable=1; $colorFondo='white';
	foreach ($partidos as $partido) {

		if ($partido['estado_partido']==2 && $partido['betsapi']==1){
			$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
			$fecha2 = date_create($fecha2); // hora comienzo real
			$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
			$fecha3 = date_create($fecha3); //hora prevista
			$dP = date_diff($fecha3, $fecha1);
		}
	
	include('agendaPartido.php');    
	}?>
</table>



</body>
</html>

