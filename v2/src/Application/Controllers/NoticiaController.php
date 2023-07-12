<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\NoticiaRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class NoticiaController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function generaJson(Request $request, Response $response, $args): Response
    {
        $db = new DbHelper();
        $repoNoticia = new NoticiaRepository($db);

        $noticiasPortada = $repoNoticia->getNoticiasPortada();

        $noticiasPortadaArray = [];

        foreach ($noticiasPortada as $noticiaPortada) {
            $noticiasPortadaArray[$noticiaPortada['posicion']] = $noticiaPortada;
        }

        $fichero = '../json/noticias/portada.json';

        file_put_contents($fichero, json_encode($noticiasPortadaArray));

        exit;
    }

    public function index(Request $request, Response $response, $args): Response
    {

        $db = new DbHelper();
        $repoNoticia = new NoticiaRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $noticias = $repoNoticia->getNoticias();

        $nTotalResultats = count($noticias);
        $nResultatsPagina = 10;
        $nPagines = (int) ceil($nTotalResultats / $nResultatsPagina);

        $paginaActual = array_key_exists('pagina', $args) ? (int) $args['pagina'] : 1;

        $registreInici = $paginaActual * $nResultatsPagina - $nResultatsPagina;
        $registreFi = $registreInici + $nResultatsPagina - 1;

        $noticiasPaginate = [];
        for ($i = $registreInici; $i <= $registreFi; $i++) {
            if (array_key_exists($i, $noticias)) {
                $noticiasPaginate[] = $noticias[$i];
            }
        }

        $titulo = 'Las noticias de Fútbolme';
        $metaDescripcion = 'Publicamos díaramente información fresca y original en referente al deporte rey';

        return $this->container->get('view')->render($response, 'noticias/index.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,

            'noticias' => $noticiasPaginate,
            'nPaginesPaginacio' => $nPagines,
            'paginaActualPaginacio' => $paginaActual,
        ]);
    }

    public function individual(Request $request, Response $response, $args): Response
    {

        $db = new DbHelper();
        $repoNoticia = new NoticiaRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $idNoticia = (int) $args['idNoticia'];

        $noticia = $repoNoticia->getNoticiaSingle($idNoticia);

        if (!$noticia) {
            header('Location: /');
        }

        $otrasNoticias = $repoNoticia->otrasNoticias(5, [
            $idNoticia
        ]);

        $titulo = ucfirst(strtolower($noticia['titulo']));
        $metaDescripcion = substr(strip_tags($noticia['titulo']), 0, 150);

        return $this->container->get('view')->render($response, 'noticias/individual.html.twig', [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,

            'noticia' => $noticia,
            'otrasNoticias' => $otrasNoticias,
        ]);
    }
}