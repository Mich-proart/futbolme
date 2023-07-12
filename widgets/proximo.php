<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';


if  (is_numeric($_GET['id'])) { $equipo_id=$_GET['id']; } else { echo "Introducir número";}

proximo($equipo_id);

function proximo($equipo_id)
{
    

    $fecha = new \DateTime();
    $diasAntes = new \DateTime();
    $hoy = $fecha->format('Y-m-d');

    $diasAntes = \DateTime::createFromFormat('Y-m-d', $hoy);
    $diasAntes = $diasAntes->modify('-4 day')->format('Y-m-d');

    $sql = "SELECT p.equipoLocal_id, p.equipoVisitante_id
    FROM partido p 
    WHERE p.fecha>'".$diasAntes."' 
    AND (p.equipoLocal_id=".$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.') ORDER BY fecha';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    echo $resultado['equipoLocal_id'];
    
}
