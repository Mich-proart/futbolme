<?php


namespace App\Application\Repositories;


use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;

class ClasificacionRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

//********************Generar clasificacion*********************************
    function XgenerarClasificacion($clas)
    {
        $partidoRepo = new PartidoRepository($this->db);
        $generalRepo = new GeneralRepository($this->db);



        $temporada_id = $clas['temporada_id'];
        $jornada = $clas['jornada'];
        $grupo_id = $clas['grupo_id'];
        $equipo_id = $clas['equipo_id'];
        $tipoClasificacion = $clas['tipoClasificacion'];
        $torneo_id = $clas['torneo_id'];
        $jornadas = $clas['jornadas'];
        $puntosPorganar = $clas['puntosPorganar'];

        $jornada = abs($jornada);

        $cuentaPartidos = 0;
        $tp = 1000;
        $segundavuelta = ($jornadas / 2);

        $sanciones = array();
        $colores = array();

        $jornada_inicio = 1;
        if (0 == $jornada) {
            $jornada = 48;
        }
        $jornada_fin = $jornada;
        //if (0 == $jornada_fin) { $jornada_fin = 48; }

        if ($jornada < 49) {
            $partidos = $partidoRepo->Xpartidos($temporada_id, 0);
            $sanciones = $generalRepo->Xsancion($temporada_id);
            $colores = $generalRepo->Xcolores($temporada_id, $grupo_id);
        } else {
            $partidos = $generalRepo->XpartidosH($temporada_id, (50 - $jornada));
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
            'estado_partido' => 0,);

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

        #include 'calculoDePuntos.php';


        $coloresResultado = [
            'V' => '#01DF01',
            'E' => 'orange',
            'D' => '#de1629',
        ];

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
            $ideCclub = (int) $partido['club_local'];
            $ideFclub = (int) $partido['club_visitante'];


            if (1 != $partido['estado_partido'] && 2 != $partido['estado_partido'] && 6 != $partido['estado_partido']) {
                $ideC = (int) $partido['equipoLocal_id'];
                $ideF = (int) $partido['equipoVisitante_id'];

                $nombreCasa = $partido['local'];
                $nombreCasaCorto = $partido['localCorto'];
                $clasificacion[$ideC]['nombre'] = $nombreCasa;
                $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
                $clasificacion[$ideC]['equipo_id'] = $ideC;
                $clasificacion[$ideC]['club_id'] = $ideCclub;

                $nombreFuera = $partido['visitante'];
                $nombreFueraCorto = $partido['visitanteCorto'];
                $clasificacion[$ideF]['nombre'] = $nombreFuera;
                $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
                $clasificacion[$ideF]['equipo_id'] = $ideF;
                $clasificacion[$ideF]['club_id'] = $ideFclub;
                continue;
            }

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

                    $clasificacion[$ideC]['resultadoPartidoEnJuego'] = $goles_local . '-' . $goles_visitante;
                    $clasificacion[$ideF]['resultadoPartidoEnJuego'] = $goles_visitante . '-' . $goles_local;


                    if ($goles_local > $goles_visitante) {
                        $resuladoLocal = 'V';
                        $resuladoVisitante = 'D';
                    } elseif ($goles_local < $goles_visitante) {
                        $resuladoLocal = 'D';
                        $resuladoVisitante = 'V';
                    } else {
                        $resuladoLocal = 'E';
                        $resuladoVisitante = 'E';
                    }

                    $clasificacion[$ideC]['resultadoPartidoEnJuegoColor'] = $coloresResultado[$resuladoLocal];
                    $clasificacion[$ideF]['resultadoPartidoEnJuegoColor'] = $coloresResultado[$resuladoVisitante];
                }
            }

            if ($contar_casa) {
                $nombreCasa = $partido['local'];
                $clasificacion[$ideC]['nombre'] = $nombreCasa;
                $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
                $clasificacion[$ideC]['equipo_id'] = $ideC;
                $clasificacion[$ideC]['club_id'] = $ideCclub;
            }
            if ($contar_fuera) {
                $nombreFuera = $partido['visitante'];
                $clasificacion[$ideF]['nombre'] = $nombreFuera;
                $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
                $clasificacion[$ideF]['equipo_id'] = $ideF;
                $clasificacion[$ideF]['club_id'] = $ideFclub;
            }
        }

        //imp($sanciones);
        if (count($sanciones) > 0) {
            foreach ($sanciones as $key => $sancion) {
                if (isset($clasificacion[$sancion['equipo_id']])) {
                    $clasificacion[$sancion['equipo_id']]['puntos'] = $clasificacion[$sancion['equipo_id']]['puntos'] + $sancion['puntos'];
                    $clasificacion[$sancion['equipo_id']]['jugados'] = $clasificacion[$sancion['equipo_id']]['jugados'] + $sancion['jugados'];
                    $clasificacion[$sancion['equipo_id']]['ganados'] = $clasificacion[$sancion['equipo_id']]['ganados'] + $sancion['ganados'];
                    $clasificacion[$sancion['equipo_id']]['empatados'] = $clasificacion[$sancion['equipo_id']]['empatados'] + $sancion['empatados'];
                    $clasificacion[$sancion['equipo_id']]['perdidos'] = $clasificacion[$sancion['equipo_id']]['perdidos'] + $sancion['perdidos'];
                    $clasificacion[$sancion['equipo_id']]['gFavor'] = $clasificacion[$sancion['equipo_id']]['gFavor'] + $sancion['gFavor'];
                    $clasificacion[$sancion['equipo_id']]['gContra'] = $clasificacion[$sancion['equipo_id']]['gContra'] + $sancion['gContra'];
                    $sanciones[$key]['nombre'] = $clasificacion[$sancion['equipo_id']]['nombre'];
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

        
       

        if (0 == $tipoClasificacion && $jornada > $segundavuelta) {
            #include 'averageParticular.php';

            $liguillaInterna = array();

            $segundoEmpate=array();

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
                                    'club_id' => 0,
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
                        $genAnt = [];

                        foreach ($reOrdenar as $key2 => $clasifica) {
                            $oP[$key2] = $clasifica['puntos'];
                            $oDG[$key2] = $clasifica['gFavor'] - $clasifica['gContra'];
                            $oMG[$key2] = $clasifica['gFavor'];
                            $ant[$key2] = $clasifica['anterior'];
                            $gen[$key2] = $clasifica['anteriorGF'] - $clasifica['anteriorGC'];
                            $genAnt[$key2] = $clasifica['anteriorGF'];
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


                        array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $gen, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC,$genAnt, SORT_DESC, SORT_NUMERIC, $reOrdenar);

                        foreach ($reOrdenar as $key2 => $orden) { //cambiamos las posiciones dentro del grupo
                            $orden['posicion'] = $min_pos;
                            $nuevo_orden[$key2] = $orden;
                            $min_pos = $min_pos + 1;
                        }


                        $reOrdenar = $nuevo_orden;
                        unset($nuevo_orden);


                        //die;




                        foreach ($reOrdenar as $k) {

                            $np = $k['posicion'];
                            $eq = $k['equipo_id'];


                            $segundoEmpate[$k['empateDe']][]=$k;


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
                            $puntos2empate=$k['puntos'];
                        }

                    }
                } //count($eEmpatado)>1
            } //foreach($empatadosPuntos
        }

        if (isset($segundoEmpate)) {
            foreach ($segundoEmpate as $empatadosOtra) {
                if (count($empatadosOtra) > 2) {
                    unset($empatadosPuntos);
                    foreach ($empatadosOtra as $key => $clasifi2) {//encontramos puntos repetidos
                        $empatadosPuntos[$clasifi2['puntos']][] = $clasifi2['equipo_id'];
                    }
                    #include 'averageParticular.php';

                    $liguillaInterna = array();

                    $segundoEmpate=array();

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
                                            'club_id' => 0,
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
                                $genAnt = [];

                                foreach ($reOrdenar as $key2 => $clasifica) {
                                    $oP[$key2] = $clasifica['puntos'];
                                    $oDG[$key2] = $clasifica['gFavor'] - $clasifica['gContra'];
                                    $oMG[$key2] = $clasifica['gFavor'];
                                    $ant[$key2] = $clasifica['anterior'];
                                    $gen[$key2] = $clasifica['anteriorGF'] - $clasifica['anteriorGC'];
                                    $genAnt[$key2] = $clasifica['anteriorGF'];
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


                                array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $gen, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC,$genAnt, SORT_DESC, SORT_NUMERIC, $reOrdenar);

                                foreach ($reOrdenar as $key2 => $orden) { //cambiamos las posiciones dentro del grupo
                                    $orden['posicion'] = $min_pos;
                                    $nuevo_orden[$key2] = $orden;
                                    $min_pos = $min_pos + 1;
                                }


                                $reOrdenar = $nuevo_orden;
                                unset($nuevo_orden);


                                //die;




                                foreach ($reOrdenar as $k) {

                                    $np = $k['posicion'];
                                    $eq = $k['equipo_id'];


                                    $segundoEmpate[$k['empateDe']][]=$k;


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
                                    $puntos2empate=$k['puntos'];
                                }

                            }
                        } //count($eEmpatado)>1
                    } //foreach($empatadosPuntos
                }
            }
        }

        /*

        $empate2021=array();
        $reOrdenar=array();

        foreach ($clasificacion as $key => $value) {
          $empate2021[$value['puntos']][]=$value;
        }

        foreach ($empate2021 as $key => $value) {
            if (count($value)==1){ unset($empate2021[$key]); }
        } //eliminamos las puntuaciones sin empate

        

        $equipos2021=array();
        
        foreach ($empate2021 as $key => $value) {
            $cadena='';
            foreach ($value as $k => $v) {
                
                $cadena.=$v['equipo_id'].',';
                $equipos2021[$v['equipo_id']]['equipo']=$v['nombreCorto'];
                $equipos2021[$v['equipo_id']]['posicion']=$v['posicion'];
                $equipos2021[$v['equipo_id']]['puntos']=0;
                $equipos2021[$v['equipo_id']]['golesF']=0;
                $equipos2021[$v['equipo_id']]['golesC']=0;
                
            }
            $cadena=substr($cadena, 0,-1);
            $partidos2021 = $partidoRepo->Xpartidos2021($cadena);
            if (empty($partidos2021)){ continue; }
            if (count($partidos2021)<2){ continue; } //eliminamos donde solo haya un partido 
            
            foreach ($partidos2021 as $k => $v) {
                if ($v['goles_local']>$v['goles_visitante']){

                    $equipos2021[$v['equipoLocal_id']]['puntos']=$equipos2021[$v['equipoLocal_id']]['puntos']+3;
                }  

                if ($v['goles_local']<$v['goles_visitante']){

                    $equipos2021[$v['equipoVisitante_id']]['puntos']=$equipos2021[$v['equipoVisitante_id']]['puntos']+3;
                    
                }

                if ($v['goles_local']==$v['goles_visitante']){

                    $equipos2021[$v['equipoLocal_id']]['puntos']=$equipos2021[$v['equipoLocal_id']]['puntos']+1;
                    $equipos2021[$v['equipoVisitante_id']]['puntos']=$equipos2021[$v['equipoVisitante_id']]['puntos']+1;
                    
                }

                $equipos2021[$v['equipoLocal_id']]['golesF']=$equipos2021[$v['equipoLocal_id']]['golesF']+$v['goles_local'];
                    
                $equipos2021[$v['equipoVisitante_id']]['golesF']=$equipos2021[$v['equipoVisitante_id']]['golesF']+$v['goles_visitante'];

                $equipos2021[$v['equipoLocal_id']]['golesC']=$equipos2021[$v['equipoLocal_id']]['golesC']+$v['goles_visitante'];
                    
                $equipos2021[$v['equipoVisitante_id']]['golesC']=$equipos2021[$v['equipoVisitante_id']]['golesC']+$v['goles_local'];


            }

            
            $contador=0;$min_pos=0;
            foreach ($equipos2021 as $key => $value) {
                if ($contador==0){ $min_pos=$value['posicion']; $contador=1; }
                foreach ($value as $k => $v) {
                   $reOrdenar[$key][$k]=$v;
                   $reOrdenar[$key]['equipo_id']=$key;
                }
            }

            
            $oP = [];
            $oDG = [];
            $oMG = [];
            $ant = [];
            

            foreach ($reOrdenar as $k => $v1) {

                $oP[$k] = $v1['puntos'];
                $oDG[$k] = $v1['golesF'] - $v1['golesC'];
                $oMG[$k] = $v1['golesF'];
                $ant[$k] = $v1['posicion'];              

            }

            array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $reOrdenar);

             

             $porId=array();
             foreach ($clasificacion as $key => $value) {
                $porId[$value['equipo_id']]=$value;
             }


             $contador=$min_pos;
             foreach ($reOrdenar as $key => $value) {
                 $porId[$value['equipo_id']]['posicion']=$contador;
                 $contador++;
             }

             

             $porPosicion=array();
             foreach ($porId as $key => $value) {
                 $porPosicion[$value['posicion']]=$value;
             }
             ksort($porPosicion);
             $clasificacion=$porPosicion;
             unset($porPosicion);
             unset($porId);

             //echo 'estoy sacando partidos de la cadena '.$cadena.'<hr />';
        }





        

        //echo 'estoy en el repositorio antes de pintar';die;

        */

        #include 'pintaryleyenda.php';

        /****************************PINTANDO CLASIFICACION*********************************************************/



        $coloresClasifica = array();
        foreach ($colores as $color) {
            $coloresClasifica[$color['posicion']] = $color;
        }

        $clasificacionFinal = array();
        $coloresLeyenda = array();
        foreach ($clasificacion as $key => $clasifica) {
            $posicion = $key + 1;
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
                $clasificacionFinalElemento = array(
                    'posicion' => $clasifica['posicion'],
                    'css' => $css,
                    'equipo_id' => $clasifica['equipo_id'],
                    'club_id' => $clasifica['club_id'],
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
                );

                if (array_key_exists('resultadoPartidoEnJuego', $clasifica)) {
                    $clasificacionFinalElemento['resultadoPartidoEnJuego'] = $clasifica['resultadoPartidoEnJuego'];
                }

                if (array_key_exists('resultadoPartidoEnJuegoColor', $clasifica)) {
                    $clasificacionFinalElemento['resultadoPartidoEnJuegoColor'] = $clasifica['resultadoPartidoEnJuegoColor'];
                }

                $clasificacionFinal[] = $clasificacionFinalElemento;

                if ($clasifica['equipo_id'] == $equipo_id) {
                    $rendimiento = array();
                    $rendimiento[$equipo_id][$jornada] = array(
                        'posicion' => $clasifica['posicion'],
                        'css' => $css,
                        'equipo_id' => $clasifica['equipo_id'],
                        'club_id' => $clasifica['club_id'],
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
                    );
                    break;
                }
            }
        }

        if (0 == $equipo_id) {
            $leyenda = array();
            foreach ($coloresLeyenda as $key => $color) {
                $leyenda[] = array(
                    'fondo' => $color['color_fondo'],
                    'color' => $color['color_texto'],
                    'leyenda' => $color['texto'],
                    'color_id' => $color['color_id'],
                );
            }

            #include 'porJornada.php';

            $porJornada = array();
            foreach ($partidos as $key => $partido) {
                if (1 != $partido['estado_partido']) {
                    continue;
                }
                if (!isset($porJornada[$partido['jornada']]['goles_locales'])) {
                    $porJornada[$partido['jornada']]['goles_locales'] = $partido['goles_local'];
                } else {
                    $porJornada[$partido['jornada']]['goles_locales'] = $porJornada[$partido['jornada']]['goles_locales'] + $partido['goles_local'];
                }
                if (!isset($porJornada[$partido['jornada']]['goles_visitantes'])) {
                    $porJornada[$partido['jornada']]['goles_visitantes'] = $partido['goles_visitante'];
                } else {
                    $porJornada[$partido['jornada']]['goles_visitantes'] = $porJornada[$partido['jornada']]['goles_visitantes'] + $partido['goles_visitante'];
                }

                if ($partido['goles_local'] > $partido['goles_visitante']) {
                    if (!isset($porJornada[$partido['jornada']]['victorias_locales'])) {
                        $porJornada[$partido['jornada']]['victorias_locales'] = 1;
                    } else {
                        $porJornada[$partido['jornada']]['victorias_locales'] = $porJornada[$partido['jornada']]['victorias_locales'] + 1;
                    }
                }

                if ($partido['goles_local'] < $partido['goles_visitante']) {
                    if (!isset($porJornada[$partido['jornada']]['victorias_visitantes'])) {
                        $porJornada[$partido['jornada']]['victorias_visitantes'] = 1;
                    } else {
                        $porJornada[$partido['jornada']]['victorias_visitantes'] = $porJornada[$partido['jornada']]['victorias_visitantes'] + 1;
                    }
                }

                if ($partido['goles_local'] == $partido['goles_visitante']) {
                    if (!isset($porJornada[$partido['jornada']]['empates'])) {
                        $porJornada[$partido['jornada']]['empates'] = 1;
                    } else {
                        $porJornada[$partido['jornada']]['empates'] = $porJornada[$partido['jornada']]['empates'] + 1;
                    }
                }
            }

            $goles = 0; $partidos = 0;

            foreach ($porJornada as $key => $value) {
                if (!isset($value['goles_locales'])) {
                    $value['goles_locales'] = 0;
                }
                if (!isset($value['goles_visitantes'])) {
                    $value['goles_visitantes'] = 0;
                }
                if (!isset($value['victorias_locales'])) {
                    $value['victorias_locales'] = 0;
                }
                if (!isset($value['empates'])) {
                    $value['empates'] = 0;
                }
                if (!isset($value['victorias_visitantes'])) {
                    $value['victorias_visitantes'] = 0;
                }
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

            $sql = "UPDATE torneo SET discr='".$porJornada['total']['promedio'].','.$porJornada['total']['goles'].','.$porJornada['total']['partidos']."' WHERE id=".$torneo_id;
            $resultadoSQL = $this->db->query($sql);

            $resultado = array(
                'clasificacionFinal' => $clasificacionFinal,
                'leyenda' => $leyenda,
                'sanciones' => $sanciones,
                'porJornada' => $porJornada, );
        } else {
            $resultado = array('rendimiento' => $rendimiento);
        }


        //imp($resultado);

        return $resultado;
    }

