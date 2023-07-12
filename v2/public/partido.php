<?php
if (array_key_exists('id', $_GET)) {

    include '../src/Application/Helpers/DbHelper.php';
    $db = new \App\Application\Helpers\DbHelper();


    $id = (int) $_GET['id'];

    $sql = "
        SELECT el.nombre equipoLocal, ev.nombre equipoVisitante
        FROM partido p
        LEFT JOIN equipo el ON p.equipoLocal_id = el.id
        LEFT JOIN equipo ev ON p.equipoVisitante_id = ev.id
        WHERE p.id = " . $id . "
    ";

    $partido = $db->query($sql)->fetch_assoc();

    if (!$partido) {
        header('location: /');
    }

    $url = '/resultados-directo/partido/' . poner_guion($partido['equipoLocal']) . '-' . poner_guion($partido['equipoVisitante']) . '/' . $id;

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