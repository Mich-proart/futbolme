<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:index.php');
}
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

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!DOCTYPE html>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
	<script src="ajaxclub.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" rel="stylesheet" />
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<title>Editar club <?php echo $club['nombre']; ?></title>
</head>
<body>
<div>
<a href="/panelBack/index.php">Principal</a> - 
</div>
	<div style="width:29%; display:inline-block; vertical-align:top; background-color:gainsboro">
	<p>Id club: <?php echo $club['id']; ?> 
	<?php if (isset($urlClub)){ ?>
		- <a href="<?php echo $urlClub.$futbolbase_id?>" target="blank">Ver en federación</a>
	<?php } ?>
	

</p>
		<h1><?php echo $club['nombre']; ?> - CLUB</h1>		
		<form action="guardarClub.php" method="POST">
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="nombre">Nombre</label>
				<input type="text"  size="50" name="nombre" id="nombre" value="<?php echo $club['nombre']; ?>">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="nombre_completo">Nombre Completo</label>
				<input type="text"  size="50" name="nombre_completo" id="nombre_completo" value="<?php echo $club['nombre_completo']; ?>">
			</div>
			<div style="width:49%; display:inline-block; vertical-align:top;">
				<label for="localidad_id">Localidad</label>
				<select name="localidad_id" id="localidad_id">
					<?php foreach ($localidades as $localidad) {
    ?>
					<option <?php if ($club['localidad_id'] == $localidad['id']) {
        ?> selected <?php
    } ?> value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
					<?php
} ?>
				</select>
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="presidente">Presidente</label>
				<input type="text"  size="50" name="presidente" id="presidente" value="<?php echo $club['presidente']; ?>">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="patrocinador">Patrocinador</label>
				<input type="text"  size="50" name="patrocinador" id="patrocinador" value="<?php echo $club['patrocinador']; ?>">
			</div>
			<div style="width:50%; display:inline-block; vertical-align:top;">
				<label for="socios">Socios</label>
				<input type="text"  size="5" name="socios" id="socios" value="<?php echo $club['socios']; ?>">
			</div>
			<div style="width:50%; display:inline-block; vertical-align:top;">
				<label for="presupuesto">Presupuesto</label>
				<input type="text" size="5" name="presupuesto" id="presupuesto" value="<?php echo $club['presupuesto']; ?>">
			</div>
			<div style="width:50%; display:none; vertical-align:top;">
				<label for="origen_id">Id origen</label>
				<input type="text" size="5" name="origen_id" id="origen_id" value="<?php echo $club['origen_id']; ?>">
			</div>	
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="web">Web</label>
				<input type="text" size="50" name="web" id="web" value="<?php echo $club['web']; ?>">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="email">Email</label>
				<input type="text" size="50" name="email" id="email" value="<?php echo $club['email']; ?>">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="contacto">Contacto</label>
				<input type="text" name="contacto" id="contacto" value="<?php echo $club['contacto']; ?>">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" id="telefono" value="<?php echo $club['telefono']; ?>" size="40">
			</div>
			<div style="width:100%; display:inline-block; vertical-align:top;">
				<label for="observaciones">Otros datos de interés</label><br />
				<?php echo trim($club['observaciones'])?>
				<textarea name="observaciones" id="observaciones" cols="50" rows="5" style="display:none">
				 <?php echo trim($club['observaciones'])?></textarea>
				
			</div>
					
			<div style="width:49%; display:inline-block; vertical-align:top;">
				<label for="fundado">Fundado en</label>
				<input type="text" name="fundado" id="fundado" value="<?php echo $club['fundado']; ?>">
			</div>			
			<div style="width:49%; display:inline-block; vertical-align:top;">
				<label for="desaparecido">Desaparecido en</label>
				<input type="text" name="desaparecido" id="desaparecido" value="<?php echo $club['desaparecido']; ?>">
			</div>			
			<div style="width:49%; display:inline-block; vertical-align:top;">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" value="<?php echo $club['direccion']; ?>">
			</div>			
			<div style="width:31%; display:inline-block; vertical-align:top;">
				<label for="es_seleccion">¿Es selección?</label>
				<select name="es_seleccion" id="es_seleccion">
					<option value="0" <?php if (0 == $club['es_seleccion']) {
        ?> selected <?php
    } ?>>No</option>
					<option value="1" <?php if (1 == $club['es_seleccion']) {
        ?> selected <?php
    } ?>>Si</option>
				</select>
			</div>
			<div style="width:31%; display:inline-block; vertical-align:top;">
				<label for="direccion">Código RFEF</label>
				<input type="text" name="codigoRFEF" id="codigoRFEF" value="<?php echo $club['codigoRFEF']; ?>" size="5">
			</div>
			<div style="width:31%; display:inline-block; vertical-align:top;">
				<label for="direccion">Territorial RFEF</label>
				<input type="text" name="territorialRFEF" id="territorialRFEF" value="<?php echo $club['territorialRFEF']; ?>" size="2">
			</div>
			<div style="width:100%; display:inline-block; text-align:center;">
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
			<?php echo 'Regional '.$club['territorialRFEF']; ?> -- <input type="submit" name="guardar" id="guardar" value="Guardar">
			</div>

		</form>

		
		
	</div>
	<div style="width:69%; display:inline-block; vertical-align:top;">

		Equipos: <select id="select_equipos" onchange="cargar_equipo($(this).val())">
			<option value="-1">Equipos:</option>
			<?php foreach ($equipos as $equipo) {
        ?>
			<option value="<?php echo $equipo['id']; ?>"><?php echo $equipo['nombre']; ?> - <?php echo $equipo['categoria_nombre']; ?> - <?php echo $equipo['codigoRFEF']; ?></option>
			<?php
    } ?>
		</select>

		<table border="0" cellspacing="2" cellpadding="3" bgcolor="dimgray">
		<?php foreach ($equipos as $equipo) {
        ?>
		<tr bgcolor="white"><td><?php echo $equipo['id']; ?></td>
		<td><?php echo $equipo['categoria_nombre']; ?> (<?php echo $equipo['categoria_id']; ?>)</td>
		<td><?php echo $equipo['nombre']; ?> (<?php echo $equipo['numcaracteres']; ?>)</td>
		<form action="codigoRFEF.php" method="POST" id="eq<?php echo $equipo['id']; ?>">
		<input type="hidden" name="club_id" value="<?php echo $id; ?>">
		<input type="hidden" name="equipo_id" value="<?php echo $equipo['id']; ?>">
		<td><input type="text" name="codigoRFEF" value="<?php echo $equipo['codigoRFEF']; ?>" size="3" maxlength="3"></td>
		<td><input type="text" name="nombreCorto" value="<?php echo $equipo['nombreCorto']; ?>" size="20" maxlength="20"></td>
		<td>
			<?php echo $club['territorialRFEF']; ?>-<?php echo $club['codigoRFEF']; ?>-<?php echo $equipo['codigoRFEF']; ?>

		</td>
		<td><input type="submit" name="modificar" value="modificar"></td>
		</form>
		</tr>
		<?php
    } ?>
		</table>
		<div id="equipo">
			<form action="nuevoEquipo.php" method="POST">
				<h2>Nuevo equipo</h2>
				<div style="width:49%; display:inline-block; vertical-align:top;">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre">
				</div>
				<div style="width:49%; display:inline-block; vertical-align:top;">
					<label for="nombre_completo">Nombre Completo</label>
					<input type="text" name="nombre_completo" id="nombre_completo">
				</div>
				<div style="width:49%; display:inline-block; vertical-align:top;">
					<label for="categoria_id">Categoria</label>
					<select name="categoria_id" id="categoria_id">
						<option value="1">Senior Masculino</option>
						<option value="3">Juvenil Mas.</option>
						<option value="4">Cadete Mas.</option>
						<option value="21">Infantil Mas.</option>
						<option value="23">Alevin Mas.</option>
						<option value="24">Benjamín Mas.</option>
						<option value="25">Prebenjamin Mas.</option>
						<option value="29">Debutante Mas.</option>
						<option value="2">Senior Femenino</option>
						<option value="26">Juvenil Femenino</option>
						<option value="27">Cadete Femenino</option>
						<option value="28">Infantil Femenino</option>
						<option value="30">Alevín Femenino</option>
						
					</select>
				</div>
						
				<input type="hidden" name="club_id" id="club_id" value="<?php echo $id; ?>">
				<input type="submit" name="crear" id="crear" value="Crear">
			</form>
		</div>
	</div>
	<script>
		$('#localidad_id').select2();
	</script>
</body>
</html>