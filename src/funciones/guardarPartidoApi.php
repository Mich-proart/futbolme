<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

$consulta = 'UPDATE partido SET partidoAPI='.$_POST['partidoAPI'].' WHERE id='.$_POST['partido_id'];
echo $consulta;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
