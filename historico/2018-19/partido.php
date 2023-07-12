<?php 
require_once 'src/config.php';

$pag = 'partido';

if (isset($_GET['id'])) {
    $partido_id = $_GET['id'];
    if (isset($_SERVER['REQUEST_URI'])) {
        $uri = ($_SERVER['REQUEST_URI']);
        $u = explode('/', $uri);
        if (isset($u[5])) {
            $partido_id = $u[4];
        }
    }

}

if (!isset($partido_id) || !is_numeric($partido_id)) {
    header('Location:/');
    die();
}


if (isset($_GET['modelo'])) {
    $modelo = $_GET['modelo'];
} else {
    $modelo = 'Partido';
}


    $partido = Xpartido($partido_id);
    $visible = $partido['visible'];
    $apuesta_torneo = $partido['apuesta_torneo'];
    $id_original = $partido['id_original'];
    $e1 = $partido['equipoLocal_id'];
    $e2 = $partido['equipoVisitante_id'];
    $et1 = $partido['local'];
    $et2 = $partido['visitante'];
    if (1 == $partido['tipo_torneo']) {
        $liga_local = $partido['temporada_id'];
        $liga_visitante = $partido['temporada_id'];
    } else {
        $liga_local = $partido['liga_local'];
        $liga_visitante = $partido['liga_visitante'];
    }
    
        $es_directo = 0;
   

    $horaPrevista = DateTime::createFromFormat('H:i:s', $partido['hora_prevista']);
    $horaActual = date('Y-m-j H:m:s');
    $seleccion = $partido['es_seleccion'];
    $temporada_id = $partido['temporada_id'];
    $division = 0;
    if (1 == $temporada_id) {
        $division = 1;
    }
    if (2 == $temporada_id) {
        $division = 2;
    }
    if ($temporada_id > 2 && $temporada_id < 7) {
        $division = 3;
    }
    if ($temporada_id > 6 && $temporada_id < 25) {
        $division = 4;
    }

    if ($partido['pais_imagen'] > 198 && $partido['pais_imagen'] < 202) {
        unset($liga_local);
        unset($liga_visitante);
    }


if (!isset($partido)) {
    //imp($_GET);
    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
    die('no encontramos este partido');
}



$pgPartido = '/partido.php?id='.$partido_id;

$pgPartido2 = '/partido.php?id='.$partido_id;

$titulo = $partido['local'].' - '.$partido['visitante'].' :: '.$partido['nombreTemporada'].' '.$modelo;
$metaDescripcion = $titulo;

?>

<?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo; ?></title>


</head>

<?php require_once 'includes/contenedorSup.php'; ?>

        <div class="col-xs-12 whitebox nopadding">
        <?php
            require_once 'includes/pagPartido/partido1.php';?>
        
        </div>
 <?php require_once 'includes/contenedorInf.php'; ?>           
