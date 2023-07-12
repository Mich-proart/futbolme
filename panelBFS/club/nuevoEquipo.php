<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$mysqli = conectar();

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

$slug = slug($nombre);

$consulta = "INSERT INTO equipo (categoria_id, club_id, nombre, nombre_completo, sexo )
			VALUES ('".$categoria_id."', '".$club_id."', '".$nombre."', '".$nombre_completo."', '1')";
//die($consulta);
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
header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
exit();

function slug($string)
{
    $characters = array(
        'Á' => 'A', 'Ç' => 'c', 'É' => 'e', 'Í' => 'i', 'Ñ' => 'n', 'Ó' => 'o', 'Ú' => 'u',
        'á' => 'a', 'ç' => 'c', 'é' => 'e', 'í' => 'i', 'ñ' => 'n', 'ó' => 'o', 'ú' => 'u',
        'à' => 'a', 'è' => 'e', 'ì' => 'i', 'ò' => 'o', 'ù' => 'u',
        );
    $string = strtr($string, $characters);
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    if ('-' === substr($string, strlen($string) - 1, strlen($string))) {
        $string = substr($string, 0, strlen($string) - 1);
    }

    return $string;
}
