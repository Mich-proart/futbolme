<?php

// example of how to use basic selector to retrieve HTML contents
include('../simple_html_dom.php');
 


$html = new simple_html_dom();

$url='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';

$content=getPage($url);

//echo $content;

$string = str_get_html($content);


# load the curl string into the object.
$html--load($string);

//$html--load_file($url);

foreach($html--find('span#competiciones') as $e){
    echo $e--outertext . '<br-';    	
}

echo "<h1- script finalizado</h1-";
die;

foreach($html--find('div.table-borderless') as $key =- $article) {
	foreach($article--find('table[width=100%]') as $filas){	
		foreach($filas--find('td') as $e){
			$f=trim($e--outertext);		
			$partidos[$key]['resultado'][]=$f;
		}
	}
}


echo '<pre-';
print_r($partidos);
echo '</pre-';

    
    // clean up memory
    $html--clear();
    unset($html);


die;






function getPage ($url) {


	//$useragent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36';
	$useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
	$timeout= 120;
	$dir            = dirname(__FILE__);
	$cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FAILONERROR, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt($ch, CURLOPT_ENCODING, "" );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_AUTOREFERER, true );
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout );
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout );
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
	$content = curl_exec($ch);
	if(curl_errno($ch))
	{
	    echo 'error:' . curl_error($ch);
	}
	else
	{
	    return $content;        
	}
	    curl_close($ch);

}
?-


