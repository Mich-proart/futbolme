<?php

http://www.ffcv.es/ncompeticiones/server.php?action=listCmp&cat=??&mod=1&tmp=2018/2019


// example of how to use basic selector to retrieve HTML contents
include('../simple_html_dom.php');
 
$url='http://www.ffcv.es/ncompeticiones/server.php?action=listCmp&cat=53&mod=1&tmp=2018/2019';
$html = file_get_html($url);

// find all link
$paginas=array();
$enlaces=array();
foreach($html->find('a') as $e) {
	//if (substr($e->href,0,8)=='/search?') { $paginas[]=$e->href; }
	//if (substr($e->href,0,12)!='/directorio/') { continue; }	
    echo $e->href . '<br>';
    $enlaces[]=$e->href;
}

die;

foreach ($paginas as $key => $value) {
	$html = file_get_html($url.$value);
	foreach($html->find('a') as $e) {
		if (substr($e->href,0,12)!='/directorio/') { continue; }
		if (substr($e->href,0,8)=='/search?') { continue; }
	    //echo $e->href . '<br>';
	    $enlaces[]=$e->href;
	}
}

foreach ($enlaces as $key => $value) {
	
		$ret = scraping_slashdot($value);

		foreach($ret as $v) {
		    $nombre=$v['telefonoN'];
		    $nombre=str_replace('Dirección de ', '', $nombre);
		    echo $nombre.'<br>';
		    $direccion=$v['direccion'];
		    $direccion=str_replace($v['cp'], '', $direccion);
		    $direccion=str_replace($v['ciudad'], '', $direccion);
		    echo '<ul>';
		    echo '<li>'.$v['telefono'].'</li>';
		    echo '<li>'.$direccion.'</li>';
		    echo '<li>'.$v['cp'].'</li>';
		    echo '<li>'.$v['ciudad'].'</li>';
		    echo '</ul>';
		}
		die;
}




function scraping_slashdot($value) {
    // create HTML DOM
    $url='http://36electricistas.com'.$value;
    $html = file_get_html($url);
    // get article block
    foreach($html->find('article.professional') as $article) {
        // get title
        //$item['title'] = trim($article->find('a.datitle', 0)->plaintext);
        // get body
        $item['direccion'] = trim($article->find('p.company-address', 0)->plaintext);
        $item['cp'] = trim($article->find('span.zipcode', 0)->plaintext);
        $item['ciudad'] = trim($article->find('span.city-name', 0)->plaintext);
        $item['telefonoN'] = trim($article->find('h2', 0)->plaintext);
        $item['telefono'] = trim($article->find('span[itemprop=telephone]', 0)->plaintext);
        $ret[] = $item;
    }    
    // clean up memory
    $html->clear();
    unset($html);

    return $ret;
}

// -----------------------------------------------------------------------------
// test it!

?>