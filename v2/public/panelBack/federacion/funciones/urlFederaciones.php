<?php

$bd="proxis"; $urlClasi='';$idTF=17; $url='';$territorial='00';$carpeta='';

switch ($comunidad_id) {

	case '0':include 'url_nacional.php';break;
	case '4':include 'url_euskadi.php';break;
	case '12':include 'url_canarias.php';break;
	case '13':include 'url_murcia.php';break;

	case '2':	
	$carpeta='00isquad'; $territorial='07'; $id_ambito='6';
	include 'url_isquad.php'; 
	break;

	case '6':
	$carpeta='00isquad'; $territorial='02'; $id_ambito='3';
	include 'url_isquad.php'; 
	break;

	case '8':
	$carpeta='00isquad'; $territorial='16'; $id_ambito='2';
	include 'url_isquad.php'; 
	break;

	case '15':
	$carpeta='00isquad'; $territorial='12'; $id_ambito='18';
	include 'url_isquad.php'; 
	break;

	case '1':
	$carpeta='00pnfg'; $territorial='03';
	$rot='http://futgal.es';$rot2='http://futgal.es';
	include 'url_novanet.php';	
	break;

	case '3':
	$carpeta='00pnfg'; $territorial='18';
	$rot='https://www.federacioncantabradefutbol.com';
	$rot2='http://adminpcffcantabria.novanet.es';
	include 'url_novanet.php';	
	break;

	case '5':
	$carpeta='00pnfg'; $territorial='01';
	$rot='http://pbvallirana.fcf.novanet.es';
	include 'url_novanet.php';
    break;

    case '7':
	$carpeta='00pnfg'; $territorial='05';
	$rot='https://www.rffm.es';
	include 'url_novanet.php';
    break;

    case '9':
	case '10':
	$carpeta='00pnfg'; $territorial='06';
	$rot="https://www.rfaf.es";
	include 'url_novanet.php';
    break;

    case '11':
	$carpeta='00pnfg'; $territorial='11';
	$rot="https://www.ffib.es";
	include 'url_novanet.php';
    break;    

    case '14':
	$carpeta='00pnfg'; $territorial='17';
	$rot="http://www.fexfutbol.com";
	include 'url_novanet.php';
	break;

	case '16':
	$carpeta='00pnfg'; $territorial='19';
	$rot="https://www.frfutbol.com";
	include 'url_novanet.php';
    break;

    case '17':
	$carpeta='00pnfg'; $territorial='09';
	$rot="http://www.futbolaragon.com";
	include 'url_novanet.php';
    break;



	case '18':
	$carpeta='00pnfg'; $territorial='20';
	$rot="http://www.ffcm.es";
	include 'url_novanet.php';
	break;

	

	
	

	

	

	

	case '16':
	$carpeta='00pnfg'; $territorial='19';
	$url='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$urlClubes='http://www.frfutbol.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.frfutbol.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='https://www.frfutbol.com/pnfg/NNws_LstNews?cod_primaria=1000057';

	$urlAgenda='';

	$urlActa='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	

	break;

	case '17':
	$carpeta='00pnfg'; $territorial='09';
	$url='http://www.futbolaragon.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$urlClubes='http://www.futbolaragon.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.futbolaragon.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';
	
	$urlNews='http://futbolaragon.com/pnfg/NNws_LstNews?cod_primaria=3000283';

	$urlAgenda='';

	$urlActa='http://www.futbolaragon.com/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	

	break;

	
}

$bd=$bd.$comunidad_id;

if (isset($fase_id)){
	$jornada=$jornada??1;
	$url=str_replace('aaa', $competicion_id, $url);
	$url=str_replace('bbb', $fase_id, $url);
	$url=str_replace('ccc', $grupo_id, $url);
	$url=str_replace('ddd', $jornada, $url);
}


if (isset($rot)){
	echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b> --- <a href="'.$rot.'" target="_blank">federación</a>';

		}
	if (isset($grupo_id)){
		 echo '- Torneo <a href="'.$url.'" target="_blank">Torneo</a>';
	}

	if ($carpeta=='00isquad'){ echo ' - <b>Pulsa botón derecho y abre el navegador en una ventana de incógnito</b>';
	echo '<hr />';
}


?>