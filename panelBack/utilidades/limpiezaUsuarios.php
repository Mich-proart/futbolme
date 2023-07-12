<?php
$static_v = 8; 
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';
require_once '../../src/funciones.php';


limpiezaUsuarios();





function limpiezaUsuarios()
{    
    
    $mysqli = conectar();


    $sql='UPDATE usuario_token
    INNER JOIN usuario_equipo ON usuario_token.id = usuario_equipo.usuario_id
    SET usuario_token.usuario_off=1';
    echo $sql.'<br />';
    mysqli_query($mysqli, $sql);



    $consulta = 'DELETE FROM usuario_token WHERE usuario_off<>1 AND resultados=0 AND fallos=0 LIMIT 10000';
    echo $consulta;
    mysqli_query($mysqli, $consulta);
    

    $consulta = 'SELECT count(id) FROM usuario_token';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);

    imp($resultado[0]." usuarios despues");

}


?>
<script type="text/javascript">
function redireccionar(){
  window.location="limpiezaUsuarios.php";
} 
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos
</script>