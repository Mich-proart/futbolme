<?php

//********************Generar clasificacion*********************************
function XgenerarClasificacion($temporada_id, $jornada = 0, $grupo_id = 0, $activa = 0, $equipo_id = 0)
{
    if ('' == $jornada) {
        $jornada = 0;
    }
    /*imp($temporada_id);
    imp($jornada);
    imp($grupo_id);
    imp($activa);*/
    $cuentaPartidos=0; $tp=1000;

    
        $torneo = Xtipo($temporada_id);
    

    $tipoClasificacion = $torneo['tipoClasificacion'];
    $torneo_id = $torneo['torneo_id'];
    $jornadas=$torneo['jornadas'];

    $segundavuelta=($jornadas/2);

    $sanciones = array();
    $colores = array();

    $jornada_inicio = 1;
    $jornada_fin = $jornada;
    if (0 == $jornada_fin) {
        $jornada_fin = 48;
    }

    if ($jornada < 49) {
        $partidos = Xpartidos($temporada_id, 0);
        $sanciones = Xsancion($temporada_id);
        $colores = Xcolores($temporada_id, $grupo_id);
    } else {
        $partidos = XpartidosH($temporada_id, (50 - $jornada));
    }

    if (0 == count($partidos)) {
        $clasificacionFinal = array();
        $leyenda = array();
        $resultado = array(
        'clasificacionFinal' => $clasificacionFinal,
        'leyenda' => $leyenda,
        );

        return $resultado;
    }

    if (1 == $activa) {
        $jornada_fin = 200;
    } //se hacen todos los partidos.

    

    $encuentros[0] = array('equipoLocal_id' => 0,
                         'equipoVisitante_id' => 0,
                         'goles_local' => 0,
                         'goles_visitante' => 0,
                         'estado_partido' => 0, );

    foreach ($partidos as $key => $partido) {
        if (!isset($partido['localCorto'])) {
            $partido['localCorto'] = $partido['local'];
            $partido['visitanteCorto'] = $partido['visitante'];
        }

        $idEquipoCasa = $partido['equipoLocal_id'];
        $idEquipoFuera = $partido['equipoVisitante_id'];
        $equipos[$idEquipoCasa] = $idEquipoCasa;
        $equipos[$idEquipoFuera] = $idEquipoFuera;

        $encuentros[$key]['equipoLocal_id'] = $partido['equipoLocal_id'];
        $encuentros[$key]['equipoVisitante_id'] = $partido['equipoVisitante_id'];
        $encuentros[$key]['goles_local'] = $partido['goles_local'];
        $encuentros[$key]['goles_visitante'] = $partido['goles_visitante'];
        $encuentros[$key]['estado_partido'] = $partido['estado_partido'];
    }

    foreach ($equipos as $key => $equipo) {
        //echo $key;
        $clasificacion[$key] = array(
            'equipo_id' => 0,
            'nombre' => 0,
            'nombreCorto' => 0,
            'posicion' => 0,
            'puntos' => 0,
            'jugados' => 0,
            'ganados' => 0,
            'empatados' => 0,
            'perdidos' => 0,
            'gFavor' => 0,
            'gContra' => 0,
            'preferente' => 0,
           );
    }

    $contar_casa = true;
    $contar_fuera = true;
    $puntosPorganar = 3;
    $puntosPorempatar = 1;
    $puntosPorperder = 0;

    include 'calculoDePuntos.php';

    $ordenPuntos = [];
    $ordenDirefenciaGoles = [];
    $ordenMasGoles = [];
    $ordenGanados = [];

    foreach ($clasificacion as $key => $clasifica) {
        $ordenPuntos[$key] = $clasifica['puntos'];
        $ordenDirefenciaGoles[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
        $ordenMasGoles[$key] = $clasifica['gFavor'];
        $ordenGanados[$key] = $clasifica['ganados'];
    }

   

    if (0 == $tipoClasificacion) {
        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);
    }

    if (1 == $tipoClasificacion) {
        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);
    }

    if (2 == $tipoClasificacion) { //brazil - USA
        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenGanados, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);
    }

    $p = 0;
    foreach ($clasificacion as $key => $clasifica) {
        if (0 == $clasifica['equipo_id']) {
            continue;
        }
        $p = $p + 1;
        $clasifica['posicion'] = $p;
        $nueva_clasificacion[$key] = $clasifica;
    }
    $clasificacion = $nueva_clasificacion;
    unset($nueva_clasificacion);
    $clasificacion1 = $clasificacion;

    $empatadosPuntos = array();
    $numeroEmpate = 1; //primer empate

   

    foreach ($clasificacion as $key => $clasifica) {//encontramos puntos repetidos
        $empatadosPuntos[$clasifica['puntos']][] = $clasifica['equipo_id'];
    } //agrupamos equipos por puntos



    if (0 == $tipoClasificacion && $jornada>$segundavuelta) {
        include 'averageParticular.php';
    }

   

    include 'pintaryleyenda.php';


    

    return $resultado;
}

