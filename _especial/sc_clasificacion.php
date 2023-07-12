<?php

$liguillaInterna = array();
$puntosPorganar = 3; $puntosPorempatar = 1; $puntosPorperder = 0;
$tp = count($equipos) * (count($equipos) - 1); //total partidos= equipos*(equipos-1)

foreach ($equipos as $i) {
    $liguillaInterna[$i] = array(
            'equipo_id' => 0,
            'nombre' => '',
            'puntos' => 0,
            'gFavor' => 0,
            'gContra' => 0,
            'jugados' => 0,
            'ganados' => 0,
            'empatados' => 0,
            'perdidos' => 0,
            'color' => '',
        );
}

foreach ($equipos as $e) {
    $e1 = $e;
    foreach ($equipos as $eq) {
        $e2 = $eq;
        if ($e1 != $e2) {
            foreach ($encuentros as $keyEn => $encuentro) {
                if ($e1 == $encuentro['equipoLocal_id'] && $e2 == $encuentro['equipoVisitante_id'] && $encuentro['estado_partido'] > 0 && $encuentro['estado_partido'] < 3) {
                    $liguillaInterna[$e1]['jugados'] = $liguillaInterna[$e1]['jugados'] + 1;
                    $liguillaInterna[$e2]['jugados'] = $liguillaInterna[$e2]['jugados'] + 1;
                    if ($e1 == $encuentro['equipoLocal_id']) {
                        $liguillaInterna[$e1]['equipo_id'] = $e1;
                        $liguillaInterna[$e1]['nombre'] = $encuentro['localCorto'];
                        if ($encuentro['goles_local'] > $encuentro['goles_visitante']) {
                            $liguillaInterna[$e1]['ganados'] = $liguillaInterna[$e1]['ganados'] + 1;

                            $liguillaInterna[$e1]['puntos'] = $liguillaInterna[$e1]['puntos'] + $puntosPorganar;
                            $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                            $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                        }
                        if ($encuentro['goles_local'] == $encuentro['goles_visitante']) {
                            $liguillaInterna[$e1]['empatados'] = $liguillaInterna[$e1]['empatados'] + 1;
                            $liguillaInterna[$e1]['puntos'] = $liguillaInterna[$e1]['puntos'] + $puntosPorempatar;
                            $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                            $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                        }
                        if ($encuentro['goles_local'] < $encuentro['goles_visitante']) {
                            $liguillaInterna[$e1]['perdidos'] = $liguillaInterna[$e1]['perdidos'] + 1;

                            $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                            $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                        }
                        //echo var_dump($liguillaInterna[$e1]).'---------ccc------<br />';
                    }

                    if ($e2 == $encuentro['equipoVisitante_id']) {
                        $liguillaInterna[$e2]['equipo_id'] = $e2;
                        $liguillaInterna[$e2]['nombre'] = $encuentro['visitanteCorto'];
                        if ($encuentro['goles_visitante'] > $encuentro['goles_local']) {
                            $liguillaInterna[$e2]['ganados'] = $liguillaInterna[$e2]['ganados'] + 1;

                            $liguillaInterna[$e2]['puntos'] = $liguillaInterna[$e2]['puntos'] + $puntosPorganar;
                            $liguillaInterna[$e2]['gFavor'] = $liguillaInterna[$e2]['gFavor'] + $encuentro['goles_visitante'];
                            $liguillaInterna[$e2]['gContra'] = $liguillaInterna[$e2]['gContra'] + $encuentro['goles_local'];
                        }
                        if ($encuentro['goles_local'] == $encuentro['goles_visitante']) {
                            $liguillaInterna[$e2]['empatados'] = $liguillaInterna[$e2]['empatados'] + 1;

                            $liguillaInterna[$e2]['puntos'] = $liguillaInterna[$e2]['puntos'] + $puntosPorempatar;
                            $liguillaInterna[$e2]['gFavor'] = $liguillaInterna[$e2]['gFavor'] + $encuentro['goles_visitante'];
                            $liguillaInterna[$e2]['gContra'] = $liguillaInterna[$e2]['gContra'] + $encuentro['goles_local'];
                        }
                        if ($encuentro['goles_local'] > $encuentro['goles_visitante']) {
                            $liguillaInterna[$e2]['perdidos'] = $liguillaInterna[$e2]['perdidos'] + 1;

                            $liguillaInterna[$e2]['gFavor'] = $liguillaInterna[$e2]['gFavor'] + $encuentro['goles_visitante'];
                            $liguillaInterna[$e2]['gContra'] = $liguillaInterna[$e2]['gContra'] + $encuentro['goles_local'];
                        }
                        //echo var_dump($liguillaInterna[$e2]).'---------fff------<br />';
                    }
                }
            }
        }
    }
}

$reOrdenar = []; //creamos array nuevo con los datos del grupo de empatados

foreach ($equipos as $i) {
    $reOrdenar[] = $liguillaInterna[$i];
}

foreach ($reOrdenar as $key => $fila) {
    $reOrdenar[$key]['color'] = $colores[$key];
}
        $oP = []; $oDG = []; $oMG = [];

        foreach ($reOrdenar as $key => $clasifica) {
            $oP[$key] = $clasifica['puntos'];
            $oDG[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
            $oMG[$key] = $clasifica['gFavor'];
        }

            array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $reOrdenar);
