<?php 
set_time_limit(0);
$static_v = 3; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
require_once('funcionesCargador.php');
$tiempo_inicio = microtime_float();

$fecha=date('Y-m-d');
$tipo_torneo=1;
$categoria_torneo_id=1;
$fechaB = date('Y-m-d H:i:s');
//$fecha='2019-08-31';

$h='';
$partidos = partidosTodos($fecha);

$fechaSis = date('Y-m-d H:i:s');
$fechaSis = date_create($fechaSis); //hora actual



echo 'Partidos a actualizar: '.count($partidos).'<br />';


$message='Partidos a actualizar: '.count($partidos)."\r\n";

$sinFinalizar=array();
foreach ($partidos as $key=> $partido) { 
	$temporada_id=$partido['temporada_id'];
	$jornada=$partido['jornada'];
	$comunidad_id=($partido['comunidad_id']-1);
	$competicion_id=$partido['apiRFEFcompeticion'];
	$grupo_id=$partido['apiRFEFgrupo'];
	$fase=$partido['apifutbol'];
	$partido['hora_real']=$partido['hora_real']??'00:00:00';
	$comentarios=$partido['comentario']??'';
	$clasificado=$partido['clasificado']??0;
	$partido['betsapi']=$partido['betsapi']??0;
	$parte=0;$minutos=0;
	$pagina='';$colorL='black';$colorV='black';
	$fondocolorL="white";$fondocolorV="white";

	
		$sinFinalizar[$partido['temporada_id']][$partido['jornada']]['temporada_nombre']=$partido['temporada_nombre']; 
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['temporada_id']=$partido['temporada_id']; 
	    $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apifutbol']=$partido['apifutbol']; 
	    $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apiRFEFcompeticion']=$partido['apiRFEFcompeticion']; 
	    $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apiRFEFgrupo']=$partido['apiRFEFgrupo']; 
	    $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['comunidad_id']=$partido['comunidad_id'];
	    $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['partidos'][]=$partido;    
		
    $h = $partido['hora_prevista'];    
}

echo 'Torneos a actualizar: '.count($sinFinalizar).'<br />';
$message.='Torneos a actualizar: '.count($sinFinalizar)."\r\n";



foreach ($sinFinalizar as $torneos) {
	foreach ($torneos as $key => $torneo) {
        $temporada_id=$torneo['temporada_id'];
    	$competicion_id=$torneo['apiRFEFcompeticion'];
    	$grupo_id=$torneo['apiRFEFgrupo'];
    	$jornadaActiva=$key;
    	$fase=$torneo['apifutbol'];
        $comunidad_id=($torneo['comunidad_id']-1);
        $texto='<hr />'.$torneo['temporada_nombre'].' - Jornada '.$key.'<br />';
        echo '<hr />'.$torneo['temporada_nombre'].' - Jornada '.$key.'<br />';
        
        $message.='<hr />'.$torneo['temporada_nombre'].' - Jornada '.$key."\r\n";
        foreach ($torneo['partidos'] as $kp => $vp) {
            echo $vp['fecha'].' <b>'.$vp['hora_prevista'].'</b> '.$vp['local'].' - '.$vp['visitante'].'<br />';
            $message.=$vp['fecha'].' <b>'.$vp['hora_prevista'].'</b> '.$vp['local'].' - '.$vp['visitante'].$key."\r\n";

        }
	   
        $fechasDat=$torneo['partidos']; 	
        $partidosJson=array();

        $pag="repasador";
        

        include('actualizador.php');
    

    unset($texto);
    unset($proxis);
    unset($partidos);
    unset($fechasDat);
    unset($partidosJson); 

  } //torneo (por las posibles jornadas)

  

} //torneos

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);

    
        /*$from = "futbolme@futbolme.com";
        $to = "futbolme@gmail.com";
        $subject = "Repasador 2 realizado ".$fechaB.' Tiempo empleado: '.($tiempo_fin-$tiempo_inicio);
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);*/
    
echo '<br />Correo enviado a las '.$fechaB;


ob_flush();
flush();

function partidosTodos($fecha)
{
    $campos = 'p.id partido_id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id,
    p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones, p.codigo_acta, 
    p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi,ec.federacion_id fed_l,ef.federacion_id fed_v, 
    p.hora_prevista, ec.nombre local, ef.nombre visitante, p.jornada,
    te.nombre temporada_nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union .= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE p.fecha<"'.$fecha.'" AND p.estado_partido=0 AND tor.visible>3 AND tor.apiRFEFcompeticion>0 AND tor.apiRFEFgrupo>0 AND tor.comunidad_id<>5 AND tor.comunidad_id<>13';

    $orden = ' ORDER BY p.hora_prevista DESC,ct.orden, tor.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}



?>
