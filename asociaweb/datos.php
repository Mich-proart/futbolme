<?php 

define('_FUTBOLME_', 1);
require_once '../src/config.php';
require_once 'funcionesWidgetAW.php';
// direccion del widget src/funcionesWidget.php

$id = $_GET['id']??0;
$m = $_GET['m']??1;



if ($id==0){ $id=14868; }

if ($m==1){
$jornada=widget_jornadaAW($id);
echo json_encode($jornada);
}

if ($m==2){
$calendario=widget_calendarioAW($id);
echo json_encode($calendario);
}

if ($m==3){
$clasificacion=widget_clasificacionAW($id);
echo json_encode($clasificacion);
}


die;


