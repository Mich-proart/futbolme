<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas


$id = $_POST['id']??0;
if ($id==0){ echo 'Ningún club seleccionado'; die; }

$datosClub = obtenerDatosClub($id);
$club = $datosClub['club'];
$equipos = $datosClub['equipos'];
$equipaciones = obtenerEquipaciones();
if (isset($club['localidad_id'])){
$estadios = obtenerEstadios($club['localidad_id']);
} else { $estadios=array(); }
$localidades = obtenerLocalidades();

$futbolbase_id=$club['futbolbase_id'];
$comunidad_id=($club['comunidad_id']-1);
require_once '../federacion/funciones/urlFederaciones.php';
?>


	<table class="table">
		<tr bgcolor="lavender"><td valign="top" width="30%">
	<p>Id club: <?php echo $club['id']; ?> 
	<?php if (isset($urlClub)){ ?>
		- <a href="<?php echo $urlClub.$futbolbase_id?>" target="blank">Ver en federación</a>
	<?php } ?>
	

</p>
		<h1><?php echo $club['nombre']; ?> - CLUB</h1>
		 		
		<form onsubmit="guardarClub(event, $(this).serialize(),<?php echo $id?>)" method="POST">
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="origen_id" id="origen_id" value="<?php echo $club['origen_id']; ?>">
Nombre: <input type="text"  size="30" name="nombre" id="nombre" value="<?php echo $club['nombre']; ?>">

		 <br />
Completo: <input type="text"  size="50" name="nombre_completo" id="nombre_completo" value="<?php echo $club['nombre_completo']; ?>"><br />
Localidad: <select name="localidad_id" id="localidad_id">
	<?php foreach ($localidades as $localidad) { ?>
	<option <?php if ($club['localidad_id'] == $localidad['id']) { ?> selected <?php } ?> value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
	<?php } ?>
		 </select>
<br />
Presidente: <input type="text"  size="25" name="presidente" id="presidente" value="<?php echo $club['presidente']; ?>"> - Socios: <input type="text"  size="5" name="socios" id="socios" value="<?php echo $club['socios']; ?>">
<br />
Patrocinador: <input type="text"  size="25" name="patrocinador" id="patrocinador" value="<?php echo $club['patrocinador']; ?>"> - Presupuesto: <input type="text" size="5" name="presupuesto" id="presupuesto" value="<?php echo $club['presupuesto']; ?>"><br />

<br />
Web: <input type="text" size="25" name="web" id="web" value="<?php echo $club['web']; ?>"> - 
Contacto: <input type="text" name="contacto" id="contacto" value="<?php echo $club['contacto']; ?>"><br />
Email: <input type="text" size="25" name="email" id="email" value="<?php echo $club['email']; ?>"> - 
Teléfono: <input type="text" name="telefono" id="telefono" value="<?php echo $club['telefono']; ?>" size="10"><br />
<br />
<br />
Otros datos de interés<br />
				<textarea name="observaciones" id="observaciones" cols="50" rows="3">
				<?php echo trim($club['observaciones'])?></textarea>
<br />Fundado en<: <input type="text" name="fundado" id="fundado" value="<?php echo $club['fundado']; ?>" size="4">
- Desaparecido en: <input type="text" name="desaparecido" id="desaparecido" value="<?php echo $club['desaparecido']; ?>" size="4"><br />
Dirección: <input type="text" name="direccion" id="direccion" value="<?php echo $club['direccion']; ?>">
- ¿Es selección?</label>
	<select name="es_seleccion" id="es_seleccion">
		<option value="0" <?php if (0 == $club['es_seleccion']) {?> selected <?php } ?>>No</option>
		<option value="1" <?php if (1 == $club['es_seleccion']) {?> selected <?php } ?>>Si</option>
	</select><br />
