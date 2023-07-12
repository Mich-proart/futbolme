<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<title>Crear equipación</title>
</head>
<body>
<div>
<a href="/panel/inicio.php">Principal</a> - 
</div>
	<form action="nuevaEquipacion.php" method="POST">
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="camiseta">Camiseta</label>
			<input type="text" name="camiseta" id="camiseta" value="">
		</div>		
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="pantalon">Pantalón</label>
			<input type="text" name="pantalon" id="pantalon" value="">
		</div>
		<div style="width:32%; display:inline-block; vertical-align:top;">
			<label for="media">Media</label>
			<input type="text" name="media" id="media" value="">
		</div>
		<input type="submit" name="guardar" id="guardar" value="Guardar">
	</form>	
</body>
</html>