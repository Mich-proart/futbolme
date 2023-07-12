<?php


    $sql="SELECT id FROM torneo WHERE comunidad_id=".$i." AND torneo_id=".$torneo_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
        $sql="INSERT INTO torneo (comunidad_id, orden, categoria, nombre, torneo_id, grupos, url, tipo_torneo) VALUES ('".$i."', '".$orden."', '".$categoria."', '".$nombre."', '".$torneo_id."', '".$grupos."', '".$url."', 1)";
        mysqli_query($mysqli, $sql);
        echo $sql.'<br />';
    } else { echo "Este codigo ya esta grabado<br />"; }

/*()
INSERT INTO torneo(comunidad_id, orden, categoria, nombre, torneo_id, grupos, url, tipo_torneo) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])*/




?>