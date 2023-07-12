<?php


define('_FUTBOLME_', 1);
require_once '../../src/config.php';

if (!isset($_POST['fecha']) || !isset($_POST['hora']) || !isset($_POST['local_goles']) || !isset($_POST['visitante_goles']) || !isset($_POST['enlaces']) || !isset($_POST['usuario_id']) || !isset($_POST['partido_id']) || !isset($_POST['cosas'])) {
    header('Location:index.php?error=1');
    exit();
}
if (empty($_POST['usuario_id']) || empty($_POST['partido_id'])) {
    header('Location:index.php?error=1');
    exit();
}
$mysqli = conectar();
if (!empty($_POST['fecha'])) {
    $fecha = mysqli_real_escape_string($mysqli, $_POST['fecha']);
}
/*if (!empty($_POST['hora'])) {
    $hora = DateTime::createFromFormat('H:i', mysqli_real_escape_string($mysqli,$_POST['hora']));
    imp($hora); die;

    $hora = $hora->format('H:i');
}*/

$hora = $_POST['hora'];
$hora = preg_replace('/:/D', '', $hora);

$local_goles = mysqli_real_escape_string($mysqli, $_POST['local_goles']);
$visitante_goles = mysqli_real_escape_string($mysqli, $_POST['visitante_goles']);
$enlaces = mysqli_real_escape_string($mysqli, $_POST['enlaces']);
$usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
$historico_id = mysqli_real_escape_string($mysqli, $_POST['partido_id']);
$cosas = mysqli_real_escape_string($mysqli, $_POST['cosas']);

$sugerencia = array(
    'fecha' => $fecha,
    'hora' => $hora,
    'local_goles' => $local_goles,
    'visitante_goles' => $visitante_goles,
    'usuario_id' => $usuario_id,
    'historico_id' => $historico_id,
    'cosas' => $cosas,
    'enlaces' => serialize($enlaces),
);

if (crearSugerencia($sugerencia)) {
    //header("Location:/historico-copa-partido/partido/" . $historico_id . "?ok");

    //echo "<script language=\"Javascript\">history.go(-1);</script>";
    //header("Location:index.php?ok");
    header('Location:'.$_SERVER['HTTP_REFERER']);

    exit();
}
