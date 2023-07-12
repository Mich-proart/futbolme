<?php
if (array_key_exists('id', $_GET)) {

    include '../src/Application/Helpers/DbHelper.php';
    $db = new \App\Application\Helpers\DbHelper();


    $id = (int) $_GET['id'];

    $sql = "
        SELECT j.*
        FROM jugador j
        WHERE j.id = " . $id . "
    ";

    $jugador = $db->query($sql)->fetch_assoc();

    if (!$jugador) {
        header('location: /');
    }

    $url = '/resultados-directo/jugador/' . poner_guion($jugador['apodo']) . '/' . $id;

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
    $cadena = str_replace('/', '-', $cadena);
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