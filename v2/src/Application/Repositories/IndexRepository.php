<?php


namespace App\Application\Repositories;


use App\Application\Helpers\DbHelper;
use App\Application\Helpers\UrlHelper;

class IndexRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
        $this->urlHelper = new UrlHelper($this->db);
    }

    public function getDirectos()
    {
        $partidos = json_decode(file_get_contents('../json/directos.json'), true);
        #$partidos = json_decode(file_get_contents('../json/home/mas30partidos/menos5directos/directos.json'), true);

        $partidosPreparados = [];
        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }

        return $partidosPreparados;
    }

    public function getPromocion()
    {
        $partidos = json_decode(file_get_contents('../json/promocion.json'), true);
        #$partidos = json_decode(file_get_contents('../json/home/mas30partidos/menos5directos/directos.json'), true);

        $partidosPreparados = [];
        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }

        return $partidosPreparados;
    }

    public function getPartidosSueltos()
    {
        $torneos = json_decode(file_get_contents('../json/partidosSueltos.json'), true);

        $torneosPartidosSueltosPreparados = [];
        foreach ($torneos as $keyTorneo => $torneo) {
            foreach ($torneo as $keyPartido => $partido) {
                $torneosPartidosSueltosPreparados[$keyTorneo][$keyPartido] = $this->prepararPartidoSuelto($partido);
            }
        }

        return $torneosPartidosSueltosPreparados;
    }

    public function prepararPartidoSuelto($partido)
    {

        $partidoPreparado = $partido;

        $partidoPreparado['colorL'] = '';
        $partidoPreparado['colorV'] = '';
        $partidoPreparado['ev'] = 0;
        $partidoPreparado['localCorto'] = $partido['home']['name'];
        $partidoPreparado['visitanteCorto'] = $partido['away']['name'];
        $partidoPreparado['idPais'] = $partido['idPais']??0;
        $partidoPreparado['clasificado'] = $partido['clasificado']??0;
        $partidoPreparado['jornada'] = $partido['extra']['round']??0;
        $partidoPreparado['estadio_nombre'] = $partido['extra']['round']??0;
        $partidoPreparado['estadio_localidad'] = $partido['extra']['round']??0;

        $partidoPreparado['fondocolorL'] = '';
        $partidoPreparado['fondocolorV'] = '';


        $partidoPreparado['betsapi']=$partido['id']??0;
        $partidoPreparado['comentarios']=$partido['comentario']??'';
        $partidoPreparado['hora_real']=$partido['hora_real']??'00:00:00';
        $partidoPreparado['parte']=0;
        $partidoPreparado['minutos']=0;


        $partidoPreparado['fecha1'] = date('Y-m-d H:i:s');
        $partidoPreparado['fecha1'] = date_create($partidoPreparado['fecha1']); //hora actual


        $partidoPreparado['fecha2'] = date_create();
        date_timestamp_set($partidoPreparado['fecha2'], $partidoPreparado['time']);
        $partidoPreparado['fecha'] = date_format($partidoPreparado['fecha2'], 'Y-m-d');
        $partidoPreparado['hora_prevista'] = date_format($partidoPreparado['fecha2'], 'H:i:s');


        if (isset($partidoPreparado['fecha'])){
            $timezone = new \DateTimeZone('Europe/Madrid');

            if ($partidoPreparado['hora_prevista'] != '00:00:11'){
                $partidoPreparado['fechaPartido'] = date_create_immutable_from_format('Y-m-d H:i:s',$partidoPreparado['fecha'].' '.$partidoPreparado['hora_prevista']??'00:00:00',$timezone);
                $partidoPreparado['fechaPartido'] = $partidoPreparado['fechaPartido']->setTimezone(new \DateTimeZone('UTC'));
                $partidoPreparado['fechaFinPartido'] = $partidoPreparado['fechaPartido']->modify('+120 minutes');
                $partidoPreparado['ffp'] = $partidoPreparado['fechaFinPartido']->format('c');
                $partidoPreparado['fp'] = $partidoPreparado['fechaFinPartido']->format('c');
            } else {
                $partidoPreparado['fechaPartido'] = date_create_immutable_from_format('Y-m-d',$partidoPreparado['fecha'],$timezone);
                $partidoPreparado['fechaPartido'] = $partidoPreparado['fechaPartido']->setTimezone(new \DateTimeZone('UTC'));
                $partidoPreparado['fp'] = $partidoPreparado['fechaPartido']->format('c');
                $partidoPreparado['ffp'] = $partidoPreparado['fechaPartido']->format('c');
            }
        }

        $partidoPreparado['pgLocal'] = $this->urlHelper->getUrlEquipo(
            10000000 + $partido['home']['id'],
            $partidoPreparado['localCorto']
        );

        $partidoPreparado['pgVisitante'] = $this->urlHelper->getUrlEquipo(
            10000000 + $partido['away']['id'],
            $partidoPreparado['visitanteCorto']
        );

        $partidoPreparado['equipo_id'] = 0;
        $partidoPreparado['colorFondo'] = 'white';

        $partidoPreparado['jornadaTxt'] = 'Jornada ' . $partidoPreparado['jornada'];

        $partidoPreparado['status'] = $partido['time_status'];


        switch ($partidoPreparado['status']) {
            case '0': $txt_status='Sin comenzar';break;
            case '1': $txt_status='En juego';break;
            case '2': $txt_status='Para ser fijado';break;
            case '3': $txt_status='Finalizado';break;
            case '4': $txt_status='Pospuesto';break;
            case '5': $txt_status='Cancelado';break;
            case '6': $txt_status='Walkover';break;
            case '7': $txt_status='interrumpido';break;
            case '8': $txt_status='Abandonado';break;
            case '9': $txt_status='retirado';break;
            case '99': $txt_status='eliminado';break;
            default: $txt_status='Sin definir';break;
        }

        $partidoPreparado['txt_status'] = $txt_status;

        $partidoPreparado['parte'] = 0;
        $partidoPreparado['ep'] = 0;
        $partidoPreparado['minuto'] = $partido['timer']['tm']??-1;
        $partidoPreparado['segundo'] = $partido['timer']['ts']??-1;
        $partidoPreparado['totalSegundos'] = (($partidoPreparado['minuto']*60)+$partidoPreparado['segundo']);
        $partidoPreparado['prolongacion'] = $partido['timer']['ta']??0; //tiempo añadido
        $partidoPreparado['juego'] = $partido['timer']['tt']??0;  //tiempo detenido
        $partidoPreparado['totalMinutos'] = $partidoPreparado['minuto']+$partidoPreparado['prolongacion']+1;

        $partidoPreparado['prorroga'] = 0;
        $partidoPreparado['gl'] = $partido['scores']['2']['home']??0;
        $partidoPreparado['gv'] = $partido['scores']['2']['away']??0;


        if (2 == $partidoPreparado['status']){
            if (($partidoPreparado['gl']+$partidoPreparado['gv'])>0){
                $partidoPreparado['ep'] = 1;
                $partidoPreparado['txt_status'] = 'Finalizado';
            }
            if (isset($partido['events'])) {
                $partidoPreparado['evs']=$partido['events'];
                $partidoPreparado['ultimo'] = end($evs);
                $partidoPreparado['ultimo'] = $partidoPreparado['ultimo']['text'];
                $partidoPreparado['t']   = 'Score at the end of Full Time';

                $final = strpos($partidoPreparado['ultimo'], $partidoPreparado['t']);
                if ($final === false) {
                    //echo "NO se ha encontrado la palabra deseada!!!!";
                } else {
                    $partidoPreparado['ep'] = 1;
                    $partidoPreparado['txt_status'] = 'Finalizado';
                }
            }
        }
//FINALIZADO  || 2 == $status
        if (3 == $partidoPreparado['status']) {
            $partidoPreparado['ep'] = 1;
            $partidoPreparado['txt_status'] = 'Finalizado';
        }

        if ($partidoPreparado['status'] >3 && $partidoPreparado['status'] < 7) {
            $partidoPreparado['ep'] = 4;
            $partidoPreparado['txt_status'] = 'Aplazado';
        }

        $partidoPreparado['minuto']=(int)$partidoPreparado['minuto'];
        $partidoPreparado['segundo']=(int)$partidoPreparado['segundo'];

        if (1 === (int)$partidoPreparado['status'] ) { //si esta en juego
//echo "<br />juego=".$juego;

            $partidoPreparado['colortexto'] = 'white';
            if (0 === (int)$partidoPreparado['juego'] ) {
                $partidoPreparado['parte'] = 0;
                if (0 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] ) {
                    $partidoPreparado['ep'] = 0;
                    $partidoPreparado['txt_status']='A punto de comenzar';
                }
                if (45 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] ) {
                    $partidoPreparado['ep'] = 6;
                    $partidoPreparado['txt_status']='Descanso';
                    $partidoPreparado['colortexto'] = 'marron';
                }
                if ($partidoPreparado['minuto']>44 && $partidoPreparado['minuto']<50) {
                    $partidoPreparado['ep'] = 6;
                    $partidoPreparado['txt_status']='Descanso';
                    $partidoPreparado['colortexto'] = 'marron'; //ultimas condiciones
                }
                if (90 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] && $partidoPreparado['prorroga']==0 ) {
                    $partidoPreparado['ep'] = 1;
                    $partidoPreparado['txt_status']='Finalizado';
                }
                if ($partidoPreparado['minuto']>89 && $partidoPreparado['minuto']<99 && $partidoPreparado['prorroga']==0) {
                    $partidoPreparado['ep'] = 1;
                    $partidoPreparado['txt_status']='Finalizado'; //ultimas condiciones
                }
                if (90 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] && $partidoPreparado['prorroga']==1 ) {
                    $partidoPreparado['ep'] = 8;
                    $partidoPreparado['txt_status']='Prórroga';
                }
                if (105 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] ) {
                    $partidoPreparado['ep'] = 11;
                    $partidoPreparado['txt_status']='Descanso prórroga';
                }
                if (120 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] && $partidoPreparado['prorroga']==0 ) {
                    $partidoPreparado['ep'] = 1;
                    $partidoPreparado['txt_status']='Finalizado';
                }
                if (120 === $partidoPreparado['minuto'] && 0===$partidoPreparado['segundo'] && $partidoPreparado['prorroga']==1 ) {
                    $partidoPreparado['ep'] = 7;
                    $partidoPreparado['txt_status']='Penaltis';
                }
                if ($partidoPreparado['minuto']>119 && $partidoPreparado['minuto']<125 && $partidoPreparado['prorroga']==0) {
                    $partidoPreparado['ep'] = 1;
                    $partidoPreparado['txt_status']='Finalizado'; //ultimas condiciones
                }


            } else {

                $partidoPreparado['ep'] = 2;
                if ($partidoPreparado['minuto']<$partidoPreparado['totalMinutos'] && $partidoPreparado['ep']===0) {
                    $partidoPreparado['parte'] = 1;
                    $partidoPreparado['txt_status']='primera parte';
                }
                if ($partidoPreparado['minuto']<$partidoPreparado['totalMinutos'] && $partidoPreparado['ep']===6) {
                    $partidoPreparado['parte'] = 2;
                    $partidoPreparado['txt_status']='segunda parte';
                }
                if ($partidoPreparado['minuto']<$partidoPreparado['totalMinutos'] && $partidoPreparado['ep']===8) {
                    $partidoPreparado['parte'] = 3;
                    $partidoPreparado['txt_status']='prórroga 1ª parte';
                }
                if ($partidoPreparado['minuto']<$partidoPreparado['totalMinutos'] && $partidoPreparado['ep']===11) {
                    $partidoPreparado['parte'] = 4;
                    $partidoPreparado['txt_status']='prórroga 2ª parte';
                }
                if ($partidoPreparado['parte']===0){
                    if ($partidoPreparado['minuto']>45) {
                        $partidoPreparado['parte']=2;
                    } else {
                        $partidoPreparado['parte']=1;
                    }
                }
                $partidoPreparado['minuto']=($partidoPreparado['minuto']+1);
            }

