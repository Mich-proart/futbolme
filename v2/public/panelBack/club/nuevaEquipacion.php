<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 
$mysqli = conectar();

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

$consulta = "INSERT INTO equipacion (pantalon, camiseta, media) VALUES ('".$pantalon."', '".$camiseta."', '".$media."')";

if (mysqli_query($mysqli, $consulta)) {
    header('Location:equipacion.php?id='.mysqli_insert_id($mysqli));
    exit();
}
