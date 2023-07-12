<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>
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
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>

<?php
$temporada_id=$_POST['temporada_id'];
$comunidad_id=$_POST['comunidad_id'];
$grupo_id=$_POST['grupo_id'];
$competicion_id=$_POST['competicion_id'];
$partidos=calendario($temporada_id);

include ('urlFederaciones.php');

$jornadas=array();
$equipos=array();
foreach ($partidos as $key => $p) {
	$jornadas[$p['jornada']][]=$p;
	$equipos[$p['equipoLocal_id']]['nombre']=$p['local'];
	$equipos[$p['equipoLocal_id']][]=$p;
	$equipos[$p['equipoVisitante_id']]['nombre']=$p['visitante'];
	$equipos[$p['equipoVisitante_id']][]=$p;
	
}

foreach ($jornadas as $key => $value) { 
$url2='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$key;
?>
<span style="cursor:pointer; color:red" onclick="cargarJornada(<?php echo $temporada_id?>,<?php echo $grupo_id?>,<?php echo $key?>)"> jornada <?php echo $key?></span> (<?php echo count($value)?>)
 - <span style="cursor:pointer; color:orange" onclick="actualizarJornada(<?php echo $grupo_id?>,<?php echo $key?>,<?php echo $competicion_id?>,<?php echo $comunidad_id?>,<?php echo $temporada_id?>,0)">actualizar</span> 
 - <a href="<?php echo $url.$url2?>" target='_blank'>federacion</a>
	<div id='j-<?php echo $key?>-<?php echo $grupo_id?>' style="background-color: gainsboro" class="jornadas"></div>
	<br />
<?php }
echo '<hr />';
foreach ($equipos as $key => $value) {?>
<span style="cursor:pointer; color:green" onclick="cargarEquipo(<?php echo $grupo_id?>,<?php echo $key?>)"><?php echo $value['nombre']?></span> (<?php echo (count($value)-1)?>)
	<div id='e-<?php echo $key?>-<?php echo $grupo_id?>' style="background-color: gainsboro" class="equipos"></div>
	<br />
<?php } ?>

