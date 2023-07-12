<?php
define('_PANEL_', 1);
require_once '../includes/config.php';

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

$consulta = "UPDATE estadio SET nombre='".$nombre."', localidad_id='".$localidad_id."', inaguracion='".$inaguracion."', capacidad='".$capacidad."', direccion='".$direccion."', longitud='".$longitud."', latitud='".$latitud."' WHERE id=".$id;


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

die;