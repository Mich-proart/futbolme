<?php

//********************Generar clasificacion*********************************
function XgenerarClasificacion($clas)
{    
$temporada_id=$clas['temporada_id'];
$jornada=$clas['jornada'];
$grupo_id=$clas['grupo_id'];
$equipo_id=$clas['equipo_id'];
$tipoClasificacion=$clas['tipoClasificacion'];
$torneo_id=$clas['torneo_id'];
$jornadas=$clas['jornadas'];
$puntosPorganar=$clas['puntosPorganar'];

$jornada=abs($jornada);

$cuentaPartidos=0; $tp=1000;
$segundavuelta=($jornadas/2);

    $sanciones = array();
    $colores = array();

    $jornada_inicio = 1;
    if (0 == $jornada) { $jornada = 48; }
    $jornada_fin = $jornada;
    //if (0 == $jornada_fin) { $jornada_fin = 48; }

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
            'club_id' => 0,
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

    
    if (isset($segundoEmpate)){
        foreach ($segundoEmpate as $empatadosOtra) {
            if (count($empatadosOtra)>2){
                unset($empatadosPuntos);
                foreach ($empatadosOtra as $key => $clasifi2) {//encontramos puntos repetidos
                    $empatadosPuntos[$clasifi2['puntos']][] = $clasifi2['equipo_id'];
                } 
                include 'averageParticular.php';                
            }
        }
    }

    

    include 'pintaryleyenda.php';

    //imp($resultado);

    return $resultado;
}

