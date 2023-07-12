<?php

$equipos = array();

foreach ($partidos as $key => $partido) {
    $idEquipoCasa = $partido['equipoLocal_id'];
    $idEquipoFuera = $partido['equipoVisitante_id'];
    $equipos[] = $idEquipoCasa;
    $equipos[] = $idEquipoFuera;
    $encuentros[$key]['equipoLocal_id'] = $partido['equipoLocal_id'];
    $encuentros[$key]['equipoVisitante_id'] = $partido['equipoVisitante_id'];
    $encuentros[$key]['goles_local'] = $partido['goles_local'];
    $encuentros[$key]['goles_visitante'] = $partido['goles_visitante'];
    $encuentros[$key]['estado_partido'] = $partido['estado_partido'];
    $idEquipoCasa = $partido['equipoLocal_id'];
    $idEquipoFuera = $partido['equipoVisitante_id'];
    $equipos[] = $idEquipoCasa;
    $equipos[] = $idEquipoFuera;
    $encuentros[$key]['equipoLocal_id'] = $partido['equipoLocal_id'];
    $encuentros[$key]['equipoVisitante_id'] = $partido['equipoVisitante_id'];
    $encuentros[$key]['goles_local'] = $partido['goles_local'];
    $encuentros[$key]['goles_visitante'] = $partido['goles_visitante'];
    $encuentros[$key]['estado_partido'] = $partido['estado_partido'];
}

foreach ($equipos as $key => $equipo) {
    //echo $key;
    $clasificacion[$equipo] = array(
        'equipo_id' => 0,
        'nombre' => 0,
        'posicion' => 0,
        'puntos' => 0,
        'jugados' => 0,
        'ganados' => 0,
        'empatados' => 0,
        'perdidos' => 0,
        'gFavor' => 0,
        'gContra' => 0,
        'preferente' => 0,
        'u_punto' => 0,
        'u_victoria' => 0,
        'u_empate' => 0,
        'u_derrota' => 0,
        'u_gol_favor' => 0,
        'u_gol_contra' => 0,
        'racha' => '',
    );
}

foreach ($partidos as $partido) {
    if ($partido['grupo_id'] == $grupo_id) {
        $ideC = $partido['equipoLocal_id'];
        $ideF = $partido['equipoVisitante_id'];
        $estado_partido = $partido['estado_partido'];
        $goles_local = $partido['goles_local'];
        $goles_visitante = $partido['goles_visitante'];
        if (1 == $estado_partido || 2 == $estado_partido) {
            /**************calculo de puntos*******************/
            if ($goles_local > $goles_visitante) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorganar;
                $clasificacion[$ideC]['ganados'] = $clasificacion[$ideC]['ganados'] + 1;
                $clasificacion[$ideF]['perdidos'] = $clasificacion[$ideF]['perdidos'] + 1;
            } elseif ($goles_local == $goles_visitante) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideC]['empatados'] = $clasificacion[$ideC]['empatados'] + 1;
                $clasificacion[$ideF]['empatados'] = $clasificacion[$ideF]['empatados'] + 1;
            } else {
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorganar;
                $clasificacion[$ideF]['ganados'] = $clasificacion[$ideF]['ganados'] + 1;
                $clasificacion[$ideC]['perdidos'] = $clasificacion[$ideC]['perdidos'] + 1;
            }
            /*****************calculo de jugados******************/
            $clasificacion[$ideC]['jugados'] = $clasificacion[$ideC]['jugados'] + 1;
            $clasificacion[$ideF]['jugados'] = $clasificacion[$ideF]['jugados'] + 1;
            $clasificacion[$ideC]['gFavor'] = $clasificacion[$ideC]['gFavor'] + $goles_local;
            $clasificacion[$ideC]['gContra'] = $clasificacion[$ideC]['gContra'] + $goles_visitante;
            $clasificacion[$ideF]['gFavor'] = $clasificacion[$ideF]['gFavor'] + $goles_visitante;
            $clasificacion[$ideF]['gContra'] = $clasificacion[$ideF]['gContra'] + $goles_local;
        }

        if ( 2 == $estado_partido || 6 == $estado_partido) {
            $clasificacion[$ideC]['preferente'] = 1;
            $clasificacion[$ideF]['preferente'] = 1;
        }

        $nombreCasa = $partido['local'];
        $nombreCasaCorto = $partido['localCorto'];
        $nombreFuera = $partido['visitante'];
        $nombreFueraCorto = $partido['visitanteCorto'];
        $clasificacion[$ideC]['nombre'] = $nombreCasa;
        $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
        $clasificacion[$ideF]['nombre'] = $nombreFuera;
        $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
        $clasificacion[$ideC]['equipo_id'] = $ideC;
        $clasificacion[$ideF]['equipo_id'] = $ideF;
        //$clasificacion[$idEquipoCasa] - cada equipo con todo los puntos
        //$clasificacion[$idEquipoFuera] - cada equipo con todo los puntos
    }
}
