<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php';



if (isset($_GET['modo'])) {
    $color_id = $_GET['id'];
    $torneo_id = $_GET['torneo_id']??2;

    $eliminar = 'DELETE FROM color WHERE id='.$color_id;
    $resultadoSQL = mysqli_query($mysqli, $eliminar);
} else {
    // INSERTAR COLOR
    $torneo_id = $_POST['torneo_id']??2;

    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli, $value);
    }

    $consulta = "INSERT INTO color (nombre, texto, color_fondo, color_texto, peso )
				VALUES ('".$nombre."', '".$nombre."', '#".$color_fondo."', '".$color_texto."', '".$peso."')";
    //die($consulta);
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

header('Location: /panelBack/funciones/clasificacion/index.php?torneo_id='.$torneo_id);
exit();

