<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';

function trofeoFutbolme()
{
    $path = '../json/FutbolmeTop.json';
    $json = file_get_contents($path);
    $trofeoFutbolme = json_decode($json, true);

    $html = '<div class="marconegro"><table class="table table-bordered table-condensed whitebox">';
    $html .= '<thead><tr class="darkgreenbox">';
    $html .= '        <th class="text-center">Trofeo Futbolme</th>';
    $html .= '        <th class="text-center">COE</th>';
    $html .= '		<th class="text-center">PJ</th>';
    $html .= '		<th class="text-center">V</th>';
    $html .= '		<th class="text-center">E</th>	';
    $html .= '</tr></thead><tbody class="whitebox">';
    foreach ($trofeoFutbolme as $key => $fila) {
        $html .= '<tr ';
        if ($key > 2) {
            $html .= ' class="hidden-xs"';
        }
        $html .= '><td><span class="pull-left">';
        $html .= '<a href="/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'].'">';
        $html .= '<img src="/img/equipos/escudo'.$fila['equipo_id'].'.png" alt="'.$fila['nombre'].'" style="width:18px; height:20px">';
        $html .= '<b>'.$fila['nombreCorto'].'</b></a></span></td>';
        $html .= '<td class="text-center">'.$fila['COE'].'</td>';
        $html .= '<td class="text-center">'.$fila['PJ'].'</td>';
        $html .= '<td class="text-center">'.$fila['V'].'</td>';
        $html .= '<td class="text-center">'.$fila['E'].'</td></tr>';
    }
    $html .= '<tr><td colspan="5"><a class="pull-right boldfont" href="/trofeofutbolme.php">Tabla completa...&nbsp;&nbsp;&nbsp;</a></td></tr>';
    $html .= '</tbody></table></div>';

    return $html;
}

?>

document.write ('<?php echo trofeoFutbolme(); ?>');
