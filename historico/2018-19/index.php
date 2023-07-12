<?php
define('_FUTBOLME_', 1);

require_once 'src/config.php';

//imp($_GET);

$modo=$_GET['modo']??'t';
$id=$_GET['id']??'1';

switch ($modo) {
	case 'e': include('equipo.php');break;
	case 'j': include('jugador.php');break;
	case 'p': include('partido.php');break;
	case 't': include('temporada.php');break;
	
}?>

