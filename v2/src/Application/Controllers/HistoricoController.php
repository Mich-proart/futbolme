<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\JugadorRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class HistoricoController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args): Response
    {
        $db = new DbHelper();
        $repoJugador = new JugadorRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        /*
        $pgJugador = $routeParser->urlFor('jugador_url_nombre', [
            'slug' => $funcionesHelper->poner_guion($jugador['apodo']),
            'id' => $jugador_id,
        ]);
        */

        $titulo = 'Historico';
        $metaDescripcion = 'Historico';

        $partidos = [
            [
                'id' => 8888,
                'local' => 'Numancia',
                'visitante' => 'Las Palmas',
            ],
            [
                'id' => 8888,
                'local' => 'Osasuna',
                'visitante' => 'Alaves',
            ]
        ];

        return $this->container->get('view')->render($response, 'historico/index.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,

            'partidos' => $partidos,
        ]);
    }

    public function historicoLiga(Request $request, Response $response, $args): Response
    {

        echo 999;
        exit;

        $titulo = 'Historico Liga';
        $metaDescripcion = 'Historico Liga';


        return $this->container->get('view')->render($response, 'historico/liga.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,
        ]);
    }

    public function historicoCopa(Request $request, Response $response, $args): Response
    {
        $titulo = 'Historico Copa';
        $metaDescripcion = 'Historico Copa';

        return $this->container->get('view')->render($response, 'historico/copa.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,
        ]);
    }
}