<?php 
$nC=$partido['nombreComunidad'];
$nP=$partido['nombrePais'];
$enlace = '/resultados-directo/torneo/';
if ('SIN COMUNIDAD' != $nC) {
    $nC .= '-';
} else {
    $nC = '';
}
if ('España' == $nP) {
    $nP = '';
} else {
    $nP .= '-';
}
$enlace_torneo = $enlace.poner_guion($nC.$nP.$partido['nombreTorneo']).'/'.$partido['temporada_id'].'/'; ?>
<div class="col-xs-12 <?php echo $fondoCabecera; ?> one-bordergrey-vert h40">

    <div style="float:left; width:40px" <?php
    if ($partido['idComunidad'] > 1) {
    $imagen = $partido['idComunidad'];
    $nombreCom = '';
    if ($partido['temporada_id'] < 25
        || 266 == $partido['temporada_id']
        || 267 == $partido['temporada_id']
        || 34 == $partido['temporada_id']
        || 35 == $partido['temporada_id']
    ) {
        if (10 == $partido['idComunidad']) {
            $nombreCom = $nombreCom.' Y MELILLA';
            $imagen = 55;
        }
        if (11 == $partido['idComunidad']) {
            $nombreCom = $nombreCom.' Y CEUTA';
            $imagen = 56;
        }
    } ?> class="flagbox comunidad flag<?php echo $imagen; ?>"> </div>
    <?php } else { ?> 
        class="flagbox pais flag<?php echo $partido['idPais']; ?>b"></div>
<?php
} ?>

<div style="float:left; margin-left:10px; margin-top: 3px">
    
    <a href="<?php echo $enlace_torneo; ?>" style="color: <?php echo $colorCabecera; ?>;">
        <?php
        $txtnombreTorneo = $partido['nombreTorneo'];
        $txttraduccion = $partido['traduccion'];

        if (60 != $partido['idPais'] && 199 != $partido['idPais'] && 200 != $partido['idPais'] && 201 != $partido['idPais']) {
            $txttraduccion = $partido['nombrePais'];
        } ?>
        <h2 class="tname hidden-xs" style="margin: 0; font-size: 16px"><?php echo $txtnombreTorneo; ?><br>
            <span class="txt11">
                <?php if (!empty($txttraduccion)) { echo "<i>$txttraduccion</i>"; } ?>
            </span>
        </h2>

        <span class="tname visible-xs txt11"><?php echo $partido['torneoCorto']; ?></span>
        <?php
        if (!empty($txttraduccion)) {
            echo '<div class="txt11 visible-xs" style="margin-top: -3px; font-weight: normal !important;">';
            echo "<i>$txttraduccion</i>";
            echo '</div>';
        }
        ?>
    </a>

</div>




</div>