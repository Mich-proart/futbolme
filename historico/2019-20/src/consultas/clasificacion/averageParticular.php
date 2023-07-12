<?php

$liguillaInterna = array();
foreach ($empatadosPuntos as $key => $eEmpatado) {
    if (count($eEmpatado) > 1) {
        $tp = count($eEmpatado) * (count($eEmpatado) - 1); //total partidos= equipos*(equipos-1)

        if (168 == $temporada_id) {
            $tp = count($eEmpatado) * count($eEmpatado);
        }
        $cuentaPartidos = 0;
        $min_pos = 100;
        foreach ($eEmpatado as $i) {
            foreach ($clasificacion as $key2 => $clasifica) {
                if ($clasifica['equipo_id'] == $i) {
                    $p = $clasifica['posicion'];
                    if ($p < $min_pos) {
                        $min_pos = $p;
                    }  //sacamos la minima posicion del grupo
                    $liguillaInterna[$i] = array(
                        'equipo_id' => 0,
                        'puntos' => 0,
                        'gFavor' => 0,
                        'gContra' => 0,
                        'jugados' => 0,
                        'posicion' => $p,
                        'empateDe' => $clasifica['puntos'],
                        'anterior' => $clasifica['posicion'],
                        'anteriorGF' => $clasifica['gFavor'],
                        'anteriorGC' => $clasifica['gContra'],
                    ); //echo var_dump($liguillaInterna[$i]).'<br />';
                }
            } //imp($liguillaInterna);
        }

        foreach ($eEmpatado as $e) {
            $e1 = $e;
            foreach ($eEmpatado as $eq) {
                $e2 = $eq;
                if ($e1 != $e2) {
                    //echo 'e1= '.$e1.' - e2='.$e2.'<br />';// aqui esta el emparejamiento a buscar
                    foreach ($encuentros as $keyEn => $encuentro) {
                        if ($e1 == $encuentro['equipoLocal_id'] && $e2 == $encuentro['equipoVisitante_id'] && $encuentro['estado_partido'] > 0 && $encuentro['estado_partido'] < 3) {
                            $cuentaPartidos = $cuentaPartidos + 1;
                            //echo $e1.' ('.$encuentro['equipoLocal_id'].') '.$encuentro['goles_local'].' - '.$encuentro['goles_visitante'].' ('.$encuentro['equipoVisitante_id'].') '.$e2.'<br />';
                            $liguillaInterna[$e1]['jugados'] = $liguillaInterna[$e1]['jugados'] + 1;
                            $liguillaInterna[$e2]['jugados'] = $liguillaInterna[$e2]['jugados'] + 1;
                            if ($e1 == $encuentro['equipoLocal_id']) {
                                $liguillaInterna[$e1]['equipo_id'] = $e1;
                                if ($encuentro['goles_local'] > $encuentro['goles_visitante']) {
                                    $liguillaInterna[$e1]['puntos'] = $liguillaInterna[$e1]['puntos'] + $puntosPorganar;
                                    $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                                    $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                                }
                                if ($encuentro['goles_local'] == $encuentro['goles_visitante']) {
                                    $liguillaInterna[$e1]['puntos'] = $liguillaInterna[$e1]['puntos'] + $puntosPorempatar;
                                    $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                                    $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                                }
                                if ($encuentro['goles_local'] < $encuentro['goles_visitante']) {
                                    $liguillaInterna[$e1]['gFavor'] = $liguillaInterna[$e1]['gFavor'] + $encuentro['goles_local'];
                                    $liguillaInterna[$e1]['gContra'] = $liguillaInterna[$e1]['gContra'] + $encuentro['goles_visitante'];
                                }
                                //echo var_dump($liguillaInterna[$e1]).'---------ccc------<br />';
                            }

                            if ($e2 == $encuentro['equipoVisitante_id']) {
                                $liguillaInterna[$e2]['equipo_id'] = $e2;
                                if ($encuentro['goles_visitante'] > $encuentro['goles_local']) {
                                    $liguillaInterna[$e2]['puntos'] = $liguillaInterna[$e2]['puntos'] + $puntosPorganar;
                                    $liguillaInterna[$e2]['gFavor'] = $liguillaInterna[$e2]['gFavor'] + $encuentro['goles_visitante'];
                                    $liguillaInterna[$e2]['gContra'] = $liguillaInterna[$e2]['gContra'] + $encuentro['goles_local'];
                                }
                                if ($encuentro['goles_local'] == $encuentro['goles_visitante']) {
                                    $liguillaInterna[$e2]['puntos'] = $liguillaInterna[$e2]['puntos'] + $puntosPorempatar;
                                    $liguillaInterna[$e2]['gFavor'] = $liguillaInterna[$e2]['gFavor'] + $encuentro['goles_visitante'];
                                    $liguillaInterna[$e2]['gContra'] = $liguillaInterna[$e2]['gContra'] + $encuentro['goles_local'];
                                }
                                if ($encuentro['goles_local'] > $encuentro['goles_visitante']) {
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

        //$reOrdenar=[]; //creamos array nuevo con los datos del grupo de empatados
        $reOrdenar = array(); //creamos array nuevo con los datos del grupo de empatados
        foreach ($eEmpatado as $i) {
            if (0 == $i) {
                continue;
            }
            $reOrdenar[] = $liguillaInterna[$i];
        }

        if ($cuentaPartidos == $tp) {
            $oP = [];
            $oDG = [];
            $oMG = [];
            $ant = [];
            $gen = [];

            foreach ($reOrdenar as $key2 => $clasifica) {
                $oP[$key2] = $clasifica['puntos'];
                $oDG[$key2] = $clasifica['gFavor'] - $clasifica['gContra'];
                $oMG[$key2] = $clasifica['gFavor'];
                $ant[$key2] = $clasifica['anterior'];
                $gen[$key2] = $clasifica['anteriorGF'] - $clasifica['anteriorGC'];
                /*
                if (2 == $numeroEmpate) {
                    foreach ($clasificacion1 as $key3 => $clasificaxxx) {
                        if ($clasifica['equipo_id'] == $clasificaxxx['equipo_id']) {
                            $gen[$key3] = $clasificaxxx['gFavor'] - $clasificaxxx['gContra'];
                        }
                    }
                } else {
                    $gen[$key2] = 0;
                }*/
            }

            array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $gen, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $reOrdenar);

            foreach ($reOrdenar as $key2 => $orden) { //cambiamos las posiciones dentro del grupo
                $orden['posicion'] = $min_pos;
                $nuevo_orden[$key2] = $orden;
                $min_pos = $min_pos + 1;
            }

            $reOrdenar = $nuevo_orden;
            unset($nuevo_orden);

            // imp($reOrdenar);
            //die;

            foreach ($reOrdenar as $k) {
                $np = $k['posicion'];
                $eq = $k['equipo_id'];
                foreach ($clasificacion as $key2 => $clasifica) { //cambiamos las posiciones dentro de la clasificacion.
                    if ($eq == $clasifica['equipo_id']) {
                        $clasifica['posicion'] = $np;
                    }
                    $nueva_clasificacion[$key2] = $clasifica;
                }
                $clasificacion = $nueva_clasificacion;
                unset($nueva_clasificacion);
                $pos = [];
                foreach ($clasificacion as $key2 => $clasifica) {  //reordenamos la clasificacion por posición
                    $pos[$key2] = $clasifica['posicion'];
                }
                array_multisort($pos, SORT_ASC, SORT_NUMERIC, $clasificacion);
            }
        }
    } //count($eEmpatado)>1
} //foreach($empatadosPuntos
