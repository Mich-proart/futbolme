<?php
define('_FUTBOLME_', 1);

include 'funcionesV2.php';

$sq='SELECT t.id, t.nombre, te.id as temporada_id FROM torneo t INNER JOIN temporada te ON te.torneo_id=t.id WHERE t.visible>4';
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sq);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
$torneo=array();


$file = '../../json/urls_torneos.json';
$jsonencoded='';

foreach ($resultado as $key => $value) {
	$torneo[$value['temporada_id']]['torneo_id']=$value['id'];
	$torneo[$value['temporada_id']]['temporada_id']=$value['temporada_id'];
	$pgTemporada = '/resultados-directo/torneo/'.poner_guion($value['nombre']).'/'.$value['temporada_id'].'/';
	$pgTemporada=utf8_encode($pgTemporada);
	$torneo[$value['temporada_id']]['ruta']=$pgTemporada;

}
guardarJSON($torneo, $file);

echo 'Se ha generado '.$file;
?>