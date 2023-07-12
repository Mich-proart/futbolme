<?php

function impH($ob)
{
    echo '<pre>';

    print_r($ob);

    echo '</pre>';
}

function partidosClasificacionH($ht_id)
{
    $campos = 'p.idPartido,
p.jornada,
p.resulCasa goles_local,
p.nomCasa local,
p.fm_local_id equipoLocal_id,
p.resulFuera goles_visitante,
p.nomFuera visitante,
p.fm_visitante_id equipoVisitante_id';
    $tabla = 'nacionalcalendario p';
    $condicion = ' WHERE p.idTemporada='.$ht_id;

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function equipos_temporadaH($temporada_id)
{
    $campos = 'p.fm_local_id equipo_id, p.nomCasa equipo_nombre';
    $tabla = ' nacionalcalendario p';
    $condicion = ' WHERE p.idTemporada='.$temporada_id;
    $orden = ' GROUP BY p.nomCasa';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

    //********************************************************************

    //********************************************************************

    //********************************************************************

    //********************************************************************

    //********************Generar clasificacion*********************************

    function leerClasificacionH($th_id, $jornada, $temporada)
    {
        $mysqli = conectar();

        $consulta = 'SELECT posicion, equipo, puntos, jugados, ganados, empatados, perdidos, golesFavor, golesContra, 
		estilo, temporada_id, idViejo, idDivision, equipo_id, fm_torneo_id, 
		color_texto, color_fondo, diferencia, temporada
		FROM nacionalclasificacionok WHERE temporada_id='.$th_id.' ORDER BY posicion';

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

        return $resultado;
    }

    function generarClasificacionH($th_id, $jornada, $temporada)
    {
        $partidos = partidosClasificacionH($th_id, $jornada);

        if (0 == $jornada) {
            $jornada = 50;
        }
        $jornada_inicio = 1;
        $jornada_fin = $jornada;

        $equiposTor = equipos_temporadaH($th_id);

        $codigoTorneo = 0;
        if ($temporada < 1995) {
            $puntosPorganar = 2;
            $puntosPorempatar = 1;
            $puntosPorperder = 0;
        } else {
            $puntosPorganar = 3;
            $puntosPorempatar = 1;
            $puntosPorperder = 0;
        }

        //$equipos=array();

        $clasificacion = array();

        $encuentros[0] = array('equipoLocal_id' => 0,
                             'equipoVisitante_id' => 0,
                             'goles_local' => 0,
                             'goles_visitante' => 0,
                             );

        foreach ($partidos as $key => $partido) {
            $idEquipoCasa = $partido['equipoLocal_id'];
            $idEquipoFuera = $partido['equipoVisitante_id'];
            //$equipos[]=$idEquipoCasa;
            //$equipos[]=$idEquipoFuera;

            $encuentros[$key]['equipoLocal_id'] = $partido['equipoLocal_id'];
            $encuentros[$key]['equipoVisitante_id'] = $partido['equipoVisitante_id'];
            $encuentros[$key]['goles_local'] = $partido['goles_local'];
            $encuentros[$key]['goles_visitante'] = $partido['goles_visitante'];
        }

        foreach ($equiposTor as $key => $equipo) {
            $clasificacion[$equipo['equipo_id']] = array(
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
                'idViejo' => 0,
                'diferencia' => 0,
            );
        }

        //impH($equipos);

        foreach ($partidos as $partido) {
            if ($partido['jornada'] < $jornada_inicio || $partido['jornada'] > $jornada_fin) {
                continue;
            }
            $ideC = (int) $partido['equipoLocal_id'];
            $ideF = (int) $partido['equipoVisitante_id'];
            $goles_local = (int) $partido['goles_local'];
            $goles_visitante = (int) $partido['goles_visitante'];

            /**************calculo de puntos*******************/

            if ($goles_local > $goles_visitante) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorganar;
                $clasificacion[$ideC]['ganados'] = $clasificacion[$ideC]['ganados'] + 1;
                $clasificacion[$ideF]['perdidos'] = $clasificacion[$ideF]['perdidos'] + 1;
            }

            if ($goles_local == $goles_visitante) {
                $clasificacion[$ideC]['puntos'] = $clasificacion[$ideC]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideC]['empatados'] = $clasificacion[$ideC]['empatados'] + 1;
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorempatar;
                $clasificacion[$ideF]['empatados'] = $clasificacion[$ideF]['empatados'] + 1;
            }

            if ($goles_local < $goles_visitante) {
                $clasificacion[$ideF]['puntos'] = $clasificacion[$ideF]['puntos'] + $puntosPorganar;
                $clasificacion[$ideC]['perdidos'] = $clasificacion[$ideC]['perdidos'] + 1;
                $clasificacion[$ideF]['ganados'] = $clasificacion[$ideF]['ganados'] + 1;
            }

            /*****************calculo de jugados******************/
            $clasificacion[$ideC]['jugados'] = $clasificacion[$ideC]['jugados'] + 1;
            $clasificacion[$ideC]['gFavor'] = $clasificacion[$ideC]['gFavor'] + $goles_local;
            $clasificacion[$ideC]['gContra'] = $clasificacion[$ideC]['gContra'] + $goles_visitante;

            $clasificacion[$ideF]['jugados'] = $clasificacion[$ideF]['jugados'] + 1;
            $clasificacion[$ideF]['gFavor'] = $clasificacion[$ideF]['gFavor'] + $goles_visitante;
            $clasificacion[$ideF]['gContra'] = $clasificacion[$ideF]['gContra'] + $goles_local;

            $nombreCasa = $partido['local'];
            $clasificacion[$ideC]['nombre'] = $nombreCasa;
            $clasificacion[$ideC]['equipo_id'] = $ideC;
            $clasificacion[$ideC]['diferencia'] = ($clasificacion[$ideC]['gFavor'] - $clasificacion[$ideC]['gContra']);

            $nombreFuera = $partido['visitante'];
            $clasificacion[$ideF]['nombre'] = $nombreFuera;
            $clasificacion[$ideF]['equipo_id'] = $ideF;
            $clasificacion[$ideF]['diferencia'] = ($clasificacion[$ideF]['gFavor'] - $clasificacion[$ideF]['gContra']);
        }

        foreach ($clasificacion as $key => $clasifica) {
            include 'c_0001.php';
            include 'c_0002.php';
            include 'c_0003.php';
        }

        $ordenPuntos = [];
        $ordenDirefenciaGoles = [];
        $ordenMasGoles = [];
        $ordenGanados = [];

        foreach ($clasificacion as $key => $clasifica) {
            $ordenPuntos[$key] = $clasifica['puntos'];
            $ordenDirefenciaGoles[$key] = $clasifica['diferencia'];
            $ordenMasGoles[$key] = $clasifica['gFavor'];
            $ordenGanados[$key] = $clasifica['ganados'];
        }

        array_multisort($ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificacion);

        $p = 0;

        foreach ($clasificacion as $key => $clasifica) {
            $p = $p + 1;
            $clasifica['posicion'] = $p;
            $nueva_clasificacion[$key] = $clasifica;
        }

        $clasificacion = $nueva_clasificacion;
        unset($nueva_clasificacion);

        return $clasificacion;
        /**********************************************************AVERAGE PARTICULAR*******************************************/
    }

