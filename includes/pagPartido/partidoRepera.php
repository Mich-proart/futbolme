<?php for ($i = 0; $i < 2; ++$i) {
    if (0 == $i) {
        $repera1 = $repera[$e1];
        $etX = $et1;
    } else {
        unset($repera1);
        unset($repera1l);
        unset($repera1v);
        $repera1 = $repera[$e2];
        $etX = $et2;
    }

    $repera1l = array();
    $repera1v = array();

    foreach ($repera1 as $key => $value) {
        if (isset($value[0])) {
            $repera1l[$key] = $value[0];
        } else {
            $repera1v[$key] = $value[1];
        }
    }

    $gl = 0;
    $el = 0;
    $pl = 0;
    $gfl = 0;
    $gcl = 0;
    $jul = 0;
    $gv = 0;
    $ev = 0;
    $pv = 0;
    $gfv = 0;
    $gcv = 0;
    $juv = 0;

    $eXGl = 0;
    $eXEl = 0;
    $eXPl = 0;
    $eXGFl = 0;
    $eXGCl = 0;
    $golf = 0;
    $golc = 0;
    $pMinl = 0;
    $gMinl = 0;
    foreach ($repera1l as $key => $value) {
        if (3 == $value['PT']) {
            ++$eXGl;
        }
        if (1 == $value['PT']) {
            ++$eXEl;
        }
        if (0 == $value['PT']) {
            ++$eXPl;
        }
        $eXGFl = $eXGFl + $value['GF'];
        $eXGCl = $eXGCl + $value['GC'];
        if ($value['GF'] > 0) {
            ++$golf;
        }
        if ($value['GC'] > 0) {
            ++$golc;
        }
        if ($value['GF'] - $value['GC'] == 1) {
            ++$gMinl;
        }
        if ($value['GC'] - $value['GF'] == 1) {
            ++$pMinl;
        }
        if ($key > (count($repera1) - 6)) {
            if (3 == $value['PT']) {
                ++$gl;
            }
            if (1 == $value['PT']) {
                ++$el;
            }
            if (0 == $value['PT']) {
                ++$pl;
            }
            $gfl = $gfl + $value['GF'];
            $gcl = $gcl + $value['GC'];
            ++$jul;
        }
    }

    $eXGv = 0;
    $eXEv = 0;
    $eXPv = 0;
    $eXGFv = 0;
    $eXGCv = 0;
    $govf = 0;
    $govc = 0;
    $pMinv = 0;
    $gMinv = 0;
    foreach ($repera1v as $key => $value) {
        if (3 == $value['PT']) {
            ++$eXGv;
        }
        if (1 == $value['PT']) {
            ++$eXEv;
        }
        if (0 == $value['PT']) {
            ++$eXPv;
        }
        $eXGFv = $eXGFv + $value['GF'];
        $eXGCv = $eXGCv + $value['GC'];
        if ($value['GF'] > 0) {
            ++$govf;
        }
        if ($value['GC'] > 0) {
            ++$govc;
        }
        if ($value['GC'] - $value['GF'] == 1) {
            ++$pMinv;
        }
        if ($value['GF'] - $value['GC'] == 1) {
            ++$gMinv;
        }
        if ($key > (count($repera1) - 6)) {
            if (3 == $value['PT']) {
                ++$gv;
            }
            if (1 == $value['PT']) {
                ++$ev;
            }
            if (0 == $value['PT']) {
                ++$pv;
            }
            $gfv = $gfv + $value['GF'];
            $gcv = $gcv + $value['GC'];
            ++$juv;
        }
    }

    if (0 == $i) {
        ?>
<div class="col-xs-12 col-sm-6">
<br />En liga, el <?php echo $etX; ?> ha jugado <b><?php echo count($repera1l); ?> partidos como local</b>.
<?php if ($eXGl > 0) {
            ?>
  <br />Ha ganado <?php echo $eXGl; ?>
  <?php if ($gMinl > 0) {
                ?>
  &nbsp;(<?php if ($gMinl == $eXGl) {
                    echo 'los ';
                }
                echo $gMinl; ?> por la mínima).
  <?php
            } ?>
<?php
        } else {
            ?>
  <br />Todavía no ha ganado ningún partido.
<?php
        } ?>
<br />Ha empatado <?php echo $eXEl; ?>.

<?php if (0 == $eXPl) {
            ?>
<br />Todavía no ha perdido ningún partido.
<?php
        } else {
            ?>
<br />Ha perdido <?php echo $eXPl; ?>
<?php
        } ?>


<?php if ($pMinl > 0) {
            ?>
&nbsp;(<?php if ($pMinl == $eXPl) {
                echo 'los ';
            }
            echo $pMinl; ?> por la mínima).
<?php
        } ?>

<br />Ha metido <?php echo $eXGFl; ?> goles,
consiguiendo marcar 
<?php if ($golf == count($repera1l)) {
            ?>
en todos los partidos.
<?php
        } else {
            ?>
algún gol en <?php echo $golf; ?> partidos.
dejándolo de hacer en <?php echo count($repera1l) - $golf; ?> de ellos.
<?php
        } ?>

<br />Ha encajado <?php echo $eXGCl; ?> goles, recibiendo algún gol en <?php echo $golc; ?> partidos.
Ha mantenido su puerta a cero en <?php echo count($repera1l) - $golc; ?> partidos.
<?php
    }

    if (1 == $i) {
        ?>
<div class="col-xs-12 col-sm-6">
<br />En liga, el <?php echo $etX; ?> ha jugado <b><?php echo count($repera1v); ?> partidos como visitante.</b>

<?php if ($eXGv > 0) {
            ?>
  <br />Ha ganado <?php echo $eXGv; ?>
  <?php if ($gMinv > 0) {
                ?>
  &nbsp;(<?php if ($gMinv == $eXGv) {
                    echo 'los ';
                }
                echo $gMinv; ?> por la mínima).
  <?php
            } ?>
<?php
        } else {
            ?>
  <br />Todavía no ha ganado ningún partido.
<?php
        } ?>

<br />Ha empatado <?php echo $eXEv; ?>.
<br />Ha perdido <?php echo $eXPv; ?>
<?php if ($pMinv > 0) {
            ?>
&nbsp;(<?php if ($pMinv == $eXPv) {
                echo 'los ';
            }
            echo $pMinv; ?> por la mínima).
<?php
        } ?>

<br />Ha metido <?php echo $eXGFv; ?> goles,
consiguiendo marcar algún gol en <?php echo $govf; ?> partidos.
dejándolo de hacer en <?php echo count($repera1v) - $govf; ?> de ellos.
<br />Ha encajado <?php echo $eXGCv; ?> goles, recibiendo algún gol en <?php echo $govc; ?> partidos.
Ha mantenido su puerta a cero en <?php echo count($repera1v) - $govc; ?> partidos.
<?php
    } ?>

<table class="table table-bordered table-condensed whitebox nomargin txt11 text-center" style="border: 1px solid #000;">

<tr>
    <td colspan="5"><?php if (0 == $i) {
        echo 'Local';
    } else {
        echo 'Visitante';
    } ?></td>
    <td colspan="2">Ult. 6</td>   
</tr>
<tr>
    <td colspan="3">Temporada</td>
    <td colspan="2">Ult. 6</td>
    <td colspan="2">Todos</td>   
</tr>

<?php 
if (0 == $i) {
    $gg1 = $gl;
    $gg2 = $gv;
    $yG = $eXGl;
    $cc = count($repera1l);
    $ju = $jul;
} else {
    $gg1 = $gv;
    $gg2 = $gl;
    $yG = $eXGv;
    $cc = count($repera1v);
    $ju = $juv;
}
    if ($yG > 0) {
        $percentG = ($yG * 100) / $cc;
    }
    if ($gg1 > 0) {
        $percentGa = ($gg1 * 100) / $ju;
    }
    if (($gg1 + $gg2) > 0) {
        $percentGb = (($gg1 + $gg2) * 100) / 6;
    }

    if (!isset($percentGa)) {
        $percentGa = 0;
    }
    if (!isset($percentEa)) {
        $percentEa = 0;
    }
    if (!isset($percentPa)) {
        $percentPa = 0;
    }
    if (!isset($percentGFa)) {
        $percentGFa = 0;
    }
    if (!isset($percentGCa)) {
        $percentGCa = 0;
    }
    if (!isset($percentEb)) {
        $percentEb = 0;
    }
    if (!isset($percentGb)) {
        $percentGb = 0;
    }
    if (!isset($percentPb)) {
        $percentPb = 0;
    }

    if (isset($percentG)) {
        ?>
<tr style="border: 2px solid green;">
    <td>G</td>
    <td style="background-color:#81F79F"><?php echo $yG; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format(($percentG), 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo $gg1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format(($percentGa), 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo $gg1 + $gg2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format(($percentGb), 2); ?></td>
</tr>
<?php
    }

    if (0 == $i) {
        $ee1 = $el;
        $ee2 = $ev;
        $yE = $eXEl;
    } else {
        $ee1 = $ev;
        $ee2 = $el;
        $yE = $eXEv;
    }
    if ($yE > 0) {
        $percentE = ($yE * 100) / $cc;
    }
    if ($ee1 > 0) {
        $percentEa = ($ee1 * 100) / $ju;
    }
    if (($ee1 + $ee2) > 0) {
        $percentEb = (($ee1 + $ee2) * 100) / 6;
    }
    //hay que poner
    if (isset($percentE)) {
        ?>
<tr style="border: 2px solid orange;">
    <td>E</td>
    <td style="background-color:#81F79F"><?php echo $yE; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format(($percentE), 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo $ee1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format(($percentEa), 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo $ee1 + $ee2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format(($percentEb), 2); ?></td>
</tr>
<?php
    }

    if (0 == $i) {
        $pp1 = $pl;
        $pp2 = $pv;
        $yP = $eXPl;
    } else {
        $pp1 = $pv;
        $pp2 = $pl;
        $yP = $eXPv;
    }
    if ($yP > 0) {
        $percentP = ($yP * 100) / $cc;
    }
    if ($pp1 > 0) {
        $percentPa = ($pp1 * 100) / $ju;
    }
    if (($pp1 + $pp2) > 0) {
        $percentPb = (($pp1 + $pp2) * 100) / 6;
    }
    if (isset($percentP)) {
        ?>
<tr style="border: 2px solid red;">
    <td>P</td>
    <td style="background-color:#81F79F"><?php echo $yP; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format(($percentP), 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo $pp1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format(($percentPa), 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo $pp1 + $pp2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format(($percentPb), 2); ?></td>
</tr>
<?php
    }

    if (0 == $i) {
        $ggf1 = $gfl;
        $ggf2 = $gfv;
        $yGF = $eXGFl;
    } else {
        $ggf1 = $gfv;
        $ggf2 = $gfl;
        $yGF = $eXGFv;
    }
    if ($yGF > 0) {
        $percentGF = $yGF / $cc;
    }
    if ($ggf1 > 0) {
        $percentGFa = $ggf1 / $ju;
    }
    if (($ggf1 + $ggf2) > 0) {
        $percentGFb = (($ggf1 + $ggf2) / 6);
    }

    if (isset($percentGF)) {
        ?>
<tr style="border: 2px solid navy;">
    <td>GF</td>
    <td style="background-color:#81F79F"><?php echo $yGF; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format($percentGF, 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo $ggf1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format($percentGFa, 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo $ggf1 + $ggf2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format($percentGFb, 2); ?></td>
</tr>
<?php
    }

    if (0 == $i) {
        $ggc1 = $gcl;
        $ggc2 = $gcv;
        $yGC = $eXGCl;
    } else {
        $ggc1 = $gcv;
        $ggc2 = $gcl;
        $yGC = $eXGCv;
    }
    if ($yGC > 0) {
        $percentGC = $yGC / $cc;
    }
    if ($ggc1 > 0) {
        $percentGCa = $ggc1 / $ju;
    }
    if (($ggc1 + $ggc2) > 0) {
        $percentGCb = (($ggc1 + $ggc2) / 6);
    }

    if (isset($percentGC)) {
        ?>
<tr style="border: 2px solid black;">
    <td>GC</td>
    <td style="background-color:#81F79F"><?php echo $yGC; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format($percentGC, 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo $ggc1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format($percentGCa, 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo $ggc1 + $ggc2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format($percentGCb, 2); ?></td>
</tr>
<?php
    }
    if (($yG + $yE + $yP) > 0) {
        ?>

<tr style="border: 2px solid dimgray;">
    <td>PTS</td>
    <td style="background-color:#81F79F"><?php echo($yG * 3) + $yE; ?></td>
    <td style="background-color:#81F79F"><?php echo number_format((($yG * 3) + $yE) / $cc, 2); ?></td>
    <td style="background-color:#F5D0A9"><?php echo($gg1 * 3) + $ee1; ?></td>
    <td style="background-color:#F5D0A9"><?php echo number_format((($gg1 * 3) + $ee1) / $ju, 2); ?></td>
    <td style="background-color:#CEE3F6"><?php echo(($gg1 + $gg2) * 3) + $ee1 + $ee2; ?></td>
    <td style="background-color:#CEE3F6"><?php echo number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2); ?></td>
</tr>
<?php
    } ?>
</table>
<?php
if (!isset($percentE)) {
        $percentE = 0;
    }
    if (!isset($percentP)) {
        $percentP = 0;
    }
    if (!isset($percentGF)) {
        $percentGF = 0;
    }
    if (!isset($percentGC)) {
        $percentGC = 0;
    }

    if (isset($percentG)) {
        if ($percentG > $percentE && $percentG > $percentP) {
            $percentT = $percentG;
            $TitPercent = number_format($percentT, 2).'% de ganar';
            $modelo = 1;
        }
        if ($percentE > $percentG && $percentE > $percentP) {
            $percentT = $percentE;
            $TitPercent = number_format($percentT, 2).'% de empatar';
            $modelo = 2;
        }
        if ($percentP > $percentE && $percentP > $percentG) {
            $percentT = $percentP;
            $TitPercent = number_format($percentT, 2).'% de perder';
            $modelo = 3;
        }
        if ($percentG == $percentE && $percentE > $percentP) {
            $percentT = $percentG;
            $TitPercent = number_format($percentT, 2).'% de ganar o empatar';
            $modelo = 4;
        }
        if ($percentE == $percentP && $percentE > $percentG) {
            $percentT = $percentE;
            $TitPercent = number_format($percentT, 2).'% de empatar o perder';
            $modelo = 5;
        }
        if ($percentG == $percentP && $percentG > $percentE) {
            $percentT = $percentG;
            $TitPercent = number_format($percentT, 2).'% de posibilidades de ganar o perder';
            $modelo = 6;
        }
        if ($percentG == $percentP && $percentP == $percentE) {
            $percentT = $percentG;
            $TitPercent = number_format($percentT, 2).'% cualquier resultado es posible';
            $modelo = 7;
        }

        $pronosticoFM[$i]['todos']['valor'] = number_format($percentT, 2);
        $pronosticoFM[$i]['todos']['modelo'] = $modelo;
        $pronosticoFM[$i]['todos']['gf'] = number_format($percentGF, 2);
        $pronosticoFM[$i]['todos']['gc'] = number_format($percentGC, 2);
        if ((($yG * 3) + $yE) > 0) {
            $pronosticoFM[$i]['todos']['ptos'] = number_format((($yG * 3) + $yE) / $cc, 2);
        } else {
            $pronosticoFM[$i]['todos']['ptos'] = 0;
        }

        echo '<div  style="background-color:#81F79F; padding:5px"';
        if (0 == $i) {
            echo '<h6>Contando todos los resultados como local desde el inicio de la liga</h6>';
        } else {
            echo '<h6>Contando todos los resultados como visitante desde el inicio de la liga</h6>';
        }
        echo '<br /><b>'.$TitPercent.'</b>';
        echo '<br />Goles a favor: '.number_format($percentGF, 2).'<br />Goles en contra: '.number_format($percentGC, 2);
        echo '<br />Ha conseguido '.(($yG * 3) + $yE).' puntos sobre '.($cc * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['todos']['ptos']).' puntos por partido.';
        echo '</div>';
    }

    $percentT = 0;
    $percentG = 0;
    $percentE = 0;
    $percentP = 0;
    $TitPercent = '';
    $percentGF = 0;
    $percentGC = 0;
    $modelo = 0;

    if (isset($percentGa)) {
        if ($percentGa > $percentEa && $percentGa > $percentPa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de ganar';
            $modelo = 1;
        }
        if ($percentEa > $percentGa && $percentEa > $percentPa) {
            $percentTa = $percentEa;
            $TitPercenta = number_format($percentTa, 2).'% de empatar';
            $modelo = 2;
        }
        if ($percentPa > $percentEa && $percentPa > $percentGa) {
            $percentTa = $percentPa;
            $TitPercenta = number_format($percentTa, 2).'% de perder';
            $modelo = 3;
        }
        if ($percentGa == $percentEa && $percentEa > $percentPa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de ganar o empatar';
            $modelo = 4;
        }
        if ($percentEa == $percentPa && $percentEa > $percentGa) {
            $percentTa = $percentEa;
            $TitPercenta = number_format($percentTa, 2).'% de empatar o perder';
            $modelo = 5;
        }
        if ($percentGa == $percentPa && $percentGa > $percentEa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de posibilidades de ganar o perder';
            $modelo = 6;
        }
        if ($percentGa == $percentPa && $percentPa == $percentEa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% cualquier resultado es posible';
            $modelo = 7;
        }

        $pronosticoFM[$i]['6local']['valor'] = number_format($percentTa, 2);
        $pronosticoFM[$i]['6local']['modelo'] = $modelo;
        $pronosticoFM[$i]['6local']['gf'] = number_format($percentGFa, 2);
        $pronosticoFM[$i]['6local']['gc'] = number_format($percentGCa, 2);
        if ((($gg1 * 3) + $ee1) > 0) {
            $pronosticoFM[$i]['6local']['ptos'] = number_format((($gg1 * 3) + $ee1) / $ju, 2);
        } else {
            $pronosticoFM[$i]['6local']['ptos'] = 0;
        }

        echo '<div style="background-color:#F5D0A9; padding:5px"';
        if (0 == $i) {
            echo '<h6>Contando los resultados como local en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
        } else {
            echo '<h6>Contando los resultados como visitante en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
        }
        echo '<br /><b>'.$TitPercenta.'</b>';
        echo '<br />Goles a favor: '.number_format($percentGFa, 2).'<br />Goles en contra: '.number_format($percentGCa, 2);
        echo '<br />Ha conseguido '.(($gg1 * 3) + $ee1).' puntos sobre '.($ju * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['6local']['ptos']).' puntos por partido.';
        echo '</div>';
    }
    $percentTa = 0;
    $percentGa = 0;
    $percentEa = 0;
    $percentPa = 0;
    $TitPercenta = '';
    $percentGFa = 0;
    $percentGCa = 0;
    $modelo = 0;

    if (!isset($percentEb)) {
        $percentEb = 0;
    }
    if (!isset($percentPb)) {
        $percentPb = 0;
    }
    if (!isset($percentGFb)) {
        $percentGFb = 0;
    }
    if (!isset($percentGCb)) {
        $percentGCb = 0;
    }

    if (isset($percentGb)) {
        if ($percentGb > $percentEb && $percentGb > $percentPb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de ganar';
            $modelo = 1;
        }
        if ($percentEb > $percentGb && $percentEb > $percentPb) {
            $percentTb = $percentEb;
            $TitPercentb = number_format($percentTb, 2).'% de empatar';
            $modelo = 2;
        }
        if ($percentPb > $percentEb && $percentPb > $percentGb) {
            $percentTb = $percentPb;
            $TitPercentb = number_format($percentTb, 2).'% de perder';
            $modelo = 3;
        }
        if ($percentGb == $percentEb && $percentEb > $percentPb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de ganar o empatar';
            $modelo = 4;
        }
        if ($percentEb == $percentPb && $percentEb > $percentGb) {
            $percentTb = $percentEb;
            $TitPercentb = number_format($percentTb, 2).'% de empatar o perder';
            $modelo = 5;
        }
        if ($percentGb == $percentPb && $percentGb > $percentEb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de posibilidades de ganar o perder';
            $modelo = 6;
        }
        if ($percentGb == $percentPb && $percentPb == $percentEb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% cualquier resultado es posible';
            $modelo = 7;
        }

        $pronosticoFM[$i]['6todos']['valor'] = number_format($percentTb, 2);
        $pronosticoFM[$i]['6todos']['modelo'] = $modelo;
        $pronosticoFM[$i]['6todos']['gf'] = number_format($percentGFb, 2);
        $pronosticoFM[$i]['6todos']['gc'] = number_format($percentGCb, 2);
        $pronosticoFM[$i]['6todos']['ptos'] = number_format(((($gg1 + $gg2) * 3) + ($ee1 + $ee1)) / 6, 2);

        echo '<div style="background-color:#CEE3F6; padding:5px"';
        if (0 == $i) {
            echo '<h6>Contando todos los resultados de las últimas 6 jornadas</h6>';
        } else {
            echo '<h6>Contando todos los resultados de las últimas 6 jornadas</h6>';
        }
        echo '<br /><b>'.$TitPercentb.'</b>';
        echo '<br />Goles a favor: '.number_format($percentGFb, 2).'<br />Goles en contra: '.number_format($percentGCb, 2);
        echo '<br />Ha conseguido '.((($gg1 + $gg2) * 3) + $ee1 + $ee2).' puntos sobre '.(6 * 3).' posibles, lo que da una proporción de '.number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2).' puntos por partido.';
        echo '</div>';
    }
    $percentTb = 0;
    $percentGb = 0;
    $percentEb = 0;
    $percentPb = 0;
    $TitPercentb = '';
    $percentGFb = 0;
    $percentGCb = 0;
    $modelo = 0; ?>
</div>

<?php
}

$txtDef = 'el empate';

//imp($pronosticoFM);
if (count($pronosticoFM) > 1) {
    if (isset($pronosticoFM[0]['todos'])) {
        $gfFMt = ($pronosticoFM[0]['todos']['gf'] - $pronosticoFM[0]['todos']['gc']);
        $gcFMt = ($pronosticoFM[1]['todos']['gf'] - $pronosticoFM[1]['todos']['gc']);
    } else {
        $gfFMt = 0;
        $gcFMt = 0;
    }

    if (isset($pronosticoFM[0]['6local'])) {
        $gfFM6 = ($pronosticoFM[0]['6local']['gf'] - $pronosticoFM[0]['6local']['gc']);
        $gcFM6 = ($pronosticoFM[1]['6local']['gf'] - $pronosticoFM[1]['6local']['gc']);
    } else {
        $gfFM6 = 0;
        $gcFM6 = 0;
    }

    if (isset($pronosticoFM[0]['6todos'])) {
        $gfFMt6 = ($pronosticoFM[0]['6todos']['gf'] - $pronosticoFM[0]['6todos']['gc']);
        $gcFMt6 = ($pronosticoFM[1]['6todos']['gf'] - $pronosticoFM[1]['6todos']['gc']);
    } else {
        $gfFMt6 = 0;
        $gcFMt6 = 0;
    }

    //for

    /* esto que no se vea de momento?>
    <hr />

    <table class="table table-bordered table-condensed whitebox nomargin txt11 text-center" style="border: 1px solid #000;">
    <tr>
        <td></td>
        <td>Goles <?php echo $et1?> como local</td>
        <td>Goles <?php echo $et2?> como visitante</td>
        <td>Puntos <?php echo $et1?> como local</td>
        <td>Puntos <?php echo $et2?> como visitante</td>
    </tr>

    <tr>
        <td>Todos</td>
        <td><?php echo $gfFMt?></td>
        <td><?php echo $gcFMt?></td>
        <td><?php echo $pronosticoFM[0]['todos']['ptos']?></td>
        <td><?php echo $pronosticoFM[1]['todos']['ptos']?></td>
    </tr>

    <tr>
        <td>Últimas 6 jornadas</td>
        <td><?php echo $gfFM6?></td>
        <td><?php echo $gcFM6?></td>
        <td><?php echo $pronosticoFM[0]['6local']['ptos']?></td>
        <td><?php echo $pronosticoFM[1]['6local']['ptos']?></td>
    </tr>
    </table>

    <table class="table table-bordered table-condensed whitebox nomargin txt11 text-center" style="border: 1px solid #000;">
    <tr>
        <td></td>
        <td>Goles <?php echo $et1?></td>
        <td>Goles <?php echo $et2?></td>
        <td>Puntos <?php echo $et1?></td>
        <td>Puntos <?php echo $et2?></td>
    </tr>

    <tr>
        <td>Últimas 6 jornadas (local y visitante)</td>
        <td><?php echo $gfFMt6?></td>
        <td><?php echo $gcFMt6?></td>
        <td><?php echo $pronosticoFM[0]['6todos']['ptos']?></td>
        <td><?php echo $pronosticoFM[1]['6todos']['ptos']?></td>
    </tr>

    </table>
    <?php
    */
    if (isset($pronosticoFM[0]['todos']) && isset($pronosticoFM[0]['6local'])) {
        $pl = $pronosticoFM[0]['todos']['ptos'] + $pronosticoFM[0]['6local']['ptos'];
        $pv = $pronosticoFM[1]['todos']['ptos'] + $pronosticoFM[1]['6local']['ptos'];
    } else {
        $pl = 0;
        $pv = 0;
    }
    if ($pl > $pv) {
        $txt = ' Gana el local';
    }
    if ($pl < $pv) {
        $txt = ' Gana el visitante';
    }

    $rl = $gfFM6 + $gfFMt;
    $rv = $gcFM6 + $gcFMt;
    if ($rl > $rv) {
        $txt1 = ' Gana el local';
    }
    if ($rl < $rv) {
        $txt1 = ' Gana el visitante';
    }

    $total = (($pl - $pv) + ($rl - $rv));
    $txtDef = '';
    if ($total > 0.99) {
        $txtDef = 'la victoria del '.$et1;
    }
    if ($total < -1) {
        $txtDef = 'la victoria del '.$et2;
    }
    if ($total > -0.99 && $total < 1) {
        if (isset($pronosticoFM[0]['6todos']) && isset($pronosticoFM[1]['6todos'])) {
            $l = $pronosticoFM[0]['6todos']['modelo'];
            $v = $pronosticoFM[1]['6todos']['modelo'];
        } else {
            $l = 0;
            $v = 0;
        }
        if (isset($e1Clas) && isset($e2Clas)) {
            if ($e1Clas['posicion'] > $e2Clas['posicion']) {
                $txtDef = 'la victoria del '.$et2;
            }
            if ($e1Clas['posicion'] < $e2Clas['posicion']) {
                $txtDef = 'la victoria del '.$et1;
            }
            if (($e1Clas['posicion'] - $e2Clas['posicion']) < 5
            && ($e1Clas['posicion'] - $e2Clas['posicion']) > -5) {
                $txtDef = 'el empate';
            }
        }
    }
    /*Puntos : <?php echo $txt; ?> (<?php echo $pl; ?> - <?php echo $pv; ?> : <b><?php echo ($pl-$pv); ?></b>) - Goles : <?php echo $txt1; ?>  (<?php echo number_format($rl,2); ?> - <?php echo number_format($rv,2); ?> : <b><?php echo number_format(($rl-$rv),2);?></b>)
     <span style="color:blue"><?php echo number_format(($pl-$pv)+($rl-$rv),2);?></span>
    */
}

if (1 == $invertido) {
    ?>


<div style="clear:both"></div>
<div class="marco text-center" style="padding:20px;">
<h4 class="text-center">Futbolme pronostica <?php echo $txtDef; ?> para este partido.</h4>
 ahora, con toda esta información, tu decides por quien apostar... 
     <div><!--Please note that changes to this code are not permitted. Should the code be manipulated in any way, bwin.party partners reserves the right to block the account.-->
            <?php include $nivel.'includes/publicidad/derecha03.php'; ?>
    </div>
</div>
<?php
} ?>
