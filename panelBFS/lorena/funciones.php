<?php



function borrarCalendario($temporada_id,$torneo_id)
{
    $mysqli = conectarFM();    
    $sq = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'UPDATE liga SET jornadas=0, jornadaActiva=1 WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);    
}

function jornadaAceroFB($id){
    $mysqli = conectar();    
    $sq = 'UPDATE torneo SET jornadas=0 WHERE id='.$id;
    mysqli_query($mysqli, $sq);
}

function quitarTorneoFM($torneo_id)
{
    $mysqli = conectarFM();    
    $sq = 'DELETE FROM liga WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM eliminatorio WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    $sq = 'DELETE FROM torneo WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    
}



function quitarTorneoFB($torneo_id,$grupo_id,$territorial)
{
    $mysqli = conectar();  
    
    $file1 = $territorial.'/calendarios/'.$grupo_id.'-equipos.json';
    unlink($file1);
    $file2 = $territorial.'/calendarios/'.$grupo_id.'-jornadas.json';
    unlink($file2);
    $sq = 'DELETE FROM torneo WHERE id='.$torneo_id;
    echo $sq.';<br />';
    mysqli_query($mysqli, $sq);
    
}



function categorias()
{
    $consulta = 'SELECT nombre,orden FROM categoria ORDER BY orden';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}


function torneo($comunidad_id)
{
    $consulta = 'SELECT id,nombre,CodCompeticion,CodFase,CodGrupo FROM torneo ORDER BY id';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}



function duplicar($id,$grupo,$grupo_id,$contador,$ruta=0) {

$mysqli = conectar();

$sql="SELECT comunidad_id, orden, categoria, nombre, competicion_id FROM torneo WHERE id=".$id;
$resultadoSQL = mysqli_query($mysqli, $sql);
$c = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

$orden=$c['orden']+$contador;

$sql='INSERT INTO torneo (comunidad_id, orden, categoria, nombre, competicion_id, grupo, grupo_id, url) 
VALUES ("'.$c['comunidad_id'].'","'.$orden.'","'.$c['categoria'].'","'.$c['nombre'].'","'.$c['competicion_id'].'","'.$grupo.'","'.$grupo_id.'","'.$ruta.'")';
echo $sql."<br />";
mysqli_query($mysqli, $sql);
$newid = mysqli_insert_id($mysqli);

return $newid;
}

function quitarFuncion($gol) {
    $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)"}<\/style>/', '$2,', $gol);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<span style="display:none;">(.*?)<\/span><\/span>/', '$2,$3', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<\/span>/', '$2,', $gl);
    return $gl;
}

function getPage ($url,$proxy,$id) {
    
    //echo 'URL: '.$url.'<br />';

    //$useragent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
    $useragent = 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)';
    //$useragent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
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
        return 'proxy: '.$proxy.' - '.$id.' - ERROR '.curl_error($ch);
    }
    else
    {    
        return $content;        
    }
        curl_close($ch);

}



?>