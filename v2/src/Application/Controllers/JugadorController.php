<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\JugadorRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class JugadorController
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

        $jugador_id = $args['id'];

        $jugador = $repoJugador->Xjugador($jugador_id);

        $posicionTxt = '';
        switch ($jugador['posicion']) {
            case '0':$posicionTxt = 'Sin demarcación'; break;
            case '1':$posicionTxt = 'Portero'; break;
            case '2':$posicionTxt = 'Defensa'; break;
            case '3':$posicionTxt = 'Centrocampista'; break;
            case '4':$posicionTxt = 'Delantero'; break;
            case '5':$posicionTxt = 'Entrenador'; break;
        }

        $golesPartido = array(); $tarjetas = array();
        if ($jugador['posicion'] < 5) {
            $golesPartido = $repoJugador->XjugadorGolesPartido($jugador_id);
            $tarjetas = $repoJugador->XjugadorTarjetasPartido($jugador_id);
        }

        $pgJugador = $routeParser->urlFor('jugador_url_nombre', [
            'slug' => $funcionesHelper->poner_guion($jugador['apodo']),
            'id' => $jugador_id,
        ]);

        $titulo = $jugador['nombre'] . ' - ' . $jugador['equipoActual'];
        $metaDescripcion = $titulo;

        return $this->container->get('view')->render($response, 'jugador/index.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,

            'jugador' => $jugador,
            'tarjetas' => $tarjetas,
            'golesPartido' => $golesPartido,
        ]);
    }
}