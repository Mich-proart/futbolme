<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 

$localidades = obtenerLocalidades();
?>
<form onsubmit="nuevoEstadio(event,$(this).serialize())" method="post" id="nuevoEstadio">
<div class="marco" style="background-color: lavender; padding:5px">
	<h1>Nuevo estadio</h1>	
	
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="" form="nuevoEstadio">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="inaguracion">Inauguración</label>
			<input type="text" name="inaguracion" id="inaguracion" value="0" form="nuevoEstadio">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="capacidad">Capacidad</label>
			<input type="text" name="capacidad" id="capacidad" value="0" form="nuevoEstadio">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" id="direccion" value="" form="nuevoEstadio">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="localidad_id">Localidad</label>
			<select name="localidad_id" id="localidad_id" form="nuevoEstadio">
				<?php foreach ($localidades as $localidad) {
    ?>
				<option value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
				<?php
} ?>						
			</select>
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="longitud">Longitud</label>
			<input type="text" name="longitud" id="longitud" value="0" form="nuevoEstadio">
		</div>

		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="latitud">Latitud</label>
			<input type="text" name="latitud" id="latitud" value="0" form="nuevoEstadio">
		</div>
		<input type="submit" name="guardar" id="guardar" value="Guardar" form="nuevoEstadio">
	</form>	
	