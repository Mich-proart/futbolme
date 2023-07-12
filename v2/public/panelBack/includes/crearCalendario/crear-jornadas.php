<div id="crear-jornadas">
  <div id="mensaje-fechas"></div>
  <form method="POST" action="#" onsubmit="modificarFechas(event, $(this).serialize(),<?php echo $temporada_id?>)">
  <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
  <input type="hidden" name="forma" value="0" />
  <?php
  foreach ($jornadasFechas as $k => $fila) {
        $fecha1 = $fila??'1970-01-01';
        $fecha = date('j-m-Y', strtotime($fecha1)); ?>
  J-<?php echo $k?>
  <input type="text" name="f[<?php echo $k?>]" value="<?php echo $fecha; ?>" size="12" style="width:100px"><br />
  <?php } ?>
  <input type="submit" name="modificar" value="modificar"> Form. dd-mm-aaaa
  </form>
  <hr />
<form method="POST" action="#" onsubmit="modificarFechas(event, $(this).serialize(),<?php echo $temporada_id?>)">
  <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>" />
  <input type="hidden" name="forma" value="1" />
  Poner fechas del torneo... <input type='text' name='id_fechas' size="4" /><br />
  <input type='submit' name='sustituir' value='sustituir'/>
</form>
</div>