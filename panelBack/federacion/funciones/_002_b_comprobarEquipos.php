
<?php 
define('_FUTBOLME_', 1);
include('../../../src/funciones.php');
require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');?>


<?php

$tiempo_inicio = microtime_float(); 

$mysqli = conectarFM();

if (isset($_POST['modo'])){

	
	$consulta=trim($_POST['consulta']);
	mysqli_query($mysqli, $consulta);

	$_GET['te']=$_POST['te'];
	$_GET['c']=$_POST['c'];
	$_GET['g']=$_POST['g'];
	$_GET['cat']=$_POST['cat']; 
	$_GET['t']=$_POST['t'];
	$_GET['cm']=$_POST['cm'];
	
	
}

$temporada_id=$_GET['te'];
$competicion_id=$_GET['c'];
$grupo_id=$_GET['g'];
$catEquipo_id=$_GET['cat']; 
$territorial=$_GET['t'];
$comunidad_id=$_GET['cm'];


switch ($catEquipo_id) {
	case 1:$cRFEF='011';break;
	case 3:$cRFEF='041';break;
	case 4:$cRFEF='101';break;
	case 21:$cRFEF='201';break;
	case 23:$cRFEF='301';break;
	case 2:$cRFEF='051';break;
	
	
}



$cadena='c='.$competicion_id.'&te='.$temporada_id.'&t='.$territorial.'&g='.$grupo_id.'&cm='.$comunidad_id.'&cat='.$catEquipo_id;

if (isset($_GET['modo'])){
	
	if ($_GET['modo']==1){
	$sq='UPDATE equipo SET federacion_id='.$_GET['federacion_id'].' WHERE id='.$_GET['equipo_id'];
	mysqli_query($mysqli, $sq);
	}
}

require_once 'urlFederaciones.php';

	$f = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-equipos.json';
	$json = file_get_contents($f);
	$equipos = json_decode($json, true); 

