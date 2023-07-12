<?php
include_once('../../simple_html_dom.php');

function scraping_slashdot() {
    // create HTML DOM
    $html = file_get_html('http://36electricistas.com/directorio/electricista-va-valencia');

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
$ret = scraping_slashdot();

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
?>