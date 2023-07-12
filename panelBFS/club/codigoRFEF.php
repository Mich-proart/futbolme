<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$mysqli = conectar();

$club_id = $_POST['club_id'];
$equipo_id = $_POST['equipo_id'];
$codigoRFEF = $_POST['codigoRFEF'];
$nombreCorto = $_POST['nombreCorto'];

$consulta = "UPDATE equipo SET codigoRFEF='".$codigoRFEF."', nombreCorto='".$nombreCorto."' WHERE id=".$equipo_id;
$resultadoSQL = mysqli_query($mysqli, $consulta);

header('Location: club.php?id='.$club_id);
