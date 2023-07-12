<?php
namespace App\Application\Repositories;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;

class TemporadaRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

    public function xtipo($temporada_id)
    {
        $clasificacionRepo = new ClasificacionRepository($this->db);

        $campos = 't.torneo_id,
    tor.tipo_torneo, 
    tor.nombre, 
    tor.traduccion,
    tor.sexo, 
    tor.desarrollo, 
    tor.categoria_id, ce.nombre categoria_nombre,
    tor.visible,
    tor.categoria_torneo_id, 
    tor.id_original,
    tor.apifutbol,
    tor.apiRFEFcompeticion,
    tor.apiRFEFgrupo,
    tor.whatsapp,
    tor.whatsapp_url,
    pa.id idPais, 
    pa.nombre nombrePais,
    co.id idComunidad, 
    co.nombre nombreComunidad, 
    CASE WHEN (tor.tipo_torneo=1) THEN (select jornadas from liga where id=tor.id) 
    ELSE 0 END as jornadas,
    CASE WHEN (tor.tipo_torneo=1) THEN (select jornadaActiva from liga where id=tor.id) 
    ELSE (select fase_activa from eliminatorio where id=tor.id)  END as jornadaActiva,
    CASE WHEN (tor.tipo_torneo=1) THEN (select tipoClasificacion from liga where id=tor.id) 
    ELSE 0 END as tipoClasificacion,
    CASE WHEN (tor.tipo_torneo=1) THEN (select tipoPuntuacion from liga where id=tor.id) 
    ELSE 0 END as tipoPuntuacion';
        $tabla = ' temporada t';
        $union = ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
        $union.= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
        $union.= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
        $union.= ' INNER JOIN categoria ce ON tor.categoria_id=ce.id ';


        $condicion = ' WHERE t.id='.$temporada_id;
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
        //echo $consulta;

        $query = $this->db->query($consulta);
        $torneo = $this->db->fetch($query);

        //imp($torneo);
        //imp($torneo['jornadaActiva']);

        $equipos = $this->xEquiposTemporada($temporada_id);
        $partidos = $this->xPartidos($temporada_id, 0);


        if ($torneo['tipo_torneo'] == 1 && $torneo['jornadaActiva'] < 0){
            $torneo['jornadaActiva'] = abs($torneo['jornadaActiva']);
        }

        //imp($torneo['jornadaActiva']);
        /*
          $horas = $diferencia->h;
          $minutos = $diferencia->i;
          $segundos = $diferencia->s;*/
        $fichajes = array();
        //if ($temporada_id < 25 || 214 == $temporada_id){
            $fichajes = $this->xFichajesTorneo($temporada_id);
        //}


        $clasificacion=array();
        if ($torneo['tipo_torneo']==1){
            $clas = array(
                'temporada_id' => $temporada_id,
                'jornada' => 0,
                'grupo_id' => 0,
                'equipo_id' => 0,
                'tipoClasificacion' => $torneo['tipoClasificacion'],
                'torneo_id' => $torneo['torneo_id'],
                'jornadas' => $torneo['jornadas'],
                'puntosPorganar' => $torneo['tipoPuntuacion'],
            );

            $clasificacion = $clasificacionRepo->XgenerarClasificacion($clas);
        }

        //imp($clasificacion);

        $resultado = array(
            'torneo' => $torneo,
            'equipos' => $equipos,
            'partidos' => $partidos,
            'fichajes' => $fichajes,
            'clasificacion' => $clasificacion,
        );



        $origenCarpeta=getcwd();
        //imp($origenCarpeta);
        //imp(substr($origenCarpeta, -9));


        if (substr($origenCarpeta, -7) == '/public') {
            $carpeta = '../json/temporada/'.$temporada_id;
        } else {
            if (substr($origenCarpeta, -9) == 'panelBack') {
                $carpeta = '../json/temporada/'.$temporada_id;
            } else {
                $carpeta = '../json/temporada/'.$temporada_id;
            }
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
        }

        $funcionesHelper = new FuncionesHelper($this->db);

        $funcionesHelper->guardarJSON($resultado, $carpeta.'/tipo.json');
        if (file_exists($carpeta.'/partidosActiva.json')) {
            unlink($carpeta.'/partidosActiva.json');
        }
    }

    function xEquiposTemporada($temporada_id)
    {
        $campos = 'te.equipo_id, te.grupo, e.nombre, e.nombreCorto, e.estadio_id, e.betsapi, e.club_id, e.equipacion_id, e.slug, l.id localidad_id, p.id provincia_id, c.id comunidad_id,
    l.nombre localidad, p.nombre provincia, c.nombre comunidad, cl.pais_id, cl.es_seleccion';
        $tabla = ' temporada_equipo te';
        $union = ' INNER JOIN equipo e ON te.equipo_id=e.id';
        $union.= ' INNER JOIN club cl ON e.club_id=cl.id
    LEFT JOIN localidad l ON cl.localidad_id=l.id
    LEFT JOIN provincia p ON l.provincia_id=p.id
    LEFT JOIN comunidad c ON p.comunidad_id=c.id';
        $condicion = ' WHERE te.temporada_id='.$temporada_id;
        $orden = ' ORDER BY e.nombre';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    public function xPartidos($temporada_id, $jornadaActiva = 0)
    {
        $campos = "p.id, p.partidoAPI,
p.temporada_id,
p.estado_partido, 
p.jornada,
p.apuesta apuesta_partido,
fa.nombre fase,  
p.fecha, 
p.hora_prevista, 
p.hora_real,
p.apuesta,
p.clasificado, 
p.goles_local,
p.goles_visitante,
p.grupo_id, p.betsapi, p.codigo_acta,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twitterLocal, ec.federacion_id federacion_id_l,
p.equipoLocal_id, cec.pais_id pais_local, cef.pais_id pais_visitante, ef.federacion_id federacion_id_v,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twitterVisitante,
p.equipoVisitante_id,
p.observaciones, p.comentario, cec.id club_local, cef.id club_visitante,
p.estadio, p.arbitro_id,p.youtube_id, p.acta, tor.apuesta apuesta_torneo, 
tor.tipo_torneo, tor.pais_id idPais, tor.visible, (SELECT count(id) FROM gol WHERE partido_id=p.id) goles,e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad,
(SELECT GROUP_CONCAT(DISTINCT medio_id SEPARATOR '-') FROM partido_medio WHERE partido_id=p.id) tv,
(SELECT CONCAT(apellidos,',',nombre) FROM arbitro WHERE id=p.arbitro_id) nombre_arbitro";
        if (442 != $temporada_id && 231 != $temporada_id) {
            $campos .= ",
(select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id,',',
                (SELECT tipo_torneo FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id=p2.temporada_id))
    ) FROM partido p2 
WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id AND p2.temporada_id=p.temporada_id AND p2.estado_partido=1 AND p2.grupo_id IS NULL LIMIT 1) as ida ";
        }

        $tabla = 'partido p';

        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN club cec ON ec.club_id=cec.id';
        $union .= ' INNER JOIN club cef ON ef.club_id=cef.id';
        $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
        $union .= ' LEFT JOIN localidad l ON l.id=e.localidad_id';

        if (0 == $jornadaActiva) {
            $condicion = ' WHERE p.temporada_id='.$temporada_id;
        } else {
            if (442 == $temporada_id || 231 == $temporada_id) {
                $condicion = " WHERE p.fecha>'2017-06-27' AND p.temporada_id=".$temporada_id.' AND p.jornada='.$jornadaActiva;
            } else {
                $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$jornadaActiva;
            }
        }

        if (442 == $temporada_id || 231 == $temporada_id) {
            $orden = ' ORDER BY p.fecha DESC, p.hora_prevista';
        } else {
            $orden = ' ORDER BY p.jornada, p.grupo_id, p.fecha, p.hora_prevista';
        }

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function xFichajesTorneo($temporada_id)
    {
        $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.fecha_nacimiento, 
    j.slug, j.equipoActual_id, ea.nombre equipo, ea.club_id';
        $tabla = ' jugador j';
        $union = ' INNER JOIN equipo ea ON j.equipoActual_id=ea.id';
        $union2 = ' INNER JOIN temporada_equipo te ON j.equipoActual_id=te.equipo_id';
        $condicion = ' WHERE j.es_fichaje>0 AND te.temporada_id='.$temporada_id.' ORDER BY ea.nombre,j.posicion';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }


}