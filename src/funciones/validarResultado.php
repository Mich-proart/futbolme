<?php 
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';

$mysqli=conectar();

if ($_POST['tipo']==0){

	$partido=array();

    $sq='SELECT p.hora_prevista, p.temporada_id, p.fecha, p.jornada, p.equipoLocal_id, ec.nombre local, p.equipoVisitante_id, ef.nombre visitante FROM partido p
    INNER JOIN equipo ec ON ec.id=p.equipoLocal_id
    INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id
    WHERE p.id='.$_POST['partido_id'];
	$resultadoSQL = mysqli_query($mysqli, $sq);
	echo $sq;

    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $partido['partido_id']=$_POST['partido_id']; 
	$partido['goles_local']=$_POST['gl'];  
    $partido['goles_visitante']=$_POST['gv'];  
    
    $partido['hora_prevista']=$r['hora_prevista']; 
    $partido['temporada_id']=$r['temporada_id']; 
    $partido['fecha']=$r['fecha'];  
    $partido['jornada']=$r['jornada'];  
    $partido['equipoLocal_id']=$r['equipoLocal_id'];  
    $partido['local']=$r['local'];  
    $partido['equipoVisitante_id']=$r['equipoVisitante_id'];  
    $partido['visitante']=$r['visitante'];

    
    $partido['estado_partido']=1; 
    $partido['evento']=13; 
    $partido['comentario']='';    
    $partido['hora_real']='00:00:11'; 

    
    
    insertarMovimiento($partido);
    unset($partido);




	$sq='UPDATE resultado SET puntos=1 WHERE id='.$_POST['id'];
	mysqli_query($mysqli, $sq);
} else {
	$sq='UPDATE resultado SET puntos=1 WHERE id='.$_POST['id'];
	mysqli_query($mysqli, $sq);
	
}
