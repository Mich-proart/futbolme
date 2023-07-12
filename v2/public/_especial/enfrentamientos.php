<?php
define('_PANEL_', 1);

include 'config/_conexion.php';
include 'config/consultas.php';

if (isset($_POST['id'])) {
    $equipos = $_POST['id'];
}

if (isset($_POST['t'])) {
    $temporada_id = $_POST['t'];
}
if (!is_numeric($temporada_id)) {
    exit;
}

$equipos = substr($equipos, 1);
$equipos = explode('-', $equipos);

$colores = array('#8B0000', '#BDB76B', '#2F4F4F', '#C71585', '#FF4500', '#4B0082', '#483D8B', '#008000', '#00008B', '#800000');
//DarkRed,OrangeRed,DarkSlateGray,MediumVioletRed,DarkKhaki,Indigo,DarkSlateBlue,Green,DarkBlue,Maroon
$colorin = array();

foreach ($equipos as $key => $value) {
    $colorin[$value] = $colores[$key];
}

if (count($equipos) > 1) {
    ?>

<table class="table">
	<thead>
        <tr class="darkgreenbox">
                <th class="text-center">J</th>
                <th class="text-center">Partido</th>
                <th class="text-center">Resultado</th>
        </tr>
    </thead>
    <tbody class="whitebox">

	<?php 
    $partidos = Xpartidos($temporada_id, 0);
    $encuentros = array();
    foreach ($partidos as $keyP => $value) {
        $e1 = $value['equipoLocal_id'];
        $e2 = $value['equipoVisitante_id'];
        $gl = $value['goles_local'];
        $gv = $value['goles_visitante'];

        $x = 0;
        foreach ($equipos as $keyE => $fila) {
            if ($fila == $e1) {
                ++$x;
            }
        }

        foreach ($equipos as $keyE2 => $fila) {
            if ($fila == $e2) {
                ++$x;
            }
        }

        if ($x < 2) {
            continue;
        }

        if (1 != $value['estado_partido']) {
            $gl = '';
            $gv = '';
        }

        if (1 == $value['estado_partido']) {
            $encuentros[] = $value;
        }

        $css1 = '';
        $css2 = '';
        $css1 = "style='color:".$colorin[$value['equipoLocal_id']]."'";
        $css2 = "style='color:".$colorin[$value['equipoVisitante_id']]."'"; ?>

		<tr class="whitebox">
            <th class="text-center"><?php echo $value['jornada']; ?></th>
            <th class="text-center"><span <?php echo $css1; ?>><?php echo $value['localCorto']; ?></span> - <span <?php echo $css2; ?>><?php echo $value['visitanteCorto']; ?></span></th>
            <th class="text-center"><span class="l<?php echo $value['id']; ?>"><?php echo $gl; ?></span> - <span class="v<?php echo $value['id']; ?>"><?php echo $gv; ?></span></th>
    	</tr>
		
	<?php
    } ?>
	</tbody>
</table>
<?php include 'sc_clasificacion.php'; ?>
<div id="clasi">
<?php include 'sc_tabla_clasificacion.php'; ?>
</div>
<?php
} ?>