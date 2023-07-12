<?php
#$files = glob('../json/cristian/*.*');
#var_dump($files);

$ficheroEventos = '../json/cristian/eventos1601312645.json';
$contenidoFicheroEventos = file_get_contents($ficheroEventos);
$contenidoFicheroEventosArray = json_decode($contenidoFicheroEventos, true);

$rutaFicherosEventos = '../json/eventos/';

foreach ($contenidoFicheroEventosArray as $key => $evento) {
    $evento['estado_partido'] = $evento['estado'];

    $goles = explode('-', $evento['resultado']);

    $evento['goles_local'] = trim($goles[0]);
    $evento['goles_visitante'] = trim($goles[1]);

    $nombreFicheroEvento = $key . '-xxx-' . $evento['temporada_id'] . '-eee.json';

    file_put_contents($rutaFicherosEventos . $nombreFicheroEvento, json_encode($evento));
}