//echo "<br />estado partido=".$ep;

            if (1 == $partidoPreparado['parte']) { $partidoPreparado['colorfondo'] = '#f07474';}
            if (2 == $partidoPreparado['parte']) { $partidoPreparado['colorfondo'] = '#7cc002';}
            if (3 == $partidoPreparado['parte']) { $partidoPreparado['colorfondo'] = '#610B0B';}
            if (4 == $partidoPreparado['parte']) { $partidoPreparado['colorfondo'] = '#0B3B0B';}
            if (6 == $partidoPreparado['ep']) { $partidoPreparado['colorfondo'] = '#ffe400';}
            if (1 == $partidoPreparado['ep']) { $partidoPreparado['colorfondo'] = 'black';}
            if (8 == $partidoPreparado['ep']) { $partidoPreparado['colorfondo'] = 'blue';}
            if (11 == $partidoPreparado['ep']) { $partidoPreparado['colorfondo'] = 'yellow';$partidoPreparado['colortexto'] = 'black';}
            if (7 == $partidoPreparado['ep']) { $partidoPreparado['colorfondo'] = '#2E2E2E';}

            $partidoPreparado['comentarios'] = $partidoPreparado['parte'].'-'.$partidoPreparado['minuto'].'-'.$partidoPreparado['prolongacion'].'-'.$partidoPreparado['ev'];
        }


        $partidoPreparado['estado_partido'] = $partidoPreparado['ep'];
        $partidoPreparado['goles_local'] = $partidoPreparado['gl'];
        $partidoPreparado['goles_visitante'] = $partidoPreparado['gv'];


        $estadosEnJuego = $this->getIdEstadosEnJuego();

        $enJuego = in_array($partidoPreparado['estado_partido'], $estadosEnJuego);
        $partidoPreparado['enJuego'] = $enJuego;

        return $partidoPreparado;
    }

    public function getPartidosIndex()
    {
        $partidos = json_decode(file_get_contents('../json/index.json'), true);
        #$partidos = json_decode(file_get_contents('../json/home/mas30partidos/menos5directos/index.json'), true);

        $partidosPreparados = [];
        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }

        return $partidosPreparados;
    }

    public function getPartidosIndexFederaciones()
    {
        $partidos = json_decode(file_get_contents('../json/indexFed.json'), true);

        $partidosPreparados = [];
        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }

        return $partidosPreparados;
    }

    public function getPartidosPorDia($fechaVerFormat, $temporada_id = 0)
    {
        $campos = "p.id,p.temporada_id,p.estado_partido,p.jornada,fa.nombre fase,p.grupo_id,gr.nombre,p.fecha, p.partidoAPI,
p.hora_prevista,p.hora_real,p.clasificado,p.goles_local,p.goles_visitante,p.observaciones,p.estadio,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twLocal,
p.equipoLocal_id, cec.id club_local, cec.pais_id pais_local, cef.id club_visitante, cef.pais_id pais_visitante,p.apuesta apuesta_partido,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twVisitante,p.equipoVisitante_id,p.youtube_id, tor.division_id, tor.visible, tor.apuesta apuesta_torneo,
tor.tipo_torneo,tor.nombre nombreTorneo,tor.torneoCorto,tor.categoria_torneo_id,tor.traduccion,
tor.apuesta apuesta_torneo,co.nombre nombreComunidad,co.id idComunidad,pa.nombre nombrePais,
pa.id idPais,pa.id_bwin,p.comentario,p.acta,p.betsapi,
CASE tor.tipo_torneo
WHEN 2 THEN 
	(select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id,',',tor.tipo_torneo)
	FROM partido p2 
	WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id 
	AND p2.temporada_id=p.temporada_id AND p2.estado_partido=1 AND p2.grupo_id IS NULL 
	AND p2.temporada_id<>287 AND p2.temporada_id<>231 AND p2.temporada_id<>442 AND p2.temporada_id<>330 LIMIT 1)
