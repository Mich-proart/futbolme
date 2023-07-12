
<?php
define('_FUTBOLME_', 1);

include 'funcionesV2.php';

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
echo 'Limpieza de usuarios terminada';
?>