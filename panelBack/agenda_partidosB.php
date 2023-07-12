<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
//require_once('scripts/panelFunciones.php');
// definimos los valores iniciales para nuestro calendario
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $ct = $_GET['ct'];
} else {
    echo 'Sin parametros';
    die;
}

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
<table>
	<tr><td valign="top">
<div style="float:left; width:700px">
	<a href="/panelCargador/asalto.php?fecha=<?php echo $fecha?>">Asalto para la fecha <?php echo $fecha?></a>
<?php

if (isset($_GET['h'])){
	$partidos = partidosPorHoras($fecha,$_GET['h'],$ct);
} else {
	$partidos = partidosPorCategoriaB($fecha, $ct);
}

$h = ''; $colorFila = 'white';  $variable=0;
$sinFinalizar=array();

foreach ($partidos as $key=> $partido) {
	include('agendaPartido.php');	
	$h = $partido['hora_prevista'];    
}

?>
</div>
	</td>
	<td valign="top">
		<div style="padding: 10px; background-color: orange">
		<?php		
		$h = ''; $colorFila = 'white'; $variable=1;
		foreach ($sinFinalizar as $partido) {
		    if (isset($_GET['m']) && (int)$_GET['m']==2){
				include('agendaPartido2.php');
			} else {			

				include('agendaPartido.php');	
			}
		    $h = $partido['hora_prevista'];
		}
		?>
		</div>
	</td>
  </tr>
</table>

</body>
</html>
<?php


function partidosPorHoras($fecha, $hora, $ct)
{
    $campos = 'p.id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id,
    p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones,  
    p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi, 
    p.hora_prevista, ec.nombre localCorto, ef.nombre visitanteCorto, p.jornada, ec.slug tl, ef.slug tv,
    te.nombre temporada_nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $condicion = ' WHERE p.fecha="'.$fecha.'" AND p.hora_prevista="'.$hora.'" AND tor.comunidad_id='.$ct;
    $orden = ' ORDER BY p.hora_prevista, tor.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
   //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}
