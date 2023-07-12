<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:index.php');
}
$equipo = obtenerDatosEquipo($id);
$equipaciones = obtenerEquipaciones();
if (isset($equipo['localidad_id'])){
$estadios = obtenerEstadios($equipo['localidad_id']);
} else { $estadios=array(); }
$jugadores = obtenerJugadores($id);
$temporadas = obtenerTemporada($id);
//$escudo = dirname(__FILE__) . "\..\..\img\\equipos\\escudo" . $id . ".png";
//$plantilla = dirname(__FILE__) . "\..\..\img\\equipos\\plantilla" . $id . ".png";
$escudo = $_SERVER['DOCUMENT_ROOT'].'/img/equipos/escudo'.$id.'.png';
$plantilla = $_SERVER['DOCUMENT_ROOT'].'/img/equipos/plantilla'.$id.'.png';

?>
<h2>id Equipo: <?php echo $id; ?></h2> <a href="/equipo.php?id=<?php echo $id; ?>" target="blank">Ver en futbolme</a>
<?php echo '/img/equipos/escudo'.$id.'.png'; ?><br />
<?php if (file_exists($escudo)) {
    ?>

<img src="/img/equipos/escudo<?php echo $id; ?>.png" alt="escudo"><br />

<a href="deleteFile.php?ruta=<?php echo $escudo; ?>">Eliminar</a>
<?php
} else {
        ?>
<div style="display:none">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Subir escudo:
    <input type="file" name="imagen" id="imagen">
    <input type="hidden" name="destino" id="destino" value="\img\equipos\">
    <input type="hidden" name="nombre" id="nombre" value="escudo<?php echo $id; ?>.png">
    <input type="submit" value="Subir imagen" name="submit">
    <br />No hay que poner nombre, selecciona el fichero de tu ordenador y ya esta.
</form>
</div>
<?php
    } ?>
