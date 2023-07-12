<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';

function widMaxGoleador()
{
    $resultado = '';
    if (@file_exists('../json/maximoGoleador.json')) {
        $json = file_get_contents('../json/maximoGoleador.json');
        $resultado = json_decode($json, true);
        //se genera con crons?index cada 45 minutos
    }

    $html = '<div class="marconegro">';
    $html .= '<table class="table table-condensed whitebox"><thead>';
    $html .= '    <tr class="darkgreenbox">';
    $html .= '            <th class="text-center" colspan="2">Pichichis</th>';
    $html .= '            <th class="text-center">Goles</th>';
    $html .= '    </tr>';
    $html .= '</thead>';
    $html .= '<tbody class="whitebox">';

    foreach ($resultado as $key => $goleadores) {
        if ($key > 6) {
            break;
        }
        $enlace_jugador = '/resultados-directo/jugador/'.poner_guion($goleadores['jugador']).'/'.$goleadores['jugador_id'];
        $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($goleadores['equipo']).'/'.$goleadores['equipo_id'];

        $html .= '<tr ';
        if ($key > 2) {
            $html .= ' class="hidden-xs"';
        }
        $html .= '><td class="text-left"><img src="/img/jugadores/jugador'.$goleadores['jugador_id'].'.jpg" style="height:45px" alt="jugador">';
        $html .= '</td><td class="text-left">';
        $html .= '<a class="boldfont" href="'.$enlace_jugador.'">'.$goleadores['jugador'].'</a><br />';
        $html .= '<a href="'.$enlace_equipo.'">'.$goleadores['equipoCorto'].'</a></td>';
        $html .= '<td><h4><span class="boldfont">'.$goleadores['goles'].'</span></h4></td></tr>';
    }
    $html .= '<tr><td colspan="4">';
    $html .= '<a class="pull-right boldfont" href="/lideresGoleadores.php">Ver todos...&nbsp;&nbsp;';
    $html .= '</a></td></tr></tbody></table></div>';

    return $html;
}

?>

document.write ('<?php echo widMaxGoleador();?>');
