<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas

$comunidad_id=$_POST['comunidad_id'];
$sJ=sinJugar($comunidad_id);

?>
<h3><?php echo $comunidades[$comunidad_id]['nombre']?></h3>
<?php

$torneosFM=torneosFM($comunidad_id);
$vinculados=vinculados($comunidad_id);
//imp($vinculados);
require_once 'funciones/urlFederaciones.php'; ?>
<div class="pull-right" style="position:absolute;right:10px; top: 50px">
	<span onclick="verGesProxis()" style="cursor:pointer;">Gestión de proxis</span>
	 - <span onclick="verMiFutbol()" style="cursor:pointer;">Mi fútbol</span>
</div>

<?php
if ($comunidad_id==100){ $bd='proxis100';}
	include('recursos/gesProxis.php');

$bgcolor='white'; ?>

<div id="miFutbol" style="display: none">
<table class="table">
	<tr>
		<td>Listado de campeonatos.
			<form action="federacion/_mifutbol/_00listar.php" method="post" target="_blank">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="submit" name="Listar campeonatos" value="Listar campeonatos">
			</form>
		</td>
		<td>Va a la web de la federacion para extraer campeonatos o <a href="federacion/_mifutbol/gruposSelect.php?comunidad_id=<?php echo $comunidad_id?>" target="_blank">Por textarea</a>
			<form action="federacion/_mifutbol/_00selects.php" method="post" target="_blank">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="submit" name="Extraer Campeonatos" value="Extraer campeonatos">
			</form>
		</td>
		<td>Lee el último json y comprueba si hay campeonatos nuevos
			<form action="federacion/_mifutbol/_00cargas.php" method="post" target="_blank">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="submit" name="Cargar Campeonatos" value="Cargar campeonatos">
			</form>
		</td>
		<td><a href="federacion/_mifutbol/actualizador.php?comunidad_id=<?php echo $comunidad_id?>" target="_blank">Actualizador</a></td>
	</tr>
</table>
</div>

<table border="1" bgcolor="dimgray">
	<tr bgcolor="gainsboro">
		<td align="center">id</td>
		<td align="center" style="width: 180px;">catTor - cTorneo<br />
		idCat - categoria
		</td>		
		<td align="center">nombre</td>
		<td align="center">fase</td>
		<td align="center">competicion</td>
		<td align="center">grupo</td>
		<td align="center" style="width: 180px;">partidos</td>
		<td align="center">equipos</td>
		<td align="center">ord</td>
		<td align="center">vis</td>
		<td align="center">Activa</td>
		<td align="center">-</td>		
	</tr>
<?php 
$federacion_id=array();
$noVisible=array();

