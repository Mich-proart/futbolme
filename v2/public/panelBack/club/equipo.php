<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';

$id = $_POST['id']??0;
if ($id==0){ echo 'Ningún equipo seleccionado'; die; }

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
<?php echo '/static/img/equipos/escudo'.$id.'.png'; ?><br />
<?php 

/*
if (file_exists($escudo)) {?>
<img src="/static/img/equipos/escudo<?php echo $id; ?>.png" alt="escudo"><br />
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
   } */ 

    ?>
<div id="editar-estadio"></div>
<form method="post" onsubmit="guardarEquipo(event, $(this).serialize(),<?php echo $id?>)">
	<h2><?php echo $equipo['nombre']; ?></h2>
	Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $equipo['nombre']; ?>">
	<br />Nombre completo: <input type="text" size="50" name="nombre_completo" id="nombre_completo" value="<?php echo $equipo['nombre_completo']; ?>">
	<br />Twitter: <input type="text" name="slug" id="slug" value="<?php echo $equipo['slug']; ?>">
	Categoría: 
		<select name="categoria_id" id="categoria_id">
		<option value="1" <?php if (1 == $equipo['categoria_id']) { ?> selected <?php } ?>>Senior Masculino</option>
		<option value="2" <?php if (2 == $equipo['categoria_id']) { ?> selected <?php } ?>>Senior Femenino</option>
		<option value="3" <?php if (3 == $equipo['categoria_id']) { ?> selected <?php } ?>>Juvenil</option>
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
	<br />Fundado: <input type="text" name="fundado" id="fundado" value="<?php echo $equipo['fundado']; ?>">
	<br />Desaparecido: <input type="text" name="desaparecido" id="desaparecido" value="<?php echo $equipo['desaparecido']; ?>">
	<br /> Debut nacional<input type="text" name="debut_nacional" id="debut_nacional" value="<?php echo $equipo['debut_nacional']; ?>">
	<br />Estadio: <select name="estadio_id" id="estadio_id">
			<option value="0">Sin estadio</option>
			<?php foreach ($estadios as $estadio) {?>
			<option <?php if ($equipo['estadio_id'] == $estadio['id']) {
            ?> selected <?php } ?> value="<?php echo $estadio['id']; ?>"><?php echo $estadio['nombre']; ?> - <?php echo $estadio['localidad_nombre']; ?></option>
			<?php  } ?>						
		</select>
		
		<?php 
        $img_estadio = '/static/img/estadios/estadi'.$equipo['estadio_id'].'.png';
        if ($equipo['estadio_id'] > 0) { ?>
		<span style="cursor:pointer" id="enlace-estadio" onclick="editarEstadio(<?php echo $equipo['estadio_id']?>)" class="boldfont">Editar estadio</span>
		<?php  } else { ?>
		<span style="cursor:pointer" id="enlace-estadio" onclick="crearEstadio(0)" class="boldfont">Nuevo estadio</span>
		<?php  } ?>
		<img id="imagen-estadio" src="<?php echo $img_estadio; ?>" alt="campo de futbol">
		<br />Fichero: <b><?php echo $img_estadio; ?></b>
		<br />Equipación: <select name="equipacion_id" id="equipacion_id" style="width:55%;">
			<option value="(NULL)">Sin equipación</option>
			<?php foreach ($equipaciones as $equipacion) { ?>
			<option <?php if ($equipo['equipacion_id'] == $equipacion['id']) { ?> selected <?php } ?> value="<?php echo $equipacion['id']; ?>"><?php echo $equipacion['camiseta']; ?> - <?php echo $equipacion['pantalon']; ?> - <?php echo $equipacion['media']; ?></option>
			<?php } ?>						
		</select>
		<?php if ($equipo['equipacion_id'] > 0) { ?>
		<a id="enlace-equipacion" href="/panelBack/club/equipacion.php?id=<?php echo $equipo['equipacion_id']; ?>">Editar equipacion</a>
		<?php } else {  ?>
		<a id="enlace-equipacion" href="/panelBack/club/crearEquipacion.php">Nueva equipacion</a>
		<?php }
        $img_equipacion = '/static/img/equipaciones/eq'.$equipo['equipacion_id'].'.png'; ?>
		<img id="imagen-equipacion" src="<?php echo $img_equipacion; ?>">
		<br /><br />Fichero: <b><?php echo $img_equipacion; ?></b>
	
	<input type="hidden" name="escudo" id="escudo" value="<?php echo $equipo['escudo']; ?>">
	<input type="hidden" name="sexo" id="sexo" value="<?php echo $equipo['sexo']; ?>">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<input type="submit" name="guardar_equipo" id="guardar_equipo" value="Guardar datos de equipo">
</form>

<hr />
	<h3>Foto de plantilla</h3>
	<?php echo '/static/img/equipos/plantilla'.$id.'.png'; ?><br />
	<?php if (file_exists($plantilla)) { ?>
	<img src="/static/img/equipos/plantilla<?php echo $id; ?>.png">
	<a href="deleteFile.php?ruta=<?php echo $plantilla; ?>">Eliminar</a>
	<?php } else { ?>
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
<hr />
<?php if (count($temporadas) > 0) { ?>
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
	<?php  } ?>	
</ul>
<hr />
<?php  } ?>

<?php if (count($jugadores) > 0) { ?>
<hr />
<h3>Plantilla</h3>
<table>
<thead>
	<tr>
		<th colspan="2">jugador</th>
		<th>posición</th>
		<th>¿Es baja?</th>
	</tr>
</thead>
<tbody>
<?php foreach ($jugadores as $jugador) { ?>
<tr>
	<td><img src="/v2/public/static/img/jugadores/jugador<?php echo $jugador['id']; ?>.jpg" width="50" alt="jugador"></td>
	<td><?php echo $jugador['nombre']; ?> <?php echo $jugador['apellidos']; ?></td>
	<td><?php switch ($jugador['posicion']) {
        case '1':echo 'POR';break;
        case '2':echo 'DEF';break;
        case '3':echo 'MED';break;
        case '4':echo 'DEL';break;
        case '5':echo 'ENT';break;
        default:echo 'SD';break;
    } ?></td>
	<td><?php echo (1 == $jugador['es_baja']) ? 'Si' : 'No'; ?></td>
</tr>
<?php  } ?>
</tbody>
</table>
<hr />
<?php } ?>




