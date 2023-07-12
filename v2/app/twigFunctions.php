<?php
declare(strict_types=1);

use DI\Container;

return function (Container $container) {
    $ve = $container->get('view')->getEnvironment();
    $twigMicrotime = new \Twig\TwigFunction("microtime", function ($getAsFloat = false) {
        return microtime($getAsFloat);
    });
    $ve->addFunction($twigMicrotime);

    $twigDump = new \Twig\TwigFunction("dump", function ($json) {
        #return dump($json);
        return var_dump($json);
    });
    $ve->addFunction($twigDump);

    $twigDesglosarTexto = new \Twig\TwigFunction("desglosarTexto", function ($texto) {
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
    });
    $ve->addFunction($twigDesglosarTexto);


    $twigPonerGuion = new \Twig\TwigFunction("ponerGuion", function ($cadena) {
        if ($cadena == null) {
            return $cadena;
        }

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
    });
    $ve->addFunction($twigPonerGuion);


    $twigHoyDateTime = new \Twig\TwigFunction("hoyDateTime", function () {
        $tz = new \DateTimeZone('Europe/Madrid');
        $hoyDateTime = new \DateTime('now', $tz);

        return $hoyDateTime;
    });
    $ve->addFunction($twigHoyDateTime);

    $twigStringToDateTime = new \Twig\TwigFunction("stringToDateTime", function ($dateTxt) {
        $tz = new \DateTimeZone('Europe/Madrid');
        $dateTime = new \DateTime($dateTxt, $tz);

        return $dateTime;
    });
    $ve->addFunction($twigStringToDateTime);

    $twigTime = new \Twig\TwigFunction("time", function () {
        return time();
    });
    $ve->addFunction($twigTime);

    $twigDiferenciaHoras = new \Twig\TwigFunction("diferenciaHoras", function ($fechaInicial, $fechaFinal) {
        $fechaInicialDate = date_create($fechaInicial);
        $fechaFinalDate = date_create($fechaFinal);
        $diferencia = date_diff($fechaInicialDate, $fechaFinalDate);

        return $diferencia;
    });
    $ve->addFunction($twigDiferenciaHoras);


    $twigFilemtime = new \Twig\TwigFunction("filemtime", function ($rutaFichero) {
        return filemtime($rutaFichero);
    });
    $ve->addFunction($twigFilemtime);

    $twigFileGetContents = new \Twig\TwigFunction("fileGetContents", function ($rutaFichero) {
        return file_get_contents($rutaFichero);
    });
    $ve->addFunction($twigFileGetContents);

    $twigJsonDecode = new \Twig\TwigFunction("jsonDecode", function ($json, $assoc = false) {
        return json_decode($json, $assoc);
    });
    $ve->addFunction($twigJsonDecode);


    $twigNombreDiaCompleto = new \Twig\TwigFunction("nombreDiaCompleto", function ($fecha) {
        $fecha = strtotime($fecha);
        $fecha = gmmktime(0, 0, 0, (int)date('n', $fecha), (int)date('j', $fecha), (int)date('Y', $fecha));
        setlocale(LC_TIME, 'spanish');
        $nombre = utf8_encode(strftime('%A, %d de %B de %Y', $fecha));

        return $nombre;
    });
    $ve->addFunction($twigNombreDiaCompleto);

    $twigAnadirAArray = new \Twig\TwigFunction("anadirAArray", function ($array, $elemento) {

        $array[] = $elemento;

        return $array;
    });
    $ve->addFunction($twigAnadirAArray);

    $twigAnadirAArrayKey = new \Twig\TwigFunction("anadirAArrayKey", function ($array, $key, $elemento) {

        $array[$key] = $elemento;

        return $array;
    });
    $ve->addFunction($twigAnadirAArrayKey);

    $twigAnadirAArrayKeyDoble = new \Twig\TwigFunction("anadirAArrayKeyDoble", function ($array, $key1, $key2, $elemento) {

        $array[$key1][$key2][] = $elemento;

        return $array;
    });
    $ve->addFunction($twigAnadirAArrayKeyDoble);


    $twigRutaEscudo = new \Twig\TwigFunction("rutaEscudo", function ($club_id, $equipo_id) {

        if ($equipo_id!=718 && $equipo_id!=672 && $equipo_id!=117){
            $ruta='/static/img/club/escudo'.$club_id.'.png';
        } else {
            $ruta='/static/img/equipos/escudo'.$equipo_id.'.png';
        }
        return $ruta;
    });
    $ve->addFunction($twigRutaEscudo);


    $twigRutaEscudoPais = new \Twig\TwigFunction("rutaEscudoPais", function ($idPais) {
        $ruta = '/static/img/paises/banderas/ban' . $idPais .'.png';

        return $ruta;
    });
    $ve->addFunction($twigRutaEscudoPais);

    $twigShuffle = new \Twig\TwigFunction("shuffle", function ($array) {
        shuffle($array);
        return $array;
    });
    $ve->addFunction($twigShuffle);

    $twigGetConstante = new \Twig\TwigFunction("getConstante", function ($nombre) {
        if (defined($nombre)) {
            return eval('return ' . $nombre . ';');
        } else {
            return false;
        }
    });
    $ve->addFunction($twigGetConstante);

    $twigFileExists = new \Twig\TwigFunction("fileExists", function ($ruta) {
        $fileExists = file_exists($ruta);

        if ($fileExists) {
            return true;
        } else {
            if ($ruta[0] == '/') {
                $rutaSinBarraInicial = substr($ruta, 1);
                return file_exists($rutaSinBarraInicial);
            } else {
                return false;
            }
        }
    });
    $ve->addFunction($twigFileExists);

    $twigReturnTweet = new \Twig\TwigFunction("returnTweet", function ($usuario, $equipo_id, $origen = 0) {
        $db = new \App\Application\Helpers\DbHelper();
        $funcionesHelper = new \App\Application\Helpers\FuncionesHelper($db);
        $funcionesHelper->returnTweet($usuario, $equipo_id, $origen);

        #return [$usuario, $equipo_id, $origen];
    });
    $ve->addFunction($twigReturnTweet);


    $twigEnlaceAleatorioAmazon = new \Twig\TwigFunction("enlaceAleatorioAmazon", function ($club_id) {
        return [];

        $db = new \App\Application\Helpers\DbHelper();
        $generalRepo = new \App\Application\Repositories\GeneralRepository($db);
        $enlacesAmazon = $generalRepo->enlaceAleatorioAmazon($club_id);

        return $enlacesAmazon;
    });
    $ve->addFunction($twigEnlaceAleatorioAmazon);

    $twigConvertirUrls = new \Twig\TwigFunction("convertirUrls", function ($tx) {
        $db = new \App\Application\Helpers\DbHelper();
        $funcionesHelper = new \App\Application\Helpers\FuncionesHelper($db);
        $texto = $funcionesHelper->convertirUrls($tx);

        return $texto;
    });
    $ve->addFunction($twigConvertirUrls);

    $twigGetUltimosEventosPreparados = new \Twig\TwigFunction("getUltimosEventosPreparados", function ($comunidad_id) {
        $db = new \App\Application\Helpers\DbHelper();
        $eventoRepo = new \App\Application\Repositories\EventoRepository($db);

        $ultimosEventos = $eventoRepo->getUltimosEventos();
        $ultimosEventosPreparados = $eventoRepo->prepararUltimosEventosParaMostrar($ultimosEventos, $comunidad_id);

        return $ultimosEventosPreparados;
    });
    $ve->addFunction($twigGetUltimosEventosPreparados);


    $twigGetMenu = new \Twig\TwigFunction("getMenu", function () {
        $db = new \App\Application\Helpers\DbHelper();
        $generalRepo = new \App\Application\Repositories\GeneralRepository($db);

        $menu = $generalRepo->getMenu();

        return $menu;
    });
    $ve->addFunction($twigGetMenu);

    $twigGetUrlEquipo = new \Twig\TwigFunction("getUrlEquipo", function ($idEquipo, $nombreEquipo) {
        $db = new \App\Application\Helpers\DbHelper();
        $urlHelper = new \App\Application\Helpers\UrlHelper($db);

        return $urlHelper->getUrlEquipo($idEquipo, $nombreEquipo);
    });
    $ve->addFunction($twigGetUrlEquipo);

    $twigGetUrlJugador = new \Twig\TwigFunction("getUrlJugador", function ($idJugador, $nombreJugador) {
        $db = new \App\Application\Helpers\DbHelper();
        $urlHelper = new \App\Application\Helpers\UrlHelper($db);

        return $urlHelper->getUrlJugador($idJugador, $nombreJugador);
    });
    $ve->addFunction($twigGetUrlJugador);


    $twigX2generarClasificacion = new \Twig\TwigFunction("X2generarClasificacion", function ($temporada_id, $tipo_torneo, $jornada, $grupo_id) {
        $db = new \App\Application\Helpers\DbHelper();
        $clasificacionRepo = new \App\Application\Repositories\ClasificacionRepository($db);

        return $clasificacionRepo->X2generarClasificacion($temporada_id, $tipo_torneo, $jornada, $grupo_id);
    });
    $ve->addFunction($twigX2generarClasificacion);


    $twigXsacarBandera = new \Twig\TwigFunction("XsacarBandera", function ($equipo_id) {
        $db = new \App\Application\Helpers\DbHelper();
        $generalRepo = new \App\Application\Repositories\GeneralRepository($db);

        return $generalRepo->XsacarBandera($equipo_id);
    });
    $ve->addFunction($twigXsacarBandera);

    $twigXequipoPartidos = new \Twig\TwigFunction("XequipoPartidos", function ($equipo_id) {
        $db = new \App\Application\Helpers\DbHelper();
        $equipoRepo = new \App\Application\Repositories\EquipoRepository($db);

        return $equipoRepo->XequipoPartidos($equipo_id);
    });
    $ve->addFunction($twigXequipoPartidos);

    $twigPrepararPartido = new \Twig\TwigFunction("prepararPartido", function ($partido) {
        $db = new \App\Application\Helpers\DbHelper();
        $indexRepo = new \App\Application\Repositories\IndexRepository($db);

        return $indexRepo->prepararPartido($partido);
    });
    $ve->addFunction($twigPrepararPartido);

    $twigObtenerNoticiasPortadaPosiciones = new \Twig\TwigFunction("obtenerNoticiasPortadaPosiciones", function ($posiciones = []) {
        $db = new \App\Application\Helpers\DbHelper();
        $noticiaRepo = new \App\Application\Repositories\NoticiaRepository($db);

        return $noticiaRepo->obtenerNoticiasPortadaPosiciones($posiciones);
    });
    $ve->addFunction($twigObtenerNoticiasPortadaPosiciones);

};