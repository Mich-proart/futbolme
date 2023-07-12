<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
require_once '../../includes/head.php';
?>
</head>
<body style="background-color: lavender; padding: 10px">

<div style="float:left; width:100%; z-index:1000">	


<?php
$link=conectar();
                    
    $campos = 'j.id, j.nombre, j.apodo, j.posicion, j.es_baja, e.nombre equipo, j.pais_id, j.fecha_nacimiento, j.lugar_nacimiento, j.dorsal, j.altura, j.peso, j.caracteristicas, j.palmares, j.es_fichaje, j.slug';
    $tabla = 'jugador j';
    $union = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
    $condicion = ' WHERE j.id='.$_POST['jugador_id'];
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    $resultado3 = mysqli_query($link, $consulta);
    $fila3 = mysqli_fetch_assoc($resultado3);
    $consultaPaises = 'SELECT id, nombre FROM pais WHERE 1';
    $resultadoPaises = mysqli_query($link, $consultaPaises); ?>

<form  onsubmit="modificarJugador(event, $(this).serialize(),<?php echo $_POST['jugador_id']; ?>)">
<table class="table" style="background-color: lavender">
		
		<input type='hidden' name='temporada_id' value='<?php echo $_POST['temporada_id']; ?>'>
		<input type='hidden' name='equipo_id' value='<?php echo $_POST['equipo_id']; ?>'>
		<input type='hidden' name='jugador_id' value='<?php echo $_POST['jugador_id']; ?>'>
		<tr>
			<td colspan="2">
				Nombre: <input type='text' name='jugador_nombre' size='25' value='<?php echo $fila3['nombre']; ?>'>
			</td>
			<td colspan="2">
				Apodo: <input type='text' name='jugador_apodo' size='15' value='<?php echo $fila3['apodo']; ?>'>
			</td>
		</tr>
		<tr>
			<td>
				Posici&oacute;n: <input type='text' name='jugador_posicion' size='1' value='<?php echo $fila3['posicion']; ?>'>
			</td>						
			<td>
				Dorsal: <input type="text" value="<?php echo $fila3['dorsal']; ?>" name="jugador_dorsal" id="jugador_dorsal" size='1'>
			</td>						
			<td>
				Altura: <input type="text" value="<?php echo $fila3['altura']; ?>" name="jugador_altura" id="jugador_altura" size='3'>
			</td>						
			<td>
				Peso: <input type="text" value="<?php echo $fila3['peso']; ?>" name="jugador_peso" id="jugador_peso" size='3'>
			</td>
		</tr>
		<tr>						
			<td colspan="2">
				F. nacimiento: <input type="date" value="<?php echo $fila3['fecha_nacimiento']; ?>" name="jugador_fecha_nacimiento" id="jugador_fecha_nacimiento">
			</td>
			<td colspan="2">
				L. nacimiento: <input type="text" value="<?php echo $fila3['lugar_nacimiento']; ?>" name="jugador_lugar_nacimiento" id="jugador_lugar_nacimiento">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Pais: <select name="jugador_pais_id" id="jugador_pais_id">
					<?php while ($pais = mysqli_fetch_assoc($resultadoPaises)) {
                        ?>
					<option <?php if ($fila3['pais_id'] == $pais['id']) {
                            ?> selected <?php
                        } ?> value="<?php echo $pais['id']; ?>"><?php echo $pais['nombre']; ?></option>
					<?php
                    } ?>
				</select>
			</td>
			<td>
				Baja?: <input type='text' name='jugador_baja' size='1' value='<?php echo $fila3['es_baja']; ?>'>
			</td>
			<td>
				Fichaje?: <input type='text' name='jugador_fichaje' size='1' value='<?php echo $fila3['es_fichaje']; ?>'>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Caracter&iacute;sticas: <textarea name="jugador_caracteristicas" id="jugador_caracteristicas" cols="21" rows="5"  onClick="this.style.height='200px'; this.style.width='300px'"><?php echo $fila3['caracteristicas']; ?></textarea>
			</td>
			<td colspan="2">
				Palmar&eacute;s: <textarea name="jugador_palmares" id="jugador_palmares" cols="21" rows="5"  onClick="this.style.height='200px'; this.style.width='300px'"><?php echo $fila3['palmares']; ?></textarea>
			</td>

		</tr>
		<tr>
			<td colspan="2">
				Procedencia: <input type='text' name='procedencia' size='15' value='<?php echo $fila3['slug']; ?>'>
			</td>
			<td colspan="2">
				<input type='submit' name='modificar' value='modificar'>
			</td>
		</tr>
	
</table>
<div id="modificar-jugador-<?php echo $_POST['jugador_id']; ?>"></div>
</form>

<form  onsubmit="traspasarJugador(event, $(this).serialize(),<?php echo $_POST['jugador_id']; ?>)">
<table class="table" style="background-color: gold">
		<input type='hidden' name='temporada_id' value='<?php echo $_POST['temporada_id']; ?>'>
		<input type='hidden' name='equipo_id' value='<?php echo $_POST['equipo_id']; ?>'>
		<input type='hidden' name='jugador_id' value='<?php echo $_POST['jugador_id']; ?>'>
		<input type='hidden' name='nombre_jugador' value='<?php echo $fila3['nombre']; ?>'>
		<input type='hidden' name='apodo' value='<?php echo $fila3['apodo']; ?>'>
		<input type='hidden' name='nombre_equipo' value='<?php echo $fila3['equipo']; ?>'>
		<input type='hidden' name='posicion' value='<?php echo $fila3['posicion']; ?>'>
		<tr>
			<td><?php echo $fila3['id']; ?> - Nombre <?php echo $fila3['nombre']; ?></td>
			<td>Equipo <?php echo $fila3['equipo']; ?></td>
		</tr>
		<tr>
			<td>Tipo 
				<select name='equipoNuevo_id'>
									<?php
                     
                    $consulta = 'SELECT te.temporada_id, t.nombre, e.nombre equipo, e.id 
                    FROM temporada_equipo te 
                    INNER JOIN equipo e ON te.equipo_id=e.id 
                    INNER JOIN temporada t ON te.temporada_id=t.id 
                    INNER JOIN torneo tor ON t.torneo_id=tor.id 
                    WHERE tor.division_id<6 AND tor.tipo_torneo=1 OR te.temporada_id=214  
                    ORDER BY tor.division_id, tor.orden, e.nombre';

                    $resultado2 = mysqli_query($link, $consulta);
                    while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                        ?>
					<option value="<?php echo $fila2['id']; ?>"><?php echo $fila2['temporada_id']; ?> - <?php echo $fila2['nombre']; ?> - <?php echo $fila2['equipo']; ?></option>
									<?php
                    } ?>
				</select>
				<br />Fichaje?: <input type='text' name='jugador_fichaje' size='1' value='0'>
				<br />Procedencia: <input type='text' name='procedencia_fichaje' size='15' value=''>
                
			</td>
			<td>
				<input type='submit' name='traspasar' value='traspasar'>
			</td>
		</tr>
</table>
</form>
<div id="traspasar-jugador-<?php echo $_POST['jugador_id']; ?>"></div>
</div>
</body></html>