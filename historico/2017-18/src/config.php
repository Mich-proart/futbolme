<?php
$nivel="";
session_start();
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect();
$_SESSION['app']=0;
if ($detect->isMobile()) { $_SESSION['app'] = 1; }
if ($detect->isTablet()) { $_SESSION['app'] = 2; }
if ($detect->isAndroidOS()) { $android = 1; } else { $android = 0; }

require_once 'funciones.php';
require_once 'consultas.php';

$_SESSION['futbolme']=0; 
$_SESSION['temporada']='2017-18';
/*
$uriLimpia = strtok($uri, '?');
$uriLimpia = strtok($uriLimpia, '&');
header('location: '.$uriLimpia, 302);*/
