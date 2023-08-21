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

class TemporadaController
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
        $funcionesHelper = new FuncionesHelper($db);
        $generalRepo = new GeneralRepository($db);
        $clasificacionRepo = new ClasificacionRepository($db);
        $partidosRepo = new PartidoRepository($db);
        $indexRepo = new IndexRepository($db);
        $urlHelper = new UrlHelper($db);


        date_default_timezone_set('Europe/Madrid');
        $temporada_id = $args['idTorneo'];
        $slug = $args['slug'];

        $valorJornada = array_key_exists('jornada', $args) ? $args['jornada'] : 0;
        $grupo_id = array_key_exists('grupo_id', $args) ? $args['grupo_id'] : 0;
        $activa = 1;

        if (!is_numeric($temporada_id)) {
            $temporada_id = 1;
        }


        $partidos = [];
        $porFecha = 0;
        $nombreprimerGrupo = '';
        $primerGrupo = '';
        $grupos = [];
        $fases = [];

        if ($temporada_id > 1000000){

            $jornadas=array();
            $equipos=array();
            $temp_id=$temporada_id-1000000;
            $carpeta = '../json/newBetsapi/'.$temp_id;
            //$token="7865-b0PXlPMI94xvu3";
            $token="153716-4djEyj4e6JZVou";
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
            $equipo_id=$proximos['results'][0]['home']['id']??0;
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
                $tipo_torneo=1;
                foreach ($proximos['results'] as $key => $value) {
                    if (isset($value['extra']['round'])){
                        $jornadas[$value['extra']['round']][$value['id']]=$value;
                    } else {
                        $jornadas[1000][$value['id']]=$value;
                    }
                    $equipos[$value['home']['id']][$value['id']]=$value;
                    $equipos[$value['away']['id']][$value['id']]=$value;
                }
                foreach ($terminados['results'] as $key => $value) {
                    $j=$value['extra']['round']??0;
                    $jornadas[$j]=$value;
                    $equipos[$value['home']['id']][$value['id']]=$value;
                    $equipos[$value['away']['id']][$value['id']]=$value;
                }

            } else {
                $tipo_torneo = 2;
            }

            $titleTag = $nombreTorneo;

            $partidos = $proximos['results'];


            $partidosPreparado = [];
            foreach ($partidos as $partido) {
                $partidosPreparado[] = $indexRepo->prepararPartidoSuelto($partido);
            }

            return $this->container->get('view')->render($response, 'temporada/partidosSueltos.html.twig', [
                'titleTag' => $titleTag,
                'nombreTorneo' => $nombreTorneo,
                'partidos' => $partidosPreparado,
                'tipo_torneo' => $tipo_torneo,
                'jornadaActiva' => $jornadaActiva,
                'temp_id' => $temp_id,
                'clas' => $clas,
            ]);
        }




        $cachetime = 0; // 3600//86400 un dia.
        $f = '../json/temporada/'.$temporada_id.'/tipo.json';

        if (file_exists($f)) {
            $fichero_time = @filemtime($f);
            if ((time() - $fichero_time)> $cachetime) {
                $temporadaRepo->xtipo($temporada_id);
            }
        } else {
            $temporadaRepo->xtipo($temporada_id);
        }

        $json = file_get_contents($f);
        $datos = json_decode($json, true);



        $torneo=$datos['torneo'];

        $jornadaActiva = $torneo['jornadaActiva'];

        $estad=array();
        $aplazados = [];
        $estad['jugados']=0;
        $estad['vl']=0;
        $estad['vv']=0;
        $estad['em']=0;
        $estad['gl']=0;
        $estad['gv']=0;

        $fechaTxtHoy = date('Y-m-d');

        foreach ($datos['partidos'] as $key => $value) {
            /*
            if ($_SERVER['REMOTE_ADDR'] == '91.116.33.157' && $value['id'] == 931168) {
                dump($value);
                dump((
                        $value['estado_partido'] == 0 || $value['estado_partido'] > 2 and $value['fecha'] < $fechaTxtHoy
                    )
                    ||
                    (
                        $value['estado_partido'] != 1 && $value['jornada'] < $jornadaActiva
                    ));
                exit;
            }
            */

            if (
                    (
                        $value['estado_partido'] == 0 || $value['estado_partido'] > 2 and $value['fecha'] < $fechaTxtHoy
                    )
                    ||
                    (
                        $value['estado_partido'] != 1 && $value['jornada'] < $jornadaActiva
                    )
                ){
                $aplazados[] = $value;
            }

            if ($value['estado_partido']!=1){ continue; }
            $estad['jugados']++;
            if ($value['goles_local']>$value['goles_visitante']){$estad['vl']++;}
            if ($value['goles_local']==$value['goles_visitante']){$estad['em']++;}
            if ($value['goles_local']<$value['goles_visitante']){$estad['vv']++;}
            $estad['gl']=$estad['gl']+$value['goles_local'];
            $estad['gv']=$estad['gv']+$value['goles_visitante'];
        }

        $sumaGolesLocalVisitante = $estad['gl']+$estad['gv'];
        $golesPorPartido = $sumaGolesLocalVisitante == 0 ? 0 : $sumaGolesLocalVisitante / $estad['jugados'];

        $textoLiga= 'La '.$torneo['nombre'].', con '.($estad['gl']+$estad['gv']).' goles en '.$estad['jugados'].' partidos, obtiene un coeficiente 
