<?php
//publiThemoenytizer

// sin usar theMoney-13939-2.php

switch ($espacio) {
	case 'enHead':
		require_once 'codigos/theMoney-13939-11.php';
		require_once 'codigos/theMoney-13939-6.php';
		require_once 'codigos/theMoney-consent.php';
	break;
	case 'cabecera':require_once 'codigos/theMoney-13939-1.php';break;
	case 'primerLateralIzquierdo':include 'codigos/theMoney-13939-3.php';break;
	case 'segundoLateralIzquierdo':break; //'codigos/akc-ATF-300-250.php';
	case 'primerLateralDerecho':include 'codigos/theMoney-13939-4.php';break;
	case 'segundoLateralDerecho':break; //'codigos/akc-ATF2-300-250.php';
	case 'cabeceraDirectos':include 'codigos/theMoney-13939-19.php';break;
	case 'entreDirectos':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'cabeceraPartidos':include 'codigos/theMoney-13939-19.php';break;
	case 'entrePartidos':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'cabeceraTwitter':include 'codigos/theMoney-13939-19.php';break;
	case 'entreTwitter':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'temporadaJornada':include 'codigos/theMoney-13939-19.php';break;
	case 'temporadaClasificacion':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'equipoCabecera':include 'codigos/theMoney-13939-19.php';break;
	case 'equipoContenido':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'partidoCabecera':include 'codigos/theMoney-13939-19.php';break;
	case 'partidoContenido':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'jugadorCabecera':include 'codigos/theMoney-13939-19.php';break;
	case 'jugadorContenido':break; // 'codigos/akc-ATF-300-250.php';break;
	case 'pie':include 'codigos/theMoney-13939-5.php'; //revestidor
	break;
}

?>