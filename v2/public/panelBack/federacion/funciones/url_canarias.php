<?php
$carpeta='canarias'; $territorial='14';

		if (isset($filera)){

			$ruta='';

			switch ($filera['apiRFEFcompeticion']) {		

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

?>