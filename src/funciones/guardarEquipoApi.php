<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

Xnominar($_POST['equipo_id'], $_POST['equipoAPI']);

function Xnominar($equipo_id, $nombre_api)
{
    $consulta = "UPDATE equipo SET nombreAPI='".$nombre_api."' WHERE id=".$equipo_id;
    $mysqli = conectar();
    echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
}

?>
