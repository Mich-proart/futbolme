<?php
$diaN = date('N');
$cachetime = 3600; //86400 un dia.
//$cachetime = -1;

$f = './json/temporada/'.$temporada_id.'/tipo.json';
if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    
    if ((time() - $fichero_time)> $cachetime) {
        Xtipo($temporada_id);
        
    }
} else {
    Xtipo($temporada_id);    
}

//Xtipo($temporada_id);


$json = file_get_contents($f);
$datos = json_decode($json, true);



$torneo=$datos['torneo'];
$traduccion=$torneo['traduccion'];
$equipos=$datos['equipos'];
$comunidad_id = $torneo['idComunidad'];
$nombreComunidad = $torneo['nombreComunidad'];
$categoria_torneo_id = $torneo['categoria_torneo_id'];

$nombrePais = '';
$traduccion = $torneo['traduccion'];
$nombreTorneo = $torneo['nombre'];
$jornadas = $torneo['jornadas']; 
$jornadaActiva = $torneo['jornadaActiva'];
$tipoClasificacion = $torneo['tipoClasificacion'];
$categoria_id = $torneo['categoria_id'];
$mitadJornada = (int) ($jornadas / 2);
$desarrollo = $torneo['desarrollo'];
$tipoTorneo = $torneo['tipo_torneo'];
$categoria_torneo_id = $torneo['categoria_torneo_id'];
$categoria_id = $torneo['categoria_id'];
$sexo = $torneo['sexo'];
$idPais = $torneo['idPais'];
//jornada en pantalla
if (1 == $tipoTorneo && $valorJornada > $jornadas) {$valorJornada = $jornadas;}
if ($valorJornada == 0 ) {$valorJornada = $jornadaActiva;}


    $aplazados=array();
    $estad=array();
    $estad['jugados']=0;
    $estad['vl']=0;
    $estad['vv']=0;
    $estad['em']=0;
    $estad['gl']=0;
    $estad['gv']=0;
    foreach ($datos['partidos'] as $key => $value) {
        if ($value['estado_partido']>2 && $value['jornada']<$jornadaActiva){ $aplazados[]=$value; }
        if ($value['estado_partido']!=1){ continue; }
        $estad['jugados']++;
        if ($value['goles_local']>$value['goles_visitante']){$estad['vl']++;}
        if ($value['goles_local']==$value['goles_visitante']){$estad['em']++;}
        if ($value['goles_local']<$value['goles_visitante']){$estad['vv']++;}
        $estad['gl']=$estad['gl']+$value['goles_local'];
        $estad['gv']=$estad['gv']+$value['goles_visitante'];
    }

    
    if ($estad['jugados']>0){
    $textoLiga= 'La '.$torneo['nombre'].', con '.($estad['gl']+$estad['gv']).' goles en '.$estad['jugados'].' partidos, obtiene un coeficiente 
    de '.number_format((($estad['gl']+$estad['gv'])/$estad['jugados']),2).' goles por partido, que materializan '.$estad['vl'].' victorias locales, '.$estad['em'].' empates y '.$estad['vv'].' victorias visitantes.';
    } else { $textoLiga= ''; }

    

    
    

    $id_original=$torneo['id_original']??0;
    

    $fichajes=$datos['fichajes'];
    $clasificacion=$datos['clasificacion'];
    $nPartidos=count($datos['partidos']);

    $equiposTw = array();
    foreach ($equipos as $kk => $value) {   
        $equiposTw[$kk]['id'] = $value['equipo_id'];
        $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
        $equiposTw[$kk]['idPais'] = $value['pais_id'];
        $equiposTw[$kk]['twitter'] = $value['slug'];
        $equiposTw[$kk]['club_id'] = $value['club_id']??NULL;
    }

