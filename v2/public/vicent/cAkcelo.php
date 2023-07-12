<?php
//publiAkcelo
switch ($espacio) {
	case 'enHead':require_once 'codigos/akc-Prebid.php';break;
	case 'cabecera':break;
	case 'primerLateralIzquierdo':break;
	case 'segundoLateralIzquierdo':include 'codigos/akc-ATF-300-250.php';break;
	case 'primerLateralDerecho':break;
	case 'segundoLateralDerecho':include 'codigos/akc-ATF2-300-250.php';break;
	case 'cabeceraDirectos':break;
	case 'entreDirectos':include 'codigos/akc-ATF-300-250.php';break;
	case 'cabeceraPartidos':break;
	case 'entrePartidos':include 'codigos/akc-ATF-300-250.php';break;
	case 'cabeceraTwitter':break;
	case 'entreTwitter':include 'codigos/akc-ATF-300-250.php';break;
	case 'temporadaJornada':break;
	case 'temporadaClasificacion':include 'codigos/akc-ATF-300-250.php';break;
	case 'equipoCabecera':break;
	case 'equipoContenido':include 'codigos/akc-ATF-300-250.php';break;
	case 'partidoCabecera':break;
	case 'partidoContenido':include 'codigos/akc-ATF-300-250.php';break;
	case 'jugadorCabecera':break;
	case 'jugadorContenido':include 'codigos/akc-ATF-300-250.php';break;
	case 'pie':break;
}
?>