<?php
$static_v = 13; 
define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once 'funciones.php';
require_once '../../src/funciones.php';

$id=$_GET['torneo_id'];
$temporada_id=$_GET['temporada_id'];
echo 'Torneo ID:'.$id.' Temporada ID:'.$temporada_id;
echo '<hr />';
for ($i=2019; $i > 1927; $i--) { 
	echo '<h1>'.$i.'-'.substr(($i+1), -2).'</h1>';
	if ($i>2015){
		$partidos=basededatos($i,$temporada_id);
	} else {

		$partidos=historico($i,$temporada_id);
	} ?>
	<table bgcolor="black" cellpadding="2" cellspacing="2">
		<tr bgcolor="yellow">
			<td>Fecha</td>
			<td>Hora</td>
			<td>local</td>
			<td>resultado</td>
			<td>visitante</td>
		</tr>

	<?php 
	$jda=-2;
	foreach ($partidos as $key => $value) { 
		if ($value['jornada']!=$jda){ ?>
			<tr><td colspan="5" align="center" bgcolor="gainsboro">Jornada <?php echo $value['jornada']?></td></tr>
		<?php }?>
		<tr bgcolor="white">
			<td><?php echo $value['fecha']?></td>
			<td><?php echo $value['hora']?></td>
			<td align="right"><?php echo $value['local']?></td>
			<td align="center"><?php echo $value['goles_local']?>-<?php echo $value['goles_visitante']?></td>
			<td><?php echo $value['visitante']?></td>
		</tr>
	<?php 
		$jda=$value['jornada'];
	} ?>
	</table>
<?php 
}

function basededatos($i,$temporada_id){
	$consulta = 'SELECT p.id, p.jornada, p.fecha, p.hora_prevista hora, ec.nombre local, ef.nombre visitante, p.goles_local, p.goles_visitante
	FROM partido p 
	INNER JOIN equipo ec ON ec.id=p.equipoLocal_id
    INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id
	WHERE temporada_id='.$temporada_id.' ORDER BY p.jornada,p.fecha,p.hora_prevista'; 

    switch ($i) {
     	case 2016: $mysqli = conectar2016(); break;
     	case 2017: $mysqli = conectar2017(); break;
     	case 2018: $mysqli = conectar2018(); break;
     	case 2019: $mysqli = conectarFM(); break;
     } 
    
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;

}

function historico($i,$temporada_id){
	$nt='Temporada '.$i.'-'.substr(($i+1), -2);
	$consulta = 'SELECT p.id, p.jornada, p.fecha, p.hora, p.local_nombre local, p.visitante_nombre visitante, p.local_goles goles_local, p.visitante_goles goles_visitante 
	FROM historico p 
	WHERE torneo_id='.$temporada_id.' AND nombre_temporada="'.$nt.'" ORDER BY p.jornada,p.fecha,p.hora'; 

    $mysqli = conectarFM(); 
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;

	
}

?>
