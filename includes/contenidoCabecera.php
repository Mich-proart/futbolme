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



<?php /* if (0 != $partido['apuesta_torneo']) {
    $enlace_bwin = 'https://sports.bwin.es/es/sports#eventId=&leagueIds='.$partido['apuesta_torneo'].'&marketGroupId=&page=0&sportId=4&zoneId=1789262';

    $enlace_bwin2 = 'https://sports.m.bwin.es/es/sports/sport/4/region/'.$partido['id_bwin'].'/league/'.$partido['apuesta_torneo'].'?zoneId=1651972'; ?>
    <div style="float:right;">
            <span style="font-size:14px;">
			<a href="<?php echo $enlace_bwin; ?>" rel="nofollow" target="blank"
               title="Apuesta a los partidos de <?php echo $txtnombreTorneo; ?> en BWIN">				
				<img alt="Proovedor Apuestas" src="/img/partners/bwinpq.png" class="pull-right visible-xs"  style=" margin-right:-14px">
			</a>
		</span>
    </div>
    <?php
} */?>



</div>

<?php /*
<div class="clear col-xs-12 one-bordergrey-vert">

    <div class="col-xs-12 whitebox nopadding">
    <?php 
    $corona=explode(',', $partido['corona']);?>

    <table class="table">
        <?php if ($_SESSION['app']==1){ ?>
                <tr><td colspan="5">
                    <?php if ($partido['idComunidad']>1){ 
            $uCorona='https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Spain'?>
            El coronavirus en <?php echo $partido['nombreComunidad']?>
            <br /><a href="/covides.php" class="boldfont">Todas las comunidades</a>
            <?php } else { 
            $uCorona='https://en.wikipedia.org/wiki/Template:2019%E2%80%9320_coronavirus_pandemic_data'?>
            El coronavirus en <?php echo $partido['nombrePais']?>
            <br /><a href="/covid.php" class="boldfont">Todos los paises afectados</a>
            <?php } ?>
            <span class="pull-right"><i>Fuente: <a href="<?php echo $uCorona?>" target="_blank">Wikipedia</a></i></span>
                    
                </td></tr>
        <?php } ?>
        <tr>
            <?php if ($_SESSION['app']==0){ ?>
                <td class="boldfont">
                <?php if ($partido['idComunidad']>1){ 
            $uCorona='https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Spain'?>
            El coronavirus en <?php echo $partido['nombreComunidad']?>
            <br /><a href="/covides.php" class="boldfont">Todas las comunidades</a>
            <?php } else { 
            $uCorona='https://en.wikipedia.org/wiki/Template:2019%E2%80%9320_coronavirus_pandemic_data'?>
            El coronavirus en <?php echo $partido['nombrePais']?>
            <br /><a href="/covid.php" class="boldfont">Todos los paises afectados</a>
            <?php } ?>

            </td>

            <?php } ?>
            
            <td align="center" class="txt11">Positivos</td>
            <td align="center" class="txt11">Recuperados</td>
            <td align="center" class="txt11">Muertos</td>
            <?php if ($partido['idComunidad']>1){?>
            <td align="center" class="txt11">Hospital</td>
            <td align="center" class="txt11">U.C.I.</td>
            <?php } ?>
        </tr>
        <tr bgcolor="white">
            <?php if ($_SESSION['app']==0){ ?>
            <td>

                <i>Fuente: <a href="<?php echo $uCorona?>" target="_blank">Wikipedia</a></i>
            </td>
            <?php } ?>
            <td align="center"><?php echo number_format($corona[0],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona[2],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona[1],0,",",".")?></td>
            <?php if ($partido['idComunidad']>1){?>
            <td align="center"><?php echo number_format($corona[3],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona[4],0,",",".")?></td>
            <?php } ?>
        </tr>
    </table>
    </div>

</div>

*/ ?>