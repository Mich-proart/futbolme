
<div id="<?php echo $local; ?>-gol-<?php echo $partido_id; ?>-<?php echo $filaJ['id']; ?>" style="width:100%; display:none; z-index:1;">
	<form method="post" onsubmit="submitFormGol(event, $(this).serialize(),0)">
		<input type="hidden" name="modo" value="insertar">
		<input type="hidden" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="jugador" value="<?php echo $filaJ['id']; ?>">
		<input type="hidden" id="temporada" name="temporada" value="<?php echo $temporada_id; ?>">
		<input type="hidden" id="partido" name="partido" value="<?php echo $partido_id; ?>">
		<input type="hidden" name="esLocal" value="<?php echo $local; ?>">
			<?php	
            echo ' Min. <input name="minuto" size="2">';
            $select = ' Gol <select name="tipo">';
            $select .= '<option value="0">jugada</option>';
            $select .= '<option value="1">penalti</option>';
            $select .= '<option value="10">propia puerta</option>';
            $select .= '<option value="11">penalti fallado</option>';
            $select .= '</select>';
            echo $select;
        ?>
		<input type="submit" name="grabarlocal" value="Grabar <?php echo $txtlocal; ?>">
	</form>
</div>