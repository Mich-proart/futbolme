<?php
define('_FUTBOLME_', 1);
require_once '../src/config.php';

if (isset($_POST['id'])) {
    $equipo_id = $_POST['id'];
}
if (!is_numeric($equipo_id)) {
    exit;
}

if (isset($_POST['t'])) {
    $temporada_id = $_POST['t'];
}
if (!is_numeric($temporada_id)) {
    exit;
}

$ePartidos = XequipoPartidos($equipo_id);

$partidos = array_reverse($ePartidos['partidos']); ?>

<table id="e-<?php echo $equipo_id; ?>" class="table table-bordered table-condensed whitebox nomargin" style="font-size:11px;">
	<thead>
        <tr class="darkgreenbox">
                <th class="text-center">J</th>
                <th class="text-center" colspan="4">Partido</th>
        </tr>
    </thead>
    <tbody class="whitebox" data-valor="<?php echo $equipo_id; ?>">
<?php


foreach ($partidos as $value) {
    if ($value['temporada_id'] != $temporada_id) {
        continue;
    }
    if ($value['estado_partido'] > 0 && $value['estado_partido'] < 3) {
        continue;
    }

    $css1 = '';
    $css2 = '';
    if ($value['equipoLocal_id'] == $equipo_id) {
        $css1 = "style='color:red'";
    }
    if ($value['equipoVisitante_id'] == $equipo_id) {
        $css2 = "style='color:red'";
    } ?>
	<tr id="<?php echo $value['id']; ?>" class="whitebox">
            <th class="text-center"><?php echo $value['jornada']; ?></th>
            <th style="text-align:right"><span <?php echo $css1; ?>><?php echo $value['localCorto']; ?></span></th>
            <th class="text-center nopadding l-<?php echo $value['id']; ?>" data-local="<?php echo $value['equipoLocal_id']; ?>">
            <input id="l-<?php echo $equipo_id; ?>-<?php echo $value['id']; ?>" onkeyup="_llenarL(<?php echo $value['id']; ?>,<?php echo $value['equipoLocal_id']; ?>,<?php echo $equipo_id; ?>)" class="l<?php echo $value['id']; ?>" type="text" style="font-size:13px;width:20px;text-align:center;" value="">
            </th>
            <th class="text-center nopadding v-<?php echo $value['id']; ?>" data-visitante="<?php echo $value['equipoVisitante_id']; ?>">
            <input id="v-<?php echo $equipo_id; ?>-<?php echo $value['id']; ?>" onkeyup="_llenarV(<?php echo $value['id']; ?>,<?php echo $value['equipoLocal_id']; ?>,<?php echo $equipo_id; ?>)" class="v<?php echo $value['id']; ?>" type="text" style="font-size:13px;width:20px;text-align:center;" value="">
            </th>
            <th style="text-align:left"><span <?php echo $css2; ?>><?php echo $value['visitanteCorto']; ?></span></th>
    </tr>
<?php
} ?>
    </tbody> 
</table>
