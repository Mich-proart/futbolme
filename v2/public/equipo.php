<?php
if (array_key_exists('id', $_GET)) {

    include '../src/Application/Helpers/DbHelper.php';
    $db = new \App\Application\Helpers\DbHelper();


    $id = (int) $_GET['id'];

    $sql = "
        SELECT e.*
        FROM equipo e
        WHERE e.id = " . $id . "
    ";

    $equipo = $db->query($sql)->fetch_assoc();

    if (!$equipo) {
        header('location: /');
    }

    $url = '/resultados-directo/equipo/' . poner_guion($equipo['nombre']) . '/' . $id . '/datos';

    header('location: '. $url, true, 301);
} else {
    header('location: /');
}


function poner_guion($cadena)
{
    // $cadena = strtolower($cadena);

    $cadena = utf8_decode($cadena);
    $cadena = trim($cadena);
    $cadena = str_replace('"', '', $cadena);
    $cadena = str_replace(',', '', $cadena);
    $cadena = str_replace(' - ', '-', $cadena);
    $cadena = str_replace(' ', '-', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('', '', $cadena);
    $cadena = str_replace('´', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    $cadena = strtolower($cadena);

    return $cadena;
}