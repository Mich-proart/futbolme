<?php

$path = './json/eventos.json';
$json = file_get_contents($path);
$eventos = json_decode($json, true); ?>
<div class="text-left" style="font-size:12px;">
<div class="h10 clear"></div>


    <h4>Información a la última</h4>

<?php

$c_id=$comunidad_id??1;
echo ultimosEventos($eventos,$c_id);

function ultimosEventos($eventos,$c_id){

    $contador = 0;
    foreach ($eventos as $key => $evento) {



    if ($c_id==1 && $evento['temporada_id']>680){ continue; }

    if ($c_id>1 && $evento['comunidad_id']!=$c_id){ continue; }

    
              
        $contador++;
        if ($contador > 20) { break; }

        $pos = strpos($evento['valor'], '*A');

        if ($pos > -1) {
            $evento['valor'] = substr($evento['valor'], 0, $pos);
        }

        $titulo = null;
        $partido = null;
        $local = $evento['local'];
        $visitante = $evento['visitante'];
        switch ($evento['evento']) {
            case '1':
                $hora = explode(',', $evento['valor']);
                if ('00:00:11' == $hora[1]) {
                    continue;
                }
                $resultado = $hora[0].' '.substr($hora[1], 0, 2).':'.substr($hora[1], -2);
                $titulo = 'Fecha y hora para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '2':
                $hora = explode(',', $evento['valor']);
                if ('00:00:11' == $hora[1]) {
                    continue;
                }
                $resultado = $hora[0].' '.substr($hora[1], 0, 2).':'.substr($hora[1], -2);
                $titulo = 'Fecha y hora para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '3':
                $arbitro = explode(',', $evento['valor']);
                $resultado = $arbitro[2].', '.$arbitro[1];
                $titulo = 'Árbitro para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '5':
                $valor = 'Gol del '.$local;
                $resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
                $titulo = '<span style="color:red">En directo </span>';
               $partido = $local.' - '.$visitante;
                break;

            case '6':
                $valor = 'Gol del '.$visitante;
                $resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
                $titulo = '<span style="color:red">En directo </span>';
                $partido = $local.' - '.$visitante;
                break;

            case '7':
                $valor = $evento['valor'];
                $resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
                $titulo = '<span style="color:red">En directo </span>';
                $partido = $local.' - '.$visitante;
                break;

            case '8':
                $valor = $evento['valor'];
                $resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
                $titulo = '<span style="color:red">Descanso</span>';
                $partido = $local.' - '.$visitante;
                break;

            case '9':
                $valor = $evento['valor'];
                $resultado = $valor.' <span style="color:red">'.$evento['resultado'].'</span>';
                $titulo = '<span style="color:red">Inicia el segundo tiempo.</span>';
                $partido = $local.' - '.$visitante;
                break;

            case '13':
                $resultado = $evento['resultado'];
                $titulo = 'FINAL';
                $partido = $local.' - '.$visitante;
                $resultado = '<span style="background-color:gainsboro; font-size:12px;">'.$resultado.'</span>';
                break;

            //case 16 = No Jugado
            case '14':
                $valor = $evento['valor'];
                $resultado = $valor;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '15':
                $valor = $evento['valor'];
                $resultado = $valor;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '17':
                $observaciones = $evento['valor'];
                if ('000000' == trim($observaciones)) {
                    $observaciones = '/mundodeportivo2.php?id='.$evento['equipoLocal_id'].'&id2='.$evento['equipoVisitante_id'];
                    $observaciones = "<div class='boldfont w100 text-center'><a href='".$observaciones."' target='_blank'>Todos sus enfrentamientos (MD)</a></div>";
                }
                $resultado = $observaciones;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '18':
                $estadio = explode(',', $evento['valor']);
                if (!isset($estadio[1])) {
                    continue;
                }
                $resultado = $estadio[1];
                $titulo = 'Estadio para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            /*case '25':
                $youtube = $evento['valor'];
                $partido_id = $evento['partido_id'];
                $equipoLocal_id = $evento['equipoLocal_id'];
                $equipoVisitante_id = $evento['equipoVisitante_id'];
                $resultado = '<span style="background-color:gainsboro; font-size:12px;">'.$evento['resultado'].'</span>';

                $titulo = 'Crónica MD';
                if (!isset($local[1]) || !isset($visitante[1])) {
                    continue;
                }
                $partido = $local[1].' - '.$visitante[1];
                break;*/

            case '26':
                $tele = substr($evento['valor'], 0, -3);
                $resultado = $tele;
                $titulo = 'TV';
                if (!isset($local[1]) || !isset($visitante[1])) {
                    continue;
                }
                $partido = $local.' - '.$visitante;
                break;

            default:
                continue;
                break;
        }

        if (isset($titulo) && isset($partido)) {
            if (!isset($resultado)) {
                continue;
            }
            //if ($evento['evento']==3) {imp($evento);}
            $nt = $evento['nombre_torneo'];
            $nt = str_replace(array('PRIMERA', 'SEGUNDA', 'TERCERA', 'Grupo '), array('1ª', '2ª', '3ª', 'G.'), $nt);
    ?>
            <div class="horizontaldivider">
    <?php
        if (10 === $contador) {
               
               include 'includes/publicidad/config.php';
               if ($google===1){ 

                
                } ?>
        <?php

            }

             echo substr($evento['momento'], 11); ?>
                <?php

                //$datos = liga($evento['temporada_id']);
                $jornada = addslashes($_GET['jornada'] ?? '');
            //$nombre = $datos['nombre'];
            $url = '/resultados-directo/torneo/'.poner_guion1($nt).'/'.$evento['temporada_id'].'/'.$jornada; ?>
                <span class="boldfont" style="color:maroon"><?php echo $nt; ?></span>
                 <a href="<?php echo $url; ?>" target="blank">
                    <span class="iconhover glyphicon glyphicon-arrow-right"></span>
                </a><br/>
                <?php echo $titulo; ?> -
                <span class="boldfont" style="color:blue"><?php echo $partido; ?></span> ::
                <b><?php echo $resultado; ?></b> -
                <?php if (3 == $evento['evento']) {
                ?>
                     <a href="/arbitro.php?id=<?php echo $arbitro[0]; ?>" target="blank" style="color:orange">
                        <span class="iconhover glyphicon glyphicon-arrow-right"></span></a>
                    <?php
            }
            if (26 == $evento['evento']) {
                ?>
                     <a href="/partidos-televisados" target="blank" style="color:#FA5882"><span
                                class="iconhover glyphicon glyphicon-arrow-right"></span></a>
                    <?php
            } ?>
            </div>

            <div style="clear:both;"></div>
            <?php
        }
    } 

}
function poner_guion1($cadena)
{
    // $cadena = strtolower($cadena);

    $cadena = utf8_decode($cadena);
    $cadena = trim($cadena);
    $cadena = str_replace('"', '', $cadena);
    $cadena = str_replace(' ', '-', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('`', '', $cadena);
    $cadena = str_replace('´', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´`';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    $cadena = strtolower($cadena);

    return $cadena;
}

?>
</div>
