<?php
namespace App\Application\Repositories;

use App\Application\Helpers\DbHelper;

class PartidoRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

    function eliminarPartido($partido_id) { }
    function compararPartido($partido_id, $partido_api) { }


    function vincularPartido($partido_id, $partido_api) {

        $mysqli = conectar();
        $consulta = 'UPDATE partido SET betsapi='.$partido_api.' WHERE id='.$partido_id;
        $resultadoSQL = mysqli_query($mysqli, $consulta); //actualizamos la tabla partido
    }

    function vincularApifutbol($partido_id, $pApifutbol) {
        $mysqli = conectar();
        $consulta = 'UPDATE partido SET partidoAPI='.$pApifutbol.' WHERE id='.$partido_id;
        $resultadoSQL = mysqli_query($mysqli, $consulta); //actualizamos la tabla partido
        //echo $consulta."<br />";
    }

    function modificarPartido($partido) {

        if (empty($partido['fecha'])) {
            $cadenaFecha='fecha=NULL';
        } else {
            $cadenaFecha='fecha="'.$partido['fecha'].'"';
        }

        $mysqli = conectar();
        $consulta = 'UPDATE partido SET 
            jornada='.$partido['jornada'].', 
            estado_partido='.$partido['estado_partido'].','.$cadenaFecha.',
            hora_prevista="'.$partido['hora_prevista'].'",
            goles_local='.$partido['goles_local'].',
            goles_visitante='.$partido['goles_visitante'].',
            clasificado='.$partido['clasificado'].",
            observaciones='".$partido['observaciones']."'            
            WHERE id=".$partido['partido_id'];
        $resultadoSQL = mysqli_query($mysqli, $consulta); //actualizamos la tabla partido
        echo $consulta;

    }

    function modificarJugador($jugador) {
        $mysqli = conectar();
        $consulta = 'UPDATE jugador SET 
    nombre="'.$jugador['nombre'].'",
    apodo="'.$jugador['apodo'].'",
    dorsal="'.$jugador['dorsal'].'" WHERE id='.$jugador['jugador_id'];
        $resultadoSQL = mysqli_query($mysqli, $consulta); //actualizamos la tabla partido
        echo $consulta;
    }



    function insertarPartido($partido) {
        $fase_id = 198; //para ligas sin calendario.
        $temporada_id = $partido['temporada_id'];
        $partidoAPI = $partido['match_id'];
        $fecha = $partido['match_date'];
        //echo $fecha." - ";
        $estado_partido = 0;
        $goles_local = 0;
        $goles_visitante = 0;

        if ('FT' == $partido['match_status']) {
            $estado_partido = 1;
        }
        if ('HT' == $partido['match_status']) {
            $estado_partido = 5;
        }
        if ("'" == substr($partido['match_status'], 1)) {
            $estado_partido = 2;
        }

        if (strlen($partido['match_time'])!=5) { $partido['match_time']='00:00'; }
        $hora_prevista = $partido['match_time'];
        //echo $hora_prevista." - ";

        //goles_local   //goles_visitante
        if ($partido['match_hometeam_score'] > 0) {
            $goles_local = $partido['match_hometeam_score'];
        }
        if ($partido['match_awayteam_score'] > 0) {
            $goles_visitante = $partido['match_awayteam_score'];
        }

        //echo "<b>".$goles_local."</b> - <b>".$goles_visitante."</b>...EP: ===== ".$estado_partido." ===== ";

        $valor = $partido['pais_id'].'_'.$partido['match_hometeam_name'];
        echo $valor." - ";
        $valor = str_replace("'", '´', $valor);
        $eq = Xequipo_id($valor);
        $equipoLocal_id = $eq['id'];
        $local = $eq['nombre'];
        $valor = $partido['pais_id'].'_'.$partido['match_awayteam_name'];
        echo $valor." <br />";
        $valor = str_replace("'", '´', $valor);
        $eq = Xequipo_id($valor);
        $equipoVisitante_id = $eq['id'];
        $visitante = $eq['nombre'];
        echo $local." - ".$visitante."<br />";

        $mysqli = conectar();

        $consulta="SELECT id FROM partido WHERE partidoAPI=".$partidoAPI;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);


        if (!isset($resultado)) {
            $consulta = 'INSERT INTO partido (temporada_id,estado_partido,fecha,hora_prevista,jornada,equipoLocal_id, equipoVisitante_id, partidoAPI, goles_local, goles_visitante)
                    VALUES ('.$temporada_id.',
                    '.$estado_partido.",
                     '".$fecha."', 
                     '".$hora_prevista."',
                     ".$fase_id.', 
                     '.$equipoLocal_id.', 
                     '.$equipoVisitante_id.',
                     '.$partidoAPI.',
                     '.$goles_local.',
                     '.$goles_visitante.')';

            $resultadoSQL = mysqli_query($mysqli, $consulta);

            echo $consulta.';<br />';

        } else{

            echo "Registro grabado ".$partidoAPI."<br />";


        }




        //echo ($key+1)." grabado el partido ".$partidoAPI."<br />";
    }


    function Xtorneo_id($id)
    {
        $consulta = "SELECT torneo_id FROM temporada WHERE id=".$id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);

        return $resultado[0];
    }


    function Xequipo_id($valor)
    {
        $consulta = "SELECT id,nombre FROM equipo WHERE nombreAPI='".$valor."'";
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        echo $consulta."<br />";
        return $resultado;
    }

    function extraerApi($id)
    {
        $consulta = 'SELECT betsapi, apifutbol FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$id.')';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }



    function extraerApis($id)
    {
        $consulta = 'SELECT torneo_id, api_id, api_nombre, jornada_id, grupo_id, (SELECT nombre FROM grupo WHERE id=grupo_id) grupo FROM apis WHERE torneo_id=(SELECT torneo_id FROM temporada WHERE id='.$id.') ORDER BY api_id';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }

    function Xapiequipospais($id)
    {
        $consulta = 'SELECT e.id, e.nombre, e.nombreAPI, p.id pais_id,p.nombre pais_nombre, t.id torneo FROM equipo e 
    INNER JOIN club c ON e.club_id=c.id
    INNER JOIN pais p ON c.pais_id=p.id
    INNER JOIN torneo t ON p.id=t.pais_id
    INNER JOIN apis a ON a.torneo_id=t.id
    WHERE e.categoria_id=1 AND a.api_id='.$id.' ORDER BY e.nombre';

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function extraerPartido($id)
    {
        $campos = 'ct.id categoria_id, ct.orden categoria_orden, ct.nombre categoria_nombre,
    tor.apuestaMA, tor.id torneo_id, tor.orden torneo_orden, tor.nombre torneo_nombre, tor.division_id,
    co.id comunidad_id, co.nombre comunidad_nombre,
    pa.id pais_id, pa.nombre pais_nombre,
    p.id partido_id, p.estado_partido, p.temporada_id, p.fecha, p.arbitro_id,
    p.hora_prevista, p.hora_real, p.goles_local, p.goles_visitante, 
    p.jornada, p.clasificado, p.observaciones, 
    p.equipoLocal_id, ec.nombre local, ec.nombreCorto ncLocal, ec.slug twLocal, 
    (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)
        )
    ) comunidad_local,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)

            )
        )
    ) comunidad_local_nombre,
    (select pais_id from club where id=ec.club_id) pais_local,
    (select nombre from pais where id=(select pais_id from club where id=ec.club_id)) pais_local_nombre,
    p.equipoVisitante_id, ef.nombre visitante, ef.nombreCorto ncVisitante, ef.slug twVisitante,
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)
        )
    ) comunidad_visitante,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)

            )
        )
    ) comunidad_visitante_nombre,
    (select pais_id from club where id=ef.club_id) pais_visitante,
    (select nombre from pais where id=(select pais_id from club where id=ef.club_id)) pais_visitante_nombre,
    p.usuario_id';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
        $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
        $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union .= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
        $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
        $union .= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
        $condicion = ' WHERE p.partidoAPI='.$id;

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;

        //echo $consulta;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function extraerDirecto($id)
    {
        $campos = 'd.id, d.categoria_id, d.categoria_orden, d.categoria_nombre,
    d.torneo_id, d.torneo_orden, d.torneo_nombre, d.comunidad_id, d.comunidad_nombre,
    d.pais_id, d.pais_nombre, d.partido_id, d.estado_partido, d.temporada_id,
    d.hora_prevista, d.hora_real, d.goles_local, d.goles_visitante, 
    d.jornada, d.observaciones, d.clasificado, d.tipo, d.evento,
    d.equipoLocal_id, d.local, d.comunidad_local, d.comunidad_local_nombre,
    d.pais_local, d.pais_local_nombre,
    d.equipoVisitante_id, d.visitante, d.comunidad_visitante, d.comunidad_visitante_nombre, 
    d.pais_visitante, d.pais_visitante_nombre, d.usuario_id,
    d.momento, d.partido_ida, d.goles, d.fecha';
        $tabla = ' directo d';
        $condicion = ' WHERE d.partido_id='.$id;

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }


    function XpartidoTarjetas($partido_id)
    {

        $campos = 't.id, t.jugador_id, t.minuto, t.tipo, t.esLocal, j.apodo nombreJugador, j.posicion,t.observaciones ';
        $tabla = 'partido p';
        $union = ' INNER JOIN tarjeta t ON p.id=t.partido_id';
        $union .= ' INNER JOIN jugador j ON j.id=t.jugador_id';
        //$condicion = ' WHERE p.id='.$partido_id.' AND (t.tipo<2 OR t.tipo=5)';
        $condicion = ' WHERE p.id='.$partido_id.' AND (t.tipo<>2 AND t.tipo<>6)';
        $orden = ' ORDER BY t.minuto, t.id';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;die;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function XpartidoGoles($partido_id, $bd = 1)
    {
        if (1 == $bd) {
            $campos = 'g.id, g.partido_id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.observaciones, j.apodo nombreJugador ';
            $tabla = 'partido p';
            $union = ' INNER JOIN gol g ON p.id=g.partido_id';

            $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
            $condicion = ' WHERE p.id='.$partido_id;
            $orden = ' ORDER BY g.minuto';
        } else {
            $campos = "g.id, g.partido_id, g.jugador_id, g.minuto, g.tipo, g.esLocal, '' observaciones, j.apodo nombreJugador ";
            $tabla = 'historico p';
            $union = ' INNER JOIN historicogol g ON p.partido_id=g.partido_id';
            $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
            $condicion = ' WHERE p.partido_id='.$partido_id;
            $orden = ' ORDER BY g.minuto';
        }

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;die;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);

        return $resultado;
    }

    function Xpartidos2021($cadena)
    {
        $campos = "p.id, 
p.temporada_id,
p.estado_partido, 
p.jornada,
p.fecha, 
p.hora_prevista, 
p.goles_local,
p.goles_visitante,
ec.nombre local, ec.nombreCorto localCorto, 
p.equipoLocal_id, 
ef.nombre visitante, ef.nombreCorto visitanteCorto, 
p.equipoVisitante_id
";
        
        $tabla = 'partido p';

        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        
        $condicion = ' WHERE tor.tipo_torneo=1 AND equipoLocal_id IN ('.$cadena.') AND equipoVisitante_id IN ('.$cadena.')';
        

        $orden = ' ORDER BY p.jornada, p.fecha, p.hora_prevista';
        
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetchAll($resultadoSQL);


        return $resultado;
    }




    function Xpartidos($temporada_id, $jornadaActiva = 0)
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

    function listarTorneosPorCategoria($tipo_torneo, $categoria_torneo, $usuario_id=0)
    {

        $campos2="";$union2="";$condicion="";
        if (1 == $tipo_torneo) {
            $campos2 = ', li.jornadas, li.jornadaActiva';
            $union2 = ' INNER JOIN liga li ON li.id=tor.id';
        }

        if (2 == $tipo_torneo) {
            $campos2 = ', eli.fase_activa, fa.tipo_eliminatoria';
            $union2 = ' INNER JOIN eliminatorio eli ON eli.id=tor.id
                  INNER JOIN fase fa ON fa.id=eli.fase_activa';
        }

        $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
    AND tor.visible>3 AND tor.categoria_torneo_id='.$categoria_torneo;
        if ($usuario_id>0) {
            $condicion.=' AND tor.usuario='.($usuario_id);
        }


        if (3 == $tipo_torneo) {
            if ($categoria_torneo==1 || $categoria_torneo==17){
                $dia = date('y-m-j');
            } else {
                $a = substr($categoria_torneo, 0, 4);
                $m = substr($categoria_torneo, 4, 2);
                $d = substr($categoria_torneo, -2);
                $dia = $a.'-'.$m.'-'.$d;
                //$dia='2019-09-14';
            }


            $campos2 = ''; //para ordenar este torneo
            $union2 = ' INNER JOIN partido p ON te.id=p.temporada_id';
            $condicion = " WHERE (p.fecha='".$dia."' OR p.estado_partido=2) AND tor.visible>4 AND tor.visible<100
        GROUP BY tor.categoria_torneo_id, tor.orden";
        }

        /*if (4 == $tipo_torneo) {
            $a = substr($categoria_torneo, 0, 4);
            $m = substr($categoria_torneo, 4, 2);
            $d = substr($categoria_torneo, -2);
            $dia = $a.'-'.$m.'-'.$d;
            //recojo la fecha como categoría torneo
            $campos2 = ''; //para ordenar este torneo
            $union2 = ' INNER JOIN partido p ON te.id=p.temporada_id';
            $condicion = " WHERE p.fecha='".$dia."' OR p.estado_partido=2
            GROUP BY tor.categoria_torneo_id, tor.orden";
        }*/

        $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, tor.apuestaMA, pa.nombre nombrePais, tor.categoria_torneo_id, tor.apifutbol_tipo,
    co.nombre nombreComunidad, tor.betsapi ';
        $tabla = ' torneo tor';
        $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
        $union.= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
        $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
        $orden = ' ORDER BY tor.apuestaMA DESC, tor.categoria_torneo_id, tor.comunidad_id, tor.orden';

        $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$condicion.$orden;

        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


        $torneos=array();

        $torneos[0]=$resultado;


        if (1 == $tipo_torneo) {
            $campos2 = ', li.jornadas, li.jornadaActiva';
            $union2 = ' INNER JOIN liga li ON li.id=tor.id';
            $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
        AND tor.visible<5 AND tor.categoria_torneo_id='.$categoria_torneo;
        }

        if (2 == $tipo_torneo) {
            $campos2 = ', eli.fase_activa, fa.tipo_eliminatoria';
            $union2 = ' INNER JOIN eliminatorio eli ON eli.id=tor.id
                  INNER JOIN fase fa ON fa.id=eli.fase_activa';
            $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
        AND tor.visible<5 AND tor.categoria_torneo_id='.$categoria_torneo;
        }

        $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, tor.apuestaMA, pa.nombre nombrePais, tor.categoria_torneo_id, tor.apifutbol_tipo,
    co.nombre nombreComunidad ';
        $tabla = ' torneo tor';
        $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
        $union.= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
        $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
        $orden = ' ORDER BY tor.apuestaMA DESC, tor.categoria_torneo_id, tor.orden';

        $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$condicion.$orden;
        //echo $consulta;die;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


        $torneos[1]=$resultado;



        return $torneos;
    }


    function listarPartidos($temporada_id, $jornada, $grupo, $dia=1)
    {
        if ($dia==1 || $dia==17) { $dia = date('Y-m-d'); }
        $campos = 'ct.id categoria_id, ct.orden categoria_orden, ct.nombre categoria_nombre,
    tor.id torneo_id, tor.orden torneo_orden, tor.nombre torneo_nombre,
    co.id comunidad_id, co.nombre comunidad_nombre,
    pa.id pais_id, pa.nombre pais_nombre, 
    p.id partido_id, p.estado_partido, p.temporada_id, p.fecha, p.arbitro_id,
    p.hora_prevista, p.hora_real, p.goles_local, p.goles_visitante, 
    p.jornada, p.clasificado, p.observaciones, p.estadio, p.partidoAPI, p.comentario,
    p.equipoLocal_id, ec.nombre local, ec.nombreCorto ncLocal, ec.slug twLocal, ec.betsapi betsapiL,
    (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)
        )
    ) comunidad_local,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)

            )
        )
    ) comunidad_local_nombre,
    (select pais_id from club where id=ec.club_id) pais_local,
    (select nombre from pais where id=(select pais_id from club where id=ec.club_id)) pais_local_nombre,
    p.equipoVisitante_id, ef.nombre visitante, ef.nombreCorto ncVisitante, ef.slug twVisitante, ef.betsapi betsapiV,
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)
        )
    ) comunidad_visitante,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)

            )
        )
    ) comunidad_visitante_nombre,
    (select pais_id from club where id=ef.club_id) pais_visitante,
    (select nombre from pais where id=(select pais_id from club where id=ef.club_id)) pais_visitante_nombre,
    p.usuario_id, (select count(id) from medio where partido_id=p.id) medios, p.youtube_id, p.betsapi';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
        $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
        $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
        $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union .= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
        $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
        $union .= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';


        if ($jornada==0) { //mostramos los partidos de hoy.
            $condicion = ' WHERE (p.temporada_id='.$temporada_id.' AND p.fecha="'.$dia.'") OR (p.fecha<>"'.$dia.'" AND p.estado_partido=2)';
        } else {
            if ($grupo > 0) {
                $condicion = ' WHERE p.temporada_id='.$temporada_id.' 
        AND p.jornada='.$jornada.' 
        AND p.grupo_id='.$grupo;
            } else {
                if (231 == $temporada_id or
                    442 == $temporada_id or
                    287 == $temporada_id or
                    330 == $temporada_id) {
                    $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$jornada." AND p.fecha>'2017-09-20'";
                } else {
                    $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$jornada;
                }
            }
        }

        $orden = ' ORDER BY p.fecha, p.hora_prevista';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        //echo $consulta;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }


    function Xpartido($partido_id)
    {
        $campos = 'p.id, p.partidoAPI, p.betsapi,
p.temporada_id,
p.estado_partido, 
p.jornada,
p.fecha, 
p.hora_prevista, 
p.goles_local,
p.goles_visitante,
ec.nombreCorto local, 
ec.slug twitter_local, 
p.equipoLocal_id,
ef.nombreCorto visitante, 
ef.slug twitter_visitante, 
p.equipoVisitante_id,
p.comentario, p.observaciones, p.youtube_id,
tor.id_original, tor.visible, tor.apuesta apuesta_torneo,
(select es_seleccion FROM club WHERE id=ec.club_id) es_seleccion,
(select count(id) from gol WHERE partido_id=p.id AND jugador_id>0) goles';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';

        $tabla = 'partido p';
        $campos .= ",fa.nombre fase,  
p.hora_real,
p.apuesta,
p.clasificado, 
p.grupo_id, p.codigo_acta,
(select nombre from grupo where id=p.grupo_id) nombreGrupo, 
(SELECT temporada_id FROM temporada_equipo WHERE equipo_id=p.equipoLocal_id AND (select tipo_torneo from torneo WHERE id=(select torneo_id from temporada where id=temporada_id) limit 1)=1 limit 1) liga_local,
(SELECT temporada_id FROM temporada_equipo WHERE equipo_id=p.equipoVisitante_id AND (select tipo_torneo from torneo WHERE id=(select torneo_id from temporada where id=temporada_id) limit 1)=1 limit 1) liga_visitante,
p.arbitro_id,
(select pais_id FROM club WHERE id=ec.club_id) paisLocal_id,
(select pais_id FROM club WHERE id=ef.club_id) paisVisitante_id,
(select id FROM club WHERE id=ec.club_id) club_id_local,
(select id FROM club WHERE id=ef.club_id) club_id_visitante,
p.estadio, 
te.nombre nombreTemporada,
tor.tipo_torneo,
tor.comunidad_id,
tor.apuesta apuesta_torneo, tor.desarrollo, tor.categoria_torneo_id,
co.id comunidad_imagen,
pa.id pais_imagen,pa.id_bwin,
(select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id)
FROM partido p2 
WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id 
AND p2.temporada_id=p.temporada_id 
AND p2.estado_partido=1
AND (select tipo_eliminatoria from fase where id=p.jornada)<>3
 LIMIT 1 ) as ida,
