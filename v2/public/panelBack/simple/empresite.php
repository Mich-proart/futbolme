<meta http-equiv="refresh" content="30" />
<?php
function getPageLibre ($url) {    
        
        $timeout= 5;
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
        //curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
        $content = curl_exec($ch);

        print_r(curl_getinfo($ch));
    
        if(curl_errno($ch)) {
            return 'sin proxy:  - ERROR '.curl_error($ch);
        } else {    
            return $content;        
        }
            curl_close($ch);

    } // getPageLibre

// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');


$f='enlaces.json';
$enlaces = file_get_contents($f);
$enlaces=json_decode($enlaces);       

foreach ($enlaces as $k => $grupos) {

	foreach ($grupos as $k1 => $url) {

		$f='conPaginas_'.$k.'_'.$k1.'.json';

		$grupo = file_get_contents($f);
		$grupo=json_decode($grupo);	
		

		foreach ($grupo as $k2 => $v2) {
			
			$url=$v2->url;
			$paginas=$v2->paginas;
			$ruta=$url;

			for ($i=1; $i < ($paginas+1) ; $i++) { 
				if ($i>1){
					$pag='PgNum-'.$i.'/';
					$ruta=$url.$pag;
				}
				echo '<hr />'.$ruta;
				$f='resultados_'.$k.'_'.$k1.'_'.$k2.'_'.$i.'.json';
				echo '<br />'.$f;

				if (!@file_exists($f)) {
					$html = new simple_html_dom();
					$content=getPageLibre($ruta); 
					$string = str_get_html($content);
					$html->load($string);

					//echo $html;				
					$resultado=array();
					foreach($html->find('button.no_movil') as $key =>  $e) {
					  	$cadena=$e->attr['onclick'];
					  	$cadena=str_replace("empresiteutil.redirectEmpresaConMapa('",'https://empresite.eleconomista.es/', $cadena);
					  	$cadena=str_replace("', 'on');",'',$cadena);
					  	//echo $cadena;
					  	$resultado[$key]['enlace']=$cadena;
					  	unset($html);
					} //se ejecuta la ruta de la empresa.

					$jsonencoded = json_encode($resultado, JSON_UNESCAPED_UNICODE);
		    		$fh = fopen($f, 'w');
		    		fwrite($fh, $jsonencoded);
		    		fclose($fh);
					die('finalizado '.$f);

				} /*else { // si no existe fichero

					
					
				}*/	

			} //bucle de paginas			
		} //grupo
	} //grupos
} //enlaces

?>