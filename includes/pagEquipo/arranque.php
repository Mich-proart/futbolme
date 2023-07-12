<?php


$datos = XequipoClub($equipo_id);

//imp($datos);

$equipoClub = $datos['datos'];
$twEquipo = $equipoClub['slug'];
$torneos = $datos['torneos'];




$liga = $datos['liga'];
$grupo_liga = $datos['grupo_liga'];
$visible=$datos['visible']??5;



$division = $datos['division']??1000;
$equipotxt = $equipoClub['nombre'];
$categoriatxt = $equipoClub['categoriaN'];
//imp($categoriatxt);
foreach ($torneos as $key => $value) {
    if ($value['categoria_torneo_id']==17){$categoriatxt.=' - Fútbol Sala'; break; }
}
$club_id = $equipoClub['club_id'];



$pais_id = $equipoClub['pais_id'];
$es_seleccion = $equipoClub['es_seleccion'];
$desaparecido = $equipoClub['desaparecido'];



$categoria_torneo_id = 0;$posiciones=array();
if ('Senior Masculino' == $categoriatxt && 60 == $pais_id) {
    $posiciones = XequipoPosiciones($equipo_id);
    if ($liga < 25) {
        $categoria_torneo_id = 1;
    } else {
        $categoria_torneo_id = 4;
    }
}

if ('Juvenil Masculino' == $categoriatxt) {
    $categoria_torneo_id = 5;
}
if ('Senior Femenino' == $categoriatxt) {
    $categoria_torneo_id = 7;
}

$pest_ascenso = 'nacional';
switch ($categoria_torneo_id) {
case '1':
    $pest_ascenso = 'nacional';
    break;
case '4':
    $pest_ascenso = 'autonomicas';
    break;
case '5':
    $pest_ascenso = 'juveniles';
    break;
case '7':
    $pest_ascenso = 'femenino';
    break;
}

//imp($categoriatxt);

if (60 == $pais_id) {
    $es_nacional = 1;
} else {
    $es_nacional = 0;
}
if (60 == $pais_id && 0 == $es_seleccion) {
    $inicioTemporada = new DateTime('2015-06-30');
} else {
    $inicioTemporada = new DateTime('2011-06-30');
}

if ($desaparecido > 1000) {
    $titulo = $equipoClub['nombre'].' - Equipo desaparecido en  '.$desaparecido;
}

//if ($desaparecido<1000 && $es_nacional==1 && $es_seleccion==0) {
    $hoy = new DateTime('now');
//}

if (isset($club_id)) {
    $equipos = array();
    $r = Xequipos($club_id);
    
    foreach ($r as $equipo) {
        if ((int) $equipo_id == (int) ($equipo['id'])) {
            $titulo = $equipo['equipo'].' - '.$equipo['categoria'];
            $equipotxt = $equipo['equipo'];
            $categoriatxt = $equipo['categoria'];
            foreach ($torneos as $kt => $vt) {
                   if ($vt['categoria_torneo_id']==17){$categoriatxt.=' - Fútbol Sala'; break; }
            }
            $desaparecido = $equipo['desaparecido'];
            $twitter = $equipo['slug'];
        }
        if (0 == $equipo['torneo'] && $club_id<>8582) { //seleccion española
            continue;
        }
        $equipos[] = $equipo;
    }
}

if ($desaparecido > 0 && 'Datos' != $modelo) {$modelo = 'Historico'; }

$ePartidos = XequipoPartidos($equipo_id);

$estadisticas = $ePartidos['estadisticas'];

$golesEquipo = XequipoGoles($equipo_id);
$goles = $golesEquipo['goles'];
$realizadores = $golesEquipo['realizadores'];
$minutos = $golesEquipo['minutos'];
$aldescanso = $golesEquipo['aldescanso'];
$ultimogol = $golesEquipo['ultimogol'];

$totalPartidos=0;
 if (isset($ePartidos['partidos']) && count($ePartidos['partidos'])>0) {
    $totalPartidos=count($ePartidos['partidos']);
 }  



