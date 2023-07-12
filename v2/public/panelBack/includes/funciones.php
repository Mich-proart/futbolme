
<?php
include ('_conexion.php');

function XidChat($temporada_id)
    {
    switch ($temporada_id) {
        case 1:
            $nombreTorneo='PRIMERA DIVISIÓN';
            $id_chat='34681924160-1626154007@g.us';
            $enlace_chat='https://chat.whatsapp.com/DvRFpMFULRaFjo35Rka99a';
            break;
        case 2:
            $nombreTorneo='SEGUNDA DIVISIÓN';
            $id_chat='34681924160-1626158091@g.us';
            $enlace_chat='https://chat.whatsapp.com/I2vt26vueY6KAUVaEIfxpj';
            break;
        case 3055:
            $nombreTorneo='1ª DIVISIÓN RFEF - Grupo 1';
            $id_chat='34681924160-1626158233@g.us';
            $enlace_chat='https://chat.whatsapp.com/IDRG62EYrsW3IYM0FnDbPm';
            break;
        case 3056:
            $nombreTorneo='1ª DIVISIÓN RFEF - Grupo 2';
            $id_chat='34681924160-1626158317@g.us';
            $enlace_chat='https://chat.whatsapp.com/ECtvaT6e4ABD43QLI1boOr';
            break;
        case 3057:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 1';
            $id_chat='34681924160-1626158442@g.us';
            $enlace_chat='https://chat.whatsapp.com/IjZLxQlIKnxEQ7owSfbxYm';
            break;
        case 3058:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 2';
            $id_chat='34681924160-1626158515@g.us';
            $enlace_chat='https://chat.whatsapp.com/G6lc70XLGvIGii8VESCxgz';
            break;
        case 3059:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 3';
            $id_chat='34681924160-1626158570@g.us';
            $enlace_chat='https://chat.whatsapp.com/CYZ8Bld9MkfBlFABG6AtSj';
            break;
        case 3060:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 4';
            $id_chat='34681924160-1626158659@g.us';
            $enlace_chat='https://chat.whatsapp.com/LF0xiV7XYxC4QBPaA4rNBL';
            break;
        case 3061:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 5';
            $id_chat='34681924160-1626158712@g.us';
            $enlace_chat='https://chat.whatsapp.com/GXkUra3aBS9C96AO68xdcw';
            break;

        case 214:
            $nombreTorneo='Primera División Femenina';
            $id_chat='34681924160-1626930899@g.us';
            $enlace_chat='https://chat.whatsapp.com/LkQyXt8xZFAFcUFothOE2u';
            break;


        case 1000:
            $nombreTorneo='Prueba';
            $id_chat='34678558201@c.us';
            $enlace_chat='https://chat.whatsapp.com/GXkUra3aBS9C96AO68xdcw';
            break;
        
        default:

            require_once '../includes/funciones.php';
            $mysqli = conectar();
            $sql='SELECT whatsapp FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$_GET['temporada_id'].')';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (!empty($r)){ 
                $id_chat=$r['whatsapp']; 
            } else { 
                $id_chat=''; 
            }
            break;
    }

    return $id_chat;
}

function nombreDia($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = utf8_encode(strftime('%A, %d de %B', $fecha));

        return $nombre;
    }

function rutaEscudo($club_id, $equipo_id){
    if ($equipo_id!=718 && $equipo_id!=672 && $equipo_id!=117){
        $ruta='/static/img/club/escudo'.$club_id.'.png';
    } else {
        $ruta='/static/img/equipos/escudo'.$equipo_id.'.png';
    }
    return $ruta;
}

function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}

function microtime_float()
{
    list($useg, $seg) = explode(' ', microtime());

    return (float) $useg + (float) $seg;
}

function guardarJSON($array, $ruta)
{
    //utf8_encode_deep($array);
    //imp($ruta);
    $jsonencoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    echo print_json_last_error(json_last_error());
    $fh = fopen($ruta, 'w');
    fwrite($fh, $jsonencoded);
    fclose($fh);
    //echo "Creado el fichero ".$ruta;
}

