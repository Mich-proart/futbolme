<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';

function widJuegoLimpio()
{
    $resultado = '';
    if (@file_exists('../json/juegoLimpio.json')) {
        $json = file_get_contents('../json/juegoLimpio.json');
        $resultado = json_decode($json, true);
        //se genera con el crons?index cada 45 minutos.
    }

    $html = '<div class="marconegro">';
    $html .= '<table class="table table-bordered table-condensed whitebox"><thead>';
    $html .= '<tr class="darkgreenbox"><th class="text-center">Juego Limpio</th>';
    $html .= '<th class="text-center">PTS</th><th class="text-center">';
    $html .= '<span class="iconseparate fa fa-file" style="color:rgb(225, 231, 19);background:rgb(225, 231, 19); margin:5px;" ></span></th>';
    $html .= '<th class="text-center"><span class="iconseparate fa fa-file" style="color:red;background:red; margin:5px;"></span></th>';
    $html .= '</tr></thead><tbody class="whitebox">';

    foreach ($resultado as $key => $fila) {
        if (123 == $fila['equipo_id']) {
            continue;
        }
        $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($fila['equipo']).'/'.$fila['equipo_id'];
        $html .= '<tr ';
        if ($key > 2) {
            $html .= ' class="hidden-xs"';
        }
        $html .= '><td class="text-left"><a href="'.$enlace_equipo.'">';
        $html .= '<img src="/img/equipos/escudo'.$fila['equipo_id'].'.png" alt="'.$fila['equipo'].'" style="width:18px; height:20px">';
        $html .= '<b>'.$fila['equipoCorto'].'</b></a></td><td class="text-center" style="background-color:white">'.($fila['TA'] + ((int) ($fila['TR']))).'</td>';
        $html .= '<td class="text-center">'.$fila['TA'].'</td>';
        $html .= '<td class="text-center">'.((int) ($fila['TR']) / 2).'</td></tr>';
    }

    $html .= '<tr><td colspan="4">*Clasificación general. Solo hasta Segunda B';

    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=1#juegoLimpio">Primera</a></div>';
    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=2#juegoLimpio">Segunda</a></div>';
    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=3#juegoLimpio">2ªB Grupo 1</a></div>';
    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=4#juegoLimpio">2ªB Grupo 2</a></div>';
    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=5#juegoLimpio">2ªB Grupo 3</a></div>';
    $html .= '<div class="nav_cat_btns"><a href="/temporada.php?id=6#juegoLimpio">2ªB Grupo 4</a></div>';
    $html .= '</td></tr></tbody></table></div>';

    return $html;
}

?>

document.write ('<?php echo widJuegoLimpio(); ?>');
