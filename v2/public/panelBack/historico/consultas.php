<?php
defined('_PANEL_') or die('Acceso Restringido');


function conectar2000()
{
    $bbdd = 'futbolme_2019';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }
    //$mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);
    
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}


require_once 'cshistorico.php';