Código RFEF: <input type="text" name="codigoRFEF" id="codigoRFEF" value="<?php echo $club['codigoRFEF']; ?>" size="5"> - Territorial RFEF:	<input type="text" name="territorialRFEF" id="territorialRFEF" value="<?php echo $club['territorialRFEF']; ?>" size="2"> <input type="submit" name="guardar" id="guardar" value="Guardar" class="text-center">
</form>

		
		
	</td>
	<td valign="top" bgcolor="white" width="60%">

		
		<table border="0" cellspacing="2" cellpadding="3" bgcolor="dimgray">
		<?php foreach ($equipos as $equipo) {
			if ($equipo['categoria_id']==4 || $equipo['categoria_id']>13){ continue; }
        ?>
		<tr bgcolor="white">
			<td>
			<span style="cursor: pointer;" class="boldfont" onclick="verEquipo(<?php echo $equipo['id']; ?>)"><?php echo $equipo['id']; ?></span>
			</td>
		<td><?php echo $equipo['categoria_nombre']; ?> (<?php echo $equipo['categoria_id']; ?>)</td>
		<td><?php echo $equipo['nombre']; ?> (<?php echo $equipo['numcaracteres']; ?>)</td>
		<td>
		<form onsubmit="codigoRfef(event, $(this).serialize(),<?php echo $id?>)" id="eq<?php echo $equipo['id']?>">
		<input type="hidden" name="club_id" value="<?php echo $id?>">
		<input type="hidden" name="equipo_id" value="<?php echo $equipo['id']?>">
		<input type="text" name="codigoRFEF" value="<?php echo $equipo['codigoRFEF']?>" size="3" maxlength="3">
		<input type="text" name="nombreCorto" value="<?php echo $equipo['nombreCorto']?>" size="20" maxlength="20">
		<input type="submit" name="modificar" value="modificar">
		</form>
		</td>		
		</tr>
		<?php
    } ?>
		</table>

		<div id="equipo-id"></div>

			<form onsubmit="crearEquipo(event, $(this).serialize(),<?php echo $id?>)">
				<h2>Nuevo equipo</h2>
					Nombre: <input type="text" name="nombre" id="nombre">
					- Categoria
					<select name="categoria_id" id="categoria_id">
						<option value="1">Senior Masculino</option>
						<option value="3">Juvenil Mas.</option>
						<option value="2">Senior Femenino</option>
					</select>
				<br />
					Nombre completo: <input type="text" name="nombre_completo" id="nombre_completo">
				<input type="hidden" name="club_id" id="club_id" value="<?php echo $id; ?>">
				<input type="submit" name="crear" id="crear" value="Nuevo equipo">
			</form>
		
	</td></tr></table>
	
</div>

<?php /*
<option value="4">Cadete Mas.</option>
<option value="21">Infantil Mas.</option>
<option value="23">Alevin Mas.</option>
<option value="24">Benjamín Mas.</option>
<option value="25">Prebenjamin Mas.</option>
<option value="29">Debutante Mas.</option>
<option value="26">Juvenil Femenino</option>
<option value="27">Cadete Femenino</option>
<option value="28">Infantil Femenino</option>
<option value="30">Alevín Femenino</option>

<option value="4" <?php if (4 == $equipo['categoria_id']) { ?> selected <?php } ?>>Cadete</option>
<option value="21" <?php if (21 == $equipo['categoria_id']) { ?> selected <?php } ?>>Infantil</option>
<option value="23" <?php if (23 == $equipo['categoria_id']) { ?> selected <?php } ?>>Alevin</option>
<option value="24" <?php if (24 == $equipo['categoria_id']) { ?> selected <?php } ?>>Benjamín</option>
<option value="25" <?php if (25 == $equipo['categoria_id']) { ?> selected <?php } ?>>Prebenjamin</option>
<option value="29" <?php if (29 == $equipo['categoria_id']) { ?> selected <?php } ?>>Debutante</option>
<option value="26" <?php if (26 == $equipo['categoria_id']) { ?> selected <?php } ?>>Juvenil Femenino</option>
<option value="27" <?php if (27 == $equipo['categoria_id']) { ?> selected <?php } ?>>Cadete Femenino</option>
<option value="28" <?php if (28 == $equipo['categoria_id']) { ?> selected <?php } ?>>Infantil Femenino</option>
<option value="30" <?php if (30 == $equipo['categoria_id']) { ?> selected <?php } ?>>Alevín Femenino</option>
*/