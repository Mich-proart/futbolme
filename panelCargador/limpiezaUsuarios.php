<?php
$static_v = 8; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';


limpiezaUsuarios();


function limpiezaUsuarios(){    
    
    $mysqli = conectar();
    $sql='UPDATE usuario_token
    INNER JOIN usuario_equipo ON usuario_token.id = usuario_equipo.usuario_id
    SET usuario_token.usuario_off=1';
    //echo $sql.'<br />';
    mysqli_query($mysqli, $sql);
$consulta = 'DELETE FROM usuario_token WHERE usuario_off<>1 AND resultados=0 AND fallos=0 LIMIT 50000';
    //echo $consulta;
    mysqli_query($mysqli, $consulta);
}

?>