<?php
$pesJornada = ''; 
$pesGoleadores = ''; 
$pesZamoras = ''; 
$pesLimpio = ''; 
$pesFichajes = '';
$pesHistorico = ''; 
$pesCalendario = ''; 
$pesEquipos = ''; 
$pesTwiter = ''; 
$pesFidelidad = ''; 
$pesAnterior = '';
$pesNoticias = '';


    switch ($modelo) {
        case 'Jornada':
            $pesJornada = 'active';            
            if ($jornadaActiva > $jornadas) { $valorJornada = $jornadas;} 
            break;

        case 'Goleadores':
            $pesGoleadores = 'active';
            $goleadores = XclasificacionGoleadores($temporada_id);
            break;

        /*case 'Zamoras':
            $pesZamoras = 'active';
            $zamoras = XclasificacionZamoras($temporada_id, $valorJornada);
            break;*/

        case 'Limpio':
            $pesLimpio = 'active';
            break;

        case 'Fichajes':
            
            $pesFichajes = 'active'; 
            break;

        case 'Historico':
            $pesHistorico = 'active';
            $equiposCS = XcampeonesysubcampeonesLiga($division);
            break;

        case 'Calendario':
            $pesCalendario = 'active';            
        break;

        case 'Equipos':$pesEquipos = 'active';break;

        /*case 'Fidelidad':
            $pesFidelidad = 'active'; $valor = $temporada_id; $modo = 0; $txtmodo = 'temporada';
            $apuestas = XapuestaTorneo($temporada_id);
            break;*/

        default:
            $pesNoticias = 'active';$pesFichajes = '';
            break;
    }