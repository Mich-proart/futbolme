<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';


$tipo_torneo = $_POST['tipo_torneo'];
$temporada = $_POST['temporada'];
$temporada = explode(',', $temporada);
$temporada_id = $temporada[0];
$fase = $temporada[1];
$jornadaActiva = $temporada[2];
$grupo = $temporada[3];

$jornadaActiva=abs($jornadaActiva);


$clasificacion['clasificacionFinal'] = array();


    if (1 == $tipo_torneo) {
    	$clas = array(
                'temporada_id' => $temporada_id,
                'jornada' => $jornadaActiva,
                'grupo_id' => $grupo,
                'equipo_id' => 0,
                'tipoClasificacion' => 0,
                'torneo_id' => 0,
                'jornadas' => 0,
                'puntosPorganar' => 3,
                );

        $clasificacion = XgenerarClasificacion($clas);
    }
    if (2 == $tipo_torneo && 3 == $fase) {
        //imp($fase);imp($grupo);
        $clasificacion = X2generarClasificacion($temporada_id, 2, $jornadaActiva, $grupo);
    }


$consulta = 'select te.torneo_id, t.division_id, t.categoria_torneo_id from temporada te inner join torneo t ON te.torneo_id=t.id  where te.id = '.$temporada_id;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$torneo_id = $resultado['torneo_id'];
$division_id = $resultado['division_id'];
$categoriatorneo_id = $resultado['categoria_torneo_id'];


if ($division_id > 5) {
    $consulta = 'select id, categoria_id, division_id, nombre, orden FROM ascenso WHERE division_id=8 AND categoria_id='.$categoriatorneo_id.' ORDER BY orden';
} else {
    $consulta = 'select id, categoria_id, division_id, nombre, orden FROM ascenso WHERE division_id='.$division_id.' ORDER BY orden';
}
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$listadoAscenso = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

