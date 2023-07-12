<?php 
include 'config.php';
$mysqli = $link;


$partidos=count($_POST['id']);

for ($i=0; $i < $partidos; $i++) {
    $partido=array();
    $partido['partido_id']=$_POST['id'][$i]; 
    $partido['estado_partido']=$_POST['estado_partido'][$i]; 
    $partido['hora_prevista']=$_POST['hora_prevista'][$i]; 
    $partido['hora_real']=$_POST['hora_real'][$i]??'00:00:11'; 
    $partido['goles_local']=$_POST['goles_local'][$i];  
    $partido['goles_visitante']=$_POST['goles_visitante'][$i];  
    $partido['temporada_id']=$_POST['temporada_id'][$i]; 
    $partido['fecha']=$_POST['fecha'][$i];  
    $partido['jornada']=$_POST['jornada'][$i];  
    $partido['equipoLocal_id']=$_POST['equipoLocal_id'][$i];  
    $partido['local']=$_POST['local'][$i];  
    $partido['equipoVisitante_id']=$_POST['equipoVisitante_id'][$i];  
    $partido['visitante']=$_POST['visitante'][$i];
    $partido['observaciones']=$_POST['observaciones'][$i];
    $partido['comentario']=$comentario??'';
    $partido['usuario_id']=$_POST['usuario_id'][$i];
    $ep=$_POST['or_estado_partido'][$i];
    $hp=$_POST['or_hora_prevista'][$i];
    $gl=$_POST['or_goles_local'][$i];
    $gv=$_POST['or_goles_visitante'][$i];
    $fe=$_POST['or_fecha'][$i];
    $obs=$_POST['or_observaciones'][$i];

   // var_export($obs);

    //var_export($_POST['observaciones'][$i]);

    $evento=0;
    if ($_POST['observaciones'][$i] != $obs || $_POST['estado_partido'][$i] != $ep || $_POST['hora_prevista'][$i] != $hp || $_POST['goles_local'][$i] != $gl || $_POST['goles_visitante'][$i] != $gv || $_POST['fecha'][$i] != $fe) {
        //echo 'estoy dentro';
        if (1 == $_POST['estado_partido'][$i]) { $evento = 13;} // (FINAL)
        $partido['evento']=$evento;

        if (2 == $_POST['estado_partido'][$i] || 6 == $_POST['estado_partido'][$i]) {
            $consulta = 'UPDATE partido SET betsapi=1 WHERE id='.$partido['partido_id'];
            //echo $consulta;
            mysqli_query($mysqli, $consulta);
        } 

        if ($obs != $_POST['observaciones'][$i]) {
            $consulta = 'UPDATE partido SET observaciones="'.$_POST['observaciones'][$i].'" WHERE id='.$partido['partido_id'];
            //echo $consulta;
            mysqli_query($mysqli, $consulta);
        } 


        insertarMovimiento($partido,$mysqli);
        unset($partido);
    }
    //var_dump($gl);
    //var_dump($_POST['goles_local'][$i]);
    
}
//$partido_ida=$resultado[0][0];

function insertarMovimiento($partido,$mysqli) {
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
visitante, codigo_acta, usuario_id, observaciones) VALUES ("'.$partido['partido_id'].'","'.$partido['estado_partido'].'","'.$partido['temporada_id'].'","'.$partido['fecha'].'","'.$partido['hora_prevista'].'","'.$partido['hora_real'].'","'.$partido['comentario'].'","'.$partido['goles_local'].'","'.$partido['goles_visitante'].'","'.$partido['evento'].'","'.$partido['equipoLocal_id'].'","'.$partido['local'].'","'.$partido['equipoVisitante_id'].'","'.$partido['visitante'].'","'.$codigo_acta.'","'.$partido['usuario_id'].'","'.$partido['observaciones'].'")';
   
    //echo $sql."<br />";
    if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
        printf("Errormessage: %s\n", mysqli_error($mysqli)); 
        echo $sql.'<br />';           
    } else {
        echo "Movimiento insertado correctamente. Evento: ".$partido['evento']."<br />";
    }
}
