<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\ClasificacionRepository;
use App\Application\Repositories\EquipoRepository;
use App\Application\Repositories\GeneralRepository;
use App\Application\Repositories\IndexRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class EquipoController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args): Response
    {
        $db = new DbHelper();
        $equipoRepo = new EquipoRepository($db);
        $indexRepo = new IndexRepository($db);
        $generalRepo = new GeneralRepository($db);
        $funcionesHelper = new FuncionesHelper($db);

        define('_FUTBOLME_', 1);

        $pagina = 'equipo';
        $equipo_id = $args['idEquipo'];
        $slug = $args['slug'];
        $temporada_id = array_key_exists('idTorneo', $args) ? $args['idTorneo'] : '';

        if (992 == $equipo_id) {
            $equipo_id = 369;
        } //aurrera de ondarroa

        $idEquipo = $equipo_id;

        $pesContra = null;
        $pesFavor = null;
        $pesPerdidos = null;
        $pesEmpatados = null;
        $pesGanados = null;
        $pesJugados = null;
        $pesPuntos = null;
        $pesEstadisticas = null;
        $icono = '';
        $porTorneos = [];
        $clasificacion = null;
        $fichajes = [];
        $e_racha = [];

        $equipos=array();

        if ($idEquipo > 1000000) {

            $indexRepo = new IndexRepository($db);

            

            $idEquipo = $idEquipo - 10000000;

            $temp_id = $_GET['temp_id']??0;

            $carpeta = '../json/newBetsapi/'.$temp_id;
            $token="153716-4djEyj4e6JZVou";
            //$token="7865-b0PXlPMI94xvu3";
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            $cachetime = 86400; //86400 un dia.
            $f = $carpeta.'/proximos.json';
            $url='https://api.betsapi.com/v2/events/upcoming?sport_id=1&token='.$token.'&league_id='.$temp_id;
            if (@file_exists($f)) {
                $fichero_time = @filemtime($f);
                if ((time() - $fichero_time)> $cachetime) {
                    $resultado = file_get_contents($url); //creamos fichero
                    $funcionesHelper->guardarFILE($resultado, $carpeta.'/proximos.json');
                    //echo 'reGeneramos fichero<br />';
                } else {
                    $resultado = file_get_contents($f);//leemos fichero
                    //echo 'Leemos fichero<br />';
                }
            } else {
                $resultado = file_get_contents($url);
                $funcionesHelper->guardarFILE($resultado, $carpeta.'/proximos.json');//creamos fichero
                //echo 'Generamos fichero nuevo<br />';
            }
            $proximos = json_decode($resultado, true);
            unset($resultado);
            $jornadaActiva=$proximos['results'][0]['extra']['round']??0;
            $nombreTorneo=$proximos['results'][0]['league']['name']??'Torneo';

            $cachetime = 86400; //86400 un dia.
            $f = $carpeta.'/terminados.json';
            $url='https://api.betsapi.com/v2/events/ended?sport_id=1&token='.$token.'&league_id='.$temp_id;
            if (@file_exists($f)) {
                $fichero_time = @filemtime($f);
                if ((time() - $fichero_time)> $cachetime) {
                    $resultado = file_get_contents($url); //creamos fichero
                    $funcionesHelper->guardarFILE($resultado, $carpeta.'/terminados.json');
                } else {
                    $resultado = file_get_contents($f);//leemos fichero
                }
            } else {
                $resultado = file_get_contents($url);
                $funcionesHelper->guardarFILE($resultado, $carpeta.'/terminados.json');//creamos fichero
            }
            $terminados = json_decode($resultado, true);
            unset($resultado);
            $nombreTorneo=$terminados['results'][0]['league']['name']??'Torneo';

            $cachetime = 86400; //86400 un dia.
            $f = $carpeta.'/clasificacion.json';
            $url='https://api.betsapi.com/v2/league/table?&token='.$token.'&league_id='.$temp_id;
            if (@file_exists($f)) {
                $fichero_time = @filemtime($f);
                if ((time() - $fichero_time)> $cachetime) {
                    $resultado = file_get_contents($url); //creamos fichero
                    $funcionesHelper->guardarFILE($resultado, $carpeta.'/clasificacion.json');
                } else {
                    $resultado = file_get_contents($f);//leemos fichero
                }
            } else {
                $resultado = file_get_contents($url);
                $funcionesHelper->guardarFILE($resultado, $carpeta.'/clasificacion.json');//creamos fichero
            }
            $clasificacion = json_decode($resultado, true);
            unset($resultado);
            $clas=$clasificacion['results'];
            if ($clas['season']['has_leaguetable']==1){
                $tipo_torneo = 1;
            } else {
                $tipo_torneo = 2;
            }


            $nombreEquipo = ''; 

            foreach ($proximos['results'] as $key => $value) {
                if (isset($value['extra']['round'])){
                    $jornadas[$value['extra']['round']][$value['id']]=$value;
                } else {
                    $jornadas[1000][$value['id']]=$value;
                }
                $equipos[$value['home']['id']][$value['id']]=$value;
                $equipos[$value['away']['id']][$value['id']]=$value;
                if ($value['home']['id']==$idEquipo){ $nombreEquipo=$value['home']['name'];}
                if ($value['away']['id']==$idEquipo){ $nombreEquipo=$value['away']['name'];}
            }
            foreach ($terminados['results'] as $key => $value) {
                $j=$value['extra']['round']??0;
                $jornadas[$j]=$value;
                $equipos[$value['home']['id']][$value['id']]=$value;
                $equipos[$value['away']['id']][$value['id']]=$value;
                if ($value['home']['id']==$idEquipo){ $nombreEquipo=$value['home']['name'];}
                if ($value['away']['id']==$idEquipo){ $nombreEquipo=$value['away']['name'];}
            }

            $partidos = $equipos[$idEquipo];

            $titulo = $nombreEquipo;

            $partidosPreparado = [];
            foreach ($partidos as $partido) {
                $partidosPreparado[] = $indexRepo->prepararPartidoSuelto($partido);
            }

            return $this->container->get('view')->render($response, 'equipo/equipoLive.html.twig', [
                'titleTag' => $titulo,
                'nombreEquipo' => $nombreEquipo,
                'nombreTorneo' => $nombreTorneo,
                'partidos' => $partidosPreparado,
                'proximos' => $proximos,
                'jornadaActiva' => $jornadaActiva,
                'tipo_torneo' => $tipo_torneo,
                'clas' => $clas,
                'temp_id' => $temp_id,
                'temporada_id' => $temporada_id,
            ]);
        }

        $retirados = array();
        $retirado = 0;

        $modelo = $args['modelo'];
        $vista = $args['vista']??'Jugados';

        $datos = $equipoRepo->XequipoClub($equipo_id);

        $equipoClub = $datos['datos'];
        $twEquipo = $equipoClub['slug'];
        $torneos = $datos['torneos'];

        $liga = $datos['liga'];
        $division_id = $datos['division_id'];

        $grupo_liga = $datos['grupo_liga'];
        $visible=$datos['visible']??5;

        $division = 0;
        $equipotxt = $equipoClub['nombre'];
        $categoriatxt = $equipoClub['categoriaN'];

        foreach ($torneos as $key => $value) {
            if ($value['categoria_torneo_id'] == 17) {
                $categoriatxt .= ' - Fútbol Sala';
                break;
            }
        }

        $club_id = $equipoClub['club_id'];

        #$amazon = $generalRepo->enlacesAmazon($club_id);
        $amazon = [];

        $pais_id = $equipoClub['pais_id'];
        $es_seleccion = $equipoClub['es_seleccion'];
        $desaparecido = $equipoClub['desaparecido'];

        

        
        $division = $division_id??0;
        
        

        $categoria_torneo_id = 0;
        $posiciones=array();
        if ('Senior Masculino' == $categoriatxt && 60 == $pais_id) {
            $posiciones = $equipoRepo->XequipoPosiciones($equipo_id);
            if ($liga < 25) {
                $categoria_torneo_id = 1;
            } else {
                $categoria_torneo_id = 4;
            }
        }

        if ('Juvenil Masculino' == $categoriatxt) {
            $categoria_torneo_id = 5;
        }
        if ('Senior Femenino' == $categoriatxt) {
            $categoria_torneo_id = 7;
        }

        $pest_ascenso = 'nacional';
        switch ($categoria_torneo_id) {
            case '1':
                $pest_ascenso = 'nacional';
                break;
            case '4':
                $pest_ascenso = 'autonomicas';
                break;
            case '5':
                $pest_ascenso = 'juveniles';
                break;
            case '7':
                $pest_ascenso = 'femenino';
                break;
        }

        if (60 == $pais_id) {
            $es_nacional = 1;
        } else {
            $es_nacional = 0;
        }
        if (60 == $pais_id && 0 == $es_seleccion) {
            $inicioTemporada = new \DateTime('2015-06-30');
        } else {
            $inicioTemporada = new \DateTime('2011-06-30');
        }

        if ($desaparecido > 1000) {
            $titulo = $equipoClub['nombre'].' - Equipo desaparecido en  '.$desaparecido;
        }

        //if ($desaparecido<1000 && $es_nacional==1 && $es_seleccion==0) {
        $hoy = new \DateTime('now');
        //}

        if (isset($club_id)) {
            $equipos = array();
            $r = $equipoRepo->Xequipos($club_id);


            


            foreach ($r as $k => $equipo) {


                if ((int) $equipo_id == (int) ($equipo['id'])) {
                    $titulo = $equipo['equipo'].' - '.$equipo['categoria'];
                    $equipotxt = $equipo['equipo'];
                    $categoriatxt = $equipo['categoria'];
                    foreach ($torneos as $kt => $vt) {
                        if ($vt['categoria_torneo_id']==17){$categoriatxt.=' - Fútbol Sala'; break; }
                    }
                    $desaparecido = $equipo['desaparecido'];
                    $twitter = $equipo['slug'];
                }
                if (0 == $equipo['torneo'] && $club_id<>8582) { //seleccion española
                    continue;
                }
                

                $equipos[$k] = $equipo;

                $valoresLiga = $equipoRepo->XsaberLiga($equipo['id']);

                

                foreach ($valoresLiga as $kl => $value) {
                    $valoresLiga[$kl]['slug']=$funcionesHelper->poner_guion($value['nombre']??'xxx');
                }



                $equipos[$k]['valoresLiga']=$valoresLiga;

                
            }
        }

        if ($desaparecido > 0 && 'Datos' != $modelo) {$modelo = 'Historico'; }

        $ePartidos = $equipoRepo->XequipoPartidos($equipo_id);

        $estadisticas = $ePartidos['estadisticas'];

        $golesEquipo = $equipoRepo->XequipoGoles($equipo_id);
        $goles = $golesEquipo['goles'];
        $realizadores = $golesEquipo['realizadores'];
        $minutos = $golesEquipo['minutos'];
        $aldescanso = $golesEquipo['aldescanso'];
        $ultimogol = $golesEquipo['ultimogol'];

        $totalPartidos=0;
        if (isset($ePartidos['partidos']) && count($ePartidos['partidos'])>0) {
            $totalPartidos=count($ePartidos['partidos']);
        }



        if (!isset($ePartidos['partidos']) && $modelo!='Plantilla' && $modelo!='Fichajes' && $modelo!='Equipos') {
            $modelo = 'Datos';
        }


        $proximoPartido = null;
        $partidosLiga = null;
        $equipoPlantilla = null;

        switch ($modelo) {
            case 'Datos':

                $pesDatos = 'active';
                break;

            case 'Calendario':
                $pesCalendario = 'active';
                $partidos = array();
                $proximosPartidos = array();
                $porTorneos = array();
                $torneos = array();
                $partidosLiga = array();

                foreach ($ePartidos['partidos'] as $key => $value) {
                    $fecha = date_create($value['fecha']);
                    $diferencia = date_diff($fecha, $hoy);
                    $dias = $diferencia->days;
                    $invertido = $diferencia->invert;

                    $value = $indexRepo->prepararPartido($value);

                    if (1 == $invertido || 0 == $dias) {
                        $proximosPartidos[] = $value;
                    } else {
                        $partidos[] = $value;
                    }
                    $torneos[$value['temporada_id']]['tipo_torneo'] = $value['tipo_torneo'];
                    $torneos[$value['temporada_id']]['nombreTorneo'] = $value['nombreTorneo'];
                    $porTorneos[$value['temporada_id']][] = $value;
                    if (1 == $value['tipo_torneo']) {
                        $_GET['nv'] = $value['nombreTorneo'];
                    }
                }

                $proximoPartido = end($proximosPartidos);

                break;

            case 'Clasificacion':

                $clasificacionRepo = new ClasificacionRepository($db);

                $pesClasificacion = 'active';
                $cachetime = 86400; //86400 un dia.
                $f = '../json/temporada/' . $liga . '/clasificacion.json';
                if (@file_exists($f)) {
                    $fichero_time = @filemtime($f);
                } else {
                    $fichero_time = 0;
                }
                if ((time() - $cachetime) > $fichero_time) {
                    $fichero_time = 0;
                }

                if ($fichero_time > 0) {
                    $json = file_get_contents($f);
                    $clasificacion = json_decode($json, true);
                } else {

                    $torneo = $generalRepo->Xtipo($liga);
                    $valorJornada = $torneo['jornadaActiva'];

                    $clas = array(
                        'temporada_id' => $liga,
                        'jornada' => $valorJornada,
                        'grupo_id' => 0,
                        'equipo_id' => 0,
                        'tipoClasificacion' => 0,
                        'torneo_id' => 0,
                        'jornadas' => 0,
                        'puntosPorganar' => 3,
                    );


                    $clasificacion = $clasificacionRepo->XgenerarClasificacion($clas);

                }
                if (isset($clasificacion)) {
                    foreach ($clasificacion['clasificacionFinal'] as $key => $v) {
                        if ($v['equipo_id'] == $equipo_id) {
                            $datosClas = $v;
                            break;
                        }
                    }

                    $racha = $generalRepo->Xracha($liga, $equipo_id);

                    if (isset($racha[$equipo_id])) {
                        $fila = $racha[$equipo_id];
                        $e_racha = explode(';', $fila['racha']);
                    }
                }

                break;
            case 'Plantilla':

                $pesPlantilla = 'active';
                $equipoPlantilla = $equipoRepo->XequipoPlantilla($equipo_id);
                $equipoPlantilla['liga'] = $liga;

                break;

            case 'Fichajes':

                $pesFichajes = 'active';
                $fichajes = $equipoRepo->Xfichajes($equipo_id);

                break;

            case 'Goleadores':

                $pesGoleadores = 'active';

                break;

            case 'Equipos':

                $pesEquipos = 'active';

                break;

            case 'Historico':

                $pesHistorico = 'active';
                if (isset($division) && @file_exists('../json/clasHistorica_'.$division.'.json')) {
                    $json = file_get_contents('../json/clasHistorica_'.$division.'.json');
                    $cH = json_decode($json, true);
                    foreach ($cH as $key => $v) {
                        if ($v['fm_equipo_id'] == $equipo_id) {
                            $clasHistorica = $v;
                            $clasHistorica['posicion'] = ($key + 1);
                            break;
                        }
                    }
                }
                if (isset($clasHistorica) && isset($datosClas)) {
                    $totalClas = array();
                    $totalClas['posicion'] = $clasHistorica['posicion'];
                    $totalClas['temporadas'] = $clasHistorica['temporadas'] + 1;
                    $totalClas['puntos'] = $clasHistorica['puntos'] + $datosClas['puntos'];
                    $totalClas['jugados'] = $clasHistorica['jugados'] + $datosClas['jugados'];
                    $totalClas['ganados'] = $clasHistorica['ganados'] + $datosClas['ganados'];
                    $totalClas['empatados'] = $clasHistorica['empatados'] + $datosClas['empatados'];
                    $totalClas['perdidos'] = $clasHistorica['perdidos'] + $datosClas['perdidos'];
                    $totalClas['golesFavor'] = $clasHistorica['golesFavor'] + $datosClas['gFavor'];
                    $totalClas['golesContra'] = $clasHistorica['golesContra'] + $datosClas['gContra'];
                }

                $porResultados = array();
                if (isset($porTorneos[$liga])) {
                    foreach ($porTorneos[$liga] as $key => $v2) {
                        if (1 == $v2['estado_partido']) {
                            $partidoClas = $v2['fecha'].','.$v2['jornada'].','.$v2['localCorto'].','.$v2['visitanteCorto'].','.$v2['goles_local'].','.$v2['goles_visitante'].','.$v2['equipoLocal_id'].','.$v2['equipoVisitante_id'].','.$v2['id'];
                            $porResultados[$v2['goles_local'].'-'.$v2['goles_visitante']][] = $partidoClas;
                            $porResultados[$v2['goles_local'].'-'.$v2['goles_visitante']]['diferencia'] = (int) ($v2['goles_local'] - $v2['goles_visitante']);
                        }
                    }
                }
                foreach ($porResultados as $key => $value) {
                    $aux[$key] = $value['diferencia'];
                }
                if (count($porResultados) > 0) {
                    array_multisort($aux, SORT_DESC, $porResultados);
                }
                break;

            case 'Anterior':

                $pesAnterior = 'active';
                break;

            case 'Twitter':

                $pesTwitter = 'active';
                break;

            case 'Tienda':

                $pesTienda = 'active';
                break;

            /*case 'Fidelidad':
                $pesFidelidad = 'active'; $valor = $equipo_id; $modo = 1; $txtmodo = 'equipo';
                $apuestas = XapuestaEquipo($equipo_id);
            break;*/
        }

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();


        if (strlen($equipotxt) > 1) {
            #$pgEquipo = '/resultados-directo/equipo/'.poner_guion($equipotxt).'/'.$equipo_id;
            $pgEquipo = $routeParser->urlFor('equipo_index', [
                'slug' => $slug,
                'idEquipo' => $idEquipo,
            ]);
        } else {
            $pgEquipo = '/equipo.php?id=' . $equipo_id;
        }

        $titulo = $modelo.' '.$equipotxt.' - '.$categoriatxt;
        $metaDescripcion = 'Info y resultados de los partidos del equipo ' . $titulo;

        if ('Datos' == $modelo) {
            $titulo .= ' - Datos del club';
        }
        if ('Calendario' == $modelo) {
            $titulo .= ' - Calendario';
            if (isset($_GET['nv'])) {
                $titulo .= ' - '.$_GET['nv'];
            }
        }
        if ('Plantilla' == $modelo) {
            $titulo .= ' - Plantilla';
            $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        }
        if ('Fichajes' == $modelo) {
            $titulo .= ' - Fichajes';
            $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        }
        if ('Goleadores' == $modelo) {
            $titulo .= ' - Goleadores';
            $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        }
        if ('Estadisticas' == $modelo) {
            $titulo .= ' - Estadísticas';
            $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        }
        if ('Equipos' == $modelo) {
            $titulo .= ' - Equipos del club';
            $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        }
        if ('Historico' == $modelo) {
            $titulo .= ' - Historial en categoría nacional';
            $robots = '<meta name="robots" content="noindex,follow">';
        }

        if ('Tienda' == $modelo) {
            $titulo .= ' - Selección futbolme';
            $metaDescripcion = $modelo.' con los productos del '.$equipotxt.$titulo;
        }

        $tipoVista = 0;



        $equipoVarsTwig = [
            'titleTag' => $titulo,
            'classPagina' => 'equipo',
            'modelo' => $modelo,
            'vista' => $vista,

            'club_id' => $club_id,
            'equipo_id' => $equipo_id,
            'liga' => $liga,
            'division' => $division,

            'idEquipo' => $idEquipo,
            'slug' => $slug,

            'pagina' => $pagina,

            'titulo' => $titulo,
            'metaDescripcion' => $metaDescripcion,


            'es_seleccion' => $es_seleccion,
            'es_nacional' => $es_nacional,
            'visible' => $visible,

            'totalPartidos' => $totalPartidos,
            'amazon' => $amazon,
            'equipos' => $equipos,
            'torneos' => $torneos,


            'posiciones' => $posiciones,


            'equipotxt' => $equipotxt,
            'categoriatxt' => $categoriatxt,


            'equipoClub' => $equipoClub,

            'desaparecido' => $desaparecido,

            'proximoPartido' => $proximoPartido,

            'partidosLiga' => $partidosLiga,
            'porTorneos' => $porTorneos,

            'equipoPlantilla' => $equipoPlantilla,

            'temporada_id' => $temporada_id,

            'fichajes' => $fichajes,

            'pais_id' => $pais_id,
        ];

        if ('Clasificacion' == $modelo) {

            $vista = array_key_exists('vista', $args) ? ucfirst($args['vista']) : '';

            $titulo .= ' - Clasificación';
            if (isset($vista) || isset($_GET['idH'])) {
                $ePartidos = $equipoRepo->XequipoPartidos($equipo_id);
                $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
                $estadisticas = $ePartidos['estadisticas'];


                if (isset($vista)) {
                    $icono="";
                    if ('Estadisticas' == $vista) {
                        $titulo .= ' - Partidos '.$vista;
                        $tipoVista = 10;
                        $pesEstadisticas = 'active';
                        $goles = array();

                        $golesEquipo = $equipoRepo->XequipoGoles($equipo_id);
                        $goles = $golesEquipo['goles'];


                        unset($a);
                        $a = '';
                        unset($b);
                        foreach ($e_racha as $key => $v) {
                            if (!isset($v[1])) {
                                continue;
                            }
                            $value = explode(',', $v);

                            $a .= "'J".$value[1]."',";
                            $nombre = 'Jornada '.$value[1].' '.$value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0].'<br /><b>'.$value[9].'</b> puntos.';
                            if (0 == $value[9]) {
                                $value[9] = 0.2;
                            }
                            $b[$key]['y'] = (float) ($value[9]);
                            $b[$key]['name'] = $nombre;
                            if (3 == (int) $value[9]) {
                                if ($equipo_id == $value[6]) {
                                    $b[$key]['color'] = 'green';
                                } else {
                                    $b[$key]['color'] = '#58FA82';
                                }
                            } elseif (1 == (int) $value[9]) {
                                if ($equipo_id == $value[6]) {
                                    $b[$key]['color'] = 'orange';
                                } else {
                                    $b[$key]['color'] = '#F5DA81';
                                }
                            } else {
                                if ($equipo_id == $value[6]) {
                                    $b[$key]['color'] = 'red';
                                } else {
                                    $b[$key]['color'] = '#F78181';
                                }
                            }
                        }

                        $a = substr($a, 0, -1);
                        $b = isset($b) ? $b : [];
                        $b = json_encode($b);
                        $b = str_replace('"y"', 'y', $b);
                        $b = str_replace('"', "'", $b);
                        $contenedor = $equipo_id;
                        $maximo = 3;
                        $minimo = -0.5;
                        $tipo = 'column';
                        $titulo = null;
                        $subtitulo = '';
                        $textoY = 'Puntos obtenidos';
                        $textoSerie1 = $titulo;
                        $textoSerie2 = '';
                        $textoVY = 'Puntos';


                        if (!isset($fila['equipo_id'])) {
                            $fila['equipo_id'] = $equipo_id;
                        }

                        $te_u_punto = ''; $te_u_victoria = ''; $te_u_empate = ''; $te_u_derrota = '';
                        if (isset($fila['u_punto'])) {
                            $e_u_punto = explode(',', $fila['u_punto']);
                            $e_u_punto[8];
                            if (0 == $fila['u_punto']) {
                                $te_u_punto = 'El '.$fila['nombre'].' todavía no ha conseguido ningún punto.';
                            } else {
                                $te_u_punto = 'Últimos puntos: <b>Jornada '.$e_u_punto[1].'</b>  '.$e_u_punto[0].' 
	<br />'.$e_u_punto[2].'-'.$e_u_punto[3].' (<b>'.$e_u_punto[4].'-'.$e_u_punto[5].'</b>)';
                            }
                        }

                        if (isset($fila['u_victoria'])) {
                            $e_u_victoria = explode(',', $fila['u_victoria']);
                            if (0 == $fila['u_victoria']) {
                                $te_u_victoria = 'El '.$fila['nombre'].' todavía no ha ganado ningún partido.';
                            } else {
                                if ($e_u_punto[8] == $e_u_victoria[8]) {
                                    $te_u_victoria = ' y también es la última victoria conseguida';
                                } else {
                                    $te_u_victoria = '<br />Última victoria: <b>Jornada '.$e_u_victoria[1].'</b>  '.$e_u_victoria[0].' 
		<br />'.$e_u_victoria[2].'-'.$e_u_victoria[3].' (<b>'.$e_u_victoria[4].'-'.$e_u_victoria[5].'</b>)';
                                }
                            }
                        }

                        if (isset($fila['u_empate'])) {
                            $e_u_empate = explode(',', $fila['u_empate']);
                            if (0 == $fila['u_empate']) {
                                $te_u_empate = '<br />El '.$fila['nombre'].' todavía no ha empatado ningún partido.';
                            } else {
                                if ($e_u_punto[8] == $e_u_empate[8]) {
                                    $te_u_empate = ' y también es el última empate conseguido';
                                } else {
                                    $te_u_empate = '<br />Último empate: <b>Jornada '.$e_u_empate[1].'</b>  '.$e_u_empate[0].' 
		<br />'.$e_u_empate[2].'-'.$e_u_empate[3].' (<b>'.$e_u_empate[4].'-'.$e_u_empate[5].'</b>)';
                                }
                            }
                        }

                        if (isset($fila['u_derrota'])) {
                            $e_u_derrota = explode(',', $fila['u_derrota']);
                            if (0 == $fila['u_derrota']) {
                                $te_u_derrota = '<br />El '.$fila['nombre'].' todavía no ha perdido ningún partido.';
                            } else {
                                $te_u_derrota = '<br />Última derrota: <b>Jornada '.$e_u_derrota[1].'</b>  '.$e_u_derrota[0].' 
	<br />'.$e_u_derrota[2].'-'.$e_u_derrota[3].' (<b>'.$e_u_derrota[4].'-'.$e_u_derrota[5].'</b>)';
                            }
                        }


                        $equipoVarsTwig = array_merge($equipoVarsTwig, [
                            'contenedor' => $contenedor,
                            'tipo' => $tipo,
                            'titulo' => null,

                            'te_u_punto' => $te_u_punto,
                            'te_u_victoria' => $te_u_victoria,
                            'te_u_empate' => $te_u_empate,
                            'te_u_derrota' => $te_u_derrota,

                            'minimo' => $minimo,
                            'maximo' => $maximo,
                            'textoSerie1' => $textoSerie1,
                            'a' => $a,
                            'b' => $b,
                        ]);

                    }

                    if ('Puntos' == $vista) {
                        $titulo .= ' - '.$vista.' conseguidos';
                        $tipoVista = 1;
                        $pesPuntos = 'active';
                    }
                    if ('Jugados' == $vista) {
                        $titulo .= ' - Partidos '.$vista;
                        $tipoVista = 2;
                        $pesJugados = 'active';
                    }
                    if ('Ganados' == $vista) {
                        $titulo .= ' - Partidos '.$vista;
                        $tipoVista = 3;
                        $pesGanados = 'active';
                    }
                    if ('Empatados' == $vista) {
                        $titulo .= ' - Partidos '.$vista;
                        $tipoVista = 4;
                        $pesEmpatados = 'active';
                    }
                    if ('Perdidos' == $vista) {
                        $titulo .= ' - Partidos '.$vista;
                        $tipoVista = 5;
                        $pesPerdidos = 'active';
                    }
                    if ('Favor' == $vista) {
                        $titulo .= ' - Goles a '.$vista;
                        $tipoVista = 6;
                        $pesFavor = 'active';
                    }
                    if ('Contra' == $vista) {
                        $titulo .= ' - Goles en '.$vista;
                        $tipoVista = 7;
                        $pesContra = 'active';
                    }
                }
            }

            $equipoVarsTwig = array_merge($equipoVarsTwig, [
                'metaDescripcion' => $metaDescripcion,
                'estadisticas' => $estadisticas,
                'icono' => $icono,
                'titleTag' => $titulo,
                'tipoVista' => $tipoVista,
                'pesEstadisticas' => $pesEstadisticas,
                'goles' => $goles,
                'pesPuntos' => $pesPuntos,
                'pesJugados' => $pesJugados,
                'pesGanados' => $pesGanados,
                'pesEmpatados' => $pesEmpatados,
                'pesPerdidos' => $pesPerdidos,
                'pesFavor' => $pesFavor,
                'pesContra' => $pesContra,
                'ePartidos' => $ePartidos,
                'e_racha' => $e_racha,
                'clasificacion' => $clasificacion,
            ]);

            if (isset($ePartidos) && isset($e_racha) && $tipoVista < 10) {
                $jornadaActiva = (count($e_racha)-1);

                unset($a);
                $a = '';
                unset($b);
                $pts = 0;
                $puntos = array();
                $gf = 0;
                $golesF = array();
                $gc = 0;
                $golesC = array();

                foreach ($e_racha as $key => $v) {
                    $value = explode(',', $v);
                    if (!isset($value[1])) {
                        continue;
                    }

                    if (isset($partido)) {
                        if ($equipo_id == $value[6]) {
                            if ($value[4] == $value[5]) {
                                ++$TOTeEl;
                            } elseif ($value[4] > $value[5]) {
                                ++$TOTeGl;
                            } else {
                                ++$TOTePl;
                            }
                            $TOTeGFl = $TOTeGFl + $value[4];
                            $TOTeGCl = $TOTeGCl + $value[5];
                            $repera[$value[6]][$value[1]][0]['GF'] = $value[4];
                            $repera[$value[6]][$value[1]][0]['GC'] = $value[5];
                            $repera[$value[6]][$value[1]][0]['PT'] = $value[9];
                        } else {
                            if ($value[4] == $value[5]) {
                                ++$TOTeEv;
                            } elseif ($value[5] > $value[4]) {
                                ++$TOTeGv;
                            } else {
                                ++$TOTePv;
                            }
                            $TOTeGFv = $TOTeGFv + $value[5];
                            $TOTeGCv = $TOTeGCv + $value[4];
                            $repera[$value[7]][$value[1]][1]['GF'] = $value[5];
                            $repera[$value[7]][$value[1]][1]['GC'] = $value[4];
                            $repera[$value[7]][$value[1]][1]['PT'] = $value[9];
                        }
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
                        }
                    }

                    if (598 != $liga) {
                        $a .= "'J".$value[1]."',";
                        $nombre = 'Jornada '.$value[1].' '.$value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
                    } else {
                        $a .= "'".$value[0]."',";
                        $nombre = $value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0];
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

                    $b[$key]['y'] = (float) ($value[9]);
                    if ($b[$key]['y'] == 0) {
                        $b[$key]['y'] = 0.2;
                    }
                    $b[$key]['name'] = $nombre;
                    if (3 == (int) $value[9]) {
                        if ($equipo_id == $value[6]) {
                            $b[$key]['color'] = 'green';
                        } else {
                            $b[$key]['color'] = '#58FA82';
                        }
                    } elseif (1 == (int) $value[9]) {
                        if ($equipo_id == $value[6]) {
                            $b[$key]['color'] = 'orange';
                        } else {
                            $b[$key]['color'] = '#F5DA81';
                        }
                    } else {
                        if ($equipo_id == $value[6]) {
                            $b[$key]['color'] = 'red';
                        } else {
                            $b[$key]['color'] = '#F78181';
                        }
                    }
                    $b[$key]['id'] = $value[8];
                }

                $a = substr($a, 0, -1);
                $b = isset($b) ? $b : [];
                $b = json_encode($b);
                $b = preg_replace('/"x"/D', 'x', $b);
                $b = preg_replace('/"y"/D', 'y', $b);
                $b = preg_replace('/"/D', "'", $b);

                $tpuntos = end($puntos);
                $tgolesF = end($golesF);
                $tgolesC = end($golesC);

                $puntos = json_encode($puntos);
                $puntos = str_replace('"', '', $puntos);
                $golesF = json_encode($golesF);
                $golesF = str_replace('"', '', $golesF);
                $golesC = json_encode($golesC);
                $golesC = str_replace('"', '', $golesC);

                $contenedor = $equipo_id;
                $maximo = $pts;
                $minimo = -1;
                $tipo = 'column';
                $titulo = null;
                $subtitulo = $equipotxt;
                $textoY = 'Puntos obtenidos';
                $textoSerie1 = $titulo;
                $textoSerie2 = '';
                $textoVY = 'Puntos';

                $equipoVarsTwig = array_merge($equipoVarsTwig, [
                    'contenedor' => $contenedor,
                    'subtitulo' => $subtitulo,
                    'titulo' => $titulo,
                    'a' => $a,
                    'minimo' => $minimo,
                    'maximo' => $maximo,
                    'textoVY' => $textoVY,
                    'puntos' => $puntos,
                    'golesF' => $golesF,
                    'golesC' => $golesC,
                    'b' => $b,
                ]);
            }


            $ePartidosFiltrados = [];

            if (isset($ePartidos) && $tipoVista < 8) {
                $gcT = 0;
                $gfT = 0;
                $ecT = 0;
                $efT = 0;
                $pcT = 0;
                $pfT = 0;
                $gfcT = 0;
                $gffT = 0;
                $gccT = 0;
                $gcfT = 0;

                $partidos = $ePartidos['partidos'];
                foreach ($partidos as $fila) {

                    if (1 != $fila['tipo_torneo']) {
                        continue;
                    }
                    if ($fila['estado_partido'] < 1 || $fila['estado_partido'] > 2) {
                        continue;
                    }
                    if (1 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] < $fila['goles_visitante']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] > $fila['goles_visitante']) {
                            continue;
                        }
                    }

                    if (3 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] <= $fila['goles_visitante']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] >= $fila['goles_visitante']) {
                            continue;
                        }
                    }
                    if (4 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] != $fila['goles_visitante']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] != $fila['goles_visitante']) {
                            continue;
                        }
                    }
                    if (5 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] >= $fila['goles_visitante']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] <= $fila['goles_visitante']) {
                            continue;
                        }
                    }
                    if (6 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && 0 == $fila['goles_local']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && 0 == $fila['goles_visitante']) {
                            continue;
                        }
                    }
                    if (7 == $tipoVista) {
                        if ($equipo_id == $fila['equipoLocal_id'] && 0 == $fila['goles_visitante']) {
                            continue;
                        }
                        if ($equipo_id == $fila['equipoVisitante_id'] && 0 == $fila['goles_local']) {
                            continue;
                        }
                    }
                    if ($equipo_id == $fila['equipoLocal_id']) {
                        $ePartidoFiltrado['Flocal'] = 'color:rgb(232, 28, 28);';
                        $ePartidoFiltrado['Fvisitante'] = 'color:black;';
                    }
                    if ($equipo_id == $fila['equipoVisitante_id']) {
                        $ePartidoFiltrado['Flocal'] = 'color:black;';
                        $ePartidoFiltrado['Fvisitante'] = 'color: rgb(232, 28, 28);';
                    }

                    $equipo_id=(int)$equipo_id;

                    if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] < $fila['goles_visitante'])
                        || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] > $fila['goles_visitante'])) {
                        if ($equipo_id == $fila['equipoLocal_id']) {
                            $ePartidoFiltrado['colorI'] = '#B40404';
                            $pcT++;
                        } else {
                            $ePartidoFiltrado['colorI'] = '#FE642E';
                            $pfT++;
                        }
                        $ePartidoFiltrado['icono'] = '<span class="badge" style="font-weight:300; background-color:' . $ePartidoFiltrado['colorI'] . '">D</span>';
                    }

                    if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] > $fila['goles_visitante'])
                        || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] < $fila['goles_visitante'])) {
                        if ($equipo_id == $fila['equipoLocal_id']) {
                            $ePartidoFiltrado['colorI'] = '#0B610B';
                            $gcT++;
                        } else {
                            $ePartidoFiltrado['colorI'] = '#01DF01';
                            $gfT++;
                        }
                        $ePartidoFiltrado['icono'] = '<span class="badge" style="font-weight:300; background-color:'.$ePartidoFiltrado['colorI'].'">V</span>';
                    }


                    if ($fila['goles_local'] == $fila['goles_visitante']) {
                        if ($equipo_id == $fila['equipoLocal_id']) {
                            $ePartidoFiltrado['colorI'] = 'orange';
                            $ecT++;
                        } else {
                            $ePartidoFiltrado['colorI'] = '#FACC2E';
                            $efT++;
                        }
                        $ePartidoFiltrado['icono'] = '<span class="badge" style="font-weight:300; background-color:'.$ePartidoFiltrado['colorI'].';">E</span>';
                    }

                    if ($equipo_id == $fila['equipoLocal_id']) {
                        $gfcT=($gfcT+$fila['goles_local']);$gccT=($gccT+$fila['goles_visitante']);
                        $ePartidoFiltrado['iconoGF'] = '<span class="badge" style="font-weight:300; background-color:#0B2161">'.$fila['goles_local'].'</span>';
                        $ePartidoFiltrado['iconoGC'] ='<span class="badge" style="font-weight:300; background-color:#424242">'.$fila['goles_visitante'].'</span>';
                    }
                    if ($equipo_id == $fila['equipoVisitante_id']) {
                        $gffT=($gffT+$fila['goles_visitante']);$gcfT=($gcfT+$fila['goles_local']);
                        $ePartidoFiltrado['iconoGF'] = '<span class="badge" style="font-weight:300; background-color:#013ADF">'.$fila['goles_visitante'].'</span>';
                        $ePartidoFiltrado['iconoGC'] = '<span class="badge" style="font-weight:300; background-color:#A4A4A4">'.$fila['goles_local'].'</span>';
                    }

                    if (198 != $fila['jornada']) {
                        $ePartidoFiltrado['jornada'] = 'J '.$fila['jornada'];
                    } else {
                        $ePartidoFiltrado['jornada'] = $fila['fecha'];
                    }

                    $ePartidoFiltrado['pgEnlace1'] = $routeParser->urlFor('equipo_clasificacion', [
                        'slug' => $funcionesHelper->poner_guion($fila['local']),
                        'idEquipo' => $fila['equipoLocal_id'],
                        'vista' => $vista
                    ]);

                    $ePartidoFiltrado['pgEnlace2'] = $routeParser->urlFor('equipo_clasificacion', [
                        'slug' => $funcionesHelper->poner_guion($fila['visitante']),
                        'idEquipo' => $fila['equipoVisitante_id'],
                        'vista' => $vista
                    ]);

                    $ePartidoFiltrado['localCorto'] = $fila['localCorto'];
                    $ePartidoFiltrado['visitanteCorto'] = $fila['visitanteCorto'];

                    $ePartidoFiltrado['goles_local'] = $fila['goles_local'];
                    $ePartidoFiltrado['goles_visitante'] = $fila['goles_visitante'];


                    $ePartidosFiltrados[] = $ePartidoFiltrado;
                }

                $equipoVarsTwig = array_merge($equipoVarsTwig, [
                    'ePartidosFiltrados' => $ePartidosFiltrados,
                    'gcT' => $gcT,
                    'gfT' => $gfT,
                    'ecT' => $ecT,
                    'efT' => $efT,
                    'pcT' => $pcT,
                    'pfT' => $pfT,
                    'gfcT' => $gfcT,
                    'gffT' => $gffT,
                    'gccT' => $gccT,
                    'gcfT' => $gcfT,
                ]);
            }

        }

        if (trim($temporada_id) == '') {
            $temporada_id = $liga;
            $equipoVarsTwig = array_merge($equipoVarsTwig, [
                'temporada_id' => $temporada_id,
            ]);
        }

        return $this->container->get('view')->render($response, 'equipo/index.html.twig', $equipoVarsTwig);
    }
}