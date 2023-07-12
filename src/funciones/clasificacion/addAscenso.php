<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

$mysqli = conectar();

if (isset($_GET['modo'])) {
    $ascenso_id = $_GET['id'];

    $consulta = 'DELETE FROM ascensoequipo WHERE id='.$ascenso_id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
} else {
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli, $value);
    }

    $consulta = "INSERT INTO ascensoequipo (equipo_id, ascenso_id, temporada_id,posicion) VALUES ('".$equipo_id."', '".$ascenso_id."', '".$temporada_id."', '".$posicion."')";
    if (mysqli_query($mysqli, $consulta)) {
        $pos = strpos($_SERVER['HTTP_REFERER'], '?');
        if (false === $pos) {
            $flag = '?ok';
        } else {
            $flag = '&ok';
        }
        $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
        if (false !== $pos) {
            $flag = '';
        }
    } else {
        $pos = strpos($_SERVER['HTTP_REFERER'], '?');
        if (false === $pos) {
            $flag = '?error';
        } else {
            $flag = '&error';
        }
        $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
        if (false !== $pos) {
            $flag = '';
        }
    }
}

die($consulta); ?>