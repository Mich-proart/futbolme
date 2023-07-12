<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\GeneralRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class PartidosTelevisadosController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response): Response
    {
        $db = new DbHelper();
        $generalRepo = new GeneralRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        define('_FUTBOLME_', 1);

        $fecha = new \DateTime();
        $dia = $fecha->format('Y-m-d');

        #CRISTIAN
        #$dia = '2020-02-07';

        $medios = $generalRepo->Xmedios($dia);
        $partidosSQL = $generalRepo->Xtelevisados($dia);

        /*
         * REVISSAAAARRRRR
         */
        $footers = false;
        if (isset($_GET['footters'])){

            $footters = array();
            foreach ($partidosSQL as $key => $value) {
                if ($value['idMedio']==132){
                    $footters[] = $value;
                }
            }
            unset($partidosSQL);
            $partidosSQL=$footters;

            $footers = true;
        }
        /*
         * REVISSAAAARRRRR
         */

        $partidos = $funcionesHelper->prepararTelevisados($partidosSQL, $routeParser);

        $pagina = 'televisados';

        $contador = 0;
        $inicio = '';
        $final = '';
        $key = 0;

        foreach ($partidos as $key => $value) {
            if (0 == $contador) {
                $inicio = $key;
            }
            $contador = $contador + 1;
        }

        $final = $key;
        $inicio = $funcionesHelper->nombreDia($inicio);
        $final = $funcionesHelper->nombreDia($final);
        $inicio = str_replace(',', '', $inicio);
        $final = str_replace(',', '', $final);

//$central="televisados";
        $titleTag = 'Resultados de fútbol y clasificaciones - Partidos Televisados - Futbolme';
        $metaDescripcion = 'Guia de partidos de fútbol televisados en los próximos días';


        return $this->container->get('view')->render($response, 'partidos-televisados/index.html.twig', [
            'titleTag' => $titleTag,
            'metaDescripcion' => $metaDescripcion,

            'classPagina' => 'partidosTelevisados',

            'inicio' => $inicio,
            'final' => $final,

            'footers' => $footers,
            'medios' => $medios,
            'partidos' => $partidos,

        ]);
    }
}