<?php
defined('_FUTBOLME_') or die('Acceso Restringido');

function conectar()
{
    $bbdd = 'futbolme_base';
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

function conectarFM()
{
    $bbdd = 'futbolme_nueva';
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

function conectar2016()
{
    $bbdd = 'futbolme_2016';
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

function conectar2017()
{
    $bbdd = 'futbolme_2017';
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

function conectar2018()
{
    $bbdd = 'futbolme_2018';
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


require_once 'csfutbolbase.php';