//********************Generar clasificacion USA*********************************
function XgenerarClasificacionUsa($temporada_id, $jornada = 0, $grupo_id = 0)
{
    /*imp($temporada_id);
    imp($jornada);
    imp($grupo_id);*/

    $f = './json/temporada/'.$temporada_id.'/tipo.json';
    if (@file_exists($f)) {
        $json = file_get_contents($f);
        $torneo = json_decode($json, true);
    } else {
        $torneo = Xtipo($temporada_id);
    }

    $tipoClasificacion = $torneo['tipoClasificacion'];

    $sanciones = array();
    $colores = array();

    $jornada_inicio = 1;
    $jornada_fin = $jornada;

    $partidos = Xpartidos2($temporada_id, $jornada, $grupo_id);
    $sanciones = Xsancion($temporada_id);
    $colores = Xcolores($temporada_id);

    $directos = Xpuntosdedirectos($temporada_id);

    $clasificacion = array();
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

    $mysqli = conectar();
    foreach ($equipos as $key => $equipo) {
        $sql = 'SELECT grupo FROM temporada_equipo WHERE equipo_id='.$equipo.' AND temporada_id='.$temporada_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if ($resultado['grupo'] != $grupo_id) {
            continue;
        }
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

    include 'calculoDePuntosUsa.php';

    $ordenPuntos = [];
    $ordenDirefenciaGoles = [];
    $ordenMasGoles = [];
    $ordenGanados = [];
    $ordenJugados = [];

    foreach ($clasificacion as $key => $clasifica) {
        $ordenPuntos[$key] = $clasifica['puntos'];
        $ordenDirefenciaGoles[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
        $ordenJugados[$key] = $clasifica['jugados'];
        $ordenMasGoles[$key] = $clasifica['gFavor'];
        $ordenGanados[$key] = $clasifica['ganados'];
    }

    array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenGanados, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);

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

    include 'pintaryleyendaUsa.php';

    return $resultado;
}

//********************Play clasificacion*********************************
function XplayClasificacion($temporada_id, $jornada)
{
    $f = './json/temporada/'.$temporada_id.'/tipo.json'; 
    $json = file_get_contents($f);
    $datos = json_decode($json, true);

    $torneo=$datos['torneo'];

    $tipoClasificacion = $torneo['tipoClasificacion'];
    $jornadas = $torneo['jornadas'];
    $jornadaActiva = $torneo['jornadaActiva'];
    $mitadJornada = (int) ($jornadas / 2);

    $jornada_inicio = 1;
    $jornada_fin = $jornada;

    if ($jornada == -1) {
        $jornada_fin = 0;
        echo '<h4>Clasificación: solo partidos como local</h4>';
    }
    if ($jornada == -2) {
        $jornada_fin = 0;
        echo '<h4>Clasificación: solo partidos como visitante</h4>';
    }
    if ($jornada == -4) {
        $jornada_fin = $mitadJornada;
        echo '<h4>Clasificación: solo partidos en la primera vuelta</h4>';
    }
    if ($jornada == -5) {
        $jornada_fin = 0;
        $jornada_inicio = ($mitadJornada + 1);
        echo '<h4>Clasificación: solo partidos en la segunda vuelta</h4>';
    }
    if ($jornada < -5) {
        $jornada_fin = 0;
        $jornadas_a_restar = abs($jornada) - 6;
        $jornada_inicio = abs($jornadaActiva) - $jornadas_a_restar;
        

        echo '<h4>Clasificación en las últimas '.($jornadas_a_restar + 1).' jornadas</h4>';
    }

    if (0 == $jornada_fin) {
        $jornada_fin = $jornadas;
    }

    $partidos = Xpartidos($temporada_id, 0);

    $encuentros[0] = array('equipoLocal_id' => 0,
                         'club_local' => 0,
                         'club_visitante' => 0,
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
            'club_id' => 0,
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
    if ($jornada == -1) {
        $contar_fuera = false;
    }
    if ($jornada == -2) {
        $contar_casa = false;
    }
    $puntosPorganar = 3;
    $puntosPorempatar = 1;
    $puntosPorperder = 0;

    include 'calculoDePuntosPlay.php';

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

    if (2 == $tipoClasificacion) { //brazil
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

    return $clasificacion;
}


//********************Generar clasificacion para grupos*********************************

function X2generarClasificacion($temporada_id, $tipo_torneo, $jornada, $grupo_id)
{
    

    $partidos = Xpartidos($temporada_id, $jornada, $grupo_id);
    

    $datos = Xtipo($temporada_id);
    $codigoTorneo = $datos['sexo'];
    $categoria_torneo_id = $datos['categoria_torneo_id'];
    $jornadaActiva = $datos['jornadaActiva'];

    

    $torneo_id = $datos['torneo_id'];

    //$codigoTorneo=0; //otros valores 1 (solo golaverage general - puntos/diferencia goles/mas partidos ganados)
    //           2 (golaverage general - puntos/mas partidos ganados)
    //               0 (golaverage general - puntos/diferencia goles/mas partidos ganados
    //                  golaverage particular entre empatados puntos/diferencia goles/mas partidos ganados
    //                  si persiste el empate entre mas empatados dentro de los empatados se vuelve a realizar el mismo golaverage particular
    //                  si al final de todo sigue el empate se vuelve a tener en cuenta el golaverage general)

    $jornada_inicio = 1;
    $jornada_fin = $jornada;

    $contar_casa = true;
    $contar_fuera = true;
    $sanciones = Xsancion($temporada_id);
    //imp($directos);
    
    $colores = Xcolores($temporada_id, $grupo_id);


    $puntosPorganar = 3;
    $puntosPorempatar = 1;
    $puntosPorperder = 0;

    $clasificacion = array();
    $encuentros[0] = array('equipoLocal_id' => 0,
                         'equipoVisitante_id' => 0,
                         'goles_local' => 0,
                         'goles_visitante' => 0,
                         'estado_partido' => 0, );
    $nueva_clasificacion = array();

    include '_clasiTipo2.php';

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

    if (2 == $codigoTorneo) {
        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenGanados, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);
    } else {
        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);
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

    include '_clasiEmpate.php';

    /****************************PINTANDO CLASIFICACION*********************************************************/

    
        $coloresClasifica = array();
        foreach ($colores as $color) {
            $coloresClasifica[$color['posicion']] = $color;
        }

    $clasificacionFinal = array();
    $coloresLeyenda = array();$posicion=0;
    foreach ($clasificacion as $key => $clasifica) {
        $posicion ++;
        $colorFondo = '';
        $colorTexto = '';
        $css = 'color:black;background-color:white';

            
           
            if (array_key_exists($posicion, $coloresClasifica)) {
                $colorFondo = $coloresClasifica[$posicion]['color_fondo'];
                $colorTexto = $coloresClasifica[$posicion]['color_texto'];
                if (!empty($colorFondo)) {
                    $backgroundColor = 'background-color: '.$colorFondo;
                }
                $css = 'color:'.$colorTexto.';'.$backgroundColor ?? '';
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_fondo'] = $colorFondo;
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_texto'] = $colorTexto;
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['texto'] = $coloresClasifica[$posicion]['texto'];
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_id'] = $coloresClasifica[$posicion]['color_id'];
            }
        
        if ($clasifica['equipo_id'] > 0) {
            $clasificacionFinal[] = array(
                        'posicion' => $clasifica['posicion'],
                        'css' => $css,
                        'equipo_id' => $clasifica['equipo_id'],
                        'nombre' => $clasifica['nombre'],
                        'nombreCorto' => $clasifica['nombreCorto'],
                        'puntos' => $clasifica['puntos'],
                        'jugados' => $clasifica['jugados'],
                        'ganados' => $clasifica['ganados'],
                        'empatados' => $clasifica['empatados'],
                        'perdidos' => $clasifica['perdidos'],
                        'gFavor' => $clasifica['gFavor'],
                        'gContra' => $clasifica['gContra'],
                        'preferente' => $clasifica['preferente'],
                        'u_punto' => $clasifica['u_punto'],
                        'u_victoria' => $clasifica['u_victoria'],
                        'u_empate' => $clasifica['u_empate'],
                        'u_derrota' => $clasifica['u_derrota'],
                        'u_gol_favor' => $clasifica['u_gol_favor'],
                        'u_gol_contra' => $clasifica['u_gol_contra'],
                        'racha' => substr($clasifica['racha'], 0, -1),
                    );
        }
    }

    $leyenda = array();
    foreach ($coloresLeyenda as $key => $color) {
        $leyenda[] = array(
                'fondo' => $color['color_fondo'],
                'color' => $color['color_texto'],
                'leyenda' => $color['texto'],
                'color_id' => $color['color_id'],
            );
    }

    if (isset($porJornada)) {
        $goles = 0;
        $partidos = 0;
        foreach ($porJornada as $key => $value) {
            $goles = $goles + $value['goles_locales'] + $value['goles_visitantes'];
            $partidos = $partidos + $value['victorias_locales'] + $value['empates'] + $value['victorias_visitantes'];
            // imp($goles);
        }
        if ($goles > 0) {
            $porJornada['total']['promedio'] = round(($goles / $partidos), 2);
        } else {
            $porJornada['total']['promedio'] = 0;
        }
        $porJornada['total']['goles'] = $goles;
        $porJornada['total']['partidos'] = $partidos;

        if ($jornada >= $jornadaActiva && 50 != $jornada) { //50 viene de los widgets
            $mysqli = conectar();
            $sql = "UPDATE torneo SET discr='".$porJornada['total']['promedio'].','.$porJornada['total']['goles'].','.$porJornada['total']['partidos']."' WHERE id=".$torneo_id;
            $resultadoSQL = mysqli_query($mysqli, $sql);
            clasPromedioGoles($categoria_torneo_id);
        }
    }

    if (isset($porResultados)) {
        foreach ($porResultados as $key => $value) {
            $aux[$key] = $value['diferencia'];
        }

        if (count($porResultados) > 0) {
            array_multisort($aux, SORT_DESC, $porResultados);
        }
    }

    return array(
            'clasificacionFinal' => $clasificacionFinal,
            'leyenda' => $leyenda,
            );
}

/////////////////////