de '.number_format($golesPorPartido,2).' goles por partido, que materializan '.$estad['vl'].' victorias locales, '.$estad['em'].' empates y '.$estad['vv'].' victorias visitantes.';

        $comunidad_id = $torneo['idComunidad'];
        $nombreComunidad = $torneo['nombreComunidad'];
        $categoria_torneo_id = $torneo['categoria_torneo_id'];

        $id_original=$torneo['id_original']??0;
        //$whatsapp=$torneo['whatsapp'];
        //$whatsapp_url=$torneo['whatsapp_url'];

        //'whatsapp' => $whatsapp,
        //'whatsapp_url' => $whatsapp_url,

        $equipos=$datos['equipos'];

        $fichajes=$datos['fichajes'];


        $clasificacion=$datos['clasificacion'];

        //dump($clasificacion);
        
        $nPartidos=count($datos['partidos']);

        $equiposTw = array();
        foreach ($equipos as $kk => $value) {
            $equiposTw[$kk]['id'] = $value['equipo_id'];
            $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
            $equiposTw[$kk]['idPais'] = $value['pais_id'];
            $equiposTw[$kk]['twitter'] = $value['slug'];
            $equiposTw[$kk]['club_id'] = $value['club_id']??NULL;
        }

        
        $visible = $torneo['visible'];

        //var_dump($visible);

        if ($visible < 4) {
            echo "<div class='text-center'>";
            echo 'Este torneo ya no esta gestionado en futbolme.com... ';
            header ('Location: https://futbolme.com/');
            die;
        }

        $desarrollo = $torneo['desarrollo'];
        $tipoTorneo = $torneo['tipo_torneo'];
        $categoria_torneo_id = $torneo['categoria_torneo_id'];
        $categoria_id = $torneo['categoria_id'];
        $sexo = $torneo['sexo'];
        $idPais = $torneo['idPais'];

        if ('SIN COMUNIDAD' != $nombreComunidad) {
            $nombreComunidad .= '-';
        } else {
            $nombreComunidad = '';
        }
//$nombrePais = $torneo['nombrePais'];
        $nombrePais = '';
        $traduccion = $torneo['traduccion'];
        $nombreTorneo = $torneo['nombre'];
        $jornadas = $torneo['jornadas'];
        $tipoClasificacion = $torneo['tipoClasificacion'];
        $categoria_id = $torneo['categoria_id'];
        $mitadJornada = (int) ($jornadas / 2);
//ascensos y descensos
        $pest_ascenso = 'nacional';
        switch ($categoria_torneo_id) {
            case '1':$pest_ascenso = 'nacional';break;
            case '4':$pest_ascenso = 'autonomicas';break;
            case '5':$pest_ascenso = 'juveniles';break;
            case '7':$pest_ascenso = 'femenino';break;
        }

//divisiones
        $division = 0;
        if (1 == $temporada_id) {$division = 1;$txtDivision = 'Primera División';}
        if (2 == $temporada_id) {$division = 2;$txtDivision = 'Segunda División';}
        if (3055 == $temporada_id || 3056 == $temporada_id) {$division = 3;$txtDivision = 'Primera RFEF';}
        if ($temporada_id>3056 && $temporada_id<3062) {$division = 3;$txtDivision = 'Segunda RFEF';}
        
//jornada en pantalla
        if (1 == $tipoTorneo && $valorJornada > $jornadas) {$valorJornada = $jornadas;}
        if ($valorJornada ==0 ) {$valorJornada = $jornadaActiva;}

        $partidosJornada=array();
        if ($valorJornada==$jornadaActiva){
            $f = '../json/temporada/'.$temporada_id.'/partidosActiva.json';
            if (@file_exists($f)) {
                $json = file_get_contents($f);
                $partidosJornada = json_decode($json, true);
            } else {
                $partidosJornada = $temporadaRepo->Xpartidos($temporada_id, $valorJornada);
                $carpeta = '../json/temporada/'.$temporada_id;
                $funcionesHelper->guardarJSON($partidosJornada, $carpeta.'/partidosActiva.json');
            }
            $asalto=1;
        } else {
            $partidosJornada = $temporadaRepo->Xpartidos($temporada_id, $valorJornada);
            if ($tipoTorneo==1){
                $clas = array(
                    'temporada_id' => $temporada_id,
                    'jornada' => $valorJornada,
                    'grupo_id' => 0,
                    'equipo_id' => 0,
                    'tipoClasificacion' => $torneo['tipoClasificacion'],
                    'torneo_id' => $torneo['torneo_id'],
                    'jornadas' => $torneo['jornadas'],
                    'puntosPorganar' => $torneo['tipoPuntuacion'],
                );
                $clasificacion = $clasificacionRepo->XgenerarClasificacion($clas);
            }
            $asalto=0;
        }


        $NpartidosJornada= is_array($partidosJornada) ? count($partidosJornada) : 0;

        if ($partidosJornada) {
            $partidosJornada = $indexRepo->prepararArrayPartidos($partidosJornada);
        }

        $partidosSinFecha = [];
        $partidosConFecha = [];

        foreach ($partidosJornada as $partido) {
            if (is_null($partido['fecha'])){
                $partidosSinFecha[] = $partido;
            } else {
                $partidosConFecha[] = $partido;
            }
        }


        $modelo = $args['modelo']??'';
        if ($valorJornada>0 && $nPartidos>0 && $modelo==''){ $modelo="Jornada"; }

        if ($nPartidos==0 && count($fichajes)>0){ $modelo="Fichajes"; }