$sq='DELETE FROM temporada_equipo WHERE temporada_id='.$temporada_id;
mysqli_query($mysqli, $sq);

	?>

	<table>
		<tr>
			<td valign="top">

	<table>
	<?php

	
	foreach ($equipos as $key => $value) { ?>
		<tr><td valign="top">
		<?php echo '<hr /><font style="color:green"><b>'.$value['equipo'].'</b></font> : <font style="color:red">'.$key.'</font> - ';
		$sq='SELECT e.id,e.nombre,e.categoria_id,c.codigoRFEF FROM equipo e 
		INNER JOIN club c ON e.club_id=c.id
		WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$key;
		$resultadoSQL = mysqli_query($mysqli, $sq);
		$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		if (count($r)==0){ 
			echo ' - Hay que grabarlo. <a href="'.$urlClub.'id_equipo='.$key.'&id_grupo='.$grupo_id.'" target="_blank">fed</a><br />';

					$value['equipo']=str_replace('-', ' ', $value['equipo']);
	                $value['equipo']=str_replace('.', '', $value['equipo']);
	                $value['equipo']=str_replace(',', ' ', $value['equipo']);
	                $value['equipo']=str_replace('FUTBOL', '', $value['equipo']);
	                $value['equipo']=str_replace('ATLETICO', '', $value['equipo']);
	                $value['equipo']=str_replace('Fútbol', '', $value['equipo']);
	                $value['equipo']=str_replace('Atletico', '', $value['equipo']);
	                $value['equipo']=str_replace('BALOMPIE', '', $value['equipo']);
	                $value['equipo']=str_replace('DEPORTIVO', '', $value['equipo']);
	                $value['equipo']=str_replace('DEPORTIVA', '', $value['equipo']);
	                $value['equipo']=str_replace('FUNDACIO', '', $value['equipo']);
	                $value['equipo']=str_replace('UNIÓ', '', $value['equipo']);
	                $value['equipo']=str_replace('ESPORTIVA', '', $value['equipo']);
	                $nombreClub = preg_replace('/\"(.*)\"/', '', $value['equipo']); 

	                //imp($nombreClub);
	               
	                $palabras = explode(' ', $value['equipo']);
	                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
	                $largo = $palabras[0]; 
	                $largo=html_entity_decode($largo);
	                
	                
	                
	            if (strlen($largo)>2){ ?>

<form method="post" action="?" id="key-<?php echo $key?>">
			<input type="hidden" name="modo" value="3">
			<input type="hidden" name="te" value="<?php echo $temporada_id?>">
			<input type="hidden" name="c" value="<?php echo $competicion_id?>">
			<input type="hidden" name="g" value="<?php echo $grupo_id?>">
			<input type="hidden" name="cat" value="<?php echo $catEquipo_id?>">
			<input type="hidden" name="t" value="<?php echo $territorial?>">
			<input type="hidden" name="cm" value="<?php echo $comunidad_id?>">
	<textarea cols="150" rows="2" name="consulta">INSERT INTO club (localidad_id, pais_id, nombre,nombre_completo,codigoRFEF,territorialRFEF) VALUES (1,60,"<?php echo $nombreClub?>","<?php echo $nombreClub?>","-","<?php echo $territorial?>")</textarea><input type="submit" name="grabar" value="grabar club">
</form><hr />



	            	<?php 

	            	$sqC='SELECT c.id, c.nombre, c.codigoRFEF, c.territorialRFEF, (select count(id) from equipo where club_id=c.id) equipos FROM club c
	                WHERE c.territorialRFEF="'.$territorial.'" AND c.nombre LIKE "%'.$largo.'%" ORDER BY c.id';
	                $resultadoSQL = mysqli_query($mysqli, $sqC);
					$resulClub = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
					//echo $sqC.'<br />';	                
					
					foreach ($resulClub as$vClub) {
						echo $vClub['id'].' <b>'.$vClub['nombre'].'</b> '.$vClub['codigoRFEF'].' '.$vClub['territorialRFEF'].' '.$vClub['equipos'].' <br />';
						if ($vClub['equipos']==0) { ?>

						<form method="post" action="?" id="key-<?php echo $key?>">
						<input type="hidden" name="modo" value="4">
						<input type="hidden" name="te" value="<?php echo $temporada_id?>">
						<input type="hidden" name="c" value="<?php echo $competicion_id?>">
						<input type="hidden" name="g" value="<?php echo $grupo_id?>">
						<input type="hidden" name="cat" value="<?php echo $catEquipo_id?>">
						<input type="hidden" name="t" value="<?php echo $territorial?>">
						<input type="hidden" name="cm" value="<?php echo $comunidad_id?>">
						<textarea cols="150" rows="2" name="consulta">INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) VALUES (<?php echo $catEquipo_id?>, <?php echo $vClub['id']?>, "<?php echo $vClub['nombre']?>", "", "000", "<?php echo $vClub['nombre']?>", <?php echo $key?>)</textarea>
						<input type="submit" name="grabar" value="grabar equipo">				
						</form>


						<?php }
					}


	                $sq='SELECT e.id, e.club_id, e.nombre, e.categoria_id, e.federacion_id, e.codigoRFEF, (select count(id) from partido where equipoLocal_id=e.id) partidos,c.codigoRFEF clubRFEF FROM equipo e INNER JOIN club c ON e.club_id=c.id
	                WHERE c.territorialRFEF="'.$territorial.'" AND e.nombre LIKE "%'.$largo.'%" AND (e.desaparecido=0 OR e.desaparecido IS NULL) ORDER BY e.club_id';
	                echo 'buscando...<b>'.$largo.'</b><br />'; ?>

	                

	                <?php $resultadoSQL = mysqli_query($mysqli, $sq);
					$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
						<table cellpadding="2" cellpadding="2" bgcolor="black"><tr bgcolor="gainsboro"><td>id</td><td>club id</td><td>club rfef</td><td>nombre</td><td>cat</td><td>id FED</td><td>codRFEF</td><td>Partidos</td>
						<td><a href="/panelBack/adminer.php?username=root&db=futbolme_nueva&sql=SELECT+%2A%0AFROM+%60equipo%60%0ALIMIT+50" target="_blank">adminer</a></td>

						</tr>
					<?php 

					if (count($resultado)==0){ ?>

						


						<?php
						$sq='SELECT id, nombre, codigoRFEF, futbolbase_id, observaciones FROM club
						where nombre like "%'.$largo.'%" and territorialRFEF="'.$territorial.'"';
						$resultadoSQL = mysqli_query($mysqli, $sq);
						$resultado1 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
						foreach ($resultado1 as $v1) {
							echo $v1['nombre'].' '.$v1['codigoRFEF'].' '.$v1['futbolbase_id'].'<br />';
							echo 'id: '.$v1['id'].' - '.$v1['observaciones'].'<br />';
							echo 'Consulta: SELECT id, nombre, categoria_id FROM equipo WHERE club_id='.$v1['id'].'<hr />';
						} 

					} else {

						$mismaCategoria=0;
						$diferenteCategoria=0;
						foreach ($resultado as $e) { 
							if ($catEquipo_id!=$e['categoria_id']) { $diferenteCategoria++; continue; }
							$mismaCategoria++; ?>
							<tr bgcolor="yellow">
								<td align="center"><?php echo $e['id']?></td>
								<td align="center"><?php echo $e['club_id']?></td>
								<td align="center"><?php echo $e['clubRFEF']?></td>
								<td><b><?php echo $e['nombre']?></b></td>
								<td align="center"><?php echo $e['categoria_id']?></td>
								<td align="center"><?php echo $e['federacion_id']?>
								&nbsp; <a href="?<?php echo $cadena?>&modo=1&equipo_id=<?php echo $e['id']?>&federacion_id=<?php echo $key?>">**</a>
									
								</td>
								<td align="center"><?php echo $e['codigoRFEF']?></td>
								<td align="center"><?php echo $e['partidos']?></td>
								<td>
									<?php if ($e['partidos']==0){ ?>

									<a href="?<?php echo $cadena?>&modo=1&equipo_id=<?php echo $e['id']?>&federacion_id=<?php echo $key?>">UPDATE</a> equipo SET federacion_id=<?php echo $key?> WHERE id=<?php echo $e['id']?>;
									<?php } ?>
								</td>
							</tr>
							<tr>
						<form method="post" action="?"><td colspan="8">
							<input type="hidden" name="modo" value="2">
							<input type="hidden" name="te" value="<?php echo $temporada_id?>">
							<input type="hidden" name="c" value="<?php echo $competicion_id?>">
							<input type="hidden" name="g" value="<?php echo $grupo_id?>">
							<input type="hidden" name="cat" value="<?php echo $catEquipo_id?>">
							<input type="hidden" name="t" value="<?php echo $territorial?>">
							<input type="hidden" name="cm" value="<?php echo $comunidad_id?>">
						<textarea cols="150" rows="2" name="consulta">INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) SELECT categoria_id, club_id, "<?php echo trim($e['nombre'])?>", slug, "<?php echo trim($e['codigoRFEF'])?>", "<?php echo trim($e['nombre'])?>", "<?php echo $key?>" FROM equipo WHERE id=<?php echo $e['id']?></textarea></td>
						<td><input type="submit" name="grabar" value="grabar"></td>
						</form>
						</td></tr>

						<tr>
						<form method="post" action="?"><td colspan="8">
							<input type="hidden" name="modo" value="2">
							<input type="hidden" name="te" value="<?php echo $temporada_id?>">
							<input type="hidden" name="c" value="<?php echo $competicion_id?>">
							<input type="hidden" name="g" value="<?php echo $grupo_id?>">
							<input type="hidden" name="cat" value="<?php echo $catEquipo_id?>">
							<input type="hidden" name="t" value="<?php echo $territorial?>">
							<input type="hidden" name="cm" value="<?php echo $comunidad_id?>">
						<textarea cols="150" rows="2" name="consulta">INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) SELECT categoria_id, club_id, "<?php echo trim($e['nombre'])?> B", slug, "<?php echo trim($e['codigoRFEF'])?>", "<?php echo trim($e['nombre'])?> B", "<?php echo $key?>" FROM equipo WHERE id=<?php echo $e['id']?></textarea></td>
						<td><input type="submit" name="grabar" value="grabar B"></td>
						</form>
						</td></tr>

						<?php }

						if ($mismaCategoria==0){ //se repite sin filtro
							foreach ($resultado as $e) { ?>
								<tr bgcolor="orange">
									<td align="center"><?php echo $e['id']?></td>
									<td align="center"><?php echo $e['club_id']?></td>
									<td><?php echo $e['nombre']?></td>
									<td align="center"><?php echo $e['categoria_id']?></td>
									<td align="center"><?php echo $e['federacion_id']?></td>
									<td align="center"><?php echo $e['codigoRFEF']?></td>
									<td>UPDATE equipo SET federacion_id=<?php echo $key?> WHERE id=<?php echo $e['id']?>;</td>
								</tr>
								<tr>
									<form method="post" action="?"><td colspan="8">
							<input type="hidden" name="modo" value="2">
							<input type="hidden" name="te" value="<?php echo $temporada_id?>">
							<input type="hidden" name="c" value="<?php echo $competicion_id?>">
							<input type="hidden" name="g" value="<?php echo $grupo_id?>">
							<input type="hidden" name="cat" value="<?php echo $catEquipo_id?>">
							<input type="hidden" name="t" value="<?php echo $territorial?>">
							<input type="hidden" name="cm" value="<?php echo $comunidad_id?>">

									<textarea cols="150" name="consulta" rows="2">INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) SELECT "<?php echo $catEquipo_id?>", club_id, "<?php echo trim($e['nombre'])?>", slug, "<?php echo $cRFEF?>", "<?php echo trim($e['nombre'])?>", "<?php echo $key?>" FROM equipo WHERE id=<?php echo $e['id']?></textarea></td>
									<td><input type="submit" name="grabar" value="grabar ---"></td>
						</form></tr>
							<?php }
						}
					} 
				} else { echo '<tr><td colspan="8" bgcolor="red">Palabra muy corta para buscar</td></tr>'; }
					echo '</table>';

		} else { 
			echo $r['categoria_id'].' '.$r['nombre'];

			$sq1='SELECT equipo_id FROM temporada_equipo WHERE equipo_id='.$r['id'].' AND temporada_id='.$temporada_id;
			$resultadoSQL = mysqli_query($mysqli, $sq1);
			$r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
			if (count($r1)==0){ 
				$sq2='INSERT INTO temporada_equipo (temporada_id, equipo_id) VALUES ('.$temporada_id.','.$r['id'].')';
				mysqli_query($mysqli, $sq2);
				//echo $sq2.'<br />';
				echo ' <b>equipo insertado</b>'; //------------NO GRABO - NO BORRO
			}

			echo ' - <b>OK</b>.<br />'; 
		} ?>
		
		</td><td valign="top">

			<?php 

			
			/*

			$urlEquipo=$urlClub.'id_equipo='.$key.'&id_grupo='.$grupo_id; 
			$url=$urlEquipo;
			echo $url.'<br />';			
            
			//include('_002_c_sacarEquipos.php');

			$file = '../../federacion/'.$territorial.'/equipos/futbolbase_'.$e['clubRFEF'].'.json';

			if (@file_exists($f)) { 
			    $json = file_get_contents($file);
				$datos = json_decode($json, true);
				imp($datos);
			} else {
			    echo 'No tenemos fichero<br />';
			}

			*/




			?>

		</td></tr>
	<?php }?>
		</table>
	</td>
	<td valign="top">
		<table border="1">
	<?php
	$f = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-jornadas.json';
	$json = file_get_contents($f);
	$jornadas = json_decode($json, true); 
	$j=0;
	foreach ($jornadas as $key => $v) { ?>
		<tr bgcolor="gainsboro"><td colspan="8">Jornada <?php echo $key?></td></tr>
			
		<?php foreach ($v as $value) { 

			$sqe1='SELECT id,nombre,federacion_id FROM equipo WHERE federacion_id='.$value['equipoLocal_id'];
			$resultadoSQL = mysqli_query($mysqli, $sqe1);
			$r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
			$sqe2='SELECT id,nombre,federacion_id FROM equipo WHERE federacion_id='.$value['equipoVisitante_id'];
			$resultadoSQL = mysqli_query($mysqli, $sqe2);
			$r2 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
			?>
		<tr>
			<td><?php echo $value['estado_partido']?></td>
			<td><?php echo $value['fecha']?></td>
			<td><?php echo $value['hora_prevista']?></td>
			<td><?php echo $value['equipoLocal_id']?></td>
			<td><?php echo $value['local']?><?php imp($r1)?></td>
			<td align="center"><?php echo $value['goles_local']?> - <?php echo $value['goles_visitante']?></td>
			<td align="right"><?php echo $value['visitante']?><?php imp($r2)?></td>
			<td><?php echo $value['equipoVisitante_id']?></td>
		</tr>
		<?php } ?>
	<?php } ?>
		</table>
	</td></tr>
	</table>
<hr />

