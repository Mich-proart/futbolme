<?php

include('../simple_html_dom.php');

include('../00control/funciones.php');

$comunidad_id=2;

$torneos=torneo($comunidad_id+1);

foreach ($torneos as $key => $value) {
	
	$html = new simple_html_dom();

	$CodCompeticion=$value['CodCompeticion'];
	$CodFase=$value['CodFase'];
	$CodGrupo=$value['CodGrupo'];
	$torneo_id=$value['id'];

	$url="https://isquad.es/competiciones_publico.php?id_temporada=68&id_competicion=$CodCompeticion&id_fase=$CodFase&id_grupo=$CodGrupo&id_ambito=6";

	imp($value);
	
	echo $url;

	$content=getPage($url);

	
	$string = str_get_html($content);
	$html->load($string);

	$jornadas=array();

	foreach($html->find('td[colspan=4]') as $key => $e){
	    $jornadas[]=$e->plaintext;
	}

	$numJornadas=count($jornadas);
	$equipos=($numJornadas/2)+1;
	$partidosPorJornada=ceil($equipos/2);

	$html->clear();
    unset($html);


	foreach ($jornadas as $key => $value) {
		$jornada=$key+1;
		$fecha=substr($value, -12);
		$dia=substr($fecha, 0,2);
		$mes=substr($fecha, 3,2);
		$anyo=substr($fecha, 6,4);
		$fecha2=$anyo.'-'.$mes.'-'.$dia;
		echo "<hr />Jornadas: ".$numJornadas." Equipos: ".$equipos." Partidos: ".$partidosPorJornada." Jornada ".$jornada." Fecha ".$fecha.'<br />';


			$html = new simple_html_dom();

			$url.='&jornada='.$jornada;
			$content=getPage($url);
			$string = str_get_html($content);

			# load the curl string into the object.
			$html->load($string);

			foreach($html->find('tr.filagorda') as $k => $tr){
				if ($k==$partidosPorJornada){ break; }
				$item[$k]['local'] = trim($tr->find('td.p-t-20', 0)->plaintext);
				$item[$k]['enlaceLocal'] = trim($tr->find('a', 0)->href);
				$item[$k]['escudoLocal'] = trim($tr->find('img', 0)->src);
				$item[$k]['visitante'] = trim($tr->find('td.p-t-20', 1)->plaintext);
				$item[$k]['enlaceVisitante'] = trim($tr->find('a', 1)->href);
				$item[$k]['escudoVisitante'] = trim($tr->find('img', 1)->src);
				$item[$k]['estadio'] = trim($tr->find('td.p-t-20', 2)->plaintext);
				$item[$k]['resulCasa'] = trim($tr->find('div.resultadocompeticionestabla', 0)->plaintext);
				$item[$k]['resulFuera'] = trim($tr->find('div.resultadocompeticionestabla', 1)->plaintext);	
			}

			foreach($html->find('tr.filafina') as $k => $tr){	
				if ($k==$partidosPorJornada){ break; }
				$item[$k]['fecha'] = trim($tr->find('div.mediacelda', 0)->plaintext);
				$item[$k]['hora'] = trim($tr->find('div.mediacelda', 1)->plaintext);
				$item[$k]['jornada'] = $jornada;
				$item[$k]['fecha2'] = $fecha2;
			}

			$html->clear();
    		unset($html);

    		//imp($item);

    		foreach ($item as $k => $value) {
    			$Cfederacion_id=str_replace('https://www.asturfutbol.es/fenix/escudos/', '', $item[$k]['escudoLocal']);
				$Cfederacion_id=str_replace('.jpg','',$Cfederacion_id);
				$nombre=$item[$k]['local'];
				$nombre=str_replace('"', '', $nombre);
				include('../00isquad/grabar_clubes.php');
				//el include nos devuelve el club_id
				$Efederacion_id=str_replace('competiciones_publico_equipo.php?id_equipo=','',$item[$k]['enlaceLocal']);
				$e=explode('&',$Efederacion_id);
				$Efederacion_id=$e[0];
				include('../00isquad/grabar_equipos.php');
				$local_id=$equipo_id;
				//el include nos devuelve el equipo_id

				$Cfederacion_id=str_replace('https://www.asturfutbol.es/fenix/escudos/', '', $item[$k]['escudoVisitante']);
				$Cfederacion_id=str_replace('.jpg','',$Cfederacion_id);
				$nombre=$item[$k]['visitante'];
				$nombre=str_replace('"', '', $nombre);
				include('../00isquad/grabar_clubes.php');				
				$Efederacion_id=str_replace('competiciones_publico_equipo.php?id_equipo=','',$item[$k]['enlaceVisitante']);
				$e=explode('&',$Efederacion_id);
				$Efederacion_id=$e[0];
				include('../00isquad/grabar_equipos.php');
				$visitante_id=$equipo_id;

				$goles_local=$item[$k]['resulCasa'];
				$goles_visitante=$item[$k]['resulFuera'];
				$clasificado=0;
				$acta='';
				$observaciones='';
				$arbitro=$item[$k]['arbitro']??'';
				$estadio=$item[$k]['estadio']??'';
				$arbitro=str_replace('"', '', $arbitro);
				$estadio=str_replace('"', '', $estadio);
				$hora_prevista=substr($item[$k]['hora'],0,5)??'00:00:00';
				$hora_real=$hora_prevista;

				if(is_numeric($goles_local) && is_numeric($goles_visitante)) {
					$estado_partido=1;
				} else { $estado_partido=0; }

				$fecha=$item[$k]['fecha'];
				if ($fecha=='Por Determinar') {
					$fecha=$fecha2;
				} else {
					$dia=substr($fecha, 0,2);
					$mes=substr($fecha, 3,2);
					$anyo=substr($fecha, 6,4);
					$fecha=$anyo.'-'.$mes.'-'.$dia;
				}

				include('../00isquad/grabar_partido.php');
				


				//die('hemos grabado el club, el equipo y el partido');
    		}

			
			//die('hemos grabado la jornada');
		
	}

	die('hemos grabado el calendario');

}


?>