<?php

define('_PANEL_', 1);
require_once '../includes/config.php';


foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

$slug = slug($nombre);

$consulta = "INSERT INTO estadio (nombre, localidad_id, inaguracion, capacidad, direccion, longitud, latitud, slug) VALUES ('".$nombre."', '".$localidad_id."', '".$inaguracion."', '".$capacidad."', '".$direccion."', '".$longitud."', '".$latitud."', '".$slug."')";

if (mysqli_query($mysqli, $consulta)) {
    
    echo '<h1>Pulsa en el id del equipo para actualizar.</h1>';
}



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
