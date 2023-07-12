<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location:/');
}
$equipacion = obtenerDatosEquipacion($id);
$imagen = __DIR__.'/../../img/equipaciones/equipacion'.$id.'.jpg';

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!DOCTYPE html>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<title>Editar equipacion</title>
</head>
<body>
<div>
<a href="/panelBack/index.php">Principal</a> - 
</div>
	<form action="guardarEquipacion.php" method="POST">
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="camiseta">Camiseta</label>
			<input type="text" name="camiseta" id="camiseta" value="<?php echo $equipacion['camiseta']; ?>">
		</div>		
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="pantalon">Pantalón</label>
			<input type="text" name="pantalon" id="pantalon" value="<?php echo $equipacion['pantalon']; ?>">
		</div>
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="media">Media</label>
			<input type="text" name="media" id="media" value="<?php echo $equipacion['media']; ?>">
		</div>
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		<input type="submit" name="guardar" id="guardar" value="Guardar">
	</form>
	<div style="width:49%; display:inline-block; vertical-align:top;">
		<?php if (file_exists($imagen)) {
    ?>
		<img src="/img/equipaciones/equipacion<?php echo $id; ?>.jpg">
		<a href="deleteFile.php?ruta=<?php echo $imagen; ?>">Eliminar</a>
		<?php
} else {
        ?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		    Subir imagen:
		    <input type="file" name="imagen" id="imagen">
		    <input type="hidden" name="destino" id="destino" value="\img\equipaciones\">
		    <input type="hidden" name="nombre" id="nombre" value="equipacion<?php echo $id; ?>.png">
		    <input type="submit" value="Subir imagen" name="submit">
		</form>
		<?php
    } ?>
	</div>	
</body>
</html>