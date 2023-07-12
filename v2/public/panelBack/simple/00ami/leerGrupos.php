 <?php
$mysqli = conectar();

$sql="SELECT id,nombre,competicion_id valor FROM torneo WHERE comunidad_id=".$i." AND grupo_id=0 ORDER BY orden";
$resultadoSQL = mysqli_query($mysqli, $sql);
$tors = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

foreach ($tors as $kk => $v) {
    $categorias[$kk]['id']=$v['id'];
    $categorias[$kk]['nombre']=$v['nombre'];
    $categorias[$kk]['valor']=$v['valor']; 
    $competicion_id=$v['valor'];   
 
    $urlNueva=$url2;
    echo $urlNueva.'<br />';

    
    $sql='SELECT id,ip FROM proxis WHERE fallo=0 ORDER BY uso DESC, fallo';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);     
    foreach ($proxis as $key => $value) {
        $proxi=$value['ip'];
        $id_proxi=$value['id'];
        echo 'Proxi: '.$proxi.' id_proxi: '.$id_proxi.'<br />'; 
        $html = new simple_html_dom();
        $content=getPagePost($urlNueva, $proxi,$id_proxi,$competicion_id);
        $largo=strlen($content);

            $string = str_get_html($content);
            $html->load($string);

            foreach($html->find('a') as $k => $e) {
                $url = trim($e->href);
                $categorias[$kk]['torneos'][$k]['url']=$url; 
            }

            foreach($html->find('div') as $k => $e) {
                $valor = trim($e->target);
                $nombre = trim($e->plaintext);
                $categorias[$kk]['torneos'][$k]['valor']=$valor;
                $categorias[$kk]['torneos'][$k]['nombre']=$nombre; 
            } 
                 
        
        if (isset($categorias[$kk]['torneos'])) { break; }

        $sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
        mysqli_query($mysqli, $sql); 
        unset($proxis[$key]);
        unset($proxi);
        unset($id_proxi);
        $html->clear();
        unset($html);  
        $totalProxis=count($proxis);
        echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
    }
    
    $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
    mysqli_query($mysqli, $sql); 

    $html->clear();
    unset($html);

    
          
    
} //tors sin grupo_id


echo '<pre>';
    print_r($categorias);
    echo '</pre>';
    
      
                
    foreach ($categorias as $key => $value) {
        $id=$value['id'];
        echo $id.' '.$value['valor'].' '.$value['nombre'].'<br /> ';
        $contador=0;
        foreach ($value['torneos'] as $k1 => $v1) {
            $contador++;
            $grupo_id=$v1['valor'];
            $grupo=$v1['nombre'];
            $ruta=$v1['url'];            
            if ($contador==1){
                $sqContador='UPDATE torneo SET url="'.$ruta.'", grupo="'.$grupo.'", grupo_id='.$grupo_id.' WHERE id='.$id;
                echo $sqContador."<br />";
                mysqli_query($mysqli, $sqContador);
            } else {
                $nuevo=duplicar($id,$grupo,$grupo_id,$contador,$ruta);
                echo 'registro duplicado:'.$nuevo.' - del registro '.$id; 
            }                       
        }   
    }

    



function getPagePost ($url,$proxy,$id,$categoria) {
    $useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
    $timeout= 10;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

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
    
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_ENCODING, "" );

    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "idioma=es&disciplina_url=futbol-11&tipus=2&categoria=".$categoria);
    
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
        return 'proxy:'.$proxy.' - '.$id; //curl_error($ch).' - '.
    }
    else
    {
        return $content;        
    }
        curl_close($ch);

}


?>
