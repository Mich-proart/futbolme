<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 

$club_id = $_POST['club_id'];
$equipo_id = $_POST['equipo_id'];
$codigoRFEF = $_POST['codigoRFEF'];
$nombreCorto = $_POST['nombreCorto'];

$consulta = "UPDATE equipo SET codigoRFEF='".$codigoRFEF."', nombreCorto='".$nombreCorto."' WHERE id=".$equipo_id;
mysqli_query($mysqli, $consulta);

die;
