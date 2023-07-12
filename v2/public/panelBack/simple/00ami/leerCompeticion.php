 <?php
echo $url.'<br />';

$mysqli = conectar(); 
$sql='SELECT id,ip FROM proxis WHERE fallo<5 ORDER BY uso DESC, fallo';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

    
    foreach ($proxis as $key => $value) {

        $proxi=$value['ip'];
        $id_proxi=$value['id'];
        echo 'Proxi: '.$proxi.'<br />';
        echo 'id_proxi: '.$id_proxi.'<br />';
        
        
        $html = new simple_html_dom();
        $content=getPagePost($url,$proxi,$id_proxi);  
        if (strlen($content)>100) { break; }
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

    var_dump($content); 

    $string = str_get_html($content);
    $html->load($string);
    $categorias=array();
    
        foreach($html->find('div') as $key => $div){        
            $nombre = trim($div->plaintext);
            $valor = trim($div->target);
            $categorias[$key]['nombre']=$nombre;
            $categorias[$key]['valor']=$valor;           
        } 

    $html->clear();
    unset($html); 

    echo '<pre>';
    print_r($categorias);
    echo '</pre>';

    foreach ($categorias as $k1 => $v1) {
        $categoria='-';
            $orden=($k1+1)*100;
            $nombre=$v1['nombre'];
            $competicion_id=$v1['valor'];           
            
                $sql="SELECT id FROM torneo WHERE comunidad_id=".$i." AND competicion_id=".$competicion_id;
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                if (count($resultado)==0){
                    $sql="INSERT INTO torneo (comunidad_id, orden, categoria, nombre, competicion_id) VALUES ('".$i."', '".$orden."', '".$categoria."', '".$nombre."', '".$competicion_id."')";
                    mysqli_query($mysqli, $sql);
                    echo $sql.'<br />';
                } 
        }
    

    
    die ('finalizado');


function getPagePost ($url,$proxy,$id) {
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
    curl_setopt($ch, CURLOPT_POSTFIELDS, "disciplina=19308233");
    //disciplina" value="19308233" &postvar2=value2&postvar3=value3

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
