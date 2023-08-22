<?php
namespace App\Application\Helpers;


use App\Application\Repositories\GeneralRepository;

class FuncionesHelper
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
        $this->generalRepo = new GeneralRepository($db);
    }

    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                        $this->rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    else
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
                }
            }
            rmdir($dir);
        }
    }

    function rutaEscudo($club_id, $equipo_id){
        if ($equipo_id!=718 && $equipo_id!=672){
            $ruta='/img/club/escudo'.$club_id.'.png';
        } else {
            $ruta='/img/equipos/escudo'.$equipo_id.'.png';
        }
        return $ruta;
    }

    function publicidadAmazon($id){
        $directorio = '../json/amazon';
        $ficheros  = scandir($directorio);
        $f=array();
        foreach ($ficheros as $key => $v) {
            $ff=explode('-',$v);
            if ($ff[0]==$id) { $f[]=$v; }
        }
        if (count($f)>0){
            if (count($f)>1) {
                $x=rand(0,(count($f)-1));
                $fichero=$f[$x];
            } else {
                $fichero=$f[0];
            }
        }

        if (isset($fichero)){ ?>
            <div style="background-color: dimgray; z-index: 0; width: 120px" class="pull-right">
                <?php include $directorio.'/'.$fichero;?>
            </div>
        <?php }
    }

    function diferenciaFechas($fecha){
        $fecha1 = date('Y-m-d H:i:s');
        $fecha2 = date($fecha);
        $fecha1 = date_create($fecha1);
        $fecha2 = date_create($fecha2);
        $diferencia = date_diff($fecha2, $fecha1);
        return $diferencia;
    }

    function enviarEmail($titulo,$valor){
        $message = '
<html>
<head>
  <title>'.$titulo.'</title>
</head>
<body>
  <p><strong>Valor:</strong></p>
  <p>'.$valor.'</p>
</body>
</html>
';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf8';

// Additional headers
        $headers[] = 'From: Futbolme <futbolme@futbolme.com>';
//$headers[] = 'Cc: javier.cuervas@gmail.com ';
//$headers[] = 'Reply-To: '.$email;

        mail('futbolme@gmail.com', $titulo, $message,  implode("\r\n", $headers));
        $ok = true;
    }



    function generarMenu()
    {
        $resultado = menu();
        $menu = prepararMenu($resultado);
        guardarJSON($menu, '../json/menu.json');
        echo "Generado un nuevo menú para futbolme.com";die;
    }

    function menu()
    {
        $campos = 'tor.id, tor.nombre, tor.categoria_torneo_id, tor.tipo_torneo, te.id temporada_id, tor.orden, 
    pa.nombre nombrePais, pa.id imagenPais, co.nombre nombreComunidad, co.id imagenComunidad';
        $tabla = ' torneo tor';
        $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
        $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
        $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
        $condicion = ' WHERE tor.visible>4 AND tor.visible<100 AND tor.id>7';
        $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }


    function prepararMenu($array)
    {
        $menu = array(
            'tercera' => array(),
            'RFEF' => array(),
            'FIFA' => array(),
            'UEFA' => array(),
            'autonomica' => array(),
            'juevenil' => array(),
            'cadete' => array(),
            'infantil' => array(),
            'femenino' => array(),
            'europa' => array(),
            'america' => array(),
            'sala' => array(),
        );

        foreach ($array as $item) {

            if (1 == $item['categoria_torneo_id'] and 1 == $item['tipo_torneo']) {
                $menu['tercera'][] = $item;
            } elseif (1 == $item['categoria_torneo_id']) {
                $menu['RFEF'][] = $item;
            } elseif (2 == $item['categoria_torneo_id']) {
                $menu['FIFA'][] = $item;
            } elseif (3 == $item['categoria_torneo_id']) {
                $menu['UEFA'][] = $item;
            } elseif (4 == $item['categoria_torneo_id']) {
                if (!array_key_exists($item['nombreComunidad'], $menu['autonomica'])) {
                    $menu['autonomica'][$item['nombreComunidad']] = array($item);
                } else {
                    $menu['autonomica'][$item['nombreComunidad']][] = $item;
                }
            } elseif (5 == $item['categoria_torneo_id']) {
                //if ($item['imagenComunidad']>1){ continue; }
                $menu['juvenil'][] = $item;
            } elseif (6 == $item['categoria_torneo_id']) {
                if (!array_key_exists($item['nombreComunidad'], $menu['cadete'])) {
                    $menu['cadete'][$item['nombreComunidad']] = array($item);
                } else {
                    $menu['cadete'][$item['nombreComunidad']][] = $item;
                }
            } elseif (14 == $item['categoria_torneo_id']) {
                if (!array_key_exists($item['nombreComunidad'], $menu['infantil'])) {
                    $menu['infantil'][$item['nombreComunidad']] = array($item);
                } else {
                    $menu['infantil'][$item['nombreComunidad']][] = $item;
                }
            } elseif (7 == $item['categoria_torneo_id']) {
                if ($item['imagenComunidad']>1){ continue; }
                $menu['femenino'][] = $item;
            } elseif (8 == $item['categoria_torneo_id']) {
                if (!array_key_exists($item['nombrePais'], $menu['america'])) {
                    $menu['america'][$item['nombrePais']] = array($item);
                } else {
                    $menu['america'][$item['nombrePais']][] = $item;
                }
            } elseif (9 == $item['categoria_torneo_id']) {
                //imp($item);
                if (!array_key_exists($item['nombrePais'], $menu['europa'])) {
                    $menu['europa'][$item['nombrePais']] = array($item);
                } else {
                    $menu['europa'][$item['nombrePais']][] = $item;
                }
            } elseif (17 == $item['categoria_torneo_id']) {
                //if ($item['imagenComunidad']>1){ continue; }
                $menu['sala'][] = $item;
            }
        }


        return $menu;
    }




    function generarPartidosDia()
    {
        ob_start();
        $fecha = new \DateTime();
        $dia = $fecha->format('Y-m-d');
        $resultado = partidosDia($dia);
        guardarJSON($resultado['partidos'], '../json/index.json');
        guardarJSON($resultado['directos'], '../json/directos.json');
        ob_end_flush();
        //$headers = "From: Partidos del día <no-reply@futbolme.com>\r\n";
        //$message = count($resultado)." partidos.\r\n";
        //mail("futbolme@futbolme.com","partidosDia - Futbolme.com",$message,$headers);
        echo count($resultado['partidos']).' partidos. '.count($resultado['directos']).' directos.';
    }


    function generarPartidosDiaFed()
    {
        ob_start();
        $fecha = new \DateTime();
        $dia = $fecha->format('Y-m-d');
        $partidosFed = partidosDiaFed($dia);
        guardarJSON($partidosFed, '../json/indexFed.json');
        ob_end_flush();
    }

    function guardarJSON($array, $ruta)
    {
        //utf8_encode_deep($array);
        //imp($ruta);
        $jsonencoded = json_encode($array, JSON_UNESCAPED_UNICODE);
        #echo print_json_last_error(json_last_error());

        $rutaArray = explode('/', $ruta);
        array_pop($rutaArray);
        $rutaArrayMenosFichero = $rutaArray;

        $rutaMenosFicheroString = implode('/', $rutaArrayMenosFichero);

        if (!file_exists($rutaMenosFicheroString)) {
            mkdir($rutaMenosFicheroString, 0777, true);
        }

        file_put_contents($ruta, $jsonencoded);

        #$fh = fopen($ruta, 'w');
        #fwrite($fh, $jsonencoded);
        #fclose($fh);
        //echo "Creado el fichero ".$ruta;
    }

    function borrarFile($ruta)
    {
        unlink($ruta);
        echo 'Fichero '.$ruta.' eliminado';
    }

    function guardarFILE($array, $ruta)
    {
        $fh = fopen($ruta, 'w');
        fwrite($fh, $array);
        fclose($fh);
    }

    function cabeceras(){
        $dia=date('Y-m-d');
        $campos = "DISTINCT p.temporada_id, tor.tipo_torneo,
tor.nombre nombreTorneo,tor.torneoCorto,tor.categoria_torneo_id,tor.traduccion,
tor.apuesta apuesta_torneo,co.nombre nombreComunidad,co.id idComunidad,
pa.nombre nombrePais,pa.id idPais, 
(select count(id) from partido where temporada_id=p.temporada_id and fecha='".$dia."') partidos,
(select count(id) from partido where estado_partido=1 and temporada_id=p.temporada_id and fecha='".$dia."') finalizados,
(select count(id) from partido where estado_partido=2 and temporada_id=p.temporada_id and fecha='".$dia."') directos";
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
        $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
        $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
        $condicion = " WHERE p.fecha='".$dia."'
AND ec.nombre<>'SIN PAIS'
AND ef.nombre<>'SIN PAIS' AND tor.visible>4 AND tor.visible<100";
        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $cabeceras = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        //imp($resultado);
        guardarJSON($cabeceras, '../json/index_cabeceras.json');
    }

    function cabecerasFed(){
        $dia=date('Y-m-d');
        $campos = "DISTINCT p.temporada_id, tor.tipo_torneo,
tor.nombre nombreTorneo,tor.torneoCorto,tor.categoria_torneo_id,tor.traduccion,
tor.apuesta apuesta_torneo,co.nombre nombreComunidad,co.id idComunidad,
pa.nombre nombrePais,pa.id idPais, 
(select count(id) from partido where temporada_id=p.temporada_id and fecha='".$dia."') partidos,
(select count(id) from partido where estado_partido=1 and temporada_id=p.temporada_id and fecha='".$dia."') finalizados,
(select count(id) from partido where estado_partido=2 and temporada_id=p.temporada_id and fecha='".$dia."') directos";
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
        $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
        $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
        $condicion = " WHERE p.fecha='".$dia."'
AND ec.nombre<>'SIN PAIS'
AND ef.nombre<>'SIN PAIS' AND tor.visible>99";
        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        //imp($resultado);
        $cabeceras=array();
        foreach ($resultado as $key => $value) {
            $cabeceras[$value['idComunidad']][$value['temporada_id']]=$value;
        }
        guardarJSON($cabeceras, '../json/index_cabecerasFed.json');
    }


    function canonicalize($string)
    {
        return null === $string ? null : mb_convert_case($string, MB_CASE_LOWER, mb_detect_encoding($string));
    }

    function insertarEvento($eventos){
        $mysqli = conectar();
        foreach ($eventos as $even) {
            $even['resultado']=$even['goles_local']." - ".$even['goles_visitante'];
            if ($even['evento']==19) { continue; } //evento 19 = no jugado.

            switch ($even['evento']) {
                case '1': case '2':
                $fecha = $even['fecha']; $hora = $even['hora_prevista'];
                if ($hora && '00:00:11' != $hora) {
                    $h = ' - '.substr($hora, 0, 5);
                    $even['valor'] = 'Fecha-hora';
                } else {
                    $h = '';
                    $even['valor'] = 'Fecha';
                }
                $leyenda = utf8_encode(nombreDiaMini($fecha));
                $even['resultado'] = $leyenda.$h;
                break;
                case '3':
                    //para el arbitro
                    break;
                case '5': $even['valor'] = '¡¡ GOL !! '.$even['local']; break;
                case '6': $even['valor'] = '¡¡ GOL !! '.$even['visitante']; break;
                case '7': $even['valor'] = 'Comienza el partido...'; break;
                case '8': $even['valor'] = 'Descanso'; break;
                case '9': $even['valor'] = 'Inicia la segunda parte...'; break;
                case '13': $even['valor'] = '¡¡ FINAL !!'; break;
                case '21': $even['valor'] = 'Prórroga'; break;
                case '22': $even['valor'] = 'Prórroga - 1ª Parte '; break;
                case '23': $even['valor'] = 'Prórroga - Descanso '; break;
                case '24': $even['valor'] = 'Prórroga - 2ª Parte '; break;
                case '20': $even['valor'] = 'penaltis '; break;
                case '26': //para televisados
                    break;
            }



            $sql = 'SELECT partido_id,valor FROM evento WHERE 
        partido_id='.$even['partido_id']." 
        AND valor='".$even['valor']."' 
        AND resultado='".$even['resultado']."' 
        ORDER BY id DESC LIMIT 30";

            $resultadoSQL = mysqli_query($mysqli, $sql);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            echo $sql.'<br />';
            if (0 == count($resultado)) {
                $consulta = "INSERT INTO evento (evento, partido_id, valor, equipoLocal_id, equipoVisitante_id, momento, local, visitante, resultado)
                VALUES ('".$even['evento']."','".$even['partido_id']."','".$even['valor']."','".$even['equipoLocal_id']."','".$even['equipoVisitante_id']."',NOW(),'".$even['local']."','".$even['visitante']."','".$even['resultado']."')";

                if (!mysqli_query($mysqli, $consulta)) {
                    printf("Errormessage: %s\n", mysqli_error($mysqli));
                }
                //echo $consulta;
                $f=$even['equipoLocal_id'].'-'.$even['equipoVisitante_id'].'-'.$even['temporada_id'].'-'.$even['evento'];
                guardarJSON($even, '../json/eventos/'.$f.'.json');

            }
        }

    }



