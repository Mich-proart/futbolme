<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';

function ultimosEventos2()
{
    $path = '../json/eventos.json';
    $json = file_get_contents($path);
    $eventos = json_decode($json, true);

    $html = '<div class="marconegro">';
    $html .= '<div id="foroWidget" style="font-size:12px;">';
    $html .= '<h4>Información a la última</h4>';

    foreach ($eventos as $key => $evento) {
        if ($key > 100) {
            break;
        }
        $titulo = null;
        $partido = null;

        $local = explode(',', $evento['local']);
        $visitante = explode(',', $evento['visitante']);

        switch ($evento['evento']) {
case '1':
$hora = explode(',', $evento['valor']);
if ('00:00:11' == $hora[1]) {
    continue;
}
$resultado = substr($hora[1], 0, 2).':'.substr($hora[1], -2);
$titulo = 'Hora para el partido ';
$partido = $local[1].' - '.$visitante[1];
break;

case '2':
$hora = explode(',', $evento['valor']);
if ('00:00:11' == $hora[1]) {
    continue;
}
$resultado = $hora[0].' '.substr($hora[1], 0, 2).':'.substr($hora[1], -2);
$titulo = 'Fecha y hora para el partido ';
$partido = $local[1].' - '.$visitante[1];
break;

case '3':
$arbitro = explode(',', $evento['valor']);
$resultado = $arbitro[2].', '.$arbitro[1];
$titulo = 'Árbitro para el partido ';
$partido = $local[1].' - '.$visitante[1];
break;

case '5':
$valor = 'Gol del '.$local[1];
$resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
$titulo = '<span style="color:red">En directo </span>';
$partido = $local[1].' - '.$visitante[1];
break;

case '6':
$valor = 'Gol del '.$visitante[1];
$resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
$titulo = '<span style="color:red">En directo </span>';
$partido = $local[1].' - '.$visitante[1];
break;

case '7':
$valor = $evento['valor'];
$resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
$titulo = '<span style="color:red">En directo </span>';
$partido = $local[1].' - '.$visitante[1];
break;

case '8':
$valor = $evento['valor'];
$resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
$titulo = '<span style="color:red">En directo </span>';
$partido = $local[1].' - '.$visitante[1];
break;

case '9':
$valor = $evento['valor'];
$resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
$titulo = '<span style="color:red">En directo </span>';
$partido = $local[1].' - '.$visitante[1];
break;

case '13':
$resultado = $evento['resultado'];
$titulo = 'FINAL';
$partido = $local[1].'-'.$visitante[1];
$resultado = '<span style="background-color:gainsboro; font-size:12px;">'.$resultado.'</span>';
break;

//case 16 = No Jugado
case '15':
$valor = $evento['valor'];
$resultado = $valor;
$titulo = 'Información: ';
$partido = $local[1].' - '.$visitante[1];
break;

case '17':
$observaciones = $evento['valor'];
$resultado = $observaciones;
$titulo = 'Información: ';
$partido = $local[1].' - '.$visitante[1];
break;

case '18':
$estadio = explode(',', $evento['valor']);
if (!isset($estadio[1])) {
    continue;
}
$resultado = $estadio[1];
$titulo = 'Estadio para el partido ';
$partido = $local[1].' - '.$visitante[1];
break;

case '20':
$tele = substr($evento['valor'], 0, -3);
$resultado = $tele;
$titulo = 'TV';
if (!isset($local[1]) || !isset($visitante[1])) {
    continue;
}
$partido = $local[1].' - '.$visitante[1];
break;

/*case '25':
$youtube=$evento['valor'];
$partido_id=$evento['partido_id'];
$equipoLocal_id=$evento['equipoLocal_id'];
$equipoVisitante_id=$evento['equipoVisitante_id'];
$resultado='<span style="background-color:gainsboro; font-size:12px;">'.$evento['resultado'].'</span>';

$titulo="Crónica en Mundo Deportivo";
if (!isset($local[1]) || !isset($visitante[1])) {continue;}
$partido=$local[1]." - ".$visitante[1];
break;*/

default:
continue;
break;
}

        if (isset($titulo) && isset($partido)) {
            if (!isset($resultado)) {
                continue;
            }

            //if ($evento['evento']==3) {imp($evento);}
            $html .= '<div class="horizontaldivider">';
            $nt = $evento['nombre_torneo'];
            $nt = str_replace('PRIMERA', '1ª', $nt);
            $nt = str_replace('SEGUNDA', '2ª', $nt);
            $nt = str_replace('TERCERA', '3ª', $nt);
            $nt = str_replace('Grupo ', 'G.', $nt);
            $html .= ' '.substr($evento['momento'], 11).'<span class="boldfont" style="color:maroon">'.$nt.'</span> <a href="/resultados-directo/torneo/xxx/'.$eventos['temporada_id'].'/" target="blank"><span class="iconhover glyphicon glyphicon-arrow-right"></span></a><br />';
            $html .= '<b>'.$titulo.'</b> - ';
            $html .= '<span class="boldfont" style="color:blue">'.$partido.'</span> :: ';
            $html .= '<b>'.$resultado.'</b> - ';
            if (3 == $evento['evento']) {
                $html .= '&nbsp;<a href="/arbitro.php?id='.$arbitro[0].'" target="blank" style="color:orange"><span class="iconhover glyphicon glyphicon-arrow-right"></span></a>';
            }
            if (20 == $evento['evento']) {
                $html .= '&nbsp;<a href="/partidos-televisados" target="blank" style="color:#FA5882"><span class="iconhover glyphicon glyphicon-arrow-right"></span></a>';
            }
            if (25 == $evento['evento']) {
                $yt = explode(',', $youtube);
                $previa = null;
                $resumen = null;
                $html .= '<span style="cursor:pointer;" onclick="menu_youtube('.$partido_id.','.$equipoLocal_id.','.$equipoVisitante_id.')">';
                if (count($yt) > 1) {
                    $previa = $yt[0];
                    $resumen = $yt[1];
                    $html .= '&nbsp;&nbsp;<img title="Previa y resumen del partido" src="/img/television/todoyt.png" width="25" height="25">';
                } else {
                    if ('*' == substr($yt[0], 0, 1)) {
                        $previa = $yt[0];
                        $html .= '&nbsp;&nbsp;<img title="Previa del partido" src="/img/television/previa.png" width="25" height="25">';
                    } else {
                        $resumen = $yt[0];
                        $html .= '&nbsp;&nbsp;<img title="Resumen del partido" src="/img/television/youtube.png" width="25" height="25">';
                    }
                }
                $html .= '</span>';

                $html .= '<div id="youtube-'.$partido_id.'" class="col-xs-12 nopadding text-center"></div>';
            }

            $html .= '</div>';
        }
    }

    $html .= '</div><div style="clear:both;"></div></div>';

    return $html;
}

?>

document.write ('<?php echo ultimosEventos2();?>');
