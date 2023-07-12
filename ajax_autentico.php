<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

$pagina = 'index';
$c_finales = 0;$c_resto = 0;$c_partidos = 0;

$path = './json/directos.json';
$json = file_get_contents($path);
$directos = json_decode($json, true);
$c_directos = count($directos);

$path = './json/index.json';
$json = file_get_contents($path);
$partidosDia = json_decode($json, true);
$cabeceras = array();
foreach ($partidosDia as $key => $v) {
    if (1 == $v['estado_partido']) {
        ++$c_finales;
        continue;
    }
    ++$c_resto;
}

$c_partidos = ($c_directos + $c_finales + $c_resto);
$n2=$_GET['n2'];
 switch ($n2) {
            case 'TusEquipos':

                $temporada_id = 0;
                $partidosEquipos = array();
                if ($c_partidos > 0) {
                    if (!isset($_SESSION['torneosE'])) {
                        $_SESSION['torneosE'] = array();
                    }

                    if ($c_directos > 0) {
                        $directosEquipos = array();
                        foreach ($directos as $key => $value) {
                            foreach ($_SESSION['torneosE'] as $key2 => $v) {
                                if (($key2 == $value['equipoLocal_id'] || $key2 == $value['equipoVisitante_id'])) {
                                    $directosEquipos[] = $value;
                                }
                            }
                        }
                        unset($directos);
                        $directos = $directosEquipos;
                        include 'includes/contenidoDirecto.php';
                    }

                    foreach ($partidosDia as $key => $value) {
                        foreach ($_SESSION['torneosE'] as $key2 => $v) {
                            if (($key2 == $value['equipoLocal_id'] || $key2 == $value['equipoVisitante_id']) && 2 != $value['estado_partido']) {
                                $partidosEquipos[] = $value;
                            }
                        }
                    }                    
                    unset($partidosDia);
                    $partidosDia = $partidosEquipos;
                    require_once 'includes/contenidoIndex.php';
                }

                

            break;
            case 'TusTorneos':
                $temporada_id = 0;
                $partidosTorneos = array();
                if ($c_partidos > 0) {
                    if ($c_directos > 0) {
                        $directosTorneos = array();
                        foreach ($directos as $key => $value) {
                            if (isset($_SESSION['torneos'])) {
                                foreach ($_SESSION['torneos'] as $key2 => $v) {
                                    if (442 == $value['temporada_id']) {
                                        continue;
                                    }
                                    if ($key2 == $value['temporada_id']) {
                                        $directosTorneos[] = $value;
                                    }
                                }
                            }
                        }

                        unset($directos);
                        $directos = $directosTorneos;
                        include 'includes/contenidoDirecto.php';
                    }

                    if (isset($_SESSION['torneos'])) {
                        foreach ($partidosDia as $key => $value) {
                            foreach ($_SESSION['torneos'] as $key2 => $v) {
                                if (442 == $value['temporada_id']) {
                                    continue;
                                }
                                if ($value['temporada_id'] == $key2 && 2 != $value['estado_partido']) {
                                    $partidosTorneos[] = $value;
                                    break;
                                }
                            }
                        }
                    }

                    $pag = 'seleccion';
                    $equipo_id = 0;
                    unset($partidosDia);
                    $partidosDia = $partidosTorneos;
                    require_once 'includes/contenidoIndex.php';
                }

               

            break;
            case 'Futbolme': ?>

            
                            
                <?php include 'includes/contenidoDirecto.php'; ?>               
            

            <?php include 'includes/publicidad/cuerpo04.php'; ?>

            <div class="clear"></div>
            <div class="col-xs-12 nopadding">
                    <?php 
                    $path = './json/index_cabeceras.json';
                    $json = file_get_contents($path);
                    $partidosDia = json_decode($json, true); require_once './srcRecursos/pesCabeceras.php'; ?>
            </div>
            <?php break;
        }?>
