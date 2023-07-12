<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';


$mysqli = conectar();

if (isset($_GET['modo'])) {
    $torneo_id = $_GET['torneo_id'];
    $posicion = $_GET['posicion'];
    $grupo_id = $_GET['grupo_id'];

    $eliminar = 'DELETE FROM  colortorneo WHERE torneo_id='.$torneo_id.' 
	AND posicion='.$posicion.' AND grupo_id='.$grupo_id;
    $resultadoSQL = mysqli_query($mysqli, $eliminar);
} else {
    $torneo_id = $_POST['torneo_id'];
    $color_id = $_POST['color_id'];
    $posicion = $_POST['posicion'];
    $grupo_id = $_POST['grupo_id'];

    $insertar = 'INSERT INTO colortorneo (torneo_id, color_id, posicion, grupo_id)
	VALUES ('.$torneo_id.','.$color_id.','.$posicion.','.$grupo_id.')';
    $resultadoSQL = mysqli_query($mysqli, $insertar);
}

echo $eliminar;
echo $insertar;

header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
exit();
