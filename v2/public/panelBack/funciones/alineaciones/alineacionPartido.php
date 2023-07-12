<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

$partido_id = $_POST['partido_id'];
$modo = $_POST['modo'];
$jugador_id = $_POST['jugador_id'];

$mysqli = conectar();

$sql = 'SELECT estado_partido,temporada_id, equipoLocal_id,equipoVisitante_id,
(select nombreCorto from equipo where id=equipoLocal_id) local,
(select es_seleccion from club where id=(select club_id from equipo where id=equipoLocal_id)) local_seleccion, 
(select nombreCorto from equipo where id=equipoVisitante_id) visitante,
(select es_seleccion from club where id=(select club_id from equipo where id=equipoVisitante_id)) visitante_seleccion 

FROM partido WHERE id='.$partido_id;
$resultadoSQL = mysqli_query($mysqli, $sql);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

$fila = $resultado[0];

$local_seleccion = $fila['local_seleccion'];
$visitante_seleccion = $fila['visitante_seleccion'];
$temporada_id = $fila['temporada_id'];


if (1 == $local_seleccion) {
    $cl = 'equipoProcedencia_id';
} else {
    $cl = 'equipoActual_id';
}
if (1 == $visitante_seleccion) {
    $cv = 'equipoProcedencia_id';
} else {
    $cv = 'equipoActual_id';
}

$campos1 = "j.id, j.apodo, j.posicion, j.$cl, j.nombre";
$condicion1 = " WHERE j.$cl=".$fila['equipoLocal_id'].' AND j.es_baja=0';
$tabla = 'jugador j';
$orden = ' ORDER BY j.posicion';
$consulta = 'SELECT '.$campos1.' FROM '.$tabla.$condicion1.$orden;

//echo $consulta;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado1 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$campos2 = "j.id, j.apodo, j.posicion, j.$cv, j.nombre, j.apellidos ";
$condicion2 = " WHERE j.$cv=".$fila['equipoVisitante_id'].' AND j.es_baja=0';
$consulta = 'SELECT '.$campos2.' FROM '.$tabla.$condicion2.$orden;
//echo $consulta;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$desconocido1 = array(
            '0' => 29752,
            'id' => 29752,
            '1' => '...............',
            'apodo' => '...............',
            '2' => 0,
            'posicion' => 0,
            '3' => 0,
            'equipoActual_id' => 0,
            '4' => 0,
            'golmetido' => 0,
            '5' => 0,
            'nombre' => "",
            );

$desconocido2 = array(
            '0' => 32793,
            'id' => 32793,
            '1' => '...............',
            'apodo' => '...............',
            '2' => 0,
            'posicion' => 0,
            '3' => 0,
            'equipoActual_id' => 0,
            '4' => 0,
            'golmetido' => 0,
            '5' => 0,
            'nombre' => "",
            );

array_unshift($resultado1, $desconocido1);
array_unshift($resultado2, $desconocido2);



?>
<div style="float:left; width:100%; text-align:center">
<span onclick="ocultar_alineacion(<?php echo $partido_id; ?>)"  style="background-color:gainsboro; cursor:pointer; border: 2px solid black; padding:2px;"><span aria-hidden="true">Cerrar alineaciones</span>
</div>

