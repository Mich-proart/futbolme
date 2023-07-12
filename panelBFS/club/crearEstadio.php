<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';
$localidades = obtenerLocalidades();
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!DOCTYPE html>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="ajaxclub.js"></script>
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" rel="stylesheet" />
	<title>Crear estadio nuevo</title>
</head>
<body>
<div>
<a href="/panel/inicio.php">Principal</a> - 
<a href="/panel/crear_calendario.php">CREAR CALENDARIO</a> - 
<a href="/panel/club/index.php">Agregar club</a> - 
<a href="/panel/lector_apuestas.php">Apuestas MARCA</a> - 
<a href="/panel/alpha/fichajes.php">Fichajes</a> - 
<a href="/panel/alpha/partidos.php">Partidos Liga</a> - 
<a href="/panel/alpha/partidos_torneo.php">Partidos Torneo</a> -
<a href="/panel/alpha/jornada_activa.php">Jornada Activa</a> -
</div>
	<h1>Nuevo estadio</h1>	
	<form action="nuevoEstadio.php" method="POST">
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="inaguracion">Inauguración</label>
			<input type="text" name="inaguracion" id="inaguracion" value="">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="capacidad">Capacidad</label>
			<input type="text" name="capacidad" id="capacidad" value="">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" id="direccion" value="">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="localidad_id">Localidad</label>
			<select name="localidad_id" id="localidad_id">
				<?php foreach ($localidades as $localidad) {
    ?>
				<option value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
				<?php
} ?>						
			</select>
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="longitud">Longitud</label>
			<input type="text" name="longitud" id="longitud" value="0">
		</div>

		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="latitud">Latitud</label>
			<input type="text" name="latitud" id="latitud" value="0">
		</div>
		<input type="submit" name="guardar" id="guardar" value="Guardar">
	</form>	
	<script>
		$('#localidad_id').select2();
	</script>
</body>
</html>