if (!isset($ePartidos['partidos']) && $modelo!='Plantilla' && $modelo!='Fichajes' && $modelo!='Equipos') {
    $modelo = 'Datos';
}

    switch ($modelo) {
        case 'Datos':
            $pesDatos = 'active';
        break;
        case 'Calendario':
            $pesCalendario = 'active';
            $partidos = array();
            $proximosPartidos = array();
            $porTorneos = array();
            $torneos = array();
            $partidosLiga = array();

            foreach ($ePartidos['partidos'] as $key => $value) {

                
                $fecha = date_create($value['fecha']);
                $diferencia = date_diff($fecha, $hoy);
                $dias = $diferencia->days;
                $invertido = $diferencia->invert;
                if (1 == $invertido || 0 == $dias) {
                    $proximosPartidos[] = $value;
                } else {
                    $partidos[] = $value;
                }
                $torneos[$value['temporada_id']]['tipo_torneo'] = $value['tipo_torneo'];
                $torneos[$value['temporada_id']]['nombreTorneo'] = $value['nombreTorneo'];
                $porTorneos[$value['temporada_id']][] = $value;
                if (1 == $value['tipo_torneo']) {
                    $_GET['nv'] = $value['nombreTorneo'];
                }
            }
            $proximoPartido = end($proximosPartidos);
            
        break;
        case 'Clasificacion':

            $pesClasificacion = 'active';
            $cachetime = 86400; //86400 un dia.
            $f = './json/temporada/'.$liga.'/clasificacion.json';

            if (@file_exists($f)) {
                $fichero_time = @filemtime($f);
            } else {
                $fichero_time = 0;
            }
            if ((time() - $cachetime) > $fichero_time) {
                $fichero_time = 0;
            }

            if ($fichero_time > 0) {
                $json = file_get_contents($f);
                $clasificacion = json_decode($json, true);
            } else {
                $torneo = Xtipo($liga);
                $valorJornada = $torneo['jornadaActiva'];

                $clas = array(
                'temporada_id' => $liga,
                'jornada' => $valorJornada,
                'grupo_id' => 0,
                'equipo_id' => 0,
                'tipoClasificacion' => 0,
                'torneo_id' => 0,
                'jornadas' => 0,
                'puntosPorganar' => 3,
                );

                
                $clasificacion = XgenerarClasificacion($clas);
               
            }
            if (isset($clasificacion)) {
                foreach ($clasificacion['clasificacionFinal'] as $key => $v) {
                    if ($v['equipo_id'] == $equipo_id) {
                        $datosClas = $v;
                        break;
                    }
                }
                $racha = Xracha($liga, $equipo_id);
                if (isset($racha[$equipo_id])) {
                    $fila = $racha[$equipo_id];
                    $e_racha = explode(';', $fila['racha']);
                }
            }

        break;
        case 'Plantilla':
            $pesPlantilla = 'active';
            $equipoPlantilla = XequipoPlantilla($equipo_id);
            $equipoPlantilla['liga'] = $liga;
        break;
        case 'Fichajes':
            $pesFichajes = 'active';
            $fichajes = Xfichajes($equipo_id);
        break;
        case 'Goleadores':
            $pesGoleadores = 'active';

        break;
        case 'Equipos':
            $pesEquipos = 'active';
        break;
        case 'Historico':
            $pesHistorico = 'active';
                if (isset($division) && @file_exists('./json/clasHistorica_'.$division.'.json')) {
                    $json = file_get_contents('./json/clasHistorica_'.$division.'.json');
                    $cH = json_decode($json, true);
                    foreach ($cH as $key => $v) {
                        if ($v['fm_equipo_id'] == $equipo_id) {
                            $clasHistorica = $v;
                            $clasHistorica['posicion'] = ($key + 1);
                            break;
                        }
                    }
                }
                if (isset($clasHistorica) && isset($datosClas)) {
                    $totalClas = array();
                    $totalClas['posicion'] = $clasHistorica['posicion'];
                    $totalClas['temporadas'] = $clasHistorica['temporadas'] + 1;
                    $totalClas['puntos'] = $clasHistorica['puntos'] + $datosClas['puntos'];
                    $totalClas['jugados'] = $clasHistorica['jugados'] + $datosClas['jugados'];
                    $totalClas['ganados'] = $clasHistorica['ganados'] + $datosClas['ganados'];
                    $totalClas['empatados'] = $clasHistorica['empatados'] + $datosClas['empatados'];
                    $totalClas['perdidos'] = $clasHistorica['perdidos'] + $datosClas['perdidos'];
                    $totalClas['golesFavor'] = $clasHistorica['golesFavor'] + $datosClas['gFavor'];
                    $totalClas['golesContra'] = $clasHistorica['golesContra'] + $datosClas['gContra'];
                }

                $porResultados = array();
                if (isset($porTorneos[$liga])) {
                    foreach ($porTorneos[$liga] as $key => $v2) {
                        if (1 == $v2['estado_partido']) {
                            $partidoClas = $v2['fecha'].','.$v2['jornada'].','.$v2['localCorto'].','.$v2['visitanteCorto'].','.$v2['goles_local'].','.$v2['goles_visitante'].','.$v2['equipoLocal_id'].','.$v2['equipoVisitante_id'].','.$v2['id'];
                            $porResultados[$v2['goles_local'].'-'.$v2['goles_visitante']][] = $partidoClas;
                            $porResultados[$v2['goles_local'].'-'.$v2['goles_visitante']]['diferencia'] = (int) ($v2['goles_local'] - $v2['goles_visitante']);
                        }
                    }
                }
                foreach ($porResultados as $key => $value) {
                    $aux[$key] = $value['diferencia'];
                }
                if (count($porResultados) > 0) {
                    array_multisort($aux, SORT_DESC, $porResultados);
                }
        break;
        case 'Anterior':
                $pesAnterior = 'active';
        break;
        case 'Twitter':
            $pesTwitter = 'active';
        break;
        case 'Tienda':
            $pesTienda = 'active';
        break;
        /*case 'Fidelidad':
            $pesFidelidad = 'active'; $valor = $equipo_id; $modo = 1; $txtmodo = 'equipo';
            $apuestas = XapuestaEquipo($equipo_id);
        break;*/
    }