//********************Generar clasificacion USA*********************************
    function XgenerarClasificacionUsa($temporada_id, $jornada = 0, $grupo_id = 0)
    {
        /*imp($temporada_id);
        imp($jornada);
        imp($grupo_id);*/

        $f = '../json/temporada/' . $temporada_id . '/tipo.json';
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
            'estado_partido' => 0,);

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
            $sql = 'SELECT grupo FROM temporada_equipo WHERE equipo_id=' . $equipo . ' AND temporada_id=' . $temporada_id;
            $resultadoSQL = $this->db->query($sql);
            $resultado = $this->db->fetch($resultadoSQL);
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

        #include 'calculoDePuntosUsa.php';

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



        #include 'pintaryleyendaUsa.php';
        /****************************PINTANDO CLASIFICACION*********************************************************/
        $coloresClasifica = array();
        foreach ($colores as $color) {
            $coloresClasifica[$color['posicion']] = $color;
        }

        $clasificacionFinal = array();
        $coloresLeyenda = array();
        foreach ($clasificacion as $key => $clasifica) {
            $posicion = $key + 1;
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

        $resultado = array(
            'clasificacionFinal' => $clasificacionFinal,
            'leyenda' => $leyenda,
        );


        return $resultado;
    }

//********************Play clasificacion*********************************
    function XplayClasificacion($temporada_id, $jornada)
    {
        $repoPartidos = new PartidoRepository($this->db);

        $f = '../json/temporada/' . $temporada_id . '/tipo.json';
        $json = file_get_contents($f);
        $datos = json_decode($json, true);

        $torneo = $datos['torneo'];

        $tipoClasificacion = $torneo['tipoClasificacion'];
        $jornadas = $torneo['jornadas'];
        $jornadaActiva = $torneo['jornadaActiva'];
        $mitadJornada = (int)($jornadas / 2);

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


            echo '<h4>Clasificación en las últimas ' . ($jornadas_a_restar + 1) . ' jornadas</h4>';
        }

        if (0 == $jornada_fin) {
            $jornada_fin = $jornadas;
        }

        $partidos = $repoPartidos->Xpartidos($temporada_id, 0);

        $encuentros[0] = array('equipoLocal_id' => 0,
            'club_local' => 0,
            'club_visitante' => 0,
            'equipoVisitante_id' => 0,
            'goles_local' => 0,
            'goles_visitante' => 0,
            'estado_partido' => 0,);

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

        #include 'calculoDePuntosPlay.php';
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

            if (1 != $partido['estado_partido']) {
                $ideC = (int) $partido['equipoLocal_id'];
                $ideF = (int) $partido['equipoVisitante_id'];
                $ideCC = (int) $partido['club_local'];
                $ideCF = (int) $partido['club_visitante'];
                $nombreCasa = $partido['local'];
                $nombreCasaCorto = $partido['localCorto'];
                $clasificacion[$ideC]['nombre'] = $nombreCasa;
                $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
                $clasificacion[$ideC]['equipo_id'] = $ideC;
                $clasificacion[$ideC]['club_id'] = $ideCC;
                $nombreFuera = $partido['visitante'];
                $nombreFueraCorto = $partido['visitanteCorto'];
                $clasificacion[$ideF]['nombre'] = $nombreFuera;
                $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
                $clasificacion[$ideF]['equipo_id'] = $ideF;
                $clasificacion[$ideF]['club_id'] = $ideCF;
                continue;
            }

            //imp($jornada_inicio);imp($jornada_fin);

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

            if (1 == $estado_partido || 2 == $estado_partido) {
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
            }

            if ($contar_casa) {
                $nombreCasa = $partido['local'];
                $clasificacion[$ideC]['nombre'] = $nombreCasa;
                $clasificacion[$ideC]['nombreCorto'] = $nombreCasaCorto;
                $clasificacion[$ideC]['equipo_id'] = $ideC;
            }
            if ($contar_fuera) {
                $nombreFuera = $partido['visitante'];
                $clasificacion[$ideF]['nombre'] = $nombreFuera;
                $clasificacion[$ideF]['nombreCorto'] = $nombreFueraCorto;
                $clasificacion[$ideF]['equipo_id'] = $ideF;
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
        $partidoRepo = new PartidoRepository($this->db);
        $generalRepo = new GeneralRepository($this->db);
        $funcionesHelper = new FuncionesHelper($this->db);


        $partidos = $partidoRepo->Xpartidos($temporada_id, $jornada, $grupo_id);


        $datos = $generalRepo->Xtipo($temporada_id);
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
        $sanciones = $generalRepo->Xsancion($temporada_id);
        //imp($directos);

        $colores = $generalRepo->Xcolores($temporada_id, $grupo_id);


        $puntosPorganar = 3;
        $puntosPorempatar = 1;
        $puntosPorperder = 0;

        $clasificacion = array();
        $encuentros[0] = array('equipoLocal_id' => 0,
            'equipoVisitante_id' => 0,
            'goles_local' => 0,
            'goles_visitante' => 0,
            'estado_partido' => 0,);
        $nueva_clasificacion = array();

        #include '_clasiTipo2.php';
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

        #include '_clasiEmpate.php';
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

                    if (238 == $temporada_id) {
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


        /****************************PINTANDO CLASIFICACION*********************************************************/


        $coloresClasifica = array();
        foreach ($colores as $color) {
            $coloresClasifica[$color['posicion']] = $color;
        }

        $clasificacionFinal = array();
        $coloresLeyenda = array();
        $posicion = 0;
        foreach ($clasificacion as $key => $clasifica) {
            $posicion++;
            $colorFondo = '';
            $colorTexto = '';
            $css = 'color:black;background-color:white';


            if (array_key_exists($posicion, $coloresClasifica)) {
                $colorFondo = $coloresClasifica[$posicion]['color_fondo'];
                $colorTexto = $coloresClasifica[$posicion]['color_texto'];
                if (!empty($colorFondo)) {
                    $backgroundColor = 'background-color: ' . $colorFondo;
                }
                $css = 'color:' . $colorTexto . ';' . $backgroundColor ?? '';
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
                $sql = "UPDATE torneo SET discr='" . $porJornada['total']['promedio'] . ',' . $porJornada['total']['goles'] . ',' . $porJornada['total']['partidos'] . "' WHERE id=" . $torneo_id;
                $resultadoSQL = $this->db->query($sql);
                $funcionesHelper->clasPromedioGoles($categoria_torneo_id);
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

}