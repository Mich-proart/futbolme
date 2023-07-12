<?php
function conectar()
{
    $bbdd = 'futbolme_nueva';
    //$bbdd = 'nOficina';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }
    if ($_SERVER['HTTP_HOST']=='version2'){
      $mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    } else {
       $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'B4s1s4e', $bbdd);
    }
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}

function conectarBase()
{
    $bbdd = 'futbolme_base';
    if (isset($_SERVER['DATABASE'])) {
        $bbdd = $_SERVER['DATABASE'];
    }
    if ($_SERVER['HTTP_HOST']=='version2'){
      $mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    } else {
       $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'B4s1s4e', $bbdd);
    }
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }

    return $mysqli;
}
?>