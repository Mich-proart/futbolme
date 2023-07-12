
<div id="<?php echo $local; ?>-tar-<?php echo $partido_id; ?>-<?php echo $filaJ['id']; ?>" style="width:100%; display:none; z-index:2;">
	<form method="post" onsubmit="submitFormTarjeta(event, $(this).serialize(),0)">
		<input type="hidden" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="jugador" value="<?php echo $filaJ['id']; ?>">
		<input type="hidden" id="temporada" name="temporada" value="<?php echo $temporada_id; ?>">
		<input type="hidden" id="partido" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="esLocal" value="<?php echo $local; ?>">
		<input type="hidden" name="arbitro" value="null">		
			<?php	
            echo ' Min. <input name="minuto" size="2">';
            $select = ' Tarjeta <select name="tipo">';
            $select .= '<option value="0">1ª Amarilla</option>';
            $select .= '<option value="1">2ª Amarilla</option>';
            $select .= '<option value="5">Roja Directa</option>';
            $select .= '</select>';
            echo $select;
        ?>
		<input type="submit" name="grabarlocal" value="Grabar <?php echo $txtlocal; ?>">
	</form>
</div>