p.acta, (SELECT GROUP_CONCAT(DISTINCT medio_id SEPARATOR '-') FROM partido_medio WHERE partido_id=p.id) tv";

        $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
        $union .= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
        $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';

        $condicion = ' WHERE p.id='.$partido_id;

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;

        //echo $consulta;

        $resultadoSQL = $this->db->query($consulta);
        $resultado = $this->db->fetch($resultadoSQL);

        return $resultado;
    }

    function XpartidoVincular($temporada_id,$local_id,$visitante_id)
    {
        $campos = 'p.id, p.betsapi, p.jornada, p.temporada_id';
        $tabla = 'partido p';
        $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.equipoLocal_id='.$local_id.' AND p.equipoVisitante_id='.$visitante_id.' AND fecha> curdate()-interval 1 day';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        return $resultado;
    }
    function XpartidoMedios($partido_id)
    {
        $campos = 'm.id, m.nombre, m.id_original ';

        $tabla = 'partido_medio pm';

        $union = ' INNER JOIN medio m ON m.id=pm.medio_id';

        $condicion = ' WHERE pm.partido_id='.$partido_id;

        $orden = ' ORDER BY m.nombre';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;die;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function XpartidoApuestas($partido_id)
    {
        $campos = 'a.usuario_id, 
a.goles_local,
a.goles_visitante,
a.acierto,
u.nombre username';
        $tabla = 'apuesta a';
        $union = ' INNER JOIN usuario_token u ON u.id=a.usuario_id';
        $condicion = ' WHERE a.partido_id='.$partido_id;
        $orden = ' ORDER BY a.goles_local DESC, a.goles_visitante';

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function XenfrentamientosAgrupar($e1, $e2)
    {
        $mysqli = conectar();

        $consulta = 'SELECT count(p.idPartido),nt.fm_torneo_id torneo_id,(select nombre from torneo where id_original=nt.fm_torneo_id limit 1) nombreT, nt.grupo grupo_torneo, nt.idDivision id_division,
SUM(CASE WHEN ( p.fm_local_id='.$e1.' AND p.resulCasa > p.resulFuera ) OR ( p.fm_visitante_id='.$e1.' AND p.resulFuera > p.resulCasa) THEN 1 ELSE 0 END) AS V , 
SUM(CASE WHEN ( p.fm_local_id='.$e1.' OR p.fm_visitante_id='.$e1.' ) AND p.resulCasa = p.resulFuera THEN 1 ELSE 0 END) AS E ,  
SUM(CASE WHEN ( p.fm_local_id='.$e1.' AND p.resulCasa < p.resulFuera ) OR ( p.fm_visitante_id='.$e1.' AND p.resulFuera < p.resulCasa ) THEN 1 ELSE 0 END) AS D ,  
COALESCE(SUM(CASE WHEN (p.fm_local_id='.$e1.') THEN p.resulCasa WHEN (p.fm_visitante_id='.$e1.') THEN p.resulFuera END),0) AS GF , 
COALESCE(SUM(CASE WHEN (p.fm_local_id='.$e1.') THEN p.resulFuera WHEN (p.fm_visitante_id='.$e1.') THEN p.resulCasa END),0) AS GC  
FROM nacionalcalendario p 
INNER JOIN nacionaltorneos nt ON nt.idTemporada=p.idTemporada
WHERE nt.fm_torneo_id<25 AND 
((p.fm_local_id='.$e1.' AND p.fm_visitante_id='.$e2.')
OR (p.fm_local_id='.$e2.' AND p.fm_visitante_id='.$e1.'))
GROUP BY nt.fm_torneo_id';


        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $consulta = 'SELECT count(p.idPartido),nt.fm_torneo_id torneo_id,(select nombre from torneo where id_original=nt.fm_torneo_id) nombreT, nt.grupo grupo_torneo, nt.idDivision id_division,
SUM(CASE WHEN ( p.fm_local_id='.$e1.' AND p.resulCasa > p.resulFuera ) OR ( p.fm_visitante_id='.$e1.' AND p.resulFuera > p.resulCasa) THEN 1 ELSE 0 END) AS V , 
SUM(CASE WHEN ( p.fm_local_id='.$e1.' OR p.fm_visitante_id='.$e1.' ) AND p.resulCasa = p.resulFuera THEN 1 ELSE 0 END) AS E ,  
SUM(CASE WHEN ( p.fm_local_id='.$e1.' AND p.resulCasa < p.resulFuera ) OR ( p.fm_visitante_id='.$e1.' AND p.resulFuera < p.resulCasa ) THEN 1 ELSE 0 END) AS D ,  
COALESCE(SUM(CASE WHEN (p.fm_local_id='.$e1.') THEN p.resulCasa WHEN (p.fm_visitante_id='.$e1.') THEN p.resulFuera END),0) AS GF , 
COALESCE(SUM(CASE WHEN (p.fm_local_id='.$e1.') THEN p.resulFuera WHEN (p.fm_visitante_id='.$e1.') THEN p.resulCasa END),0) AS GC  
FROM nacionalcalendario p 
INNER JOIN nacionaltorneos nt ON nt.idTemporada=p.idTemporada
WHERE nt.fm_torneo_id>24 AND
((p.fm_local_id='.$e1.' AND p.fm_visitante_id='.$e2.')
OR (p.fm_local_id='.$e2.' AND p.fm_visitante_id='.$e1.'))
GROUP BY nt.fm_torneo_id';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado3 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $consulta = "SELECT count(p.id),ht.torneo_id,'Copa de España' nombreT, 0 grupo_torneo, 0 id_division,
SUM(CASE WHEN ( p.local_fm_id=".$e1.' AND p.local_goles > p.visitante_goles ) OR ( p.visitante_fm_id='.$e1.' AND p.visitante_goles > p.local_goles) THEN 1 ELSE 0 END) AS V , 
SUM(CASE WHEN ( p.local_fm_id='.$e1.' OR p.visitante_fm_id='.$e1.' ) AND p.local_goles = p.visitante_goles THEN 1 ELSE 0 END) AS E ,  
SUM(CASE WHEN ( p.local_fm_id='.$e1.' AND p.local_goles < p.visitante_goles ) OR ( p.visitante_fm_id='.$e1.' AND p.visitante_goles < p.local_goles ) THEN 1 ELSE 0 END) AS D , 
COALESCE(SUM(CASE WHEN (p.local_fm_id='.$e1.') THEN p.local_goles WHEN (p.visitante_fm_id='.$e1.') THEN p.visitante_goles END),0) AS GF , 
COALESCE(SUM(CASE WHEN (p.local_fm_id='.$e1.') THEN p.visitante_goles WHEN (p.visitante_fm_id='.$e1.') THEN p.local_goles END),0) AS GC  
FROM historico p 
INNER JOIN historicotemporadas ht ON ht.id=p.historicotemporadas_id
WHERE ht.torneo_id=192 AND
((p.local_fm_id='.$e1.' AND p.visitante_fm_id='.$e2.')
OR (p.local_fm_id='.$e2.' AND p.visitante_fm_id='.$e1.'))
GROUP BY ht.torneo_id';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado4 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $consulta = 'SELECT count(p.id),ht.torneo_id,(select nombre from torneo where id_original=ht.torneo_id limit 1) nombreT, (select tipo_torneo from torneo where id_original=ht.torneo_id limit 1) tipo_torneo,
0 grupo_torneo, 0 id_division,
SUM(CASE WHEN ( p.local_fm_id='.$e1.' AND p.local_goles > p.visitante_goles ) OR ( p.visitante_fm_id='.$e1.' AND p.visitante_goles > p.local_goles) THEN 1 ELSE 0 END) AS V , 
SUM(CASE WHEN ( p.local_fm_id='.$e1.' OR p.visitante_fm_id='.$e1.' ) AND p.local_goles = p.visitante_goles THEN 1 ELSE 0 END) AS E ,  
SUM(CASE WHEN ( p.local_fm_id='.$e1.' AND p.local_goles < p.visitante_goles ) OR ( p.visitante_fm_id='.$e1.' AND p.visitante_goles < p.local_goles ) THEN 1 ELSE 0 END) AS D , 
COALESCE(SUM(CASE WHEN (p.local_fm_id='.$e1.') THEN p.local_goles WHEN (p.visitante_fm_id='.$e1.') THEN p.visitante_goles END),0) AS GF , 
COALESCE(SUM(CASE WHEN (p.local_fm_id='.$e1.') THEN p.visitante_goles WHEN (p.visitante_fm_id='.$e1.') THEN p.local_goles END),0) AS GC  
FROM historico p 
INNER JOIN historicotemporadas ht ON ht.id=p.historicotemporadas_id
WHERE ht.torneo_id<>192 AND
((p.local_fm_id='.$e1.' AND p.visitante_fm_id='.$e2.')
OR (p.local_fm_id='.$e2.' AND p.visitante_fm_id='.$e1.'))
GROUP BY ht.torneo_id';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado5 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return array(
            'liga' => $resultado2,
            'promociones' => $resultado3,
            'copa' => $resultado4,
            'resto' => $resultado5,
        );
    }

    function XenfrentamientosAct($e1, $e2)
    {
        $mysqli = conectar();
        $sql = 'SELECT p.id FROM partido p 
    WHERE (p.equipoLocal_id='.$e1.' AND p.equipoVisitante_id='.$e2.')
    OR (p.equipoLocal_id='.$e2.' AND p.equipoVisitante_id='.$e1.') ORDER BY p.fecha';

        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        $partidosAct = array();
        foreach ($resultado as $key => $value) {
            $partidosAct[] = Xpartido($value['id']);
        }

        return $partidosAct;
    }


}