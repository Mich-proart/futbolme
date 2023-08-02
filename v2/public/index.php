<?php
declare(strict_types=1);
define('__INICIO_MICROTIME__', microtime(true));

$redireccionSlugsActivo = true;

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$actualLinkHttpsCorrect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tenemosQueRedireccionar = false;

if (!in_array($_SERVER['SERVER_NAME'], [
        'localhost',
        'version2'
    ])) {
    if ($protocol == 'http://') {
        $tenemosQueRedireccionar = true;
        if (!$redireccionSlugsActivo) {
            header("HTTP/1.1 301 Moved Permanently");
            header('Location: ' . $actualLinkHttpsCorrect);
        }
    }
}

if ($redireccionSlugsActivo) {
    if (strpos($actualLinkHttpsCorrect, '/index.php') !== false) {
        $actualLinkHttpsCorrect = str_replace('/index.php', '/', $actualLinkHttpsCorrect);

        $tenemosQueRedireccionar = true;
    }

    if ($tenemosQueRedireccionar) {
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $actualLinkHttpsCorrect);
    }
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

include '../config/constantes.php';

#SISTEMA CACHE HTML


if (true && !in_array($_SERVER['SERVER_NAME'], ['localhost','version2'])) {
#if ($_SERVER['REMOTE_ADDR'] == '88.5.161.246') {
    if (!array_key_exists('server', $_GET)) {

        $carga = sys_getloadavg();

        $segundosCache = 20;

        $rutasCacheables = [
            /* [
                'url' => '/z_notificaciones1',
                'segundos' => 20
            ], */
            [
                'url' => '/partidos-hoy/',
                'segundos' => $segundosCache
            ],
            [
                'url' => '/partidos-dia/',
                'segundos' => 180
            ],
            [
                'url' => '/partidos-televisados',
                'segundos' => 120
            ],
            /*
            [
                'url' => '/resultados-directo/torneo/',
                'segundos' => 60
            ],
            [
                'url' => '/resultados-directo/equipo/',
                'segundos' => 240
            ],
            [
                'url' => '/resultados-directo/partido/',
                'segundos' => 30
            ],
            [
                'url' => '/resultados-directo/jugador/',
                'segundos' => 300
            ],
            */

            [
                'url' => '/ascensos-y-descensos/nacional/',
                'segundos' => 3600
            ],

            [
                'url' => '/ascensos-y-descensos/',
                'segundos' => 3600
            ],

            [
                'url' => '/noticia/',
                'segundos' => 300
            ],
            [
                'url' => '/noticias-de-futbol/',
                'segundos' => 300
            ],
            [
                'url' => '/historico-liga',
                'segundos' => 90000
            ],
            [
                'url' => '/historico-copa',
                'segundos' => 90000
            ],
        ];


        if ($carga[0] >= 15 || $carga[1] >= 25) {
            $rutasCacheables[] = [
                'url' => '/resultados-directo/torneo/',
                'segundos' => 60
            ];
        }

        if ($carga[0] >= 30 || $carga[1] >= 45) {
            $rutasCacheables[] = [
                'url' => '/resultados-directo/equipo/',
                'segundos' => 240
            ];

            $rutasCacheables[] = [
                'url' => '/resultados-directo/partido/',
                'segundos' => 60
            ];
        }

        if ($carga[0] >= 45 || $carga[1] >= 55) {
            $rutasCacheables[] = [
                'url' => '/resultados-directo/jugador/',
                'segundos' => 300
            ];
        }

        $carpeta = __ES_MOBILE__ ? 1 : 0;
        if (__ES_MOBILE__) {
            $carpeta .= '/';
            $carpeta .= __ES_IOS__ ? 1 : 0;
        }

        $rutaActual = $_SERVER['REQUEST_URI'];

        if (strpos($rutaActual, '?_=') !== false) {
            $rutaActual = explode('?_=', $rutaActual);
            $rutaActual = $rutaActual[0];
        }

        $esRutaCacheable = false;

        if ($rutaActual == '/') {
            $esRutaCacheable = true;
        } else {
            foreach ($rutasCacheables as $rutaCacheable) {
                $strPos = strpos($rutaActual, $rutaCacheable['url']);
                if ($strPos === 0) {
                    $esRutaCacheable = true;
                    $segundosCache = $rutaCacheable['segundos'];
                    break;
                }
            }
        }

        if ($esRutaCacheable) {
            $ubicacionCarpetaCache = '../cache-html/';
            $md5RutaActual = md5($rutaActual);
            $md5RutaActualFolder = implode('/', str_split($md5RutaActual));
            $md5RutaActualFolderCompleta = $ubicacionCarpetaCache . $carpeta . '/' . $md5RutaActualFolder . '/';
            $rutaFicheroCache = $md5RutaActualFolderCompleta . $md5RutaActual . '.html';

            $ficheroCacheadoValido = false;
            if (file_exists($rutaFicheroCache)) {
                $ultimaModificacionCache = @filemtime($rutaFicheroCache);

                if ((time() - $ultimaModificacionCache) < $segundosCache) {
                    $ficheroCacheadoValido = true;
                }
            }

            if ($ficheroCacheadoValido) {
                echo file_get_contents($rutaFicheroCache);
                exit;
            } /*  else {
                if (!file_exists($md5RutaActualFolderCompleta)) {
                    mkdir($md5RutaActualFolderCompleta, 0777, true);
                }

                $rutaTieneInterrogante = strpos($rutaActual, '?') === false;
                $variableGetServidor = $rutaTieneInterrogante ? '?' : '&';
                $variableGetServidor .= 'server=1';
                $variableGetEsMobile = '&esmobile=' . __ES_MOBILE__;
                $variableGetEsIOS = '&esios=' . __ES_IOS__;

                $rutaCompletaPeticionServidor = 'https://futbolme.com' . $rutaActual . $variableGetServidor . $variableGetEsMobile . $variableGetEsIOS;

                //var_dump($rutaCompletaPeticionServidor);
                #exit;

                $htmlRespuesta = file_get_contents($rutaCompletaPeticionServidor);

                #@file_put_contents($rutaFicheroCache, $htmlRespuesta . '<!-- Pagina cacheada en una petición previa a las ' . date('d/m/Y') . ' a las ' . date('H:i:s') . ' -->');
                @file_put_contents($rutaFicheroCache, $htmlRespuesta);

                #echo $htmlRespuesta . '<!-- Pagina cacheada en esta petición -->';
                echo $htmlRespuesta;
                exit;
            }*/
        }
    }
}


