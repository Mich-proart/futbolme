<?php
define('_PANEL_', 1);
require_once 'includes/config.php';
require_once 'includes/head.php'; ?>
</head>
<body>
	<?php
    $link = conectar();

    if (isset($_GET['modo']) && 'insertar_medio' == $_GET['modo']) {
        $consulta = "INSERT INTO medio (nombre, orden, slug, tipo_medio, id_original) 
		VALUES ('".$_GET['medio']."',0,'".$_GET['medio']."',1,0)";
        $consulta = mysqli_query($link, $consulta);
    }

    if (isset($_GET['modo']) && 'modificar_medio' == $_GET['modo']) {
        $consulta = "UPDATE medio SET nombre='".$_GET['medio']."' WHERE id=".$_GET['id_medio'];
        $consulta = mysqli_query($link, $consulta);
    }

    $sql = 'SELECT id,nombre FROM medio ORDER BY nombre';
    $resultado = mysqli_query($link, $sql);

    ?>
	<table width='800' border='0' cellpadding='10' cellspacing='1' bgcolor='orange'>
		<tr>
			<td>ID</td><td>Nombre</td>
			<td>
				<form method='get' action='medios.php'>
					<input type='hidden' name='modo' value='insertar_medio'>					
					<input type="text" name="medio" size="20">
					<input type="submit" name="enviar" value="Insertar medio">
				</form>
			</td>
		</tr>
		<?php while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
			<tr bgcolor="white">
				<td align="right"><?php echo $fila['id']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td>

				<form method='get' action='medios.php' id="form<?php echo $fila['id']; ?>">
					<input type='hidden' name='modo' value='modificar_medio'>
					<input type='hidden' name='id_medio' value='<?php echo $fila['id']; ?>'>					
					<input type="text" name="medio" value="<?php echo $fila['nombre']; ?>">
					<input type="submit" name="modificar" value="modificar">
				</form>
					

				</td>
			</tr>

		<?php
    }?>

	</table>
	
</body>
</html>