$equiposTw2=$equiposTw;

    $visible = $torneo['visible'];
    if ($visible < 4) {
        echo "<div class='text-center'>";
        echo 'Este torneo ya no esta gestionado en futbolme.com... ';
        echo "<a href='/index.php'>continuar</a>";
        echo '</div>';
        die;
    }

    

    if ('SIN COMUNIDAD' != $nombreComunidad) {
        $nombreComunidad .= '-';
    } else {
        $nombreComunidad = '';
    }
    //$nombrePais = $torneo['nombrePais'];
    
    //ascensos y descensos
    $pest_ascenso = 'nacional';
    switch ($categoria_torneo_id) {
    case '1':$pest_ascenso = 'nacional';break;
    case '4':$pest_ascenso = 'autonomicas';break;
    case '5':$pest_ascenso = 'juveniles';break;
    case '7':$pest_ascenso = 'femenino';break;
    }

    
    //divisiones
    $division = $torneo['division_id']??6;$txtDivision ='';
    if (2 == $division){ $txtDivision = 'Primera División';}
    if (3 == $division){ $txtDivision = 'Segunda División';}
    if (4 == $division){ $txtDivision = 'Segunda División B';}
    if (5 == $division){ $txtDivision = 'Tercera División';}

    
    if ($visible<100){
    $partidosJornada=array();
    if ($valorJornada==$jornadaActiva){
        $f = './json/temporada/'.$temporada_id.'/partidosActiva.json';    
        if (@file_exists($f)) { 
           $json = file_get_contents($f);
           $partidosJornada = json_decode($json, true);
        } else {
           $partidosJornada = Xpartidos($temporada_id, $valorJornada); 
           $carpeta = './json/temporada/'.$temporada_id;       
           guardarJSON($partidosJornada, $carpeta.'/partidosActiva.json');
        }
        $asalto=1;
    } else {
        $partidosJornada = Xpartidos($temporada_id, $valorJornada);
        if ($tipoTorneo==1){
            $clas = array(
                    'temporada_id' => $temporada_id,
                    'jornada' => $valorJornada,
                    'grupo_id' => 0,
                    'equipo_id' => 0,
                    'tipoClasificacion' => $torneo['tipoClasificacion'],
                    'torneo_id' => $torneo['torneo_id'],
                    'jornadas' => $torneo['jornadas'],
                    'puntosPorganar' => $torneo['tipoPuntuacion'],
                    );
            $clasificacion = XgenerarClasificacion($clas);
        }
        $asalto=0;
    }
    $NpartidosJornada=count($partidosJornada);
    } else {$NpartidosJornada=0; $valorJornada=0; $partidosJornada=0; $modelo="Noticias";}

    $modelo = $_GET['modelo']??'';
    if ($valorJornada>0 && $nPartidos>0 && $modelo==''){ $modelo="Jornada"; }

    $paraFed=Array();
    $paraFed['temporada_id']=$temporada_id;
    $paraFed['fase']=$torneo['apifutbol'];
    $paraFed['c']=$torneo['apiRFEFcompeticion'];
    $paraFed['g']=$torneo['apiRFEFgrupo'];
    $paraFed['j']=$valorJornada;
    $paraFed['co']=$torneo['idComunidad'];

    //equipo o selección
    $seleccion = 0; $amistoso = 0; $tipo_eliminatoria = 1;
    if ($temporada_id>665 && $temporada_id<670) { $seleccion = 1;}
    if ($temporada_id>192 && $temporada_id<196) { $seleccion = 1;}
    if (238 == $temporada_id || 191 == $temporada_id || 235 == $temporada_id
    || 244 == $temporada_id || 243 == $temporada_id || 286 == $temporada_id
    || 232 == $temporada_id || 216 == $temporada_id || 290 == $temporada_id
    || 189 == $temporada_id || 203 == $temporada_id || 202 == $temporada_id || 200 == $temporada_id
    ) { $seleccion = 1;}
    //amistosos
    //imp($activa);
    //imp($valorJornada);



    //************//estos torneos cambian el tipoTorneo
    //************//estos torneos cambian el tipoTorneo
    //************//estos torneos cambian el tipoTorneo
    //************//estos torneos cambian el tipoTorneo
    if (442 == $temporada_id || 231 == $temporada_id) {
        $tipoTorneo = 5; //amistosos
        $partidos = Xpartidos($temporada_id, 0);
        $fasesSQL = Xfases_jornadas($temporada_id);
    }
    //eliminatorio corto
    if (244 == $temporada_id || 187 == $temporada_id ||
        185 == $temporada_id || 188 == $temporada_id ||
        ($temporada_id > 257 && $temporada_id < 276)) {
        $tipoTorneo = 4; //eliminatorioCorto
        $fasesSQL = Xfases_jornadas($temporada_id);
        foreach ($fasesSQL as $value) {
            $tipo_eliminatoria = $value['tipo_eliminatoria'];
            if (3 == $tipo_eliminatoria) {
                $fases = prepararFasesEliminatorio($fasesSQL);
                $grupos = prepararGruposEliminatorio($temporada_id, $fases);
                $partidos[$value['fase_id']] = Xpartidos($temporada_id, $value['fase_id']);
            } else {
                $partidos[$value['fase_id']] = Xpartidos($temporada_id, $value['fase_id']);
            }
        }
    }



    //promociones
    if (239 == $temporada_id || 462 == $temporada_id || 206 == $temporada_id || 207 == $temporada_id || 208 == $temporada_id) {
        $promocion = 1;
        $tipoTorneo = 8; //eliminatorioPromocion
        $fasesSQL = Xfases_jornadas($temporada_id);
        $partidos = Xpartidos($temporada_id, 0);
        foreach ($fasesSQL as $value) {

            if ($valorJornada == $value['fase_id']) {
                $tipo_eliminatoria = $value['tipo_eliminatoria'];
            }
        }
        $fases = prepararFasesEliminatorio($fasesSQL);
        foreach ($fases as $id => $fila) {
            if ($id == $valorJornada) {
                $ne = $fila['nombre'];
            }
        }

        

        /*
        $primeros = array();
        $segundo = array();
        $terceros = array();
        $cuartos = array();
        $promocion = array();
        if (206 == $temporada_id or 207 == $temporada_id) {
            for ($i = 3; $i < 7; ++$i) {
                $f = './json/temporada/'.$i.'/clasificacion.json';
                $json = file_get_contents($f);
                $clasificacion = json_decode($json, true);
                $c = $clasificacion['clasificacionFinal'];
                $primeros[$i - 2]['grupo'] = ($i - 2);
                $primeros[$i - 2]['equipo_id'] = $c[0]['equipo_id'];
                $primeros[$i - 2]['nombre'] = $c[0]['nombre'];

                $segundo[$i - 2]['grupo'] = ($i - 2);
                $segundo[$i - 2]['equipo_id'] = $c[1]['equipo_id'];
                $segundo[$i - 2]['nombre'] = $c[1]['nombre'];

                $terceros[$i - 2]['grupo'] = ($i - 2);
                $terceros[$i - 2]['equipo_id'] = $c[2]['equipo_id'];
                $terceros[$i - 2]['nombre'] = $c[2]['nombre'];

                $cuartos[$i - 2]['grupo'] = ($i - 2);
                $cuartos[$i - 2]['equipo_id'] = $c[3]['equipo_id'];
                $cuartos[$i - 2]['nombre'] = $c[3]['nombre'];

                $promocion[$i - 2]['grupo'] = ($i - 2);
                $promocion[$i - 2]['equipo_id'] = $c[15]['equipo_id'];
                $promocion[$i - 2]['nombre'] = $c[15]['nombre'];
            }
        }
        if (208 == $temporada_id) {
            for ($i = 7; $i < 25; ++$i) {
                $valor = 0;
                $f = './json/temporada/'.$i.'/clasificacion.json';
                $json = file_get_contents($f);
                $clasificacion = json_decode($json, true);
                $c = $clasificacion['clasificacionFinal'];
                $primeros[$i - 6]['grupo'] = ($i - 6);
                $primeros[$i - 6]['equipo_id'] = $c[0]['equipo_id'];
                $primeros[$i - 6]['nombre'] = $c[0]['nombre'];

                if (21 == $i) {
                    $valor = 1;
                }
                $segundo[$i - 6]['grupo'] = ($i - 6);
                $segundo[$i - 6]['equipo_id'] = $c[(1 + $valor)]['equipo_id'];
                $segundo[$i - 6]['nombre'] = $c[(1 + $valor)]['nombre'];

                $terceros[$i - 6]['grupo'] = ($i - 6);
                $terceros[$i - 6]['equipo_id'] = $c[(2 + $valor)]['equipo_id'];
                $terceros[$i - 6]['nombre'] = $c[(2 + $valor)]['nombre'];

                $cuartos[$i - 6]['grupo'] = ($i - 6);
                $cuartos[$i - 6]['equipo_id'] = $c[(3 + $valor)]['equipo_id'];
                $cuartos[$i - 6]['nombre'] = $c[(3 + $valor)]['nombre'];
            }
        }
        */
    }



    //************//estos torneos cambian el tipoTorneo

    if (2 == $tipoTorneo) {


        $fasesSQL = Xfases_jornadas($temporada_id);
        foreach ($fasesSQL as $value) {
            if ($valorJornada == $value['fase_id']) {
                $tipo_eliminatoria = $value['tipo_eliminatoria'];
            }
        }
        if ((empty($valorJornada) || '-1' == $valorJornada) && 186 != $temporada_id) {
            $fecha = new \DateTime();
    //        $diaAnterior = new \DateTime();
    //        $diaSiguiente = new \DateTime();
            $dia = $fecha->format('Y-m-d');
            $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
            $diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);
            $diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
            $diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');
            $pr = array();
            $ph = array();
            $pa = array();
            $pm = array();
            $partidos = Xpartidos($temporada_id, 0);
            foreach ($partidos as  $value) {
                if (!isset($value['jornada'])) {
                    continue;
                }
                if ($value['fecha'] == $diaAnterior) {
                    $ph[] = $value;
                    continue;
                }
                if ($value['fecha'] == $dia) {
                    $ph[] = $value;
                    continue;
                }
                if ($value['fecha'] == $diaSiguiente) {
                    $ph[] = $value;
                    continue;
                }
                if (1 == $value['estado_partido']) {
                    continue;
                }
            }

            $partidos = $ph;
            if (count($partidos) > 0) {
                $tipo_eliminatoria = 1;
                $porFecha = 1;
            } else {
                $partidos = Xpartidos($temporada_id, $valorJornada);
                $porFecha = 0;
            }
        } else {
            $partidos = Xpartidos($temporada_id, $valorJornada);
            $porFecha = 0;
        }

        //si empieza el 238 hay que quitarlo de la condicion. && 238 != $temporada_id
        if (!isset($_GET['idH7']) && !isset($_GET['eH7'])) {
            $fases = prepararFasesEliminatorio($fasesSQL);
            $grupos = prepararGruposEliminatorio($temporada_id, $fases);

            foreach ($fases as $id => $fila) {
                if ($id == $valorJornada) {
                    $ne = $fila['nombre'];
                }
            }

            $primerGrupo = 0;
            $nombreprimerGrupo = '';
            $conta = 0;

            if (3 == $tipo_eliminatoria) {
                foreach ($grupos as $fase => $gruposFase) {
                    if ($fase == $valorJornada) {
                        foreach ($gruposFase as $id => $grupo) {
                            $conta = $conta + 1;
                            if (1 == $conta && 0 == $primerGrupo) {
                                $primerGrupo = $id;
                                $nombreprimerGrupo = $grupo['nombre'];
                            }
                            if ($grupo_id == $id) {
                                $primerGrupo = $id;
                                $nombreprimerGrupo = $grupo['nombre'];
                            }
                        }
                    }
                }
            } //si tipo eliminatoria=3

            if (238 == $temporada_id && 4 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 18;
                $nombreprimerGrupo = 'Grupo D';
            }
            if (235 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 13;
                $nombreprimerGrupo = 'Grupo 8';
            }

            if (216 == $temporada_id && 4 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 16;
                $nombreprimerGrupo = 'Grupo B';
            }

            if (189 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 14;
                $nombreprimerGrupo = 'Grupo 9';
            }

            if (232 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 7;
                $nombreprimerGrupo = 'Grupo 2';
            }
            if (666 == $temporada_id && 70 == $valorJornada && 0 == $grupo_id) {
                $primerGrupo = 9;
                $nombreprimerGrupo = 'Grupo 4';
            }
        } else {
            if (isset($_GET['idH7'])) {
                $numeroPartidos = 1; //para mostrar el ir a la temporada actual
                $sql = 'SELECT id AS htid,nombre_temporada,torneo_id FROM historicotemporadas WHERE id='.$_GET['idH7'];
                $valorJornada = 0;
                if (isset($_GET['jornada'])) {
                    $valorJornada = $_GET['jornada'];
                }
            } else {
                $numeroPartidos = 0;
                $sql = 'SELECT id AS htid,nombre_temporada,torneo_id FROM historicotemporadas WHERE torneo_id='.$id_original.' ORDER BY id DESC';
                $valorJornada = 0;
            }
            $temporada_original = $temporada_id;
            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            $edicion = $resultado['nombre_temporada'];
            $htid = $resultado['htid'];
            $temporada_id = $resultado['htid'];
            $torneo_id = $resultado['torneo_id'];
            $nombreTorneo = $nombreTorneo.' '.$edicion;
            $p = X2partidosH($temporada_id);
            if (isset($_GET['eH7'])) {
                $partidos = $p;
                $equipo_id = $_GET['eH7'];
            } else {
                $fases = array();
                $grupos = array();
                $partidos = array();
                foreach ($p as $key => $value) {
                    if (0 == $key && 0 == $valorJornada) {
                        $valorJornada = $value['jornada'];
                    }
                    if ($value['jornada'] == $valorJornada) {
                        $partidos[] = $value;
                    }
                    $fases[$value['jornada']]['id'] = $temporada_id;
                    $fases[$value['jornada']]['eliminatoria_id'] = $value['jornada'];
                    $fases[$value['jornada']]['nombre'] = $value['nombre_eliminatoria'];
                    $fases[$value['jornada']]['orden'] = $key;
                    if ($value['grupo_id'] > 0) {
                        $fases[$value['jornada']]['tipo_eliminatoria'] = 3;
                        $grupos[$value['jornada']][$value['grupo_id']]['id'] = $temporada_id;
                        $grupos[$value['jornada']][$value['grupo_id']]['grupo_id'] = $value['grupo_id'];
                        $grupos[$value['jornada']][$value['grupo_id']]['nombre'] = 'Grupo '.$key;
                        $grupos[$value['jornada']][$value['grupo_id']]['orden'] = $key;
                    } else {
                        $fases[$value['jornada']]['tipo_eliminatoria'] = 1;
                    }
                }
            } //si existe eH7 cogemos todos los partidos
            //$tipoTorneo = 7;
        }
    }
    