function grabarClasificacion($temporada_id, $clasificacion, $datos)
{
    $mysqli = conectar();
    include 'colores.php';

    $consulta = 'INSERT INTO nacionalclasificacionok(
	posicion, equipo, puntos, 
	jugados, ganados, empatados, perdidos, golesFavor, golesContra, 
	estilo, temporada_id, idViejo, idDivision, equipo_id, fm_torneo_id, 
	color_texto, color_fondo, diferencia, temporada) VALUES ';

    $estilo = $datos['estilo'];
    $idDivision = $datos['idDivision'];
    $fm_torneo_id = $datos['fm_torneo_id'];
    $temporada = $datos['temporada'];

    foreach ($clasificacion as $fila) {
        $colores = coloresTabla($temporada_id, $fila['posicion']);

        $consulta .= '(
	'.$fila['posicion'].",'".$fila['nombre']."',".$fila['puntos'].',
	'.$fila['jugados'].','.$fila['ganados'].','.$fila['empatados'].','.$fila['perdidos'].','.$fila['gFavor'].','.$fila['gContra'].',
	'.$estilo.','.$temporada_id.',0,'.$idDivision.','.$fila['equipo_id'].','.$fm_torneo_id.",
	'".$colores['color_texto']."','".$colores['color_fondo']."',".$fila['diferencia'].','.$temporada.'
	), ';
    }

    $consulta = substr($consulta, 0, -2);
    //echo $consulta;

    $borrar = 'DELETE FROM nacionalclasificacionok WHERE temporada_id='.$temporada_id;
    $resultado1 = mysqli_query($mysqli, $borrar);

    $resultado2 = mysqli_query($mysqli, $consulta);
}
