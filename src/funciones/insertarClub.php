<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

insertarClub($_POST['pais_id'], $_POST['nombre'], $_POST['categoria_id']);

function insertarClub($pais_id, $nombre, $categoria_id)
{
    $mysqli = conectar();
    $insertar = "INSERT INTO club (pais_id, nombre, nombre_completo) VALUES ('".$_POST['pais_id']."', '".$_POST['nombre']."', '".$_POST['nombre']."')";
	$resultadoSQL = mysqli_query($mysqli, $insertar);
	echo $insertar."<br />";
	$consulta = 'SELECT max(id) FROM club';
	$resultadoSQL = mysqli_query($mysqli, $consulta);
	$resultado = mysqli_fetch_array($resultadoSQL);
	$club_id = $resultado[0];
	$insertar = "INSERT INTO equipo (categoria_id, club_id, nombre, nombre_completo) VALUES ('".$_POST['categoria_id']."', '".$club_id."' ,'".$_POST['nombre']."', '".$_POST['nombre']."')";
	$resultadoSQL = mysqli_query($mysqli, $insertar);
	echo $insertar."<br />";
}




?>