<?php
$static_v = 10; 
define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once 'funciones.php';
require_once '../../src/funciones.php';
$tiempo_inicio = microtime_float(); ?>
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
<body>

	<div style="padding: 10px; background-color: white">

<?php

if (isset($_POST['id'])){	
	$sq='UPDATE torneo SET visible='.$_POST['visible'].' WHERE id='.$_POST['id'];
	$mysqli = conectarFM();
	mysqli_query($mysqli, $sq);
	echo $sq.'<br />';
	$files = glob('../../json/temporada/'.$_POST['temporada_id'].'/*.*');
	foreach ($files as $file) {
	    echo $file.'<br />';
	    unlink($file);
	}
	$_GET['comunidad_id']=$_POST['comunidad_id'];	
}


echo 'Federación: ';
for ($i=1; $i < 19; $i++) { 

	if ($i==4 || $i==12){ continue; }

	if ($i==2 || $i==6 || $i==8 || $i==15){
		echo '<a href="?comunidad_id='.$i.'"><b>'.$i.'</b></a>* - ';
	} else {
		echo '<a href="?comunidad_id='.$i.'">'.$i.'</a> - ';
	}
	

} ?>
 - <a href="proxys.php" target="_blank">proxis HTTP</a>
 - <a href="proxyss.php" target="_blank">proxis HTTPS *</a>

<?php
$comunidad_id=$_GET['comunidad_id']??1;

if ($comunidad_id==0){ $territorial='Nacional';$carpeta='----'; }
require_once 'funciones/urlFederaciones.php';
echo '<hr />Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b><br />';

if ($comunidad_id>0 && $comunidad_id!=4 && $comunidad_id!=12) {
	echo $url.' - <a href="'.$url.'" target="_blank">ver</a> (abrir siempre en ventana de incognito) <hr />';
} else {

	if ($comunidad_id==4){

		echo 'Álava: '.$url2.'<br />';
		echo 'Vizcaya: '.$url3.'<br />';
		echo 'Guipúzcoa: '.$url4.'<hr />';

	}

}


$torneosFM=torneosFM($comunidad_id+1);

if ($comunidad_id==10){
$torneos=torneos(($comunidad_id-1));
} else { $torneos=torneos($comunidad_id); }


$bgcolor='white'; ?>

<table border="1" bgcolor="dimgray">
	<tr bgcolor="gainsboro">
		<td align="center">id</td>
		<td align="center">id cat tor</td>
		<td align="center">cat. torneo</td>
		<td align="center">id cat</td>
		<td align="center">categoria</td>
		<td align="center">orden</td>
		<td align="center">nombre</td>
		
		<td align="center">id_temporada</td>
		<td align="center">cal</td>
		<td align="center">tipo</td>
		<td align="center">div</td>
		<td align="center">partidos</td>
		<td align="center">equipos</td>		
		<td align="center">-</td>		
	</tr>
<?php 
$federacion_id=array();
$torneosVinculables=array();

