<?php
//********************Generar Racha*********************************

function Xracha($liga, $equipo_id)
{
    $partidos = Xpartidos($liga, 0);

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

//enfrentamientos
function enfrentamientos($e1, $e2)
{
    $mysqli = conectar();

    
   
    

    $enfrentamientosAct = actualidad($e1, $e2);
    $actual=array();

    foreach ($enfrentamientosAct as $k => $v) {
        $actual[$v['temporada_id']]['id']=$v['temporada_id'];
        $actual[$v['temporada_id']]['nombre']=$v['nombreTemporada'];
        $actual[$v['temporada_id']]['partidos'][]=$v;
    }


    $enfrentamientos[0]=$actual;

    $consulta = '
    SELECT 
    count(p.idPartido) partidos,
    nt.fm_torneo_id torneo_id,
    (select nombre from temporada where id=nt.fm_torneo_id limit 1) nombreT,
    nt.idDivision id_division
    FROM nacionalcalendario p 
    INNER JOIN nacionaltorneos nt ON nt.idTemporada=p.idTemporada
    WHERE ((p.fm_local_id='.$e1.' AND p.fm_visitante_id='.$e2.')
    OR (p.fm_local_id='.$e2.' AND p.fm_visitante_id='.$e1.'))
    GROUP BY nt.fm_torneo_id ORDER BY nt.idDivision,nt.temporada DESC';



    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $nacional = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $resumen=array();
    foreach ($nacional as $key => $value) {
        if ($value['torneo_id']<1){ continue; }
        $resumen['1-'.$value['torneo_id']]=$value;
        $r=enfrentamientosPartidos(1, $value['torneo_id'], $e1, $e2);
        $resumen['1-'.$value['torneo_id']]['partidos']=$r;
    }

    


    $consulta = 'SELECT 
    count(p.id) partidos,
    ht.torneo_id,
    (select nombre from torneo where id_original=ht.torneo_id limit 1) nombreT, 
    (select tipo_torneo from torneo where id_original=ht.torneo_id limit 1) tipo_torneo,
    0 grupo_torneo, 0 id_division, ht.nombre_temporada temporada
    FROM historico p 
    INNER JOIN historicotemporadas ht ON ht.id=p.historicotemporadas_id
    WHERE ((p.local_fm_id='.$e1.' AND p.visitante_fm_id='.$e2.')
    OR (p.local_fm_id='.$e2.' AND p.visitante_fm_id='.$e1.'))
    GROUP BY ht.torneo_id ORDER BY ht.nombre_temporada DESC';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $historico = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    
    foreach ($historico as $key => $value) {

        if ($value['torneo_id']<1){ continue; }
        $resumen['2-'.$value['torneo_id']]=$value;
        $r=enfrentamientosPartidos(2, $value['torneo_id'], $e1, $e2);
        $resumen['2-'.$value['torneo_id']]['partidos']=$r;
    }

    $equipos=array();
    $e=array();

    foreach ($resumen as $key => $v) {
    
    $enfrentamientos[$v['torneo_id']]['nombre']= $v['nombreT'];
    $enfrentamientos[$v['torneo_id']]['id_division']= $v['id_division'];
    $enfrentamientos[$v['torneo_id']]['totalPartidos']=count($v['partidos']); 

    $equipos[$v['torneo_id']][$e1]['vL']=0;
    $equipos[$v['torneo_id']][$e1]['eL']=0;
    $equipos[$v['torneo_id']][$e1]['dL']=0;
    $equipos[$v['torneo_id']][$e1]['vV']=0;
    $equipos[$v['torneo_id']][$e1]['eV']=0;
    $equipos[$v['torneo_id']][$e1]['dV']=0;
    $equipos[$v['torneo_id']][$e1]['gfL']=0;
    $equipos[$v['torneo_id']][$e1]['gcL']=0;
    $equipos[$v['torneo_id']][$e1]['gfV']=0;
    $equipos[$v['torneo_id']][$e1]['gcV']=0;

    $equipos[$v['torneo_id']][$e2]['vL']=0;
    $equipos[$v['torneo_id']][$e2]['eL']=0;
    $equipos[$v['torneo_id']][$e2]['dL']=0;
    $equipos[$v['torneo_id']][$e2]['vV']=0;
    $equipos[$v['torneo_id']][$e2]['eV']=0;
    $equipos[$v['torneo_id']][$e2]['dV']=0;
    $equipos[$v['torneo_id']][$e2]['gfL']=0;
    $equipos[$v['torneo_id']][$e2]['gcL']=0;
    $equipos[$v['torneo_id']][$e2]['gfV']=0;
    $equipos[$v['torneo_id']][$e2]['gcV']=0;

     foreach ($v['partidos'] as $kp => $vp) { 

            if ($vp['enlace_nombre']=='2019' && $vp['fm_arbitro_id']<>1){ 
                $enfrentamientos[$v['torneo_id']]['noJugados'][]=$vp; continue; 
            }

                if ($vp['id_local']==$e1){ //e1 el local
                    $equipos[$v['torneo_id']][$e1]['gfL']=$equipos[$v['torneo_id']][$e1]['gfL']+$vp['goles_local'];
                    $equipos[$v['torneo_id']][$e1]['gcL']=$equipos[$v['torneo_id']][$e1]['gcL']+$vp['goles_visitante'];
                    $equipos[$v['torneo_id']][$e2]['gfV']=$equipos[$v['torneo_id']][$e1]['gcL'];
                    $equipos[$v['torneo_id']][$e2]['gcV']=$equipos[$v['torneo_id']][$e1]['gfL'];

                    if ($vp['goles_local']>$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['vL']++;$equipos[$v['torneo_id']][$e2]['dV']++;
                    }

                    if ($vp['goles_local']==$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['eL']++;$equipos[$v['torneo_id']][$e2]['eV']++;
                    }

                    if ($vp['goles_local']<$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['dL']++;$equipos[$v['torneo_id']][$e2]['vV']++;
                    }

                } else { //e1 es visitante

                    $equipos[$v['torneo_id']][$e2]['gfL']=$equipos[$v['torneo_id']][$e2]['gfL']+$vp['goles_local'];
                    $equipos[$v['torneo_id']][$e2]['gcL']=$equipos[$v['torneo_id']][$e2]['gcL']+$vp['goles_visitante'];
                    $equipos[$v['torneo_id']][$e1]['gfV']=$equipos[$v['torneo_id']][$e2]['gcL'];
                    $equipos[$v['torneo_id']][$e1]['gcV']=$equipos[$v['torneo_id']][$e2]['gfL'];

                    if ($vp['goles_local']>$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['dV']++;$equipos[$v['torneo_id']][$e2]['vL']++;
                    }

                    if ($vp['goles_local']==$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['eV']++;$equipos[$v['torneo_id']][$e2]['eL']++;
                    }

                    if ($vp['goles_local']<$vp['goles_visitante']) { 
                        $equipos[$v['torneo_id']][$e1]['vV']++;$equipos[$v['torneo_id']][$e2]['dL']++;
                    }
                }


        $enfrentamientos[$v['torneo_id']]['estadisticas']=$equipos[$v['torneo_id']];

        $enfrentamientos[$v['torneo_id']]['partidos']=$v['partidos']; 
         } 

     }

     return $enfrentamientos;
}

function actualidad($e1, $e2)
{
    $mysqli = conectar();
    $sql = 'SELECT p.id FROM partido p 
    WHERE (p.equipoLocal_id='.$e1.' AND p.equipoVisitante_id='.$e2.')
    OR (p.equipoLocal_id='.$e2.' AND p.equipoVisitante_id='.$e1.') ORDER BY p.fecha';

    //echo $sql.' ------ 3<br />';

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidosAct = array();
    foreach ($resultado as $key => $value) {
        $partidosAct[] = Xpartido($value['id']);
    }

    return $partidosAct;
}

function enfrentamientosPartidos($bd, $torneo_id, $e1, $e2)
{
    $mysqli = conectar();

 
    if (1 == $bd) {

    
        $consulta = 'SELECT p.idPartido id,p.resulCasa goles_local,
p.clasificado,p.cosas observaciones,
tor.tipo_torneo,p.fm_local_id id_local,p.fm_visitante_id id_visitante,
p.resulFuera goles_visitante, p.jornada, p.fecha,
(select nombre from fase where id=p.jornada) fase,
p.nomCasa local, p.nomFuera visitante,
tor.nombre nombreT, nt.grupo grupo_torneo, nt.idDivision id_division,
p.idTemporada enlace_id,nt.nombreTemporada enlace_nombre,p.youtube_id,p.fm_arbitro_id
FROM nacionalcalendario p 
INNER JOIN nacionaltorneos nt ON nt.idTemporada=p.idTemporada 
INNER JOIN temporada tem ON nt.fm_torneo_id=tem.id
INNER JOIN torneo tor ON tor.id=tem.torneo_id
WHERE nt.fm_torneo_id='.$torneo_id.' AND 
((p.fm_local_id='.$e1.' AND p.fm_visitante_id='.$e2.')
OR (p.fm_local_id='.$e2.' AND p.fm_visitante_id='.$e1.')) ORDER BY p.fecha DESC';
//echo $consulta.'<hr />';
    }

    if ($bd == 2) {
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

    $mysqli = conectar();

    $resultadoSQL = mysqli_query($mysqli, $consulta);

    /*if (!$resultadoSQL) {
    imp($_SERVER['HTTP_REFERER']);
    imp($_SERVER['REQUEST_URI']);
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
    }*/

    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}


//club
function listarPaises()
{
    $consulta = 'SELECT id, nombre FROM pais ORDER BY nombre';
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

function crearCalendarioTemporada($temporada_id){
    $mysqli = conectar();
    $campos = 't.id, t.torneo_id, t.nombre, t.id_original, tor.betsapi, tor.visible,
    tor.nombre nombre_torneo, tor.categoria_torneo_id,
    tor.categoria_id, 
    (SELECT nombre FROM categoria WHERE id=tor.categoria_id) nombre_categoria, 
    tor.pais_id, 
    (SELECT nombre FROM pais WHERE id=tor.pais_id) nombre_pais, 
    tor.comunidad_id,
    (SELECT nombre FROM comunidad WHERE id=tor.comunidad_id) nombre_comunidad,
    (SELECT jornadas FROM liga WHERE id=tor.id) jornadas';
    $tabla = ' temporada t INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $condicion = ' WHERE t.id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);   

    return $resultado; 
}



//inicio

function comunidades()
{
    $campos = 'c.id, c.nombre, c.orden, c.imagen, c.codigoRFEF, c.web_federacion';
    $tabla = ' comunidad c';
    $condicion = ' WHERE id<21 ORDER BY c.id';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}
function catTorneos()
{
    $campos = 'c.id, c.nombre';
    $tabla = ' categoriatorneo c';
    $condicion = ' WHERE orden<21 ORDER BY c.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}
//federacion
function matarTorneoFM($torneo_id)
{
    $mysqli = conectar(); 

    $sq='SELECT id FROM temporada WHERE torneo_id='.$torneo_id;
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $temporada_id=$r['id'];

    $sq = 'DELETE FROM temporada_equipo WHERE temporada_id='.$temporada_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM sancion WHERE temporada_id='.$temporada_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    
    
    $sq = 'DELETE FROM temporada WHERE id='.$temporada_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM liga WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM eliminatorio WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM torneo WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    
    $dir='../../../json/temporada/'.$temporada_id;

    
    if (@file_exists($dir)) { 
        $objects = scandir($dir); 
        foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
                if (is_dir($dir."/".$object)) {
                    $this->rrmdir($dir."/".$object);
                }
                else {
                    unlink($dir."/".$object); 
                }
            }
        }
        rmdir($dir); //modo 0 eliminamos la carpeta        
    }
    
}

function sinJugar($comunidad_id)
{
    $dia = date('Y-m-d');
    //$nuevafecha = strtotime ( '-5 day' , strtotime ( $dia ) ) ;
    //$dia = date ( 'Y-m-j' , $nuevafecha );
    $campos = 'p.id, p.estado_partido,p.hora_prevista, p.fecha, p.jornada, p.temporada_id, ec.nombre local, p.equipoLocal_id, p.equipoVisitante_id, p.goles_local, p.goles_visitante,
    ef.nombre visitante, te.nombre temporada_nombre, p.observaciones, tor.categoria_torneo_id, tor.comunidad_id, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo ';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union.= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union.= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    if ($comunidad_id==100){
        $condicion=' WHERE p.fecha<"'.$dia.'" AND p.estado_partido<>1 AND p.estado_partido<3 AND tor.visible>4 AND  tor.categoria_torneo_id=17';
    } else{
        $condicion = " WHERE p.fecha<'".$dia."' AND p.estado_partido<>1 AND p.estado_partido<3 AND tor.visible>4 AND tor.comunidad_id=".($comunidad_id+1);
    }    
    $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function vinculados($comunidad_id){    
    $consulta = 'SELECT id, fase, competicion, grupo FROM torneo WHERE estado=1 AND comunidad_id='.$comunidad_id;
    $mysqliBase = conectarBASE();
    $resultadoSQL = mysqli_query($mysqliBase, $consulta);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $resultado=array();
    if (!empty($r)){
        foreach ($r as $key => $value) {
            $resultado[$value['grupo']]=$value;
        }

    }
    return $resultado;
}

function torneosFM($comunidad_id)
{
    $consulta = 'SELECT 
    t.id, 
    t.tipo_torneo, 
    t.division_id,
    t.categoria_torneo_id, 
    (select ct.nombre from categoriatorneo ct where ct.id=t.categoria_torneo_id) categoria_torneo,
    t.categoria_id, 
    (select c.nombre from categoria c where c.id=t.categoria_id) categoria, 
    t.comunidad_id, 
    t.nombre, t.traduccion, t.torneoCorto, 
    t.apifutbol, 
    t.apiRFEFcompeticion, 
    t.apiRFEFgrupo, 
    t.orden, t.pais_id, t.usuario, pa.nombre nombrePais,
    te.id temporada_id, te.nombre nombreTemporada,
     (select count(id) from partido where temporada_id=te.id and estado_partido<>1 and fecha<"'.date('Y-m-d').'" and equipoLocal_id>0 and equipoVisitante_id>0) porJugar,
      (select count(id) from partido where temporada_id=te.id and estado_partido=1 and fecha<"'.date('Y-m-d').'" and equipoLocal_id>0 and equipoVisitante_id>0 and codigo_acta=0) sinActa,
       (select count(id) from partido where temporada_id=te.id and estado_partido=1 and fecha<"'.date('Y-m-d').'" and equipoLocal_id>0 and equipoVisitante_id>0 and tipo_partido<>1) sinComp,
     (select count(id) from partido where temporada_id=te.id) partidos, 
    t.visible, 
    (SELECT count(equipo_id) FROM temporada_equipo WHERE temporada_id=te.id) equiposTemporada,
    l.jornadas jornadas, 
    l.jornadaActiva activa, e.fase_activa,
    (select concat_ws(" ,", jornada, fecha) FROM partido where temporada_id=te.id and estado_partido<>1 order by fecha limit 1) proximo
    FROM torneo t 
    LEFT JOIN liga l ON t.id=l.id
    LEFT JOIN pais pa ON pa.id=t.pais_id
    LEFT JOIN eliminatorio e ON t.id=e.id
    LEFT JOIN temporada te ON t.id=te.torneo_id';
    if ($comunidad_id==101){
        $condicion=' WHERE t.categoria_torneo_id=17 ORDER BY t.pais_id, t.division_id, t.orden';
    } else{
        $condicion=' WHERE t.comunidad_id='.($comunidad_id+1).' ORDER BY t.pais_id, t.division_id, t.orden'; 
    }

    $consulta.=$condicion;   
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    

    return $r;
}

//para el asalto
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
    
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    
    return $resultado;
}