function print_json_last_error($error)
{
    $mensaje = '';
    switch ($error) {
        case JSON_ERROR_NONE:
            //$mensaje = ' - Sin errores';
            break;
        case JSON_ERROR_DEPTH:
            $mensaje = ' - Excedido tamaño máximo de la pila';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $mensaje = ' - Desbordamiento de buffer o los modos no coinciden';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $mensaje = ' - Encontrado carácter de control no esperado';
            break;
        case JSON_ERROR_SYNTAX:
            $mensaje = ' - Error de sintaxis, JSON mal formado';
            break;
        case JSON_ERROR_UTF8:
            $mensaje = ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
        default:
            $mensaje = ' - Error desconocido';
    }

    return $mensaje;
}

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
    //$useragent = 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)';
    //$useragent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
    $arrayUser = array(
        "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
        "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1",
        "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; InfoPath.1; MS-RTC LM 8)",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.36 Safari/525.19",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES) AppleWebKit/525.19 (KHTML, like Gecko) Version/3.1.2 Safari/525.2",
        "Mozilla / 5.0 (X11; Linux x86_64) AppleWebKit / 537.36 (KHTML, como Gecko) Chrome / 77.0.3865.90 Safari / 537.36",
        "Mozilla / 5.0 (iPhone; CPU iPhone OS 11_3_1 como Mac OS X) AppleWebKit / 603.1.30 (KHTML, como Gecko) Versión / 10.0 Mobile / 14E304 Safari / 602.1"
    );

    $seleccion = array_rand($arrayUser);
    $useragent = $arrayUser[$seleccion];
    //echo "<br />Proxis useragent: ". $useragent.' - ';
    $timeout= 10;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';
    
    

    $ch = curl_init($url); 
    //curl_setopt($ch, CURLOPT_USERPWD, "Maxsanchez:Sentmenat2004");
        
    curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
    //curl_setopt($ch, CURLOPT_PROXYTYPE, 7);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP_1_0);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);  
    //curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
    
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);    
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
    print_r(curl_getinfo($ch));
    if(curl_errno($ch))
    {
        //echo curl_error($ch);
        //return 'proxy: '.$proxy.' - '.$id.' - ERROR '.curl_error($ch);
        return '';
    }
    else
    {    
        return $content;        
    }
        curl_close($ch);

}


function getPageLibre ($url) {    
    //echo 'URL: '.$url.'<br />';
    $arrayUser = array(
        "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
        "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1",
        "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; InfoPath.1; MS-RTC LM 8)",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.36 Safari/525.19",
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES) AppleWebKit/525.19 (KHTML, like Gecko) Version/3.1.2 Safari/525.2",
        "Mozilla / 5.0 (X11; Linux x86_64) AppleWebKit / 537.36 (KHTML, como Gecko) Chrome / 77.0.3865.90 Safari / 537.36",
        "Mozilla / 5.0 (iPhone; CPU iPhone OS 11_3_1 como Mac OS X) AppleWebKit / 603.1.30 (KHTML, como Gecko) Versión / 10.0 Mobile / 14E304 Safari / 602.1"
    );

    $seleccion = array_rand($arrayUser);
    $useragent = $arrayUser[$seleccion];
    //echo "<br />Libre useragent: ". $useragent.' - ';
    $timeout= 5;
    $dir            = dirname(__FILE__);
    $cookie_file    = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

    
    $ch = curl_init($url); 
    //curl_setopt($ch, CURLOPT_USERPWD, "Maxsanchez:Sentmenat2004");
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
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);

    $content = curl_exec($ch);
    print_r(curl_getinfo($ch));
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





