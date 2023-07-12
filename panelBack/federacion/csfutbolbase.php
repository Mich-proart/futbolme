<?php
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
        $condicion=' WHERE t.comunidad_id='.$comunidad_id.' ORDER BY t.pais_id, t.division_id, t.orden'; 
    }

    $consulta.=$condicion;   
    $mysqli = conectarFM();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function torneos($comunidad_id)
{
    $consulta = 'SELECT t.id, t.categoria, t.nombre, t.grupo, t.competicion_id, t.grupo_id, t.rondas, t.jornadas, t.estado, t.temporada_id, t.equipos
     FROM torneo t WHERE t.comunidad_id='.$comunidad_id.' ORDER BY t.estado DESC, t.orden';    
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function calendario($temporada_id,$valor=0)
{
    $consulta = 'SELECT id, nombre_jornada, jornada, equipoLocal_id, equipoVisitante_id, local, visitante, goles_local, goles_visitante, estado_partido FROM partido p WHERE temporada_id='.$temporada_id; 
    if ($valor>0){
        if ($valor<50) {
            $consulta.=' AND jornada='.$valor;
        } else {
            $consulta.=' AND (equipoLocal_id='.$valor.' OR equipoVisitante_id='.$valor.')';
        }
        
    } 
    $consulta.=' ORDER BY jornada,fecha,hora_prevista';  
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function calendarioFM($temporada_id,$valor=0)
{
    $consulta = 'SELECT id, jornada, equipoLocal_id, equipoVisitante_id, (select nombre from equipo where id=equipoLocal_id) local, (select nombre from equipo e where id=equipoVisitante_id) visitante, fecha, hora_prevista, goles_local, goles_visitante, estado_partido FROM partido p WHERE temporada_id='.$temporada_id.' AND equipoLocal_id>0 AND equipoVisitante_id>0'; 
    if ($valor>0){
        if ($valor<50) {
            $consulta.=' AND jornada='.$valor;
        } else {
            $consulta.=' AND (equipoLocal_id='.$valor.' OR equipoVisitante_id='.$valor.')';
        }
        
    } 
    $consulta.=' ORDER BY jornada,fecha,hora_prevista';  
    $mysqliFM = conectarFM();
    $resultadoSQL = mysqli_query($mysqliFM, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}



?>