?>	
<div style="width=50%; float:left">
<table border="1" bgcolor="gainsboro">
	<thead>
		<tr>
			<th colspan="10">
				<p>Pulsa en asterisco "*" para pintar la posición</p>
				<p>Pulsa en el escudo añadir puntos de sanción</p>
			</th>
		</tr>
		<tr>
			<th>P</th>
			<th>Equipo</th>
			<th>PTOS</th>
			<th>JU</th>
			<th>GA</th>
			<th>EM</th>
			<th>PE</th>
			<th>GF</th>
			<th>GC</th>
			<th>DIF</th>
			<th>escudo</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;
        foreach ($clasificacion['clasificacionFinal'] as $fila) {
        	
            $color_fondo = 'white';
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente']) {
                    $color_fondo = 'yellow';
                }
            } 
            $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);?>
			<tr bgcolor="white">
				<td onclick="mostrarColor(<?php echo $i; ?>)" style="<?php echo $fila['css']; ?>; cursor:pointer"><?php echo $fila['posicion']; ?> * </td>
				<td onclick="mostrarSancion(<?php echo $fila['equipo_id']; ?>)">						
					<img src="<?php echo $rutaEscudo?>" alt="<?php echo $fila['nombre']; ?>" style="width:18px; height:20px">
					<b><?php echo $fila['nombre']; ?></b>
				</td>
				<td align="center"><b><?php echo $fila['puntos']; ?></b></td>
				<td align="center"><?php echo $fila['jugados']; ?></td>
				<td align="center"><?php echo $fila['ganados']; ?></td>
				<td align="center"><?php echo $fila['empatados']; ?></td>
				<td align="center"><?php echo $fila['perdidos']; ?></td>
				<td align="center"><?php echo $fila['gFavor']; ?></td>
				<td align="center"><?php echo $fila['gContra']; ?></td>
				<td align="center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
				<td align="center"><b><?php echo $fila['club_id']; ?></b></td>
				<td align="center">
				<?php
                $sql = 'select ascensoequipo.id,(SELECT nombre FROM ascenso WHERE id=ascenso_id) nombre, posicion from ascensoequipo where equipo_id = '.$fila['equipo_id'];
            $resSQL = mysqli_query($mysqli, $sql);
            $ascensos = mysqli_fetch_all($resSQL, MYSQLI_BOTH);
            foreach ($ascensos as $ascenso) {
                echo $ascenso['nombre'].' - Pos. <b>'.$ascenso['posicion']."</b> <a href='../src/funciones/clasificacion/addAscenso.php?modo=q&id=".$ascenso['id']."'>Q</a><br />";
            } ?>

				</td>
			</tr>
			<tr id="equipo<?php echo $fila['equipo_id']; ?>" style="display:none">
				<td colspan="10">
				<form action="../src/funciones/clasificacion/addSancion.php" method="post">
					<label for="jornada">jor</label><input size="2" type="text" name="jornada" value="0">
					<label for="puntos">pts</label><input size="2" type="text" name="puntos" value="0">
					<label for="jugados">j</label><input size="2" type="text" name="jugados" value="0">
					<label for="ganados">g</label><input size="2" type="text" name="ganados" value="0">
					<label for="empatados">e</label><input size="2" type="text" name="empatados" value="0">
					<label for="perdidos">p</label><input size="2" type="text" name="perdidos" value="0">
					<label for="gFavor">gF</label><input size="2" type="text" name="gFavor" value="0">
					<label for="gContra"></label>gC<input size="2" type="text" name="gContra" value="0">
					<input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
					<input type="hidden" name="equipo_id" value="<?php echo $fila['equipo_id']; ?>">
					<input type="submit" value="guardar">
				
				</form>

				<form action="../src/funciones/clasificacion/addAscenso.php" method="post">
				<input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
				<input type="hidden" name="equipo_id" value="<?php echo $fila['equipo_id']; ?>">
				<select name="ascenso_id">
				<?php foreach ($listadoAscenso as $fila) {
                ?>
				<option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>	
				<?php
            } ?>
				</select>
				Pos.<input type="text" size="1" value="0" name="posicion">
				<input type="submit" name="marcar" value="marcar">
				</form>

				</td>
			</tr>
			<tr id="posicion<?php echo $i; ?>" style="display:none">
				<td colspan="10">
					<button onclick="actualizarColor(<?php echo $torneo_id; ?>, 0, <?php echo $i; ?>, <?php echo $_POST['tipo_torneo']; ?>, <?php echo $_POST['temporada']; ?>)" style="color:black;background-color:white">Q</button>
					<?php foreach ($clasificacion['leyenda'] as $color) {
                ?>
					<button onclick="actualizarColor(<?php echo $torneo_id; ?>, <?php echo $color['color_id']; ?>, <?php echo $i; ?>, <?php echo $_POST['tipo_torneo']; ?>, <?php echo $_POST['temporada']; ?>)" style="color:<?php echo $color['color']; ?>;background-color:<?php echo $color['fondo']; ?>"><?php echo $color['leyenda']; ?></button>
					<?php
            } ?>
					<button><a href="../src/funciones/clasificacion/index.php?torneo_id=<?php echo $torneo_id; ?>&posicion=<?php echo $i; ?>&grupo=<?php echo $grupo; ?>" target="_blank" style="color:black;background-color:white">A</a></button>
					
					
				</td>
			</tr>
			<?php ++$i;
        } ?> 
		</tbody>
	</table>
	<table style="margin: 0 auto;">
		<tr> 
			<?php foreach ($clasificacion['leyenda'] as $fila) {
            ?>
			<td style="color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></td>
			<?php
        } ?>
		</tr>
	</table>
	<table style="margin: 0 auto;">
	<tr><td>
				<?php
                $sql = 'select id,equipo_id,
				jornada, puntos, jugados, ganados, empatados, perdidos, gFavor, gContra,
				(select nombre from equipo where id=equipo_id) equipo from sancion where temporada_id='.$temporada_id.' ORDER BY equipo_id';
                $resSQL = mysqli_query($mysqli, $sql);
                $sanciones = mysqli_fetch_all($resSQL, MYSQLI_BOTH);
                foreach ($sanciones as $sancion) {
                    echo '<br />Equipo: <b>'.$sancion['equipo'].'</b> ('.$sancion['equipo_id'].')
					 - Jor <b>'.$sancion['jornada'].'</b> 
					- pts <b>'.$sancion['puntos'].' </b>
					- j <b>'.$sancion['jugados'].' </b>
					- g <b>'.$sancion['ganados'].' </b>
					- e <b>'.$sancion['empatados'].'</b> 
					- p <b>'.$sancion['perdidos'].' </b>
					- gF <b>'.$sancion['gFavor'].' </b>
					- gC <b>'.$sancion['gContra']."</b> 
					<a href='../src/funciones/clasificacion/addSancion.php?modo=q&id=".$sancion['id']."'>Q</a><br />";
                }	?>
	</td></tr>
	</table>

</div>
<div style="float:left; width:50%">
	
</div>