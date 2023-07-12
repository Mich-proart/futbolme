<?php define('_FUTBOLME_', 1);

require_once '../config.php';

$mysqli = conectar();

$usuario = $_SESSION['user_id'];

$equipo = mysqli_real_escape_string($mysqli, $_POST['equipo_id']);

$consulta = 'DELETE FROM usuario_equipo

			WHERE usuario_id = '.$usuario.' AND equipo_id = '.$equipo;

mysqli_query($mysqli, $consulta);
unset($_SESSION['equipos']);
unset($_SESSION['equipo']);
$_SESSION['equipos'] = equiposUsuario($usuario);
foreach ($_SESSION['equipos'] as $key => $value) {
    $_SESSION['equipo']=$key.','.$value['nombre'].','.$value['club_id']; break;
}


die();
