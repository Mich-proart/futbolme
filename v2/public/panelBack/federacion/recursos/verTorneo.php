<div  class="marco celestebox" id="torneo-<?php echo $value['id']?>" style="display: none; text-align: left">
<form method="post" onsubmit="editarTemporada(event,$(this).serialize(),<?php echo $value['id']?>)">
<input type="hidden" name="modo" value="modificarTorneo">
<input type="hidden" name="id" value="<?php echo $value['id']?>">
<input type="hidden" name="torneo_id" value="<?php echo $value['id']?>">
<input type="hidden" name="temporada_id" value="<?php echo $value['temporada_id']?>">
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
Nombre: <input type="text" name="nombre" value="<?php echo $value['nombre']?>"  size="50"><br />
Traduccion: <input type="text" name="traduccion" value="<?php echo $value['traduccion']?>"  size="50"><br />
Torneo corto: <input type="text" name="torneoCorto" value="<?php echo $value['torneoCorto']?>"  size="50"><br />
Nombre temporada: <input type="text" name="nombreTemporada" value="<?php echo $value['nombreTemporada']?>"  size="40"><br />
Fase:<input type="text" name="apifutbol" value="<?php echo $value['apifutbol']?>" size="8" style="text-align: center">
Competición<input type="text" name="apiRFEFcompeticion" value="<?php echo $value['apiRFEFcompeticion']?>" size="8">
Grupo: <input type="text" name="apiRFEFgrupo" value="<?php echo $value['apiRFEFgrupo']?>" size="8"><br />
Orden <input type="text" name="orden" value="<?php echo $value['orden']?>" size="2" style="text-align: center">
Visible <input type="text" name="visible" value="<?php echo $value['visible']?>" size="2" style="text-align:center">
<input type="submit" name="enviar_datos_torneo" value="ok">
</form>


				  

				  <div id="enviar-whats-<?php echo $value['temporada_id']?>" style="display: block; padding:5px; background-color:lavender">
				  	<textarea id="whatsapp-<?php echo $value['temporada_id']?>" cols="40" rows="3"></textarea>
					<br /><span onclick="enviarMensajeWFM(<?php echo $value['temporada_id']?>)" style="cursor:pointer;" class="btn btn-default text-center">Enviar whatsapp</span>
				  </div>

				  <hr />
				  <div>
				  	<?php 
				  	$nombreWhats='Futbolme '.str_replace('DIVISIÓN', '', $value['torneoCorto']);
				  	$nombreWhats=str_replace(' - Grupo', ' Gr.', $nombreWhats);
				  	$nombreWhats=str_replace('  ', ' ', $nombreWhats);
				  	?>
				  	<input id="new-whatsapp-<?php echo $value['id']?>" value="<?php echo $nombreWhats?>" size="25" maxlength="25"> (<?php echo strlen($nombreWhats)?>)<span onclick="crearWhatsappFM(<?php echo $value['id']?>)" style="cursor:pointer;" class="btn btn-default text-center">Crear whatsapp</span>
				  	<div id="new-whatsapp2-<?php echo $value['temporada_id']?>" style="display: block; padding:5px; background-color:lavender"></div>
				  </div>

</div>