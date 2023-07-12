<?php 
set_time_limit(0);

define('_FUTBOLME_', 1);
$static_v=1;
require_once '../../../src/consultas.php';
require_once '../../../src/funciones.php';


?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php

$grupo_llegada=$_GET['g'];
$categoria=$_GET['cat']; 
$territorial=$_GET['t'];
$comunidad_id=$_GET['cm'];


switch ($categoria) {
	case 'SENIOR':$cti=4; $ci=1;break;
	case 'JUVENILES':$cti=5; $ci=3;break;
	case 'CADETES':$cti=6; $ci=4;break;
	case 'INFANTILES':$cti=14; $ci=21;break;
	case 'ALEVINES':$cti=15; $ci=23;break;
	case 'FEMENINO';$cti=7;$ci=2;break;
	case 'FEMENINO JUVENIL';$cti=7;$ci=26;break;
	case 'FEMENINO CADETE';$cti=7;$ci=27;break;
	case 'FEMENINO INFANTIL';$cti=7;$ci=28;break;
	case 'FEMENINO ALEVIN';$cti=7;$ci=30;break;
}

$mysqli = conectar();

if ($grupo_llegada==0){
	$sq='SELECT id, orden, nombre, grupo, competicion_id, grupo_id, jornadas FROM torneo WHERE 
competicion_id='.$competicion_id.' AND comunidad_id='.$comunidad_id.' ORDER BY id';
} else {
	$sq='SELECT id, orden, nombre, grupo, competicion_id, grupo_id, jornadas FROM torneo WHERE 
grupo_id='.$grupo_llegada.' AND comunidad_id='.$comunidad_id.' ORDER BY id';
}

$mysqliFB = conectarFB();
$resultadoSQL = mysqli_query($mysqliFB, $sq);
$torneos_a_crear = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


$contador=0;

