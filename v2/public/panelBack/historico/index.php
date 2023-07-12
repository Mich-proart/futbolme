<?php
define('_PANEL_', 1);
session_start();
require_once '../includes/funciones.php';
$mysqli = conectar();
$mysqliBase = conectarBase();
require_once '../includes/consultas.php';
require_once 'consultas.php';
require_once '../includes/head.php';
$tiempo_inicio = microtime_float(); ?>

</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php
/*
if (isset($_GET['modo']) && $_GET['modo']=='guardarDatos'){
	$temporada=$_GET['temporada'];
	guardarDatos($temporada);
}

if (isset($_GET['modo']) && $_GET['modo']=='guardarExcepciones'){
	$temporada=$_GET['temporada'];
	guardarExcepciones($temporada);	
}


if (isset($_POST['modo']) && $_POST['modo']=='crearTemporada'){
	$temporada=$_POST['temporada'];
	$referencia=$temporada-1;
	imp($temporada);
	imp($referencia);

	$sql='INSERT INTO nacionaltorneos(nombreTemporada, jornadas, equipos, temporada, estilo, grupo, idDivision, idTorneoTemporada, fm_torneo_id) 
	SELECT "'.$temporada.'", jornadas, equipos, '.$temporada.', estilo, grupo, idDivision, "0", fm_torneo_id FROM nacionaltorneos WHERE temporada='.$referencia.' ORDER BY idTemporada';
	//echo $sql;
	$mysqli = conectar();
    mysqli_query($mysqli, $sql);
}
*/

$torneosFM=torneosH(); ?>

<form method="post" action="index.php" id="formCrearTemporada" style="display:none">	
	<input type="hidden" name="modo" value="crearTemporada">
	Temporada:<input type="text" name="temporada" size="2">
	<input type="submit" name="enviar" value="El año inmediato con 4 dígitos; ejem. 2018">	
</form>

<table border="1" bgcolor="dimgray">
	
<?php 

$id=0;
foreach ($torneosFM as $key => $value) { 

		if ($value['temporada']!=$id) { 
			/*if ($key==0) { ?>
				<tr bgcolor="yellow">
				<td align="center" colspan="3"><span onclick="guardarDatos(<?php echo $value['temporada']?>)" style="cursor:pointer">Guardar datos temporada <?php echo $value['temporada']?></span></td>
				<td align="center" colspan="4"><span onclick="guardarExcepciones(<?php echo $value['temporada']?>)" style="cursor:pointer">Guardar excepciones <?php echo $value['temporada']?></span></td>
				</tr>
			<?php }*/ ?>
		<tr bgcolor="gainsboro">
			<td align="center">idTemporada</td>
			<td align="center">nombreTemporada</td>
			<td align="center">jornadas</td>
			<td align="center">equipos</td>
			<td align="center">temporada</td>
			<td align="center">estilo</td>
			<td align="center">grupo</td>
			<td align="center">idDivision</td>
			<td align="center">idTT</td>
			<td align="center">fm_torneo_id</td>
			<td align="center">partidos</td>
			<td align="center">clasi</td>
		</tr>
		
		<?php } ?>
		<tr bgcolor="white">
			<td align="center" valign="top"><?php echo $value['idTemporada']?></td>
			<td align="center" valign="top"><?php echo $value['nombreTemporada']?></td>
			<td align="center" valign="top"><?php echo $value['jornadas']?></td>
			<td align="center" valign="top"><?php echo $value['equipos']?></td>
			<td align="center" valign="top"><?php echo $value['temporada']?></td>
			<td align="center" valign="top"><?php echo $value['estilo']?></td>
			<td align="center" valign="top"><?php echo $value['grupo']?></td>
			<td align="center" valign="top"><?php echo $value['idDivision']?></td>
			<td align="center" valign="top"><?php echo $value['idTorneoTemporada']?></td>
			<td align="center" valign="top"><?php echo $value['fm_torneo_id']?></td>
			<td align="center"><?php echo $value['partidos']?></td>
			<td align="center">
				<?php if ($value['estilo']==0){ ?>
				<a href="generar_una_id.php?idTemporada=<?php echo $value['idTemporada']?>">ver</a>
				<?php } ?>
			</td>
		</tr>
	<?php $id=$value['temporada'];
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
require_once '../includes/ajax.php';