<?php
define('_FUTBOLME_', 1);
require_once 'src/config.php';

if (!isset($_GET['t'])) {
    $trt = 0;
} else {
    $trt = $_GET['t'];
}

if (!is_numeric($trt)) {
    $trt = 0;
}
if ($trt > 2) {
    $trt = 0;
}

if (0 == $trt) {
    $inicio = 1;
    $final = 25;
    $txtTitol = 'Categoría Nacional';
} //Nacional
if (1 == $trt) {
    $inicio = 3;
    $final = 7;
    $txtTitol = 'Segunda División B';
} //Segunda B
if (2 == $trt) {
    $inicio = 7;
    $final = 25;
    $txtTitol = 'Tercera División';
} //Segunda B
?>

<?php require_once 'includes/head.php'; ?>
	<title>Clasificación general de todos los equipos</title>
    <meta name="robots" content="noindex">
</head>
<?php require_once 'includes/contenedorSup.php'; ?>

<div class="marco col-xs-12 text-center">
    <h4 class="text-center">Clasificaciones generales</h4>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php">Nacional</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php?t=1">Segunda B</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php?t=2">Tercera</a>
    </div>
</div>
<div class="marco col-xs-12 text-center"><h1><?php 
echo $txtTitol?></h1></div>
<?php
$clasificaciones = array();

for ($i = $inicio; $i < $final; ++$i) {



    $f = './json/temporada/'.$i.'/tipo.json';
    $cachetime = 86400; //86400 un dia.
    if (@file_exists($f)) { 
        $fichero_time = @filemtime($f);
        if ((time() - $fichero_time)> $cachetime) {
            Xtipo($i);
        }
    } else {
        Xtipo($i);
    }

    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    $torneo=$datos['torneo'];
    $c=$datos['clasificacion'];
    if (isset($c)){
        foreach ($c['clasificacionFinal'] as $key => $value) {
            $value['temporada_id'] = $i;
            $value['torneo_nombre'] = '';
            $clasificaciones[] = $value;
        }
    }
}

$ordenPuntos = [];
$ordenDirefenciaGoles = [];
$ordenMasGoles = [];
$ordenGanados = [];
$ordenPorcentaje = [];

foreach ($clasificaciones as $key => $clasifica) {
    if ($clasifica['jugados']==0){ continue; }
    $ordenPuntos[$key] = $clasifica['puntos'];
    $ordenDirefenciaGoles[$key] = ($clasifica['gFavor'] - $clasifica['gContra']);
    $ordenMasGoles[$key] = $clasifica['gFavor'];
    $ordenGanados[$key] = $clasifica['ganados'];
    $ordenPorcentaje[$key] = ($clasifica['puntos'] / $clasifica['jugados']);
}


array_multisort($ordenPorcentaje, SORT_DESC, SORT_NUMERIC, $ordenPuntos, SORT_DESC, SORT_NUMERIC, $ordenDirefenciaGoles, SORT_DESC, SORT_NUMERIC, $ordenMasGoles, SORT_DESC, SORT_NUMERIC, $clasificaciones);

$p = 0;$equiposTw = array();
foreach ($clasificaciones as $key => $clasifica) {
    if (0 == $clasifica['equipo_id']) {
        continue;
    }
    $p = $p + 1;
    $clasifica['posicionGeneral'] = $p;
    $nueva_clasificacion[$key] = $clasifica;
    
}


$clasificacion = $nueva_clasificacion;
unset($nueva_clasificacion);
$clasificaciones = $clasificacion;

$clasificacion['clasificacionFinal'] = $clasificaciones;
$liga = 0;

require_once 'srcRecursos/pesClasificacionGlobal.php';
require_once 'includes/contenedorInf.php'; ?>