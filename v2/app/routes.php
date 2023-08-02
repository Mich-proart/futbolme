<?php
declare(strict_types=1);

use App\Application\Helpers\DbHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Routing\RouteContext;

return function (App $app) {

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response, $args) {

        if (array_key_exists('fecha', $_GET)) {
            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();
            #$relativeUrl = $routeParser->relativeUrlFor('home_fecha');
            #$url = $routeParser->urlFor('home_fecha');
            #$fullUrl = $routeParser->fullUrlFor('home_fecha');

            $rutaOk = $routeParser->urlFor('home_fecha', [ 'fecha' => $_GET['fecha'] ]);

            return $response->withHeader('Location', $rutaOk)
                ->withStatus(301);
        }

        $indexController = new \App\Application\Controllers\IndexController($this);
        return $indexController->index($request, $response);

    })->setName('home');

    $app->get('/partidos-hoy/{categoria}/{ct}/[{ajax}]', function (Request $request, Response $response, $args) {

        $indexController = new \App\Application\Controllers\IndexController($this);
        return $indexController->index($request, $response, $args);

    })->setName('partidosHoy');

    $app->get('/partidos-dia/{fecha}/', function (Request $request, Response $response, $args) {

        $indexController = new \App\Application\Controllers\IndexController($this);
        return $indexController->index($request, $response, $args);

    })->setName('home_fecha');

    $app->get('/partidos-dia/{fecha}/{categoria}/{ct}/', function (Request $request, Response $response, $args) {

        $indexController = new \App\Application\Controllers\IndexController($this);
        return $indexController->index($request, $response, $args);

    })->setName('home_fecha_categoria');

    $app->get('/partidos-televisados', function (Request $request, Response $response, $args) {

        $partidosTelevisadosController = new \App\Application\Controllers\PartidosTelevisadosController($this);
        return $partidosTelevisadosController->index($request, $response);

    })->setName('partidosTelevisados');

    /*
    $app->get('/resultados-directo/torneo/{slug}/{idTorneo}/', function (Request $request, Response $response, $args) {

        $response->getBody()->write('Torneo ' . $args['idTorneo'] . ' ' . $args['slug']);
        return $response;

    })->setName('torneo');
    */

    $app->post('/z_play_clasi', function (Request $request, Response $response, $args) {

        $temporadaController = new \App\Application\Controllers\TemporadaController($this);
        return $temporadaController->zPlayClasi($request, $response, $args);

    })->setName('z_play_clasi');

    #$app->post('/z_notificaciones1', function (Request $request, Response $response, $args) {
    /* $app->map(['GET', 'POST'],  '/z_notificaciones1', function (Request $request, Response $response, $args) {

        $miFutbolmeController = new \App\Application\Controllers\MiFutbolmeController($this);
        return $miFutbolmeController->zNotificaciones1($request, $response, $args);

    })->setName('z_notificaciones1'); */


    $app->group('/resultados-directo/torneo/{slug}/{idTorneo}', function (Group $group) {

        $group->get('', function (Request $request, Response $response, $args) {

            return $response->withHeader('Location', $request->getUri() . '/')
                ->withStatus(301);
        })->setName('redireccion_torneo_sin_slash_final');

        $group->get('/&jornada={jornada}&grupo_id={grupo}', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $routeParser->urlFor('torneo_jornada_grupo_id', [
                'slug' => $args['slug'],
                'idTorneo' => $args['idTorneo'],
                'jornada' => $args['jornada'],
                'grupo_id' => $args['grupo'],
            ]);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

        })->setName('old_torneo_modelo_ampersand');

        $group->get('/&modelo={modelo}', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $urlHelper->redirigirPaginasTorneo($args, $routeParser);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

        })->setName('old_torneo_modelo_ampersand');

        $group->get('/', function (Request $request, Response $response, $args) {

            if (array_key_exists('modelo', $_GET)) {
                $db = new DbHelper();
                $urlHelper = new \App\Application\Helpers\UrlHelper($db);

                $routeContext = RouteContext::fromRequest($request);
                $routeParser = $routeContext->getRouteParser();

                $args = array_merge($args, $_GET);

                $rutaRedirect = $urlHelper->redirigirPaginasTorneo($args, $routeParser);

                return $response->withHeader('Location', $rutaRedirect)
                    ->withStatus(301);
            }

            $temporadaController = new \App\Application\Controllers\TemporadaController($this);

            $args['modelo'] = 'Jornada';
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_index');

        

        $group->get('/jornada/{jornada}', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Jornada';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_jornada');

        $group->get('/jornada/{jornada}/grupo/{grupo_id}', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Jornada';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_jornada_grupo_id');

        $group->get('/goleadores', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Goleadores';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_goleadores');

        $group->get('/limpio', function (Request $request, Response $response, $args) {
            dump('limpio');
            exit;

        })->setName('torneo_limpio');


        /*
        $group->get('/jornada/{jornada}/[{grupo}]', function (Request $request, Response $response, $args) {



            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

            dump($args);
            exit;

            $response->getBody()->write('Torneo ' . $args['idTorneo'] . ' ' . $args['slug'] . ' ' . $args['jornada']);
            return $response;

        })->setName('torneo_index');
        */

        $group->get('/calendario', function (Request $request, Response $response, $args) {
            $args['modelo'] = 'Calendario';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_calendario');

        $group->get('/equipos', function (Request $request, Response $response, $args) {
            $args['modelo'] = 'Equipos';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_equipos');

        $group->get('/noticias', function (Request $request, Response $response, $args) {
            $args['modelo'] = 'Noticias';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_noticias');

        $group->get('/historico', function (Request $request, Response $response, $args) {
            dump('historico');
            exit;

        })->setName('torneo_historico');

        $group->get('/golaverage', function (Request $request, Response $response, $args) {
            dump('golaverage');
            exit;

        })->setName('torneo_golaverage');

        $group->get('/fichajes', function (Request $request, Response $response, $args) {
            $args['modelo'] = 'Fichajes';
            $temporadaController = new \App\Application\Controllers\TemporadaController($this);
            return $temporadaController->index($request, $response, $args);

        })->setName('torneo_fichajes');
    });


    $app->group('/resultados-directo/equipo/{slug}/{idEquipo}', function (Group $group) {

        $group->get('&modelo={modelo}', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $urlHelper->redirigirPaginasEquipo($args, $routeParser);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

        })->setName('old_equipo_modelo_ampersand');

        $group->get('/', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $routeParser->urlFor('equipo_datos', [
                'slug' => $args['slug'],
                'idEquipo' => $args['idEquipo'],
            ]);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

            $args['modelo'] = 'Datos';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_index_barra');

        $group->get('', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $routeParser->urlFor('equipo_datos', [
                'slug' => $args['slug'],
                'idEquipo' => $args['idEquipo'],
            ]);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

            $args['modelo'] = 'Datos';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_index');

        $group->get('/datos', function (Request $request, Response $response, $args) {
            $args['modelo'] = 'Datos';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_datos');

        $group->get('/calendario', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Calendario';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_calendario');

        $group->get('/calendario/{idTorneo}/{nombreTorneo}', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Calendario';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_calendario_torneo');


        $group->get('/clasificacion/[{vista}]', function (Request $request, Response $response, $args) {

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $args['modelo'] = 'Clasificacion';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_clasificacion');

        $group->get('/plantilla', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Plantilla';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_plantilla');

        $group->get('/fichajes', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Fichajes';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_fichajes');

        $group->get('/equipos', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Equipos';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_equipos');

        $group->get('/historico', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Historico';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_historico');

        $group->get('/tienda', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Tienda';
            $equipoController = new \App\Application\Controllers\EquipoController($this);
            return $equipoController->index($request, $response, $args);

        })->setName('equipo_tienda');

    });


    $app->group('/resultados-directo/partido/{slug}/{idPartido}', function (Group $group) {

        $group->get('&modelo={modelo}', function (Request $request, Response $response, $args) {

            $db = new DbHelper();
            $urlHelper = new \App\Application\Helpers\UrlHelper($db);

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $rutaRedirect = $urlHelper->redirigirPaginasPartido($args, $routeParser);

            return $response->withHeader('Location', $rutaRedirect)
                ->withStatus(301);

        })->setName('old_partido_modelo_ampersand');


        $group->get('', function (Request $request, Response $response, $args) {

            $args['modelo'] = 'Partido';
            $partidoController = new \App\Application\Controllers\PartidoController($this);
            return $partidoController->index($request, $response, $args);

        })->setName('partido_index');

        $group->get('/enfrentamientos', function (Request $request, Response $response, $args) {

            $routeContext = RouteContext::fromRequest($request);
            $routeParser = $routeContext->getRouteParser();

            $urlEnfrentamiento = $request->getUri();

            #$urlPartido = str_replace('/enfrentamientos', '', $urlEnfrentamiento);

            #return $response->withHeader('Location', $urlPartido)->withStatus(301);


            $args['modelo'] = 'Enfrentamientos';
            $partidoController = new \App\Application\Controllers\PartidoController($this);
            return $partidoController->index($request, $response, $args);

        })->setName('partido_enfrentamientos');
    });

    $app->get('/historico', function (Request $request, Response $response, $args) {

        $historicoController = new \App\Application\Controllers\HistoricoController($this);
        return $historicoController->index($request, $response, $args);

    })->setName('historico');


    $app->get('/resultados-directo/jugador/{id}', function (Request $request, Response $response, $args) {

        $jugadorController = new \App\Application\Controllers\JugadorController($this);
        return $jugadorController->index($request, $response, $args);

    })->setName('jugador');    


    $app->get('/resultados-directo/jugador/{slug}/{id}', function (Request $request, Response $response, $args) {

        $jugadorController = new \App\Application\Controllers\JugadorController($this);
        return $jugadorController->index($request, $response, $args);

    })->setName('jugador_url_nombre');

    $app->get('/noticias_genera_json', function (Request $request, Response $response, $args) {

        $noticiaController = new \App\Application\Controllers\NoticiaController($this);
        return $noticiaController->generaJson($request, $response, $args);

    })->setName('noticias_genera_json');

    $app->get('/noticias-de-futbol/[{pagina}]', function (Request $request, Response $response, $args) {

        $noticiaController = new \App\Application\Controllers\NoticiaController($this);
        return $noticiaController->index($request, $response, $args);

    })->setName('noticias');

    $app->get('/noticia/{slug}/{idNoticia}', function (Request $request, Response $response, $args) {

        $noticiaController = new \App\Application\Controllers\NoticiaController($this);
        return $noticiaController->individual($request, $response, $args);

    })->setName('noticia_individual');


    $app->get('/historico-liga', function (Request $request, Response $response, $args) {
        $historicoController = new \App\Application\Controllers\HistoricoController($this);
        return $historicoController->index($request, $response, $args);

    })->setName('torneo_historico_liga');

    $app->get('/historico-copa', function (Request $request, Response $response, $args) {
        $historicoController = new \App\Application\Controllers\HistoricoController($this);
        return $historicoController->index($request, $response, $args);

    })->setName('torneo_historico_copa');

    $app->get('/resultados-directo/arbitro/{id}', function (Request $request, Response $response, $args) {

        dump($args['id']);
        exit;

    })->setName('arbitro');


    $app->get('/geolocalidad/{m}/{id}', function (Request $request, Response $response, $args) {

        return $response->withHeader('Location', '/')
            ->withStatus(301);

        exit;

        dump($args['m']);
        dump($args['id']);
        exit;

    })->setName('geolocalidad');


    $app->get('/ascensos-y-descensos/{pestana}', function (Request $request, Response $response, $args) {

        //dump($args['pestana']);
        //exit;

        $ascensosController = new \App\Application\Controllers\AscensosController($this);
        return $ascensosController->index($request, $response, $args);

    })->setName('ascensos_y_descensos');

    $app->map(['GET', 'POST'],'/contacto', function (Request $request, Response $response, $args) {

        $estaticasController = new \App\Application\Controllers\EstaticasController($this);
        return $estaticasController->contacto($request, $response, $args);

    })->setName('contacto');

    $app->get('/aviso-legal', function (Request $request, Response $response, $args) {

        $estaticasController = new \App\Application\Controllers\EstaticasController($this);
        return $estaticasController->avisoLegal($request, $response, $args);

    })->setName('aviso_legal');

    $app->get('/borrarCacheTWIG', function (Request $request, Response $response, $args) {

        $cacheTwigDir = str_replace('app', 'var/cache-twig', __DIR__);

        $db = new DbHelper();
        $funcionesHelper = new \App\Application\Helpers\FuncionesHelper($db);

        $funcionesHelper->rrmdir($cacheTwigDir);

        echo 'Cache borrada';
        exit;

    })->setName('borrar_cache_twig');

    $app->get('/borrarCacheHTML', function (Request $request, Response $response, $args) {

        $cacheHtmlDir = str_replace('app', 'cache-html', __DIR__);

        $db = new DbHelper();
        $funcionesHelper = new \App\Application\Helpers\FuncionesHelper($db);

        $funcionesHelper->rrmdir($cacheHtmlDir);

        echo 'Cache HTML borrada';
        exit;

    })->setName('borrar_cache_html');

    $app->get('/finderant-feed', function (Request $request, Response $response, $args) {

        echo file_get_contents('../cristian/buscadorEquipos.json');
        exit;

    })->setName('finderant-feed');

    $app->get('/finderant-feed-jugadores', function (Request $request, Response $response, $args) {

        echo file_get_contents('../cristian/buscadorJugadores.json');
        exit;

    })->setName('finderant-feed-jugadores');
};
