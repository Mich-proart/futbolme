<?php
$static_v = 8; 
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';
require_once '../../src/funciones.php';

if (!isset($_GET['ok'])){
    echo 'Se borrarán los resultados enviados por los usuarios. ok?<br />';
    echo '<a href="?ok">continuar....</a>'; die;

}


puntuarUsuarios();





function puntuarUsuarios()
{    
    
    $mysqli = conectar();


    $sql='SELECT partido_id, goles_local, goles_visitante, usuario FROM resultado';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    foreach ($r as $key => $v) {
        $sq='SELECT goles_local, goles_visitante FROM partido WHERE id='.$v['partido_id'];
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if ($r1['goles_local']==$v['goles_local'] && $r1['goles_visitante']==$v['goles_visitante']){
            $sq2='UPDATE usuario_token SET resultados=resultados+1 WHERE token="'.$v['usuario'].'"';
        } else {
            $sq2='UPDATE usuario_token SET fallos=fallos+1 WHERE token="'.$v['usuario'].'"';
        }
        echo $sq2.'<br />';
        mysqli_query($mysqli, $sq2);
    }



    $consulta = 'DELETE FROM resultado';
    mysqli_query($mysqli, $consulta);

    $sql='SELECT nombre, resultados, fallos, token FROM usuario_token WHERE resultados>0 OR fallos>0 ORDER BY resultados DESC';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
    <table border="1">
    <?php foreach ($r as $key => $v) { ?>
        <tr><td width="250"><?php echo $v['nombre']?></td><td width="50" align="center"><?php echo $v['resultados']?></td>
            <td width="50" align="center"><?php echo $v['fallos']?></td><td><?php echo $v['token']?></td></tr>
    <?php } ?>
    </table>

<?php } ?>
