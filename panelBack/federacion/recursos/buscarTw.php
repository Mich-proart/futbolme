<?php
$static_v = 9; 
define('_FUTBOLME_', 1);


include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php'); ?>

<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

<?php
$tiempo_inicio = microtime_float(); 


$equipos = unserialize(stripslashes($_POST['equipos']));

$temporada_id=$_POST['temporada_id'];

imp($_POST);

foreach ($equipos as $key => $value) {

$palabra=$value['equipo'];
$palabra=str_replace(' ', '%20', $palabra);


$url='https://www.google.com/search?q=twitter+'.$palabra;

echo $url.' ... Buscando <b>'.$value['equipo'].'</b><br />';



		
		$html = new simple_html_dom();
		$content=getPagePropio($url); 

		

		$string = str_get_html($content);
		$html->load($string);

				$string = str_get_html($content);
				$html->load($string);

				//echo $html;

				$partidos=array();

				foreach($html->find('div.rc') as $key => $tabla){	
                    foreach($tabla->find('h3.LC20lb') as $k => $e)
                        $partidos[$key]=$e->plaintext;
			    } // del html de los partidos de la jornada
				
		imp($partidos);

        foreach ($partidos as $k => $p) {

            $findme   = '@';
            $pos = strpos($p, $findme);

            $tw=$value['tw']??'-';

            if ($pos === false) { continue; } 





            $twitter=preg_replace('/(.*)\(@(.*)\)(.*)/', '$2', $p);

            echo $p.' -- <a href="https://twitter.com/'.$twitter.'" target="_blank">'.$twitter.'</a><br />'; ?>
        <form id="f-<?php echo $value['id']; ?>" onsubmit="grabarTwitter(event, $(this).serialize(),<?php echo $value['id']; ?>)">
                <input type="hidden" name="equipo_id" value="<?php echo $value['id']; ?>">
                <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
                <input type="text" name="slug" size="25" value="<?php echo $twitter; ?>">
                <input type="submit" name="grabar" value="grabar"> <b>@<?php echo $tw?></b>
                <div id="alerta-<?php echo $value['id']; ?>"></div>
                </form>



        <?php }	
		
		$html->clear();
    	unset($html);

        echo '<hr />';

        

}


$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

?>

</body>
</html>

<?php

function getPagePropio ($url) {
    
    //echo 'URL: '.$url.'<br />';

    $useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
    $timeout= 10;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

    $ch = curl_init($url);

    //curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
    //curl_setopt($ch, CURLOPT_PROXYTYPE, 7);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP_1_0);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
    
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
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    $content = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo curl_error($ch);
        return 'ERROR '.curl_error($ch);
    }
    else
    {    
        return $content;        
    }
        curl_close($ch);

}

?>
