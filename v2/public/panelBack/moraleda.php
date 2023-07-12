<?php 
$static_v=4;

function imp($ob){
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
};


include 'includes/_conexion.php';
$mysqli = conectar();

if (isset($_POST['m'])){
  if ($_POST['m']==1) {
	$tabla='historico';
	$sq='UPDATE '.$tabla.' SET fecha="'.$_POST['f'].'",nombre_eliminatoria="'.$_POST['j'].'",local_goles="'.$_POST['lg'].'",visitante_goles="'.$_POST['vg'].'" WHERE id='.$_POST['id'];
  } else {
	$tabla='nacionalcalendario';
	$sq='UPDATE '.$tabla.' SET fecha="'.$_POST['f'].'",jornada="'.$_POST['j'].'",resulCasa="'.$_POST['rc'].'",resulFuera="'.$_POST['rf'].'"  WHERE idPartido='.$_POST['id'];
  }
	mysqli_query($mysqli, $sq);
	die('El partido ha sido editado. Refresca la página para ver los cambios.');
}

if (isset($_POST['mj'])){
  if ($_POST['mj']==1) {
	$tabla='historico';
	$sq='UPDATE '.$tabla.' SET fecha="'.$_POST['f2'].'",nombre_eliminatoria="'.$_POST['j'].'" WHERE historicotemporadas_id='.$_POST['id'].' AND fecha="'.$_POST['f'].'"';
  } else {
	$tabla='nacionalcalendario';
	$sq='UPDATE '.$tabla.' SET fecha="'.$_POST['f2'].'",jornada="'.$_POST['j'].'" WHERE idTemporada='.$_POST['id'].' AND fecha="'.$_POST['f'].'"';
  }
	mysqli_query($mysqli, $sq);
	die('La jornada ha sido editada. Refresca la página para ver los cambios.');
}

//$anyo=1958;
$anyo=$_GET['a']??1958;
$anyo2=($anyo+1); $anyo2=substr($anyo2,2);

