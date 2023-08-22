<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\ClasificacionRepository;
use App\Application\Repositories\GeneralRepository;
use App\Application\Repositories\JugadorRepository;
use App\Application\Repositories\PartidoRepository;
use App\Application\Repositories\TemporadaRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class PartidoController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args): Response
    {
        $db = new DbHelper();
        $temporadaRepo = new TemporadaRepository($db);
        $repoPartido = new PartidoRepository($db);
        $repoClasificacion = new ClasificacionRepository($db);
        $funcionesHelper = new FuncionesHelper($db);
        $generalRepo = new GeneralRepository($db);

        $partido_id = array_key_exists('idPartido', $args) ? $args['idPartido'] : '';
        $slug = array_key_exists('slug', $args) ? $args['slug'] : '';
        $modelo = array_key_exists('modelo', $args) ? $args['modelo'] : '';

        $partido = $repoPartido->Xpartido($partido_id);

        $todoOk = [];

        /*if ($_SESSION['username']=='usuario-1gk61'){
            imp($partido['twitter_local'].' OR '.$partido['twitter_visitante']);
        }*/

        if (is_null($partido)){
            #header('Location:/historico/2018-19/index.php?modo=p&id='.$_GET['id']);
            die;
        }

        $apuesta_torneo = $partido['apuesta_torneo'];
        $betsapi = $partido['betsapi'];
        $apifootball = $partido['partidoAPI'];
        $e1 = $partido['equipoLocal_id'];
        $e2 = $partido['equipoVisitante_id'];
        $et1 = $partido['local'];
        $et2 = $partido['visitante'];
        $seleccion = $partido['es_seleccion'];
        $temporada_id = $partido['temporada_id'];
        $liga_local = $partido['liga_local'];
        $liga_visitante = $partido['liga_visitante'];
        $liga_local=$liga_local??0;
        $liga_visitante=$liga_visitante??0;

        $clasificacion = null;
        $e1Clas = null;
        $e2Clas = null;

        $tipo_eliminatoria=0;
        if (2 == $partido['tipo_torneo']) {
            $tipoJornada=$generalRepo->tipoJornada($partido['jornada']);
            $tipo_eliminatoria = null;
            if (array_key_exists(0, $tipoJornada)) {
                $tipo_eliminatoria=$tipoJornada[0];
            }
        }

        $equiposTw = array();
        $equiposTw[0]['id'] = $e1;
        $equiposTw[0]['equipo'] = $et1;
        $equiposTw[0]['idPais'] = $partido['paisLocal_id'];
        $equiposTw[0]['twitter'] = $partido['twitter_local'];
        $equiposTw[0]['club_id'] = $partido['club_id_local']??NULL;

        $equiposTw[1]['id'] = $e2;
        $equiposTw[1]['equipo'] = $et2;
        $equiposTw[1]['idPais'] = $partido['paisVisitante_id'];
        $equiposTw[1]['twitter'] = $partido['twitter_visitante'];
        $equiposTw[1]['club_id'] = $partido['club_id_visitante']??NULL;

        if (1 == $partido['es_seleccion']) {
            $escudoLocal="/static/img/paises/banderas/ban".$partido['paisLocal_id'].".png";
            $escudoVisitante="/static/img/paises/banderas/ban".$partido['paisVisitante_id'].".png";
        } else {
            $escudoLocal = '/static/' . $funcionesHelper->rutaEscudo($partido['club_id_local'],$partido['equipoLocal_id']);
            $escudoVisitante = '/static/' . $funcionesHelper->rutaEscudo($partido['club_id_visitante'],$partido['equipoVisitante_id']);
        }

        /*if ($partido['id']==69684) {
        $partido['estadio_imagen']=433;
        $partido['estadioNombre']='NOU CAMP';
        $partido['localidad']='Barcelona';
        }*/

        $texto_color='white';
        if ($partido['estado_partido']<2){
            $fondo_color='black';
        } else {
            $fondo_color='red';
        }

        $torneoSlug = $funcionesHelper->poner_guion($partido['nombreTemporada']??'xxx');
        $pgEnlace="/resultados-directo/torneo/".$torneoSlug."/".$partido['temporada_id']."/".$partido['jornada'];

        $horaPrevista = \DateTime::createFromFormat('H:i:s', $partido['hora_prevista']);
        $horaActual = date('Y-m-j H:m:s');

        $partido['betsapi']=$partido['betsapi']??0;
        $comentarios=$partido['comentario']??'';
        $partido['hora_real']=$partido['hora_real']??'00:00:00';
        $parte=0; $minutos=0;
        $fecha1 = date('Y-m-d H:i:s');
        $fecha1 = date_create($fecha1); //hora actual
        $fecha2 = date($partido['fecha'].' '.$partido['hora_real']);
        $fecha2 = date_create($fecha2); // hora comienzo real
        if ($partido['id']==257896){ $partido['hora_prevista']="15:22:00";}
        $fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
        $fecha3 = date_create($fecha3); //hora prevista
        $dPartido = date_diff($fecha3, $fecha1);
        $diasP = $dPartido->d;
        $horasP = $dPartido->h;
        $minutosP = $dPartido->i;
        $segundosP = $dPartido->s;
        $invertidoP = $dPartido->invert;
        $txth = $horasP.' horas';
        $txtm = $minutosP.' minutos';
        $partiTv=$generalRepo->partidosMedios($partido_id);


        if (0 == $invertidoP) {
            if ($horasP<3 && $diasP==0){ $tiempoAcorrer=120; }
            $textoTv='Televisado en estos momentos por: ';
        } else {
            if (0 == $diasP) {
                if (1 == $horasP) {$txth = $horasP.' hora';}
                if (0 == $horasP) {$txth = '';}
                if ($horasP > 0 && $minutosP > 0) { $txth .= ' y ';}
                if (1 == $minutosP) {$txtm = $minutosP.' minuto';}
                if (0 == $minutosP) {$txtm = '';}
                $textoTv='Televisado en '.$txth.$txtm.' por: ';
            }
        }

        $cachetime = 3600; //86400 un dia.

        $rachas=array();

        if ($liga_local>0) {

            $f = '../json/temporada/'.$liga_local.'/tipo.json';

            if (file_exists($f)) {
                $fichero_time = @filemtime($f);
                if ((time() - $fichero_time)> $cachetime) {
                    $temporadaRepo->xtipo($liga_local);
                }
            } else {
                $temporadaRepo->xtipo($liga_local);
            }

            $json = file_get_contents($f);
            $datos = json_decode($json, true);
            if (isset($datos['clasificacion'])){
                $clasificacion=$datos['clasificacion']['clasificacionFinal'];
                foreach ($clasificacion as $key => $value) {
                    if($value['equipo_id']==$e1){ $e1Clas=$value; break; }
                }
                $racha = $generalRepo->Xracha($liga_local, $e1);

                if (isset($racha[$e1])){
                    $rachas[$e1]=$racha[$e1];unset($racha);
                    $rachas[$e1]['equipo']=$et1;
                }
                
            }
            //imp($e1Clas);

        }
        if ($liga_visitante>0) {
            $f = '../json/temporada/'.$liga_visitante.'/tipo.json';

            if (file_exists($f)) {
                $fichero_time = @filemtime($f);
                if ((time() - $fichero_time)> $cachetime) {
                    $temporadaRepo->xtipo($liga_visitante);
                }
            } else {
                $temporadaRepo->xtipo($liga_visitante);
            }

            $json = file_get_contents($f);
            $datos = json_decode($json, true);

            if (isset($datos['clasificacion'])){
                $clasificacion=$datos['clasificacion']['clasificacionFinal'];
                foreach ($clasificacion as $key => $value) {
                    if($value['equipo_id']==$e2){ $e2Clas=$value; break; }
                }
            }
            $racha = $generalRepo->Xracha($liga_visitante, $e2);

            if (isset($racha[$e2])){
                $rachas[$e2]=$racha[$e2];unset($racha);
                $rachas[$e2]['equipo']=$et2;
            }
        }

        if ($tipo_eliminatoria == 3){
            $clasificacion = $repoClasificacion->X2generarClasificacion($partido['temporada_id'], 2, $partido['jornada'], $partido['grupo_id'], 0);
        }

        $titulo = $partido['local'] . ' vs ' . $partido['visitante'] . ' de ' . $partido['nombreTemporada'];

        $metaDescripcion = 'Partido entre el ' . $partido['local'] . ' y el ' . $partido['local'] . ' de ' . $partido['nombreTemporada'];

        //codigo nuevo
        $enfrentamientos=array();
        $f=$e1.'-'.$e2.'.json';
        if($e2<$e1){ $f=$e2.'-'.$e1.'.json';}
        $f='../json/enfrentamientos/'.$f;

        if (file_exists($f)) {
            $json = file_get_contents($f);
            $enfrentamientos = json_decode($json, true);
        }



        if (count($rachas) == 2) {

            for ($i = 0; $i < 2; ++$i) {
                $repera = array();
                if (0 == $i) {
                    $racha = $rachas[$e1];
                    $equipo_id = $e1;
                    $equipotxt = $et1;
                } else {
                    $racha = $rachas[$e2];
                    $equipo_id = $e2;
                    $equipotxt = $et2;
                }

                $eGl = 0;$eEl = 0;$ePl = 0;$eGFl = 0;$eGCl = 0;
                $eGv = 0;$eEv = 0;$ePv = 0;$eGFv = 0;$eGCv = 0;

                $e_racha = explode(';', $racha['racha']);

                $pts = 0; $puntos = array();
                $gf = 0; $golesF = array();
                $gc = 0; $golesC = array();

                foreach ($e_racha as $key => $v) {
                    $value = explode(',', $v);
                    if (!isset($value[1])) {continue;}
                    //if ($key==$corte){ break; }
                    if ($equipo_id == $value[6]) {
                        if ($value[4] == $value[5]) {
                            ++$eEl;
                        } elseif ($value[4] > $value[5]) {
                            ++$eGl;
                        } else {
                            ++$ePl;
                        }
                        $eGFl = $eGFl + $value[4];
                        $eGCl = $eGCl + $value[5];

                        $repera[$value[6]]['jornadas'][$value[1]][0]['GF'] = $value[4];
                        $repera[$value[6]]['jornadas'][$value[1]][0]['GC'] = $value[5];
                        $repera[$value[6]]['jornadas'][$value[1]][0]['PT'] = $value[9];
                    } else {

                        if ($value[4] == $value[5]) {
                            ++$eEv;
                        } elseif ($value[5] > $value[4]) {
                            ++$eGv;
                        } else {
                            ++$ePv;
                        }
                        $eGFv = $eGFv + $value[5];
                        $eGCv = $eGCv + $value[4];

                        $repera[$value[7]]['jornadas'][$value[1]][1]['GF'] = $value[5];
                        $repera[$value[7]]['jornadas'][$value[1]][1]['GC'] = $value[4];
                        $repera[$value[7]]['jornadas'][$value[1]][1]['PT'] = $value[9];
                    }


                    $pts = $pts + $value[9];
                    $puntos[] = $pts;
                    if ($value[6] == $equipo_id) {
                        $gf = $gf + $value[4];
                        $golesF[] = $gf;
                    }
                    if ($value[7] == $equipo_id) {
                        $gf = $gf + $value[5];
                        $golesF[] = $gf;
                    }
                    if ($value[6] != $equipo_id) {
                        $gc = $gc + $value[4];
                        $golesC[] = $gc;
                    }
                    if ($value[7] != $equipo_id) {
                        $gc = $gc + $value[5];
                        $golesC[] = $gc;
                    }
                }

                $rachas[$equipo_id]['gLocal']=$eGl;
                $rachas[$equipo_id]['eLocal']=$eEl;
                $rachas[$equipo_id]['pLocal']=$ePl;
                $rachas[$equipo_id]['gfLocal']=$eGFl;
                $rachas[$equipo_id]['gcLocal']=$eGCl;

                $rachas[$equipo_id]['gVisitante']=$eGv;
                $rachas[$equipo_id]['eVisitante']=$eEv;
                $rachas[$equipo_id]['pVisitante']=$ePv;
                $rachas[$equipo_id]['gfVisitante']=$eGFv;
                $rachas[$equipo_id]['gcVisitante']=$eGCv;
                $rachas[$equipo_id]['jornadas']=$repera[$equipo_id]['jornadas'];

                if (0 == $i) {
                    $racha = $rachas[$e1];
                    $equipo_id = $e1;
                    $equipotxt = $et1;
                } else {
                    $racha = $rachas[$e2];
                    $equipo_id = $e2;
                    $equipotxt = $et2;
                }


                $eGl=$racha['gLocal']??0;
                $eEl=$racha['eLocal']??0;
                $ePl=$racha['pLocal']??0;
                $eGFl=$racha['gfLocal']??0;
                $eGCl=$racha['gcLocal']??0;

                $eGv=$racha['gVisitante']??0;
                $eEv=$racha['eVisitante']??0;
                $ePv=$racha['pVisitante']??0;
                $eGFv=$racha['gfVisitante']??0;
                $eGCv=$racha['gcVisitante']??0;
                $repera1=$racha['jornadas']??array();
                $etX = $racha['equipo'];


                $repera1l = array();
                $repera1v = array();


                foreach ($repera1 as $key => $value) {
                    if (isset($value[0])) { $repera1l[$key] = $value[0]; } else { $repera1v[$key] = $value[1]; }
                }

                $gl = 0;$el = 0;$pl = 0;$gfl = 0;$gcl = 0;$jul = 0;
                $gv = 0;$ev = 0;$pv = 0;$gfv = 0;$gcv = 0;$juv = 0;

                $eXGl = 0;$eXEl = 0;$eXPl = 0;$eXGFl = 0;$eXGCl = 0;
                $golf = 0;$golc = 0;$pMinl = 0;$gMinl = 0;

                $eXGv = 0;$eXEv = 0;$eXPv = 0;$eXGFv = 0;$eXGCv = 0;
                $govf = 0;$govc = 0;$pMinv = 0;$gMinv = 0;

                foreach ($repera1l as $key => $value) {

                    if (3 == $value['PT']) { ++$eXGl; }
                    if (1 == $value['PT']) { ++$eXEl; }
                    if (0 == $value['PT']) { ++$eXPl; }

                    $eXGFl = $eXGFl + $value['GF'];
                    $eXGCl = $eXGCl + $value['GC'];

                    if ($value['GF'] > 0) { ++$golf; }
                    if ($value['GC'] > 0) { ++$golc; }

                    if ($value['GF'] - $value['GC'] == 1) { ++$gMinl; }
                    if ($value['GC'] - $value['GF'] == 1) { ++$pMinl; }

                    if ($key > (count($repera1) - 6)) {
                        //imp($value);
                        if (3 == $value['PT']) { ++$gl; }
                        if (1 == $value['PT']) { ++$el; }
                        if (0 == $value['PT']) { ++$pl; }
                        $gfl = $gfl + $value['GF'];
                        $gcl = $gcl + $value['GC'];
                        ++$jul;
                    }
                }


                foreach ($repera1v as $key => $value) {
                    if (3 == $value['PT']) { ++$eXGv; }
                    if (1 == $value['PT']) { ++$eXEv; }
                    if (0 == $value['PT']) { ++$eXPv; }

                    $eXGFv = $eXGFv + $value['GF'];
                    $eXGCv = $eXGCv + $value['GC'];
                    if ($value['GF'] > 0) { ++$govf;}
                    if ($value['GC'] > 0) { ++$govc;}

                    if ($value['GC'] - $value['GF'] == 1) { ++$pMinv; }
                    if ($value['GF'] - $value['GC'] == 1) { ++$gMinv; }
                    if ($key > (count($repera1) - 6)) {
                        //imp($value);
                        if (3 == $value['PT']) { ++$gv; }
                        if (1 == $value['PT']) { ++$ev; }
                        if (0 == $value['PT']) { ++$pv; }
                        $gfv = $gfv + $value['GF'];
                        $gcv = $gcv + $value['GC'];
                        ++$juv;
                    }
                }

                $txt='';
                if (0 == $i) {

                    $txt='<hr />El <b>'.$equipotxt.'</b> ';
                    if (0 == $eGl && 0 == $eGv){ $txt.='no ha ganado ningún partido, '; }
                    if (1 == $eGl && 0 == $eGv){ $txt.='solo ha ganado <b>1</b> partido en casa, '; }
                    if (0 == $eGl && 1 == $eGv){ $txt.='solo ha ganado <b>1</b> partido como visitante,'; }
                    if (1 == $eGl && 1 == $eGv){ $txt.='ha ganado <b>2</b> partidos, uno como local y otro como visitante, '; }
                    if ($eGl > 1 && 0 == $eGv){ $txt.='ha ganado <b>'.$eGl.'</b> partidos, todos como local,'; }
                    if (0 == $eGl && $eGv > 1){ $txt.='ha ganado <b>'.$eGv.'</b> partidos, todos como visitante, '; }
                    if (1 == $eGl && $eGv > 1){ $txt.='ha ganado <b>1</b> partido como local y <b>'.$eGv.'</b> como visitante, '; }
                    if ($eGl > 1 && 1 == $eGv){ $txt.='ha ganado <b>'.$eGl.'</b> partidos como local y <b>1</b> como visitante, '; }
                    if ($eGl > 1 && $eGv > 1){ $txt.='ha ganado <b>'.$eGl.'</b> partidos como local y <b>'.$eGv.'</b> como visitante, '; }
                    if (0 == $eEl && 0 == $eEv){ $txt.='no ha empatado ningún partido '; }
                    if (1 == $eEl && 0 == $eEv){ $txt.='ha empatado <b>1</b> partido en casa '; }
                    if (0 == $eEl && 1 == $eEv){ $txt.='solo ha empatado <b>1</b> partido como visitante '; }
                    if (1 == $eEl && 1 == $eEv){ $txt.='ha empatado <b>2</b> partidos, uno como local y otro como visitante '; }
                    if ($eEl > 1 && 0 == $eEv){ $txt.='ha empatado <b>'.$eEl.'</b> partidos, todos como local '; }
                    if (0 == $eEl && $eEv > 1){ $txt.='ha empatado <b>'.$eEv.'</b> partidos, todos como visitante '; }
                    if (1 == $eEl && $eEv > 1){ $txt.='ha empatado <b>1</b> partido como local y <b>'.$eEv.'</b> como visitante '; }
                    if ($eEl > 1 && 1 == $eEv){ $txt.='ha empatado <b>'.$eEl.'</b> partidos como local y <b>1</b> como visitante '; }
                    if ($eEl > 1 && $eEv > 1){ $txt.='ha empatado <b>'.$eEl.'</b> partidos como local y <b>'.$eEv.'</b> como visitante '; }
                    if (0 == $ePl && 0 == $ePv){ $txt.='y no ha perdido ningún partido. '; }
                    if (1 == $ePl && 0 == $ePv){ $txt.='y ha perdido <b>1</b> partido en casa. '; }
                    if (0 == $ePl && 1 == $ePv){ $txt.='y solo ha perdido <b>1</b> partido como visitante. '; }
                    if (1 == $ePl && 1 == $ePv){ $txt.='y ha perdido <b>2</b> partidos, uno como local y otro como visitante. '; }
                    if ($ePl > 1 && 0 == $ePv){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos, todos como local. '; }
                    if (0 == $ePl && $ePv > 1){ $txt.='y ha perdido <b>'.$ePv.'</b> partidos, todos como visitante. '; }
                    if (1 == $ePl && $ePv > 1){ $txt.='y ha perdido <b>1</b> partido como local y <b>'.$ePv.'</b> como visitante. '; }
                    if ($ePl > 1 && 1 == $ePv){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos como local y <b>1</b> como visitante. '; }
                    if ($ePl > 1 && $ePv > 1){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos como local y <b>'.$ePv.'</b> como visitante. '; }
                    $txt.='<br />Respecto a goles, ha metido <b>'.$eGFl.'</b> goles en casa y <b>'.$eGFv.'</b> fuera. 
            Por contra ha encajado <b>'.$eGCl.'</b> goles en casa y <b>'.$eGCv.'</b> goles fuera.
            <hr />
            <br />En liga, el '.$etX.' ha jugado <b>'.count($repera1l).' partidos como local</b>.';
                    if ($eXGl > 0){ $txt.='<br />Ha ganado '.$eXGl;
                        if ($gMinl > 0){ $txt.=' (';
                            if ($gMinl == $eXGl) { $txt.='los ';}
                            $txt.=$gMinl.' por la mínima).'; }
                    } else {
                        $txt.='<br />Todavía no ha ganado ningún partido.';
                    }

                    $txt.='<br />Ha empatado '.$eXEl;

                    if (0 == $eXPl) {
                        $txt.='<br />Todavía no ha perdido ningún partido.';
                    } else { $txt.='<br />Ha perdido '.$eXPl; }

                    if ($pMinl > 0){
                        $txt.=' (';
                        if ($pMinl == $eXPl) { $txt.='los '; }
                        $txt.=$pMinl.' por la mínima). ';
                    }

                    $txt.='<br />Ha metido '.$eXGFl.' goles,consiguiendo marcar ';
                    if ($golf == count($repera1l)){ $txt.='en todos los partidos.';
                    } else{ $txt.='algún gol en '.$golf.' partidos.
            dejándolo de hacer en '.(count($repera1l) - $golf).' de ellos.'; }

                    $txt.='<br />Ha encajado '.$eXGCl.' goles, recibiendo algún gol en '.$golc.' partidos.
            Ha mantenido su puerta a cero en '.(count($repera1l) - $golc).' partidos.';

                    $rachas[$equipo_id]['resumen']=$txt;
                }

                $txt='';
                if (1 == $i) {

                    $txt='<hr />El <b>'.$equipotxt.'</b> ';
                    if (0 == $eGl && 0 == $eGv){ $txt.='no ha ganado ningún partido, '; }
                    if (1 == $eGl && 0 == $eGv){ $txt.='solo ha ganado <b>1</b> partido en casa, '; }
                    if (0 == $eGl && 1 == $eGv){ $txt.='solo ha ganado <b>1</b> partido como visitante,'; }
                    if (1 == $eGl && 1 == $eGv){ $txt.='ha ganado <b>2</b> partidos, uno como local y otro como visitante, '; }
                    if ($eGl > 1 && 0 == $eGv){ $txt.='ha ganado <b>'.$eGl.'</b> partidos, todos como local,'; }
                    if (0 == $eGl && $eGv > 1){ $txt.='ha ganado <b>'.$eGv.'</b> partidos, todos como visitante, '; }
                    if (1 == $eGl && $eGv > 1){ $txt.='ha ganado <b>1</b> partido como local y <b>'.$eGv.'</b> como visitante, '; }
                    if ($eGl > 1 && 1 == $eGv){ $txt.='ha ganado <b>'.$eGl.'</b> partidos como local y <b>1</b> como visitante, '; }
                    if ($eGl > 1 && $eGv > 1){ $txt.='ha ganado <b>'.$eGl.'</b> partidos como local y <b>'.$eGv.'</b> como visitante, '; }
                    if (0 == $eEl && 0 == $eEv){ $txt.='no ha empatado ningún partido '; }
                    if (1 == $eEl && 0 == $eEv){ $txt.='ha empatado <b>1</b> partido en casa '; }
                    if (0 == $eEl && 1 == $eEv){ $txt.='solo ha empatado <b>1</b> partido como visitante'; }
                    if (1 == $eEl && 1 == $eEv){ $txt.='ha empatado <b>2</b> partidos, uno como local y otro como visitante '; }
                    if ($eEl > 1 && 0 == $eEv){ $txt.='ha empatado <b>'.$eEl.'</b> partidos, todos como local '; }
                    if (0 == $eEl && $eEv > 1){ $txt.='ha empatado <b>'.$eEv.'</b> partidos, todos como visitante '; }
                    if (1 == $eEl && $eEv > 1){ $txt.='ha empatado <b>1</b> partido como local y <b>'.$eEv.'</b> como visitante '; }
                    if ($eEl > 1 && 1 == $eEv){ $txt.='ha empatado <b>'.$eEl.'</b> partidos como local y <b>1</b> como visitante '; }
                    if ($eEl > 1 && $eEv > 1){ $txt.='ha empatado <b>'.$eEl.'</b> partidos como local y <b>'.$eEv.'</b> como visitante '; }
                    if (0 == $ePl && 0 == $ePv){ $txt.='y no ha perdido ningún partido. '; }
                    if (1 == $ePl && 0 == $ePv){ $txt.='y ha perdido <b>1</b> partido en casa. '; }
                    if (0 == $ePl && 1 == $ePv){ $txt.='y solo ha perdido <b>1</b> partido como visitante. '; }
                    if (1 == $ePl && 1 == $ePv){ $txt.='y ha perdido <b>2</b> partidos, uno como local y otro como visitante. '; }
                    if ($ePl > 1 && 0 == $ePv){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos, todos como local. '; }
                    if (0 == $ePl && $ePv > 1){ $txt.='y ha perdido <b>'.$ePv.'</b> partidos, todos como visitante. '; }
                    if (1 == $ePl && $ePv > 1){ $txt.='y ha perdido <b>1</b> partido como local y <b>'.$ePv.'</b> como visitante. '; }
                    if ($ePl > 1 && 1 == $ePv){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos como local y <b>1</b> como visitante. '; }
                    if ($ePl > 1 && $ePv > 1){ $txt.='y ha perdido <b>'.$ePl.'</b> partidos como local y <b>'.$ePv.'</b> como visitante. '; }
                    $txt.='<br />Respecto a goles, ha metido <b>'.$eGFl.'</b> goles en casa y <b>'.$eGFv.'</b> fuera. 
            Por contra ha encajado <b>'.$eGCl.'</b> goles en casa y <b>'.$eGCv.'</b> goles fuera.
            <hr />
            <br />En liga, el '.$etX.' ha jugado <b>'.count($repera1v).' partidos como visitante.</b>';
                    if ($eXGv > 0) {
                        $txt.='<br />Ha ganado '.$eXGv;
                        if ($gMinv > 0){ $txt.=' (';
                            if ($gMinv == $eXGv) { $txt.='los '; }
                            $txt.=$gMinv.' por la mínima).';
                        }
                    } else {
                        $txt.='<br />Todavía no ha ganado ningún partido.';
                    }

                    $txt.='<br />Ha empatado '.$eXEv;

                    $txt.='<br />Ha perdido '.$eXPv;
                    if ($pMinv > 0) {
                        $txt.=' (';
                        if ($pMinv == $eXPv) { $txt.='los ';}
                        $txt.=$pMinv.' por la mínima).';
                    }

                    $txt.='<br />Ha metido '.$eXGFv.' goles, consiguiendo marcar algún gol en '.$govf.' partidos.
            dejándolo de hacer en '.(count($repera1v) - $govf).' de ellos.

            <br />Ha encajado '.$eXGCv.' goles, recibiendo algún gol en '.$govc.' partidos.
            Ha mantenido su puerta a cero en '.(count($repera1v) - $govc).' partidos.';
                    $rachas[$equipo_id]['resumen']=$txt;

                }

                if (0 == $i) {
                    $gg1 = $gl;$gg2 = $gv;$yG = $eXGl;$cc = count($repera1l);$ju = $jul;$pinto='Local';
                    $ee1 = $el;$ee2 = $ev;$yE = $eXEl;$pp1 = $pl;$pp2 = $pv;$yP = $eXPl;
                    $ggf1 = $gfl;$ggf2 = $gfv;$yGF = $eXGFl;$ggc1 = $gcl;$ggc2 = $gcv;$yGC = $eXGCl;
                } else {
                    $gg1 = $gv;$gg2 = $gl;$yG = $eXGv;$cc = count($repera1v);$ju = $juv;$pinto='Visitante';
                    $ee1 = $ev;$ee2 = $el;$yE = $eXEv;$pp1 = $pv;$pp2 = $pl;$yP = $eXPv;
                    $ggf1 = $gfv;$ggf2 = $gfl;$yGF = $eXGFv;$ggc1 = $gcv;$ggc2 = $gcl;$yGC = $eXGCv;
                }



                if ($yG > 0) {$percentG = ($yG * 100) / $cc;}
                if ($gg1 > 0) {$percentGa = ($gg1 * 100) / $ju;}
                if (($gg1 + $gg2) > 0) {$percentGb = (($gg1 + $gg2) * 100) / 6;}
                if (!isset($percentGa)) {$percentGa = 0;}
                if (!isset($percentEa)) {$percentEa = 0;}
                if (!isset($percentPa)) {$percentPa = 0;}
                if (!isset($percentGFa)) {$percentGFa = 0;}
                if (!isset($percentGFb)) {$percentGFb = 0;}
                if (!isset($percentGCa)) {$percentGCa = 0;}
                if (!isset($percentGCb)) {$percentGCb = 0;}
                if (!isset($percentEb)) {$percentEb = 0;}
                if (!isset($percentGb)) {$percentGb = 0;}
                if (!isset($percentPb)) {$percentPb = 0;}


                $tabla = '<table class="col-12">
                    <tr>
                        <td colspan="7" align="center">
                            <h3 style="font-size: 25px; margin-bottom: 20px; margin-top: 20px;" class="subtitulo">'.$equipotxt.'</h3>
                        </td>
                    </tr>
                <tr>
                    <td colspan="7" style="padding: 0px;">
                        <div class="row">
                            <div class="col-12">
                                <div id="topLaTabla">
                    
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr style="background: #4A4A4A; color:#FFFFFF;">
                    <td colspan="3" align="center">Toda la temporada</td>
                    <td colspan="2" align="center">Ultimas 6 jornadas<br /> como '.$pinto.'</td>
                    <td colspan="2" align="center">Ultimas 6 jornadas<br /> del calendario</td>   
                </tr>';


                if (isset($percentG)) {
                    $tabla.='<tr style="border: 2px solid green;">
                <td align="center">G</td>
                <td align="center" style="background-color:#81F79F">'.$yG.'</td>
                <td align="right" style="background-color:#81F79F">'.number_format(($percentG), 2).'%</td>
                <td align="center" style="background-color:#F5D0A9">'.$gg1.'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format(($percentGa), 2).'%</td>
                <td align="center" style="background-color:#CEE3F6">'.($gg1 + $gg2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format(($percentGb), 2).'%</td>
            </tr>'; }


                if ($yE > 0) {$percentE = ($yE * 100) / $cc;}
                if ($ee1 > 0) {$percentEa = ($ee1 * 100) / $ju;}
                if (($ee1 + $ee2) > 0) {$percentEb = (($ee1 + $ee2) * 100) / 6;}
                //hay que poner
                if (isset($percentE)) {
                    $tabla.='<tr style="border: 2px solid orange;">
                <td align="center">E</td>
                <td align="center" style="background-color:#81F79F">'.$yE.'</td>
                <td align="right" style="background-color:#81F79F">'.number_format(($percentE), 2).'%</td>
                <td align="center" style="background-color:#F5D0A9">'.$ee1.'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format(($percentEa), 2).'%</td>
                <td align="center" style="background-color:#CEE3F6">'.($ee1 + $ee2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format(($percentEb), 2).'%</td>
            </tr>'; }


                if ($yP > 0) { $percentP = ($yP * 100) / $cc; }
                if ($pp1 > 0) { $percentPa = ($pp1 * 100) / $ju; }
                if (($pp1 + $pp2) > 0) { $percentPb = (($pp1 + $pp2) * 100) / 6; }

                if (isset($percentP)) {
                    $tabla.='<tr style="border: 2px solid red;">
                <td align="center">P</td>
                <td align="center" style="background-color:#81F79F">'.$yP.'</td>
                <td align="right" style="background-color:#81F79F">'.number_format(($percentP), 2).'%</td>
                <td align="center" style="background-color:#F5D0A9">'.$pp1.'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format(($percentPa), 2).'%</td>
                <td align="center" style="background-color:#CEE3F6">'.($pp1 + $pp2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format(($percentPb), 2).'%</td>
            </tr>'; }


                if ($yGF > 0) { $percentGF = $yGF / $cc;}
                if ($ggf1 > 0) { $percentGFa = $ggf1 / $ju; }
                if (($ggf1 + $ggf2) > 0) { $percentGFb = (($ggf1 + $ggf2) / 6); }

                if (isset($percentGF)) {
                    $tabla.='<tr style="border: 2px solid navy;">
                <td align="center">GF</td>
                <td align="center" style="background-color:#81F79F">'.$yGF.'</td>
                <td align="right" style="background-color:#81F79F">'.number_format($percentGF, 2).' p.p.</td>
                <td align="center" style="background-color:#F5D0A9">'.$ggf1.'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format($percentGFa, 2).' p.p.</td>
                <td align="center" style="background-color:#CEE3F6">'.($ggf1 + $ggf2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format($percentGFb, 2).' p.p.</td>
            </tr>'; }


                if ($yGC > 0) { $percentGC = $yGC / $cc; }
                if ($ggc1 > 0) { $percentGCa = $ggc1 / $ju; }
                if (($ggc1 + $ggc2) > 0) { $percentGCb = (($ggc1 + $ggc2) / 6); }

                if (isset($percentGC)) {
                    $tabla.='<tr style="border: 2px solid black;">
                <td align="center">GC</td>
                <td align="center" style="background-color:#81F79F">'.$yGC.'</td>
                <td align="right" style="background-color:#81F79F">'.number_format($percentGC, 2).' p.p.</td>
                <td align="center" style="background-color:#F5D0A9">'.$ggc1.'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format($percentGCa, 2).' p.p.</td>
                <td align="center" style="background-color:#CEE3F6">'.($ggc1 + $ggc2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format($percentGCb, 2).' p.p.</td>
            </tr>'; }

                if (($yG + $yE + $yP) > 0) {
                    $tabla.='<tr style="border: 2px solid dimgray;">
                <td align="center">PTS</td>
                <td align="center" style="background-color:#81F79F">'.(($yG * 3) + $yE).'</td>
                <td align="right" style="background-color:#81F79F">'.number_format((($yG * 3) + $yE) / $cc, 2).' p.p.</td>
                <td align="center" style="background-color:#F5D0A9">'.(($gg1 * 3) + $ee1).'</td>
                <td align="right" style="background-color:#F5D0A9">'.number_format((($gg1 * 3) + $ee1) / $ju, 2).' p.p.</td>
                <td align="center" style="background-color:#CEE3F6">'.((($gg1 + $gg2) * 3) + $ee1 + $ee2).'</td>
                <td align="right" style="background-color:#CEE3F6">'.number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2). ' p.p.</td>
            </tr>'; }
                $tabla.='</table>';

                $rachas[$equipo_id]['tabla']=$tabla;

                $pronostico=array();

                if (0 == $invertidoP || true) {

                    if (!isset($percentG)) {$percentG = 0;}
                    if (!isset($percentE)) {$percentE = 0;}
                    if (!isset($percentP)) {$percentP = 0;}
                    if (!isset($percentGF)) {$percentGF = 0;}
                    if (!isset($percentGC)) {$percentGC = 0;}

                    $TitPercent='';
                    $txt_percentG='';
                    $modelin=0;

                    if (isset($percentG)) {
                        if ($percentG > $percentE && $percentG > $percentP) {
                            $percentT = $percentG;
                            $TitPercent = number_format($percentT, 2).'% de ganar';
                            $modelin = 1;
                        }

                        if ($percentE > $percentG && $percentE > $percentP) {
                            $percentT = $percentE;
                            $TitPercent = number_format($percentT, 2).'% de empatar';
                            $modelin = 2;
                        }

                        if ($percentP > $percentE && $percentP > $percentG) {
                            $percentT = $percentP;
                            $TitPercent = number_format($percentT, 2).'% de perder';
                            $modelin = 3;
                        }

                        if ($percentG == $percentE && $percentE > $percentP) {
                            $percentT = $percentG;
                            $TitPercent = number_format($percentT, 2).'% de ganar o empatar';
                            $modelin = 4;
                        }

                        if ($percentE == $percentP && $percentE > $percentG) {
                            $percentT = $percentE;
                            $TitPercent = number_format($percentT, 2).'% de empatar o perder';
                            $modelin = 5;
                        }

                        if ($percentG == $percentP && $percentG > $percentE) {
                            $percentT = $percentG;
                            $TitPercent = number_format($percentT, 2).'% de posibilidades de ganar o perder';
                            $modelin = 6;
                        }

                        if ($percentG == $percentP && $percentP == $percentE) {
                            $percentT = $percentG;
                            $TitPercent = number_format($percentT, 2).'% cualquier resultado es posible';
                            $modelin = 7;
                        }



                        $pronosticoFM[$i]['todos']['valor'] = number_format($percentT, 2);
                        $pronosticoFM[$i]['todos']['modelo'] = $modelin;
                        $pronosticoFM[$i]['todos']['gf'] = number_format($percentGF, 2);
                        $pronosticoFM[$i]['todos']['gc'] = number_format($percentGC, 2);
                        $pronosticoFM[$i]['todos']['ganadosLocal'] = $racha['gLocal']??0;
                        $pronosticoFM[$i]['todos']['empatadosLocal'] = $racha['eLocal']??0;
                        $pronosticoFM[$i]['todos']['perdidosLocal'] = $racha['pLocal']??0;
                        $pronosticoFM[$i]['todos']['ganadosVis'] = $racha['gVisitante']??0;
                        $pronosticoFM[$i]['todos']['empatadosVis'] = $racha['eVisitante']??0;
                        $pronosticoFM[$i]['todos']['perdidosVis'] = $racha['pVisitante']??0;

                        if ((($yG * 3) + $yE) > 0) {
                            $pronosticoFM[$i]['todos']['ptos'] = number_format((($yG * 3) + $yE) / $cc, 2);
                        } else {
                            $pronosticoFM[$i]['todos']['ptos'] = 0;
                        }

                        $txt_percentG.='<div  class="marco" style="background-color:#81F79F;"';
                        if (0 == $i) {
                            $txt_percentG.='<h6>Contando todos los resultados como local desde el inicio de la liga</h6>';
                        } else {
                            $txt_percentG.='<h6>Contando todos los resultados como visitante desde el inicio de la liga</h6>';
                        }
                        $txt_percentG.='<br /><b>'.$TitPercent.'</b>';
                        $txt_percentG.='<br />Goles a favor: '.number_format($percentGF, 2).'<br />Goles en contra: '.number_format($percentGC, 2);
                        $txt_percentG.='<br />Ha conseguido '.(($yG * 3) + $yE).' puntos sobre '.($cc * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['todos']['ptos'],2).' puntos por partido.';
                        $txt_percentG.='</div>';
                        $pronostico[$i]['txt_percentG']=$txt_percentG;
                    }

                    $percentT = 0;$percentG = 0;$percentE = 0;$percentP = 0;$TitPercenta = '';
                    $percentGF = 0;$percentGC = 0;$modelin = 0;

                    $txt_percentGa='';
                    if (isset($percentGa)) {
                        if ($percentGa > $percentEa && $percentGa > $percentPa) {
                            $percentTa = $percentGa;
                            $TitPercenta = number_format($percentTa, 2).'% de ganar';
                            $modelin = 1;
                        }
                        if ($percentEa > $percentGa && $percentEa > $percentPa) {
                            $percentTa = $percentEa;
                            $TitPercenta = number_format($percentTa, 2).'% de empatar';
                            $modelin = 2;
                        }
                        if ($percentPa > $percentEa && $percentPa > $percentGa) {
                            $percentTa = $percentPa;
                            $TitPercenta = number_format($percentTa, 2).'% de perder';
                            $modelin = 3;
                        }
                        if ($percentGa == $percentEa && $percentEa > $percentPa) {
                            $percentTa = $percentGa;
                            $TitPercenta = number_format($percentTa, 2).'% de ganar o empatar';
                            $modelin = 4;
                        }
                        if ($percentEa == $percentPa && $percentEa > $percentGa) {
                            $percentTa = $percentEa;
                            $TitPercenta = number_format($percentTa, 2).'% de empatar o perder';
                            $modelin = 5;
                        }
                        if ($percentGa == $percentPa && $percentGa > $percentEa) {
                            $percentTa = $percentGa;
                            $TitPercenta = number_format($percentTa, 2).'% de posibilidades de ganar o perder';
                            $modelin = 6;
                        }
                        if ($percentGa == $percentPa && $percentPa == $percentEa) {
                            $percentTa = $percentGa;
                            $TitPercenta = number_format($percentTa, 2).'% cualquier resultado es posible';
                            $modelin = 7;
                        }

                        $pronosticoFM[$i]['6local']['valor'] = number_format($percentTa, 2);
                        $pronosticoFM[$i]['6local']['modelo'] = $modelin;
                        $pronosticoFM[$i]['6local']['gf'] = number_format($percentGFa, 2);
                        $pronosticoFM[$i]['6local']['gc'] = number_format($percentGCa, 2);
                        if ((($gg1 * 3) + $ee1) > 0) {
                            $pronosticoFM[$i]['6local']['ptos'] = number_format((($gg1 * 3) + $ee1) / $ju, 2);
                        } else {
                            $pronosticoFM[$i]['6local']['ptos'] = 0;
                        }
                        $txt_percentGa.='<div   class="marco" style="background-color:#F5D0A9;"';
                        if (0 == $i) {
                            $txt_percentGa.='<h6>Contando los resultados como local en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
                        } else {
                            $txt_percentGa.='<h6>Contando los resultados como visitante en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
                        }
                        $txt_percentGa.='<br /><b>'.$TitPercenta.'</b>';
                        $txt_percentGa.='<br />Goles a favor: '.number_format($percentGFa, 2).'<br />Goles en contra: '.number_format($percentGCa, 2);
                        $txt_percentGa.='<br />Ha conseguido '.(($gg1 * 3) + $ee1).' puntos sobre '.($ju * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['6local']['ptos'],2).' puntos por partido.';
                        $txt_percentGa.='</div>';
                        $pronostico[$i]['txt_percentGa']=$txt_percentGa;
                    }

                    $percentTa = 0;$percentGa = 0; $percentEa = 0;$percentPa = 0;$TitPercentb = '';
                    $percentGFa = 0;$percentGCa = 0;$modelin = 0;

                    if (!isset($percentEb)) {$percentEb = 0;}
                    if (!isset($percentPb)) {$percentPb = 0;}
                    if (!isset($percentGFb)) {$percentGFb = 0;}
                    if (!isset($percentGCb)) {$percentGCb = 0;}

                    $txt_percentGb='';

                    if (isset($percentGb)) {
                        if ($percentGb > $percentEb && $percentGb > $percentPb) {
                            $percentTb = $percentGb;
                            $TitPercentb = number_format($percentTb, 2).'% de ganar';
                            $modelin = 1;
                        }
                        if ($percentEb > $percentGb && $percentEb > $percentPb) {
                            $percentTb = $percentEb;
                            $TitPercentb = number_format($percentTb, 2).'% de empatar';
                            $modelin = 2;
                        }
                        if ($percentPb > $percentEb && $percentPb > $percentGb) {
                            $percentTb = $percentPb;
                            $TitPercentb = number_format($percentTb, 2).'% de perder';
                            $modelin = 3;
                        }
                        if ($percentGb == $percentEb && $percentEb > $percentPb) {
                            $percentTb = $percentGb;
                            $TitPercentb = number_format($percentTb, 2).'% de ganar o empatar';
                            $modelin = 4;
                        }
                        if ($percentEb == $percentPb && $percentEb > $percentGb) {
                            $percentTb = $percentEb;
                            $TitPercentb = number_format($percentTb, 2).'% de empatar o perder';
                            $modelin = 5;
                        }
                        if ($percentGb == $percentPb && $percentGb > $percentEb) {
                            $percentTb = $percentGb;
                            $TitPercentb = number_format($percentTb, 2).'% de posibilidades de ganar o perder';
                            $modelin = 6;
                        }
                        if ($percentGb == $percentPb && $percentPb == $percentEb) {
                            $percentTb = $percentGb;
                            $TitPercentb = number_format($percentTb, 2).'% cualquier resultado es posible';
                            $modelin = 7;
                        }

                        $pronosticoFM[$i]['6todos']['valor'] = number_format($percentTb, 2);
                        $pronosticoFM[$i]['6todos']['modelo'] = $modelin;
                        $pronosticoFM[$i]['6todos']['gf'] = number_format($percentGFb, 2);
                        $pronosticoFM[$i]['6todos']['gc'] = number_format($percentGCb, 2);
                        $pronosticoFM[$i]['6todos']['ptos'] = number_format(((($gg1 + $gg2) * 3) + ($ee1 + $ee1)) / 6, 2);

                        $txt_percentGb.='<div   class="marco" style="background-color:#CEE3F6"';

                        $txt_percentGb.='<h6>Contando todos los resultados de las últimas 6 jornadas</h6>';

                        $txt_percentGb.='<br /><b>'.$TitPercentb.'</b>';
                        $txt_percentGb.='<br />Goles a favor: '.number_format($percentGFb, 2).'<br />Goles en contra: '.number_format($percentGCb, 2);
                        $txt_percentGb.='<br />Ha conseguido '.((($gg1 + $gg2) * 3) + $ee1 + $ee2).' puntos sobre '.(6 * 3).' posibles, lo que da una proporción de '.number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2).' puntos por partido.';
                        $txt_percentGb.='</div>';
                        $pronostico[$i]['txt_percentGb']=$txt_percentGb;
                    }

                    $percentTb = 0;$percentGb = 0;$percentEb = 0;$percentPb = 0;$TitPercentb = '';
                    $percentGFb = 0;$percentGCb = 0;$modelin = 0;



                } //fin de invertido

                $rachas[$equipo_id]['pronostico']=$pronostico;

            } //fin de i

        } //fin de count

        //dump($rachas);die;




        //fin del codigo nuevo

        $twigVars = [
            'titleTag' => $titulo,
            'metaDescripcion' => $metaDescripcion,
            'partido_id' => $partido_id,
            'slug' => $slug,
            'modelo' => $modelo,

            'partido' => $partido,
            'horaPrevista' => $horaPrevista,
            'partiTv' => $partiTv,

            'fondo_color' => $fondo_color,
            'texto_color' => $texto_color,

            'escudoLocal' => $escudoLocal,
            'escudoVisitante' => $escudoVisitante,

            'clasificacion' => $clasificacion,

            'e1Clas' => $e1Clas,
            'e2Clas' => $e2Clas,

            'tipo_eliminatoria' => $tipo_eliminatoria,

            'liga_local' => $liga_local,
            'liga_visitante' => $liga_visitante,

            'enfrentamientos' => $enfrentamientos,
            'rachas' => $rachas,
        ];

        if (true or 0 == $invertidoP && $partido['estado_partido']==2 && $partido['betsapi']<2) {

            

            $dDirecto = date_diff($fecha2, $fecha1);
            $horasD = $dDirecto->h;
            $minutosD = $dDirecto->i;
            $segundosD = $dDirecto->s;
            $mHP=($horasP*60)+$minutosP;
//var_dump($mHP);
//var_dump($minutosD);
            if ($minutosD<55 && $mHP<60) { $parte=1;$minutos=$minutosD;  }
            if ($minutosD<55 && $mHP>59 && $mHP<120) { $parte=2; $minutos=$minutosD+45; }
            if ($minutosD<20 && $mHP>119 && $mHP<135) { $parte=3; $minutos=$minutosD+90; }
            if ($minutosD<20 && $mHP>134) { $parte=4; $minutos=$minutosD+105; }
            $comentarios=$parte."-".$minutos."-0".$partido['comentario'];

            $twigVars = array_merge($twigVars, [
                'dDirecto' => $dDirecto,
                'horasD' => $horasD,
                'minutosD' => $minutosD,
                'segundosD' => $segundosD,
                'mHP' => $mHP,
                'comentarios' => $comentarios,
                'parte' => $parte,
                'minutos' => $minutos,
            ]);
        }

        if (strlen($comentarios) > 2) {
            $colorTexto = '';
            unset($t);
            $t = explode('-', $comentarios);
            if (isset($t[3])){$ev=$t[3];}
            //var_dump($t);
            if (isset($t)) {
                $t['color'] = '#f07474';
                if (1 == $t[0]) { $t['color'] = '#f07474'; }
                if (2 == $t[0]) { $t['color'] = '#7cc002'; }
                if (3 == $t[0]) { $t['color'] = '#610B0B'; }
                if (4 == $t[0]) { $t['color'] = '#0B3B0B'; }
                $t['tiempo'] = 'Minuto '.$t[1];
                if (isset($t[2]) && $t[2]>0) {
                    $t['tiempo'].= '<span style="font-size:11px; color:white; float:right;"> +'.$t[2].'</span>';
                }
            }
            if (6 == $partido['estado_partido']) {
                $t['color'] = '#ffe400';
                $t['tiempo'] = 'Descanso';
                $colorTexto = 'maroon';
            }
            if (7 == $partido['estado_partido']) {
                $t['color'] = '#2E2E2E';
                $t['tiempo'] = 'Penaltis';
            }
            if (8 == $partido['estado_partido']) {
                $t['color'] = 'blue';
                $t['tiempo'] = 'Prórroga';
            }

            $twigVars = array_merge($twigVars, [
                't' => $t,
                'colorTexto' => $colorTexto,
            ]);
        }

        $partidoGoles = $repoPartido->XpartidoGoles($partido_id);

        if (isset($sologol)) {
            $partidoTarjetas = array();
        } else {
            $partidoTarjetas = $repoPartido->XpartidoTarjetas($partido_id);
        }
        $golesTarjetas = $funcionesHelper->prepararGolesTarjetas($partidoGoles, $partidoTarjetas);

//$golesTarjetas = prepararGolesTarjetas2($partidoGoles, $partidoTarjetas);
        $todo = array();
        foreach ($golesTarjetas['local'] as $GolT) {
            if (2 == $GolT['tipo']) {
                continue;
            }
            $todo[] = $GolT;
        }
        foreach ($golesTarjetas['visitante'] as $GolT) {
            if (2 == $GolT['tipo']) {
                continue;
            }
            $todo[] = $GolT;
        }
        usort($todo, function ($a, $b) {
            return $a['minuto'] - $b['minuto'];
        });
        $j = ''; $m = ''; $g = ''; $t = '';

        foreach ($todo as $k => $valor) {
            if ($j == $valor['jugador_id'] && $m == $valor['minuto'] && $g == $valor['gol'] && (0 == $t || 1 == $t) && $valor['tipo'] < 2) {
                $todo1[$k - 1]['tipo'] = 5;
            } else {
                //imp($valor);
                $todo1[] = $valor;
            }
            $j = $valor['jugador_id'];
            $m = $valor['minuto'];
            $g = $valor['gol'];
            $t = $valor['tipo'];
        }
        $eL = ''; $m = ''; $t = ''; $j = '';

        if (count($todo) > 0) {
            foreach ($todo1 as $kk => $valor) {


                //imp($valor['nombreJugador']." ".$valor['tipo']);
                if (1 == $valor['gol']) {
                    $todoOk[$valor['esLocal'] . '-gol-' . $valor['minuto']] = $valor;
                } else {
                    if ($valor['tipo'] < 2 || 5 == $valor['tipo']) {
                        $todoOk[$valor['esLocal'] . '-tarjeta-' . $valor['jugador_id'] . $valor['tipo']] = $valor;
                    } else { //si es cambio se procede
                        if (isset($todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']])) {
                            //si es el segundo jugador del cambio, se comprueba si es el que entra o el que sale
                            if ($todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['tipo'] == 3) {
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['nombreJugador2'] = $valor['nombreJugador'];
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['jugador_id2'] = $valor['jugador_id'];
                            } else {
                                //si es el que sale
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['nombreJugador2'] = $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['nombreJugador'];
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['jugador_id2'] = $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['jugador_id'];
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['nombreJugador'] = $valor['nombreJugador'];
                                $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']]['jugador_id'] = $valor['jugador_id'];
                            }
                        } else {
                            //si es el primer jugador del cambio se añade
                            $todoOk[$valor['esLocal'] . "-cambio-" . $valor['observaciones']] = $valor;
                        }
                    }
                }
            }
        }


        $enfrentamientos=array();
        $f=$e1.'-'.$e2.'.json';
        if($e2<$e1){ $f=$e2.'-'.$e1.'.json';}
        $f='../json/enfrentamientos/'.$f;

        $rutaFicheroEnfrentamientos = $f;
        $existeFicheroEnfrentamientos = 'no';

        if (file_exists($f)) {
            $json = file_get_contents($f);
           # echo $json;
            ##exit;
            $enfrentamientos = json_decode($json, true);

            $existeFicheroEnfrentamientos = 'si';
        }

        $varEnfrentamientos=array();

        foreach ($enfrentamientos as $key => $value) {
            if ($key==0){
                $varEnfrentamientos['pestanyas'][$key]='Actualidad';
                foreach ($value as $k => $v) {
                    $id=$v['id'];
                    $nombre=$v['nombre'];
                    $partidos=$v['partidos'];
                }
                $varEnfrentamientos[0]['id']=$id;
                $varEnfrentamientos[0]['nombre']=$nombre;
                $varEnfrentamientos[0]['partidos']=$partidos;
            } else {
                $varEnfrentamientos['pestanyas'][$key]=$value['nombre'];
                $varEnfrentamientos[$key]['id']=$key;
                $varEnfrentamientos[$key]['nombre']=$value['nombre'];
                $varEnfrentamientos[$key]['totalPartidos']=$value['totalPartidos'];
                $varEnfrentamientos[$key]['estadisticas']['local']=$value['estadisticas'][$e1];
                $varEnfrentamientos[$key]['estadisticas']['visitante']=$value['estadisticas'][$e2];
                $varEnfrentamientos[$key]['partidos']=$value['partidos'];
            }
        }


        if ($_SERVER['REMOTE_ADDR'] == '88.5.161.246') {
            #dump($varEnfrentamientos);
            #exit;
        }

        #dump($equiposTw);
        #exit;


        $twigVars = array_merge($twigVars, [
            'partidoGoles' => $partidoGoles,
            'todoOk' => $todoOk,
            'enfrentamientos' => $enfrentamientos,
            'varEnfrentamientos' => $varEnfrentamientos,

            'equiposTw' => $equiposTw,

            'rutaFicheroEnfrentamientos' => $rutaFicheroEnfrentamientos,
            'existeFicheroEnfrentamientos' => $existeFicheroEnfrentamientos,

            'current_url' => str_replace([
                '?server=1&esmobile=0',
                '&server=1&esmobile=0',
                '?server=1&esmobile=1',
                '&server=1&esmobile=1',
            ], '', $request->getUri()),
        ]);

        #var_dump($twigVars);
        #exit;

        return $this->container->get('view')->render($response, 'partido/index.html.twig', $twigVars);
    }
}