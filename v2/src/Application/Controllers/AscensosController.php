<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\AscensosRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class AscensosController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args): Response
    {
        $db = new DbHelper();
        $repoAscensos = new AscensosRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();



        if ($args['pestana']=='nacional'){ $ascensos_id=1; }


        //$ascensos_id = $args['id'];

        $ascensos = $repoAscensos->ascensos();

        $titulo = 'Ascensos y Descensos';
        $metaDescripcion = $titulo;

        return $this->container->get('view')->render($response, 'ascensos/index.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,
            'ascensos' => $ascensos,
        ]);
    }
}