<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

$campos = 'j.id, j.nombre, j.apodo, j.es_baja, j.lugar_nacimiento, e.nombre equipo, e.id equipo_id';
$tabla = 'jugador j';
$union = ' LEFT JOIN equipo e ON j.equipoActual_id=e.id';

if (0 != $_POST['jugador_id']) {
    $condicion = ' WHERE j.id='.$_POST['jugador_id'];
    $orden = '';
} else {
    if (strlen($_POST['jugador_lugar']) > 2) {
        $condicion = " WHERE (j.lugar_nacimiento LIKE '%".$_POST['jugador_lugar']."%')";
    } else {
        $condicion = " WHERE (j.nombre LIKE '%".$_POST['jugador_nombre']."%' OR j.apodo LIKE '%".$_POST['jugador_nombre']."%')";
    }
    $orden = '';
}
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
$link=conectar();
            //echo $consulta;?>
<div class="celestebox col-xs-12">
	<div class="h10 clear"></div>
	<table class="table">
		<tr bgcolor="gainsboro"><td>ID</td>
			<td>baja</td>
			<td>nombre</td>
			<td>lugar nacimiento</td>
			<td>apodo</td>
			<td>equipo</td>				  
		</tr>
				<?php
                $resultado = mysqli_query($link, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
            $rutaJugador = '/static/img/jugadores/jugador'.$fila['id'].'.jpg';$existe=1;
	        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
	            $rutaJugador = '/static/img/jugadores/NI.png';$existe=0;
	        }  ?>
		<tr bgcolor="white">
			<td>
				<a onclick="buscarJugadorDatos(<?php echo $fila['id']?>,<?php echo $fila['equipo_id']?>,1000)" style="cursor:pointer;">
					<?php echo $fila['id']; ?>
				</a>
			</td>

			<td>
				<img src="<?php echo $rutaJugador; ?>" width="50" alt="jugador">
			<?php if ($existe==0) { ?>
			<a onclick="subirFichero('j',<?php echo $fila['id']?>)" style="cursor:pointer;">subir imagen</a>			
			<?php } else { ?>

				<div class="clear marco" id="borro-<?php echo $fila['id']?>">
				<span onclick="borrarFichero('j',<?php echo $fila['id']?>)" style="cursor: pointer; color:white; background-color: maroon; padding:3px;">Borrar</span>
				</div>
			<?php } ?>
			<div id="subir-fichero-<?php echo $fila['id']?>"></div>
			</td>

			<td><?php echo $fila['es_baja']; ?></td>
			<td><?php echo $fila['nombre']; ?></td>
			<td><?php echo $fila['lugar_nacimiento']; ?></td>
			<td><?php echo $fila['apodo']; ?></td>
			<td><?php echo $fila['equipo']; ?></td>
		</tr>
		<tr><td colspan="6"><div id="buscar-jugador-datos-<?php echo $fila['id']; ?>" class="jugador-<?php echo $fila['equipo_id']; ?>"></div></td></tr>
					<?php
            } ?>
	</table>
</div>