<?php 
define('_PANEL_', 1);
require_once '../../panelBack/includes/config.php';
//generamos los partidos de enfrentamientos de los ultimos 3 dias.

$sql='SELECT p.equipoLocal_id, p.equipoVisitante_id, p.fecha
FROM partido p
WHERE p.fecha>curdate()-3 AND p.fecha<curdate()+10 ORDER BY fecha DESC';
echo $sql;
$resultadoSQL = mysqli_query($mysqli, $sql);
$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);



foreach ($partidos as $k => $v) {

	$e1=$v['equipoLocal_id'];$e2=$v['equipoVisitante_id'];
	if($e2<$e1){ 
    	$f=$e2.'-'.$e1.'.json'; 
	} else { 
	    $f=$e1.'-'.$e2.'.json';
	} 

	$r='../../../json/enfrentamientos/'.$f;

	echo $r.'<br />';


	
    $enfrentamientos = enfrentamientos($e1, $e2);
    guardarJSON($enfrentamientos, $r);  
    echo $r.' - creado------<br />';  
		
}

