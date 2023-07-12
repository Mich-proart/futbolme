<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';
$mysqli = conectar();

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

$consulta = "INSERT INTO equipacion (pantalon, camiseta, media) VALUES ('".$pantalon."', '".$camiseta."', '".$media."')";

if (mysqli_query($mysqli, $consulta)) {
    header('Location:equipacion.php?id='.mysqli_insert_id($mysqli));
    exit();
}
