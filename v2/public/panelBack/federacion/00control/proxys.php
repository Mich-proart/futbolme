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
		$sql='DELETE FROM '.$_GET['bd'].' WHERE mantener=0';
		mysqli_query($mysqli, $sql);
	}

	if ($_GET['modo']=='quitarMalos'){
		$sql='DELETE FROM '.$_GET['bd'].' WHERE uso<10 AND fallo>5';
		mysqli_query($mysqli, $sql);
	}

	if ($_GET['modo']=='quitar'){
		$sql='DELETE FROM '.$_GET['bd'].' WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
		die('IP eliminada');
	}

	if ($_GET['modo']=='activar'){
		$sql='UPDATE '.$_GET['bd'].' SET fallo=0 WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
	}
	if ($_GET['modo']=='mantener'){
		$sql='UPDATE '.$_GET['bd'].' SET mantener=1 WHERE id='.$_GET['id'];
		mysqli_query($mysqli, $sql);
	}

	if ($_GET['modo']=='poneracero'){
		$sql='UPDATE '.$_GET['bd'].' SET fallo=0';
		mysqli_query($mysqli, $sql);
	}
} 
if (isset($_POST['modo'])){
	if ($_POST['modo']=='cargar'){
		$p=$_POST['proxis'];
		$proxis=explode("\r\n", $p);
		foreach ($proxis as $key => $ip) {
			$x=explode(':', $ip);
			//if ($x[1]!='8080' && $x[1]!='80' && $x[1]!='443'){ continue; }
			$sql='SELECT id FROM '.$_POST['bd'].' WHERE ip='.$ip;
		    $resultadoSQL = mysqli_query($mysqli, $sql);
		    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (count($resultado)==0){
				$sql='INSERT INTO '.$_POST['bd'].' (ip, uso, estado) VALUES ("'.$ip.'",0,0)';
				mysqli_query($mysqli, $sql);
			}
		}
		echo 'finalizado';
	}
}

?>
<div style="width: 100%; float: left;"> 
<div style="width: 100%; float: left; background-color: #F5E17A; padding: 10px">
<a href="https://hidemyna.me/es/proxy-list/" target="_blank">hidemyna</a> Clave: 464068021671846 (proxis, xis2, ss)
- <a href="http://free-proxy.cz/es/" target="_blank">free-proxy</a> (xis3, ss7)
- <a href="https://www.proxy-list.download/es/HTTPS" target="_blank">proxy-list</a> (xis1, ss6)

<span style="color:maroon">proxis (7) - xis1 (5) - xis2 (9,10) - xis3 (1,3,11) - xis4 (13,14,16,17,18)</span> :: <span style="color:navy">ss(6,2) - ss6 (8) - ss7 (15)</span>
</div>



<table>
	<tr>
<?php
for ($i=0; $i < 8; $i++) { 
$colorFondo='white';
if ($i==0) { $bd='proxis'; } else { $bd='proxis'.$i; }
if ($i==5) { $bd='proxiss'; $colorFondo='gainsboro'; } 
if ($i>5) { $bd='proxiss'.$i; $colorFondo='gainsboro'; }

$sql='SELECT sum(uso) usos,sum(fallo) fallos FROM '.$bd;
$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT count(id) virgen FROM '.$bd.' WHERE uso=0 AND fallo=0';
$resultadoSQL = mysqli_query($mysqli, $sql);
$r1 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT count(id) malos FROM '.$bd.' WHERE uso<10 AND fallo>5';
$resultadoSQL = mysqli_query($mysqli, $sql);
$r2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);



$sql='SELECT id,ip,uso,fallo,estado, mantener FROM '.$bd.' ORDER BY uso DESC, fallo';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>

<td valign="top" bgcolor="<?php echo $colorFondo?>">
<div style="overflow: auto; height: 500px; font-size: 13px;">
<?php echo $bd?><br />
<a href="?modo=borrarTodos&bd=<?php echo $bd?>">Borrar todos</a><br />
Total : <?php echo count($proxis)?>
 - <span style="color:green">OK: <?php echo $r[0]['usos']?></span> 
 - <span style="color:red">KO: <?php echo $r[0]['fallos']?></span><br />
 Virgenes: <?php echo $r1[0]['virgen']?> - <a href="?modo=poneracero&bd=<?php echo $bd?>">Poner a cero</a><hr />
 Malos: <?php echo $r2[0]['malos']?> - <a href="?modo=quitarMalos&bd=<?php echo $bd?>">Quitar malos</a><br />
	<table border="1">
		<tr bgcolor="gainsboro">
			<td>Or</td><td>port</td>
			<td>uso</td><td>fallo</td>
			<td style="display:none">estado</td>
			<td style="display:none">mantener</td>
			<td></td>
		</tr>
		<?php 
		foreach ($proxis as $key => $v) { 
				$p=explode(':', $v['ip']);
				if (count($p)==2){ $puerto=$p[1]; } else { continue;}
			?>
		<tr bgcolor="white">
			<td title="<?php echo $v['id']?> - <?php echo $v['ip']?>"><?php echo $key?></td>
			<td align="right"><?php echo $puerto?></td>
			<td align="center"><?php echo $v['uso']?></td>
			<td align="center" title="poner a cero esta ip"><a href="?modo=activar&id=<?php echo $v['id']?>&bd=<?php echo $bd?>"><?php echo $v['fallo']?></a></td>
			<td align="center" style="display:none"><?php echo $v['estado']?></td>
			<td align="center" style="display:none"></td>
			<td align="center" title="quitar esta ip"><a href="?modo=quitar&id=<?php echo $v['id']?>&bd=<?php echo $bd?>">Q</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<div style="overflow: auto; height: 300px; text-align: center">
	<form action="proxys.php" method="post" id="<?php echo $bd?>">
		<input type="hidden" name="modo" value="cargar">
		<input type="hidden" name="bd" value="<?php echo $bd?>">
		<input type="submit" name="enviar" value="cargarProxis">
		<textarea cols="20" rows="15" name="proxis" required></textarea>
	</form>
</div>
</td>
<?php } ?>
</tr>
</table>
</div>


