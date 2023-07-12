<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    die;
}
$estadio = obtenerDatosEstadio($id);
$localidades = obtenerLocalidades();

?>
<form onsubmit="guardarEstadio(event,$(this).serialize(),<?php echo $id?>)" method="post">
<div class="marco" style="background-color: lavender; padding:5px">
	<h1><?php echo $estadio['nombre']; ?></h1>		
	
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $estadio['nombre']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="inaguracion">Inauguración</label>
			<input type="text" name="inaguracion" id="inaguracion" value="<?php echo $estadio['inaguracion']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="capacidad">Capacidad</label>
			<input type="text" name="capacidad" id="capacidad" value="<?php echo $estadio['capacidad']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" id="direccion" value="<?php echo $estadio['direccion']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="localidad_id">Localidad</label>
			<select name="localidad_id" id="localidad_id">
			<?php foreach ($localidades as $localidad) {
    ?>
			<option <?php if ($estadio['localidad_id'] == $localidad['id']) {
        ?> selected <?php
    } ?> value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
			<?php
} ?>						
		</select>
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="longitud">Longitud</label>
			<input type="text" name="longitud" id="longitud" value="<?php echo $estadio['longitud']; ?>">
		</div>

		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="latitud">Latitud</label>
			<input type="text" name="latitud" id="latitud" value="<?php echo $estadio['latitud']; ?>">
		</div>
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		<input type="submit" name="guardar" id="guardar" value="Guardar">
	
</div>
</form>
<?php die; ?>
