<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php';
require_once '../../includes/head.php';
require_once 'jscolor.php';?>
</head>
<?php 
$torneo_id = $_GET['torneo_id']??2;
$posicion = $_GET['posicion']??0;
$grupo = $_GET['grupo']??0;

$colores = listarColores();
$coloresTorneo = coloresTorneo($torneo_id, $grupo);

//imp($coloresTorneo);

if (count($coloresTorneo) > 0) {
    $nombreTorneo = $coloresTorneo[0]['torneo'];
} else {
    $nombreTorneo = 'Sin datos';
}
?>
<div style="width:100%; float:left">
	<div style="width:50%; float:left">
		<h2><?php echo $nombreTorneo; ?> - Posición: <?php echo $posicion; ?></h2>

			<div style="width:50%; float:left">
				<table width="300" bgcolor="gainsboro" cellpadding="1" cellspacing="1">
				<tr><td>Pos.</td><td>estilo</td><td>orden</td><td>id</td><td></td></tr>
				<?php
                foreach ($coloresTorneo as $fila) {
                    $css = 'background-color:'.$fila['color_fondo'].'; color:'.$fila['color_texto']; ?>
				<tr bgcolor="white"><td><?php echo $fila['posicion']; ?></td>
					<td style="<?php echo $css; ?>"><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['peso']; ?></td>
					<td><?php echo $fila['color_id']; ?></td>
					<td><a href="insertarPosicion.php?modo=q&torneo_id=<?php echo $torneo_id; ?>&posicion=<?php echo $fila['posicion']; ?>&grupo_id=<?php echo $grupo; ?>">Q</a></td>
				</tr>	
				<?php
                } ?>
				</table>
			</div>
			<div style="width:50%; float:left">
			<form method="post" action="insertarPosicion.php">
			<input type="hidden" name="torneo_id" value="<?php echo $torneo_id; ?>">
			<input type="hidden" name="grupo_id" value="<?php echo $grupo; ?>">
			<input type="hidden" name="posicion" value="<?php echo $posicion; ?>">
				Introduce el identificador del color: <input type="text" name="color_id" value="0" size="2">
				<input type="submit" name="grabar" value="insertar posicion <?php echo $posicion; ?>">
			</form>
			</div>

		<div style="clear:both"></div>

		<hr />
		<h2>Añadir colores</h2>

		<form method="post" action="nuevoColor.php">
		<input type="hidden" name="torneo_id" value="<?php echo $torneo_id; ?>">	
		Pulsa en el cuadro para elegir el color:<br />
			Fondo <input class="color" name="color_fondo" value="66ff00">
			Letra <select name="color_texto">
			<option value="black">Letra en negro</option>
			<option value="white">Letra en blanco</option>
			</select>
			Orden: <input type="text" name="peso" value="0" size="2">
			Texto: <input type="text" name="nombre" size="20">
			<input type="submit" name="grabar" value="grabar">

		</form>
		<br />
</div>

<div style="width:50%; float:left">
	<table width="400" bgcolor="gainsboro" cellpadding="1" cellspacing="1">
		<tr><td>Identificador</td><td>estilo</td><td>orden</td><td></td></tr>
		<?php	
	    foreach ($colores as $fila) {
	        $css = 'background-color:'.$fila['color_fondo'].'; color:'.$fila['color_texto']; ?>
		<tr bgcolor="white"><td align="center">
		<b><?php echo $fila['id']; ?></b>
		</td>
			<td style="<?php echo $css; ?>"><?php echo $fila['nombre']; ?></td>
			<td><?php echo $fila['peso']; ?></td>
			<td>
			<?php if (0 == $fila['usado']) {
	            ?>
		<a href="nuevoColor.php?modo=q&id=<?php echo $fila['id']; ?>">Q</a>
		<?php
	        } ?>
		(<?php echo $fila['usado']; ?>)
			</td>
		</tr>	
		<?php
	    } ?> 
	</table>

</div>

</div>

</body>
</html>

