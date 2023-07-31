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

$sql='SELECT e.federacion_id, co.id comunidad_id FROM equipo e 
INNER JOIN club c ON e.club_id=c.id
INNER JOIN comunidad co ON c.territorialRFEF=co.codigoRFEF
WHERE e.id='.$_POST['equipo_id'];
$resultadoSQL = mysqli_query($link, $sql);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$comunidad_id=($r['comunidad_id']-1);
$federacion_id=$r['federacion_id'];

$sql='SELECT apifutbol, apiRFEFcompeticion, apiRFEFgrupo FROM torneo WHERE id=(select torneo_id from temporada where id='.$_POST['temporada_id'].')';
$resultadoSQL = mysqli_query($link, $sql);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$competicion_id=$r['apiRFEFcompeticion'];
$fase_id=($r['apifutbol']);
$grupo_id=$r['apiRFEFgrupo'];


    $campos = 'j.id, j.nombre, j.apodo, j.posicion,j.es_baja, j.equipoProcedencia_id, (select nombre from equipo where id=equipoProcedencia_id) ep, j.slug';
    $tabla = 'jugador j';
    $union = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
    $condicion = ' WHERE j.equipoActual_id='.$_POST['equipo_id'];
    $orden = ' ORDER BY j.posicion, j.nombre';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>
<form  onsubmit="grabarJugador(event, $(this).serialize(),<?php echo $_POST['equipo_id']; ?>,<?php echo $_POST['temporada_id']; ?>)">
	<table class="table" style="background-color: gainsboro">
		<input type='hidden' name='temporada_id' value='<?php echo $_POST['temporada_id']; ?>'>
		<input type='hidden' name='equipo_id' value='<?php echo $_POST['equipo_id']; ?>'>
		<input type='hidden' name='equipoActual_id' value='<?php echo $_POST['equipo_id']; ?>'>
		<tr>
			<td>
				Nombre <input type='text' name='nombre' size='20'>
			</td>
			<td>
				Apodo <input type='text' name='apodo' size='15'>
			</td>
		</tr>
		<tr>
			<td>
				Tipo <select name='posicion'>
					<option value='0'>Sin demarcacion</option>
					<option value='1'>Portero</option>
					<option value='2'>Defensa</option>
					<option value='3'>Centrocampista</option>
					<option value='4'>Delantero</option>
					<option value='5'>Entrenador</option>
				</select>
			</td>
			<td>
				<input type='submit' name='grabar' value='grabar'> 
				Equipo <?php echo $_POST['equipo_id']; ?>

			</td>
		</tr>
</table>
</form>

<div style="background-color: lavender; padding:10px">
		<?php if ($comunidad_id>0){
			include ('../../federacion/funciones/urlFederaciones.php');
			if (isset($url_equipo)){
				include ('../../../20212022/simple_html_dom.php');
			$url_equipo=str_replace('xxx', $federacion_id, $url_equipo);
			$url_equipo=str_replace('ccc', $grupo_id, $url_equipo);
			echo '<a href="'.$url_equipo.'" target="_blank">Equipo en la federación</a>'; 
				/*$html = new simple_html_dom();
				$content=getPageLibre($url_equipo.$federacion_id);						
				//$content = file_get_contents($url_equipo.$federacion_id);
				//var_dump($content);
				echo $url_equipo.$federacion_id;
				$string = str_get_html($content);
				$html->load($string);
				foreach($html->find('table.table-striped') as $k => $tabla){
					 echo '<h3>Jugadores en federación</h3>'; 
					foreach($tabla->find('h5.list-group-item-heading') as $k1 => $j){
					echo $j;
					}
				}*/
			}
		} ?>
</div>

<table class="table">
	<tr>
		<td>ID</td>
		<td>Foto</td>
		<td>Nombre</td>
		<td>Apodo</td>
		<td>Posicion</td>
		<td>Baja</td>				  
	</tr>
	<?php
    $color = 'white';
    $resultado = mysqli_query($link, $consulta);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if (isset($_GET['jugador_id'])) {
            if ($_GET['jugador_id'] != $fila['id']) {
                $color = 'white';
            } else {
                $color = 'yellow';
            }
        }
        $rutaJugador = '/v2/public/static/img/jugadores/jugador'.$fila['id'].'.jpg';$existe=1;
        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
            $rutaJugador = '/v2/public/static/img/jugadores/NI.png';$existe=0;
        } ?>
	<tr bgcolor="<?php echo $color; ?>">
		<td>
			<a onclick="buscarJugadorDatos(<?php echo $fila['id']?>,<?php echo $_POST['equipo_id']?>,<?php echo $_POST['temporada_id']?>)" style="cursor:pointer;">
				<?php echo $fila['id']; ?>
			</a><br />
			<form  onsubmit="borrarFicheroCache(event, $(this).serialize())">
				<input type="hidden" name="tipo" value="jugador">
				<input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
				<input type="submit" name="boton" value="*">
			</form>
		</td>
		<td><img src="<?php echo $rutaJugador; ?>" width="50" alt="jugador">

		</td>
		<td><?php echo $fila['nombre']; ?><br />
		<span style="color:red">
		<?php echo $fila['slug']; ?> 
		<?php if (null !== $fila['ep']) { ?>
		<br /><span style="color:green"><?php echo $fila['ep']; ?></span>
		<?php  } ?>
		</span>
		<?php 
		
		if ($existe==0) { ?>
		<a onclick="subirFichero('j',<?php echo $fila['id']?>)" style="cursor:pointer;">subir imagen</a>			
		<?php } else { ?>
			<div class="clear marco" id="borro-<?php echo $fila['id']?>">
			<span onclick="borrarFichero('j',<?php echo $fila['id']?>)" style="cursor: pointer; color:white; background-color: maroon; padding:3px;">Borrar</span>
			</div>
		<?php } ?>
		<div id="subir-fichero-<?php echo $fila['id']?>"></div>
		</td>
		<td><?php echo $fila['apodo']; ?></td>
		<td><?php echo $fila['posicion']; ?></td>
		<td><?php echo $fila['es_baja']; ?></td>
	</tr>
	<tr><td colspan="6">
		<div id="buscar-jugador-datos-<?php echo $fila['id']; ?>" class="jugador-<?php echo $_POST['equipo_id']; ?>"></div>
	</td></tr>
<?php  } ?>
</table>
</div>
</body>
</html>

