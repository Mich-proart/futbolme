

<div style="width: 100%; float: left; display:none" id="gesProxis">
<?php
$colorFondo='white';
$sql='SELECT sum(uso) usos,sum(fallo) fallos FROM '.$bd;
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT count(id) virgen FROM '.$bd.' WHERE uso=0 AND fallo=0';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$r1 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT count(id) malos FROM '.$bd.' WHERE uso<10 AND fallo>5';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$r2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT count(id) total FROM '.$bd;
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$r3 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT id,ip,uso,fallo,estado, mantener, proveedor FROM '.$bd.' ORDER BY uso DESC, fallo';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
<div style="width: 100%; float: left; background-color: #F5E17A; padding: 10px">
- <a href="http://free-proxy.cz/es/" target="_blank">free-proxy</a>
- <a href="https://www.proxy-list.download/es/HTTPS" target="_blank">proxy-list</a>
- <a href="federacion/funciones/gestionProxis.php" target="_blank">Gestión global de proxis</a>
- <a href="?modo=borrarTodos&bd=<?php echo $bd?>&comunidad_id=<?php echo $comunidad_id?>">Borrar todos</a> (<?php echo $bd?>)
Total : <?php echo $r3[0]['total']?>
 - <span style="color:green">OK: <?php echo $r[0]['usos']?></span> 
 - <span style="color:red">KO: <?php echo $r[0]['fallos']?></span>
 - Virgenes: <?php echo $r1[0]['virgen']?> - <a href="?modo=poneracero&bd=<?php echo $bd?>&comunidad_id=<?php echo $comunidad_id?>">Poner a cero</a>
 - Malos: <?php echo $r2[0]['malos']?> - <a href="?modo=quitarMalos&bd=<?php echo $bd?>&comunidad_id=<?php echo $comunidad_id?>">Quitar malos</a>
</div>
<table><tr>


 <td valign="top" bgcolor="<?php echo $colorFondo?>" align="center" width="50%">

<div style="overflow: auto; height:400px; width: 500px">	
	<table border="1" width="100%">
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
			<td align="right"><?php echo $v['ip']?></td>
			<td align="center"><?php echo $v['uso']?></td>
			<td align="center" title="poner a cero esta ip"><a href="?modo=activar&id=<?php echo $v['id']?>&bd=<?php echo $bd?>"><?php echo $v['fallo']?></a></td>
			<td align="center" style="display:none"><?php echo $v['estado']?></td>
			<td align="center" style="display:none"></td>
			<td align="center" title="quitar esta ip"><a href="?modo=quitar&id=<?php echo $v['id']?>&bd=<?php echo $bd?>&comunidad_id=<?php echo $comunidad_id?>">Q</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
	</td>
	<td width="50%">
	<form action="index.php" method="post" id="<?php echo $bd?>">
		<input type="hidden" name="modo" value="cargar">
		<input type="hidden" name="bd" value="<?php echo $bd?>">
		<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
		<textarea cols="50" rows="15" name="proxis" required></textarea><br />
		<select name="proveedor">
			<option value="hidemyna">hidemyna</option>
			<option value="free-proxy">free-proxy</option>
			<option value="proxy-list">proxy-list</option>
		</select><br />
		<input type="submit" name="enviar" value="cargarProxis">
	</form>

</td>
</tr>
</table>
</div>
