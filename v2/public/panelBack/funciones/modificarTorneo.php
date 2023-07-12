<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';




$sq='UPDATE torneo SET apifutbol='.$_POST['apifutbol'].',apiRFEFcompeticion='.$_POST['apiRFEFcompeticion'].',apiRFEFgrupo='.$_POST['apiRFEFgrupo'].', nombre="'.$_POST['nombre'].'", traduccion="'.$_POST['traduccion'].'", torneoCorto="'.$_POST['torneoCorto'].'", orden="'.$_POST['orden'].'", visible="'.$_POST['visible'].'" WHERE id='.$_POST['torneo_id'];
	mysqli_query($mysqli, $sq);

	//echo $sq.'<br />';

	$sq='UPDATE temporada SET nombre="'.$_POST['nombreTemporada'].'" WHERE torneo_id='.$_POST['torneo_id'];
	mysqli_query($mysqli, $sq);
	//echo $sq.'<br />';


$value=$_POST; unset($_POST); ?>
<p>Datos guardados.</p>
<form method="post" onsubmit="editarTemporada(event,$(this).serialize(),<?php echo $value['id']?>)">
<input type="hidden" name="modo" value="modificarTorneo">
<input type="hidden" name="id" value="<?php echo $value['id']?>">
<input type="hidden" name="torneo_id" value="<?php echo $value['id']?>">
<input type="hidden" name="temporada_id" value="<?php echo $value['temporada_id']?>">
<input type="hidden" name="comunidad_id" value="<?php echo $value['comunidad_id']?>">
Nombre: <input type="text" name="nombre" value="<?php echo $value['nombre']?>"  size="50"><br />
Traduccion: <input type="text" name="traduccion" value="<?php echo $value['traduccion']?>"  size="50"><br />
Torneo corto: <input type="text" name="torneoCorto" value="<?php echo $value['torneoCorto']?>"  size="50"><br />
Nombre temporada: <input type="text" name="nombreTemporada" value="<?php echo $value['nombreTemporada']?>"  size="40"><br />
Fase:<input type="text" name="apifutbol" value="<?php echo $value['apifutbol']?>" size="8" style="text-align: center">
Competición<input type="text" name="apiRFEFcompeticion" value="<?php echo $value['apiRFEFcompeticion']?>" size="8">
Grupo: <input type="text" name="apiRFEFgrupo" value="<?php echo $value['apiRFEFgrupo']?>" size="8"><br />
Orden <input type="text" name="orden" value="<?php echo $value['orden']?>" size="2" style="text-align: center">
Visible <input type="text" name="visible" value="<?php echo $value['visible']?>" size="2" style="text-align:center">
<input type="submit" name="enviar" value="ok">
</form>
