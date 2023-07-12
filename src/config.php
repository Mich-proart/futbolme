<?php

$nivel="";


session_start();
//$_SESSION = array(); para limpiar la sesion
//require_once 'includes/publicidad/config.php';

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect();
$_SESSION['app']=0;
if ($detect->isMobile()) { $_SESSION['app'] = 1; }
if ($detect->isTablet()) { $_SESSION['app'] = 2; }
if ($detect->isAndroidOS()) { $android = 1; } else { $android = 0; }




require_once 'funciones.php';
require_once 'consultas.php';





$uri = ($_SERVER['REQUEST_URI']);
if (substr($uri, 0,20)=='/resultados-directo/'){ $_SESSION['futbolme']=0; }

if (isset($_SESSION['user_id']) && $_SESSION['user_id']==0){ unset($_SESSION['user_id']); }
if (!isset($_SESSION['app'])) { $_SESSION['app']=0; }
if (!isset($_SESSION['equipo'])) { $_SESSION['equipo']=0; }
if (!isset($_SESSION['futbolme'])) { $_SESSION['futbolme']=0; }

if (isset($_GET['fm'])) { 
    if ($_GET['fm']!=1){ $_GET['fm']=0; }
    $_SESSION['futbolme']=$_GET['fm']; 
}

$_SESSION['temporada']='2019-20';

/*
$uriLimpia = strtok($uri, '?');
$uriLimpia = strtok($uriLimpia, '&');
header('location: '.$uriLimpia, 302);*/


require_once 'usuarios/firebase.php';

$selecciones=array(189,191,193,194,195,200,202,203,216,231,232,235,236,243,244,286,287,290,666,667,668,669);