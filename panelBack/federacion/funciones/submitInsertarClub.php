<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>

<?php 

/*

imp($_POST);
Array
(
    [futbolbase_id] => 16237
    [localidad_id] => 4264
    [nombreC] => O Paramo S.d.
    [nombre_completo] => O Paramo S.d.
    [codigoRFEF] => 02274
    [territorialRFEF] => 03
    [categoria_id] => 1
    [nombreE] => O Paramo Sd
    [equipo] => 22703,3446
)*/
$mysqli = conectar();
$mysqliFM = conectarFM();


$sql='INSERT INTO club(futbolbase_id, localidad_id, pais_id, nombre, nombre_completo, codigoRFEF, territorialRFEF) VALUES 
("'.$_POST['futbolbase_id'].'","'.$_POST['localidad_id'].'","60","'.$_POST['nombreC'].'","'.$_POST['nombreC'].'","'.$_POST['codigoRFEF'].'","'.$_POST['territorialRFEF'].'")';

echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$club_id=mysqli_insert_id($mysqliFM);

//el nuevo id será el club_id

$id=explode(',', $_POST['equipo']);

$equipo_id=$id[0];
$federacion_id=$id[1];


$sql = 'INSERT INTO equipo (categoria_id, club_id, nombre, nombreCorto, codigoRFEF, federacion_id) 
		  	VALUES ("'.$_POST['categoria_id'].'","'.$club_id.'","'.$_POST['nombreE'].'","'.$_POST['nombreE'].'","000","'.$federacion_id.'")';
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$futbolme_id=mysqli_insert_id($mysqliFM);
//el nuevo id hay que grabarlo en equipo de futbolbase

$sql="UPDATE equipo SET futbolme_id=".$futbolme_id." WHERE id=".$equipo_id;
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqli, $sql);

$sql="UPDATE club SET id_futbolme=".$club_id." WHERE id=".$_POST['futbolbase_id'];
echo $sql.'<br />';
mysqli_query($mysqli, $sql);

die('Club y equipo creado correctamente');

?>