<form action="guardarEquipo.php" method="POST">
	<h2><?php echo $equipo['nombre']; ?></h2>
	<div style="width:20%; display:inline-block; vertical-align:top">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $equipo['nombre']; ?>">
	</div>
	<div style="width:50%; display:inline-block; vertical-align:top">
		<label for="nombre_completo">Nombre Completo</label>
		<input type="text" size="50" name="nombre_completo" id="nombre_completo" value="<?php echo $equipo['nombre_completo']; ?>">
	</div>
	<div style="width:20%; display:inline-block; vertical-align:top">
		<label for="nombre">Twitter</label>
		<input type="text" name="slug" id="slug" value="<?php echo $equipo['slug']; ?>">
	</div>
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="categoria_id">Categoria</label>
		<select name="categoria_id" id="categoria_id">
			<option value="1" <?php if (1 == $equipo['categoria_id']) { ?> selected <?php } ?>>Senior Masculino</option>
			
			<option value="3" <?php if (3 == $equipo['categoria_id']) { ?> selected <?php } ?>>Juvenil</option>
			<option value="4" <?php if (4 == $equipo['categoria_id']) { ?> selected <?php } ?>>Cadete</option>
			<option value="21" <?php if (21 == $equipo['categoria_id']) { ?> selected <?php } ?>>Infantil</option>
			<option value="23" <?php if (23 == $equipo['categoria_id']) { ?> selected <?php } ?>>Alevin</option>
			<option value="24" <?php if (24 == $equipo['categoria_id']) { ?> selected <?php } ?>>Benjamín</option>
			<option value="25" <?php if (25 == $equipo['categoria_id']) { ?> selected <?php } ?>>Prebenjamin</option>
			<option value="29" <?php if (29 == $equipo['categoria_id']) { ?> selected <?php } ?>>Debutante</option>
			<option value="2" <?php if (2 == $equipo['categoria_id']) { ?> selected <?php } ?>>Senior Femenino</option>
			<option value="26" <?php if (26 == $equipo['categoria_id']) { ?> selected <?php } ?>>Juvenil Femenino</option>
			<option value="27" <?php if (27 == $equipo['categoria_id']) { ?> selected <?php } ?>>Cadete Femenino</option>
			<option value="28" <?php if (28 == $equipo['categoria_id']) { ?> selected <?php } ?>>Infantil Femenino</option>
			<option value="30" <?php if (30 == $equipo['categoria_id']) { ?> selected <?php } ?>>Alevín Femenino</option>


			<option value="5" <?php if (5 == $equipo['categoria_id']) { ?> selected <?php } ?>>Absoluta Mas.</option>
			<option value="19" <?php if (19 == $equipo['categoria_id']) { ?> selected <?php } ?>>Olimpica Mas.</option>
			<option value="7" <?php if (7 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 21 Mas.</option>
			<option value="8" <?php if (8 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 20 Mas.</option>
			<option value="9" <?php if (9 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 19 Mas.</option>
			<option value="10" <?php if (10 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 17 Mas.</option>
			<option value="6" <?php if (6 == $equipo['categoria_id']) { ?> selected <?php } ?>>Absoluta Fem.</option>
			<option value="20" <?php if (20 == $equipo['categoria_id']) { ?> selected <?php } ?>>Olimpica Fem.</option>
			<option value="11" <?php if (11 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 20 Fem.</option>
			<option value="12" <?php if (12 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 19 Fem.</option>
			<option value="13" <?php if (13 == $equipo['categoria_id']) { ?> selected <?php } ?>>SUB 17 Fem.</option>

</select>
	</div>	
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="fundado">Fundado</label>
		<input type="text" name="fundado" id="fundado" value="<?php echo $equipo['fundado']; ?>">
	</div>			
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="desaparecido">Desaparecido</label>
		<input type="text" name="desaparecido" id="desaparecido" value="<?php echo $equipo['desaparecido']; ?>">
	</div>
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="debut_nacional">Debut en nacional</label>
		<input type="text" name="debut_nacional" id="debut_nacional" value="<?php echo $equipo['debut_nacional']; ?>">
	</div>
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="estadio_id">Estadio</label>
		<select name="estadio_id" id="estadio_id">
			<option value="(NULL)">Sin estadio</option>
			<?php foreach ($estadios as $estadio) {
        ?>
			<option <?php if ($equipo['estadio_id'] == $estadio['id']) {
            ?> selected <?php
        } ?> value="<?php echo $estadio['id']; ?>"><?php echo $estadio['nombre']; ?> - <?php echo $estadio['localidad_nombre']; ?></option>
			<?php
    } ?>						
		</select>
		<?php 
        $img_estadio = '/img/estadios/estadi'.$equipo['estadio_id'].'.png';

        if ($equipo['estadio_id'] > 0) {
            ?>
		<a id="enlace-estadio" href="/panelBack/club/estadio.php?id=<?php echo $equipo['estadio_id']; ?>">Editar estadio</a>
		<?php
        } else {
            ?>
		<a id="enlace-estadio" href="/panelBack/club/crearEstadio.php">Nuevo estadio</a>
		<?php
        } ?>
		<img id="imagen-estadio" src="<?php echo $img_estadio; ?>" alt="campo de futbol">
		<br />Fichero: <b><?php echo $img_estadio; ?></b>
	</div>
	<div style="width:49%; display:inline-block; vertical-align:top">
		<label for="equipacion_id">Equipación</label>
		<select name="equipacion_id" id="equipacion_id" style="width:55%;">
			<option value="(NULL)">Sin equipación</option>
			<?php foreach ($equipaciones as $equipacion) {
            ?>
			<option <?php if ($equipo['equipacion_id'] == $equipacion['id']) {
                ?> selected <?php
            } ?> value="<?php echo $equipacion['id']; ?>"><?php echo $equipacion['camiseta']; ?> - <?php echo $equipacion['pantalon']; ?> - <?php echo $equipacion['media']; ?></option>
			<?php
        } ?>						
		</select>
		<?php if ($equipo['equipacion_id'] > 0) {
            ?>
		<a id="enlace-equipacion" href="/panelBack/club/equipacion.php?id=<?php echo $equipo['equipacion_id']; ?>">Editar equipacion</a>
		<?php
        } else {
            ?>
		<a id="enlace-equipacion" href="/panelBack/club/crearEquipacion.php">Nueva equipacion</a>
		<?php
        }
        $img_equipacion = '/img/equipaciones/eq'.$equipo['equipacion_id'].'.png';
        ?>
		<img id="imagen-equipacion" src="<?php echo $img_equipacion; ?>">
		<br /><br />Fichero: <b><?php echo $img_equipacion; ?></b>
	</div>
	<input type="hidden" name="escudo" id="escudo" value="<?php echo $equipo['escudo']; ?>">
	<input type="hidden" name="sexo" id="sexo" value="<?php echo $equipo['sexo']; ?>">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="guardar" id="guardar" value="Guardar">
	</div>
</form>
<div style="width:49%; display:inline-block; vertical-align:top">
	<h3>Foto de plantilla</h3>
	<?php echo '/img/equipos/plantilla'.$id.'.png'; ?><br />
	<?php if (file_exists($plantilla)) {
            ?>
	<img src="/img/equipos/plantilla<?php echo $id; ?>.png">
	<a href="deleteFile.php?ruta=<?php echo $plantilla; ?>">Eliminar</a>
	<?php
        } else {
            ?>
	<div style="display:none">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Subir plantilla:
	    <input type="file" name="imagen" id="imagen">
	    <input type="hidden" name="destino" id="destino" value="\img\equipos\">
	    <input type="hidden" name="nombre" id="nombre" value="plantilla<?php echo $id; ?>.png">
	    <input type="submit" value="Subir imagen" name="submit">
	     <br />No hay que poner nombre, selecciona el fichero de tu ordenador y ya esta.
	</form>
	</div>
	<?php
        } ?>
</div>
<?php if (count($temporadas) > 0) {
            ?>
<div style="width:49%; display:inline-block; vertical-align:top">
<h3>Temporadas</h3>
<ul>
	<?php 
    $temporada_id = 0;
            foreach ($temporadas as $temporada) {
                if ('1' === $temporada['tipo_torneo']) {
                    $temporada_id = $temporada['temporada_id'];
                } ?>
	<li><?php echo $temporada['nombre']; ?></li>
	<?php
            } ?>	
</ul>
</div>
<?php
        } ?>

<?php if (count($jugadores) > 0) {
            ?>
<div style="width:49%; display:inline-block; vertical-align:top">
<h3>Plantilla</h3>
<a href="/panel/alpha/fichajes.php?temporada_id=<?php echo $temporada_id; ?>&equipo_id=<?php echo $id; ?>">Editar Plantilla</a>
<table>
	<thead>
		<tr>
			<th colspan="2">jugador</th>
			<th>posición</th>
			<th>¿Es baja?</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($jugadores as $jugador) {
                ?>
		<tr>
			<td><img src="/img/jugadores/jugador<?php echo $jugador['id']; ?>.jpg" width="50" alt="jugador"></td>
			<td><?php echo $jugador['nombre']; ?> <?php echo $jugador['apellidos']; ?></td>
			<td><?php switch ($jugador['posicion']) {
                case '1':
                    echo 'POR';
                    break;

                case '2':
                    echo 'DEF';
                    break;

                case '3':
                    echo 'MED';
                    break;

                case '4':
                    echo 'DEL';
                    break;

                case '5':
                    echo 'ENT';
                    break;

                default:
                    echo 'SD';
                    break;
            } ?></td>
			<td><?php echo (1 == $jugador['es_baja']) ? 'Si' : 'No'; ?></td>
		</tr>
		<?php
            } ?>
	</tbody>
</table>
</div>
<?php
        } ?>




<script>
	$('#equipacion_id').select2();
</script>
<script>
	$('#estadio_id').on('change', function(){
		var id = $(this).val();
		if (id == '(NULL)') {
			$('#enlace-estadio').attr('href', '/panelBack/club/crearEstadio.php');
			$('#enlace-estadio').text('Crear estadio');
		} else {
			$('#enlace-estadio').attr('href', '/panelBack/club/estadio.php?id=' + id);
			$('#enlace-estadio').text('Editar estadio');
			$('#imagen-estadio').attr('src', '/img/estadios/estadio' + id + '.png');
		};			
		var nombre = $("#estadio_id option[value='" + id + "']").text()
		console.log(nombre);

	});
	$('#equipacion_id').on('change', function(){
		var id = $(this).val();
		if (id == '(NULL)') {
			$('#enlace-equipacion').attr('href', '/panelBack/club/crearEquipacion.php');
			$('#enlace-equipacion').text('Crear equipacion');
		} else {
			$('#enlace-equipacion').attr('href', '/panelBack/club/equipacion.php?id=' + id);
			$('#enlace-equipacion').text('Editar equipacion');
			$('#imagen-equipacion').attr('src', '/img/equipaciones/equipacion' + id + '.jpg');
		};			
		var nombre = $("#equipacion_id option[value='" + id + "']").text()
		console.log(nombre);

	});
</script>