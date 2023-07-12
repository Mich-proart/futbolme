<?php

unset($club_id);

    $sql="SELECT id FROM club WHERE federacion_id='".$Cfederacion_id."'";
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql='INSERT INTO club (nombre,federacion_id) VALUES ("'.$nombre.'","'.$Cfederacion_id.'")';
        $mysqli = conectar();
        mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
        echo "Club insertado<br />"; 

        $sql="SELECT id FROM club WHERE federacion_id='".$Cfederacion_id."'";
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    } else { 
        echo "Este club ya esta grabado<br />"; 
    }

    $club_id=$resultado['id'];
    

 ?>