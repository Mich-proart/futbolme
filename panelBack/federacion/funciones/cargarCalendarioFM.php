<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>


<?php
$id=$_POST['id'];
$comunidad_id=$_POST['comunidad_id'];
$temporada_id=$_POST['temporada_id'];
$apiRFEFgrupo=$_POST['apiRFEFgrupo'];
$partidos=calendarioFM($temporada_id);

//if ($comunidad_id==10){ $comunidad_id=9; }


$sq="SELECT apifutbol,apiRFEFcompeticion  FROM torneo WHERE id=".$id;
$mysqliFM = conectarFM();
$resultadoSQL = mysqli_query($mysqliFM, $sq);
$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$competicion_id=$t['apiRFEFcompeticion'];
$fase=$t['apifutbol'];

include ('urlFederaciones.php');

$jornadas=array();
$equipos=array();
foreach ($partidos as $key => $p) {
	$jornadas[$p['jornada']][]=$p;
	$equipos[$p['equipoLocal_id']]['nombre']=$p['local'];
	$equipos[$p['equipoLocal_id']][]=$p;
	$equipos[$p['equipoVisitante_id']]['nombre']=$p['visitante'];
	$equipos[$p['equipoVisitante_id']][]=$p;
	
} ?>

<?php
if (count($jornadas)==0){ 

if ($carpeta=="00isquad"){ ?>

	<a href="funciones/_001_btodo_descargarCalendario.php?c=<?php echo $competicion_id?>&g=<?php echo $apiRFEFgrupo?>&cm=<?php echo $comunidad_id?>&f=<?php echo $fase?>&t=<?php echo $id?>" style="color:red" target="_blank"> descargar calendario </a>
<?php }

if ($carpeta=="00pnfg"){ ?>

	<a href="funciones/_001descargarCalendario.php?c=<?php echo $competicion_id?>&g=<?php echo $apiRFEFgrupo?>&cm=<?php echo $comunidad_id?>&f=<?php echo $fase?>&t=<?php echo $id?>" style="color:red" target="_blank"> descargar calendario </a>
<?php }


if ($carpeta=="euskadi"){ ?>
	<a href="funciones/_001_euskadi_descargarCalendario.php?c=<?php echo $competicion_id?>&g=<?php echo $apiRFEFgrupo?>&cm=<?php echo $comunidad_id?>&f=<?php echo $fase?>&t=<?php echo $id?>" style="color:red" target="_blank"> descargar calendario </a>
<?php }

if ($carpeta=="canarias"){ ?>
	<a href="funciones/_001_canarias_descargarCalendario.php?c=<?php echo $competicion_id?>&g=<?php echo $apiRFEFgrupo?>&cm=<?php echo $comunidad_id?>&f=<?php echo $fase?>&t=<?php echo $id?>" style="color:red" target="_blank"> descargar calendario </a>
<?php }


die; 


}

foreach ($jornadas as $key => $value) { 

if ($carpeta=='00pnfg'){
$url2='CodCompeticion='.$competicion_id.'&CodGrupo='.$apiRFEFgrupo.'&CodJornada='.$key;
}

if ($carpeta=='00isquad'){
$url2='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$apiRFEFgrupo.'&jornada='.$key;
}

$porJugar=0;
foreach ($value as $vp) {	
	if($vp['estado_partido']!=1 && $vp['equipoLocal_id']>0 && $vp['equipoVisitante_id']>0){ $porJugar++; }
}

?>
<span style="cursor:pointer; color:red" onclick="cargarJornadaFM(<?php echo $temporada_id?>,<?php echo $key?>)"> jornada <?php echo $key?></span> (<?php echo count($value)?> - <b><?php echo $porJugar?></b>)
  - <span style="cursor:pointer; color:navy" onclick="actualizarJornada2(<?php echo $key?>,<?php echo $id?>,<?php echo $apiRFEFgrupo?>)">actualizar</span>

 - <a href="<?php echo $url.$url2?>" target='_blank'>federacion</a>
	<div id='j-<?php echo $key?>-<?php echo $temporada_id?>' style="background-color: gainsboro" class="jornadas"></div>
	<div id='j-<?php echo $key?>-<?php echo $apiRFEFgrupo?>' style="background-color: gainsboro" class="jornadas"></div>
	<br />
<?php }
echo '<hr />';



foreach ($equipos as $key => $value) {?>
<span style="cursor:pointer; color:green" onclick="cargarEquipoFM(<?php echo $temporada_id?>,<?php echo $key?>)"><?php echo $value['nombre']?></span> (<?php echo (count($value)-1)?>)
	<div id='e-<?php echo $key?>-<?php echo $temporada_id?>' style="background-color: gainsboro" class="equiposFM"></div>
	<br />
<?php } ?>

