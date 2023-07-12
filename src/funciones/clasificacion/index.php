<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

if (isset($_GET['torneo_id'])) {
    $torneo_id = $_GET['torneo_id'];
} else {
    $torneo_id = 2;
}
if (isset($_GET['posicion'])) {
    $posicion = $_GET['posicion'];
} else {
    $posicion = 0;
}
if (isset($_GET['grupo'])) {
    $grupo = $_GET['grupo'];
} else {
    $grupo = 0;
}

$colores = listarColores();
$coloresTorneo = coloresTorneo($torneo_id, $grupo);

if (count($coloresTorneo) > 0) {
    $nombreTorneo = $coloresTorneo[0]['torneo'];
} else {
    $nombreTorneo = 'Sin datos';
}
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jscolor.js"></script>
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<title>Editar colores</title>
</head>
<body>

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

			<table width="300" bgcolor="gainsboro" cellpadding="1" cellspacing="1">
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
