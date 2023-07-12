<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generador de rutas</title>
</head>
<body>
<?php

include '../../src/Application/Helpers/DbHelper.php';

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

function generaUrlTorneo($id) {
    $id = (int) $id;

    $sql = "
        SELECT t.*
        FROM temporada t
        WHERE t.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $temporada = $db->query($sql)->fetch_assoc();

    if (!$temporada) {
        return '';
    }

    $url = '/resultados-directo/torneo/' . poner_guion($temporada['nombre']) . '/' . $id . '/';

    return $url;
}

function generaUrlEquipo($id) {
    $id = (int) $id;

    $sql = "
        SELECT e.*
        FROM equipo e
        WHERE e.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $equipo = $db->query($sql)->fetch_assoc();

    if (!$equipo) {
        return '';
    }

    $url = '/resultados-directo/equipo/' . poner_guion($equipo['nombre']) . '/' . $id . '/datos';

    return $url;
}

function generaUrlPartido($id) {
    $id = (int) $id;

    $sql = "
        SELECT el.nombre equipoLocal, ev.nombre equipoVisitante
        FROM partido p
        LEFT JOIN equipo el ON p.equipoLocal_id = el.id
        LEFT JOIN equipo ev ON p.equipoVisitante_id = ev.id
        WHERE p.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $partido = $db->query($sql)->fetch_assoc();

    if (!$partido) {
        return '';
    }

    $url = '/resultados-directo/partido/' . poner_guion($partido['equipoLocal']) . '-' . poner_guion($partido['equipoVisitante']) . '/' . $id;

    return $url;
}


function generaUrl($tipo, $id) {
    $url = '';

    switch ($tipo) {
        case 'torneo':
            $url = generaUrlTorneo($id);
            break;

        case 'equipo':
            $url = generaUrlEquipo($id);
            break;

        case 'partido':
            $url = generaUrlPartido($id);
            break;
    }

    return $url;
}

if (array_key_exists('tipoUrl', $_POST)) {
    $ids = trim($_POST['ids']);
    $idsArray = explode(PHP_EOL, $ids);

    foreach ($idsArray as $id) {
        $id = trim($id);

        if ($id != '') {
            $url = generaUrl($_POST['tipoUrl'], $id);
            echo $url . '<br />';
        }
    }
}


$tipoUrl = array_key_exists('tipoUrl', $_POST) ? $_POST['tipoUrl'] : '';
?>

    <form action="" method="post" enctype="multipart/form-data">
        <select name="tipoUrl" id="tipoUrl">
            <option<?php if ($tipoUrl == 'torneo') { ?> selected="selected"<?php } ?> value="torneo">Torneo</option>
            <option<?php if ($tipoUrl == 'equipo') { ?> selected="selected"<?php } ?> value="equipo">Equipo</option>
            <option<?php if ($tipoUrl == 'partido') { ?> selected="selected"<?php } ?> value="partido">Partido</option>
        </select>

        <br />

        Introduce los ID's separados por saltos de linea

        <br />


        <textarea name="ids" id="ids" cols="30" rows="10"><?php if (array_key_exists('ids', $_POST)) { echo $_POST['ids']; } ?></textarea>

        <br />

        <button type="submit">Genera</button>
    </form>

</body>
</html>