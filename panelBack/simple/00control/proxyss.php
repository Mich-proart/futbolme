<?php
define('_FUTBOLME_', 1);
set_time_limit(0);

include('../../federacion/funciones.php');
include('../../federacion/consultas.php');
include('../simple_html_dom.php');

$mysqli = conectar();
$mysqliFM = conectarFM();


if (isset($_GET['modo'])){
	if ($_GET['modo']=='borrarTodos'){
		$sql='DELETE FROM proxiss WHERE mantener=0';
		mysqli_query($mysqli, $sql);
	}
}

if (isset($_GET['modo'])){
	if ($_GET['modo']=='quitar'){
		$sql='DELETE FROM proxiss WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
	}
}

if (isset($_GET['modo'])){
	if ($_GET['modo']=='activar'){
		$sql='UPDATE proxiss SET fallo=0 WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
	}
	if ($_GET['modo']=='mantener'){
		$sql='UPDATE proxiss SET mantener=1 WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
	}
}


if (isset($_GET['modo'])){
	if ($_GET['modo']=='poneracero'){
		$sql='UPDATE proxiss SET fallo=0';
		mysqli_query($mysqli, $sql);
	}
}

if (isset($_GET['modo'])){
	if ($_GET['modo']=='poneraceroTorneos'){
		$sql='UPDATE torneo SET estado=0';
		mysqli_query($mysqliFM, $sql);
	}
}

if (isset($_POST['modo'])){
	if ($_POST['modo']=='cargar'){
		
		$p=$_POST['proxis'];
		$proxis=explode("\r\n", $p);


		foreach ($proxis as $key => $ip) {
			$x=explode(':', $ip);
			//if ($x[1]!='8080' && $x[1]!='80' && $x[1]!='443'){ continue; }
			$sql="SELECT id FROM proxiss WHERE ip='".$ip."'";
		    $resultadoSQL = mysqli_query($mysqli, $sql);
		    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (count($resultado)==0){
				$sql='INSERT INTO proxiss(ip, uso, estado) VALUES ("'.$ip.'",0,0)';
				mysqli_query($mysqli, $sql);
			}
		}
		echo 'finalizado';
	}
}

$sql="SELECT sum(uso) usos,sum(fallo) fallos FROM proxiss";
$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql="SELECT id,ip,uso,fallo,estado, mantener FROM proxiss ORDER BY estado DESC, uso DESC, fallo";
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
<div style="width: 100%; float: left;">
	<div style="overflow: auto; height: 900px; width: 500px; float: left;">
		<h3><a href="/panelBack/simple/00control/proxyss.php">REFRESCAR</a> <b>HTTPS</b></h3>
		<p><a href="/panelBack/federacion/index.php">Gestión federativa</a></p>
		<p><a href="?modo=poneracero">Poner a cero</a> - Total proxis: <?php echo count($proxis)?>		
		- <span style="color:green">OK: <?php echo $r[0]['usos']?></span> - <span style="color:red">KO: <?php echo $r[0]['fallos']?></span></p>
		<table border="1">
			<tr bgcolor="gainsboro">
				<td>Or</td><td>id</td><td>ip <a href="?modo=borrarTodos">Borrar todos</a></td>
				<td>uso</td><td>fallo</td><td>estado</td><td>mantener</td><td></td>
			</tr>
			<?php 
			foreach ($proxis as $key => $v) { ?>
				<tr bgcolor="white">
					<td><?php echo $key?></td><td><?php echo $v['id']?></td><td align="right"><?php echo $v['ip']?></td><td align="center"><?php echo $v['uso']?></td>
					<td align="center"><a href="?modo=activar&id=<?php echo $v['id']?>"><?php echo $v['fallo']?></a></td>
					<td align="center"><?php echo $v['estado']?></td>
					<td align="center"><a href="?modo=mantener&id=<?php echo $v['id']?>"><?php echo $v['mantener']?></a></td>
					<td align="center"><a href="?modo=quitar&id=<?php echo $v['id']?>">Q</a></td>

				</tr>
			<?php } ?>
			</table>
	</div>
	<div style="overflow: auto; height: 900px; width: 350px; float: left; text-align: center">
		<form action="proxyss.php" method="post">
			<input type="hidden" name="modo" value="cargar">
			<input type="submit" name="enviar" value="cargarProxis"> <a href="https://hidemyna.me/es/proxy-list/" target="_blank">Abrir lista de proxis</a> - Clave: 464068021671846<br />
			<textarea cols="35" rows="32" name="proxis" required></textarea>
		</form>
	</div>

	<?php 
	$diaN = date('N');
	echo 'Número de día es '.$diaN.'<br />';

	$consulta = 'SELECT count(id) torneos FROM torneo WHERE tipo_torneo=1 
	AND apiRFEFcompeticion>0 AND apiRFEFgrupo>0 AND comunidad_id<>5 AND comunidad_id<>13';    
	$resultadoSQL = mysqli_query($mysqliFM, $consulta);
	//echo $consulta.'<br />';
	$tt = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
	echo 'Total de torneos a actualizar: '.$tt['torneos'].'<br />';

	$sq='SELECT id, nombre, comunidad_id, estado FROM torneo WHERE estado='.$diaN.' order by comunidad_id, orden';
	$resultadoSQL = mysqli_query($mysqliFM, $sq);
	$torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	echo 'Total torneos actualizados: '.count($torneos).'<br />';
	?>
	<div style="overflow: auto; height: 900px; width: 450px; float: left;">
		<p><a href="?modo=poneraceroTorneos">Poner a cero</a></p>
		<table border="1">
			<tr bgcolor="gainsboro">
				<td>id</td><td>nombre</td><td>comunidad</td><td>estado</td>
			</tr>
			<?php 
			foreach ($torneos as $key => $v) { ?>
				<tr bgcolor="white">
					<td><?php echo $v['id']?></td><td align="right"><?php echo $v['nombre']?></td><td align="center"><?php echo $v['comunidad_id']?></td>
					<td align="center"><?php echo $v['estado']?></td>
				</tr>
			<?php } ?>
			</table>
	</div>

	<?php 
	

	$sq='SELECT id, nombre, comunidad_id, estado FROM torneo WHERE estado<>'.$diaN.' AND 
	 tipo_torneo=1 AND apiRFEFcompeticion>0 AND apiRFEFgrupo>0 AND comunidad_id<>5 AND comunidad_id<>13
	order by comunidad_id, orden';
	$resultadoSQL = mysqli_query($mysqliFM, $sq);
	$torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	echo 'Faltan por actualizar: '.count($torneos).'<br />';;
	?>
	<div style="overflow: auto; height: 900px; width: 450px; float: left;">
		<table border="1">
			<tr bgcolor="gainsboro">
				<td>id</td><td>nombre</td><td>comunidad</td><td>estado</td>
			</tr>
			<?php 
			foreach ($torneos as $key => $v) { ?>
				<tr bgcolor="white">
					<td><?php echo $v['id']?></td><td align="right"><?php echo $v['nombre']?></td><td align="center"><?php echo $v['comunidad_id']?></td>
					<td align="center"><?php echo $v['estado']?></td>
				</tr>
			<?php } ?>
			</table>
	</div>


</div>

<?php

die;




?>