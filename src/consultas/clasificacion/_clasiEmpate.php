<?php

/********************************************************AVERAGE PARTICULAR*******************************************/
//200=Copa Mundial Sub 17
/*imp($codigoTorneo);
imp($grupo_id);
imp($temporada_id);*/
if ((0 == $codigoTorneo || $grupo_id > 0) && 200 != $temporada_id) {
    $empatadosPuntos = array();
    foreach ($clasificacion as $key => $clasifica) {//encontramos puntos repetidos
        $empatadosPuntos[$clasifica['puntos']][] = $clasifica['equipo_id'];
    } //imp($empatadosPuntos);	//agrupamos equipos por puntos
    $liguillaInterna = array();
    foreach ($empatadosPuntos as $key => $eEmpatado) {
        //imp($eEmpatado);
    if (count($eEmpatado) > 1) {	//elegimos los grupos de puntos con mas de un equipo
    //if ($grupo_id==19) { imp(count($eEmpatado)); }
    $tp = count($eEmpatado) * (count($eEmpatado) - 1); //total partidos= equipos*(equipos-1)
    //imp($tp);
    if (168 == $temporada_id) {
        $tp = count($eEmpatado) * count($eEmpatado);
    }
        //echo '<hr />GRUPO de :'.$key. 'puntos. --- <br />';
        //echo 'Total partidos='.$tp. '<br />';
        $cuentaPartidos = 0;
        $min_pos = 100; //sacamos la minima posicion del grupo. Ponemos 100 para asegurarnos de recoger el valor mas bajo
        foreach ($eEmpatado as $i) {
            foreach ($clasificacion as $key => $clasifica) {
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
                    );					//echo var_dump($liguillaInterna[$i]).'<br />';
                }
            }
        }
        //imp($liguillaInterna);
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
        //imp($liguillaInterna);
        $reOrdenar = []; //creamos array nuevo con los datos del grupo de empatados
        foreach ($eEmpatado as $i) {
            $reOrdenar[] = $liguillaInterna[$i];
        }
        //imp($reOrdenar);
        //imp($cuentaPartidos);imp($tp);
        //echo 'Partidos encontrados='.$cuentaPartidos. ' Pos. minima:'.$min_pos.'<br />';
        ////if($cuentaPartidos==$tp || $grupo_id>0){

        if (232 == $temporada_id) {
            $tp = 1;
        } //IMPORTANTE; no hace falta que hayan 2 partidos

        if ($cuentaPartidos == $tp) {
            //si se han estado_partido todos los partidos modificaremos las posiciones, ordenando primero el grupo
            //echo 'Aqui hay que realizar la liguilla interna<br />';
            $oP = [];
            $oDG = [];
            $oMG = [];
            $ant = [];
            foreach ($reOrdenar as $key => $clasifica) {
                $oP[$key] = $clasifica['puntos'];
                $oDG[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
                $oMG[$key] = $clasifica['gFavor'];
                $ant[$key] = $clasifica['anterior'];
            }
            array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $ant, SORT_ASC, SORT_NUMERIC, $reOrdenar);
            //echo '<hr />'; ordenamos el nuevo grupo
        foreach ($reOrdenar as $key => $orden) { //cambiamos las posiciones dentro del grupo
            $orden['posicion'] = $min_pos;
            $nuevo_orden[$key] = $orden;
            $min_pos = $min_pos + 1;
        }
            $reOrdenar = $nuevo_orden;
            //imp($reOrdenar);
            unset($nuevo_orden);
            //require_once '_clasiSegundoEmpate.php';
            foreach ($reOrdenar as $k) {
                //echo var_dump($k).'---------ttt------<br />';
                $np = $k['posicion'];
                $eq = $k['equipo_id'];
                foreach ($clasificacion as $key => $clasifica) { //cambiamos las posiciones dentro de la clasificacion.
                    if ($eq == $clasifica['equipo_id']) {
                        $clasifica['posicion'] = $np;
                    }
                    $nueva_clasificacion[$key] = $clasifica;
                }
                $clasificacion = $nueva_clasificacion;
                unset($nueva_clasificacion);
                $pos = [];
                foreach ($clasificacion as $key => $clasifica) {  //reordenamos la clasificacion por posición
                    $pos[$key] = $clasifica['posicion'];
                }
                array_multisort($pos, SORT_ASC, SORT_NUMERIC, $clasificacion);
            }
        }
    }
    }
}//fin de codigoTorneo=0

         /*******************FIN DE GOLAVERAGE PARTICULAR****************************************/