function listarTorneosPorCategoria($tipo_torneo, $categoria_torneo, $usuario_id=0)
{
    
    $campos2="";$union2="";$condicion="";
    if (1 == $tipo_torneo) {
        $campos2 = ', li.jornadas, li.jornadaActiva';
        $union2 = ' INNER JOIN liga li ON li.id=tor.id';
    }

    if (2 == $tipo_torneo) {
        $campos2 = ', eli.fase_activa, fa.tipo_eliminatoria';
        $union2 = ' INNER JOIN eliminatorio eli ON eli.id=tor.id
                  INNER JOIN fase fa ON fa.id=eli.fase_activa';        
    }

    $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
    AND tor.visible>3 AND tor.categoria_torneo_id='.$categoria_torneo;
    if ($usuario_id>0 && $usuario_id<1000) {
        $condicion.=' AND tor.usuario='.($usuario_id);
    }

    

    if (3 == $tipo_torneo) {
        if ($categoria_torneo==1 || $categoria_torneo==17){
            $dia = date('y-m-j');                 
        } else {
            $a = substr($categoria_torneo, 0, 4);
            $m = substr($categoria_torneo, 4, 2);
            $d = substr($categoria_torneo, -2);
            $dia = $a.'-'.$m.'-'.$d;
            //$dia='2019-09-14';
        }
        

        $campos2 = ''; //para ordenar este torneo
        $union2 = ' INNER JOIN partido p ON te.id=p.temporada_id';
        $condicion = " WHERE (p.fecha='".$dia."' OR p.estado_partido=2) AND tor.visible>4 AND tor.visible<100
        GROUP BY tor.categoria_torneo_id, tor.orden";
    }

    /*if (4 == $tipo_torneo) {
        $a = substr($categoria_torneo, 0, 4);
        $m = substr($categoria_torneo, 4, 2);
        $d = substr($categoria_torneo, -2);
        $dia = $a.'-'.$m.'-'.$d;
        //recojo la fecha como categoría torneo
        $campos2 = ''; //para ordenar este torneo
        $union2 = ' INNER JOIN partido p ON te.id=p.temporada_id';
        $condicion = " WHERE p.fecha='".$dia."' OR p.estado_partido=2
        GROUP BY tor.categoria_torneo_id, tor.orden";
    }*/

    $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, tor.apuestaMA, pa.nombre nombrePais, tor.categoria_torneo_id, tor.apifutbol_tipo,
    co.nombre nombreComunidad, tor.betsapi ';
    $tabla = ' torneo tor';
    $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
    $union.= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $orden = ' ORDER BY tor.apuestaMA DESC, tor.categoria_torneo_id, tor.comunidad_id, tor.orden';

    $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$condicion.$orden;   
    
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    
    $torneos=array();

    $torneos[0]=$resultado;


    if (1 == $tipo_torneo) {
        $campos2 = ', li.jornadas, li.jornadaActiva';
        $union2 = ' INNER JOIN liga li ON li.id=tor.id';
        $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
        AND tor.visible<5 AND tor.categoria_torneo_id='.$categoria_torneo;
    }

    if (2 == $tipo_torneo) {
        $campos2 = ', eli.fase_activa, fa.tipo_eliminatoria';
        $union2 = ' INNER JOIN eliminatorio eli ON eli.id=tor.id
                  INNER JOIN fase fa ON fa.id=eli.fase_activa';
        $condicion = ' WHERE tor.tipo_torneo='.$tipo_torneo.' 
        AND tor.visible<5 AND tor.categoria_torneo_id='.$categoria_torneo;
    }

     $campos = 'te.id, tor.nombre, tor.pais_id, tor.comunidad_id, tor.apuestaMA, pa.nombre nombrePais, tor.categoria_torneo_id, tor.apifutbol_tipo,
    co.nombre nombreComunidad ';
    $tabla = ' torneo tor';
    $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
    $union.= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $orden = ' ORDER BY tor.apuestaMA DESC, tor.categoria_torneo_id, tor.orden';
//echo "<pre>";
//var_dump($consulta);
//echo "</pre>";

    $consulta = 'SELECT '.$campos.$campos2.' FROM '.$tabla.$union.$union2.$condicion.$orden;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


    $torneos[1]=$resultado;



    return $torneos;
}

function guardarFILE($array, $ruta)
{
    $fh = fopen($ruta, 'w');
    fwrite($fh, $array);
    fclose($fh);
}

function poner_guion($cadena)
{
    // $cadena = strtolower($cadena);

    $cadena = utf8_decode($cadena);
    $cadena = trim($cadena);
    $cadena = str_replace('"', '', $cadena);
    $cadena = str_replace('/', '-', $cadena);
    $cadena = str_replace(',', '', $cadena);
    $cadena = str_replace(' - ', '-', $cadena);
    $cadena = str_replace(' ', '-', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('', '', $cadena);
    $cadena = str_replace('´', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    $cadena = strtolower($cadena);

    return $cadena;
}

function generaUrlTorneo($id) {
    $id = (int) $id;

    $sql = "
        SELECT t.*
        FROM temporada t
        WHERE t.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $temporada = $db->query($sql)->fetch_assoc();

    if (!$temporada) {
        return '';
    }

    $url = '/resultados-directo/torneo/' . poner_guion($temporada['nombre']) . '/' . $id . '/';

    return $url;
}

function generaUrlEquipo($id) {
    $id = (int) $id;

    $sql = "
        SELECT e.*
        FROM equipo e
        WHERE e.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $equipo = $db->query($sql)->fetch_assoc();

    if (!$equipo) {
        return '';
    }

    $url = '/resultados-directo/equipo/' . poner_guion($equipo['nombre']) . '/' . $id . '/datos';

    return $url;
}

function generaUrlPartido($id) {
    $id = (int) $id;

    $sql = "
        SELECT el.nombre equipoLocal, ev.nombre equipoVisitante
        FROM partido p
        LEFT JOIN equipo el ON p.equipoLocal_id = el.id
        LEFT JOIN equipo ev ON p.equipoVisitante_id = ev.id
        WHERE p.id = " . $id . "
    ";

    $db = new \App\Application\Helpers\DbHelper();

    $partido = $db->query($sql)->fetch_assoc();

    if (!$partido) {
        return '';
    }

    $url = '/resultados-directo/partido/' . poner_guion($partido['equipoLocal']) . '-' . poner_guion($partido['equipoVisitante']) . '/' . $id;

    return $url;
}


function generaUrl($tipo, $id) {
    $url = '';

    switch ($tipo) {
        case 'torneo':
            $url = generaUrlTorneo($id);
            break;

        case 'equipo':
            $url = generaUrlEquipo($id);
            break;

        case 'partido':
            $url = generaUrlPartido($id);
            break;
    }

    return $url;
}

function nombreDiaCompleto($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = utf8_encode(strftime('%A, %d de %B de %Y', $fecha));

        return $nombre;
    }



?>

