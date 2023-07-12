<?php

include('../simple_html_dom.php');

include('../00control/funciones.php');




$html = new simple_html_dom();

$url='https://isquad.es/competiciones_publico.php?id_temporada=68&id_competicion=422027&id_fase=429766&id_grupo=438734&id_ambito=6';


$content=getPage($url);




$string = str_get_html($content);

# load the curl string into the object.
$html->load($string);


foreach($html->find('td[colspan=4]') as $key => $e){
    $item['jornadas'][]=$e->plaintext;
}

$html->clear();
    unset($html);


imp($item);




//echo $calendario;

echo "finalizado";

    
    // clean up memory
    $html->clear();
    unset($html);


die;



?>


