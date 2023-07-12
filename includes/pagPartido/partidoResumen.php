<div class="col-xs-12 nopadding">


<div class="col-xs-6">


<?php 
$colordiv = 'white';
$maximo = 0;
$ar1 = '{y: '.$eGl.",
    color: 'green'},
    {y: ".$eEl.",
    color: 'orange'},
    {y: ".$ePl.",
    color: 'red'}";

$ar2 = '{y: '.$eGv.",
    color: '#58FA82'},
    {y: ".$eEv.",
    color: '#F5DA81'},
    {y: ".$ePv.",
    color: '#F78181'}";

if ($eGl + $eGv > $maximo) {
    $maximo = $eGl + $eGv;
}
if ($eEl + $eEv > $maximo) {
    $maximo = $eEl + $eEv;
}
if ($ePl + $ePv > $maximo) {
    $maximo = $ePl + $ePv;
}
$maximo = $maximo + 1;

$contenedor = $equipo_id; $tipo = 'column'; $a = "'<b>Victorias</b>', '<b>Empates</b>', '<b>Derrotas</b>'";
?>


<?php include $nivel.'includes/graficos/columnaGEP.php'; ?>
<hr /><h4 class="text-center boldfont">Partidos</h4>

<div id="c-<?php echo $equipo_id; ?>" style="float:right; width: 200px; height: 200px; margin: 0 auto; background-color:<?php echo $colordiv; ?>; margin:5px"></div>

</div>

<div class="col-xs-6">

        <?php

$maximo = 0;
$ar1 = '{y: '.$eGFl.",
    color: '#0489B1'},
    {y: ".$eGCl.",
    color: '#A4A4A4'}";

$ar2 = '{y: '.$eGFv.",
    color: '#0B4C5F'},
    {y: ".$eGCv.",
    color: '#585858'}";

if ($eGFl + $eGFv > $maximo) {
    $maximo = $eGFl + $eGFv;
}
if ($eGCl + $eGCv > $maximo) {
    $maximo = $eGCl + $eGCv;
}
$maximo = $maximo + 1;
$contenedor = 'goles-'.$equipo_id; $tipo = 'column'; $a = "'<b>A favor</b>', '<b>En contra</b>'";
?>
<?php include $nivel.'includes/graficos/columnaGEP.php'; ?>
<hr /><h4 class="text-center boldfont">Goles</h4>
<div id="c-<?php echo $contenedor; ?>" style="float:left; width: 150px; height: 200px; margin: 0 auto background-color:<?php echo $colordiv; ?>; margin:5px"></div>

</div>
</div>
<div class="clear"></div>
<div class="col-xs-12 marco">
    

    El <b><?php echo $equipotxt; ?></b>
        <?php if (0 == $eGl && 0 == $eGv) {
    ?>
        no ha ganado ningún partido,
        <?php
} ?>
        <?php if (1 == $eGl && 0 == $eGv) {
        ?>
        solo ha ganado <b>1</b> partido en casa,
        <?php
    } ?>
        <?php if (0 == $eGl && 1 == $eGv) {
        ?>
        solo ha ganado <b>1</b> partido como visitante,
        <?php
    } ?>
        <?php if (1 == $eGl && 1 == $eGv) {
        ?>
        ha ganado <b>2</b> partidos, uno como local y otro como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && 0 == $eGv) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos, todos como local,
        <?php
    } ?>
        <?php if (0 == $eGl && $eGv > 1) {
        ?>
        ha ganado <b><?php echo $eGv; ?></b> partidos, todos como visitante,
        <?php
    } ?>
        <?php if (1 == $eGl && $eGv > 1) {
        ?>
        ha ganado <b>1</b> partido como local y <b><?php echo $eGv; ?></b> como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && 1 == $eGv) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b>1</b> como visitante,
        <?php
    } ?>
        <?php if ($eGl > 1 && $eGv > 1) {
        ?>
        ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b><?php echo $eGv; ?></b> como visitante,
        <?php
    } ?>

        <?php if (0 == $eEl && 0 == $eEv) {
        ?>
        no ha empatado ningún partido
        <?php
    } ?>
        <?php if (1 == $eEl && 0 == $eEv) {
        ?>
        ha empatado <b>1</b> partido en casa
        <?php
    } ?>
        <?php if (0 == $eEl && 1 == $eEv) {
        ?>
        solo ha empatado <b>1</b> partido como visitante
        <?php
    } ?>
        <?php if (1 == $eEl && 1 == $eEv) {
        ?>
        ha empatado <b>2</b> partidos, uno como local y otro como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && 0 == $eEv) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos, todos como local
        <?php
    } ?>
        <?php if (0 == $eEl && $eEv > 1) {
        ?>
        ha empatado <b><?php echo $eEv; ?></b> partidos, todos como visitante
        <?php
    } ?>
        <?php if (1 == $eEl && $eEv > 1) {
        ?>
        ha empatado <b>1</b> partido como local y <b><?php echo $eEv; ?></b> como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && 1 == $eEv) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b>1</b> como visitante
        <?php
    } ?>
        <?php if ($eEl > 1 && $eEv > 1) {
        ?>
        ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b><?php echo $eEv; ?></b> como visitante
        <?php
    } ?>

        <?php
        //imp($ePl);imp($ePv);
        if (0 == $ePl && 0 == $ePv) {
            ?>
        y no ha perdido ningún partido.
        <?php
        } ?>
        <?php if (1 == $ePl && 0 == $ePv) {
            ?>
        y ha perdido <b>1</b> partido en casa.
        <?php
        } ?>
        <?php if (0 == $ePl && 1 == $ePv) {
            ?>
        y solo ha perdido <b>1</b> partido como visitante.
        <?php
        } ?>
        <?php if (1 == $ePl && 1 == $ePv) {
            ?>
        y ha perdido <b>2</b> partidos, uno como local y otro como visitante.
        <?php
        } ?>
        <?php if ($ePl > 1 && 0 == $ePv) {
            ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos, todos como local.
        <?php
        } ?>
        <?php if (0 == $ePl && $ePv > 1) {
            ?>
        y ha perdido <b><?php echo $ePv; ?></b> partidos, todos como visitante.
        <?php
        } ?>
        <?php if (1 == $ePl && $ePv > 1) {
            ?>
        y ha perdido <b>1</b> partido como local y <b><?php echo $ePv; ?></b> como visitante.
        <?php
        } ?>
        <?php if ($ePl > 1 && 1 == $ePv) {
            ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b>1</b> como visitante.
        <?php
        } ?>
        <?php if ($ePl > 1 && $ePv > 1) {
            ?>
        y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b><?php echo $ePv; ?></b> como visitante.
        <?php
        } ?>

        <br />Respecto a goles, ha metido <b><?php echo $eGFl; ?></b> goles en casa y <b><?php echo $eGFv; ?></b> fuera. Por contra ha
        encajado <b><?php echo $eGCl; ?></b> goles en casa y <b><?php echo $eGCv; ?></b> goles fuera.


</div>


<?php
/*
imp("@".$partido['twitter_local']);
imp("@".$partido['twitter_visitante']);
imp("https://futbolme.com".$_SERVER['REQUEST_URI']);
*/
?>