//equipo o selección
        $seleccion = 0; $amistoso = 0; $tipo_eliminatoria = 1;
        if ($temporada_id>665 && $temporada_id<670) { $seleccion = 1;}
        if ($temporada_id>192 && $temporada_id<196) { $seleccion = 1;}
        if (238 == $temporada_id || 191 == $temporada_id || 235 == $temporada_id
            || 244 == $temporada_id || 243 == $temporada_id || 286 == $temporada_id
            || 232 == $temporada_id || 216 == $temporada_id || 290 == $temporada_id
            || 189 == $temporada_id || 203 == $temporada_id || 202 == $temporada_id || 200 == $temporada_id || 3088 == $temporada_id || 3098 == $temporada_id
        ) { $seleccion = 1;}
//amistosos
//imp($activa);
//imp($valorJornada);



//************//estos torneos cambian el tipoTorneo
//************//estos torneos cambian el tipoTorneo
//************//estos torneos cambian el tipoTorneo
//************//estos torneos cambian el tipoTorneo
        if (442 == $temporada_id || 231 == $temporada_id) {
            $tipoTorneo = 5; //amistosos
            $partidos = $temporadaRepo->Xpartidos($temporada_id, 0);
            $fasesSQL = $generalRepo->Xfases_jornadas($temporada_id);
        }
//eliminatorio corto
        if (244 == $temporada_id || 187 == $temporada_id ||
            185 == $temporada_id || 188 == $temporada_id ||
            ($temporada_id > 257 && $temporada_id < 276)) {
            $tipoTorneo = 4; //eliminatorioCorto
            $fasesSQL = $generalRepo->Xfases_jornadas($temporada_id);
            foreach ($fasesSQL as $value) {
                $tipo_eliminatoria = $value['tipo_eliminatoria'];
                if (3 == $tipo_eliminatoria) {
                    $fases = $funcionesHelper->prepararFasesEliminatorio($fasesSQL);
                    $grupos = $funcionesHelper->prepararGruposEliminatorio($temporada_id, $fases);
                    $partidos[$value['fase_id']] = $temporadaRepo->Xpartidos($temporada_id, $value['fase_id']);
                } else {
                    $partidos[$value['fase_id']] = $temporadaRepo->Xpartidos($temporada_id, $value['fase_id']);
                }
            }
        }



//promociones
        if (239 == $temporada_id || 462 == $temporada_id || 206 == $temporada_id || 207 == $temporada_id || 208 == $temporada_id) {
            $promocion = 1;
            $tipoTorneo = 2; //eliminatorioPromocion
            $fasesSQL = $generalRepo->Xfases_jornadas($temporada_id);
            $partidos = $temporadaRepo->Xpartidos($temporada_id, 0);
            foreach ($fasesSQL as $value) {

                if ($valorJornada == $value['fase_id']) {
                    $tipo_eliminatoria = $value['tipo_eliminatoria'];
                }
            }
            $fases = $funcionesHelper->prepararFasesEliminatorio($fasesSQL);
            foreach ($fases as $id => $fila) {
                if ($id == $valorJornada) {
                    $ne = $fila['nombre'];
                }
            }
        }



