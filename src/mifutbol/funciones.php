<?php
function nComunidad($comunidad_id){
    switch ($comunidad_id) {
        case '1':$nombre='Galicia';break;
        case '2':$nombre='Asturias';break;
        case '3':$nombre='Cantabria';break;
        case '4':$nombre='Euskadi';break;
        case '5':$nombre='Cataluña';break;
        case '6':$nombre='Com Valenciana';break;
        case '7':$nombre='Com. de Madrid';break;
        case '8':$nombre='Castilla y León';break;
        case '9':$nombre='Andalucía';break;
        case '10':$nombre='Andalucía';break;
        case '11':$nombre='Illes Balears';break;
        case '12':$nombre='Canarias';break;
        case '13':$nombre='Región de Murcia';break;
        case '14':$nombre='Extremadura';break;
        case '15':$nombre='Navarra';break;
        case '16':$nombre='La Rioja';break;
        case '17':$nombre='Aragón';break;
        case '18':$nombre='Castilla La Mancha';break;
    }
    return $nombre;
}

function nCTorneo($categoria_torneo_id){
    switch ($categoria_torneo_id) {
        case '1':$nombre='RFEF';break;
        case '4':$nombre='Autonómica';break;
        case '5':$nombre='Juvenil';break;
        case '6':$nombre='Cadete';break;
        case '7':$nombre='Femenino';break;
        case '14':$nombre='Infantil';break;
        case '15':$nombre='Alevín';break;
        case '16':$nombre='Benjamín';break;
        case '17':$nombre='Fútbol Sala';break;
    }
    return $nombre;
}

function nCEquipo($categoria_id){
    switch ($categoria_id) {
        case '1':$nombre='Senior Masculino';break;
        case '2':$nombre='Senior Femenino';break;
        case '3':$nombre='Juvenil Masculino';break;
        case '4':$nombre='Cadete Masculino';break;
        case '21':$nombre='Infantil Masculino';break;
        case '22':$nombre='Base Femenino';break;
        case '23':$nombre='Alevín';break;
        case '24':$nombre='Benjamín';break;
        case '25':$nombre='Prebenjamín';break;
        case '26':$nombre='Juvenil Femenino';break;
        case '27':$nombre='Cadete Femenino';break;
        case '28':$nombre='Infantil Femenino';break;
        case '29':$nombre='Debutante';break;
        case '30':$nombre='Alevín Femenino';break;
    }
    return $nombre;
}

