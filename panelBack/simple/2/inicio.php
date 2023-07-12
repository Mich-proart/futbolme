<?php

include('../simple_html_dom.php');

include('../00control/funciones.php');

$comunidad_id=2;

$torneos=torneo($comunidad_id+1);



foreach ($torneos as $kk => $value) {

	$torneo_id=$value['id'];
	if ($torneo_id<933){ continue; }
	
	$html = new simple_html_dom();

	$CodCompeticion=$value['CodCompeticion'];
	$CodFase=$value['CodFase'];
	$CodGrupo=$value['CodGrupo'];
	

	$url="https://isquad.es/competiciones_publico.php?id_temporada=68&id_competicion=$CodCompeticion&id_fase=$CodFase&id_grupo=$CodGrupo&id_ambito=6";

	imp($value);
	
	echo $url;

	$content=getPage($url);

	
	$string = str_get_html($content);
	$html->load($string);

	$jornadas=array();

	foreach($html->find('td[colspan=4]') as $e){
	    $jornadas[]=$e->plaintext;
	}

	$numJornadas=count($jornadas);
	$equipos=($numJornadas/2)+1;
	$partidosPorJornada=ceil($equipos/2);

	$html->clear();
    unset($html);



			$html = new simple_html_dom();

			$content=getPage($url);
			$string = str_get_html($content);

			# load the curl string into the object.
			$html->load($string);

			foreach ($html->find('div#calendario') as $div){
				foreach ($div->find('tr') as $k => $tr){
					$item[$k]['jornada'] = trim($tr->find('td[colspan=4]', 0)->plaintext);
				}
				foreach ($div->find('tr') as $k => $tr){					
					$item[$k]['local'] = trim($tr->find('td.celdacalendario', 0)->plaintext);
					$item[$k]['enlaceLocal'] = trim($tr->find('a.enlace_equipo', 0)->href);
					$item[$k]['escudoLocal'] = trim($tr->find('img.escudo_tabla', 0)->src);
					$item[$k]['escudoVisitante'] = trim($tr->find('img.escudo_tabla', 1)->src);
					$item[$k]['enlaceVisitante'] = trim($tr->find('a.enlace_equipo', 1)->href);
					$item[$k]['visitante'] = trim($tr->find('td.celdacalendario', 3)->plaintext);
				}				
			}
			

			$html->clear();
    		unset($html);

    		

    		foreach ($item as $k => $value) {

    			
    			if (!empty($value['jornada'])) {
    				$jornada=substr($value['jornada'], 0,10);
    				$jornada=str_replace('Jornada ', '', $jornada);
    				$fecha=substr($value['jornada'], -12);
					$dia=substr($fecha, 0,2);
					$mes=substr($fecha, 3,2);
					$anyo=substr($fecha, 6,4);
					$fecha2=$anyo.'-'.$mes.'-'.$dia;
					echo "<hr />Jornadas: ".$numJornadas." Equipos: ".$equipos." Partidos: ".$partidosPorJornada." Jornada ".$jornada." Fecha ".$fecha2.'<br />';
					continue;
    			}

    			
    										 https://asturfutbol.es/fenix/escudos/
    			$Cfederacion_id=substr($value['escudoLocal'], -11);
				$Cfederacion_id=str_replace('.jpg','',$Cfederacion_id);
				$nombre=$value['local'];
				$nombre=str_replace('"', '', $nombre);
				include('../00isquad/grabar_clubes.php');
				//el include nos devuelve el club_id
				$Efederacion_id=str_replace('competiciones_publico_equipo.php?id_equipo=','',$value['enlaceLocal']);
				$e=explode('&',$Efederacion_id);
				$Efederacion_id=$e[0];
				include('../00isquad/grabar_equipos.php');
				$local_id=$equipo_id;
				//el include nos devuelve el equipo_id

				$Cfederacion_id=substr($value['escudoVisitante'], -11);
				$Cfederacion_id=str_replace('.jpg','',$Cfederacion_id);
				$nombre=$value['visitante'];
				$nombre=str_replace('"', '', $nombre);
				$nombre=utf8_decode($nombre);
				include('../00isquad/grabar_clubes.php');				
				$Efederacion_id=str_replace('competiciones_publico_equipo.php?id_equipo=','',$value['enlaceVisitante']);
				$e=explode('&',$Efederacion_id);
				$Efederacion_id=$e[0];
				include('../00isquad/grabar_equipos.php');
				$visitante_id=$equipo_id;

				$goles_local=0;
				$goles_visitante=0;
				$clasificado=0;
				$acta='';
				$observaciones='';
				$arbitro='';
				$estadio='';				
				$hora_prevista='00:00:00';
				$hora_real=$hora_prevista;

				$estado_partido=0; 
				$fecha=$fecha2;
				

				include('../00isquad/grabar_partido.php');
				


				//die('hemos grabado el club, el equipo y el partido');
    		}
	
    		unset($item);
	//die('hemos grabado el calendario');
echo date('h:i:s') .'  key: '. $kk. "\n";
usleep(2000000);
echo date('h:i:s') . "\n";
}

echo 'Script finalizado';
?>