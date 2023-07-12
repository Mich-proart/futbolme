<?php

$bd="proxis"; $urlClasi='';

switch ($comunidad_id) {

	case '0':
	$carpeta='00nacional';
	$urlActa='http://actas.rfef.es/actas/RFEF_CmpPartido?cod_primaria=1000144&CodActa=xxx';
	$urlActa='https://www.rfef.es/actas?pid=xxx';
	$url='https://www.rfef.es/competiciones/futbol-masculino/resultados/xxx/2020';

            $t=$temporada_id??1;

            switch ($t) {
                case 1:$baseFederacion=100;$base2=22330;break;
                case 2:$baseFederacion=101;$base2=22410;break; 
                case 3:$baseFederacion=104;$base2=22462;break; 
                case 4:$baseFederacion=105;$base2=22500;break; 
                case 5:$baseFederacion=106;$base2=22538;break; 
                case 6:$baseFederacion=107;$base2=22576;break; 


                //https://futbolfemenino.rfef.es/es/primera-iberdrola/calendario-y-resultados/?j=7&y=2020
                //https://futbolfemenino.rfef.es/es/reto-iberdrola-grupo-norte/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/reto-iberdrola-sur/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-1/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-2/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-3/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-4/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-5/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-6/calendario-y-resultados/?j=9&y=2020
                //https://futbolfemenino.rfef.es/es/primera-nacional-grupo-7/calendario-y-resultados/?j=9&y=2020

                /* 
                DHJ1 https://www.rfef.es/competiciones/futbol-masculino/resultados/22615/2020
                DHJ2 https://www.rfef.es/competiciones/futbol-masculino/resultados/22645/2020
                https://www.rfef.es/competiciones/futbol-masculino/resultados/22675/2020
                https://www.rfef.es/competiciones/futbol-masculino/resultados/22705/2020
                https://www.rfef.es/competiciones/futbol-masculino/resultados/22739/2020
                https://www.rfef.es/competiciones/futbol-masculino/resultados/23353/2020
                https://www.rfef.es/competiciones/futbol-masculino/resultados/22769/2020


                */
            }
      




	$bd='proxis';
	break;

	case '2':
	//https://www.isquad.es/competiciones_publico.php?id_temporada=68&id_ambito=6&asdfg=1&id_competicion=422588&id_fase=430327&id_grupo=439295&jornada=1
	$carpeta='00isquad'; $territorial='07';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=6&asdfg=1&'; //&id_ambito=6
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=6&';
	$urlActa='https://www.isquad.es/competiciones_publico_acta.php?id_partido=xxx';
	break;

	case '6':
	$carpeta='00isquad'; $territorial='02';
	//$url='http://www.ffcv.es/ncompeticiones/server.php?action=getResultados&cmp=242&jor=29&tmp=2018/2019&mod=1';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=3&asdfg=1&'; //&id_ambito=3
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=3&';
	$urlActa='https://www.isquad.es/competiciones_publico_acta.php?id_partido=xxx';
	break;

	case '8':
	$carpeta='00isquad'; $territorial='16';
	//$url='https://fcylf.es/fenix/info_drupal.php?temporada=68&competicion=417244&fase=424983&grupo=434140';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=2&asdfg=1&';//&id_ambito=??
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=2&';
	$urlActa='https://www.isquad.es/competiciones_publico_acta.php?id_partido=xxx';
	break;

	case '15':
	$carpeta='00isquad'; $territorial='12';
	$url='https://www.isquad.es/competiciones_publico.php?id_temporada=69&id_ambito=18&asdfg=1&'; //&id_ambito=18
	$urlClub='https://www.isquad.es/competiciones_publico_equipo.php?id_ambito=18&';
	$urlActa='https://www.isquad.es/competiciones_publico_acta.php?id_partido=xxx';
	break;

	case '4':
		$carpeta='euskadi'; $territorial='24'; 
		
		if (isset($fila)){
			
			$ruta='';
	        $provincia = 'Guipúzcoa';
	        $pos = strpos($fila['temporada_nombre'], $provincia);        
	        if ($pos > 0) { 
	          $ruta='https://kirolak.gipuzkoa.eus/es/competiciones.asp?deporte=todos&deportetmp=futbol&qref=380&qcat=';	
	          $url=$ruta.$fila['apiRFEFcompeticion'];
           
	        } 

	        
	        $provincia = 'Álava';
	        $pos = strpos($fila['temporada_nombre'], $provincia);
	        if ($pos > 0) { $ruta='https://www.faf-aff.org/pub2/verResultados.asp?idioma=ca&idcompeticion='; 
	        	$url=$ruta.$fila['apiRFEFcompeticion'].'&idgrupo='.$fila['apiRFEFgrupo'];	        	
	    	} 

	        $provincia = 'Vizcaya';
	        $pos = strpos($fila['temporada_nombre'], $provincia);
	        if ($pos > 0) { $ruta='https://www.fvf-bff.org/publico/resultadosJornada.asp?idioma=ca';
	        	$url=$ruta.'&idCategoria='.$fila['apiRFEFcompeticion'].'&idCompeticion='.$fila['apiRFEFcompeticion'];
	        } 
	    } //if isset fila

	    
	
	break;

	case '12':

		$carpeta='canarias'; $territorial='14';

		if (isset($fila)){

			$ruta='';

			switch ($fila['apiRFEFcompeticion']) {		

				case 1: $ruta='https://futbolaspalmas.com/1tercera/'; break;
				case 2: $ruta='https://futbolaspalmas.com/1preferenteint/'; break;
				case 3: $ruta='https://futbolaspalmas.com/1aficionadosprime1/primera-regional-grupo-1-regional1.html'; break;
				case 4: $ruta='https://futbolaspalmas.com/1aficionadosprime2/primera-regional-grupo-2-regional2.html'; break;
				//case 5: $ruta='https://futbolaspalmas.com/1regionallanzarote/resultados-primera-regional-lanzarote.html'; break;
				//case 6: $ruta='https://futbolaspalmas.com/1aficionadossegun1/segunda-regional-grupo-1-regionalsegunda1.html'; break;
				case 7: $ruta='https://futbolaspalmas.com/1femenino2/territorial-femenina-las-palmas.html'; break;
				case 8: $ruta='https://futbolaspalmas.com/1juvenilprefe/'; break;
				case 9: $ruta='https://futbolaspalmas.com/1juvenilfuerteventura/'; break;
				case 10: $ruta='https://futbolaspalmas.com/1juvenillanzarote/'; break;
				case 11: $ruta='https://futbolaspalmas.com/1juvenilprime1/primera-juvenil-grupo-1-juvenilprimera1.html'; break;
				case 12: $ruta='https://futbolaspalmas.com/1juvenilprime2/primera-juvenil-grupo-2-juvenilprimera2.html'; break;
				case 13: $ruta='https://futbolaspalmas.com/1juvenilsegun1/segunda-juvenil-grupo-1-juvenilsegunda1.html'; break;
				case 14: $ruta='https://futbolaspalmas.com/1juvenilsegun2/segunda-juvenil-grupo-2-juvenilsegunda2.html'; break;
				case 15: $ruta='https://futbolaspalmas.com/1juvenilsegun3/segunda-juvenil-grupo-3-juvenilsegunda3.html'; break;
				case 16: $ruta='https://futbolaspalmas.com/1juvenilsegun4/segunda-juvenil-grupo-4-juvenilsegunda4.html'; break;
				case 17: $ruta='https://futbolaspalmas.com/1cadeteprefe/'; break;
				//case 18: $ruta='https://futbolaspalmas.com/1cadetefuerteventura1/'; break;
				//case 19: $ruta='https://futbolaspalmas.com/1cadetefuerteventura2/'; break;
				//case 20: $ruta='https://futbolaspalmas.com/1cadetelanzarote/resultados-cadete-preferente-lanzarote.html'; break;
				case 21: $ruta='https://futbolaspalmas.com/1cadeteprime1/primera-cadete-grupo-1-cadeteprimera1.html'; break;
				case 22: $ruta='https://futbolaspalmas.com/1cadeteprime2/primera-cadete-grupo-2-cadeteprimera2.html'; break;
				case 23: $ruta='https://futbolaspalmas.com/1cadeteprime3/primera-cadete-grupo-3-cadeteprimera3.html'; break;
				case 24: $ruta='https://futbolaspalmas.com/1cadeteprime4/primera-cadete-grupo-4-cadeteprimera4.html'; break;
				case 25: $ruta='https://futbolaspalmas.com/1cadeteprime5/primera-cadete-grupo-5-cadeteprimera5.html'; break;
				case 26: $ruta='https://futbolaspalmas.com/1cadeteprime6/primera-cadete-grupo-6-cadeteprimera6.html'; break;
				case 27: $ruta='https://futbolaspalmas.com/1cadeteprime7/primera-cadete-grupo-7-cadeteprimera7.html'; break;
				case 28: $ruta='https://futbolaspalmas.com/1infantil-prefe1/infantil-preferente-grupop-1-infantilpreferente1.html'; break;
				case 29: $ruta='https://futbolaspalmas.com/1infantil-prefe2/infantil-preferente-grupop-2-infantilpreferente2.html'; break;
				case 30: $ruta='https://futbolaspalmas.com/1infantiles1/infantil-primera-grupo-1-infantilprimera1.html'; break;
				case 31: $ruta='https://futbolaspalmas.com/1infantiles2/infantil-primera-grupo-2-infantilprimera2.html'; break;
				case 32: $ruta='https://futbolaspalmas.com/1infantiles3/infantil-primera-grupo-3-infantilprimera3.html'; break;
				case 33: $ruta='https://futbolaspalmas.com/1infantiles4/infantil-primera-grupo-4-infantilprimera4.html'; break;
				case 34: $ruta='https://futbolaspalmas.com/1infantiles5/infantil-primera-grupo-5-infantilprimera5.html'; break;
				case 35: $ruta='https://futbolaspalmas.com/1infantiles6/infantil-primera-grupo-6-infantilprimera6.html'; break;
				case 36: $ruta='https://futbolaspalmas.com/1infantiles7/infantil-primera-grupo-7-infantilprimera7.html'; break;
				case 37: $ruta='https://futbolaspalmas.com/1infantiles8/infantil-primera-grupo-8-infantilprimera8.html'; break;
				case 100: $ruta='https://futboltenerife.com/1RegionalPreferente/'; break;
				case 101: $ruta='https://futboltenerife.com/1regional_primera/grupo1'; break;
				case 102: $ruta='https://futboltenerife.com/1regional_primera/grupo2'; break;
				case 103: $ruta='https://futboltenerife.com/1regional_segunda/grupo1'; break;
				case 104: $ruta='https://futboltenerife.com/1regional_segunda/grupo2'; break;
				//case 105: $ruta='https://futboltenerife.com/1regional_segunda/grupo3'; break;
				//case 106: $ruta='https://futboltenerife.com/1juvenilhonor/'; break;
				case 107: $ruta='https://futboltenerife.com/1juvenil_prefe/'; break;
				case 108: $ruta='https://futboltenerife.com/1juvenil_primera/grupo1'; break;
				case 109: $ruta='https://futboltenerife.com/1juvenil_primera/grupo2'; break;
				case 110: $ruta='https://futboltenerife.com/1juvenil_primera/grupo3'; break;
				case 111: $ruta='https://futboltenerife.com/1juvenil_primera/grupo4'; break;
				case 112: $ruta='https://futboltenerife.com/1juvenil_segunda/grupo1'; break;
				case 113: $ruta='https://futboltenerife.com/1juvenil_segunda/grupo2'; break;
				case 114: $ruta='https://futboltenerife.com/1juvenil_segunda/grupo3'; break;
				case 115: $ruta='https://futboltenerife.com/1juvenil_segunda/grupo4'; break;
				case 116: $ruta='https://futboltenerife.com/1cadete_prefe/'; break;
				case 117: $ruta='https://futboltenerife.com/1cadete_primera/grupo1'; break;
				case 118: $ruta='https://futboltenerife.com/1cadete_primera/grupo2'; break;
				case 119: $ruta='https://futboltenerife.com/1cadete_primera/grupo3'; break;
				case 120: $ruta='https://futboltenerife.com/1cadete_primera/grupo4'; break;
				case 121: $ruta='https://futboltenerife.com/1cadete_primera/grupo5'; break;
				case 122: $ruta='https://futboltenerife.com/1cadete_primera/grupo6'; break;
				case 123: $ruta='https://futboltenerife.com/1cadete_primera/grupo7'; break;
				case 124: $ruta='https://futboltenerife.com/1cadete_primera/grupo8'; break;
				case 125: $ruta='https://futboltenerife.com/1femenino-preferente-tenerife'; break;


			}

			$url=$ruta;

		}
		
	break;




	case '1':
	$carpeta='00pnfg'; $territorial='03'; 

	$url='http://futgal.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 2000 registros. Se necesitan dos páginas
	$urlClubes='http://futgal.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://futgal.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.futgal.es/pnfg/NNws_LstNews?cod_primaria=5000452';

	$urlAgenda='http://www.futgal.es/pnfg/CAL_Calendario?cod_primaria=610';

	$urlActa='http://futgal.es/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	$urlClasi='http://futgal.es/pnfg/NPcd/NFG_VisClasificacion?cod_primaria=1000120&';

	
	break;


	case '3':
	$carpeta='00pnfg'; $territorial='18';
	$url='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=1; //casi 2000 registros. Se necesitan dos páginas
	$urlClubes='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://adminpcffcantabria.novanet.es/pnfg/NNws_LstNews?cod_primaria=5000289';

	$urlAgenda='';

	$urlActa='http://adminpcffcantabria.novanet.es/pnfg/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	
	break;
	
	case '5':
	$carpeta='00pnfg'; $territorial='01';
	$url='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';
	$page=2; //casi 1520 registros. Se necesitan dos páginas
	$urlClubes='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://efo87.fcf.novanet.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://fcf.cat/es/noticias';

	$urlAgenda='';

	$urlActa='http://efo87.fcf.novanet.es/pnfg/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	 
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

	$urlActa='http://www.ffm.novanet.es/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	
	break;

	case '9':
	case '10':
	$carpeta='00pnfg'; $territorial='06';
	$dominio1="https://www.rfaf.es/";
	//$dominio2="http://adminpcrfaf.novanet.es/";

	$url=$dominio1.'pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=10; //casi 4600 registros. Se necesitan dos páginas //1150 por pagina
	$urlClubes=$dominio1.'pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub=$dominio1.'pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews=$dominio1.'pnfg/NNws_LstNews?cod_primaria=5000289';

	$urlAgenda='';	

	$urlActa=$dominio1.'pnfg/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	
	break;

	case '11':
	$carpeta='00pnfg'; $territorial='11';
	$url='http://www.ffib.es/Fed/NPcd/NFG_CmpJornada?cod_primaria=1000110&CodTemporada=15&Sch_Codigo_Delegacion=1&Sch_Tipo_Juego=&';
    
    $urlClubes='http://www.ffib.es/Fed/NPcd/NFG_Clubes?cod_primaria=1000108&NPcd_Page=1&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffib.es/Fed/NPcd/NFG_VerClub?cod_primaria=1000108&codigo_club=';

	$urlNews='https://www.ffib.es/Fed/NNws_LstNews?cod_primaria=5000180';

	$urlAgenda='';

	$urlActa='http://www.ffib.es/Fed/NPcd/NFG_CmpPartido?cod_primaria=1000110&CodActa=xxx';

	
	break;	

	case '13':
	$carpeta='00pnfg'; $territorial='10';
	$url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 2070 registros. Se necesitan dos páginas
	$urlClubes='http://www.ffrm.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffrm.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.ffrm.es/pnfg/NNws_LstNews?cod_primaria=5001941';

	$urlAgenda='';
	$urlActa='http://www.ffrm.es/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';
			
	
	break;

	case '14':
	$carpeta='00pnfg'; $territorial='17';
	$url='http://www.fexfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 1400 registros. Se necesitan dos páginas
	$urlClubes='http://www.fexfutbol.com/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.fexfutbol.com/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='http://www.fexfutbol.com/pnfg/NNws_LstNews?cod_primaria=1000057';

	$urlAgenda='';

	$urlActa='http://www.fexfutbol.com/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	

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

	case '18':
	$carpeta='00pnfg'; $territorial='20';
	$url='http://www.ffcm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=15&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';

	$page=2; //casi 1600 registros. Se necesitan dos páginas apartir de 1500
	$urlClubes='http://www.ffcm.es/pnfg/NPcd/NFG_Clubes?cod_primaria=1000118&NPcd_Page='.$page.'&nueva_ventana=&Buscar=1&orden=&cod_club=&nclub=&Sch_CodCategoria=&cod_provincia=&localidad_txt=--+Seleccione+Provincia+--&localidad=0&code_delegacion=&cod_delegacion=&cod_postal=&NPcd_PageLines=';

	$urlClub='http://www.ffcm.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club=';

	$urlNews='https://www.ffcm.es/pnfg/NNws_LstNews?cod_primaria=5000208';

	$urlAgenda='';

	$urlActa='http://www.ffcm.es/pnfg/NPcd/NFG_CmpPartido?cod_primaria=1000120&CodActa=xxx&cod_acta=xxx';

	
	break;
	
	default:
		# code...
		break;
}

$bd=$bd.$comunidad_id;


?>