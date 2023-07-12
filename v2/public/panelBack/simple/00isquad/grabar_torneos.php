<?php

include('../'.$i.'/torneos.php');

$t=explode(',', $torneos);

foreach ($t as $key => $value) {
    $torneo=explode('-', $value);

    $sql="SELECT id FROM torneo WHERE comunidad_id=".($i+1)." AND CodCompeticion=".$torneo[1];
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql='INSERT INTO torneo (categoria_torneo_id, categoria_id, comunidad_id, nombre, orden, visible, tipo_torneo, CodCompeticion, CodGrupo) VALUES ("0","'.trim($torneo[0]).'","'.($i+1).'","'.$torneo[2].'","'.$key.'","0","1","'.$torneo[1].'","0")';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
    } else { echo "Este codigo ya esta grabado<br />"; }

    
} ?>