//************//estos torneos cambian el tipoTorneo

        $htid = null;
        $temporada_original = null;

        if (2 == $tipoTorneo) {


            $fasesSQL = $generalRepo->Xfases_jornadas($temporada_id);
            foreach ($fasesSQL as $value) {
                if ($valorJornada == $value['fase_id']) {
                    $tipo_eliminatoria = $value['tipo_eliminatoria'];
                }
            }
            if ((empty($valorJornada) || '-1' == $valorJornada) && 186 != $temporada_id) {
                $fecha = new \DateTime();
//        $diaAnterior = new \DateTime();
//        $diaSiguiente = new \DateTime();
                $dia = $fecha->format('Y-m-d');
                $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
                $diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);
                $diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
                $diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');
                $pr = array();
                $ph = array();
                $pa = array();
                $pm = array();
                $partidos = $partidosRepo->Xpartidos($temporada_id, 0);
                foreach ($partidos as  $value) {
                    if (!isset($value['jornada'])) {
                        continue;
                    }
                    if ($value['fecha'] == $diaAnterior) {
                        $ph[] = $value;
                        continue;
                    }
                    if ($value['fecha'] == $dia) {
                        $ph[] = $value;
                        continue;
                    }
                    if ($value['fecha'] == $diaSiguiente) {
                        $ph[] = $value;
                        continue;
                    }
                    if (1 == $value['estado_partido']) {
                        continue;
                    }
                }

                $partidos = $ph;
                if (count($partidos) > 0) {
                    $tipo_eliminatoria = 1;
                    $porFecha = 1;
                } else {
                    $partidos = $partidosRepo->Xpartidos($temporada_id, $valorJornada);
                    $porFecha = 0;
                }
            } else {
                $partidos = $partidosRepo->Xpartidos($temporada_id, $valorJornada);
                $porFecha = 0;
            }

            //si empieza el 238 hay que quitarlo de la condicion. && 238 != $temporada_id
            if (!isset($_GET['idH7']) && !isset($_GET['eH7'])) {
                $fases = $funcionesHelper->prepararFasesEliminatorio($fasesSQL);
                $grupos = $funcionesHelper->prepararGruposEliminatorio($temporada_id, $fases);

                foreach ($fases as $id => $fila) {
                    if ($id == $valorJornada) {
                        $ne = $fila['nombre'];
                    }
                }

                $primerGrupo = 0;
                $nombreprimerGrupo = '';
                $conta = 0;

                if (3 == $tipo_eliminatoria) {
                    foreach ($grupos as $fase => $gruposFase) {
                        if ($fase == $valorJornada) {
                            foreach ($gruposFase as $id => $grupo) {
                                $conta = $conta + 1;
                                if (1 == $conta && 0 == $primerGrupo) {
                                    $primerGrupo = $id;
                                    $nombreprimerGrupo = $grupo['nombre'];
                                }
                                if ($grupo_id == $id) {
                                    $primerGrupo = $id;
                                    $nombreprimerGrupo = $grupo['nombre'];
                                }
                            }
                        }
                    }
                } //si tipo eliminatoria=3

                if (238 == $temporada_id && 4 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 18;
                    $nombreprimerGrupo = 'Grupo D';
                }
                if (235 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 13;
                    $nombreprimerGrupo = 'Grupo 8';
                }

                if (216 == $temporada_id && 4 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 16;
                    $nombreprimerGrupo = 'Grupo B';
                }

                if (189 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 14;
                    $nombreprimerGrupo = 'Grupo 9';
                }

                if (232 == $temporada_id && 6 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 7;
                    $nombreprimerGrupo = 'Grupo 2';
                }
                if (666 == $temporada_id && 70 == $valorJornada && 0 == $grupo_id) {
                    $primerGrupo = 9;
                    $nombreprimerGrupo = 'Grupo 4';
                }
            } else {
                if (isset($_GET['idH7'])) {
                    $numeroPartidos = 1; //para mostrar el ir a la temporada actual
                    $sql = 'SELECT id AS htid,nombre_temporada,torneo_id FROM historicotemporadas WHERE id='.$_GET['idH7'];
                    $valorJornada = 0;
                    if (isset($_GET['jornada'])) {
                        $valorJornada = $_GET['jornada'];
                    }
                } else {
                    $numeroPartidos = 0;
                    $sql = 'SELECT id AS htid,nombre_temporada,torneo_id FROM historicotemporadas WHERE torneo_id='.$id_original.' ORDER BY id DESC';
                    $valorJornada = 0;
                }
                $temporada_original = $temporada_id;

                $resultadoSQL = $this->db->query($sql);
                $resultado = $this->db->fetch($resultadoSQL);

                $edicion = $resultado['nombre_temporada'];

                $htid = $resultado['htid'];
                $temporada_id = $resultado['htid'];
                $torneo_id = $resultado['torneo_id'];
                $nombreTorneo = $nombreTorneo.' '.$edicion;
                $p = X2partidosH($temporada_id);
                if (isset($_GET['eH7'])) {
                    $partidos = $p;
                    $equipo_id = $_GET['eH7'];
                } else {
                    $fases = array();
                    $grupos = array();
                    $partidos = array();
                    foreach ($p as $key => $value) {
                        if (0 == $key && 0 == $valorJornada) {
                            $valorJornada = $value['jornada'];
                        }
                        if ($value['jornada'] == $valorJornada) {
                            $partidos[] = $value;
                        }
                        $fases[$value['jornada']]['id'] = $temporada_id;
                        $fases[$value['jornada']]['eliminatoria_id'] = $value['jornada'];
                        $fases[$value['jornada']]['nombre'] = $value['nombre_eliminatoria'];
                        $fases[$value['jornada']]['orden'] = $key;
                        if ($value['grupo_id'] > 0) {
                            $fases[$value['jornada']]['tipo_eliminatoria'] = 3;
                            $grupos[$value['jornada']][$value['grupo_id']]['id'] = $temporada_id;
                            $grupos[$value['jornada']][$value['grupo_id']]['grupo_id'] = $value['grupo_id'];
                            $grupos[$value['jornada']][$value['grupo_id']]['nombre'] = 'Grupo '.$key;
                            $grupos[$value['jornada']][$value['grupo_id']]['orden'] = $key;
                        } else {
                            $fases[$value['jornada']]['tipo_eliminatoria'] = 1;
                        }
                    }
                } //si existe eH7 cogemos todos los partidos
                //$tipoTorneo = 7;
            }
        }





        $descJornada='';
            if (!empty($_GET['jornada'])) {
                $descJornada = ' - Jornada '.$_GET['jornada'];
            }

            if($partidosJornada>0) {
                if ($tipoTorneo==1){
                    $descJornada = 'Jornada '.$valorJornada;
                } else {
                    $descJornada = 'Nombre fase '.$valorJornada;
                }
            }

            $colorL = '';
            $colorV = '';

            #$pgTemporada = '/resultados-directo/torneo/'.$funcionesHelper->poner_guion($nombreTorneo).'/'.$temporada_id.'/';

            $pgTemporada = $urlHelper->getUrlTorneo($temporada_id);

            #$pgTemporadaJornada = '/resultados-directo/torneo/'.$funcionesHelper->poner_guion($nombreTorneo).'/'.$temporada_id.'/'.$valorJornada;
            $pgTemporadaJornadaBase = $urlHelper->getUrlTorneo($temporada_id, 'jornada');
            $pgTemporadaJornada = $pgTemporadaJornadaBase . '/' . $valorJornada;



            $temporada = __TEMPORADA__;

            if ($tipoTorneo == 1){
                $nombreTemporada="Temporada ".$temporada;
            } else {
                $nombreTemporada="Edición ".$temporada;
            }

            if ($categoria_torneo_id == 17){
                $nombreTorneo.=' - Fútbol Sala';
            }

            $metaDescripcion = 'Resultados, clasificación, datos, estadísticas, goleadores y zamoras de '.$nombreTorneo.' ('.$temporada.')'.$descJornada;

            if (186 == $temporada_id && 1 == __APP__) {
                $nombreTorneo = 'CAMP. DE ESPAÑA - Copa S.M. El Rey';
            }
            if (1 == $temporada_id) {
                //$nombreTorneo = 'PRIMERA DIVISIÓN LaLiga Santander';
            }
            if (2 == $temporada_id) {
                //$nombreTorneo = 'SEGUNDA DIVISIÓN LaLiga SmartBank';
            }
            if (214 == $temporada_id) {
                //$nombreTorneo = 'PRIMERA DIVISIÓN FEMENINA FINETWORK LIGA F';
            }
            if (1720 == $temporada_id) {
                $nombreTorneo = 'SEGUNDA DIVISIÓN FEMENINA - Grupo Norte';
            }
            if (1721 == $temporada_id) {
                $nombreTorneo = 'SEGUNDA DIVISIÓN FEMENINA - Grupo Sur';
            }

            /*if (3055 == $temporada_id) {
                //$nombreTorneo = 'PRIMERA DIVISIÓN RFEF Footters - GRUPO 1';
                $nombreTorneo = 'PRIMERA FEDERACIÓN GRUPO 1';
            }

            if (3056 == $temporada_id) {
                //$nombreTorneo = 'PRIMERA DIVISIÓN RFEF Footters - GRUPO 2';
                $nombreTorneo = 'PRIMERA FEDERACIÓN GRUPO 2';
            }*/

            $directos = [];
            if ($valorJornada == $jornadaActiva) {
                $directos = $indexRepo->getDirectos();
                $directosTemporada = array();
                foreach ($directos as $directo) {
                    if ($directo['temporada_id'] == $temporada_id) {
                        $directosTemporada[] = $directo;
                    }
                }
                unset($directos);
                $directos = $directosTemporada;
                unset($directosTemporada);
            }

            $c_directos = count($directos);

            $titulo = $nombreTorneo.' - '.$nombreTemporada.' - '.$descJornada;

            $titleTag = $titulo;

            if (array_key_exists('modelo', $args)) {
                $titleTag = $args['modelo'] . ' - ' . $titleTag;
            }

            $partidosIndexFeed = [];

            #$comunidad_id = 6;
            #$temporada_id = 947;

            $categorias = null;

            if (isset($temporada_id) && isset($comunidad_id) && $comunidad_id>1) {
                if (21 == $comunidad_id) {
                    $comunidad_id = 10;
                }
                if (22 == $comunidad_id) {
                    $comunidad_id = 11;
                }

                $path = '../json/menus/menu'.($comunidad_id - 1).'.json';
                $json = file_get_contents($path);
                $categorias = json_decode($json, true);
            }

            $goleadores = null;
            if ($modelo == 'Goleadores') {
                $goleadores = $generalRepo->XclasificacionGoleadores($temporada_id);
            }

            if ($visible==86 || $visible==6){

                $arrayVacio=array();

                $clasiCoe=$clasificacion['clasificacionFinal']??$arrayVacio;
                $colorines=array();
                   foreach ($clasiCoe as $key => $value) {

                    $colorines[$value['posicion']]=$value['css'];

                    

                     if ($value['jugados']>0){
                        $clasiCoe[$key]['coe']=$value['puntos']/$value['jugados'];
                     } else {
                        $clasiCoe[$key]['coe']=0;                        
                     }
                     $clasiCoe[$key]['posicion']=($key+1);
                       
                   }

                

                $ordenCoe = [];
                foreach ($clasiCoe as $key => $clasifica) { $ordenCoe[$key] = $clasifica['coe'];}
                array_multisort($ordenCoe, SORT_DESC, SORT_NUMERIC, $clasiCoe);

                foreach ($clasiCoe as $key => $clasifica){
                   $clasiCoe[$key]['posicion']=($key+1);
                   $clasiCoe[$key]['css']=$colorines[($key+1)];
                }

                $clasificacion['clasificacionFinal']=$clasiCoe;

            }

            /*if ($temporada_id==3081){
                    $a=$clasificacion['clasificacionFinal'][12];
                    $b=$clasificacion['clasificacionFinal'][13];
                    $a['posicion']=14;$b['posicion']=13;
                    $clasificacion['clasificacionFinal'][12]=$b;
                    $clasificacion['clasificacionFinal'][13]=$a;
                }
            */
           

            /*if ($temporada_id==2931 || $temporada_id==2978 || $temporada_id==2938 || $temporada_id==2879 ||$temporada_id==2895 || $temporada_id==413 || $temporada_id==2946 || $temporada_id==2943 || $temporada_id==2944 || $temporada_id==2945 || $temporada_id==2947 || $temporada_id==2992 || $temporada_id==2906 || $temporada_id==2874 || $temporada_id==2995 || $temporada_id==2973 || $temporada_id==2932 || $temporada_id==2909 || $temporada_id==2980 || $temporada_id==2989|| $temporada_id==2899 || $temporada_id==3007){

                if ($temporada_id==2895 || $temporada_id==413 || $temporada_id==2995){
                    $a=$clasificacion['clasificacionFinal'][0];
                    $b=$clasificacion['clasificacionFinal'][1];
                    $a['posicion']=2;$b['posicion']=1;
                    $clasificacion['clasificacionFinal'][0]=$b;
                    $clasificacion['clasificacionFinal'][1]=$a;
                }

                if ($temporada_id==2932){
                    $a=$clasificacion['clasificacionFinal'][1];
                    $b=$clasificacion['clasificacionFinal'][2];
                    $a['posicion']=3;$b['posicion']=2;
                    $clasificacion['clasificacionFinal'][1]=$b;
                    $clasificacion['clasificacionFinal'][2]=$a;
                }

                if ($temporada_id==2989){
                    $a=$clasificacion['clasificacionFinal'][1];
                    $b=$clasificacion['clasificacionFinal'][3];
                    $a['posicion']=4;$b['posicion']=2;
                    $clasificacion['clasificacionFinal'][1]=$b;
                    $clasificacion['clasificacionFinal'][3]=$a;
                }

                if ($temporada_id==2931 || $temporada_id==2906 || $temporada_id==2874 || $temporada_id==2973){
                    $a=$clasificacion['clasificacionFinal'][2];
                    $b=$clasificacion['clasificacionFinal'][3];
                    $a['posicion']=4;$b['posicion']=3;
                    $clasificacion['clasificacionFinal'][2]=$b;
                    $clasificacion['clasificacionFinal'][3]=$a;
                }

                if ($temporada_id==2978 || $temporada_id==2879 || $temporada_id==2944 || $temporada_id==2899){
                    $a=$clasificacion['clasificacionFinal'][3];
                    $b=$clasificacion['clasificacionFinal'][4];
                    $a['posicion']=5;$b['posicion']=4;
                    $clasificacion['clasificacionFinal'][3]=$b;
                    $clasificacion['clasificacionFinal'][4]=$a;
                }

                if ($temporada_id==2938){
                    $a=$clasificacion['clasificacionFinal'][4];
                    $b=$clasificacion['clasificacionFinal'][5];
                    $a['posicion']=6;$b['posicion']=5;
                    $clasificacion['clasificacionFinal'][4]=$b;
                    $clasificacion['clasificacionFinal'][5]=$a;
                }

                if ($temporada_id==2946 || $temporada_id==2943 || $temporada_id==2874 || $temporada_id==2980){
                    $a=$clasificacion['clasificacionFinal'][5];
                    $b=$clasificacion['clasificacionFinal'][6];
                    $a['posicion']=7;$b['posicion']=6;
                    $clasificacion['clasificacionFinal'][5]=$b;
                    $clasificacion['clasificacionFinal'][6]=$a;
                }

                if ($temporada_id==2909){
                    $a=$clasificacion['clasificacionFinal'][5];
                    $b=$clasificacion['clasificacionFinal'][7];
                    $a['posicion']=8;$b['posicion']=6;
                    $clasificacion['clasificacionFinal'][5]=$b;
                    $clasificacion['clasificacionFinal'][7]=$a;
                }

                if ($temporada_id==2947 || $temporada_id==2992){
                    $a=$clasificacion['clasificacionFinal'][6];
                    $b=$clasificacion['clasificacionFinal'][7];
                    $a['posicion']=8;$b['posicion']=7;
                    $clasificacion['clasificacionFinal'][6]=$b;
                    $clasificacion['clasificacionFinal'][7]=$a;
                }

                if ($temporada_id==3007){
                    $a=$clasificacion['clasificacionFinal'][7];
                    $b=$clasificacion['clasificacionFinal'][8];
                    $a['posicion']=9;$b['posicion']=8;
                    $clasificacion['clasificacionFinal'][7]=$b;
                    $clasificacion['clasificacionFinal'][8]=$a;
                }

                if ($temporada_id==2945){
                    $a=$clasificacion['clasificacionFinal'][8];
                    $b=$clasificacion['clasificacionFinal'][9];
                    $a['posicion']=10;$b['posicion']=9;
                    $clasificacion['clasificacionFinal'][8]=$b;
                    $clasificacion['clasificacionFinal'][9]=$a;
                }



            }*/

            

            
            
            $variablesPagina = [
                'titleTag' => $titleTag,
                'metaDescripcion' => $metaDescripcion,

                'temporada_id' => $temporada_id,
                'division' => $division,
                'slug' => $slug,

                'jornadas' => $jornadas,
                'c_directos' => $c_directos,

                'partidosIndexFeed' => $partidosIndexFeed,

                'aplazados' => $aplazados,

                'valorJornada' => $valorJornada,

                'idPais' => $idPais,
                'comunidad_id' => $comunidad_id,
                'nombreComunidad' => $nombreComunidad,
                'categoria_torneo_id' => $categoria_torneo_id,

                'tipoTorneo' => $tipoTorneo,
                

                'nombreTorneo' => $nombreTorneo,
                'textoLiga' => $textoLiga,

                'directos' => $directos,

                'temporada_original' => $temporada_original,
                'htid' => $htid,
                'jornadaActiva' => $jornadaActiva,

                'partidosJornada' => $partidosJornada,
                'partidosSinFecha' => $partidosSinFecha,
                'partidosConFecha' => $partidosConFecha,

                'clasificacion' => $clasificacion,
                

                'pgTemporada' => $pgTemporada,
                'pgTemporadaJornadaBase' => $pgTemporadaJornadaBase,
                'pgTemporadaJornada' => $pgTemporadaJornada,

                'visible' => $visible,

                'pest_ascenso' => $pest_ascenso,

                'equiposTw' => $equiposTw,

                'modelo' => $modelo,


                'mitadJornada' => $mitadJornada,

                'equipos' => $equipos,

                'goleadores' => $goleadores,

                'datos' => $datos,

                'categorias' => $categorias,
                'fichajes' => $fichajes,
            ];




            switch ($tipoTorneo) {
                case '1':
                    #require_once 'includes/pagTemporada/arranque2.php';
                    #require_once 'includes/pagTemporada/liga.php';

                    if ($modelo == 'Jornada') {
                        if ($comunidad_id > 1){
                            $resultado = $indexRepo->getPartidosIndexFederaciones();

                            $partidosFed=array();
                            foreach ($resultado as $key => $value) {
                                $partidosFed[$value['idComunidad']][$value['temporada_id']][]=$value;
                            }

                            if (isset($partidosFed[$comunidad_id][$temporada_id])){
                                foreach ($partidosFed[$comunidad_id][$temporada_id] as $key => $partido) {
                                    if ($partido['jornada'] != $valorJornada){
                                        $partidosIndexFeed[] = $partido;
                                    }
                                }
                            }
                        }
                    }

                    break;

                case '2':
                case '3':
                    #Eliminatorio
                    #Eliminatorio largo

                    $partidosPreparados = $indexRepo->prepararArrayPartidos($partidos);

                    

                    $variablesPagina = array_merge($variablesPagina, [
                        'c_directos' => $c_directos,
                        'directos' => $directos,
                        'fases' => $fases,
                        'valorJornada' => $valorJornada,
                        'tipo_eliminatoria' => $tipo_eliminatoria,
                        'grupos' => $grupos,
                        'primerGrupo' => $primerGrupo,
                        'grupo_id' => $grupo_id,
                        'temporada_id' => $temporada_id,
                        'slug' => $slug,
                        'nombreprimerGrupo' => $nombreprimerGrupo,
                        'partidos' => $partidosPreparados,
                        'porFecha' => $porFecha,
                        'seleccion' => $seleccion,
                    ]);

                    break;

                case '4':

                    #Eliminatorio corto
                    $partidosPreparados = [];
                    foreach ($partidos as $idFase => $arrayPartidos) {
                        $partidosPreparados[$idFase] = $indexRepo->prepararArrayPartidos($arrayPartidos);
                    }

                    $variablesPagina = array_merge($variablesPagina, [
                        'c_directos' => $c_directos,
                        'directos' => $directos,
                        'fases' => $fases,
                        'valorJornada' => $valorJornada,
                        'tipo_eliminatoria' => $tipo_eliminatoria,
                        'grupos' => $grupos,
                        'primerGrupo' => $primerGrupo,
                        'grupo_id' => $grupo_id,
                        'temporada_id' => $temporada_id,
                        'slug' => $slug,
                        'nombreprimerGrupo' => $nombreprimerGrupo,
                        'partidos' => $partidosPreparados,
                        'porFecha' => $porFecha,
                        'seleccion' => $seleccion,
                        'fasesSQL' => $fasesSQL,
                    ]);

                    break;
                case '5':

                    $fecha = new \DateTime();
                    $dia = $fecha->format('Y-m-d');

                    $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
                    $diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);

                    $diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
                    $diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');

                    $pr = [];
                    $ph = [];
                    $pa = [];
                    $pm = [];

                    $partidosPreparados = $indexRepo->prepararArrayPartidos($partidos);

                    foreach ($partidos as  $value) {
                        if (!isset($value['jornada'])) {
                            continue;
                        }
                        if ($value['fecha'] == $diaAnterior) {
                            $pa[] = $value;
                            continue;
                        }
                        if ($value['fecha'] == $dia) {
                            $ph[] = $value;
                            continue;
                        }
                        if ($value['fecha'] == $diaSiguiente) {
                            $pm[] = $value;
                            continue;
                        }
                        if (1 == $value['estado_partido']) {
                            continue;
                        }
                        $pr[] = $value;
                    }

                    $phAc = ''; $pmAc = ''; $prAc = ''; $pRev = '';
                    if (count($ph) > 0) {
                        $phAc = 'active';
                        $pmAc = '';
                        $prAc = '';
                    } elseif (count($pm) > 0) {
                        $phAc = '';
                        $pmAc = 'active';
                        $prAc = '';
                    } elseif (count($pr) > 0) {
                        $phAc = '';
                        $pmAc = '';
                        $prAc = 'active';
                    }


                    $variablesPagina = array_merge($variablesPagina, [
                        'partidos' => $partidosPreparados,

                        'pa' => $pa,
                        'ph' => $ph,
                        'pm' => $pm,
                        'pr' => $pr,

                        'phAc' => $phAc,
                        'pmAc' => $pmAc,
                        'prAc' => $prAc,
                    ]);


                    break;
                case '6':
                    #require_once 'includes/temporada/eliminatorioHis.php';
                    break;
                case '7':
                    #require_once 'includes/pagTemporada/eliminatorioLargoH.php';
                    break;
                case '8':
                    #require_once 'includes/pagTemporada/eliminatorioPromocion.php';
                    break;

            }

            return $this->container->get('view')->render($response, 'temporada/index.html.twig', $variablesPagina);
    }

    public function zPlayClasi(Request $request, Response $response, $args)
    {
        $db = new DbHelper();

        $temporadaRepo = new TemporadaRepository($db);
        $clasificacionRepo = new ClasificacionRepository($db);

        $temporada_id = $_POST['temporada_id'];
        $jornada = $_POST['jornada'];

        $cachetime = 86400; //un dia.
        $f = '../json/temporada/'.$temporada_id.'/tipo.json';
        if (@file_exists($f)) {
            $fichero_time = @filemtime($f);
            if ((time() - $fichero_time)> $cachetime) {
                $temporadaRepo->Xtipo($temporada_id);
            }
        } else {
            $temporadaRepo->Xtipo($temporada_id);
        }

        $json = file_get_contents($f);
        $datos = json_decode($json, true);

        $torneo=$datos['torneo'];

        $jornadas = $torneo['jornadas'];
        $jornadaActiva = $torneo['jornadaActiva'];
        $mitadJornada = (int)($jornadas / 2);

        if ($jornada == -3) {
            $c = $datos['clasificacion'];
            $clasificacion = $c['clasificacionFinal'];
            $c1 = 'cajagrisoscuro';
            $c2 = 'celestebox';
            $c3 = 'celestebox';
            $c4 = 'celestebox';
            $c5 = 'celestebox';
            $c6 = 'celestebox';
        } else {
            $clasificacion = $clasificacionRepo->XplayClasificacion($temporada_id, $jornada);
            if ($jornada == -1) {
                $c1 = 'celestebox';
                $c2 = 'cajagrisoscuro';
                $c3 = 'celestebox';
                $c4 = 'celestebox';
                $c5 = 'celestebox';
                $c6 = 'celestebox';
            }
            if ($jornada == -2) {
                $c1 = 'celestebox';
                $c2 = 'celestebox';
                $c3 = 'cajagrisoscuro';
                $c4 = 'celestebox';
                $c5 = 'celestebox';
                $c6 = 'celestebox';
            }
            if ($jornada == -4) {
                $c1 = 'celestebox';
                $c2 = 'celestebox';
                $c3 = 'celestebox';
                $c4 = 'cajagrisoscuro';
                $c5 = 'celestebox';
                $c6 = 'celestebox';
            }
            if ($jornada == -5) {
                $c1 = 'celestebox';
                $c2 = 'celestebox';
                $c3 = 'celestebox';
                $c4 = 'celestebox';
                $c5 = 'cajagrisoscuro';
                $c6 = 'celestebox';
            }
            if ($jornada < -5) {
                $c1 = 'celestebox';
                $c2 = 'celestebox';
                $c3 = 'celestebox';
                $c4 = 'celestebox';
                $c5 = 'celestebox';
                $c6 = 'cajagrisoscuro';
            }
        }

        return $this->container->get('view')->render($response, 'temporada/__content/__part/pesClasificacion.html.twig', [
            'temporada_id' => $temporada_id,
            'jornadas' => $jornadas,
            'jornadaActiva' => $jornadaActiva,
            'mitadJornada' => $mitadJornada,
            'jornada' => $jornada,
            'clasificacion' => [
                'clasificacionFinal' => $clasificacion,
            ],
        ]);
    }
}