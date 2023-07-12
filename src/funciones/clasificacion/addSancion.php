<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

$mysqli = conectar();

if (isset($_GET['modo'])) {
    $sancion_id = $_GET['id'];

    $eliminar = 'DELETE FROM sancion WHERE id='.$sancion_id;
    $resultadoSQL = mysqli_query($mysqli, $eliminar);
} else {
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli, $value);
    }

    $consulta = "INSERT INTO sancion (temporada_id, equipo_id, jornada, puntos, jugados, ganados, empatados, perdidos, gFavor, gContra) VALUES ('".$temporada_id."', '".$equipo_id."', '".$jornada."', '".$puntos."', '".$jugados."', '".$ganados."', '".$empatados."', '".$perdidos."', '".$gFavor."', '".$gContra."')";

    /*echo "<pre>";
    print_r($$key);
    echo "</pre>";


    echo "<pre>";
    print_r($consulta);
    echo "</pre>";

    die;*/

    if (mysqli_query($mysqli, $consulta)) {
        $pos = strpos($_SERVER['HTTP_REFERER'], '?');
        if (false === $pos) {
            $flag = '?ok';
        } else {
            $flag = '&ok';
        }
        $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
        if (false !== $pos) {
            $flag = '';
        }
    } else {
        $pos = strpos($_SERVER['HTTP_REFERER'], '?');
        if (false === $pos) {
            $flag = '?error';
        } else {
            $flag = '&error';
        }
        $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
        if (false !== $pos) {
            $flag = '';
        }
    }
}
header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
exit();
