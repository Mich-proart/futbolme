<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

asociarTorneo($_POST['torneo_id'], $_POST['api_nombre'], $_POST['api_id']);

function asociarTorneo($torneo_id, $api_nombre, $api_id)
{
    $consulta = "INSERT INTO apis(torneo_id, api_nombre, api_id) VALUES ('".$torneo_id."','".$api_nombre."','".$api_id."')";
    $mysqli = conectar();
    echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
}
?>

