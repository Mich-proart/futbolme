<?php

include('../'.$i.'/parametros.php');

$p=explode(',', $parametros);
foreach ($p as $key => $v) {

    $p1=explode(':', $v);
    $CodCompeticion=explode('-',$p1[0]);$CodC=$CodCompeticion[1];
    $CodFase=explode('-',$p1[1]);$CodF=$CodFase[1];
    $CodGrupo=explode('-',$p1[2]);$CodG=$CodGrupo[1];
    
    $sql="SELECT * FROM torneo WHERE comunidad_id=".($i+1)." AND CodCompeticion=".$CodC;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $categoria_id=$resultado['categoria_id'];
    $nombre=$resultado['nombre'];
    $nombreG=$resultado['nombreGrupo'];
    if ($nombreG==''){ $nombreG=0; } else $nombreG=(int)$nombreG+1;


    $sql="SELECT * FROM torneo WHERE comunidad_id=".($i+1)." AND CodCompeticion=".$CodC." AND CodFase=".$CodF." AND CodGrupo=".$CodG;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);


    if (count($resultado)==0){
        $sql='INSERT INTO torneo (categoria_torneo_id, categoria_id, comunidad_id, nombre, nombreFase, nombreGrupo, orden, visible, tipo_torneo, CodCompeticion, CodFase, CodGrupo) VALUES ("0","'.$categoria_id.'","'.($i+1).'","'.$nombre.'","Liga","'.$nombreG.'","'.$key.'","0","1","'.$CodC.'","'.$CodF.'","'.$CodG.'")';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
    } else { echo "Este codigo ya esta grabado<br />"; }    

}

$sql="DELETE FROM torneo WHERE comunidad_id=".($i+1)." AND CodGrupo=0";
$mysqli = conectar();
mysqli_query($mysqli, $sql);
    

    
?>