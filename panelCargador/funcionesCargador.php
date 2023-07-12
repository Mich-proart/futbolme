
<?php
function quitarFuncion($gol) { ?>

   

    <?php $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)"}<\/style>/', '$2,', $gol);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<span style="display:none;">(.*?)<\/span><\/span>/', '$2,$3', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<\/span>/', '$2,', $gl); ?>

   

    <?php return $gl;
}

function getPage ($url,$proxy,$id) {
    $useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
    $timeout= 10;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

    $arrayUser = array(
        "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
        "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1",
        "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; InfoPath.1; MS-RTC LM 8)",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.36 Safari/525.19",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES) AppleWebKit/525.19 (KHTML, like Gecko) Version/3.1.2 Safari/525.2",
        "Mozilla / 5.0 (Windows NT 6.1; Win64; x64; rv: 47.0) Gecko / 20100101 Firefox / 47.3",
        "Mozilla / 5.0 (Macintosh; Intel Mac OS X xy; rv: 42.0) Gecko / 20100101 Firefox / 43.4",
        "Mozilla / 5.0 (X11; Linux x86_64) AppleWebKit / 537.36 (KHTML, como Gecko) Chrome / 77.0.3865.90 Safari / 537.36",
        "Mozilla / 5.0 (iPhone; CPU iPhone OS 11_3_1 como Mac OS X) AppleWebKit / 603.1.30 (KHTML, como Gecko) 
Versión / 10.0 Mobile / 14E304 Safari / 602.1"
    );

    $seleccion = array_rand($arrayUser);
    $useragent = $arrayUser[$seleccion];
    echo "<br />getPage-funcionesCargador-useragent: ". $useragent.' ';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
    //curl_setopt($ch, CURLOPT_PROXYTYPE, 7);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP_1_0);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
    
    curl_setopt($ch, CURLOPT_AUTOREFERER, true );
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_MAXREDIRS, 9 );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout );
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    $content = curl_exec($ch);
    if(curl_errno($ch))
    {
        //echo curl_error($ch);
        return 'proxy: '.$proxy.' - '.$id.' - ERROR '.curl_error($ch);
    }
    else
    {
        return $content;        
    }
        curl_close($ch);

}


function getPageLibre ($url,$proxy,$id) {   
    //echo 'URL: '.$url.'<br />';
    $useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
    
    $timeout= 10;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

     $arrayUser = array(
        "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
        "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1",
        "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; InfoPath.1; MS-RTC LM 8)",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.36 Safari/525.19",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES) AppleWebKit/525.19 (KHTML, like Gecko) Version/3.1.2 Safari/525.2",
        "Mozilla / 5.0 (Windows NT 6.1; Win64; x64; rv: 47.0) Gecko / 20100101 Firefox / 47.3",
        "Mozilla / 5.0 (Macintosh; Intel Mac OS X xy; rv: 42.0) Gecko / 20100101 Firefox / 43.4",
        "Mozilla / 5.0 (X11; Linux x86_64) AppleWebKit / 537.36 (KHTML, como Gecko) Chrome / 77.0.3865.90 Safari / 537.36",
        "Mozilla / 5.0 (iPhone; CPU iPhone OS 11_3_1 como Mac OS X) AppleWebKit / 603.1.30 (KHTML, como Gecko) 
Versión / 10.0 Mobile / 14E304 Safari / 602.1"
    );

    $seleccion = array_rand($arrayUser);
    $useragent = $arrayUser[$seleccion];
    echo "<br />getPageLibre-funcionesCargador-useragent: ". $useragent.' ';

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
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    $content = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo curl_error($ch);
        return 'sin proxy:  - ERROR '.curl_error($ch);
    }
    else
    {    
        return $content;        
    }
        curl_close($ch);

}

?>