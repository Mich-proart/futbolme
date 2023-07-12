<?php 
$dominio = 'sin_dominio';
if (isset($_SERVER['HTTP_REFERER'])) {
    $dominio = $_SERVER['HTTP_REFERER'];
}

define('_FUTBOLME_', 1);
require_once '../src/config.php';
require_once 'funcionesWidget.php';
// direccion del widget src/funcionesWidget.php

$id = $_GET['id']??633;
$tipo = $_GET['tipo']??2;

//$servidor="http://fm18.com";
$servidor = 'https://futbolme.com';

$valor = validar($dominio, $tipo, $id);

if (1 == $valor) {
    ?>
	document.write ('<div style="clear:both"></div><div style="width:100%; max-width:500px !important; font-family: sans-serif;"><div style="margin-top:10px; font-size:16px; font-weight: bold; background-color: gainsboro; text-align:center;"><img src="https://futbolme.eu/apple-touch-icon-precomposed.png" style="float:left"><a href="https://play.google.com/store/apps/details?id=com.futbolme.futbolme" style="text-decoration: none;">Descargate la APP de futbolme desde Google Play</a></div><?php
    if (4 == $tipo) {
        echo widget_partido($id, $servidor);
    }
    if (2 == $tipo) {
        echo widget_resultados($id, $servidor);
    }
    if (3 == $tipo) {
        echo widget_clasificacion($id, $servidor);
    }
    if (1 == $tipo) {
        echo cargar_widget($id, $servidor);
    }
    ?><div style="width:100%; margin-top:10px; font-size:18px; font-weight: bold; background-color: gainsboro; text-align:center;"><a href="https://futbolme.com" style="text-decoration: none;">Resultados de fútbol</a></div></div><div style="clear:both"></div>')
<?php
}
