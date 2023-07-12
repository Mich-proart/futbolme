<?php

unset($equipo_id);

    $sql="SELECT id FROM equipo WHERE federacion_id=".$Efederacion_id." AND club_id=".$club_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql='INSERT INTO equipo (club_id, nombre, nombreCorto,federacion_id) VALUES ("'.$club_id.'","'.$nombre.'","'.$nombre.'","'.$Efederacion_id.'")';
        $mysqli = conectar();
        mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
        echo "Equipo insertado<br />"; 

        $sql="SELECT id FROM equipo WHERE federacion_id=".$Efederacion_id." AND club_id=".$club_id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    } else { 
        echo "Este equipo ya esta grabado<br />"; 
    }

    $equipo_id=$resultado['id'];

    //vamos a agregar el equipo al torneo.

    $sql="SELECT equipo_id FROM temporada_equipo WHERE equipo_id=".$equipo_id." AND temporada_id=".$torneo_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql='INSERT INTO temporada_equipo (temporada_id, equipo_id) VALUES ("'.$torneo_id.'","'.$equipo_id.'")';
        $mysqli = conectar();
        mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
        echo "Agregado al torneo<br />";        
    } 


    

 ?>