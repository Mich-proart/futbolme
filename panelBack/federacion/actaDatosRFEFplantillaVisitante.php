<table><tr>
	<td>

		<h3>Plantilla Visitante</h3>
	 <?php
$campos = 'j.id, 
j.nombre, 
j.apodo, 
j.posicion,
j.es_baja, 
j.dorsal, j.id_original';
$tabla = 'jugador j';
$union = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
$condicion = ' WHERE j.equipoActual_id='.$equipoVisitante_id;
$orden = ' ORDER BY j.es_baja, j.posicion, j.nombre';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>
<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr style="">
        <td>Foto</td>
        <td>Pos</td>
        <td>Nombre</td>
        <td>Dorsal</td>
        <td>Baja</td>        
    </tr>
<?php

$resultado = mysqli_query($mysqli, $consulta);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $color = 'white';
    $rutaJugador = '/img/jugadores/jugador'.$fila['id'].'.jpg';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
        $rutaJugador = '/img/jugadores/NI.png';
    } ?>
    <tr><td colspan="4"><div id="jugador-<?php echo $fila['id']; ?>"></div></td></tr>
    <tr bgcolor="<?php echo $color; ?>" style="border-bottom: grey 1px solid">        
        <td>

   <span style="cursor:pointer;"onclick="editar_jugador(<?php echo $fila['id']; ?>)"> 
   	<img src="<?php echo $rutaJugador; ?>" width="30" alt="jugador" title="<?php echo $fila['id']; ?>">
   </span>
        </td>
        <td align="center"><?php echo $fila['posicion']; ?></td>
        <td><?php echo $fila['nombre']; ?><br />
        <span style="color:red"><?php echo $fila['apodo']; ?></span>  (<?php echo $fila['id']?>)
        <?php if ($fila['id_original']>0){ echo ' -> '.$fila['id_original']; }?>        
        </td>
        <td align="center"><b><?php echo $fila['dorsal']; ?></b></td>
        <td align="center"><?php echo $fila['es_baja']; ?> <a href="?id=<?php echo $partido_id?>&acta=<?php echo $acta?>&jugador_id=<?php echo $fila['id']?>&modo=borrar_jugador">Q</a></td>        
    </tr>
<?php  } ?>
</table>
</td>

</tr></table>