$sq='SELECT nt.temporada, nt.jornadas, nt.equipos, nt.estilo, nt.grupo, nt.idDivision, nt.idTorneoTemporada, t.nombre
FROM nacionaltorneos nt
LEFT JOIN temporada t ON t.id=nt.fm_torneo_id
WHERE nt.nombreTemporada='.$anyo.' ORDER BY nt.nombreTemporada, nt.estilo, nt.idDivision, nt.grupo';
$resultadoSQL = mysqli_query($mysqli, $sq);
$ligas = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sq='SELECT id, torneo_id, nombre_temporada, campeon, subcampeon
FROM historicotemporadas WHERE nombre_temporada="Edición '.$anyo.'"';
$resultadoSQL = mysqli_query($mysqli, $sq);
$copas = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Temporada <?php echo $anyo?>-<?php echo $anyo2?></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script async src="moraleda.js?v=<?php echo $static_v; ?>"></script>
<link href="moraleda.css?v=<?php echo $static_v; ?>" rel="stylesheet">
</head>
<body>
	<div id="contenido-minutas" style="width: 100%; background-color:yellow; border:1px solid black; float:left">
		<div>
			<div class="minutas marco" data="liga" style="width: 300px; float: left;">Liga</div>
			<div class="minutas marco" data="copa" style="width: 300px; float: left">Copa</div>
			<div class="clear"></div>
		</div>

		<div class="marco contenedor-minutas" id="liga" style="display:block;float:left">
			<h1>Liga</h1>

			<?php $calendario=array();$clasi=array();

			foreach ($ligas as $k => $v) {

				$sq1='SELECT jornada, fecha, nomCasa, nomFuera, resulCasa, resulFuera, hora, fm_local_id, fm_visitante_id, idPartido
				FROM nacionalcalendario
				WHERE idTemporada = '.$v['idTorneoTemporada'].' ORDER BY jornada, fecha, hora';
				$resultadoSQL = mysqli_query($mysqli, $sq1);
				$cal = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

				$sq2='SELECT posicion, equipo, puntos, jugados, ganados, empatados, perdidos, golesFavor, golesContra, equipo_id, color_texto, color_fondo, diferencia, id
				FROM nacionalclasificacionok
				WHERE temporada_id='.$v['idTorneoTemporada'].' ORDER BY posicion';
				$resultadoSQL = mysqli_query($mysqli, $sq2);
				$cla = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

				$calendario[$v['idTorneoTemporada']]=$cal;
				$clasi[$v['idTorneoTemporada']]=$cla;

				if ($v['idDivision']==4){ $division='3ª DIVISIÓN'; } else { $division=''; }
				if (is_null($v['nombre'])){ $v['nombre']=$division.' - '.$v['grupo']; }

				$v['nombre']=str_replace('TERCERA', '3ª', $v['nombre']);
				$v['nombre']=str_replace('RFEF', '', $v['nombre']);

				

				?>
				<div class="marco contentTorneo" data="torneo-<?php echo $v['idTorneoTemporada']?>" style="float:left; font-size:12px;"><?php echo $v['nombre']?></div>
			<?php } ?>
			<div class="clear"></div>
			<div id="contenido-torneos">
			<?php foreach ($ligas as $k => $v) { 

				if ($v['idDivision']==4){ $division='3ª DIVISIÓN'; } else { $division=''; }
				if (is_null($v['nombre'])){ $v['nombre']=$division.' - '.$v['grupo']; }
				$v['nombre']=str_replace('TERCERA', '3ª', $v['nombre']);
				$v['nombre']=str_replace('RFEF', '', $v['nombre']);?>
			
				<div class="marco contenedor-torneo" id="torneo-<?php echo $v['idTorneoTemporada']?>" style="display:none; width: 100%;">
					<h1><?php echo $v['nombre']?></h1>

					<form method="post" onsubmit="submitJornada(event, $(this).serialize(),<?php echo $v['idTorneoTemporada']?>)" name="jornada">
					<input type="hidden" name="mj" value="0">
					<input type="hidden" name="id" value="<?php echo $v['idTorneoTemporada']?>">
					Jda. <input type="text" name="j" value="" size="8" placeholder="jornada">
					<input type="date" name="f" value="" size="8">						
					<input type="date" name="f2" value="" size="8">							
					<input type="submit" name="cambiar fechas">
					</form>
					<div id="laliga-<?php echo $v['idTorneoTemporada']?>"></div>

					<div class="marco" style="float: left;">
					<div class="marco contentLiga" data="calendario" style="float: left;">Calendario</div>
					<div class="marco contentLiga" data="clasificacion" style="float: left;">Clasificacion</div>
					</div>
					<div class="clear"></div>
					<div id="contenido-liga-<?php echo $v['idTorneoTemporada']?>">
						<div class="contenedor-liga" id="calendario" style="display: block;">
							<h1>Calendario  <?php echo $v['nombre']?></h1>
							<table class="table">
							<?php $j=0;
							foreach ($calendario[$v['idTorneoTemporada']] as $k1 => $v1) {
								if ($v1['jornada']!=$j){
									echo '<tr bgcolor="gainsboro"><td align="center" colspan="4">Jornada '.$v1['jornada'].'</td></tr>';
								}?>
								<tr bgcolor="white">
									<td align="center"><?php echo date('d/m/Y',strtotime($v1['fecha']))?></td>
									<td align="right"><?php echo $v1['nomCasa']?></td>
									<td align="center"><?php echo $v1['resulCasa']?> - <?php echo $v1['resulFuera']?></td>
									<td align="left"><?php echo $v1['nomFuera']?></td>
									<td>
									<span onclick="partidoVer(<?php echo $v1['idPartido']?>)">*</span>
									<div id="partido-<?php echo $v1['idPartido']?>" style="display: none;">
										<form method="post" onsubmit="submitPartido(event, $(this).serialize(),<?php echo $v1['idPartido']?>)" name="partido">
											<input type="hidden" name="m" value="0">
											<input type="hidden" name="id" value="<?php echo $v1['idPartido']?>">
											<input type="date" name="f" value="<?php echo $v1['fecha']?>" size="16">
											Jda. <input type="text" name="j" value="<?php echo $v1['jornada']?>" size="2">
											<br />
											<?php echo $v1['nomCasa']?><input type="text" name="rc" value="<?php echo $v1['resulCasa']?>" size="1" style="text-align: center;">-
											<input type="text" name="rf" value="<?php echo $v1['resulFuera']?>" size="1"  style="text-align: center;"><?php echo $v1['nomFuera']?>
											<input type="submit" name="editar">
										</form>
									</div>
									</td>
								</tr>

							<?php $j=$v1['jornada'];
							}?>
							</table>

						</div>

						<div class="contenedor-liga" id="clasificacion" style="display: none;">
							<h1>Clasificación  <?php echo $v['nombre']?></h1>
													
							<table class="table">
								<tr bgcolor="gainsboro">
									<td align="center">Pos</td>
									<td align="left">equipo</td>
									<td align="center">ptos</td>
									<td align="center">jug</td>
									<td align="center">gan</td>
									<td align="center">emp</td>
									<td align="center">per</td>
									<td align="center">GF</td>
									<td align="center">GC</td>
								</tr>

							<?php foreach ($clasi[$v['idTorneoTemporada']] as $k1 => $v1) {?>
								<tr bgcolor="white">
									<td align="center"><?php echo $v1['posicion']?></td>
									<td align="left" style="background-color: <?php echo $v1['color_fondo']?>; color: <?php echo $v1['color_texto']?>"><?php echo $v1['equipo']?></td>
									<td align="left"><?php echo $v1['puntos']?></td>
									<td align="center"><?php echo $v1['jugados']?></td>
									<td align="center"><?php echo $v1['ganados']?></td>
									<td align="center"><?php echo $v1['empatados']?></td>
									<td align="center"><?php echo $v1['perdidos']?></td>
									<td align="center"><?php echo $v1['golesFavor']?></td>
									<td align="center"><?php echo $v1['golesContra']?></td>
								</tr>
							<?php }?>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>


		</div>

		<div class="contenedor-minutas" id="copa" style="display:none;">
			<h1>Copa</h1>
			<div class="marco">
				<form method="post" onsubmit="submitJornada(event, $(this).serialize(),<?php echo $copas[0]['id']?>)" name="partido">
					<input type="hidden" name="mj" value="1">
					<input type="hidden" name="id" value="<?php echo $copas[0]['id']?>">
					Eli. <input type="text" name="j" value="" size="20" placeholder="nombre de la eliminatoria">
					<input type="date" name="f" value="" size="8">						
					<input type="date" name="f2" value="" size="8">							
					<input type="submit" name="cambiar fechas">
				</form>
				<div id="laliga-<?php echo $copas[0]['id']?>"></div>

			</div>
			<table class="table"><tr>
				<td><?php echo $copas[0]['nombre_temporada']?></td>
				<td>Campeón: <?php echo $copas[0]['campeon']?></td>
				<td>Subcampeón: <?php echo $copas[0]['subcampeon']?></td>
			</tr></table>

			<?php $id_torneo=$copas[0]['id'];
			$sq='SELECT nombre_eliminatoria, fecha, hora, local_nombre, visitante_nombre, local_goles, visitante_goles, local_fm_id, visitante_fm_id, id
			FROM historico
			WHERE historicotemporadas_id ='.$id_torneo.' ORDER BY fecha DESC';
			$resultadoSQL = mysqli_query($mysqli, $sq);
			$copa = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>

			<table class="table">
			<?php $j='';
			foreach ($copa as $k1 => $v1) {
				if ($v1['nombre_eliminatoria']!=$j){
					echo '<tr bgcolor="gainsboro"><td align="center" colspan="4">'.$v1['nombre_eliminatoria'].'</td></tr>';
				}?>
				<tr bgcolor="white">
					<td align="center"><?php echo date('d/m/Y',strtotime($v1['fecha']))?></td>
					<td align="right"><?php echo $v1['local_nombre']?></td>
					<td align="center"><?php echo $v1['local_goles']?> - <?php echo $v1['visitante_goles']?></td>
					<td align="left"><?php echo $v1['visitante_nombre']?></td>
					<td>
					<span onclick="partidoVer(<?php echo $v1['id']?>)">*</span>
					<div id="partido-<?php echo $v1['id']?>" style="display: none;">
						<form method="post" onsubmit="submitPartido(event, $(this).serialize(),<?php echo $v1['id']?>)" name="partido">
							<input type="hidden" name="m" value="1">
							<input type="hidden" name="id" value="<?php echo $v1['id']?>">
							<input type="date" name="f" value="<?php echo $v1['fecha']?>" size="8">
							Eli. <input type="text" name="j" value="<?php echo $v1['nombre_eliminatoria']?>" size="20">
							<br />
							<?php echo $v1['local_nombre']?><input type="text" name="lg" value="<?php echo $v1['local_goles']?>" size="1" style="text-align: center;">-
							<input type="text" name="vg" value="<?php echo $v1['visitante_goles']?>" size="1"  style="text-align: center;"><?php echo $v1['visitante_nombre']?>
							<input type="submit" name="editar">
						</form>
					</div>
					</td>
				</tr>

			<?php $j=$v1['nombre_eliminatoria'];
			}?>
			</table>



		</div>
	</div>

</body>
</html>