foreach ($torneosFM as $key => $value) { 
	if ($value['id']==1){ continue; } //el primer id sin torneo
	if ($value['pais_id']!=60){ continue; } //el primer id sin torneo
	if ($value['tipo_torneo']!=1){ continue; } //solo ligas

	$federacion_id[$value['apiRFEFgrupo']]=$value['apiRFEFgrupo'];
	if ($value['apiRFEFgrupo']==0) {
		$colorFila="white";
		$torneosVinculables[$value['id']]['id']=$value['id'];
		$torneosVinculables[$value['id']]['categoria']=$value['categoria'];
		$torneosVinculables[$value['id']]['nombre']=$value['nombre'];
	} else { $colorFila="#EAE88F"; }

	if ($value['visible']==3){ $colorVisible='DARKSALMON'; } else { $colorVisible='gold'; }
	if ($value['visible']>200){ $colorVisible='#32E17C'; } 
	?>
	<tr bgcolor="<?php echo $colorFila?>">
		<td align="center" valign="top"><?php echo $value['id']?></td>
		<td align="center" valign="top"><?php echo $value['categoria_torneo_id']?></td>
		<td align="center" valign="top"><?php echo $value['categoria_torneo']?></td>
		<td align="center" valign="top"><?php echo $value['categoria_id']?></td>
		<td align="center" valign="top"><?php echo $value['categoria']?></td>
		<td align="center" valign="top"><?php echo $value['orden']?></td>
		
	<td align="center" valign="top" bgcolor="<?php echo $colorVisible?>">
		<?php 
		echo $value['nombre']; 
		if ($value['visible']==3){ 

			echo '<br />';
			$comu=$comunidad_id;

			if ($carpeta=="00isquad"){ ?>

				<a href="funciones/_001_btodo_descargarCalendario.php?c=<?php echo $value['apiRFEFcompeticion']?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comu?>&f=<?php echo $value['apifutbol']?>&t=<?php echo $value['temporada_id']?>" style="color:red" target="_blank"> descargar calendario </a>
			<?php }

			if ($carpeta=="00pnfg"){ ?>

				<a href="funciones/_001descargarCalendario.php?c=<?php echo $value['apiRFEFcompeticion']?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comu?>&f=<?php echo $value['apifutbol']?>&t=<?php echo $value['temporada_id']?>" style="color:red" target="_blank"> descargar calendario </a>
			<?php }



		 }	?>
		<div id="vFM-<?php echo $value['temporada_id']?>"></div>
	</td>


		
		
		<td align="center" valign="top">
			
			<?php if ($value['temporada_id']>0){ ?>
			<?php echo $value['temporada_id']?> - <a href="/temporada.php?id=<?php echo $value['temporada_id']?>" target="_blank">Ver</a>	
			<?php } ?>
		
		</td>
		<td align="center">			
			<?php
			$f = '../../panelBack/federacion/'.$territorial.'/calendarios/'.$value['apiRFEFgrupo'].'-jornadas.json';
			//if ($carpeta=='00isquad'){
				if (@file_exists($f)) { ?>
					<a href="funciones/_002_b_comprobarEquipos.php?te=<?php echo $value['temporada_id']?>&c=<?php echo $value['apiRFEFcompeticion']?>&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comunidad_id?>&cat=<?php echo $value['categoria_id']?>" target="_blank">EQ</a> 
				<?php } 
			//}

			/*if ($carpeta=='00pnfg'){
				if (@file_exists($f)) { ?>
					<a href="funciones/_002_a_comprobarEquipos.php?te=<?php echo $value['temporada_id']?>&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comunidad_id?>&cat=<?php echo $value['categoria_id']?>" target="_blank">si</a>
				<?php } 
			}*/


			?> 
		</td>
		<td align="center" valign="top"><?php echo $value['tipo_torneo']?></td>
		<td align="center" valign="top"><?php echo $value['division_id']?></td>
		<?php if ($value['partidos']==0){ ?>
		<td align="center" valign="top" bgcolor="gainsboro">
		<?php } else { ?>
		<td align="center" valign="top">
		<?php } ?>	
			<?php echo $value['partidos']?>
			 - <span style="color:red"><?php echo $value['porJugar']?></span>
		</td>
		<td align="center">			
			<a href="recursos/equiposTemporada.php?temporada_id=<?php echo $value['temporada_id']?>" target="_blank"><?php echo $value['equiposTemporada']?></a>
    	</td>
		

		
		
		
		<td bgcolor="<?php echo $colorVisible?>" colspan="2" style="padding: 2px;">
				<form method="post" action="index.php" id="<?php echo $value['id']?>">			
				<input type="hidden" name="id" value="<?php echo $value['id']?>">
				<input type="hidden" name="temporada_id" value="<?php echo $value['temporada_id']?>">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="text" name="visible" value="<?php echo $value['visible']?>" size="2" style="text-align: center">				
				<input type="submit" name="enviar" value="ok">
			</form>			
		</td>

	</tr>
<?php 
} ?>
</table>


<?php 
$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

?>

</div>

</body>
</html>

<?php
