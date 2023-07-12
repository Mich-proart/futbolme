<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);

include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_POST['comunidad_id'];
require_once '../funciones/urlFederaciones.php';
$f = '../../federacion/'.$territorial.'/campeonatos.json';

$cachetime = 86400; //86400 un dia.
//$cachetime = -1;


if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    if ((time() - $fichero_time)> $cachetime) {
        echo 'Mas de un día sin actualizar los torneos.<br />'; die;
    }
} else {
    echo 'No existen torneos para esta comunidad.<br />'; die;
}
echo $f.'<hr />';

$json = file_get_contents($f);
$datos = json_decode($json, true);
//imp($datos);?>

<form method="post" action="_00grabarCompeticion.php">
	<table>
		<tr bgcolor="gainsboro"><td>Cat. torneo</td>
			<td>Cat. Equipo</td>
			<td>Fase</td>
			<td>Comp.</td>
			<td>Grupo</td>
			<td>Nombre</td>
			<td>Orden</td>
			<td>Tipo</td>
		</tr>
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
<?php foreach ($datos as $key => $value) {

	//imp($value);
	$id=$value['id'];
	$nombre=$value['nombre'];

	$categoria_torneo_id=1;
	$pos=strpos($nombre, 'JUVENIL');
	if ($pos>0){$categoria_torneo_id=5;}
	$pos=strpos($nombre, 'CADET');
	if ($pos>0){$categoria_torneo_id=6;}
	$pos=strpos($nombre, 'FEMENÍ');
	if ($pos>0){$categoria_torneo_id=7;}
	$pos=strpos($nombre, 'INFANTIL');
	if ($pos>0){$categoria_torneo_id=14;}
	$pos=strpos($nombre, 'ALEVÍ');
	if ($pos>0){$categoria_torneo_id=15;}
	$pos=strpos($nombre, 'BENJAMÍ');
	if ($pos>0){$categoria_torneo_id=16;}
	$pos=strpos($nombre, 'FUTBOL SALA');
	if ($pos>0){$categoria_torneo_id=17;}

	$categoria_id=1;
	$pos=strpos($nombre, 'FEMENÍ');
	if ($pos>0){$categoria_id=2;}
	
	if ($categoria_id==2){
		$pos=strpos($nombre, 'JUVENIL');
		if ($pos>0){$categoria_id=26;}
		$pos=strpos($nombre, 'CADET');
		if ($pos>0){$categoria_id=27;}	
		$pos=strpos($nombre, 'INFANTIL');
		if ($pos>0){$categoria_id=28;}
		$pos=strpos($nombre, 'ALEVÍ');
		if ($pos>0){$categoria_id=30;}
	} else {
		$pos=strpos($nombre, 'JUVENIL');
		if ($pos>0){$categoria_id=3;}
		$pos=strpos($nombre, 'CADET');
		if ($pos>0){$categoria_id=4;}	
		$pos=strpos($nombre, 'INFANTIL');
		if ($pos>0){$categoria_id=21;}
		$pos=strpos($nombre, 'ALEVÍ');
		if ($pos>0){$categoria_id=23;}
		$pos=strpos($nombre, 'BENJAMÍ');
		if ($pos>0){$categoria_id=24;}
		$pos=strpos($nombre, 'PREBENJAMÍ');
		if ($pos>0){$categoria_id=25;}
	}



	$sql='SELECT competicion FROM torneo WHERE competicion='.$id;
	$resultadoSQL = mysqli_query($mysqliBase, $sql);
	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
	if (empty($r)){ ?>
		<tr bgcolor="white"><td><input type="text" name="categoria_torneo_id[]" value="<?php echo $categoria_torneo_id?>" size="2"></td>
		<td><input type="text" name="categoria_id[]" value="<?php echo $categoria_id?>" size="2"></td>
		<td><input type="text" name="fase[]" value="0" size="4"></td>
		<td><input type="text" name="competicion[]" value="<?php echo $id?>" size="8"></td>
		<td><input type="text" name="grupo[]" value="0" size="8"></td>
		<td><input type="text" name="nombre[]" value="<?php echo trim($nombre)?>" size="50"></td>
		<td><input type="text" name="orden[]" value="<?php echo $comunidad_id*10000?>" size="4"></td>
		<td><input type="text" name="tipo_torneo[]" value="1" size="1">
		</td></tr>
	<?php } else {
		echo '<br /> Esta competición ya está grabada - '.$nombre;
	}
 }?>
<tr><td align="center" colspan="8"><input type="submit" name="enviar" value="enviar">
</table>
</form>