ELSE null
END
ida,
(SELECT GROUP_CONCAT(DISTINCT medio_id SEPARATOR '-') FROM partido_medio WHERE partido_id=p.id) tv,
(SELECT count(id) FROM gol WHERE partido_id=p.id) goles, e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad";
        $tabla = 'partido p';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN club cec ON ec.club_id=cec.id';
        $union .= ' INNER JOIN club cef ON ef.club_id=cef.id';
        $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
        $union .= ' LEFT JOIN grupo gr ON p.grupo_id=gr.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
        $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
        $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
        $union .= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
        $union .= ' LEFT JOIN localidad l ON l.id=e.localidad_id';

        $condicion = " WHERE p.fecha='".$fechaVerFormat."' AND p.estado_partido<>2 AND p.estado_partido<5 AND ec.nombre<>'SIN PAIS' AND ef.nombre<>'SIN PAIS' AND tor.visible>4 AND tor.visible<100 ";

        if ($temporada_id > 0) {
            $condicion .= ' AND p.temporada_id='.$temporada_id;

        }

        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.division_id,tor.comunidad_id, tor.orden, p.hora_prevista';

        $sql = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $query = $this->db->query($sql);
        $partidos = $this->db->fetchAll($query);

        $partidosPreparados = [];
        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }


        $condicion = " WHERE p.estado_partido=2 OR p.estado_partido>5";

        if ($temporada_id > 0) {
            $condicion .= ' AND p.temporada_id='.$temporada_id;
        }

        $sql = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $query = $this->db->query($sql);
        $directos = $this->db->fetchAll($query);

        $partidosDirectoPreparados = [];
        foreach ($directos as $partido) {
            $partidosDirectoPreparados[] = $this->prepararPartido($partido);
        }

        return [
            'partidos' => $partidosPreparados,
            'directos' => $partidosDirectoPreparados
        ];
    }

    public function prepararArrayPartidos(array $partidos)
    {
        $partidosPreparados = [];

        foreach ($partidos as $partido) {
            $partidosPreparados[] = $this->prepararPartido($partido);
        }

        return $partidosPreparados;
    }

    public function prepararPartido($partido)
    {
        $colorL = '';
        $colorV = '';
        $icono = '';
        $ev = 0;

        if (!array_key_exists('betsapi', $partido)) {
            $partido['betsapi'] = '';
        }

        $partidoPreparado = $partido;

        $nC = array_key_exists('nombreComunidad', $partido) ? $partido['nombreComunidad'] : '';
        $nP = array_key_exists('nombrePais', $partido) ? $partido['nombrePais'] : '';

        if ('SIN COMUNIDAD' != $nC) {
            $nC .= '-';
        } else {
            $nC = '';
        }
        if ('España' == $nP) {
            $nP = '';
        } else {
            $nP .= '-';
        }


        $enlace_torneo = $this->urlHelper->getUrlTorneo($partido['temporada_id']);

        $txttraduccion = array_key_exists('traduccion', $partido) ? $partido['traduccion'] : '';

        if (!array_key_exists('idPais', $partido)) {
            $partido['idPais'] = null;
        }

        if (!array_key_exists('nombrePais', $partido)) {
            $partido['nombrePais'] = null;
        }



        if (60 != $partido['idPais'] && 199 != $partido['idPais'] && 200 != $partido['idPais'] && 201 != $partido['idPais']) {
            $txttraduccion = $partido['nombrePais'];
        }

        $idComunidad = array_key_exists('idComunidad', $partido) ? $partido['idComunidad'] : '';

        if ($idComunidad > 1) {

            $imagen = $partido['idComunidad'];
            $nombreCom = '';

            if ($partido['temporada_id'] < 25
                || 266 == $partido['temporada_id']
                || 267 == $partido['temporada_id']
                || 34 == $partido['temporada_id']
                || 35 == $partido['temporada_id']
            ) {

                if (10 == $partido['idComunidad']) {
                    $nombreCom = $nombreCom . ' Y MELILLA';
                    $imagen = 55;
                }

                if (11 == $partido['idComunidad']) {
                    $nombreCom = $nombreCom . ' Y CEUTA';
                    $imagen = 56;
                }
            }

            $classBandera = 'bandera flagbox comunidad flag' . $imagen;

            $partidoPreparado['nombreCom'] = $nombreCom;

        } else {
            $classBandera = 'bandera flagbox pais flag' . $partido['idPais'] . 'b';
        }

        $localCorto = $partido['localCorto'] ?? $partido['local'];
        $visitanteCorto = $partido['visitanteCorto'] ?? $partido['visitante'];

        $partidoPreparado['nC'] = $nC;
        $partidoPreparado['nP'] = $nP;

        $partidoPreparado['enlace_torneo'] = $enlace_torneo;
        $partidoPreparado['txttraduccion'] = $txttraduccion;
        $partidoPreparado['classBandera'] = $classBandera;

        $partidoPreparado['localCorto'] = $localCorto;
        $partidoPreparado['visitanteCort'] = $visitanteCorto;

        if (isset($partido['clasificado'])) {

            if (1 == $partido['clasificado']) {
                $colorL = 'green';
                $colorV = 'red';
            }

            if (2 == $partido['clasificado']) {
                $colorL = 'red';
                $colorV = 'green';
            }

            /*
             * REVISAR
            if (0 == $partido['clasificado'] && $pagina=='equipo') {
                if ($equipo_id==$partido['equipoLocal_id']){ $colorL = '#886A08';}
                if ($equipo_id==$partido['equipoVisitante_id']){ $colorV = '#886A08';}
            }
           */
        }


        $fondocolorL = '';
        $fondocolorV = '';

        if (isset($partido['idPais']) && $partido['idPais'] > 198) {

            if (isset($partido['temporada_id']) && 442 != $partido['temporada_id'] && 330 != $partido['temporada_id']) {

                if (60 == $partido['pais_local']) {
                    $fondocolorL = '#FADF74';
                }

                if (60 == $partido['pais_visitante']) {
                    $fondocolorV = '#FADF74';
                }

            }

        }

        $partidoPreparado['ev'] = $ev;
        $partidoPreparado['icono'] = $icono;

        $partidoPreparado['colorL'] = $colorL;
        $partidoPreparado['colorV'] = $colorV;

        $partidoPreparado['fondocolorL'] = $fondocolorL;
        $partidoPreparado['fondocolorV'] = $fondocolorV;

        $partidoPreparado['betsapi'] = $partido['betsapi']??0;

        $comentarios = $partido['comentario']??'';

        $partidoPreparado['hora_real'] = $partido['hora_real']??'00:00:00';

        $parte = 0;
        $minutos = 0;

        $partidoPreparado['parte'] = $parte;
        $partidoPreparado['minutos'] = $minutos;

        $fecha1 = date('Y-m-d H:i:s');
        $fecha1 = date_create($fecha1); //hora actual

        $fecha2 = date($partido['fecha'].' '.$partido['hora_real']);
        $fecha2 = date_create($fecha2); // hora comienzo real

        $partidoPreparado['fecha1'] = $fecha1;
        $partidoPreparado['fecha2'] = $fecha2;

        $fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
        $fecha3 = date_create($fecha3); //hora prevista
        $partidoPreparado['fecha3'] = $fecha3;

        $dPartido = date_diff($fecha3, $fecha1);
        $partidoPreparado['dPartido'] = $dPartido;

        $horasP = $dPartido->h;
        $minutosP = $dPartido->i;
        $segundosP = $dPartido->s;
        $invertidoP = $dPartido->invert;

        $partidoPreparado['horasP'] = $horasP;
        $partidoPreparado['minutosP'] = $minutosP;
        $partidoPreparado['segundosP'] = $segundosP;
        $partidoPreparado['invertidoP'] = $invertidoP;

        if (0 == $invertidoP && $partido['estado_partido'] == 0 && (($horasP*60)+$minutosP)>150) {
            $desfasado = 1;
        } else {
            $desfasado = 0;
        }

        $partidoPreparado['desfasado'] = $desfasado;


        if (0 == $invertidoP && $partido['estado_partido'] == 2 && $partido['betsapi'] == 1) {
            $dDirecto = date_diff($fecha2, $fecha1);
            $horasD = $dDirecto->h;
            $minutosD = $dDirecto->i;
            $segundosD = $dDirecto->s;
            $mHP = ($horasP*60) + $minutosP;

            if ($minutosD < 55 && $mHP < 60) {
                $parte = 1;
                $minutos = $minutosD;
            }

            if ($minutosD < 55 && $mHP > 59 && $mHP < 120) {
                $parte = 2;
                $minutos = $minutosD+45;
            }

            if ($minutosD < 20 && $mHP > 119 && $mHP < 135) {
                $parte = 3;
                $minutos = $minutosD + 90;
            }

            if ($minutosD < 20 && $mHP > 134) {
                $parte = 4;
                $minutos = $minutosD + 105;
            }

            $comentarios = $parte . "-" . $minutos . "-0" . $partido['comentario'];

            $partidoPreparado['dDirecto'] = $dDirecto;
            $partidoPreparado['horasD'] = $horasD;
            $partidoPreparado['minutosD'] = $minutosD;
            $partidoPreparado['segundosD'] = $segundosD;
            $partidoPreparado['mHP'] = $mHP;
        }

        $partidoPreparado['comentario'] = $comentarios;


        $fechaPartido = '';
        $fp = '';
        $ffp = '';

        if (isset($partido['fecha'])) {
            $timezone = new \DateTimeZone('Europe/Madrid');

            if ($partido['hora_prevista'] != '00:00:11') {

                $fechaPartido = date_create_immutable_from_format('Y-m-d H:i:s',$partido['fecha'] . ' ' . $partido['hora_prevista'] ?? '00:00:00', $timezone);
                $fechaPartido = $fechaPartido->setTimezone(new \DateTimeZone('UTC'));
                $fechaFinPartido = $fechaPartido->modify('+120 minutes');
                $ffp = $fechaFinPartido->format('c');
                $fp = $fechaPartido->format('c');

            } else {

                $fechaPartido = date_create_immutable_from_format('Y-m-d',$partido['fecha'], $timezone);
                $fechaPartido = $fechaPartido->setTimezone(new \DateTimeZone('UTC'));
                $fp = $fechaPartido->format('c');
                $ffp = $fechaPartido->format('c');

            }
        }

        $partidoPreparado['fechaPartido'] = $fechaPartido;
        $partidoPreparado['fp'] = $fp;
        $partidoPreparado['ffp'] = $ffp;


        #$pgLocal = '/resultados-directo/equipo/' . $this->poner_guion($partido['local']) . '/' . $partido['equipoLocal_id'];

        $pgLocal = $this->urlHelper->getUrlEquipo($partido['equipoLocal_id'], $partido['local']);

        #$pgVisitante = '/resultados-directo/equipo/' . $this->poner_guion($partido['visitante']) . '/' . $partido['equipoVisitante_id'];

        $pgVisitante = $this->urlHelper->getUrlEquipo($partido['equipoVisitante_id'], $partido['visitante']);

        #$pgPartido = '/resultados-directo/partido/' . $this->poner_guion($partido['local']) . '-' . $this->poner_guion($partido['visitante']) . '/' . $partido['id'];

        $pgPartido = $this->urlHelper->getUrlPartido($partido['id'], $partido['local'], $partido['visitante']);

        $partidoPreparado['pgLocal'] = $pgLocal;
        $partidoPreparado['pgVisitante'] = $pgVisitante;

        $partidoPreparado['pgPartido'] = $pgPartido;

        if (!isset($equipo_id)){
            $equipo_id = 0;
        }

        $colorFondo = $colorFondo ?? 'white';

        $partidoPreparado['colorFondo'] = $colorFondo;


        /*
         * REVISAR
        if ($_SESSION['app']==0){
        */
            $partidoPreparado['localCorto'] = $partido['local'];
            $partidoPreparado['visitanteCorto'] = $partido['visitante'];
        #}


        $pagina = 'index';

        if ($pagina=='index' || $pagina=='equipo' || $pagina=='seleccion') {

            if (1 == $partido['tipo_torneo']) {

                $jornadaTxt='Jornada '.$partido['jornada'];

            } else {

                $jornadaTxt=$partido['fase'];

                if ($partido['grupo_id'] > 0 && array_key_exists('nombre', $partido)) {
                    $jornadaTxt.=" ".$partido['nombre'];
                }

            }

            if ($pagina=='equipo' &&  !is_null($partido['fecha'])) {
                $jornadaTxt.=' - '.date_format($fecha2, 'd/m/y');
            }
        }

        $partidoPreparado['jornadaTxt'] = $jornadaTxt;

        $tvs = explode('-', $partido['tv']);
        $txtTV = '';

        #CRISTIAN
        #$tvs = [132];

        foreach ($tvs as $vtv) {
            if ($vtv == 132){
                /*
                $txtTV='
                    <a href="https://www.footters.com/register?ref=futbolmeoficial" target="_blank">
                        <img alt="footters.com" src="/img/television/medio132.png" width="20" height="20" style="margin-right: 4px;">
                    </a>';
                 */
                $txtTV='
                    <span href="https://www.footters.com/register?ref=futbolmeoficial" target="_blank">
                        <img alt="footters.com" src="/static/img/logo-footters.svg" style="margin-right: 4px;">
                    </span>';
            }
        }

        $partidoPreparado['tvs'] = $tvs;
        $partidoPreparado['txtTV'] = $txtTV;

        $estadosEnJuego = $this->getIdEstadosEnJuego();

        $enJuego = in_array($partido['estado_partido'], $estadosEnJuego);
        $partidoPreparado['enJuego'] = $enJuego;

        return $partidoPreparado;
    }

    public function getIdEstadosEnJuego()
    {
        return [
            2,
            6,
            7,
            8,
            9,
            10,
            11
        ];
    }

    #CRISTIAN: TEMPORAL!!
    function poner_guion($cadena)
    {
        // $cadena = strtolower($cadena);

        $cadena = utf8_decode($cadena);
        $cadena = trim($cadena);
        $cadena = str_replace('"', '', $cadena);
        $cadena = str_replace(' ', '-', $cadena);
        $cadena = str_replace('?', '', $cadena);
        $cadena = str_replace('+', '', $cadena);
        $cadena = str_replace(':', '', $cadena);
        $cadena = str_replace('??', '', $cadena);
        $cadena = str_replace('`', '', $cadena);
        $cadena = str_replace('´', '', $cadena);
        $cadena = str_replace("'", '', $cadena);
        $cadena = str_replace('!', '', $cadena);
        $cadena = str_replace('¿', '', $cadena);
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´`';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

        $cadena = strtolower($cadena);

        return $cadena;
    }
}