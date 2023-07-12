<?php

namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Helpers\UrlHelper;
use App\Application\Repositories\ClasificacionRepository;
use App\Application\Repositories\GeneralRepository;
use App\Application\Repositories\IndexRepository;
use App\Application\Repositories\PartidoRepository;
use App\Application\Repositories\TemporadaRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class MiFutbolmeController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function zNotificaciones1(Request $request, Response $response, $args): Response
    {
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        ob_start();

        $db = new DbHelper();
        $funcionesHelper = new FuncionesHelper($db);

        $_POST['torneos'] = '[1,2,2615,2616,2617,2618,2619,2620,2621,2622,2623,2624]';
        $data = json_decode($_POST['torneos']);
        #var_dump($data);
        $files = glob('../json/eventos/*.*');

        $mensaje = '';
        /*
        if ($data[0] === 0){
            $mensaje='<div class="text-center"><hr />Como no tienes equipos en tu cuenta, te mostraremos las notificaciones de Primera División.<br /> Cuando tengas equipos en tu cuenta de usuario, te mostraremos las notificaciones de los torneos de tus equipos.</div>';
            $data[0] = 1;
        }
        */

        // $mensaje = 'En breve un nuevo modo vivir tu fútbol con tus equipos. torneos, etc...';


        if (count($files)>0) {
            $contador = 0;
            foreach ($files as $key => $file) {

                $f = str_replace('../json/eventos/', '', $file);
                $ff = explode("-", $f);
                $coincide = 0;

                foreach ($data as $value) {
                    //if((int)$value==(int)$ff[0] || (int)$value==(int)$ff[1]) { $coincide=1; break; }
                    if ((int)$value == (int)$ff[2]) {
                        $coincide = 1;
                        break;
                    }
                }

                if ($coincide == 0){
                    continue;
                }

                $contador++;

                if ($contador == 1) {
                ?>
                    <div class="NotiLateralGOL">
                        <div class="contenedorBlancoBordesRedondeados" style="padding: 5px; margin: 5px 0px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="CierreNotificacion btn btn-default btn-block"
                                         style="font-family: Dosis;">
                                        Cerrar notificaciones <div style="float: right;">[X]</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                }

                $json = file_get_contents($file);
                $eventos = json_decode($json, true);

                if ((int) $eventos['estado_partido'] == 1) {
                    $colorTxt="navy";
                } else {
                    $colorTxt="red";
                }


                $titulo = $eventos['valor'];
                $clase = '';
                $clase1 = ''; //parpadeo
                $clase2 = '';

                if ($eventos['evento'] == 5){
                    $clase1 = 'parpadea';
                    $clase="parpadea";
                }

                if ($eventos['evento'] == 6){
                    $clase2 = 'parpadea';
                    $clase="parpadea";
                }

                $urlTorneo = $routeParser->urlFor('torneo_index', [
                    'slug' => $funcionesHelper->poner_guion($eventos['nombre_torneo']),
                    'idTorneo' => $eventos['temporada_id'],
                ]);

                $urlPartido = $routeParser->urlFor('partido_index', [
                    'slug' => $funcionesHelper->poner_guion($eventos['local']) . '-' . $funcionesHelper->poner_guion($eventos['visitante']),
                    'idPartido' => $eventos['partido_id'],
                ]);

                $bandera = 60;

                $escudoLocal = 'static/img/equipos/escudo' . $eventos['equipoLocal_id'] . '.png';
                if (!file_exists($escudoLocal)) {
                    $escudoLocal = 'static/img/equipos/NI.png';
                }

                $escudoLocal = '/' . $escudoLocal;

                $escudoVisitante = 'static/img/equipos/escudo' . $eventos['equipoVisitante_id'] . '.png';
                if (!file_exists($escudoVisitante)) {
                    $escudoVisitante = 'static/img/equipos/NI.png';
                }

                $escudoVisitante = '/' . $escudoVisitante;
                ?>
                <div class="clear"></div>

                <div class="contenedorBlancoBordesRedondeados" style="margin-top: 5px; padding-bottom: 5px;">
                    <div class="row">
                        <div class="col-12 text-center" style="color:<?php echo $colorTxt?>;">
                            <div style="background: #8AE813; -webkit-border-top-left-radius: 4px;
-webkit-border-top-right-radius: 4px;
-moz-border-radius-topleft: 4px;
-moz-border-radius-topright: 4px;
border-top-left-radius: 4px;
border-top-right-radius: 4px;">
                                <h2 class="titularContenido <?php echo $clase?>" style="height: 30px; line-height: 30px; margin: 0px;">
                                    <?php echo $titulo; ?>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 10px 5px;">
                        <div class="col-6" style="text-align:left; font-size:12px;">
                            <a style="font-size: 15px; color: #333333;" href="<?php echo $urlTorneo; ?>">Ir al torneo</a>
                        </div>
                        <div class="col-6" style="text-align:right; font-size:12px;">
                            <a style="font-size: 15px; color: #333333;" href="<?php echo $urlPartido; ?>">Ir al partido</a>
                        </div>
                    </div>

                    <div class="row" style="padding: 0px 5px;">
                        <div class="col-2">
                            <img src="<?php echo $escudoLocal; ?>" style="height:30px;">
                        </div>
                        <div class="col-6">
                            <?php echo $eventos['local']; ?>
                        </div>
                        <div class="col-3 text-center boldfont  <?php echo $clase1 ?>" style="font-size: 1.2em; color:<?php echo $colorTxt?>; color: #8AE813;">
                            <strong><?php echo $eventos['goles_local']; ?></strong>
                        </div>
                    </div>
                    <div class="row" style="padding: 0px 5px;">
                        <div class="col-2">
                            <img src="<?php echo $escudoVisitante; ?>" style="height:30px;">
                        </div>
                        <div class="col-6">
                            <?php echo $eventos['visitante']; ?>
                        </div>
                        <div class="col-3 text-center boldfont  <?php echo $clase2 ?>" style="font-size: 1.2em; color:<?php echo $colorTxt?>; color: #8AE813;">
                            <strong><?php echo $eventos['goles_visitante']; ?></strong>
                        </div>
                    </div>
                </div>

            <?php
            }

            if ($contador > 0) {
                ?>
                <div class="contenedorBlancoBordesRedondeados" style="padding: 5px;">
                    <div class="row">
                        <div class="col-12" style="font-family: Dosis;">
                            <?php echo $mensaje; ?>
                        </div>
                    </div>
                </div>

                </div>
            <?php
            }
        }

        $salidaHtml = ob_get_contents();
        ob_end_clean();

        return $this->container->get('view')->render($response, 'mifutbolme/z_notificaciones1.html.twig', [
            'salidaHtml' => $salidaHtml,
        ]);
    }
}