function listarPartidos($temporada_id, $jornada, $grupo, $dia=1)
{
    if ($dia==1 || $dia==17) { $dia = date('Y-m-d'); }
    $campos = 'ct.id categoria_id, ct.orden categoria_orden, ct.nombre categoria_nombre,
    tor.id torneo_id, tor.orden torneo_orden, tor.nombre torneo_nombre, tor.division_id,
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

function Xtipo($temporada_id)
{
    
    $mysqli = conectar();
    $campos = 't.torneo_id,
    tor.tipo_torneo, 
    tor.nombre, 
    tor.division_id, 
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
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $torneo = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    //imp($torneo);
    //imp($torneo['jornadaActiva']);

    $equipos = Xequipos_temporada($temporada_id);
    $partidos = Xpartidos($temporada_id, 0);
        
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
    
    $fichajes = XfichajesTorneo($temporada_id);
    
    
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

        $clasificacion = XgenerarClasificacion($clas);
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
        
    $carpeta = '../../../json/temporada/'.$temporada_id;
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    
    guardarJSON($resultado, $carpeta.'/tipo.json');
    echo 'Generada temporada '.$temporada_id.'<br />';
    if (file_exists($carpeta.'/partidosActiva.json')) {
        unlink($carpeta.'/partidosActiva.json');
    }

    return $resultado;
   // echo "Creado el fichero ".$carpeta.'/tipo.json<br />'; 
}


function Xequipos_temporada($temporada_id)
    {
        $mysqli = conectar();
        $campos = 'te.equipo_id, te.grupo, e.nombre, e.nombreCorto, e.estadio_id, e.betsapi, e.club_id, e.equipacion_id, e.slug, e.federacion_id, l.id localidad_id, p.id provincia_id, c.id comunidad_id,
    l.nombre localidad, p.nombre provincia, c.nombre comunidad, cl.pais_id, cl.es_seleccion,
    (SELECT count(id) FROM partido WHERE equipoLocal_id=te.equipo_id AND temporada_id='.$temporada_id.') pL, 
    (SELECT count(id) FROM partido WHERE equipoVisitante_id=te.equipo_id AND temporada_id='.$temporada_id.') pV';
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
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        

        return $resultado;
    }

function XfichajesTorneo($temporada_id)
    {
        $mysqli = conectar();
        $campos = 'j.id, j.nombre, j.apodo, j.es_fichaje, j.es_baja, j.posicion, j.fecha_nacimiento, 
    j.slug, j.equipoActual_id, ea.nombre equipo, ea.club_id';
        $tabla = ' jugador j';
        $union = ' INNER JOIN equipo ea ON j.equipoActual_id=ea.id';
        $union2 = ' INNER JOIN temporada_equipo te ON j.equipoActual_id=te.equipo_id';
        $condicion = ' WHERE j.es_fichaje>0 AND te.temporada_id='.$temporada_id.' ORDER BY ea.nombre,j.posicion';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$condicion;
        //echo $consulta;

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }



//********************Generar clasificacion*********************************
function Xsancion($temporada_id)
{
    $campos = 's.equipo_id, s.puntos, s.jugados, s.ganados, s.empatados, s.perdidos, s.gFavor, s.gContra';
    $tabla = ' sancion s';
    $condicion = ' WHERE s.temporada_id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

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
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function XgenerarClasificacion($clas)
{    
$temporada_id=$clas['temporada_id'];
$jornada=$clas['jornada'];
$grupo_id=$clas['grupo_id'];
$equipo_id=$clas['equipo_id'];
$tipoClasificacion=$clas['tipoClasificacion'];
$torneo_id=$clas['torneo_id'];
$jornadas=$clas['jornadas'];
$puntosPorganar=$clas['puntosPorganar'];

$jornada=abs($jornada);

$cuentaPartidos=0; $tp=1000;
$segundavuelta=($jornadas/2);

    $sanciones = array();
    $colores = array();

    $jornada_inicio = 1;
    if (0 == $jornada) { $jornada = 48; }
    $jornada_fin = $jornada;
    //if (0 == $jornada_fin) { $jornada_fin = 48; }

    
    $partidos = Xpartidos($temporada_id, 0);
    $sanciones = Xsancion($temporada_id);
    $colores = Xcolores($temporada_id, $grupo_id);
    

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
                         'estado_partido' => 0, );

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

    include '../includes/clasificacion/calculoDePuntos.php';

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



    if (0 == $tipoClasificacion && $jornada>$segundavuelta) {
        include '../includes/clasificacion/averageParticular.php';
    }  

    
    if (isset($segundoEmpate)){
        foreach ($segundoEmpate as $empatadosOtra) {
            if (count($empatadosOtra)>2){
                unset($empatadosPuntos);
                foreach ($empatadosOtra as $key => $clasifi2) {//encontramos puntos repetidos
                    $empatadosPuntos[$clasifi2['puntos']][] = $clasifi2['equipo_id'];
                } 
                include '../includes/clasificacion/averageParticular.php';                
            }
        }
    }

    

    include '../includes/clasificacion/pintaryleyenda.php';

    //imp($resultado);

    return $resultado;
}

//********************Generar clasificacion para grupos*********************************

function X2generarClasificacion($temporada_id, $tipo_torneo, $jornada, $grupo_id)
{
    

    $partidos = Xpartidos($temporada_id, $jornada, $grupo_id);
    

    $datos = Xtipo($temporada_id);
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
    $sanciones = Xsancion($temporada_id);
    //imp($directos);
    
    $colores = Xcolores($temporada_id, $grupo_id);


    $puntosPorganar = 3;
    $puntosPorempatar = 1;
    $puntosPorperder = 0;

    $clasificacion = array();
    $encuentros[0] = array('equipoLocal_id' => 0,
                         'equipoVisitante_id' => 0,
                         'goles_local' => 0,
                         'goles_visitante' => 0,
                         'estado_partido' => 0, );
    $nueva_clasificacion = array();

    include '../includes/clasificacion/_clasiTipo2.php';

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

    include '../includes/clasificacion/_clasiEmpate.php';

    /****************************PINTANDO CLASIFICACION*********************************************************/

    
        $coloresClasifica = array();
        foreach ($colores as $color) {
            $coloresClasifica[$color['posicion']] = $color;
        }

    $clasificacionFinal = array();
    $coloresLeyenda = array();$posicion=0;
    foreach ($clasificacion as $key => $clasifica) {
        $posicion ++;
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
            $mysqli = conectar();
            $sql = "UPDATE torneo SET discr='".$porJornada['total']['promedio'].','.$porJornada['total']['goles'].','.$porJornada['total']['partidos']."' WHERE id=".$torneo_id;
            $resultadoSQL = mysqli_query($mysqli, $sql);
            clasPromedioGoles($categoria_torneo_id);
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

/////////////////////

function insertarMovimiento($partido) {

$codigo_acta=$partido['codigo_acta']??0;

$sql='INSERT INTO movimiento(
partido_id, 
estado_partido, 
temporada_id, 
fecha, 
hora_prevista,
hora_real, 
comentario, 
goles_local, 
goles_visitante, 
evento, 
equipoLocal_id, 
local, 
equipoVisitante_id, 
visitante, codigo_acta) VALUES ("'.$partido['partido_id'].'","'.$partido['estado_partido'].'","'.$partido['temporada_id'].'","'.$partido['fecha'].'","'.$partido['hora_prevista'].'","'.$partido['hora_real'].'","'.$partido['comentario'].'","'.$partido['goles_local'].'","'.$partido['goles_visitante'].'","'.$partido['evento'].'","'.$partido['equipoLocal_id'].'","'.$partido['local'].'","'.$partido['equipoVisitante_id'].'","'.$partido['visitante'].'","'.$codigo_acta.'")';
    $mysqli = conectar();

        echo $sql."<br />";
    
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli)); 
            echo $sql.'<br />';           
        } else {
            echo "Movimiento insertado correctamente. Evento: ".$partido['evento']."<br />";
        }
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
    $orden = ' ORDER BY g.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$orden;

    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}