use App\Application\Handlers\HttpErrorHandler;
use App\Application\Handlers\ShutdownHandler;
use App\Application\ResponseEmitter\ResponseEmitter;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

define('PRODUCCION', true && !in_array($_SERVER['SERVER_NAME'], [
        'localhost',
        'version2'
    ]));


##### DEFINE FUTBOLME #####
/*
$uri = ($_SERVER['REQUEST_URI']);
if (substr($uri, 0,20)=='/resultados-directo/'){
    define('__FUTBOLME__', 0);
}
*/


##### FIN DEFINE FUTBOLME #####

if (PRODUCCION) { // Should be set to true in production
	$containerBuilder->enableCompilation(__DIR__ . '/../var/cache');
}

// Set up settings
$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/../app/dependencies.php';
$dependencies($containerBuilder);

// Set view in Container
$view = require __DIR__ . '/../app/view.php';
$view($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

//Add Functions to twig
$twigFunctions = require __DIR__ . '/../app/twigFunctions.php';
$twigFunctions($container);

// Add Twig-View Middleware
#$app->add(TwigMiddleware::createFromContainer($app));
$twigMiddleware = require __DIR__ . '/../app/twigMiddleware.php';
$twigMiddleware($app);

// Register middleware
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

/** @var bool $displayErrorDetails */
$displayErrorDetails = $container->get('settings')['displayErrorDetails'];

// Create Request object from globals
$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

// Create Error Handler
$responseFactory = $app->getResponseFactory();
#######
$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

// Create Shutdown Handler
$shutdownHandler = new ShutdownHandler($request, $errorHandler, $displayErrorDetails);
register_shutdown_function($shutdownHandler);

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, false, false);
$errorMiddleware->setDefaultErrorHandler($errorHandler);
####

// Run App & Emit Response
$response = $app->handle($request);

if (in_array($response->getStatusCode(), [404, 405])) {
    /*
    $nuevaRuta404 = (string) $request->getUri();

    if (!in_array($nuevaRuta404, [
        'http://v2.futbolme.com/static/popper/popper.min.js.map',
        'https://v2.futbolme.com/static/popper/popper.min.js.map',
    ])) {
        file_put_contents('../rutas-404.txt', $nuevaRuta404 . "\n", FILE_APPEND);
    }
    */

    echo file_get_contents('../errores/404.html');
    exit;
}

$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);