foreach ($torneos_a_crear as $key => $value) {	

	$n=$value['nombre'].' - '.$value['grupo'];
	$n=str_replace('GRUPO', 'Grupo', $n);
	$grupo_id=$value['grupo_id'];
	$idTorneoFB=$value['id'];
	$ordenFB=$value['orden'];

	
	$contador++;

		$sql='INSERT INTO torneo
	(categoria_torneo_id, categoria_id, pais_id, comunidad_id, apiRFEFcompeticion, apiRFEFgrupo, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, sexo, discr, desarrollo, inicio)
	VALUES
	("'.$cti.'","'.$ci.'","60","'.($comunidad_id+1).'","'.$value['competicion_id'].'","'.$value['grupo_id'].'","'.$n.'","'.$n.'","'.$n.'","'.($ordenFB+($comunidad_id+1000)).'","'.($comunidad_id+100).'","1","0","","0","'.date('Y-m-d').'");'; 
	echo $sql.'<br />'; 
	mysqli_query($mysqli, $sql);
	$torneo_id=mysqli_insert_id($mysqli);
	    

	$sql='INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ("'.$torneo_id.'", "'.$value['jornadas'].'", 1, 0, 3);';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';


	$sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$torneo_id.'", "'.$n.'", "'.$torneo_id.'");';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';
	$temporada_id=mysqli_insert_id($mysqli);






	$file = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-jornadas.json';

	$json = file_get_contents($file);
	$partidos = json_decode($json, true);

	$equiposTorneo=array();
	$pdos=0; $jornadaActiva=1;
	$uFecha='2018-09-01';

	foreach ($partidos as $k1 => $jornada) {

			foreach ($jornada as $k => $v) {

				echo $v['jornada'].' - '.$v['fecha'].' - '.$v['hora_prevista'].' <b>'.$v['goles_local'].'-'.$v['goles_visitante'].'</b> -- <font style="color:green">'.$v['local'].' - '.$v['visitante'].'</font><br />';

					$fecha_actual = strtotime(date("Y-m-d H:i:00",time()));
					$fecha_entrada = strtotime($v['fecha'].' '.$v['hora_prevista']);
					$fecha=$v['fecha'];
					$hora=$v['hora_prevista'];
						
					if($fecha_actual < $fecha_entrada && $jornadaActiva==1){
						$jornadaActiva=$k1;
					}

					if ($hora=='00:00:00') { $hora='00:00:11'; }
			
					$sinequipo=0;
			
					if (!empty($v['equipoLocal_id']) && !empty($v['equipoVisitante_id'])) {
						$sq='SELECT e.id,e.nombre FROM equipo e 
						INNER JOIN club c ON e.club_id=c.id
						WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$v['equipoLocal_id'];
						//echo $sq.'<br />';
						$resultadoSQL = mysqli_query($mysqli, $sq);
				    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				    	if (count($r)==0){
				    		$equiposGrabar[$v['equipoLocal_id']]=$v['local'];
				    		$sinequipo=1;
				    	}
				    	$equipoLocal_id=$r['id'];$local=$r['nombre'];
				    	$equiposTorneo[$v['equipoLocal_id']]['nombre']=$v['local'];
				    	$equiposTorneo[$v['equipoLocal_id']]['id']=$equipoLocal_id;
				    	
				    	$sq='SELECT e.id,e.nombre FROM equipo e 
						INNER JOIN club c ON e.club_id=c.id
						WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$v['equipoVisitante_id'];
						//echo $sq.'<br />';
						$resultadoSQL = mysqli_query($mysqli, $sq);
				    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				    	if (count($r)==0){
				    		$equiposGrabar[$v['equipoVisitante_id']]=$v['visitante'];
				    		$sinequipo=1;
				    	}
				    	$equipoVisitante_id=$r['id'];$visitante=$r['nombre'];
				    	$equiposTorneo[$v['equipoVisitante_id']]['nombre']=$v['visitante'];
				    	$equiposTorneo[$v['equipoVisitante_id']]['id']=$equipoVisitante_id;
				    	//imp($v['fecha']);
				    	if ($sinequipo==0){
				    		if (strlen($v['hora_prevista'])>8){				    			
				    			$fecha=$uFecha; $hora='00:00:11';
				    		}
							$consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id)
						    VALUES 
						    ('.$temporada_id.','.$v['estado_partido'].','.$v['goles_local'].','.$v['goles_visitante'].', "'.$fecha.'", "'.$hora.'",'.$k1.', '.$equipoLocal_id.', '.$equipoVisitante_id.');';
						    	echo $consulta.'<br />';$pdos++;
						    	mysqli_query($mysqli, $consulta);
						    
						}
				    } else {

				    	if (empty($v['equipoLocal_id'])) {
				    		$sq='SELECT e.id,e.nombre FROM equipo e 
							INNER JOIN club c ON e.club_id=c.id
							WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$v['equipoVisitante_id'];
							//echo $sq.'<br />';
							$resultadoSQL = mysqli_query($mysqli, $sq);
					    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					    	if (count($r)==0){
					    		$equiposGrabar[$v['equipoVisitante_id']]=$v['visitante'];
					    		$sinequipo=1;
					    	}
					    	$equipoVisitante_id=$r['id'];$visitante=$r['nombre'];
							if ($sinequipo==0){
							$fecha=$uFecha; $hora='00:00:11';	
							$consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoVisitante_id)
						    VALUES 
						    ('.$temporada_id.','.$v['estado_partido'].','.$v['goles_local'].','.$v['goles_visitante'].', "'.$fecha.'", "'.$hora.'",'.$k1.','.$equipoVisitante_id.');';
						           echo $consulta.'<br />';$pdos++;
						           mysqli_query($mysqli, $consulta);
							}
						}

						if (empty($v['equipoVisitante_id'])) {
				    		$sq='SELECT e.id,e.nombre FROM equipo e 
							INNER JOIN club c ON e.club_id=c.id
							WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$v['equipoLocal_id'];
							//echo $sq.'<br />';
							$resultadoSQL = mysqli_query($mysqli, $sq);
					    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
					    	if (count($r)==0){
					    		$equiposGrabar[$v['equipoLocal_id']]=$v['local'];
					    		$sinequipo=1;
					    	}
					    	$equipoLocal_id=$r['id'];$local=$r['nombre'];
					    	if ($sinequipo==0){
					    		$fecha=$uFecha; $hora='00:00:11';	
							$consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id)
						    VALUES 
						    ('.$temporada_id.','.$v['estado_partido'].','.$v['goles_local'].','.$v['goles_visitante'].', "'.$fecha.'", "'.$hora.'",'.$k1.','.$equipoLocal_id.');';
						          echo $consulta.'<br />';$pdos++;
						          mysqli_query($mysqli, $consulta);
							}
						}

				    }

				  $uFecha=$v['fecha'];
				} //jornadas

		} //partidos

	//imp('partidos grabados '.$pdos);

	//imp('jornada activa '.$jornadaActiva);

	$sql='UPDATE liga SET jornadas='.count($partidos).', jornadaActiva='.count($partidos).' WHERE id='.$torneo_id.';';
	echo $sql.'<br />';
	mysqli_query($mysqli, $sql);
	$sql='UPDATE torneo SET temporada_id='.$temporada_id.', equipos='.count($equiposTorneo).' WHERE id='.$idTorneoFB.';';
	echo $sql.'<br />';
	mysqli_query($mysqliFB, $sql);

	foreach ($equiposTorneo as $ke => $ve) {
		$sq='INSERT INTO temporada_equipo (temporada_id, equipo_id) values ('.$temporada_id.','.$ve['id'].');';
		echo $sq.'<br />';
		mysqli_query($mysqli, $sq);
	}

echo $n.' -> Grupo id: '.$grupo_id.' - temporada_id: '.$temporada_id.' - torneo_id: '.$torneo_id.'<br />';
} ?>

<textarea cols="200" rows="8">
	futbolme_nueva
	DELETE FROM partido WHERE temporada_id=<?php echo $temporada_id?>;
	DELETE FROM temporada_equipo WHERE temporada_id=<?php echo $temporada_id?>;
	DELETE FROM temporada WHERE id=<?php echo $temporada_id?>;
	DELETE FROM liga WHERE id=<?php echo $torneo_id?>;
	DELETE FROM torneo WHERE id=<?php echo $torneo_id?>;
	futbolme_base
	UPDATE torneo SET temporada_id=0, equipos=0 WHERE id=<?php echo $idTorneoFB?>
</textarea>


<?php 

die('finalizado.......................................');

function conectarFB()
{
    $bbdd = 'futbolme_base';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }
    //$mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);
    
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
} ?>



?>