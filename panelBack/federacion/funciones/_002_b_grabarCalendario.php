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

$grupo_id=$_GET['g'];
$categoria=$_GET['cat']; 
$territorial=$_GET['t'];
$comunidad_id=$_GET['cm'];
$temporada_id=$_GET['te'];
$torneo_id=$_GET['tor'];

$mysqli = conectar();








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
				    	$codigo_acta=$v['codigo_acta'];
				    	if(!is_numeric($codigo_acta)) { $codigo_acta=0;}
					    
				    	//imp($v['fecha']);
				    	if ($sinequipo==0){
				    		if (strlen($v['hora_prevista'])>8){				    			
				    			$fecha=$uFecha; $hora='00:00:11';
				    		}
							$consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id,codigo_acta)
						    VALUES 
						    ('.$temporada_id.','.$v['estado_partido'].','.$v['goles_local'].','.$v['goles_visitante'].', "'.$fecha.'", "'.$hora.'",'.$k1.', '.$equipoLocal_id.', '.$equipoVisitante_id.', "'.$codigo_acta.'");';
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

	$sql='UPDATE liga SET jornadas='.count($partidos).', jornadaActiva=1 WHERE id='.$torneo_id.';';
	echo $sql.'<br />';
	mysqli_query($mysqli, $sql);
	


die('finalizado.......................................');

?>