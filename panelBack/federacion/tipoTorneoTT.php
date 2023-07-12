<?php if ($_GET['tipo_torneo']==1){ ?>

Jornadas <input type="text" name="jornadas" value="30" size="2">  -
Jornada activa<input type="text" name="activa" value="1" size="1"> - <input type="submit" name="enviar" value="Grabar Torneo">

<?php } else { 
    define('_FUTBOLME_', 1);
    require_once 'consultas.php';
    $mysqli = conectarFM();
	$sq='SELECT id, nombre, orden, tipo_eliminatoria FROM fase ORDER BY orden';
	$resultadoSQL = mysqli_query($mysqli, $sq);
    $fases = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>

Fases: <select name="fases[]" size="20" multiple required>
	<?php foreach ($fases as $key => $value) { ?>
    	<option value="<?php echo $value['id']?>">
    		<?php echo $value['tipo_eliminatoria']?> -
    		<?php echo $value['orden']?> --
    		<?php echo $value['nombre']?>
    	</option>
    <?php } ?>    	
</select>
 - <input type="submit" name="enviar" value="Grabar Torneo">
<?php } ?>