//insertar partido Betsapi
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
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);    

    return $resultado;
}

function Xfases_grupos($temporada_id, $eliminatoria_id)
{
    $campos = 't.id, g.id grupo_id, g.nombre, g.orden, (SELECT count(p.id) FROM partido p WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$eliminatoria_id.' AND p.grupo_id=g.id) partidos ';
    $tabla = ' temporada t';
    $union = ' INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $union2 = ' INNER JOIN grupofasetorneo gft ON tor.id=gft.torneo_id';
    $union3 = ' INNER JOIN grupo g ON g.id=gft.grupo_id';
    $condicion = ' WHERE t.id='.$temporada_id.' AND gft.fase_id='.$eliminatoria_id;
    $orden = ' ORDER BY g.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}

function buscarEquipoBetsapi($id){
    $sql='SELECT nombreCorto, id FROM equipo WHERE betsapi='.$id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
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

function vincularPartido($partido_id, $partido_api) {
        
        $mysqli = conectar();
        $consulta = 'UPDATE partido SET betsapi='.$partido_api.' WHERE id='.$partido_id;
        $resultadoSQL = mysqli_query($mysqli, $consulta); //actualizamos la tabla partido
 }

//fin insertar partido Betsapi


//directos
 function extraerApi($id)
{
    $consulta = 'SELECT betsapi, apifutbol FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$id.')';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

//agenda
function partidosCat($mes,$ano)
{
    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union2 = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union3 = ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>4 AND tor.visible<70 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'"';

    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $partidos=array();

    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    return $partidos;
}

function partidosCat2($mes,$ano)
{
    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>69 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'"';
    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidos=array();
    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    $partidosT[0]=$partidos;

    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>69 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'" AND p.hora_prevista="00:00:11" AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 ';
    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidos=array();
    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    $partidosT[1]=$partidos;

    return $partidosT;
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
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

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
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

//fin de agenda

//para crear calendario
function obtenerPartidosLiga($temporada_id)
{
    $campos = 'p.id, p.jornada, p.equipoLocal_id, p.equipoVisitante_id, p.combinacionLocal, p.combinacionVisitante';
    $tabla = ' partido p';
    $condicion = ' WHERE p.temporada_id='.$temporada_id;
    $orden = ' ORDER BY p.jornada, p.combinacionLocal, p.combinacionVisitante';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    return $resultado;
}
function obtenerCalendario($temporada_id)
{
$campos = "p.id, p.fecha, ec.nombre local, ef.nombre visitante, ec.federacion_id fedLocal, ef.federacion_id fedVisitante,
          p.hora_prevista, p.jornada,p.goles_local, p.goles_visitante, p.grupo_id,
          p.partidoAPI, p.equipoLocal_id,p.equipoVisitante_id, p.estado_partido, p.comentario, p.codigo_acta";
            $tabla = ' partido p';
            $condicion = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id
            INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id
            WHERE p.temporada_id='.$temporada_id.' ORDER BY p.jornada, p.fecha, p.hora_prevista';
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
            $consultaB = $consulta;
            //echo $consulta;
            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
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
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function obsGoleadores2($goleadores){
    $goles_l="*A "; $goles_v="*B "; $gl=0;$gv=0;
    foreach ($goleadores as $g => $gol) {
        imp($gol);
        $mn=substr($gol['minuto'],1);
        if ($gol['minuto']<200){  
            if ((int)$mn>45){ $mn="45+".($mn-45); }          
        } else {
            if ((int)$mn>90){ $mn="90+".($mn-90); }
        }

        $txtTipo="";$golLocal=(int)$gol['esLocal'];
        if ((int)$gol['tipo']==1){ $txtTipo=" (pen.)"; }
        if ((int)$gol['tipo']==10){ 
            $txtTipo=" (p.p.)"; 
            if ((int)$gol['esLocal']==1) {$golLocal=0; }
            if ((int)$gol['esLocal']==0) {$golLocal=1; }
        }

        if ((int)$golLocal==1) {
            $gl++;
            $marcadorL="<b>".$gl."</b>-".$gv;
            $goles_l.=$mn."´ - ";
            $goles_l.="<a href='/jugador.php?id=".$gol['jugador_id']."' target='_blank'>".$gol['nombreJugador']."</a>".$txtTipo.", ";
            $goles_l.=$marcadorL.'<br />';   
        } else {
            $gv++;            
            $marcadorV=$gl."-<b>".$gv."</b>";
            $goles_v.=$marcadorV.', ';
            $goles_v.="<a href='/jugador.php?id=".$gol['jugador_id']."' target='_blank'>".$gol['nombreJugador']."</a>".$txtTipo." - ";
            $goles_v.=$mn."´<br />";
        }
    }
    $cosas=$goles_l.$goles_v;
    return $cosas;
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

function XequipoPartidos($equipo_id)
{
    $campos = 'p.id,    p.temporada_id, p.estado_partido, p.jornada,
    fa.nombre fase, p.grupo_id, gr.nombre, p.partidoAPI, 
    p.fecha, p.hora_prevista, p.hora_real, p.clasificado, 
    p.goles_local, p.goles_visitante,
    ec.nombre local,ec.nombreCorto localCorto,ec.slug localSlug,
    p.equipoLocal_id,
    p.apuesta apuesta_partido,
    ef.nombre visitante, ef.nombreCorto visitanteCorto,ef.slug visitanteSlug,
    p.equipoVisitante_id, p.observaciones,p.acta,
    tor.tipo_torneo, tor.visible, tor.apuesta apuesta_torneo,
    tor.nombre nombreTorneo,
    co.id idComunidad, 
    (SELECT count(partido_id) FROM gol WHERE partido_id=p.id) goles';

    $campos .= ', (SELECT count(partido_id) FROM partido_medio WHERE partido_id=p.id) tv, p.estadio, p.youtube_id';

    $tabla = 'partido p';

    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' LEFT JOIN grupo gr ON p.grupo_id=gr.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $condicion = ' WHERE (tor.visible>3) AND (p.equipoLocal_id='.$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.')';
    $orden = ' ORDER BY p.fecha DESC';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado) > 0) {
        $pj = array();
        foreach ($resultado as $fila) {
            //if ($fila['temporada_id']==442) { continue; } //amistosos
            if (1 != $fila['estado_partido']) {
                continue;
            } //tiene que estar jugado
            $pj[$fila['temporada_id']]['id'] = $fila['temporada_id'];
            $pj[$fila['temporada_id']]['nombreTorneo'] = $fila['nombreTorneo'];
            $pj[$fila['temporada_id']]['tipo_torneo'] = $fila['tipo_torneo'];
            if (!isset($pj[$fila['temporada_id']]['galocal'])) {
                $pj[$fila['temporada_id']]['galocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gavisitante'])) {
                $pj[$fila['temporada_id']]['gavisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['emlocal'])) {
                $pj[$fila['temporada_id']]['emlocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['emvisitante'])) {
                $pj[$fila['temporada_id']]['emvisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['pelocal'])) {
                $pj[$fila['temporada_id']]['pelocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['pevisitante'])) {
                $pj[$fila['temporada_id']]['pevisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gflocal'])) {
                $pj[$fila['temporada_id']]['gflocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gclocal'])) {
                $pj[$fila['temporada_id']]['gclocal'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gfvisitante'])) {
                $pj[$fila['temporada_id']]['gfvisitante'] = 0;
            }
            if (!isset($pj[$fila['temporada_id']]['gcvisitante'])) {
                $pj[$fila['temporada_id']]['gcvisitante'] = 0;
            }
            if ($fila['goles_local'] == $fila['goles_visitante']) {
                if ($equipo_id == $fila['equipoLocal_id']) {
                    $pj[$fila['temporada_id']]['emlocal'] = $pj[$fila['temporada_id']]['emlocal'] + 1;
                    $pj[$fila['temporada_id']]['gflocal'] = $pj[$fila['temporada_id']]['gflocal'] + $fila['goles_local'];
                    $pj[$fila['temporada_id']]['gclocal'] = $pj[$fila['temporada_id']]['gclocal'] + $fila['goles_visitante'];
                } else {
                    $pj[$fila['temporada_id']]['emvisitante'] = $pj[$fila['temporada_id']]['emvisitante'] + 1;
                    $pj[$fila['temporada_id']]['gfvisitante'] = $pj[$fila['temporada_id']]['gfvisitante'] + $fila['goles_visitante'];
                    $pj[$fila['temporada_id']]['gcvisitante'] = $pj[$fila['temporada_id']]['gcvisitante'] + $fila['goles_local'];
                }
            } elseif ($equipo_id == $fila['equipoLocal_id']) {
                $pj[$fila['temporada_id']]['gflocal'] = $pj[$fila['temporada_id']]['gflocal'] + $fila['goles_local'];
                $pj[$fila['temporada_id']]['gclocal'] = $pj[$fila['temporada_id']]['gclocal'] + $fila['goles_visitante'];
                if ($fila['goles_local'] > $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['galocal'] = $pj[$fila['temporada_id']]['galocal'] + 1;
                }
                if ($fila['goles_local'] < $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['pelocal'] = $pj[$fila['temporada_id']]['pelocal'] + 1;
                }
            } else {
                $pj[$fila['temporada_id']]['gfvisitante'] = $pj[$fila['temporada_id']]['gfvisitante'] + $fila['goles_visitante'];
                $pj[$fila['temporada_id']]['gcvisitante'] = $pj[$fila['temporada_id']]['gcvisitante'] + $fila['goles_local'];
                if ($fila['goles_visitante'] > $fila['goles_local']) {
                    $pj[$fila['temporada_id']]['gavisitante'] = $pj[$fila['temporada_id']]['gavisitante'] + 1;
                }
                if ($fila['goles_local'] > $fila['goles_visitante']) {
                    $pj[$fila['temporada_id']]['pevisitante'] = $pj[$fila['temporada_id']]['pevisitante'] + 1;
                }
            }
        }

        $ordenTorneo = [];
        foreach ($pj as $key => $ordeno) {
            $ordenTorneo[$key] = $ordeno['id'];
        }

        array_multisort($ordenTorneo, SORT_ASC, SORT_NUMERIC, $pj);

//        $partidos = array();

        $partidos = array('partidos' => $resultado, 'estadisticas' => $pj);

        return $partidos;
        exit;
    }
}