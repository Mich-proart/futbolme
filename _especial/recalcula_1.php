<?php 
define('_FUTBOLME_', 1);
require_once '../src/config.php';

if (isset($_POST['id'])) {
    $equipos = $_POST['id'];
}

if (isset($_POST['t'])) {
    $temporada_id = $_POST['t'];
}
if (!is_numeric($temporada_id)) {
    exit;
}

if (isset($_POST['d'])) {
    $datos = $_POST['d'];
}

$equipos = substr($equipos, 1);
$equipos = explode('-', $equipos);

    $partidos = Xpartidos($temporada_id, 0);
    $encuentros = array();
    foreach ($partidos as $key => $value) {
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
    }

$colores = array('#8B0000', '#BDB76B', '#2F4F4F', '#C71585', '#FF4500', '#4B0082', '#483D8B', '#008000', '#00008B', '#800000'); ?>

<?php include 'sc_clasificacion.php';

$datos = explode(',', $datos);
$datos = array_unique($datos);
$extras = array();

foreach ($datos as $keyD => $fila) {
    $p = explode('-', $fila);
    $x = 0;
    foreach ($equipos as $keyE => $value) {
        if ($p[1] == $value) {
            ++$x;
        }
        if ($p[2] == $value) {
            ++$x;
        }
    }
    if (is_numeric($p[3]) && is_numeric($p[4]) && 2 == $x) {
        $extras[$keyD]['id_local'] = $p[1];
        $extras[$keyD]['id_visitante'] = $p[2];
        $extras[$keyD]['re_local'] = $p[3];
        $extras[$keyD]['re_visitante'] = $p[4];
    }
}

$recogiendo = array();
foreach ($reOrdenar as $key => $value) {
    foreach ($extras as $k => $fila) {
        if ($value['equipo_id'] == $fila['id_local'] || $value['equipo_id'] == $fila['id_visitante']) {
            $value['jugados'] = ($value['jugados'] + 1);
            if ($value['equipo_id'] == $fila['id_local']) {
                $value['gFavor'] = ($value['gFavor'] + $fila['re_local']);
                $value['gContra'] = ($value['gContra'] + $fila['re_visitante']);
                if ($fila['re_local'] > $fila['re_visitante']) {
                    $value['ganados'] = ($value['ganados'] + 1);
                    $value['puntos'] = ($value['puntos'] + 3);
                } elseif ($fila['re_visitante'] > $fila['re_local']) {
                    $value['perdidos'] = ($value['perdidos'] + 1);
                } else {
                    $value['empatados'] = ($value['empatados'] + 1);
                    $value['puntos'] = ($value['puntos'] + 1);
                }
            } else {
                $value['gFavor'] = ($value['gFavor'] + $fila['re_visitante']);
                $value['gContra'] = ($value['gContra'] + $fila['re_local']);
                if ($fila['re_local'] < $fila['re_visitante']) {
                    $value['ganados'] = ($value['ganados'] + 1);
                    $value['puntos'] = ($value['puntos'] + 3);
                } elseif ($fila['re_visitante'] < $fila['re_local']) {
                    $value['perdidos'] = ($value['perdidos'] + 1);
                } else {
                    $value['empatados'] = ($value['empatados'] + 1);
                    $value['puntos'] = ($value['puntos'] + 1);
                }
            }
        }
    }
    $recogiendo[] = $value;
}

$oP = []; $oDG = []; $oMG = [];

foreach ($recogiendo as $key => $clasifica) {
    $oP[$key] = $clasifica['puntos'];
    $oDG[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
    $oMG[$key] = $clasifica['gFavor'];
}

    array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $recogiendo);

$reOrdenar = $recogiendo;
//imp($extras);
?>


<?php include 'sc_tabla_clasificacion.php'; ?>