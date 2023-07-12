<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$partido_id = $_POST['id'];
$temporada_id = $_POST['temporada_id'];

$bd = $_POST['bd'];

//$partido_id=151570;
//$temporada_id=238;
$partido = Xpartido($partido_id);

$arbitro_id = $partido['arbitro_id'];
$nombreArbitro = $partido['nombreArbitro'];
$apellidosArbitro = $partido['apellidosArbitro'];

$partidoGoles = XpartidoGoles($partido_id);

$partidoTarjetas = XpartidoTarjetas($partido_id);

$golesTarjetas = prepararGolesTarjetas($partidoGoles, $partidoTarjetas);



for ($i = 0; $i < 2; ++$i) {
    if (0 == $i) {
        $fore = $golesTarjetas['local'];
        foreach ($fore as $k => $GolT) {
            $alineacion[$i][$GolT['jugador_id']]['incidencia'] = -1;
            $alineacion[$i][$GolT['jugador_id']]['minuto'] = -1;
            if ($GolT['observaciones'] > 0) {
                $alineacion[$i][$GolT['jugador_id']]['observaciones'] = $GolT['observaciones'];
            }
        }
    } else {
        $fore = $golesTarjetas['visitante'];
        foreach ($fore as $k => $GolT) {
            $alineacion[$i][$GolT['jugador_id']]['incidencia'] = -1;
            $alineacion[$i][$GolT['jugador_id']]['minuto'] = -1;
            if ($GolT['observaciones'] > 0) {
                $alineacion[$i][$GolT['jugador_id']]['observaciones'] = $GolT['observaciones'];
            }
        }
    }

    foreach ($fore as $k => $GolT) {
        $txtMinuto = substr($GolT['minuto'], 1);

        if ($GolT['minuto'] > 145 && $GolT['minuto'] < 200) {
            $txtMinuto = '45+'.($GolT['minuto'] - 145);
        }
        if ($GolT['minuto'] > 290 && $GolT['minuto'] < 370) {
            $txtMinuto = '90+'.($GolT['minuto'] - 290);
        }

        if ($GolT['minuto'] > 3105 && $GolT['minuto'] < 3200) {
            $txtMinuto = '105+'.($GolT['minuto'] - 3105);
        }

        if ($GolT['minuto'] > 4122) {
            $GolT = '120+'.($GolT['minuto'] - 4120);
        }

        //if ($i==0) { imp($GolT); }

        if (2 == $GolT['tipo']) {
            $alineacion[$i][$GolT['jugador_id']]['posicion'] = $GolT['posicion'];
            $alineacion[$i][$GolT['jugador_id']]['jugador_id'] = $GolT['jugador_id'];
            $alineacion[$i][$GolT['jugador_id']]['nombreJugador'] = $GolT['nombreJugador'];
            $alineacion[$i][$GolT['jugador_id']]['gol'] = $GolT['gol'];
            continue;
        }

        $txtGol = '';

        //if ($GolT['tipo']==10) { $txtGol=" <i>p.p.</i> "; }
        //if ($GolT['tipo']==1) { $txtGol=" <i>penalti</i>  ";}
        //if ($GolT['tipo']==11) { $txtGol=" <i>penalti fallado</i>  ";}
        if ($GolT['minuto'] > 200) {
            $txtTiempo = '2ºT';
        } else {
            $txtTiempo = '1ºT';
        }

        if (1 == $GolT['gol']) {
            if (11 == $GolT['tipo']) { // penalti fallado
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',11';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (10 == $GolT['tipo']) { //propia puerta
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',10';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (1 == $GolT['tipo']) { //penalti
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',9';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } else { // gol
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',2';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            }
        } else {
            if (0 == $GolT['tipo']) {
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',0';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (1 == $GolT['tipo']) {
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',1';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (3 == $GolT['tipo']) {
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',3';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (4 == $GolT['tipo']) {
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',4';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            } elseif (5 == $GolT['tipo']) {
                $alineacion[$i][$GolT['jugador_id']]['incidencia'] = $alineacion[$i][$GolT['jugador_id']]['incidencia'].',5';
                $alineacion[$i][$GolT['jugador_id']]['minuto'] = $alineacion[$i][$GolT['jugador_id']]['minuto'].','.$txtMinuto;
            }
        }
    }
}


if (!isset($alineacion)) { die('---');}

$alineacionL = $alineacion[0];
$alineacionV = $alineacion[1];

/*imp($alineacionL);
imp($alineacionV);*/

usort($alineacionL, function ($a, $b) {
    return $a['posicion'] - $b['posicion'];
});

usort($alineacionV, function ($a, $b) {
    return $a['posicion'] - $b['posicion'];
});

/*
asort($alineacionL);
asort($alineacionV);
*/

//imp($alineacionL);
//if ($temporada_id!=238 && ) { $estilo="display:none"; } else { $estilo="display:block"; }

$estilo = 'display:block';
?>
<div class="col-xs-12 alert nopadding" style="<?php echo $estilo; ?>; background-color: #E6E6E6" > 
<a href="#" class="close" data-dismiss="alert" style="margin-right:20px">&times;</a>
<div class="clear"></div>
    <div class="col-xs-6 text-left whitebox nopadding" style="border-right: 1px solid dimgray">

        <?php 
        $cambios = array();
        foreach ($alineacionL as $k => $valor) {
            switch ($valor['posicion']) {
            case '1':$txtPos = 'Por'; $txtCol = 'dimgray'; $txtUrl = ''; break;
            case '2':$txtPos = 'Def'; $txtCol = 'orange'; $txtUrl = ''; break;
            case '3':$txtPos = 'Med'; $txtCol = 'maroon'; $txtUrl = ''; break;
            case '4':$txtPos = 'Del'; $txtCol = 'green'; $txtUrl = ''; break;
            case '5':$txtPos = 'Ent'; $txtCol = 'black'; $txtUrl = "style='color:maroon'"; break;
            default:$txtPos = '---'; break;
        }
            $iconos = '';
            $x = explode(',', $valor['incidencia']);
            $y = explode(',', $valor['minuto']);
            $saltar = 0;
            $tarjeta = 0;
            foreach ($x as $key => $value) {
                if (0 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                }
                if (1 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta2.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                }
                if (5 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                }

                if (2 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (3 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="color:maroon;" class="iconseparate glyphicon glyphicon-arrow-right" title="'.$y[$key].'\'"></span>   ';
                }
                if (10 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="color:red"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (11 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="background-color:red; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span><span style="color:dimgray"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (9 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="background-color:green; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span><span style="color:black"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                //if ($value==4) { $iconos.=' '.$y[$key].'\' <span style="color:green;" class="iconseparate glyphicon glyphicon-arrow-left" title="'.$y[$key].'\'"></span>   '; }
                if ($value > 2 && $value < 5) {
                    if (isset($cambios[$y[$key]][$value])) {
                        if (isset($cambios[$y[$key] + 1][$value])) {
                            $cambios[$y[$key] + 2][$value] = $valor;
                        } else {
                            $cambios[$y[$key] + 1][$value] = $valor;
                        }
                    } else {
                        $cambios[$y[$key]][$value] = $valor;
                    }
                }
                if (4 == $value) {
                    $saltar = 1;
                }

                $tarjeta = $value;
            }
            if (1 == $saltar) {
                continue;
            }

            if (strlen($iconos) > 0) {
                $iconos = substr($iconos, 0, -3);
            }
            if (5 == $valor['posicion']) {
                echo "<div class='col-xs-12 row h25'></div>";
            } ?> 
        <div class="col-xs-12 text-left h40 clear txt11" style="border-bottom:1px solid dimgray">
        <a <?php echo $txtUrl; ?> href="/jugador.php?id=<?php echo $valor['jugador_id']; ?>"><?php echo $valor['nombreJugador']; ?></a>
        <span class="pull-right" style="color:<?php echo $txtCol; ?>"><i><?php echo $txtPos; ?></i></span>
        <br /> <?php echo $iconos; ?>
        </div>
        <?php
        }

        if (count($cambios) > 0) {
            ksort($cambios);
            echo "<h4 class='text-center'>Sustituciones</h4>";
            foreach ($cambios as $k => $v) {
                ?>
            <div class="col-xs-12 text-left h40 clear txt11" style="border-bottom:1px solid dimgray; z-index:10">
                <?php 
                ksort($v);
                foreach ($v as $k1 => $valor) {
                    if (3 == $k1) {
                        $jugadorCambiado = $v[$k1]['nombreJugador'];
                        continue;
                    }

                    switch ($valor['posicion']) {
                        case '1':$txtPos = 'Por'; $txtCol = 'dimgray'; $txtUrl = ''; break;
                        case '2':$txtPos = 'Def'; $txtCol = 'orange'; $txtUrl = ''; break;
                        case '3':$txtPos = 'Med'; $txtCol = 'maroon'; $txtUrl = ''; break;
                        case '4':$txtPos = 'Del'; $txtCol = 'green'; $txtUrl = ''; break;
                        case '5':$txtPos = 'Ent'; $txtCol = 'black'; $txtUrl = "style='color:maroon'"; break;
                        default:$txtPos = '---'; break;
                    }
                    $iconos = '';
                    $x = explode(',', $valor['incidencia']);
                    $y = explode(',', $valor['minuto']);
                    $tarjeta = 0;
                    foreach ($x as $key => $value) {
                        if (1 == $tarjeta && 0 == $value) {
                            $iconos = str_ireplace('tr', 'ta', $iconos);

                            $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                        } else {
                            if (0 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                            if (1 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta2.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                            if (5 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                        }

                        if (2 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (10 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="color:red"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (11 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="background-color:red; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span><span style="color:dimgray"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (9 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="background-color:green; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span><span style="color:black"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (4 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="color:green;" class="iconseparate glyphicon glyphicon-arrow-left" title="'.$y[$key].'\'"></span>   ';
                        }

                        $tarjeta = $value;
                    }

                    if (strlen($iconos) > 0) {
                        $iconos = substr($iconos, 0, -3);
                    } ?>
                <?php
                } ?>     
                    <div class="col-xs-12 nopadding text-left h40 clear txt11" style="border-bottom:1px solid dimgray">
                    <a href="/jugador.php?id=<?php echo $valor['jugador_id']; ?>"><?php echo $valor['nombreJugador']; ?></a> <i>por <?php echo $jugadorCambiado; ?></i>
                    <span class="pull-right" style="color:<?php echo $txtCol; ?>"><i><?php echo $txtPos; ?></i></span>
                    <br /> <?php echo $iconos; ?>
                    </div>
                    <div class="clear"></div>
                
            </div>
            <?php
            }
        } ?>
    </div>
    <div class="col-xs-6 text-right whitebox nopadding" style="border-left: 1px solid dimgray">
        <?php 
        unset($cambios); $cambios = array();
        foreach ($alineacionV as $k => $valor) {
            switch ($valor['posicion']) {
            case '1':$txtPos = 'Por'; $txtCol = 'dimgray'; $txtUrl = ''; break;
            case '2':$txtPos = 'Def'; $txtCol = 'orange'; $txtUrl = ''; break;
            case '3':$txtPos = 'Med'; $txtCol = 'maroon'; $txtUrl = ''; break;
            case '4':$txtPos = 'Del'; $txtCol = 'green'; $txtUrl = ''; break;
            case '5':$txtPos = 'Ent'; $txtCol = 'black'; $txtUrl = "style='color:maroon'"; break;
            default:$txtPos = '---'; break;
        }
            $iconos = '';
            $x = explode(',', $valor['incidencia']);
            $y = explode(',', $valor['minuto']);
            $saltar = 0;
            $tarjeta = 0;
            foreach ($x as $key => $value) {
                if (1 == $tarjeta && 0 == $value) {
                    $iconos = str_ireplace('tr', 'ta', $iconos);

                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                } else {
                    if (0 == $value) {
                        $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                    }
                    if (1 == $value) {
                        $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta2.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                    }
                    if (5 == $value) {
                        $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                    }
                }

                if (2 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (3 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="color:maroon;" class="iconseparate glyphicon glyphicon-arrow-right" title="'.$y[$key].'\'"></span>   ';
                }
                if (10 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="color:red"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (11 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="background-color:red; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span><span style="color:dimgray"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                if (9 == $value) {
                    $iconos .= ' '.$y[$key].'\' <span style="background-color:green; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span><span style="color:black"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                }
                //if ($value==4) { $iconos.=' '.$y[$key].'\' <span style="color:green;" class="iconseparate glyphicon glyphicon-arrow-left" title="'.$y[$key].'\'"></span>   '; }
                if ($value > 2 && $value < 5) {
                    if (isset($cambios[$y[$key]][$value])) {
                        if (isset($cambios[$y[$key] + 1][$value])) {
                            $cambios[$y[$key] + 2][$value] = $valor;
                        } else {
                            $cambios[$y[$key] + 1][$value] = $valor;
                        }
                    } else {
                        $cambios[$y[$key]][$value] = $valor;
                    }
                }

                if (4 == $value) {
                    $saltar = 1;
                }

                $tarjeta = $value;
            }
            if (1 == $saltar) {
                continue;
            }
            if (strlen($iconos) > 0) {
                $iconos = substr($iconos, 0, -3);
            }
            if (5 == $valor['posicion']) {
                echo "<div class='col-xs-12 row h25'></div>";
            } ?> 
        <div class="col-xs-12 text-right h40 clear txt11" style="border-bottom:1px solid dimgray">
         <span class="pull-left" style="color:<?php echo $txtCol; ?>"><i><?php echo $txtPos; ?></i></span>
         <a <?php echo $txtUrl; ?> href="/jugador.php?id=<?php echo $valor['jugador_id']; ?>"><?php echo $valor['nombreJugador']; ?></a>
         <br /><?php echo $iconos; ?> 
        </div>
        <?php
        }
        //imp($cambios);
        if (count($cambios) > 0) {
            ksort($cambios);
            unset($v);
            echo "<h4 class='text-center'>Sustituciones</h4>";
            foreach ($cambios as $k => $v) {
                ?>
            <div class="col-xs-12 text-left h40 clear txt11" style="border-bottom:1px solid dimgray">
                <?php 

                ksort($v);

                foreach ($v as $k1 => $valor) {
                    if (3 == $k1) {
                        $jugadorCambiado = $v[$k1]['nombreJugador'];
                        continue;
                    }

                    switch ($valor['posicion']) {
                        case '1':$txtPos = 'Por'; $txtCol = 'dimgray'; break;
                        case '2':$txtPos = 'Def'; $txtCol = 'orange'; break;
                        case '3':$txtPos = 'Med'; $txtCol = 'maroon'; break;
                        case '4':$txtPos = 'Del'; $txtCol = 'green'; break;
                        case '5':$txtPos = 'Ent'; $txtCol = 'black'; break;
                        default:$txtPos = '---'; break;
                    }
                    $iconos = '';
                    $x = explode(',', $valor['incidencia']);
                    $y = explode(',', $valor['minuto']);
                    $tarjeta = 0;
                    foreach ($x as $key => $value) {
                        if (1 == $tarjeta && 0 == $value) {
                            $iconos = str_ireplace('tr', 'ta', $iconos);

                            $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                        } else {
                            if (0 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                            if (1 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/ta2.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                            if (5 == $value) {
                                $iconos .= ' '.$y[$key].'\' <span class="iconseparate"><img src="/img/tr.png" title="'.$y[$key].'\'" height="17" style="margin-bottom:3px"></span>   ';
                            }
                        }

                        if (2 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (10 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="color:red"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (11 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="background-color:red; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span><span style="color:black"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (9 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="background-color:green; margin-right: -10px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span><span style="color:black"; class="iconseparate fa fa-futbol-o" title="'.$y[$key].'\'"></span>   ';
                        }
                        if (4 == $value) {
                            $iconos .= ' '.$y[$key].'\' <span style="color:green;" class="iconseparate glyphicon glyphicon-arrow-left" title="'.$y[$key].'\'"></span>   ';
                        }

                        $tarjeta = $value;
                    }
                    if (strlen($iconos) > 0) {
                        $iconos = substr($iconos, 0, -3);
                    } ?>
                <?php
                } ?>    
                    
                    <div class="col-xs-12 text-right nopadding h40 clear txt11" style="border-bottom:1px solid dimgray">
                     <span class="pull-left" style="color:<?php echo $txtCol; ?>"><i><?php echo $txtPos; ?></i></span>
                     <a href="/jugador.php?id=<?php echo $valor['jugador_id']; ?>"><?php echo $valor['nombreJugador']; ?></a>  <i>por <?php echo $jugadorCambiado; ?></i>
                     <br /><?php echo $iconos; ?> 
                    </div>
                    <div class="clear"></div>
                
            </div>
            <?php
            }
        } ?>
    </div>

    <br /><?php if ($partido['arbitro_id'] > 1) {
            ?>
            <div class="text-center">Árbitro : <span class="boldfont text-center">
            <a href="/arbitro.php?id=<?php echo $partido['arbitro_id']; ?>">
            <?php echo $partido['nombreArbitro']; ?> <?php echo $partido['apellidosArbitro']; ?>
            </a>
            </span></div>            
            <?php
        } ?>
            <div class="clear h25"></div>
</div>