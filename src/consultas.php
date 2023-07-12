<?php
defined('_FUTBOLME_') or die('Acceso Restringido');

function conectar()
{
    $bbdd = 'futbolme_nueva';
    if (isset($_SERVER['DATABASE'])) { $bbdd = $_SERVER['DATABASE'];  }
    //$mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }
    return $mysqli;
}

function conectarFB()
{
    $bbdd = 'futbolme_base';
    if (isset($_SERVER['DATABASE'])) {$bbdd = $_SERVER['DATABASE']; }
    //$mysqli = mysqli_connect('localhost', 'root', 'cojo', $bbdd);
    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', $bbdd);    
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo 'No se pudo conectar a la base de datos: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    }
    return $mysqli;
}


function Xapifutbol($id)
{
   if (isset($id)){
    $consulta = 'SELECT t.id torneo_id, t.nombre, t.orden, te.id temporada_id, t.pais_id, t.visible, p.nombre pais, t.tipo_torneo, t.categoria_torneo_id, a.api_nombre, t.inicio
    FROM torneo t
    INNER JOIN temporada te ON te.torneo_id=t.id
    INNER JOIN pais p ON t.pais_id=p.id
    INNER JOIN apis a ON t.id=a.torneo_id
    WHERE a.api_id='.$id;
//    echo $consulta;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
        
        if (!$resultadoSQL = mysqli_query($mysqli, $consulta)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
        } 

    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
   } else { $resultado=null; }


    return $resultado;
}

require_once 'consultas/csgeneral.php';
require_once 'consultas/cspartido.php';
require_once 'consultas/csdirecto.php';
require_once 'consultas/csjugador.php';
require_once 'consultas/csequipo.php';
require_once 'consultas/clasificacion/XgenerarClasificacion.php';
require_once 'consultas/csfutbolbase.php';

