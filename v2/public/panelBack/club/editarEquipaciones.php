<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$mysqli = conectar();
$consulta = 'SELECT e.id, e.camiseta, e.pantalon, e.media FROM equipaciones e WHERE 1';
$resultadoSQL = mysqli_query($mysqli, $consulta);
$equipaciones = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

foreach ($equipaciones as $equipacion) {
    $consulta = "SELECT e.id FROM equipacion e WHERE e.camiseta = '".$equipacion['camiseta']."' AND e.pantalon = '".$equipacion['pantalon']."' AND e.media = '".$equipacion['media']."'";
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $equipacionesViejas = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
    foreach ($equipacionesViejas as $ev) {
        $consulta = "UPDATE equipo SET equipacion_id='".$equipacion['id']."' WHERE equipacion_id=".$ev['id'];
        mysqli_query($mysqli, $consulta);
    }
}
