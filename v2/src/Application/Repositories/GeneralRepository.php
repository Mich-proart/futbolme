<?php
namespace App\Application\Repositories;


use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;

class GeneralRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

    function borrar_cache($temporada_id)
    {
        $filesBorrar = glob('../json/temporada/'.$temporada_id.'/*.*');
        foreach ($filesBorrar as $file) {
            unlink($file);
        }
    }

    public function getMenu()
    {
        $menu = json_decode(file_get_contents('../json/menu.json'), true);

        return $menu;
    }

    function controlTemporadas($comunidad_id){
        $consulta = 'SELECT count(p.id) partidos, p.temporada_id, (select count(tte.equipo_id) from temporada_equipo tte where tte.temporada_id=p.temporada_id) equipos, t.nombre, co.nombre comunidad, ct.nombre categoriaTorneo, ca.nombre categoria, tt.visible, tt.division_id,tt.apifutbol, tt.apiRFEFcompeticion, tt.apiRFEFgrupo, tt.id torneo_id
    FROM partido p 
    INNER JOIN temporada t ON t.id=p.temporada_id
    INNER JOIN torneo tt ON tt.id=t.torneo_id
    INNER JOIN comunidad co ON co.id=tt.comunidad_id
    INNER JOIN categoriatorneo ct ON ct.id=tt.categoria_torneo_id
    INNER JOIN categoria ca ON ca.id=tt.categoria_id
    WHERE tt.comunidad_id='.$comunidad_id.' 
    GROUP BY p.temporada_id
    ORDER BY tt.comunidad_id, ct.orden, tt.orden';

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function enlacesAmazon($club_id){
        $consulta = 'SELECT a.id,a.nombre,a.enlace,a.categoria_amazon, c.nombre categoria, c.id id_cat
    FROM amazon a
    INNER JOIN amazon_cat c ON a.categoria_amazon=c.id
    WHERE club_id='.$club_id.' ORDER BY c.nombre';

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function enlaceAleatorioAmazon($club_id){
        $consulta = 'SELECT a.id,a.nombre,a.enlace,a.categoria_amazon, c.nombre categoria, c.id id_cat
    FROM amazon a
    INNER JOIN amazon_cat c ON a.categoria_amazon=c.id
    WHERE club_id='.$club_id.' ORDER BY id DESC LIMIT 20';

        dump($consulta);
        exit;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function sacarTwitter($id)
    {
        $consulta = 'SELECT slug FROM equipo WHERE id='.$id;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);

        return $resultado;
    }

    function tipoJornada($id)
    {
        $consulta = 'SELECT tipo_eliminatoria FROM fase WHERE id='.$id;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetch($resultadoSQL);

        return $resultado;
    }

    function XclasificacionGoleadores($temporada_id)
    {
        $campos = 'count(g.id) goles, g.jugador_id, j.apodo jugador, e.nombre equipo, e.id equipo_id, e.nombreCorto equipoCorto';
        $tabla = ' gol g';

        $union = ' INNER JOIN jugador j ON g.jugador_id=j.id';
        $union2 = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
        $condicion = ' WHERE g.temporada_id='.$temporada_id.' AND tipo<10 ';
        $orden = ' GROUP BY g.jugador_id,e.id ORDER BY count(g.id) DESC';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
        //$condicion=" WHERE g.temporada_id=".$temporada_id." AND tipo<10 ";
    }

    function XsacarBandera($equipo_id)
    {
        $consulta = 'SELECT (select pais_id from club where id=equipo.club_id) bandera FROM equipo WHERE id='.$equipo_id;

        $resultadoSQL = $this->db->query($consulta);
        $bandera = $this->db->fetchAll($resultadoSQL);

        return $bandera[0]['bandera'];
    }

    function generarEventos($eventos){

        $files = glob('../json/eventos/*.*'); // obtiene todos los archivos
        foreach($files as $file){
            if(is_file($file)){
                if(time()-filemtime($file) > 60){
                    unlink($file); // lo elimina si se trata de un archivo
                }
            }
        }

        insertarEvento($eventos);


        $appuser = [];
        $resultado = eventos(); //consultas/consultaPortada.php

        guardarJSON($resultado, '../json/eventos.json');
        echo "Hemos recogido los eventos<br />";

        $appuser = array();
        foreach ($resultado as $key => $value) {
            if (0 == $value['estado']) {
                $appuser[] = $value;
            }
        }

        $mysqli = conectar();
        $sql = 'UPDATE evento SET estado=1';
        mysqli_query($mysqli, $sql);


        if ($_SERVER['SERVER_NAME']!='fm18.com'){
            require_once '../src/cronsNotificaciones.php';
        }


    }

    function eventos()
    {
        $mysqli = conectar();

        $fecha = new \DateTime();
        $dia = $fecha->format('Y-m-d');
//    $diaAnterior = new \DateTime();
        $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
        $diaAnterior = $diaAnterior->modify('-2 day')->format('Y-m-d');

        $sql = "DELETE FROM evento WHERE momento<'".$diaAnterior."'";
        mysqli_query($mysqli, $sql);

        $campos = 'e.partido_id,
    e.evento,
    e.valor,
    e.equipoLocal_id,
    e.equipoVisitante_id,
    e.momento,
    e.local,
    e.visitante,
    e.estado,
    e.resultado,
    tor.nombre nombre_torneo,
    tor.comunidad_id,
    tor.categoria_id categoria_id,
    te.id temporada_id';

        $tabla = 'evento e';
        $union= ' INNER JOIN partido p ON e.partido_id=p.id';
        $union.= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union.= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        //$condicion=" WHERE (cl.pais_id=60 OR cf.pais_id=60)";
        $condicion = '';
        $orden = ' ORDER BY e.momento DESC LIMIT 50';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }




    function partidosDia($dia, $temporada_id = 0)
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




        $condicion = " WHERE p.fecha='".$dia."' AND p.estado_partido<>2 AND p.estado_partido<5 AND ec.nombre<>'SIN PAIS' AND ef.nombre<>'SIN PAIS' AND tor.visible>4 AND tor.visible<100 ";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.division_id,tor.comunidad_id, tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $partidos = $this->db->fetchAll($resultadoSQL);



        $condicion = " WHERE p.estado_partido=2 OR p.estado_partido>5";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $directos = $this->db->fetchAll($resultadoSQL);

        return array(
            'partidos' => $partidos,
            'directos' => $directos
        );
    }


    function partidosDiaFed($dia, $temporada_id = 0)
    {
        $campos = "p.id,p.temporada_id,p.estado_partido,p.jornada,fa.nombre fase,p.grupo_id,gr.nombre,p.fecha, p.partidoAPI,
p.hora_prevista,p.hora_real,p.clasificado,p.goles_local,p.goles_visitante,p.observaciones,p.estadio,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twLocal,
p.equipoLocal_id, cec.id club_local, cec.pais_id pais_local, cef.id club_visitante, cef.pais_id pais_visitante,p.apuesta apuesta_partido,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twVisitante,p.equipoVisitante_id,p.youtube_id, tor.visible, tor.apuesta apuesta_torneo,
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
        $condicion = " WHERE p.fecha='".$dia."' AND ec.nombre<>'SIN PAIS' AND ef.nombre<>'SIN PAIS' AND tor.visible>99 ";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.division_id, tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $partidos = $this->db->fetchAll($resultadoSQL);

        return $partidos;
    }

    function Xtipo($temporada_id)
    {
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
        $resultadoSQL = $this->db->query($consulta);
        $torneo = $this->db->fetch($resultadoSQL);

        //imp($torneo);
        //imp($torneo['jornadaActiva']);

        $partidosRepo = new PartidoRepository($this->db);

        $equipos = $this->Xequipos_temporada($temporada_id);
        $partidos = $partidosRepo->Xpartidos($temporada_id, 0);

        //script para poner la jornada activa automaticamente.
        /*if ($torneo['tipo_torneo']==1 && $torneo['jornadaActiva']>-1){
            $jornadaActiva=1;
            foreach ($partidos as $key => $value) {
                $diferencia=diferenciaFechas($value['fecha']." ".$value['hora_prevista']);
                $invertido = $diferencia->invert;
                $meses = $diferencia->m;
                $dias = $diferencia->d;
                if ($invertido==0 && $meses==0 && $dias<2 && $value['estado_partido']==1){
                    $jornadaActiva=$value['jornada']; break;
                }
                if ($invertido==1 && $meses==0 && $dias<10 && $value['estado_partido']==0){
                    $jornadaActiva=$value['jornada']; break;
                }

            }
            //imp($torneo['jornadaActiva']);
                $consulta = 'UPDATE liga SET jornadaActiva='.$jornadaActiva.' WHERE id='.$torneo['torneo_id'];
                $resultadoSQL = mysqli_query($mysqli, $consulta);
                $torneo['jornadaActiva']=$jornadaActiva;


        }  */
        if ($torneo['tipo_torneo']==1 && $torneo['jornadaActiva']<0){
            $torneo['jornadaActiva']=abs($torneo['jornadaActiva']);
        }




        //imp($torneo['jornadaActiva']);
        /*
          $horas = $diferencia->h;
          $minutos = $diferencia->i;
          $segundos = $diferencia->s;*/
        $fichajes=array();
        //if ($temporada_id < 25 || 214 == $temporada_id){
            $fichajes = $this->XfichajesTorneo($temporada_id);
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

            $clasificacionRepo = new ClasificacionRepository($this->db);

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


        if (substr($origenCarpeta, -13)=='src\funciones') {
            $carpeta = '../../json/temporada/'.$temporada_id;
        } else {
            if (substr($origenCarpeta, -9)=='panelBack') {
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
        // echo "Creado el fichero ".$carpeta.'/tipo.json<br />';
    }

    function Xfases(){

        $mysqli = conectar();
        $campos = 'f.id, f.nombre, f.orden, f.tipo_eliminatoria';
        $tabla = ' fase f';
        $orden = ' ORDER BY f.orden, f.nombre';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$orden;

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function Xgrupos(){
        $mysqli = conectar();
        $campos = 'g.id, g.nombre, g.orden';
        $tabla = ' grupo g';
        $orden = ' ORDER BY g.nombre';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$orden;

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function XbuscadorEquipos($categoria_id, $pais_id, $comunidad_id, $temporada_id=0, $fase_id=0)
    {

        $mysqli = conectar();
        $campos = 'e.id, e.nombre, l.nombre localidad, p.nombre provincia, p.comunidad_id, c.es_seleccion';
        $tabla = 'equipo e';
        $union = ' INNER JOIN club c ON e.club_id=c.id';
        $union2 = ' INNER JOIN localidad l ON c.localidad_id=l.id';
        $union3 = ' INNER JOIN provincia p ON l.provincia_id=p.id';

        $modelo = 0;

        if ($categoria_id > 1) {
            if ($pais_id > 198 && $pais_id < 202) {
                //$condicion=" WHERE e.categoria_id=".$categoria_id."   AND c.pais_id=".$pais_id;
                $campos = "e.id, e.nombre, '-' as localidad, '-' as provincia, '-' as comunidad_id, c.es_seleccion";
                $union2 = '';
                $union3 = '';
                $condicion = ' WHERE e.categoria_id='.$categoria_id;
                if (199 == $pais_id) {
                    $condicion .= ' AND (SELECT federacion_id FROM pais WHERE id=(SELECT pais_id FROM club WHERE id=(SELECT club_id FROM equipo WHERE id=e.id)) )=2';
                }

                $orden = ' ORDER BY e.nombre';
            } else {
                $campos = "e.id, e.nombre, '-' localidad, '-' provincia, '-' comunidad_id, c.es_seleccion";
                $condicion = ' WHERE 
                e.categoria_id='.$categoria_id;
                $union2 = '';
                $union3 = '';

                $orden = ' ORDER BY e.nombre';
            }
        } else {
            if (60 == $pais_id) {
                if (1 == $comunidad_id) {
                    $condicion = ' WHERE 
                e.categoria_id='.$categoria_id.'
                AND c.pais_id='.$pais_id.'
                AND e.desaparecido<1000
                AND p.id>1
                ';

                    $orden = ' ORDER BY p.comunidad_id, e.nombre';
                } else {
                    $condicion = ' WHERE 
                e.categoria_id='.$categoria_id.'
                AND c.pais_id='.$pais_id.'
                AND p.comunidad_id='.$comunidad_id.'
                AND e.desaparecido<1000
                ';

                    $orden = ' ORDER BY e.nombre';
                }
            } else {
                $campos = "e.id, e.nombre, '-' as localidad, '-' as provincia, '-' as comunidad_id, c.es_seleccion";

                $condicion = ' WHERE 
                e.categoria_id='.$categoria_id.'
                AND c.pais_id='.$pais_id;

                if (442 == $temporada_id) {
                    if (130 == $fase_id) {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id=60';
                    } else {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id;
                    }
                }

                if (183 == $temporada_id || 184 == $temporada_id) {
                    $condicion = ' WHERE (e.categoria_id='.$categoria_id.' AND ae.ascenso_id IN (2,3,4,34,35)) OR e.id=3033 or e.id=3019';
                    $union2 = ' INNER JOIN ascensoequipo ae ON e.id=ae.equipo_id';
                }

                $union3 = '';

                $orden = ' ORDER BY e.nombre';

                $modelo = 1;


            }
        }

        $condicion.=" AND e.desaparecido=0";

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

        echo $consulta.'<hr />';

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function Xfases_jornadas($temporada_id)
    {
        $campos = 't.id, f.id fase_id, f.nombre, f.orden, f.tipo_eliminatoria, (SELECT count(id) FROM partido p WHERE p.temporada_id='.$temporada_id.' AND p.jornada=f.id) partidos, el.fase_activa jornadaActiva';
        $tabla = ' temporada t';
        $union= ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
        $union.= ' INNER JOIN eliminatorio_fase ef ON tor.id=ef.eliminatorio_id';
        $union.= ' INNER JOIN fase f ON ef.fase_id=f.id';
        $union.= ' INNER JOIN eliminatorio el ON el.id=tor.id';

        $condicion = ' WHERE t.id='.$temporada_id;
        $orden = ' ORDER BY f.orden';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function buscarEquipoBetsapi($id){
        $sql='SELECT nombreCorto, id FROM equipo WHERE betsapi='.$id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function buscarPartidoBetsapi($id){
        $sql='SELECT id FROM partido WHERE betsapi='.$id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }
    function buscarPaisBetsapi($id){
        $sql='SELECT nombre, id FROM pais WHERE codigoISO="'.$id.'"';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }


    function Xfases_grupos($temporada_id, $eliminatoria_id)
    {
        $campos = 't.id, g.id grupo_id, g.nombre, g.orden';
        $tabla = ' temporada t';
        $union = ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
        $union2 = ' INNER JOIN grupofasetorneo gft ON tor.id=gft.torneo_id';
        $union3 = ' INNER JOIN grupo g ON g.id=gft.grupo_id';
        $condicion = ' WHERE t.id='.$temporada_id.' AND gft.fase_id='.$eliminatoria_id;
        $orden = ' ORDER BY g.orden';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }


    function Xequipos_temporada($temporada_id)
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

    function Xcolores($temporada_id, $grupo_id = 0)
    {
        $campos = 'ct.color_id, ct.posicion, c.texto, c.color_fondo, c.color_texto, ct.grupo_id';
        $tabla = ' colortorneo ct';
        $union = ' INNER JOIN color c ON ct.color_id=c.id';
        $condicion = ' WHERE ct.grupo_id='.$grupo_id.' AND ct.torneo_id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
        $orden = ' ORDER BY ct.posicion';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function Xsancion($temporada_id)
    {
        $campos = 's.equipo_id, s.puntos, s.jugados, s.ganados, s.empatados, s.perdidos, s.gFavor, s.gContra';
        $tabla = ' sancion s';
        $condicion = ' WHERE s.temporada_id='.$temporada_id;
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }



    function listarMedios()
    {
        $campos = 'm.id, m.nombre';
        $tabla = ' medio m';
        $condicion = ' WHERE m.tipo_medio=1';
        $orden = ' ORDER BY m.nombre';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function comunidad($temporada_id)
    {
        $campos = 'tor.comunidad_id';
        $tabla = ' temporada te';
        $union = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $condicion = ' WHERE te.id='.$temporada_id;
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        return $resultado['comunidad_id'];
    }
    function listarArbitros($temporada_id)
    {
        if ($temporada_id > 6) {
            $comunidad = ($temporada_id - 6);
        } else {
            $comunidad = 0;
        }

        $campos = 'a.id, a.apellidos, a.nombre, a.comunidad_id';
        $tabla = ' arbitro a';
        $union = ' INNER JOIN torneo t ON a.division_id=t.division_id';
        $union2 = ' INNER JOIN temporada te ON t.id=te.torneo_id';
        $condicion = ' WHERE te.id='.$temporada_id;
        if ($comunidad > 0) {
            if (10 == $comunidad) {
                $comunidad = 9;
            }
            $condicion = ' WHERE te.id='.$temporada_id.' AND a.comunidad_id='.($comunidad + 1);
        }
        $orden = ' ORDER BY a.apellidos, a.nombre';

        if ($temporada_id > 150) {
            $campos = 'a.id, a.apellidos, a.nombre, a.comunidad_id';
            $tabla = ' arbitro a';
            $orden = ' ORDER BY a.apellidos, a.nombre';
            $union = ' WHERE a.division_id>8';
            $union2 = '';
            $condicion = '';
        }

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function partidosMedios($partido_id)
    {
        $campos = 'm.id, m.nombre';
        $tabla = ' partido_medio pm';
        $union = ' INNER JOIN medio m ON m.id=pm.medio_id';
        $condicion = ' WHERE pm.partido_id='.$partido_id;
        $orden = ' ORDER BY m.nombre';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function XfichajesTorneo($temporada_id)
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

    function Xtorneos_comunidad_futbolme($id_comunidad, $categoria_torneo_id)
    {
        $mysqli = conectar();
        if ($id_comunidad > 1) {
            $consulta = 'SELECT te.id,te.nombre,tor.tipo_torneo, tor.categoria_id, cat.nombre categoria,
        tor.categoria_torneo_id, ct.nombre categoria_torneo,
    (SELECT nombre FROM comunidad WHERE id=tor.comunidad_id) nombreComunidad 
    FROM temporada te 
    INNER JOIN torneo tor ON te.torneo_id=tor.id
    INNER JOIN categoria cat ON tor.categoria_id=cat.id
    INNER JOIN categoriatorneo ct ON tor.categoria_torneo_id=ct.id
    WHERE  tor.comunidad_id='.($id_comunidad);
            $condicion = ' AND tor.visible>4';
            $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';
        } else {
            $consulta = 'SELECT te.id,te.nombre,1 as tipo_torneo FROM temporada te WHERE te.id<25';
            $condicion = '';
            $orden = '';
        }

        $consulta = $consulta.$condicion.$orden;
        //echo $consulta;die;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function Xtelevisados($fecha)
    {
//    $fecha = date('Y-m-j');
        $nuevafecha = strtotime('-1 day', strtotime($fecha));
        $fecha = date('Y-m-j', $nuevafecha);
        $campos = 'p.id, 
p.temporada_id,
te.nombre nombreTemporada,
p.estado_partido, 
p.jornada,
fa.nombre fase, 
p.fecha, 
p.hora_prevista, 
p.apuesta,
p.goles_local,
p.goles_visitante,
p.grupo_id,
ec.nombre local,ec.nombreCorto localCorto, 
(SELECT es_seleccion FROM club WHERE club.id=ec.club_id) seleccion,
(SELECT pais_id FROM club WHERE club.id=ec.club_id) pais_local,
(SELECT pais_id FROM club WHERE club.id=ef.club_id) pais_visitante,
p.equipoLocal_id,
ef.nombre visitante,ef.nombreCorto visitanteCorto,
p.equipoVisitante_id,
(SELECT count(partido_id) FROM partido_medio WHERE partido_id=p.id) tv,
m.id idMedio,
m.nombre nombreMedio,
m.id_original,e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad, tor.categoria_torneo_id
 ';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union.= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union.= ' INNER JOIN fase fa ON p.jornada=fa.id';
        $union.= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union.= ' RIGHT JOIN partido_medio pm ON p.id=pm.partido_id';
        $union.= ' INNER JOIN medio m ON m.id=pm.medio_id';
        $union.= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
        $union.= ' LEFT JOIN localidad l ON l.id=e.localidad_id';
        $condicion = " WHERE p.fecha>'".$fecha."'";
        $orden = ' ORDER BY p.fecha, p.hora_prevista, p.id, m.nombre';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function Xmedios($fecha)
    {
//    $fecha = date('Y-m-j');
        $nuevafecha = strtotime('-1 day', strtotime($fecha));
        $fecha = date('Y-m-j', $nuevafecha);

        $campos = 'count(pm.medio_id) nMedios, pm.medio_id, 
(SELECT nombre FROM medio WHERE id=pm.medio_id) medio, 
(SELECT id_original FROM medio WHERE id=pm.medio_id) id_original';
        $tabla = ' partido_medio pm';
        $union = ' INNER JOIN partido p ON p.id=pm.partido_id';
        $condicion = " WHERE p.fecha>'".$fecha."' GROUP BY pm.medio_id ";
        $orden = ' ORDER BY count(pm.medio_id) DESC';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function listarFases($temporada_id)
    {
        $campos = 'tor.id, fa.id, fa.nombre, fa.tipo_eliminatoria ';
        $tabla = ' temporada te';
        $union = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union2 = ' INNER JOIN eliminatorio_fase elifa ON elifa.eliminatorio_id=tor.id';
        $union3 = ' INNER JOIN fase fa ON fa.id=elifa.fase_id';
        $condicion = ' WHERE te.id='.$temporada_id;
        $orden = ' ORDER BY fa.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function listarGrupos($torneo_id, $fase_id)
    {
        $campos = 'gru.id, gru.nombre';
        $tabla = ' torneo tor';
        $union = ' INNER JOIN grupofasetorneo gft ON gft.torneo_id=tor.id';
        $union2 = ' INNER JOIN grupo gru ON gft.grupo_id=gru.id';
        $condicion = ' WHERE tor.id='.$torneo_id.' AND gft.fase_id='.$fase_id;
        $orden = ' ORDER BY gru.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion.$orden;
        echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function listarPaises()
    {
        $consulta = 'SELECT id, nombre FROM pais ORDER BY nombre';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function listarComunidades()
    {
        $consulta = 'SELECT id, nombre FROM comunidad ORDER BY id';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function listarLocalidades($id){
        $mysqli = conectar();
        $consulta="SELECT l.id, l.nombre, l.nombre_alternativo, p.nombre provincia, (select count(id) from club where localidad_id=l.id) equipos
    FROM localidad l
    LEFT JOIN provincia p ON p.id = l.provincia_id
    LEFT JOIN comunidad c ON c.id = p.comunidad_id
    WHERE c.id=".$id." ORDER BY p.nombre, l.nombre";
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        //echo $consulta."<br />";
        return $resultado;
    } // en asesjuridicos


    function listarEquiposPais($id)
    {
        $consulta = 'SELECT e.id equipo_id, ca.nombre categoria, e.nombreCorto nombre, e.slug, e.betsapi, p.nombre pais 
    FROM equipo e
    INNER JOIN categoria ca ON e.categoria_id=ca.id
    INNER JOIN club c ON e.club_id=c.id
    INNER JOIN pais p ON c.pais_id=p.id
    WHERE p.id='.$id.' AND ca.id=1 AND e.desaparecido=0 ORDER BY e.nombreCorto';
        //ca.id<4 solo senior masculino, femenino y juveniles
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }


    function equiposUsuario($usuario_id)
    {
        $campos = 'e.id equipo_id, 
    e.nombre equipo_nombre, 
    e.categoria_id, c.nombre categoria,
    u.orden, 
    e.club_id,
    t.id, 
    t.nombre,
    tor.tipo_torneo, 
    pa.nombre pais, 
    ct.nombre categoria_torneo';
        $tabla = ' usuario_equipo u';
        $union = ' INNER JOIN equipo e ON u.equipo_id=e.id
    INNER JOIN categoria c ON c.id=e.categoria_id
    INNER JOIN temporada_equipo te ON te.equipo_id=e.id
    INNER JOIN temporada t ON te.temporada_id=t.id
    INNER JOIN torneo tor ON t.torneo_id=tor.id
    INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id
    INNER JOIN pais pa ON pa.id=tor.pais_id
    ';
        $condicion = " WHERE u.usuario_id = '".$usuario_id."' ORDER BY u.orden, tor.orden";
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $listaEquipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


        //imp($listaEquipos);

        $equipos=array();
        foreach ($listaEquipos as $key => $value) {
            $equipos[$value['equipo_id']]['nombre']=$value['equipo_nombre'];
            $equipos[$value['equipo_id']]['categoria']=$value['categoria'];
            $equipos[$value['equipo_id']]['orden']=$value['orden'];
            $equipos[$value['equipo_id']]['club_id']=$value['club_id'];

            $equipos[$value['equipo_id']]['torneos'][$value['id']]['nombre']=$value['nombre'];
            $equipos[$value['equipo_id']]['torneos'][$value['id']]['tipo_torneo']=$value['tipo_torneo'];
            $equipos[$value['equipo_id']]['torneos'][$value['id']]['pais']=$value['pais'];
            $equipos[$value['equipo_id']]['torneos'][$value['id']]['categoria_torneo']=$value['categoria_torneo'];
        }



        unset($listaEquipos);


        return $equipos;



    }

    function ascensos($categoria_id = 1)
    {
        $consulta = 'SELECT id as ascenso_id, categoria_id, division_id, nombre, orden FROM ascenso 
    WHERE categoria_id='.$categoria_id.' ORDER BY categoria_id, division_id, orden';

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

        foreach ($resultado as $fila) {
            switch ($fila['categoria_id']) {
                case '1':
                    //$nacional[$fila['ascenso_id']]=$fila;
                    switch ($fila['division_id']) {
                        case '2':
                            $ascensos[$fila['division_id']][] = $fila;
                            break;
                        case '3':
                            $ascensos[$fila['division_id']][] = $fila;
                            break;
                        case '4':
                            $ascensos[$fila['division_id']][] = $fila;
                            break;
                        case '5':
                            $ascensos[$fila['division_id']][] = $fila;
                            break;
                    }

                    break;
                case '4':
                    $ascensos[$fila['ascenso_id']] = $fila;
                    break;
                case '5':
                    $ascensos[$fila['ascenso_id']] = $fila;
                    break;
                case '7':
                    $ascensos[$fila['ascenso_id']] = $fila;
                    break;
            }
        }

        return $ascensos;
    }

    function ascensoequipos($ascenso_id, $temporada_id)
    {
        $consulta = 'SELECT ae.equipo_id, (SELECT nombre FROM equipo WHERE id=ae.equipo_id) equipo, (SELECT club_id FROM equipo WHERE id=ae.equipo_id) club_id
    FROM ascensoequipo ae 
    WHERE ae.ascenso_id='.$ascenso_id.' AND ae.temporada_id='.$temporada_id.' ORDER BY posicion';

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

        return $resultado;
    }

    function buscarEquipo($equipo)
    {
        if (strlen($equipo) > 2 && strlen($equipo) < 21) {
            $consulta = "SELECT e.id, e.club_id, e.nombre, e.nombre_completo, e.categoria_id, c.nombre nombreCategoria, p.comunidad_id imagenComunidad, cl.pais_id imagenPais,
        (SELECT count(temporada_id) FROM temporada_equipo WHERE equipo_id=e.id) torneos, l.nombre nombreLocalidad, p.nombre nombreProvincia
        FROM equipo e 
        INNER JOIN categoria c ON c.id=e.categoria_id
        INNER JOIN club cl ON cl.id=e.club_id
        INNER JOIN localidad l ON cl.localidad_id=l.id
        INNER JOIN provincia p ON l.provincia_id=p.id
        WHERE (e.nombre_completo LIKE '%".$equipo."%')
     AND (SELECT count(id) FROM partido WHERE equipoLocal_id=e.id)>0 
     ORDER BY e.club_id, e.categoria_id, e.codigoRFEF";
            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

            //echo $consulta;




            if (count($resultado)== 0) {
                $resultado = 'No encontramos equipos con ese nombre en Futbolme (<b>'.$equipo.'</b>).';
            }

            if (count($resultado)>30){
                $resultado = '<div class="h40 whitebox"></div><div class="col-xs-12 whitebox">La palabra <b>'.$equipo.'</b> produce demasiados resultados en nuestra Base de datos, defina más su búsqueda.</div>';
            }

            //$equiposIC=buscarEquipoIC($equipo);
        } else {
            $resultado = "<span style='color:white; font-weight:bold'>La busqueda de un equipo tiene que tener entre 3 y 20 caracteres.</span>";
        }

        return $resultado;
    }

    function historialEquipo($equipo_id)
    {

        $campos = 'e.id, e.nombre, e.nombre_completo, e.categoria_id, e.desaparecido, e.fundado, e.debut_nacional,  
            (SELECT count(id) FROM historicoequipos WHERE equipo_id=e.id AND torneo_id=192) copas,
            (SELECT count(id) FROM nacionalclasificacionok WHERE equipo_id=e.id AND idDivision=1 AND estilo=0) primera,
            (SELECT count(id) FROM nacionalclasificacionok WHERE equipo_id=e.id AND idDivision=2 AND estilo=0) segunda,
            (SELECT count(id) FROM nacionalclasificacionok WHERE equipo_id=e.id AND idDivision=3 AND estilo=0) segundab,
            (SELECT count(id) FROM nacionalclasificacionok WHERE equipo_id=e.id AND idDivision=4 AND estilo=0) tercera,
            p.nombre nombrePais, l.nombre nombreLocalidad, ca.nombre nombreCategoria,
            pr.nombre nombreProvincia, co.nombre nombreComunidad, 
            co.id imagenComunidad, p.id imagenPais';
        $tabla = ' equipo e';
        $union = ' INNER JOIN club c ON c.id=e.club_id';
        $union .= ' INNER JOIN pais p ON c.pais_id=p.id';
        $union .= ' INNER JOIN localidad l ON c.localidad_id=l.id';
        $union .= ' INNER JOIN provincia pr ON l.provincia_id=pr.id';
        $union .= ' INNER JOIN comunidad co ON pr.comunidad_id=co.id';
        $union .= ' INNER JOIN categoria ca ON e.categoria_id=ca.id';

        $condicion = " WHERE e.id=".$equipo_id;
        $orden = ' ORDER BY e.club_id, e.categoria_id, e.codigoRFEF';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta; die;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);


        return $resultado;
    }

    function borrar_temporada($temporada_id)
    {
        $mysqli = conectar();

        $sql = 'DELETE FROM gol WHERE temporada_id='.$temporada_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql."<br />";
        $sql = 'DELETE FROM tarjeta WHERE temporada_id='.$temporada_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql."<br />";
        $sql = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql."<br />";
        $sql = 'UPDATE liga SET jornadas=0, jornadaActiva=1 WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql."<br />";


        $files = glob('../../json/temporada/'.$temporada_id.'/*.*');
        foreach ($files as $file) {
            echo $file.'<br />';
            unlink($file);
        }


        echo 'Temporada borrada<br />';

        return 'ok';
    }

    function nombreDiaMini($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = strftime('%A, %d de %b', $fecha);

        return $nombre;
    }

    function localidades($modo, $id)
    {
        $mysqli = conectar();

        $consulta = 'SELECT e.id equipo_id, e.nombre equipo,
    cat.nombre categoria, cat.id categoria_id,
    es.nombre estadio,
    cl.id club_id, cl.nombre club, 
    l.id localidad_id, l.nombre localidad, 
    p.id provincia_id, p.nombre provincia, 
    c.id comunidad_id, c.nombre comunidad,
    tem.nombre temporadanombre, tem.id temporada_id
    
    FROM equipo e
    LEFT JOIN estadio es ON e.estadio_id=es.id
    INNER JOIN categoria cat ON e.categoria_id=cat.id
    INNER JOIN club cl ON e.club_id=cl.id
    INNER JOIN localidad l ON cl.localidad_id=l.id
    INNER JOIN provincia p ON l.provincia_id=p.id
    INNER JOIN comunidad c ON p.comunidad_id=c.id
    INNER JOIN temporada_equipo te on te.equipo_id=e.id
    INNER JOIN temporada tem on te.temporada_id=tem.id
    INNER JOIN torneo tor on tem.torneo_id=tor.id
    ';

        if (1 == $modo) {
            $condicion = ' WHERE tor.tipo_torneo=1 AND tor.visible=5 AND l.pais_id=60 AND l.id='.($id);
        } elseif (2 == $modo) {
            $condicion = ' WHERE tor.tipo_torneo=1 AND tor.visible=5 AND l.pais_id=60 AND p.id='.($id);
        } else {
            if (56 == $id) {
                $condicion = ' WHERE tor.tipo_torneo=1 AND tor.visible=5 AND l.pais_id=60 AND (c.id=10 OR c.id=21)';
            } elseif (57 == $id) {
                $condicion = ' WHERE tor.tipo_torneo=1 AND tor.visible=5 AND l.pais_id=60 AND (c.id=11 OR c.id=22)';
            } else {
                $condicion = ' WHERE tor.tipo_torneo=1 AND tor.visible=5 AND l.pais_id=60 AND c.id='.($id);
            }
        }

        $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden, p.nombre, l.nombre, e.nombre, cat.id';

        $consulta = $consulta.$condicion.$orden;

        //echo $consulta;

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }


    function listarColores()
    {
        $consulta = 'SELECT c.id, c.nombre, c.texto, c.color_fondo, c.color_texto, c.peso,
    (SELECT count(color_id) FROM colortorneo WHERE color_id=c.id) usado
    FROM color c
    ORDER BY c.peso ';

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

        return $resultado;
    }

    function coloresTorneo($torneo_id, $grupo)
    {
        if (0 == $torneo_id) {
            $condicion = '';
        } else {
            $condicion = ' WHERE torneo_id='.$torneo_id.' AND grupo_id='.$grupo;
        }

        $consulta = 'SELECT ct.id, ct.posicion, c.nombre, c.texto, c.color_fondo, c.color_texto, c.peso, ct.color_id,
(SELECT nombre FROM torneo WHERE id=ct.torneo_id) torneo
FROM colortorneo ct 
INNER JOIN color c ON ct.color_id=c.id '.$condicion.' ORDER BY ct.posicion';

        //echo $consulta;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

        return $resultado;
    }


    function XpartidosH($idH, $jornadaActiva = 0)
    {
        $campos = "p.id,p.historicotemporadas_id temporada_id,1 as estado_partido,p.jornada,p.nombre_eliminatoria fase,
    p.grupo_id,'grupo' as nombre,p.fecha,p.hora hora_prevista,1 as hora_real,p.clasificado,p.local_goles goles_local,p.visitante_goles goles_visitante,p.local_nombre local,p.local_nombre localCorto,p.local_fm_id equipoLocal_id,1 as apuesta_partido,p.visitante_nombre visitante,p.visitante_nombre visitanteCorto,p.visitante_fm_id equipoVisitante_id, 
    p.cosas observaciones,1 as acta,1 as estadio,p.youtube_id,1 as idComunidad,'0' as goles,'0' as tv";
        $tabla = 'historico p';
        if (0 == $jornadaActiva) {
            $condicion = ' WHERE p.historicotemporadas_id='.$idH;
        } else {
            $condicion = ' WHERE p.historicotemporadas_id='.$idH.' AND p.jornada='.$jornadaActiva;
        }
        $orden = ' ORDER BY p.jornada, p.grupo_id, p.fecha, p.hora';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function XenfrentamientosAgrupar2($bd, $torneo_id, $e1, $e2)
    {
        $mysqli = conectar();

        if (0 == $bd) {
            $consulta = 'SELECT p.id,p.goles_local,p.goles_visitante,p.jornada, p.fecha,
p.clasificado,p.observaciones,tor.tipo_torneo,p.equipoLocal_id id_local,p.equipoVisitante_id id_visitante,
(select nombre from fase where id=p.jornada) fase,
(select nombreCorto from equipo where id=p.equipoLocal_id) local, 
(select nombreCorto from equipo where id=p.equipoVisitante_id) visitante,
tor.nombre nombreT, p.temporada_id enlace_id,tor.nombre enlace_nombre,p.youtube_id
FROM partido p 
INNER JOIN temporada te ON p.temporada_id=te.id
INNER JOIN torneo tor ON te.torneo_id=tor.id
WHERE p.estado_partido=1 AND p.temporada_id='.$torneo_id.' AND
((p.equipoLocal_id='.$e1.' AND p.equipoVisitante_id='.$e2.')
OR (p.equipoLocal_id='.$e2.' AND p.equipoVisitante_id='.$e1.')) ORDER BY p.fecha DESC';
        }

        if (1 == $bd || 2 == $bd) {

            if ($torneo_id==1){ $ligaplayoff="(nt.fm_torneo_id=".$torneo_id." OR nt.idTemporada=1680)"; } else { $ligaplayoff="nt.fm_torneo_id=".$torneo_id; }

            $consulta = 'SELECT p.idPartido id,p.resulCasa goles_local,
p.clasificado,p.cosas observaciones,
tor.tipo_torneo,p.fm_local_id id_local,p.fm_visitante_id id_visitante,
p.resulFuera goles_visitante, p.jornada, p.fecha,
(select nombre from fase where id=p.jornada) fase,
p.nomCasa local, p.nomFuera visitante,
tor.nombre nombreT, nt.grupo grupo_torneo, nt.idDivision id_division,
p.idTemporada enlace_id,nt.nombreTemporada enlace_nombre,p.youtube_id
FROM nacionalcalendario p 
INNER JOIN nacionaltorneos nt ON nt.idTemporada=p.idTemporada
INNER JOIN torneo tor ON nt.fm_torneo_id=tor.id_original
WHERE '.$ligaplayoff.' AND 
((p.fm_local_id='.$e1.' AND p.fm_visitante_id='.$e2.')
OR (p.fm_local_id='.$e2.' AND p.fm_visitante_id='.$e1.')) ORDER BY p.fecha DESC';
        }

        if ($bd > 2) {
            $consulta = 'SELECT p.id,p.local_goles goles_local,
p.clasificado,p.cosas observaciones,
tor.tipo_torneo,p.local_fm_id id_local,p.visitante_fm_id id_visitante,
p.visitante_goles goles_visitante, p.jornada, p.fecha,
p.nombre_eliminatoria fase,
p.local_nombre local, p.visitante_nombre visitante,
tor.nombre nombreT, 0 grupo_torneo, 0 id_division,
p.historicotemporadas_id enlace_id,p.nombre_temporada enlace_nombre,p.youtube_id, p.cosas
FROM historico p 
INNER JOIN historicotemporadas ht ON ht.id=p.historicotemporadas_id
INNER JOIN torneo tor ON ht.torneo_id=tor.id_original
WHERE ht.torneo_id='.$torneo_id.' AND
((p.local_fm_id='.$e1.' AND p.visitante_fm_id='.$e2.')
OR (p.local_fm_id='.$e2.' AND p.visitante_fm_id='.$e1.')) ORDER BY p.fecha DESC';
        }

        //imp($consulta);

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

//********************Generar Racha*********************************

    function Xracha($liga, $equipo_id)
    {
        $partidoRepo = new PartidoRepository($this->db);
        $partidos = $partidoRepo->Xpartidos($liga, 0);

        $puntosPorganar = 3;
        $puntosPorempatar = 1;
        $puntosPorperder = 0;
        $clasificacion = array();

        foreach ($partidos as $partido) {
            if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                continue;
            }
            if ((0 == $partido['equipoLocal_id']) || (0 == $partido['equipoVisitante_id'])) {
                continue;
            }
            if (('' == trim($partido['local'])) || ('' == trim($partido['visitante']))) {
                continue;
            }
            if ($partido['equipoLocal_id'] != $equipo_id && $partido['equipoVisitante_id'] != $equipo_id) {
                continue;
            }

            if (!isset($partido['localCorto'])) {
                $partido['localCorto'] = $partido['local'];
                $partido['visitanteCorto'] = $partido['visitante'];
            }

            $nombreCasaCorto = $partido['localCorto'];
            $nombreFueraCorto = $partido['visitanteCorto'];
            if (1 != $partido['estado_partido']) {
                continue;
            }

            $ideC = (int) $partido['equipoLocal_id'];
            $ideF = (int) $partido['equipoVisitante_id'];
            if (!isset($clasificacion[$ideC]['racha'])) {
                $clasificacion[$ideC]['racha'] = '';
            }
            if (!isset($clasificacion[$ideF]['racha'])) {
                $clasificacion[$ideF]['racha'] = '';
            }

            $partidoClas = $partido['fecha'].','.$partido['jornada'].','.$partido['localCorto'].','.$partido['visitanteCorto'].','.$partido['goles_local'].','.$partido['goles_visitante'].','.$partido['equipoLocal_id'].','.$partido['equipoVisitante_id'].','.$partido['id'];
            if (1 == $partido['estado_partido']) {
                /**************calculo de puntos*******************/
                if ($partido['goles_local'] > $partido['goles_visitante']) {
                    $clasificacion[$ideC]['u_punto'] = $partidoClas;
                    $clasificacion[$ideC]['u_victoria'] = $partidoClas;
                    $clasificacion[$ideF]['u_derrota'] = $partidoClas;
                    $clasificacion[$ideC]['racha'] .= $partidoClas.',3;';
                    $clasificacion[$ideF]['racha'] .= $partidoClas.',0;';
                } elseif ($partido['goles_local'] == $partido['goles_visitante']) {
                    $clasificacion[$ideC]['u_punto'] = $partidoClas;
                    $clasificacion[$ideC]['u_empate'] = $partidoClas;
                    $clasificacion[$ideF]['u_punto'] = $partidoClas;
                    $clasificacion[$ideF]['u_empate'] = $partidoClas;
                    $clasificacion[$ideC]['racha'] .= $partidoClas.',1;';
                    $clasificacion[$ideF]['racha'] .= $partidoClas.',1;';
                } else {
                    $clasificacion[$ideF]['u_punto'] = $partidoClas;
                    $clasificacion[$ideF]['u_victoria'] = $partidoClas;
                    $clasificacion[$ideC]['u_derrota'] = $partidoClas;
                    $clasificacion[$ideC]['racha'] .= $partidoClas.',0;';
                    $clasificacion[$ideF]['racha'] .= $partidoClas.',3;';
                }

                if ($partido['goles_local'] > 0) {
                    $clasificacion[$ideC]['u_gol_favor'] = $partidoClas;
                    $clasificacion[$ideF]['u_gol_contra'] = $partidoClas;
                }
                if ($partido['goles_visitante'] > 0) {
                    $clasificacion[$ideF]['u_gol_favor'] = $partidoClas;
                    $clasificacion[$ideC]['u_gol_contra'] = $partidoClas;
                }
            }
            if ($ideC != $equipo_id) {
                unset($clasificacion[$ideC]);
            }
            if ($ideF != $equipo_id) {
                unset($clasificacion[$ideF]);
            }
        }

        return $clasificacion;
    }
////////////FIN DE RACHA/////////

    function partidosCategorias($fecha)
    {
        $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre';
        $tabla = ' partido p';
        $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union2 = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union3 = ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
        $condicion = " WHERE p.fecha='".$fecha."' AND tor.visible>4 AND p.temporada_id<680 ";

        $orden = 'GROUP BY tor.categoria_torneo_id ORDER BY ct.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

        //echo $consulta; die;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function partidosCategorias2($fecha)
    {
        $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre';
        $tabla = ' partido p';
        $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union2 = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union3 = ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
        $condicion = " WHERE p.fecha='".$fecha."' AND tor.visible>4 AND p.temporada_id>680 ";

        $orden = 'GROUP BY tor.categoria_torneo_id ORDER BY ct.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

        //echo $consulta; die;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function partidosPorCategoria($fecha, $ct)
    {
        $campos = 'p.id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id,
    p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones,  
    p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi, 
    p.hora_prevista, ec.nombre localCorto, ef.nombre visitanteCorto, p.jornada, ec.slug tl, ef.slug tv,
    te.nombre temporada_nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
        $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
        $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $condicion = " WHERE p.fecha='".$fecha."' AND tor.visible>4 AND tor.visible<70  AND tor.categoria_torneo_id=".$ct;
        $orden = ' ORDER BY p.hora_prevista, tor.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function partidosPorCategoriaB($fecha, $ct)
    {
        $campos = 'p.id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id,
    p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones,  
    p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi, 
    p.hora_prevista, ec.nombre localCorto, ef.nombre visitanteCorto, p.jornada, ec.slug tl, ef.slug tv,
    te.nombre temporada_nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
        $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
        $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $condicion = " WHERE p.fecha='".$fecha."' AND tor.visible>69  AND tor.categoria_torneo_id=".$ct;
        $orden = ' ORDER BY p.hora_prevista, tor.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function partidosPendientes()
    {
        $dia = date('y-m-j');
        //$nuevafecha = strtotime ( '-5 day' , strtotime ( $dia ) ) ;
        //$dia = date ( 'Y-m-j' , $nuevafecha );

        $campos = 'p.id, p.estado_partido,p.hora_prevista, p.fecha, p.jornada, p.temporada_id, ec.nombre local, p.equipoLocal_id, p.equipoVisitante_id, p.goles_local, p.goles_visitante,
    ef.nombre visitante, te.nombre temporada_nombre, p.observaciones, tor.categoria_torneo_id, tor.comunidad_id, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo ';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
        $union2 = ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
        $union3 = ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union4 = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $condicion = " WHERE p.fecha<'".$dia."' AND p.estado_partido<>1 AND tor.visible>4";
        $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$union4.$condicion.$orden;

        //echo $consulta;
        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }
}