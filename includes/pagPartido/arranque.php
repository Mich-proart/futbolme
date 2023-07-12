<?php
//imp($_GET);
if (isset($_GET['bd']) && $_GET['bd']=='H'){
	header('Location:/historico/copa/index.php?partido_id='.$_GET['id']);
	die;
}
$partido = Xpartido($partido_id);

/*if ($_SESSION['username']=='usuario-1gk61'){
	imp($partido['twitter_local'].' OR '.$partido['twitter_visitante']);
}*/

if (is_null($partido)){
	header('Location:/historico/2018-19/index.php?modo=p&id='.$_GET['id']);
	die;
}
$apuesta_torneo = $partido['apuesta_torneo'];
$betsapi = $partido['betsapi'];
$apifootball = $partido['partidoAPI'];
$e1 = $partido['equipoLocal_id'];
$e2 = $partido['equipoVisitante_id'];
$et1 = $partido['local'];
$et2 = $partido['visitante'];
$seleccion = $partido['es_seleccion'];
$temporada_id = $partido['temporada_id']; 
$liga_local = $partido['liga_local'];
$liga_visitante = $partido['liga_visitante']; 
$liga_local=$liga_local??0;
$liga_visitante=$liga_visitante??0;

$tipo_eliminatoria=0;
if (2 == $partido['tipo_torneo']) {
    $tipoJornada=tipoJornada($partido['jornada']);
    $tipo_eliminatoria=$tipoJornada[0];
}

$equiposTw = array();
$equiposTw[0]['id'] = $e1;
$equiposTw[0]['equipo'] = $et1;
$equiposTw[0]['idPais'] = $partido['paisLocal_id'];
$equiposTw[0]['twitter'] = $partido['twitter_local'];
$equiposTw[0]['club_id'] = $partido['club_id_local']??NULL;

$equiposTw[1]['id'] = $e2;
$equiposTw[1]['equipo'] = $et2;
$equiposTw[1]['idPais'] = $partido['paisVisitante_id'];
$equiposTw[1]['twitter'] = $partido['twitter_visitante'];
$equiposTw[1]['club_id'] = $partido['club_id_visitante']??NULL;

if (1 == $partido['es_seleccion']) { 
    $escudoLocal="/img/paises/banderas/ban".$partido['paisLocal_id'].".png";
    $escudoVisitante="/img/paises/banderas/ban".$partido['paisVisitante_id'].".png";
} else {
$escudoLocal=rutaEscudo($partido['club_id_local'],$partido['equipoLocal_id']);
$escudoVisitante=rutaEscudo($partido['club_id_visitante'],$partido['equipoVisitante_id']);
}

/*if ($partido['id']==69684) {
$partido['estadio_imagen']=433;
$partido['estadioNombre']='NOU CAMP';
$partido['localidad']='Barcelona';
}*/

$texto_color='white';
if ($partido['estado_partido']<2){$fondo_color='black';} else {$fondo_color='red';}

$torneoSlug=poner_guion($partido['nombreTemporada']??'xxx');
$pgEnlace="/resultados-directo/torneo/".$torneoSlug."/".$partido['temporada_id']."/".$partido['jornada'];

$horaPrevista = DateTime::createFromFormat('H:i:s', $partido['hora_prevista']);
$horaActual = date('Y-m-j H:m:s');

$partido['betsapi']=$partido['betsapi']??0;
$comentarios=$partido['comentario']??'';
$partido['hora_real']=$partido['hora_real']??'00:00:00';
$parte=0; $minutos=0;
$fecha1 = date('Y-m-d H:i:s');
$fecha1 = date_create($fecha1); //hora actual
$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
$fecha2 = date_create($fecha2); // hora comienzo real
if ($partido['id']==257896){ $partido['hora_prevista']="15:22:00";}
$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
$fecha3 = date_create($fecha3); //hora prevista
$dPartido = date_diff($fecha3, $fecha1);
$diasP = $dPartido->d;
$horasP = $dPartido->h;
$minutosP = $dPartido->i;
$segundosP = $dPartido->s;
$invertidoP = $dPartido->invert;
$txth = $horasP.' horas';
$txtm = $minutosP.' minutos';
$partiTv=partidosMedios($partido_id);


if (0 == $invertidoP) { 
	if ($horasP<3 && $diasP==0){ $tiempoAcorrer=120; }                                      
        $textoTv='Televisado en estos momentos por: ';
} else { 
    if (0 == $diasP) {
        if (1 == $horasP) {$txth = $horasP.' hora';}
        if (0 == $horasP) {$txth = '';}
        if ($horasP > 0 && $minutosP > 0) { $txth .= ' y ';}
        if (1 == $minutosP) {$txtm = $minutosP.' minuto';}
        if (0 == $minutosP) {$txtm = '';}
        $textoTv='Televisado en '.$txth.$txtm.' por: ';
    }
}

$rachas=array();

if ($liga_local>0) {

	$f = './json/temporada/'.$liga_local.'/tipo.json';
	$json = file_get_contents($f);
	$datos = json_decode($json, true);	
	if (isset($datos['clasificacion'])){
		$clasificacion=$datos['clasificacion']['clasificacionFinal'];
		foreach ($clasificacion as $key => $value) {
			if($value['equipo_id']==$e1){ $e1Clas=$value; break; }
		}
		$racha = Xracha($liga_local, $e1);
		$rachas[$e1]=$racha[$e1];unset($racha);
		$rachas[$e1]['equipo']=$et1;
	}
    //imp($e1Clas);   
    
} 
if ($liga_visitante>0) {
    $f = './json/temporada/'.$liga_visitante.'/tipo.json';
	$json = file_get_contents($f);
	$datos = json_decode($json, true);
	if (isset($datos['clasificacion'])){	
		$clasificacion=$datos['clasificacion']['clasificacionFinal'];
		foreach ($clasificacion as $key => $value) {
			if($value['equipo_id']==$e2){ $e2Clas=$value; break; }
		}
	}
	$racha = Xracha($liga_visitante, $e2);
    $rachas[$e2]=$racha[$e2];unset($racha);
	$rachas[$e2]['equipo']=$et2;
}



if (!isset($partido)) {
//imp($_GET);
header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
die('no encontramos este partido');
}


?>