foreach ($torneosFM as $key => $value) { 

	if ($value['visible']<5){
	$noVisible[$value['categoria_torneo_id']][$value['categoria_id']][$key]['torneo_id']=$value['id'];
	$noVisible[$value['categoria_torneo_id']][$value['categoria_id']][$key]['nombre']=$value['nombre'];
	$noVisible[$value['categoria_torneo_id']][$value['categoria_id']][$key]['temporada_id']=$value['temporada_id'];
	$noVisible[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria_torneo']=$value['categoria_torneo'];	
	$noVisible[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria']=$value['categoria'];
	continue; 
	} //quitamos los invisibles;

$variables='?territorial='.$territorial.'&comunidad_id='.$comunidad_id.'&torneo_id='.$value['id'].'&temporada_id='.$value['temporada_id'];
	
	
	
	if ($value['id']==1){ continue; } //el primer id sin torneo
	//if ($value['pais_id']<>60){ continue; } //el primer id sin torneo
	if ($value['categoria_torneo_id']==8 || $value['categoria_torneo_id']==10){ continue; } //el primer id sin torneo
	$federacion_id[$value['apiRFEFgrupo']]=$value['apiRFEFgrupo'];
	if ($value['apiRFEFgrupo']==0) {
		$colorFila="white";
	} else { $colorFila="#EAE88F"; }

	if ($value['visible']==3){ $colorVisible='DARKSALMON'; } else { $colorVisible='gold'; }
	if ($value['visible']>200){ $colorVisible='#32E17C'; } 
	?>
	<tr bgcolor="<?php echo $colorFila?>">
		<td align="center" valign="top"><?php echo $value['id']?><br />
			<span onclick="accionesTorneo(<?php echo $comunidad_id?>,<?php echo $value['id']?>,3)" style="cursor:pointer; color: blue">Matar</span>
		</td>
		<td align="center" valign="top"><?php echo $value['categoria_torneo_id']?> - <?php echo $value['categoria_torneo']?><br />
			<?php echo $value['categoria_id']?> - <?php echo $value['categoria']?>
			<br />
			<span onclick="accionesTorneo(<?php echo $comunidad_id?>,<?php echo $value['id']?>,1)" style="cursor:pointer; color: blue">Ocultar</span>
		</td>
		
		
		<td align="center" valign="top" bgcolor="<?php echo $colorVisible?>">
			<span class="pull-left boldfont" style="cursor:pointer" onclick="verTorneo(<?php echo $value['id']?>)">ver</span> <?php echo $value['nombre']?> - <?php echo $value['nombrePais']?></span>

			 <?php if (!empty($value['whatsapp'])){ 

			 	echo '<br /><b>Con whatsapp.</b>';

			 	/*$verGrupo=1;
			 	$id_whats=$value['whatsapp'];
			 	include '../chatapi/acceso.php';
			 	*/


			 } ?>

			<?php include 'recursos/verTorneo.php'?>
			<div id="nuevo-detras-<?php echo $value['id']?>"></div>
		</td>

		<td align="center" valign="top" colspan="3">
		<?php echo $value['apifutbol']?> - 
		<?php echo $value['apiRFEFcompeticion']?> - 
		<?php echo $value['apiRFEFgrupo']?>
		
	    <?php 

	    $inicio=explode(',', $value['proximo']);


	    if ($value['temporada_id']>0){ ?>
			<br />Temp. <a href="/temporada.php?id=<?php echo $value['temporada_id']?>" target="_blank"><?php echo $value['temporada_id']?></a>
			<?php } ?>
			- Tipo Tor.<?php echo $value['tipo_torneo']?> - Div.<?php echo $value['division_id']?>
			- <?php


			$url_final='';
			

			if (!empty($value['apiRFEFgrupo']) && $value['tipo_torneo']==1){
				
				$url_final=str_replace('aaa', $value['apiRFEFcompeticion'], $url);
				$url_final=str_replace('bbb', $value['apifutbol'], $url_final);
				$url_final=str_replace('ccc', $value['apiRFEFgrupo'], $url_final);
				$url_final=str_replace('ddd', trim($inicio[0]), $url_final);

				echo '<br /><a href="'.$url_final.'" target="_blank">Ver en federación</a>';
			}





			if (isset($vinculados[$value['apiRFEFgrupo']])){ echo '<span style="background-color:red"><b>vinculado</b></span>'; }
			$f = $territorial.'/calendarios/'.$value['apiRFEFgrupo'].'-partidos.json';
			
				if (@file_exists($f)) { echo '<br /><a href="'.$variables.'&modo=compararCalendario&grupo='.$value['apiRFEFgrupo'].'"><b>calendario json</b></a>'; } 
			?> 
		</td>
		
		
		
		
		
		<?php if ($value['partidos']==0){ ?>
		<td align="center" valign="top" bgcolor="gainsboro">
		<?php } else { ?>
		<td align="center" valign="top">
		<?php } ?>	
			<?php echo $value['partidos']?>
				<?php if ($value['porJugar']>0){ ?>
				 - <span style="color:red"><b><?php echo $value['porJugar']?></b></span>
				<?php } ?>
			 
			 <?php

			 

			 
			 if (count($inicio)>1) {
			 	$date = date_create($inicio[1]);

			 	$fecha1 = date('Y-m-d H:i:s');
				$fecha1 = date_create($fecha1); //hora actual
				$fecha3 = date_format($date,'Y-m-d H:i:s');
				$fecha3 = date_create($fecha3); //hora prevista
				$diferencia = date_diff($fecha3, $fecha1);

				

				if ($diferencia->invert ==0){
					echo " - Jornada pasada ";
				} else {					
					echo " - Faltan <b>".$diferencia->days.'</b> dias ';
					echo '<b>Jornada '.$inicio[0].'</b>'; 			 		
				}

				echo 'Jornada '.$inicio[0];
			 	echo ' - '.date_format($date, 'd/<b>m</b>/Y'); ?>


			 	
			 <br /><span onclick="accionesTorneo(<?php echo $comunidad_id?>,<?php echo $value['temporada_id']?>,2)" style="cursor:pointer; color: blue">Quitar calendario</span>
			 <?php }?>

		</td>
		<td align="center">			
			<a href="federacion/recursos/equiposTemporada.php<?php echo $variables?>&competicion=<?php echo $value['apiRFEFcompeticion']?>&grupo=<?php echo $value['apiRFEFgrupo']?>&equipos=<?php echo $value['equiposTemporada']?>" target="_blank"><?php echo $value['equiposTemporada']?></a><br />
			<?php 
			$f = $territorial.'/equipos/'.$value['apiRFEFgrupo'].'-equipos.json';
  			if (@file_exists($f)) { echo '<span style="background-color:red">Ok</span>'; } else { ' - '; }
			?>
    	</td>
		

				
		
		
		<td bgcolor="<?php echo $colorVisible?>" colspan="3">
			<?php echo $value['orden']?> - <?php echo $value['visible']?> - 
			<?php echo $value['activa']?> (<?php echo $value['jornadas']?>)	
		</td>

		<td>
		<form method="post" onsubmit="nuevoDetras(event, $(this).serialize(),<?php echo $value['id']?>,0,<?php echo $comunidad_id?>)" id="<?php echo $value['id']?>">
				<input type="hidden" name="clon_id" value="<?php echo $value['id']?>">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="hidden" name="modo" value="nuevoDetras">				
				<input type="submit" name="enviar" value="Nuevo detrás">
		</form>
		<br /><span onclick="editarCalendario(<?php echo $value['temporada_id']?>,<?php echo $value['tipo_torneo']?>)" style="cursor:pointer; color:navy">Editar Calendario</span>
		</td>
	</tr>
<?php 
} ?>
</td></tr></table>
<h1>No visibles</h1>
<?php

foreach ($noVisible as $k => $categoria) {
	echo 'Categoría torneo:'.$k.'<br />';
	foreach ($categoria as $k1 => $torneo) {
		echo '---> Categoría equipo:'.$k1.'<br />';
		$paraMatar=array();
		$contador=0;
		foreach ($torneo as $k2 => $value) {
			echo '------> Categoría torneo: '.$value['categoria_torneo'].'<br />';
			echo '------> Categoría equipo: '.$value['categoria'].'<br />';
			echo '------> Nombre: <b>'.$value['nombre'].'</b><br />';
			echo '------> Torneo id: '.$value['torneo_id'].' ---------------------';?>
			<span class="boldfont" onclick="accionesTorneo(<?php echo $comunidad_id?>, <?php echo $value['torneo_id']?>,0)" style="cursor:pointer; color: blue">Recuperar</span>
			<br />
			<?php echo '------> Temporada id: '.$value['temporada_id'].'<br />';
			$paraMatar[$k2]['nombre']=$value['nombre'];
			$paraMatar[$k2]['torneo_id']=$value['torneo_id'];
			$paraMatar[$k2]['temporada_id']=$value['temporada_id'];
			$contador++;
			//if ($contador==15){break;}
		}
		$t=serialize($paraMatar);
		$t = urlencode($t);
		unset($paraMatar);
		
		//echo '<a href="?matarTorneo=1&comunidad_id='.$comunidad_id.'&t='.$t.'">Matar esta categoria</a><hr />';
		unset($t);
		
	}
}


