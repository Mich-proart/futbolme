<?php
    foreach ($partidos as $partido) {
        if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
            continue;
        }
        if (!isset($partido['localCorto'])) {
            $partido['localCorto'] = $partido['local'];
            $partido['visitanteCorto'] = $partido['visitante'];
        }
        $nombreCasaCorto = $partido['localCorto'];
        $nombreFueraCorto = $partido['visitanteCorto'];

        if ($partido['jornada'] < $jornada_inicio || $partido['jornada'] > $jornada_fin) {
            continue;
        }

        if ((0 == $partido['equipoLocal_id']) || (0 == $partido['equipoVisitante_id'])) {
            continue;
        }
        if (('' == trim($partido['local'])) || ('' == trim($partido['visitante']))) {
            continue;
        }

        $ideC = (int) $partido['equipoLocal_id'];
        $ideF = (int) $partido['equipoVisitante_id'];
        $estado_partido = (int) $partido['estado_partido'];
        $goles_local = (int) $partido['goles_local'];
        $goles_visitante = (int) $partido['goles_visitante'];

        if (!isset($clasificacion[$ideC]) && !isset($clasificacion[$ideF])) {
            continue;
        }

        //if ($partido['equipoLocal_id']==13942 || $partido['equipoVisitante_id']==13942) {
        //imp($partido); }

        if (1 == $estado_partido || 2 == $estado_partido) {
            /**************calculo de puntos*******************/
            if ($goles_local > $goles_visitante) {
                if ($contar_casa && isset($clasificacion[$ideC])) {
                    $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorganar;
                    $clasificacion[$ideC]['ganados'] = $clasificacion[$ideC]['ganados'] + 1;
                }
                if ($contar_fuera && isset($clasificacion[$ideF])) {
                    $clasificacion[$ideF]['perdidos'] = $clasificacion[$ideF]['perdidos'] + 1;
                }
            } elseif ($goles_local == $goles_visitante) {
                if ($contar_casa && isset($clasificacion[$ideC])) {
                    $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorempatar;
                    $clasificacion[$ideC]['empatados'] = $clasificacion[$ideC]['empatados'] + 1;
                }
                if ($contar_fuera && isset($clasificacion[$ideF])) {
                    $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorempatar;
                    $clasificacion[$ideF]['empatados'] = $clasificacion[$ideF]['empatados'] + 1;
                }
            } else {
                if ($contar_casa && isset($clasificacion[$ideC])) {
                    $clasificacion[$ideC]['perdidos'] = $clasificacion[$ideC]['perdidos'] + 1;
                }
                if ($contar_fuera && isset($clasificacion[$ideF])) {
                    $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorganar;
                    $clasificacion[$ideF]['ganados'] = $clasificacion[$ideF]['ganados'] + 1;
                }
            }

            /*****************calculo de jugados******************/
            if ($contar_casa && isset($clasificacion[$ideC])) {
                $clasificacion[$ideC]['jugados'] = $clasificacion[$ideC]['jugados'] + 1;
                $clasificacion[$ideC]['gFavor'] = $clasificacion[$ideC]['gFavor'] + $goles_local;
                $clasificacion[$ideC]['gContra'] = $clasificacion[$ideC]['gContra'] + $goles_visitante;
            }
            if ($contar_fuera && isset($clasificacion[$ideF])) {
                $clasificacion[$ideF]['jugados'] = $clasificacion[$ideF]['jugados'] + 1;
                $clasificacion[$ideF]['gFavor'] = $clasificacion[$ideF]['gFavor'] + $goles_visitante;
                $clasificacion[$ideF]['gContra'] = $clasificacion[$ideF]['gContra'] + $goles_local;
            }
        }

        if ($contar_casa && isset($clasificacion[$ideC])) {
            $nombreCasa = $partido['local'];
            $clasificacion[$ideC]['nombre'] = $nombreCasa;
            $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
            $clasificacion[$ideC]['equipo_id'] = $ideC;
        }
        if ($contar_fuera && isset($clasificacion[$ideF])) {
            $nombreFuera = $partido['visitante'];
            $clasificacion[$ideF]['nombre'] = $nombreFuera;
            $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
            $clasificacion[$ideF]['equipo_id'] = $ideF;
        }
    }

    //imp($sanciones);
    if (count($sanciones) > 0) {
        foreach ($sanciones as $sancion) {
            if (isset($clasificacion[$sancion['equipo_id']])) {
                $clasificacion[$sancion['equipo_id']]['puntos'] = $clasificacion[$sancion['equipo_id']]['puntos'] + $sancion['puntos'];
                $clasificacion[$sancion['equipo_id']]['jugados'] = $clasificacion[$sancion['equipo_id']]['jugados'] + $sancion['jugados'];
                $clasificacion[$sancion['equipo_id']]['ganados'] = $clasificacion[$sancion['equipo_id']]['ganados'] + $sancion['ganados'];
                $clasificacion[$sancion['equipo_id']]['empatados'] = $clasificacion[$sancion['equipo_id']]['empatados'] + $sancion['empatados'];
                $clasificacion[$sancion['equipo_id']]['perdidos'] = $clasificacion[$sancion['equipo_id']]['perdidos'] + $sancion['perdidos'];
                $clasificacion[$sancion['equipo_id']]['gFavor'] = $clasificacion[$sancion['equipo_id']]['gFavor'] + $sancion['gFavor'];
                $clasificacion[$sancion['equipo_id']]['gContra'] = $clasificacion[$sancion['equipo_id']]['gContra'] + $sancion['gContra'];
            }
        }
    }
    if (count($directos) > 0) {
        foreach ($directos as $key => $directo) {
            if (isset($clasificacion[$key])) {
                $clasificacion[$directo['equipo_id']]['puntos'] = $clasificacion[$directo['equipo_id']]['puntos'] + $directo['puntos'];
                $clasificacion[$directo['equipo_id']]['jugados'] = $clasificacion[$directo['equipo_id']]['jugados'] + $directo['jugados'];
                $clasificacion[$directo['equipo_id']]['ganados'] = $clasificacion[$directo['equipo_id']]['ganados'] + $directo['ganados'];
                $clasificacion[$directo['equipo_id']]['empatados'] = $clasificacion[$directo['equipo_id']]['empatados'] + $directo['empatados'];
                $clasificacion[$directo['equipo_id']]['perdidos'] = $clasificacion[$directo['equipo_id']]['perdidos'] + $directo['perdidos'];
                $clasificacion[$directo['equipo_id']]['gFavor'] = $clasificacion[$directo['equipo_id']]['gFavor'] + $directo['gFavor'];
                $clasificacion[$directo['equipo_id']]['gContra'] = $clasificacion[$directo['equipo_id']]['gContra'] + $directo['gContra'];
                $clasificacion[$directo['equipo_id']]['preferente'] = 1;
            }
        }
    }
