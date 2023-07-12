<?php


switch ($comunidad_id) {

	case '2':
	//https://www.isquad.es/competiciones_publico.php?id_temporada=68&id_ambito=6&asdfg=1&id_competicion=422588&id_fase=430327&id_grupo=439295&jornada=1
	$carpeta='00isquad'; $territorial='07';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=6&asdfg=1&'; //&id_ambito=6
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=6&';
	break;

	case '6':
	$carpeta='00isquad'; $territorial='02';
	//$url='http://www.ffcv.es/ncompeticiones/server.php?action=getResultados&cmp=242&jor=29&tmp=2018/2019&mod=1';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=3&asdfg=1&'; //&id_ambito=3
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=3&';
	break;

	case '8':
	$carpeta='00isquad'; $territorial='16';
	//$url='https://fcylf.es/fenix/info_drupal.php?temporada=68&competicion=417244&fase=424983&grupo=434140';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=2&asdfg=1&';//&id_ambito=??
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=2&';
	break;

	case '15':
	$carpeta='00isquad'; $territorial='12';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=18&asdfg=1&'; //&id_ambito=18
	break;

	case '4':
		$carpeta='euskadi'; $territorial='24'; 
		 //tercera grupo 4 idCompeticion=456 idGrupo=4
		 // LIGA NACIONAL JUVENIL - Grupo 4  idCompeticion=463 idGrupo=4

		//&idGrupo=4&idCompeticion=456

		$url1='http://eff-fvf.eus/pub/resultadosjornada.asp?idioma=ca&temporada=2018';
		$urlh1='http://eff-fvf.eus/pub/horarios.asp?idioma=ca&temporada=2018';
		

		//REGIONAL PREFERENTE - Álava=702
		//Primera Regional=713

		//&idcompeticion=702&idgrupo=1
		$url2='https://faf-aff.org/pub2/verResultados.asp?idioma=ca&origen=1';
		$urlh2='https://faf-aff.org/pub2/verHorario.asp?idioma=ca&origen=1';
		

		// DIVISIÓN DE HONOR TERRITORIAL - Vizcaya - con ids de equipo.=1124
		 // DIVISION PREFERENTE = 1125
		 // Primera División = 1126 - 2 Grupos
		 // Segunda División = 1127 - 2 Grupos
		 // Tercera División = 1128 - 3 Grupos

		//&idcompeticion=1124
		$url3='https://fvf-bff.org/publico/resultadosjornada.asp?idCategoria=&idioma=ca';
		$urlh3='https://fvf-bff.org/publico/horarios.asp?idCategoria=&idioma=ca';
		
		//DIVISIÓN DE HONOR REGIONAL - Guipúzcoa 
		//Regional Preferente = 5 
		//Primera Regional = 6 - 3 grupos. 

		//&qcat=323

		//&cat=323&gr=1


	$url4='http://www.kirolak.net/es/competiciones.asp?deporte=todos&deportetmp=futbol&qref=356';
	$urlh4='http://www.kirolak.net/es/competiciones-donde-ifr.asp?deporte=todos&deportetmp=futbol&ref=356&clas=0';
	
	
	break;

	case '12':

		$carpeta='canarias'; $territorial='14';

		//https://futbolaspalmas.com/1tercera/ 
		//https://futbolaspalmas.com/1preferenteint/ (Gran Canaria : Lanzarote : Fuerteventura)
		//https://futbolaspalmas.com/1aficionadosprime1/primera-regional-grupo-1-regional1.html
		//https://futbolaspalmas.com/1aficionadosprime2/primera-regional-grupo-2-regional2.html
		//https://futbolaspalmas.com/1aficionadossegun1/segunda-regional-grupo-1-regionalsegunda1.html

		//https://futboltenerife.com/1RegionalPreferente/ (Tenerife : La Gomera : El Hierro)
		//https://www.siguetuliga.com/liga/canarias-preferente-tenerife---grupo-2 (la palma)
		//https://futboltenerife.com/1regional_primera/grupo1
		//https://futboltenerife.com/1regional_primera/grupo2
		//https://futboltenerife.com/1regional_segunda/grupo1
		//https://futboltenerife.com/1regional_segunda/grupo2



		/*

			case 73:$url='https://futbolaspalmas.com/1juvenilprefe/';break;
			case 72:$url='https://futboltenerife.com/1juvenil_prefe/';break;
			case 83:$url='http://www.lanzarotedeportiva.com/index.php/futbol-base-resclas-2/division-de-honor-juvenil-2';break;
			case 93:$url='https://www.siguetuliga.com/base/liga/canarias-juveniles-liga-preferente-la-palma';break;
			case 240:$url='https://www.rtvaguacabra.com/deportes/resultados/2018-2019/juvenil_preferente_temp_2018_19/29';break;
		*/
		
		
	break;




	case '1':
	$carpeta='00pnfg'; $territorial='03';
	$url='http://futgal.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 2000 registros. Se necesitan dos páginas
	$urlClubes='http://futgal.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://futgal.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.futgal.es/pnfg/NNws_LstNews?cod_primaria=5000452';

	$urlAgenda='http://www.futgal.es/pnfg/CAL_Calendario?cod_primaria=610';



	break;

	case '3':
	$carpeta='00pnfg'; $territorial='18';
	$url='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=1; //casi 2000 registros. Se necesitan dos páginas
	$urlClubes='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://adminpcffcantabria.novanet.es/pnfg/NNws_LstNews?cod_primaria=5000289';

	$urlAgenda='';

	break;
	
	case '5':
	$carpeta='00pnfg'; $territorial='01';
	$url='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';
	$page=2; //casi 1520 registros. Se necesitan dos páginas
	$urlClubes='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://fcf.cat/es/noticias';

	$urlAgenda='';

	break;

	

	case '7':
	$carpeta='00pnfg'; $territorial='05';$categoria_torneo_id=$categoria_torneo_id??0;

	$url='http://www.ffm.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	if ($categoria_torneo_id==17){
		$url='http://www.femafusa.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';
	}

	$urlClubes='http://www.ffm.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffm.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.ffm.novanet.es/pnfg/NPortada?CodPortada=1000191';

	$urlAgenda='';


	break;

	case '9':
	$carpeta='00pnfg'; $territorial='06';
	$url='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=10; //casi 4600 registros. Se necesitan dos páginas //1150 por pagina
	$urlClubes='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://adminpcrfaf.novanet.es/pnfg/NNws_LstNews?cod_primaria=5000289';

	$urlAgenda='';	

	break;
	
	case '10':
	$carpeta='00pnfg'; $territorial='06';
	$url='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$urlClubes='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://adminpcrfaf.novanet.es/pnfg/NNws_LstNews?cod_primaria=5000289';

	$urlAgenda='';		

	break;

	case '11':
	$carpeta='00pnfg'; $territorial='11';
	$url='http://www.ffib.es/Fed/NPcd/NFG_CmpJornada?cod_primaria=1000110&CodTemporada=15&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=';

	$urlClubes='http://www.ffib.es/Fed/NPcd/NFG_Clubes?cod_primaria=1000108&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffib.es/Fed/NPcd/NFG_VerClub?cod_primaria=1000108&codigo_club=';

	$urlNews='https://www.ffib.es/Fed/NNws_LstNews?cod_primaria=5000180';

	$urlAgenda='';
	
	break;	

	case '13':
	$carpeta='00pnfg'; $territorial='10';
	$url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 2070 registros. Se necesitan dos páginas
	$urlClubes='http://www.ffrm.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffrm.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.ffrm.es/pnfg/NNws_LstNews?cod_primaria=5001941';

	$urlAgenda='';


	break;

	case '14':
	$carpeta='00pnfg'; $territorial='17';
	$url='http://www.fexfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 1400 registros. Se necesitan dos páginas
	$urlClubes='http://www.fexfutbol.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.fexfutbol.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.fexfutbol.com/pnfg/NNws_LstNews?cod_primaria=1000057';

	$urlAgenda='';

	break;

	case '16':
	$carpeta='00pnfg'; $territorial='19';
	$url='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$urlClubes='http://www.frfutbol.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.frfutbol.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='https://www.frfutbol.com/pnfg/NNws_LstNews?cod_primaria=1000057';

	$urlAgenda='';

	break;

	case '17':
	$carpeta='00pnfg'; $territorial='09';
	$url='http://www.futbolaragon.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$urlClubes='http://www.futbolaragon.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.futbolaragon.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';
	
	$urlNews='http://futbolaragon.com/pnfg/NNws_LstNews?cod_primaria=3000283';

	$urlAgenda='';

	break;

	case '18':
	$carpeta='00pnfg'; $territorial='20';
	$url='http://www.ffcm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 1600 registros. Se necesitan dos páginas apartir de 1500
	$urlClubes='http://www.ffcm.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffcm.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='https://www.ffcm.es/pnfg/NNws_LstNews?cod_primaria=5000208';

	$urlAgenda='';


	break;
	
	default:
		# code...
		break;
}


//http://www.cat.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=1000

?>