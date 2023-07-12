<?php
$pg2 = $pg.'&n2=Clasificacion&n4Torneo';
    $pgEquipo=$pg2;
    
    $ePartidos=$calendario;
    $tipoVista=$tipoVista??0;
    $_GET['vista']=$_GET['vista']??'puntos';
    $modelo='Clasificacion';
    $titulo=$equipo_txt;


        if (isset($_GET['vista'])) {
            $icono="";
            if ('Estadisticas' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 10;
                $pesEstadisticas = 'active';
                $goles = array();

                $golesEquipo = XequipoGoles($equipo_id);
                $goles = $golesEquipo['goles'];
            }

            if ('Puntos' == $_GET['vista']) {
                $titulo .= ' - '.$_GET['vista'].' conseguidos';
                $tipoVista = 1;
                $pesPuntos = 'active';
            }
            if ('Jugados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 2;
                $pesJugados = 'active';
            }
            if ('Ganados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 3;
                $pesGanados = 'active';
            }
            if ('Empatados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 4;
                $pesEmpatados = 'active';
            }
            if ('Perdidos' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 5;
                $pesPerdidos = 'active';
            }
            if ('Favor' == $_GET['vista']) {
                $titulo .= ' - Goles a '.$_GET['vista'];
                $tipoVista = 6;
                $pesFavor = 'active';
            }
            if ('Contra' == $_GET['vista']) {
                $titulo .= ' - Goles en '.$_GET['vista'];
                $tipoVista = 7;
                $pesContra = 'active';
            }
        }

    $vista=$_GET['vista'];


    $equipotxt=$equipo_txt;
    
    unset($partido);
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
    //require_once 'srcRecursos/pesClasificacion.php';
    require_once 'includes/pagEquipo/equipoClasificacion.php';
