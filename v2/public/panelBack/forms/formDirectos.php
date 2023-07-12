<?php
$golesLocal = '';
$golesVisitante = '';
$ep=$fila['estado_partido'];
$local=$fila['ncLocal'];
$visitante=$fila['ncVisitante'];
$color_fila='white';

if ((int)$ep==1){ $color_fila='#eeffbb';}
?>
<div style="width:100%; float:left; background-color:#F2E0F7; clear:both; min-width:400px; border: 1px solid black; padding:2px;">
<div id="mensaje-<?php echo $fila['partido_id']; ?>" style="text-align:right; background-color:gainsboro"></div>
<table width="100%" bgcolor="#eeffbb" class="marco" style="min-width:400px">
<tr bgcolor="<?php echo $color_fila?>">
<td valign="top">

<form method="post" class="txt11" onsubmit="submitForm(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
<input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
<input type="hidden" name="temporada_id" value="<?php echo $fila['temporada_id']; ?>">
<input type="hidden" name="jornada" value="<?php echo $fila['jornada']; ?>">
<input type="hidden" name="fecha" value="<?php echo $fila['fecha']; ?>">
<input type="hidden" name="local" value="<?php echo $fila['ncLocal']; ?>">
<input type="hidden" name="equipoLocal_id" value="<?php echo $fila['equipoLocal_id']; ?>">
<input type="hidden" name="visitante" value="<?php echo $fila['ncVisitante']; ?>">
<input type="hidden" name="equipoVisitante_id" value="<?php echo $fila['equipoVisitante_id']; ?>">

<input type="hidden" name="or_estado_partido" value="<?php echo $fila['estado_partido']; ?>">
<input type="hidden" name="or_hora_prevista" value="<?php echo $fila['hora_prevista']; ?>">
<input type="hidden" name="or_goles_local" value="<?php echo $fila['goles_local']; ?>">
<input type="hidden" name="or_goles_visitante" value="<?php echo $fila['goles_visitante']; ?>">

<table width="100%" bgcolor="#eeffbb">
    <tr><td>
    <select name="estado_partido">
        <option value="0" <?php if (0 == $ep) { echo 'selected'; } ?>>No jugado</option>
        <option value="1" <?php if (1 == $ep) { echo 'selected'; } ?>>FINAL</option>
        <option value="2" <?php if (2 == $ep) { echo 'selected'; } ?>>En juego</option>
        <option value="3" <?php if (3 == $ep) { echo 'selected'; } ?>>Suspendido</option>
        <option value="4" <?php if (4 == $ep) { echo 'selected'; } ?>>Aplazado</option>
        <option value="5" <?php if (5 == $ep) { echo 'selected'; } ?>>Anulado</option>
        <option value="6" <?php if (6 == $ep) { echo 'selected'; } ?>>Descanso</option>
        <option value="8" <?php if (8 == $ep) { echo 'selected'; } ?>>Prórroga</option>
        <option value="9" <?php if (9 == $ep) { echo 'selected'; } ?>>Prór. 1T</option>
        <option value="11" <?php if (11 == $ep) { echo 'selected'; } ?>>Desc.Prór.</option>
        <option value="10" <?php if (10 == $ep) { echo 'selected'; } ?>>Prór. 2T</option>
        <option value="7" <?php if (7 == $ep) { echo 'selected'; } ?>>Penaltis</option>
    </select>
    </td>
    <td>
    <input type="text" name="hora_prevista" value="<?php echo $fila['hora_prevista']; ?>" size="6">
    </td>
    <td bgcolor="red" align="center">
    <input type="text" name="hora_real" value="<?php echo $fila['hora_real']; ?>" size="6">
    </td>
    <td align="right">
        <span style="font-size:15px; font-weight:bold"><?php echo $local; ?></span>
    </td>
    <td align="center">
    <input type="text" name="goles_local" value="<?php echo $fila['goles_local']; ?>" size="1" style="text-align: center"> -     
    <input type="text" name="goles_visitante" value="<?php echo $fila['goles_visitante']; ?>" size="1" style="text-align: center">
    </td>
    <td align="left">
    <span style="font-size:15px; font-weight:bold"><?php echo $visitante; ?></span>
    </td>
    <td>
     <input class="cajagrisoscuro" type="submit" name="grabarDirecto" value="Grabar" style="color:white">
    </td>
    <td>
        <span class="boldfont hide" style="cursor:pointer" onclick="verTW2('<?php echo $fila['twLocal']?>%20OR%20<?php echo $fila['twVisitante']?>')">
        TW2</span> 

        <span class="add-tw boldfont"
                      data-l="<?php echo $fila['twLocal']; ?>"
                      data-v="<?php echo $fila['twVisitante']; ?>" style="font-size: 20; cursor:pointer"
                      > + </span>
    </td>
</tr></table>
</form>

</td></tr>
<tr bgcolor="<?php echo $color_fila?>"><td>
    <table width="100%" bgcolor="#eeffbb">
        <tr>
            <td class="hidden">
    <span id="alineaciones-<?php echo $fila['partido_id']; ?> 
      onclick="alineaciones(<?php echo $fila['partido_id']; ?>,0,0)"
      style="background-color:orange; cursor:pointer; border: 2px solid black; padding:2px;">Alineaciones</span>
  </td>
  <td>
    <form id="f1-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
    <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="apiName" value="betsapi">
    <span class="boldfont" onclick="verPartido(<?php echo $fila['betsapi']; ?>,1)" style="cursor:pointer;">betsapi</span>: <input type="text" name="apiId" size="6" value="<?php echo $fila['betsapi']; ?>">
    <input type="submit" name="grabar" value="*">
    </form>
    <div id="betsapi-<?php echo $fila['betsapi']; ?>"></div>
  </td>
  
   <td>
    <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
    <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="apiName" value="clasificado">
    Clas: <input type="text" name="apiId" size="1" value="<?php echo $fila['clasificado']; ?>">
    <input type="submit" name="grabar" value="*">
    </form>
   </td>
   <td>
    <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
    <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="apiName" value="comentario">
    Claves: <input type="text" name="apiId" size="15" value="<?php echo $fila['comentario']; ?>">
    <input type="submit" name="grabar" value="*">
    </form>
   </td>
   <td>
    <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
    <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="apiName" value="observaciones">
    Obs:  <textarea style="width:150px; height:25px" name="apiId" onClick="this.style.height='80px'"><?php echo $fila['observaciones']; ?></textarea>
    <input type="submit" name="grabar" value="*">
    </form>
   </td>
</tr></table>      
<div id="ver-alineacion-<?php echo $fila['partido_id']; ?>"></div>
    
</td></tr>
</table>
</div>

	



	


