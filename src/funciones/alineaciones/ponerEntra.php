
<div id="<?php echo $local; ?>-ent-<?php echo $partido_id; ?>-<?php echo $filaJ['id']; ?>" style="width:100%; z-index:4;">
	<form method="post" onsubmit="submitFormTarjeta(event, $(this).serialize(),0)">
		<input type="hidden" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="jugador" value="<?php echo $filaJ['id']; ?>">
		<input type="hidden" id="temporada" name="temporada" value="<?php echo $temporada_id; ?>">
		<input type="hidden" id="partido" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="esLocal" value="<?php echo $local; ?>">
		<input type="hidden" name="arbitro" value="null">	
		<input type="hidden" name="tipo" value="4">	
		Comienza Minuto <input name="minuto" size="2">
		cambio nº: <input name="cambio" size="1">
		<input type="submit" name="grabarlocal" value="Grabar <?php echo $txtlocal; ?>">
	</form>
</div>