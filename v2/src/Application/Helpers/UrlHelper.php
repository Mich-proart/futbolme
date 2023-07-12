<?php
declare(strict_types=1);

namespace App\Application\Helpers;

use Slim\Interfaces\RouteParserInterface;

class UrlHelper
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
        $this->funcionesHelper = new FuncionesHelper($this->db);
    }

    public function redirigirPaginasTorneo(array $args, RouteParserInterface $routeParser)
    {
        $modeloGet = mb_strtolower($args['modelo']);
        $idTorneo = $args['idTorneo'];
        $slug = $args['slug'];

        #$urlTorneo = $urlHelper->getUrlTorneo($idTorneo);

        $rutaRedirect = '/';

        switch ($modeloGet) {
            case 'jornada':
                $rutaRedirect = $routeParser->urlFor('torneo_index', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'goleadores':
                $rutaRedirect = $routeParser->urlFor('torneo_goleadores', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'limpio':
                $rutaRedirect = $routeParser->urlFor('torneo_limpio', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'calendario':
                $rutaRedirect = $routeParser->urlFor('torneo_calendario', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'equipos':
                $rutaRedirect = $routeParser->urlFor('torneo_equipos', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'noticias':
                $rutaRedirect = $routeParser->urlFor('torneo_noticias', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;

            case 'historico':
                $rutaRedirect = $routeParser->urlFor('torneo_historico', [
                    'slug' => $slug,
                    'idTorneo' => $idTorneo,
                ]);
                break;
        }

        return $rutaRedirect;
    }

    public function getUrlTorneo($idTemporada, $modelo = null)
    {
        $urlsTorneosJson = file_get_contents('../json/urls_torneos.json');
        $urlsTorneosArray = json_decode($urlsTorneosJson, true);

        $urlTorneo = '';

        if (array_key_exists($idTemporada, $urlsTorneosArray)) {
            $urlTorneo = $urlsTorneosArray[$idTemporada]['ruta'];
        }

        return $urlTorneo;
    }

    public function getUrlEquipo($idEquipo, $nombreEquipo)
    {
        return '/resultados-directo/equipo/' . $this->funcionesHelper->poner_guion($nombreEquipo) . '/' . $idEquipo;
    }

    public function getUrlPartido($idPartido, $nombreLocal, $nombreVisitante)
    {
        $nombreLocal = str_replace('.', '', $nombreLocal);
        $nombreVisitante = str_replace('.', '', $nombreVisitante);

        return '/resultados-directo/partido/' . $this->funcionesHelper->poner_guion($nombreLocal) . '-' . $this->funcionesHelper->poner_guion($nombreVisitante) . '/' . $idPartido;
    }

    public function getUrlJugador($idJugador, $nombreJugador)
    {
        return '/resultados-directo/jugador/' . $this->funcionesHelper->poner_guion($nombreJugador) . '/' . $idJugador;
    }

    public function redirigirPaginasEquipo(array $args, RouteParserInterface $routeParser)
    {
        $modeloGet = mb_strtolower($args['modelo']);
        $idEquipo = $args['idEquipo'];
        $slug = $args['slug'];

        $rutaRedirect = '/';

        switch ($modeloGet) {
            case 'datos':
                $rutaRedirect = $routeParser->urlFor('equipo_datos', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;

            case 'calendario':
                $rutaRedirect = $routeParser->urlFor('equipo_calendario', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;

            case 'plantilla':
                $rutaRedirect = $routeParser->urlFor('equipo_plantilla', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;

            case 'clasificacion':
                $rutaRedirect = $routeParser->urlFor('equipo_clasificacion', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;

            case 'equipos':
                $rutaRedirect = $routeParser->urlFor('equipo_equipos', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;

            case 'historico':
                $rutaRedirect = $routeParser->urlFor('equipo_historico', [
                    'slug' => $slug,
                    'idEquipo' => $idEquipo,
                ]);
                break;
        }




        return $rutaRedirect;
    }

    public function redirigirPaginasPartido(array $args, RouteParserInterface $routeParser)
    {
        $modeloGet = mb_strtolower($args['modelo']);
        $idPartido = $args['idPartido'];
        $slug = $args['slug'];

        $rutaRedirect = '/';

        switch ($modeloGet) {
            case 'enfrentamientos':
                $rutaRedirect = $routeParser->urlFor('partido_enfrentamientos', [
                    'slug' => $slug,
                    'idPartido' => $idPartido,
                ]);
                break;
        }

        return $rutaRedirect;
    }


}