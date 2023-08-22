<?php
declare(strict_types=1);

namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Repositories\EquipoRepository;
use App\Application\Repositories\EventoRepository;
use App\Application\Repositories\IndexRepository;
use App\Application\Repositories\TorneoRepository;

use App\Application\Repositories\TemporadaRepository;
use App\Application\Repositories\GeneralRepository;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args = []): Response
    {
        $db = new DbHelper();

        $torneoRepo = new TorneoRepository($db);
        #$eventoRepo = new EventoRepository($db);
        $indexRepo = new IndexRepository($db);
        $equipoRepo = new EquipoRepository($db);

        $ajax = $request->getAttribute('ajax');

        $categoriaDefecto = 'principal';
        $ctDefecto = 1;

        if (date('d-m-Y') == '27-12-2020') {
            $categoriaDefecto = 'tercera';
            $ctDefecto = 5;
        }



        $categoriaArg = array_key_exists('categoria', $args) ? $args['categoria'] : $categoriaDefecto;
        $ctArg = array_key_exists('ct', $args) ? $args['ct'] : $ctDefecto;

        $comunidad_id = 1;

        $c_id = $comunidad_id ?? 1;

        $mostrarPartidos = 150;

        $torneos = $torneoRepo->getTorneos();
        /*
        $ultimosEventos = $eventoRepo->getUltimosEventos();
        $ultimosEventosPreparados = $eventoRepo->prepararUltimosEventosParaMostrar($ultimosEventos, $c_id);
        */

        date_default_timezone_set('Europe/Madrid');

        $tz = new \DateTimeZone('Europe/Madrid');
        $hoyDateTime = new \DateTime('now', $tz);

        $horaActual = $hoyDateTime->format('H:i:s');

        $fecha = $request->getAttribute('fecha');

        if ($fecha) {
            $fechaVer = \DateTime::createFromFormat('Y-m-d', $fecha, $tz);
        } else {
            $fechaVer = $hoyDateTime;
        }

        $fechaVerFormat = $fechaVer->format('Y-m-d');

        $viendoHoy = $fechaVerFormat == $hoyDateTime->format('Y-m-d');

        $diaAnterior = clone $fechaVer;
        $diaAnterior->modify('-1 day');

        $diaSiguiente = clone $fechaVer;
        $diaSiguiente->modify('+1 day');

        $c_finales = 0;
        $c_resto = 0;
        $nPartidos = 0;

        if (!$viendoHoy) {
            $partidosFecha = $indexRepo->getPartidosPorDia($fechaVerFormat);

            $partidosIndex = $partidosFecha['partidos'];
            $nPartidos = count($partidosIndex);

            #$partidosDirecto = $partidosFecha['directos'];
            $partidosDirecto = [];
            $partidosPromocion = [];

            #unset($directos);
            #$c_directos = 0;
        } else {
            $partidosDirecto = $indexRepo->getDirectos();
            $partidosIndex = $indexRepo->getPartidosIndex();
            $partidosPromocion = $indexRepo->getPromocion();

            $nDirectos = count($partidosDirecto);
            foreach ($partidosIndex as $v) {
                if (1 == $v['estado_partido']) {
                    $c_finales++;
                    continue;
                }

                $c_resto++;
            }

            $nPartidos = $nDirectos + $c_finales + $c_resto;
        }


        $nPartidosDirecto = count($partidosDirecto);
        #$nPartidos = count($partidosIndex);
        #$c_finales = 0;
        #$c_resto = 0;

        $mostrarPartidos = 150;

        $categorias = [];
        $enJuegoCat = [];




        #CRISTIAN$ct = $_GET['ct'] ?? 1;
        #$ct = $request->getAttribute('ct') ?? 1;
        $ct = $request->getAttribute('ct') ?? $ctDefecto;
        $ct = (int)$ct;
        /*
        if ($nPartidos > 30) {
            if ($ct > 0) {
                $categorias[$ct] = $ct;

                $directos1 = [];
                foreach ($partidosDirecto as $v) {

                    if ($v['categoria_torneo_id'] < 4) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 7) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 5 && (substr($v['nombreTorneo'],0,18) == 'DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10) == 'CAMPEONATO')) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    $x = $v['categoria_torneo_id'];
                    $enJuegoCat[$x][] = $v;

                    if ($v['categoria_torneo_id'] != $ct){
                        $categorias[$v['categoria_torneo_id']] = $v['categoria_torneo_id'];
                        continue;
                    }

                    $directos1[] = $v;
                }

                #var_dump($categorias);
                #var_dump($directos1);
                #exit;

                unset($partidosDirecto);
                $partidosDirecto = $directos1;
                unset($directos1);


                $partidosDia1 = [];


                foreach ($partidosIndex as $v) {

                    if ($v['categoria_torneo_id'] < 4) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 7) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 5 && (substr($v['nombreTorneo'],0,18) == 'DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10) == 'CAMPEONATO') ){
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] != $ct){
                        $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue;
                    }

                    $partidosDia1[] = $v;
                }


                unset($partidosIndex);
                $partidosIndex = $partidosDia1;
                unset($partidosDia1);


                ksort($categorias);
            }
        }
        */




        $footters = 0;
        if ($nPartidos > 70) {
            if ($ct > 0) {
                if ($viendoHoy) {
                    $directos1 = [];
                    foreach ($partidosDirecto as $v) {

                        /*if ($v['categoria_torneo_id'] < 4) {
                            $v['categoria_torneo_id'] = 1;
                        }

                        if ($v['categoria_torneo_id'] == 7) {
                            $v['categoria_torneo_id'] = 1;
                        }

                        if ($v['categoria_torneo_id'] == 5 && (substr($v['nombreTorneo'],0,18) == 'DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10) == 'CAMPEONATO')) {
                            $v['categoria_torneo_id'] = 1;
                        }

                        $x = $v['categoria_torneo_id'];
                        $enJuegoCat[$x][] = $v;

                        if ($v['categoria_torneo_id'] != $ct){
                            $categorias[$v['categoria_torneo_id']] = $v['categoria_torneo_id']; continue;
                        }*/

                        $div = $v['division_id'];
                        if ($div < 8) {
                            
                            $div = 1;

                            //if (substr($v['torneoCorto'], 0,16)=='1ª DIVISIÓN RFEF'){ $div = 2; }
                            //if (substr($v['torneoCorto'], 0,18)=='2ª DIVISIÓN RFEF'){ $div = 4; }
                            //if (substr($v['torneoCorto'], 0,18)=='3ª DIVISIÓN RFEF'){ $div = 5; }
                            if (substr($v['torneoCorto'], 0,16)=='SEGUNDA FEDERACI'){ $div = 4; }
                            if (substr($v['torneoCorto'], 0,16)=='TERCERA FEDERACI'){ $div = 5; }

                            if (substr($v['torneoCorto'], 0,25)=='PROMOCIÓN A SEGUNDA RFEF'){ $div = 5; }
                            if ($v['division_id']==7){ $div=7; };
                            if (substr($v['torneoCorto'], 0,9)=='COPA RFEF'){ $div = 3; }



                        }
                        if ($div == 8) {
                            if ($v['categoria_torneo_id'] == 7) {
                                $div = 9;
                            }
                            if ($v['categoria_torneo_id'] == 5) {
                                $div = 8;
                            }
                            if ($v['categoria_torneo_id'] == 9) {
                                $div = 10;
                            }
                            if ($v['categoria_torneo_id'] < 4) {
                                $div = 1;
                            }
                            if ($v['categoria_torneo_id'] == 17) {
                                $div = 22;
                            }
                        }

                        $enJuegoCat[$div][] = $v;
                        $categorias[$div] = $div;

                        if ($div != $ct) {
                            continue;
                        }

                        $directos1[] = $v;
                    }

                    unset($partidosDirecto);
                    $partidosDirecto = $directos1;
                    unset($directos1);
                }

                $partidosDia1 = [];

                #var_dump($partidosIndex);
                #exit;

                foreach ($partidosIndex as $v) {



                    /*if ($v['categoria_torneo_id'] < 4) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 7) {
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] == 5 && (substr($v['nombreTorneo'],0,18) == 'DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10) == 'CAMPEONATO') ){
                        $v['categoria_torneo_id'] = 1;
                    }

                    if ($v['categoria_torneo_id'] != $ct){
                        $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue;
                    }*/

                    $div = $v['division_id'];
                    if ($div < 8) {

                        $div = 1;
                        //if (substr($v['torneoCorto'], 0,18)=='1ª DIVISIÓN RFEF'){ $div = 2; }
                       
                        if (substr($v['torneoCorto'], 0,16)=='SEGUNDA FEDERACI'){ $div = 4; }
                        if (substr($v['torneoCorto'], 0,16)=='TERCERA FEDERACI'){ $div = 5; }

                        //if (substr($v['torneoCorto'], 0,18)=='2ª DIVISIÓN RFEF'){ $div = 4; }
                        //if (substr($v['torneoCorto'], 0,18)=='3ª DIVISIÓN RFEF'){ $div = 5; }

                        if (substr($v['torneoCorto'], 0,25)=='PROMOCIÓN A SEGUNDA RFEF'){ $div = 5; }    
                        

                        if ($v['division_id']==7){ $div=7; };
                        if (substr($v['torneoCorto'], 0,9)=='COPA RFEF'){ $div = 3; }

                        
                    }
                    if ($div == 8) {
                        if ($v['categoria_torneo_id'] == 7) {
                            $div = 9;
                        }
                        if ($v['categoria_torneo_id'] == 5) {
                            $div = 8;
                        }
                        if ($v['categoria_torneo_id'] == 9) {
                            $div = 10;
                        }
                        if ($v['categoria_torneo_id'] < 4) {
                            $div = 1;
                        }
                        if ($v['categoria_torneo_id'] == 17) {
                            $div = 22;
                        }
                    }

                    $categorias[$div] = $div;

                    if ($div != $ct) {
                        continue;
                    }

                    $partidosDia1[] = $v;
                }

                unset($partidosIndex);
                $partidosIndex = $partidosDia1;
                unset($partidosDia1);
            }


            ksort($categorias);
        }



        
        $partidosSueltos = [];
        if ($nPartidosDirecto == 0) {
            $partidosSueltos = $indexRepo->getPartidosSueltos();
        }

        

        $fichajes = $equipoRepo->Xfichajes(0,1);

        
        $navidad = [];
        /*

        $navidad=array();
        if (($nPartidos + $nPartidosDirecto)<30){

            $generalRepo = new GeneralRepository($db);
            $temporadaRepo = new TemporadaRepository($db);
            

            for ($i=1; $i < 3062; $i++) { 

                if ($i==3){ $i=($i+3052); }
                echo $i.'<br />';
                $f = '../json/temporada/'.$i.'/tipo.json';            
                $temporadaRepo->xtipo($i);
                $json = file_get_contents($f);
                $datos = json_decode($json, true);
                $goleadores = $generalRepo->XclasificacionGoleadores($i);
                $goleadores=array_slice($goleadores, 0, 10);
                //dump($goleadores);die;

                
                $navidad[$i]['torneo']=$datos['torneo']['nombre'];
                $navidad[$i]['clasificacion']=$datos['clasificacion']['clasificacionFinal'];
                $navidad[$i]['leyenda']=$datos['clasificacion']['leyenda'];
                $navidad[$i]['goleadores']=$goleadores;

            }

        }
        */



        


        return $this->container->get('view')->render($response, 'index/index.html.twig', [
            'ajax' => $ajax,
            'ct' => $ct,

            'fecha' => $fecha,

            'comunidad_id' => $c_id,

            'diaVer' => $fechaVer,
            'diaAnterior' => $diaAnterior,
            'diaSiguiente' => $diaSiguiente,
            'torneos' => $torneos,
            'navidad' => $navidad,
            //'ultimosEventos' => $ultimosEventosPreparados,

            'mostrarPartidos' => $mostrarPartidos,

            'horaActual' => $horaActual,

            'nPartidosDirecto' => $nPartidosDirecto,
            'nPartidos' => $nPartidos,

            'partidosSueltos' => $partidosSueltos,

            'nTotalPartidosHoy' => $nPartidos + $nPartidosDirecto,
            'c_finales' => $c_finales,
            'c_resto' => $c_resto,

            'partidosDirecto' => $partidosDirecto,
            'partidosIndex' => $partidosIndex,
            'partidosPromocion' => $partidosPromocion,

            'categorias' => $categorias,
            'enJuegoCat' => $enJuegoCat,

            'viendoHoy' => $viendoHoy,

            'fichajes' => $fichajes,

            'current_url' => str_replace([
                '?server=1&esmobile=0',
                '&server=1&esmobile=0',
                '?server=1&esmobile=1',
                '&server=1&esmobile=1',
                '&esios=1',
                '&esios=0',
                '&esios=',
            ], '', $request->getUri()),

            'categoriaArg' => $categoriaArg,
            'ctArg' => $ctArg,

            'esPortada' => true,
        ]);

    }
}