<div style="float:left; width:50%">	
	<table class="table">
		<tr><td colspan="2">
			<h3><?php echo $fila['local']; ?> (<?php echo $fila['equipoLocal_id']; ?>)</h3>
			
			<?php /*
			<input type="hidden" value="<?php echo $partido_id; ?>" id="partido">			
			
				Apodo <input id="nj-apodo-<?php echo $fila['equipoLocal_id']; ?>" type='text' name='apodo' size='15'>
				Posicion <select id="nj-posicion-<?php echo $fila['equipoLocal_id']; ?>" name='posicion'>
						<option value='0'>Sin</option>
						<option value='1'>Por</option>
						<option value='2'>Def</option>
						<option value='3'>Cen</option>
						<option value='4'>Del</option>
					</select>					
				<input onclick="nuevoJugador(<?php echo $fila['equipoLocal_id']; ?>)"
				type='submit' name='grabar' value='Nuevo jugador'>
				<input onclick="nuevoJugador2(<?php echo $fila['equipoLocal_id']; ?>)"
				type='submit' name='grabar' value='NJ2'>
			
			<br />
			<input type="text" id="id_<?php echo $fila['equipoLocal_id']; ?>" size="15">
			<input onclick="anadirSeleccionado(<?php echo $fila['equipoLocal_id']; ?>)" type="submit" name="g" value="Añadir">
			<input onclick="quitarSeleccionado(<?php echo $fila['equipoLocal_id']; ?>)" type="submit" name="q" value="Q">
			*/?>
			</td>					
							
		</tr>	
		<?php 

        foreach ($resultado1 as $filaJ) {
            ?>
			<tr bgcolor="white" style="border: solid 1px gainsboro;">
			<td style="width:80%;" align="right">
			<span class="hidden-xs"><?php echo $filaJ['posicion']; ?> - <?php echo $filaJ['id']; ?> - </span><b><?php echo $filaJ['apodo']; ?></b> (<?php echo $filaJ['nombre']; ?>)</td>
			
			<td style="width:20%;">
			<?php 
                $local = 1;
                $txtlocal = 'Local';
                 ?>

					<div style="clear:both;">
					<span onclick="ver_gol(<?php echo $local; ?>,<?php echo $partido_id; ?>,<?php echo $filaJ['id']; ?>)" style="cursor:pointer; border: 1px solid black; padding:2px;"><img src="/static/img/balon.png" width="12"></span> 

				    <span onclick="ver_tarjeta(<?php echo $local; ?>,<?php echo $partido_id; ?>,<?php echo $filaJ['id']; ?>)" style='color:orange;background:black;cursor:pointer; border: 1px solid black; padding:2px;' class="hide"><img src="/static/img/ta.png" width="12"></span>
					</div>

					<div style="clear:both;">
					<?php //include 'ponerGol.php'; ?>
					<?php //include 'ponerTarjeta.php'; ?>
					<?php //include 'ponerSale.php'; ?>
					<?php //include 'ponerEntra.php'; ?>
					</div>

			</td>
			</tr>
			<tr><td colspan="2"><div class="marco"><?php include 'ponerGol.php'; ?></div></td></tr>
			<tr><td colspan="2"><div class="marco" style="background-color: gainsboro"><?php include 'ponerDatos.php'; ?></div>
					</td></tr>
		<?php
        }?>
	</table>
	</div>

	<div style="float:left; width:50%">	
	<table class="table">
		<tr><td colspan="2">
				<h3><?php echo $fila['visitante']; ?> (<?php echo $fila['equipoVisitante_id']; ?>)</h3>
			
			<?php /*
			<input type="hidden" value="<?php echo $partido_id; ?>" id="partido">
				Apodo <input id="nj-apodo-<?php echo $fila['equipoVisitante_id']; ?>" type='text' name='apodo' size='15'>
				Posicion <select id="nj-posicion-<?php echo $fila['equipoVisitante_id']; ?>" name='posicion'>
						<option value='0'>Sin</option>
						<option value='1'>Por</option>
						<option value='2'>Def</option>
						<option value='3'>Cen</option>
						<option value='4'>Del</option>
					</select>					
				<input onclick="nuevoJugador(<?php echo $fila['equipoVisitante_id']; ?>)"
				type='submit' name='grabar' value='Nuevo jugador'>
				<input onclick="nuevoJugador2(<?php echo $fila['equipoVisitante_id']; ?>)"
				type='submit' name='grabar' value='NJ2'>
			<br />
			<input type="text" id="id_<?php echo $fila['equipoVisitante_id']; ?>" size="15">
			<input onclick="anadirSeleccionado(<?php echo $fila['equipoVisitante_id']; ?>)" type="submit" name="g" value="Añadir">
			<input onclick="quitarSeleccionado(<?php echo $fila['equipoVisitante_id']; ?>)" type="submit" name="q" value="Q">
			*/?>
			</td>					
								
		</tr>		
		<?php foreach ($resultado2 as $filaJ) {
            ?>
			<tr bgcolor="white" style="border: solid 1px gainsboro;">
			
			<td style="width:80%;" align="right"><span class="hidden-xs"><?php echo $filaJ['posicion']; ?> - <?php echo $filaJ['id']; ?> - </span><b><?php echo $filaJ['apodo']; ?></b> (<?php echo $filaJ['nombre']; ?>)</td>						
			<td style="width:20%;">
			<?php 
                $local = 0;
                $txtlocal = 'Visitante';
                ?>
			<div style="clear:both;">
			<span onclick="ver_gol(<?php echo $local; ?>,<?php echo $partido_id; ?>,<?php echo $filaJ['id']; ?>)" style="cursor:pointer; border: 1px solid black; padding:2px;"><img src="/static/img/balon.png" width="12"></span>
			<span onclick="ver_tarjeta(<?php echo $local; ?>,<?php echo $partido_id; ?>,<?php echo $filaJ['id']; ?>)" style='color:orange;background:black;cursor:pointer; border: 1px solid black; padding:2px;' class="hide"><img src="/static/img/ta.png" width="12"></span>
			</div>
			<div style="clear:both;">
			<?php //include 'ponerGol.php'; ?>
			<?php //include 'ponerTarjeta.php'; ?>
			<?php //include 'ponerSale.php'; ?>
			<?php //include 'ponerEntra.php'; ?>
			</div>
			
			</td>
			</tr>
			<tr><td colspan="2"><div class="marco"><?php include 'ponerGol.php'; ?></div></td></tr>			
			<tr><td colspan="2"><div class="marco" style="background-color: gainsboro"><?php include 'ponerDatos.php'; ?></div>
					</td></tr>
		<?php
        }?>
	</table>
</div>