//********************Generar clasificacion*********************************
function aClasificacion($clas){ 

    
$jornada=$clas['jornada'];
$grupo_id=$clas['grupo_id'];
$jornadas=$clas['jornadas'];
$puntosPorganar=$clas['puntosPorganar'];
$p=$clas['partidos'];
$gestor_id=$clas['gestor_id'];

$fe = './json/gestores/'.$gestor_id.'/'.$grupo_id.'-equipos.json';
$json = file_get_contents($fe);$eq = json_decode($json, true);

$cuentaPartidos=0; $tp=1000;
$segundavuelta=($jornadas/2);

$sanciones = array();
$colores = array();

$jornada_inicio = 1;
$jornada_fin = $jornada;
$tipoClasificacion=0;

$partidos=array();
foreach ($p as $k => $v) {
    foreach ($v as $k1 => $v1) {        
        foreach ($eq as $k2 => $v2) { 
            if(isset($v1['local_id']) && $v1['local_id']==$v2['id']){ 
                $v1['localText']=$v2['equipo'];$p[$k][$k1]['localText']=$v2['equipo'];
            }
            if(isset($v1['visitante_id']) && $v1['visitante_id']==$v2['id']){
                $v1['visitanteText']=$v2['equipo'];$p[$k][$k1]['visitanteText']=$v2['equipo'];
            }            
        }
        $partidos[]=$v1;
    }
}

$encuentros[0] = array('equipoLocal_id' => 0,
                     'equipoVisitante_id' => 0,
                     'goles_local' => 0,
                     'goles_visitante' => 0,
                     'estado_partido' => 0, );



foreach ($partidos as $key => $partido) { 


    $idEquipoCasa = $partido['local_id']??0;
    $idEquipoFuera = $partido['visitante_id']??0;
    $equipos[$idEquipoCasa] = $idEquipoCasa;
    $equipos[$idEquipoFuera] = $idEquipoFuera;

    $encuentros[$key]['equipoLocal_id'] = $partido['local_id']??0;
    $encuentros[$key]['equipoVisitante_id'] = $partido['visitante_id']??0;
    $encuentros[$key]['goles_local'] = $partido['goles_local']??0;
    $encuentros[$key]['goles_visitante'] = $partido['goles_visitante']??0;
    $encuentros[$key]['estado_partido'] = $partido['estado_partido']??0;
    
}

foreach ($equipos as $key => $equipo) {
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

//calculo de puntos

foreach ($partidos as $partido) {    
    $partido['local_id']=$partido['local_id']??0;
    $partido['visitante_id']=$partido['visitante_id']??0;
    if (0 == $partido['local_id'] || 0 == $partido['visitante_id']) {continue;}    
    $nombreCasaCorto = $partido['localText']??'';
    $nombreFueraCorto = $partido['visitanteText']??''; 
    if (1!= $partido['estado_partido'] && 2!=$partido['estado_partido'] && 6!= $partido['estado_partido']) {
        $ideC = (int) $partido['local_id'];
        $ideF = (int) $partido['visitante_id'];
        
        $nombreCasa = $partido['localText']??'';
        $clasificacion[$ideC]['nombre'] = $nombreCasa;
        $clasificacion[$ideC]['equipo_id'] = $ideC;
        
        $nombreFuera = $partido['visitanteText']??'';
        $clasificacion[$ideF]['nombre'] = $nombreFuera;
        $clasificacion[$ideF]['equipo_id'] = $ideF;
        continue;
    }
    if ($partido['jornada']<$jornada_inicio || $partido['jornada']>$jornada_fin) {continue;}
    if ((0 == $partido['local_id']) || (0 == $partido['visitante_id'])) {continue;}
    if ((''==trim($partido['localText'])) || (''==trim($partido['visitanteText']))){continue;}
    $ideC = (int) $partido['local_id'];
    $ideF = (int) $partido['visitante_id'];
    $estado_partido = (int) $partido['estado_partido'];
    $goles_local = (int) $partido['goles_local'];
    $goles_visitante = (int) $partido['goles_visitante'];
    if (1 == $estado_partido || 2 == $estado_partido || 6 == $estado_partido) {
        /**************calculo de puntos*******************/
        if ($goles_local > $goles_visitante) {
            if ($contar_casa) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorganar;
                $clasificacion[$ideC]['ganados'] = $clasificacion[$ideC]['ganados'] + 1;
            }
            if ($contar_fuera) {
                $clasificacion[$ideF]['perdidos'] = $clasificacion[$ideF]['perdidos'] + 1;
            }
        } elseif ($goles_local == $goles_visitante) {
            if ($contar_casa) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideC]['empatados'] = $clasificacion[$ideC]['empatados'] + 1;
            }
            if ($contar_fuera) {
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideF]['empatados'] = $clasificacion[$ideF]['empatados'] + 1;
            }
        } else {
            if ($contar_casa) {
                $clasificacion[$ideC]['perdidos'] = $clasificacion[$ideC]['perdidos'] + 1;
            }
            if ($contar_fuera) {
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorganar;
                $clasificacion[$ideF]['ganados'] = $clasificacion[$ideF]['ganados'] + 1;
            }
        }
        /*****************calculo de jugados******************/
        if ($contar_casa) {
            $clasificacion[$ideC]['jugados'] = $clasificacion[$ideC]['jugados'] + 1;
            $clasificacion[$ideC]['gFavor'] = $clasificacion[$ideC]['gFavor'] + $goles_local;
            $clasificacion[$ideC]['gContra'] = $clasificacion[$ideC]['gContra'] + $goles_visitante;
        }
        if ($contar_fuera) {
            $clasificacion[$ideF]['jugados'] = $clasificacion[$ideF]['jugados'] + 1;
            $clasificacion[$ideF]['gFavor'] = $clasificacion[$ideF]['gFavor'] + $goles_visitante;
            $clasificacion[$ideF]['gContra'] = $clasificacion[$ideF]['gContra'] + $goles_local;
        }

        if ( 2 == $estado_partido || 6 == $estado_partido) {
            $clasificacion[$ideC]['preferente'] = 1;
            $clasificacion[$ideF]['preferente'] = 1;
        }
    }
    if ($contar_casa) {
        $nombreCasa = $partido['localText'];
        $clasificacion[$ideC]['nombre'] = $nombreCasa;
        $clasificacion[$ideC]['equipo_id'] = $ideC;
    }
    if ($contar_fuera) {
        $nombreFuera = $partido['visitanteText'];
        $clasificacion[$ideF]['nombre'] = $nombreFuera;
        $clasificacion[$ideF]['equipo_id'] = $ideF;
    }
}

//sanciones

$f = './json/gestores/'.$gestor_id.'/'.$grupo_id.'-clas_sanciones.json';
if (@file_exists($f)) {
$json = file_get_contents($f);$sanciones = json_decode($json, true);
} else { $sanciones=array(); }
foreach ($sanciones as $k => $v) {
    foreach ($v as $k1 => $v1) {
        $clasificacion[$k1]['puntos'] = $clasificacion[$k1]['puntos']-$v1['puntos'];
    }
}


//fin de calculo de puntos

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

    /*
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
    include 'pintaryleyenda.php';*/


    $file = './json/gestores/'.$gestor_id.'/'.$grupo_id.'-clasificacion.json';      
    guardarJSON($clasificacion, $file);
    return $clasificacion;
    
}



?>