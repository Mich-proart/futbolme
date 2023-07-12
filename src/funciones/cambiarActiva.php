<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$mysqli = conectar();

$tipo_torneo = $_POST['tipo_torneo'];
$temporada_id = $_POST['temporada_id'];
$jornadaActiva = $_POST['jornadaActiva'];
$torneo_id = '(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';

if (1 == $tipo_torneo) {
    $consulta = 'UPDATE liga SET jornadaActiva='.$jornadaActiva.' WHERE id='.$torneo_id;
} else {
    $consulta = 'UPDATE eliminatorio SET fase_activa='.$jornadaActiva.' WHERE id='.$torneo_id;
}

echo $consulta;

$resultadoSQL = mysqli_query($mysqli, $consulta);

if (1 == $tipo_torneo){
	//$partidosJornada = Xpartidos($temporada_id, abs($jornadaActiva)); 
    //$origenCarpeta=getcwd();
    //echo $origenCarpeta;
    //$carpeta = '../../json/temporada/'.$temporada_id;  
    $file = '../../json/temporada/'.$temporada_id.'/tipo.json';
    if (file_exists($file)) { unlink($file); }
    $file = '../../json/temporada/'.$temporada_id.'/partidosActiva.json';
    if (file_exists($file)) { unlink($file); }
    //guardarJSON($partidosJornada, $carpeta.'/partidosActiva.json');
    Xtipo($temporada_id);
}