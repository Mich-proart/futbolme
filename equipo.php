<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';
$pagina="equipo";
$equipo_id = $_GET['id']??0;
if (!is_numeric($equipo_id)) {header('Location:/');die;}
if (0 == $equipo_id) {header('Location:/');die;}
if (992 == $equipo_id) { $equipo_id = 369; } //aurrera de ondarroa
$retirados = array(); $retirado = 0;

$modelo=$_GET['modelo']??'Calendario';
//$modelo=$_GET['modelo']??'Clasificacion';
$vista=$_GET['vista']??'Jugados';

if($equipo_id>1000000){
   require_once 'equipoLive.php';
}


$pesDatos = ''; $pesCalendario = ''; $pesClasificacion = ''; $pesPlantilla = ''; $pesFichajes = '';
$pesGoleadores = ''; $pesEstadisticas = ''; $pesEquipos = ''; $pesHistorico = '';
$pesAnterior = ''; $pesTwitter = ''; $pesFidelidad = '';$pesTienda = '';
//modelo=Clasificacion
$pesJugados = ''; $pesGanados = ''; $pesEmpatados = ''; $pesPerdidos = ''; $pesFavor = ''; $pesContra = ''; $pesPuntos = '';

require_once 'includes/pagEquipo/arranque.php';


if (strlen($equipotxt) > 1) {
    $pgEquipo = '/resultados-directo/equipo/'.poner_guion($equipotxt).'/'.$equipo_id;
} else {
    $pgEquipo = '/equipo.php?id='.$equipo_id;
}

$titulo = $modelo.' '.$equipotxt.' - '.$categoriatxt;
$metaDescripcion = 'Info y resultados de los partidos del equipo '.$titulo;

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
if ('Clasificacion' == $modelo) {
    $titulo .= ' - Clasificación';
    if (isset($_GET['vista']) || isset($_GET['idH'])) {
        $ePartidos = XequipoPartidos($equipo_id);
        $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
        $estadisticas = $ePartidos['estadisticas'];


        if (isset($_GET['vista'])) {
            $icono="";
            if ('Estadisticas' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 10;
                $pesEstadisticas = 'active';
                $goles = array();

                $golesEquipo = XequipoGoles($equipo_id);
                $goles = $golesEquipo['goles'];
            }

            if ('Puntos' == $_GET['vista']) {
                $titulo .= ' - '.$_GET['vista'].' conseguidos';
                $tipoVista = 1;
                $pesPuntos = 'active';
            }
            if ('Jugados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 2;
                $pesJugados = 'active';
            }
            if ('Ganados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 3;
                $pesGanados = 'active';
            }
            if ('Empatados' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 4;
                $pesEmpatados = 'active';
            }
            if ('Perdidos' == $_GET['vista']) {
                $titulo .= ' - Partidos '.$_GET['vista'];
                $tipoVista = 5;
                $pesPerdidos = 'active';
            }
            if ('Favor' == $_GET['vista']) {
                $titulo .= ' - Goles a '.$_GET['vista'];
                $tipoVista = 6;
                $pesFavor = 'active';
            }
            if ('Contra' == $_GET['vista']) {
                $titulo .= ' - Goles en '.$_GET['vista'];
                $tipoVista = 7;
                $pesContra = 'active';
            }
        }
    }
}
    ?>
    <?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php';
?>	
	
	<?php 

    
        if (0 == $es_seleccion && (1 == $es_nacional || $visible > 4)) {
            ?>

				<div class="col-xs-12 nopadding whitebox">								
					<?php require_once 'includes/pagEquipo/equipo1.php'; ?>					
				</div>
					
		<?php
        } else {
            if ($es_seleccion > 0) {
                require_once 'includes/pagEquipo/equipoSeleccion.php';
            } else {
                require_once 'includes/pagEquipo/equipoNonacional.php';
            }
        }
    ?>





<?php 
    require_once 'includes/contenedorInf.php'; ?>

