<?php

include('../simple_html_dom.php');

include('../00control/funciones.php');




$html = new simple_html_dom();

$url='https://isquad.es/competiciones_publico.php?id_temporada=68&id_competicion=422027&id_fase=429766&id_grupo=438734&id_ambito=6&jornada=27';


$content=getPage($url);




$string = str_get_html($content);

# load the curl string into the object.
$html->load($string);

foreach($html->find('tr.filagorda') as $k => $tr){
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
	$item[$k]['fecha'] = trim($tr->find('div.mediacelda', 0)->plaintext);
	$item[$k]['hora'] = trim($tr->find('div.mediacelda', 1)->plaintext);	
}

imp($item);
die;











//echo $calendario;

echo "finalizado";

    
    // clean up memory
    $html->clear();
    unset($html);


die;



?>


