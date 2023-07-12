<?php 
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

    $mysqli = conectar();
    $sql = "UPDATE torneo SET discr='".$porJornada['total']['promedio'].','.$porJornada['total']['goles'].','.$porJornada['total']['partidos']."' WHERE id=".$torneo_id;
    $resultadoSQL = mysqli_query($mysqli, $sql);

?>    	
	