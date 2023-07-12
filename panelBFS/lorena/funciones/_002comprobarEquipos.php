<?php 
define('_FUTBOLME_', 1);
include('../../../src/funciones.php');
require_once '../consultas.php';

$tiempo_inicio = microtime_float(); 

$mysqli = conectarFM();
$mysqliFB = conectar();

$competicion_id=$_GET['c'];
$grupo_llegada=$_GET['g'];
$categoria=$_GET['cat']; 
$territorial=$_GET['t'];
$comunidad_id=$_GET['cm'];

if ($grupo_llegada==0){
	$sq='SELECT id, nombre, grupo, competicion_id, grupo_id, categoria FROM torneo WHERE 
competicion_id='.$competicion_id.' AND comunidad_id='.$comunidad_id.' ORDER BY id';
} else {
	$sq='SELECT id, nombre, grupo, competicion_id, grupo_id, categoria FROM torneo WHERE 
grupo_id='.$grupo_llegada.' AND comunidad_id='.$comunidad_id.' ORDER BY id';
}
$resultadoSQL = mysqli_query($mysqliFB, $sq);
$fed = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


foreach ($fed as $key => $value) {

$grupo_id=$value['grupo_id'];
$categoria=$value['categoria'];
$nombre=$value['nombre'];
$grupo=$value['grupo'];
$id=$value['id']; ?>

<h3>id: <?php echo $id?> - <?php echo $nombre?> <?php echo $grupo?></h3>

<?php

	switch ($categoria) {
		case 'SENIOR': $catEquipo_id=1;break;
		case 'JUVENILES': $catEquipo_id=3;break;
		case 'CADETES': $catEquipo_id=4;break;
		case 'INFANTILES': $catEquipo_id=21;break;
		case 'ALEVINES': $catEquipo_id=23;break;
		case 'FEMENINO': $catEquipo_id=2;break;
	}


	$f = '../../federacion/'.$territorial.'/calendarios/'.$grupo_id.'-equipos.json';
	$json = file_get_contents($f);
	$equipos = json_decode($json, true); ?>

	<table>
		<tr>
			<td valign="top">

	<?php
	foreach ($equipos as $key => $value) {
		
		echo '<hr /><b>'.$value['equipo'].'</b> : <font style="color:red">'.$key.'</font> - ';
		$sq='SELECT e.id,e.nombre,e.categoria_id FROM equipo e 
		INNER JOIN club c ON e.club_id=c.id
		WHERE c.territorialRFEF="'.$territorial.'" AND e.federacion_id='.$key;
		$resultadoSQL = mysqli_query($mysqli, $sq);
		$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		if (count($r)==0){ 
			echo ' - Hay que grabarlo.<br />';

					$value['equipo']=str_replace('-', ' ', $value['equipo']);
	                $value['equipo']=str_replace(',', ' ', $value['equipo']);
	                $value['equipo']=str_replace('FUNDACIO', '', $value['equipo']);
	                $value['equipo']=str_replace('UNIÓ', '', $value['equipo']);
	                $value['equipo']=str_replace('ESPORTIVA', '', $value['equipo']);
	                
	                $palabras = explode(' ', $value['equipo']);
	                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
	                $largo = $palabras[0];

	                
	                
	            if (strlen($largo)>2){
	                $sq='SELECT e.id, e.club_id, e.nombre, e.categoria_id, e.federacion_id, e.codigoRFEF, (select count(id) from partido where equipoLocal_id=e.id) partidos FROM equipo e INNER JOIN club c ON e.club_id=c.id
	                WHERE c.territorialRFEF="'.$territorial.'" AND e.nombre LIKE "%'.$largo.'%" AND (e.desaparecido=0 OR e.desaparecido IS NULL) ORDER BY e.club_id';
	                echo $sq.'<br />';
	                $resultadoSQL = mysqli_query($mysqli, $sq);
					$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
						<table cellpadding="2" cellpadding="2" bgcolor="black"><tr bgcolor="gainsboro"><td>id</td><td>club id</td><td>nombre</td><td>cat</td><td>id FED</td><td>codRFEF</td><td>Partidos</td>
						<td><a href="/panelBack/adminer.php?username=root&db=futbolme_nueva&sql=SELECT+%2A%0AFROM+%60equipo%60%0ALIMIT+50" target="_blank">adminer</a></td>

						</tr>
					<?php 

					if (count($resultado)==0){
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
								<td><?php echo $e['nombre']?></td>
								<td align="center"><?php echo $e['categoria_id']?></td>
								<td align="center"><?php echo $e['federacion_id']?></td>
								<td align="center"><?php echo $e['codigoRFEF']?></td>
								<td align="center"><?php echo $e['partidos']?></td>
								<td>UPDATE equipo SET federacion_id=<?php echo $key?> WHERE id=<?php echo $e['id']?></td>
							</tr>
							<tr><td colspan="8"><textarea cols="150" rows="2">
								INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) SELECT categoria_id, club_id, "<?php echo trim($e['nombre'])?>", slug, "<?php echo trim($e['codigoRFEF'])?>", "<?php echo trim($e['nombre'])?>", "<?php echo $key?>" FROM equipo WHERE id=<?php echo $e['id']?>
							</textarea></td></tr>
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
									<td>UPDATE equipo SET federacion_id=<?php echo $key?> WHERE id=<?php echo $e['id']?></td>
								</tr>
								<tr><td colspan="8"><textarea cols="150" rows="2">
									INSERT INTO equipo (categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) SELECT categoria_id, club_id, "<?php echo trim($e['nombre'])?>", slug, "<?php echo trim($e['codigoRFEF'])?>", "<?php echo trim($e['nombre'])?>", "<?php echo $key?>" FROM equipo WHERE id=<?php echo $e['id']?>
								</textarea></td></tr>
							<?php }
						}
					} 
				} else { echo '<tr><td colspan="8" bgcolor="red">Palabra muy corta para buscar</td></tr>'; }
					echo '</table>';

		} else { 
			echo $r['categoria_id'].' '.$r['nombre'];
			echo ' - <b>OK</b>.<br />'; 
		}
		
		
	}?>

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
			
		<?php foreach ($v as $value) { ?>
		<tr>
			<td><?php echo $value['estado_partido']?></td>
			<td><?php echo $value['fecha']?></td>
			<td><?php echo $value['hora_prevista']?></td>
			<td><?php echo $value['equipoLocal_id']?></td>
			<td><?php echo $value['local']?></td>
			<td align="center"><?php echo $value['goles_local']?> - <?php echo $value['goles_visitante']?></td>
			<td align="right"><?php echo $value['visitante']?></td>
			<td><?php echo $value['equipoVisitante_id']?></td>
		</tr>
		<?php } ?>
	<?php } ?>
		</table>
	</td></tr>
	</table>
<hr />
<?php } ?>


