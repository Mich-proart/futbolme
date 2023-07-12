<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>

<?php 

$club_id=$_POST['club_id'];
$categoria_id=$_POST['categoria_id'];
$federacion_id=$_POST['federacion_id'];
$equipo_id=$_POST['equipo_id'];

$mysqli = conectar();
$mysqliFM = conectarFM();

$sq="SELECT nombre FROM club WHERE id=".$club_id;
//echo $sq.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sq);
$n = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$nombre=$n['nombre']; 
echo $nombre.'<br />';




$sql = 'INSERT INTO equipo (categoria_id, club_id, nombre, nombreCorto, codigoRFEF, federacion_id) 
		  	VALUES ("'.$categoria_id.'","'.$club_id.'","'.$nombre.'","'.$nombre.'","000","'.$federacion_id.'")';
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$futbolme_id=mysqli_insert_id($mysqliFM);
//el nuevo id hay que grabarlo en equipo de futbolbase

$sql="UPDATE equipo SET futbolme_id=".$futbolme_id." WHERE id=".$equipo_id;
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqli, $sql);

?>