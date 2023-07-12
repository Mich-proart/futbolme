<?php 
require_once 'src/config.php';

if (isset($_GET['id'])) {
    $equipo_id = $_GET['id'];
    
    if (!is_numeric($equipo_id)) {
        header('Location:/');
        die;
    }
} else {
    header('Location:/');
    die;
}

if (0 == $equipo_id) {
    header('Location:/');
    die;
}
if (992 == $equipo_id) {
    $equipo_id = 369;
} //aurrera de ondarroa


$retirados = array(); $retirado = 0;

$datos = XequipoClub($equipo_id);


$equipoClub = $datos['datos'];
$twEquipo = $equipoClub['slug'];
$torneos = $datos['torneos'];
$liga = $datos['liga'];
$grupo_liga = $datos['grupo_liga'];

/*imp($equipo_id);
imp($datos);
imp($liga);*/

$visible = 5;
foreach ($torneos as $key => $value) {
    if (7 == $value['visible']) {
        $visible = 7;
        break;
    }
}

$division = 0;
$equipotxt = $equipoClub['nombre'];
$categoriatxt = $equipoClub['categoriaN'];
$club_id = $equipoClub['club_id'];
$pais_id = $equipoClub['pais_id'];
$es_seleccion = $equipoClub['es_seleccion'];
$desaparecido = $equipoClub['desaparecido'];

if (1 == $liga) {
    $division = 1;
}
if (2 == $liga) {
    $division = 2;
}
if ($liga > 2 && $liga < 7) {
    $division = 3;
}
if ($liga > 6 && $liga < 25) {
    $division = 4;
}

$categoria_torneo_id = 0;
if ('Senior Masculino' == $categoriatxt && 60 == $pais_id) {
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



if (60 == $pais_id) {
    $es_nacional = 1;
} else {
    $es_nacional = 0;
}
if (60 == $pais_id && 0 == $es_seleccion) {
    $inicioTemporada = new DateTime('2015-06-30');
} else {
    $inicioTemporada = new DateTime('2011-06-30');
}

//if ($desaparecido<1000 && $es_nacional==1 && $es_seleccion==0) {
    $hoy = new DateTime('now');
//}

$pesCalendario = $pesCalendario??'';
$pesPlantilla = $pesPlantilla??'';
             

$modelo = $_GET['modelo']??'Calendario';


    $ePartidos = XequipoPartidos($equipo_id);
    $estadisticas = $ePartidos['estadisticas'];

    $golesEquipo = XequipoGoles($equipo_id);
            $goles = $golesEquipo['goles'];
            $realizadores = $golesEquipo['realizadores'];
            $minutos = $golesEquipo['minutos'];
            $aldescanso = $golesEquipo['aldescanso'];
            $ultimogol = $golesEquipo['ultimogol'];

 
    switch ($modelo) {
        
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
        
        break;
        case 'Plantilla':
            $pesPlantilla = 'active';
            $equipoPlantilla = XequipoPlantilla($equipo_id);
            $equipoPlantilla['liga'] = $liga;
        break;
        
        
        
    }



















    $pgEquipoActual = '/resultados-directo/equipo/'.poner_guion($equipotxt).'/'.$equipo_id;
    $pgEquipo = 'index.php?modo=e&id='.$equipo_id;


$titulo = $modelo.' '.$equipotxt.' - '.$categoriatxt;
$metaDescripcion = 'Info y resultados de los partidos del equipo '.$titulo;


if ('Calendario' == $modelo) {
    $titulo .= ' - Calendario';    
}
if ('Plantilla' == $modelo) {
    $titulo .= ' - Plantilla';
    $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
}

if ('Goleadores' == $modelo) {
    $titulo .= ' - Goleadores';
    $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
}

if ('Equipos' == $modelo) {
    $titulo .= ' - Equipos del club';
    $metaDescripcion = $modelo.' de los partidos del equipo '.$titulo;
}

require_once 'includes/head.php'; ?>
	<title><?php echo $titulo; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php';
?>	
	
	

				<div class="col-xs-12 nopadding whitebox">								
					<?php require_once 'includes/pagEquipo/equipo1.php'; ?>					
				</div>
					
		




<?php     require_once 'includes/contenedorInf.php'; ?>