//*************************************************FUNCIONES TWITTER****************

    function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=".rawurlencode($value);
        }

        return $method.'&'.rawurlencode($baseURI).'&'.rawurlencode(implode('&', $r));
    }

    function buildAuthorizationHeader($oauth)
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach ($oauth as $key => $value) {
            $values[] = "$key=\"".rawurlencode($value).'"';
        }
        $r .= implode(', ', $values);

        return $r;
    }

    function returnTweet($usuario, $equipo_id, $origen=0)
    {

        if (0 == $equipo_id) { return "ko ".$usuario; }

        if (0 == $usuario) {
            $consulta = 'SELECT slug FROM equipo WHERE id='.$equipo_id;
            $resultadoSQL = $this->db->query($consulta);
            $resultado = $this->db->fetch($resultadoSQL);
            $usuario = $resultado['slug'];
        }

        //var_export($usuario);

        $consumer_key='18Qv8oHn1SdC45uf4uDUj7CZz';
        $consumer_secret='2ZJi6ejVY1nuz061mnAVZkUNIoceyyJRZ6Uerkw747iUOL5PY5';
        $oauth_access_token='1326235259218898944-MRIPrAlii9Jp5RpQds44RY4yMImmqc';
        $oauth_access_token_secret='Lj4e3oWLQsoNc6v7ChbmyoPkm89yvZZ6B5sd5oo5G4i6F';

        $twitter_timeline = 'user_timeline';  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

        //  create request
        $request = array(
            'screen_name' => $usuario,
            'count' => '10',
        );

        $oauth = array(
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_access_token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0',
        );

        //  merge request and oauth to one array
        $oauth = array_merge($oauth, $request);

        //  do some magic
        $base_info = $this->buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
        $composite_key = rawurlencode($consumer_secret).'&'.rawurlencode($oauth_access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        //  make request
        $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
        $options = array(
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?".http_build_query($request),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        );

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

        $t = json_decode($json, true);

        if (!isset($t['errors'])) {
            if ($origen==0){
                $this->guardarJSON($t, '../json/twits/'.$equipo_id.'_twits.json');
            } else {
                if ($origen==100){ //panelBack
                    $this->guardarJSON($t, '../json/twits/'.$equipo_id.'_twits.json');
                } else {
                    $this->guardarJSON($t, '../../json/twits/'.$equipo_id.'_twits.json');
                }
            }

        }



        return 'Ok '.$usuario;
    }

    function convertirUrls($ret)
    {
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", '\\1<a href="\\2" >\\2</a>', $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", '\\1<a href="http://\\2" >\\2</a>', $ret);
        $ret = preg_replace("/<a href=(.*?)>(.*?)<\/a>/", '<a href="$1">Ver en twitter</a>', $ret);
        $ret = preg_replace("/@(\w+)/", '<a href="http://www.twitter.com/\\1" >@\\1</a>', $ret);
        $ret = preg_replace("/#(\w+)/", '<a href="http://search.twitter.com/search?q=\\1" >#\\1</a>', $ret);
        $ret = preg_replace("/'/D", '"', $ret);

        return $ret;
    }

//***********************fin de las funciones para twiter*************************************



    /**************CRON DIA*****************/


    function generarTrofeoFutbolme()
    {
        $liga = trofeoFutbolmeLiga();
        $torneo = trofeoFutbolmeTorneo();
        $todo = trofeoFutbolmeTodo();

        $top10 = array();
        foreach ($todo as $key => $value) {
            if (10 == $key) {
                break;
            }
            $top10[] = $value;
        }

        guardarJSON($top10, '../json/trofeoFutbolmeTop.json');
        guardarJSON($todo, '../json/trofeoFutbolme.json');
        guardarJSON($liga, '../json/trofeoFutbolmeLiga.json');
        guardarJSON($torneo, '../json/trofeoFutbolmeTorneo.json');
    }



    function contarPuntos($dia, $usuario = 0)
    { //programa FIDELIDAD
        if ($usuario > 0) {
            $filtro = "p.fecha='".$dia."'  AND a.usuario_id=".$usuario;
        } else {
//        $diaAnterior = new \DateTime();
            $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
            $diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
            $filtro = "p.fecha='".$diaAnterior."' ";
        }
        $consulta = 'SELECT count(a.acierto), a.acierto, 
	CASE 
	WHEN a.acierto=0 THEN count(a.acierto)*0
	WHEN a.acierto=1 THEN count(a.acierto)*10
	WHEN a.acierto=2 THEN count(a.acierto)*50
	WHEN a.acierto=3 THEN count(a.acierto)*250
	END AS puntos1,
	a.usuario_id, 
	(select username from usuario where id=a.usuario_id) usuario,
    p.fecha
	FROM apuesta a INNER JOIN partido p ON a.partido_id=p.id 
	WHERE a.porra_id=1 AND '.$filtro.' AND p.estado_partido=1 
	GROUP BY a.usuario_id, a.acierto, p.fecha
    ORDER BY p.fecha, a.usuario_id, a.acierto';
        //echo $consulta;die;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $puntos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $puntos_usuario = array();
        $puntos_usuario2 = 0;
        foreach ($puntos as $fila) {
            $aciertos1 = 0;
            $aciertos2 = 0;
            $aciertos3 = 0;
            $puntos_usuario[$fila['usuario']][$fila['fecha']]['fecha'] = $fila['fecha'];
            $puntos_usuario[$fila['usuario']][$fila['fecha']]['usuario_id'] = $fila['usuario_id'];
            if (1 == $fila['acierto']) {
                $aciertos1 = $fila['count(a.acierto)'];
                $puntos_usuario[$fila['usuario']][$fila['fecha']]['aciertos1'] = $aciertos1;
                $puntos_usuario2 = $puntos_usuario2 + ($aciertos1 * 10);
            }
            if (2 == $fila['acierto']) {
                $aciertos2 = $fila['count(a.acierto)'];
                $puntos_usuario[$fila['usuario']][$fila['fecha']]['aciertos2'] = $aciertos2;
                $puntos_usuario2 = $puntos_usuario2 + ($aciertos2 * 50);
            }
            if (3 == $fila['acierto']) {
                $aciertos3 = $fila['count(a.acierto)'];
                $puntos_usuario[$fila['usuario']][$fila['fecha']]['aciertos3'] = $aciertos3;
                $puntos_usuario2 = $puntos_usuario2 + ($aciertos3 * 250);
            }
        }

        if (0 == $usuario) {
            foreach ($puntos_usuario as $usuarios) {
                foreach ($usuarios as $fila) {
                    if (isset($fila['aciertos1'])) {
                        $puntos1 = $fila['aciertos1'];
                    } else {
                        $puntos1 = 0;
                    }
                    if (isset($fila['aciertos2'])) {
                        $puntos2 = $fila['aciertos2'];
                    } else {
                        $puntos2 = 0;
                    }
                    if (isset($fila['aciertos3'])) {
                        $puntos3 = $fila['aciertos3'];
                    } else {
                        $puntos3 = 0;
                    }
                    $usuario_id = $fila['usuario_id'];
                    $fecha = $fila['fecha'];
                    $sql = 'DELETE FROM apuestaacumulado 
				WHERE usuario_id='.$usuario_id." AND periodo='".$fecha."'";
                    $resultadoSQL = mysqli_query($mysqli, $sql);

                    $consulta = 'INSERT INTO apuestaacumulado(usuario_id, periodo, puntos1, puntos2, puntos3) 
				VALUES ('.$usuario_id.",'".$fecha."',".$puntos1.','.$puntos2.','.$puntos3.')';

                    $resultadoSQL = mysqli_query($mysqli, $consulta);
                }
            }

            $dias10 = \DateTime::createFromFormat('Y-m-d', $diaAnterior);
            $dias10 = $dias10->modify('-10 day')->format('Y-m-d');
            $consulta = "DELETE FROM usuario WHERE enabled=0 AND last_login<'".$dias10."'";
            $resultadoSQL = mysqli_query($mysqli, $consulta);
        } else {
            return $puntos_usuario2;
        }
    }

    /**************FIN DE CRON DIA****************
     * @param $ob
     */

    function imp($ob)
    {
        if (!empty($ob)) {
            echo '<pre>';
            print_r($ob);
            echo '</pre>';
        }
    }

/////

    function microtime_float()
    {
        list($useg, $seg) = explode(' ', microtime());

        return (float) $useg + (float) $seg;
    }

    function generaPass()
    {
        $cadena = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $longitudCadena = strlen($cadena);
        $pass = '';
        $longitudPass = 6;
        //Creamos la contraseña
        for ($i = 1; $i <= $longitudPass; ++$i) {
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos = mt_rand(0, $longitudCadena - 1);
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= $cadena[$pos];
        }

        return $pass;
    }

    function desglosarTexto($texto)
    {
        $txt3 = '';
        $txt2 = '';
        $txt1 = '';
        $texto = explode('*', $texto);
        $valores = count($texto);
        //	echo "<br />valores: ".$valores;
        if (1 == $valores) {
            $txt3 = $texto[0];
            $txt1 = '';
            $txt2 = '';
        }
        if (2 == $valores) {
            $t = $texto[1];
            $l = substr($t, 0, 1);
            if ('A' == $l) {
                $txt1 = substr($t, 1);
                $txt2 = '';
            } else {
                $txt2 = substr($t, 1);
                $txt1 = '';
            }
            $txt3 = $texto[0];
        }
        if (3 == $valores) {
            $txt1 = substr($texto[1], 1);
            $txt2 = substr($texto[2], 1);
            $txt3 = $texto[0];
        }

        $texto[0] = $txt3;
        $texto[1] = $txt1;
        $texto[2] = $txt2;

        return $texto;
    }

    function utf8_encode_deep(&$input)
    {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } elseif (is_array($input)) {
            foreach ($input as &$value) {
                utf8_encode_deep($value);
            }

            unset($value);
        } elseif (is_object($input)) {
            $vars = array_keys(get_object_vars($input));

            foreach ($vars as $var) {
                utf8_encode_deep($input->$var);
            }
        }
    }

    function utf8_decode_deep(&$input)
    {
        if (is_string($input)) {
            $input = utf8_decode($input);
        } elseif (is_array($input)) {
            foreach ($input as &$value) {
                utf8_decode_deep($value);
            }

            unset($value);
        } elseif (is_object($input)) {
            $vars = array_keys(get_object_vars($input));

            foreach ($vars as $var) {
                utf8_decode_deep($input->$var);
            }
        }
    }



    /*function guardarTXT($array, $ruta) {

        $fh = fopen($ruta, "w");
        fwrite($fh, $array.PHP_EOL);
        fclose($fh);

    }*/

    /**
     * @param $temporada_id
     * @param $jornadaActiva
     *
     * @return string
     */
    function generarXML($temporada_id, $jornadaActiva)
    {
        require_once 'conexionMYSQL.php';
        $conexion = new conexionMYSQL();
        $link = $conexion->conexion();

        $consulta = 'SELECT jornada,estado_partido,
	(select nombreCorto from equipo where id=equipoLocal_id) local, 
	(select nombreCorto from equipo where id=equipoVisitante_id) visitante,
	goles_local, goles_visitante FROM partido 
	WHERE temporada_id='.$temporada_id.' AND  jornada='.$jornadaActiva;
        //echo $consulta;

        $resultado = mysqli_query($link, $consulta);

        $campo = array();
        // llenamos el array de nombres de campos
        for ($i = 0, $iMax = mysqli_num_fields($resultado); $i < $iMax; ++$i) {
            $campo[$i] = mysqli_fetch_field_direct($resultado, $i);
        }
        // creamos el documento XML
        $dom = new DOMDocument('1.0', 'UTF-8');
        $doc = $dom->appendChild($dom->createElement('partidos'));
        // recorremos el resultado
        for ($i = 0, $iMax = mysqli_num_rows($resultado); $i < $iMax; ++$i) {
            // creamos el item
            $nodo = $doc->appendChild($dom->createElement('partido'));
            // agregamos los campos que corresponden
            foreach ($campo as $b => $bValue) {
                $campoTexto = $nodo->appendChild($dom->createElement($campo[$b]));
//            $campoTexto->appendChild($dom->createTextNode(mysqli_data_seek($resultado, $i, $b)));
                $campoTexto->appendChild($dom->createTextNode(mysqli_data_seek($resultado, $i)));
            }
        }
        // retornamos el archivo XML como cadena de texto
        $dom->formatOutput = true;

        return $dom->saveXML();
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



    function prepararPartidosLiga($array)
    {
        $partidos = array();

        foreach ($array as $item) {
            if (!array_key_exists($item['jornada'], $partidos)) {
                $partidos[$item['jornada']] = array();
            }

            if (!array_key_exists($item['fecha'], $partidos[$item['jornada']])) {
                $partidos[$item['jornada']][$item['fecha']] = array();
            }

            /*if ($activa==$item['jornada']) {

                $partidos['activa'] = $item;

            }*/

            $partidos[$item['jornada']][$item['fecha']][] = $item;
        }

        //var_dump($partidos['activa']); die;

        return $partidos;
    }

    function prepararPartidosEliminatorio($array)
    {
        $partidos = array();

        foreach ($array as $item) {
            if (!array_key_exists($item['jornada'], $partidos)) {
                $partidos[$item['jornada']] = array();
            }

            if (!array_key_exists($item['grupo_id'], $partidos[$item['jornada']])) {
                $partidos[$item['jornada']][$item['grupo_id']] = array();
            }

            if (!array_key_exists($item['fecha'], $partidos[$item['jornada']][$item['grupo_id']])) {
                $partidos[$item['jornada']][$item['grupo_id']][$item['fecha']] = array();
            }

            $partidos[$item['jornada']][$item['grupo_id']][$item['fecha']][] = $item;
        }

        return $partidos;
    }

    function prepararFasesEliminatorio($array)
    {
        $fases = array();

        foreach ($array as $item) {
            $fases[$item['fase_id']] = $item;
        }

        return $fases;
    }

    function prepararGruposEliminatorio($temporada_id, $fases)
    {
        $grupos = array();

        foreach ($fases as $fase) {
            if (3 == $fase['tipo_eliminatoria']) {
                $gruposFaseSQL = $this->generalRepo->Xfases_grupos($temporada_id, $fase['fase_id']);

                $gruposFase = array();

                foreach ($gruposFaseSQL as $item) {
                    $gruposFase[$item['grupo_id']] = $item;
                }

                if (count($gruposFase) > 0) {
                    $grupos[$fase['fase_id']] = $gruposFase;
                }
            }
        }

        return $grupos;
    }

    function prepararTelevisados($array, $routeParser)
    {
        $funcionesHelper = new FuncionesHelper($this->db);

        $televisados = array();

        foreach ($array as $item) {
            if (!array_key_exists($item['fecha'], $televisados)) {
                $televisados[$item['fecha']] = array();
            }

            if (!array_key_exists($item['id'], $televisados[$item['fecha']])) {
                $televisados[$item['fecha']][$item['id']] = array();

                $televisados[$item['fecha']][$item['id']]['tvs'] = array();
            }

            $item['pgPartido'] = $routeParser->urlFor('partido_index', [
                'slug' => $funcionesHelper->poner_guion($item['local'] . '-' . $item['visitante']),
                'idPartido' => $item['id'],
            ]);;

            $televisados[$item['fecha']][$item['id']]['partido'] = $item;

            $tv = array(
                'medio_id' => $item['idMedio'],
                'nombreMedio' => $item['nombreMedio'],
                'id_original' => $item['id_original'],
            );

            $televisados[$item['fecha']][$item['id']]['tvs'][] = $tv;
        }

        return $televisados;
    }

    function prepararGolesTarjetas($goles, $tarjetas)
    {
        $result = array(
            'local' => array(),
            'visitante' => array(),
        );
        foreach ($goles as $gol) {
            $gol['gol'] = 1;
            if ('1' === $gol['esLocal'] && 10 != $gol['tipo']) {
                $result['local'][] = $gol;
            }
            if ('0' === $gol['esLocal'] && 10 == $gol['tipo']) {
                $result['local'][] = $gol;
            }
            if ('0' === $gol['esLocal'] && 10 != $gol['tipo']) {
                $result['visitante'][] = $gol;
            }
            if ('1' === $gol['esLocal'] && 10 == $gol['tipo']) {
                $result['visitante'][] = $gol;
            }
        }
        foreach ($tarjetas as $tarjeta) {
            $tarjeta['gol'] = 0;
            if (1 == $tarjeta['esLocal']) {
                $result['local'][] = $tarjeta;
            } else {
                $result['visitante'][] = $tarjeta;
            }
        }

        usort(
            $result['local'],
            function ($a, $b) {
                return $a['tipo'] - $b['tipo'];
            }
        );
        usort(
            $result['visitante'],
            function ($a, $b) {
                return $a['tipo'] - $b['tipo'];
            }
        );

        usort(
            $result['local'],
            function ($a, $b) {
                return $a['minuto'] - $b['minuto'];
            }
        );

        usort(
            $result['visitante'],
            function ($a, $b) {
                return $a['minuto'] - $b['minuto'];
            }
        );

        return $result;
    }


    function nombremes($mes)
    {
        setlocale(LC_TIME, 'spanish');
        $nombre = strftime('%B', mktime(0, 0, 0, $mes, 1, 2000));

        return $nombre;
    }

    function nombreDia($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = utf8_encode(strftime('%A, %d de %B', $fecha));

        return $nombre;
    }

    function nombreDiaCompleto($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = utf8_encode(strftime('%A, %d de %B de %Y', $fecha));

        return $nombre;
    }

    function getTime($horaR, $horaP, $desfase)
    {
        $now = date('Y-m-d H:i:s');
        $horaReal = $horaR;
        $horaPrevista = $horaP;
        $now = date_create($now);
        $horaReal = date_create($horaReal);
        $horaPrevista = date_create($horaPrevista);

        $interval = date_diff($horaReal, $horaPrevista);
        $hInterval = $interval->h * 60;
        $iInterval = $interval->i;
        //interval nos permite saber el tiempo que hay desde la hora prevista
        //hasta la hora real y esto nos hara saber en que periodo estamos
        //-45 será la primera parte
        //-90 sera la segunda parte
        //-105 será la primera parte de la prórroga
        //-150 será la segunda parte de la prórroga
        $time = date_diff($now, $horaReal);
        $o = new ReflectionObject($time); //para poder crear una nueva propiedad hora
        $p = $o->getProperty('h'); //p ahora es hora
        $h = $p->getValue($time); //d es el valor de hora
        $o = new ReflectionObject($time); //para poder crear una nueva propiedad hora
        $p = $o->getProperty('i'); //p ahora es hora
        $i = $p->getValue($time); //d es el valor de hora

        $o = new ReflectionObject($time); //para poder crear una nueva propiedad hora
        $p = $o->getProperty('invert'); //p ahora es hora
        $invert = $p->getValue($time); //d es el valor de hora

        $parte = 0;

        if (($hInterval + $iInterval) <= 45) {
            $parte = 1;
        } else {
            $parte = 2;
        }

        $masminutos = 0;
        $mdif = 0;
        if ($desfase > 199) {
            $masminutos = (($desfase - 200) + 45);
            $mdif = ($desfase - 200);
            $parte = 2;
        }
        if ($desfase > 99 && $desfase < 200) {
            $masminutos = ($desfase - 100);
            $mdif = ($desfase - 100);
            $parte = 1;
        }

        $mR = (($h * 60) + $i) + $mdif;

        //echo $mR."<br />"

        if (1 == $parte) {
            $color = '#f07474';
            $minuto = ($mR) + 1;
            if ($minuto > 45) {
                $minuto = '45+';
            }
            $tiempo = 'Minuto '.$minuto;
        } elseif (2 == $parte) {
            $color = '#7cc002';
            //if ($mdif>0) {
            //$minuto = $mR;
            //} else {
            $minuto = (($mR) + 45) + 1;
            //}
            $minutoReal = $minuto;
            if ($minuto > 90) {
                $minuto = '90+';
            }
            $tiempo = 'Minuto '.$minuto;
        } else {
            $color = '';
            $tiempo = '';
        }

        //imp($hInterval + $iInterval);

        $response = array(
            'color' => $color,
            'tiempo' => $tiempo,
            'invert' => $invert,
            'h' => $h,
            'i' => $i,
            'minutoReal' => $mR,
        );

        return $response;
    }

    function getTime1p($horaR)
    {
        $now = date('Y-m-d H:i:s');
        $horaReal = $horaR;
        $now = date_create($now);
        $horaReal = date_create($horaReal);

        $time = date_diff($now, $horaReal);
        $color = '#610B0B';
        $minuto = ((($time->h * 60) + $time->i) + 90) + 1;

        if ($minuto > 105) {
            $minuto = '105+';
        }
        $tiempo = 'Minuto '.$minuto;

        $response = array('color' => $color, 'tiempo' => $tiempo, 'minuto' => $minuto);

        return $response;
    }

    function getTime2p($horaR)
    {
        $now = date('Y-m-d H:i:s');
        $horaReal = $horaR;
        $now = date_create($now);
        $horaReal = date_create($horaReal);

        /*$now = new \DateTime('now');
        $now->format('h:i');

        $horaReal = $horaR['date'];
        $horaReal = date_create($horaReal);*/

        $time = date_diff($now, $horaReal);
        $color = '#0B3B0B';
        $minuto = ((($time->h * 60) + $time->i) + 105) + 1;

        if ($minuto > 120) {
            $minuto = '120+';
        }
        $tiempo = 'Minuto '.$minuto;

        $response = array('color' => $color, 'tiempo' => $tiempo, 'minuto' => $minuto);

        return $response;
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

    function bbcode_to_html($texto)
    {
        // Limpiamos las posibles etiquetas que puedan colocar
        $texto = strip_tags($texto);
        // Creamos el array $search que busca los BBCode simples y el array $replace que los reemplaza por la etiqueta HTML correspondiente

        $texto = preg_replace('/\[url\](.*?)\[\/url\]/', '<a href="$1">$1</a>', $texto);

        $search = array(
            '[u]',
            '[/u]',
            '[b]',
            '[/b]',
            '[i]',
            '[/i]',
            '[/url]',
            '[/size]',
            '[/color]',
            '[/quote]',
            '[quote]',
            'viewtopic.php?',
        );
        $replace = array(
            '<u>',
            '</u>',
            '<b>',
            '</b>',
            '<i>',
            '</i>',
            '</a>',
            '</span>',
            '</span>',
            '</div>',
            '<div style="color:red">',
            'http://www.futbolplus.com/viewtopic.php?',
        );
        // Realizamos el reemplazo con la función str_replace()
        $texto = str_replace($search, $replace, $texto);
        // Buscamos y reemplazamos etiquetas más complejas con preg_replace()
        $texto = preg_replace('/\[url=(.*?)\]/', '<a href="$1">', $texto);
        $texto = preg_replace('/\[img\](.*?)\[\/img\]/', '<img src="$1" style="max-width:300px">', $texto);

        //$texto = preg_replace('/\[youtube\](.*?)\[\/youtube\]/', '<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/$1"><param name="wmode" value="transparent"><embed src="http://www.youtube.com/v/$1" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></object>', $texto);

        $texto = preg_replace('/\[size=(\d*?)\]/', '<span style="font-size: $1px">', $texto);
        $texto = preg_replace('/\[color=(\#[0-9A-F]{6}+)\]/', '<span style="color: $1">', $texto);
        $texto = preg_replace('/\[quote=(.*?)\]/', '<div style="color:red"><b>$1</b>', $texto);
        $texto = str_replace('font-size: 45px', 'font-size: 30px', $texto);
        $texto = str_replace('font-size: 35px', 'font-size: 20px', $texto);
        $texto = str_replace('font-size: 125px', 'font-size: 30px', $texto);
        $texto = str_replace('font-size: 150px', 'font-size: 35px', $texto);
        $texto = str_replace('font-size: 180px', 'font-size: 40px', $texto);
        $texto = str_replace('font-size: 200px', 'font-size: 45px', $texto);
        $texto = str_replace('[quote]', '<div style="color:orange">', $texto);
        $texto = str_replace('[youtube]', '<iframe width="300" height="247" src="https://www.youtube.com/embed/', $texto);
        $texto = str_replace('[/youtube]', '" frameborder="0" allowfullscreen></iframe>', $texto);

        return $texto;
    }

    function clasPromedioGoles($cti)
    {
        $mysqli = conectar();

        if (9 != $cti) {
            if (1 == $cti) {
                $fichero = 'nacional';
            }
            if (4 == $cti) {
                $fichero = 'autonomica';
            }
            if (5 == $cti) {
                $fichero = 'juvenil';
            }
            if (6 == $cti) {
                $fichero = 'cadete';
            }
            if (14 == $cti) {
                $fichero = 'infantil';
            }
            if (7 == $cti) {
                $fichero = 'femenino';
            }
            if (8 == $cti) {
                $fichero = 'america';
            }
            $consulta = 'SELECT t.pais_id, te.id,te.nombre,co.nombre comunidadNombre,p.nombre paisNombre, t.discr, t.orden FROM temporada te 
	  INNER JOIN torneo t ON te.torneo_id=t.id 
	  INNER JOIN pais p ON t.pais_id=p.id
	  INNER JOIN comunidad co ON t.comunidad_id=co.id
	  WHERE t.visible=5 AND t.categoria_torneo_id='.$cti.' AND t.tipo_torneo=1
	  ORDER BY t.discr DESC';
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
            guardarJSON($resultado, '../json/promedio_'.$fichero.'.json');
        } else {
            $consulta = 'SELECT t.pais_id, te.id,te.nombre,p.nombre paisNombre, t.discr, t.orden FROM temporada te 
	  INNER JOIN torneo t ON te.torneo_id=t.id 
	  INNER JOIN pais p ON t.pais_id=p.id
	  WHERE (t.visible=5 AND t.categoria_torneo_id=9 AND t.tipo_torneo=1 AND t.desarrollo=0) OR (t.id=2)
	  ORDER BY t.discr DESC';
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
            guardarJSON($resultado, '../json/promedio_europa.json');
        }
    }

    function diferenciaHoras($f1, $f2)
    {
        //echo $f1." ".$f2."<hr />";
        $fecha1 = date_create($f1);
        $fecha2 = date_create($f2);
        $diferencia = date_diff($fecha1, $fecha2);

        return $diferencia;
    }


    function generarClasisificacionHistorica()
    {
        for ($i = 1; $i < 5; ++$i) {
            $consulta = 'SELECT (SELECT nombre FROM equipo WHERE id=equipo_id) equipo, sum(puntos) puntos, sum(jugados) jugados, 
	sum(ganados) ganados, sum(empatados) empatados, sum(perdidos) perdidos, 
	sum(golesFavor) golesFavor, sum(golesContra) golesContra, 
	count(temporada_id) temporadas, idViejo idEquipo, idDivision, equipo_id fm_equipo_id
	FROM nacionalclasificacionok WHERE idDivision='.$i.' AND estilo=0
	GROUP BY equipo_id 
	ORDER BY count(temporada_id) DESC, sum(puntos) DESC';
            //echo $consulta; die;
            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

            guardarJSON($resultado, '../../json/clasHistorica_'.$i.'.json');
            echo '../../json/clasHistorica_'.$i.'.json';
        }
    }

    function denominacion($equipo_id, $temporada)
    {
        $mysqli = conectar();

        $consulta = 'SELECT nombre,nombreCorto,escudo FROM denominacion
	  WHERE equipo_id='.$equipo_id." AND temporada='".$temporada."'";
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
    }

    function obsGoleadores($goleadores){

        $goles_l="*A "; $goles_v="*B ";$resultadoAnterior="0 - 0";
        foreach ($goleadores as $g => $gol) {

            if ($gol['score']==$resultadoAnterior) { continue; }

            //if ($api_id==202269 ) {
            $ra=explode("-",$resultadoAnterior);
            $rr=explode("-",$gol['score']);

            if ($rr[0]>$ra[0]) {
                if ($gol['home_scorer']=='') { $gol['home_scorer']='...............'; }
            }
            if ($rr[1]>$ra[1]) {
                if ($gol['away_scorer']=='') { $gol['away_scorer']='...............'; }
            }


            //}

            if (strlen($gol['home_scorer'])>0) {
                $marcadorL=str_replace(" ", "", $gol['score']);
                $m=explode("-", $marcadorL);
                $marcadorL="<b>".$m[0]."</b>-".$m[1];
                $goles_l.=substr($gol['time'],0,-1)."´ - ";
                $goles_l.=$gol['home_scorer'].", ";
                $goles_l.=$marcadorL.'<br />';


            } else {
                $marcadorV=str_replace(" ", "", $gol['score']);
                $m=explode("-", $marcadorV);
                $marcadorV=$m[0]."-<b>".$m[1]."</b>";
                $goles_v.=$marcadorV.', ';
                $goles_v.=$gol['away_scorer']." - ";
                $goles_v.=substr($gol['time'],0,-1)."´<br />";
            }

            $resultadoAnterior=$gol['score'];

        }

        $cosas=$goles_l.$goles_v;

        return $cosas;

    }

    function obsGoleadores2($goleadores){
        $goles_l="*A "; $goles_v="*B "; $gl=0;$gv=0;
        foreach ($goleadores as $g => $gol) {
            imp($gol);
            $mn=substr($gol['minuto'],1);
            if ($gol['minuto']<200){
                if ((int)$mn>45){ $mn="45+".($mn-45); }
            } else {
                if ((int)$mn>90){ $mn="90+".($mn-90); }
            }

            $txtTipo="";$golLocal=(int)$gol['esLocal'];
            if ((int)$gol['tipo']==1){ $txtTipo=" (pen.)"; }
            if ((int)$gol['tipo']==10){
                $txtTipo=" (p.p.)";
                if ((int)$gol['esLocal']==1) {$golLocal=0; }
                if ((int)$gol['esLocal']==0) {$golLocal=1; }
            }

            if ((int)$golLocal==1) {
                $gl++;
                $marcadorL="<b>".$gl."</b>-".$gv;
                $goles_l.=$mn."´ - ";
                $goles_l.="<a href='/jugador.php?id=".$gol['jugador_id']."' target='_blank'>".$gol['nombreJugador']."</a>".$txtTipo.", ";
                $goles_l.=$marcadorL.'<br />';
            } else {
                $gv++;
                $marcadorV=$gl."-<b>".$gv."</b>";
                $goles_v.=$marcadorV.', ';
                $goles_v.="<a href='/jugador.php?id=".$gol['jugador_id']."' target='_blank'>".$gol['nombreJugador']."</a>".$txtTipo." - ";
                $goles_v.=$mn."´<br />";
            }
        }
        $cosas=$goles_l.$goles_v;
        return $cosas;
    }

    function grabarDispositivo($valor,$dispositivo){

        $sql='INSERT INTO enlace (temporada_id, tipo, nombre, origen, alcance) 
    VALUES (0,'.$valor.',"'.$dispositivo.'","APP",0)';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);

    }
}