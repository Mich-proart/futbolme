<?php
define('_FUTBOLME_', 1);
require_once 'src/config.php';

$temporada_id = $_POST['temporada_id'];
$jornada = $_POST['jornada'];

//imp($_POST);


$cachetime = 86400; //un dia.
$f = './json/temporada/'.$temporada_id.'/tipo.json';
if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    if ((time() - $fichero_time)> $cachetime) {
        Xtipo($temporada_id);
    }
} else {
    Xtipo($temporada_id);
}

$json = file_get_contents($f);
$datos = json_decode($json, true);

$torneo=$datos['torneo'];

$jornadas = $torneo['jornadas'];
$jornadaActiva = $torneo['jornadaActiva'];
$mitadJornada = (int)($jornadas / 2);

if ($jornada == -3) {
    $c = $datos['clasificacion'];
    $clasificacion = $c['clasificacionFinal'];
    $c1 = 'cajagrisoscuro';
    $c2 = 'celestebox';
    $c3 = 'celestebox';
    $c4 = 'celestebox';
    $c5 = 'celestebox';
    $c6 = 'celestebox';
} else {
    $clasificacion = XplayClasificacion($temporada_id, $jornada);
    if ($jornada == -1) {
        $c1 = 'celestebox';
        $c2 = 'cajagrisoscuro';
        $c3 = 'celestebox';
        $c4 = 'celestebox';
        $c5 = 'celestebox';
        $c6 = 'celestebox';
    }
    if ($jornada == -2) {
        $c1 = 'celestebox';
        $c2 = 'celestebox';
        $c3 = 'cajagrisoscuro';
        $c4 = 'celestebox';
        $c5 = 'celestebox';
        $c6 = 'celestebox';
    }
    if ($jornada == -4) {
        $c1 = 'celestebox';
        $c2 = 'celestebox';
        $c3 = 'celestebox';
        $c4 = 'cajagrisoscuro';
        $c5 = 'celestebox';
        $c6 = 'celestebox';
    }
    if ($jornada == -5) {
        $c1 = 'celestebox';
        $c2 = 'celestebox';
        $c3 = 'celestebox';
        $c4 = 'celestebox';
        $c5 = 'cajagrisoscuro';
        $c6 = 'celestebox';
    }
    if ($jornada < -5) {
        $c1 = 'celestebox';
        $c2 = 'celestebox';
        $c3 = 'celestebox';
        $c4 = 'celestebox';
        $c5 = 'celestebox';
        $c6 = 'cajagrisoscuro';
    }
}

?>

<div class="col-xs-12 nopadding txt11">
    <div class="text-center <?php echo $c1; ?>" style="padding:2px 6px; float:left; color:white;"
    ">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-3)">GENERAL</span>
</div>
<div class="text-center <?php echo $c2; ?>" style="padding:2px 6px; float:left; color:white;">
<span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-1)">LOCAL</span>
</div>

<div class="text-center <?php echo $c3; ?>" style="padding:2px 6px; float:left; color:white;">
<span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-2)">VISITANTE</span>
</div>

<?php if (isset($mitadJornada) && $jornadaActiva > $mitadJornada) {
    ?>
    <div class="text-center <?php echo $c4; ?>" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-4)">1ª VUELTA</span>
    </div>
    <div class="text-center <?php echo $c5; ?>" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-5)">2ª VUELTA</span>
    </div>


    <?php
} ?>
    <div class="text-center celestebox" style="padding:2px 6px; float:left; color:black; font-size: 12px">
        <span style="color:white">
        últimas Jornadas</span>
        <select onchange="play_clasi(<?php echo $temporada_id; ?>,this.value)">
            <option value="0">-</option>
            <?php if ($jornadaActiva>10) { ?><option value="-15">10</option><?php } ?>
            <?php if ($jornadaActiva>9) { ?><option value="-14">9</option><?php } ?>
            <?php if ($jornadaActiva>8) { ?><option value="-13">8</option><?php } ?>
            <?php if ($jornadaActiva>7) { ?><option value="-12">7</option><?php } ?>
            <?php if ($jornadaActiva>6) { ?><option value="-11">6</option><?php } ?>
            <?php if ($jornadaActiva>5) { ?><option value="-10">5</option><?php } ?>
            <?php if ($jornadaActiva>4) { ?><option value="-9">4</option><?php } ?>
            <?php if ($jornadaActiva>3) { ?><option value="-8">3</option><?php } ?>
            <?php if ($jornadaActiva>2) { ?><option value="-7">2</option><?php } ?>
            <?php if ($jornadaActiva>1) { ?><option value="-6">1</option><?php } ?>
        </select>
    </div>
</div>

<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">
    <thead>
    <tr class="darkgreenbox h40">
        <th class="text-center">P</th>
        <th class="text-center">Equipo</th>
        <th class="text-center">P<span class="hidden-xs">TO</span>S</th>
        <th class="text-center">J<span class="hidden-xs">U</span></th>
        <th class="text-center">G<span class="hidden-xs">A</span></th>
        <th class="text-center">E<span class="hidden-xs">M</span></th>
        <th class="text-center">P<span class="hidden-xs">E</span></th>
        <th class="text-center"><span class="hidden-xs">G</span>F</th>
        <th class="text-center"><span class="hidden-xs">G</span>C</th>
        <th class="text-center">D<span class="hidden-xs">I</span>F</th>
    </tr>
    </thead>
    <tbody class="whitebox">
    <?php

    foreach ($clasificacion as $fila) {
        
        $fila['css'] = '';

        $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];

        if (isset($sufijo2)) {
            $pgEnlace .= $sufijo2;
        }

        $color_fondo = 'white';
        if (isset($fila['preferente'])) {
            if (1 == $fila['preferente']) {
                $color_fondo = 'yellow';
            }
        }

        $color_fila = '';
        if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
            $color_fila = "style='background-color:gainsboro'";
        }

        $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);

        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
            $rutaEscudo = '/img/jugadores/NI.png';
        } ?>
        <tr <?php echo $color_fila; ?>>
            <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
            <td style="text-align:left;">
			<span class="hidden-sm hidden-md hidden-lg">
			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario"
               title="Calendario del <?php echo $fila['nombreCorto']; ?>">
			<img src="<?php echo $rutaEscudo; ?>"  alt="equipo" style="width:18px; height:20px">
			<b><?php echo $fila['nombreCorto']; ?></b>
			</a>
			</span>
                <span class="hidden-xs">
			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario"
               title="Calendario del <?php echo $fila['nombreCorto']; ?>">
			<img src="<?php echo $rutaEscudo; ?>"  alt="equipo" style="width:18px; height:20px">
            <?php if ($_SESSION['user_id']==5211){ 
             $twiter=sacarTwitter($fila['equipo_id']); ?>
                <b>@<?php echo ($twiter[0]); ?></b>
            <?php } else { ?>
    			<b><?php echo $fila['nombre']; ?></b>
            <?php } ?>
			</a>
			</span>
            </td>
            <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos"
                   title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
                    <b><?php echo $fila['puntos']; ?></b></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
                    <?php echo $fila['jugados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
                    <?php echo $fila['ganados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
                    <?php echo $fila['empatados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
                    <?php echo $fila['perdidos']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor"
                   title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
                    <?php echo $fila['gFavor']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra"
                   title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
                    <?php echo $fila['gContra']; ?></a>
            </td>
            <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
        </tr>


        <?php
    } ?>
    </tbody>
</table>


