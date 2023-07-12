<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
$equipo_id=$_POST['equipo_id'];
$f_equipo_id=$_POST['f_equipo_id'];
$futbolme_id=$_POST['futbolme_id'];

$mysqli = conectar();
$mysqliFM = conectarFM();

if ($_POST['vincular']=='si'){
	$sql="UPDATE equipo SET futbolme_id=".$futbolme_id." WHERE id=".$equipo_id;
	echo $sql.'<br />';
	mysqli_query($mysqli, $sql);
	$sql="UPDATE equipo SET federacion_id=".$f_equipo_id." WHERE id=".$futbolme_id;
	mysqli_query($mysqliFM, $sql);
	echo $sql.'<br />';
} else {
	$sql="UPDATE equipo SET futbolme_id=0 WHERE id=".$equipo_id;
	echo $sql.'<br />';
	mysqli_query($mysqli, $sql);
	$sql="UPDATE equipo SET federacion_id=0 WHERE id=".$futbolme_id;
	mysqli_query($mysqliFM, $sql);
	echo $sql.'<br />';
}

die;
?>